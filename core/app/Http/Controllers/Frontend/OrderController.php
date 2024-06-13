<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Services\Frontend\OrderService;
use App\Models\IndividualCommissionSetting;
use App\Models\JobPost;
use App\Models\JobProposal;
use App\Models\Order;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Chat\Entities\Offer;

class OrderController extends Controller
{
    //user login
    public function user_login(Request $request)
    {
         return (new OrderService())->user_login($request);
    }

    //order cancel page
    public function order_payment_cancel_static()
    {
        return view('frontend.pages.order.cancel');
    }

    //confirm order
    public function user_order_confirm(Request $request)
    {
        $all_gateway = ['wallet', 'shurjopay', 'paypal','manual_payment','mollie','paytm','stripe','razorpay','flutterwave','paystack','marcadopago','instamojo','cashfree','payfast','midtrans','squareup','cinetpay','paytabs','billplz','zitopay','sitesway','toyyibpay','authorize_dot_net'];
        if(empty($request->selected_payment_gateway)){
            return back()->with(toastr_warning(__('Please select a payment gateway before place an order2')));
        }
        if (!in_array($request->selected_payment_gateway, $all_gateway)) {
            return back()->with(toastr_warning(__('Please select a payment gateway before place an order')));
        }

        $project = Project::where('id',$request->project_id)->first();
        $job = JobPost::where('id',$request->job_id_for_order)->first();
        $offer = Offer::with('milestones')->where('id',$request->offer_id_for_order)->first();

        if($project) {
            if ($request->basic_standard_premium_type === $project->basic_title) {
                $type = $project->basic_title;
                $revision = $project->basic_revision;
                $delivery = $project->basic_delivery;
                $price = $project->basic_discount_charge ?? $project->basic_regular_charge;
            }
            if ($request->basic_standard_premium_type === $project->standard_title) {
                $type = $project->standard_title;
                $revision = $project->standard_revision;
                $delivery = $project->standard_delivery;
                $price = $project->standard_discount_charge ?? $project->standard_regular_charge;
            }
            if ($request->basic_standard_premium_type === $project->premium_title) {
                $type = $project->premium_title;
                $revision = $project->premium_revision;
                $delivery = $project->premium_delivery;
                $price = $project->premium_discount_charge ?? $project->premium_regular_charge;
            }

            $project_or_job = 'project';
            $freelancer_id = $project->user_id;

        }else{
            if($job){
                $proposal = JobProposal::select(['id','freelancer_id','amount','duration','revision'])->where('id',$request->proposal_id_for_order)->first();
                $price = $proposal->amount;
                $type = 'job';
                $revision = $proposal->revision;
                $delivery = $proposal->duration;
                $project_or_job = 'job';
                $freelancer_id = $proposal->freelancer_id;
            }
            if($offer){
                $price = $offer->price;
                $type = 'offer';
                $revision = $offer->revision;
                $delivery = $offer->deadline;
                $project_or_job = 'offer';
                $freelancer_id = $offer->freelancer_id;
            }
        }
            if(Auth::guard('web')->check()){
                $client_id = auth()->user()->id;
            }

            $commission_type = get_static_option('admin_commission_type') ?? 'percentage';
            $commission_charge = get_static_option('admin_commission_charge') ?? 25;
            $transaction_type = get_static_option('transaction_fee_type');
            $transaction_charge = get_static_option('transaction_fee_charge') ?? 0;

            //commission and transaction amount calculate
            $user = User::select('id','first_name','last_name','email')->where('id',$freelancer_id)->first();
            $individual_commission = IndividualCommissionSetting::select(['user_id','admin_commission_type','admin_commission_charge'])->where('user_id',$user->id)->first();
            $commission_amount = commission_amount($price,$individual_commission,$commission_type,$commission_charge);
            $transaction_amount = transaction_amount($price,$transaction_type,$transaction_charge);

            //user payable amount calculate
            $payable_amount = $price - $commission_amount;
            $payment_status = $request->selected_payment_gateway === 'wallet' ? 'complete' : 'pending';

            $pay_by_milestone = $request->pay_by_milestone;
            if(!empty($pay_by_milestone) && $pay_by_milestone === 'pay-by-milestone'){
                $request->validate([
                    'milestone_title.*' => 'required|max:100',
                    'milestone_description.*' => 'required|max:1000',
                    'milestone_price.*' => 'required',
                    'milestone_revision.*' => 'required',
                    'milestone_deadline.*' => 'required',
                ]);

                $milestone_price = 0;
                foreach($request->milestone_price as $key => $attr) {$milestone_price += $request->milestone_price[$key];}
                if($milestone_price > $price || $milestone_price < $price){return back()->with(toastr_warning(__('Milestone price must be equal to original price')));}
            }


            //prevent multiple order.user can not create multiple order for same project if any order is pending.
            $check_client_order = Order::where('user_id',$client_id)->where('identity',$request->project_id)
                ->where('is_project_job','project')
                ->where('payment_status','complete')
                ->whereIn('status',[0,1])
                ->first();
            if($check_client_order){
                return back()->with(toastr_warning(__('You can not create one more order until your pending or active order complete.')));
            }

            if($request->selected_payment_gateway == 'manual_payment')
            {
                $request->validate(['manual_payment_image' => 'required|mimes:jpg,jpeg,png,pdf']);
                return (new OrderService())->manual_order($request, $client_id, $user->id, $project_or_job, $type, $revision, $delivery, $price, $commission_type, $commission_charge, $commission_amount, $transaction_type, $transaction_charge, $payable_amount, $payment_status);
            }

            elseif($request->selected_payment_gateway == 'wallet')
            {
                $wallet_amount = Auth::guard('web')->user()->user_wallet?->balance ?? 0;
                if($price > $wallet_amount){return back()->with(toastr_warning(__('Wallet balance must be equal or greater than original price')));}
                return (new OrderService())->wallet_order($request, $client_id, $user->id, $project_or_job, $type, $revision, $delivery, $price, $commission_type, $commission_charge, $commission_amount, $transaction_type, $transaction_charge, $payable_amount, $payment_status,$wallet_amount);
            }
            else
            {
               return (new OrderService())->digital_payment_gateway_order($request, $client_id, $user->id, $project_or_job, $type, $revision, $delivery, ($price+$transaction_amount), $commission_type, $commission_charge, $commission_amount, $transaction_type, $transaction_charge, $transaction_amount, $payable_amount, $payment_status);
            }
    }

    public function user_order_success_page($id)
    {
        if(Auth::guard('web')->check()){
            $order_details = Order::find(substr($id,30,-30));
            return !empty($order_details) && $order_details->user_id == auth()->user()->id  ? view('frontend.pages.order.success',compact('order_details')) : back();
        }
    }

}
