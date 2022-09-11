@extends('backend.layout.master')

@push('css')
	<style>
		.table th, .table td {
			border-top: none;
		}
	</style>
@endpush

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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">পরিষেবা আইটেম সংশোধন করুন</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">ড্যাশবোর্ড</a>
                            </li>
                            @can('all_service_items')
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.serviceItem.index') }}" class="text-muted">পরিষেবা আইটেম পরিচালনা করুন</a>
                                </li>
                            @endcan
                            <li class="breadcrumb-item active">
                                <a class="text-muted">পরিষেবা আইটেম সংশোধন করুন</a>
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
                                <h3 class="card-title">পরিষেবা আইটেম সংশোধন করুন</h3>
                            </div>

                            <!--begin::Form-->
                            <form class="form" action="{{ route('admin.serviceItem.update', $serviceItem->id) }}"
                                method="post" id="kt_form_1" enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <div class="card-body">


									<div class="row">
										<div class="form-group col-sm-6">
											<label class="col-form-label text-right">পরিষেবার নাম: : <span class="text-danger">*</span></label>
	
												{{-- <select class="form-control select2" name="service_id" id="service_id" required>
													@foreach ($services as $service)
														<option value="{{ $service->id }}"
															{{ $serviceItem->service_id == $service->id ? 'selected' : '' }}>
															{{ $service->name_en }}</option>
													@endforeach
												</select> --}}
	
												<input type="hidden" name="service_id" value="{{ $serviceItem->service_id }}">
												<input type="text" class="form-control"
													value="{{ $serviceItem->service ? $serviceItem->service->name_en : '' }}" readonly />
											
										</div>
	
										<div class="form-group col-sm-6">
											<label class="col-form-label text-right">পরিষেবা আইটেমের নাম (ইংরেজি):<span class="text-danger">*</span></label>
											
												<input type="text" class="form-control" name="item_name_en" value="{{ $serviceItem->item_name_en }}" required />
											
										</div>
									</div>

                               

									@if ($serviceItem->service_id == 1)
									<div class="row">
										<div class="form-group col-sm-6 microData">
											<label class="col-form-label text-right">পরিষেবা আইটেমের বিবরণ</label>
										
												<textarea class="form-control" name="description" row="3" col="">{{ $serviceItem->description }}</textarea>
										
										</div>

										<div class="form-group col-sm-6 microData">
											<label class="col-form-label text-right">বিভাগ নাম: </label>

												<select class="form-control select2" name="department_id" id="department_id">
													@foreach ($departments as $department)
														<option value="{{ $department->id }}"
															{{ $serviceItem->department_id == $department->id ? 'selected' : '' }}>
															{{ $department->name_en }}</option>
													@endforeach
												</select>
											
										</div>

										<div class="form-group col-sm-6 microData">
											<label class="col-form-label text-right">পরিষেবা অতিরিক্ত আইটেম: </label>
	
												<select class="form-control select-multiple-additional" name="service_additional_id[]" id="service_additional_id" multiple>
													@foreach ($serviceItemAdditionals as $serviceItemAdditional)
														<option value="{{ $serviceItemAdditional->id }}"  {{ (in_array($serviceItemAdditional->id, $additionals)) ? 'selected' : '' }}>{{ $serviceItemAdditional->item_name_en }}</option>
													@endforeach
												</select>
											
										</div>

										{{-- <div class="form-group col-sm-6">
											<label class="col-form-label text-right">Data-Type: <span class="text-danger">*</span></label>
											
												<select class="form-control select2" name="data_type" id="data_type">
													<option value="1" {{ $serviceItem->data_type == 1 ? 'selected' : '' }}>
														Hardcopy</option>
													<option value="2" {{ $serviceItem->data_type == 2 ? 'selected' : '' }}>
														Softcopy</option>
												</select>
											
										</div> --}}





										<div class="form-group col-sm-6 microData">
											<label class="col-form-label text-right">ডেটা বিভাগ: <span class="text-danger">*</span></label>
										
												<select class="form-control select2" name="service_item_type" id="service_item_type" required>
													<option value="1" {{ $serviceItem->service_item_type == 1 ? 'selected' : '' }}>জরিপ</option>
													<option value="2" {{ $serviceItem->service_item_type == 2 ? 'selected' : '' }}>জনগণনা</option>
												</select>
											
										</div>

										<div class="form-group col-sm-6 microData">
											<label class="col-form-label text-right">ডেটা উপশ্রেণি: </label>
											
												<select class="form-control select2" name="data_subcategory_id" id="data_subcategory_id">
	
													@foreach ($datatypes as $datatype)
														<option value="{{ $datatype->id }}" {{ $serviceItem->data_subcategory_id == $datatype->id ? 'selected' : '' }}>{{ $datatype->name_bn }}</option>
													@endforeach
												</select>
											
										</div>
										<div class="form-group col-sm-6 microData">
											<label class="col-form-label text-right">পরিষেবা আইটেম বছর:
												<span class="text-danger">*</span></label>
										
												<input type="number" class="form-control" name="year" placeholder="Enter Service Rank Order" value="{{ $serviceItem->year }}" required/>
											
										</div>
										@if ($serviceItem->file_type)
										<div class="form-group col-sm-6 microData">
											<label class="col-form-label text-right">ফাইল এক্সটেনশনের ধরণ: </label>
										
												<select class="form-control select2" name="file_type" id="file_type" required>
															<option value="excel" {{ $serviceItem->file_type == 'excel' ? 'selected' : '' }}>এক্সেল</option>
															<option value="stata" {{ $serviceItem->file_type == 'stata' ? 'selected' : '' }}>স্ট্যাটা</option>
															<option value="other" {{ $serviceItem->file_type == 'other' ? 'selected' : '' }}>অন্যান্য</option>
													
												</select>
											
										</div>
										@endif

										<div class="form-group col-sm-6 microData">
											<label class="col-form-label text-right">ফাইল আপলোড করুন: </label>
											
												<input type="file" class="form-control py-2" name="data_file" />
											
										</div>
	
										<div class="form-group col-sm-6 microData">
											<label class="col-form-label text-right">নমুনা ডেটা আপলোড: </label>
											
												<input type="file" class="form-control py-2" name="sample_attachment" />
											
										</div>

									@else
										<div class="form-group col-sm-6 microDataPrice">
											<label class="col-form-label text-right">মূল্য বিডিটি (ব্যক্তিগত/শিক্ষার্থী):
												<span class="text-danger">*</span></label>
											
												<input type="number" class="form-control" name="price_bdt_personal"
													placeholder="Enter Service Item Price BDT (Student/Personal)"
													value="{{ number_format((float) $serviceItem->price_bdt_personal, 2, '.', '') }}" required/>
										
										</div>
										<div class="form-group col-sm-6 microDataPrice">
											<label class="col-form-label text-right">মূল্য বিডিটি (সাংগঠনিক): <span class="text-danger">*</span></label>
										
												<input type="number" class="form-control" name="price_bdt_org"
													placeholder="Enter Service Item Price BDT (Organizational)"
													value="{{ number_format((float) $serviceItem->price_bdt_org, 2, '.', '') }}" required/>
											
										</div>

										<div class="form-group col-sm-6 microDataPrice">
											<label class="col-form-label text-right">মূল্য ইউএসডি (ব্যক্তিগত/শিক্ষার্থী):
												<span class="text-danger">*</span></label>
										
												<input type="number" class="form-control" name="price_usd_personal"
													placeholder="Enter Service Item Price USD (Student/Personal)"
													value="{{ number_format((float) $serviceItem->price_usd_personal, 2, '.', '') }}" required/>
											
										</div>
										<div class="form-group col-sm-6 microDataPrice">
											<label class="col-form-label text-right">মূল্য ইউএসডি (সাংগঠনিক): <span class="text-danger">*</span></label>
											
												<input type="number" class="form-control" name="price_usd_org"
													placeholder="Enter Service Item Price USD (Organizational)"
													value="{{ number_format((float) $serviceItem->price_usd_org, 2, '.', '') }}" required/>
										
										</div>
									@endif

                                    {{-- <div class="form-group col-sm-6">
                                        <label class="col-form-label text-right">পরিষেবা আইটেমের নাম (বাংলা): <span class="text-danger">*</span></label>
											
                                   
                                            <input type="text" class="form-control" name="item_name_bn" placeholder="Enter Service Item Bangla Name" value="{{ $serviceItem->item_name_bn }}" />
                                       
                                    </div> --}}

                                    {{-- <div class="form-group col-sm-6">
                                        <label class="col-form-label text-right">পরিষেবা আইটেম পদক্রম:
                                            <span class="text-danger">*</span></label>
                                        
                                            <input type="number" class="form-control" name="ordering" placeholder="Enter Service Rank Order" value="{{ $serviceItem->ordering }}" />
                                      
                                    </div> --}}

                                    <div class="form-group col-sm-6">
                                        <label class="col-form-label text-right">স্ট্যাটাস: <span
											class="text-danger">*</span></label>
                                       
                                            <select class="form-control select2" name="status" id="status" required>
                                                @if ($serviceItem->status == 1)
                                                    <option value="1" selected>সক্রিয়</option>
                                                    <option value="0">নিষ্ক্রিয়</option>
                                                @else
                                                    <option value="1">সক্রিয়</option>
                                                    <option value="0" selected>নিষ্ক্রিয়</option>
                                                @endif
                                            </select>
                                    </div>
								
									</div>
									

								@if ($serviceItem->service_id == 1)
									@if ($value == 'yes')

										<table class="table table-responsive microData">
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
											<tbody>
												@foreach ($serviceItemLocations as $item)
													
													<tr id="rec-1">
														<td>
															<div class="text-left">
																

																<input type="hidden" name="division_id[]" value="{{ $item->division_id }}">

																@if ($item->division_id)
																	<input type="text" class="form-control" value="{{ $item->division ? $item->division->name_en : ''}}" disabled>
																@else
																	<input type="text" class="form-control" value="কোনো বিভাগ নির্বাচিত নেই" disabled>
																@endif
															</div>
														</td>
														<td>
															<div class="text-left">
																

																<input type="hidden" name="district_id[]" value="{{ $item->district_id }}">

																@if ($item->district_id)
																	<input type="text" class="form-control" value="{{ $item->district ? $item->district->name_en : ''}}" disabled>
																@else
																	<input type="text" class="form-control" value="কোনো জেলা নির্বাচিত নেই" disabled>
																@endif
															</div>
														</td>
														<td>
															<div class="text-left">
																

																<input type="hidden" name="upazila_id[]" value="{{ $item->upazila_id }}">

																@if ($item->upazila_id)
																	<input type="text" class="form-control" value="{{ $item->upazila ? $item->upazila->name_en : ''}}" disabled>
																@else
																	<input type="text" class="form-control" value="কোনো উপজেলা নির্বাচিত নেই" disabled>
																@endif
															</div>
														</td>
														<td>
															<div class="text-left">
																

																<input type="hidden" name="union_id[]" value="{{ $item->union_id }}">

																@if ($item->union_id)
																	<input type="text" class="form-control" value="{{ $item->union ? $item->union->name_en : ''}}" disabled>
																@else
																	<input type="text" class="form-control" value="কোনো ইউনিয়ন নির্বাচিত নেই" disabled>
																@endif
															</div>
														</td>
														<td>
															<div class="text-left">
																

																<input type="hidden" name="mouza_id[]" value="{{ $item->mouza_id }}">

																@if ($item->mouza_id)
																	<input type="text" class="form-control" value="{{ $item->mouza ? $item->mouza->name_en : ''}}" disabled>
																@else
																	<input type="text" class="form-control" value="কোনো মৌজা নির্বাচিত নেই" disabled>
																@endif
															</div>
														</td>
														<td>
															<div class="text-left">
																

																<input type="hidden" name="village_id[]" value="{{ $item->village_id }}">

																@if ($item->village_id)
																	<input type="text" class="form-control" value="{{ $item->village ? $item->village->name_en : ''}}" disabled>
																@else
																	<input type="text" class="form-control" value="কোনো গ্রাম নির্বাচিত নেই" disabled>
																@endif
															</div>
														</td>
														<td>
															<div class="text-left">
																

																<input type="hidden" name="ea_id[]" value="{{ $item->ea_id }}">

																@if ($item->ea_id)
																	<input type="text" class="form-control" value="{{ $item->ea ? $item->ea->name_en : ''}}" disabled>
																@else
																	<input type="text" class="form-control" value="কোনো ই.এ নির্বাচিত নেই" disabled>
																@endif
															</div>
														</td>
														<td>
															<div class="text-left">
																

																<input type="hidden" name="household_id[]" value="{{ $item->household_id }}">

																@if ($item->household_id)
																	<input type="text" class="form-control" value="{{ $item->household ? $item->household->name_en : ''}}" disabled>
																@else
																	<input type="text" class="form-control" value="কোন হাউস হোল্ড নির্বাচিত নেই" disabled>
																@endif
															</div>
														</td>
														<td>
															<div class="text-left">
															

																<input type="hidden" name="population_id[]" value="{{ $item->population_id }}">

																@if ($item->population_id)
																	<input type="text" class="form-control" value="{{ $item->population ? $item->population->name_en : ''}}" disabled>
																@else
																	<input type="text" class="form-control" value="কোন জনসংখ্যা তথ্য নির্বাচন করা হয়নি" disabled>
																@endif
															</div>
														</td>

														<td> 
															<div class="input-group-btn text-left"> 
																<button class="btn btn-sm btn-success remove_location{{ $item->id }}" onClick="remove_location({{ $item->id }})" type="button" style="padding: 0.75rem">মুছে ফেলুন</button>
															</div>
														</td>
														
													</tr>
												@endforeach
											</tbody>
										</table>
									@endif
									
									<div class="card-header microData" style="padding-left: 0;padding-bottom: 10px;">
										<h3 class="">আরো অবস্থান যোগ করুন</h3>
									</div>
									
									<table class="table table-responsive microData" id="tbl_posts">
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
														{{-- <label class="">Division</label> --}}

														<select class="form-control req_division_id_1 select_1" id="req_division_id_1">
															<option value="">--বিভাগ নির্বাচন করুন--</option> 

															@foreach ($divisions as $division)
																<option value="{{ $division->id }}">{{ $division->name_en }}</option>
															@endforeach
														</select>
													</div>
												</td>
												<td>
													<div class="text-left">
														{{-- <label class="">District</label> --}}

														<select class="form-control req_district_id_1 select_1" id="req_district_id_1">
															<option value="">--জেলা নির্বাচন করুন--</option> 
														</select>
													</div>
												</td>
												<td>
													<div class="text-left">
														{{-- <label class="">Upazila</label> --}}

														<select class="form-control req_upazila_id_1 select_1" id="req_upazila_id_1">
															<option value="">--উপজেলা নির্বাচন করুন--</option> 
														</select>
													</div>
												</td>
												<td>
													<div class="text-left">
														{{-- <label class="">Union</label> --}}

														<select class="form-control req_union_id_1 select_1" id="req_union_id_1">
															<option value="">--ইউনিয়ন নির্বাচন করুন--</option> 
														</select>
													</div>
												</td>
												<td>
													<div class="text-left">
														{{-- <label class="">Mouza</label> --}}

														<select class="form-control req_mouza_id_1 select_1" id="req_mouza_id_1">
															<option value="">--মৌজা নির্বাচন করুন--</option> 
														</select>
													</div>
												</td>
												<td>
													<div class="text-left">
														{{-- <label class="">Village</label> --}}

														<select class="form-control req_village_id_1 select_1" id="req_village_id_1">
															<option value="">--গ্রাম নির্বাচন করুন--</option> 
														</select>
													</div>
												</td>
												<td>
													<div class="text-left">
														{{-- <label class="">EA</label> --}}

														<select class="form-control req_ea_id_1 select_1" id="req_ea_id_1">
															<option value="">--ই.এ নির্বাচন করুন--</option> 
														</select>
													</div>
												</td>
												<td>
													<div class="text-left">
														{{-- <label class="">House Hold</label> --}}

														<select class="form-control req_household_id_1 select_1" id="req_household_id_1">
															<option value="">--হাউস হোল্ড নির্বাচন করুন--</option> 
														</select>
													</div>
												</td>
												<td>
													<div class="text-left">
														{{-- <label class="">Population Info</label> --}}

														<select class="form-control req_population_id_1 select_1" id="req_population_id_1">
															<option value="">--জনসংখ্যার তথ্য নির্বাচন করুন--</option> 
														</select>
													</div>
												</td>
												<td> 
													<div class="input-group-btn text-left"> 
														<button class="btn btn-sm btn-success add-record" type="button" style="padding: 0.75rem">সংরক্ষণ করুন</button>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
									{{-- ./end --}}
								@endif
									
                                </div>

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-right">
                                            <button type="submit" class="btn btn-primary font-weight-bold"
                                                name="submitButton">হালনাগাদ করুন</button>
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
												{{-- <label class="">Division</label> --}}

												<select class="form-control req_division_id select_" id="req_division_id">
													<option value="">--বিভাগ নির্বাচন করুন--</option> 

													@foreach ($divisions as $division)
														<option value="{{ $division->id }}">{{ $division->name_en }}</option>
													@endforeach
												</select>
											</div>
										</td>
										<td>
											<div class="text-left">
												{{-- <label class="">District</label> --}}

												<select class="form-control req_district_id select_" id="req_district_id">
													<option value="">--জেলা নির্বাচন করুন--</option> 
												</select>
											</div>
										</td>
										<td>
											<div class="text-left">
												{{-- <label class="">Upazila</label> --}}

												<select class="form-control req_upazila_id select_" id="req_upazila_id">
													<option value="">--উপজেলা নির্বাচন করুন--</option> 
												</select>
											</div>
										</td>
										<td>
											<div class="text-left">
												{{-- <label class="">Union</label> --}}

												<select class="form-control req_union_id select_" id="req_union_id">
													<option value="">--ইউনিয়ন নির্বাচন করুন--</option> 
												</select>
											</div>
										</td>
										<td>
											<div class="text-left">
												{{-- <label class="">Mouza</label> --}}

												<select class="form-control req_mouza_id select_" id="req_mouza_id" name="mouza_id[]">
													<option value="">--মৌজা নির্বাচন করুন--</option> 
												</select>
											</div>
										</td>
										<td>
											<div class="text-left">
												{{-- <label class="">Village</label> --}}

												<select class="form-control req_village_id select_" id="req_village_id">
													<option value="">--গ্রাম নির্বাচন করুন--</option> 
												</select>
											</div>
										</td>
										<td>
											<div class="text-left">
												{{-- <label class="">EA</label> --}}

												<select class="form-control req_ea_id select_" id="req_ea_id">
													<option value="">--ই.এ নির্বাচন করুন--</option> 
												</select>
											</div>
										</td>
										<td>
											<div class="text-left">
												{{-- <label class="">House Hold</label> --}}

												<select class="form-control req_household_id select_" id="req_household_id">
													<option value="">--হাউস হোল্ড নির্বাচন করুন--</option> 
												</select>
											</div>
										</td>
										<td>
											<div class="text-left">
												{{-- <label class="">Population Info</label> --}}

												<select class="form-control req_population_id select_" id="req_population_id">
													<option value="">--জনসংখ্যার তথ্য নির্বাচন করুন--</option> 
												</select>
											</div>
										</td>
										<td>
											<div class="input-group-btn text-left"> 
												<button class="btn btn-sm btn-danger delete-record" type="button" data-id="0" style="padding: 0.75rem">মুছে ফেলুন</button>
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
			function remove_location(id) {

				var data_id = id;
				var url =  '<a href="{{route("admin.serviceItem.remove", ":id")}}" class="swal2-confirm swal2-styled" title="Delete">Delete</a>';
				url = url.replace(':id', data_id);
				
				Swal.fire({
					title: 'Are you sure want to delete ?',
					icon: 'info',
					showCancelButton: true,
					confirmButtonText: url,
				}).then((result) => {
					if (result.isConfirmed) {
						Swal.fire('Location Deleted Successfully!', '', 'success')
					} else if (result.dismiss === "cancel") {
						Swal.fire('Canceled', '', 'error')
					}
				})
			}
		</script>

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

			// function addressDynamic(id, selectedId, rowId, placeId, route, division_id) {

			// 	var current_list = $("#req_"+placeId+"_"+rowId);

			// 	$.ajaxSetup({
			// 		headers: {
			// 			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			// 		}
			// 	});

			// 	$.ajax({
			// 		type: 'POST',
			// 		url: "+route+",
			// 		data: {_token:$('input[name=_token]').val(),
			// 		division_id: id},

			// 		success:function(response){
			// 			$('option', district_list).remove();
			// 			$("#req_"+placeId+"_"+rowId).append('<option value="">--Select District--</option>');
			// 			$.each(response, function(){
			// 				$('<option/>', {
			// 					'value': this.id,
			// 					'text': this.name_en
			// 				}).appendTo("#req_"+placeId+"_"+rowId");
			// 			});
			// 		}

			// 	});
			// }
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
