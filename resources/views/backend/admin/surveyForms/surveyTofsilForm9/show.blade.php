
@extends('backend.layout.master')

@push('css')
    <style> 
        .table th, .table td{
            border-top: none !important;
            font-size: 1.5em;
        }
        .table thead th{
            font-size: 1.5em;
        }
        tbody#tbl_posts_body label {
            height: 40px;
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">ভূমি ব্যাবহার ও সেচ পরিসংখ্যান জরিপ তফসিল (তফসিল-৯)</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">ড্যাশবোর্ড</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a class="text-muted">ভূমি ব্যাবহার ও সেচ পরিসংখ্যান জরিপ তফসিল (তফসিল-৯)</a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                @include('alerts.alerts')
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <div class="card card-custom example example-compact">
                            <div class="card card-custom gutter-b example example-compact">
                                <div class="card-header">
                                    <h3 class="card-title">ভূমি ব্যাবহার ও সেচ পরিসংখ্যান জরিপ তফসিল (তফসিল-৯)</h3>
                                    
                                    <div class="card-toolbar">

                                    </div>
                                </div>
                                <!--begin::Form-->
                                <form>
                                    <div class="card-body">
                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">সাধারণ তথ্য</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="upazila_id" style="font-size: 1.5em; font-weight: bold;"><b>উপজেলা/থানা: </b></label>
                                                            <input class="form-control" type="text" id="upazila_id" @if (!empty($processList))
                                                            value="{{ $processList->upazila ? $processList->upazila->name_bd : '' }}"
                                                            @endif  disabled/>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="upazila_code" style="font-size: 1.5em; font-weight: bold;"><b>উপজেলা/থানা কোড: </b></label>
                                                            <input class="form-control" type="number" name="upazila_code" id="upazila_code"  @if (!empty($processList))
                                                            value="{{ $processList->upazila ? $processList->upazila->upazila_bbs_code : '' }}"
                                                            @endif  disabled/>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="upazila_volume_in_squre_kilometer" style="font-size: 1.5em; font-weight: bold;"><b>উপজেলা/থানা আয়তন (বর্গকিলোমিটার): </b></label>
                                                            <input class="form-control" type="number" name="upazila_volume_in_squre_kilometer" id="upazila_volume_in_squre_kilometer" value="" disabled/>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="upazila_volume_in_acre"style="font-size: 1.5em; font-weight: bold;"><b>উপজেলা/থানা আয়তন (একর): </b></label>
                                                            <input class="form-control" type="number" @if (!empty($processList))
                                                            value="{{ $processList->upazila ? $processList->upazila->land_area : '' }}"  @endif name="upazila_volume_in_acre" id="upazila_volume_in_acre" disabled/>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="information_collection_time" style="font-size: 1.5em; font-weight: bold;"><b>তথ্য সংগ্রহের সময়কাল: </b></label>
                                                            <input class="form-control" type="date" name="information_collection_time" value="{{ $surveyTofsilForm9Data->information_collection_time }}" id="information_collection_time" disabled/>
                                                        </div> 
                                                    </div>

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="year" style="font-size: 1.5em; font-weight: bold;"><b>সন: </b></label>
                                                            <input class="form-control" type="number" name="year" id="year" value="{{ date('Y') }}" disabled/>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">ভূমি ব্যাবহার (কৃষি জমি)</h3>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_permanent_crops_land" style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে স্থায়ী ফসলের জমির পরিমাণ (একরে): </b></label>
                                                            <input class="form-control" type="number" name="last_year_permanent_crops_land" value="{{ $surveyTofsilForm9Data->agricultureLand ? $surveyTofsilForm9Data->agricultureLand->last_year_permanent_crops_land : '' }}" id="last_year_permanent_crops_land" disabled/>
                                                        </div>
                                                    </div> 

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_permanent_crops_land" style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে স্থায়ী ফসলের জমির পরিমাণ (একরে): </b></label>
                                                            <input class="form-control" type="number" name="current_year_permanent_crops_land" value="{{ $surveyTofsilForm9Data->agricultureLand ? $surveyTofsilForm9Data->agricultureLand->current_year_permanent_crops_land : '' }}" id="current_year_permanent_crops_land" disabled/>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_temporary_crops_land" style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে অস্থায়ী ফসলের নীট জমির পরিমাণ (একরে): </b></label>
                                                            <input class="form-control" type="number" name="last_year_temporary_crops_land" value="{{ $surveyTofsilForm9Data->agricultureLand ? $surveyTofsilForm9Data->agricultureLand->last_year_temporary_crops_land : '' }}" id="last_year_temporary_crops_land" disabled/>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_temporary_crops_land"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে অস্থায়ী ফসলের নীট জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" name="current_year_temporary_crops_land" value="{{ $surveyTofsilForm9Data->agricultureLand ? $surveyTofsilForm9Data->agricultureLand->current_year_temporary_crops_land : '' }}" id="current_year_temporary_crops_land" disabled/>
                                                        </div>
                                                    </div> 

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_current_fallow_land"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে পতিত জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" name="last_year_current_fallow_land" value="{{ $surveyTofsilForm9Data->agricultureLand ? $surveyTofsilForm9Data->agricultureLand->last_year_current_fallow_land : '' }}" id="last_year_current_fallow_land" disabled />
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_current_fallow_land"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে পতিত জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" name="current_year_current_fallow_land" value="{{ $surveyTofsilForm9Data->agricultureLand ? $surveyTofsilForm9Data->agricultureLand->current_year_current_fallow_land : '' }}" id="current_year_current_fallow_land" disabled/>
                                                        </div>
                                                    </div> 

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_arable_uncultivated_land"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে আবাদযোগ্য অনাবাদী জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" name="last_year_arable_uncultivated_land" value="{{ $surveyTofsilForm9Data->agricultureLand ? $surveyTofsilForm9Data->agricultureLand->last_year_arable_uncultivated_land : '' }}" id="last_year_arable_uncultivated_land" disabled />
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_arable_uncultivated_land"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে আবাদযোগ্য অনাবাদী জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" name="current_year_arable_uncultivated_land" value="{{ $surveyTofsilForm9Data->agricultureLand ? $surveyTofsilForm9Data->agricultureLand->current_year_arable_uncultivated_land : '' }}" id="current_year_arable_uncultivated_land" disabled />
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">ভূমি ব্যাবহার (অস্থায়ী ফসলের খামারের অধীন জমি)</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_jute_research"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে পাট গবেষণা খামার জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->farmLands ? $surveyTofsilForm9Data->farmLands->last_year_land_jute_research : ''}}" name="last_year_land_jute_research" id="last_year_land_jute_research" disabled />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_jute_research"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে পাট গবেষণা খামার জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->farmLands ? $surveyTofsilForm9Data->farmLands->current_year_land_jute_research : ''}}" name="current_year_land_jute_research" id="current_year_land_jute_research" disabled />
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_wheat"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে গম গবেষণা খামার জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number"  value="{{$surveyTofsilForm9Data->farmLands ? $surveyTofsilForm9Data->farmLands->last_year_land_wheat : ''}}"  name="last_year_land_wheat" id="last_year_land_wheat" disabled/>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_wheat"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে গম গবেষণা খামার জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" value="{{$surveyTofsilForm9Data->farmLands ? $surveyTofsilForm9Data->farmLands->current_year_land_wheat : ''}}"  type="number" name="current_year_land_wheat" id="current_year_land_wheat" disabled />
                                                        </div>
                                                    </div> 

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_paddy_research"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে ধান গবেষণা খামার জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->farmLands ? $surveyTofsilForm9Data->farmLands->last_year_land_paddy_research : ''}}"   name="last_year_land_paddy_research" id="last_year_land_paddy_research" disabled/>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_paddy_research"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে ধান গবেষণা খামার জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->farmLands ? $surveyTofsilForm9Data->farmLands->current_year_land_paddy_research : ''}}" name="current_year_land_paddy_research" id="current_year_land_paddy_research" disabled />
                                                        </div>
                                                    </div> 

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_sugarcane_research"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে ইক্ষু/আখ গবেষণা খামার জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->farmLands ? $surveyTofsilForm9Data->farmLands->last_year_land_sugarcane_research : ''}}" name="last_year_land_sugarcane_research" id="last_year_land_sugarcane_research" disabled/>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_sugarcane_research"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে ইক্ষু/আখ গবেষণা খামার জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->farmLands ? $surveyTofsilForm9Data->farmLands->current_year_land_sugarcane_research : ''}}"  name="current_year_land_sugarcane_research" id="current_year_land_sugarcane_research" disabled/>
                                                        </div>
                                                    </div> 

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_vegetables_and_others_research"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে সবজী ও অন্যান্য গবেষণা খামার জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" name="last_year_land_vegetables_and_others_research"  value="{{$surveyTofsilForm9Data->farmLands ? $surveyTofsilForm9Data->farmLands->last_year_land_vegetables_and_others_research : ''}}" id="last_year_land_vegetables_and_others_research" disabled />
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_vegetables_and_others_research"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে সবজী ও অন্যান্য গবেষণা খামার জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->farmLands ? $surveyTofsilForm9Data->farmLands->current_year_land_vegetables_and_others_research : ''}}" name="current_year_land_vegetables_and_others_research" id="current_year_land_vegetables_and_others_research" disabled />
                                                        </div>
                                                    </div> 

                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">ভূমি ব্যাবহার (স্থায়ী ফসলের খামারের অধীন জমি)</h3>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_cotton_research" style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে তুলা গবেষণা খামার জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->farmLands ? $surveyTofsilForm9Data->farmLands->last_year_land_cotton_research : ''}}" name="last_year_land_cotton_research" id="last_year_land_cotton_research" disabled />
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_cotton_research" style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে তুলা গবেষণা খামার জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->farmLands ? $surveyTofsilForm9Data->farmLands->current_year_land_cotton_research : ''}}" name="current_year_land_cotton_research" id="current_year_land_cotton_research" disabled />
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_fruit_research"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে ফল গবেষণা খামার জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->farmLands ? $surveyTofsilForm9Data->farmLands->last_year_land_fruit_research : ''}}" name="last_year_land_fruit_research" id="last_year_land_fruit_research" disabled/>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_fruit_research"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে ফল গবেষণা খামার জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->farmLands ? $surveyTofsilForm9Data->farmLands->current_year_land_fruit_research : ''}}"  name="current_year_land_fruit_research" id="current_year_land_fruit_research" disabled/>
                                                        </div>
                                                    </div> 

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_others_permanent_research"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে অন্যান্য স্থায়ী ফসলের খামার জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->farmLands ? $surveyTofsilForm9Data->farmLands->current_year_land_fruit_research : ''}}" name="last_year_land_others_permanent_research" id="last_year_land_others_permanent_research" disabled/>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_others_permanent_research"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে অন্যান্য স্থায়ী ফসলের খামার জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->farmLands ? $surveyTofsilForm9Data->farmLands->current_year_land_others_permanent_research : ''}}" name="current_year_land_others_permanent_research" id="current_year_land_others_permanent_research" disabled />
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">ভূমি ব্যাবহার (ফসল বহির্ভূত খামারের অধীন জমি)</h3>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_fish"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে মৎস্য খামার জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->farmLands ? $surveyTofsilForm9Data->farmLands->last_year_land_fish : ''}}" name="last_year_land_fish" id="last_year_land_fish" disabled/>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_fish"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে মৎস্য খামার জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->farmLands ? $surveyTofsilForm9Data->farmLands->current_year_land_fish : ''}}" name="current_year_land_fish" id="current_year_land_fish" disabled/>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_cattle"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে গবাদি পশু খামার জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->farmLands ? $surveyTofsilForm9Data->farmLands->last_year_land_cattle : ''}}" name="last_year_land_cattle" id="last_year_land_cattle" disabled/>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_cattle"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে গবাদি পশু খামার জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->farmLands ? $surveyTofsilForm9Data->farmLands->current_year_land_cattle : ''}}" name="current_year_land_cattle" id="current_year_land_cattle" disabled/>
                                                        </div>
                                                    </div> 

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_poultry"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে হাঁস-মুরগী খামার জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->farmLands ? $surveyTofsilForm9Data->farmLands->last_year_land_poultry : ''}}" name="last_year_land_poultry" id="last_year_land_poultry" disabled/>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_poultry"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে হাঁস-মুরগী খামার জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->farmLands ? $surveyTofsilForm9Data->farmLands->current_year_land_poultry : ''}}" name="current_year_land_poultry" id="current_year_land_poultry" disabled/>
                                                        </div>
                                                    </div> 

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_others"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে অন্যান্য খামারের জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->farmLands ? $surveyTofsilForm9Data->farmLands->last_year_land_others : ''}}"  name="last_year_land_others" id="last_year_land_others" disabled/>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_others"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে অন্যান্য খামারের জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" name="current_year_land_others" id="current_year_land_others"  value="{{$surveyTofsilForm9Data->farmLands ? $surveyTofsilForm9Data->farmLands->current_year_land_others : ''}}" disabled/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">ভূমি ব্যাবহার (নার্সারি)</h3>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_govt_nursery"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে সরকারি নার্সারির জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{ $surveyTofsilForm9Data->nurseryForestsLand ? $surveyTofsilForm9Data->nurseryForestsLand->last_year_land_govt_nursery : ''}}" name="last_year_land_govt_nursery" id="last_year_land_govt_nursery" disabled/>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_govt_nursery"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে সরকারি নার্সারির জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{ $surveyTofsilForm9Data->nurseryForestsLand ? $surveyTofsilForm9Data->nurseryForestsLand->current_year_land_govt_nursery : ''}}" name="current_year_land_govt_nursery" id="current_year_land_govt_nursery" disabled/>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_private_nursery"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে বেসরকারি নার্সারির জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{ $surveyTofsilForm9Data->nurseryForestsLand ? $surveyTofsilForm9Data->nurseryForestsLand->last_year_land_private_nursery : ''}}" name="last_year_land_private_nursery" id="last_year_land_private_nursery" disabled/>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_private_nursery"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে বেসরকারি নার্সারির জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{ $surveyTofsilForm9Data->nurseryForestsLand ? $surveyTofsilForm9Data->nurseryForestsLand->current_year_land_private_nursery : ''}}" name="current_year_land_private_nursery" id="current_year_land_private_nursery" disabled/>
                                                        </div>
                                                    </div> 

                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">ভূমি ব্যাবহার (বনভূমি/জঙ্গল)</h3>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_govt_forest"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে সরকারি বনভূমির জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{ $surveyTofsilForm9Data->nurseryForestsLand ? $surveyTofsilForm9Data->nurseryForestsLand->last_year_land_govt_forest : ''}}" name="last_year_land_govt_forest" id="last_year_land_govt_forest" disabled/>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_govt_forest"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে সরকারি বনভূমির জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{ $surveyTofsilForm9Data->nurseryForestsLand ? $surveyTofsilForm9Data->nurseryForestsLand->current_year_land_govt_forest : ''}}" name="current_year_land_govt_forest" id="current_year_land_govt_forest" disabled/>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_private_forest"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে বেসরকারি বনভূমির জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" name="last_year_land_private_forest" id="last_year_land_private_forest" value="{{ $surveyTofsilForm9Data->nurseryForestsLand ? $surveyTofsilForm9Data->nurseryForestsLand->last_year_land_private_forest : ''}}" disabled/>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_private_forest"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে বেসরকারি বনভূমির জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" name="current_year_land_private_forest" id="current_year_land_private_forest" value="{{ $surveyTofsilForm9Data->nurseryForestsLand ? $surveyTofsilForm9Data->nurseryForestsLand->current_year_land_private_forest : ''}}" disabled/>
                                                        </div>
                                                    </div> 

                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">ভূমি ব্যাবহার (জলাশয়/নদ-নদী)</h3>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_river"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে নদ-নদী জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->riversLand ? $surveyTofsilForm9Data->riversLand->last_year_land_river : ''}}" name="last_year_land_river" id="last_year_land_river" disabled/>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_river"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে নদ-নদী জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->riversLand ? $surveyTofsilForm9Data->riversLand->current_year_land_river : ''}}"  name="current_year_land_river" id="current_year_land_river" disabled/>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_pond"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে পুকুর/দিঘী জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->riversLand ? $surveyTofsilForm9Data->riversLand->last_year_land_pond : ''}}" name="last_year_land_pond" id="last_year_land_pond" disabled/>
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_pond"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে পুকুর/দিঘী জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->riversLand ? $surveyTofsilForm9Data->riversLand->current_year_land_pond : ''}}" name="current_year_land_pond" id="current_year_land_pond" disabled/>
                                                        </div>
                                                    </div> 

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_canal"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে খাল-বিল জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->riversLand ? $surveyTofsilForm9Data->riversLand->last_year_land_canal : ''}}"  name="last_year_land_canal" id="last_year_land_canal" disabled/>
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_canal"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে খাল-বিল জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->riversLand ? $surveyTofsilForm9Data->riversLand->current_year_land_canal : ''}}" name="current_year_land_canal" id="current_year_land_canal" disabled/>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_dive"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে ডোবা-নালা জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->riversLand ? $surveyTofsilForm9Data->riversLand->last_year_land_dive : ''}}"  name="last_year_land_dive" id="last_year_land_dive" disabled/>
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_dive"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে ডোবা-নালা জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->riversLand ? $surveyTofsilForm9Data->riversLand->current_year_land_dive : ''}}" name="current_year_land_dive" id="current_year_land_dive" disabled/>
                                                        </div>
                                                    </div> 

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_haor_baor"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে হাওড়-বাওড় জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->riversLand ? $surveyTofsilForm9Data->riversLand->last_year_land_haor_baor : ''}}" name="last_year_land_haor_baor" id="last_year_land_haor_baor" disabled/>
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_haor_baor"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে হাওড়-বাওড় জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->riversLand ? $surveyTofsilForm9Data->riversLand->current_year_land_haor_baor : ''}}" name="current_year_land_haor_baor" id="current_year_land_haor_baor" disabled/>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">ভূমি ব্যাবহার (খনিজ ও পাহাড়)</h3>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_hills"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে পাহাড়/টিলা জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{ $surveyTofsilForm9Data->mineralHillLand ? $surveyTofsilForm9Data->mineralHillLand->last_year_land_hills : ''}}" name="last_year_land_hills" id="last_year_land_hills" disabled/>
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_hills"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে পাহাড়/টিলা জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{ $surveyTofsilForm9Data->mineralHillLand ? $surveyTofsilForm9Data->mineralHillLand->current_year_land_hills : ''}}" name="current_year_land_hills" id="current_year_land_hills" disabled/>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_gas_field_or_oil_field"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে গ্যাস/তৈল ক্ষেত্র জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" name="last_year_land_gas_field_or_oil_field" id="last_year_land_gas_field_or_oil_field" value="{{ $surveyTofsilForm9Data->mineralHillLand ? $surveyTofsilForm9Data->mineralHillLand->last_year_land_gas_field_or_oil_field : ''}}" disabled/>
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_gas_field_or_oil_field"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে গ্যাস/তৈল ক্ষেত্র জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" name="current_year_land_gas_field_or_oil_field" id="current_year_land_gas_field_or_oil_field" value="{{ $surveyTofsilForm9Data->mineralHillLand ? $surveyTofsilForm9Data->mineralHillLand->current_year_land_gas_field_or_oil_field : ''}}" disabled/>
                                                        </div>
                                                    </div> 

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_stone_mine"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে পাথর খনির জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{ $surveyTofsilForm9Data->mineralHillLand ? $surveyTofsilForm9Data->mineralHillLand->last_year_land_stone_mine : ''}}" name="last_year_land_stone_mine" id="last_year_land_stone_mine" disabled/>
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_stone_mine"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে পাথর খনির জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" name="current_year_land_stone_mine" id="current_year_land_stone_mine" value="{{ $surveyTofsilForm9Data->mineralHillLand ? $surveyTofsilForm9Data->mineralHillLand->current_year_land_stone_mine : ''}}" disabled/>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_coil_mine"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে কয়লা খনির জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{ $surveyTofsilForm9Data->mineralHillLand ? $surveyTofsilForm9Data->mineralHillLand->last_year_land_coil_mine : ''}}" name="last_year_land_coil_mine" id="last_year_land_coil_mine" disabled/>
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_coil_mine"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে কয়লা খনির জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{ $surveyTofsilForm9Data->mineralHillLand ? $surveyTofsilForm9Data->mineralHillLand->current_year_land_coil_mine : ''}}" name="current_year_land_coil_mine" id="current_year_land_coil_mine" disabled/>
                                                        </div>
                                                    </div> 

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_others_min"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে অন্যান্য খনিজের অধীন জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" name="last_year_land_others_min" id="last_year_land_others_min" value="{{ $surveyTofsilForm9Data->mineralHillLand ? $surveyTofsilForm9Data->mineralHillLand->last_year_land_others_min : ''}}" disabled/>
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_others_min"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে অন্যান্য খনিজের অধীন জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" name="current_year_land_others_min" id="current_year_land_others_min" value="{{ $surveyTofsilForm9Data->mineralHillLand ? $surveyTofsilForm9Data->mineralHillLand->current_year_land_others_min : ''}}" disabled/>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">ভূমি ব্যাবহার (অকৃষি জমি)</h3>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_houses"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে ঘরবাড়ি/বসত বাড়ি জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->nonAgricultureLand ? $surveyTofsilForm9Data->nonAgricultureLand->last_year_land_houses : ''}}" name="last_year_land_houses" id="last_year_land_houses" disabled/>
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_houses"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে ঘরবাড়ি/বসত বাড়ি জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" name="current_year_land_houses" id="current_year_land_houses" value="{{$surveyTofsilForm9Data->nonAgricultureLand ? $surveyTofsilForm9Data->nonAgricultureLand->current_year_land_houses : ''}}" disabled/>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_roads"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে রাস্তা-ঘাট/রেলপথ জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number"  value="{{$surveyTofsilForm9Data->nonAgricultureLand ? $surveyTofsilForm9Data->nonAgricultureLand->last_year_land_roads : ''}}" name="last_year_land_roads" id="last_year_land_roads"disabled />
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_roads"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে রাস্তা-ঘাট/রেলপথ জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number"  value="{{$surveyTofsilForm9Data->nonAgricultureLand ? $surveyTofsilForm9Data->nonAgricultureLand->current_year_land_roads : ''}}" name="current_year_land_roads" id="current_year_land_roads"disabled />
                                                        </div>
                                                    </div> 

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_market"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে হাট-বাজার জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->nonAgricultureLand ? $surveyTofsilForm9Data->nonAgricultureLand->last_year_land_market : ''}}" name="last_year_land_market" id="last_year_land_market"disabled />
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_market"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে হাট-বাজার জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" name="current_year_land_market" id="current_year_land_market" value="{{$surveyTofsilForm9Data->nonAgricultureLand ? $surveyTofsilForm9Data->nonAgricultureLand->current_year_land_market : ''}}"disabled />
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_office_organization"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে অফিস-আদালত ও ব্যবসা প্রতিষ্ঠান জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number"  value="{{$surveyTofsilForm9Data->nonAgricultureLand ? $surveyTofsilForm9Data->nonAgricultureLand->last_year_land_office_organization : ''}}" name="last_year_land_office_organization" id="last_year_land_office_organization"disabled />
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_office_organization"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে অফিস-আদালত ও ব্যবসা প্রতিষ্ঠান জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number"  value="{{$surveyTofsilForm9Data->nonAgricultureLand ? $surveyTofsilForm9Data->nonAgricultureLand->current_year_land_office_organization : ''}}" name="current_year_land_office_organization" id="current_year_land_office_organization"disabled />
                                                        </div>
                                                    </div> 

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_educational_organization"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে শিক্ষা প্রতিষ্ঠান জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->nonAgricultureLand ? $surveyTofsilForm9Data->nonAgricultureLand->last_year_land_educational_organization : ''}}" name="last_year_land_educational_organization" id="last_year_land_educational_organization"disabled />
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_educational_organization"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে শিক্ষা প্রতিষ্ঠান জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->nonAgricultureLand ? $surveyTofsilForm9Data->nonAgricultureLand->current_year_land_educational_organization : ''}}" name="current_year_land_educational_organization" id="current_year_land_educational_organization" disabled/>
                                                        </div>
                                                    </div> 

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_mill_factory"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে মিল-কারখানা জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number"  value="{{$surveyTofsilForm9Data->nonAgricultureLand ? $surveyTofsilForm9Data->nonAgricultureLand->last_year_land_mill_factory : ''}}" name="last_year_land_mill_factory" id="last_year_land_mill_factory"disabled />
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_mill_factory"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে মিল-কারখানা জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number"  value="{{$surveyTofsilForm9Data->nonAgricultureLand ? $surveyTofsilForm9Data->nonAgricultureLand->current_year_land_mill_factory : ''}}" name="current_year_land_mill_factory" id="current_year_land_mill_factory"disabled />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_bus_stand"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে বাসস্ট্যান্ড/রেলস্টেশন/স্থলবন্দর/বিমানবন্দর জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number"  value="{{$surveyTofsilForm9Data->nonAgricultureLand ? $surveyTofsilForm9Data->nonAgricultureLand->last_year_land_bus_stand : ''}}" name="last_year_land_bus_stand" id="last_year_land_bus_stand"disabled />
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_bus_stand"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে বাসস্ট্যান্ড/রেলস্টেশন/স্থলবন্দর/বিমানবন্দর জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" value="{{$surveyTofsilForm9Data->nonAgricultureLand ? $surveyTofsilForm9Data->nonAgricultureLand->current_year_land_bus_stand : ''}}" type="number"  name="current_year_land_bus_stand" id="current_year_land_bus_stand"disabled />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_religious_organization"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে ধর্মীয় প্রতিষ্ঠান, মসজিদ, মন্দির, গির্জা জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number"  value="{{$surveyTofsilForm9Data->nonAgricultureLand ? $surveyTofsilForm9Data->nonAgricultureLand->last_year_land_religious_organization : ''}}" name="last_year_land_religious_organization" id="last_year_land_religious_organization"disabled />
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_religious_organization"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে ধর্মীয় প্রতিষ্ঠান, মসজিদ, মন্দির, গির্জা জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number"  value="{{$surveyTofsilForm9Data->nonAgricultureLand ? $surveyTofsilForm9Data->nonAgricultureLand->current_year_land_religious_organization : ''}}" name="current_year_land_religious_organization" id="current_year_land_religious_organization"disabled />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_cemetery"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে কবরস্থান/শ্মশান জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" value="{{$surveyTofsilForm9Data->nonAgricultureLand ? $surveyTofsilForm9Data->nonAgricultureLand->last_year_land_cemetery : ''}}" type="number"  name="last_year_land_cemetery" id="last_year_land_cemetery"disabled />
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_cemetery"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে কবরস্থান/শ্মশান জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" name="current_year_land_cemetery" value="{{$surveyTofsilForm9Data->nonAgricultureLand ? $surveyTofsilForm9Data->nonAgricultureLand->current_year_land_cemetery : ''}}" id="current_year_land_cemetery"disabled />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_social_organization"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে সামাজিক প্রতিষ্ঠান/আশ্রম/এতিমখানা/মাজার ইত্যাদি জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number"  value="{{$surveyTofsilForm9Data->nonAgricultureLand ? $surveyTofsilForm9Data->nonAgricultureLand->last_year_land_social_organization : ''}}" name="last_year_land_social_organization" id="last_year_land_social_organization"disabled />
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_social_organization"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে সামাজিক প্রতিষ্ঠান/আশ্রম/এতিমখানা/মাজার ইত্যাদি জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->nonAgricultureLand ? $surveyTofsilForm9Data->nonAgricultureLand->current_year_land_social_organization : ''}}" name="current_year_land_social_organization" id="current_year_land_social_organization"disabled />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_park"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে খেলার মাঠ/স্টেডিয়াম/পার্ক জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->nonAgricultureLand ? $surveyTofsilForm9Data->nonAgricultureLand->last_year_land_park : ''}}" name="last_year_land_park" id="last_year_land_park"disabled />
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_park"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে খেলার মাঠ/স্টেডিয়াম/পার্ক জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->nonAgricultureLand ? $surveyTofsilForm9Data->nonAgricultureLand->current_year_land_park : ''}}" name="current_year_land_park" id="current_year_land_park"disabled />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="last_year_land_others"style="font-size: 1.5em; font-weight: bold;"><b> গত বছরে অন্যান্য জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" name="last_year_land_others" value="{{$surveyTofsilForm9Data->nonAgricultureLand ? $surveyTofsilForm9Data->nonAgricultureLand->last_year_land_others : ''}}" id="last_year_land_others" disabled/>
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="current_year_land_others"style="font-size: 1.5em; font-weight: bold;"><b> চলতি বছরে অন্যান্য জমির পরিমাণ (একরে): </b></label>
                                                            
                                                            <input class="form-control" type="number" name="current_year_land_others" value="{{$surveyTofsilForm9Data->nonAgricultureLand ? $surveyTofsilForm9Data->nonAgricultureLand->current_year_land_others : ''}}" id="current_year_land_others" disabled/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">ভূমির প্রধান শ্রেণি বিভাগ</h3>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" style="padding-left: 35px; padding-right:35px;">

                                                        <table class="table table-bordered"> 
                                                            <thead> 
                                                                <tr>
                                                                    <th style="text-align: left" rowspan="2">ভূমির প্রধান শ্রেণি বিভাগ</th>
                                                                    <th rowspan="2">কোড</th>
                                                                    <th colspan="2">জমির পরিমাণ (একরে)</th>
                                                                    <th rowspan="2">গত বছরের তুলনায় হ্রাস/বৃদ্ধির কারণ</th>
                                                                </tr>

                                                                <tr>
                                                                    <th>গত বছর</th>
                                                                    <th>চলতি বছর</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody> 
                                                                <tr> 
                                                                    <td align="left">বনভূমি</td>
                                                                    <td>10</td>
                                                                    <td>
                                                                        <input value="{{$surveyTofsilForm9Data->mainClassDivisionLand ? $surveyTofsilForm9Data->mainClassDivisionLand->last_year_land_forest : ''}}" class="form-control" type="number" name="last_year_land_forest" id="last_year_land_forest" disabled/>
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{$surveyTofsilForm9Data->mainClassDivisionLand ? $surveyTofsilForm9Data->mainClassDivisionLand->current_year_land_forest : ''}}" type="number" name="current_year_land_forest" id="current_year_land_forest" disabled/>
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{$surveyTofsilForm9Data->mainClassDivisionLand ? $surveyTofsilForm9Data->mainClassDivisionLand->reason_forest : ''}}" type="text" name="reason_forest" id="reason_forest" disabled/>
                                                                    </td>
                                                                </tr>

                                                                <tr> 
                                                                    <td align="left">নীট অস্থায়ী ফসলের জমি</td>
                                                                    <td>11</td>
                                                                    <td>
                                                                        <input class="form-control" value="{{$surveyTofsilForm9Data->mainClassDivisionLand ? $surveyTofsilForm9Data->mainClassDivisionLand->last_year_land_net_temporary_crop : ''}}" type="number" name="last_year_land_net_temporary_crop" id="last_year_land_net_temporary_crop" disabled/>
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{$surveyTofsilForm9Data->mainClassDivisionLand ? $surveyTofsilForm9Data->mainClassDivisionLand->current_year_land_net_temporary_crop : ''}}" type="number" name="current_year_land_net_temporary_crop" id="current_year_land_net_temporary_crop" disabled/>
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{$surveyTofsilForm9Data->mainClassDivisionLand ? $surveyTofsilForm9Data->mainClassDivisionLand->reason_net_temporary_crop : ''}}" type="text" name="reason_net_temporary_crop" id="reason_net_temporary_crop" disabled/>
                                                                    </td>
                                                                </tr>

                                                                <tr> 
                                                                    <td align="left">স্থায়ী ফসলের জমি (শুধু বাগান)</td>
                                                                    <td>12</td>
                                                                    <td>
                                                                        <input class="form-control" value="{{$surveyTofsilForm9Data->mainClassDivisionLand ? $surveyTofsilForm9Data->mainClassDivisionLand->last_year_land_permanent : ''}}" type="number" name="last_year_land_permanent" id="last_year_land_permanent" disabled />
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{$surveyTofsilForm9Data->mainClassDivisionLand ? $surveyTofsilForm9Data->mainClassDivisionLand->current_year_land_permanent : ''}}" type="number" name="current_year_land_permanent" id="current_year_land_permanent" disabled />
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{$surveyTofsilForm9Data->mainClassDivisionLand ? $surveyTofsilForm9Data->mainClassDivisionLand->reason_permanent_crop : ''}}" type="text" name="reason_permanent_crop" id="reason_permanent_crop" disabled />
                                                                    </td>
                                                                </tr>

                                                                <tr> 
                                                                    <td align="left">নার্সারির অধীন জমি</td>
                                                                    <td>13</td>
                                                                    <td>
                                                                        <input class="form-control" value="{{$surveyTofsilForm9Data->mainClassDivisionLand ? $surveyTofsilForm9Data->mainClassDivisionLand->last_year_land_nursery : ''}}" type="number" name="last_year_land_nursery" id="last_year_land_nursery" disabled/>
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{$surveyTofsilForm9Data->mainClassDivisionLand ? $surveyTofsilForm9Data->mainClassDivisionLand->current_year_land_nursery : ''}}" type="number" name="current_year_land_nursery" id="current_year_land_nursery" disabled/>
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{$surveyTofsilForm9Data->mainClassDivisionLand ? $surveyTofsilForm9Data->mainClassDivisionLand->reason_nursery : ''}}" type="text" name="reason_nursery" id="reason_nursery" disabled/>
                                                                    </td>
                                                                </tr>

                                                                <tr> 
                                                                    <td align="left">চলতি পতিত জমি</td>
                                                                    <td>14</td>
                                                                    <td>
                                                                        <input class="form-control" value="{{$surveyTofsilForm9Data->mainClassDivisionLand ? $surveyTofsilForm9Data->mainClassDivisionLand->last_year_land_fallen : ''}}" type="number" name="last_year_land_fallen" id="last_year_land_fallen" disabled/>
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{$surveyTofsilForm9Data->mainClassDivisionLand ? $surveyTofsilForm9Data->mainClassDivisionLand->current_year_land_fallen : ''}}" type="number" name="current_year_land_fallen" id="current_year_land_fallen" disabled/>
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{$surveyTofsilForm9Data->mainClassDivisionLand ? $surveyTofsilForm9Data->mainClassDivisionLand->reason_fallen : ''}}" type="text" name="reason_fallen" id="reason_fallen" disabled/>
                                                                    </td>
                                                                </tr>

                                                                <tr> 
                                                                    <td align="left">আবাদযোগ্য অনাবাদী জমি</td>
                                                                    <td>15</td>
                                                                    <td>
                                                                        <input class="form-control" value="{{$surveyTofsilForm9Data->mainClassDivisionLand ? $surveyTofsilForm9Data->mainClassDivisionLand->last_year_land_arable_uncultivable : ''}}" type="number" name="last_year_land_arable_uncultivable" id="last_year_land_arable_uncultivable" disabled/>
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{$surveyTofsilForm9Data->mainClassDivisionLand ? $surveyTofsilForm9Data->mainClassDivisionLand->current_year_land_arable_uncultivable : ''}}" type="number" name="current_year_land_arable_uncultivable" id="current_year_land_arable_uncultivable" disabled/>
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{$surveyTofsilForm9Data->mainClassDivisionLand ? $surveyTofsilForm9Data->mainClassDivisionLand->reason_arable_uncultivable : ''}}" type="text" name="reason_arable_uncultivable" id="reason_arable_uncultivable" disabled/>
                                                                    </td>
                                                                </tr>

                                                                <tr> 
                                                                    <td align="left">আবাদের জন্য অপ্রাপ্ত জমি</td>
                                                                    <td>16</td>
                                                                    <td>
                                                                        <input class="form-control" value="{{$surveyTofsilForm9Data->mainClassDivisionLand ? $surveyTofsilForm9Data->mainClassDivisionLand->last_year_land_unavailable : ''}}" type="number" name="last_year_land_unavailable" id="last_year_land_unavailable" disabled/>
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{$surveyTofsilForm9Data->mainClassDivisionLand ? $surveyTofsilForm9Data->mainClassDivisionLand->current_year_land_unavailable : ''}}" type="number" name="current_year_land_unavailable" id="current_year_land_unavailable" disabled/>
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{$surveyTofsilForm9Data->mainClassDivisionLand ? $surveyTofsilForm9Data->mainClassDivisionLand->reason_unavailable : ''}}" type="text" name="reason_unavailable" id="reason_unavailable" disabled/>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>   
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">অস্থায়ী নীট ফসলাধীন জমির ব্যবহারভেদে জমির পরিমাণ</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                           
                                                <div class="row">
                                                    <div class="col-md-12" style="padding-left: 35px; padding-right:35px;">

                                                        <table class="table table-bordered"> 
                                                            <thead> 
                                                                <tr>
                                                                    <th style="text-align: left" rowspan="2">অস্থায়ী ফসলাধীন জমির ধরন</th>
                                                                    <th rowspan="2">কোড</th>
                                                                    <th colspan="2">জমির পরিমাণ (একরে)</th>
                                                                    <th rowspan="2">গত বছরের তুলনায় হ্রাস/বৃদ্ধির কারণ</th>
                                                                </tr>

                                                                <tr>
                                                                    <th>গত বছর</th>
                                                                    <th>চলতি বছর</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody> 
                                                                <tr> 
                                                                    <td align="left">এক-ফসলী জমি</td>
                                                                    <td>20</td>
                                                                    <td>
                                                                        <input class="form-control" type="number" value="{{$surveyTofsilForm9Data->termoraryNetLand ? $surveyTofsilForm9Data->termoraryNetLand->last_year_land_one_crop : ''}}" name="last_year_land_one_crop" id="last_year_land_one_crop" disabled/>
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{$surveyTofsilForm9Data->termoraryNetLand ? $surveyTofsilForm9Data->termoraryNetLand->current_year_land_one_crop : ''}}" type="number" name="current_year_land_one_crop" id="current_year_land_one_crop" disabled/>
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{$surveyTofsilForm9Data->termoraryNetLand ? $surveyTofsilForm9Data->termoraryNetLand->reason_one_crop : ''}}" type="text" name="reason_one_crop" id="reason_one_crop" disabled/>
                                                                    </td>
                                                                </tr>

                                                                <tr> 
                                                                    <td align="left">দুই-ফসলী জমি</td>
                                                                    <td>21</td>
                                                                    <td>
                                                                        <input class="form-control" value="{{$surveyTofsilForm9Data->termoraryNetLand ? $surveyTofsilForm9Data->termoraryNetLand->last_year_land_two_crop : ''}}" type="number" name="last_year_land_two_crop" id="last_year_land_two_crop" disabled/>
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{$surveyTofsilForm9Data->termoraryNetLand ? $surveyTofsilForm9Data->termoraryNetLand->current_year_land_two_crop : ''}}" type="number" name="current_year_land_two_crop" id="current_year_land_two_crop" disabled />
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{$surveyTofsilForm9Data->termoraryNetLand ? $surveyTofsilForm9Data->termoraryNetLand->reason_two_crop : ''}}" type="text" name="reason_two_crop" id="reason_two_crop" disabled />
                                                                    </td>
                                                                </tr>

                                                                <tr> 
                                                                    <td align="left">তিন-ফসলী জমি</td>
                                                                    <td>22</td>
                                                                    <td>
                                                                        <input class="form-control" value="{{$surveyTofsilForm9Data->termoraryNetLand ? $surveyTofsilForm9Data->termoraryNetLand->last_year_land_three_crop : ''}}" type="number" name="last_year_land_three_crop" id="last_year_land_three_crop" disabled />
                                                                    </td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->termoraryNetLand ? $surveyTofsilForm9Data->termoraryNetLand->current_year_land_three_crop : ''}}" type="number" name="current_year_land_three_crop" id="current_year_land_three_crop" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->termoraryNetLand ? $surveyTofsilForm9Data->termoraryNetLand->reason_three_crop : ''}}" type="text" name="reason_three_crop" id="reason_three_crop" disabled /></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td align="left">চার ও তদূর্ধ্ব-ফসলী জমি</td>
                                                                    <td>23</td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->termoraryNetLand ? $surveyTofsilForm9Data->termoraryNetLand->last_year_land_four_or_more_crop : ''}}" type="number" name="last_year_land_four_or_more_crop" id="last_year_land_four_or_more_crop" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->termoraryNetLand ? $surveyTofsilForm9Data->termoraryNetLand->current_year_land_four_or_more_crop : ''}}" type="number" name="current_year_land_four_or_more_crop" id="current_year_land_four_or_more_crop" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->termoraryNetLand ? $surveyTofsilForm9Data->termoraryNetLand->reason_four_or_more_crop : ''}}" type="text" name="reason_four_or_more_crop" id="reason_four_or_more_crop" disabled /></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>   
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">ফসল/ঋতুভেদে মোট ফসলাধীন জমির পরিমাণ</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                           
                                                <div class="row">
                                                    <div class="col-md-12" style="padding-left: 35px; padding-right:35px;">

                                                        <table class="table table-bordered"> 
                                                            <thead> 
                                                                <tr>
                                                                    <th colspan="5" style="background-color: #EBF9CF;">অস্থায়ী ফসলাধীন জমি</th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="text-align: left" rowspan="2">অস্থায়ী ফসলাধীন জমির ধরন</th>
                                                                    <th rowspan="2">কোড</th>
                                                                    <th colspan="2">জমির পরিমাণ (একরে)</th>
                                                                    <th rowspan="2">গত বছরের তুলনায় হ্রাস/বৃদ্ধির কারণ</th>
                                                                </tr>

                                                                <tr>
                                                                    <th>গত বছর</th>
                                                                    <th>চলতি বছর</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody> 
                                                                <tr> 
                                                                    <td align="left">রবি শস্য</td>
                                                                    <td>30</td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->cropSeasonalLand ? $surveyTofsilForm9Data->cropSeasonalLand->last_year_land_robi_grain : ''}}" type="number" name="last_year_land_robi_grain" id="last_year_land_robi_grain" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->cropSeasonalLand ? $surveyTofsilForm9Data->cropSeasonalLand->current_year_land_robi_grain : ''}}" type="number" name="current_year_land_robi_grain" id="current_year_land_robi_grain" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->cropSeasonalLand ? $surveyTofsilForm9Data->cropSeasonalLand->reason_robi_grain : ''}}" type="text" name="reason_robi_grain" id="reason_robi_grain" disabled /></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td align="left">খরিপ শস্য</td>
                                                                    <td>31</td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->cropSeasonalLand ? $surveyTofsilForm9Data->cropSeasonalLand->last_year_land_kharip_grain : ''}}" type="number" name="last_year_land_kharip_grain" id="last_year_land_kharip_grain" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->cropSeasonalLand ? $surveyTofsilForm9Data->cropSeasonalLand->current_year_land_kharip_grain : ''}}" type="number" name="current_year_land_kharip_grain" id="current_year_land_kharip_grain" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->cropSeasonalLand ? $surveyTofsilForm9Data->cropSeasonalLand->reason_kharip_grain : ''}}" type="text" name="reason_kharip_grain" id="reason_kharip_grain" disabled /></td>
                                                                </tr>
                                                            </tbody>

                                                            <thead> 
                                                                <tr>
                                                                    <th colspan="5" style="background-color: #EBF9CF;">স্থায়ী/বর্ষজীবী ফসলাধীন জমি</th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="text-align: left" rowspan="2">স্থায়ী/বর্ষজীবী ফসলাধীন জমির ধরন</th>
                                                                    <th rowspan="2">কোড</th>
                                                                    <th colspan="2">জমির পরিমাণ (একরে)</th>
                                                                    <th rowspan="2">গত বছরের তুলনায় হ্রাস/বৃদ্ধির কারণ</th>
                                                                </tr>

                                                                <tr>
                                                                    <th>গত বছর</th>
                                                                    <th>চলতি বছর</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody> 
                                                                <tr> 
                                                                    <td align="left">ফলজাতীয় শস্য</td>
                                                                    <td>40</td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->cropSeasonalLand ? $surveyTofsilForm9Data->cropSeasonalLand->last_year_land_fruit_grain : ''}}" type="number" name="last_year_land_fruit_grain" id="last_year_land_fruit_grain" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->cropSeasonalLand ? $surveyTofsilForm9Data->cropSeasonalLand->current_year_land_fruit_grain : ''}}" type="number" name="current_year_land_fruit_grain" id="current_year_land_fruit_grain" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->cropSeasonalLand ? $surveyTofsilForm9Data->cropSeasonalLand->reason_fruit_grain : ''}}" type="text" name="reason_fruit_grain" id="reason_fruit_grain" disabled /></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td align="left">ফলবিহীন শস্য</td>
                                                                    <td>41</td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->cropSeasonalLand ? $surveyTofsilForm9Data->cropSeasonalLand->last_year_land_fruitless_grain : ''}}" type="number" name="last_year_land_fruitless_grain" id="last_year_land_fruitless_grain" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->cropSeasonalLand ? $surveyTofsilForm9Data->cropSeasonalLand->current_year_land_fruitless_grain : ''}}" type="number" name="current_year_land_fruitless_grain" id="current_year_land_fruitless_grain" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->cropSeasonalLand ? $surveyTofsilForm9Data->cropSeasonalLand->reason_fruitless_grain : ''}}" type="text" name="reason_fruitless_grain" id="reason_fruitless_grain" disabled /></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">সেচ পদ্ধতি অনুযায়ী সেচের আওতায় জমির পরিমাণ</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                           
                                                <div class="row">
                                                    <div class="col-md-12" style="padding-left: 35px; padding-right:35px;">

                                                        <table class="table table-bordered"> 
                                                            <thead> 
                                                                <tr>
                                                                    <th style="text-align: left" rowspan="2">সেচ পদ্ধতি</th>
                                                                    <th rowspan="2">কোড</th>
                                                                    <th colspan="2">মোট সেচক্রিত জমির পরিমাণ</th>
                                                                    <th colspan="2">নীট সেচক্রিত জমির পরিমাণ</th>
                                                                    <th rowspan="2">গত বছরের তুলনায় হ্রাস/বৃদ্ধির কারণ</th>
                                                                </tr>

                                                                <tr>
                                                                    <th>গত বছর</th>
                                                                    <th>চলতি বছর</th>
                                                                    <th>গত বছর</th>
                                                                    <th>চলতি বছর</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody> 
                                                                <tr> 
                                                                    <td align="left">শক্তিচালিত পাম্প</td>
                                                                    <td>1</td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationProcessLand ? $surveyTofsilForm9Data->irrigationProcessLand->total_last_year_land_powered_pump : ''}}" type="number" name="total_last_year_land_powered_pump" id="total_last_year_land_powered_pump" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationProcessLand ? $surveyTofsilForm9Data->irrigationProcessLand->total_current_year_land_powered_pump : ''}}" type="number" name="total_current_year_land_powered_pump" id="total_current_year_land_powered_pump" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationProcessLand ? $surveyTofsilForm9Data->irrigationProcessLand->net_last_year_land_powered_pump : ''}}" type="number" name="net_last_year_land_powered_pump" id="net_last_year_land_powered_pump" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationProcessLand ? $surveyTofsilForm9Data->irrigationProcessLand->net_current_year_land_powered_pump : ''}}" type="number" name="net_current_year_land_powered_pump" id="net_current_year_land_powered_pump" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationProcessLand ? $surveyTofsilForm9Data->irrigationProcessLand->reason_powered_pump : ''}}" type="text" name="reason_powered_pump" id="reason_powered_pump" disabled /></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td align="left">গভীর নলকূপ</td>
                                                                    <td>2</td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationProcessLand ? $surveyTofsilForm9Data->irrigationProcessLand->total_last_year_land_deep_tubewell : ''}}" type="number" name="total_last_year_land_deep_tubewell" id="total_last_year_land_deep_tubewell" disabled/></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationProcessLand ? $surveyTofsilForm9Data->irrigationProcessLand->total_current_year_land_deep_tubewell : ''}}" type="number" name="total_current_year_land_deep_tubewell" id="total_current_year_land_deep_tubewell" disabled/></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationProcessLand ? $surveyTofsilForm9Data->irrigationProcessLand->net_last_year_land_deep_tubewell : ''}}" type="number" name="net_last_year_land_deep_tubewell" id="net_last_year_land_deep_tubewell" disabled/></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationProcessLand ? $surveyTofsilForm9Data->irrigationProcessLand->net_current_year_land_deep_tubewell : ''}}" type="number" name="net_current_year_land_deep_tubewell" id="net_current_year_land_deep_tubewell" disabled/></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationProcessLand ? $surveyTofsilForm9Data->irrigationProcessLand->reason_deep_tubewell : ''}}" type="text" name="reason_deep_tubewell" id="reason_deep_tubewell" disabled/></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td align="left">অগভীর নলকূপ</td>
                                                                    <td>3</td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationProcessLand ? $surveyTofsilForm9Data->irrigationProcessLand->total_last_year_land_shallow_tubewell : ''}}"  type="number" name="total_last_year_land_shallow_tubewell" id="total_last_year_land_shallow_tubewell" disabled/></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationProcessLand ? $surveyTofsilForm9Data->irrigationProcessLand->total_current_year_land_shallow_tubewell : ''}}"  type="number" name="total_current_year_land_shallow_tubewell" id="total_current_year_land_shallow_tubewell" disabled/></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationProcessLand ? $surveyTofsilForm9Data->irrigationProcessLand->net_last_year_land_shallow_tubewell : ''}}"  type="number" name="net_last_year_land_shallow_tubewell" id="net_last_year_land_shallow_tubewell" disabled/></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationProcessLand ? $surveyTofsilForm9Data->irrigationProcessLand->net_current_year_land_shallow_tubewell : ''}}"  type="number" name="net_current_year_land_shallow_tubewell" id="net_current_year_land_shallow_tubewell" disabled/></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationProcessLand ? $surveyTofsilForm9Data->irrigationProcessLand->reason_shallow_tubewell : ''}}"  type="text" name="reason_shallow_tubewell" id="reason_shallow_tubewell" disabled/></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td align="left">হস্তচালিত নলকূপ</td>
                                                                    <td>4</td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationProcessLand ? $surveyTofsilForm9Data->irrigationProcessLand->total_last_year_land_manual_tubewell : ''}}" type="number" name="total_last_year_land_manual_tubewell" id="total_last_year_land_manual_tubewell" disabled/></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationProcessLand ? $surveyTofsilForm9Data->irrigationProcessLand->total_current_year_land_manual_tubewell : ''}}" type="number" name="total_current_year_land_manual_tubewell" id="total_current_year_land_manual_tubewell" disabled/></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationProcessLand ? $surveyTofsilForm9Data->irrigationProcessLand->net_last_year_land_manual_tubewell : ''}}" type="number" name="net_last_year_land_manual_tubewell" id="net_last_year_land_manual_tubewell" disabled/></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationProcessLand ? $surveyTofsilForm9Data->irrigationProcessLand->net_current_year_land_manual_tubewell : ''}}" type="number" name="net_current_year_land_manual_tubewell" id="net_current_year_land_manual_tubewell" disabled/></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationProcessLand ? $surveyTofsilForm9Data->irrigationProcessLand->reason_manual_tubewell : ''}}" type="text" name="reason_manual_tubewell" id="reason_manual_tubewell" disabled/></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td align="left">সনাতন পদ্ধতি (দোন/বালতি/খাল ইত্যাদি)</td>
                                                                    <td>5</td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationProcessLand ? $surveyTofsilForm9Data->irrigationProcessLand->total_last_year_land_traditional_method : ''}}" type="number" name="total_last_year_land_traditional_method" id="total_last_year_land_traditional_method" disabled/></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationProcessLand ? $surveyTofsilForm9Data->irrigationProcessLand->total_current_year_land_traditional_method : ''}}" type="number" name="total_current_year_land_traditional_method" id="total_current_year_land_traditional_method" disabled/></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationProcessLand ? $surveyTofsilForm9Data->irrigationProcessLand->net_last_year_land_traditional_method : ''}}" type="number" name="net_last_year_land_traditional_method" id="net_last_year_land_traditional_method" disabled/></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationProcessLand ? $surveyTofsilForm9Data->irrigationProcessLand->net_current_year_land_traditional_method : ''}}" type="number" name="net_current_year_land_traditional_method" id="net_current_year_land_traditional_method" disabled/></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationProcessLand ? $surveyTofsilForm9Data->irrigationProcessLand->reason_traditional_method : ''}}" type="text" name="reason_traditional_method" id="reason_traditional_method" disabled/></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>   
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">ফসলভেদে সেচ জমির পরিমাণ</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body"> disabled
                                           
                                                <div class="row">
                                                    <div class="col-md-12" style="padding-left: 35px; padding-right:35px;">

                                                        <table class="table table-bordered"> 
                                                            <thead> 
                                                                <tr>
                                                                    <th style="text-align: left" rowspan="2">ফসলের নাম</th>
                                                                    <th rowspan="2">কোড</th>
                                                                    <th colspan="2">সেচক্রিত জমির পরিমাণ (একরে)</th>
                                                                    <th rowspan="2">গত বছরের তুলনায় হ্রাস/বৃদ্ধির কারণ</th>
                                                                </tr>

                                                                <tr>
                                                                    <th>গত বছর</th>
                                                                    <th>চলতি বছর</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody> 
                                                                <tr> 
                                                                    <td align="left">আমন</td>
                                                                    <td>11</td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationLand ? $surveyTofsilForm9Data->irrigationLand->last_year_land_amon : ''}}" type="number" name="last_year_land_amon" id="last_year_land_amon" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationLand ? $surveyTofsilForm9Data->irrigationLand->current_year_land_amon : ''}}" type="number" name="current_year_land_amon" id="current_year_land_amon" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationLand ? $surveyTofsilForm9Data->irrigationLand->reason_amon : ''}}" type="text" name="reason_amon" id="reason_amon" disabled /></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td align="left">বোরো</td>
                                                                    <td>12</td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationLand ? $surveyTofsilForm9Data->irrigationLand->last_year_land_borough : ''}}" type="number" name="last_year_land_borough" id="last_year_land_borough" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationLand ? $surveyTofsilForm9Data->irrigationLand->current_year_land_borough : ''}}" type="number" name="current_year_land_borough" id="current_year_land_borough" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationLand ? $surveyTofsilForm9Data->irrigationLand->reason_borough : ''}}" type="text" name="reason_borough" id="reason_borough" disabled /></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td align="left">গম</td>
                                                                    <td>13</td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationLand ? $surveyTofsilForm9Data->irrigationLand->last_year_land_wheat : ''}}" type="number" name="last_year_land_wheat" id="last_year_land_wheat" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationLand ? $surveyTofsilForm9Data->irrigationLand->current_year_land_wheat : ''}}" type="number" name="current_year_land_wheat" id="current_year_land_wheat" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationLand ? $surveyTofsilForm9Data->irrigationLand->reason_wheat : ''}}" type="text" name="reason_wheat" id="reason_wheat" disabled /></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td align="left">আখ</td>
                                                                    <td>14</td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationLand ? $surveyTofsilForm9Data->irrigationLand->last_year_land_sugarcane : ''}}" type="number" name="last_year_land_sugarcane" id="last_year_land_sugarcane" disabled /></td>
                                                                    <td><input class="form-control"  value="{{$surveyTofsilForm9Data->irrigationLand ? $surveyTofsilForm9Data->irrigationLand->current_year_land_sugarcane : ''}}" type="number" name="current_year_land_sugarcane" id="current_year_land_sugarcane" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationLand ? $surveyTofsilForm9Data->irrigationLand->reason_sugarcane : ''}}" type="text" name="reason_sugarcane" id="reason_sugarcane" disabled /></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td align="left">তুলা</td>
                                                                    <td>15</td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationLand ? $surveyTofsilForm9Data->irrigationLand->last_year_land_cotton : ''}}" type="number" name="last_year_land_cotton" id="last_year_land_cotton" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationLand ? $surveyTofsilForm9Data->irrigationLand->current_year_land_cotton : ''}}" type="number" name="current_year_land_cotton" id="current_year_land_cotton" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationLand ? $surveyTofsilForm9Data->irrigationLand->reason_cotton : ''}}" type="text" name="reason_cotton" id="reason_cotton" disabled /></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td align="left">আলু</td>
                                                                    <td>16</td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationLand ? $surveyTofsilForm9Data->irrigationLand->last_year_land_potatoes : ''}}" type="number" name="last_year_land_potatoes" id="last_year_land_potatoes" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationLand ? $surveyTofsilForm9Data->irrigationLand->current_year_land_potatoes : ''}}" type="number" name="current_year_land_potatoes" id="current_year_land_potatoes" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationLand ? $surveyTofsilForm9Data->irrigationLand->reason_potatoes : ''}}" type="text" name="reason_potatoes" id="reason_potatoes" disabled /></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td align="left">সবজি</td>
                                                                    <td>17</td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationLand ? $surveyTofsilForm9Data->irrigationLand->last_year_land_vegetables : ''}}" type="number" name="last_year_land_vegetables" id="last_year_land_vegetables" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationLand ? $surveyTofsilForm9Data->irrigationLand->current_year_land_vegetables : ''}}" type="number" name="current_year_land_vegetables" id="current_year_land_vegetables" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationLand ? $surveyTofsilForm9Data->irrigationLand->reason_vegetables : ''}}" type="text" name="reason_vegetables" id="reason_vegetables" disabled /></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td align="left">অন্যান্য</td>
                                                                    <td>18</td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationLand ? $surveyTofsilForm9Data->irrigationLand->last_year_land_others : ''}}" type="number" name="last_year_land_others" id="last_year_land_others" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationLand ? $surveyTofsilForm9Data->irrigationLand->current_year_land_others : ''}}" type="number" name="current_year_land_others" id="current_year_land_others" disabled /></td>
                                                                    <td><input class="form-control" value="{{$surveyTofsilForm9Data->irrigationLand ? $surveyTofsilForm9Data->irrigationLand->reason_others : ''}}" type="text" name="reason_others" id="reason_others" disabled /></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('stackScript')
    <script> 
        $(document).ready(function() {
            let volume_acre = $('#upazila_volume_in_acre').val();
            let volume_kilo = 0;

            if (volume_acre != '') {
                volume_kilo += volume_acre * 0.00405;
            }

            $('#upazila_volume_in_squre_kilometer').val(volume_kilo);
        });
    </script>
@endpush
