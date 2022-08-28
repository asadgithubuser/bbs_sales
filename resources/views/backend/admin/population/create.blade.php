@extends('backend.layout.master')

	@section('content')
		<!--begin::Content-->
		<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
			<!--begin::Subheader-->
			<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
				<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
					<!--begin::Info-->
					<div class="d-flex align-items-center flex-wrap mr-1">
						<!--begin::Page Heading-->
						<div class="d-flex align-items-baseline flex-wrap mr-5">
							<!--begin::Page Title-->
							<h5 class="text-dark font-weight-bold my-1 mr-5">Add New Population</h5>
							<!--end::Page Title-->
							<!--begin::Breadcrumb-->
							<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
								<li class="breadcrumb-item">
									<a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
								</li>
								@can('all_populations')
									<li class="breadcrumb-item">
										<a href="{{route('admin.population.index')}}" class="text-muted">Manage Population</a>
									</li>
								@endcan
								<li class="breadcrumb-item active">
									<a class="text-muted">Add New Population</a>
								</li>
							</ul>
							<!--end::Breadcrumb-->
						</div>
						<!--end::Page Heading-->
					</div>
					<!--end::Info-->
				</div>
			</div>
			<!--end::Subheader-->
			<!--begin::Entry-->
			<div class="d-flex flex-column-fluid">
				<!--begin::Container-->
				<div class="container-fluid">
					<!--session msg-->
					@include('alerts.alerts')

					<!--begin::Card-->
					<div class="row">
						<div class="col-lg-12">
							<!--begin::Card-->
							<div class="card card-custom example example-compact">
								<div class="card-header">
									<h3 class="card-title">Add New Population</h3>
								</div>
								
								
								<!--begin::Form-->
								<form class="form" action="{{route('admin.population.store')}}" method="post" id="kt_form_1">
									@csrf

									<div class="card-body">

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-4 col-sm-12">Population Info (Bangla): <span class="text-danger">*</span></label>
											<div class="col-lg-5 col-sm-12">
												<input type="text" class="form-control" name="name_bn" placeholder="Enter Population Bangla Info" value="{{old('name_bn')}}" required/>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-4 col-sm-12">Population Info (English): <span class="text-danger">*</span></label>
											<div class="col-lg-5 col-sm-12">
												<input type="text" class="form-control" name="name_en" placeholder="Enter Population English Info" value="{{old('name_en')}}" required/>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-4 col-sm-12">Population Digit (Bangla): <span class="text-danger">*</span></label>
											<div class="col-lg-5 col-sm-12">
												<input type="text" class="form-control" name="digit_bn" placeholder="Enter Population Bangla Digit" value="{{old('digit_bn')}}" required/>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-4 col-sm-12">Population Digit (English): <span class="text-danger">*</span></label>
											<div class="col-lg-5 col-sm-12">
												<input type="text" class="form-control" name="digit_en" placeholder="Enter Population English Digit" value="{{old('digit_en')}}" required/>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-4 col-sm-12">Population Code: <span class="text-danger">*</span></label>
											<div class="col-lg-5 col-sm-12">
												<input type="text" class="form-control" name="population_code" placeholder="Enter Population Code" value="{{old('population_code')}}" required/>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-4 col-sm-12">Division Name: <span class="text-danger">*</span></label>
											<div class="col-lg-5 col-sm-12">
												<select class="form-control select2" name="division_id" id="division_id" required>
												<option value="">--Select Division--</option> 
												
												@foreach ($divisions as $division)
													<option value="{{ $division->id }}">{{ $division->name_en }}</option>
												@endforeach
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-4 col-sm-12">District Name: <span class="text-danger">*</span></label>
											<div class="col-lg-5 col-sm-12">
												<select class="form-control select2" name="district_id" id="district_id" required>
												<option value="">--Select Division First--</option> 
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-4 col-sm-12">Upazila Name: <span class="text-danger">*</span></label>
											<div class="col-lg-5 col-sm-12">
												<select class="form-control select2" name="upazila_id" id="upazila_id" required>
												<option value="">--Select District First--</option> 
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-4 col-sm-12">Union Name: <span class="text-danger">*</span></label>
											<div class="col-lg-5 col-sm-12">
												<select class="form-control select2" name="union_id" id="union_id" required>
												<option value="">--Select Upazila First--</option> 
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-4 col-sm-12">Mouza Name: <span class="text-danger">*</span></label>
											<div class="col-lg-5 col-sm-12">
												<select class="form-control select2" name="mouza_id" id="mouza_id" required>
												<option value="">--Select Union First--</option> 
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-4 col-sm-12">Village Name: <span class="text-danger">*</span></label>
											<div class="col-lg-5 col-sm-12">
												<select class="form-control select2" name="village_id" id="village_id" required>
												<option value="">--Select Mouza First--</option> 
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-4 col-sm-12">EA Name: <span class="text-danger">*</span></label>
											<div class="col-lg-5 col-sm-12">
												<select class="form-control select2" name="ea_id" id="ea_id" required>
												<option value="">--Select Village First--</option> 
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-4 col-sm-12">House Hold: <span class="text-danger">*</span></label>
											<div class="col-lg-5 col-sm-12">
												<select class="form-control select2" name="household_id" id="household_id" required>
												<option value="">--Select EA First--</option> 
												</select>
											</div>
										</div>
									</div>

									<div class="card-footer">
										<div class="row">
											<div class="col-lg-10 text-right">
												<button type="submit" class="btn btn-primary font-weight-bold" name="submitButton">Submit</button>
											</div>
										</div>
									</div>
								</form>
								<!--end::Form-->
							</div>
							<!--end::Card-->
						</div>
					</div>
				</div>
				<!--end::Container-->
			</div>
			<!--end::Entry-->
		</div>
		<!--end::Content-->
	@endsection
					