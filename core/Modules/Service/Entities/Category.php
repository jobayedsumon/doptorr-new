<?php

namespace Modules\Service\Entities;

use App\Models\JobPost;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Blog\Entities\BlogPost;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['category','short_description','slug','status','image'];
    protected $casts = ['status'=>'integer'];

    protected static function newFactory()
    {
        return \Modules\Service\Database\factories\CategoryFactory::new();
    }

    public static function all_categories()
    {
        return self::select(['id','category','short_description','status','image'])->where('status',1)->get();
    }

    public function skills()
    {
        return $this->hasMany(Skill::class,'category_id');
    }

    public function sub_categories()
    {
        return $this->hasMany(SubCategory::class,'category_id','id')->select(['id','category_id','sub_category','slug'])->where('status','1');
    }

    public function projects()
    {
        return $this->hasMany(Project::class,'category_id','id')->select(['id','category_id','slug'])->where(['project_on_off'=>'1','project_approve_request'=>1,'status'=>'1']);
    }

    public function jobs()
    {
        return $this->hasMany(JobPost::class,'category','id')->select(['id','category','slug'])->where(['on_off'=>'1','status'=>'1']);
    }

    public function blogs()
    {
        return $this->hasMany(BlogPost::class,'category_id','id');
    }
}
