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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">অস্থায়ী ফসলের ক্ষয়ক্ষতির নিরূপণ তফসিল (তফসিল-১১)</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">ড্যাশবোর্ড</a>
                            </li>

                            <li class="breadcrumb-item active">
                                <a class="text-muted">অস্থায়ী ফসলের ক্ষয়ক্ষতির নিরূপণ তফসিল (তফসিল-১১)</a>
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
                                    <h3 class="card-title">অস্থায়ী ফসলের ক্ষয়ক্ষতির নিরূপণ তফসিল (তফসিল-১১)</h3>
                                    <div class="card-toolbar">

                                    </div>
                                </div>
                                <!--begin::Form-->
                                <form action="{{ route('admin.surveyTofsilForm11.store') }}" method="post">
                                    @csrf

                                    {{-- hidden fields --}}
                                    @if (!empty($processList))
                                        <input type="hidden" name="survey_process_list_id" value="{{ $processListId }}" />
                                        <input type="hidden" name="survey_notification_id" value="{{ $processList->survey_notification_id }}" />
                                        <input type="hidden" name="division_id" value="{{ $processList->division_id }}" />
                                        <input type="hidden" name="district_id" value="{{ $processList->district_id }}" />
                                        <input type="hidden" name="upazila_id" value="{{ $processList->upazila_id }}" />
                                        <input type="hidden" name="union_id" value="{{ $processList->union_id }}" />
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
                                                            <label for="crop_id" style="font-size: 1.2em; font-weight: bold;"><b>ফসলের নাম: </b><span class="text-danger">*</span></label>
                                                        
                                                                    @if (isset($surveyNotification))
                                                                        @if ($surveyNotification->crop_id != '')
                                                                            <input type="hidden" id="crops_id" name="crops_id" value="{{ $surveyNotification->crop_id }}">
                                                                            <input type="text" class="form-control" value="{{ $surveyNotification->crop ? ucfirst($surveyNotification->crop->name_en) : '' }}" readonly>
                                                                        @else
                                                                            <select class="select2 form-control" id="crops_id" name="crops_id" required>
                                                                                <option value="">--ফসলের নাম নির্বাচন করুন--</option>

                                                                                @foreach ($crops as $crop)
                                                                                    <option value="{{ $crop->id }}">{{ ucfirst($crop->name_en) }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        @endif
                                                                    @else
                                                                        <select class="select2 form-control" id="crops_id" name="crops_id" required>
                                                                            <option value="">--ফসলের নাম নির্বাচন করুন--</option>

                                                                            @foreach ($crops as $crop)
                                                                                <option value="{{ $crop->id }}">{{ ucfirst($crop->name_en) }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @endif
                                                            
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="loss_period_start_date" style="font-size: 1.2em; font-weight: bold;"><b>ক্ষয়ক্ষতির  শুরুর তারিখ: </b><span class="text-danger">*</span></label>
                                                            
                                                                <input class="form-control" type="date" placeholder="" name="loss_period_start_date" id="loss_period_start_date" required/>
                                                            
                                                        </div>


                                                
                                                    </div>

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;"> 
                                             

                                                        <div class="form-group row">
                                                            <label for="cause_of_loss" style="font-size: 1.2em; font-weight: bold;"><b>ক্ষয়ক্ষতির প্রধান কারণ: </b><span class="text-danger">*</span></label>
                                                       
                                                                <input class="form-control" type="text" placeholder="" name="cause_of_loss" id="cause_of_loss" required/>
                                                          
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="loss_period_end_date" style="font-size: 1.2em; font-weight: bold;"><b>ক্ষয়ক্ষতির শেষ হওয়ার তারিখ: </b><span class="text-danger">*</span></label>
                                                            
                                                                <input class="form-control" type="date" placeholder="" name="loss_period_end_date" id="loss_period_end_date" required/>
                                                            
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">ক্ষতিগ্রস্ত ফসলী জমি ও ফসলের ক্ষতির পরিমাণ</h3>
                                        </div> 
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                                <div class="form-group row">
                                                                    <label for="land_amound" style="font-size: 1.2em; font-weight: bold;"><b>ফসলের আওতাদিন জমির পরিমাণ (একরে): </b><span class="text-danger">*</span></label>
                                                                    
                                                                        <input class="form-control" type="number" step="0.01" placeholder="একরে" name="land_amound" id="land_amound" required/>
                                                                    
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="partial_damage" style="font-size: 1.2em; font-weight: bold;"><b>আংশিক ক্ষতি (একরে): </b><span class="text-danger">*</span></label>
                                                                    
                                                                        <input class="form-control" type="number" step="0.01" placeholder="একরে" name="partial_damage" id="partial_damage" required/>
                                                                    
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="percentage_of_damage" style="font-size: 1.2em; font-weight: bold;"><b>ক্ষতির শতকরা হার: </b><span class="text-danger">*</span></label>
                                                                    
                                                                        <input class="form-control" type="number" step="0.01" placeholder="" name="percentage_of_damage" id="percentage_of_damage" required/>
                                                                    
                                                                </div>
                       
                                                                <div class="form-group row">
                                                                    <label for="complete_damage" style="font-size: 1.2em; font-weight: bold;"><b>সম্পূর্ণ  ক্ষতি: </b><span class="text-danger">*</span></label>
                                                                    
                                                                        <input class="form-control" type="number" step="0.01" placeholder="" name="complete_damage" id="complete_damage" required/>
                                                                    
                                                                </div>


                                                                
                                                                
                                                              

                                                                

                                                        
                                                    </div>

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;"> 
                                               
                                                        <div class="form-group row">
                                                            <label for="yield_per_desired_acre" style="font-size: 1.2em; font-weight: bold;"><b>কাঙ্খিত একর প্রতি ফলন (কেজি): </b><span class="text-danger">*</span></label>
                                                            
                                                                <input class="form-control" type="number" step="0.01" placeholder="কেজি" name="yield_per_desired_acre" id="yield_per_desired_acre" required/>
                                                            
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="partial_damage_to_total_damage" style="font-size: 1.2em; font-weight: bold;"><b>আংশিক ক্ষতিতে সম্পূর্ণ ক্ষতির পরিমাণ (একরে): </b><span class="text-danger">*</span></label>
                                                                    
                                                                <input class="form-control" type="number" step="0.01" placeholder="একরে" name="partial_damage_to_total_damage" id="partial_damage_to_total_damage" required/>
                                                                    
                                                        </div>

                                                       

                                                        <div class="form-group row">
                                                            <label for="estimated_amount_of_crop_loss" style="font-size: 1.2em; font-weight: bold;"><b>প্রাক্কলিত ফসলের ক্ষতির পরিমাণ (মে. টন): </b><span class="text-danger">*</span></label>
                                                            
                                                                <input class="form-control" type="number" step="0.01" placeholder="মে. টন" name="estimated_amount_of_crop_loss" id="estimated_amount_of_crop_loss" required/>
                                                            
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="amount_of_crop_loss_tk" style="font-size: 1.2em; font-weight: bold;"><b>ফসলের মোট ক্ষতির পরিমাণ (টাকায়): </b><span class="text-danger">*</span></label>
                                                            
                                                                <input class="form-control" type="number" step="0.01" placeholder="টাকায়" name="amount_of_crop_loss_tk" id="amount_of_crop_loss_tk" required/>
                                                            
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-12 text-right" style="padding-left: 35px; padding-right:35px;">
                                                @if ($number == true)
                                                    <button type="submit" class="btn btn-primary mr-5">সংরক্ষন</button>
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
        $('.total_fruity_trees').on('keyup', function() {
            let total_fruity_trees_in_garden = $('#total_fruity_trees_in_garden').val();
            let total_fruity_scattered_trees = $('#total_fruity_scattered_trees').val();

            let total_fruity_trees = Number(total_fruity_trees_in_garden) + Number(total_fruity_scattered_trees);

            if (total_fruity_trees_in_garden != '' && total_fruity_scattered_trees != '') {
                $('#total_fruity_trees').val(total_fruity_trees);
            }
        });

        $('.last_total_fruity_trees').on('keyup', function() {
            let last_total_fruity_trees_in_garden = $('#last_total_fruity_trees_in_garden').val();
            let last_total_fruity_scattered_trees = $('#last_total_fruity_scattered_trees').val();

            let last_total_fruity_trees = Number(last_total_fruity_trees_in_garden) + Number(last_total_fruity_scattered_trees);

            if (last_total_fruity_trees_in_garden != '' && last_total_fruity_scattered_trees != '') {
                $('#last_total_fruity_trees').val(last_total_fruity_trees);
            }
        });

        $('.total_land_amount_under_the_trees').on('keyup', function() {
            let land_amount_under_the_fruitless_trees = $('#land_amount_under_the_fruitless_trees').val();
            let land_amount_under_the_fruitly_trees = $('#land_amount_under_the_fruitly_trees').val();

            let total_land_amount_under_the_trees = Number(land_amount_under_the_fruitless_trees) + Number(land_amount_under_the_fruitly_trees);

            if (land_amount_under_the_fruitless_trees != '' && land_amount_under_the_fruitly_trees != '') {
                $('#total_land_amount_under_the_trees').val(total_land_amount_under_the_trees);
            }
        });

        $('.last_total_land_amount_under_the_trees').on('keyup', function() {
            let last_land_amount_under_the_fruitly_trees = $('#last_land_amount_under_the_fruitly_trees').val();
            let last_land_amount_under_the_fruitless_trees = $('#last_land_amount_under_the_fruitless_trees').val();

            let last_total_land_amount_under_the_trees = Number(last_land_amount_under_the_fruitly_trees) + Number(last_land_amount_under_the_fruitless_trees);

            if (last_land_amount_under_the_fruitly_trees != '' && last_land_amount_under_the_fruitless_trees != '') {
                $('#last_total_land_amount_under_the_trees').val(last_total_land_amount_under_the_trees);
            }
        });

        $('.average_yield_per_tree').on('keyup', function() {
            let total_production = $('#total_production').val();
            let total_fruity_trees = $('#total_fruity_trees').val();

            let average_yield_per_tree = (Number(total_production) / Number(total_fruity_trees)) * 1000;

            if (total_production != '' && total_fruity_trees != '') {
                $('#average_yield_per_tree').val(average_yield_per_tree);
            }
        });
    </script>
@endpush
