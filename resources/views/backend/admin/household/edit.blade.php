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
										<h5 class="text-dark font-weight-bold my-1 mr-5">Edit House Hold</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
											</li>
											@can('all_households')
												<li class="breadcrumb-item">
													<a href="{{route('admin.household.index')}}" class="text-muted">Manage House Hold</a>
												</li>
											@endcan
											
											<li class="breadcrumb-item active">
												<a class="text-muted">Edit {{ $household->name_en }} House Hold</a>
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
												<h3 class="card-title">Edit {{ $household->name_en }} House Hold</h3>
											</div>
											
											
											<!--begin::Form-->
											<form class="form" action="{{route('admin.household.update', $household->id)}}" method="post" id="kt_form_1">
												@csrf
                                                @method('patch')

												<div class="card-body">

                                                    <div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">House Hold (Bangla): <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<input type="text" class="form-control" name="name_bn" placeholder="Enter House Hold Bangla" value="{{$household->name_bn}}" required/>
														</div>
													</div>

                                                    <div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">House Hold (English): <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<input type="text" class="form-control" name="name_en" placeholder="Enter House Hold English" value="{{$household->name_en}}" required/>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">House Hold Code: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<input type="text" class="form-control" name="household_code" placeholder="Enter House Hold Code" value="{{$household->household_code}}" required/>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Division: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
														 	<select class="form-control select2" name="division_id" id="division_id" required>
																@foreach ($divisions as $division)
																	<option value="{{ $division->id }}" {{ ($household->division_id == $division->id) ? 'selected' : '' }}>{{ $division->name_en }}</option>
																@endforeach
														 	</select>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">District: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
														 <select class="form-control select2" name="district_id" id="district_id" required>
															<option value="{{ $household->district_id }}" selected>{{ $household->district ? $household->district->name_en : '' }}</option> 
														 </select>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Upazila: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
														 <select class="form-control select2" name="upazila_id" id="upazila_id" required>
															<option value="{{ $household->upazila_id }}" selected>{{ $household->upazila ? $household->upazila->name_en : '' }}</option> 
														 </select>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Union: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
														 <select class="form-control select2" name="union_id" id="union_id" required>
															<option value="{{ $household->union_id }}" selected>{{ $household->union ? $household->union->name_en : '' }}</option> 
														 </select>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Mouza: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
														 <select class="form-control select2" name="mouza_id" id="mouza_id" required>
															<option value="{{ $household->mouza_id }}" selected>{{ $household->mouza ? $household->mouza->name_en : '' }}</option> 
														 </select>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Village: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
														 <select class="form-control select2" name="village_id" id="village_id" required>
															<option value="{{ $household->village_id }}" selected>{{ $household->village ? $household->village->name_en : '' }}</option> 
														 </select>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">EA: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
														 <select class="form-control select2" name="ea_id" id="ea_id" required>
															<option value="{{ $household->ea_id }}" selected>{{ $household->ea ? $household->ea->name_en : '' }}</option> 
														 </select>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Status:</label>
														<div class="col-lg-5 col-sm-12">
															<select class="form-control select2" name="status" id="status" required>
																@if ($household->status == 1)
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
					