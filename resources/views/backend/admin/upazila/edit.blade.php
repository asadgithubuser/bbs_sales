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
										<h5 class="text-dark font-weight-bold my-1 mr-5">Edit Upazila</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
											</li>
											@can('all_upazilas')
												<li class="breadcrumb-item">
													<a href="{{route('admin.upazila.index')}}" class="text-muted">Manage Upazilas</a>
												</li>
											@endcan
											
											<li class="breadcrumb-item active">
												<a class="text-muted">Edit {{ $upazila->title_en }} Upazila</a>
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
												<h3 class="card-title">Edit {{ $upazila->title_en }} Upazila</h3>
											</div>
											
											
											<!--begin::Form-->
											<form class="form" action="{{route('admin.upazila.update', $upazila->id)}}" method="post" id="kt_form_1">
												@csrf
                                                @method('patch')

												<div class="card-body">

                                                    <div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Name (Bangla): <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<input type="text" class="form-control" name="name_bn" placeholder="Enter Upazila Bangla Title" value="{{$upazila->name_bn}}" required/>
														</div>
													</div>

                                                    <div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Name (English): <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<input type="text" class="form-control" name="name_en" placeholder="Enter Upazila English Title" value="{{$upazila->name_en}}" required/>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Upazila Code: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<input type="text" class="form-control" name="upazila_bbs_code" placeholder="Enter Upazila Code" value="{{$upazila->upazila_bbs_code}}" required/>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Division: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
														 	<select class="form-control select2" name="division_id" id="division_id" required>
																@foreach ($divisions as $division)
																	<option value="{{ $division->id }}" {{ ($upazila->division_id == $division->id) ? 'selected' : '' }}>{{ $division->name_en }}</option>
																@endforeach
														 	</select>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">District: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
														 <select class="form-control select2" name="district_id" id="district_id" required>
															<option value="{{ $upazila->district->id }}" selected>{{ $upazila->district->name_en }}</option> 
														 </select>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Land Area: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<input type="number" class="form-control" name="land_area" placeholder="Enter Land Area" value="{{$upazila->land_area}}"/>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">River Area: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<input type="number" class="form-control" name="river_area" placeholder="Enter River Area" value="{{$upazila->river_area}}"/>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Forest Area: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<input type="number" class="form-control" name="forest_area" placeholder="Enter Forest Area" value="{{$upazila->forest_area}}"/>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Status:</label>
														<div class="col-lg-5 col-sm-12">
															<select class="form-control select2" name="status" id="status" required>
																@if ($upazila->status == 1)
																	<option value="1" selected>Active</option>
																	<option value="0">Deactivated</option>
																@else
																	<option value="1">Active</option>
																	<option value="0" selected>Deactivated</option>
																@endif
															</select>
														</div>
													</div>
												</div>

												<div class="card-footer">
													<div class="row">
														<div class="col-lg-9 text-right">
															<button type="submit" class="btn btn-primary font-weight-bold" name="submitButton">Update</button>
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
					