
<?php echo Html::style('public/assets/npm/daterangepicker/daterangepicker.css'); ?>


<div class="form-row">
	<div class="col-md-4">
		<div class="form-group">
			<label>Date Range</label>
			
			<input type="hidden" name="daterange" class="form-control daterange">
			<div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
				<i class="fa fa-calendar"></i>&nbsp;
				<span></span> <i class="fa fa-caret-down"></i>
			</div>
		</div>
	</div>
	<input type = "hidden" class="hidden_pageno" value="0">
	<input type="hidden" class="hidden_filepath" value="">
	<div class="col-md-5">
		<div class="form-group">
			<label>Select Jewellers Name / Proprietor Name</label>
			<select class="single-select proprietor-name" name="propiter_name">
				<option value="" disabled selected>Select Jewellers Name / Proprietor Name</option>
				 <?php $__currentLoopData = $data['lager']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $customer_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($customer_data['id']); ?>"><?php echo e($customer_data['jewelry_name']); ?> / <?php echo e($customer_data['proprietor_name']); ?> </option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
			</select>
		</div>
	</div>
	<?php if(Request::path() == 'our-sale-and-parchase'): ?>
		<div class="col-md-2">
			<br><br>
			<label class="fs-18">GST</label>
			<input type="checkbox" class="w-28 h-18 is_gst" name="is_gst">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label class="fs-18"> Non GST</label>
			<input type="checkbox" class="w-28 h-18 non_gst" name="non_gst">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
	<?php endif; ?>
	<div class="col-md-1">
		<label for="validationCustom02">&nbsp;</label>
		<div class="form-group">
			<button class="btn btn-primary sale-parchase-search" type="button">Search</button>
		</div>
	</div>
	
	<!--<div class="col-md-2">
		<div class="form-group">
			<button class="btn btn-primary sale-parchase-search mt-4" type="button">Search</button>
		</div>
	</div>-->
</div>

<?php echo Html::script('public/assets/momentjs/latest/moment.min.js'); ?>

<?php echo Html::script('public/assets/npm/daterangepicker/daterangepicker.min.js'); ?>

<script>
	$(function() {
		var start = moment().subtract(29, 'days');
		var end = moment();

		function cb(start, end) {
			$('#reportrange span').html(start.format('D/MM/YYYY') + ' - ' + end.format('D/MM/YYYY'));
			$(".daterange").val(start.format('D/MM/YYYY') + ' - ' + end.format('D/MM/YYYY'));
		}

		$('#reportrange').daterangepicker({
			"autoApply": true,
			startDate: start,
			endDate: end,
			ranges: {
			'Today': [moment(), moment()],
			'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			'Last 7 Days': [moment().subtract(6, 'days'), moment()],
			'Last 30 Days': [moment().subtract(29, 'days'), moment()],
			'This Month': [moment().startOf('month'), moment().endOf('month')],
			'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			}
		}, cb);

		cb(start, end);
		//$(".sarchtable").trigger("click");
	});
</script><?php /**PATH C:\xampp\htdocs\resources\views/common/commonStatementSearch.blade.php ENDPATH**/ ?>