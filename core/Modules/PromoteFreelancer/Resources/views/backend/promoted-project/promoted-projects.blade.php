@extends('backend.layout.master')
@section('title', __('Promoted Projects'))
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
                            <h4 class="customMarkup__single__title">{{ __('Promoted Projects') }}</h4>
                            <x-search.search-in-table :id="'string_search'" />
                        </div>
                        <div class="customMarkup__single__inner mt-4">
                            <x-notice.general-notice
                                    :class="'mb-5'"
                                    :description="__('Notice: Duration refers to the number of days a freelancer\'s project will be displayed in the promotional area when they choose to promote it under the project promotion settings.')"
                            />
                            <!-- Table Start -->
                            <div class="custom_table style-04 search_result">
                                @include('promotefreelancer::backend.promoted-project.search-result')
                            </div>
                            <!-- Table End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('promotefreelancer::backend.promoted-project.manual-payment-modal')
    <x-media.markup />
@endsection

@section('script')
    <x-sweet-alert.sweet-alert2-js />
    @include('promotefreelancer::backend.promoted-project.promoted-project-js')
    <x-media.js />
@endsection
