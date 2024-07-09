<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use App\Models\Skill;
use Illuminate\Http\Request;
use Modules\Service\Entities\Category;

class SkillJobController extends Controller
{
    public function skill_jobs($name=null)
    {

        $skill = Skill::select('id','skill')->where('skill',$name)->first();

        $jobs =$skill?->jobs()
            ->where('on_off','1')
            ->where('status','1')
            ->withCount('job_proposals')
            ->where('job_approve_request','1')
            ->latest()
            ->paginate(10);

       return view ('frontend.pages.skill-jobs.jobs',compact(['jobs','skill']));
    }

    public function skill_jobs_filter(Request $request)
    {
        if($request->ajax()){
            $skill = Skill::select('id','skill')->where('id',$request->skill)->first();

            $jobs =$skill->jobs()
                ->where('on_off','1')
                ->where('status','1')
                ->withCount('job_proposals')
                ->latest()
                ->where('job_approve_request','1');

            if(isset($request->country) && !empty($request->country)){
                $jobs = $jobs->WhereHas('job_creator',function($q) use($request){
                    $q->where('country_id',$request->country);
                });
            }
            if(isset($request->type) && !empty($request->type)){
                $jobs = $jobs->where('type',$request->type);
            }
            if(isset($request->level) && !empty($request->level)){
                $jobs = $jobs->WhereHas('job_creator',function($q) use($request){
                    $q->where('level',$request->level);
                });
            }
            if(isset($request->min_price) && isset($request->max_price)  && !empty($request->min_price) && !empty($request->max_price)){
                $jobs = $jobs->whereBetween('budget',[$request->min_price,$request->max_price]);
            }
            if(isset($request->duration) && !empty($request->duration)){
                $jobs = $jobs->where('duration',$request->duration);
            }

            $jobs = $jobs->paginate(10);
            return $jobs->total() >= 1 ? view('frontend.pages.skill-jobs.search-job-result', compact('jobs'))->render() : response()->json(['status'=>__('nothing')]);
        }
    }

    public function pagination(Request $request)
    {
        if($request->ajax()){
            $skill = Skill::select('id','skill')->where('id',$request->skill)->first();

            $jobs =$skill->jobs()
                ->where('on_off','1')
                ->where('status','1')
                ->withCount('job_proposals')
                ->where('job_approve_request','1');

            if($request->country == '' && $request->type == '' && $request->level == '' && $request->min_price == '' && $request->max_price == '' && $request->duration == '')
            {
                $jobs = $jobs;
            }
            else
            {
                if(isset($request->country) && !empty($request->country)){
                    $jobs = $jobs->WhereHas('job_creator',function($q) use($request){
                        $q->where('country_id',$request->country);
                    });
                }
                if(isset($request->type) && !empty($request->type)){
                    $jobs = $jobs->where('type',$request->type);
                }
                if(isset($request->level) && !empty($request->level)){
                    $jobs = $jobs->WhereHas('job_creator',function($q) use($request){
                        $q->where('level',$request->level);
                    });
                }
                if(isset($request->min_price) && isset($request->max_price)  && !empty($request->min_price) && !empty($request->max_price)){
                    $jobs = $jobs->whereBetween('budget',[$request->min_price,$request->max_price]);
                }
                if(isset($request->duration) && !empty($request->duration)){
                    $jobs = $jobs->where('duration',$request->duration);
                }
            }
            $jobs = $jobs->paginate(10);
            return $jobs->total() >= 1 ? view('frontend.pages.skill-jobs.search-job-result', compact('jobs'))->render() : response()->json(['status'=>__('nothing')]);
        }
    }

    //reset jobs filter
    public function reset(Request $request)
    {
        $skill = Skill::select('id','skill')->where('id',$request->skill)->first();

        $jobs =$skill->jobs()
            ->where('on_off','1')
            ->where('status','1')
            ->withCount('job_proposals')
            ->where('job_approve_request','1')
            ->latest()
            ->paginate(10);

        return $jobs->total() >= 1 ? view('frontend.pages.skill-jobs.search-job-result',compact('jobs'))->render() : response()->json(['status'=>__('nothing')]);
    }
}
