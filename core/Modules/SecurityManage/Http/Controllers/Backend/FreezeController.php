<?php

namespace Modules\SecurityManage\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FreezeController extends Controller
{

    public function freeze_withdrawal($id)
    {
        $user = User::select(['id','freeze_withdraw'])->where('id',$id)->first();
        if($user){
            $user->freeze_withdraw == 'freeze' ? $is_withdrawal_freeze = 'unfreeze' : $is_withdrawal_freeze = 'freeze';
            User::where('id',$id)->update(['freeze_withdraw'=>$is_withdrawal_freeze]);
            return back()->with(toastr_success(__('Withdrawal Status Updated Successfully!')));
        }
        return back();
    }

    public function freeze_project($id)
    {
        $user = User::select(['id','freeze_project'])->where('id',$id)->first();
        if($user){
            $user->freeze_project == 'freeze' ? $is_project_freeze = 'unfreeze' : $is_project_freeze = 'freeze';
            User::where('id',$id)->update(['freeze_project'=>$is_project_freeze]);
            return back()->with(toastr_success(__('Project Freeze Status Updated Successfully!')));
        }
        return back();
    }

    public function freeze_job($id)
    {
        $user = User::select(['id','freeze_job'])->where('id',$id)->first();
        if($user){
            $user->freeze_job == 'freeze' ? $is_job_freeze = 'unfreeze' : $is_job_freeze = 'freeze';
            User::where('id',$id)->update(['freeze_job'=>$is_job_freeze]);
            return back()->with(toastr_success(__('Job Freeze Status Updated Successfully!')));
        }
        return back();
    }

    public function freeze_new_order($id)
    {
        $user = User::select(['id','freeze_order_create'])->where('id',$id)->first();
        if($user){
            $user->freeze_order_create == 'freeze' ? $is_order_freeze = 'unfreeze' : $is_order_freeze = 'freeze';
            User::where('id',$id)->update(['freeze_order_create'=>$is_order_freeze]);
            return back()->with(toastr_success(__('New Order Create Freeze Status Updated Successfully!')));
        }
        return back();
    }


    public function freeze_chat($id)
    {
        $user = User::select(['id','freeze_chat'])->where('id',$id)->first();
        if($user){
            $user->freeze_chat == 'freeze' ? $is_chat_freeze = 'unfreeze' : $is_chat_freeze = 'freeze';
            User::where('id',$id)->update(['freeze_chat'=>$is_chat_freeze]);
            return back()->with(toastr_success(__('Chat Freeze Status Updated Successfully!')));
        }
        return back();
    }
}
