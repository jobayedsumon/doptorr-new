<div class="myOrder-single-block-item-content">
        @if($userType == 2)
            <span class="myOrder-single-block-subtitle">{{ __('Freelancer') }}</span>
            @if(!empty($isIdentityVerified) && $isIdentityVerified == 1) <i class="fas fa-circle-check"></i>@endif
        @else
            <span class="myOrder-single-block-subtitle">{{ __('Customer') }}</span>
            @if(!empty($isIdentityVerified) && $isIdentityVerified == 1) <i class="fas fa-circle-check"></i>@endif
        @endif
        <h6 class="myOrder-single-block-title mt-1">{{ ucfirst($firstName) }} {{ ucfirst($lastName) }}
            @if(Cache::has('user_is_online_' . $userId))
                <span class="single-freelancer-author-status"> {{ __('Active') }} </span>
            @else
                <span class="single-freelancer-author-status-ofline"> {{ __('Inactive') }} </span>
            @endif
            @if($orderRating)
                <span class="order-funded-btn order-rating"><i class="fa-solid fa-star"></i> {{ $orderRating ?? '' }} </span>
            @endif
        </h6>
    </div>
