@extends('common.layout')
@section('title', 'Statement')
@section('style')
    {!! Html::style('public/assets/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/assets/plugins/select2/css/select2-bootstrap4.css') !!}
    {!! Html::style('public/assets/plugins/notifications/css/lobibox.min.css') !!}
    {!! Html::style('public/assets/npm/daterangepicker/daterangepicker.css') !!}
    {!! Html::style('public/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') !!}
@endsection

@section('script')
    {!! Html::script('public/assets/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('public/assets/plugins/notifications/js/notifications.min.js') !!}
    {!! Html::script('public/assets/momentjs/latest/moment.min.js') !!}
    {!! Html::script('public/assets/npm/daterangepicker/daterangepicker.min.js') !!}
    {!! Html::script('public/assets/plugins/datatable/js/jquery.dataTables.min.js') !!}
	{!! Html::script('public/assets/pages-js/Statement.js') !!}
    <script>
        CommonJS.SingleDropdown();
		CommonJS.commonDaterange();
		StatementJs.DebitCreditStatement();
    </script>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h5 class="mb-0">Search Debit & Credit Statement</h5>
            </div>
			<hr/>
			@include('common.commonStatementSearch')
        </div>
    </div>
    <div class="card">
		<input type="hidden" class="hidden_tbl_id" value="debitcredit_tbl">
        <div class="card-body">
            <div class="card-title">
                <!--<h5>Debit & Credit Statement List</h5>-->
				<div class="row">
					<div class="col-md-3">
						<h5 class="mb-0">Debit & Credit Statement List</h5>
					</div>
					<div class="col-md-6"></div>
					<div class="col-md-3">
						<button type="button" class="btn btn-primary btn-sm ml-5 debit-credit-statement-pdf float-right">Download Statement</button>
					</div>
				</div>
            </div>
            <hr />
            <table class="table table-bordered" id="debitcredit_tbl">
                <thead class="thead-dark ">
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Jewellers name</th>
                        <th scope="col">Proprietor name</th>
                        <th scope="col">Remarks</th>
                        <th scope="col">Money Deposit</th>
                        <th scope="col">Gold Deposit</th>
                        <th scope="col">Gold Expenditure</th>
                        <th scope="col">Money Expenditure</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
