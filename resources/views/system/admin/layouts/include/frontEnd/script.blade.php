<!--begin::Global Theme Bundle(used by all pages)-->
		
		<script src="{{ asset('system/admin/assets/plugins/global/plugins.bundle49d8.js?v=7.2.8') }}"></script>
		<script src="{{ asset('system/admin/assets/plugins/custom/prismjs/prismjs.bundle49d8.js?v=7.2.8') }}"></script>
		<script src="{{ asset('system/admin/assets/js/scripts.bundle49d8.js?v=7.2.8') }}"></script>

<!--end::Global Theme Bundle-->

<!--begin::Page Vendors(used by this page)-->
		<script src="{{ asset('system/admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle49d8.js?v=7.2.8') }}"></script>
<!--end::Page Vendors-->

<!--begin::Page Scripts(used by this page)-->
		<script src="{{ asset('system/admin/assets/js/pages/widgets49d8.js?v=7.2.8') }}"></script>
<!--end::Page Scripts-->
<script src="{{asset('system/admin/assets/plugins/noty/noty.min.js')}}"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
</script>

@yield('script')

