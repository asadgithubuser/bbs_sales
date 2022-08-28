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
							<h5 class="text-dark font-weight-bold my-1 mr-5">Edit Union</h5>
							<!--end::Page Title-->
							<!--begin::Breadcrumb-->
							<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
								<li class="breadcrumb-item">
									<a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
								</li>
								@can('all_upazilas')
									<li class="breadcrumb-item">
										<a href="{{route('admin.upazila.index')}}" class="text-muted">Manage Unions</a>
									</li>
								@endcan
								<li class="breadcrumb-item active">
									<a class="text-muted">Edit Union</a>
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
									<h3 class="card-title">Edit Union</h3>
								</div>
								
								
								<!--begin::Form-->
								<form class="form" action="{{route('admin.union.update',$union)}}" method="post" id="kt_form_1">
									@csrf

									<div class="card-body">

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-4 col-sm-12">Union Name (Bangla): <span class="text-danger">*</span></label>
											<div class="col-lg-5 col-sm-12">
												<input type="text" class="form-control" name="name_bn" placeholder="Enter Union Bangla Title" value="{{$union->name_bn}}" required/>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-4 col-sm-12">Union Name (English): <span class="text-danger">*</span></label>
											<div class="col-lg-5 col-sm-12">
												<input type="text" class="form-control" name="name_en" placeholder="Enter Union English Title" value="{{ $union->name_en}}" required/>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-4 col-sm-12">Union Code: <span class="text-danger">*</span></label>
											<div class="col-lg-5 col-sm-12">
												<input type="text" class="form-control" name="union_bbs_code" placeholder="Enter Union Code" value="{{$union->upazila_bbs_code}}" required/>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-4 col-sm-12">Division Name: <span class="text-danger">*</span></label>
											<div class="col-lg-5 col-sm-12">
												<select class="form-control select2" name="division_id" id="division_id" required>
												<option value="">--Select Division--</option>
                                                @if ($union->division_id)
													<option selected value="{{ $union->division_id }}">{{ $union->division ? $union->division->name_en:'' }}</option>
                                                    
                                                    @foreach ($divisions as $division)
                                                        <option value="{{ $division->id }}">{{ $division->name_en }}</option>
                                                    @endforeach
                                                @else 
                                                    @foreach ($divisions as $division)
                                                        <option value="{{ $division->id }}">{{ $division->name_en }}</option>
                                                    @endforeach
                                                @endif
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-4 col-sm-12">Divison Code:</label>
											<div class="col-lg-5 col-sm-12">
												<input type="text" class="form-control" name="division_bbs_code" id="division_bbs_code" value="{{$union->division_bbs_code}}" readonly="" required/>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-4 col-sm-12">District Name: <span class="text-danger">*</span></label>
											<div class="col-lg-5 col-sm-12">
												<select class="form-control select2" name="district_id" id="district_id" required>
												{{-- <option value="">--Select Division First--</option>  --}}
                                                    @if ($union->district_id)
                                                        <option selected value="{{ $union->district_id }}">{{ $union->district ? $union->district->name_en:'' }}</option>
                                                        
                                                        @foreach ($districts as $division)
                                                            <option value="{{ $division->id }}">{{ $division->name_en }}</option>
                                                        @endforeach
                                                    @else 
                                                        @foreach ($districts as $division)
                                                            <option value="{{ $division->id }}">{{ $division->name_en }}</option>
                                                        @endforeach
                                                    @endif
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-4 col-sm-12">District Code:

											</label>
											<div class="col-lg-5 col-sm-12">
												<input type="text" class="form-control" name="district_bbs_code" id="district_bbs_code" value="{{ $union->district_bbs_code }}" readonly="" required/>
											</div>
										</div>

                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-4 col-sm-12">Upazila Name:  <span class="text-danger">*</span></label></label>
                                            <div class="col-lg-5 col-sm-12">
												<select class="form-control select2" name="upazila_id" id="upazila_id" required>
                                                    @if ($union->upazila_id)
                                                    <option selected value="{{ $union->upazila_id }}">{{ $union->upazila ? $union->upazila->name_en:'' }}</option>
                                                    
                                                    @foreach ($upazilas as $upazila)
                                                        <option value="{{ $upazila->id }}">{{ $upazila->name_en }}</option>
                                                    @endforeach
                                                @else 
                                                    @foreach ($upazilas as $upazila)
                                                        <option value="{{ $upazila->id }}">{{ $upazila->name_en }}</option>
                                                    @endforeach
                                                @endif
												</select>
											</div>
                                        </div>

                                        <div class="form-group row">
											<label class="col-form-label text-right col-lg-4 col-sm-12">Upazila Code:

											</label>
											<div class="col-lg-5 col-sm-12">
												<input type="text" class="form-control" name="upazila_bbs_code" id="upazila_bbs_code" value="{{$upazila->upazila_bbs_code}}" readonly="" required/>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-4 col-sm-12">Land Area: <span class="text-danger">*</span></label>
											<div class="col-lg-5 col-sm-12">
												<input type="number" class="form-control" name="land_area" placeholder="Enter Land Area" value="{{ $upazila->land_area }}" required/>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-4 col-sm-12">River Area: <span class="text-danger">*</span></label>
											<div class="col-lg-5 col-sm-12">
												<input type="number" class="form-control" name="river_area" placeholder="Enter River Area" value="{{ $upazila->river_area}}" required/>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-4 col-sm-12">Forest Area: <span class="text-danger">*</span></label>
											<div class="col-lg-5 col-sm-12">
												<input type="number" class="form-control" name="forest_area" placeholder="Enter Forest Area" value="{{ $upazila->forest_area }}" required/>
											</div>
										</div>
									</div>

									<div class="card-footer">
										<div class="row">
											<div class="col-lg-10 text-right">
												<button type="submit" class="btn btn-primary font-weight-bold">Submit</button>
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