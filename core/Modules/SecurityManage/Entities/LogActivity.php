<?php

namespace Modules\SecurityManage\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LogActivity extends Model
{
    use HasFactory;

    protected $fillable = ['subject','url','method','ip','agent','type','user_id'];
    
    protected static function newFactory()
    {
        return \Modules\SecurityManage\Database\factories\LogActivityFactory::new();
    }
}