<!--begin::Header-->
					<div id="kt_header" class="header header-fixed">
						<!--begin::Container-->
						<div class="container-fluid d-flex align-items-stretch justify-content-between">
							<!--begin::Header Menu Wrapper-->
							<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
								<!--begin::Header Menu-->
								<div id="kt_header_menu" 
								 class="header-menu header-menu-mobile header-menu-layout-default" style="margin-top: 13px;">
									<!--begin::Header Nav-->
									@php
										Date::setLocale('ar');												
									@endphp
									<h5 style="display:contents">
										 تاريخ اليوم : 
										{{ Date::now()->format('l j F Y') }}
									</h5>
									<br>
									<h5 style="display:contents;line-height:2;">
										 الساعة الان : 
										{{ Date::now()->format('h:i A') }}
									</h5>
										
									<!--end::Header Nav-->
								</div>
								<!--end::Header Menu-->
							</div>
							<!--end::Header Menu Wrapper-->
							<!--begin::Topbar-->
							<div class="topbar">
								
								<!--begin::User-->
								<div class="topbar-item">
									<div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
										<span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">اهلا ,</span>
										<span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3" id="name_admin_header">{{ Auth::guard('admin')->user()->name }}</span>
										
										<span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
											<span class="symbol-label font-size-h5 font-weight-bold">م</span>
										</span>
									</div>
								</div>
								<!--end::User-->
							</div>
							<!--end::Topbar-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->