@extends('common.layout')
@section('title', 'Statement')
@section('style')
    {!! Html::style('public/assets/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/assets/plugins/select2/css/select2-bootstrap4.css') !!}
    {!! Html::style('public/assets/plugins/notifications/css/lobibox.min.css') !!}
    {!! Html::style('public/assets/npm/daterangepicker/daterangepicker.css') !!}
	{!! Html::style('public/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') !!}
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
		StatementJs.PartyDeuAndDepositeStatement();
    </script>
 
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h5 class="mb-0">Search Due and Deposit Statement</h5>
            </div>
            <hr />
           @include('common.commonStatementSearch')
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
@endsection
