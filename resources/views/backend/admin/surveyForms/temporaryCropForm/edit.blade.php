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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">অস্থায়ী ফসল উৎপাদন জরিপ তফসিল (তফসিল-৩)</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">ড্যাশবোর্ড</a>
                            </li>

                            <li class="breadcrumb-item active">
                                <a class="text-muted">অস্থায়ী ফসল উৎপাদন জরিপ তফসিল (তফসিল-৩)</a>
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
                                    <h3 class="card-title">অস্থায়ী ফসল উৎপাদন জরিপ তফসিল তথ্য সংশোধন (তফসিল-৩)</h3>
                                    
                                    <div class="card-toolbar">

                                    </div>
                                </div>
                                <!--begin::Form-->
                                <form action="{{ route('admin.temporaryCropForm.store') }}" method="post">
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
                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">ফসলের অধীন জমির পরিমান, উৎপাদন ও ফসলের হার</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                        {{-- @dd($surveyList->surveyCompilationCollectForms); --}}
                                                        <div class="form-group row">
                                                                    <label for="farmer_id" style="font-size: 1.2em; font-weight: bold;"><b>চাষীর নাম: </b><span class="text-danger">*</span></label>
                                                                    <select class="select2 form-control" id="farmer_id" name="farmer_id" required>
                                                                        {{-- <option value="">--চাষীর নাম নির্বাচন করুন--</option> --}}
                                                                        @if (isset($surveyList->surveyCompilationCollectForms))
                                                                            @foreach ($surveyList->surveyCompilationCollectForms as $item)
                                                                            
                                                                                <option value="{{ $item->id }}" {{ $item->id == $temporaryCropData->farmer_id ? 'selected' : '' }}>{{ $item->farmers_name }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                        </div>

                                                   

                                                        <div class="form-group row">
                                                            <label for="last_year_land_amount" style="font-size: 1.2em; font-weight: bold;"><b>জমির পরিমাণ পূর্ববর্তী বছরের (একর): </b><span class="text-danger">*</span></label>

                                                                <input class="form-control" type="text" placeholder="একর" id="last_year_land_amount" name="last_year_land_amount" value="{{ $temporaryCropData->last_year_land_amount }}" required/>
                                               
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="last_year_land_producttion" style="font-size: 1.2em; font-weight: bold;"><b>পূর্ববর্তী বছরের উৎপাদন (মণ): </b><span class="text-danger">*</span></label>
                                                            
                                                                <input class="form-control lastacreCalculate" type="text" placeholder="মণ" id="last_year_land_producttion" name="last_year_land_producttion" value="{{ $temporaryCropData->last_year_land_producttion }}" required/>
                                                            
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="last_acre_reflection_rate" style="font-size: 1.2em; font-weight: bold;"><b>পূর্ববর্তী বছরের একর প্রতি গড় ফলন (কেজি): </b><span class="text-danger">*</span></label>
                                                            
                                                            <input class="form-control lastacreCalculate" type="text" id="last_acre_reflection_rate" name="last_acre_reflection_rate" value="{{ number_format((float)$temporaryCropData->last_acre_reflection_rate, 4, '.', '')  }}" readonly/>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                        
                                                       

                                                        <div class="form-group row">
                                                            <label for="crops_id" style="font-size: 1.2em; font-weight: bold;"><b>ফসলের নাম: </b><span class="text-danger">*</span></label>
                                                      
                                                                    @if (isset($surveyNotification))
                                                                        @if ($surveyNotification->crop_id != '')
                                                                            <input type="hidden" id="crops_id" name="crops_id" value="{{ $surveyNotification->crop_id }}">
                                                                            <input type="text" class="form-control" value="{{ $surveyNotification->crop ? ucfirst($surveyNotification->crop->name_en) : '' }}" readonly>
                                                                        @else
                                                                            <select class="select2 form-control" id="crops_id" name="crops_id" required>
                                                                                {{-- <option value="">--ফসলের নাম নির্বাচন করুন--</option> --}}

                                                                                @foreach ($crops as $crop)
                                                                                    <option value="{{ $crop->id }}">{{ ucfirst($crop->name_en) }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        @endif

                                                                    @else
                                                                        <select class="select2 form-control" id="crops_id" name="crops_id" required>
                                                                            {{-- <option value="">--ফসলের নাম নির্বাচন করুন--</option> --}}

                                                                            @foreach ($crops as $crop)
                                                                                <option value="{{ $crop->id }}">{{ ucfirst($crop->name_en) }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @endif
                                                        
                                                        </div>


                                                  

                                                        <div class="form-group row">
                                                            <label for="current_year_land_amount" style="font-size: 1.2em; font-weight: bold;"><b>জমির পরিমাণ চলতি বছরের (একর): </b><span class="text-danger">*</span></label>
               
                                                            <input class="form-control acreCalculate" type="text" placeholder="Enter Land Amount Of Current Year" id="current_year_land_amount" value="{{ $temporaryCropData->current_year_land_amount }}" name="current_year_land_amount" required/>
                                                          
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="current_year_land_producttion" style="font-size: 1.2em; font-weight: bold;"><b>চলতি বছরের উৎপাদন (মণ): </b><span class="text-danger">*</span></label>
                                                         
                                                                <input class="form-control acreCalculate" type="text" placeholder="মণ" id="current_year_land_producttion" name="current_year_land_producttion" value="{{ $temporaryCropData->current_year_land_producttion }}" required/>
                                                            
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="acre_reflection_rate" style="font-size: 1.2em; font-weight: bold;"><b>চলতি বছরের একর প্রতি গড় ফলন (কেজি): </b><span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" id="acre_reflection_rate" name="acre_reflection_rate" value="{{ number_format((float)$temporaryCropData->acre_reflection_rate, 4, '.', '')  }}" readonly/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-12 text-right" style="padding-left: 35px; padding-right:35px;">
                                                
                                                    <button type="submit" class="btn btn-primary font-weight-bold">হালনাগাদ করুন</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>



                        {{-- <div class="card card-custom example example-compact">
                            <div class="card card-custom gutter-b example example-compact">
                                <div class="card-header">
                                    <h3 class="card-title">অস্থায়ী ফসল উৎপাদন জরিপ তথ্য সংশোধন</h3>
                                    <div class="card-toolbar">
                                    </div>
                                </div>
                                <!--begin::Form-->
                                <form action="{{ route('admin.temporaryCropForm.update', $temporaryCropData->id) }}" method="post">
                                    @csrf
                                    
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    
                                                    <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                                        <h3 style="color:#ffffff;">ফসলের অধীন জমির পরিমান, উৎপাদন ও ফসলের হার</h3>
                                                    </div>
                                                    
                                                    <div class="card-body">

                                                        <div class="form-group row">
                                                            <label for="farmers_name" class="col-4" style="font-size: 1.5em; font-weight: bold;">চাষীর নাম:<span class="text-danger">*</span></label>
                                                            <div class="col-8">
                                                                <div class="form-group">
                                                                    <select class="select2 form-control form-control-lg" id="farmer_id" name="farmer_id" required>
                                                                        <option value="">--Select Farmer's Name--</option>
                                                            
                                                                        @if (isset($surveyList->surveyCompilationCollectForms))
                                                                            @foreach ($surveyList->surveyCompilationCollectForms as $item)
                                                                                <option value="{{ $item->id }}" {{ $item->id == $temporaryCropData->farmer_id ? 'selected' : '' }}>{{ $item->farmers_name }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="last_year_land_amount" style="font-size: 1.5em; font-weight: bold;" class="col-4 col-form-label"><b>জমির পরিমাণ পূর্ববর্তী বছরের (একর): </b><span class="text-danger">*</span></label>
                                                            <div class="col-8">
                                                                <input class="form-control" type="text" placeholder="Enter Land Amount Of Last Year" id="last_year_land_amount" name="last_year_land_amount" value="{{ $temporaryCropData->last_year_land_amount }}" required/>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="last_year_land_producttion"  style="font-size: 1.5em; font-weight: bold;" class="col-4 col-form-label"><b>পূর্ববর্তী বছরের উৎপাদন (মণ): </b><span class="text-danger">*</span></label>
                                                            <div class="col-8">
                                                                <input class="form-control lastacreCalculate" type="text" placeholder="Enter Land Production Of Last Year" id="last_year_land_producttion" name="last_year_land_producttion" value="{{ $temporaryCropData->last_year_land_producttion }}" required/>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="last_acre_reflection_rate"  style="font-size: 1.5em; font-weight: bold;" class="col-4 col-form-label"><b>পূর্ববর্তী বছরের একর প্রতি গড় ফলন (কেজি):  </b></label>
                                                            <div class="col-8">
                                                                <input class="form-control lastacreCalculate" type="text" id="last_acre_reflection_rate" name="last_acre_reflection_rate" value="{{ number_format((float)$temporaryCropData->last_acre_reflection_rate, 4, '.', '')  }}" readonly/>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="current_year_land_amount" style="font-size: 1.5em; font-weight: bold;" class="col-4 col-form-label"><b>জমির পরিমাণ চলতি বছরের (একর): </b><span class="text-danger">*</span></label>
                                                            <div class="col-8">
                                                                <input class="form-control acreCalculate" type="text" placeholder="Enter Land Amount Of Current Year" id="current_year_land_amount" value="{{ $temporaryCropData->current_year_land_amount }}" name="current_year_land_amount" required/>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="current_year_land_producttion" style="font-size: 1.5em; font-weight: bold;" class="col-4 col-form-label"><b>চলতি বছরের উৎপাদন (মণ):  </b><span class="text-danger">*</span></label>
                                                            <div class="col-8">
                                                                <input class="form-control acreCalculate" type="text" placeholder="Enter Land Production of Current Year" id="current_year_land_producttion" name="current_year_land_producttion" value="{{ $temporaryCropData->current_year_land_producttion }}" required/>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="acre_reflection_rate" style="font-size: 1.5em; font-weight: bold;" class="col-4 col-form-label"><b>চলতি বছরের একর প্রতি গড় ফলন (কেজি):  </b></label>
                                                            <div class="col-8">
                                                                <input class="form-control" type="text" id="acre_reflection_rate" name="acre_reflection_rate" value="{{ number_format((float)$temporaryCropData->acre_reflection_rate, 4, '.', '')  }}" readonly/>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-12 text-right">
                                                <button type="submit" class="btn btn-success mr-2">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> --}}


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
