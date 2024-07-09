@extends('backend.layout.master')

@section('title', __('Edit Page'))

@section('style')
    <x-media.css/>
    <x-summernote.summernote-css />
    <x-tags.tag-input-css />
    <style>
        .img-select {
            position: relative;
        }
        .img-select.selected:after {
            position: absolute;
            left: 0px;
            top: 0;
            z-index: 1;
            color: #fff;
            content: "\f058";
            font-size: 30px;
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            line-height: 30px;
            width: 40px;
            height: 40px;
            background-color: #007bff;
            padding-left: 5px;
            padding-top: 4px;
        }
    </style>
@endsection

@section('content')
    <div class="dashboard__body">
        <form action="{{route('admin.edit.page',$page_details->id)}}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-8">
                    <div class="customMarkup__single">
                        <div class="customMarkup__single__item">
                            <h4 class="customMarkup__single__title">{{ __('Edit Page') }}</h4>
                            <x-validation.error/>
                            <div class="customMarkup__single__inner mt-4">
                                @csrf
                                <div class="tab-content margin-top-40">
                                    <div class="single-input">
                                        <label for="title" class="label-title mt-3">{{__('Title')}}</label>
                                        <input type="text" class="form-control" name="title" id="title" value="{{ $page_details->title ?? '' }}" placeholder="{{__('Title')}}" id="title">
                                    </div>
                                    <div class="single-input">
                                        <label for="slug" class="label-title mt-3">{{__('Slug')}}</label>
                                        <input type="text" class="form-control" name="slug" id="slug" value="{{ $page_details->slug ?? '' }}" placeholder="{{__('Slug')}}" id="title">
                                        <span class="full-slug-show"></span>
                                    </div>
                                    <div class="single-input mb-3 page_content_wrapper @if($page_details->page_builder_status == 'on') d-none @endif">
                                        <label for="content" class="label-title mt-3">{{__('Content')}}</label>
                                        <div class="summernote-wrapper">
                                            <textarea id="content" name="page_content"  class="form-control summernote">
                                                {!! $page_details->page_content !!}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <x-backend.edit-page-meta-data :sidebarHeading="__('Edit Page Meta')" :pageDetails="$page_details" />
                                </div>

                                <div class="single-input mb-3">
                                    <label for="navbar_variant" class="label-title mt-5">{{__('Navbar Variant')}}</label>
                                    <input type="hidden" class="form-control" id="navbar_variant" value="{{$page_details->navbar_variant}}" name="navbar_variant">
                                    <div class="row">
                                        @for($i = 1; $i <=1; $i++)
                                            <div class="col-lg-12 col-md-12">
                                                <div class="img-select img-select-navbar @if($page_details->navbar_variant == $i ) selected @endif">
                                                    <div class="img-wrap">
                                                        <img src="{{asset('assets/frontend/navbar-variant/'.$i.'.jpg')}}" data-home_id="0{{$i}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                                <div class="single-input mb-3">
                                    <label for="footer_variant" class="label-title mt-5">{{__('Footer Variant')}}</label>
                                    <input type="hidden" class="form-control" id="footer_variant" value="{{$page_details->footer_variant}}" name="footer_variant">
                                    <div class="row">
                                        @for($i = 1; $i <=2; $i++)
                                            <div class="col-lg-12 col-md-12">
                                                <div class="img-select img-select-footer @if($page_details->footer_variant == $i ) selected @endif">
                                                    <div class="img-wrap">
                                                        <img src="{{asset('assets/frontend/footer-variant/'.$i.'.png')}}" data-home_id="0{{$i}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="customMarkup__single">
                        <div class="customMarkup__single__item">
                            <div class="customMarkup__single__inner mt-4">
                                @csrf
                                <div class="tab-content margin-top-40">
                                    <div class="switch">
                                        <label class="label-title mt-3"><strong>{{__('Page Builder Enable/Disable')}}</strong></label>
                                        <input class="custom-switch" type="checkbox" id="page_builder_status" name="page_builder_status" @if(isset($page_details->page_builder_status)) checked @endif>
                                        <label class="switch-label" for="page_builder_status">{{__('Page Builder Enable/Disable')}}</label>
                                    </div>

                                    <div class="page-builder-area-wrapper @if(empty($page_details->page_builder_status)) d-none @endif">
                                        <div class="single-input col-md-12 mt-3">
                                            <div class="btn-wrapper page-builder-btn-wrapper">
                                                <a href="{{route('admin.dynamic.page.builder',['type' =>'dynamic-page','id' => $page_details->id])}}" class="btn btn-primary">{{__('Open Page Builder')}}</a> <br>
                                                <small class="info-text">{{__('Page builder option is available in page edit only')}}</small>
                                            </div>
                                        </div>
                                        <div class="single-input col-md-12 layout">
                                            <label class="label-title mt-3">{{__('Page Layout')}}</label>
                                            <select name="layout" class="form-control">
                                                <option value="normal_layout" @if($page_details->layout == 'normal_layout') selected @endif>{{__('Normal Layout')}}</option>
                                                <option value="home_page_layout" @if($page_details->layout == 'home_page_layout')selected  @endif>{{__('Home Page')}}</option>
                                            </select>
                                        </div>
                                        <div class="single-input col-md-12 page_class">
                                            <label class="label-title mt-3">{{__('Page Class')}}</label>
                                            <select name="page_class" class="form-control">
                                                <option value="none" @if($page_details->page_class == 'none')selected @endif>{{__('None')}}</option>
                                                <option value="nav-absolute" @if($page_details->page_class == 'nav-absolute')selected @endif>{{__('Custom Class')}}</option>
                                            </select>
                                            <small class="">{{ __('Adjust page frontend view selecting by none or custom class') }}</small>
                                        </div>
                                    </div>

                                    <div class="switch">
                                        <label class="label-title mt-3"><strong>{{__('Breadcrumb Show/Hide')}}</strong></label>
                                        <input class="custom-switch" type="checkbox" id="breadcrumb_status" name="breadcrumb_status" @if(!empty($page_details->breadcrumb_status)) checked @endif>
                                        <label class="switch-label" for="breadcrumb_status">{{__('Breadcrumb Show/Hide')}}</label>
                                    </div>
                                    <div class="single-input">
                                        <label class="label-title mt-3">{{__('Visibility')}}</label>
                                        <select name="visibility" class="form-control">
                                            <option value="all" @if($page_details->visibility == 'all')selected @endif>{{__('All')}}</option>
                                            <option value="user" @if($page_details->visibility == 'user')selected @endif>{{__('Only Logged In User')}}</option>
                                        </select>
                                    </div>
                                    <x-status.form.active-inactive :title="'Status'" :status="$page_details->status" />
                                    @can('page-update')
                                        <x-btn.submit :title="'Update'" :class="'btn btn-primary mt-4 pr-4 pl-4'" />
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <x-media.markup/>
@endsection

@section('script')
    <x-media.js/>
    <x-summernote.summernote-js />
    <x-tags.tag-input-js />
    <script>
        (function($){
            "use strict";
            $(document).ready(function(){
                //page builder
                $(document).on('change','input[name="page_builder_status"]',function(){
                    if($(this).is(':checked')){
                        $('.page-builder-area-wrapper').removeClass('d-none');
                        $('.page_content_wrapper').addClass('d-none');
                    }else {
                        $('.page-builder-area-wrapper').addClass('d-none');
                        $('.page_content_wrapper').removeClass('d-none');

                    }
                });

                //slug
                $('.full-slug-show').text(`{{url('/')}}/` + '{{$page_details->slug}}');
                function makeSlug(slug){
                    let finalSlug = slug.replace(/[^a-zA-Z0-9]/g, ' ');
                    finalSlug = slug.replace(/  +/g, ' ');
                    finalSlug = slug.replace(/\s/g, '-').toLowerCase().replace(/[^\w-]+/g, '-');
                    return finalSlug;
                }

                $(document).on('keyup', '#slug', function (e) {
                    let slug = makeSlug($(this).val());
                    let url = `{{url('/')}}/` + slug;
                    $('.full-slug-show').text(url);
                });

                //For Navbar
                function navbar_variant(){
                    let imgSelect = $('.img-select');
                    let id = $('#navbar_variant').val();
                    imgSelect.removeClass('selected');
                    $('img[data-home_id="'+id+'"]').parent().parent().addClass('selected');
                    $(document).on('click','.img-select-navbar img',function (e) {
                        e.preventDefault();
                        imgSelect.removeClass('selected');
                        $(this).parent().parent().addClass('selected').siblings();
                        $('#navbar_variant').val($(this).data('home_id'));
                    })
                }
                navbar_variant();

                //For Footer
                function footer_variant(){
                    let imgSelect = $('.img-select');
                    let id = $('#footer_variant').val();
                    imgSelect.removeClass('selected');
                    $('img[data-home_id="'+id+'"]').parent().parent().addClass('selected');
                    $(document).on('click','.img-select-footer img',function (e) {
                        e.preventDefault();
                        imgSelect.removeClass('selected');
                        $(this).parent().parent().addClass('selected').siblings();
                        $('#footer_variant').val($(this).data('home_id'));
                    })
                }
                footer_variant();

            });
        }(jQuery));
    </script>
@endsection
