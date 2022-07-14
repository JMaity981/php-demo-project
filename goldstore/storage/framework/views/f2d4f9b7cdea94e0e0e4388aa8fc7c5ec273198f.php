
<?php $__env->startSection('title', 'Ledger'); ?>
<?php $__env->startSection('style'); ?>
	<?php echo Html::style('public/assets/plugins/datatable/css/dataTables.bootstrap4.min.css'); ?>

	<?php echo Html::style('public/assets/plugins/datatable/css/buttons.bootstrap4.min.css'); ?>

	<?php echo Html::style('public/assets/plugins/notifications/css/lobibox.min.css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
	<?php echo Html::script('public/assets/plugins/notifications/js/lobibox.min.js'); ?>

	<?php echo Html::script('public/assets/plugins/notifications/js/notifications.min.js'); ?>

	<?php echo Html::script('public/assets/plugins/datatable/js/jquery.dataTables.min.js'); ?>

	<?php echo Html::script('public/assets/js/sweetalert.js'); ?>

	<?php echo Html::script('public/assets/pages-js/Lager.js'); ?>

	
	<script>
		LagerJs.Lager();
		CommonJS.NumberValidation();
	</script>
	<script>
		function img_pathUrl(input){
		    if(input.files[0] != ''){
		        $('#img_url').removeClass('d-none');
		        $('#img_url')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
		    }
		}
	</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="color-acordians">
		<div id="accordion2" class="accordion">
			<div class="card">
				<div class="card-header collapsed bg-primary cursor-pointer" data-toggle="collapse" href="#collapsefour">	
					<a class="card-title text-white collapse-title">
						Ledger List
					</a>
				</div>
				<div id="collapsefour" class="card-body collapse" data-parent="#accordion2">
					<?php echo e(Form::open(array('url' => 'add-lager' , 'id' => 'lager' , 'autocomplete' => 'off' , 'files' => 'true' , 'enctype' => "multipart/form-data"))); ?>

						<input type = "hidden" name="hidden_userid" class="hiddenuserid">
						<input type = "hidden" name = "hidden_mb_no" class = "hidden_mb_no">
						<input type = "hidden" name = "hidden_file_name" class = "hidden_file_name">
						<div class="row">
							<div class="col-md-4 col-sm-4 col-lg-4">
								<div class="form-group">
									<label>Jewellers Name:</label>
									<input type="text" class="form-control jewelry_name" placeholder="Enter Jewellers Name" name="jewelry_name">
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-lg-4">
								<div class="form-group">
									<label>Proprietor Name:</label>
									<input type="text" class="form-control proprietor_name" placeholder="Enter Proprietor Name" name="proprietor_name">
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-lg-4">
								<div class="form-group">
									<label>Phone Number:</label>
									<input type="text" class="form-control number-validate phoneno" placeholder="Enter mobile number" name="phoneno">
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-lg-4">
								<div class="form-group">
									<label>Gst Number:</label>
									<input type="text" class="form-control gst_number" placeholder="Enter Gst Number" name="gst_number">
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-lg-4">
								<div class="form-group">
									<label>User Image:</label>
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="user_photo">
										<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-lg-4">
								<div class="form-group">
									<label>Address:</label>
									<textarea class="form-control" id="validationTextarea" placeholder="Enter address" name="address"></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-10"></div>
							<div class="col-md-2 col-sm-2 col-lg-2">
								<button type="submit" class="btn btn-primary user-reg-btn float-right">Save</button>
							</div>
						</div>
					<?php echo e(Form::close()); ?>

				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table id="user_list_tbl" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
									<th>Proprietor Name</th>
									<th>Jewellers Name</th>
									<th>Phone No</th>
									<th>GST Number</th>
									<th style="width: 0px;">Is Active</th>
									<th style="width: 0px;">Action</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	
					
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\goldstore\resources\views/lager/Lager.blade.php ENDPATH**/ ?>