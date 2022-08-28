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
										<h5 class="text-dark font-weight-bold my-1 mr-5">বিভাগ সংশোধন করুন</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="{{route('admin.index')}}" class="text-muted">ড্যাশবোর্ড</a>
											</li>
											<li class="breadcrumb-item">
												<a href="{{route('admin.department.index')}}" class="text-muted">বিভাগ পরিচালনা করুন</a>
											</li>
											<li class="breadcrumb-item active">
												<a class="text-muted">{{ $department->name_bn }} সংশোধন করুন</a>
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
												<h3 class="card-title">{{ $department->name_bn }} সংশোধন করুন</h3>
											</div>
											
											
											<!--begin::Form-->
											<form class="form" action="{{route('admin.department.update', $department->id)}}" method="post" id="kt_form_1">
												@csrf
                                                @method('patch')

												<div class="card-body">

												<div class="row">
													<div class="form-group col-sm-6">
														<label class="col-form-label text-right">ধাপ <span class="text-danger">*</span></label>
														
															<select name="level_id" class="form-control" id="">
																<option value="{{$department->level}}">{{$department->level ? $department->level->name_en : ''}}</option>
																@foreach ($levels as $level)
																<option value="{{$level->id}}" {{ ($department->level_id == $level->id) ? 'selected' : '' }}>{{$level->name_en}}({{$level->name_bn}})</option>
																	
																@endforeach
															</select>
														
													</div>

                                                    <div class="form-group col-sm-6">
														<label class="col-form-label text-right">বিভাগের নাম (বাংলা) *</label>
														
															<input type="text" class="form-control" name="name_bn" placeholder="Enter Department Bangla Name" value="{{$department->name_bn}}" required/>
														
													</div>

                                                    <div class="form-group col-sm-6">
														<label class="col-form-label text-right">বিভাগের নাম (ইংরেজি) <span class="text-danger">*</span></label>
														
															<input type="text" class="form-control" name="name_en" placeholder="Enter Department English Title" value="{{$department->name_en}}" required/>
														
													</div>

													<div class="form-group col-sm-6">
														<label class="col-form-label text-right">স্ট্যাটাস</label>
														
															<select class="form-control select2" name="status" id="status" required>
																@if ($department->status == 1)
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
					