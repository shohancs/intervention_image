<!-- Bootstrap JS -->
	<script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('backend/js/jquery.min.js') }}"></script>
	<script src="{{ asset('backend/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('backend/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('backend/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('backend/plugins/chartjs/chart.min.js') }}"></script>
	<script src="{{ asset('backend/plugins/peity/jquery.peity.min.js') }}"></script>
	<script src="{{ asset('backend/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('backend/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
	<script src="{{ asset('backend/js/dashboard-eCommerce.js') }}"></script>
	<!--app JS-->
	<script src="{{ asset('backend') }}/js/app.js"></script>
	<script>
		new PerfectScrollbar('.product-list');
		new PerfectScrollbar('.customers-list');
	</script>

	<!-- Toaster js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

	<script>
		toastr.options = {
		  "closeButton": true,
		  "debug": true,
		  "newestOnTop": false,
		  "progressBar": true,
		  "positionClass": "toast-top-right",
		  "preventDuplicates": true,
		  "onclick": null,
		  "showDuration": "400",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "2000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}
	</script>

	<script>
		
		@if( Session::has('message') )

			var type = "{{ Session::get('alert-type', 'info') }}";

			switch( type )
			{
				case ('info'):
					toastr.info("{{ Session('message') }}");
					break;
				case ('success'):
					toastr.success("{{ Session('message') }}");
					break;
				case ('warning'):
					toastr.warning("{{ Session('message') }}");
					break;
				case ('error'):
					toastr.error("{{ Session('message') }}");
					break;
			}

		@endif

	</script>


	@yield('page-scripts')