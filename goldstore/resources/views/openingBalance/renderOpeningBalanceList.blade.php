@php
	//print_r($data);die;
@endphp

@if(!empty($data))
<!--=========== for cash value ============-->

	<div class="col-md-6 col-lg-6 col-sm-6">
		<div class="card radius-15 bg-voilet">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<h2 class="mb-0 text-white">{{$data[0]['cash_stock']}} </h2>
					</div>
					<div class="ml-auto font-35 text-white"><i class="fadeIn animated bx bx-money"></i>
					</div>
				</div>
				<div class="d-flex align-items-center">
					<div>
						<p class="mb-0 text-white">In Cash</p>
					</div>
					
				</div>
			</div>
		</div>
	</div>

	<!--========== for Fine gold value ==========-->

<div class="col-md-6 col-lg-6 col-sm-6">
	<div class="card radius-15 bg-sunset">
		<div class="card-body">
			<div class="d-flex align-items-center">
				<div>
					<h2 class="mb-0 text-white">{{$data[0]['fine_stock']}}</h2>
				</div>
				<div class="ml-auto font-35 text-white"><i class="fadeIn animated bx bx-coin"></i>
				</div>
			</div>
			<div class="d-flex align-items-center">
				<div>
					<p class="mb-0 text-white">In Fine Gold</p>
				</div>
				
			</div>
		</div>
	</div>
</div>

	<!--========== for Parchan Alloy value ==========-->

<div class="col-md-6 col-lg-6 col-sm-6">
	<div class="card radius-15 bg-danger">
		<div class="card-body">
			<div class="d-flex align-items-center">
				<div>
					<h2 class="mb-0 text-white">{{$data[0]['alloy_parchan']}}</h2>
				</div>
				<div class="ml-auto font-35 text-white"><i class="fadeIn animated bx bx-coin"></i>
				</div>
			</div>
			<div class="d-flex align-items-center">
				<div>
					<p class="mb-0 text-white">In Parchan (alloy)</p>
				</div>
				<div class="ml-auto font-14 text-white">123</div>
			</div>
		</div>
	</div>
</div>

	<!--========== for Alloy gold value ==========-->

<div class="col-md-6 col-lg-6 col-sm-6">
	<div class="card radius-15 bg-info">
		<div class="card-body">
			<div class="d-flex align-items-center">
				<div>
					<h2 class="mb-0 text-white">{{$data[0]['alloy_gold']}}</h2>
				</div>
				<div class="ml-auto font-35 text-white"><i class="fadeIn animated bx bx-coin"></i>
				</div>
			</div>
			<div class="d-flex align-items-center">
				<div>
					<p class="mb-0 text-white">In Gold (alloy)</p>
				</div>
				<div class="ml-auto font-14 text-white">123</div>
			</div>
		</div>
	</div>
</div>

@else
	<div class="col-md-12 col-sm-12 col-lg-12">
		<div class="alert alert-danger alert-dismissible fade show" role="alert">No opening balance was added!</div>
	</div>	
@endif
