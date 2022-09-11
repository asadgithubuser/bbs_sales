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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">ভুট্টা ফসল উৎপাদন জরিপ তফসিল (তফসিল-৬)</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">ড্যাশবোর্ড</a>
                            </li>

                            <li class="breadcrumb-item active">
                                <a class="text-muted">ভুট্টা ফসল উৎপাদন জরিপ তফসিল (তফসিল-৬)</a>
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
                                    <h3 class="card-title">ভুট্টা ফসল উৎপাদন জরিপ তফসিল (তফসিল-৬)</h3>
                                    
                                    <div class="card-toolbar">

                                    </div>
                                </div>
                                <!--begin::Form-->
                                <form action="{{ route('admin.surveyTofsilForm3Maize.store') }}" method="post">
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
                                    
                                    <div class="card-body">
                                        <div class="card">
                                            <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                                <h3 style="color:#ffffff;">অস্থায়ী ফসল উৎপাদন জরিপ তফসিল</h3>
                                            </div>
                                            <div class="card-body">
                                                
                                                <div class="row">
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                
                                                        <div class="form-group row">
                                                            <label for="season" style="font-size: 1.2em; font-weight: bold;"><b>ফসলের জাত: </b><span class="text-danger">*</span></label>
                                                        
                                                                <select class="select2 form-control" id="season" name="season" required>
                                                                    <option value="">--ফসলের জাত নির্বাচন করুন--</option>
                                                                    <option value="1">রবি (আশ্বিন-ফাল্গুন)</option>
                                                                    <option value="2">খরিপ (চৈত্র-ভাদ্র)</option>
                                                                </select>
                                                        
                                                        </div>
                                                    
                                                    </div>
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                            
                                                        <div class="form-group row">
                                                            <label for="" style="font-size: 1.2em; font-weight: bold;"><b>তথ্য সংগ্রহের তারিখ: </b></label>

                                                                <input class="form-control" type="text" id="" name="" value="{{ date('d-m-Y')}}" readonly/>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                        <div class="card">
                                            <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                                <h3 style="color:#ffffff;">ফসলের অধীন জমির পরিমান, উৎপাদন ও ফসলের হার</h3>
                                            </div>
                                            <div class="card-body">
                                               
                                                <div class="row">
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="crop_id" style="font-size: 1.2em; font-weight: bold;"><b>ফসলের নাম: </b><span class="text-danger">*</span></label>
                                                          
                                                                    @if (isset($surveyNotification))
                                                                        @if ($surveyNotification->crop_id != '')
                                                                            <input type="hidden" id="crop_id" name="crop_id" value="{{ $surveyNotification->crop_id }}">
                                                                            <input type="text" class="form-control" value="{{ $surveyNotification->crop ? ucfirst($surveyNotification->crop->name_en) : '' }}" readonly>
                                                                        @else
                                                                            <select class="select2 form-control" id="crop_id" name="crop_id" required>
                                                                                <option value="">--ফসলের নাম নির্বাচন করুন--</option>

                                                                                @foreach ($crops as $crop)
                                                                                    <option value="{{ $crop->id }}">{{ ucfirst($crop->name_en) }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        @endif

                                                                    @else
                                                                        <select class="select2 form-control" id="crop_id" name="crop_id" required>
                                                                            <option value="">--ফসলের নাম নির্বাচন করুন--</option>

                                                                            @foreach ($crops as $crop)
                                                                                <option value="{{ $crop->id }}">{{ ucfirst($crop->name_en) }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @endif
                                                             
                                                        </div>


                                                        <div class="form-group row">
                                                            <label for="last_year_land_amount" style="font-size: 1.2em; font-weight: bold;"><b>গত বছরে জমির পরিমাণ (একর): </b><span class="text-danger">*</span></label>
                                                            
                                                                <input class="form-control" type="text" placeholder="একর" id="last_year_land_amount" name="last_year_land_amount" required/>
                                                           
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="last_year_land_producttion" style="font-size: 1.2em; font-weight: bold;"><b>গত বছরে একর প্রতি ফলন (কেজি): </b><span class="text-danger">*</span></label>
                                                            
                                                                <input class="form-control lastacreCalculate" type="text" placeholder="কেজি" id="last_year_land_producttion" name="last_year_land_producttion" required/>
                                                            
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="last_acre_reflection_rate" style="font-size: 1.2em; font-weight: bold;"><b>গত বছরে মোট উৎপাদন (ম্যাট্ট্রিক টন): </b><span class="text-danger">*</span></label>
                                                            
                                                                <input class="form-control lastacreCalculate" type="text" value="" id="last_acre_reflection_rate" name="last_acre_reflection_rate" readonly/>
                                                      
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                            
                                                        <div class="form-group row">
                                                            <label for="current_year_land_amount" style="font-size: 1.2em; font-weight: bold;"><b>চলতি বছরে জমির পরিমাণ (একর): </b><span class="text-danger">*</span></label>
                                                            
                                                                <input class="form-control acreCalculate" type="text" placeholder="একর" id="current_year_land_amount" name="current_year_land_amount" required/>
                                                           
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="current_year_land_producttion" style="font-size: 1.2em; font-weight: bold;"><b>চলতি বছরে একর প্রতি ফলন (কেজি): </b><span class="text-danger">*</span></label>
                                                            
                                                                <input class="form-control acreCalculate" type="text" placeholder="কেজি" id="current_year_land_producttion" name="current_year_land_producttion" required/>
                                                           
                                                        </div>



                                

                                                        <div class="form-group row">
                                                            <label for="acre_reflection_rate" style="font-size: 1.2em; font-weight: bold;"><b>চলতি বছরে মোট উৎপাদন (ম্যাট্ট্রিক টন): </b><span class="text-danger">*</span></label>
                                                            
                                                                <input class="form-control" type="text" value="" id="acre_reflection_rate" name="acre_reflection_rate" readonly/>
                                                            
                                                        </div>

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
        $('#crop_select').on('change', function() {
            let Crop_type = $(this).val();

            if (Crop_type == 1) {
                $('.aus_crop').show();
                $('.potato_crop').hide();

            } else if (Crop_type == 2) {
                $('.aus_crop').hide();
                $('.potato_crop').show();
            } else {
                $('.aus_crop').hide();
                $('.potato_crop').hide();
            }

        });
    </script>

    <script type="text/javascript">
        $('#Source_type').on('change', function() {
            let Source_type = $(this).val();

            if (Source_type == 1) {
                $('#Source_no1').show();
                $('#Source_no2').hide();


            } else {
                $('#Source_no1').hide();
                $('#Source_no2').hide();
            }

        });
    </script>

    <script type="text/javascript">
        $('#Water_type').on('change', function() {
            let Water_type = $(this).val();

            if (Water_type == 1) {
                $('#Water_no1').show();
                $('#Water_no2').hide();


            } else {
                $('#Water_no1').hide();
                $('#Water_no2').hide();
            }

        });
    </script>

    <script type="text/javascript">
        $('#Fertilizer_type').on('change', function() {
            let Fertilizer_type = $(this).val();

            if (Fertilizer_type == 1) {
                $('#Fertilizer_no1').show();
                $('#Fertilizer_no2').hide();


            } else {
                $('#Fertilizer_no1').hide();
                $('#Fertilizer_no2').hide();
            }

        });
    </script>

    <script type="text/javascript">
        $('#Pesticide_type').on('change', function() {
            let Pesticide_type = $(this).val();

            if (Pesticide_type == 1) {
                $('#pesticide_no1').show();
                $('#pesticide_no2').hide();


            } else {
                $('#pesticide_no1').hide();
                $('#pesticide_no2').hide();
            }

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
@endpush
