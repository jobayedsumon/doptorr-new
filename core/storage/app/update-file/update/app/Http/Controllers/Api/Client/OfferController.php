<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Project;
use App\Models\Rating;
use Illuminate\Http\Request;
use Modules\Chat\Entities\Offer;

class OfferController extends Controller
{
    public function all_offers()
    {
        $user_id = auth('sanctum')->user()->id;
        $offers = Offer::with(['freelancer:id,first_name,last_name,image,user_verified_status,check_online_status'])->where('client_id',$user_id)->whereHas('freelancer')->latest()->paginate(10)->withQueryString();
        $top_projects = Project::select('id', 'title','slug','user_id','basic_regular_charge','basic_discount_charge','basic_delivery','description','image')
            ->where('project_on_off','1')
            ->where('status','1')
            ->whereHas('project_creator')
            ->latest()
            ->take(3)
            ->get();

        if($offers){
            return response()->json([
                'offers' => $offers,
                'top_projects' => $top_projects,
                'image_path' => asset('assets/uploads/project/'),
                'freelancer_image_path' => asset('assets/uploads/profile/'),
            ]);
        }
        return response()->json(['msg' => __('no offer found.')]);
    }

    public function offer_details($id)
    {
        $user_id = auth('sanctum')->user()->id;
        $offer_details = Offer::with(['milestones','freelancer:id,first_name,last_name,image,user_verified_status,check_online_status,country_id,state_id'])
            ->where('client_id',$user_id)->where('id',$id)->first();

        $offer_order = Order::where('identity',$offer_details->id)->where('is_project_job','offer')->where('payment_status','complete')->first();
        $accept_or_pending = !empty($offer_order) ? 1 : 0;


        $complete_orders = Order::select('id','identity','status')->where('freelancer_id',$offer_details->freelancer_id)->where('status',3)->get();
        $complete_orders_count = $complete_orders->count();


        $count = 0;
        $rating_count = 0;
        $total_rating = 0;
        foreach($complete_orders as $order){
            $rating = Rating::where('order_id',$order->id)->where('sender_type',1)->first();
            if($rating){
                $total_rating = $total_rating+$rating->rating;
                $count = $count+1;
                $rating_count = $rating_count+1;
            }
        }


        $avg_rating = $count > 0 ? $total_rating/$count : 0;

        if($offer_details){
            return response()->json([
                'offer_details' => $offer_details,
                'freelancer_country' => $offer_details?->freelancer?->user_country?->country,
                'freelancer_state' => $offer_details?->freelancer?->user_state?->state,
                'complete_orders_count' => $complete_orders_count,
                'avg_rating' => round($avg_rating,1),
                'rating_count' => $rating_count,
                'accept_or_pending' => $accept_or_pending,
                'freelancer_image_path' => asset('assets/uploads/profile/'),
            ]);
        }
        return response()->json(['msg' => __('no offer found.')]);
    }
}
