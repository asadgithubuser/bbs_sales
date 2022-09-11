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
										<h5 class="text-dark font-weight-bold my-1 mr-5">অফিস তথ্য সংশোধন করুন</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="{{route('admin.index')}}" class="text-muted">ড্যাশবোর্ড</a>
											</li>
											@can('all_offices')
												<li class="breadcrumb-item">
													<a href="{{route('admin.office.index')}}" class="text-muted">অফিস পরিচালনা করুন</a>
												</li>
											@endcan
											
											<li class="breadcrumb-item active">
												<a class="text-muted">অফিস তথ্য সংশোধন করুন</a>
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
												<h3 class="card-title">অফিস তথ্য সংশোধন করুন</h3>
											</div>
											
											
											<!--begin::Form-->
											<form class="form" action="{{route('admin.office.update', $office->id)}}" method="post" id="kt_form_1">
												@csrf
                                                @method('patch')

												<div class="card-body">
													<div class="row">
														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">শিরোনাম (বাংলায়): <span class="text-danger">*</span></label>
								
																<input type="text" class="form-control" name="title_bn"  value="{{$office->title_bn}}" required/>
															
														</div>
	
														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">শিরোনাম (ইংরেজি): <span class="text-danger">*</span></label>
															
																<input type="text" class="form-control" name="title_en"  value="{{$office->title_en}}" required/>
															
														</div>
														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">অফিস কোড: <span class="text-danger">*</span></label>
													
																<input type="text" class="form-control" name="office_code" value="{{$office->office_code}}" required/>
														
														</div>
	
														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">ধাপ:: <span class="text-danger">*</span></label>
	
																<select name="level" class="form-control" id="">
																	<option value="{{$office->lev}}">{{$office->lev ? $office->lev->name_en : ''}}</option>
																	@foreach ($levels as $level)
																	<option value="{{$level->id}}" {{ ($office->level == $level->id) ? 'selected' : '' }}>{{$level->name_en}}({{$level->name_bn}})</option>
																		
																	@endforeach
																</select>
															
														</div>

														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">বিভাগ: <span class="text-danger">*</span></label>
	
																 <select class="form-control select2" name="division_id" id="division_id" required>
																	@foreach ($divisions as $division)
																		<option value="{{ $division->id }}" {{ ($office->division_id == $division->id) ? 'selected' : '' }}>{{ $division->name_bn }}</option>
																	@endforeach
																 </select>
															
														</div>
	
														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">জেলা: <span class="text-danger">*</span></label>
															
															 <select class="form-control select2" name="district_id" id="district_id" required>
																<option value="{{ $office->district->id }}" selected>{{ $office->district->name_en }}</option> 
															 </select>
															
														</div>
														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">উপজেলা: <span class="text-danger">*</span></label>
															
															 <select class="form-control select2" name="upazila_id" id="upazila_id" required>
																<option value="{{ $office->upazila->id }}" selected>{{ $office->upazila->name_en }}</option>
															 </select>
															
														</div>
	
														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">ঠিকানা: <span class="text-danger">*</span></label>
															
																<textarea class="form-control" name="address" row="2" required> {{$office->address}}</textarea>
															
														</div>
														
														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">ওয়েব ইউআরএল:</label>
															
																<textarea class="form-control" name="web_url" row="2"> {{$office->web_url}}</textarea>
															
														</div>

														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">তথ্য সম্পর্কে:</label>
															
																<textarea class="form-control" name="about_info" row="2"> {{$office->about_info}}</textarea>
															
														</div>

														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">মোবাইল: <span class="text-danger">*</span></label>
															
																<input type="text" class="form-control" name="phone" placeholder="Enter Office Phone Number" value="{{$office->phone}}" required/>
															
														</div>

														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">ইমেইল:</label>
															
																<input type="email" class="form-control" name="email" placeholder="Enter Office Email Address" value="{{$office->email}}"/>
															
														</div>
														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">ফ্যাক্স:</label>
															
																<input type="text" class="form-control" name="fax" placeholder="Enter Office Fax Number" value="{{$office->fax}}"/>
															
														</div>

														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">পদক্রম: <span class="text-danger">*</span></label>
															
																<input type="number" class="form-control" name="ordering" placeholder="Enter Office Rank Order" value="{{$office->ordering}}"/>
															
														</div>

														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">স্ট্যাটাস:</label>
															
																<select class="form-control select2" name="status" id="status" required>
																	@if ($office->status == 1)
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
					