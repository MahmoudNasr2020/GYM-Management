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
</div>
<!--end::Info-->
@stop
@section('content')
		<div class="row">
			<div class="container">
				<div class="col-lg-12 col-xxl-12">
					<!--begin::Mixed Widget 1-->
					<div class="card card-custom bg-gray-100 card-stretch gutter-b">
						<!--begin::Body-->
						<div class="card-body p-0 position-relative overflow-hidden">	
							<!--begin::Stats-->
							<div class="card-spacer mt-n25">
								<!--begin::Row-->
								<div class="row m-0">
									<div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7" style="margin-top: 90px;">
										<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
											<i class="fa fa-users" style="font-size: 30px;color: indianred;"></i>
										</span>
										<a href="#" class="text-warning font-weight-bold font-size-h6" 
										style="display: block;margin-bottom: 11px;color:#3699FF !important" >عدد الاعضاء</a>
										<a href="#" class="text-warning font-weight-bold font-size-h2">{{ $members_count }}</a>
									</div>
									<div class="col bg-light-primary px-6 py-8 rounded-xl mb-7" style="margin-top: 90px;">
										<span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
											<i class="fa fa-address-book" style="font-size: 30px;color: steelblue;"></i>
										</span>
										<a href="#" class="text-primary font-weight-bold font-size-h6 mt-2" style="display: block;margin-bottom: 11px;">الاعضاء المديونين</a>
										<a href="#" class="text-warning font-weight-bold font-size-h2">{{ $indebted_members }}</a>

									</div>
								</div>
								<!--end::Row-->
								<!--begin::Row-->
								<div class="row m-0">
									<div class="col bg-light-danger px-6 py-8 rounded-xl mr-7">
										<span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
											<i class="fa fa-money-check-alt" style="font-size: 30px;color: teal;"></i>
										</span>
										<a href="#" class="text-primary font-weight-bold font-size-h6 mt-2" style="display: block;margin-bottom: 11px;">الايرادات</a>
										<a href="#" class="text-warning font-weight-bold font-size-h2">{{ $revenues }}</a>
									</div>
									<div class="col bg-light-success px-6 py-8 rounded-xl">
										<span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
											<i class="fa fa-money-check-edit-alt" style="font-size: 30px;color: unset;"></i>
										</span>
										<a href="#" class="text-primary font-weight-bold font-size-h6 mt-2" style="display: block;margin-bottom: 11px;">المستحق</a>
										<a href="#" class="text-warning font-weight-bold font-size-h2">{{ $dues }}</a>
									</div>
								</div>
								<!--end::Row-->
							</div>
							<!--end::Stats-->
						<div class="resize-triggers"><div class="expand-trigger"><div style="width: 506px; height: 447px;"></div></div><div class="contract-trigger"></div></div></div>
						<!--end::Body-->
					</div>
					<!--end::Mixed Widget 1-->
				</div>
				<div class="col-lg-12 col-xxl-12 order-1 order-xxl-12">
					<!--begin::List Widget 3-->
					<div class="card card-custom card-stretch gutter-b">
						<!--begin::Header-->
						<div class="card-header border-0">
							<h3 class="card-title font-weight-bolder text-dark">الاعضاء</h3>
							
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-2">
							@foreach ($members as $member)
							<!--begin::Item-->
							<div class="d-flex align-items-center mb-10">
								<!--begin::Symbol-->
								<div class="symbol symbol-40 symbol-light-success mr-5">
									<span class="symbol-label">
										<img src="{{ asset('system/images/Member/'.$member->image) }}" 
										class="h-75 align-self-end" alt="" style="width: 94%;height: 39px !important;">
									</span>
								</div>
								<!--end::Symbol-->
								<!--begin::Text-->
								<div class="d-flex flex-column flex-grow-1 font-weight-bold">
									<a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">{{ $member->name }}</a>
									<span class="text-muted">PHP, SQLite, Artisan CLI</span>
								</div>
								<!--end::Text-->
								<!--begin::Dropdown-->
								<div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="" data-placement="left" data-original-title="اعدادت">
									<a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="ki ki-bold-more-hor"></i>
									</a>
									<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
										<!--begin::Navigation-->
										<ul class="navi navi-hover">
											<li class="navi-separator mt-3 opacity-70"></li>
											<li class="navi-footer py-4">
												<a class="btn btn-clean font-weight-bold btn-sm" target="_blank" href="{{ route('admin.members.show',$member->id) }}">
												<i class="ki ki-plus icon-sm"></i>عرض</a>
											</li>
										</ul>
										<!--end::Navigation-->
									</div>
								</div>
								<!--end::Dropdown-->
							</div>
							<!--end::Item-->
							@endforeach
						</div>
						<!--end::Body-->
					</div>
					<!--end::List Widget 3-->
				</div>
				
			</div>	
		</div>
@stop

