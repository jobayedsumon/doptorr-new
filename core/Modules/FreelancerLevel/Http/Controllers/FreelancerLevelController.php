<?php

namespace Modules\FreelancerLevel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Modules\FreelancerLevel\Entities\FreelancerLevel;
use Modules\FreelancerLevel\Entities\FreelancerLevelRules;

class FreelancerLevelController extends Controller
{
    public function all_level(Request $request)
    {
        if($request->isMethod('post')){

            $request->validate([
                'level'=> 'required|unique:freelancer_levels|max:191',
            ]);
            FreelancerLevel::create([
                'level' => $request->level,
                'status' => $request->status,
                'image' => $request->image,
            ]);
            toastr_success(__('New Level Successfully Added'));
        }
        $all_levels = FreelancerLevel::with('level_rule')->latest()->get();
        return view('freelancerlevel::level.all-level',compact('all_levels'));
    }

    public function change_status_level($id)
    {
        $level = FreelancerLevel::select('status')->where('id',$id)->first();
        $level->status==1 ? $status=0 : $status=1;
        FreelancerLevel::where('id',$id)->update(['status'=>$status]);
        return redirect()->back()->with(toastr_success(__('Status Successfully Changed')));
    }

    public function edit_level(Request $request)
    {
        $request->validate([
            'edit_level'=> 'required|max:191|unique:freelancer_levels,level,'.$request->level_id,
        ]);
        FreelancerLevel::where('id',$request->level_id)->update([
            'level'=>$request->edit_level,
            'image'=>$request->image,
        ]);
        return redirect()->back()->with(toastr_success(__('Level Successfully Updated')));
    }

    public function delete_level($id)
    {
        $level = FreelancerLevel::find($id);
        $level->level_rule()->delete();
        $level->delete();
        return redirect()->back()->with(toastr_error(__('Level Successfully Deleted')));
    }

    //set rules
    public function rule_setup(Request $request)
    {
        $request->validate([
            'period' => 'required|unique:freelancer_level_rules,period,'.$request->rule_id,
            'avg_rating' => 'required|max:5|min:1',
            'earning' => 'required',
            'complete_order' => 'required',
        ]);

        FreelancerLevelRules::updateOrCreate([
            'id' => $request->rule_id
        ],[
            'freelancer_level_id' => $request->level_id,
            'period' => $request->period,
            'avg_rating' => $request->avg_rating,
            'earning' => $request->earning,
            'complete_order' => $request->complete_order,
        ]);

        return redirect()->back()->with(toastr_success(__('Level Rule Successfully Setup')));
    }

    //profile page badge settings
    public function profile_page_badge_settings(Request $request)
    {
        if($request->isMethod('post')){
            $request->validate(['profile_page_badge_settings' => 'required']);
            $all_fields = ['profile_page_badge_settings'];

            foreach ($all_fields as $field) {
                update_static_option($field, $request->$field);
            }
            toastr_success(__('Badge Settings Updated Successfully.'));
            return back();
        }
        return view('freelancerlevel::level.badge-settings');
    }
}
