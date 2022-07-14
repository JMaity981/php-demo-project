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
		@foreach($data['getexchangesample'] as $value)
			<tr>
				<th scope="row">{{$value['sl_no']}} <input type="hidden" value="{{$value['id']}}" class="hiddenid"></th>
				<td style="width:90px !important;">{{$value['sample_name']}}</td>
				<td>
					{{$value['weight']}}
					<input type="hidden" class="alloy_wait" name="hidden_weight" value="{{$value['weight']}}">
				</td>
				<td style="width:95px !important;">  
					<span class="purity-value{{$value['id']}}">{{$value['purity']}}</span>
					<input type="text" class="form-control input-sm purity{{$value['id']}} d-none" value="{{$value['purity']}}">
				</td>
				<td>
					<span class="service-value{{$value['id']}}">{{$value['service_charge']}}</span>
					<input type="text" class="form-control input-sm service-charge{{$value['id']}} d-none" value="{{$value['service_charge']}}">
				</td>
				<td>
					<div class="form-check form-check-inline due-checkbox{{$value['id']}} d-none">
						<input class="form-check-input cheekbox" type="checkbox" id="inlineCheckbox2" value="P" name="gender{{$value['id']}}" 		{{$value['paid_status'] == 'P' ? 'checked' : ''}}>
						<label class="form-check-label" for="inlineCheckbox2"></label>
					</div>
				</td>
				<td>
					<button type="button" class="btn btn-primary btn-sm ml-4 open-tbl-frm edittable-add-data{{$value['id']}}" data-id="{{$value['id']}}">
						<i class="fadeIn animated bx bx-edit"></i>
					</button>
				</td>
				{{-- <td>
					<span class="rr"></span>
				</td> --}}
			</tr>
		@endforeach
	</tbody>
</table>