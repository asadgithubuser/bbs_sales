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
							<h5 class="text-dark font-weight-bold my-1 mr-5">নতুন ক্ষুদ্র ডেটা মূল্য যোগ করুন</h5>
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
									<a class="text-muted">নতুন ক্ষুদ্র ডেটা মূল্য যোগ করুন</a>
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
									<h3 class="card-title">নতুন ক্ষুদ্র ডেটা মূল্য যোগ করুন</h3>
								</div>
								
								<!--begin::Form-->
								<form class="form" action="{{ route('admin.serviceItemPrice.store') }}" method="post" id="kt_form_1">
									@csrf

									<div class="card-body offset-lg-3">
										<div class="row">
											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">ব্যবহারের ধরন: <span class="text-danger">*</span></label>
											
													<select class="form-control select2" name="usage_type" id="usage_type" required>
														<option value="">--ব্যবহারের ধরন নির্বাচন করুন--</option> 
	
														<option value="1">সংগঠন</option> 
														<option value="2">ব্যক্তিগত</option> 
														<option value="3">ছাত্র</option> 
													</select>
												
											</div>
	
											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">দামের ধরন: <span class="text-danger">*</span></label>
												
													<select class="form-control select2" name="price_type" id="price_type" required>
														<option value="">--দামের প্রকার নির্বাচন করুন--</option> 
	
														<option value="1">জরিপ</option> 
														<option value="2">জনগণনা</option> 
														<option value="3">বাংলাদেশী</option> 
														<option value="4">বিদেশী</option> 
													</select>
												
											</div>
	
											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">মূল্য (ইউ.এস.ডি): <span class="text-danger">*</span></label>
	
											
													<input type="text" class="form-control" name="price" placeholder="মূল্য লিখুন (ইউ.এস.ডি)" value="{{ old('price') }}" required/>
												
											</div>
										</div>
									</div>

									<div class="card-footer">
										<div class="row">
											<div class="col-lg-12 text-right">
												<button type="submit" class="btn btn-primary font-weight-bold" name="submitButton">সংরক্ষন করুন</button>
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
					