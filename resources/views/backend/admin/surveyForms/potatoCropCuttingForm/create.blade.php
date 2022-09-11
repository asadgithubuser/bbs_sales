
@extends('backend.layout.master')

@push('css')
    <style> 
        .table th, .table td{
            border-top: none !important;
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">আলু ফসল কর্তন ও উৎপাদন জরিপ তফসিল (তফসিল-৫)</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">ড্যাশবোর্ড</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a class="text-muted">আলু ফসল কর্তন ও উৎপাদন জরিপ তফসিল (তফসিল-৫)</a>
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
                                    <h3 class="card-title">আলু ফসল কর্তন ও উৎপাদন জরিপ তফসিল (তফসিল-৫)</h3>
                                    
                                    <div class="card-toolbar">

                                    </div>
                                </div>
                                <!--begin::Form-->
                                <form action="{{ route('admin.potatoCropCutting.store') }}" method="post">
                                    @csrf

                                    {{-- hidden fields --}}
                                    @if (!empty($processList))
                                        <input type="hidden" name="survey_process_list_id" value="{{ $processListId }}" />
                                        <input type="hidden" name="survey_notification_id" value="{{ $processList->survey_notification_id }}" />
                                        <input type="hidden" name="division_id" value="{{ $processList->division_id }}" />
                                        <input type="hidden" name="district_id" value="{{ $processList->district_id }}" />
                                        <input type="hidden" name="upazila_id" value="{{ $processList->upazila_id }}" />
                                        <input type="hidden" name="union_id" value="{{ $processList->union_id }}" />
                                        <input type="hidden" name="mouza_id" value="{{ $processList->mouja_id }}" />
                                    @endif

                                    @if (isset($surveyNotification))
                                        <input type="hidden" id="crop_name" value="{{ $surveyNotification->crop ? $surveyNotification->crop->name_en : '' }}">
                                    @endif
                                    
                                    <div class="card-body">
                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">সাধারণ তথ্য</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                            <div class="row">
                                                        <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">

                                                            <div class="form-group row">
                                                                <label for="farmer_id"style="font-size: 1.5em; font-weight: bold;"><b>বর্তমান ভূমি খন্ড ব্যাবহারকারী/চাষির নাম: </b><span class="text-danger">*</span></label>
                                                                <select class="select2 form-control form-control-lg" id="farmer_id" name="farmer_id" required>
                                                                    <option value="">--ব্যাবহারকারী/চাষির নাম নির্বাচন করুন--</option>

                                                                    @if (isset($surveyList->surveyTofsilForm1s))
                                                                        @foreach ($surveyList->clusterfarmers($processList->bunch_stains_id) as $item)
                                                                            <option value="{{ $item->id }}">{{ $item->farmers_name }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                                
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="land_segment_signal"style="font-size: 1.5em; font-weight: bold;"><b> ভূমি খন্ডের সংক্ষেত নং: </b><span class="text-danger">*</span></label>
                                                                
                                                                <input class="form-control" type="text" placeholder="" name="land_segment_signal" id="land_segment_signal" required/>
                                                            
                                                            </div>

                                                        </div>

                                                        <div class="col-md-6" style="padding-left: 35px; padding-right:35px;"> 
                                                
                                                            <div class="form-group row">
                                                                <label for="in_cluster" style="font-size: 1.2em; font-weight: bold;"><b>মৌজার অবস্থান: </b><span class="text-danger">*</span></label>
                                                        
                                                                        <select class="select2 form-control form-control-lg" id="in_cluster" name="in_cluster" required>
                                                                            <option value="">--নির্বাচন করুন--</option>
                                                                            <option value="1">দাগগুচ্ছের ভিতরে</option>
                                                                            <option value="2">দাগগুচ্ছের বাইরে</option>
                                                                        </select>
                                                                
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="crop_cutting_date" style="font-size: 1.2em; font-weight: bold;"><b>তথ্য সংগ্রহের তারিখ: </b><span class="text-danger">*</span></label>
                                                            
                                                                    <input class="form-control" type="date" placeholder="Enter Crop Cutting Date" name="crop_cutting_date" id="crop_cutting_date" required/>
                                                                
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">আলু ফসল কর্তন সংক্রান্ত তথ্যাদি </h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                        
                                                <div class="row">
                                                    <div class="col-md-6 average" style="padding-left: 35px; padding-right:35px;">
                                                        {{-- <div class="form-group row" id="cluster_id_id" style="display: none;">
                                                            <label for="cluster_id"style="font-size: 1.5em; font-weight: bold;"><b>Cluster: </b><span class="text-danger">*</span></label>
                                                            <div class="col-9">
                                                                <div class="form-group">
                                                                    <select class="select2 form-control form-control-lg" id="cluster_id" name="cluster_id">
                                                                        <option value="">--Select Cluster--</option>
                                                                        
                                                                        @if (isset($clusters))
                                                                            @foreach ($clusters as $cluster)
                                                                                <option value="{{ $cluster->id }}">{{ $cluster->name_en }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div> --}}


                                                        <div class="form-group row">
                                                            <label for="potato_varieties"style="font-size: 1.5em; font-weight: bold;"><b>আলুর জাত: </b><span class="text-danger">*</span></label>
                                                        
                                                                <select class="select2 form-control" id="potato_varieties" name="potato_varieties" required>
                                                                    <option value="">--আলুর জাত নির্বাচন করুন--</option>
                                                                    <option value="1">দেশি</option>
                                                                    <option value="2">উচ্চ ফলনশীল</option>
                                                                    <option value="3">ইন্ডিয়ান</option>
                                                                </select>
                                                        
                                                        </div>


                                                        <div class="form-group row">
                                                            <label for="number_of_row"style="font-size: 1.5em; font-weight: bold;"><b>ভূমি খন্ডের মোট সারির সংখ্যা: </b><span class="text-danger">*</span></label>
                                                        
                                                                <input class="form-control" type="number" placeholder="" name="number_of_row" id="number_of_row" required/>
                                                        
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="location_of_sample_row_1"style="font-size: 1.5em; font-weight: bold;"><b>১ম নমুনা সারির অবস্থান (তম): </b><span class="text-danger">*</span></label>
                                                            
                                                                <input class="form-control" type="number" placeholder="তম" name="location_of_sample_row_1" id="location_of_sample_row_1" required/>
                                                        
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="row_length_feet_1"style="font-size: 1.5em; font-weight: bold;"><b>১ম নমুনা সারির দৈর্ঘ (ফুট): </b><span class="text-danger">*</span></label>
                                                            
                                                                <input class="form-control" type="number" placeholder="ফুট" name="row_length_feet_1" id="row_length_feet_1" required/>
                                                        
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="row_average_width_feet_1"style="font-size: 1.5em; font-weight: bold;"><b>১ম নমুনা সারির গড় প্রস্থ (ফুট): </b><span class="text-danger">*</span></label>
                                                            
                                                                <input class="form-control" type="number" placeholder="ফুট" name="row_average_width_feet_1" id="row_average_width_feet_1" required/>
                                                        
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6 average" style="padding-left: 35px; padding-right:35px;"> 

                                                        <div class="form-group row">
                                                            <label for="land_amount_of_plot"style="font-size: 1.5em; font-weight: bold;"><b>ভূমি খন্ডের জমির পরিমাণ (একর): </b><span class="text-danger">*</span></label>
                                                        
                                                                <input class="form-control" type="number" placeholder="একর" name="land_amount_of_plot" id="land_amount_of_plot" required/>
                                                            
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="location_of_sample_row_2"style="font-size: 1.5em; font-weight: bold;"><b>২ম নমুনা সারির অবস্থান (তম): </b><span class="text-danger">*</span></label>
                                                        
                                                                <input class="form-control" type="number" placeholder="তম" name="location_of_sample_row_2" id="location_of_sample_row_2" required/>
                                                            
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="row_length_feet_2"style="font-size: 1.5em; font-weight: bold;"><b>২ম নমুনা সারির দৈর্ঘ (ফুট): </b><span class="text-danger">*</span></label>
                                                        
                                                                <input class="form-control" type="number" placeholder="ফুট" name="row_length_feet_2" id="row_length_feet_2" required/>
                                                            
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="row_average_width_feet_2"style="font-size: 1.5em; font-weight: bold;"><b>২ম নমুনা সারির গড় প্রস্থ (ফুট): </b><span class="text-danger">*</span></label>
                                                        
                                                                <input class="form-control" type="number" placeholder="ফুট" name="row_average_width_feet_2" id="row_average_width_feet_2" required/>
                                                            
                                                        </div>

                                                        {{-- <div class="form-group row">
                                                            <label for="crop_id"style="font-size: 1.5em; font-weight: bold;"><b>Crop Name: </b><span class="text-danger">*</span></label>
                                                            <div class="col-9">
                                                                <div class="form-group">
                                                                    @if (isset($surveyNotification))
                                                                        @if ($surveyNotification->crop_id != '')
                                                                            <input type="hidden" id="crop_id" name="crop_id" value="{{ $surveyNotification->crop_id }}">
                                                                            <input type="text" class="form-control form-control-lg" value="{{ $surveyNotification->crop ? ucfirst($surveyNotification->crop->name_en) : '' }}" readonly>
                                                                        @else
                                                                            <select class="select2 form-control form-control-lg" id="crop_id" name="crop_id" required>
                                                                                <option value="">--Select Crop--</option>

                                                                                @foreach ($crops as $crop)
                                                                                    <option value="{{ $crop->id }}">{{ ucfirst($crop->name_en) }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        @endif

                                                                    @else
                                                                        <select class="select2 form-control form-control-lg" id="crop_id" name="crop_id" required>
                                                                            <option value="">--Select Crop--</option>

                                                                            @foreach ($crops as $crop)
                                                                                <option value="{{ $crop->id }}">{{ ucfirst($crop->name_en) }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                    </div>
                                                </div>
                                            </div>
                                        </div>





                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">দৈবচয়িত ভূমি খন্ডের জমির পরিমান ও আলুর সারির সংখ্যা</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                        

                                                    


                                                        {{-- <div class="form-group row" id="cluster_id_id" style="display: none;">
                                                            <label for="cluster_id"style="font-size: 1.2em; font-weight: bold;"><b>Cluster: </b><span class="text-danger">*</span></label>
                                                            <div class="col-9">
                                                                <div class="form-group">
                                                                    <select class="select2 form-control form-control-lg" id="cluster_id" name="cluster_id">
                                                                        <option value="">--Select Cluster--</option>
                                                                        
                                                                        @if (isset($clusters))
                                                                            @foreach ($clusters as $cluster)
                                                                                <option value="{{ $cluster->id }}">{{ $cluster->name_en }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        <div class="form-group row">
                                                            <label for="random_land_amount_of_plot"style="font-size: 1.2em; font-weight: bold;"><b>জমির পরিমাণ (একরে): </b><span class="text-danger">*</span></label>
                                                            
                                                                <input class="form-control" type="number" placeholder="একরে" name="random_land_amount_of_plot" id="random_land_amount_of_plot" required/>
                                                            
                                                        </div>
                                                       
                                                        <div class="form-group row">
                                                            <label for="random_location_east_to_west"style="font-size: 1.2em; font-weight: bold;"><b>কর্তনকৃত জমির অবস্থান পূর্ব থেকে পশ্চিম (ফুট): </b><span class="text-danger">*</span></label>
                                                  
                                                                <input class="form-control" type="number" placeholder="ফুট" name="random_location_east_to_west" id="random_location_east_to_west" required/>
                                                            
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="random_number_row_cut"style="font-size: 1.2em; font-weight: bold;"><b>কর্তনকৃত সারির মোট সংখ্যা: </b><span class="text-danger">*</span></label>

                                                                <input class="form-control" type="number" placeholder="" name="random_number_row_cut" id="random_number_row_cut" required/>
                                                           
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="random_row_length_feet"style="font-size: 1.2em; font-weight: bold;"><b>কর্তনকৃত সারির মোট দৈর্ঘ্য (ফুট): </b><span class="text-danger">*</span></label>
                                                            
                                                                <input class="form-control" type="number" placeholder="ফুট" name="random_row_length_feet" id="random_row_length_feet" required/>
                                                            
                                                        </div>

                                                 
                                                    </div>

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;"> 
                                             

       

                                                        {{-- <div class="form-group row">
                                                            <label for="crop_id"style="font-size: 1.2em; font-weight: bold;"><b>Crop Name: </b><span class="text-danger">*</span></label>
                                                            <div class="col-9">
                                                                <div class="form-group">
                                                                    @if (isset($surveyNotification))
                                                                        @if ($surveyNotification->crop_id != '')
                                                                            <input type="hidden" id="crop_id" name="crop_id" value="{{ $surveyNotification->crop_id }}">
                                                                            <input type="text" class="form-control form-control-lg" value="{{ $surveyNotification->crop ? ucfirst($surveyNotification->crop->name_en) : '' }}" readonly>
                                                                        @else
                                                                            <select class="select2 form-control form-control-lg" id="crop_id" name="crop_id" required>
                                                                                <option value="">--Select Crop--</option>

                                                                                @foreach ($crops as $crop)
                                                                                    <option value="{{ $crop->id }}">{{ ucfirst($crop->name_en) }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        @endif

                                                                    @else
                                                                        <select class="select2 form-control form-control-lg" id="crop_id" name="crop_id" required>
                                                                            <option value="">--Select Crop--</option>

                                                                            @foreach ($crops as $crop)
                                                                                <option value="{{ $crop->id }}">{{ ucfirst($crop->name_en) }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div> --}}


                                                        <div class="form-group row">
                                                            <label for="random_number_of_row"style="font-size: 1.2em; font-weight: bold;"><b>মোট সারির সংখ্যা: </b><span class="text-danger">*</span></label>
                                                      
                                                                <input class="form-control" type="number" placeholder="" name="random_number_of_row" id="random_number_of_row" required/>
                                                           
                                                        </div>


                                                        <div class="form-group row">
                                                            <label for="random_location_north_to_south"style="font-size: 1.2em; font-weight: bold;"><b>কর্তনকৃত জমির অবস্থান উত্তর থেকে দক্ষিণ (ফুট): </b><span class="text-danger">*</span></label>
                                                        
                                                                <input class="form-control" type="number" placeholder="ফুট" name="random_location_north_to_south" id="random_location_north_to_south" required/>
                                                          
                                                        </div>


                                                        <div class="form-group row">
                                                            <label for="random_row_average_width_feet"style="font-size: 1.2em; font-weight: bold;"><b>কর্তনকৃত সারির গড় প্রস্থ (ফুট): </b><span class="text-danger">*</span></label>
                                       
                                                                <input class="form-control" type="number" placeholder="ফুট" name="random_row_average_width_feet" id="random_row_average_width_feet" required/>
                                                      
                                                        </div>


                                             

                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">আলুর ফলন/উৎপাদন হার ও খরচ</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                               

                                                    


                                                        {{-- <div class="form-group row" id="cluster_id_id" style="display: none;">
                                                            <label for="cluster_id"style="font-size: 1.2em; font-weight: bold;"><b>Cluster: </b><span class="text-danger">*</span></label>
                                                            <div class="col-9">
                                                                <div class="form-group">
                                                                    <select class="select2 form-control form-control-lg" id="cluster_id" name="cluster_id">
                                                                        <option value="">--Select Cluster--</option>
                                                                        
                                                                        @if (isset($clusters))
                                                                            @foreach ($clusters as $cluster)
                                                                                <option value="{{ $cluster->id }}">{{ $cluster->name_en }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        <div class="form-group row average">
                                                            <label for="amount_of_cut_potato_kg"style="font-size: 1.5em; font-weight: bold;"><b>আলুর ফসল কর্তন থেকে প্রাপ্ত আলুর পরিমাণ (কেজি): </b><span class="text-danger">*</span></label>
                                                       
                                                            <input class="form-control" type="number" placeholder="কেজি" name="amount_of_cut_potato_kg" id="amount_of_cut_potato_kg" required/>
                                                           
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="production_per_acre"style="font-size: 1.2em; font-weight: bold;"><b>একর প্রতি আলু ফলন (মণ): </b><span class="text-danger">*</span></label>
                                                        
                                                            <input class="form-control" type="text" placeholder="মণ" name="production_per_acre" id="production_per_acre" readonly/>
                                                          
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="production_cost_per_acre"style="font-size: 1.2em; font-weight: bold;"><b>একর প্রতি আলুর উৎপাদন খরচ: </b><span class="text-danger">*</span></label>
        
                                                            <input class="form-control" type="text" placeholder="" name="production_cost_per_acre" id="production_cost_per_acre" required/>
                                                            
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="amount_of_cut_potato_kg"style="font-size: 1.2em; font-weight: bold;"><b>আলুর ফসল কর্তন থেকে প্রাপ্ত আলুর পরিমাণ (কেজি): </b><span class="text-danger">*</span></label>
                                                       
                                                                <input class="form-control" type="number" placeholder="কেজি" name="amount_of_cut_potato_kg" id="amount_of_cut_potato_kg" required/>
                                                           
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;"> 
                                           


                                                        <div class="form-group row">
                                                            <label for="size_of_cut_row_squre_feet" style="font-size: 1.2em; font-weight: bold;"><b>কর্তনকৃত সারির আয়তন (বর্গ ফুট): </b><span class="text-danger">*</span></label>
                                                           
                                                                <input class="form-control" type="number" placeholder="বর্গ ফুট" name="size_of_cut_row_squre_feet" id="size_of_cut_row_squre_feet" readonly/>
                                                           
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="size_of_cut_row_acre"style="font-size: 1.2em; font-weight: bold;"><b>কর্তনকৃত সারির আয়তন (একরে): </b><span class="text-danger">*</span></label>
                              
                                                                <input class="form-control" type="number" placeholder="একরে" name="size_of_cut_row_acre" id="size_of_cut_row_acre" readonly/>
                                                           
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="col-md-12"> 
                                                <div class="card"> 
                                                    <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                                        <h3 style="color:#ffffff;">নির্বাচিত মাঠের আশেপাশে উক্ত জাতের ফসল চাষ করেছে এমন চাষীদের সাক্ষাৎকার</h3>
                                                    </div>
                                                    {{-- <div class="card-header">
                                                        <h3 class="card-title">নির্বাচিত মাঠের আশেপাশে উক্ত জাতের ফসল চাষ করেছে এমন চাষীদের সাক্ষাৎকার</h3>
                                                    </div> --}}
            
                                                    <div class="card-body" id="previousAverage">
                                                        <table class="table table-responsive" id="tbl_posts">
                                                            <thead >
                                                                <th>
                                                                    <label for="farmer_int_id_1" style="font-size: 1.1em; font-weight: bold;"><b>চাষির নাম:</b> <span class="text-danger">*</span></label>
                                                                </th>
                                                                <th>
                                                                    <label for="fathers_name_1" style="font-size: 1.1em; font-weight: bold;"><b>পিতার নাম: </b><span class="text-danger">*</span></label>
                                                                </th>
                                                                <th>
                                                                    <label for="last_year_land_amount_1" style="font-size: 1.1em; font-weight: bold;"><b>পূর্ববর্তী বছরে মাঠের আয়তন (একর): </b><span class="text-danger">*</span></label>
                                                                </th>
                                                                <th>
                                                                    <label for="current_year_land_amount_1" style="font-size: 1.1em; font-weight: bold;"><b>চলতি বছরে মাঠের আয়তন (একর): </b><span class="text-danger">*</span></label>
                                                                </th>
                                                                <th>
                                                                    <label for="last_year_land_producttion_1" style="font-size: 1.1em; font-weight: bold;"><b>পূর্ববর্তী বছরে মাঠের উৎপাদন (মণ): </b><span class="text-danger">*</span></label>
                                                                </th>
                                                                <th>
                                                                    <label for="current_year_land_producttion_1" style="font-size: 1.1em; font-weight: bold;"><b>চলতি বছরে মাঠের উৎপাদন (মণ): </b><span class="text-danger">*</span></label>
                                                                </th>
                                                                <th>
                                                                    <label for="comments_1" style="font-size: 1.1em; font-weight: bold;"><b>একর প্রতি গড় ফলন (কেজি): </b><span class="text-danger">*</span></label>
                                                                </th>
                                                            </thead>
                                                            <tbody id="tbl_posts_body">
                                                                <tr id="rec-1">
                                                                    <td>
                                                                        <div class="text-left">
                                                                            
    
                                                                            <select name="farmer_int_id[]" id="farmer_int_id_1"
                                                                                class="form-control farmer_int_id_1 select_1" required>
                                                                                <option value="">--চাষির নাম নির্বাচন করুন--</option>
    
                                                                                @if (isset($surveyList->surveyTofsilForm1s))
                                                                                    @foreach ($surveyList->clusterfarmers($processList->bunch_stains_id) as $item)
                                                                                        <option value="{{ $item->id }}">{{ $item->farmers_name }}</option>
                                                                                    @endforeach
                                                                                @endif
                                                                                
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="text-left">
                                                                            <input class="form-control" type="text" placeholder="" name="farmers_father_name[]" id="fathers_name_1" required/>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="text-left">
                                                                            <input class="form-control" type="number" placeholder="" name="last_year_land_amount[]" id="last_year_land_amount_1" required/>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="text-left">
                                                                            <input class="form-control" type="number" placeholder="" name="current_year_land_amount[]" id="current_year_land_amount_1" onchange="previousAverage(1)" required/>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="text-left">
                                                                            <input class="form-control" type="number" placeholder="" name="last_year_potato_producttion[]" id="last_year_land_producttion_1" required/>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="text-left">
                                                                            <input class="form-control" type="number" placeholder="" name="current_year_potato_producttion[]" id="current_year_land_producttion_1" onchange="previousAverage(1)" required/>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="text-left">
                                                                            <input class="form-control" type="text" placeholder="" name="average_yield_per_acre[]" id="comments_1" value="" readonly/>
                                                                        </div>
                                                                    </td>
                                                                    <td> 
                                                                        <div class="input-group-btn text-left ml-2"> 
                                                                            <button class="btn btn-sm btn-success add-record" type="button" style="padding: 0.75rem;width: 100px;">যুক্ত করুন</button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                

                                    <div class="card-footer">
                                        <div class="row" style="padding-left: 35px; padding-right:35px;">
                                            <div class="col-12 text-right">
                                                @if ($number == true)
                                                    <button type="submit" class="btn btn-success mr-2">সংরক্ষন</button>
                                                @else
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div style="display:none;">
                                    <table id="sample_table" style="width: 100%;" class="table table-responsive">
                                        <tr id="">
                                            <td>
                                                <div class="text-left">
                                                    {{-- <label for="farmer_int_id" class=""><b>Farmer Name:</b> <span class="text-danger">*</span></label> --}}
                                                    
                                                    <select name="farmer_int_id[]" id="farmer_int_id"
                                                        class="form-control farmer_int_id select_" required>
                                                        <option value="">--চাষির নাম নির্বাচন করুন--</option>

                                                        @if (isset($surveyList->surveyTofsilForm1s))
                                                            @foreach ($surveyList->clusterfarmers($processList->bunch_stains_id) as $item)
                                                                <option value="{{ $item->id }}">{{ $item->farmers_name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-left">
                                                    {{-- <label for="fathers_name" class=""><b>Father's Name: </b><span class="text-danger">*</span></label> --}}
                                                    
                                                    <input class="form-control" type="text" placeholder="" name="farmers_father_name[]" id="fathers_name" required/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-left">
                                                    {{-- <label for="last_year_land_amount" class=""><b>Last Year Land Amount: </b><span class="text-danger">*</span></label> --}}

                                                    <input class="form-control" type="text" placeholder="" name="last_year_land_amount[]" id="last_year_land_amount" required/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-left">
                                                    {{-- <label for="current_year_land_amount" class=""><b>Current Year Land Amount: </b><span class="text-danger">*</span></label> --}}
                                                    
                                                    <input class="form-control" type="text" placeholder="" name="current_year_land_amount[]" id="current_year_land_amount" required/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-left">
                                                    {{-- <label for="last_year_land_producttion" class=""><b>Last Year Land Production: </b><span class="text-danger">*</span></label> --}}
                                                    
                                                    <input class="form-control" type="text" placeholder="" name="last_year_potato_producttion[]" id="last_year_land_producttion" required/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-left">
                                                    {{-- <label for="current_year_land_producttion" class=""><b>Current Year Land Production: </b><span class="text-danger">*</span></label> --}}
                                                    
                                                    <input class="form-control" type="text" placeholder="" name="current_year_potato_producttion[]" id="current_year_land_producttion" required/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-left">
                                                    {{-- <label for="comments" class=""><b>Average Yield Per Acre: </b><span class="text-danger">*</span></label> --}}
                                                                        
                                                    <input class="form-control" type="text" placeholder="" name="average_yield_per_acre[]" id="comments" readonly/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group-btn text-left ml-2"> 
                                                    <button class="btn btn-sm btn-danger delete-record" type="button" data-id="0" style="padding: 0.75rem;width: 100px;">মুছে ফেলুন</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
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
    <script type="text/javascript">
        $('#land_type').on('change', function() {
            let land_type = $(this).val();

            if (land_type == 1) {
                $('#land_no1').show();
                $('#land_no2').hide();

            } else {
                $('#land_no1').hide();
                $('#land_no2').hide();
            }

        });
        $('#kt_select2_1_modal').select2({
            placeholder: "Select a state"
        });
    </script>

    <script type="text/javascript">
        $('#interview_select').on('change', function() {
            let interview_type = $(this).val();

            if (interview_type == 1) {
                $('.aus_Interview_new').show();
                $('.potato_Interview_new').hide();

            } else if (interview_type == 2) {
                $('.aus_Interview_new').hide();
                $('.potato_Interview_new').show();
            } else {
                $('.aus_Interview_new').hide();
                $('.potato_Interview_new').hide();
            }

        });
    </script>

    <script> 
        $('.acreCalculate').on('keyup', function() {
            let current_year_land_producttion = $('#current_year_land_producttion').val();
            let current_year_land_amount = $('#current_year_land_amount').val();

            let acreCalculate = (Number(current_year_land_producttion) / Number(current_year_land_amount)) * 37.3242;

            if (current_year_land_producttion != '' && current_year_land_amount != '') {
                $('#acre_reflection_rate').val(acreCalculate);
            }
        });

        $('.lastacreCalculate').on('keyup', function() {
            let last_year_land_producttion = $('#last_year_land_producttion').val();
            let last_year_land_amount = $('#last_year_land_amount').val();

            let acreCalculate = (Number(last_year_land_producttion) / Number(last_year_land_amount)) * 37.3242;

            if (last_year_land_producttion != '' && last_year_land_amount != '') {
                $('#last_acre_reflection_rate').val(acreCalculate);
            }
        });
    </script>

    <script> 
        $('#in_cluster').on('change', function() {
            if ($(this).val() == 1) {
                $('#cluster_id_id').show();

                $('#cluster_id').attr('required', 'required');
            } else {
                $('#cluster_id_id').hide();

                $('#cluster_id').removeAttr('required');
            }
        });
    </script>

    <script> 
        // Select2
        $('.select_1').select2();

        $(document).delegate('button.add-record', 'click', function(e) {
        e.preventDefault();   

            var content = $('#sample_table tr'),
            size = $('#tbl_posts >tbody >tr').length + 1,
            element = null,    
            element = content.clone();
            element.attr('id', 'rec-'+size);
            element.find('.delete-record').attr('data-id', size);
            element.find('.select_').addClass('select_'+size);
            element.find('.farmer_int_id').attr('id', 'farmer_int_id'+size);
            element.find('.fathers_name').attr('id', 'fathers_name'+size);
            element.find('.last_year_land_amount').attr('id', 'last_year_land_amount'+size);
            element.find('.last_year_land_producttion').attr('id', 'last_year_land_producttion'+size);
            element.find('.current_year_land_amount').attr('id', 'current_year_land_amount'+size);
            element.find('.current_year_land_producttion').attr('id', 'current_year_land_producttion'+size);
            element.find('.comments').attr('id', 'comments'+size);
            element.appendTo('#tbl_posts_body');



            // Select2
            $('.select_'+size).select2();

            $(document).delegate('button.delete-record', 'click', function(e) {
            e.preventDefault();    

                var id = $(this).attr('data-id');
                var targetDiv = $(this).attr('targetDiv');
                $('#rec-' + id).remove();

                return true;
            });
        });
    </script>

    <script>
        $('.average').on('keyup', function() {

            let row_length_feet_1 = $('#row_length_feet_1').val();
            let intRowOne = parseInt(row_length_feet_1);

            let row_length_feet_2 = $('#row_length_feet_2').val();
            let intRowTwo = parseInt(row_length_feet_2);

            let row_average_width_feet_1 = $('#row_average_width_feet_1').val();
            let intRowOneWidth = parseInt(row_average_width_feet_1);

            let row_average_width_feet_2 = $('#row_average_width_feet_2').val();
            let intRowTwoWidth = parseInt(row_average_width_feet_2);

            let totalLength = intRowOne + intRowTwo;
            let totalWidth = intRowOneWidth + intRowTwoWidth;

            let size_of_cut_row_squre_feet = totalLength * totalWidth;
            let intSizeOfCutRowSqureFeet = parseInt(size_of_cut_row_squre_feet);

            // sq feet to acre
            let acre = size_of_cut_row_squre_feet / 43560;

            $('#size_of_cut_row_squre_feet').val(size_of_cut_row_squre_feet);
            $('#size_of_cut_row_acre').val(acre);



            let amount_of_cut_potato_kg = $('#amount_of_cut_potato_kg').val();
            let intRowAmountCutPotatoKG = parseInt(amount_of_cut_potato_kg);


            // get production
            let production1 = (1167.07 / intSizeOfCutRowSqureFeet);
            let production2 = production1 * intRowAmountCutPotatoKG;

            $('#production_per_acre').val(production2);
            
        });
    </script>

    <script>
        $('#rec-1').on('keyup', function() {
            
            let current_year_land_amount_1 = $('#current_year_land_amount_1').val();
            let intCurrentYearLandAmount = parseInt(current_year_land_amount_1);

            let current_year_land_producttion_1 = $('#current_year_land_producttion_1').val();
            let intCurrentYearProductionMon = parseInt(current_year_land_producttion_1);

            let productionKG = intCurrentYearProductionMon * 37.32;

            let average = productionKG / intCurrentYearLandAmount;

            $('#comments_1').val(average);
        });


        
    </script>

{{-- Dynamic data --}}
    <script>
        $('#rec-2').on('keyup', function() {
            
            // let current_year_land_amount_1 = $('#current_year_land_amount_1').val();
            // let intCurrentYearLandAmount = parseInt(current_year_land_amount_1);

            // let current_year_land_producttion_1 = $('#current_year_land_producttion_1').val();
            // let intCurrentYearProductionMon = parseInt(current_year_land_producttion_1);

            // let productionKG = intCurrentYearProductionMon * 37.32;

            // let average = productionKG / intCurrentYearLandAmount;

            // $('#comments_1').val(average);
            alert('row 2');
        });
        
        

    </script>


@endpush
