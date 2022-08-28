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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">
                            {{ $surveyNotification->is_published == false ? 'Add New' : 'Edit' }} Survey Notification</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">Dashboard</a>
                            </li>
                            @can('all_survey')
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.surveyNotification.index') }}" class="text-muted">Manage
                                        Survey
                                        Notification </a>
                                </li>
                            @endcan

                            <li class="breadcrumb-item active">
                                <a class="text-muted">{{ $surveyNotification->is_published == false ? 'Add New' : 'Edit' }}
                                    Survey Notification </a>
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
                                <h3 class="card-title">
                                    {{ $surveyNotification->is_published == false ? 'Add' : 'Edit' }} Survey Notification
                                </h3>
                            </div>

                            <!--begin::Form-->
                            <form class="form"
                                action="{{ route('admin.surveyNotification.update', $surveyNotification) }}" method="post"
                                id="kt_form_1">
                                @csrf

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header p-5 w3-teal"
                                                    style="border-bottom: 1px solid #ffffff;">
                                                    <h4 class="card-title mb-0">Basic Information For Notification</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-form-label text-right col-lg-4 col-sm-12">Select
                                                                    Type: <span class="text-danger">*</span></label>
                                                                <div class="radio-inline">
                                                                    <label class="radio">
                                                                        <input type="radio" id="survey_for"
                                                                            {{ $surveyNotification->survey_for == 'survey_for' ? 'checked' : '' }}
                                                                            name="survey_for" value="all">
                                                                        <span></span>All</label>
                                                                    <label class="radio">
                                                                        <input type="radio" id="survey_for"
                                                                            {{ $surveyNotification->survey_for == 'specific' ? 'checked' : '' }}
                                                                            name="survey_for" value="specific">
                                                                        <span></span>Specific Area
                                                                </div>
                                                            </div>

                                                            <div id="surveyLocation">
                                                                <div class="form-group row" id="division"
                                                                    style="display: none;">
                                                                    <label
                                                                        class="col-form-label text-right col-lg-4 col-sm-12">Division:</label>
                                                                    <div class="col-lg-5 col-sm-12">
                                                                        <select
                                                                            class="form-control select-multiple surveyDivision_id"
                                                                            name="division_id[]" id="division_id_tah"
                                                                            multiple>
                                                                            @if ($surveyNotification->division_id)
                                                                                <option
                                                                                    value="{{ $surveyNotification->division_id }}">
                                                                                    {{ $surveyNotification->division ? $surveyNotification->division->name_en : '' }}
                                                                                </option>
                                                                            @endif
                                                                            @foreach ($divisions as $division)
                                                                                <option value="{{ $division->id }}">
                                                                                    {{ $division->name_en }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row" id="district"
                                                                    style="display: none;">
                                                                    <label
                                                                        class="col-form-label text-right col-lg-4 col-sm-12">District:</label>
                                                                    <div class="col-lg-5 col-sm-12">
                                                                        <select class="form-control select-multiple"
                                                                            name="district_id[]" id="district_id_tah"
                                                                            multiple>
                                                                            @if ($surveyNotification->district_id)
                                                                                <option
                                                                                    value="{{ $surveyNotification->district_id }}">
                                                                                    {{ $surveyNotification->district ? $surveyNotification->district->name_en : '' }}
                                                                                </option>
                                                                            @endif
                                                                            <option value="">--Select Division First--</option>
                                                                        </select>
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row" id="upazila"
                                                                    style="display: none;">
                                                                    <label
                                                                        class="col-form-label text-right col-lg-4 col-sm-12">Upazila:</label>
                                                                    <div class="col-lg-5 col-sm-12">
                                                                        <select class="form-control select-multiple"
                                                                            name="upazila_id[]" id="upazila_id_tah"
                                                                            multiple>
                                                                            @if ($surveyNotification->upazila_id)
                                                                                <option
                                                                                    value="{{ $surveyNotification->upazila_id }}">
                                                                                    {{ $surveyNotification->upazila ? $surveyNotification->upazila->name_en : '' }}
                                                                                </option>
                                                                            @endif
                                                                            <option value="">--Select District First--</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-form-label text-right col-lg-4 col-sm-12">Form
                                                                    Name: <span class="text-danger">*</span></label>
                                                                <div class="col-lg-5 col-sm-12">
                                                                    <select name="survey_form_id" id="survey_form_id"
                                                                        onchange="formCheck()" class="form-control"
                                                                        required>
                                                                        @if ($surveyNotification->is_published == false)
                                                                            <option value="">--Select One--</option>
                                                                        @elseif($surveyNotification->is_published == true)
                                                                            <option
                                                                                value="{{ $surveyNotification->survey_form_id }}">
                                                                                {{ $surveyNotification->surveyForm ? $surveyNotification->surveyForm->display_name : '' }}
                                                                            </option>
                                                                        @endif

                                                                        @foreach ($surveyForms as $form)
                                                                            <option value="{{ $form->id }}">
                                                                                {{ ucfirst($form->display_name) }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>

                                                                </div>
                                                            </div>

                                                            <div class="form-group row" id="survey_episode_block">
                                                                <label for="survey_episode" class="col-form-label text-right col-lg-4 col-sm-12">Collection Phase: <span class="text-danger">*</span></label>
                                                                <div class="col-lg-5 col-sm-12">
                                                                    <select name="survey_episode" id="survey_episode" class="select2 form-control">
                                                                        <option value="">--Select Collection No.--</option>
                                                                        <option value="1">1st Phase (January to March)</option>
                                                                        <option value="2">2nd Phase (April to June)</option>
                                                                        <option value="3">3rd Phase (July to September)</option>
                                                                        <option value="4">4th Phase (October to December)</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row" id="crop_id1">
                                                                <label
                                                                    class="col-form-label text-right col-lg-4 col-sm-12">Crop
                                                                    Name:</label>
                                                                    <div class="col-lg-5 col-sm-12">
                                                                        <select name="crop_id" id="crop_id" class="form-control" required>
                                                                            <option value="">--Select Form First--</option>
                                                                        </select>

                                                                    </div>
                                                            </div>

                                                            <div class="form-group row" id="crop_type_div">
                                                                <label
                                                                    class="col-form-label text-right col-lg-4 col-sm-12">Crop
                                                                    Type:</label>
                                                                <div class="col-lg-5 col-sm-12">
                                                                    <select name="crop_type" id="crop_type"
                                                                        class="form-control" id="crop_type" required>

                                                                        <option value="">--Select Crop First--</option>

                                                                    </select>

                                                                </div>
                                                            </div>

                                                            {{-- <div class="form-group row" id="scopeOfActionDiv">
                                                                <label
                                                                    class="col-form-label text-right col-lg-4 col-sm-12">Scope
                                                                    Of Action Number: <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="col-lg-5 col-sm-12">
                                                                    <input type="text" class="form-control"
                                                                        id="scopeOfAction" name="scope_of_action_number"
                                                                        placeholder="Enter Scope Of Action Number"
                                                                        value="{{ $surveyNotification ? $surveyNotification->scope_of_action_number : old('scope_of_action_number') }}"
                                                                        required />
                                                                </div>
                                                            </div> --}}

                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-form-label text-right col-lg-4 col-sm-12">Start
                                                                    Date Of Collection: <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="col-lg-5 col-sm-12">
                                                                    <input placeholder="{{ date('d-M-Y') }}"
                                                                        autocomplete="off" class="form-control datepicker"
                                                                        name="start_date_of_collection"
                                                                        value="{{ $surveyNotification ? $surveyNotification->start_date_of_collection : old('start_date_of_collection') }}"
                                                                        required />
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-form-label text-right col-lg-4 col-sm-12">End
                                                                    Date Of Collection: <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="col-lg-5 col-sm-12">
                                                                    <input placeholder="{{ date('d-M-Y') }}"
                                                                        class="form-control datepicker"
                                                                        name="end_date_of_collection" autocomplete="off"
                                                                        value="{{ $surveyNotification ? $surveyNotification->end_date_of_collection : old('end_date_of_collection') }}"
                                                                        required />
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-form-label text-right col-lg-4 col-sm-12"></label>

                                                                <div class="radio-inline col-lg-5 col-sm-12">
                                                                    <label class="radio radio-square">
                                                                        <input type="checkbox" name="status"
                                                                            {{ $surveyNotification->status == true ? 'checked' : '' }}>
                                                                        <span></span>
                                                                        Active
                                                                    </label>

                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header p-5 w3-indigo"
                                                    style="border-bottom: 1px solid #ffffff;">
                                                    <h4 class="card-title mb-0">Notification Schedule Setting</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label>Start Date For Head Office: <span
                                                                    class="text-danger">*</span></label>
                                                            <input autocomplete="off" placeholder="{{ date('d-M-Y') }}"
                                                                class="form-control datepicker"
                                                                name="notification_start_data_head_office"
                                                                value="{{ $surveyNotification? $surveyNotification->notification_start_data_head_office: old('notification_start_data_head_office') }}"
                                                                required>
                                                            <span class="form-text text-muted">Please Enter Start Date For
                                                                Head Office</span>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>End Date For Head Office: <span
                                                                    class="text-danger">*</span></label>
                                                            <input autocomplete="off" placeholder="{{ date('d-M-Y') }}"
                                                                class="form-control datepicker"
                                                                name="notification_end_data_head_office"
                                                                value="{{ $surveyNotification? $surveyNotification->notification_end_data_head_office: old('notification_end_data_head_office') }}">
                                                            <span class="form-text text-muted">Please Enter End Date For
                                                                Head Office</span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">

                                                        <div class="col-lg-6">
                                                            <label>Start Date For Division:<span
                                                                    class="text-danger">*</span></label>
                                                            <input autocomplete="off" placeholder="{{ date('d-M-Y') }}"
                                                                class="form-control datepicker"
                                                                name="notification_start_data_division"
                                                                value="{{ $surveyNotification? $surveyNotification->notification_start_data_division: old('notification_start_data_division') }}"
                                                                required>
                                                            <span class="form-text text-muted">Please Enter Start Date For
                                                                Division</span>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>End Date For Division:<span
                                                                    class="text-danger">*</span></label>
                                                            <input autocomplete="off" placeholder="{{ date('d-M-Y') }}"
                                                                class="form-control datepicker"
                                                                name="notification_end_data_division"
                                                                value="{{ $surveyNotification? $surveyNotification->notification_end_data_division: old('notification_end_data_division') }}">
                                                            <span class="form-text text-muted">Please Enter End Date For
                                                                Division</span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label>Start Date For District:<span
                                                                    class="text-danger">*</span></label>
                                                            <input autocomplete="off" placeholder="{{ date('d-M-Y') }}"
                                                                class="form-control datepicker"
                                                                name="notification_start_data_zila"
                                                                value="{{ $surveyNotification? $surveyNotification->notification_start_data_zila: old('notification_start_data_zila') }}"
                                                                required>
                                                            <span class="form-text text-muted">Please Enter Start Date For
                                                                District</span>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>End Date For District:<span
                                                                    class="text-danger">*</span></label>
                                                            <input autocomplete="off" placeholder="{{ date('d-M-Y') }}"
                                                                class="form-control datepicker"
                                                                name="notification_end_data_zila"
                                                                value="{{ $surveyNotification ? $surveyNotification->notification_end_data_zila : old('notification_end_data_zila') }}">
                                                            <span class="form-text text-muted">Please Enter End Date For
                                                                District</span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label>Start Date For Upazila:<span
                                                                    class="text-danger">*</span></label>
                                                            <input autocomplete="off" placeholder="{{ date('d-M-Y') }}"
                                                                class="form-control datepicker"
                                                                name="notification_start_data_upazila"
                                                                value="{{ $surveyNotification? $surveyNotification->notification_start_data_upazila: old('notification_start_data_upazila') }}"
                                                                required>
                                                            <span class="form-text text-muted">Please Enter Start Date For
                                                                Upazila</span>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>End Date For Upazila:<span
                                                                    class="text-danger">*</span></label>
                                                            <input autocomplete="off" placeholder="{{ date('d-M-Y') }}"
                                                                class="form-control datepicker"
                                                                name="notification_end_data_upazila"
                                                                value="{{ $surveyNotification? $surveyNotification->notification_end_data_upazila: old('notification_end_data_upazila') }}">
                                                            <span class="form-text text-muted">Please Enter End Date For
                                                                Upazila</span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label>Start Date For Field:<span
                                                                    class="text-danger">*</span></label>
                                                            <input autocomplete="off" placeholder="{{ date('d-M-Y') }}"
                                                                class="form-control datepicker"
                                                                name="notification_start_data_field"
                                                                value="{{ $surveyNotification? $surveyNotification->notification_start_data_field: old('notification_start_data_field') }}"
                                                                required>
                                                            <span class="form-text text-muted">Please Enter Start Date For
                                                                Field</span>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>End Date For Field:<span
                                                                    class="text-danger">*</span></label>
                                                            <input autocomplete="off" id="datepicker"
                                                                placeholder="{{ date('d-M-Y') }}"
                                                                class="form-control datepicker "
                                                                name="notification_end_data_field"
                                                                value="{{ $surveyNotification ? $surveyNotification->notification_end_data_field : old('notification_end_data_field') }}">

                                                            <span class="form-text text-muted">Please Enter End Date For
                                                                Field</span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-9"></div>
                                        <div class="col-lg-3 text-right">
                                            <button type="submit" class="btn btn-block btn-primary font-weight-bold"
                                                name="type"
                                                value="{{ $surveyNotification->is_published == 0 ? 'add' : 'edit' }}">{{ $surveyNotification->is_published == 0 ? 'Submit' : 'Update' }}</button>
                                        </div>


                                    </div>
                                </div>
                            </form>
                            <!--end::Form-->
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
        function formCheck() {
            let formId = document.getElementById('survey_form_id').value;

            if (formId == 1 || formId == 8 || formId == 13) {
                document.getElementById('crop_id1').style.display = "none";
                document.getElementById('crop_id').removeAttribute('required');
                document.getElementById('crop_type_div').style.display = "none";
                document.getElementById('crop_type').removeAttribute('required');
                document.getElementById('survey_episode_block').style.display = "none";
                document.getElementById('survey_episode').removeAttribute('required');
            } else if (formId == 2) {
                document.getElementById('crop_id1').style.display = "none";
                document.getElementById('crop_id').removeAttribute('required');
                document.getElementById('crop_type_div').style.display = "none";
                document.getElementById('crop_type').removeAttribute('required');
                // document.getElementById('scopeOfActionDiv').style.display = "none";
                // document.getElementById('scopeOfAction').removeAttribute('required');
                document.getElementById('survey_episode_block').style.display = "";
                document.getElementById('survey_episode').setAttribute('required', 'required');
            } else {
                document.getElementById('crop_id1').style.display = "";
                document.getElementById('crop_id').setAttribute('required', 'required');
                document.getElementById('crop_type_div').style.display = "";
                document.getElementById('crop_type').setAttribute('required', 'required');
                document.getElementById('survey_episode_block').style.display = "none";
                document.getElementById('survey_episode').removeAttribute('required');
            }

            var crop_list = $("#crop_id");

            $.ajax({
                type: 'POST',
                url: "{{route('crops')}}",
                data: {_token:$('input[name=_token]').val(),
                form_id: formId},

                success:function(response){
                    $('option', crop_list).remove();
                    $('#crop_id').append('<option value="">--Select Crop--</option>');
                    $.each(response, function(){
                        $('<option/>', {
                            'value': this.id,
                            'text': this.name_en.toUpperCase()
                        }).appendTo('#crop_id');
                    });
                }
            });
        }
    </script>
    <script>
        var type = '<?php echo $surveyNotification->survey_for; ?>'

        if (type == 'all') {
            document.getElementById('division').style.display = "none";
            document.getElementById('district').style.display = "none";
            document.getElementById('upazila').style.display = "none";
            document.getElementById('division_id_tah').removeAttribute('disabled');
            document.getElementById('district_id_tah').removeAttribute('disabled');
            document.getElementById('upazila_id_tah').removeAttribute('disabled');
        } else if (type == 'specific') {
            document.getElementById('division').style.display = "";
            document.getElementById('district').style.display = "";
            document.getElementById('upazila').style.display = "";
            document.getElementById('division_id_tah').setAttribute('required', 'required');
            document.getElementById('district_id_tah').setAttribute('required', 'required');
            document.getElementById('upazila_id_tah').setAttribute('required', 'required');
        }
    </script>
    <script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'd-M-yyyy',
            autoclose: true,
            changeYear: true,
            changeMonth: true,
            maxDate: new Date(),
        }).datepicker("setDate", 'now');


        $('input[type=radio][name=survey_for]').change(function() {

            if (this.value == 'all') {

                document.getElementById('division').style.display = "none";
                document.getElementById('district').style.display = "none";
                document.getElementById('upazila').style.display = "none";
                document.getElementById('division_id_tah').removeAttribute('required', 'disabled');
                document.getElementById('district_id_tah').removeAttribute('required', 'disabled');
                document.getElementById('upazila_id_tah').removeAttribute('required', 'disabled');
            } else if (this.value == 'specific') {
                document.getElementById('division').style.display = "";
                document.getElementById('district').style.display = "";
                document.getElementById('upazila').style.display = "";
                document.getElementById('division_id_tah').setAttribute('required', 'required');
                document.getElementById('district_id_tah').setAttribute('required', 'required');
                document.getElementById('upazila_id_tah').setAttribute('required', 'required');
            }
        });
    </script>

{{-- Multi select location ajax --}}

    <script>
        // Get districts on division select
        $("#division_id_tah").on('change',function(e){
            e.preventDefault();
            var district_list = $("#district_id_tah");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{route('surveyNotificationGetDistricts')}}",
                data: {
                    _token:$('input[name=_token]').val(),
                    division_id: $(this).val()
                },
                success:function(response){
                    $('option', district_list).remove();
                    $('#district_id_tah').append('<option value="">--Select District/s--</option>');
                    $.each(response, function(){
                        $('<option/>', {
                            'value': this.id,
                            'text': this.name_en
                        }).appendTo('#district_id_tah');
                    });
                }
            });
        });

        // Get upazilas on district select
        $("#district_id_tah").on('change',function(e){
            e.preventDefault();
            var upazila_list = $("#upazila_id_tah");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{route('surveyNotificationGetUpazilas')}}",
                data: {
                    _token:$('input[name=_token]').val(),
                    district_id: $(this).val()
                },
                success:function(response){
                    $('option', upazila_list).remove();
                    $('#upazila_id_tah').append('<option value="">--Select Upazila/s--</option>');
                    $.each(response, function(){
                        $('<option/>', {
                            'value': this.id,
                            'text': this.name_en
                        }).appendTo('#upazila_id_tah');
                    });
                }
            });
        });
    </script>
@endpush
