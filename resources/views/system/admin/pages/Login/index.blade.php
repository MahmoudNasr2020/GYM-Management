<!DOCTYPE html>

<html lang="en" direction="rtl" style="direction: rtl;">
	<!--begin::Head-->
<head>
		<meta charset="utf-8" />
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<title>صالة عبده جيم | تسجيل الدخول</title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="{{ asset('system/admin/assets/css/pages/login/login-1.rtl49d8.css?v=7.2.8') }}" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{ asset('system/admin/assets/plugins/global/plugins.bundle.rtl49d8.css?v=7.2.8') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('system/admin/assets/plugins/custom/prismjs/prismjs.bundle.rtl49d8.css?v=7.2.8') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('system/admin/assets/css/style.bundle.rtl49d8.css?v=7.2.8') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="{{ asset('system/admin/assets/css/themes/layout/header/base/light.rtl49d8.css?v=7.2.8') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('system/admin/assets/css/themes/layout/header/menu/light.rtl49d8.css?v=7.2.8') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('system/admin/assets/css/themes/layout/brand/dark.rtl49d8.css?v=7.2.8') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('system/admin/assets/css/themes/layout/aside/dark.rtl49d8.css?v=7.2.8') }}" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300&family=Changa:wght@200&display=swap" rel="stylesheet">
		<link rel="shortcut icon" href="{{ asset('system/admin/assets/logo.png') }}" />

		<style>
			*,body
			{
				font-family: 'Almarai', sans-serif;
				font-family: 'Changa', sans-serif;
			}
		</style>
		<!--end::Layout Themes-->
		
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!-- Google Tag Manager (noscript) -->
		<noscript>
			<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
		</noscript>
		<!-- End Google Tag Manager (noscript) -->
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white"
			 id="kt_login">
				<!--begin::Aside-->
				<div class="login-aside d-flex flex-column flex-row-auto">
					<!--begin::Aside Top-->
					<div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
						<!--begin::Aside title-->
						<h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #986923;">
							صالة عبده جيم 
						<br />لكمال الاجسام بميدوم</h3>
						<!--end::Aside title-->
					</div>
					<!--end::Aside Top-->
					<!--begin::Aside Bottom-->
					<div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" 
					style="background-image: url({{  asset('system/admin/assets/images/main.gif')  }});min-height: 595px !important;"></div>
					<!--end::Aside Bottom-->
				</div>
				<!--begin::Aside-->
				<!--begin::Content-->
				<div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
					<!--begin::Content body-->
					<div class="d-flex flex-column-fluid flex-center">
						<!--begin::Signin-->
						<div class="login-form login-signin">
							<!--begin::Form-->
							<form class="form"  id="kt_login_signin_form" method="POST"
							 action="{{ route('admin.login.check') }}">
							 @csrf
								<!--begin::Title-->
								<div class="pb-13 pt-lg-0 pt-5">
									<h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">اهلا بك في عبده جيم</h3>
								</div>
								<!--begin::Title-->
								<!--begin::Form group-->
								@if (Session::has('errorMsg'))
								<div class="col bg-light-danger px-6 py-8 rounded-xl mr-7" style="margin-bottom: 20px;">
									<p class="m-0 pt-2 text-white">
										<span style="color:#C7011E;font-size:21px;">
											{{ Session::get('errorMsg')}}
										</span>
									</p>
								</div>
									
								@endif
								<div class="form-group">
									<label class="font-size-h6 font-weight-bolder text-dark">اسم المستخدم</label>
									<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="text" name="username" />
									@error('username')
										<span style="color: red;margin-top:9px;display: block;">{{ $message }}*</span>
									@enderror
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<div class="d-flex justify-content-between mt-n5">
										<label class="font-size-h6 font-weight-bolder text-dark pt-5">كلمة السر</label>
									</div>
									<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="password" name="password" />
									@error('password')
										<span style="color: red;margin-top:9px;display: block;">{{ $message }}*</span>
									@enderror
								</div>
								<!--end::Form group-->
								<!--begin::Action-->
								<div class="pb-lg-0 pb-5">
									<button type="submit" id="kt_login_signin_submit" 
									class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">دخول</button>
								
								</div>
								<!--end::Action-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Signin-->
					</div>
					<!--end::Content body-->
					<!--begin::Content footer-->
					<div class="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0">
						<div class="text-dark-50 font-size-lg font-weight-bolder mr-10">
							<span class="mr-1">{{ date('Y') }}©</span>
							<a href="https://www.facebook.com/profile.php?id=100011445331879"
							 target="_blank" class="text-dark-75 text-hover-primary">Mahmoud Nasr</a>
						</div>
					</div>
					<!--end::Content footer-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<!--begin::Global Config(global config for global JS scripts)-->
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{{ asset('system/admin/assets/plugins/global/plugins.bundle49d8.js?v=7.2.8') }}"></script>

		<script src="{{ asset('system/admin/assets/plugins/custom/prismjs/prismjs.bundle49d8.js?v=7.2.8') }}"></script>

		<script src="{{ asset('system/admin/assets/js/scripts.bundle49d8.js?v=7.2.8') }}"></script>

		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>