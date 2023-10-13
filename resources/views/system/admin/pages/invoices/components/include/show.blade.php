
@extends('system.admin.layouts.app')
@section('style')
    <link href="{{ asset('system/admin/assets/css/member_show.css') }}" rel="stylesheet">

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
    <a href="{{ route('admin.members.show', $invoice->member->id) }}"><span class="text-muted font-weight-bold mr-4">{{ $invoice->member->name }}</span></a>
    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
    <a href="{{ route('admin.invoice.index',['id'=>$invoice->member->id,'name'=>strtr($invoice->member->name,' ','_')]) }}"><span class="text-muted font-weight-bold mr-4">الفواتير</span></a>
    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
    <a href="#"><span class="text-muted font-weight-bold mr-4">عرض فاتورة</span></a>
    <!--end::Actions-->
</div>
<!--end::Info-->
@stop
@section('content')
<!--begin::Page Layout-->
<div class="d-flex flex-row">
    <!--begin::Aside-->
    <div class="flex-column offcanvas-mobile w-300px w-xl-325px" id="kt_profile_aside">
        <!--begin::List Widget 17-->
        <div class="card card-custom gutter-b">
            <!--begin::Body-->
            <div class="card-body pt-4">
                <!--begin::Container-->
                <div>
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-8">
   
                        <!--begin::Info-->
                            <!--begin::Title-->
                            <img class="student-show-img profile-user-img img-responsive img-circle" 
                            src="{{ asset('system/images/Member/'.$invoice->member->image) }}" alt="User profile picture">
                            <!--end::Title-->
                        <!--end::Info-->
                    </div>
                    
                    <div class="d-flex align-items-center mb-8">
   
                        <!--begin::Info-->
                        <div class="d-flex flex-column">
                            <!--begin::Title-->
                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">الاسم : {{ $invoice->member->name }} </a>
                            <!--end::Title-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-8">
                        <div class="d-flex flex-column">
                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">رقم الموبايل : {{ $invoice->member->phone }}</a>
                        </div>
                    </div>
                    <!--end::Item-->
                    
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-8">
                        <div class="d-flex flex-column">
                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">العمر : {{ $invoice->member->age != null ? $invoice->member->age :'غير مسجل' }}</a>
                        </div>
                    </div>
                    <!--end::Item-->
                    
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-8">
                        <div class="d-flex flex-column">
                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">الوزن الابتدائي : {{ $invoice->member->f_weight != null ? $invoice->member->f_weight :'غير مسجل' }}</a>
                        </div>
                    </div>
                    <!--end::Item-->
                    
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-8">
                        <div class="d-flex flex-column">
                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">الوزن الحالي : {{ $invoice->member->l_weight != null ? $invoice->member->l_weight :'غير مسجل' }}</a>
                        </div>
                    </div>
                    <!--end::Item-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::List Widget 17-->
    </div>
    <!--end::Aside-->
    <!--begin::Layout-->
    <div class="flex-row-fluid ml-lg-8">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-body p-0">
                <!-- begin: Invoice-->
                <!-- begin: Invoice header-->
                <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
                    <div class="col-md-10">
                        <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                            <h1 class="display-4 font-weight-boldest mb-10">تفاصيل الاشتراك</h1>
                            <div class="d-flex flex-column align-items-md-end px-0">
                                <span class="d-flex flex-column align-items-md-end opacity-70">
                                    <span>تفاصيل الاشتراك الخاص ب{{  $invoice->member->name  }}</span>
                                </span>
                            </div>
                        </div>
                        <div class="border-bottom w-100"></div>
                        <div class="d-flex justify-content-between pt-6">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">نوع الاشتراك</span>
                                <span class="opacity-70">{{  $invoice->fee->name }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">بداية الاشتراك</span>
                                <span class="opacity-70">{{  $invoice->start_date }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">نهاية الاشتراك</span>
                                <span class="opacity-70">{{  $invoice->end_date }}</span>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- end: Invoice header-->

                <!-- begin: Invoice footer-->
                <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0 mx-0">
                    <div class="col-md-10">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bold text-muted text-uppercase">المبلغ المستحق</th>
                                        <th class="font-weight-bold text-muted text-uppercase">المبلغ المدفوع</th>
                                        <th class="font-weight-bold text-muted text-uppercase">المبلغ المتبقي</th>
                                        <th class="font-weight-bold text-muted text-uppercase">حالة الاشتراك</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="font-weight-bolder">
                                        <td>{{ $invoice->fee->amount }}</td>
                                        <td>{{ $invoice->paid_up }}</td>
                                        <td>{{ $invoice->remaining }}</td>
                                        <td>{{ $invoice->remaining == 0 ? 'مدفوع' : 'مدفوع جزئياً‎ ' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end: Invoice footer-->
                <!-- begin: Invoice action-->
                <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                    <div class="col-md-10">
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">طباعة الفاتورة</button>
                        </div>
                    </div>
                </div>
                <!-- end: Invoice action-->
                <!-- end: Invoice-->
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Layout-->
</div>
<!--end::Page Layout-->
@stop
@section('script')
    @include('system.admin.pages.members.components.extends.script')

@stop
