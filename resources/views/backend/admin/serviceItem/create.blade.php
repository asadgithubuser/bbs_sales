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
										<h5 class="text-dark font-weight-bold my-1 mr-5">নতুন পরিষেবা আইটেম যোগ করুন</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="{{route('admin.index')}}" class="text-muted">ড্যাশবোর্ড</a>
											</li>
											@can('all_service_items')
												<li class="breadcrumb-item">
													<a href="{{route('admin.serviceItem.index')}}" class="text-muted">পরিষেবা আইটেম পরিচালনা করুন</a>
												</li>
											@endcan
											
											<li class="breadcrumb-item active">
												<a class="text-muted">নতুন পরিষেবা আইটেম যোগ করুন</a>
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
												<h3 class="card-title">নতুন পরিষেবা আইটেম যোগ করুন</h3>
											</div>
											
											<!--begin::Form-->
											<form class="form" action="{{route('admin.serviceItem.store')}}" method="post" id="kt_form_1" enctype="multipart/form-data">
												@csrf

												<div class="card-body">
													<div class="row">
														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">পরিষেবার নাম: <span class="text-danger">*</span></label>
	
															
																<select class="form-control select2" name="service_id" id="service_id" required>
																	<option value="">--পরিষেবা নির্বাচন করুন--</option> 
	
																	@foreach ($services as $service)
																		<option value="{{ $service->id }}">{{ $service->name_en }}</option>
																	@endforeach
																</select>
															
	
															{{-- <label class="col-form-label text-right col-lg-2 col-sm-12">Service Item Name (Bangla):  <span class="text-danger">*</span></label>
															<div class="col-lg-4 col-sm-12">
																<input type="text" class="form-control" name="item_name_bn" placeholder="Enter Service Item Bangla Name" value="{{old('item_name_bn')}}"/>
															</div> --}}
	
															
														</div>
														<div class="form-group col-sm-6">
															<label class="col-form-label text-right">পরিষেবা আইটেমের নাম (ইংরেজি):  <span class="text-danger">*</span></label>
															
															<input type="text" class="form-control" id="item_name_en" name="item_name_en" placeholder="পরিষেবা আইটেমের নাম লিখুন (ইংরেজি)" value="{{old('item_name_en')}}" required/>
														
														</div>

													</div>

												

													<div class="form-group row microData" style="display: none;">

														<label class="col-form-label text-right col-lg-2 col-sm-12">পরিষেবা আইটেমের বিবরণ: </label>
														<div class="col-lg-4 col-sm-12">
															<textarea type="text" class="form-control" id="description" name="description" placeholder="পরিষেবা আইটেম বিবরণ লিখুন">{{old('description')}}</textarea>
														</div>

														<label class="col-form-label text-right col-lg-2 col-sm-12">পরিষেবা অতিরিক্ত আইটেম: </label>
														<div class="col-lg-4 col-sm-12">
															<select class="form-control select-multiple-additional" name="service_additional_id[]" id="service_additional_id" multiple>

															</select>
														</div>
														
														{{-- <label class="col-form-label text-right col-lg-2 col-sm-12">Service Item Rank Order:  <span class="text-danger">*</span></label>
														<div class="col-lg-4 col-sm-12">
															<input type="number" class="form-control" name="ordering" placeholder="Enter Service Item Rank Order" value="{{old('ordering')}}" />
														</div> --}}
													</div>

													<div class="form-group row microData" style="display: none;">
														<label class="col-form-label text-right col-lg-2 col-sm-12">ডেটা বিভাগ:  <span class="text-danger">*</span></label>
														<div class="col-lg-4 col-sm-12">
														 <select class="form-control select2" name="service_item_type" id="service_item_type">
															<option value="">--ডেটা বিভাগ নির্বাচন করুন--</option> 
															<option value="1">Survey</option>
															<option value="2">Census</option>
														 </select>
														</div>

														<label class="col-form-label text-right col-lg-2 col-sm-12">ডেটা উপশ্রেণি: </label>
														<div class="col-lg-4 col-sm-12">
														 <select class="form-control select2" name="data_subcategory_id" id="data_subcategory_id">
															<option value="">--ডেটা বিভাগ নির্বাচন করুন--</option> 

														 </select>
														</div>
													</div>

													<div class="form-group row microData" style="display: none;">
														<label class="col-form-label text-right col-lg-2 col-sm-12">বিভাগসমূহ: </label>

														<div class="col-lg-4 col-sm-12">
															<select class="form-control select2" name="department_id" id="department_id">
																<option value="">--বিভাগ নির্বাচন করুন--</option> 

																@foreach ($departments as $department)
																	<option value="{{ $department->id }}">{{ $department->name_en }}</option>
																@endforeach
															</select>
														</div>

														<label class="col-form-label text-right col-lg-2 col-sm-12">পরিষেবা আইটেম বছর: <span class="text-danger">*</span></label>
														<div class="col-lg-4 col-sm-12">
															<input type="number" class="form-control" name="year" id="year" placeholder="পরিষেবা আইটেম বছর লিখুন" value="{{old('year')}}"/>
														</div>
													</div>

													<div class="form-group row microDataPrice" style="display: none;">
														<label class="col-form-label text-right col-lg-2 col-sm-12">মূল্য বিডিটি (ব্যক্তিগত/শিক্ষার্থী):  <span class="text-danger">*</span></label>
														<div class="col-lg-4 col-sm-12">
															<input type="number" class="form-control" id="price_bdt_personal" name="price_bdt_personal" placeholder="পরিষেবা আইটেমের মূল্য লিখুন বিডিটি (ব্যক্তিগত/ছাত্র)"/>
														</div>

														<label class="col-form-label text-right col-lg-2 col-sm-12">মূল্য বিডিটি (সাংগঠনিক):  <span class="text-danger">*</span></label>
														<div class="col-lg-4 col-sm-12">
															<input type="number" class="form-control" id="price_bdt_org" name="price_bdt_org" placeholder="পরিষেবা আইটেমের মূল্য লিখুন বিডিটি (সাংগঠনিক)"/>
														</div>
													</div>

													<div class="form-group row microDataPrice" style="display: none;">
														<label class="col-form-label text-right col-lg-2 col-sm-12">মূল্য ইউএসডি (ব্যক্তিগত/শিক্ষার্থী):  <span class="text-danger">*</span></label>
														<div class="col-lg-4 col-sm-12">
															<input type="number" class="form-control" name="price_usd_personal" id="price_usd_personal" placeholder="পরিষেবা আইটেমের মূল্য লিখুন ইউ.এস.ডি (ব্যক্তিগত/ছাত্র)"/>
														</div>

														<label class="col-form-label text-right col-lg-2 col-sm-12">মূল্য ইউএসডি (সাংগঠনিক):  <span class="text-danger">*</span></label>
														<div class="col-lg-4 col-sm-12">
															<input type="number" class="form-control" id="price_usd_org" name="price_usd_org" placeholder="পরিষেবা আইটেমের মূল্য লিখুন ইউ.এস.ডি (সাংগঠনিক)"/>
														</div>
													</div>

													<div class="form-group row microData" style="display: none;">
														{{-- <label class="col-form-label text-right col-lg-2 col-sm-12">Data-Type:  <span class="text-danger">*</span></label>
														<div class="col-lg-4 col-sm-12">
														 <select class="form-control select2" name="data_type" id="data_type" >
															<option value="">--Select Data-Type --</option> 
															<option value="1">Hardcopy</option>
															<option value="2">Softcopy</option>
														 </select>
														</div> --}}

														<label class="col-form-label text-right col-lg-2 col-sm-12">ফাইল এক্সটেনশন ধরণ: </label>
														<div class="col-lg-4 col-sm-12">
															<select class="form-control select2" name="file_type" id="file_type">
																<option value="">--টাইপ নির্বাচন করুন--</option> 
																<option value="excel">এক্সেল</option>
																<option value="stata">স্ট্যাটা</option>
																<option value="other">অন্যান্য</option>
															</select>
														</div>

														<label class="col-form-label text-right col-lg-2 col-sm-12">ফাইল আপলোড করুন: </label>
														<div class="col-lg-4 col-sm-12">
															<input type="file" class="form-control py-2" id="data_file" name="data_file"/>
														</div>
													</div>

													<div class="form-group row microData" style="display: none;">

														<label class="col-form-label text-right col-lg-2 col-sm-12">নমুনা ডেটা আপলোড: </label>
														<div class="col-lg-4 col-sm-12">
															<input type="file" class="form-control py-2" name="sample_attachment" id="sample_attachment"/>
														</div>
													</div>

													<table class="table table-responsive microData" id="tbl_posts" style="display: none;">
														<thead>
															<th><label class="">বিভাগ</label></th>
															<th><label class="">জেলা</label></th>
															<th><label class="">উপজেলা</label></th>
															<th><label class="">ইউনিয়ন</label></th>
															<th><label class="">মৌজা</label></th>
															<th><label class="">গ্রাম</label></th>
															<th><label class="">ই.এ</label></th>
															<th><label class="">হাউস হোল্ড</label></th>
															<th><label class="">জনসংখ্যার তথ্য</label></th>
														</thead>

														<tbody id="tbl_posts_body">
															<tr id="rec-1">
																<td>
																	<div class="text-left">
																		{{-- <label class="">বিভাগ</label> --}}

																		<select class="form-control req_division_id_1 select_1" id="req_division_id_1" name="division_id[]">
																			<option value="">--বিভাগ নির্বাচন করুন--</option> 
																			@foreach ($divisions as $division)
																				<option value="{{ $division->id }}">{{ $division->name_en }}</option>
																			@endforeach
																		</select>
																	</div>
																</td>
																<td>
																	<div class="text-left">
																		{{-- <label class="">জেলা</label> --}}

																		<select class="form-control req_district_id_1 select_1" id="req_district_id_1" name="district_id[]">
																			<option value="">--জেলা নির্বাচন করুন--</option> 
																		</select>
																	</div>
																</td>
																<td>
																	<div class="text-left">
																		{{-- <label class="">উপজেলা</label> --}}

																		<select class="form-control req_upazila_id_1 select_1" id="req_upazila_id_1" name="upazila_id[]">
																			<option value="">--উপজেলা নির্বাচন করুন--</option> 
																		</select>
																	</div>
																</td>
																<td>
																	<div class="text-left">
																		{{-- <label class="">ইউনিয়ন</label> --}}

																		<select class="form-control req_union_id_1 select_1" id="req_union_id_1" name="union_id[]">
																			<option value="">--ইউনিয়ন নির্বাচন করুন--</option> 
																		</select>
																	</div>
																</td>
																<td>
																	<div class="text-left">
																		{{-- <label class="">মৌজা</label> --}}

																		<select class="form-control req_mouza_id_1 select_1" id="req_mouza_id_1" name="mouza_id[]">
																			<option value="">--মৌজা নির্বাচন করুন--</option> 
																		</select>
																	</div>
																</td>
																<td>
																	<div class="text-left">
																		{{-- <label class="">গ্রাম</label> --}}

																		<select class="form-control req_village_id_1 select_1" id="req_village_id_1" name="village_id[]">
																			<option value="">--গ্রাম নির্বাচন করুন--</option> 
																		</select>
																	</div>
																</td>
																<td>
																	<div class="text-left">
																		{{-- <label class="">ই.এ</label> --}}

																		<select class="form-control req_ea_id_1 select_1" id="req_ea_id_1" name="ea_id[]">
																			<option value="">--ইএ নির্বাচন করুন--</option> 
																		</select>
																	</div>
																</td>
																<td>
																	<div class="text-left">
																		{{-- <label class="">হাউস হোল্ড</label> --}}

																		<select class="form-control req_household_id_1 select_1" id="req_household_id_1" name="household_id[]">
																			<option value="">--হাউস হোল্ড নির্বাচন করুন--</option> 
																		</select>
																	</div>
																</td>
																<td>
																	<div class="text-left">
																		{{-- <label class="">জনসংখ্যার তথ্য</label> --}}

																		<select class="form-control req_population_id_1 select_1" id="req_population_id_1" name="population_id[]">
																			<option value="">--জনসংখ্যার তথ্য নির্বাচন করুন--</option> 
																		</select>
																	</div>
																</td>
																<td> 
																	<div class="input-group-btn text-left"> 
																		<button class="btn btn-sm btn-success add-record" type="button" style="padding: 0.75rem">যোগ করুন</button>
																	</div>
																</td>
															</tr>
														</tbody>
													</table>
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

											<div style="display:none;">
												<table id="sample_table">
													<tr id="">
														<td>
															<div class="text-left">
																{{-- <label class="">বিভাগ</label> --}}

																<select class="form-control req_division_id select_" id="req_division_id" name="division_id[]">
																	<option value="">--বিভাগ নির্বাচন করুন--</option> 
																	@foreach ($divisions as $division)
																		<option value="{{ $division->id }}">{{ $division->name_en }}</option>
																	@endforeach
																</select>
															</div>
														</td>
														<td>
															<div class="text-left">
																{{-- <label class="">জেলা</label> --}}

																<select class="form-control req_district_id select_" id="req_district_id" name="district_id[]">
																	<option value="">--জেলা নির্বাচন করুন--</option> 
																</select>
															</div>
														</td>
														<td>
															<div class="text-left">
																{{-- <label class="">উপজেলা</label> --}}

																<select class="form-control req_upazila_id select_" id="req_upazila_id" name="upazila_id[]">
																	<option value="">--উপজেলা নির্বাচন করুন--</option> 
																</select>
															</div>
														</td>
														<td>
															<div class="text-left">
																{{-- <label class="">ইউনিয়ন</label> --}}

																<select class="form-control req_union_id select_" id="req_union_id" name="union_id[]">
																	<option value="">--ইউনিয়ন নির্বাচন করুন--</option> 
																</select>
															</div>
														</td>
														<td>
															<div class="text-left">
																{{-- <label class="">মৌজা</label> --}}

																<select class="form-control req_mouza_id select_" id="req_mouza_id" name="mouza_id[]">
																	<option value="">--মৌজা নির্বাচন করুন--</option> 
																</select>
															</div>
														</td>
														<td>
															<div class="text-left">
																{{-- <label class="">গ্রাম</label> --}}

																<select class="form-control req_village_id select_" id="req_village_id" name="village_id[]">
																	<option value="">--গ্রাম নির্বাচন করুন--</option> 
																</select>
															</div>
														</td>
														<td>
															<div class="text-left">
																{{-- <label class="">ই.এ</label> --}}

																<select class="form-control req_ea_id select_" id="req_ea_id" name="ea_id[]">
																	<option value="">--ই.এ নির্বাচন করুন--</option> 
																</select>
															</div>
														</td>
														<td>
															<div class="text-left">
																{{-- <label class="">হাউস হোল্ড</label> --}}

																<select class="form-control req_household_id select_" id="req_household_id" name="household_id[]">
																	<option value="">--হাউস হোল্ড নির্বাচন করুন--</option> 
																</select>
															</div>
														</td>
														<td>
															<div class="text-left">
																{{-- <label class="">জনসংখ্যার তথ্য</label> --}}

																<select class="form-control req_population_id select_" id="req_population_id" name="population_id[]">
																	<option value="">--জনসংখ্যার তথ্য নির্বাচন করুন--</option> 
																</select>
															</div>
														</td>
														<td>
															<div class="input-group-btn text-left"> 
																<button class="btn btn-sm btn-danger delete-record" type="button" data-id="0" style="padding: 0.75rem">Remove</button>
															</div>
														</td>
													</tr>
											   </table>
											</div>
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
			// Select2
			$('.select_1').select2();

			$("#req_division_id_1").on('change', function(e){
				e.preventDefault();

				$div_id = $("#req_division_id_1").val();

				if ($div_id != '') {
					$("#req_division_id_1").attr('name', 'division_id[]');
					$("#req_district_id_1").attr('name', 'district_id[]');
					$("#req_upazila_id_1").attr('name', 'upazila_id[]');
					$("#req_union_id_1").attr('name', 'union_id[]');
					$("#req_mouza_id_1").attr('name', 'mouza_id[]');
					$("#req_village_id_1").attr('name', 'village_id[]');
					$("#req_ea_id_1").attr('name', 'ea_id[]');
					$("#req_household_id_1").attr('name', 'household_id[]');
					$("#req_population_id_1").attr('name', 'population_id[]');
				} else {
					$("#req_division_id_1").removeAttr('name');
					$("#req_district_id_1").removeAttr('name');
					$("#req_upazila_id_1").removeAttr('name');
					$("#req_union_id_1").removeAttr('name');
					$("#req_mouza_id_1").removeAttr('name');
					$("#req_village_id_1").removeAttr('name');
					$("#req_ea_id_1").removeAttr('name');
					$("#req_household_id_1").removeAttr('name');
					$("#req_population_id_1").removeAttr('name');
				}

				var district_list = $("#req_district_id_1");

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$.ajax({
					type: 'POST',
					url: "{{route('districts')}}",
					data: {_token:$('input[name=_token]').val(),
					division_id: $(this).val()},

					success:function(response){
						$('option', district_list).remove();
						$('#req_district_id_1').append('<option value="">--Select District--</option>');
						$.each(response, function(){
							$('<option/>', {
								'value': this.id,
								'text': this.name_en
							}).appendTo('#req_district_id_1');
						});
					}

				});
			});

			$("#req_district_id_1").on('change', function(e){
				e.preventDefault();

				var upazila_list = $("#req_upazila_id_1");

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$.ajax({
					type: 'POST',
					url: "{{route('upazilas')}}",
					data: {_token:$('input[name=_token]').val(),
					district_id: $(this).val()},

					success:function(response){
						$('option', upazila_list).remove();
						$('#req_upazila_id_1').append('<option value="">--Select Upazila--</option>');
						$.each(response, function(){
							$('<option/>', {
								'value': this.id,
								'text': this.name_en
							}).appendTo('#req_upazila_id_1');
						});
					}

				});
			});

			$("#req_upazila_id_1").on('change', function(e){
				e.preventDefault();

				var union_list = $("#req_union_id_1");

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$.ajax({
					type: 'POST',
					url: "{{route('unions')}}",
					data: {_token:$('input[name=_token]').val(),
					upazila_id: $(this).val()},

					success:function(response){
						$('option', union_list).remove();
						$('#req_union_id_1').append('<option value="">--Select Union--</option>');
						$.each(response, function(){
							$('<option/>', {
								'value': this.id,
								'text': this.name_en
							}).appendTo('#req_union_id_1');
						});
					}

				});
			});

			$("#req_union_id_1").on('change', function(e){
				e.preventDefault();

				var mouza_list = $("#req_mouza_id_1");

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$.ajax({
					type: 'POST',
					url: "{{route('mouzas')}}",
					data: {_token:$('input[name=_token]').val(),
					union_id: $(this).val()},

					success:function(response){
						$('option', mouza_list).remove();
						$('#req_mouza_id_1').append('<option value="">--Select Mouza--</option>');
						$.each(response, function(){
							$('<option/>', {
								'value': this.id,
								'text': this.name_en
							}).appendTo('#req_mouza_id_1');
						});
					}

				});
			});

			$("#req_mouza_id_1").on('change', function(e){
				e.preventDefault();

				var village_list = $("#req_village_id_1");

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$.ajax({
					type: 'POST',
					url: "{{route('villages')}}",
					data: {_token:$('input[name=_token]').val(),
					mouza_id: $(this).val()},

					success:function(response){
						$('option', village_list).remove();
						$('#req_village_id_1').append('<option value="">--Select Village--</option>');
						$.each(response, function(){
							$('<option/>', {
								'value': this.id,
								'text': this.name_en
							}).appendTo('#req_village_id_1');
						});
					}

				});
			});

			$("#req_village_id_1").on('change', function(e){
				e.preventDefault();

				var ea_list = $("#req_ea_id_1");

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$.ajax({
					type: 'POST',
					url: "{{route('eas')}}",
					data: {_token:$('input[name=_token]').val(),
					village_id: $(this).val()},

					success:function(response){
						$('option', ea_list).remove();
						$('#req_ea_id_1').append('<option value="">--Select EA--</option>');
						$.each(response, function(){
							$('<option/>', {
								'value': this.id,
								'text': this.name_en
							}).appendTo('#req_ea_id_1');
						});
					}

				});
			});

			$("#req_ea_id_1").on('change', function(e){
				e.preventDefault();

				var household_list = $("#req_household_id_1");

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$.ajax({
					type: 'POST',
					url: "{{route('households')}}",
					data: {_token:$('input[name=_token]').val(),
					ea_id: $(this).val()},

					success:function(response){
						$('option', household_list).remove();
						$('#req_household_id_1').append('<option value="">--Select House Hold--</option>');
						$.each(response, function(){
							$('<option/>', {
								'value': this.id,
								'text': this.name_en
							}).appendTo('#req_household_id_1');
						});
					}

				});
			});

			$("#req_household_id_1").on('change', function(e){
				e.preventDefault();

				var population_list = $("#req_population_id_1");

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$.ajax({
					type: 'POST',
					url: "{{route('populations')}}",
					data: {_token:$('input[name=_token]').val(),
					household_id: $(this).val()},

					success:function(response){
						$('option', population_list).remove();
						$('#req_population_id_1').append('<option value="">--Select Population--</option>');
						$.each(response, function(){
							$('<option/>', {
								'value': this.id,
								'text': this.name_en
							}).appendTo('#req_population_id_1');
						});
					}

				});
			});
		</script>

		<script> 
			$(document).delegate('button.add-record', 'click', function(e) {
				e.preventDefault();   

				var content = $('#sample_table tr'),
				size = $('#tbl_posts >tbody >tr').length + 1,
				element = null,    
				element = content.clone();
				element.attr('id', 'rec-'+size);
				element.find('.delete-record').attr('data-id', size);
				element.find('.select_').addClass('select_'+size);
				element.find('.req_division_id').attr('id', 'req_division_id_'+size);
				element.find('.req_district_id').attr('id', 'req_district_id_'+size);
				element.find('.req_upazila_id').attr('id', 'req_upazila_id_'+size);
				element.find('.req_union_id').attr('id', 'req_union_id_'+size);
				element.find('.req_mouza_id').attr('id', 'req_mouza_id_'+size);
				element.find('.req_village_id').attr('id', 'req_village_id_'+size);
				element.find('.req_ea_id').attr('id', 'req_ea_id_'+size);
				element.find('.req_household_id').attr('id', 'req_household_id_'+size);
				element.find('.req_population_id').attr('id', 'req_population_id_'+size);
				element.appendTo('#tbl_posts_body');

				// Select2
				$('.select_'+size).select2();

				$("#req_division_id_"+size).on('change', function(e){
					e.preventDefault();

					$div_id = $("#req_division_id_"+size).val();

					if ($div_id != '') {
						$("#req_division_id_"+size).attr('name', 'division_id[]');
						$("#req_district_id_"+size).attr('name', 'district_id[]');
						$("#req_upazila_id_"+size).attr('name', 'upazila_id[]');
						$("#req_union_id_"+size).attr('name', 'union_id[]');
						$("#req_mouza_id_"+size).attr('name', 'mouza_id[]');
						$("#req_village_id_"+size).attr('name', 'village_id[]');
						$("#req_ea_id_"+size).attr('name', 'ea_id[]');
						$("#req_household_id_"+size).attr('name', 'household_id[]');
						$("#req_population_id_"+size).attr('name', 'population_id[]');
					} else {
						$("#req_division_id_"+size).removeAttr('name');
						$("#req_district_id_"+size).removeAttr('name');
						$("#req_upazila_id_"+size).removeAttr('name');
						$("#req_union_id_"+size).removeAttr('name');
						$("#req_mouza_id_"+size).removeAttr('name');
						$("#req_village_id_"+size).removeAttr('name');
						$("#req_ea_id_"+size).removeAttr('name');
						$("#req_household_id_"+size).removeAttr('name');
						$("#req_population_id_"+size).removeAttr('name');
					}

					var district_list = $("#req_district_id_"+size);

					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});

					$.ajax({
						type: 'POST',
						url: "{{route('districts')}}",
						data: {_token:$('input[name=_token]').val(),
						division_id: $(this).val()},

						success:function(response){
							$('option', district_list).remove();
							$('#req_district_id_'+size).append('<option value="">--Select District--</option>');
							$.each(response, function(){
								$('<option/>', {
									'value': this.id,
									'text': this.name_en
								}).appendTo('#req_district_id_'+size);
							});
						}

					});
				});

				$("#req_district_id_"+size).on('change', function(e){
					e.preventDefault();

					var upazila_list = $("#req_upazila_id_"+size);

					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});

					$.ajax({
						type: 'POST',
						url: "{{route('upazilas')}}",
						data: {_token:$('input[name=_token]').val(),
						district_id: $(this).val()},

						success:function(response){
							$('option', upazila_list).remove();
							$('#req_upazila_id_'+size).append('<option value="">--Select Upazila--</option>');
							$.each(response, function(){
								$('<option/>', {
									'value': this.id,
									'text': this.name_en
								}).appendTo('#req_upazila_id_'+size);
							});
						}

					});
				});

				$("#req_upazila_id_"+size).on('change', function(e){
					e.preventDefault();

					var union_list = $("#req_union_id_"+size);

					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});

					$.ajax({
						type: 'POST',
						url: "{{route('unions')}}",
						data: {_token:$('input[name=_token]').val(),
						upazila_id: $(this).val()},

						success:function(response){
							$('option', union_list).remove();
							$('#req_union_id_'+size).append('<option value="">--Select Union--</option>');
							$.each(response, function(){
								$('<option/>', {
									'value': this.id,
									'text': this.name_en
								}).appendTo('#req_union_id_'+size);
							});
						}

					});
				});

				$("#req_union_id_"+size).on('change', function(e){
					e.preventDefault();

					var mouza_list = $("#req_mouza_id_"+size);

					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});

					$.ajax({
						type: 'POST',
						url: "{{route('mouzas')}}",
						data: {_token:$('input[name=_token]').val(),
						union_id: $(this).val()},

						success:function(response){
							$('option', mouza_list).remove();
							$('#req_mouza_id_'+size).append('<option value="">--Select Mouza--</option>');
							$.each(response, function(){
								$('<option/>', {
									'value': this.id,
									'text': this.name_en
								}).appendTo('#req_mouza_id_'+size);
							});
						}

					});
				});

				$("#req_mouza_id_"+size).on('change', function(e){
					e.preventDefault();

					var village_list = $("#req_village_id_"+size);

					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});

					$.ajax({
						type: 'POST',
						url: "{{route('villages')}}",
						data: {_token:$('input[name=_token]').val(),
						mouza_id: $(this).val()},

						success:function(response){
							$('option', village_list).remove();
							$('#req_village_id_'+size).append('<option value="">--Select Village--</option>');
							$.each(response, function(){
								$('<option/>', {
									'value': this.id,
									'text': this.name_en
								}).appendTo('#req_village_id_'+size);
							});
						}

					});
				});

				$("#req_village_id_"+size).on('change', function(e){
					e.preventDefault();

					var ea_list = $("#req_ea_id_"+size);

					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});

					$.ajax({
						type: 'POST',
						url: "{{route('eas')}}",
						data: {_token:$('input[name=_token]').val(),
						village_id: $(this).val()},

						success:function(response){
							$('option', ea_list).remove();
							$('#req_ea_id_'+size).append('<option value="">--Select EA--</option>');
							$.each(response, function(){
								$('<option/>', {
									'value': this.id,
									'text': this.name_en
								}).appendTo('#req_ea_id_'+size);
							});
						}

					});
				});

				$("#req_ea_id_"+size).on('change', function(e){
					e.preventDefault();

					var household_list = $("#req_household_id_"+size);

					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});

					$.ajax({
						type: 'POST',
						url: "{{route('households')}}",
						data: {_token:$('input[name=_token]').val(),
						ea_id: $(this).val()},

						success:function(response){
							$('option', household_list).remove();
							$('#req_household_id_'+size).append('<option value="">--Select House Hold--</option>');
							$.each(response, function(){
								$('<option/>', {
									'value': this.id,
									'text': this.name_en
								}).appendTo('#req_household_id_'+size);
							});
						}

					});
				});

				$("#req_household_id_"+size).on('change', function(e){
					e.preventDefault();

					var population_list = $("#req_population_id_"+size);

					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});

					$.ajax({
						type: 'POST',
						url: "{{route('populations')}}",
						data: {_token:$('input[name=_token]').val(),
						household_id: $(this).val()},

						success:function(response){
							$('option', population_list).remove();
							$('#req_population_id_'+size).append('<option value="">--Select Population--</option>');
							$.each(response, function(){
								$('<option/>', {
									'value': this.id,
									'text': this.name_en
								}).appendTo('#req_population_id_'+size);
							});
						}

					});
				});
			});

			$(document).delegate('button.delete-record', 'click', function(e) {
				e.preventDefault();    

				var id = $(this).attr('data-id');
				var targetDiv = $(this).attr('targetDiv');
				$('#rec-' + id).remove();

				return true;
			});
		</script>

		<script> 
			$("#service_id").on('change', function(e){
				e.preventDefault();

				var service_additional_list = $("#service_additional_id");

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$.ajax({
					type: 'POST',
					url: "{{route('service_additionals')}}",
					data: {_token:$('input[name=_token]').val(),
					service_id: $(this).val()},

					success:function(response){
						$('option', service_additional_list).remove();
						$.each(response, function(){
							$('<option/>', {
								'value': this.id,
								'text': this.item_name_en
							}).appendTo('#service_additional_id');
						});
					}

				});
			});

			$("#service_id").on('change', function() {
				var data = $(this).val();

				if (data == 1) {
					$(".microData").show();
					$("#service_item_type").attr("required", 'required');
					$("#year").attr("required", 'required');

					$(".microDataPrice").hide();
					$("#price_bdt_personal").removeAttr("required");
					$("#price_bdt_org").removeAttr("required");
					$("#price_usd_personal").removeAttr("required");
					$("#price_usd_org").removeAttr("required");
					$("#price_bdt_personal").val("");
					$("#price_bdt_org").val("");
					$("#price_usd_personal").val("");
					$("#price_usd_org").val("");
				} else {
					$(".microData").hide();
					$("#service_item_type").removeAttr("required");
					$("#service_item_type").val("");
					$("#department_id").val("");
					$("#year").removeAttr("required");
					$("#year").val("");
					$("#description").val("");
					$("#service_additional_id").val("");
					$("#data_subcategory_id").val("");
					$("#file_type").val("");
					$("#data_file").val("");
					$("#sample_attachment").val("");

					$(".microDataPrice").show();
					$("#price_bdt_personal").attr("required", 'required');
					$("#price_bdt_org").attr("required", 'required');
					$("#price_usd_personal").attr("required", 'required');
					$("#price_usd_org").attr("required", 'required');
				}
			});
		</script>
	@endpush