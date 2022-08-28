@extends('backend.layout.master')

	@section('content')
	<style type="text/css">
		.table{
			text-align: left !important;
		}
	</style>
		<!--begin::Content-->
		<div class="content d-flex flex-column flex-column-fluid" id="kt_content" >
			<!--begin::Subheader-->
			<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
				<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
					<!--begin::Info-->
					<div class="d-flex align-items-center flex-wrap mr-1">
						<!--begin::Page Heading-->
						<div class="d-flex align-items-baseline flex-wrap mr-5">
							<!--begin::Page Title-->
							<h5 class="text-dark font-weight-bold my-1 mr-5">Publication Application</h5>
							<!--end::Page Title-->
							<!--begin::Breadcrumb-->
							{{-- <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
								<li class="breadcrumb-item">
									<a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
								</li>
								<li class="breadcrumb-item">
									<a href="{{route('admin.application.index')}}" class="text-muted">Manage Applications</a>
								</li>
								<li class="breadcrumb-item active">
									<a class="text-muted">Create Publication Application</a>
								</li>
							</ul> --}}
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
									<h3 class="card-title">Publication Application</h3>
								</div>
								
								<!--begin::Form-->
								<form class="form appForm" id="kt_form_1" autocomplete="off" method="POST" action="javascript:void(0)">
									@csrf
									<!--Hidden data-->
									<input type="hidden" name="application_for" value="publication_data">

									<input type="hidden" name="country_id" id="country_id" value="{{ Auth::user()->country_id }}">

									<div class="card-body application-card">

										<div class="card card-custom example example-compact">
											<div class="form-group m-0">
												<div class="alert alert-custom alert-default" role="alert" style="padding: 0.5rem 2rem;">
													<div class="alert-text form_header"><span class="font-weight-bold">User Type</span></div>
												</div>
											</div>

											<div class="form-group row m-0">
												<label class="col-form-label text-right col-lg-3 col-sm-12 weight_500">Select User Type :<span class="text-danger">*</span></label>
												<div class="col-lg-8 col-md-8 col-sm-12">
													<div class="radio-inline" id="usage_type">
														<label class="col-form-label radio">
															<input type="radio" class="dataChange usage_type" name="usage_type" value="1" id="user_type1" required="required">
															<span></span>Organization
														</label>

														<label class="col-form-label radio">
															<input type="radio" class="dataChange usage_type" name="usage_type" value="2" id="user_type2" required="required">
															<span></span>Researcher
														</label>

														<label class="col-form-label radio">
															<input type="radio" class="dataChange usage_type" name="usage_type" value="3" id="user_type3" required="required">
															<span></span>Student
														</label>
													</div>

													<span id="usage_type_error" class=" text-danger"></span>
												</div>
											</div>

											<div id="organization" style="display: none">

												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Organization Name :<span class="text-danger">*</span></label>
													<div class="col-lg-8 col-md-8 col-sm-12">
														<input type="text" class="form-control organization_name dataChange" name="organization_name" placeholder="Enter Organization Name" value=""/>

														<span id="organization_name_error" class=" text-danger"></span>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Organization Address :<span class="text-danger">*</span></label>
													<div class="col-lg-8 col-md-8 col-sm-12">
														<input type="text" class="form-control organization_address dataChange" name="organization_address" placeholder="Enter Organization Address" value=""/>

														<span id="organization_address_error" class=" text-danger"></span>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Designation :</label>
													<div class="col-lg-8 col-md-8 col-sm-12">
														<input type="text" class="form-control organization_designation dataChange" name="organization_designation" placeholder="Enter Organization Designation" value=""/>

														{{-- <span id="organization_designation_error" class=" text-danger"></span> --}}
													</div>
												</div>
											</div>

											<div id="researcher" style="display: none">

												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Address :<span class="text-danger">*</span></label>
													<div class="col-lg-8 col-md-8 col-sm-12">
														<input type="text" class="form-control researcher_address" name="researcher_address" placeholder="Enter Address" value=""/>
	
														<span id="researcher_address_error" class=" text-danger"></span>
													</div>
												</div>
											</div>

											<div id="personal" style="display: none">

												{{-- <div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Occupation :<span class="text-danger">*</span></label>
													<div class="col-lg-8 col-md-8 col-sm-12">
														<input type="text" class="form-control personal_occupation dataChange" name="personal_occupation" placeholder="Enter Occupation" value=""/>

														<span id="personal_occupation_error" class=" text-danger"></span>
													</div>
												</div> --}}

												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Institute :<span class="text-danger">*</span></label>
													<div class="col-lg-8 col-md-8 col-sm-12">
														<input type="text" class="form-control personal_institute dataChange" name="personal_institute" placeholder="Enter Institute" value=""/>

														<span id="personal_institute_error" class="text-danger"></span>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Address :<span class="text-danger">*</span></label>
													<div class="col-lg-8 col-md-8 col-sm-12">
														<input type="text" class="form-control personal_address dataChange" name="personal_address" placeholder="Enter Address" value=""/>

														<span id="personal_address_error" class=" text-danger"></span>
													</div>
												</div>
											</div>
										</div>

										<table class="table table-bordered"> 
											<thead> 
												<tr> 
													{{-- <th style="padding: 0; border:none;">
														<div class="form-group">
															<div class="alert alert-custom alert-default" role="alert">
																<div class="alert-text form_header"><span class="font-weight-bold">Categories</span></div>
															</div>
														</div>
													</th> --}}

													<th style="padding: 0; border:none;">
														<div class="form-group">
															<div class="alert alert-custom alert-default" role="alert">
																<div class="alert-text form_header"><span class="font-weight-bold">Search Publication</span></div>
															</div>
														</div>
													</th>

													{{-- <th style="padding: 0;border-bottom:none;">
														<div class="form-group">
															<div class="alert alert-custom alert-default" role="alert">
																<div class="alert-text form_header"><span class="font-weight-bold">Price</span></div>
															</div>
														</div>
													</th> --}}
												</tr>
											</thead>

											<tbody> 
												
												<input type="hidden" id="division_id" name="division_id" value="">
												<input type="hidden" id="district_id" name="district_id" value="">
												<input type="hidden" id="upazila_id" name="upazila_id" value="">
												<input type="hidden" id="union_id" name="union_id" value="">
												<input type="hidden" id="mouza_id" name="mouza_id" value="">
												<input type="hidden" id="department_id" name="department_id" value="">
												<input type="hidden" id="year" name="year" value="">
												
												{{-- <tr>
													<td colspan="2" style="border-top: none" class="p-0"> 
														<div id="service__item_filter"> 
															<div class="form-group row mx-1">
																<div class="col-lg-6 col-md-6 col-sm-12 mb-3">
																	<select class="form-control select3 filterPub" name="service_item_type" id="service_item_type">
																		<option value="">--Select Data Category--</option> 
				
																		<option value="1">Survey</option>
																		<option value="2">Census</option>
																		<option value="3">Other</option>
																	</select>
																</div>

																<div class="col-lg-6 col-md-6 col-sm-12 mb-3">
																	<select class="form-control select3 filterPub" name="data_subcategory_id" id="data_subcategory_id">
																		<option value="">--Select Data Category First--</option> 
				
																	</select>
																</div>

																{{-- <div class="col-lg-3 col-md-3 col-sm-12 mb-3">
																	<select class="form-control select3 locate" name="division_id" id="division_id">
																		<option value="">--Select Division--</option> 
				
																		@foreach ($divisions as $division)
																			<option value="{{ $division->id }}">{{ $division->name_en }}</option>
																		@endforeach
																	</select>
																</div>
				
																<div class="col-lg-3 col-md-3 col-sm-12 mb-3">
																	<select class="form-control select3 locate" name="district_id" id="district_id">
																		<option value="">--Select District--</option> 
																	</select>
																</div>
				
																<div class="col-lg-3 col-md-3 col-sm-12 mb-3">
																	<select class="form-control select3 locate" name="upazila_id" id="upazila_id">
																		<option value="">--Select Upazila--</option> 
																	</select>
																</div>
				
																<div class="col-lg-3 col-md-3 col-sm-12 mb-3">
																	<select class="form-control select3 locate" name="union_id" id="union_id">
																		<option value="">--Select Union--</option> 
																	</select>
																</div>
				
																<div class="col-lg-3 col-md-3 col-sm-12 mb-3">
																	<select class="form-control select3 locate" name="mouza_id" id="mouza_id">
																		<option value="">--Select Mouza--</option> 
																	</select>
																</div>

																<div class="col-lg-3 col-md-3 col-sm-12 mb-3">
																	<select class="form-control select3 locate" name="department_id" id="department_id">
																		<option value="">--Select Department--</option> 

																		@foreach ($departments as $department)
																			<option value="{{ $department->id }}">{{ $department->name_en }}</option> 
																		@endforeach
																	</select>
																</div>

																<div class="col-lg-3 col-md-3 col-sm-12 mb-3">
																	<select class="form-control select3 locate" name="year" id="year">
																		<option value="">--Select Year--</option> 

																		@php
																			$year = '';
																		@endphp

																		@for ($year = 2000; $year <= date('Y'); $year++)
																			<option value="{{ $year }}">{{ $year }}</option>
																		@endfor 
																	</select>
																</div>
															</div>
														</div>
													</td>
												<tr> --}}

													
												<tr> 
													<input type="hidden" name="service_id[]" value="2">

													{{-- <td style="width: 250px;"> 
														<div class="form-group">
															

															<div class="checkbox-list get_service_item_list">
																@foreach ($serviceItems as $serviceItem)
																	<label class="checkbox" style="margin: 0 auto 1rem auto;">
																		<input type="checkbox" name="service_item_id[]" class="serviceItem_id" onChange="serviceInventoryItem({{ $serviceItem->id }})" value="{{ $serviceItem->id }}" id="service_item_id{{ $serviceItem->id }}">
																		<span></span>{{ $serviceItem->item_name_en }}
																	</label>
																@endforeach
															</div>

															<span id="service_item_id_error" class=" text-danger"></span>
														</div>
													</td> --}}

													<td> 
														<div class="form-group">
															<div class="checkbox-list">
																<div class="service_item_list inventory_item_list"> 

																	<select class="form-control select-multiple-publication service_item_select" onChange="inventoryItemSelect(this)" name="service_inventory_item_id[]" multiple required>
																		@foreach ($serviceInventoryItems as $serviceInventoryItem)
																			<div class="s_item_list{{ $serviceInventoryItem->serviceItem->id ?? '' }} mb-3">
																				<option value="{{ $serviceInventoryItem->id }}" class=" items{{ $serviceInventoryItem->serviceItem->id ?? '' }} itemdata{{ $serviceInventoryItem->id }}" >{{ $serviceInventoryItem->title }}</option>
																			</div>
																		@endforeach
																	</select>

																</div>
															</div>
														</div>
													</td>

													{{-- <td style="border-top: none;">
														<div class="alert-text service_item_price">
														</div>
													</td> --}}
												</tr>

											</tbody>
										</table>

										<table class="table table-bordered"> 
											<thead>
												<tr> 
													{{-- <th style="padding: 0;border-bottom:none;">
														<div class="form-group" style="margin-bottom: 0">
															<div class="alert alert-custom alert-default" role="alert" style="margin-bottom: 0; padding: 0.5rem 2rem;height: 85px;">
																<div class="alert-text form_header"><span class="font-weight-bold">Selected Categories</span></div>
															</div>
														</div>
													</th> --}}
													<th style="padding: 0;border-bottom:none;">
														<div class="form-group" style="margin-bottom: 0">
															<div class="alert alert-custom alert-default" role="alert" style="margin-bottom: 0;padding: 0.5rem 2rem;height: 85px;">
																<div class="alert-text form_header"><span class="font-weight-bold">Selected Items</span></div>
															</div>
														</div>
													</th>

													<th style="padding: 0;border-bottom:none;">
														<div class="form-group" style="margin-bottom: 0">
															<div class="alert alert-custom alert-default" role="alert" style="margin-bottom: 0;padding: 0.5rem 2rem;height: 85px;">
																<div class="alert-text form_header"><span class="font-weight-bold">Quantity</span></div>
															</div>
														</div>
													</th>

													<th style="padding: 0;border-bottom:none;">
														<div class="form-group" style="margin-bottom: 0">
															<div class="alert alert-custom alert-default" role="alert" style="margin-bottom: 0;padding: 0.5rem 2rem;height: 85px;">
																<div class="alert-text form_header"><span class="font-weight-bold">Selected Items Price</span></div>
															</div>
														</div>
													</th>
												</tr>

											</thead>

											<tbody>

												<tr> 
													{{-- <td>
														<div class="alert-text select_service_list"> 
															
														</div>
													</td> --}}
													<td>
														<div class="alert-text select_service_item_list">

														</div>
													</td>

													<td>
														<div class="alert-text select_service_quantity_list">
															
														</div>
													</td>

													<td>
														<div class="alert-text select_service_price_list">

														</div>
													</td>
												</tr>

												<tr> 
													<td>
														<div class="alert-text"><span class="font-weight-bold text-center">Additional Items</span></div>
													</td>
													<td colspan="2">
														<div class="form-group">
															<div class="checkbox-list">
																<label class="service_additional_item_list">

																</label>
															</div>
														</div>
													</td>
													{{-- <td>
														<div class="alert-text service_additional_item_price">

														</div>
													</td> --}}
												</tr>

												<tr> 
													<td>
														<div class="alert-text font-weight-bold"><span class="" style="font-weight: 700;">Total Price <br><small><b>(BBS authorities can give discount)</b></small></span></div>
													</td>
													<td colspan="2">
														<div class="alert-text text-right">
															<span class="font-weight-bold">
																@if (Auth::user()->country_id == 19)
																	<span type="text" class="totalPrice" value="" readonly style="border: none; font-weight:bold;width: 100%; text-align: right;"></span> <span style="font-weight:bold;width: 100%; text-align: right;" id="inv_currency_label">BDT</span>
																@else
																	<span type="text" class="totalPrice" value="" readonly style="font-weight:bold;width: 100%; text-align: right;"></span> <span style="font-weight:bold;width: 100%; text-align: right;" id="inv_currency_label">USD</span>
																@endif

																{{-- <span type="text" class="totalPrice" value="" readonly style="font-weight:bold;width: 100%; text-align: right;"></span> <span style="font-weight:bold;width: 100%; text-align: right;" id="inv_currency_label"></span> --}}
															</span>
														</div>
													</td>
												</tr>
											</tbody>
										</table>

										<div class="card card-custom example example-compact">
											<div class="form-group m-0">
												<div class="alert alert-custom alert-default" role="alert" style="padding: 0.5rem 2rem;">
													<div class="alert-text form_header"><span class="font-weight-bold">Personal Information</span></div>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-form-label text-right col-lg-3 col-sm-12">Full Name :<span class="text-danger">*</span></label>
												<div class="col-lg-8 col-md-8 col-sm-12">
													<input type="text" class="form-control" value="{{ Auth::user()->first_name }} {{ Auth::user()->middle_name }} {{ Auth::user()->last_name }}" disabled/>
												</div>
											</div>

											{{-- <div class="form-group row">
												<label class="col-form-label text-right col-lg-3 col-sm-12">Father/Husband Name :</label>
												<div class="col-lg-8 col-md-8 col-sm-12">
													<input type="text" class="form-control" placeholder="Enter Your Father/Husband Name" name="parent_name" value="{{ old('parent_name') }}"/>

													<span id="parent_name_error" class=" text-danger"></span>
												</div>
											</div> --}}
										</div>

										<div class="card card-custom example example-compact">
											<div class="form-group">
												<div class="alert alert-custom alert-default" role="alert">
													<div class="alert-text form_header"><span class="font-weight-bold">Application</span></div>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-form-label text-right col-lg-3 col-sm-12 pl-0 pr-0">Application Subject :<span class="text-danger">*</span></label>

												<div class="col-lg-8 col-md-8 col-sm-12">
													<input name="application_sub" id="application_sub" class="form-control" placeholder="Enter Application Subject" required>

													<span id="application_sub_error" class=" text-danger"></span>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-form-label text-right col-lg-3 col-sm-12 pl-0 pr-0">Application Body :<span class="text-danger">*</span></label>

												<div class="col-lg-8 col-md-8 col-sm-12">
													<textarea name="applicant_text" id="applicant_text" cols="30" rows="3" class="form-control" required></textarea>

													<span id="applicant_text_error" class=" text-danger"></span>
												</div>
											</div>
										</div>

										{{-- <div class="card card-custom example example-compact">

											<div class="form-group">
												<div class="alert alert-custom alert-default" role="alert" style="padding: 0.5rem 2rem;">
													<div class="alert-text form_header"><span class="font-weight-bold">Application Purpose</span></div>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-form-label text-right col-lg-3 col-sm-12 pl-0 pr-0">Select Application Purpose :<span class="text-danger">*</span></label>

												<div class="col-lg-3 col-md-3 col-sm-12">
													<select class="form-control select2 dataChange" name="purpose_id" id="purpose_id">
														<option value="">--Select Purpose--</option> 
														@foreach ($purposes as $purpose)
															<option value="{{ $purpose->id }}">{{ $purpose->name_en }}</option>
														@endforeach
													</select>

													<span id="purpose_id_error" class=" text-danger"></span>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-12">
													<div class="radio-inline" id="purpose">
														<input type="text" name="purpose_specify" style="display: none; z-index: 1; opacity: 1; width: auto;" id="purpose_specify" placeholder="Specify" class="form-control dataChange" value="">
													</div>

													<span id="purpose_specify_error" class=" text-danger"></span>
												</div>
											</div>
										</div> --}}

										<input type="hidden" name="total_price" class="totalPrice" value="" readonly style="border: none; font-weight:bold;width: 100%; text-align: right;">

										<div class="card card-custom example example-compact mt-8">

											<div class="form-group">
												<div class="alert alert-custom alert-default" role="alert" style="padding: 0.5rem 2rem;">
													<div class="alert-text form_header"><span class="font-weight-bold">Data Receiving Mode</span></div>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-form-label text-right col-lg-3 col-sm-12 pl-0 pr-0">Select Data Receiving Mode :<span class="text-danger">*</span></label>

												<div class="col-lg-8 col-md-8 col-sm-12">
													<div class="radio-inline" id="receiving_mode1">
														@php
															$receivingModes = App\Models\ReceivingMode::where('id', 1)->orWhere('id', 2)->get();
														@endphp

														@foreach ($receivingModes as $receivingMode)
															<label class="col-form-label radio"> 
																<input type="radio" name="receiving_mode_hardcopy" id="receiving_mode_hardcopy" onclick="receiving_mode({{ $receivingMode->id }})" class="dataChange" value="{{ $receivingMode->id }}" required>
															<span></span>{{ $receivingMode->name_en }} ({{ $receivingMode->description }})</label>
														@endforeach
														
													</div>
												</div>
											</div>

											<div class="form-group row courier_address" style="display: none;">
												<label class="col-form-label text-right col-lg-3 col-sm-12">Shipping Address :<span class="text-danger">*</span></label>
												<div class="col-lg-8 col-md-8 col-sm-12">
													<input type="text" class="form-control" placeholder="District Name, Courier Name, Address" name="courier_address"/>
												</div>
											</div>

											<div class="form-group pl-8">
												<div class="checkbox-list">
													<label class="checkbox">
														<input class="dataChange" type="checkbox" name="terms" id="terms" value="1"  >
														<span style="margin-bottom: 24px;"></span> I agree with the term that, after approval from BBS authority I can pay the total price mentioned above. Only after the confirmation of the payment, BBS will deliver the data. BBS can reject an application anytime without any reason if they will.
													</label>
												</div>

												<span id="terms_error" class=" text-danger"></span>
											</div>
										</div>
									</div>

									<div class="card-footer text-center">
										<button type="button" class="btn btn-success btn-m appSubmit mr-4" style="width: 300px">Submit Application</button>
										<button type="reset" class="btn btn-danger btn-m" style="width: 300px">Cancel</button>
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

	@push('stackScript')
		<script> 
			$("input#user_type1").click(function() {
				var data = $(this).val();

				$("#organization").show();
				$(".organization_name").attr("required", 'required');
				$(".organization_address").attr("required", 'required');
				// $(".organization_designation").attr("required", 'required');

				$("#personal").hide();
				$(".personal_occupation").removeAttr("required");
				$(".personal_institute").removeAttr("required");
				$(".personal_address").removeAttr("required");
				$(".personal_occupation").val("");
				$(".personal_institute").val("");
				$(".personal_address").val("");

				$("#researcher").hide();
				$(".researcher_address").removeAttr("required");
				$(".researcher_address").val("");
			});

			$("input#user_type2").click(function() {
				var data = $(this).val();

				$("#organization").hide();
				$(".organization_name").removeAttr("required");
				$(".organization_address").removeAttr("required");
				// $(".organization_designation").removeAttr("required");
				$(".organization_name").val("");
				$(".organization_address").val("");
				$(".organization_designation").val("");

				$("#personal").hide();
				$(".personal_occupation").removeAttr("required");
				$(".personal_institute").removeAttr("required");
				$(".personal_address").removeAttr("required");
				$(".personal_occupation").val("");
				$(".personal_institute").val("");
				$(".personal_address").val("");

				$("#researcher").show();
				$(".researcher_address").attr("required", 'required');
			});

			$("input#user_type3").click(function() {
				var data = $(this).val();

				$("#organization").hide();
				$(".organization_name").removeAttr("required");
				$(".organization_address").removeAttr("required");
				// $(".organization_designation").removeAttr("required");
				$(".organization_name").val("");
				$(".organization_address").val("");
				$(".organization_designation").val("");

				$("#personal").show();
				// $(".personal_occupation").attr("required", 'required');
				$(".personal_institute").attr("required", 'required');
				$(".personal_address").attr("required", 'required');

				$("#researcher").hide();
				$(".researcher_address").removeAttr("required");
				$(".researcher_address").val("");
			});
		</script>

		<script> 
			$("#purpose_id").on('change', function() {
				var data = $(this).val();

				if (data == 100) {
					$("#purpose_specify").show();
					$("#purpose_specify").attr("required", 'required');
				} else {
					$("#purpose_specify").hide();
					$("#purpose_specify").removeAttr("required");
				}
			});
			
		</script>

		<script> 

			$('.appSubmit').on('click', function (e) {

				e.preventDefault();

				$("#receiving_mode").attr("required", 'required');
				$("#terms").attr("required", 'required');

				let data = $('.appForm').serialize();

				Swal.fire({
					title: 'Submit Application ?',
					icon: 'info',
					showCancelButton: true,
					confirmButtonText: 'Yes',
				},function () {
					$(".swal2-confirm").attr('disabled', 'disabled'); 
					
				}).then((result) => {
					if (result.isConfirmed) {
						$.ajax({
							type: "POST",
							url: "{{route('admin.application.store')}}",
							data: data+'&_token={{csrf_token()}}',
							cache: false,
							success: function() {
								Swal.fire('Application Submitted Successfully!', '', 'success');
								location.href = "{{route('admin.application.processing')}}";
							},
							error: function(error){
								// $("#parent_name_error").text(error.responseJSON.errors.parent_name);
								$("#usage_type_error").text(error.responseJSON.errors.usage_type);
								$("#organization_name_error").text(error.responseJSON.errors.organization_name);
								$("#organization_address_error").text(error.responseJSON.errors.organization_address);
								// $("#organization_designation_error").text(error.responseJSON.errors.organization_designation);
								// $("#personal_occupation_error").text(error.responseJSON.errors.personal_occupation);
								$("#personal_institute_error").text(error.responseJSON.errors.personal_institute);
								$("#personal_address_error").text(error.responseJSON.errors.personal_address);
								$("#researcher_address_error").text(error.responseJSON.errors.researcher_address);
								// $("#purpose_id_error").text(error.responseJSON.errors.purpose_id);
								$("#service_id_error").text(error.responseJSON.errors.service_id);
								$("#service_item_id_error").text(error.responseJSON.errors.service_item_id);
								$("#terms_error").text(error.responseJSON.errors.terms);
								$("#application_sub_error").text(error.responseJSON.errors.terms);
								$("#applicant_text_error").text(error.responseJSON.errors.terms);
							}
						});
					} else if (result.dismiss === "cancel") {
						Swal.fire('Canceled', '', 'error')
					}
				})

			});
			
		</script>

		<script>
    		function receiving_mode(id){

				if (id == 2) {
					$('.courier_address').show();
					$(".courier_address input").attr("required", 'required');
				} else {
					$('.courier_address').hide();
					$(".courier_address input").removeAttr("required");
				}
			}
		</script>

		<script> 

			$("#service_id3").on('change', function(e){

				if (this.checked) {
					$("#user_location").show();
					$("#division_id2").attr("required", 'required');
					$("#district_id2").attr("required", 'required');
					$("#upazila_id2").attr("required", 'required');
					$("#union_id2").attr("required", 'required');
					$("#mouza_id2").attr("required", 'required');
				} else {
					$("#user_location").hide();
					$("#division_id2").removeAttr("required");
					$("#district_id2").removeAttr("required");
					$("#upazila_id2").removeAttr("required");
					$("#union_id2").removeAttr("required");
					$("#mouza_id2").removeAttr("required");
					$("#division_id2").val("");
					$("#district_id2").val("");
					$("#upazila_id2").val("");
					$("#union_id2").val("");
					$("#mouza_id2").val("");
				}

			});
			
		</script>

		<script> 

			// var auth_id = '<?php if (Auth::id()) { echo Auth::id(); } else { echo ''; }?>';
			// var c_id = '<?php if (Auth::id()) { echo Auth::user()->country_id; } else { echo ''; }?>';

			// $("#country_id").on('change', function() {
			// 	if (auth_id != '') {
			// 		if (c_id == 19) {
			// 			$("#currency_label").text('BDT');
			// 		} else {
			// 			$("#currency_label").text('USD');
			// 		}
			// 	} else {
			// 		var data = $(this).val();

			// 		if (data == 19) {
			// 			$("#currency_label").text('BDT');
			// 		} else {
			// 			$("#currency_label").text('USD');
			// 		}
			// 	}
			// });
		</script>

	@endpush
					