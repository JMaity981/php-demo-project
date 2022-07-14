
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

    <?php echo Html::script('public/assets/plugins/notifications/js/notifications.min.js'); ?>

    <?php echo Html::script('public/assets/momentjs/latest/moment.min.js'); ?>

    <?php echo Html::script('public/assets/npm/daterangepicker/daterangepicker.min.js'); ?>

    <?php echo Html::script('public/assets/plugins/datatable/js/jquery.dataTables.min.js'); ?>

	<?php echo Html::script('public/assets/pages-js/Statement.js'); ?>

    <script>
        CommonJS.SingleDropdown();
		CommonJS.commonDaterange();
		StatementJs.AllDueDeposit();
    </script>
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    
    <input type = "hidden" class="hidden_pageno" value="0">
	<input type="hidden" class="hidden_filepath" value="">
    <div class="card">
		<input type="hidden" class="hidden_tbl_id" value="alldeudeposite_tbl">
        <div class="card-body">
            <div class="card-title">
				<div class="row">
                    <div class="col-md-3">
                        <h5 class="mb-0">All Due & Deposit Statement List</h5>
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-primary btn-sm ml-5 due-deposit-statement float-right">Download Statement</button>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-6">
                    <div class="card-title">
                        <h5><center>DEPOSIT</center></h5>
                    </div>
                    <hr />
                    <table class="table table-bordered" id="alldeposit_tbl">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">J. Name</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Gold wt.</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="col-md-6">
                    <div class="card-title">
                        <h5><center>DUE</center></h5>
                    </div>
                    <hr />
                    <table class="table table-bordered" id="alldue_tbl">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">J. Name</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Gold wt.</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\goldstore\resources\views/statement/alldeudeposite.blade.php ENDPATH**/ ?>