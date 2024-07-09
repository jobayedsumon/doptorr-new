<?php

namespace Modules\Chat\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Facades\Http;
use Modules\User\Entities\User;
use Modules\Vendor\Entities\Vendor;

class LiveChatMessage extends Model
{
    protected $fillable = [
        "live_chat_id",
        "from_user",
        "message",
        "file",
    ];

    protected $casts = [
        "message" => "json",
        "created_at" => "datetime",
        "updated_at" => "datetime",
        "is_seen" => "integer"
    ];

    public function liveChat(): BelongsTo
    {
        return $this->belongsTo(LiveChat::class,"live_chat_id","id");
    }

    public function client(): HasManyThrough
    {
        return $this->hasManyThrough(User::class,LiveChat::class,'live_chat_id','id','id','client_id');
    }

    public function freelancer(): HasManyThrough
    {
        return $this->hasManyThrough(User::class,LiveChat::class,'live_chat_id','id','id','freelancer_id');
    }

    //: this method will be return file path
    public function getFilePathAttribute(){
        return $this->file;
    }

    protected static function boot(): void
    {
        parent::boot();

        static::created(function ($modal){
            // first check who is the sender of this message if this is a customer, then send notification to the vendor
            // get vendor from the message
            $freelancer = $modal->liveChat->freelancer;
            $user = $modal->liveChat->client;

            // send notification to the vendor
            $notificationBody = [
                'title' => $modal->from_user == 1 ? $user->first_name : $freelancer->first_name,
                'id' => $modal->id,
                'body' => $modal->message,
                'file' => $modal->file,
                'description' => '',
                'type' => 'message',
                'sound' => 'default',
                'fcm_device' => '',
                'livechat' => $modal->liveChat
            ];

            $notification = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'key=' . get_static_option('firebase_server_key'),
            ])->post('https://fcm.googleapis.com/fcm/send', [
                'message' => [
                    'body' => 'subject',
                    'title' => 'title',
                ],
                'priority' => 'high',
                'data' => $notificationBody,
                'to' => $modal->from_user == 1 ? $freelancer->firebase_device_token : $user->firebase_device_token,
            ]);
//
//            \Log::info($notification);
//            \Log::info($freelancer->firebase_device_token);
//            \Log::info($user->firebase_device_token);

            // if sender is customer, then send notification to the customer app
        });
    }
}
