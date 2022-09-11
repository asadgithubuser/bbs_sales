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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">আলু ফসল কর্তন ও উৎপাদন জরিপ তফসিল (তফসিল-৫)</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">ড্যাশবোর্ড</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a class="text-muted">আলু ফসল কর্তন ও উৎপাদন জরিপ তফসিল (তফসিল-৫)</a>
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
                                <h3 class="card-title">আলু ফসল কর্তন ও উৎপাদন জরিপ তফসিল (তফসিল-৫)</h3>
                            </div>

                            <form>
                                @csrf

                                <div class="card-body">
                                    <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                        <h3 style="color:#ffffff;">সাধারণ তথ্য</h3>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">

                                                    <div class="form-group row">
                                                        <label for="farmer_id"style="font-size: 1.5em; font-weight: bold;"><b>বর্তমান ভূমি খন্ড ব্যাবহারকারী/চাষির নাম: </b></label>
                                                        <input class="form-control" type="text" name="land_segment_signal" id="land_segment_signal" value="{{ $potatoData->farmer ? $potatoData->farmer->farmers_name : '' }}" disabled />
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="land_segment_signal" style="font-size: 1.5em; font-weight: bold;"><b> ভূমি খন্ডের সংক্ষেত নং: </b></label>
                                                        <input class="form-control" type="text" name="land_segment_signal" id="land_segment_signal" value="{{ $potatoData->land_segment_signal }}" disabled />

                                                    </div>

                                                </div>

                                                <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">

                                                    <div class="form-group row">
                                                        <label for="in_cluster" style="font-size: 1.5em; font-weight: bold;"><b>মৌজার অবস্থান: </b></label> 
                                                        @if ($potatoData->in_cluster == 1)
                                                            <input class="form-control" type="text" name="in_cluster" id="in_cluster" value="ভিতরে" disabled />
                                                        @elseif ($potatoData->in_cluster == 2)
                                                            <input class="form-control" type="text" name="in_cluster" id="in_cluster" value="বাইরে" disabled />
                                                        @endif
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="crop_cutting_date" style="font-size: 1.5em; font-weight: bold;"><b>তথ্য সংগ্রহের তারিখ: </b></label>
                                                        <input class="form-control" type="date" name="crop_cutting_date" value="{{ $potatoData->crop_cutting_date }}"id="crop_cutting_date" disabled />
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                        <h3 style="color:#ffffff;">আলু ফসল কর্তন সংক্রান্ত তথ্যাদি </h3>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">

                                                    <div class="form-group row">
                                                        <label for="potato_varieties" style="font-size: 1.5em; font-weight: bold;"><b>আলুর জাত:</b></label>
                                                        @if ($potatoData->potato_varieties == 1)
                                                            <input class="form-control" name="potato_varieties" value="দেশি" id="potato_varieties" disabled />
                                                        @elseif ($potatoData->potato_varieties == 2)
                                                            <input class="form-control" name="potato_varieties" value="উচ্চ ফলনশীল" id="potato_varieties" disabled />
                                                        @elseif ($potatoData->potato_varieties == 2)
                                                            <input class="form-control" name="potato_varieties" value="ইন্ডিয়ান" id="potato_varieties" disabled />
                                                        @endif
                                                    </div>


                                                    <div class="form-group row">
                                                        <label for="number_of_row" style="font-size: 1.5em; font-weight: bold;"><b>ভূমি খন্ডের মোট সারির সংখ্যা: </b></label>
                                                        <input class="form-control" type="number" name="number_of_row" value="{{ $potatoData->number_of_row }}" id="number_of_row" disabled />
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="location_of_sample_row_1" style="font-size: 1.5em; font-weight: bold;"><b>১ম নমুনা সারির অবস্থান (তম): </b></label>
                                                        <input class="form-control" type="number" name="location_of_sample_row_1" id="location_of_sample_row_1" value="{{ $potatoData->location_of_sample_row_1 }}" disabled />
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="row_length_feet_1" style="font-size: 1.5em; font-weight: bold;"><b>১ম নমুনা সারির দৈর্ঘ (ফুট): </b></label>
                                                        <input class="form-control" type="number" name="row_length_feet_1" value="{{ $potatoData->row_length_feet_1 }}" id="row_length_feet_1" disabled />
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="row_average_width_feet_1" style="font-size: 1.5em; font-weight: bold;"><b>১ম নমুনা সারির গড় প্রস্থ (ফুট): </b></label>
                                                        <input class="form-control" type="number" name="row_average_width_feet_1" id="row_average_width_feet_1" value="{{ $potatoData->row_average_width_feet_1 }}" disabled />
                                                    </div>

                                                </div>

                                                <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">

                                                    <div class="form-group row">
                                                        <label for="land_amount_of_plot" style="font-size: 1.5em; font-weight: bold;"><b>ভূমি খন্ডের জমির পরিমাণ (একর): </b></label>
                                                        <input class="form-control" type="number" name="land_amount_of_plot" value="{{ $potatoData->land_amount_of_plot }}"id="land_amount_of_plot" disabled />
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="location_of_sample_row_2" style="font-size: 1.5em; font-weight: bold;"><b>২ম নমুনা সারির অবস্থান (তম): </b></label>
                                                        <input class="form-control" type="number" name="location_of_sample_row_2" id="location_of_sample_row_2" value="{{ $potatoData->location_of_sample_row_2 }}" disabled/>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="row_length_feet_2" style="font-size: 1.5em; font-weight: bold;"><b>২ম নমুনা সারির দৈর্ঘ (ফুট): </b></label>
                                                        <input class="form-control" type="number" name="row_length_feet_2" value="{{ $potatoData->row_length_feet_2 }}" id="row_length_feet_2" disabled/>

                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="row_average_width_feet_2" style="font-size: 1.5em; font-weight: bold;"><b>২ম নমুনা সারির গড় প্রস্থ (ফুট): </b></label>
                                                        <input class="form-control" type="number" name="row_average_width_feet_2" id="row_average_width_feet_2" value="{{ $potatoData->row_average_width_feet_2 }}" disabled/>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>





                                    <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                        <h3 style="color:#ffffff;">দৈবচয়িত ভূমি খন্ডের জমির পরিমান ও আলুর সারির সংখ্যা
                                        </h3>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">

                                                    <div class="form-group row">
                                                        <label for="random_land_amount_of_plot" style="font-size: 1.5em; font-weight: bold;"><b>জমির পরিমাণ (একরে): </b></label>
                                                        <input class="form-control" type="number" name="random_land_amount_of_plot" id="random_land_amount_of_plot" value="{{ $potatoData->random_land_amount_of_plot }}" disabled/>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="random_location_east_to_west" style="font-size: 1.5em; font-weight: bold;"><b>কর্তনকৃত জমির অবস্থান পূর্ব থেকে পশ্চিম (ফুট): </b></label>
                                                        <input class="form-control" type="number" name="random_location_east_to_west" value="{{ $potatoData->random_location_east_to_west }}" id="random_location_east_to_west" disabled />
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="random_number_row_cut" style="font-size: 1.5em; font-weight: bold;"><b>কর্তনকৃত সারির মোট সংখ্যা: </b></label>

                                                        <input class="form-control" type="number" name="random_number_row_cut" value="{{ $potatoData->random_number_row_cut }}" id="random_number_row_cut" disabled/>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="random_row_length_feet" style="font-size: 1.5em; font-weight: bold;"><b>কর্তনকৃত সারির মোট দৈর্ঘ্য (ফুট): </b></label>
                                                        <input class="form-control" type="number" name="random_row_length_feet" value="{{ $potatoData->random_row_length_feet }}" id="random_row_length_feet" disabled/>
                                                    </div>


                                                </div>

                                                <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">


                                                    <div class="form-group row">
                                                        <label for="random_number_of_row" style="font-size: 1.5em; font-weight: bold;"><b>মোট সারির  সংখ্যা: </b></label>
                                                        <input class="form-control" type="number" name="random_number_of_row" value="{{ $potatoData->random_number_of_row }}" id="random_number_of_row" disabled/>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label for="random_location_north_to_south" style="font-size: 1.5em; font-weight: bold;"><b>কর্তনকৃত জমির অবস্থান উত্তর থেকে দক্ষিণ (ফুট): </b></label>
                                                        <input class="form-control" type="number" name="random_location_north_to_south" id="random_location_north_to_south" value="{{ $potatoData->random_location_north_to_south }}" disabled/>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label for="random_row_average_width_feet" style="font-size: 1.5em; font-weight: bold;"><b>কর্তনকৃত সারির গড় প্রস্থ (ফুট): </b></label>
                                                        <input class="form-control" type="number" name="random_row_average_width_feet" id="random_row_average_width_feet" value="{{ $potatoData->random_row_average_width_feet }}" disabled/>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                        <h3 style="color:#ffffff;">আলুর ফলন/উৎপাদন হার ও খরচ</h3>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">

                                                    <div class="form-group row">
                                                        <label for="production_per_acre" style="font-size: 1.5em; font-weight: bold;"><b>একর প্রতি আলু ফলন (মণ): </b></label>
                                                        <input class="form-control" type="text" value="{{ $potatoData->production_per_acre }}" name="production_per_acre" id="production_per_acre" disabled />
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="production_cost_per_acre" style="font-size: 1.5em; font-weight: bold;"><b>একর প্রতি আলুর উৎপাদন খরচ: </b></label>
                                                        <input class="form-control" type="text" name="production_cost_per_acre" value="{{$potatoData->production_cost_per_acre }}" id="production_cost_per_acre" disabled />
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="amount_of_cut_potato_kg" style="font-size: 1.5em; font-weight: bold;"><b>আলুর ফসল কর্তন থেকে প্রাপ্ত আলুর পরিমাণ (কেজি): </b></label>

                                                        <input class="form-control" type="number"
                                                            name="amount_of_cut_potato_kg"
                                                            value="{{ $potatoData->amount_of_cut_potato_kg }}"
                                                            id="amount_of_cut_potato_kg" disabled />

                                                    </div>

                                                </div>

                                                <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">



                                                    <div class="form-group row">
                                                        <label for="size_of_cut_row_squre_feet"
                                                            style="font-size: 1.5em; font-weight: bold;"><b>কর্তনকৃত
                                                                সারির আয়তন (বর্গ ফুট): </b></label>

                                                        <input class="form-control" type="number"
                                                            name="size_of_cut_row_squre_feet"
                                                            id="size_of_cut_row_squre_feet"
                                                            value="{{ $potatoData->size_of_cut_row_squre_feet }}"
                                                            disabled />

                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="size_of_cut_row_acre"
                                                            style="font-size: 1.5em; font-weight: bold;"><b>কর্তনকৃত
                                                                সারির আয়তন (একরে): </b></label>

                                                        <input class="form-control" type="number" placeholder="একরে"
                                                            name="size_of_cut_row_acre"
                                                            value="{{ $potatoData->size_of_cut_row_acre }}"
                                                            id="size_of_cut_row_acre" disabled />

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                        <h3 style="color:#ffffff;">নির্বাচিত মাঠের আশেপাশে উক্ত জাতের ফসল
                                            চাষ করেছে এমন চাষীদের সাক্ষাৎকার তালিকা</h3>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table table-responsive">
                                                <thead>
                                                    <th>
                                                        <label for="farmer_int_id_1" style="font-size: 1.1em; font-weight: bold;"><b>চাষির নাম:</b> </label>
                                                    </th>
                                                    <th>
                                                        <label for="fathers_name_1" style="font-size: 1.1em; font-weight: bold;"><b>পিতার নাম: </b></label>
                                                    </th>
                                                    <th>
                                                        <label for="last_year_land_amount_1" style="font-size: 1.1em; font-weight: bold;"><b>পূর্ববর্তী বছরে মাঠের আয়তন (একর): </b></label>
                                                    </th>
                                                    <th>
                                                        <label for="current_year_land_amount_1"
                                                            style="font-size: 1.1em; font-weight: bold;"><b>চলতি
                                                                বছরে মাঠের আয়তন (একর): </b></label>
                                                    </th>
                                                    <th>
                                                        <label for="last_year_land_producttion_1"
                                                            style="font-size: 1.1em; font-weight: bold;"><b>পূর্ববর্তী
                                                                বছরে মাঠের উৎপাদন (মণ): </b></label>
                                                    </th>
                                                    <th>
                                                        <label for="current_year_land_producttion_1"
                                                            style="font-size: 1.1em; font-weight: bold;"><b>চলতি
                                                                বছরে মাঠের উৎপাদন (মণ): </b></label>
                                                    </th>
                                                    <th>
                                                        <label for="comments_1"
                                                            style="font-size: 1.1em; font-weight: bold;"><b>একর
                                                                প্রতি গড় ফলন (কেজি): </b></label>
                                                    </th>
                                                </thead>
                                                <tbody id="">
                                                    @foreach ($farmerInterviews as $interview)
                                                        <tr>
                                                            <td>
                                                                <div class="text-left">


                                                                    <input class="form-control" type="text"
                                                                        placeholder=""
                                                                        value="{{ $interview->farmer ? $interview->farmer->farmers_name : '' }}"
                                                                        disabled />
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-left">


                                                                    <input class="form-control" type="text"
                                                                        placeholder=""
                                                                        value="{{ $interview->farmers_father_name }}"
                                                                        disabled />
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-left">


                                                                    <input class="form-control" type="text"
                                                                        placeholder=""
                                                                        value="{{ $interview->last_year_land_amount }}"
                                                                        disabled />
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-left">


                                                                    <input class="form-control" type="text"
                                                                        placeholder=""
                                                                        value="{{ $interview->current_year_land_amount }}"
                                                                        disabled />
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-left">


                                                                    <input class="form-control" type="text"
                                                                        placeholder=""
                                                                        value="{{ $interview->last_year_potato_producttion }}"
                                                                        disabled />
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-left">


                                                                    <input class="form-control" type="text"
                                                                        placeholder=""
                                                                        value="{{ $interview->current_year_potato_producttion }}"
                                                                        disabled />
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-left">


                                                                    <input class="form-control" type="text"
                                                                        placeholder=""
                                                                        value="{{ $interview->average_yield_per_acre }}"
                                                                        disabled />
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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
    </div>
    </div>


    </div>
@endsection
