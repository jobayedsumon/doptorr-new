<?php

namespace Modules\SecurityManage\Http\Controllers\Backend;

use GeoIp2\Database\Reader;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SecurityManage\Entities\LogActivity;

class LogActivityController extends Controller
{
    //all words
    public function all_log()
    {
        $logs = LogActivity::latest()->paginate(10);
        return view('securitymanage::backend.log-history.all-logs',compact('logs'));
    }
    // delete single log
    public function delete_log($id)
    {
        $log = LogActivity::find($id);
        if($log){
            $log->delete();
            return redirect()->back()->with(toastr_success(__('Log History Successfully Deleted')));
        }
    }

    // delete multi word
    public function bulk_action_log(Request $request){
        foreach($request->ids as $log_id){
            $log = LogActivity::find($log_id);
            if($log){
                $log->delete();
            }
        }
        return back()->with(toastr_success(__('Selected Log Successfully Deleted')));
    }

    // pagination
    function pagination(Request $request)
    {
        if($request->ajax()){
            $logs = LogActivity::latest()->paginate(10);
            return view('securitymanage::backend.log-history.search-result',compact('logs'));
        }
    }

    // search word
    public function search_log(Request $request)
    {
        $logs= LogActivity::where('subject', 'LIKE', "%". strip_tags($request->string_search) ."%")->paginate(10);
        return $logs->total() >= 1 ? view('securitymanage::backend.log-history.search-result', compact('logs'))->render() : response()->json(['status'=>__('nothing')]);
    }
}
