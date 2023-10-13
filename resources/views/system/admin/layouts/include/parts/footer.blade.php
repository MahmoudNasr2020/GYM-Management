<!--begin::Footer-->
					<div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted font-weight-bold mr-2">{{ date('Y') }}©</span>
								<a href="https://www.facebook.com/profile.php?id=100011445331879" 
								target="_blank" class="text-dark-75 text-hover-primary">Mahmoud Nasr</a>
							</div>
							<!--end::Copyright-->
							<!--begin::Nav-->
							<div class="nav nav-dark">
								<a href="{{ route('admin.members.index') }}" target="_blank" class="nav-link pl-0 pr-5">الاعضاء</a>
								<a href="{{ route('admin.attendance.index') }}" target="_blank" class="nav-link pl-0 pr-5">الحضور</a>
								<a href="{{ route('admin.fees.index') }}" target="_blank" class="nav-link pl-0 pr-0">الاشتراكات</a>
							</div>
							<!--end::Nav-->
						</div>
						<!--end::Container-->
					</div>
<!--end::Footer-->