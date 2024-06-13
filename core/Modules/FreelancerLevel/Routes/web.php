<?php

Route::group(['as'=>'admin.','prefix'=>'admin/freelancer','middleware' => ['auth:admin','setlang']],function() {
    Route::group(['prefix' => 'level'], function () {
        Route::controller(\Modules\FreelancerLevel\Http\Controllers\FreelancerLevelController::class)->group(function () {
            Route::match(['get', 'post'], 'all-level', 'all_level')->name('level.all');
            Route::post('edit-level/{id?}', 'edit_level')->name('level.edit');
            Route::post('change-status/{id}', 'change_status_level')->name('level.status');
            Route::post('delete/{id}', 'delete_level')->name('level.delete');
            Route::post('level/rules/setup', 'rule_setup')->name('rule.setup');
            Route::match(['get','post'],'level/badge/settings', 'profile_page_badge_settings')->name('profile.page.badge');
        });
    });
});