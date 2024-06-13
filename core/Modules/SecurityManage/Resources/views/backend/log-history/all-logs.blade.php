@extends('backend.layout.master')
@section('title', __('All Words'))
@section('style')
    <x-select2.select2-css/>
@endsection
@section('content')
    <div class="dashboard__body">
        <div class="row">
            <div class="col-lg-12">
                <div class="customMarkup__single">
                    <div class="customMarkup__single__item">
                        <div class="customMarkup__single__item__flex">
                            <h4 class="customMarkup__single__title">{{ __('All Logs') }}</h4>
                        </div>
                        <div class="search_delete_wrapper">
                            <x-bulk-action.bulk-action />
                            <x-search.search-in-table :id="'string_search'" />
                        </div>
                        <div class="customMarkup__single__inner mt-4">
                            <!-- Table Start -->
                            <div class="custom_table style-04 search_result">
                                @include('securitymanage::backend.log-history.search-result')
                            </div>
                            <!-- Table End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <x-sweet-alert.sweet-alert2-js/>
    <x-select2.select2-js/>
    <x-bulk-action.bulk-delete-js :url="route('admin.log.delete.bulk.action')"/>
    @include('securitymanage::backend.log-history.log-js')

@endsection
