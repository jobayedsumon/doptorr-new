<?php

namespace Modules\PromoteFreelancer\Http\Controllers\Backend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\PromoteFreelancer\Entities\ProjectPromoteSettings;

class ProjectPromoteController extends Controller
{
    public function promote_settings(Request $request)
    {
        if($request->isMethod('Post')){
            $request->validate([
                'title' => 'required|unique:project_promote_settings|max:191',
                'status' => 'required',
                'duration' => 'required|gt:1',
                'budget' => 'required|gt:1',
            ]);

            ProjectPromoteSettings::create([
                'title' => $request->title,
                'duration' => $request->duration,
                'budget' => $request->budget,
                'status' => $request->status,
            ]);
            return back()->with(toastr_success(__('Settings Successfully Created')));
        }
        $all_settings = ProjectPromoteSettings::latest()->paginate(10);
        return view('promotefreelancer::backend.project-promote.settings.all-settings',compact('all_settings'));
    }

    public function change_status($id)
    {
        $settings = ProjectPromoteSettings::select('status')->where('id',$id)->first();
        $settings->status==1 ? $status=0 : $status=1;
        ProjectPromoteSettings::where('id',$id)->update(['status'=>$status]);
        return redirect()->back()->with(toastr_success(__('Status Successfully Changed')));
    }

    public function edit_promote_settings(Request $request)
    {
        $request->validate([
            'title'=> 'required|max:191|unique:project_promote_settings,title,'.$request->settings_id,
            'duration' => 'required|gt:1',
            'budget' => 'required|gt:1',
        ]);
        ProjectPromoteSettings::where('id',$request->settings_id)->update([
            'title'=>$request->title,
            'duration'=>$request->duration,
            'budget'=>$request->budget
        ]);
        return redirect()->back()->with(toastr_success(__('Settings Successfully Updated')));
    }

    public function paginate_promote_settings(Request $request)
    {
        if($request->ajax()){
            $all_settings = ProjectPromoteSettings::latest()->paginate(10);
            return view('promotefreelancer::backend.project-promote.settings.search-result',compact('all_settings'))->render();
        }
    }

    public function delete_settings($id)
    {
        ProjectPromoteSettings::find($id)->delete();
        return redirect()->back()->with(toastr_error(__('Settings Successfully Deleted')));
    }
}
