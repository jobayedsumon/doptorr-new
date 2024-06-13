@extends('frontend.layout.master')
@section('site_title') {{ $category->category ?? __('Jobs') }} @endsection
@section('style')
    <x-select2.select2-css />
@endsection
@section('content')
    <main>
        <x-frontend.category.category/>
        <x-breadcrumb.user-profile-breadcrumb :title="__('Category Jobs') ?? __('Jobs')" :innerTitle=" $category->category ?? '' "/>
        <!-- Project preview area Starts -->
        <div class="preview-area section-bg-2 pat-100 pab-100">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="categoryWrap-wrapper">
                            <div class="shop-contents-wrapper responsive-lg">
                                <div class="shop-icon">
                                    <div class="shop-icon-sidebar">
                                        <i class="fas fa-bars"></i>
                                    </div>
                                </div>

                                @include('frontend.pages.category-jobs.sidebar')
                                <input type="hidden" id="category_id" value="{{$category->id ?? ''}}">
                                <div class="shop-contents-wrapper-right search_job_result">
                                    @include('frontend.pages.category-jobs.search-job-result')
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
    @include('frontend.pages.category-jobs.jobs-filter-js')
    <x-select2.select2-js />
@endsection
