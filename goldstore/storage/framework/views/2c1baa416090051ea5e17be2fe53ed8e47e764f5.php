<div class="row">
	<div class="col-md-12 col-sm-12 col-lg-12">
		<div class="">
			<div class="">
				<div class="row">					
					
					<div class="col-md-12">
						<div class="row">
							<input type="hidden" class="hidden-value">
							<div class="col-md-6">
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
			</div>
		</div>
	</div>
</div><?php /**PATH C:\xampp\htdocs\resources\views/common/commonProprietorDetails.blade.php ENDPATH**/ ?>