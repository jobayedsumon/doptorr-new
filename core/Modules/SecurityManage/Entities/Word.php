<?php

namespace Modules\SecurityManage\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Word extends Model
{
    use HasFactory;

    protected $fillable = ['word','status'];
    
    protected static function newFactory()
    {
        return \Modules\SecurityManage\Database\factories\WordFactory::new();
    }
}
