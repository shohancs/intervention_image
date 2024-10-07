<!doctype html>
<html lang="en" class="semi-dark">

<head>

	
	@include('backend.includes.header')
	@include('backend.includes.css')

	
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">

		@include('backend.includes.menu')
		@include('backend.includes.topbar')

		
		<!--start page wrapper -->
		<div class="page-wrapper">
			@yield('body-content')
		</div>
		<!--end page wrapper -->

		@include('backend.includes.footer')
	</div>
	<!--end wrapper-->

	@include('backend.includes.script')
</body>


</html>