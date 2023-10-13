@extends('system.admin.layouts.app')

@section('style')
    @include('system.admin.pages.members.components.extends.style')
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
            @include('system.admin.pages.admin_settings.components.include.index')
        </div>
    </section>
@stop
@section('script')
    @include('system.admin.pages.admin_settings.components.extends.script')
@stop
