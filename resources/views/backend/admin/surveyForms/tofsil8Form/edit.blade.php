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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">মাসিক কৃষি মজুরি হার জরিপ তফসিল (তফসিল-৮)</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">ড্যাশবোর্ড</a>
                            </li>

                            <li class="breadcrumb-item active">
                                <a class="text-muted">মাসিক কৃষি মজুরি হার জরিপ তফসিল (তফসিল-৮)</a>
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
                                    <h3 class="card-title">মাসিক কৃষি মজুরি হার জরিপ তফসিল (তফসিল-৮)</h3>

                                    <div class="card-toolbar">

                                    </div>
                                </div>
                                <!--begin::Form-->
                                <form action="{{ route('admin.surveyTofsilForm8.update', $tofsil8Data) }}" method="post">
                                    @csrf

                                    {{-- hidden fields --}}
                                    @if (!empty($processList))
                                        <input type="hidden" name="survey_process_list_id" value="{{ $processListId }}" />
                                        <input type="hidden" name="survey_notification_id"
                                            value="{{ $processList->survey_notification_id }}" />
                                        <input type="hidden" name="division_id" value="{{ $processList->division_id }}" />
                                        <input type="hidden" name="district_id" value="{{ $processList->district_id }}" />
                                        <input type="hidden" name="upazila_id" value="{{ $processList->upazila_id }}" />
                                        <input type="hidden" name="cluster_id"
                                            value="{{ $processList->bunch_stains_id }}" />
                                    @endif

                                    <div class="card-body">
                                        <div class="card">
                                            <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                                <h3 style="color:#ffffff;">তথ্য প্রদানকারীর বিবরণ</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6"
                                                        style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="farmer_id"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>চাষীর নাম :
                                                                </b><span class="text-danger">*</span></label>

                                                            <select class="select2 form-control form-control-lg"
                                                                id="farmer_id" name="farmer_id" required>
                                                                <option value="">--চাষীর নাম নির্বাচন করুন--</option>

                                                                @if (isset($surveyList->surveyTofsilForm1s))
                                                                    @foreach ($surveyList->clusterfarmers($processList->bunch_stains_id) as $item)
                                                                        <option value="{{ $item->id }}" {{ $item->id == $tofsil8Data->farmer_id ? 'selected' : '' }}>
                                                                            {{ $item->farmers_name }}</option>
                                                                    @endforeach
                                                                    <option {{ $tofsil8Data->farmers_name ? 'selected' : ''}}  value="other">other</option>
                                                                @endif
                                                            </select>
                                                            <input style="display:{{ $tofsil8Data->farmers_name ? '' : 'none'}} ;" class="form-control mt-3"
                                                                type="text" placeholder="চাষীর নাম" value="{{ $tofsil8Data->farmers_name }}" id="farmers_name"
                                                                name="farmers_name" />

                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="fathers_name"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>পিতার নাম:
                                                                </b><span class="text-danger">*</span></label>

                                                            <input class="form-control" type="text" placeholder=""
                                                                id="fathers_name" name="fathers_name" required
                                                                value="{{ $tofsil8Data->fathers_name }}" />

                                                        </div>


                                                        <div class="form-group row">
                                                            <label for="one_meal_male"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>এক বেলা
                                                                    খোরাকিসহ মজুরির পরিমান (পুরুষ): </b></label>

                                                            <input class="form-control" type="number" placeholder="টাকায়"
                                                                step="0.01" id="one_meal_male" name="one_meal_male"
                                                                value="{{ $tofsil8Data->one_meal_male }}" />

                                                        </div>


                                                        <div class="form-group row">
                                                            <label for="two_meal_male"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>দুই বেলা
                                                                    খোরাকিসহ মজুরির পরিমান (পুরুষ): </b></label>

                                                            <input class="form-control" type="number" placeholder="টাকায়"
                                                                step="0.01" id="two_meal_male" name="two_meal_male"
                                                                value="{{ $tofsil8Data->two_meal_male }}" />

                                                        </div>


                                                        <div class="form-group row">
                                                            <label for="three_meal_male"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>তিন বেলা
                                                                    খোরাকিসহ মজুরির পরিমান (পুরুষ): </b></label>

                                                            <input class="form-control" type="number" placeholder="টাকায়"
                                                                step="0.01" id="three_meal_male" name="three_meal_male"
                                                                value="{{ $tofsil8Data->three_meal_male }}" />

                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="without_meal_male"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>বিনা
                                                                    খোরাকিতে মজুরির পরিমান (পুরুষ): </b></label>

                                                            <input class="form-control" type="number" placeholder="টাকায়"
                                                                step="0.01" id="without_meal_male"
                                                                value="{{ $tofsil8Data->without_meal_male }}"
                                                                name="without_meal_male" />

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

                                                        <div class="form-group row">
                                                            <label for="farmers_mobile"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>চাষীর মোবাইল
                                                                    নম্বর: </b><span class="text-danger">*</span></label>

                                                            <input class="form-control" type="text" placeholder=""
                                                                id="farmers_mobile" name="farmers_mobile"
                                                                value="{{ $tofsil8Data->farmers_mobile }}" required />

                                                        </div>



                                                        <div class="form-group row">
                                                            <label for="one_meal_female"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>এক বেলা
                                                                    খোরাকিসহ মজুরির পরিমান (নারী): </b></label>

                                                            <input class="form-control" type="number" placeholder="টাকায়"
                                                                step="0.01" id="one_meal_female"
                                                                value="{{ $tofsil8Data->one_meal_female }}"
                                                                name="one_meal_female" />

                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="two_meal_female"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>দুই বেলা
                                                                    খোরাকিসহ মজুরির পরিমান (নারী): </b></label>

                                                            <input class="form-control" type="number" placeholder=""
                                                                step="0.01" id="two_meal_female"
                                                                value="{{ $tofsil8Data->two_meal_female }}"
                                                                name="two_meal_female" />

                                                        </div>


                                                        <div class="form-group row">
                                                            <label for="three_meal_female"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>তিন বেলা
                                                                    খোরাকিসহ মজুরির পরিমান (নারী): </b></label>

                                                            <input class="form-control" type="number" placeholder="টাকায়"
                                                                step="0.01" id="three_meal_female"
                                                                value="{{ $tofsil8Data->three_meal_female }}"
                                                                name="three_meal_female" />

                                                        </div>


                                                        <div class="form-group row">
                                                            <label for="without_meal_female"
                                                                style="font-size: 1.5em; font-weight: bold;"><b>বিনা
                                                                    খোরাকিতে মজুরির পরিমান (নারী): </b></label>

                                                            <input class="form-control" type="number" placeholder="টাকায়"
                                                                step="0.01" id="without_meal_female"
                                                                value="{{ $tofsil8Data->without_meal_female }}"
                                                                name="without_meal_female" />

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

        $('#farmer_id').on('change',function(){
            let farmerValue =$(this).val();
            if(farmerValue == 'other')
            {
                $('#farmers_name').show();
                $("#farmers_name").attr("required", 'required');
					

            }
            else if(farmerValue != 'other')
            {
                $('#farmers_name').hide();
                $("#farmers_name").removeAttr("required");
				$("#farmers_name").val("");

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

            let acreCalculate = (Number(current_year_land_producttion) / Number(current_year_land_amount)) *
            37.3242;

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
