@extends('backend.layout.master')
@section('title', __('All Words'))
@section('style')
    <x-select2.select2-css/>
@endsection
@section('content')
    <div class="dashboard__body">
        <div class="row">
            <div class="col-lg-12">
                <x-notice.general-notice :description="__('Notice: You can add any words to the list that you\'d like to exclude from the conversation between the client and freelancer. If user try to send any restricted word listed below will not send.')" />
                <div class="customMarkup__single">
                    <div class="customMarkup__single__item">
                        <div class="customMarkup__single__item__flex">
                            <h4 class="customMarkup__single__title">{{ __('All Restricted Words') }}</h4>
                            <x-btn.add-modal :title="__('Add Restricted Word')" />
                        </div>
                        <div class="search_delete_wrapper">
                            <x-bulk-action.bulk-action />
                            <x-search.search-in-table :id="'string_search'" />
                        </div>
                        <div class="customMarkup__single__inner mt-4">
                            <!-- Table Start -->
                            <div class="custom_table style-04 search_result">
                                @include('securitymanage::backend.word.search-result')
                            </div>
                            <!-- Table End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('securitymanage::backend.word.add-modal')
    @include('securitymanage::backend.word.edit-modal')
@endsection

@section('script')
    <x-sweet-alert.sweet-alert2-js/>
    <x-select2.select2-js/>
    <x-bulk-action.bulk-delete-js :url="route('admin.word.delete.bulk.action')"/>
    @include('securitymanage::backend.word.word-js')

@endsection
