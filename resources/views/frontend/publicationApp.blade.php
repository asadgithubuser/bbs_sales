@extends('frontend.layout.master')
    @section('content')

           <!--begin::Entry-->
           <div class="container w-75">
            <div class="row secondary_sc_content px-2 py-4">  
    
              <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12">
					<!--begin::Card-->
					<div class="row">
						<div class="col-lg-12">
							<!--begin::Card-->
							<div class="card card-custom example example-compact">
								<div class="card-header">
									<h3 class="card-title">Create Publication Application</h3>
									<small style="font-weight: 600; color: #FF0000;">Already have an account ? <a style="text-decoration: underline;" href="{{ route('citizenLogin') }}">Login</a> to get service!</small>
								</div>
								
								
								<!--begin::Form-->
								<form class="form appForm" id="kt_form_1" autocomplete="off" method="POST" action="javascript:void(0)">
									@csrf
									<!--Hidden data-->
									<input type="hidden" name="application_for" value="publication_data">

									<div class="card-body application-card">

										<div class="card card-custom example example-compact">
											<div class="form-group m-0">
												<div class="alert alert-custom alert-default" role="alert">
													<div class="alert-text form_header"><span class="font-weight-bold">Usage Type</span></div>
												</div>
											</div>

											<div class="form-group row m-0 usage-type">
												<label class="col-form-label text-right col-lg-3 col-sm-12 weight_500">Select Usage Type :<span class="text-danger">*</span></label>
												<div class="col-lg-8 col-md-8 col-sm-12">
													<div class="radio-inline" id="usage_type">
														<label class="col-form-label radio">
															<input type="radio" class="usage_type" name="usage_type" value="1" id="user_type1" required="required">
															<span></span>Organization
														</label>

														<label class="col-form-label radio">
															<input type="radio" class="usage_type" name="usage_type" value="2" id="user_type2" required="required">
															<span></span>Personal
														</label>

														<label class="col-form-label radio">
															<input type="radio" class="usage_type" name="usage_type" value="3" id="user_type3" required="required">
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
														<input type="text" class="form-control organization_name" name="organization_name" placeholder="Enter Organization Name" value=""/>

														<span id="organization_name_error" class=" text-danger"></span>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Organization Address :<span class="text-danger">*</span></label>
													<div class="col-lg-8 col-md-8 col-sm-12">
														<input type="text" class="form-control organization_address" name="organization_address" placeholder="Enter Organization Address" value=""/>

														<span id="organization_address_error" class=" text-danger"></span>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Designation :<span class="text-danger">*</span></label>
													<div class="col-lg-8 col-md-8 col-sm-12">
														<input type="text" class="form-control organization_designation" name="organization_designation" placeholder="Enter Organization Designation" value=""/>

														<span id="organization_designation_error" class=" text-danger"></span>
													</div>
												</div>
											</div>

											<div id="personal" style="display: none">

												{{-- <div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Occupation :<span class="text-danger">*</span></label>
													<div class="col-lg-8 col-md-8 col-sm-12">
														<input type="text" class="form-control personal_occupation" name="personal_occupation" placeholder="Enter Occupation" value=""/>

														<span id="personal_occupation_error" class=" text-danger"></span>
													</div>
												</div> --}}

												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Institute :<span class="text-danger">*</span></label>
													<div class="col-lg-8 col-md-8 col-sm-12">
														<input type="text" class="form-control personal_institute" name="personal_institute" placeholder="Enter Institute" value=""/>

														<span id="personal_institute_error" class=" text-danger"></span>
													</div>
												</div>
											</div>
										</div>

										<table class="table table-bordered"> 
											<thead> 
												<tr> 
													<th style="padding: 0; border:none;">
														<div class="form-group">
															<div class="alert alert-custom alert-default" role="alert">
																<div class="alert-text form_header"><span class="font-weight-bold">Categories</span></div>
															</div>
														</div>
													</th>

													<th style="padding: 0; border:none;">
														<div class="form-group">
															<div class="alert alert-custom alert-default" role="alert">
																<div class="alert-text form_header"><span class="font-weight-bold">Items</span></div>
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

												<tr>
													<td colspan="2" style="border-top: none" class="p-0"> 
														<div id="service__item_filter"> 
															<div class="form-group row mx-1">
																<div class="col-lg-6 col-md-6 col-sm-12 mb-3">
																	<select class="form-control select3 filterPub" name="service_item_type" id="service_item_type">
																		<option value="">--Select Data Category--</option> 
				
																		<option value="1">Survey</option>
																		<option value="2">Census</option>
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
																</div> --}}
															</div>
														</div>
													</td>
												<tr>
												<tr> 
													<input type="hidden" name="service_id[]" value="2">

													<td style="width: 250px;"> 
														<div class="form-group">
															<div class="checkbox-list get_service_item_list">
																@foreach ($serviceItems as $serviceItem)
																	<label class="checkbox" style="margin: 0 auto 1rem auto;">
																		<input type="checkbox" name="service_item_id[]" class="serviceItem_id" onChange="serviceInventoryItem({{ $serviceItem->id }})" value="{{ $serviceItem->id }}" id="service_item_id{{ $serviceItem->id }}">
																		<span></span>
																		{{ $serviceItem->item_name_en }}
																	</label>
																@endforeach
															</div>

															<span id="service_item_id_error" class=" text-danger"></span>
														</div>
													</td>
													<td style=""> 
														<div class="form-group">
															<div class="checkbox-list">
																<div class="service_item_list"> 

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
												<tr id="selectedServices"> 
													<th style="padding: 0;border-bottom:none;">
														<div class="form-group" style="margin-bottom: 0">
															<div class="alert alert-custom alert-default" role="alert">
																<div class="alert-text form_header"><span class="font-weight-bold">Selected Services</span></div>
															</div>
														</div>
													</th>
													<th style="padding: 0;border-bottom:none;">
														<div class="form-group" style="margin-bottom: 0">
															<div class="alert alert-custom alert-default" role="alert">
																<div class="alert-text form_header"><span class="font-weight-bold">Selected Items</span></div>
															</div>
														</div>
													</th>
													<th style="padding: 0;border-bottom:none;">
														<div class="form-group" style="margin-bottom: 0">
															<div class="alert alert-custom alert-default" role="alert">
																<div class="alert-text form_header"><span class="font-weight-bold">Selected Items Price</span></div>
															</div>
														</div>
													</th>
												</tr>
											</thead>

											<tbody>
												<tr> 
													<td>
														<div class="alert-text select_service_list"> 
															
														</div>
													</td>
													<td>
														<div class="alert-text select_service_item_list">

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
												</tr>

												<tr> 
													<td colspan="2">
														<div class="alert-text text-right font-weight-bold"><span class="" style="font-weight: 700;">Total Price</span></div>
													</td>
													<td>
														<div class="alert-text text-right">
															<span class="font-weight-bold">
																{{-- @if (Auth::id())
																	@if (Auth::user()->country_id == 19)
																		<span type="text" class="totalPrice" value="" readonly style="border: none; font-weight:bold;width: 100%; text-align: right;"></span> <span style="font-weight:bold;width: 100%; text-align: right;">BDT</span>
																	@else
																		<span type="text" class="totalPrice" value="" readonly style="font-weight:bold;width: 100%; text-align: right;"></span> <span style="font-weight:bold;width: 100%; text-align: right;">USD</span>
																	@endif
																@else
																	<span type="text" class="totalPrice" value="" readonly style="border: none; font-weight:bold;width: 100%; text-align: right;"></span> <span style="font-weight:bold;width: 100%; text-align: right;" id="currency_label">USD</span>
																@endif --}}

																<span type="text" class="totalPrice" value="" readonly style="border: none; font-weight:bold;width: 100%; text-align: right;"></span> <span style="font-weight:bold;width: 100%; text-align: right;" id="currency_label">BDT</span>
															</span>
															
														</div>
													</td>
												</tr>
											</tbody>
										</table>

                                        <div class="card card-custom example example-compact">

											<div class="form-group">
												<div class="alert alert-custom alert-default" role="alert">
													<div class="alert-text form_header"><span class="font-weight-bold">Personal Information</span></div>
												</div>
											</div>

                                            <div class="form-group row">
                                                <label class="col-form-label text-right col-lg-3 col-sm-12">First Name :<span class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
													@if (Auth::user())
														<input type="text" class="form-control first_name" name="first_name" placeholder="Enter First Name" value="{{ Auth::user()->first_name }}" readonly/>
													@else
                                                    	<input type="text" class="form-control first_name" name="first_name" placeholder="Enter First Name" value=""/>
														
													@endif

                                                    <span id="first_name_error" class=" text-danger"></span>
                                                </div>
                                            </div>

											<div class="form-group row">
                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Last Name :<span class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
													@if (Auth::user())
														<input type="text" class="form-control last_name" name="last_name" placeholder="Enter Last Name" value="{{ Auth::user()->last_name }}" readonly/>
													@else
														<input type="text" class="form-control last_name" name="last_name" placeholder="Enter Last Name" value=""/>
														
													@endif

                                                    <span id="last_name_error" class=" text-danger"></span>
                                                </div>
                                            </div>

											<div class="form-group row">
                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Father/Husband Name :</label>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
													<input type="text" class="form-control parent_name" name="parent_name" placeholder="Enter Your Father/Husband Name" value="{{ old('parent_name') }}"/>

                                                    <span id="parent_name_error" class=" text-danger"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Email Address :<span class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
													@if (Auth::user())
														<input type="email" class="form-control email" name="email" placeholder="Enter Email Address" value="{{ Auth::user()->email }}" readonly/>

													@else
														<input type="email" class="form-control email" name="email" placeholder="Enter Email Address" value=""/>
														
													@endif

                                                    <span id="email_error" class=" text-danger"></span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Mobile No :</label>
                                                <div class="col-lg-8 col-md-8 col-sm-12">

													@if (Auth::user())
														<input type="text" class="form-control mobile" name="mobile" placeholder="Enter Mobile No." value="{{ Auth::user()->mobile }}" readonly/>

													@else
														<input type="text" class="form-control mobile" name="mobile" placeholder="Enter Mobile No." value=""/>
														
													@endif
                                                </div>
                                            </div>

											@if (!(Auth::user()))
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Password :<span class="text-danger">*</span></label>
													<div class="col-lg-8 col-md-8 col-sm-12">
														<input type="password" class="form-control password" name="password" placeholder="at least 8 characters" value=""/>

														<span class="text-danger" style="font-size: 12px;"><i>minimum 8 characters</i></span>
														<span id="password_error" class=" text-danger"></span>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Confirm Password :<span class="text-danger">*</span></label>
													<div class="col-lg-8 col-md-8 col-sm-12">
														<input type="password" class="form-control password" name="password_confirmation" placeholder="Confirm Password" value=""/>

														<span id="password_error" class=" text-danger"></span>
													</div>
												</div>
												
											@endif

                                            <div class="form-group row">
                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Present Address :<span class="text-danger">*</span></label>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
													@if (Auth::user())
														<input type="text" class="form-control present_address" name="present_address" placeholder="Enter Present Address" value="{{ Auth::user()->present_address }}" readonly/>
													@else
														<input type="text" class="form-control present_address" name="present_address" placeholder="Enter Present Address" value=""/>
													@endif
                                                    
                                                    <span id="present_address_error" class=" text-danger"></span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Select Country :<span class="text-danger">*</span></label>

                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <select class="form-control select2" name="country_id" id="country_id6" readonly>
														@if ($me = Auth::user())
															<option value="{{ Auth::user()->country_id }}" selected>{{ $me->country->country_name }}</option>
														@else
															<option value="">--Select Country--</option> 
															@foreach ($countrys as $country)
																<option value="{{ $country->id }}">{{ $country->country_name }}</option>
															@endforeach
														@endif
                                                    </select>

                                                    <span id="country_id_error" class=" text-danger"></span>
                                                </div>
                                            </div>
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
												<div class="alert alert-custom alert-default" role="alert">
													<div class="alert-text form_header"><span class="font-weight-bold">Application Purpose</span></div>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-form-label text-right col-lg-3 col-sm-12 pl-0 pr-0">Select Application Purpose :<span class="text-danger">*</span></label>

												<div class="col-lg-4 col-md-4 col-sm-12">
													<select class="form-control select2" name="purpose_id" id="purpose_id">
														<option value="">--Select Purpose--</option> 
														@foreach ($purposes as $purpose)
															<option value="{{ $purpose->id }}">{{ $purpose->name_en }}</option>
														@endforeach
													</select>

													<span id="purpose_id_error" class=" text-danger"></span>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-12">
													<div class="radio-inline" id="purpose">
														<input type="text" name="purpose_specify" style="display: none; z-index: 1; opacity: 1;" id="purpose_specify" placeholder="Specify" class="form-control" value="">
													</div>

													<span id="purpose_specify_error" class=" text-danger"></span>
												</div>
											</div>
										</div> --}}

										<input type="hidden" name="total_price" class="totalPrice" value="" readonly style="border: none; font-weight:bold; width: 100%; text-align: right;">

										<div class="card card-custom example example-compact mt-8">

											<div class="form-group">
												<div class="alert alert-custom alert-default" role="alert">
													<div class="alert-text form_header"><span class="font-weight-bold">Data Receiving Mode</span></div>
												</div>
											</div>

											<div class="form-group row">

												<label class="col-form-label text-right col-lg-4 col-sm-12 pl-0 pr-0">Select Data Receiving Mode :<span class="text-danger">*</span></label>

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
												<label class="col-form-label text-right col-lg-4 col-sm-12">Shipping Address :<span class="text-danger">*</span></label>
												<div class="col-lg-7 col-md-8 col-sm-12">
													<input type="text" class="form-control" placeholder="District Name, Courier Name, Address" name="courier_address"/>
												</div>
											</div>

											<div class="form-group pl-8">
												<div class="checkbox-list">
													<label class="checkbox p-2">
														<input class="" type="checkbox" name="terms" id="terms" value="1" required>
														<span style="margin-bottom: 24px;"></span> I agree with the term that, after approval from BBS authority I can pay the total price mentioned above. Only after the confirmation of the payment, BBS will deliver the data. BBS can reject an application anytime without any reason if they will.
													</label>
												</div>

												<span id="terms_error" class=" text-danger"></span>
											</div>
										</div>
									</div>

									<div class="card-footer">
										<div class="card-footer text-center">
											<button type="button" class="btn btn-success btn-m appSubmit mr-4" style="width: 300px;cursor: pointer">Submit Application</button>
											<button type="reset" class="btn btn-danger btn-m" style="width: 300px; cursor: pointer">Cancel</button>
										</div>
									</div>
								</form>
								<!--end::Form-->
							</div>
							<!--end::Card-->
						</div>
					</div>
				</div>
	@endsection

	@push('frontScript')

		<script> 
			$("input#user_type1").click(function() {
				var data = $(this).val();

				$("#organization").show();
				$(".organization_name").attr("required", 'required');
				$(".organization_address").attr("required", 'required');
				$(".organization_designation").attr("required", 'required');

				$("#personal").hide();
				$(".personal_occupation").removeAttr("required");
				$(".personal_institute").removeAttr("required");
				$(".personal_occupation").val("");
				$(".personal_institute").val("");
			});

			$("input#user_type2").click(function() {
				var data = $(this).val();

				$("#organization").hide();
				$(".organization_name").removeAttr("required");
				$(".organization_address").removeAttr("required");
				$(".organization_designation").removeAttr("required");
				$(".organization_name").val("");
				$(".organization_address").val("");
				$(".organization_designation").val("");

				$("#personal").hide();
				$(".personal_occupation").removeAttr("required");
				$(".personal_institute").removeAttr("required");
				$(".personal_occupation").val("");
				$(".personal_institute").val("");
			});

			$("input#user_type3").click(function() {
				var data = $(this).val();

				$("#organization").hide();
				$(".organization_name").removeAttr("required");
				$(".organization_address").removeAttr("required");
				$(".organization_designation").removeAttr("required");
				$(".organization_name").val("");
				$(".organization_address").val("");
				$(".organization_designation").val("");

				$("#personal").show();
				// $(".personal_occupation").attr("required", 'required');
				$(".personal_institute").attr("required", 'required');
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
							url: "{{route('application.store')}}",
							data: data+'&_token={{csrf_token()}}',
							cache: false,
							success: function(data) {
								Swal.fire('Application Submitted Successfully!', '', 'success');

								if(data == '1'){
									location.href = "{{route('citizenLogin')}}?success=1"; 
								} else {
									location.href = "{{route('admin.application.pending')}}";
								}
							},
							error: function(error){
								$("#first_name_error").text(error.responseJSON.errors.first_name);
								$("#last_name_error").text(error.responseJSON.errors.last_name);
								// $("#parent_name_error").text(error.responseJSON.errors.parent_name);
								$("#email_error").text(error.responseJSON.errors.email);
								$("#present_address_error").text(error.responseJSON.errors.present_address);
								$("#password_error").text(error.responseJSON.errors.password);
								$("#country_id_error").text(error.responseJSON.errors.country_id);
								$("#usage_type_error").text(error.responseJSON.errors.usage_type);
								$("#organization_name_error").text(error.responseJSON.errors.organization_name);
								$("#organization_address_error").text(error.responseJSON.errors.organization_address);
								$("#organization_designation_error").text(error.responseJSON.errors.organization_designation);
								$("#personal_occupation_error").text(error.responseJSON.errors.personal_occupation);
								$("#personal_institute_error").text(error.responseJSON.errors.personal_institute);
								$("#service_id_error").text(error.responseJSON.errors.service_id);
								$("#service_item_id_error").text(error.responseJSON.errors.service_item_id);
								$("#terms_error").text(error.responseJSON.errors.terms);
								$("#application_sub_error").text(error.responseJSON.errors.application_sub);
								$("#applicant_text_error").text(error.responseJSON.errors.applicant_text);
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

	@endpush
