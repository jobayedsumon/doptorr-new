@extends('backend.layout.master')
@section('title', __('Push Notification Settings'))
@section('style')
    <x-media.css/>
@endsection
@section('content')
    <div class="dashboard__body">
        <div class="row">
            <div class="col-lg-6">
                <div class="customMarkup__single">
                    <div class="customMarkup__single__item">
                        <div class="customMarkup__single__item__flex">
                            <h4 class="customMarkup__single__title">{{ __('Push Notification Settings For Mobile App') }}</h4>
                        </div>
                        <x-validation.error />
                        <div class="customMarkup__single__inner mt-4">
                            <x-notice.general-notice :class="'mt-5'" :description="__('Notice: To activate push notifications for mobile app you must setup your firebase server key.')" />
                            <form action="{{route('admin.notification.settings')}}" method="post">
                                @csrf
                                <x-form.text :title="__('Firebase Server Key')" :name="'firebase_server_key'" :value="get_static_option('firebase_server_key') ?? '' " :placeholder="__('Firebase server key')"/>
                                <x-btn.submit :title="__('Update')" :class="'btn btn-primary mt-4 pr-4 pl-4'" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-media.markup/>
@endsection
