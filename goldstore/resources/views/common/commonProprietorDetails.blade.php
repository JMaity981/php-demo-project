<div class="row">
	<div class="col-md-12 col-sm-12 col-lg-12">
		<div class="">
			<div class="">
				<div class="row">					
					{{-- <div class="col-md-12 render-info-box">
						<!--<div class="row">
							<div class="col-md-6">
								<div class="card radius-15 bg-voilet">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div>
												<h2 class="mb-0 text-white tot-cash">0000</h2>
											</div>
											<div class="ml-auto font-35 text-white">
												<i class="fadeIn animated bx bx-money"></i>
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
							<div class="col-md-6 col-sm-6 col-lg-6">
								<div class="card radius-15 bg-sunset">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div>
												<h2 class="mb-0 text-white fine-gold">0000</h2>
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
							<div class="col-md-6 col-sm-6 col-lg-6">
								<div class="card radius-15 bg-danger">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div>
												<h2 class="mb-0 text-white alloy-parchan">0000</h2>
											</div>
											<div class="ml-auto font-35 text-white"><i class="fadeIn animated bx bx-coin"></i>
											</div>
										</div>
										<div class="d-flex align-items-center">
											<div>
												<p class="mb-0 text-white">In Parchan (alloy)</p>
											</div>
											<div class="ml-auto font-14 text-white"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-lg-6">
								<div class="card radius-15 bg-info">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div>
												<h2 class="mb-0 text-white alloy-gold">0000</h2>
											</div>
											<div class="ml-auto font-35 text-white"><i class="fadeIn animated bx bx-coin"></i>
											</div>
										</div>
										<div class="d-flex align-items-center">
											<div>
												<p class="mb-0 text-white">In Gold (alloy)</p>
											</div>
											<div class="ml-auto font-14 text-white"></div>
										</div>
									</div>
								</div>
							</div>
						</div>-->
					</div> --}}
					<div class="col-md-12">
						<div class="row">
							<input type="hidden" class="hidden-value">
							<div class="col-md-6">
								<div class="form-group">
									<label>Select Jewellers Name / Proprietor Name:</label>
									<select class = "single-select jewelryname" id="jn" >
										<option value="" disabled selected>Select Jewellers Name / Proprietor Name</option>
										@foreach($data['lager'] as $key=> $jewelryname)
											<option value="{{ $jewelryname['id'] }}">{{ $jewelryname['jewelry_name'] }} / {{ $jewelryname['proprietor_name'] }}</option>
										@endforeach
									</select>
									{{-- <input class="form-control" type="text" placeholder="Default input"> --}}
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
							{{-- <div class="col-md-6 col-sm-6 col-lg-6">
								<div class="form-group">
									<label>GST Number:</label>
									<input class="form-control gst_number" type="text" placeholder="Gst number">
								</div>
							</div> --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>