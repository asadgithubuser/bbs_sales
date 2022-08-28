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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">সংশোধন কৃষক তালিকা ফরম (সংকলন ফরম -১)</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">ড্যাশবোর্ড</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a class="text-muted">সংশোধন কৃষক তালিকা ফরম (সংকলন ফরম -১)</a>
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
                                <h3 class="card-title">কৃষক {{ $farmerData->farmers_name }} এর তথ্য সংশোধন</h3>
                            </div>


                            <form action="{{ route('admin.farmersForm.update', $farmerData->id) }}" method="post">
                                @csrf
                                {{-- @method("put") --}}

                                <div class="card-body">
                                    {{-- hidden fields --}}
                                    {{-- @if (!empty($processList)) --}}
                                    {{-- <input type="hidden" name="survey_process_list_id" value="{{$processListId}}" /> --}}
                                    {{-- <input type="hidden" name="survey_notification_id" value="{{$processList->survey_notification_id}}" /> --}}
                                    <input type="hidden" name="division_id"
                                        value="{{ $farmerData->division ? $farmerData->division->name_en : '' }}" />
                                    <input type="hidden" name="district_id"
                                        value="{{ $farmerData->district ? $farmerData->district->name_en : '' }}" />
                                    <input type="hidden" name="upazila_id"
                                        value="{{ $farmerData->upazila ? $farmerData->upazila->name_en : '' }}" />
                                    <input type="hidden" name="union_id"
                                        value="{{ $farmerData->union ? $farmerData->union->name_en : '' }}" />
                                    <input type="hidden" name="mouza_id"
                                        value="{{ $farmerData->mouza ? $farmerData->mouza->name_en : '' }}" />
                                    {{-- @endif --}}
                                    <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                        <h3 style="color:#ffffff;">সংকলন ফরম -১</h3>
                                    </div>
                                    <div class="card p-3" style="text-align: center;font-size: 1.2em; font-weight: bold;">

                                        <p><b>মৌজা: @isset($farmerData)
                                                    {{ $farmerData->union ? $farmerData->union->name_en : '' }}
                                                @endisset
                                            </b>
                                            <br>
                                            <b>ইউনিয়ন: @isset($farmerData)
                                                    {{ $farmerData->mouza ? $farmerData->mouza->name_en : '' }}
                                                @endisset
                                            </b>
                                        </p>
                                    </div>
                                    <div class="card">
                                        <div class="card-body w3-light-gray">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12"
                                                    style="padding-left: 30px; padding-right:30px;">

                                                    <div class="form-group row" style="display:none;">
                                                        <label for="union_id" class="col-3 col-form-label"><b>ইউনিয়ন:
                                                            </b></label>
                                                        <div class="col-9">
                                                            <div class="form-group">
                                                                <input id="union_id" class="form-control" type="hidden"
                                                                    @isset($farmerData) value="{{ $farmerData->union ? $farmerData->union->name_en : '' }}" @endisset
                                                                    readonly />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row" style="display:none;">
                                                        <label for="mouza_id" class="col-3 col-form-label"><b>মৌজা:
                                                            </b></label>
                                                        <div class="col-9">
                                                            <div class="form-group">
                                                                <input id="mouza_id" class="form-control" type="hidden"
                                                                    @isset($farmerData) value="{{ $farmerData->mouza ? $farmerData->mouza->name_en : '' }}" @endisset
                                                                    readonly />

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row" style="display: none;">
                                                        <label for="cluster_type"
                                                            style="font-size: 1.2em; font-weight: bold;"><b>দাগগুচ্ছের
                                                                অবস্থান: </b><span class="text-danger">*</span></label>
                                                        <select class="form-control" name="cluster_type" id="cluster_type"
                                                            required>
                                                            <option>--দাগগুচ্ছ স্থিতি নির্বাচন করুন--</option>
                                                            <option value="1">দাগগুচ্ছের ভিতরে</option>
                                                            <option value="2">দাগগুচ্ছের ভিতরে বাইরে</option>
                                                        </select>

                                                    </div>

                                                    <div class="form-group row" id="cluster_no" style="display: none">
                                                        <label for="cluster_id"
                                                            style="font-size: 1.2em; font-weight: bold;"><b>দাগগুচ্ছের নাম:
                                                            </b><span class="text-danger">*</span></label>
                                                        <select id="cluster_id" class="form-control" name="cluster_id">

                                                            @foreach ($clusters as $cluster)
                                                                <option @if ($cluster->id == $farmerData->cluster_id) selected @endif
                                                                    value="{{ $cluster->id }}">{{ $cluster->name_en }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>

                                                    <div class="form-group row" style="display:none;">
                                                        {{-- <label for="year" class="col-3 col-form-label"><b>Year: </b></label> --}}
                                                        <div class="col-9">
                                                            <input id="year" class="form-control" type="hidden"
                                                                name="year"
                                                                value="{{ date('Y') - 1 }}-{{ date('y') }}"
                                                                readonly />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row" style="display:none;">
                                                        {{-- <label for="start_date" class="col-3 col-form-label"><b>Start Date: </b></label> --}}
                                                        <div class="col-9">
                                                            @if (empty($surveyNotification))
                                                                <input id="start_date" class="form-control" type="hidden"
                                                                    name="start_date" readonly />
                                                            @else
                                                                <input id="start_date" class="form-control"
                                                                    type="hidden" name="start_date"
                                                                    value="{{ $surveyNotification->notification_start_data_field }}"
                                                                    readonly />
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row" style="display:none;">
                                                        {{-- <label for="end_date" class="col-3 col-form-label"><b>End Date: </b></label> --}}
                                                        <div class="col-9">
                                                            @if (empty($surveyNotification))
                                                                <input id="end_date" class="form-control" type="hidden"
                                                                    name="end_date" readonly />
                                                            @else
                                                                <input id="end_date" class="form-control" type="hidden"
                                                                    name="end_date"
                                                                    value="{{ $surveyNotification->notification_end_data_field }}"
                                                                    readonly />
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="food_type"
                                                            style="font-size: 1.2em; font-weight: bold;"><b>খানার প্রকার:
                                                            </b><span class="text-danger">*</span></label>
                                                        <select id="food_type" name="food_type" id="food_type"
                                                            class="form-control" required>

                                                            <option @if ($farmerData->food_type == 2) selected @endif
                                                                value="2" selected>অকৃষি</option>
                                                            <option @if ($farmerData->food_type == 1) selected @endif
                                                                value="1">কৃষি</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="farmers_mobile"
                                                            style="font-size: 1.2em; font-weight: bold;"><b>মোবাইল নাম্বার:
                                                            </b></label>

                                                        <input id="farmers_mobile" name="farmers_mobile"
                                                            class="form-control" type="number"
                                                            @isset($farmerData) value="{{ $farmerData->farmers_mobile }}" @endisset />

                                                    </div>



                                                    <div class="form-group row">
                                                        <label for="farmers_name"
                                                            style="font-size: 1.2em; font-weight: bold;"><b>খানা প্রধানের
                                                                নাম: </b><span class="text-danger">*</span></label>

                                                        <input name="farmers_name" class="form-control" type="text"
                                                            value="{{ $farmerData->farmers_name }}" required />

                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="farmers_mobile"
                                                            style="font-size: 1.2em; font-weight: bold;"><b>মোবাইল নাম্বার:
                                                            </b></label>

                                                        <input name="farmers_mobile" class="form-control" type="number"
                                                            value="{{ $farmerData->farmers_mobile }}" />

                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="permanent_crop_ids"
                                                            style="font-size: 1.5em; font-weight: bold;"><b>স্থায়ী ফসল:
                                                            </b></label>
                                                        {{-- <div class="col-9"> --}}
                                                        {{-- <div class="form-group"> --}}
                                                        <select name="permanent_crop_ids[]" id="permanent_crop_ids"
                                                            class="form-control select-multiple-additional" multiple>

                                                            @foreach ($croplist as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ in_array($item->id, $permanent_crops) ? 'selected' : '' }}>
                                                                    {{ $item->name_en }}</option>
                                                            @endforeach

                                                        </select>
                                                        {{-- </div> --}}
                                                        {{-- </div> --}}
                                                    </div>

                                                </div>

                                                <div class="col-md-6 col-sm-12"
                                                    style="padding-left: 30px; padding-right:30px;">



                                                    <div class="form-group row">
                                                        <label for="farmers_name"
                                                            style="font-size: 1.2em; font-weight: bold;"><b>খানা প্রধানের
                                                                নাম: </b><span class="text-danger">*</span></label>

                                                        <input id="farmers_name" name="farmers_name" class="form-control"
                                                            type="text"
                                                            @isset($farmerData) value="{{ $farmerData->farmers_name }}" @endisset
                                                            required />

                                                    </div>


                                                    <div class="form-group row" id="land_amount_field">
                                                        <label for="farmers_class_division_type"
                                                            style="font-size: 1.2em; font-weight: bold;"><b>কৃষকের শ্রেণি
                                                                বিভাগ: </b><span class="text-danger">*</span></label>

                                                        <select id="farmers_class_division_type"
                                                            name="farmers_class_division_type"
                                                            class="form-control form-control-lg" required>
                                                            {{-- <option value="">--চাষকৃত জমির পরিমাণ--</option> --}}
                                                            <option @if ($farmerData->farmers_class_division_type == 1) selected @endif
                                                                value="1">ক্ষুদ্র কৃষক(০.৫-২.৪৯ একর)</option>
                                                            <option @if ($farmerData->farmers_class_division_type == 2) selected @endif
                                                                value="2">মাঝারি কৃষক(২.৫০-৭.৪৯ একর)</option>
                                                            <option @if ($farmerData->farmers_class_division_type == 3) selected @endif
                                                                value="3">বড় কৃষক(৭.৫০ তদূর্ধ্ব একর জমি)</option>
                                                        </select>

                                                    </div>

                                                    <div class="form-group row" id="land_amount_field_1">
                                                        <label for="land_amount"
                                                            style="font-size: 1.2em; font-weight: bold;"><b>জমির আয়তন:
                                                            </b><span class="text-danger">*</span></label>

                                                        <input id="land_amount" name="land_amount" class="form-control"
                                                            @isset($farmerData) value="{{ $farmerData->land_amount }}" @endisset
                                                            type="text" placeholder="জমির আয়তন" required />

                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="father_name"
                                                            style="font-size: 1.5em; font-weight: bold;"><b>খানা প্রধানের
                                                                পিতা/স্বামীর নাম: </b><span
                                                                class="text-danger">*</span></label>

                                                        <input name="father_name" class="form-control" type="text"
                                                            value="{{ $farmerData->father_name }}" required />

                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="village_name"
                                                            style="font-size: 1.5em; font-weight: bold;"><b>গ্রামের নাম:
                                                            </b><span class="text-danger">*</span></label>

                                                        <input name="village_name" class="form-control" type="text"
                                                            value="{{ $farmerData->village_name }}" required />

                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="temporary_crop_ids"
                                                            style="font-size: 1.5em; font-weight: bold;"><b>অস্থায়ী ফসল:
                                                            </b></label>

                                                        <select name="temporary_crop_ids[]" id="temporary_crop_ids"
                                                            class="form-control select-multiple-additional" multiple>

                                                            @foreach ($croplist as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ in_array($item->id, $temporary_crops) ? 'selected' : '' }}>
                                                                    {{ $item->name_en }}</option>
                                                            @endforeach

                                                        </select>

                                                    </div>

                                                    <input id="farmers_class_division_type_val"
                                                        name="farmers_class_division_type" class="form-control"
                                                        type="hidden" value=""/>


                                                    {{-- <div class="form-group row">
                                                        <label for="sample_farmer_no" class="col-3 col-form-label"><b>Sample Farmer No.</b></label>
                                                        <div class="col-9">
                                                            <input id="sample_farmer_no" name="sample_farmer_no" class="form-control" type="text" placeholder="Sample Farmer No" required/>	
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>

                                            {{-- <div class="form-group row">
                                                <label for="district_id" class="col-3 col-form-label"><b>District Name: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="district_id" name="district_id" class="form-control" type="hidden" value="{{ $farmerData->district ? $farmerData->district->name_en : '' }}" disabled/>
                                                     </div>
                                                </div>
                                            </div> --}}
                                            <input id="district_id" name="district_id" class="form-control"
                                                type="hidden"
                                                value="{{ $farmerData->district ? $farmerData->district->name_en : '' }}"
                                                disabled />
                                            <input id="upazila_id" name="upazila_id" class="form-control" type="hidden"
                                                value="{{ $farmerData->upazila ? $farmerData->upazila->name_en : '' }}"
                                                disabled />
                                            <input id="union_id" name="union_id" class="form-control" type="hidden"
                                                value="{{ $farmerData->union ? $farmerData->union->name_en : '' }}"
                                                disabled />
                                            @if ($farmerData->mouza)
                                                <input id="mouza_id" name="mouza_id" class="form-control"
                                                    type="hidden"
                                                    value="{{ $farmerData->mouza ? $farmerData->mouza->name_en : '' }}"
                                                    disabled />
                                            @endif
                                            <input id="cluster_id" name="cluster_id" class="form-control" type="hidden"
                                                value="{{ $farmerData->cluster ? $farmerData->cluster->name_en : '' }}"
                                                disabled />

                                            {{-- <div class="form-group row">
                                                <label for="upazila_id" disabled class="col-3 col-form-label"><b>Upazila Name: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="upazila_id" name="upazila_id" class="form-control" type="hidden" value="{{ $farmerData->upazila ? $farmerData->upazila->name_en : '' }}" disabled/>
                                                     </div>
                                                </div>
                                            </div> --}}

                                            {{-- <div class="form-group row">
                                                <label for="union_id" class="col-3 col-form-label"><b>Union Name: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="union_id" name="union_id" class="form-control" type="text" value="{{ $farmerData->union ? $farmerData->union->name_en : '' }}" disabled/>
                                                     </div>
                                                </div>
                                            </div> --}}

                                            {{-- @if ($farmerData->mouza)
                                                <div class="form-group row">
                                                    <label for="mouza_id" class="col-3 col-form-label"><b>Mouza Name: </b></label>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <input id="mouza_id" name="mouza_id" class="form-control" type="text" value="{{ $farmerData->mouza ? $farmerData->mouza->name_en : '' }}" disabled/>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="form-group row" id="cluster_no">
                                                <label for="cluster_id" disabled class="col-3 col-form-label"><b>Cluster Name: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="cluster_id" name="cluster_id" class="form-control" type="text" value="{{ $farmerData->cluster ? $farmerData->cluster->name_en : '' }}" disabled/>
                                                     </div>
                                                </div>
                                            </div> --}}

                                        </div>


                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-right"
                                            style="padding-left: 35px; padding-right:35px; ">
                                            <button type="submit" class="btn btn-primary font-weight-bold">হালনাগাদ
                                                করুন</button>
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
        $('#land_amount').on('keyup', function() {

            var land_size = $("#land_amount").val();

            if (land_size <= 2.49) {
                $("#farmers_class_division_type").val('Small Farmer');
                $("#farmers_class_division_type_val").val(1);
            } else if (land_size >= 2.50 && land_size <= 7.49) {
                $("#farmers_class_division_type").val('Medium Farmer');
                $("#farmers_class_division_type_val").val(2);
            } else {
                $("#farmers_class_division_type").val('Big Farmer');
                $("#farmers_class_division_type_val").val(3);
            }
        });
    </script>
    <script type="text/javascript">
        $(window).on('load', function() {
            var food_type = $("#food_type").val();
            // alert(food_type);
            if (food_type == 1) {
                $('#land_amount_field').show();
                $('#land_amount').attr('required', 'required');
            } else if(food_type == 2) {
                $('#land_amount_field').hide();
                $('#land_amount_field_1').hide();
                // $('#land_amount_field').hide();
                $('#land_amount').removeAttr('required');
            }
        })
    </script>
@endpush
