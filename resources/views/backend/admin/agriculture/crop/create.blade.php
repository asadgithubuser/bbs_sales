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
										<h5 class="text-dark font-weight-bold my-1 mr-5">{{ $crop->is_published == false ? 'Add' : 'Edit' }} New Crop Crop</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
											</li>
											@can('all_crop')
												<li class="breadcrumb-item">
													<a href="{{route('admin.crop.index')}}" class="text-muted">Manage Crop </a>
												</li>
											@endcan
											
											<li class="breadcrumb-item active">
												<a class="text-muted">{{ $crop->is_published == false ? 'Add' : 'Edit' }} Crop </a>
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
												<h3 class="card-title">{{ $crop->is_published == false ? 'Add' : 'Edit' }} Crop </h3>
											</div>
											
											<!--begin::Form-->
											<form class="form" action="{{route('admin.crop.update',$crop)}}" method="post" id="kt_form_1">
												@csrf

												<div class="card-body">

													{{-- <div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Crop Category: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<select name="crop_category" id="crop_category" class="form-control">
																@if ($crop != '')
																	@if ($crop->crop_category == 1)
																		<option value="1" selected>Permanent Crop</option>
																		<option value="2">Temporary Crop</option>
																	@elseif($crop->crop_category == 2)
																		<option value="1">Permanent Crop</option>
																		<option value="2" selected>Temporary Crop</option>
																	@else
																		<option value="">--Select One--</option>
																		<option value="1">Permanent Crop</option>
																		<option value="2">Temporary Crop</option>
																	@endif
																@else
																	<option value="">--Select One--</option>
																	<option value="1">Permanent Crop</option>
																	<option value="2">Temporary Crop</option>
																@endif
															</select>
														</div>
													</div> --}}

                                                    {{-- <div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Category: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															
															<select name="category" id="" class="form-control">
																@if ($crop->is_published == false)
																	<option>--Select One--</option>
																@elseif ($crop->is_published == true)
																<option value="{{ $crop->crop_category_id }}">{{ ucfirst($crop->cropCategory ? $crop->cropCategory->name_en : '') }}</option>
																
																@endif
																@foreach ($categories as $cate)
																	<option value="{{ $cate->id }}">{{ ucfirst($cate->name_en) }}</option>
																@endforeach
															</select>
														</div>
													</div> --}}
													
													
													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Form Name: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<select name="form_id[]" id="form_id" class="form-control select-multiple-additional" multiple>

																@if ($cropForms)
																
																	@foreach ($forms as $form)
																		<option value="{{ $form->id }}" {{ (in_array($form->id, $cropForms)) ? 'selected' : '' }}>{{ $form->id ? $form->display_name: ''}}</option>
																	@endforeach
																@else
																
																	@foreach ($forms as $form)
																		<option value="{{ $form->id }}">{{ $form->display_name }} </option>
																	@endforeach
																@endif
																
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Land Type: </label>
														<div class="col-lg-5 col-sm-12">
															<select class="form-control" name="crop_type" >
																@if ($crop->type) 
																	<option value="1" {{ $crop->type == 1 ? 'selected' : '' }}>Crop</option>
																	<option value="2" {{ $crop->type == 2 ? 'selected' : '' }}>Non-crop</option>
																@else
																	<option value="">Select One</option>
																	<option value="1" {{ $crop->type == 1 ? 'selected' : '' }}>Crop</option>
																	<option value="2" {{ $crop->type == 2 ? 'selected' : '' }}>Non-crop</option>
																@endif
															</select>
														</div>
													</div>

                                                    <div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Name (Bangla): <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<input type="text" class="form-control" name="name_bn" placeholder="Enter crop Bangla Name" value="{{$crop ? $crop->name_bn : old('name_bn')}}" required/>
														</div>
													</div>

                                                    <div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Name (English): <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<input type="text" class="form-control" name="name_en" placeholder="Enter crop English Name" value="{{$crop ? $crop->name_en :old('name_en')}}" required/>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Crop Code: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<input type="text" class="form-control" name="code" placeholder="Enter crop English Name" value="{{$crop ? $crop->code :old('code')}}" required/>
														</div>
													</div>

                                                    <div class="form-group row">
                                                        <label class="col-form-label text-right col-lg-4 col-sm-12"></label>
                                                        
                                                        <div class="radio-inline col-lg-5 col-sm-12">
                                                            <label class="radio radio-square">
                                                                <input type="checkbox" name="status" {{ $crop->status == true ? 'checked' : '' }}>
                                                                <span></span>
                                                                Active
                                                            </label>
                                                                                                                        
                                                        </div>
                                                        
                                                    </div>
												</div>

												<div class="card-footer">
													<div class="row">
														<div class="col-lg-9 text-right">
															<button type="submit" class="btn btn-primary font-weight-bold" name="type" value="{{ $crop->is_published == 0 ? 'add' : 'edit' }}">{{ $crop->is_published == 0 ? 'Submit' : 'Update' }}</button>
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
					