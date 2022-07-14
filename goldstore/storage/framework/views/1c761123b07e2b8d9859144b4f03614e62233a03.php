
<?php $__env->startSection('title', 'Booking'); ?>
<?php $__env->startSection('style'); ?>
    <?php echo Html::style('public/assets/plugins/select2/css/select2.min.css'); ?>

    <?php echo Html::style('public/assets/plugins/select2/css/select2-bootstrap4.css'); ?>

	<?php echo Html::style('public/assets/plugins/notifications/css/lobibox.min.css'); ?>

	<?php echo Html::style('public/assets/daterangepicker/daterangepicker.css'); ?>

	<?php echo Html::style('public/assets/plugins/datatable/css/dataTables.bootstrap4.min.css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php echo Html::script('public/assets/plugins/select2/js/select2.min.js'); ?>

	<?php echo Html::script('public/assets/plugins/notifications/js/notifications.min.js'); ?>

    <?php echo Html::script('public/assets/plugins/datatable/js/jquery.dataTables.min.js'); ?>

	<?php echo Html::script('public/assets/js/sweetalert.js'); ?>


	
	<?php echo Html::script('public/assets/js/moment.js'); ?>

	<?php echo Html::script('public/assets/daterangepicker/daterangepicker.js'); ?>

	<?php echo Html::script('public/assets/pages-js/booking.js'); ?>

	<script>
		CommonJS.NumberValidation();
		CommonJS.SingleDropdown();
		CommonJS.commonProprietorDetaild();
		BookingJs.Booking();
	</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="card">
	<div class="card-body">
		<div class="card-title">
			<div class="row">
				<div class="col-md-3">
					<h4 class="mb-0">Ledger</h4>
				</div>
				<div class="col-md-3"></div>
				<div class="col-md-2">
					<div class="btn-group m-1 float-right" role="group" aria-label="Basic example">
						<button type="button" class="btn btn-dark">Booking</button>
						<button type="button" class="btn btn-primary booking_value">00.000</button>
					</div>
				</div>
				<div class="col-md-2">
					<div class="btn-group m-1 float-right" role="group" aria-label="Basic example">
						<button type="button" class="btn btn-dark">GOLD</button>
						<button type="button" class="btn btn-primary gold_value">00.000</button>
					</div>
				</div>
				<div class="col-md-2">
					<div class="btn-group m-1 float-right" role="group" aria-label="Basic example">
						<button type="button" class="btn btn-dark">CASH</button>
						<button type="button" class="btn btn-primary cash_value">00.000</button>
					</div>
				</div>
			</div>
		</div>
		<hr/>
		<?php echo $__env->make('common.commonProprietorDetails', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<div class="card-title">
			<h4 class="mb-0">Booking</h4>
		</div>
		<hr/>
		<?php echo e(Form::open(array('url' => 'insert-booking', 'id' => 'bookingForm'))); ?>

			<input type="hidden" class="from-control hiddenlager" name="hidden">
			<div class="form-row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<div class="row">
						<div class="col-md-3 col-sm-3 col-lg-3">
							<div class="form-group">
								
								<input class="form-control booking_no" type="hidden" value="<?php echo e($data['booking_no'][0]['booking_no']); ?>" name="booking_no">
							</div>
						</div>
					</div>
				</div>

				<input type="hidden" name="lager_id">
				<div class="col-md-2 col-sm-2 col-lg-2">
					<div class="input-group mb-3">
						<label for="validationCustom03">Sale Purchase Type:</label><br>
						<div class="wraper">
							<input type="radio" name="select_type" id="s_id" value="S" checked>
							<input type="radio" name="select_type" id="p_id" value="P">
							<label for="s_id" class="option sale-option">
								<div class="sales dot"></div>
								<span>sales</span>
								</label>
							<label for="p_id" class="option purchase-option">
								<div class="purchase dot"></div>
								<span>purchase</span>
							</label>
						</div>
					</div>
				</div>
				<div class="col-md-3 mb-3 form-group select2">
					<label for="validationCustom02">Gold Weight:</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">	<span class="input-group-text">Weight</span>
						</div>
						<input type="text" class="form-control number-validate g_w" name="gold_weight" placeholder="Enter Gold Weight">
						<div class="input-group-append">	<span class="input-group-text">gm</span>
						</div>
					</div>
				</div>
				<div class="col-md-3 mb-3 gold-weight-fg">
					<label for="validationCustom02">Rate(per gram):</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">	<span class="input-group-text bg-transparent"><svg xmlns="http://www.w3.org/2000/svg" class="text-primary" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" id="footer-icon-name" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M17 6V4H6v2h3.5c1.302 0 2.401.838 2.815 2H6v2h6.315A2.994 2.994 0 0 1 9.5 12H6v2.414L11.586 20h2.828l-6-6H9.5a5.007 5.007 0 0 0 4.898-4H17V8h-2.602a4.933 4.933 0 0 0-.924-2H17z" fill="currentColor"></path></svg></span>
						</div>
						<input type="text" class="form-control number-validate rate" name="ammount_gram" value=<?php echo e($data['sale']['sale_rate']); ?>>
						<div class="input-group-append">	<span class="input-group-text">/gm</span>
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4">
					<label for="validationCustom02">Total Amount:</label>
					<div class="input-group">
						<div class="input-group-prepend">	<span class="input-group-text bg-transparent"><svg xmlns="http://www.w3.org/2000/svg" class="text-primary" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" id="footer-icon-name" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M17 6V4H6v2h3.5c1.302 0 2.401.838 2.815 2H6v2h6.315A2.994 2.994 0 0 1 9.5 12H6v2.414L11.586 20h2.828l-6-6H9.5a5.007 5.007 0 0 0 4.898-4H17V8h-2.602a4.933 4.933 0 0 0-.924-2H17z" fill="currentColor"></path></svg></span>
						</div>
						<input type="text" class="form-control border-left-0 number-validate ammount" name="ammount" placeholder="Total Amount" id="ammount">
					</div>
				</div>
				<div class="col-md-2 mb-3">
					<label for="validationCustom02">&nbsp;</label>
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="sms_enabled" id="customCheck4">
						<label class="custom-control-label" for="customCheck4">SMS Enabled ?</label>
					</div>
				</div>
				<div class="col-md-8 mb-3">
					<label for="validationCustom02">Remarks:</label>
					<div class="input-group">
						<div class="input-group-prepend">	<span class="input-group-text bg-transparent"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 36 36"><path d="M33 6.4l-3.7-3.7a1.71 1.71 0 0 0-2.36 0L23.65 6H6a2 2 0 0 0-2 2v22a2 2 0 0 0 2 2h22a2 2 0 0 0 2-2V11.76l3-3a1.67 1.67 0 0 0 0-2.36zM18.83 20.13l-4.19.93l1-4.15l9.55-9.57l3.23 3.23zM29.5 9.43L26.27 6.2l1.85-1.85l3.23 3.23z" class="clr-i-solid clr-i-solid-path-1 text-primary" fill="currentColor"/></svg></span>
						</div>
						<input type="text" name="remarks" class="form-control border-left-0" placeholder="Your Remarks...">
					</div>
				</div>
				<div class="form-group col-md-2 text-right">
					<label for="validationCustom02">&nbsp;</label>
					<div class="custom-control custom-checkbox">
						<button class="btn btn-primary finish-btn px-4" type="submit"><svg class="mr-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><path d="M29.548 3.043a2.5 2.5 0 0 0-3.513.4L16 16.067l-3.508-4.414a2.5 2.5 0 0 0-3.915 3.112l5.465 6.875c.474.597 1.195.943 1.957.943s1.482-.35 1.957-.944L29.95 6.555c.86-1.08.68-2.654-.402-3.513zM24.5 24.5h-17v-17h12.756l2.385-3H6c-.83 0-1.5.67-1.5 1.5v20c0 .828.67 1.5 1.5 1.5h20a1.5 1.5 0 0 0 1.5-1.5V12.85l-3 3.774V24.5z" fill="currentColor"/></svg>Booked</button>
					</div>
				</div>
			</div>
		<?php echo e(Form::close()); ?>

		
	</div>
</div>

<div class='card'>
	<div class="col-md-12 card-body render-info-box">
	</div>
</div>

<div class="card">
	<div class="card-body">
		<div class="card-title">
			<div class="row">
				<div class="col-md-2">
					<h4 class="mb-0">Booking Table</h4>
				</div>
				<div class="col-md-10">
						<div class="form-row">
							<div class="col-md-3 col-sm-3 col-lg-3">
								<input type="hidden" name="daterange" class="form-control daterange_value">
								<div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
									<i class="fa fa-calendar"></i>&nbsp;
									<span></span> <i class="fa fa-caret-down"></i>
								</div>
							</div>
							<div class="col-md-8 col-sm-8 col-lg-8 p-l-20">
								<label class="fs-18">
    								SALE
  								</label>
								<input type="checkbox" class="w-28 h-18 sale" name="sale">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<label  class="fs-18">
    								PURCHASE
    								<input type="checkbox" name="purchase" class="w-28 h-18 purchase">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  								</label>
								<label  class="fs-18">
									PENDING
								<input type="checkbox" name="pending" class="w-28 h-18 pending">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  								</label>
								<label class="fs-18">
    								BILLED
    								<input type="checkbox" name="bill"  class="w-28 h-18 bill">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  								</label>
								<label  class="fs-18">
    								CANCELED
    								<input type="checkbox" name="cancel"  class="w-28 h-18 cancel">
  								</label>
							</div>
							<div class="ml-auto">
								<button class="btn btn-primary finish-btn sarchtable" type="button">Search</button>
							</div>
						</div>
				</div>
				
			</div>
		</div>
		<hr />
		<table class="table table-bordered" id="booking_tbl">
			<thead class="thead-dark ">
				<tr>
					<th scope="col">Date</th>
					<th scope="col">Type</th>
					<th scope="col">Jewellers Name</th>
					<th scope="col">Remarks</th>
					<th scope="col">Weight</th>
					<th scope="col">Rate</th>
					<th scope="col">Amount</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				
			</tbody>
		</table>
	</div>
</div>
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/booking/booking.blade.php ENDPATH**/ ?>