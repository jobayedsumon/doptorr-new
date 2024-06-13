<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Portfolio;
use App\Models\Project;
use App\Models\Rating;
use App\Models\Skill;
use App\Models\User;
use App\Models\UserEarning;
use App\Models\UserEducation;
use App\Models\UserExperience;
use App\Models\UserSkill;
use App\Models\UserWork;
use Illuminate\Http\Request;

class ProfileDetailsController extends Controller
{
    public function profile_details($username=null)
    {
        $user = User::with('user_introduction')->select(['id', 'image', 'hourly_rate', 'first_name', 'last_name', 'country_id', 'state_id', 'check_work_availability', 'user_verified_status'])->where('username', $username)->first();
        if ($user) {
            $user_work = UserWork::where('user_id', $user->id)->first();
            $total_earning = UserEarning::where('user_id', $user->id)->first();
            $complete_orders = Order::select('id', 'identity', 'status')->whereHas('user')->whereHas('rating')->where('freelancer_id', $user->id)->where('status', 3)->latest()->get();
            $active_orders_count = Order::where('freelancer_id', $user->id)->whereHas('user')->where('status', 1)->count();
            $skills_according_to_category = isset($user_work) ? Skill::select(['id', 'skill'])->where('category_id', $user_work->category_id)->get() : '';

            $skills = UserSkill::select('skill')->where('user_id', $user->id)->first()->skill ?? '';
            $portfolios = Portfolio::where('username', $username)->latest()->get();
            $educations = UserEducation::where('user_id', $user->id)->latest()->get();
            $experiences = UserExperience::where('user_id', $user->id)->latest()->get();
            $projects = Project::with('project_history')->where('user_id', $user->id)->withCount('orders')->latest()->get();

            $ratings = [];
            foreach ($complete_orders as $order){
                $rating = Rating::where('order_id', $order->id)->where('sender_type', 1)->first();
                if ($rating?->order?->project){
                    $title = $rating?->order?->project?->title;
                } else{
                    $title = $rating?->order?->job?->title;
                }
                $payable_amount = $rating->order?->payable_amount;
                $user_fullname = $rating->order?->user?->fullname;
                $create_date = $rating->created_at;
                $feedback = $rating->review_feedback;

                $ratings[] = [
                    'rating' => $rating->rating,
                    'title' => $title,
                    'payable_amount' => $payable_amount,
                    'user_fullname' => $user_fullname,
                    'create_date' => $create_date,
                    'feedback' => $feedback,
                ];
            }

            //timezone
            if(!empty($user?->user_state->timezone)){
                date_default_timezone_set(optional($user->user_state)->timezone ?? '');
                $timezone = date('h:i:a');
            }

            //freelancer rating
            $freel_complete_orders = Order::select('id','identity','status')->where('freelancer_id',$user->id)->where('status',3)->get();
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

            return response()->json([
                'username'=>$username,
                'skills_according_to_category'=>$skills_according_to_category,
                'portfolios'=>$portfolios,
                'skills'=>$skills,
                'educations'=>$educations,
                'experiences'=>$experiences,
                'projects'=>$projects,
                'user'=>$user,
                'total_earning'=>$total_earning,
                'complete_orders'=>$complete_orders,
                'active_orders_count'=>$active_orders_count,
                'project_file_path' => asset('assets/uploads/project/'),
                'portfolio_file_path' => asset('assets/uploads/portfolio/'),
                'country' => $user?->user_country?->country,
                'state' => $user?->user_state?->state,
                'ratings' => $ratings,
                'timezone' => $timezone ?? '',
                'freelancer_avg_rating' => round($freel_avg_rating,1),
                'freelancer_total_rating' => $freel_rating_count,
            ]);
        }else{
            return response()->json([
                'msg'=>__('No User found'),
            ])->setStatusCode(422);
        }
    }
}
