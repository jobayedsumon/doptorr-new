<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//admin

Route::group(['as'=>'admin.','prefix'=>'admin/news-letter','middleware' => ['auth:admin','setlang']],function (){
    Route::controller('AdminNewsLetterController')->group(function () {
        Route::get('/', 'index')->name('admin.newsletter')->permission("newsletter");
        Route::post('/delete/{id}', 'delete')->name('admin.newsletter.delete')->permission("newsletter-delete");
        Route::post('/single', 'send_mail')->name('admin.newsletter.single.mail')->permission("newsletter-single");
        Route::get('/all', 'send_mail_all_index')->name('admin.newsletter.mail')->permission("newsletter-all");
        Route::post('/all', 'send_mail_all')->permission("newsletter-all");
        Route::post('/new', 'add_new_sub')->name('admin.newsletter.new.add')->permission("newsletter-new");
        Route::post('/bulk-action', 'bulk_action')->name('admin.newsletter.bulk.action')->permission("newsletter-bulk-action");
        Route::post('/newsletter/verify-mail-send', 'verify_mail_send')->name('admin.newsletter.verify.mail.send')->permission("newsletter-newsletter-verify-mail-send");
    });
});


////user
Route::controller('NewsLetterController')->group(function () {
    Route::post('/news-letter/subscribe/by/user', 'subscribe')->name('newsletter.subscription');
    Route::get('/news-letter/user/email/verify/{token}','subscriber_verify')->name('newsletter.subscriber.verify');

//Unsubscribe Newsletter
//    Route::get('/newsletter/unsubscribe','FrontendController@newsletter_unsubscribe')->name('frontend.newsletter.unsubscribe');
});
