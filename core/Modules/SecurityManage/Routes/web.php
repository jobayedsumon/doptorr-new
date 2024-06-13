<?php

use Illuminate\Support\Facades\Route;
use Modules\SecurityManage\Http\Controllers\Backend\FreezeController;
use Modules\SecurityManage\Http\Controllers\Backend\LogActivityController;
use Modules\SecurityManage\Http\Controllers\Backend\SecurityWordSettingsController;

//admin route
Route::group(['as' => 'admin.', 'prefix' => 'admin/security', 'middleware' => ['auth:admin', 'setlang']], function () {

    Route::group(['prefix' => 'word-settings'], function () {
        Route::controller(SecurityWordSettingsController::class)->group(function () {
            Route::get('all-word', 'all_word')->name('word.all');
            Route::post('add-word', 'add_word')->name('word.add');
            Route::post('edit-word', 'edit_word')->name('word.edit');
            Route::post('word-status/{id}', 'change_status')->name('word.status');
            Route::post('delete-word/{id}', 'delete_word')->name('word.delete');
            Route::post('bulk-action', 'bulk_action_word')->name('word.delete.bulk.action');
            Route::get('paginate/data', 'pagination')->name('word.paginate.data');
            Route::get('search-word', 'search_word')->name('word.search');
        });
    });

    Route::group(['prefix' => 'log-history'], function () {
        Route::controller(LogActivityController::class)->group(function () {
            Route::get('all-logs', 'all_log')->name('log.all');
            Route::post('delete-word/{id}', 'delete_log')->name('log.delete');
            Route::post('bulk-action', 'bulk_action_log')->name('log.delete.bulk.action');
            Route::get('paginate/data', 'pagination')->name('log.paginate.data');
            Route::get('search-word', 'search_log')->name('log.search');
        });
    });

    Route::group(['prefix' => 'user'], function () {
        Route::controller(FreezeController::class)->group(function () {
            Route::post('freeze-withdrawal/{user_id}','freeze_withdrawal')->name('freelancer.withdrawal.freeze');
            Route::post('freeze-project/{user_id}','freeze_project')->name('freelancer.project.freeze');

            Route::post('freeze-job/{user_id}','freeze_job')->name('client.job.freeze');
            Route::post('freeze-new-order/{user_id}','freeze_new_order')->name('client.new.order.freeze');

            Route::post('freeze-chat/{user_id}','freeze_chat')->name('user.chat.freeze');
        });
    });
});





