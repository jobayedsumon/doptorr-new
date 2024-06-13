<?php

namespace Modules\FreelancerLevel\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FreelancerLevelRules extends Model
{
    use HasFactory;

    protected $fillable = ['freelancer_level_id','period','avg_rating','earning','complete_order'];
    
    protected static function newFactory()
    {
        return \Modules\FreelancerLevel\Database\factories\FreelancerLevelRulesFactory::new();
    }
}
