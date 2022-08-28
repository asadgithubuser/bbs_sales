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
										<h5 class="text-dark font-weight-bold my-1 mr-5">{{ $category->is_published == false ? 'Add' : 'Edit' }} New Crop Type</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
											</li>
											{{-- @can('all_department') --}}
												<li class="breadcrumb-item">
													<a href="{{route('admin.cropCategory.index')}}" class="text-muted">Manage Crop Type</a>
												</li>
											{{-- @endcan --}}
											
											<li class="breadcrumb-item active">
												<a class="text-muted">{{ $category->is_published == false ? 'Add' : 'Edit' }} Crop Type</a>
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
												<h3 class="card-title">{{ $category->is_published == false ? 'Add' : 'Edit' }} Crop Type</h3>
											</div>
											
											
											<!--begin::Form-->
											<form class="form" action="{{route('admin.cropCategory.update',$category)}}" method="post" id="kt_form_1">
												@csrf

												<div class="card-body">

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Crop Name: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<select name="crop_id" id="crop_id" class="form-control select2">
																<option value="">--Select Crop--</option>
																@foreach ($crops as $crop)
																	<option value="{{ $crop->id }}" {{ ($category->crop_id == $crop->id ? 'selected' : '') }}>{{ ucfirst($crop->name_en) }}</option>
																@endforeach
															</select>
														</div>
													</div>
													
                                                    <div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Name (Bangla): <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<input type="text" class="form-control" name="crop_type_bn" placeholder="Enter Category Bangla Name" value="{{$category ? $category->crop_type_bn : old('crop_type_bn')}}" required/>
														</div>
													</div>

                                                    <div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Name (English): <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<input type="text" class="form-control" name="crop_type_en" placeholder="Enter Category English Name" value="{{$category ? $category->crop_type_en :old('crop_type_en')}}" required/>
														</div>
													</div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label text-right col-lg-4 col-sm-12"></label>
                                                        
                                                        <div class="radio-inline col-lg-5 col-sm-12">
                                                            <label class="radio radio-square">
                                                                <input type="checkbox" name="status" {{ $category->status == true ? 'checked' : '' }}>
                                                                <span></span>
                                                                Active
                                                            </label>
                                                                                                                        
                                                        </div>
                                                        
                                                    </div>
												</div>

												<div class="card-footer">
													<div class="row">
														<div class="col-lg-9 text-right">
															<button type="submit" class="btn btn-primary font-weight-bold" name="type" value="{{ $category->status == 0 ? 'add' : 'edit' }}">{{ $category->status == 0 ? 'Submit' : 'Update' }}</button>
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
					