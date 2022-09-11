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
										<h5 class="text-dark font-weight-bold my-1 mr-5">ক্ষুদ্র ডেটা মূল্য সম্পাদনা করুন</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="{{route('admin.index')}}" class="text-muted">ড্যাশবোর্ড</a>
											</li>
											@can('service_item_prices')
												<li class="breadcrumb-item">
													<a href="{{route('admin.serviceItemPrice.index')}}" class="text-muted">ক্ষুদ্র ডেটার দাম পরিচালনা করুন</a>
												</li>
											@endcan
											<li class="breadcrumb-item active">
												<a class="text-muted">ক্ষুদ্র ডেটা মূল্য সম্পাদনা করুন</a>
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
												<h3 class="card-title">ক্ষুদ্র ডেটা মূল্য সম্পাদনা করুন</h3>
											</div>
											
											<!--begin::Form-->
											<form class="form" action="{{route('admin.serviceItemPrice.update', $serviceItemPrice->id)}}" method="post" id="kt_form_1">

												@csrf
                                                @method('patch')

												<div class="card-body">
													<div class="row">
														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">ব্যবহারের ধরন: <span class="text-danger">*</span></label>
														
																{{-- <select class="form-control select2" name="usage_type" id="usage_type" required>
	
																	@if ($serviceItemPrice->usage_type == 1)
																		<option value="1" selected>Organization</option>
																		<option value="2">Student</option>
																	@else
																		<option value="1">Organization</option>
																		<option value="2" selected>Student</option>
																	@endif
																	
	
																</select> --}}
	
																<input type="hidden" value="{{ $serviceItemPrice->usage_type }}" name="usage_type">
	
																@if ($serviceItemPrice->usage_type == 1)
																	<input type="text" class="form-control" value="সংগঠন" readonly/>
																@elseif ($serviceItemPrice->usage_type == 2)
																	<input type="text" class="form-control" value="ব্যক্তিগত" readonly/>
																@else
																	<input type="text" class="form-control" value="ছাত্র" readonly/>
																@endif
	
														
														</div>
	
														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">দামের ধরন: <span class="text-danger">*</span></label>
															
																
																<input type="hidden" value="{{ $serviceItemPrice->price_type }}" name="price_type">
	
																@if ($serviceItemPrice->price_type == 1)
																	<input type="text" class="form-control" value="জরিপ" disabled/>
																@elseif ($serviceItemPrice->price_type == 2)
																	<input type="text" class="form-control" value="জনগণনা" disabled/>
																@elseif ($serviceItemPrice->price_type == 3)
																	<input type="text" class="form-control" value="বাংলাদেশী" disabled/>
																@else
																	<input type="text" class="form-control" value="বিদেশী" disabled/>
																@endif
	
																{{-- <select class="form-control select2" name="price_type" id="price_type" required>
	
																	@if ($serviceItemPrice->price_type == 1)
																		<option value="1" selected>Survey</option>
																		<option value="2">Census</option>
																		<option value="3">Bangladeshi</option>
																		<option value="4">Foreign</option>
																	@elseif ($serviceItemPrice->price_type == 2)
																		<option value="1">Survey</option>
																		<option value="2" selected>Census</option>
																		<option value="3">Bangladeshi</option>
																		<option value="4">Foreign</option>
																	@elseif ($serviceItemPrice->price_type == 3)
																		<option value="1">Survey</option>
																		<option value="2">Census</option>
																		<option value="3" selected>Bangladeshi</option>
																		<option value="4">Foreign</option>
																	@else
																		<option value="1">Survey</option>
																		<option value="2">Census</option>
																		<option value="3">Bangladeshi</option>
																		<option value="4" selected>Foreign</option>
																	@endif
	
																</select> --}}
															
														</div>
	
														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">দাম (ইউএসডি): <span class="text-danger">*</span></label>
															
																<input type="text" class="form-control" name="price" placeholder="মূল্য লিখুন (ইউএসডি)" value="{{ $serviceItemPrice->price }}" required/>
															
														</div>
													</div>

												</div>

												<div class="card-footer">
													<div class="row">
														<div class="col-lg-12 text-right">
															<button type="submit" class="btn btn-primary font-weight-bold" name="submitButton">হালনাগাদ করুন</button>
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
					