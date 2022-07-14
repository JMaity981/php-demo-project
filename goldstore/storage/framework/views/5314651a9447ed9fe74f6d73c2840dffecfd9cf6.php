
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('style'); ?>
	<?php echo Html::style('public/assets/plugins/select2/css/select2.min.css'); ?>

	<?php echo Html::style('public/assets/plugins/select2/css/select2-bootstrap4.css'); ?>

	<?php echo Html::style('public/assets/plugins/notifications/css/lobibox.min.css'); ?>

	<style>
		.mt-32{
			margin-top: 32px;
		}
		.dataTables_filter{
			margin-left: 92px !important;
		}
		.dataTables_info{
			padding-top: 13px;
		}
		.pagination{
			padding-left: 173px;
			padding-top: 10px;
		}
		.dataTables_length{
			padding-top: 9px;
		}
		.test{
			width: 80px;
		} 
		.tbl-loader{
			overflow-x: hidden;
		}
	</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
	
	<?php echo Html::script('public/assets/pages-js/Recived.js'); ?>

	<?php echo Html::script('public/assets/plugins/select2/js/select2.min.js'); ?>

	<?php echo Html::script('public/assets/plugins/datatable/js/jquery.dataTables.min.js'); ?>

	<?php echo Html::script('public/assets/plugins/notifications/js/lobibox.min.js'); ?>

	<?php echo Html::script('public/assets/plugins/notifications/js/notifications.min.js'); ?>

	
	<script>
		CommonJS.SingleDropdown();
		CommonJS.NumberValidation();
		CommonJS.commonProprietorDetaild();
		RecivedJs.Recived();
	</script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">Received</div>
		<div class="tab-content mt-3">
			<div class="tab-pane fade show active" id="Recived">
				<div class="card-body">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<input type="hidden" class="hidden-value">
								<div class="col-md-2 col-sm-2 col-lg-2">
									<div class="form-group">
										<label>Serial No:</label>
										<input class="form-control serial_no" type="text" placeholder="Serial No" value="<?php echo e($data['serialno'][0]['serial_no']); ?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Select Jewellers Name / Proprietor Name:</label>
										<select class = "single-select jewelryname" id="jn" >
											<option value="" disabled selected>Select Jewellers Name / Proprietor Name</option>
											<?php $__currentLoopData = $data['lager']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $jewelryname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($jewelryname['id']); ?>"><?php echo e($jewelryname['jewelry_name']); ?> / <?php echo e($jewelryname['proprietor_name']); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
										
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-lg-4">
									<div class="form-group">
										<label>Address:</label>
										<input class="form-control address" type="text" placeholder="Address" disabled>
									</div>
								</div>
								<div class="col-md-2 col-sm-2 col-lg-2">
									<div class="form-group">
										<label>Phone No:</label>
										<input class="form-control phone_no" type="text" placeholder="Phone no">
									</div>
								</div>
							</div>
						</div>
						
					</div>
					
					<div class="row">
						<div class="col-md-5">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12 col-sm-12 col-lg-12">
											<span class="frm-append">
												<?php echo e(Form::open(array('url' => 'add-sample-wait', 'class' => 'add-sample-form'))); ?>

													<input type="hidden" class="hidden_serialno" name="hiddenserialno" value="<?php echo e($data['serialno'][0]['serial_no']); ?>">
													<input type="hidden" class="hiddenlager" name="hidden_lager_id" value='0'>
													<div class="row customer-not-ledger">
														<div class="col-md-12 col-sm-12 col-lg-12">
															<div class="form-group">
																<label>Customer Name:</label>
																<input class="form-control customer_name" type="text" placeholder="Enter Customer Name" name="customer_name">
															</div>
														</div>
													</div>
													<div class="row add-sample-row">
														<div class="col-md-5 col-sm-5 col-lg-5">
															<div class="form-group">
																<label>Sample Name:</label>
																<input class="form-control sample_name" type="text" placeholder="Sample Name" name="samplename[]">
															</div>
														</div>
														<div class="col-md-5 col-sm-5 col-lg-5 mb-3 gold-weight-fg">
															<label for="validationCustom02">Gold Weight:</label>
															<div class="input-group mb-3">
																<input type="text" placeholder="Gold Weight" class="form-control number-validate gold-weight" name="gold_weight[]">
																<div class="input-group-append">	
																	<span class="input-group-text">gm</span>
																</div>
															</div>
														</div>
														<div class="col-md-2 col-sm-2 col-lg-2">
															<button type="button" class="btn btn-primary btn-sm mt-32 append-frm-btn">
																<i class="fadeIn animated bx bx-plus"></i>
															</button>
														</div>
													</div>
												
											</span>
										</div>
										<div class="col-md-8"></div>
										<div class="col-md-4">
											<button type="submit" class="btn btn-primary btn-sm ml-4">
												<i class="fadeIn animated bx bx-save"></i>
											</button>
										</div>
										<?php echo e(Form::close()); ?>

									</div>
								</div>
							</div>
						</div>
						<div class="col-md-7">
							<div class="card">
								<div class="card-body">
									<div class="testing">
										<div class="table-responsive tbl-loader">
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/recived/recived.blade.php ENDPATH**/ ?>