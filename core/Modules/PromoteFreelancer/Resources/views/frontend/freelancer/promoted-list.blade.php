@extends('frontend.layout.master')
@section('site_title',__('Promoted List'))
@section('style')
    <style>
        .total_balance{background-color: #e3e1ff !important;}
    </style>
@endsection

@section('content')
    <main>
        <x-breadcrumb.user-profile-breadcrumb :title="__('Promoted List')" :innerTitle="__('Promoted List')"/>
        <!-- Profile Settings area Starts -->
        <div class="responsive-overlay"></div>
        <div class="profile-settings-area pat-100 pab-100 section-bg-2">
            <div class="container">
                <div class="row g-4">
                    @include('frontend.user.layout.partials.sidebar')
                    <div class="col-xl-9 col-lg-8">
                        <div class="profile-settings-wrapper">

                            <div class="single-profile-settings">
                                <div class="single-profile-settings-header">
                                    <div class="single-profile-settings-header-flex mb-2">
                                        <x-form.form-title :title="__('Promoted List')" :class="'single-profile-settings-header-title'" />
                                        <a href="{{ route('freelancer.profile.details', Auth::guard('web')->user()->username) }}" class="btn-profile btn-bg-1"> {{ __('Project and Profile') }} </a>
                                    </div>
                                    <x-notice.general-notice :description="__('Notice: You can find all promoted projects and profile list here.')" />
                                </div>
                                <div class="single-profile-settings-inner profile-border-top">
                                    <div class="custom_table style-04">
                                        <table>
                                            <thead>
                                            <tr>
                                                <th>{{ __('Promotion Type (project/profile)') }}</th>
                                                <th>{{ __('Promotion Package Details') }}</th>
                                                <th>{{ __('Impression and Click') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($promoted_lists as $list)
                                                <tr>
                                                    <td>
                                                        <p><strong>{{ __('Type:') }}</strong> {{ ucfirst($list->type) }}</p>
                                                        <p>
                                                            @if($list->type == 'project')
                                                                <span><strong>{{ __('Project Title:') }}</strong> {{ $list?->project?->title }}</span>
                                                            @endif
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p> {{ __('Status:') }}
                                                            @php $current_date = \Carbon\Carbon::now()->toDateTimeString(); @endphp
                                                            @if($list->payment_status == 'complete' && $list->expire_date >= $current_date)
                                                                <span class="text-success fw-bold">{{ __('Active') }}</span>
                                                            @else
                                                                <span class="text-danger fw-bold">{{ __('Expired') }}</span>
                                                            @endif
                                                        </p>
                                                        <p>{{ __('Price:') .float_amount_with_currency_symbol($list->price - $list->transaction) }}</p>
                                                        <p>{{ __('Duration:') .$list->duration .' '.__('days')}}</p>
                                                        <p>
                                                            @php $expire_date = new DateTime($list->expire_date); @endphp
                                                            {{ __('Expired Date:') .$expire_date->format('Y-m-d') }}
                                                        </p>
                                                        <p>{{ __('Promoted Date:') .$list->created_at->format('Y-m-d') }}</p>
                                                        <p>{{ __('Payment Gateway:')}} {{ ucfirst(str_replace('_', ' ', $list->payment_gateway)) }}</p>
                                                        <p>{{ __('Payment Status:') .ucfirst($list->payment_status)}}</p>
                                                    </td>
                                                    <td>
                                                        <p>{{ __('Impression:') .$list->impression }}</p>
                                                        <p>{{ __('Click:') .$list->click }}</p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div class="deposit-history-pagination mt-4">
                                            <x-pagination.laravel-paginate :allData="$promoted_lists"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Profile Settings area end -->
    </main>
@endsection
