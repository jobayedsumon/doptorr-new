<?php

namespace Modules\PromoteFreelancer\Http\Controllers\Backend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PromoteEmailSettingsController extends Controller
{
    public function buy_package_user_email_settings(Request $request)
    {
        if($request->isMethod('post')){
            $request->validate([
                'user_promote_package_purchase_subject'=>'required|min:5|max:100',
                'user_promote_package_purchase_message'=>'required|min:10|max:1000',
            ]);
            $fields = [
                'user_promote_package_purchase_subject',
                'user_promote_package_purchase_message',
            ];
            foreach ($fields as $field) {
                update_static_option($field, $request->$field);
            }
            toastr_success(__('Update Success'));
            return back();
        }
        return view('promotefreelancer::backend.email.user-promote-package-email');
    }

    public function buy_package_admin_email_settings(Request $request)
    {
        if($request->isMethod('post')){
            $request->validate([
                'user_promote_package_purchase_subject_admin'=>'required|min:5|max:100',
                'user_promote_package_purchase_message_admin'=>'required|min:10|max:1000',
            ]);
            $fields = [
                'user_promote_package_purchase_subject_admin',
                'user_promote_package_purchase_message_admin',
            ];
            foreach ($fields as $field) {
                update_static_option($field, $request->$field);
            }
            toastr_success(__('Update Success'));
            return back();
        }
        return view('promotefreelancer::backend.email.user-promote-package-email-to-admin');
    }

    public function buy_package_manual_payment_complete_email_settings(Request $request)
    {
        if($request->isMethod('post')){
            $request->validate([
                'user_promote_package_manual_payment_complete_subject'=>'required|min:5|max:100',
                'user_promote_package_manual_payment_complete_message'=>'required|min:10|max:1000',
            ]);
            $fields = [
                'user_promote_package_manual_payment_complete_subject',
                'user_promote_package_manual_payment_complete_message',
            ];
            foreach ($fields as $field) {
                update_static_option($field, $request->$field);
            }
            toastr_success(__('Update Success'));
            return back();
        }
        return view('promotefreelancer::backend.email.user-promote-package-manual-payment-complete-email');
    }


}
