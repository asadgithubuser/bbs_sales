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
										<h5 class="text-dark font-weight-bold my-1 mr-5">নতুন বিভাগ যুক্ত করুন</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="{{route('admin.index')}}" class="text-muted">ড্যাশবোর্ড</a>
											</li>
											@can('all_department')
												<li class="breadcrumb-item">
													<a href="{{route('admin.department.index')}}" class="text-muted">বিভাগ পরিচালনা করুন</a>
												</li>
											@endcan
											
											<li class="breadcrumb-item active">
												<a class="text-muted">নতুন বিভাগ যুক্ত করুন</a>
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
												<h3 class="card-title">নতুন বিভাগ যুক্ত করুন</h3>
											</div>
											
											
											<!--begin::Form-->
											<form class="form" action="{{route('admin.department.store')}}" method="post" id="kt_form_1">
												@csrf

												<div class="card-body">
													<div class="row">
														
													

														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">বিভাগের নাম (বাংলা): <span class="text-danger">*</span></label>
															
																<input type="text" class="form-control" name="name_bn" placeholder="বিভাগের বাংলা নাম লিখুন" value="{{old('name_bn')}}" required/>
														
														</div>

														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">বিভাগের নাম (ইংরেজি): <span class="text-danger">*</span></label>
															
																<input type="text" class="form-control" name="name_en" placeholder="বিভাগের ইংরেজি নাম লিখুন" value="{{old('name_en')}}" required/>
															
														</div>
														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">ধাপ: <span class="text-danger">*</span></label>
															
																<select name="level_id" class="form-control" id="">
																	<option value="">--ধাপ নির্বাচন করুন--</option>
																	@foreach ($levels as $level)
																		<option value="{{$level->id}}">{{$level->name_en}}({{$level->name_bn}})</option>
																	@endforeach
																</select>
															
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
					