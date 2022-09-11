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
										<h5 class="text-dark font-weight-bold my-1 mr-5">Edit Receiving Mode</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
											</li>
											@can('all_receiving_mode')
												<li class="breadcrumb-item">
													<a href="{{route('admin.receivingMode.index')}}" class="text-muted">Manage Receiving Modes</a>
												</li>
											@endcan
											<li class="breadcrumb-item active">
												<a class="text-muted">Edit {{ $receivingMode->name_en }} Receiving Mode</a>
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
												<h3 class="card-title">Edit {{ $receivingMode->name_en }} Receiving Mode</h3>
											</div>
											
											
											<!--begin::Form-->
											<form class="form" action="{{route('admin.receivingMode.update', $receivingMode->id)}}" method="post" id="kt_form_1">
												@csrf
                                                @method('patch')

												<div class="card-body">

                                                    <div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Receiving Mode Name (Bangla): <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<input type="text" class="form-control" name="name_bn" placeholder="Enter Receiving Mode Bangla Name" value="{{$receivingMode->name_bn}}" required/>
														</div>
													</div>

                                                    <div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Receiving Mode Name (English): <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<input type="text" class="form-control" name="name_en" placeholder="Enter Receiving Mode English Title" value="{{$receivingMode->name_en}}" required/>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Description:</label>
														<div class="col-lg-5 col-sm-12">
															<textarea type="text" class="form-control" name="description" placeholder="Enter Receiving Mode Description">{{$receivingMode->description}}</textarea>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Status:</label>
														<div class="col-lg-5 col-sm-12">
															<select class="form-control select2" name="status" id="status" required>
																@if ($receivingMode->status == 1)
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
					