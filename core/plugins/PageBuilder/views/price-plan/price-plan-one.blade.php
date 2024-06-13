<!-- Pricing area starts -->
<section class="pricing-area pat-50 pab-50" data-padding-top="{{$padding_top ?? ''}}" data-padding-bottom="{{$padding_bottom ?? ''}}" style="background-color:{{$section_bg ?? ''}}">
    <div class="container">
        <div class="section-title center-text">
            <h2 class="title">{{ __($title) ?? __('Pricing Plan') }} </h2>
        </div>
        <div class="row gy-4 mt-4">
            @foreach ($subscriptions as $subscription)
                <div class="col-xxl-4 col-lg-4 col-md-6">
                    <div class="single-pricing single-pricing-border radius-10">
                        <div class="single-pricing-top d-flex gap-3 flex-wrap align-items-center">
                            <div class="single-pricing-brand">
                                {!! render_image_markup_by_attachment_id($subscription->logo ?? '') !!}
                            </div>
                            <div class="single-pricing-top-contents">
                                <h5 class="single-pricing-title"> {{ $subscription->title ?? '' }}</h5>
                                <p class="single-pricing-para">{{ $subscription->limit ?? '' }} {{ __('Connects') }}</p>
                            </div>
                        </div>
                        <ul class="single-pricing-list list-style-none">
                            @foreach ($subscription->features as $feature)
                                @if ($feature->status == 'on')
                                    <li class="single-pricing-list-item">
                                        <span class="single-pricing-list-item-icon">
                                            <i class="fa-solid fa-check"></i>
                                        </span> {{ $feature->feature ?? '' }}
                                    </li>
                                @else
                                    <li class="single-pricing-list-item">
                                        <span class="single-pricing-list-item-icon cross-icon">
                                            <i class="fa-solid fa-xmark"></i>
                                        </span>{{ $feature->feature ?? '' }}
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <h3 class="single-pricing-price">
                            {{ float_amount_with_currency_symbol($subscription->price ?? '') }}
                            <sub>/{{ ucfirst($subscription->subscription_type?->type) }}</sub>
                        </h3>
                        <div class="btn-wrapper mt-4">
                            <a href="{{ route('subscriptions.all') }}"
                                class="cmn-btn btn-bg-gray btn-small w-100 choose_plan">
                                {{ __('View Plan') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Pricing area end -->
