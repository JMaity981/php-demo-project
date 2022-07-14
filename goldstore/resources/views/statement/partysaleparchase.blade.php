@extends('common.layout')
@section('title', 'Statement')
@section('style')
    {!! Html::style('public/assets/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/assets/plugins/select2/css/select2-bootstrap4.css') !!}
    {!! Html::style('public/assets/plugins/notifications/css/lobibox.min.css') !!}
    {!! Html::style('public/assets/npm/daterangepicker/daterangepicker.css') !!}
    {!! Html::script('public/assets/pages-js/Statement.js') !!}
	{!! Html::style('public/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') !!}
@endsection

@section('script')

    {!! Html::script('public/assets/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('public/assets/plugins/notifications/js/notifications.min.js') !!}
    {!! Html::script('public/assets/momentjs/latest/moment.min.js') !!}
    {!! Html::script('public/assets/npm/daterangepicker/daterangepicker.min.js') !!}
    {!! Html::script('public/assets/plugins/datatable/js/jquery.dataTables.min.js') !!}
    <script>
        CommonJS.SingleDropdown();
		CommonJS.commonDaterange();
		StatementJs.PartySaleParchase();
    </script>
    
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h5 class="mb-0">Search Sale And Purchase Statement</h5>
            </div>
            <hr />
			@include('common.commonStatementSearch')
        </div>
    </div>
    <div class="row">
		<input type="hidden" class="hidden_tbl_id" value="partysaleparchase_tbl">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5>Sale And Purchase Statement List</h5>
                    </div>
                    <hr />
                    <table class="table table-bordered float-right" id="partysaleparchase_tbl">
                        <thead class="thead-dark ">
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Remarks</th>
                                <th scope="col">Cash</th>
                                <th scope="col">Gold</th>
                                <th scope="col">Credit</th>
                                <th scope="col">Debit</th>
                                <th scope="col">+/-</th>
                                <th scope="col">Balance</th>
                            </tr>
                        </thead>
						@for ($i=50; $i>=0; $i--)
						<tbody>
							<td scope="col">1</td>
							<td scope="col">table</td>
							<td scope="col">table</td>
							<td scope="col">table</td>
							<td scope="col">500</td>
							<td scope="col">1000</td>
							<td scope="col">500</td>
							<td scope="col">1000</td>
						</tbody>
						@endfor
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
