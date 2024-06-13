<?php

use Illuminate\Support\Facades\Route;

//admin route
Route::group(['as'=>'admin.','prefix'=>'admin/promotion','middleware' => ['auth:admin','setlang']],function(){

    Route::group(['prefix'=>'project'],function(){
        Route::controller(\Modules\PromoteFreelancer\Http\Controllers\Backend\ProjectPromoteController::class)->group(function () {
            Route::match(['get','post'],'promote-settings','promote_settings')->name('project.promote.settings');
            Route::post('change-promote-status/{id}','change_status')->name('project.promote.settings.status');
            Route::post('delete-promote-settings/{id}','delete_settings')->name('project.promote.settings.delete');
            Route::post('edit-promote-settings','edit_promote_settings')->name('project.promote.settings.edit');
            Route::get('paginate-promote-settings','paginate_promote_settings')->name('project.promote.settings.paginate');
        });
    });

    Route::group(['prefix'=>'project/promoted'],function(){
        Route::controller(\Modules\PromoteFreelancer\Http\Controllers\Backend\PromotedProjectListController::class)->group(function () {
            Route::match(['get','post'],'list','promoted_list')->name('project.promoted.list');
            Route::post('change-payment-status','change_payment_status')->name('project.promote.payment.status');
            Route::post('delete-project-promotion/{id}','delete_project_promotion')->name('project.promote.delete');
            Route::get('search-project-promotion','search_project_promotion')->name('project.promote.search');
            Route::get('paginate-project-promotion','paginate_project_promotion')->name('project.promote.paginate');
        });
    });

    Route::group(['prefix'=>'profile/promoted'],function(){
        Route::controller(\Modules\PromoteFreelancer\Http\Controllers\Backend\PromotedProfileListController::class)->group(function () {
            Route::match(['get','post'],'list','promoted_list')->name('profile.promoted.list');
            Route::post('change-payment-status','change_payment_status')->name('profile.promote.payment.status');
            Route::post('delete-profile-promotion/{id}','delete_profile_promotion')->name('profile.promote.delete');
            Route::get('search-profile-promotion','search_profile_promotion')->name('profile.promote.search');
            Route::get('paginate-profile-promotion','paginate_profile_promotion')->name('profile.promote.paginate');
        });
    });

    Route::group(['prefix'=>'transaction'],function(){
        Route::controller(\Modules\PromoteFreelancer\Http\Controllers\Backend\PromoteTransactionFeeController::class)->group(function () {
            Route::match(['get','post'],'fee-settings','fee_settings')->name('promote.transaction.fee.settings');
        });
    });

    Route::group(['prefix'=>'email-settings'],function(){
        Route::controller(\Modules\PromoteFreelancer\Http\Controllers\Backend\PromoteEmailSettingsController::class)->group(function () {
            Route::match(['get','post'],'buy-package-email-to-admin','buy_package_admin_email_settings')->name('promote.package.email.settings.to.admin');
            Route::match(['get','post'],'buy-package-email-to-user','buy_package_user_email_settings')->name('promote.package.email.settings.to.user');
            Route::match(['get','post'],'buy-package-complete-manual-payment-email-to-user','buy_package_manual_payment_complete_email_settings')->name('promote.package.manual.payment.pending.to.complete');
        });
    });

});

//freelancer route
Route::group(['prefix'=>'freelancer/buy-package','as'=>'freelancer.','middleware'=>['auth','userEmailVerify','Google2FA','globalVariable', 'maintains_mode','setlang']],function() {

        Route::controller(\Modules\PromoteFreelancer\Http\Controllers\Freelancer\BuyPromotePackageController::class)->group(function (){
            Route::post('promote', 'buy_package')->name('package.buy');
            Route::get('promote/cancel-static', 'promote_payment_cancel_static')->name('package.buy.payment.cancel.static');
        });

        // ipn routes
        Route::group(['prefix' => 'buy-promote-package','as'=>'bp.'],function(){
            Route::controller(\Modules\PromoteFreelancer\Http\Controllers\Freelancer\BuyPromotePackageIPNController::class)->group(function () {
            Route::get('paypal/ipn','paypal_ipn_for_promotion')->name('paypal.ipn.package');
            Route::post('paytm/ipn','paytm_ipn_for_promotion')->name('paytm.ipn.package');
            Route::get('paystack/ipn','paystack_ipn_for_promotion')->name('paystack.ipn.package');
            Route::get('mollie/ipn','mollie_ipn_for_promotion')->name('mollie.ipn.package');
            Route::get('stripe/ipn','stripe_ipn_for_promotion')->name('stripe.ipn.package');
            Route::post('razorpay/ipn','razorpay_ipn_for_promotion')->name('razorpay.ipn.package');
            Route::get('flutterwave/ipn','flutterwave_ipn_for_promotion')->name('flutterwave.ipn.package');
            Route::get('midtrans/ipn','midtrans_ipn_for_promotion')->name('midtrans.ipn.package');
            Route::get('payfast/ipn','payfast_ipn_for_promotion')->name('payfast.ipn.package');
            Route::post('cashfree/ipn','cashfree_ipn_for_promotion')->name('cashfree.ipn.package');
            Route::get('instamojo/ipn','instamojo_ipn_for_promotion')->name('instamojo.ipn.package');
            Route::get('marcadopago/ipn','marcadopago_ipn_for_promotion')->name('marcadopago.ipn.package');
            Route::get('squareup/ipn','squareup_ipn_for_promotion' )->name('squareup.ipn.package');
            Route::post('cinetpay/ipn', 'cinetpay_ipn_for_promotion' )->name('cinetpay.ipn.package');
            Route::post('paytabs/ipn','paytabs_ipn_for_promotion' )->name('paytabs.ipn.package');
            Route::post('billplz/ipn','billplz_ipn_for_promotion' )->name('billplz.ipn.package');
            Route::post('zitopay/ipn','zitopay_ipn_for_promotion' )->name('zitopay.ipn.package');
            Route::post('toyyibpay/ipn','toyyibpay_ipn_for_promotion' )->name('toyyibpay.ipn.package');
            Route::get('authorize/ipn','authorizenet_ipn_for_promotion' )->name('authorize.ipn.package');
            Route::post('pagali/ipn','pagali_ipn_for_promotion' )->name('pagali.ipn.package');
            Route::post('siteways/ipn','siteways_ipn_for_promotion' )->name('siteways.ipn.package');
            Route::post('iyzipay/ipn','iyzipay_ipn_for_promotion' )->name('iyzipay.ipn.package');
        });
    });

        // promoted list routes
        Route::controller(\Modules\PromoteFreelancer\Http\Controllers\Freelancer\PromotedListController::class)->group(function () {
            Route::get('promoted/list','promoted_list')->name('promoted.list');
        });
});



