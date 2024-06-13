<?php

namespace Modules\PromoteFreelancer\Http\Controllers\Freelancer;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\PromoteFreelancer\Entities\PromotionProjectList;

class PromotedListController extends Controller
{
    public function promoted_list()
    {
        $promoted_lists = PromotionProjectList::with('project')
            ->where('user_id',auth()->user()->id)
            ->where('is_valid_payment','yes')
            ->latest()
            ->paginate(10);
        return view('promotefreelancer::frontend.freelancer.promoted-list', compact('promoted_lists'));
    }
}
