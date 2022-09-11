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
										<h5 class="text-dark font-weight-bold my-1 mr-5">ডেটার উপশ্রেণি সংশোধন করুন</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="{{route('admin.index')}}" class="text-muted">ড্যাশবোর্ড</a>
											</li>
											@can('all_datatypes')
												<li class="breadcrumb-item">
													<a href="{{route('admin.datatype.index')}}" class="text-muted">ডেটার উপশ্রেণিগুলি পরিচালনা করুন</a>
												</li>
											@endcan
											<li class="breadcrumb-item active">
												<a class="text-muted">ডেটার উপশ্রেণি সংশোধন করুন</a>
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
												<h3 class="card-title">ডেটার উপশ্রেণি সংশোধন করুন</h3>
											</div>
											
											<!--begin::Form-->
											<form class="form" action="{{route('admin.datatype.update', $datatype->id)}}" method="post" id="kt_form_1">

												@csrf
                                                @method('patch')

												<div class="card-body">
													<div class="row">

														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">ডেটার বিভাগ: <span class="text-danger">*</span></label>
														
																<select class="form-control select2" name="service_item_type" id="service_item_type" required>
	
																	@if ($datatype->service_item_type == 1)
																		<option value="1" selected>জরিপ</option>
																		<option value="2">জনগণনা</option>
																	@else
																		<option value="1">জরিপ</option>
																		<option value="2" selected>জনগণনা</option>
																	@endif
	
																</select>
														
														</div>
	
														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">ডেটার উপশ্রেণির নাম (বাংলা): <span class="text-danger">*</span></label>
															
																<input type="text" class="form-control" name="name_bn" placeholder="ডেটা উপশ্রেণির নাম লিখুন (বাংলা)" value="{{ $datatype->name_bn }}" required/>
															
														</div>
	
														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">ডেটার উপশ্রেণির নাম (ইংরেজি): <span class="text-danger">*</span></label>
															
																<input type="text" class="form-control" name="name_en" placeholder="ডেটা উপশ্রেণির নাম লিখুন (ইংরেজি)" value="{{ $datatype->name_en }}" required/>
															
														</div>
	
														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">স্ট্যাটাস:</label>
														
																<select class="form-control" name="status" id="status" required>
																	@if ($datatype->status == 1)
																		<option value="1" selected>সক্রিয়</option>
																		<option value="0">নিষ্ক্রিয়</option>
																	@else
																		<option value="1">সক্রিয়</option>
																		<option value="0" selected>নিষ্ক্রিয়</option>
																	@endif
																</select>
															
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
					