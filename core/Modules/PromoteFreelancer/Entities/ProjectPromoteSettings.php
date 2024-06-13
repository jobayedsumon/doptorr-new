<?php

namespace Modules\PromoteFreelancer\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectPromoteSettings extends Model
{
    use HasFactory;

    protected $fillable = ['title','image','budget','duration','status'];
    
    protected static function newFactory()
    {
        return \Modules\PromoteFreelancer\Database\factories\ProjectPromoteSettingsFactory::new();
    }
}
