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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">কৃষক তালিকা ফরম (সংকলন ফরম -১)</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.index')}}" class="text-muted">ড্যাশবোর্ড</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a class="text-muted">কৃষক তালিকা ফরম (সংকলন ফরম -১)</a>
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
                            <div class="card-header">
                                <h3 class="card-title">কৃষক তালিকা ফরম (সংকলন ফরম -১)</h3>
                            </div>
                             

                            <form action="{{route('admin.farmersForm.store')}}" method="post">
                                @csrf

                                <div class="card-body">
                                    {{-- hidden fields --}}
                                    @if (!empty($processList))
                                        <input type="hidden" name="survey_process_list_id" value="{{$processListId}}" />
                                        <input type="hidden" name="survey_notification_id" value="{{$processList->survey_notification_id}}" />
                                        <input type="hidden" name="division_id" value="{{$processList->division_id}}" />
                                        <input type="hidden" name="district_id" value="{{$processList->district_id}}" />
                                        <input type="hidden" name="upazila_id" value="{{$processList->upazila_id}}" />
                                        <input type="hidden" name="union_id" value="{{ $processList->union_id }}" />
                                        <input type="hidden" name="mouza_id" value="{{ $processList->mouja_id }}" />
                                    @endif

                                    <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                        <h3 style="color:#ffffff;">সংকলন ফরম -১</h3>
                                    </div>
                                    <div class="card p-3" style="text-align: center;font-size: 1.2em; font-weight: bold;">
                                    
                                        @isset($processList->mouza)<p><b> মৌজা:   {{ $processList->mouza ? $processList->mouza->name_en : '' }} </b><br>@endisset
                                        <b>ইউনিয়ন: @isset($processList) {{ $processList->union ? $processList->union->name_en : '' }} @endisset </b></p>
                                    </div>
                                    <div class="card">
                                        <div class="card-body w3-light-gray">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12" style="padding-left: 30px; padding-right:30px;">
                                                    
                                                            <div class="form-group row" style="display:none;">
                                                                <label for="union_id" class="col-3 col-form-label"><b>ইউনিয়ন: </b></label>
                                                                <div class="col-9">
                                                                    <div class="form-group">
                                                                        <input id="union_id" class="form-control" type="hidden" @isset($processList) value="{{ $processList->union ? $processList->union->name_en : '' }}" @endisset readonly/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row" style="display:none;">
                                                                <label for="mouza_id" class="col-3 col-form-label"><b>মৌজা: </b></label>
                                                                <div class="col-9">
                                                                    <div class="form-group">
                                                                        <input id="mouza_id" class="form-control" type="hidden" @isset($processList) value="{{ $processList->mouza ? $processList->mouza->name_en : '' }}" @endisset readonly/>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="village_name" style="font-size: 1.5em; font-weight: bold;"><b>গ্রামের নাম: </b><span class="text-danger">*</span></label>
                                                        
                                                                    <input id="village_name" name="village_name" class="form-control" type="text" placeholder="গ্রামের নাম" required />	
                                                                
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="cluster_type"  style="font-size: 1.5em; font-weight: bold;"><b>দাগগুচ্ছের অবস্থান: </b><span class="text-danger">*</span></label>

                                                                <select class="form-control" name="cluster_type" id="cluster_type" required>
                                                                    <option>--দাগগুচ্ছ স্থিতি নির্বাচন করুন--</option>
                                                                    <option value="1">দাগগুচ্ছের ভিতরে</option>
                                                                    <option value="2">দাগগুচ্ছের ভিতরে বাইরে</option>
                                                                </select>
                                                                    
                                                            </div>

                                                            <div class="form-group row" id="cluster_no" style="display: none">
                                                                <label for="cluster_id"  style="font-size: 1.5em; font-weight: bold;"><b>দাগগুচ্ছের সংকেত নাম্বার: </b><span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="cluster_indentity_no" id="cluster_indentity_no" > 
                                                                {{-- <select id="cluster_id" class="form-control" name="cluster_id">
                                                                    @if (empty($clusters))
                                                                        <option>--প্রথমে দাগগুচ্ছ টাইপ নির্বাচন করুন--</option>
                                                                        <option>দাগগুচ্ছ নং-১</option>
                                                                        <option>দাগগুচ্ছ নং-2</option>
                                                                    @else
                                                                        @foreach ($clusters as $cluster)
                                                                            <option value="{{$cluster->id}}">{{$cluster->name_bn}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                    
                                                                </select> --}}
                                                            </div>
                                                         
                    
                                                            <div class="form-group row" style="display:none;">
                                                                {{-- <label for="year" class="col-3 col-form-label"><b>Year: </b></label> --}}
                                                                <div class="col-9">
                                                                    <input id="year" class="form-control" type="hidden" name="year" value="{{date('Y') - 1}}-{{ date('y') }}" readonly/>
                                                                </div>
                                                            </div>
                    
                                                            <div class="form-group row" style="display:none;">
                                                                {{-- <label for="start_date" class="col-3 col-form-label"><b>Start Date: </b></label> --}}
                                                                <div class="col-9">
                                                                    @if (empty($surveyNotification))
                                                                        <input id="start_date" class="form-control" type="hidden" name="start_date" readonly/>
                                                                    @else
                                                                        <input id="start_date" class="form-control" type="hidden" name="start_date" value="{{$surveyNotification->notification_start_data_field}}" readonly/>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="form-group row" style="display:none;">
                                                                {{-- <label for="end_date" class="col-3 col-form-label"><b>End Date: </b></label> --}}
                                                                <div class="col-9">
                                                                    @if(empty($surveyNotification))
                                                                        <input id="end_date" class="form-control" type="hidden" name="end_date" readonly/>
                                                                    @else
                                                                        <input id="end_date" class="form-control" type="hidden" name="end_date" value="{{$surveyNotification->notification_end_data_field}}" readonly/>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            
                                                                                                                      

                                                            {{-- <div class="form-group row">
                                                                <label for="serial_no" class="col-3 col-form-label"><b>Serial No.</b></label>
                                                                <div class="col-9">
                                                                    <input id="serial_no" class="form-control" type="text" name="serial_no" value="{{rand(1, 99999)}}" required readonly />	
                                                                </div>
                                                            </div> --}}

                                                            
                                                </div>

                                                <div class="col-md-6 col-sm-12" style="padding-left: 30px; padding-right:30px;">
                                                            <div class="form-group row">
                                                                <label for="food_type"  style="font-size: 1.2em; font-weight: bold;"><b>খানার প্রকার: </b><span class="text-danger">*</span></label>
                                                                        <select id="food_type" name="food_type" id="food_type" class="form-control" required>
                                                                            <option>--খানা নির্বাচন করুন--</option>
                                                                            <option value="1">কৃষি</option>
                                                                            <option value="2">অকৃষি</option>
                                                                        </select>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="farmers_name"  style="font-size: 1.2em; font-weight: bold;"><b>খানা প্রধানের নাম: </b><span class="text-danger">*</span></label>
                                                        
                                                                    <input id="farmers_name" name="farmers_name" class="form-control" type="text" placeholder="খানা প্রধানের নাম" required />	
                                                                
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="father_name" style="font-size: 1.5em; font-weight: bold;"><b>খানা প্রধানের পিতা/স্বামীর নাম: </b><span class="text-danger">*</span></label>
                                                        
                                                                    <input id="father_name" name="father_name" class="form-control" type="text" placeholder="খানা প্রধানের পিতা/স্বামীর নাম" required />	
                                                                
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="farmers_mobile"  style="font-size: 1.2em; font-weight: bold;"><b>মোবাইল নাম্বার: </b></label>
                                                            
                                                                <input id="farmers_mobile" name="farmers_mobile" class="form-control" type="number" placeholder="কৃষকের মোবাইল নাম্বার"/>	
                                                                
                                                            </div>

                                                            <div class="form-group row" >
                                                                <label for="land_amount"  style="font-size: 1.2em; font-weight: bold;"><b>চাষকৃত জমির আয়তন: </b><span class="text-danger">*</span></label>
                                                            
                                                                    <input id="land_amount" name="land_amount" class="form-control" type="text" placeholder="জমির আয়তন (একর)" required/>	
                                                                
                                                            </div>

                                                        
                                                            <div class="form-group row" id="farmers_class_division_type_field" style="display: none;"> <!--style="display: none;"-->
                                                                <label for="farmers_class_division_type" style="font-size: 1.2em; font-weight: bold;"><b>কৃষকের শ্রেণি বিভাগ: </b><span class="text-danger">*</span></label>
                                                        
                                                                        <select id="farmers_class_division_type" name="farmers_class_division_type" class="form-control form-control-lg">
                                                                            <option value="">--চাষকৃত জমির আয়তন লিখুন--</option>
                                                                            <option value="1">ক্ষুদ্র কৃষক(০.৫-২.৪৯ একর)</option>
                                                                            <option value="2">মাঝারি কৃষক(২.৫০-৭.৪৯ একর)</option>
                                                                            <option value="3">বড় কৃষক(৭.৫০ তদূর্ধ্ব একর জমি)</option>
                                                                        </select>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="permanent_crop_ids" style="font-size: 1.5em; font-weight: bold;"><b>স্থায়ী ফসল: </b></label>

                                                                <select id="permanent_crop_ids" name="permanent_crop_ids[]" class="form-control select-multiple-additional" multiple >
                                                                    @foreach ($crops as $crop)
                                                                        <option value="{{ $crop->id }}">{{ ucfirst($crop->name_en) }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="temporary_crop_ids" style="font-size: 1.5em; font-weight: bold;"><b>অস্থায়ী ফসল: </b></label>

                                                                <select id="temporary_crop_ids" name="temporary_crop_ids[]" class="form-control select-multiple-additional" multiple >
                                                                    @foreach ($crops as $crop)
                                                                        <option value="{{ $crop->id }}">{{ ucfirst($crop->name_en) }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            

                                                       
                    
                                                            {{-- <div class="form-group row">
                                                                <label for="sample_farmer_no" class="col-3 col-form-label"><b>Sample Farmer No.</b></label>
                                                                <div class="col-9">
                                                                    <input id="sample_farmer_no" name="sample_farmer_no" class="form-control" type="text" placeholder="Sample Farmer No" required/>	
                                                                </div>
                                                            </div> --}}
                                                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-11"></div>
                                        <div class="col-1">
                                            @if ($number == true)
                                                <button type="submit" class="btn btn-success mr-2">সংরক্ষন</button>
                                            @else
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('stackScript')
    <script type="text/javascript"> 
        $('#cluster_type').on('change', function() {
            let cluster_type = $(this).val();

            if (cluster_type == 1) {
                $('#cluster_no').show();
                $('#cluster_id').attr('required', 'required');
            } else {
                $('#cluster_no').hide();
                $('#cluster_id').removeAttr('required');
            }
            
        });

        $('#land_amount').on('change', function() {
            var land_size = $("#land_amount").val();
            if(land_size <= 2.49){
                $("#farmers_class_division_type").find('option').remove();
                $("#farmers_class_division_type").append('<option value="1">ছোট/ ক্ষুদ্র কৃষক/ চাষী (০.০৫ - ২.৪৯ একর)</option>');
                $('#farmers_class_division_type option[value="1"]').attr("selected", "selected");
            }else if(land_size >= 2.50 && land_size <= 7.49){
                $("#farmers_class_division_type").find('option').remove();
                $("#farmers_class_division_type").append('<option value="2">মাঝারি কৃষক/ চাষী (২.৫০ - ৭.৪৯ একর)</option>');
                $('#farmers_class_division_type option[value="2"]').attr("selected", "selected");
            }else{
                $("#farmers_class_division_type").find('option').remove();
                $("#farmers_class_division_type").append('<option value="3">বড়/ বৃহৎ কৃষক/ চাষী (৭.৫০ - তদূর্ধ্ব একর জমি)</option>');
                $('#farmers_class_division_type option[value="3"]').attr("selected", "selected");
            }
        });

        // $("#crop_category").on('change', function(e){
        //     e.preventDefault();

        //     var crop_id = $("#crop_id");

        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });

        //     $.ajax({
        //         type:'POST',
        //         url: "{{route('crops_by_category')}}",
        //         data: {_token:$('input[name=_token]').val(),
        //         crop_category: $(this).val()},

        //         success:function(response){
        //             $('option', crop_id).remove();
        //             $('#crop_id').append('<option value="">--ফসল নির্বাচন করুন--</option>');
                    
        //             $.each(response, function(){
        //                 $('<option/>', {
        //                     'value': this.id,
        //                     'text': this.name_en
        //                 }).appendTo('#crop_id');
        //             });
        //         }
        //     });
        // });

        
        $('#food_type').on('change', function(e) {
            e.preventDefault();
            var food_type = $("#food_type").val();
            if (food_type == 1) {
                $('#land_amount_field').show();
                $('#land_amount').attr('required', 'required');
            } else {
                $('#land_amount_field').hide();
                $('#farmers_class_division_type_field').hide();
                $('#land_amount').removeAttr('required');
            }
        });


    </script>
@endpush