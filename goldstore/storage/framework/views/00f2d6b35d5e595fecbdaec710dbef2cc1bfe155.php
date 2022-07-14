
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
        CommonJS.SingleDropdown();
        CommonJS.commonDaterange();
		StatementJs.SalePurchase();
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h5 class="mb-0">Search Sale Purchase Statement</h5>
            </div>
            <hr />
			<?php echo $__env->make('common.commonStatementSearch', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <div class="row">
		
        <input type="hidden" class="hidden_tbl_id_sale" value="sale_tbl">
        <input type="hidden" class="hidden_tbl_id_purchase" value="purchase_tbl">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body tbl-loader">
                    <div class="card-title">
						<div class="row">
							<div class="col-md-3">
								<h5 class="mb-0">Sale Purchase Statement List</h5>
							</div>
							<div class="col-md-5"></div>
							<div class="col-md-4">
								<button type="button" class="btn btn-primary btn-sm ml-5 sale-purchase-statement float-right">Download Statement</button>
                                <button type="button" class="btn btn-primary btn-sm ml-5 sale-purchase-non-gst-clear float-right">Save</button>
							</div>
						</div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="card-title">
                                <h5><center>SALE</center></h5>
                            </div>
                            <hr />
                            <table class="table table-bordered" id="sale_tbl">
                                <thead class="thead-dark ">
                                    <tr>
                                        <th scope="col" style="width: 15% !important;">Date</th>
                                        <th scope="col" style="width: 20% !important;">Jewellers Name</th>
                                        <th scope="col" style="width: 19% !important;">Remarks</th>
                                        <th scope="col" style="width: 11% !important;">Gold Weight</th>
                                        <th scope="col" style="width: 13% !important;">Rate</th>
                                        <th scope="col" style="width: 16% !important;">Amount</th>
                                        <th scope="col" style="width: 6% !important;">Is gst</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="card-title">
                                <h5><center>PURCHASE</center></h5>
                            </div>
                            <hr />
                            <table class="table table-bordered" id="purchase_tbl">
                                <thead class="thead-dark ">
                                    <tr>
                                        <th scope="col" style="width: 15% !important;">Date</th>
                                        <th scope="col" style="width: 20% !important;">Jewellers Name</th>
                                        <th scope="col" style="width: 19% !important;">Remarks</th>
                                        <th scope="col" style="width: 11% !important;">Gold Weight</th>
                                        <th scope="col" style="width: 13% !important;">Rate</th>
                                        <th scope="col" style="width: 16% !important;">Amount</th>
                                        <th scope="col" style="width: 6% !important;">Is gst</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/statement/oursaleparchase.blade.php ENDPATH**/ ?>