@extends('backend.layout.master')
@section('title', __('All Levels'))
@section('style')
   <x-media.css />
       <style>
       .alert-warning {
           border-color: #f2f2f2;
           border-left: 3px solid #e0a800;
           background-color: #f2f2f2;
           color: #333;
           border-radius: 0;
           padding: 5px;
       }
       .alert-success {
           border-color: #f2f2f2;
           border-left: 3px solid #319a31;
           background-color: #f2f2f2;
           color: #333;
           border-radius: 0;
           padding: 5px;
       }
       .alert-danger {
           border-color: #f2f2f2;
           border-left: 3px solid #dd0000;
           background-color: #f2f2f2;
           color: #333;
           border-radius: 0;
           padding: 5px;
       }
   </style>
@endsection
@section('content')
    <div class="dashboard__body">
        <div class="row">
            <div class="col-lg-12">
                <div class="customMarkup__single">
                    <div class="customMarkup__single__item">
                        <div class="customMarkup__single__item__flex">
                            <h4 class="customMarkup__single__title">{{ __('All Levels') }}</h4>
                            @can('country-add')
                            <x-btn.add-modal :title="__('Add Level')" />
                            @endcan
                        </div>
                        <div class="customMarkup__single__inner mt-4">
                            <x-notice.general-notice
                                    :class="'mb-5'"
                                    :description="__('Notice: A single period can only be applied to one level when setting a level rule. For example, if you set a 3-month duration for one level, you will not be able to use this same 3-month period for another level.')"
                            />
                            <!-- Table Start -->
                            <div class="custom_table style-04 search_result">
                                @include('freelancerlevel::level.search-result')
                            </div>
                            <!-- Table End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('freelancerlevel::level.add-modal')
    @include('freelancerlevel::level.edit-modal')
    @include('freelancerlevel::level.level-rules-modal')
    <x-media.markup />
@endsection

@section('script')
    <x-sweet-alert.sweet-alert2-js />
    @include('freelancerlevel::level.level-js')
    <x-media.js />
@endsection
