<?php

namespace Modules\PromoteFreelancer\Entities;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PromotionProjectList extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','identity','type','project','profile','proposal','package_id','price','transaction_fee','duration','expire_date','payment_gateway','payment_status','status','transaction_id','manual_payment_image','impression','click','country','is_valid_payment'];
    
    protected static function newFactory()
    {
        return \Modules\PromoteFreelancer\Database\factories\PromotionProjectListFactory::new();
    }
    public function project()
    {
        return $this->belongsTo(Project::class,'identity','id');
    }

    public function package()
    {
        return $this->belongsTo(ProjectPromoteSettings::class,'package_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
