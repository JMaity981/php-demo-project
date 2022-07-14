
<?php $__env->startSection('title', 'Statement'); ?>
<?php $__env->startSection('style'); ?>
    <?php echo Html::style('public/assets/plugins/select2/css/select2.min.css'); ?>

    <?php echo Html::style('public/assets/plugins/select2/css/select2-bootstrap4.css'); ?>

    <?php echo Html::style('public/assets/plugins/notifications/css/lobibox.min.css'); ?>

    <?php echo Html::style('public/assets/npm/daterangepicker/daterangepicker.css'); ?>

	<?php echo Html::style('public/assets/plugins/datatable/css/dataTables.bootstrap4.min.css'); ?>

    <style>
        td.table-credit-edit{
			background-color: green;
            color: white;
            font-size:15px;
		}
        td.table-debit-edit{
			background-color: red;
            color: white;
            font-size:15px;
		}
    </style>
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
		StatementJs.PartyDeuAndDepositeStatement();
    </script>
 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h5 class="mb-0">Search Due and Deposit Statement</h5>
            </div>
            <hr />
           <?php echo $__env->make('common.commonStatementSearch', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <div class="card">
        <input type="hidden" class="hidden_tbl_id_money" value="partydeudepositstatment_tbl_money">
        <input type="hidden" class="hidden_tbl_id" value="partydeudepositstatment_tbl_gold">
        <div class="card-body">
            <div class="card-title">
                <h5></h5>
                <div class="row">
					<div class="col-md-6">
						<h5 class="mb-0">Party Due and Deposit Statement List</h5>
					</div>
					<div class="col-md-3"></div>
					<div class="col-md-3">
						<button type="button" class="btn btn-primary btn-sm ml-5 party-statement-download float-right">Download Statement</button>
					</div>
				</div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-6">
                    <div class="card-title">
                        <h5><center>Money/Amount</center></h5>
                    </div>
                    <hr />
                    <table class="table table-bordered" id="partydeudepositstatment_tbl_money">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Remarks</th>
                                <th scope="col">Credit</th>
                                <th scope="col">Debit</th>
                                <th scope="col">+/-</th>
                                <th scope="col">Balance</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="col-md-6">
                    <div class="card-title">
                        <h5><center>GOLD</center></h5>
                    </div>
                    <hr />
                    <table class="table table-bordered" id="partydeudepositstatment_tbl_gold">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Remarks</th>
                                <th scope="col">Credit</th>
                                <th scope="col">Debit</th>
                                <th scope="col">+/-</th>
                                <th scope="col">Balance</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/statement/partydeudepositstatment.blade.php ENDPATH**/ ?>