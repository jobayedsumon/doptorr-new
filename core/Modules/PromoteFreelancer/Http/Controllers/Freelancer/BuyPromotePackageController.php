<?php

namespace Modules\PromoteFreelancer\Http\Controllers\Freelancer;

use App\Helper\PaymentGatewayRequestHelper;
use App\Mail\BasicMail;
use App\Models\AdminNotification;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Modules\PromoteFreelancer\Entities\ProjectPromoteSettings;
use Modules\PromoteFreelancer\Entities\PromotionProjectList;
use Modules\Subscription\Entities\Subscription;
use Modules\Subscription\Entities\UserSubscription;
use Modules\Wallet\Entities\Wallet;

class BuyPromotePackageController extends Controller
{
    private const CANCEL_ROUTE = 'freelancer.package.buy.payment.cancel.static';
    public function promote_payment_cancel_static()
    {
        return view('promotefreelancer::frontend.payment-cancel');
    }

    public function buy_package(Request $request)
    {
        if(isset($request->package_id)){
            $user = Auth::user();
            $package_details = ProjectPromoteSettings::where('id',$request->package_id)->where('status','1')->first();

            if($package_details){
                $transaction_fee = $request->transaction_fee;
                if($request->selected_payment_gateway === 'manual_payment' || $request->selected_payment_gateway === 'wallet'){
                    $total = $package_details->budget;
                }else{
                    $total = $package_details->budget + $transaction_fee;
                }

                $expire_date = Carbon::now()->addDays($package_details->duration);
                $title = __('Buy Package');
                $duration = $package_details->duration;
                $name = $user->first_name.' '.$user->last_name;
                $email = $user->email;
                $user_type = $user->user_type == 1 ? 'client' : 'freelancer';
                $payment_status = $request->selected_payment_gateway === 'wallet' ? 'complete' : 'pending';
                $status = $request->selected_payment_gateway === 'wallet' ? 1 : 0;
                $project_id = $request->set_project_id_for_promote == 0 ? $user->id : $request->set_project_id_for_promote ;
                $type = $request->set_project_id_for_promote == 0 ? 'profile' : 'project';
                session()->put('user_id',$user->id);
                session()->put('user_type',$user_type);
                Session::save();

                if($request->selected_payment_gateway === 'manual_payment')
                {
                    $request->validate(['manual_payment_image' => 'required|mimes:jpg,jpeg,png,pdf,svg']);

                    if($request->hasFile('manual_payment_image')){
                        $manual_payment_image = $request->manual_payment_image;
                        $img_ext = $manual_payment_image->extension();

                        $manual_payment_image_name = 'manual_attachment_'.time().'.'.$img_ext;
                        if(in_array($img_ext,['jpg','jpeg','png','pdf','svg'])){
                            $manual_image_path = 'assets/uploads/manual-payment/promotion';
                            $manual_payment_image->move($manual_image_path,$manual_payment_image_name);

                            $buy_package = PromotionProjectList::create([
                                'user_id' => $user->id,
                                'identity' => $project_id,
                                'type' => $type,
                                'package_id' => $package_details->id,
                                'price' => $total,
                                'duration' => $duration,
                                'expire_date' => $expire_date,
                                'payment_gateway' => $request->selected_payment_gateway,
                                'manual_payment_image' => $manual_payment_image_name,
                                'payment_status' => $payment_status,
                                'status' => $status,
                                'is_valid_payment' => 'yes',
                            ]);
                            $last_package_id = $buy_package->id;
                            $this->adminNotification($last_package_id,$user->id);
                        }else{
                            return back()->with(toastr_warning(__('Image type not supported')));
                        }
                    }

                    if($type == 'profile'){
                        User::where('id',$user->id)->update([
                            'is_pro' => 'no',
                            'pro_expire_date' => $expire_date
                        ]);
                    }else{
                        Project::where('id',$project_id)->update([
                            'is_pro' => 'no',
                            'pro_expire_date' => $expire_date
                        ]);
                    }

                    $this->sendEmail($name,$last_package_id,$email);
                    toastr_success('Package purchase success. Your package will be active after admin complete the payment status pending to complete.');
                    return back();
                }
                elseif($request->selected_payment_gateway === 'wallet')
                {
                    $wallet_balance = Wallet::select('balance')->where('user_id',$user->id)->first();
                    if(isset($wallet_balance) && $wallet_balance->balance > $total){
                        $buy_package = PromotionProjectList::create([
                            'user_id' => $user->id,
                            'identity' => $project_id,
                            'type' => $type,
                            'package_id' => $package_details->id,
                            'price' => $total,
                            'duration' => $duration,
                            'expire_date' => $expire_date,
                            'payment_gateway' => $request->selected_payment_gateway,
                            'payment_status' => $payment_status,
                            'status' => $status,
                            'is_valid_payment' => 'yes',
                        ]);
                        $last_package_id = $buy_package->id;
                        $this->adminNotification($last_package_id,$user->id);
                        Wallet::where('user_id',$user->id)->update(['balance'=> $wallet_balance->balance - $total]);

                    }else{
                        return back()->with(toastr_warning(__('Please deposit to your wallet and try again')));
                    }
                    if($type == 'profile'){
                        User::where('id',$user->id)->update([
                            'is_pro' => 'yes',
                            'pro_expire_date' => $expire_date
                        ]);
                    }else{
                        Project::where('id',$project_id)->update([
                            'is_pro' => 'yes',
                            'pro_expire_date' => $expire_date
                        ]);
                    }
                    $this->sendEmail($name,$last_package_id,$email);
                    return back()->with(toastr_success(__('Promote package purchase success')));
                }
                else
                {
                    $buy_package = PromotionProjectList::create([
                        'user_id' => $user->id,
                        'identity' => $project_id,
                        'type' => $type,
                        'package_id' => $package_details->id,
                        'price' => $total,
                        'transaction_fee' => $transaction_fee,
                        'duration' => $duration,
                        'expire_date' => $expire_date,
                        'payment_gateway' => $request->selected_payment_gateway,
                        'payment_status' => $payment_status,
                        'status' => $status,
                    ]);

                    $last_package_id = $buy_package->id;
                    $description = sprintf(__('Order id #%1$d Email: %2$s, Name: %3$s'),$last_package_id,$email,$name);

                    if ($request->selected_payment_gateway === 'shurjopay') {
                        try {
                            return PaymentGatewayRequestHelper::shurjopay()->charge_customer($this->buildPaymentArg($total,$transaction_fee,$title,$description,$last_package_id,$email,$name,$user_type,route('freelancer.bp.shurjopay.ipn.package')));
                        }catch (\Exception $e){
                            toastr_error($e->getMessage());
                            return back();
                        }
                    }
                    elseif ($request->selected_payment_gateway === 'paypal') {
                        try {
                            return PaymentGatewayRequestHelper::paypal()->charge_customer($this->buildPaymentArg($total,$transaction_fee,$title,$description,$last_package_id,$email,$name,$user_type,route('freelancer.bp.paypal.ipn.package')));
                        }catch (\Exception $e){
                            toastr_error($e->getMessage());
                            return back();
                        }
                    }
                    elseif($request->selected_payment_gateway === 'paytm'){
                        try {
                            return PaymentGatewayRequestHelper::paytm()->charge_customer($this->buildPaymentArg($total,$transaction_fee,$title,$description,$last_package_id,$email,$name,$user_type,route('freelancer.bp.paytm.ipn.package')));
                        }catch (\Exception $e){
                            toastr_error($e->getMessage());
                            return back();
                        }
                    }
                    elseif ($request->selected_payment_gateway === 'mollie'){

                        try {
                            return PaymentGatewayRequestHelper::mollie()->charge_customer($this->buildPaymentArg($total,$transaction_fee,$title,$description,$last_package_id,$email,$name,$user_type,route('freelancer.bp.mollie.ipn.package')));
                        }catch (\Exception $e){
                            toastr_error($e->getMessage());
                            return back();
                        }
                    }
                    elseif($request->selected_payment_gateway === 'stripe'){
                        try {
                            return PaymentGatewayRequestHelper::stripe()->charge_customer($this->buildPaymentArg($total,$transaction_fee,$title,$description,$last_package_id,$email,$name,$user_type,route('freelancer.bp.stripe.ipn.package')));
                        }catch (\Exception $e){
                            toastr_error($e->getMessage());
                            return back();
                        }
                    }
                    elseif($request->selected_payment_gateway === 'razorpay'){
                        try {
                            return PaymentGatewayRequestHelper::razorpay()->charge_customer($this->buildPaymentArg($total,$transaction_fee,$title,$description,$last_package_id,$email,$name,$user_type,route('freelancer.bp.razorpay.ipn.package')));
                        }catch (\Exception $e){
                            toastr_error($e->getMessage());
                            return back();
                        }
                    }
                    elseif($request->selected_payment_gateway === 'flutterwave'){
                        try {
                            return PaymentGatewayRequestHelper::flutterwave()->charge_customer($this->buildPaymentArg($total,$transaction_fee,$title,$description,$last_package_id,$email,$name,$user_type,route('freelancer.bp.flutterwave.ipn.package')));
                        }catch (\Exception $e){
                            toastr_error($e->getMessage());
                            return back();
                        }
                    }
                    elseif($request->selected_payment_gateway === 'paystack'){
                        try {
                            return PaymentGatewayRequestHelper::paystack()->charge_customer($this->buildPaymentArg($total,$transaction_fee,$title,$description,$last_package_id,$email,$name,$user_type,route('freelancer.bp.paystack.ipn.package')));
                        }catch (\Exception $e){
                            toastr_error($e->getMessage());
                            return back();
                        }
                    }
                    elseif($request->selected_payment_gateway === 'payfast'){
                        try {
                            return PaymentGatewayRequestHelper::payfast()->charge_customer($this->buildPaymentArg($total,$transaction_fee,$title,$description,$last_package_id,$email,$name,$user_type,route('freelancer.bp.payfast.ipn.package')));
                        }catch (\Exception $e){
                            toastr_error($e->getMessage());
                            return back();
                        }
                    }
                    elseif($request->selected_payment_gateway === 'cashfree'){
                        try {
                            return PaymentGatewayRequestHelper::cashfree()->charge_customer($this->buildPaymentArg($total,$transaction_fee,$title,$description,$last_package_id,$email,$name,$user_type,route('freelancer.bp.cashfree.ipn.package')));
                        }catch (\Exception $e){
                            toastr_error($e->getMessage());
                            return back();
                        }
                    }
                    elseif($request->selected_payment_gateway === 'instamojo'){
                        try {
                            return PaymentGatewayRequestHelper::instamojo()->charge_customer($this->buildPaymentArg($total,$transaction_fee,$title,$description,$last_package_id,$email,$name,$user_type,route('freelancer.bp.instamojo.ipn.package')));
                        }catch (\Exception $e){
                            toastr_error($e->getMessage());
                            return back();
                        }
                    }
                    elseif($request->selected_payment_gateway === 'marcadopago'){
                        try {
                            return PaymentGatewayRequestHelper::marcadopago()->charge_customer($this->buildPaymentArg($total,$transaction_fee,$title,$description,$last_package_id,$email,$name,$user_type,route('freelancer.bp.marcadopago.ipn.package')));
                        }catch (\Exception $e){
                            toastr_error($e->getMessage());
                            return back();
                        }

                    }
                    elseif($request->selected_payment_gateway === 'midtrans'){
                        try {
                            return PaymentGatewayRequestHelper::midtrans()->charge_customer($this->buildPaymentArg($total,$transaction_fee,$title,$description,$last_package_id,$email,$name,$user_type,route('freelancer.bp.midtrans.ipn.package')));
                        }catch (\Exception $e){
                            toastr_error($e->getMessage());
                            return back();
                        }
                    }
                    elseif($request->selected_payment_gateway === 'squareup'){
                        try {
                            return PaymentGatewayRequestHelper::squareup()->charge_customer($this->buildPaymentArg($total,$transaction_fee,$title,$description,$last_package_id,$email,$name,$user_type,route('freelancer.bp.squareup.ipn.package')));
                        }catch (\Exception $e){
                            toastr_error($e->getMessage());
                            return back();
                        }
                    }
                    elseif($request->selected_payment_gateway === 'cinetpay'){
                        try {
                            return PaymentGatewayRequestHelper::cinetpay()->charge_customer($this->buildPaymentArg($total,$transaction_fee,$title,$description,$last_package_id,$email,$name,$user_type,route('freelancer.bp.cinetpay.ipn.package')));
                        }catch (\Exception $e){
                            toastr_error($e->getMessage());
                            return back();
                        }
                    }
                    elseif($request->selected_payment_gateway === 'paytabs'){

                        try {
                            return PaymentGatewayRequestHelper::paytabs()->charge_customer($this->buildPaymentArg($total,$transaction_fee,$title,$description,$last_package_id,$email,$name,$user_type,route('freelancer.bp.paytabs.ipn.package')));
                        }catch (\Exception $e){
                            toastr_error($e->getMessage());
                            return back();
                        }
                    }
                    elseif($request->selected_payment_gateway === 'billplz'){
                        try {
                            return PaymentGatewayRequestHelper::billplz()->charge_customer($this->buildPaymentArg($total,$transaction_fee,$title,$description,$last_package_id,$email,$name,$user_type,route('freelancer.bp.billplz.ipn.package')));
                        }catch (\Exception $e){
                            toastr_error($e->getMessage());
                            return back();
                        }
                    }
                    elseif($request->selected_payment_gateway === 'zitopay'){
                        try {
                            return PaymentGatewayRequestHelper::zitopay()->charge_customer($this->buildPaymentArg($total,$transaction_fee,$title,$description,$last_package_id,$email,$name,$user_type,route('freelancer.bp.zitopay.ipn.package')));
                        }catch (\Exception $e){
                            toastr_error($e->getMessage());
                            return back();
                        }
                    }
                    elseif($request->selected_payment_gateway === 'toyyibpay'){
                        try {
                            return PaymentGatewayRequestHelper::toyyibpay()->charge_customer($this->buildPaymentArg($total,$transaction_fee,$title,$description,$last_package_id,$email,$name,$user_type,route('freelancer.bp.toyyibpay.ipn.package')));
                        }catch (\Exception $e){
                            toastr_error($e->getMessage());
                            return back();
                        }
                    }
                    elseif($request->selected_payment_gateway === 'authorize_dot_net'){
                        try {
                            return PaymentGatewayRequestHelper::authorizenet()->charge_customer($this->buildPaymentArg($total,$transaction_fee,$title,$description,$last_package_id,$email,$name,$user_type,route('freelancer.bp.authorize.ipn.package')));
                        }catch (\Exception $e){
                            toastr_error($e->getMessage());
                            return back();
                        }
                    }
                    elseif($request->selected_payment_gateway === 'pagali'){
                        try {
                            return PaymentGatewayRequestHelper::pagalipay()->charge_customer($this->buildPaymentArg($total,$transaction_fee,$title,$description,$last_package_id,$email,$name,$user_type,route('freelancer.bp.pagali.ipn.package')));
                        }catch (\Exception $e){
                            toastr_error($e->getMessage());
                            return back();
                        }
                    }
                    elseif($request->selected_payment_gateway === 'sitesway'){
                        try {
                            return PaymentGatewayRequestHelper::sitesway()->charge_customer($this->buildPaymentArg($total,$transaction_fee,$title,$description,$last_package_id,$email,$name,$user_type,route('freelancer.bp.siteways.ipn.package')));
                        }catch (\Exception $e){
                            toastr_error($e->getMessage());
                            return back();
                        }
                    }
                    elseif($request->selected_payment_gateway === 'iyzipay'){
                        try {
                            return PaymentGatewayRequestHelper::iyzipay()->charge_customer($this->buildPaymentArg($total,$transaction_fee,$title,$description,$last_package_id,$email,$name,$user_type,route('freelancer.bp.iyzipay.ipn.package')));
                        }catch (\Exception $e){
                            toastr_error($e->getMessage());
                            return back();
                        }
                    }
                }
            }
        }
    }

    private function buildPaymentArg($total,$transaction_fee,$title,$description,$last_package_id,$email,$name,$user_type,$ipn_route)
    {
        return [
            'amount' => $total,
            'transaction_dee' => $transaction_fee,
            'title' => $title,
            'description' => $description,
            'ipn_url' => $ipn_route,
            'order_id' => $last_package_id,
            'track' => \Str::random(36),
            'cancel_url' => route(self::CANCEL_ROUTE,$last_package_id),
            'success_url' => route($user_type.'.'.'profile.details',auth()->user()->username),
            'email' => $email,
            'name' => $name,
            'payment_type' => 'Promotion',
        ];
    }

    //send email
    private function sendEmail($name,$last_package_id,$email)
    {
        //Send purchase package email to admin
        try {
            $message = get_static_option('user_promote_package_purchase_message_admin') ?? __('A user just purchase a promotion package.');
            $message = str_replace(["@package_id"],[$last_package_id], $message);
            Mail::to(get_static_option('site_global_email'))->send(new BasicMail([
                'subject' => get_static_option('user_promote_package_purchase_subject_admin') ?? __('Promotion package purchase email'),
                'message' => $message
            ]));
        } catch (\Exception $e) {}

        //Send purchase package email to user
        try {
            $message = get_static_option('user_promote_package_purchase_message') ?? __('Your promotion package purchase successfully completed.');
            $message = str_replace(["@name","@package_id"],[$name, $last_package_id], $message);
            Mail::to($email)->send(new BasicMail([
                'subject' => get_static_option('user_promote_package_purchase_subject') ?? __('Promotion package purchase email'),
                'message' => $message
            ]));
        } catch (\Exception $e) {}
    }

    //admin notification
    private function adminNotification($last_package_id,$user_id)
    {
        AdminNotification::create([
            'identity'=>$last_package_id,
            'user_id'=>$user_id,
            'type'=>__('Buy Package'),
            'message'=>__('Promotion package purchase'),
        ]);
    }

}
