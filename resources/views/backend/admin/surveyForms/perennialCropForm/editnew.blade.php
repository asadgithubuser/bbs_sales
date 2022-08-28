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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">স্থায়ী/বহুবর্ষজীবী ফসল উৎপাদন জরিপ তফসিল (তফসিল-৪)
                        </h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">ড্যাশবোর্ড</a>
                            </li>

                            <li class="breadcrumb-item active">
                                <a class="text-muted">স্থায়ী/বহুবর্ষজীবী ফসল উৎপাদন জরিপ তফসিল (তফসিল-৪)</a>
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
                                    <h3 class="card-title">স্থায়ী/বহুবর্ষজীবী ফসল উৎপাদন জরিপ তফসিল (তফসিল-৪)</h3>

                                    <div class="card-toolbar">

                                    </div>
                                </div>
                                <!--begin::Form-->
                                <form action="{{ route('admin.perennialCropForm.store') }}" method="post">
                                    @csrf

                                    {{-- hidden fields --}}
                                    @if (!empty($processList))
                                        <input type="hidden" name="survey_process_list_id" value="{{ $processListId }}" />
                                        <input type="hidden" name="survey_notification_id"
                                            value="{{ $processList->survey_notification_id }}" />
                                        <input type="hidden" name="division_id" value="{{ $processList->division_id }}" />
                                        <input type="hidden" name="district_id" value="{{ $processList->district_id }}" />
                                        <input type="hidden" name="upazila_id" value="{{ $processList->upazila_id }}" />
                                        <input type="hidden" name="union_id" value="{{ $processList->union_id }}" />
                                        <input type="hidden" name="mouza_id" value="{{ $processList->mouja_id }}" />
                                    @endif

                                    <div class="card-body">
                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">সাধারণ তথ্য</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6"
                                                        style="padding-left: 35px; padding-right:35px;">

                                                        <div class="form-group row">
                                                            <label for="crops_id"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>ফসলের নাম :
                                                                </b><span class="text-danger">*</span></label>

                                                            @if (isset($surveyNotification))
                                                                @if ($surveyNotification->crop_id != '')
                                                                    <input type="hidden" id="crops_id" name="crops_id"
                                                                        value="{{ $surveyNotification->crop_id }}">
                                                                    <input type="text" class="form-control form-control-lg"
                                                                        value="{{ $surveyNotification->crop ? ucfirst($surveyNotification->crop->name_en) : '' }}"
                                                                        readonly>
                                                                @else
                                                                    <select class="select2 form-control form-control-lg"
                                                                        id="crops_id" name="crops_id" required>
                                                                        <option value="">--ফসলের নাম নির্বাচন করুন--
                                                                        </option>

                                                                        @foreach ($crops as $crop)
                                                                            <option value="{{ $crop->id }}">
                                                                                {{ ucfirst($crop->name_en) }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                @endif
                                                            @else
                                                                <select class="select2 form-control form-control-lg"
                                                                    id="crops_id" name="crops_id" required>
                                                                    <option value="">--ফসলের নাম নির্বাচন করুন--</option>


                                                                </select>
                                                            @endif

                                                        </div>

                                                    </div>

                                                    <div class="col-md-6"
                                                        style="padding-left: 35px; padding-right:35px;">


                                                        <div class="form-group row">
                                                            <label for=""
                                                                style="font-size: 1.5em; font-weight: bold;"><b>তথ্য
                                                                    সংগ্রহের তারিখ: </b></label>

                                                            <input class="form-control" type="text" id="" name=""
                                                                value="{{ date('jS \of F Y') }}" readonly />

                                                        </div>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">স্থায়ী ফসলের অধীন গাছের সংখ্যা, ফলনের হার, উৎপাদন ও
                                                আয়তন</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6"
                                                        style="padding-left: 35px; padding-right:35px;">


                                                        <div class="form-group row">
                                                            <label for="farmer_id"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>চাষীর নাম:
                                                                </b><span class="text-danger">*</span></label>

                                                            <select class="select2 form-control form-control-lg"
                                                                id="farmer_id" name="farmer_id" required>
                                                                <option value="">--চাষীর নাম নির্বাচন করুন--</option>

                                                                @if (isset($surveyList->surveyCompilationCollectForms))
                                                                    @foreach ($surveyList->surveyCompilationCollectForms as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            {{ $item->id == $perennialCropData->farmer_id ? 'selected' : '' }}>
                                                                            {{ $item->farmers_name }}</option>
                                                                    @endforeach
                                                                @endif

                                                            </select>

                                                        </div>



                                                        <div class="form-group row">
                                                            <label for="total_fruity_trees_in_garden"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>চলতি বছরে
                                                                    বাগানে ফলবান গাছের সংখ্যা: </b><span
                                                                    class="text-danger">*</span></label>

                                                            <input class="form-control total_fruity_trees" type="text"
                                                                placeholder="" id="total_fruity_trees_in_garden"
                                                                name="total_fruity_trees_in_garden" value="{{ $perennialCropData->total_fruity_trees_in_garden }}" required />

                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="total_fruity_scattered_trees"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>চলতি বছরে
                                                                    ফলবান বিক্ষিপ্ত গাছের সংখ্যা: </b><span
                                                                    class="text-danger">*</span></label>

                                                            <input class="form-control total_fruity_trees" type="text"
                                                                placeholder="" id="total_fruity_scattered_trees"
                                                                name="total_fruity_scattered_trees" value="{{ $perennialCropData->last_total_fruity_trees_in_garden }}" required />

                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="land_amount_under_the_fruitly_trees"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>চলতি বছরে
                                                                    ফলবান গাছের অধীনে জমির আয়তন (একর): </b><span
                                                                    class="text-danger">*</span></label>

                                                            <input class="form-control total_land_amount_under_the_trees"
                                                                type="text" placeholder="একর"
                                                                id="land_amount_under_the_fruitly_trees"
                                                                name="land_amount_under_the_fruitly_trees" required />

                                                        </div>




                                                        <div class="form-group row">
                                                            <label for="total_fruity_trees"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>চলতি বছরে
                                                                    মোট ফলবান গাছের সংখ্যা: </b></label>

                                                            <input class="form-control average_yield_per_tree" type="text"
                                                                id="total_fruity_trees" name="total_fruity_trees"
                                                                readonly />

                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="total_production"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>চলতি বছরে
                                                                    মোট উৎপাদন (মেট্রিক টন): </b><span
                                                                    class="text-danger">*</span></label>

                                                            <input class="form-control average_yield_per_tree" type="text"
                                                                placeholder="Enter Current Yeart Total Production"
                                                                id="total_production" name="total_production" required />

                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="total_fruitless_trees"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>মোট ফলবিহীন
                                                                    গাছের সংখ্যা: </b><span
                                                                    class="text-danger">*</span></label>

                                                            <input class="form-control" type="text" placeholder=""
                                                                id="total_fruitless_trees" name="total_fruitless_trees"
                                                                required />

                                                        </div>


                                                        <div class="form-group row">
                                                            <label for="land_amount_under_the_fruitless_trees"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>চলতি বছরে
                                                                    ফলবিহীন গাছের অধীন জমির আয়তন (একর): </b><span
                                                                    class="text-danger">*</span></label>

                                                            <input class="form-control total_land_amount_under_the_trees"
                                                                type="text" placeholder="একর"
                                                                id="land_amount_under_the_fruitless_trees"
                                                                name="land_amount_under_the_fruitless_trees"  required />

                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="total_land_amount_under_the_trees"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>চলতি বছরে
                                                                    মোট গাছের অধীন জমির আয়তন (একর): </b></label>

                                                            <input class="form-control" type="text"
                                                                id="total_land_amount_under_the_trees"
                                                                name="total_land_amount_under_the_trees" readonly />

                                                        </div>


                                                    </div>

                                                    <div class="col-md-6"
                                                        style="padding-left: 35px; padding-right:35px;">


                                                        <div class="form-group row">
                                                            <label for="farmers_mobile"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>মোবাইল
                                                                    নম্বর: </b></label>

                                                            <input class="form-control" type="text" id="farmers_mobile"
                                                                name="farmers_mobile" value="{{ $perennialCropData->farmer->farmers_mobile }}"/>

                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="last_total_fruity_trees_in_garden"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>গত বছরে
                                                                    বাগানে ফলবান গাছের সংখ্যা: </b><span
                                                                    class="text-danger">*</span></label>

                                                            <input class="form-control last_total_fruity_trees" type="text"
                                                                placeholder="" id="last_total_fruity_trees_in_garden"
                                                                name="last_total_fruity_trees_in_garden" required />

                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="last_total_fruity_scattered_trees"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>গত বছরে
                                                                    ফলবান বিক্ষিপ্ত গাছের সংখ্যা: </b><span
                                                                    class="text-danger">*</span></label>

                                                            <input class="form-control last_total_fruity_trees" type="text"
                                                                placeholder="" id="last_total_fruity_scattered_trees"
                                                                name="last_total_fruity_scattered_trees" required />

                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="last_land_amount_under_the_fruitly_trees"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>গত বছরে
                                                                    ফলবান গাছের অধীনে জমির আয়তন (একর): </b><span
                                                                    class="text-danger">*</span></label>

                                                            <input
                                                                class="form-control last_total_land_amount_under_the_trees"
                                                                type="text" placeholder="একর"
                                                                id="last_land_amount_under_the_fruitly_trees"
                                                                name="last_land_amount_under_the_fruitly_trees" required />

                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="last_total_fruity_trees"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>গত বছরে মোট
                                                                    ফলবান গাছের সংখ্যা: </b></label>

                                                            <input class="form-control" type="text"
                                                                id="last_total_fruity_trees" name="last_total_fruity_trees"
                                                                readonly />

                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="last_total_production"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>গত বছরে মোট
                                                                    উৎপাদন (মেট্রিক টন): </b><span
                                                                    class="text-danger">*</span></label>

                                                            <input class="form-control" type="text"
                                                                placeholder="Enter last Year Total Production"
                                                                id="last_total_production" name="last_total_production"
                                                                required />

                                                        </div>



                                                        <div class="form-group row">
                                                            <label for="average_yield_per_tree"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>গাছ প্রতি
                                                                    গড় ফলন (কেজি):</b></label>

                                                            <input class="form-control" type="text"
                                                                id="average_yield_per_tree" name="average_yield_per_tree"
                                                                readonly />

                                                        </div>


                                                        <div class="form-group row">
                                                            <label for="last_land_amount_under_the_fruitless_trees"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>গত বছরে
                                                                    ফলবিহীন গাছের অধীন জমির আয়তন (একর): </b><span
                                                                    class="text-danger">*</span></label>

                                                            <input
                                                                class="form-control last_total_land_amount_under_the_trees"
                                                                type="text" placeholder="একর"
                                                                id="last_land_amount_under_the_fruitless_trees"
                                                                name="last_land_amount_under_the_fruitless_trees"
                                                                required />

                                                        </div>



                                                        <div class="form-group row">
                                                            <label for="last_total_land_amount_under_the_trees"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>গত বছরে মোট
                                                                    গাছের অধীন জমির আয়তন (একর): </b></label>

                                                            <input class="form-control" type="text"
                                                                id="last_total_land_amount_under_the_trees"
                                                                name="last_total_land_amount_under_the_trees" readonly />

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

            let last_total_fruity_trees = Number(last_total_fruity_trees_in_garden) + Number(
                last_total_fruity_scattered_trees);

            if (last_total_fruity_trees_in_garden != '' && last_total_fruity_scattered_trees != '') {
                $('#last_total_fruity_trees').val(last_total_fruity_trees);
            }
        });

        $('.total_land_amount_under_the_trees').on('keyup', function() {
            let land_amount_under_the_fruitless_trees = $('#land_amount_under_the_fruitless_trees').val();
            let land_amount_under_the_fruitly_trees = $('#land_amount_under_the_fruitly_trees').val();

            let total_land_amount_under_the_trees = Number(land_amount_under_the_fruitless_trees) + Number(
                land_amount_under_the_fruitly_trees);

            if (land_amount_under_the_fruitless_trees != '' && land_amount_under_the_fruitly_trees != '') {
                $('#total_land_amount_under_the_trees').val(total_land_amount_under_the_trees);
            }
        });

        $('.last_total_land_amount_under_the_trees').on('keyup', function() {
            let last_land_amount_under_the_fruitly_trees = $('#last_land_amount_under_the_fruitly_trees').val();
            let last_land_amount_under_the_fruitless_trees = $('#last_land_amount_under_the_fruitless_trees').val();

            let last_total_land_amount_under_the_trees = Number(last_land_amount_under_the_fruitly_trees) + Number(
                last_land_amount_under_the_fruitless_trees);

            if (last_land_amount_under_the_fruitly_trees != '' && last_land_amount_under_the_fruitless_trees !=
                '') {
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
