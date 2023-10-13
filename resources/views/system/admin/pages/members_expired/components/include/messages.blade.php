@extends('system.admin.layouts.app')

@section('style')
    @include('system.admin.pages.indebted_members.components.extends.style')
@stop

@section('header')
<!--begin::Info-->
<div class="d-flex align-items-center flex-wrap mr-2">
    <!--begin::Page Title-->
    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">لوحة التحكم</h5>
    <!--end::Page Title-->
    <!--begin::Actions-->
    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
    <a href="#"><span class="text-muted font-weight-bold mr-4">الاعضاء</span></a>
    <!--end::Actions-->
</div>
<!--end::Info-->
@stop
@section('content')
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <!--begin::Content-->
            <div class="flex-row-fluid ml-lg-8" id="kt_chat_content">
                <!--begin::Card-->
                <div class="card card-custom">
                    <!--begin::Header-->
                    <div class="card-header align-items-center px-4 py-3">
                        
                        <div class="text-center flex-grow-1">
                            <div class="text-dark-75 font-weight-bold font-size-h5">
                                <span>
                                    {{ $member->name }}
                                </span>
                            </div>
                        </div>
                        <div class="text-right flex-grow-1">
                         
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Scroll-->
                        <div class="scroll scroll-pull" data-mobile-height="350">
                            <!--begin::Messages-->
                            <div class="messages">
                                <!--begin::Message In-->
                                <div class="d-flex flex-column mb-5 align-items-start">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-40 mr-3">
                                            <img alt="Pic" src="{{ asset('system/images/Member/'.$member->image) }}" />
                                        </div>
                                        <div>
                                            <a href="{{ route('admin.members.show',$member->id) }}" target="_blank" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">{{ $member->name }}</a>
                                            
                                        </div>
                                    </div>
                                    @foreach ($member_messages as $member_message)
                                    <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                                        {{ $member_message->message }}
                                       
                                    </div>
                                    <span class="text-muted font-size-sm" style="direction: ltr;">{{ $member_message->created_at->diffForHumans() }}</span>
                                    @endforeach
                                </div>
                
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content-->
        </div>
    </section>
@stop
@section('script')
    <script src="{{ asset('system/admin/assets/js/pages/custom/chat/chat49d8.js?v=7.2.8') }}"></script>
@stop
