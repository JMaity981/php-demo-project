
<?php $__env->startSection('title', 'Statement'); ?>
<?php $__env->startSection('style'); ?>
    <?php echo Html::style('public/assets/plugins/select2/css/select2.min.css'); ?>

    <?php echo Html::style('public/assets/plugins/select2/css/select2-bootstrap4.css'); ?>

    <?php echo Html::style('public/assets/plugins/notifications/css/lobibox.min.css'); ?>

    <?php echo Html::style('public/assets/npm/daterangepicker/daterangepicker.css'); ?>

    <?php echo Html::style('public/assets/plugins/datatable/css/dataTables.bootstrap4.min.css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <?php echo Html::script('public/assets/plugins/select2/js/select2.min.js'); ?>

	<?php echo Html::script('public/assets/plugins/notifications/js/lobibox.min.js'); ?>

    <?php echo Html::script('public/assets/plugins/notifications/js/notifications.min.js'); ?>

    <?php echo Html::script('public/assets/momentjs/latest/moment.min.js'); ?>

    <?php echo Html::script('public/assets/npm/daterangepicker/daterangepicker.min.js'); ?>

    <?php echo Html::script('public/assets/plugins/datatable/js/jquery.dataTables.min.js'); ?>

	<?php echo Html::script('public/assets/js/sweetalert.js'); ?>

	<?php echo Html::script('public/assets/pages-js/Statement.js'); ?>

    <script>
        CommonJS.commonDaterange();
        CommonJS.SingleDropdown();
		StatementJs.RefineStatement();
    </script>
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h5 class="mb-0">Search Refine Statement</h5>
            </div>
			<hr />
			<?php echo $__env->make('common.commonStatementSearch', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <div class="card">
		<input type="hidden" class="hidden_tbl_id" value="refinestatment_tbl">
        <div class="card-body tbl-loader">
            <div class="card-title">
                <!--<h4>Refine Statement</h4>-->
				<div class="row">
					<div class="col-md-3">
						<h5 class="mb-0">Refine Statement</h5>
					</div>
					<div class="col-md-6"></div>
					<div class="col-md-3">
						<button type="button" class="btn btn-primary btn-sm ml-5 refine-statement-downlod float-right">Download Statement</button>
					</div>
				</div>
            </div>
            <hr />
            <table class="table table-bordered" id="refinestatment_tbl">
                <thead class="thead-dark ">
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Batch No.</th>
                        <th scope="col">Jewellers name</th>
                        <th scope="col">Proprietor name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Old gold weight</th>
                        <th scope="col">Purity</th>
                        <th scope="col">Fine gold weight</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/statement/refinestatment.blade.php ENDPATH**/ ?>