@extends('frontend.layout.master')
@section('site_title',__('Talents'))
@section('style')
    <x-select2.select2-css />
    <style>
        .single-freelancer.center-text .single-freelancer-author-name {
            justify-content: center;
        }
        .single-freelancer.center-text .single-freelancer-bottom {
            justify-content: center;
        }
        .single-freelancer {
            flex-direction: column;
            display: flex;
            justify-content: space-between;
            height: 100%;
            background: var(--white);
        }
        .single-freelancer-author{
            position: relative;
        }
        .pro-profile-badge {
            position: absolute;
            right: -10px;
            top: -10px;
            border-radius:20px;
            background: #FAF5FF;
            color: #9e4cf4;
            font-weight: 600;
        }
        .pro-icon-background {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #9e4cf4;
            padding: 3px;
            border-radius: 50%;
            color: #fff;
            font-size: 12px;
        }
    </style>
@endsection
@section('content')
    <main>
        <x-frontend.category.category/>
        <x-breadcrumb.user-profile-breadcrumb :title="__('Talents') ?? __('Talents')" :innerTitle="__('Talents') ?? '' "/>
        <!-- Project preview area Starts -->
        <div class="preview-area section-bg-2 pat-100 pab-100">
            <div class="container">
                <div class="row g-4">

                    @if(moduleExists('PromoteFreelancer'))
                        <div class="profile-wrapper-right-flex flex-btn text-right">
                            <span class="profile-wrapper-switch-title">{{ __('Pro Profiles') }}</span>
                            <div class="profile-wrapper-switch-custom display_work_availability">
                                <label class="custom_switch">
                                    <input type="checkbox" id="get_pro_profile" value="0">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    @endif

                    <div class="col-lg-12">
                        <div class="categoryWrap-wrapper">
                            <div class="shop-contents-wrapper responsive-lg">
                                <div class="shop-icon">
                                    <div class="shop-icon-sidebar">
                                        <i class="fas fa-bars"></i>
                                    </div>
                                </div>

                                @include('frontend.pages.talent.sidebar')

                                <div class="shop-contents-wrapper-right search_talent_result">
                                    @include('frontend.pages.talent.search-talent-result')
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Project preview area end -->
    </main>

@endsection

@section('script')
    @include('frontend.pages.talent.talent-filter-js')
    <x-select2.select2-js />
@endsection
