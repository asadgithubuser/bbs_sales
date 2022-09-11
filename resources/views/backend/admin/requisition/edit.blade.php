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
										<h5 class="text-dark font-weight-bold my-1 mr-5">Edit Service</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
											</li>
											@can('all_services')
												<li class="breadcrumb-item">
													<a href="{{route('admin.service.index')}}" class="text-muted">Manage Services</a>
												</li>
											@endcan
											<li class="breadcrumb-item active">
												<a class="text-muted">Edit {{ $service->name_en }} Service</a>
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
												<h3 class="card-title">Edit {{ $service->name_en }} Service</h3>
											</div>
											
											
											<!--begin::Form-->
											<form class="form" action="{{route('admin.service.update', $service->id)}}" method="post" id="kt_form_1">
												@csrf
                                                @method('patch')

												<div class="card-body">

                                                    <div class="form-group row">
														<label class="col-form-label text-right col-lg-2 col-sm-12">Service Name (Bangla) *</label>
														<div class="col-lg-8 col-md-8 col-sm-12">
															<input type="text" class="form-control" name="name_bn" placeholder="Enter Service Bangla Name" value="{{$service->name_bn}}" required/>
														</div>
													</div>

                                                    <div class="form-group row">
														<label class="col-form-label text-right col-lg-2 col-sm-12">Service Name (English) <span class="text-danger">*</span></label>
														<div class="col-lg-8 col-md-8 col-sm-12">
															<input type="text" class="form-control" name="name_en" placeholder="Enter Service English Title" value="{{$service->name_en}}" required/>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-2 col-sm-12">Level <span class="text-danger">*</span></label>
														<div class="col-lg-8 col-md-8 col-sm-12">
															<select class="form-control select2" name="level_id" id="level_id" required>
																@foreach ($levels as $level)
																	<option value="{{ $level->id }}" {{ ($service->level_id == $level->id) ? 'selected' : '' }}>{{ $level->name_en }}</option>
																@endforeach
															</select>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-2 col-sm-12">Office Title <span class="text-danger">*</span></label>
														<div class="col-lg-8 col-md-8 col-sm-12">
															<select class="form-control select2" name="office_id" id="office_id" required>
																@foreach ($offices as $office)
																	<option value="{{ $office->id }}" {{ ($service->office_id == $office->id) ? 'selected' : '' }}>{{ $office->title_en }}</option>
																@endforeach
															</select>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-2 col-sm-12">Service Rank Order <span class="text-danger">*</span></label>
														<div class="col-lg-8 col-md-8 col-sm-12">
															<input type="number" class="form-control" name="ordering" placeholder="Enter Service Rank Order" value="{{$service->ordering}}"/>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-2 col-sm-12">Status</label>
														<div class="col-lg-8 col-md-8 col-sm-12">
															<select class="form-control select2" name="status" id="status" required>
																@if ($service->status == 1)
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
														<div class="col-lg-10 text-right">
															<button type="submit" class="btn btn-primary font-weight-bold" name="submitButton">Submit</button>
															{{-- <a href="{{ route('admin.office.delete', $office->id) }}" class="btn btn-danger font-weight-bold" onclick="return confirm('Are you sure want to remove?')">Delete</a> --}}
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
					