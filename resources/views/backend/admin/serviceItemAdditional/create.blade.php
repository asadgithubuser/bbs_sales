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
										<h5 class="text-dark font-weight-bold my-1 mr-5">নতুন পরিষেবা অতিরিক্ত আইটেম যোগ করুন</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="{{route('admin.index')}}" class="text-muted">ড্যাশবোর্ড</a>
											</li>
											@can('all_service_additional_items')
												<li class="breadcrumb-item">
													<a href="{{route('admin.serviceItemAdditional.index')}}" class="text-muted">পরিষেবা অতিরিক্ত আইটেম পরিচালনা করুন</a>
												</li>
											@endcan
											
											<li class="breadcrumb-item active">
												<a class="text-muted">নতুন পরিষেবা অতিরিক্ত আইটেম যোগ করুন</a>
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
												<h3 class="card-title">নতুন পরিষেবা অতিরিক্ত আইটেম যোগ করুন</h3>
											</div>

											<!--begin::Form-->
											<form class="form" action="{{route('admin.serviceItemAdditional.store')}}" method="post" id="kt_form_1">
												@csrf

												<div class="card-body offset-lg-1">
													<div class="row">
														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">পরিষেবার নাম: <span class="text-danger">*</span></label>
															
															 <select class="form-control select2" name="service_id" id="service_id" required>
																<option value="">--পরিষেবা নির্বাচন করুন--</option> 
																@foreach ($services as $service)
																	<option value="{{ $service->id }}">{{ $service->name_bn }}</option>
																@endforeach
															 </select>
															
														</div>
	
														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">পরিষেবার অতিরিক্ত আইটেমের নাম (বাংলা): <span class="text-danger">*</span></label>
															
																<input type="text" class="form-control" name="item_name_bn" placeholder="পরিষেবার আইটেমের বাংলা নাম লিখুন" value="{{old('item_name_bn')}}" required/>
															
														</div>

														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">পরিষেবার অতিরিক্ত আইটেমের নাম (ইংরেজি): <span class="text-danger">*</span></label>
															
																<input type="text" class="form-control" name="item_name_en" placeholder="পরিষেবা আইটেম ইংরেজি নাম লিখুন" value="{{old('item_name_en')}}" required/>
															
														</div>
	
														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">পরিষেবা অতিরিক্ত আইটেম মূল্য: <span class="text-danger">*</span></label>
															
																<input type="number" class="form-control" name="price" placeholder="পরিষেবা আইটেম মূল্য লিখুন" value="{{old('price')}}" required/>
														
														</div>
														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">পরিষেবা অতিরিক্ত আইটেম পদক্রম: <span class="text-danger">*</span></label>
														
																<input type="number" class="form-control" name="ordering" placeholder="পরিষেবা আইটেম পদক্রম লিখুন" value="{{old('ordering')}}" required/>
															
														</div>
													</div>

													



													
												</div>

												<div class="card-footer">
													<div class="row">
														<div class="col-lg-12 text-right">
															<button type="submit" class="btn btn-primary font-weight-bold" name="submitButton">সংরক্ষণ করুন</button>
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
					