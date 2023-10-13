@extends('system.admin.layouts.app')
@section('style')
    @include('system.admin.pages.attendance.components.extends.style')
    <style>
        .teacher_note{
            width: 150px !important;
        }
    </style>
@endsection
@section('header')
<!--begin::Info-->
<div class="d-flex align-items-center flex-wrap mr-2">
    <!--begin::Page Title-->
    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">لوحة التحكم</h5>
    <!--end::Page Title-->
    <!--begin::Actions-->
    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
    <a href="{{ route('admin.members.index') }}"><span class="text-muted font-weight-bold mr-4">الاعضاء</span></a>
    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
    <a href="#"><span class="text-muted font-weight-bold mr-4">الحضور</span></a>
    <!--end::Actions-->
</div>
<!--end::Info-->
@stop
@section('content')
    <section id="basic-vertical-layouts">
            @include('system.admin.pages.attendance.components.include.index')
    </section>
    
@stop   
@section('script')
@include('system.admin.pages.attendance.components.extends.script')
@stop
