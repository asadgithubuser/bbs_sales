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
										<h5 class="text-dark font-weight-bold my-1 mr-5">Details of Survey Notification</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
											</li>
											@can('all_survey')
												<li class="breadcrumb-item">
													<a href="{{route('admin.survey.index')}}" class="text-muted">Manage Survey Notification </a>
												</li>
											@endcan
											
											<li class="breadcrumb-item active">
												<a class="text-muted">Details of Survey Notification <span class="w3-text-red pl-2">(id: {{ $surveyNotification->id  }})</span>  </a>
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
												<h3 class="card-title"> Survey Notification Details Of <span class="w3-text-blue pl-2">(id: {{ $surveyNotification->id  }})</span></h3>
                                                <div class="d-flex align-items-center">    
                                                    <div class="row">
                                                        
                                                        <div class="col-md-12">
                                                            <a href="{{route('admin.surveyNotification.edit',$surveyNotification)}}" class="btn btn-light-primary pb-4"> <i class="fa fa-edit"></i> Edit</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											
											
											<!--begin::Form-->
											<form class="form" id="kt_form_1">
												

												<div class="card-body">
													<div class="row">
														<div class="col-md-6">
															<div class="card">
																<div class="card-header p-5 w3-teal" style="border-bottom: 1px solid #ffffff;">
																	<h4 class="card-title mb-0">Basic Information For Notification</h4>
																</div>
																<div class="card-body">
																	<div class="row">
																		<div class="col-md-12">
																			<div class="form-group row">
																				<label class="col-form-label text-right col-lg-4 col-sm-12">Survey Type: </label>
																				<div class="col-lg-5 col-sm-12">
																					<input type="text" readonly disabled class="form-control" value="{{ ucfirst($surveyNotification->survey_for)  }} Area">																					
																				</div>
																			</div>

																			@if ($surveyNotification->survey_for == 'specific')
																			<div class="form-group row">
																				<label class="col-form-label text-right col-lg-4 col-sm-12">Division: </label>
																				<div class="col-lg-5 col-sm-12">
																					<input type="text" readonly disabled class="form-control" value="{{$surveyNotification->division ? ucfirst($surveyNotification->division->name_en) : ''  }}">																					
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-form-label text-right col-lg-4 col-sm-12">District: </label>
																				<div class="col-lg-5 col-sm-12">
																					<input type="text" readonly disabled class="form-control" value="{{$surveyNotification->district ? ucfirst($surveyNotification->district->name_en) : ''  }}">																					
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-form-label text-right col-lg-4 col-sm-12">Upazila: </label>
																				<div class="col-lg-5 col-sm-12">
																					<input type="text" readonly disabled class="form-control" value="{{$surveyNotification->upazila ? ucfirst($surveyNotification->upazila->name_en) : ''  }}">																					
																				</div>
																			</div>
																			@endif

																			<div class="form-group row">
																				<label class="col-form-label text-right col-lg-4 col-sm-12">Form Name: </label>
																				<div class="col-lg-5 col-sm-12">
																					<input type="text" readonly disabled class="form-control" value="{{ $surveyNotification->crop ? $surveyNotification->crop->name_en :'' }}">																					
																				</div>
																			</div>

																			<div class="form-group row">
																				<label class="col-form-label text-right col-lg-4 col-sm-12">Form Name: </label>
																				<div class="col-lg-5 col-sm-12">
																					<input type="text" readonly disabled class="form-control" value="{{ $surveyNotification->crop ? $surveyNotification->crop->name_en :'' }}">																					
																				</div>
																			</div>
																			<div class="form-group row">
																				<label class="col-form-label text-right col-lg-4 col-sm-12">Crop Name: </label>
																				<div class="col-lg-5 col-sm-12">
                                                                                    <input type="text" readonly disabled class="form-control" value="{{ $surveyNotification->surveyForm ? $surveyNotification->surveyForm->display_name :'' }}">														
																				</div>
																			</div>
						
																			{{-- <div class="form-group row">
																				<label class="col-form-label text-right col-lg-4 col-sm-12">Scope Of Action Number: </label>
																				<div class="col-lg-5 col-sm-12">
																					<input type="text" class="form-control" name="scope_of_action_number" placeholder="Enter Scope Of Action Number" value="{{$surveyNotification ? $surveyNotification->scope_of_action_number :old('scope_of_action_number')}}" readonly disabled/>
																				</div>
																			</div> --}}
						
																			<div class="form-group row">
																				<label class="col-form-label text-right col-lg-4 col-sm-12">Start Date Of Collection: </label>
																				<div class="col-lg-5 col-sm-12">
																					<input  class="form-control " name="start_date_of_collection" value="{{$surveyNotification ? $surveyNotification->start_date_of_collection : old('start_date_of_collection')}}" readonly disabled/>
																				</div>
																			</div>
				
																			<div class="form-group row">
																				<label class="col-form-label text-right col-lg-4 col-sm-12">End Date Of Collection: </label>
																				<div class="col-lg-5 col-sm-12">
																					<input  class="form-control" name="end_date_of_collection" value="{{$surveyNotification ? $surveyNotification->end_date_of_collection : old('end_date_of_collection')}}" readonly disabled/>
																				</div>
																			</div>
				
																			
																		</div>
																		
																	</div>
																</div>
															</div>
														</div>

														<div class="col-md-6">
															<div class="card">
																<div class="card-header p-5 w3-indigo" style="border-bottom: 1px solid #ffffff;">
																	<h4 class="card-title mb-0">Notification Schedule Setting</h4>
																</div>
																<div class="card-body">
																	<div class="form-group row">
																		<div class="col-lg-6">
																			<label>Start Date For Head Office: </label>
																			<input  class="form-control" name="notification_start_data_head_office" value="{{$surveyNotification ? $surveyNotification->notification_start_data_head_office :old('notification_start_data_head_office')}}" readonly disabled>
																			<span class="form-text text-muted">Please Enter Start Date For Head Office</span>
																		</div>
																		<div class="col-lg-6">
																			<label>End Date For Head Office:</label>
																			<input  name="notification_end_data_head_office" class="form-control" value="{{$surveyNotification ? $surveyNotification->notification_end_data_head_office :old('notification_end_data_head_office')}}" readonly disabled>
																			<span class="form-text text-muted">Please Enter End Date For Head Office</span>
																		</div>
																	</div>

																	<div class="form-group row">
																		
																		<div class="col-lg-6">
																			<label>Start Date For Division:</label>
																			<input  class="form-control" name="notification_start_data_division" value="{{$surveyNotification ?  $surveyNotification->notification_start_data_division : old('notification_start_data_division')}}" readonly disabled>
																			<span class="form-text text-muted">Please Enter Start Date For Division</span>
																		</div>
																		<div class="col-lg-6">
																			<label>End Date For Division:</label>
																			<input  name="notification_end_data_division" class="form-control" readonly disabled value="{{$surveyNotification ?  $surveyNotification->notification_end_data_division : old('notification_end_data_division')}}">
																			<span class="form-text text-muted">Please Enter End Date For Division</span>
																		</div>
																	</div>

																	<div class="form-group row">
																		<div class="col-lg-6">
																			<label>Start Date For District:</label>
																			<input  class="form-control" name="notification_start_data_zila" value="{{$surveyNotification ? $surveyNotification->notification_start_data_zila :old('notification_start_data_zila')}}" readonly disabled>
																			<span class="form-text text-muted">Please Enter Start Date For District</span>
																		</div>
																		<div class="col-lg-6">
																			<label>End Date For District:</label>
																			<input  name="notification_end_data_zila" class="form-control" value="{{$surveyNotification ?  $surveyNotification->notification_end_data_zila : old('notification_end_data_zila')}}" readonly disabled>
																			<span class="form-text text-muted">Please Enter End Date For District</span>
																		</div>
																	</div>

																	<div class="form-group row">
																		<div class="col-lg-6">
																			<label>Start Date For Upazila:</label>
																			<input  class="form-control" name="notification_start_data_upazila" value="{{$surveyNotification ? $surveyNotification->notification_start_data_upazila :old('notification_start_data_upazila')}}" readonly disabled>
																			<span class="form-text text-muted">Please Enter Start Date For Upazila</span>
																		</div>
																		<div class="col-lg-6">
																			<label>End Date For Upazila:</label>
																			<input  name="notification_end_data_upazila" class="form-control" value="{{$surveyNotification ? $surveyNotification->notification_end_data_upazila :old('notification_end_data_upazila')}}" readonly disabled>
																			<span class="form-text text-muted">Please Enter End Date For Upazila</span>
																		</div>
																	</div>

																	<div class="form-group row">
																		<div class="col-lg-6">
																			<label>Start Date For Field:</label>
																			<input  class="form-control" name="notification_start_data_field" value="{{$surveyNotification ? $surveyNotification->notification_start_data_field :old('notification_start_data_field')}}" readonly disabled>
																			<span class="form-text text-muted">Please Enter Start Date For Field</span>
																		</div>
																		<div class="col-lg-6">
																			<label>End Date For Field:</label>
																			<input  name="notification_end_data_field" class="form-control" value="{{$surveyNotification ? $surveyNotification->notification_end_data_field :old('notification_end_data_field')}}" readonly disabled>
																			<span class="form-text text-muted">Please Enter End Date For Field</span>
																		</div>
																	</div>

																</div>
															</div>
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
					