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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Crop Damage Estimation Form</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">Dashboard</a>
                            </li>

                            <li class="breadcrumb-item active">
                                <a class="text-muted">Crop Damage Estimation Form</a>
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
                                    <h3 class="card-title">Crop Damage Estimation Form</h3>
                                    
                                    <div class="card-toolbar">

                                    </div>
                                </div>
                                <!--begin::Form-->
                                <form action="{{ route('admin.surveyTofsilForm11.update',$surveyTofsilForm11) }}" method="post">
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
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">

                                                        <div class="form-group row">
                                                            <label for="crop_id" class="col-3 col-form-label"><b>Crop Name: </b><span class="text-danger">*</span></label>
                                                            <div class="col-9">
                                                                <div class="form-group">
                                                                    @if (isset($surveyNotification))
                                                                        @if ($surveyNotification->crop_id != '')
                                                                            <input type="hidden" id="crops_id" name="crops_id" value="{{ $surveyNotification->crop_id }}">
                                                                            <input type="text" class="form-control form-control-lg" value="{{ $surveyNotification->crop ? ucfirst($surveyNotification->crop->name_en) : '' }}" readonly>
                                                                        @else
                                                                            <select class="select2 form-control form-control-lg" id="crops_id" name="crops_id" required>
                                                                                <option value="">--Select Crop--</option>

                                                                                @foreach ($crops as $crop)
                                                                                    <option value="{{ $crop->id }}">{{ ucfirst($crop->name_en) }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        @endif
                                                                    @else
                                                                        <select class="select2 form-control form-control-lg" id="crops_id" name="crops_id" required>
                                                                            <option value="">--Select Crop--</option>

                                                                            @foreach ($crops as $crop)
                                                                                <option value="{{ $crop->id }}">{{ ucfirst($crop->name_en) }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="cause_of_loss" class="col-3 col-form-label"><b>Cause of Loss: </b><span class="text-danger">*</span></label>
                                                            <div class="col-9">
                                                                <input class="form-control" type="text" placeholder="Enter Cause of Loss" value="{{ $surveyTofsilForm11->cause_of_loss }}" name="cause_of_loss" id="cause_of_loss" required/>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="loss_period_start_date" class="col-3 col-form-label"><b>Loss Period Start Date: </b><span class="text-danger">*</span></label>
                                                            <div class="col-9">
                                                                <input class="form-control" type="date" placeholder="Enter Loss Period Start Date" value="{{ $surveyTofsilForm11->loss_period_start_date }}" name="loss_period_start_date" id="loss_period_start_date" required/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="loss_period_end_date" class="col-3 col-form-label"><b>Loss Period End Date: </b><span class="text-danger">*</span></label>
                                                            <div class="col-9">
                                                                <input class="form-control" type="date" placeholder="Enter Loss Period End Date" value="{{ $surveyTofsilForm11->loss_period_end_date }}" name="loss_period_end_date" id="loss_period_end_date" required/>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="land_amound" class="col-3 col-form-label"><b>Land Amount: </b><span class="text-danger">*</span></label>
                                                            <div class="col-9">
                                                                <input class="form-control" type="number" step="0.01" value="{{ $surveyTofsilForm11->land_amound }}"
                                                                placeholder="Enter Land Amount" name="land_amound" id="land_amound" 
                                                                required/>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="yield_per_desired_acre" class="col-3 col-form-label"><b>Yield Per Desired Acre: </b><span class="text-danger">*</span></label>
                                                            <div class="col-9">
                                                                <input class="form-control" type="number" step="0.01" placeholder="Enter Yield Per Desired Acre" value="{{ $surveyTofsilForm11->yield_per_desired_acre }}" name="yield_per_desired_acre" id="yield_per_desired_acre" required/>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6"> 
                                                <div class="card">
                                                    <div class="card-body">

                                                        <div class="form-group row">
                                                            <label for="partial_damage" class="col-3 col-form-label"><b>Partial Damage: </b><span class="text-danger">*</span></label>
                                                            <div class="col-9">
                                                                <input class="form-control" type="number" step="0.01" placeholder="Enter Partial Damage" value="{{ $surveyTofsilForm11->partial_damage }}"  name="partial_damage" id="partial_damage" required/>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="percentage_of_damage" class="col-3 col-form-label"><b>Percentage of Damage: </b><span class="text-danger">*</span></label>
                                                            <div class="col-9">
                                                                <input class="form-control" type="number" step="0.01" placeholder="Enter Percentage of Damage" value="{{ $surveyTofsilForm11->percentage_of_damage }}" name="percentage_of_damage" id="percentage_of_damage" required/>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="partial_damage_to_total_damage" class="col-3 col-form-label"><b>Partial Damage to Total Damage: </b><span class="text-danger">*</span></label>
                                                            <div class="col-9">
                                                                <input class="form-control" type="number" step="0.01" placeholder="Enter Partial Damage to Total Damage" name="partial_damage_to_total_damage" value="{{ $surveyTofsilForm11->partial_damage_to_total_damage }}" id="partial_damage_to_total_damage" required/>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="complete_damage" class="col-3 col-form-label"><b>Complete Damage: </b><span class="text-danger">*</span></label>
                                                            <div class="col-9">
                                                                <input class="form-control" type="number" step="0.01" placeholder="Enter Complete Damage" name="complete_damage" id="complete_damage" value="{{ $surveyTofsilForm11->complete_damage }}" required/>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="estimated_amount_of_crop_loss" class="col-3 col-form-label"><b>Estimated Amount of Crop Loss: </b><span class="text-danger">*</span></label>
                                                            <div class="col-9">
                                                                <input class="form-control" type="number" step="0.01" placeholder="Enter Estimated Amount of Crop Loss" name="estimated_amount_of_crop_loss" value="{{ $surveyTofsilForm11->estimated_amount_of_crop_loss }}" id="estimated_amount_of_crop_loss" required/>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="amount_of_crop_loss_tk" class="col-3 col-form-label"><b>Amount of Crop Loss(TK): </b><span class="text-danger">*</span></label>
                                                            <div class="col-9">
                                                                <input class="form-control" type="number" step="0.01" placeholder="Enter Amount of Crop Loss(TK)" name="amount_of_crop_loss_tk" value="{{ $surveyTofsilForm11->amount_of_crop_loss_tk }}" id="amount_of_crop_loss_tk" required/>
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
                                                @if ($number == true)
                                                    <button type="submit" class="btn btn-success mr-2">Submit</button>
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
