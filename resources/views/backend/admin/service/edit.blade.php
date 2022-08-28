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
										<h5 class="text-dark font-weight-bold my-1 mr-5">পরিষেবা সংশোধন করুন</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="{{route('admin.index')}}" class="text-muted">ড্যাশবোর্ড</a>
											</li>
											@can('all_services')
												<li class="breadcrumb-item">
													<a href="{{route('admin.service.index')}}" class="text-muted">পরিষেবাসমূহ পরিচালনা করুন</a>
												</li>
											@endcan
											<li class="breadcrumb-item active">
												<a class="text-muted">পরিষেবা সংশোধন করুন</a>
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
												<h3 class="card-title">পরিষেবা সংশোধন করুন</h3>
											</div>
											
												<!--begin::Form-->
												<form class="form"  action="{{route('admin.service.update', $service->id)}}" method="post" id="kt_form_1">
													@csrf

													<div class="card">
														<div class="card-body w3-light-gray">
															<div class="card-body">
																<div class="row">

																	<div class="col-sm-6" style="padding-left: 35px; padding-right:35px;">
																		<div class="form-group row">
																			<label class="col-form-label text-right">পরিষেবার নাম (বাংলায়): <span class="text-danger">*</span></label>
																			
																				
																				<input type="text" class="form-control" name="name_bn" placeholder="পরিষেবার বাংলা নাম লিখুন" value="{{$service->name_bn}}" required/>
																		</div>
																		<div class="form-group row">
																			<label class="col-form-label text-right">অফিসের ধাপসমূহ: <span class="text-danger">*</span></label>
																			
																				<select class="form-control select2" name="level_id" id="level_id" required>
																				<option value="">--ধাপ নির্বাচন করুন--</option> 
																				@foreach ($levels as $level)
																					<option value="{{ $level->id }}" {{ ($service->level_id == $level->id) ? 'selected' : '' }}>{{ $level->name_en }}</option>
																				@endforeach
																				</select>
																				
																			
																		</div>
																		<div class="form-group row">
																			<label class="col-form-label text-right">পদক্রম: <span class="text-danger">*</span></label>

																				<input type="number" class="form-control" name="ordering" placeholder="পরিষেবা পদক্রম লিখুন" value="{{$service->ordering}}"/>
																		</div>
																	</div>


																	<div class="col-sm-6" style="padding-left: 35px; padding-right:35px;">
																		<div class="form-group row">
																			<label class="col-form-label text-right">পরিষেবার নাম (ইংরেজিতে): <span class="text-danger">*</span></label>
																			<input type="text" class="form-control" name="name_en" placeholder="পরিষেবার ইংরেজি নাম লিখুন" value="{{$service->name_en}}" required/>
																			
																		</div>

																		<div class="form-group row">
																			<label class="col-form-label text-right">অফিস শিরোনাম: <span class="text-danger">*</span></label>
																			
																				<select class="form-control select2" name="office_id" id="office_id" required>
																				<option value="">--অফিস নির্বাচন করুন--</option> 
																				@foreach ($offices as $office)
																					<option value="{{ $office->id }}" {{ ($service->office_id == $office->id) ? 'selected' : '' }}>{{ $office->title_en }}</option>
																				@endforeach
																				</select>
																			
																		</div>
																		<div class="form-group row">
																			<label class="col-form-label text-right">স্ট্যাটাস:</label>
															
																				<select class="form-control select2" name="status" id="status" required>
																					@if ($service->status == 1)
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
					