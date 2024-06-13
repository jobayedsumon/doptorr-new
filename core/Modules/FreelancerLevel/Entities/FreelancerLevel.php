<?php

namespace Modules\FreelancerLevel\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FreelancerLevel extends Model
{
    use HasFactory;

    protected $fillable = ['level','status','image'];
    protected $casts = ['status'=>'integer'];
    
    protected static function newFactory()
    {
        return \Modules\FreelancerLevel\Database\factories\FreelancerLevelFactory::new();
    }

    public function level_rule()
    {
        return $this->hasOne(FreelancerLevelRules::class,'freelancer_level_id','id');
    }
}
