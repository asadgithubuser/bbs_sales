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
										<h5 class="text-dark font-weight-bold my-1 mr-5">{{ $surveyForm->is_published == false ? 'Add' : 'Edit' }} New Survey Form</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
											</li>
											@can('all_survey')
												<li class="breadcrumb-item">
													<a href="{{route('admin.survey.index')}}" class="text-muted">Manage Survey Form </a>
												</li>
											@endcan
											
											<li class="breadcrumb-item active">
												<a class="text-muted">{{ $surveyForm->is_published == false ? 'Add' : 'Edit' }} Survey Form </a>
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
												<h3 class="card-title">{{ $surveyForm->is_published == false ? 'Add' : 'Edit' }} Survey Form </h3>
											</div>
											
											
											<!--begin::Form-->
											<form class="form" action="{{route('admin.survey.update',$surveyForm)}}" method="post" id="kt_form_1">
												@csrf

												<div class="card-body">
                                                    
                                                    <div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Template Name: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<input type="text" class="form-control" name="template_name" placeholder="Enter Template Name" value="{{$surveyForm ? $surveyForm->template_name : old('template_name')}}" required/>
														</div>
													</div>

                                                    <div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Display Name: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<input type="text" class="form-control" name="display_name" placeholder="Enter Display Name" value="{{$surveyForm ? $surveyForm->display_name :old('display_name')}}" required/>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Table Name: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<input type="text" class="form-control" name="table_name" placeholder="Enter Table Name" value="{{$surveyForm ? $surveyForm->table_name : old('table_name')}}" required/>
														</div>
													</div>
													
                                                    <div class="form-group row">
                                                        <label class="col-form-label text-right col-lg-4 col-sm-12"></label>
                                                        
                                                        <div class="radio-inline col-lg-5 col-sm-12">
                                                            <label class="radio radio-square">
                                                                <input type="checkbox" name="status" {{ $surveyForm->status == true ? 'checked' : '' }}>
                                                                <span></span>
                                                                Active
                                                            </label>
                                                                                                                        
                                                        </div>
                                                        
                                                    </div>
												</div>

												<div class="card-footer">
													<div class="row">
														<div class="col-lg-9 text-right">
															<button type="submit" class="btn btn-primary font-weight-bold" name="type" value="{{ $surveyForm->is_published == 0 ? 'add' : 'edit' }}">{{ $surveyForm->is_published == 0 ? 'Submit' : 'Update' }}</button>
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
					