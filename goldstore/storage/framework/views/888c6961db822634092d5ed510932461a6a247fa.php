<!DOCTYPE html>
<html lang="en" class="dark-header">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
	<title>Gold Store - <?php echo $__env->yieldContent('title'); ?> </title>
	<!--favicon-->
	 <?php echo Html::style('public/assets/plugins/metismenu/css/metisMenu.min.css'); ?>

    <?php echo Html::style('public/assets/plugins/simplebar/css/simplebar.css'); ?>

    <?php echo Html::style('public/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css'); ?>

   
    <?php echo Html::style('public/assets/css/pace.min.css'); ?>

    <?php echo Html::style('public/assets/js/pace.min.js'); ?>

    <?php echo Html::style('public/assets/css/bootstrap.min.css'); ?>

    <?php echo Html::style('public/assets/css/icons.css'); ?>

    <?php echo Html::style('public/assets/css/app.css'); ?>

    <?php echo Html::style('public/assets/css/dark-header.css'); ?>

    <?php echo Html::style('public/assets/css/dark-theme.css'); ?>

	<?php echo Html::style('public/assets/css/custom.css'); ?>

	<?php echo Html::style('public/assets/css/select2.min.css'); ?>

	<?php echo Html::style('public/assets/css/style.css'); ?>

	<link rel="icon" href="public/assets/images/favicon.png" type="image/png" />
	<!--plugins-->
	
    <?php echo $__env->yieldContent('style'); ?>
</head>

<body>
	<!-- wrapper -->
	<div class="wrapper">
		<!--header-->
		<?php echo $__env->make('common.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
				<?php echo $__env->make('common.menubar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
						<?php $__currentLoopData = $data['breadcrumb']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="pl-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item">
										<a href="javascript:;"></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">
										<a href="<?php echo e(url($value['0'])); ?>"> <?php echo e($value['1']); ?> </a>
									</li>
								</ol>
								
							</nav>
							
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
					<!--end breadcrumb-->
                    <?php echo $__env->yieldContent('content'); ?>
					
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
        var base_url = "<?php echo url('/'); ?>";
    </script>
	
    <?php echo Html::script('public/assets/js/jquery.min.js'); ?>

    <?php echo Html::script('public/assets/js/popper.min.js'); ?>

    <?php echo Html::script('public/assets/js/bootstrap.min.js'); ?>

	<?php echo Html::script('public/assets/js/validate.js'); ?>

    <?php echo Html::script('public/assets/plugins/simplebar/js/simplebar.min.js'); ?>

    <?php echo Html::script('public/assets/plugins/metismenu/js/metisMenu.min.js'); ?>

    <?php echo Html::script('public/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js'); ?>

    <?php echo Html::script('public/assets/js/app.js'); ?>

    <?php echo Html::script('public/assets/js/select2.min.js'); ?>

	<?php echo Html::script('public/assets/pages-js/Common.js'); ?>

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
    <?php echo $__env->yieldContent('script'); ?>
</body>

</html><?php /**PATH C:\xampp\htdocs\goldstore\resources\views/common/layout.blade.php ENDPATH**/ ?>