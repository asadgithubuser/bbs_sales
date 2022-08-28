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
							<h5 class="text-dark font-weight-bold my-1 mr-5">নতুন অফিস যুক্ত করুন</h5>
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
									<a class="text-muted">নতুন অফিস যুক্ত করুন</a>
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
									<h3 class="card-title">নতুন অফিস যুক্ত করুন</h3>
								</div>
								
								
								<!--begin::Form-->
								<form class="form" action="{{route('admin.office.store')}}" method="post" id="kt_form_1">
									@csrf

									<div class="card-body">

										<div class="row">
											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">শিরোনাম (বাংলায়): <span class="text-danger">*</span></label>
												
													<input type="text" class="form-control" name="title_bn" placeholder="অফিস বাংলা শিরোনাম লিখুন" value="{{old('title_bn')}}" required/>
												
											</div>
	
											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">শিরোনাম (ইংরেজি): <span class="text-danger">*</span></label>
												
													<input type="text" class="form-control" name="title_en" placeholder="অফিস ইংরেজি শিরোনাম লিখুন" value="{{old('title_en')}}" required/>
												
											</div>
	
											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">অফিস কোড: <span class="text-danger">*</span></label>
												
													<input type="text" class="form-control" name="office_code" placeholder="অফিস কোড লিখুন" value="{{old('office_code')}}" required/>
												
											</div>
	
											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">ধাপ: <span class="text-danger">*</span></label>
												
													<select name="level" class="form-control" id="">
														<option value="">--একটা নির্বাচন করুন--</option>
														@foreach ($levels as $level)
														<option value="{{$level->id}}">{{$level->name_en}}({{$level->name_bn}})</option>
															
														@endforeach
													</select>
												
											</div>
	
											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">বিভাগ: <span class="text-danger">*</span></label>
												
													<select class="form-control select2" name="division_id" id="division_id" required>
													<option value="">--বিভাগ নির্বাচন করুন--</option> 
													@foreach ($divisions as $division)
														<option value="{{ $division->id }}">{{ $division->name_bn }}</option>
													@endforeach
													</select>
												
											</div>
	
											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">জেলা: <span class="text-danger">*</span></label>
												
													<select class="form-control select2" name="district_id" id="district_id" required>
													<option value="">--প্রথমে বিভাগ নির্বাচন করুন--</option> 
													</select>
												
											</div>
	
											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">উপজেলা: <span class="text-danger">*</span></label>
												
													<select class="form-control select2" name="upazila_id" id="upazila_id" required>
													<option value="">--প্রথমে জেলা নির্বাচন করুন--</option>
													</select>
												
											</div>
	
											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">মোবাইল: <span class="text-danger">*</span></label>
												
													<input type="text" class="form-control" name="phone" placeholder="অফিসের মোবাইল নম্বর লিখুন" value="{{old('phone')}}" required/>
												
											</div>
	
											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">ইমেইল:</label>
												
													<input type="email" class="form-control" name="email" placeholder="অফিস ইমেল ঠিকানা লিখুন" value="{{old('email')}}"/>
											
											</div>
	
											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">ঠিকানা: <span class="text-danger">*</span></label>
												
													<textarea class="form-control" name="address" row="2" required> {{old('address')}}</textarea>
												
											</div>
	
											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">ওয়েব ইউআরএল:</label>
												
													<textarea class="form-control" name="web_url" row="2"> {{old('web_url')}}</textarea>
												
											</div>
	
											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">তথ্য সম্পর্কে:</label>
												
													<textarea class="form-control" name="about_info" row="2"> {{old('about_info')}}</textarea>
												
											</div>
	
											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">ফ্যাক্স:</label>
												
													<input type="text" class="form-control" name="fax" placeholder="অফিস ফ্যাক্স নম্বর লিখুন" value="{{old('fax')}}"/>
												
											</div>
	
											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">পদক্রম: <span class="text-danger">*</span></label>
												
													<input type="number" class="form-control" name="ordering" placeholder="অফিস পদক্রম লিখুন" value="{{old('ordering')}}" required/>
												
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
					