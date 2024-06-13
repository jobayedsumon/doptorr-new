<?php

namespace Modules\PromoteFreelancer\Http\Controllers\Backend;

use App\Mail\BasicMail;
use App\Models\AdminNotification;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Modules\PromoteFreelancer\Entities\PromotionProjectList;

class PromotedProfileListController extends Controller
{
    public function promoted_list()
    {
        $promoted_profile_packages = PromotionProjectList::with(['user:id,first_name,last_name,email','package:id,title,duration,budget'])
            ->where('type','profile')
            ->where('is_valid_payment','yes')
            ->latest()
            ->paginate(10);
        return view('promotefreelancer::backend.promoted-profile.promoted-profiles',compact('promoted_profile_packages'));
    }

    public function change_payment_status(Request $request)
    {
        $user_details = User::select(['id','email','first_name','last_name'])->where('id',$request->promoted_profile_user_id)->first();
        PromotionProjectList::where('id',$request->promoted_profile_list_id)->update(['payment_status'=>'complete']);

        //Send purchase package email to user
        try {
            $message = get_static_option('user_promote_package_manual_payment_complete_message') ?? __('Your promotion payment successfully completed.');
            $message = str_replace(["@name","@promotion_id"],[$user_details->first_name.' '.$user_details->last_name, $request->promoted_profile_list_id], $message);
            Mail::to($user_details->email)->send(new BasicMail([
                'subject' => get_static_option('user_promote_package_manual_payment_complete_subject') ?? __('Promotion Package Purchase Manual Payment Complete Email To User'),
                'message' => $message
            ]));
        } catch (\Exception $e) {}
        return back()->with(toastr_success(__('Payment status successfully updated')));
    }

    public function delete_profile_promotion($id)
    {
        AdminNotification::where('identity',$id)->where('type','Buy Package')->delete();
        PromotionProjectList::where('id',$id)->delete();
        return back()->with(toastr_success(__('Profile promotion successfully deleted')));
    }

    public function paginate_profile_promotion(Request $request)
    {
        if(empty($request->string_search)){
            $promoted_profile_packages = PromotionProjectList::with(['user:id,first_name,last_name,email','package:id,title,duration,budget'])
                ->where('type','profile')
                ->where('is_valid_payment','yes')
                ->latest()
                ->paginate(10);
        }else{
            $promoted_profile_packages = PromotionProjectList::with(['user:id,first_name,last_name,email','package:id,title,duration,budget'])
                ->where('type','profile')
                ->where('is_valid_payment','yes')
                ->where(function($q) use($request){
                    $q->orWhere('id', 'LIKE','%'. strip_tags($request->string_search) .'%')
                        ->orWhere('payment_status', 'LIKE', '%'. strip_tags($request->string_search) .'%')
                        ->orWhere('payment_gateway','LIKE', '%'. strip_tags($request->string_search).'%');
                })
                ->latest()
                ->paginate(10);
        }

        return $promoted_profile_packages->total() >= 1 ? view('promotefreelancer::backend.promoted-profile.search-result', compact('promoted_profile_packages'))->render() : response()->json(['status'=>__('nothing')]);
    }

    public function search_profile_promotion(Request $request)
    {
        $promoted_profile_packages = PromotionProjectList::with(['user:id,first_name,last_name,email','package:id,title,duration,budget'])
            ->where('type','profile')
            ->where('is_valid_payment','yes')
            ->where(function($q) use($request){
                $q->orWhere('id', 'LIKE','%'. strip_tags($request->string_search) .'%')
                    ->orWhere('payment_status', 'LIKE', '%'. strip_tags($request->string_search) .'%')
                    ->orWhere('payment_gateway','LIKE', '%'. strip_tags($request->string_search).'%');
            })
            ->latest()
            ->paginate(10);

        return $promoted_profile_packages->total() >= 1? view('promotefreelancer::backend.promoted-profile.search-result', compact('promoted_profile_packages'))->render() : response()->json(['status'=>__('nothing')]);
    }
}
