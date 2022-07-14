<!DOCTYPE html>
<html lang="en" class="dark-header">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>Gold Store - @yield('title') </title>
	<!--favicon-->
	 {!! Html::style('public/assets/plugins/metismenu/css/metisMenu.min.css') !!}
    {!! Html::style('public/assets/plugins/simplebar/css/simplebar.css') !!}
    {!! Html::style('public/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') !!}
   
    {!! Html::style('public/assets/css/pace.min.css') !!}
    {!! Html::style('public/assets/js/pace.min.js') !!}
    {!! Html::style('public/assets/css/bootstrap.min.css') !!}
    {!! Html::style('public/assets/css/icons.css') !!}
    {!! Html::style('public/assets/css/app.css') !!}
    {!! Html::style('public/assets/css/dark-header.css') !!}
    {!! Html::style('public/assets/css/dark-theme.css') !!}
	{!! Html::style('public/assets/css/custom.css') !!}
	{!! Html::style('public/assets/css/select2.min.css') !!}
	{!! Html::style('public/assets/css/style.css') !!}
	<link rel="icon" href="public/assets/images/favicon.png" type="image/png" />
	<!--plugins-->
	
    @yield('style')
</head>

<body>
	<!-- wrapper -->
	<div class="wrapper">
		<!--header-->
		@include('common.header')
		<!--end header-->
		<!--navigation-->
		<div class="nav-container">
			<!--<div class="mobile-topbar-header">
				<div class="">
					<img src="public/assets/images/logo-icon.png" class="logo-icon-2" alt="" />
				</div>
				<div>
					<h4 class="logo-text">Supedia</h4>
				</div>
				<a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
				</a>
			</div>-->
			<nav class="topbar-nav">
				@include('common.menubar')
			</nav>
		</div>
		<!--end navigation-->
		<!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				<div class="page-content">
					<!--breadcrumb-->
					<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
						<div class="breadcrumb-title pr-3"><a href="javascript:;"><i class='bx bx-home-alt'></i> NARAYANI </a></div>
						@foreach($data['breadcrumb'] as $value)
						<div class="pl-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item">
										<a href="javascript:;"></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">
										<a href="{{url($value['0'])}}"> {{$value['1']}} </a>
									</li>
								</ol>
								
							</nav>
							
						</div>
						@endforeach
					</div>
					<!--end breadcrumb-->
                    @yield('content')
					
				</div>
			</div>
			<!--end page-content-wrapper-->
		</div>
		<!--end page-wrapper-->
		
		<!--start overlay-->
		<div class="overlay toggle-btn-mobile"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javascript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<!--footer -->
		<div class="footer">
			<p class="mt-3">Copyright © <?php echo date("Y"); ?> <a target="_blank" href="https://softamassindia.com">Soft Amass India</a> </p>
		</div>
		<!-- end footer -->
	</div>
	<!-- end wrapper -->
	
	<!--start common modal-->
	<div class="modal fade" id="commonModallg" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">	
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
				</div>
			</div>
		</div>
	</div>
	<!--end common modal-->
	
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript">
        var base_url = "@php echo url('/'); @endphp";
    </script>
	
    {!! Html::script('public/assets/js/jquery.min.js') !!}
    {!! Html::script('public/assets/js/popper.min.js') !!}
    {!! Html::script('public/assets/js/bootstrap.min.js') !!}
	{!! Html::script('public/assets/js/validate.js') !!}
    {!! Html::script('public/assets/plugins/simplebar/js/simplebar.min.js') !!}
    {!! Html::script('public/assets/plugins/metismenu/js/metisMenu.min.js') !!}
    {!! Html::script('public/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') !!}
    {!! Html::script('public/assets/js/app.js') !!}
    {!! Html::script('public/assets/js/select2.min.js') !!}
	{!! Html::script('public/assets/pages-js/Common.js') !!}
	<script type="text/javascript">
		try {
            <?php if (isset($data['main_menu'])) { echo "CommonJS.MenuActive('" . $data['main_menu'] . "','".$data['sub_menu']."')"; }?>
        }
        catch(e) {}
	</script>
	<script>
		/*$(document).click(function (event) {
			//alert('ok')
			$('.navbar-collapse').collapse('hide');
		});*/
	</script>
    @yield('script')
</body>

</html>