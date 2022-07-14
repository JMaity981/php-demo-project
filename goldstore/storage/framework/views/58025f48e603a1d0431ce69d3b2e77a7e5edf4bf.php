<script>
	$('#table1').DataTable();
</script>
<style>
	.p-15{
		padding-right: 15px;
	}
	.cheekbox{
		width:30px !important;
		height:30px !important;
	}
</style>
<table class="table table-striped table-bordered" id="table1">
	<thead class="thead-dark">
		<tr>
			<th scope="col">Serial No</th>
			<th scope="col">Sample</th>
			<th scope="col">Weight</th>
			<th scope="col">Purity</th>
			<th scope="col">Service Charges</th>
			<th scope="col">Paid</th>
			<th scope="col"></th>
		</tr>
	</thead>
	<tbody class="render-sample-list">
		<?php $__currentLoopData = $data['getexchangesample']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<th scope="row"><?php echo e($value['sl_no']); ?> <input type="hidden" value="<?php echo e($value['id']); ?>" class="hiddenid"></th>
				<td style="width:90px !important;"><?php echo e($value['sample_name']); ?></td>
				<td>
					<?php echo e($value['weight']); ?>

					<input type="hidden" class="alloy_wait" name="hidden_weight" value="<?php echo e($value['weight']); ?>">
				</td>
				<td style="width:95px !important;">  
					<span class="purity-value<?php echo e($value['id']); ?>"><?php echo e($value['purity']); ?></span>
					<input type="text" class="form-control input-sm purity<?php echo e($value['id']); ?> d-none" value="<?php echo e($value['purity']); ?>">
				</td>
				<td>
					<span class="service-value<?php echo e($value['id']); ?>"><?php echo e($value['service_charge']); ?></span>
					<input type="text" class="form-control input-sm service-charge<?php echo e($value['id']); ?> d-none" value="<?php echo e($value['service_charge']); ?>">
				</td>
				<td>
					<div class="form-check form-check-inline due-checkbox<?php echo e($value['id']); ?> d-none">
						<input class="form-check-input cheekbox" type="checkbox" id="inlineCheckbox2" value="P" name="gender<?php echo e($value['id']); ?>" 		<?php echo e($value['paid_status'] == 'P' ? 'checked' : ''); ?>>
						<label class="form-check-label" for="inlineCheckbox2"></label>
					</div>
				</td>
				<td>
					<button type="button" class="btn btn-primary btn-sm ml-4 open-tbl-frm edittable-add-data<?php echo e($value['id']); ?>" data-id="<?php echo e($value['id']); ?>">
						<i class="fadeIn animated bx bx-edit"></i>
					</button>
				</td>
				
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table><?php /**PATH C:\xampp\htdocs\resources\views/recived/renderSampleList.blade.php ENDPATH**/ ?>