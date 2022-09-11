@extends('backend.layout.master')

@push('css')
    <style>
        .table th,
        .table td {
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">ফসল কর্তন ও উৎপাদন জরিপ তফসিল (তফসিল-২)</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">ড্যাশবোর্ড</a>
                            </li>

                            <li class="breadcrumb-item active">
                                <a class="text-muted">ফসল কর্তন ও উৎপাদন জরিপ তফসিল (তফসিল-২)</a>
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
                                    <h3 class="card-title">ফসল কর্তন ও উৎপাদন জরিপ তফসিল তথ্য সংশোধন (তফসিল-২)</h3>

                                    <div class="card-toolbar">

                                    </div>
                                </div>
                                <!--begin::Form-->
                                <form action="{{ route('admin.cropCuttingProductionForm.update',$cropCuttingProductionData) }}" method="post">
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

                                    @if (isset($surveyNotification))
                                        <input type="hidden" id="crop_name"
                                            value="{{ $surveyNotification->crop ? $surveyNotification->crop->name_en : '' }}">
                                    @endif

                                    <div class="card-body">
                                        <div style="background-color: #134f1f;text-align:center; padding: 10px;">
                                            <h3 style="color:#ffffff;">সাধারণ তথ্য</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-md-6"
                                                        style="padding-left: 40px; padding-right:30px;">

                                                        <div class="form-group row">
                                                            <label for="crop_cutting_date"
                                                                style="font-size: 1.2em; font-weight: bold;"><b>ফসল কর্তনের
                                                                    তারিখ: </b><span class="text-danger">*</span></label>

                                                            <input class="form-control" type="date"
                                                                placeholder="Enter Crop Cutting Date"
                                                                value="{{ $cropCuttingProductionData->crop_cutting_date }}"
                                                                name="crop_cutting_date" id="crop_cutting_date" required />

                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="in_cluster"
                                                                style="font-size: 1.2em; font-weight: bold;"><b>মৌজা
                                                                    অবস্থান: </b><span
                                                                    class="text-danger">*</span></label>

                                                            <select class="select2 form-control form-control-lg"
                                                                id="in_cluster" name="in_cluster" required>
                                                                @if ($cropCuttingProductionData->in_cluster)
                                                                    @if ($cropCuttingProductionData->in_cluster == 1)
                                                                        <option value="1" selected>দাগগুচ্ছের ভিতরে</option>
                                                                        <option value="2">দাগগুচ্ছের বাইরে</option>
                                                                    @elseif($cropCuttingProductionData->in_cluster == 2)
                                                                        <option value="1">দাগগুচ্ছের ভিতরে</option>

                                                                        <option value="2" selected>দাগগুচ্ছের বাইরে</option>
                                                                    @endif
                                                                @else
                                                                    <option value="">--মৌজা অবস্থান নির্বাচন করুন--</option>
                                                                    <option value="1">দাগগুচ্ছের ভিতরে</option>
                                                                    <option value="2">দাগগুচ্ছের বাইরে</option>
                                                                @endif

                                                            </select>

                                                        </div>



                                                        <div class="form-group row">
                                                            <label for="land_segment_signal"
                                                                style="font-size: 1.2em; font-weight: bold;"><b> কর্তনকৃত
                                                                    ভূমি খন্ডের সংকেত নং: </b><span
                                                                    class="text-danger">*</span></label>

                                                            <input class="form-control" type="text"
                                                                placeholder="কর্তনকৃত ভূমি খন্ডের সংকেত নং লিখুন"
                                                                value="{{ $cropCuttingProductionData->land_segment_signal }}"
                                                                name="land_segment_signal" id="land_segment_signal"
                                                                required />

                                                        </div>
                                                    </div>



                                                    <div class="col-md-6"
                                                        style="padding-left: 30px; padding-right:40px;">

                                                        <div class="form-group row">
                                                            <label for="farmer_id"
                                                                style="font-size: 1.2em; font-weight: bold;"><b>বর্তমান ভূমি
                                                                    খন্ড ব্যাবহারকারী/চাষীর নাম: </b><span
                                                                    class="text-danger">*</span></label>

                                                            <select class="select2 form-control form-control-lg"
                                                                id="farmer_id" name="farmer_id" required>

                                                                @if ($cropCuttingProductionData->farmer_id)
                                                                    <option value="{{ $cropCuttingProductionData->farmer_id }}" selected>{{ $cropCuttingProductionData->farmer->farmers_name }}</option>
                                                                    @foreach ($farmers as $item)
                                                                        <option value="{{ $item->id }}">
                                                                            {{ $item->farmers_name }}</option>
                                                                    @endforeach  
                                                                @else 
                                                                    <option value="">--কৃষক নির্বাচন করুন--</option>

                                                                    @foreach ($farmers as $item)
                                                                        <option value="{{ $item->id }}">
                                                                            {{ $item->farmers_name }}</option>
                                                                    @endforeach  
                                                                @endif
                                                                

                                                            </select>

                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="crop_id"
                                                                style="font-size: 1.2em; font-weight: bold;"><b> ফসলের নাম:
                                                                </b><span class="text-danger">*</span></label>

                                                            @if (isset($surveyNotification))
                                                                @if ($surveyNotification->crop_id != '')
                                                                    <input type="hidden" id="crop_id" name="crop_id"
                                                                        value="{{ $surveyNotification->crop_id }}">
                                                                    <input type="text" class="form-control form-control-lg"
                                                                        value="{{ $surveyNotification->crop ? ucfirst($surveyNotification->crop->name_en) : '' }}"
                                                                        readonly>
                                                                @else
                                                                    <select class="select2 form-control form-control-lg"
                                                                        id="crop_id" name="crop_id" required>
                                                                        <option value="">--ফসল নির্বাচন করুন--</option>

                                                                        @foreach ($crops as $crop)
                                                                            <option value="{{ $crop->id }}">
                                                                                {{ ucfirst($crop->name_en) }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                @endif
                                                            @else
                                                                <select class="select2 form-control form-control-lg"
                                                                    id="crop_id" name="crop_id" required>
                                                                    <option value="">--ফসল নির্বাচন করুন--</option>


                                                                </select>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div style="background-color: #134f1f;text-align:center; padding: 10px;">
                                            <h3 style="color:#ffffff;">ফসল কর্তন সংক্রান্ত তথ্যাদি</h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">

                                                        <div class="row">
                                                            <div class="col-md-6"
                                                                style="padding-left: 40px; padding-right:30px;">

                                                                <div class="form-group row">
                                                                    <label for="type_of_cultivation"
                                                                        style="font-size: 1.2em; font-weight: bold;"><b>চাষের
                                                                            ধরন: </b><span
                                                                            class="text-danger">*</span></label>

                                                                    <select class="select2 form-control form-control-lg"
                                                                        id="type_of_cultivation" name="type_of_cultivation"
                                                                        required>
                                                                        @if ($cropCuttingProductionData->type_of_cultivation == 8)
                                                                            <option value="8" selected>বোনা</option>
                                                                            <option value="9">রোপা</option>
                                                                        @elseif ($cropCuttingProductionData->type_of_cultivation == 9)
                                                                            <option value="8">বোনা</option>
                                                                            <option value="9" selected>রোপা</option>
                                                                        @else
                                                                            <option value="">--চাষের ধরন নির্বাচন করুন--
                                                                            </option>
                                                                            <option value="8">বোনা</option>
                                                                            <option value="9">রোপা</option>
                                                                        @endif

                                                                    </select>

                                                                </div>

                                                            </div>
                                                            <div class="col-md-6"
                                                                style="padding-left: 30px; padding-right:40px;">
                                                                <div class="form-group row">
                                                                    <label for="crop_type_code"
                                                                        style="font-size: 1.2em; font-weight: bold;"><b>ফসলের
                                                                            ধরণ: </b><span
                                                                            class="text-danger">*</span></label>

                                                                    <select class="select2 form-control form-control-lg"
                                                                        id="crop_type_code" name="crop_type_code" required>
                                                                        @if ($cropCuttingProductionData->crop_type_code == 11)
                                                                            <option value="11" selected>দেশি </option>
                                                                            <option value="12">উফশী</option>
                                                                            <option value="13">হাইব্রিড</option>
                                                                        @elseif ($cropCuttingProductionData->crop_type_code == 12)
                                                                            <option value="11">দেশি </option>
                                                                            <option value="12" selected>উফশী</option>
                                                                            <option value="13">হাইব্রিড</option>
                                                                        @elseif ($cropCuttingProductionData->crop_type_code == 13)
                                                                            <option value="11">দেশি </option>
                                                                            <option value="12">উফশী</option>
                                                                            <option value="13" selected>হাইব্রিড</option>
                                                                        @else
                                                                            <option value="">--ফসলের ধরণ নির্বাচন করুন--
                                                                            </option>
                                                                            <option value="11">দেশি </option>
                                                                            <option value="12">উফশী</option>
                                                                            <option value="13">হাইব্রিড</option>
                                                                        @endif

                                                                    </select>

                                                                </div>
                                                            </div>

                                                        </div>



                                                        <div class="row">
                                                            <div class="col-md-12"
                                                                style="padding-left: 30px; padding-right:30px;">


                                                                <div class="form-group">
                                                                    <label for="amount_of_land"
                                                                        style="font-size: 1.2em; font-weight: bold;"><b>নির্বাচিত
                                                                            ভূমি খন্ডে জমির পরিমান (একরে ): </b><span
                                                                            class="text-danger">*</span></label>

                                                                    <input class="form-control" type="number" step="0.01"
                                                                        placeholder="নির্বাচিত ভূমি খন্ডে জমির পরিমান (একরে ) লিখুন"
                                                                        name="amount_of_land" id="amount_of_land" required
                                                                        value="{{ $cropCuttingProductionData->amount_of_land }}" />

                                                                </div>
                                                            </div>


                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6"
                                                                style="padding-left: 40px; padding-right:30px;">



                                                                <div class="form-group row">
                                                                    <label for="plot_corner_point_1"
                                                                        style="font-size: 1.2em; font-weight: bold;"><b>দূরত্ব
                                                                            চিহ্ন-১ (দক্ষিণ - পশ্চিম হতে পূর্ব -দক্ষিণ ) ফুট
                                                                            : </b><span
                                                                            class="text-danger">*</span></label>

                                                                    <input class="form-control" type="number" step="0.01"
                                                                        placeholder="দূরত্ব চিহ্ন-১ (দক্ষিণ - পশ্চিম হতে পূর্ব -দক্ষিণ ) লিখুন "
                                                                        name="plot_corner_point_1" id="plot_corner_point_1"
                                                                        required
                                                                        value="{{ $cropCuttingProductionData->plot_corner_point_1 }}" />

                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="point_1_number"
                                                                        style="font-size: 1.2em; font-weight: bold;"><b>উভয়
                                                                            প্রান্ত হতে ৯ বাদ দিয়ে প্রাপ্ত সংখ্যা (চিহ্ন-১):
                                                                        </b><span class="text-danger">*</span></label>

                                                                    <input class="form-control" type="number" step="0.01"
                                                                        placeholder="উভয় প্রান্ত হতে ৯ বাদ দিয়ে প্রাপ্ত সংখ্যা লিখুন"
                                                                        name="point_1_number" id="point_1_number" required
                                                                        value="{{ $cropCuttingProductionData->point_1_number }}" />

                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="point_1_random"
                                                                        style="font-size: 1.2em; font-weight: bold;"><b>চিহ্ন-১ দৈবচয়িত
                                                                            সংখ্যা: </b></label>

                                                                    <input class="form-control" type="number" step="0.01"
                                                                        name="point_1_random" id="point_1_random" readonly
                                                                        value="{{ $cropCuttingProductionData->point_1_random }}" />

                                                                </div>



                                                            </div>



                                                            <div class="col-md-6"
                                                                style="padding-left: 30px; padding-right:40px;">

                                                                <div class="form-group row">
                                                                    <label for="plot_corner_point_2"
                                                                        style="font-size: 1.2em; font-weight: bold;"><b>দূরত্ব
                                                                            চিহ্ন-২ (দক্ষিণ - পশ্চিম হতে উত্তর -পশ্চিম ) ফুট
                                                                            : </b><span
                                                                            class="text-danger">*</span></label>

                                                                    <input class="form-control" type="number" step="0.01"
                                                                        placeholder="দূরত্ব চিহ্ন-২ (দক্ষিণ - পশ্চিম হতে উত্তর -পশ্চিম ) লিখুন"
                                                                        name="plot_corner_point_2" id="plot_corner_point_2"
                                                                        required
                                                                        value="{{ $cropCuttingProductionData->plot_corner_point_2 }}" />

                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="point_2_number"
                                                                        style="font-size: 1.2em; font-weight: bold;"><b>উভয়
                                                                            প্রান্ত হতে ৯ বাদ দিয়ে প্রাপ্ত সংখ্যা :
                                                                        </b><span class="text-danger">*</span></label>

                                                                    <input class="form-control" type="number" step="0.01"
                                                                        placeholder="Enter উভয় প্রান্ত হতে ৯ বাদ দিয়ে প্রাপ্ত সংখ্যা লিখুন"
                                                                        name="point_2_number" id="point_2_number" required
                                                                        value="{{ $cropCuttingProductionData->point_2_number }}" />

                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="point_2_random"
                                                                        style="font-size: 1.2em; font-weight: bold;"><b>চিহ্ন-২
                                                                            দৈবচয়িত সংখ্যা: </b></label>

                                                                    <input class="form-control" type="number" step="0.01"
                                                                        name="point_2_random"
                                                                        value="{{ $cropCuttingProductionData->point_2_random }}"
                                                                        id="point_2_random" readonly />

                                                                </div>


                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div style="background-color: #134f1f;text-align:center; padding: 10px;">
                                            <h3 style="color:#ffffff;">কর্তনকৃত ফসলের ওজন ও সেচ সংক্রান্ত তথ্য</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6"
                                                        style="padding-left: 40px; padding-right:30px;">

                                                        <div class="form-group row paddy_block">
                                                            <label for="after_harvesting_paddy_kg"
                                                                style="font-size: 1.2em; font-weight: bold;"><b>ধান কর্তনের
                                                                    পর (কাঁচা অবস্থায়) প্রতি ২০ বর্গ মি. ওজন (কেজি):
                                                                </b><span class="text-danger">*</span></label>

                                                            <input class="form-control" type="number" step="0.01"
                                                                placeholder="" name="after_harvesting_paddy_kg"
                                                                id="after_harvesting_paddy_kg"
                                                                value="{{ $cropCuttingProductionData->after_harvesting_paddy_kg }}" />

                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="water_irrigation"
                                                                style="font-size: 1.2em; font-weight: bold;"><b>মাঠে পানি
                                                                    সেচ দেয়া হয়েছে কিনা?</b><span
                                                                    class="text-danger">*</span></label>

                                                            <select class="select2 form-control form-control-lg"
                                                                id="water_irrigation" name="water_irrigation" required>
                                                                @if ($cropCuttingProductionData->water_irrigation == 1)
                                                                    <option value="1" selected>হ্যা</option>
                                                                    <option value="2">না</option>
                                                                @elseif ($cropCuttingProductionData->water_irrigation == 2)
                                                                    <option value="1">হ্যা</option>
                                                                    <option value="2" selected>না</option>
                                                                @else
                                                                    {{-- <option value="">--নির্বাচন করুন--</option> --}}
                                                                    <option value="1">হ্যা</option>
                                                                    <option value="2">না</option>
                                                                @endif

                                                            </select>

                                                        </div>



                                                    </div>



                                                    <div class="col-md-6"
                                                        style="padding-left: 30px; padding-right:40px;">


                                                        <div class="form-group row paddy_block">
                                                            <label for="paddy_moisture"
                                                                style="font-size: 1.2em; font-weight: bold;"><b>ধানের
                                                                    আর্দ্রতার হার (কেজি): </b><span
                                                                    class="text-danger">*</span></label>

                                                            <input class="form-control" type="number" step="0.01"
                                                                placeholder=""
                                                                value="{{ $cropCuttingProductionData->paddy_moisture }}"
                                                                name="paddy_moisture" id="paddy_moisture" />

                                                        </div>




                                                    </div>


                                                </div>
                                            </div>
                                        </div>


                                        <div style="background-color: #134f1f;text-align:center; padding: 10px;">
                                            <h3 style="color:#ffffff;">কর্তনকৃত ফসলের ওজন ও সেচ সংক্রান্ত তথ্য</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6"
                                                        style="padding-left: 40px; padding-right:30px;">



                                                        <div class="form-group row">
                                                            <label for="has_used_fertilizer"
                                                                style="font-size: 1.2em; font-weight: bold;"><b> কোন সার
                                                                    ব্যবহার করা হয়েছে?</b><span
                                                                    class="text-danger">*</span></label>

                                                            <select class="select2 form-control form-control-lg"
                                                                id="has_used_fertilizer" name="has_used_fertilizer"
                                                                required>
                                                                @if ($cropCuttingProductionData->has_used_fertilizer == 1)
                                                                    <option value="1" selected>হ্যা</option>
                                                                    <option value="2">না</option>
                                                                @elseif ($cropCuttingProductionData->has_used_fertilizer == 2)
                                                                    <option value="1">হ্যা</option>
                                                                    <option value="2" selected>না</option>
                                                                @else
                                                                    {{-- <option value="">--নির্বাচন করুন--</option> --}}
                                                                    <option value="1">হ্যা</option>
                                                                    <option value="2">না</option>
                                                                @endif

                                                            </select>


                                                        </div>



                                                    </div>

                                                    <div class="col-md-6"
                                                        style="padding-left: 40px; padding-right:30px;">

                                                        <div class="form-group row fertilizer_type_block"
                                                            style="display: none">
                                                            <label for="what_type_fertilizer"
                                                                class="col-3 col-form-label"><b>কোন ধরনের সার ব্যবহার হয়েছে:
                                                                </b><span class="text-danger">*</span></label>
                                                            <div class="col-9">
                                                                <div class="form-group">
                                                                    <select class="select2 form-control form-control-lg"
                                                                        id="what_type_fertilizer"
                                                                        name="what_type_fertilizer[]" multiple>
                                                                        @if ($cropCuttingProductionData->what_type_fertilizer == 1)
                                                                            <option value="1" selected>Chemical</option>
                                                                            <option value="2">Organic</option>
                                                                        @elseif ($cropCuttingProductionData->what_type_fertilizer == 2)
                                                                            <option value="1">Chemical</option>
                                                                            <option value="2" selected>Organic</option>
                                                                        @else
                                                                            <option value="">--Select Fertilizer Type--
                                                                            </option>
                                                                            <option value="1">Chemical</option>
                                                                            <option value="2">Organic</option>
                                                                        @endif

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row fertilizer_type_block"
                                                            style="display: none">
                                                            <label for="what_used_fertilizer"
                                                                class="col-3 col-form-label"><b>ব্যবহারকৃত সারের নাম: </b><span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-9">
                                                                <div class="form-group">
                                                                    <select
                                                                        class="select-multiple form-control form-control-lg"
                                                                        id="what_used_fertilizer"
                                                                        name="what_used_fertilizer[]" multiple="multiple">
                                                                        <option value="1">Urea</option>
                                                                        <option value="2">TSP</option>
                                                                        <option value="3">Potash</option>
                                                                        <option value="4">DAP</option>
                                                                        <option value="5">Zinc</option>
                                                                        <option value="6">Organic</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row fertilizer_type_block"
                                                            style="display: none">
                                                            <label for="fertilizer_amound"
                                                                class="col-3 col-form-label"><b>সারের পরিমাণ (কেজি):
                                                                </b><span class="text-danger">*</span></label>
                                                            <div class="col-9">
                                                                <input class="form-control" type="number" step="0.01"
                                                                    placeholder="Enter Fertilizer Amount"
                                                                    name="fertilizer_amound" id="fertilizer_amound"
                                                                    value="{{ $cropCuttingProductionData->fertilizer_amound }}" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group row fertilizer_type_block"
                                                            style="display: none">
                                                            <label for="fertilizer_amound"
                                                                class="col-3 col-form-label" style="font-size: 1.5em; font-weight: bold;"><b>সারের পরিমাণ (লিটার):
                                                                </b><span class="text-danger">*</span></label>
                                                            <div class="col-9">
                                                                <input class="form-control" type="number" step="0.01"
                                                                    placeholder="Enter Fertilizer Amount" value="{{ $cropCuttingProductionData->fertilizer_amound_lit }}" 
                                                                    name="fertilizer_amound_lit" id="fertilizer_amound_lit" />
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="is_used_pesticide"
                                                                style="font-size: 1.2em; font-weight: bold;"><b>কোন
                                                                    বালাইনাশক ব্যবহার করা হয়েছে? </b><span
                                                                    class="text-danger">*</span></label>
                                                            <select class="select2 form-control form-control-lg"
                                                                id="is_used_pesticide" name="is_used_pesticide" required>
                                                                @if ($cropCuttingProductionData->is_used_pesticide == 1)
                                                                    <option value="1" selected>হ্যা</option>
                                                                    <option value="2">না</option>
                                                                @elseif($cropCuttingProductionData->is_used_pesticide == 2)
                                                                    <option value="1">হ্যা</option>
                                                                    <option value="2" selected>না</option>
                                                                @else
                                                                    {{-- <option value="">--নির্বাচন করুন--</option> --}}
                                                                    <option value="1">হ্যা</option>
                                                                    <option value="2">না</option>
                                                                @endif

                                                            </select>

                                                        </div>

                                                        <div class="form-group row pesticide_type_block"
                                                            style="display: none">
                                                            <label for="what_type_pesticide"
                                                                class="col-3 col-form-label"><b>কোন
                                                                    বালাইনাশক ব্যবহার করা হয়েছে?:
                                                                </b><span class="text-danger">*</span></label>
                                                            <div class="col-9">
                                                                <div class="form-group">
                                                                    <select class="select2 form-control form-control-lg"
                                                                        id="what_type_pesticide" name="what_type_pesticide">
                                                                        <option value="">--Select Pesticide Type--</option>
                                                                        <option value="1">Natural</option>
                                                                        <option value="2">Mechanical</option>
                                                                        <option value="3">Both</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row pesticide_type_block"
                                                            style="display: none">
                                                            <label for="pesticide_amound"
                                                                class="col-3 col-form-label"><b>কীটনাশক পরিমাণ: </b><span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-9">
                                                                <input class="form-control" type="number" step="0.01"
                                                                    placeholder="Enter Fertilizer Amount"
                                                                    name="pesticide_amound"
                                                                    value="{{ $cropCuttingProductionData->pesticide_amound }}"
                                                                    id="pesticide_amound" />
                                                            </div>
                                                        </div>

                                                        {{-- <div class="form-group row">
                                                                    <label for="agricultural_officer_info" class="col-3 col-form-label"><b>Agricultural Officer Info: </b><span class="text-danger">*</span></label>
                                                                    <div class="col-9">
                                                                        <input class="form-control" type="text" placeholder="Enter Agricultural Officer Info" name="agricultural_officer_name" id="agricultural_officer_info"/>
                                                                    </div>
                                                                </div> --}}

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3>

                                                        </h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table-responsive microData">
                                                            <thead>
                                                                        <th>
                                                                            <label class="" style="font-size: 1.1em;"><b>কৃষকের  নাম:</b></label>
                                                                        </th>
                                                                        <th>
                                                                            <label class="" style="font-size: 1.1em;"><b>পিতার নাম:</b></label>
                                                                        </th>
                                                                        <th>
                                                                            <label class="" style="font-size: 1.1em;"><b>পূর্ববর্তী বছরে মাঠের আয়তন:</b></label>
                                                                        </th>
                                                                        <th>
                                                                            <label class="" style="font-size: 1.1em;"><b>চলতি বছরে মাঠের আয়তন:</b></label>
                                                                        </th>
                                                                        <th>
                                                                            <label class="" style="font-size: 1.1em;"><b>মন্তব্য:</b></label>
                                                                        </th>
                                                                        <th>

                                                                        </th>
                                                            </thead>
                                                            <tbody style="border: 1px solid #eef0f9;">
                                                                @foreach ($interViews as $item)
                                                                    <tr id="rec-1">
                                                                        <td>
                                                                            <div class="text-left">
                                                                                

                                                                                <input type="hidden" 
                                                                                    value="{{ $item->farmer_int_id }}">


                                                                                <input type="text" class="form-control"
                                                                                    value="{{ $item->farmer ? $item->farmer->farmers_name : '' }}"
                                                                                    disabled>

                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="text-left">
                                                                                

                                                                                <input type="hidden"
                                                                                    value="{{ $item->fathers_name }}">


                                                                                <input type="text" class="form-control"
                                                                                    value="{{ $item->fathers_name }}"
                                                                                    disabled>

                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="text-left">
                                                                                

                                                                                <input type="hidden"
                                                                                   
                                                                                    value="{{ $item->last_year_land_amount }}">


                                                                                <input type="text" class="form-control"
                                                                                    value="{{ $item->last_year_land_amount }}"
                                                                                    disabled>

                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="text-left">
                                                                                

                                                                                <input type="hidden"
                                                                                   
                                                                                    value="{{ $item->current_year_land_amount }}">


                                                                                <input type="text" class="form-control"
                                                                                    value="{{ $item->current_year_land_amount }}"
                                                                                    disabled>

                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="text-left">
                                                                                <label class=""
                                                                                    style="font-size: 1.1em;"><b>মন্তব্য:</b></label>
                                                                               
                                                                                <input type="hidden" name="comments[]"
                                                                                    value="{{ $item->comments }}">


                                                                                <input type="text" class="form-control"
                                                                                    value="{{ $item->comments == 1 ? 'হ্যাঁ' : 'না' }}"
                                                                                    disabled>

                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group-btn text-left ml-2">
                                                                                <button
                                                                                class="btn btn-sm btn-danger remove_item{{ $item->id }}"
                                                                                onClick="remove_item({{ $item->id }})"
                                                                                type="button"
                                                                                style="padding: 0.75rem;width: 100px;">মুছে
                                                                                ফেলুন</button>
                                                                                {{-- <button
                                                                                    class="btn btn-sm btn-danger remove_item{{ $item->id }}"
                                                                                    onClick="remove_item({{ $item->id }})"
                                                                                    type="button"
                                                                                    style="padding: 0.50rem;">মুছে
                                                                                    ফেলুন</button> --}}
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">

                                                    <div
                                                        style="background-color: #134f1f;text-align:center; padding: 10px;">
                                                        <h3 style="color:#ffffff;">নির্বাচিত মাঠের আশেপাশে উক্ত জাতের ফসল
                                                            চাষ করেছে এমন চাষিদের সাক্ষাৎকার</h3>
                                                    </div>

                                                    <div class="card-body">
                                                        <table class="table table-responsive" id="tbl_posts">
                                                            <thead>
                                                                <tr>
                                                                    <th style="font-size: 1.1em;">কৃষকের নাম:<span
                                                                            class="text-danger">*</span></th>
                                                                    <th style="font-size: 1.1em;">পিতার নাম:<span
                                                                            class="text-danger">*</span></th>
                                                                    <th style="font-size: 1.1em;">পূর্ববর্তী বছরে মাঠের
                                                                        আয়তন: <span class="text-danger">*</span></th>
                                                                    <th style="font-size: 1.1em;">চলতি বছরে মাঠের আয়তন:
                                                                        <span class="text-danger">*</span>
                                                                    </th>
                                                                    <th style="font-size: 1.1em;">পূর্ববর্তী বছরে মাঠের
                                                                        উৎপাদন : <span class="text-danger">*</span></th>
                                                                    <th style="font-size: 1.1em;">চলতি বছরে মাঠের উৎপাদন:
                                                                        <span class="text-danger">*</span>
                                                                    </th>
                                                                    <th style="font-size: 1.1em;">মন্তব্য: <span
                                                                            class="text-danger">*</span></th>
                                                                </tr>
                                                            </thead>



                                                            <tbody id="tbl_posts_body" style="border: 1px solid #eef0f9;">


                                                                <tr id="rec-1">
                                                                    <td style="width: 12%">
                                                                        <div class="text-left">
                                                                            

                                                                            <select
                                                                                class="form-control farmer_int_id_1 select_1"
                                                                                id="farmer_int_id_1" name="farmer_int_id[]"
                                                                                required>
                                                                                {{-- <option value="">--কৃষক নির্বাচন করুন-- --}}
                                                                                </option>
                                                                                @foreach ($farmers as $item)
                                                                                    <option value="{{ $item->id }}">
                                                                                        {{ $item->farmers_name }}</option>
                                                                                @endforeach 

                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                    <td style="width: 12%">
                                                                        <div class="text-left">


                                                                            <input class="form-control" type="text"
                                                                                placeholder="পিতার নাম লিখুন"
                                                                                name="fathers_name[]" id="fathers_name_1"
                                                                                required />
                                                                        </div>
                                                                    </td>
                                                                    <td style="width: 12%">
                                                                        <div class="text-left">


                                                                            <input class="form-control" type="number"
                                                                                step="0.01" placeholder="আয়তন (একর)"
                                                                                name="last_year_land_amount[]"
                                                                                id="last_year_land_amount_1" required />
                                                                        </div>
                                                                    </td>
                                                                    <td style="width: 12%">
                                                                        <div class="text-left">
                                                                            <input class="form-control" type="number"
                                                                                step="0.01" placeholder="আয়তন (একর)"
                                                                                name="current_year_land_amount[]"
                                                                                id="current_year_land_amount_1" required />
                                                                        </div>
                                                                    </td>
                                                                    <td style="width: 12%">
                                                                        <div class="text-left">


                                                                            <input class="form-control" type="number"
                                                                                step="0.01" placeholder=" উৎপাদন (মণ)"
                                                                                name="last_year_land_producttion[]"
                                                                                id="last_year_land_producttion_1"
                                                                                required />
                                                                        </div>
                                                                    </td>
                                                                    <td style="width: 10%">
                                                                        <div class="text-left">

                                                                            <input class="form-control" type="number"
                                                                                step="0.01" placeholder="উৎপাদন (মণ)"
                                                                                name="current_year_land_producttion[]"
                                                                                id="current_year_land_producttion_1"
                                                                                required />
                                                                        </div>
                                                                    </td>
                                                                    <td style="width: 10%">
                                                                        <div class="text-left">

                                                                            <select
                                                                                class="select2 form-control form-control-lg"
                                                                                id="comments_1" name="comments[]" required>
                                                                                {{-- <option value="">--মন্তব্য নির্বাচন করুন-- --}}
                                                                                </option>
                                                                                <option value="1">ভাল</option>
                                                                                <option value="2">খারাপ</option>
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="input-group-btn text-left ml-2">
                                                                            <button
                                                                                class="btn btn-sm btn-success add-record"
                                                                                type="button"
                                                                                style="padding: 0.75rem;width: 100px;">যুক্ত
                                                                                করুন</button>
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

                            </div>
                        </div>


                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-12 text-right" style="padding-left: 35px; padding-right:35px;">
                                    <button type="submit" class="btn btn-primary font-weight-bold"
                                        name="submitButton">হালনাগাদ করুন</button>
                                </div>
                            </div>
                        </div>
                        </form>

                        <div style="display:none;">

                            <table id="sample_table" style="width: 100%;" class="table  table-responsive">


                                <tr id="">
                                    <td>
                                        <div class="text-left">

                                            <select name="farmer_int_id[]" id="farmer_int_id"
                                                class="form-control farmer_int_id select_" required>
                                                <option value="">--কৃষক নির্বাচন করুন--</option>
                                                @foreach ($farmers as $item)
                                                    <option value="{{ $item->id }}">
                                                    {{ $item->farmers_name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-left">


                                            <input class="form-control" type="text" placeholder="পিতার নাম লিখুন"
                                                name="fathers_name[]" id="fathers_name" required />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-left">


                                            <input class="form-control" type="number" step="0.01"
                                                placeholder="আয়তন (একর)" name="last_year_land_amount[]"
                                                id="last_year_land_amount" required />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-left">


                                            <input class="form-control" type="number" step="0.01"
                                                placeholder="আয়তন (একর)" name="current_year_land_amount[]"
                                                id="current_year_land_amount" required />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-left">

                                            <input class="form-control" type="number" step="0.01"
                                                placeholder=" উৎপাদন (মণ)" name="last_year_land_producttion[]"
                                                id="last_year_land_producttion" required />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-left">

                                            <input class="form-control" type="number" step="0.01"
                                                placeholder=" উৎপাদন (মণ)" name="current_year_land_producttion[]"
                                                id="current_year_land_producttion" required />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-left">


                                            <select class="select_ form-control form-control-lg" id="comments"
                                                name="comments[]" required>
                                                <option value="">--মন্তব্য নির্বাচন করুন--</option>
                                                <option value="1">ভাল</option>
                                                <option value="2">খারাপ</option>
                                            </select>
                                        </div>
                        </div>
                        </td>
                        <td>
                            <div class="input-group-btn text-left ml-2">
                                <button class="btn btn-sm btn-danger delete-record" type="button" data-id="0"
                                    style="padding: 0.75rem; width:100px;">মুছে ফেলুন</button>
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
    <script>
        $('#plot_corner_point_1').on('keyup', function() {
            let plot_corner_point_1 = $('#plot_corner_point_1').val();
            let point_1_range = Number(plot_corner_point_1) - 9;

            // Function to generate random number 
            function randomNumber(min, max) {
                min = Math.ceil(min);
                max = Math.floor(max);
                return Math.floor(Math.random() * (max - min + 1)) + min;
            }

            // Function call
            let point_1_random = randomNumber(10, point_1_range);

            $('#point_1_random').val(point_1_random);
        });

        $('#plot_corner_point_2').on('keyup', function() {
            let plot_corner_point_2 = $('#plot_corner_point_2').val();
            let point_2_range = Number(plot_corner_point_2) - 9;

            // Function to generate random number 
            function randomNumber(min, max) {
                min = Math.ceil(min);
                max = Math.floor(max);
                return Math.floor(Math.random() * (max - min + 1)) + min;
            }

            // Function call
            let point_2_random = randomNumber(10, point_2_range);

            $('#point_2_random').val(point_2_random);
        });
    </script>

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

    <script>
        $('#in_cluster').on('change', function() {
            if ($(this).val() == 1) {
                $('#cluster_id_id').show();
                $('#cluster_area_acre_id').show();

                $('#cluster_id').attr('required', 'required');
                $('#cluster_area_acre').attr('required', 'required');
            } else {
                $('#cluster_id_id').hide();
                $('#cluster_area_acre_id').hide();

                $('#cluster_id').removeAttr('required');
                $('#cluster_area_acre').removeAttr('required');
            }
        });

        $('#water_irrigation').on('change', function() {

            let water_irrigation = $(this).val();

            if (water_irrigation == 1) {
                $('.source_of_water_block').show();

                $('#source_of_water').attr('required', 'required');
                $('#is_water_irrigation_both').attr('required', 'required');
            } else {
                $('.source_of_water_block').hide();

                $('#source_of_water').removeAttr('required');
                $('#is_water_irrigation_both').removeAttr('required');
            }
        });

        $('#is_used_pesticide').on('change', function() {

            let is_used_pesticide = $(this).val();

            if (is_used_pesticide == 1) {
                $('.pesticide_type_block').show();

                $('#what_type_pesticide').attr('required', 'required');
                $('#pesticide_amound').attr('required', 'required');
            } else {
                $('.pesticide_type_block').hide();

                $('#what_type_pesticide').removeAttr('required');
                $('#pesticide_amound').removeAttr('required');
            }
        });

        $('#has_used_fertilizer').on('change', function() {

            let has_used_fertilizer = $(this).val();

            if (has_used_fertilizer == 1) {
                $('.fertilizer_type_block').show();

                $('#what_type_fertilizer').attr('required', 'required');
                $('#what_used_fertilizer').attr('required', 'required');
                $('#fertilizer_amound').attr('required', 'required');
            } else {
                $('.fertilizer_type_block').hide();

                $('#what_type_fertilizer').removeAttr('required');
                $('#what_used_fertilizer').removeAttr('required');
                $('#fertilizer_amound').removeAttr('required');
            }
        });
    </script>

    <script>
        let crop_name = $('#crop_name').val();

        if (crop_name == 'aus' || crop_name == 'amon' || crop_name == 'boro') {
            $('.paddy_block').show();
            $('#wheat_block').hide();
            $('#jute_block').hide();

            $('#after_harvesting_paddy_kg').attr('required', 'required');
            $('#paddy_moisture').attr('required', 'required');
        } else if (crop_name == 'wheat') {
            $('.paddy_block').hide();
            $('#wheat_block').show();
            $('#jute_block').hide();

            $('#after_harvesting_wheat_kg').attr('required', 'required');
        } else if (crop_name == 'jute') {
            $('.paddy_block').hide();
            $('#wheat_block').hide();
            $('#jute_block').show();

            $('#after_harvesting_jute_kg').attr('required', 'required');
        }
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
            element.attr('id', 'rec-' + size);
            element.find('.delete-record').attr('data-id', size);
            element.find('.select_').addClass('select_' + size);
            element.find('.farmer_int_id').attr('id', 'farmer_int_id' + size);
            element.find('.fathers_name').attr('id', 'fathers_name' + size);
            element.find('.last_year_land_amount').attr('id', 'last_year_land_amount' + size);
            element.find('.last_year_land_producttion').attr('id', 'last_year_land_producttion' + size);
            element.find('.current_year_land_amount').attr('id', 'current_year_land_amount' + size);
            element.find('.current_year_land_producttion').attr('id', 'current_year_land_producttion' + size);
            element.find('.comments').attr('id', 'comments' + size);
            element.appendTo('#tbl_posts_body');

            // Select2
            $('.select_' + size).select2();

            $(document).delegate('button.delete-record', 'click', function(e) {
                e.preventDefault();

                var id = $(this).attr('data-id');
                var targetDiv = $(this).attr('targetDiv');
                $('#rec-' + id).remove();

                return true;
            });
        });
    </script>
@endpush
