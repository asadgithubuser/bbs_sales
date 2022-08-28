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
							<h5 class="text-dark font-weight-bold my-1 mr-5">সকল আবেদন</h5>
							<!--end::Page Title-->
							<!--begin::Breadcrumb-->
							<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
								<li class="breadcrumb-item">
									<a href="{{route('admin.index')}}" class="text-muted">ড্যাশবোর্ড</a>
								</li>
								<li class="breadcrumb-item">
									<a href="{{route('admin.application.index')}}" class="text-muted">আবেদন পরিচালনা করুন</a>
								</li>
								<li class="breadcrumb-item active">
									<a class="text-muted">সকল আবেদন</a>
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
									<h3 class="card-title">সকল আবেদন</h3>
									@if (Auth::user()->role_id == 10)
										<div class="d-flex align-items-center">
											<div class="row">
												<div class="col-md-12">
													<input type="text"data-url="{{ route('admin.searchAjax',['type'=> 'user_applications']) }}" class="form-control form-control-lg form-control-solid ajax-data-search" name="q" placeholder="আবেদনের আইডি, প্রতিষ্ঠানের নাম, প্রতিষ্ঠানের নাম">
												</div>
											</div>
										</div>
									@endif
								</div>

								<div class="card-body">

									@if (Auth::user()->role_id != 10)
										
									<!--begin::Search Form-->
									<div class="mb-7">
										<div class="row align-items-center">
											<div class="col-lg-12 col-xl-12">
												<div class="row align-items-center">
													
													<div class="col-md-4 my-2 my-md-0">
														<div class="d-flex align-items-center">
															<label class="mr-3 mb-0 d-none d-md-block">বিভাগ:</label>
															<select class="form-control select2 ajax-data-search2" data-select="applications" id="division_id" name="division_id">
																<option label="label" value="">--বিভাগ নির্বাচন করুন--</option>
																@foreach ($divisions as $division)
																	<option value="{{ $division->id }}">{{ $division->name_en }}</option>
																@endforeach
															</select>
														</div>
													</div>

													<div class="col-md-4 my-2 my-md-0">
														<div class="d-flex align-items-center">
															<label class="mr-3 mb-0 d-none d-md-block">বিভাগ:</label>
															<select class="form-control ajax-data-search2 select2" data-select="applications" id="district_id" name="district_id">
																<option label="label" value="">--প্রথমে বিভাগ নির্বাচন করুন--</option>
															</select>
														</div>
													</div>

													<div class="col-md-4 my-2 my-md-0">
														<div class="d-flex align-items-center">
															<label class="mr-3 mb-0 d-none d-md-block">উপজেলা:</label>
															<select class="form-control ajax-data-search2 select2" data-select="applications" id="upazila_id" name="upazila_id">
																<option label="label" value="">--প্রথমে উপজেলা নির্বাচন করুন--</option>
															</select>
														</div>
													</div>

													<div class="col-md-4 my-md-0">
														<div class="d-flex align-items-center mt-4">
															<label class="mr-3 mb-0 d-none d-md-block">ইউনিয়ন:</label>
															<select class="form-control ajax-data-search2 select2" data-select="applications" id="union_id" name="union_id">
																<option label="label" value="">--প্রথমে ইউনিয়ন নির্বাচন করুন--</option>
															</select>
														</div>
													</div>

													<div class="col-md-4 my-md-0">
														<div class="d-flex align-items-center mt-4">
															<label class="mr-3 mb-0 d-none d-md-block">মৌজা:</label>
															<select class="form-control ajax-data-search2 select2" data-select="applications" id="mouza_id" name="mouza_id">
																<option label="label" value="">--প্রথমে মৌজা নির্বাচন করুন--</option>
															</select>
														</div>
													</div>

													<div class="col-md-4 my-md-0">
														<div class="input-icon mt-4">
															<input type="text" data-url="{{ route('admin.searchAjax', ['type'=> 'applications']) }}" class="form-control form-control-lg form-control-solid ajax-data-search" name="q" placeholder="আবেদনের আইডি, প্রতিষ্ঠানের নাম, প্রতিষ্ঠানের নাম">
															<span>
																<i class="flaticon2-search-1 text-muted"></i>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!--end::Search Form-->
									@endif

									<div class="table-responsive ajax-data-container pt-3">
										@include('backend.serviceRecipient.application.ajax.tableBody')                                    
									</div>
									{{$applications->links()}}
								</div>
								<!--end::table-->
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
					
