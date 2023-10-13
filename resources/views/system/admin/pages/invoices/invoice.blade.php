@extends('system.admin.layouts.app')

@section('style')
    @include('system.admin.pages.invoices.components.extends.style')
@stop

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
    <a href="{{ route('admin.members.show',$member_id) }}"><span class="text-muted font-weight-bold mr-4">{{ $member->name }}</span></a>
    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
    <a href="#"><span class="text-muted font-weight-bold mr-4">الفواتير</span></a>
    <!--end::Actions-->
</div>
<!--end::Info-->
@stop
@section('content')
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            @include('system.admin.pages.invoices.components.include.table')
        </div>
    </section>
    @include('system.admin.pages.invoices.components.include.add')
    @include('system.admin.pages.invoices.components.include.edit')
    @include('system.admin.pages.invoices.components.include.show_remaining_modal')
@stop
@section('script')
    @include('system.admin.pages.invoices.components.extends.script')
@stop
