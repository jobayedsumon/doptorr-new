<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Project;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Chat\Entities\LiveChat;

class ProjectWithFilterController extends Controller
{
    private $current_date;
    public function __construct()
    {
        $this->current_date = \Carbon\Carbon::now()->toDateTimeString();
    }

    //all projects
    public function projects(Request $request)
    {
        $projects = $this->common_query($request)->paginate(10)->withQueryString();
        if($projects){
            return response()->json([
                'projects' => $projects,
                'project_file_path' => asset('assets/uploads/project/'),
            ]);
        }
        return response()->json(['msg' => __('no projects found.')]);
    }

    //projects filter
    public function projects_filter(Request $request)
    {
        if(!empty($request->country) || !empty($request->type) || !empty($request->level) || !empty($request->min_price) || !empty($request->max_price) || !empty($request->duration) || !empty($request->rating) || !empty($request->title)) {
            $projects = $this->filter_query($request)->withCount('complete_orders')
                ->paginate(10)
                ->withQueryString();
            if ($projects) {
                return response()->json([
                    'projects' => $projects,
                    'project_file_path' => asset('assets/uploads/project/'),
                ]);
            }
            return response()->json(['msg' => __('no projects found.')]);
        }else{
            $projects = $this->common_query($request)->withCount(['complete_orders','ratings'])->withAvg('ratings','rating')
                ->paginate(10)
                ->withQueryString();
            if ($projects) {
                return response()->json([
                    'projects' => $projects,
                    'project_file_path' => asset('assets/uploads/project/'),
                ]);
            }
        }
    }

    //common query
    private function common_query($request)
    {
        if($request->get_pro_projects == 1){
            return Project::query()->with(['project_creator','project_attributes'])
                ->whereHas('project_creator')
                ->select(['id', 'title','slug','user_id','basic_regular_charge','basic_discount_charge','basic_delivery','description','image'])
                ->where('project_on_off','1')
                ->where('pro_expire_date','>',$this->current_date)
                ->where('is_pro','yes')
                ->latest()
                ->where('status','1');
        }else{
            return Project::query()->with(['project_creator','project_attributes'])
                ->whereHas('project_creator')
                ->select(['id', 'title','slug','user_id','basic_regular_charge','basic_discount_charge','basic_delivery','description','image'])
                ->where('project_on_off','1')
                ->latest()
                ->where('status','1');
        }
    }

    //filter query
    private function filter_query($request)
    {
        $query = $this->common_query($request);

        if(!empty($request->country)){
            $query = $query->whereHas('project_creator',function($q) use($request){
                $q->where('country_id',$request->country);
            });
        }

        if(!empty($request->level)){
            $query = $query->whereHas('project_creator',function($q) use($request){
                $q->where('experience_level',$request->level);
            });
        }

        if(!empty($request->min_price) && !empty($request->max_price)){
            $query = $query->whereBetween('basic_regular_charge',[$request->min_price,$request->max_price]);
        }

        if(!empty($request->duration)){
            $query = $query->where('basic_delivery',$request->duration);
        }

        if(!empty($request->rating)){
            $query = $query->withAvg(['ratings' => function ($query){
                $query->where('sender_id', 1);
            }],'rating')
                ->having('ratings_avg_rating',">", $request->rating -1)
                ->having('ratings_avg_rating',"<=", $request->rating);
        }
        if(!empty($request->category)){
            $query = $query->where('category_id',$request->category);
        }

        if(!empty($request->subcategory)){
            $query = $query->whereHas('project_sub_categories',function($q) use($request){
                $q->where('sub_categories.id',$request->subcategory);
            });
        }

        if(!empty($request->title)){
            $query = $query->where('title','LIKE','%'.strip_tags($request->title).'%');
        }

        return $query;
    }

    //project details
    public function project_details($id)
    {
        $project_details = Project::with([
            'project_creator:id,first_name,last_name,experience_level,image,username,check_online_status,check_work_availability,user_active_inactive_status,user_verified_status,country_id,state_id',
            'project_attributes'
        ])
            ->withCount('complete_orders','ratings')
            ->where('id', $id)
            ->first();

        $chat_id = '';
        if(auth('sanctum')->check()){
            $client_id = auth('sanctum')->user()->id;
            $chat_id = LiveChat::select('id','freelancer_id','client_id')->where('freelancer_id',$project_details->user_id)->where('client_id',$client_id)->first();
        }

        $complete_orders_count = Order::where('freelancer_id',$project_details->user_id)->where('status',3)->count();
        $complete_orders = Order::select('id', 'identity', 'status')->whereHas('user')->whereHas('rating')
            ->where('freelancer_id', $project_details->user_id)
            ->where('status', 3)
            ->where('is_project_job', 'project')
            ->where('identity', $id)
            ->latest()
            ->get();

        $total_rating = 0;
        foreach ($complete_orders as $order){
            $rating = Rating::where('order_id', $order->id)->where('sender_type', 1)->first();
            $total_rating = $total_rating+$rating->rating;
        }

        $total_rating >=1 ? $avg_rating = $total_rating/$complete_orders->count() : $avg_rating = '';


        //freelancer rating
        $freel_complete_orders = Order::select('id','identity','status')->where('freelancer_id',$project_details->user_id)->where('status',3)->get();
        $count = 0;
        $freel_rating_count = 0;
        $freel_total_rating = 0;
        foreach($freel_complete_orders as $order){
            $freel_rating = Rating::where('order_id',$order->id)->where('sender_type',1)->first();
            if($freel_rating){
                $freel_total_rating = $freel_total_rating+$freel_rating->rating;
                $count = $count+1;
                $freel_rating_count = $freel_rating_count+1;
            }
        }

        $freel_avg_rating = $count > 0 ? $freel_total_rating/$count : 0;

        if($project_details){
            return response()->json([
                'project_details' => $project_details,
                'project_file_path' => asset('assets/uploads/project/'),
                'freelancer_title' => $project_details?->project_creator?->user_introduction?->title,
                'country' => $project_details?->project_creator?->user_country?->country,
                'state' => $project_details?->project_creator?->user_state?->state,
                'complete_orders_count' => $complete_orders_count,
                'rating' => $avg_rating,
                'freelancer_avg_rating' => round($freel_avg_rating,1),
                'freelancer_total_rating' => $freel_rating_count,
                'chat_info' => $chat_id,
            ]);
        }
        return response()->json(['msg' => __('no projects found.')]);
    }
}