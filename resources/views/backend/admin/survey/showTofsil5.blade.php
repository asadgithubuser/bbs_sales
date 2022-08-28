@extends('backend.layout.master')
@section('content')
<style>
    td,p {
        font-size: 1.5em;
        font-weight: 500;
    }
</style>
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="noprintbtn">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Potato Crop Cutting and Production Survey</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted">Potato Crop Cutting and Production Survey</a>
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
                @include('alerts.alerts')
                <!--begin::Card-->
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <div class="card card-custom m-9">
                            <div class="card-header mt-5">
                                
                                <div class="col-lg-6 offset-lg-3 text-center mt-4" style="line-height: 100%">
                                    <p class="font-weight-bold">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</p>
                                    <p class="font-weight-bold">পরিকল্পনা মন্ত্রণালয়</p>
                                    <p class="font-weight-bold">বাংলাদেশ পরিসংখ্যান ব্যুরো</p>
                                    <p class="font-weight-bold">এগ্রিকালচার উইং</p>
                                    <p class="font-weight-bold">পরিসংখ্যান ভবন</p>
                                    <p class="font-weight-bold">ই-২৭/এ আগারগাঁও, ঢাকা-১২০৭</p>
                                    <p class="font-weight-bold mt-4">আলু ফসল কর্তন ও উৎপাদন জরিপ তফসিল</p>
                                    <p class="mt-4">(Potato Crop Cutting and Production Survey)</p>
                                </div>
                                <div class="col-3">
                                    <p class="font-weight-bold text-right">তফসিল - ৫</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ajax-data-container pt-3">
                                    <p style="font-size: 1.3em; font-weight: 500">১। নমুনা দাগগুচ্ছ/ভূমিখন্ডের পরিচিতি :</p>
                                    <table class="table" style="margin-bottom: 25px">
                                        <tr>
                                            <td style="border: 1px solid #000" align="middle" colspan="5">নমুনার অবস্থান : (দাগগুচ্ছের মধ্যে হলে কোড 1 দিন, দাগগুচ্ছের বাহিরে হলে কোড 2 দিন)</td>
                                            <td style="border: 1px solid #000" align="middle"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left">বিভাগ</td>
                                            <td style="border: 1px solid #000" align="left">{{ $list->district ? $list->district->name_bn : '' }}</td>
                                            <td style="border: 1px solid #000" align="left">জেলা</td>
                                            <td style="border: 1px solid #000" align="left">{{ $list->division ? $list->division->name_bn : '' }}</td>
                                            <td style="border: 1px solid #000" align="left">উপজেলা</td>
                                            <td style="border: 1px solid #000" align="left">{{ $list->upazila ? $list->upazila->name_bd : '' }}</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left">কোড</td>
                                            <td style="border: 1px solid #000" align="left"> {{ $list->district ? $list->district->district_bbs_code : '' }}</td>
                                            <td style="border: 1px solid #000" align="left">কোড</td>
                                            <td style="border: 1px solid #000" align="left">{{ $list->division ? $list->division->division_bbs_code : '' }}</td>
                                            <td style="border: 1px solid #000" align="left">কোড</td>
                                            <td style="border: 1px solid #000" align="left">{{ $list->upazila ? $list->upazila->upazila_bbs_code : '' }}</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left">ইউনিয়ন</td>
                                            <td style="border: 1px solid #000" align="left"> {{ $list->union ? $list->union->name_bn : '' }}</td>
                                            <td style="border: 1px solid #000" align="left">মৌজা</td>
                                            <td style="border: 1px solid #000" align="left">{{ $list->mouza ? $list->mouza->name_bn : '' }}</td>
                                            <td style="border: 1px solid #000" align="left">দাগগুচ্ছের সংকেত নং (প্রযোজ্য ক্ষেত্রে)</td>
                                            <td style="border: 1px solid #000" align="left">
                                                {{ $upazilaTotalData->farmer ? $upazilaTotalData->farmer->cluster_indentity_no : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="middle" colspan="2">ভূমিখন্ডের সংকেত নং (প্রযোজ্য ক্ষেত্রে)</td>
                                            <td style="border: 1px solid #000" align="left">{{ $upazilaTotalData->land_segment_signal }}</td>
                                            <td style="border: 1px solid #000" align="left" colspan="3">ফসল কর্তনের তারিখ:{{ $list->created_at->format('d/m/y') }}</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" colspan="3">চাষির নাম: {{ $upazilaTotalData->farmer ? $upazilaTotalData->farmer->farmers_name : '' }}</td>
                                            <td style="border: 1px solid #000" align="left" colspan="3">মোবাইল নম্বর: {{ $upazilaTotalData->farmer ? $upazilaTotalData->farmer->farmers_mobile : '' }}</td>
                                        </tr>
                                    </table>

                                    <p style="font-size: 1.3em; font-weight: 500; margin-bottom: 20px;">অংশ-১: আলু ফসল কর্তন সংক্রান্ত তথ্যাদি</p>
                                    <p style="font-size: 1.3em; font-weight: 500">১.১ ভূমিখন্ডে জমির পরিমান, সংখ্যা ও সারির অবস্থান</p>

                                    <table class="table">
                                        <tr>
                                            <td style="border: 1px solid #000" align="center" rowspan="2">ভূমিখন্ডে জমির পরিমাণ</td>
                                            <td style="border: 1px solid #000" align="center" rowspan="2">মোট সারির সংখ্যা</td>
                                            <td style="border: 1px solid #000" align="center" colspan="3">নমুনা সারির অবস্থান</td>
                                            <td style="border: 1px solid #000" align="center">সারির দৈর্ঘ্য (ফুট)</td>
                                            <td style="border: 1px solid #000" align="center">সারির গড় প্রস্থ (ফুট)</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center">(১)</td>
                                            <td style="border: 1px solid #000" align="center">{{ $upazilaTotalData->location_of_sample_row_1 }}</td>
                                            <td style="border: 1px solid #000" align="center">তম</td>
                                            <td style="border: 1px solid #000" align="center">{{ $upazilaTotalData->row_length_feet_1 }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $upazilaTotalData->row_average_width_feet_1 }}</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center">{{  $upazilaTotalData->land_amount_of_plot }}</td>
                                            <td style="border: 1px solid #000" align="center">{{  $upazilaTotalData->number_of_row }}</td>
                                            <td style="border: 1px solid #000" align="center">(১)</td>
                                            <td style="border: 1px solid #000" align="center">{{ $upazilaTotalData->location_of_sample_row_2 }}</td>
                                            <td style="border: 1px solid #000" align="center">তম</td>
                                            <td style="border: 1px solid #000" align="center">{{ $upazilaTotalData->row_length_feet_2 }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $upazilaTotalData->row_average_width_feet_2 }}</td>
                                        </tr>
                                    </table>

                                    <p style="font-size: 1.3em; font-weight: 500">১.২ জমির পরিমান ও আলু সারির সংখ্যা (দৈব চয়ন অনুসারে)</p>

                                    <table class="table">
                                        <tr>
                                            <td style="border: 1px solid #000" align="center" colspan="2">ভূমিখন্ডে জমির পরিমাণ ও আলু সারির সংখ্যা</td>
                                            <td style="border: 1px solid #000" align="center" colspan="2">কর্তনকৃত জমির অবস্থান</td>
                                            <td style="border: 1px solid #000" align="center" rowspan="3">কর্তনকৃত সারির মোট সংখ্যা</td>
                                            <td style="border: 1px solid #000" align="center" rowspan="3">সারির মোট দৈর্ঘ্য (ফুট)</td>
                                            <td style="border: 1px solid #000" align="center" rowspan="3">সারির গড় প্রস্থ (ফুট)</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center">জমির পরিমান</td>
                                            <td style="border: 1px solid #000" align="center" rowspan="2">জমিতে মোট সারির সংখ্যা</td>
                                            <td style="border: 1px solid #000" align="center">পূর্ব হতে পশ্চিমে</td>
                                            <td style="border: 1px solid #000" align="center">উত্তর হতে দক্ষিনে</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center">(একরে)</td>
                                            <td style="border: 1px solid #000" align="center">(ফুট)</td>
                                            <td style="border: 1px solid #000" align="center">(ফুট)</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center">১</td>
                                            <td style="border: 1px solid #000" align="center">২</td>
                                            <td style="border: 1px solid #000" align="center">৩</td>
                                            <td style="border: 1px solid #000" align="center">৪</td>
                                            <td style="border: 1px solid #000" align="center">৫</td>
                                            <td style="border: 1px solid #000" align="center">৬</td>
                                            <td style="border: 1px solid #000" align="center">৭</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center"> {{ $upazilaTotalData->random_land_amount_of_plot }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $upazilaTotalData->random_number_of_row }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $upazilaTotalData->random_location_east_to_west }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $upazilaTotalData->random_location_north_to_south }}</td>
                                            <td style="border: 1px solid #000" align="center"> {{ $upazilaTotalData->random_number_row_cut }} </td>
                                            <td style="border: 1px solid #000" align="center">{{ $upazilaTotalData->random_row_length_feet }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $upazilaTotalData->random_row_average_width_feet }}</td>
                                        </tr>
                                    </table>

                                    <table class="table">
                                        <tr>
                                            <td align="left">১.৩ আলুর জাত (কোড লিখুন) (কোড: দেশী/স্থানীয়-১, উচ্চ ফলনশীল-২, ইন্ডিয়ান-৩)</td>
                                            <td style="border: 1px solid #000;" align="left">	{{ $upazilaTotalData->potato_varieties }}</td>
                                        </tr>
                                    </table>

                                    <p style="font-size: 1.3em; font-weight: 500">১.৪ আলুর ফলন/উৎপাদন হার</p>

                                    <table class="table">
                                        <tr>
                                            <td style="border: 1px solid #000" align="center" colspan="2">কর্তনকৃত সারির আয়তন</td>
                                            <td style="border: 1px solid #000" align="center" rowspan="2">আলু ফসল কর্তন থেকে প্রাপ্ত আলুর পরিমাণ (কেজি)</td>
                                            <td style="border: 1px solid #000" align="center" rowspan="2">একর প্রতি আলু ফলন (মণ) = (১১৬৭.০৭/নমুনা সারির মোট আয়তন) x নমুনা সারি হতে প্রাপ্ত আলুর ওজন (কলাম ৩ অনুসারে)</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center">বর্গফুট</td>
                                            <td style="border: 1px solid #000" align="center">একর</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center">১</td>
                                            <td style="border: 1px solid #000" align="center">২</td>
                                            <td style="border: 1px solid #000" align="center">৩</td>
                                            <td style="border: 1px solid #000" align="center">৪</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center">{{ $upazilaTotalData->size_of_cut_row_squre_feet }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $upazilaTotalData->size_of_cut_row_acre }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $upazilaTotalData->amount_of_cut_potato_kg }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $upazilaTotalData->production_cost_per_acre }}</td>
                                        </tr>
                                    </table>

                                    <p style="font-size: 1.3em; font-weight: 500; margin-bottom: 20px;">অংশ-২: আলু উৎপাদন সংক্রান্ত তথ্যাদি। (আলু কর্তনকৃত মৌজায় ৪ জন আলু চাষীর নিকট হতে তথ্য সংগ্রহ করতে হবে)</p>
                                    <p style="font-size: 1.3em; font-weight: 500">২.১ আলুর উৎপাদন</p>

                                    <table class="table">
                                        <tr>
                                            <td style="border: 1px solid #000" align="center" rowspan="3">ক্রমিক নং</td>
                                            <td style="border: 1px solid #000" align="center" rowspan="3">আলু চাষীর নাম, পিতার নাম ও মোবাইল নম্বর</td>
                                            <td style="border: 1px solid #000" align="center" colspan="2">আলু ফসলের অধীন জমির পরিমাণ</td>
                                            <td style="border: 1px solid #000" align="center" colspan="2">চলতি বছরে কর্তনকৃত জমিতে আলু উৎপাদন</td>
                                            <td style="border: 1px solid #000" align="center" rowspan="3">একর প্রতি গড় ফলন (কেজি)</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center">গত বছর</td>
                                            <td style="border: 1px solid #000" align="center">চলতি বছর</td>
                                            <td style="border: 1px solid #000" align="center" rowspan="2">জমির পরিমাণ (একর)</td>
                                            <td style="border: 1px solid #000" align="center" rowspan="2">উৎপাদিত আলুর পরিমাণ (মে: টন)</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center">(একর)</td>
                                            <td style="border: 1px solid #000" align="center">(একর)</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center">১</td>
                                            <td style="border: 1px solid #000" align="center">২</td>
                                            <td style="border: 1px solid #000" align="center">৩</td>
                                            <td style="border: 1px solid #000" align="center">৪</td>
                                            <td style="border: 1px solid #000" align="center">৫</td>
                                            <td style="border: 1px solid #000" align="center">৬</td>
                                            <td style="border: 1px solid #000" align="center">৭</td>
                                        </tr>
                                        @php
                                            $total_last_year_land_amount = 0;
                                            $total_current_year_land_amount = 0;
                                            $total_last_year_potato_producttion = 0;
                                            $total_current_year_potato_producttion = 0;
                                            $total_average_yield_per_acre = 0;
                                        @endphp
                                        @foreach ($farmersDatas as $farmerData)
                                            <tr>
                                                <td style="border: 1px solid #000" align="center"></td>
                                                <td style="border: 1px solid #000" align="left">
                                                    নাম: {{ $farmerData->farmer ? $farmerData->farmer->farmers_name :'' }}<br>
                                                    পিতার নাম: {{ $farmerData->farmers_father_name }}<br>
                                                    মোবাইল নম্বর: {{ $farmerData->farmer ? $farmerData->farmer->farmers_mobile :'' }} <br>
                                                </td>
                                                <td style="border: 1px solid #000" align="center">{{ $farmerData->last_year_land_amount }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $farmerData->current_year_land_amount }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $farmerData->last_year_potato_producttion }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $farmerData->current_year_potato_producttion }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $farmerData->average_yield_per_acre }}</td>
                                            </tr>
                                            @php
                                                $total_last_year_land_amount = $total_last_year_land_amount + $farmerData->last_year_land_amount;
                                                $total_current_year_land_amount += $farmerData->current_year_land_amount; 
                                                $total_last_year_potato_producttion += $farmerData->last_year_potato_producttion;
                                                $total_current_year_potato_producttion += $farmerData->current_year_potato_producttion;
                                                $total_average_yield_per_acre += $farmerData->average_yield_per_acre;
                                            @endphp
                                        @endforeach
                                        
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" colspan="2">মোট</td>
                                            <td style="border: 1px solid #000" align="center">{{ $total_last_year_land_amount }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $total_current_year_land_amount }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $total_last_year_potato_producttion }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $total_current_year_potato_producttion }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $total_average_yield_per_acre }}</td>
                                        </tr>
                                    </table>

                                    <p style="font-size: 1.3em; font-weight: 500">২.২ আলুর উৎপাদন খরচ (একর প্রতি)</p>

                                    <table class="table">
                                        <tr>
                                            <td style="border: 1px solid #000" align="center" rowspan="2">আলুর জাত/প্রকার</td>
                                            <td style="border: 1px solid #000" align="center">একর প্রতি উৎপাদন</td>
                                            <td style="border: 1px solid #000" align="center">একর প্রতি উৎপাদন খরচ</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center">(মে: টন)</td>
                                            <td style="border: 1px solid #000" align="center">(টাকা)</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left">দেশী</td>
                                            <td style="border: 1px solid #000" align="left">
                                                @if ($upazilaTotalData->potato_varieties == 1)
                                                {{ $upazilaTotalData->production_per_acre }}
                                                @else
                                                -
                                                @endif
                                            </td>
                                            <td style="border: 1px solid #000" align="left">
                                            @if ($upazilaTotalData->potato_varieties == 1)
                                            {{ $upazilaTotalData->production_cost_per_acre }}
                                            @else
                                            -
                                            @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left">উচ্চ ফলনশীল</td>
                                            <td style="border: 1px solid #000" align="left">
                                                @if ($upazilaTotalData->potato_varieties == 2)
                                                {{ $upazilaTotalData->production_per_acre }}
                                                @else
                                                -
                                                @endif
                                            </td>
                                            <td style="border: 1px solid #000" align="left">
                                                @if ($upazilaTotalData->potato_varieties == 2)
                                                {{ $upazilaTotalData->production_cost_per_acre }}
                                                @else
                                                -
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left">ইন্ডিয়ান</td>
                                            <td style="border: 1px solid #000" align="left">
                                                @if ($upazilaTotalData->potato_varieties == 3)
                                                {{ $upazilaTotalData->production_per_acre }}
                                                @else
                                                -
                                                @endif
                                            </td>
                                            <td style="border: 1px solid #000" align="left">
                                                @if ($upazilaTotalData->potato_varieties == 3)
                                                {{ $upazilaTotalData->production_cost_per_acre }}
                                                @else
                                                -
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mt-20">
                                        <div class="row">
                                            <div class="col-lg-4 ml-8">
                                                @if ($list->surveyBy)
                                                    <img src="{{ asset('storage/signatures/'.$list->surveyBy->signature) }}" width="100" height="70">

                                                    <p>
                                                        {{ $list->surveyBy->first_name.' '. $list->surveyBy->middle_name.' '. $list->surveyBy->last_name }}
                                                        
                                                    </p>
                                                    <p>
                                                        Designation: {{ $list->surveyBy->designation->name_en }}
                                                    </p>
                                                @endif
                                                <p>তথ্য সংগ্রহকারীর স্বাক্ষর, নাম ও পদবী</p>
                                                <p>তারিখ : {{ $list->updated_at->format('d/m/Y') }}</p>
                                            </div>
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-4 text-right mr-8">
                                                @if ($list->createdBy)
                                                    <img src="{{ asset('storage/signatures/'.$list->createdBy->signature) }}" width="100" height="70">
                                                @endif
                                                <p>কর্মকর্তার স্বাক্ষর ও সীল</p>
                                                <p>তারিখ : {{ $list->created_at->format('d/m/Y') }}</p>
                                            </div>
                                        </div>
                                        
                                        <p class="text-center">তফসিল পূরণের নির্দেশাবলী</p>

                                        <p style="font-weight: bold; margin-left: 50px;">১। আলু কর্তন:</p>

                                        <p>১. সব সংখ্যা ইংরেজিতে লিখতে হবে।</p>
                                        <p>২. নমুনা দাগগুচ্ছের অধীনে আলু ফসল চাষ হয়ে থাকলে সেখানে আলু কর্তন করতে হবে। উপজেলায় অবস্থিত কোন দাগগুচ্ছে (cluster) আলু চাষ না হতে থাকলে নমুনা ভিত্তিতে একটি আলুর জমি চয়ন করে কর্তন করতে হবে। </p>
                                        <p>৩. আলু কর্তনের জন্য দৈবচয়নের ভিত্তিতে কমপক্ষে ২টি আলুর সারি চয়ন করতে হবে এবং সারি ২টির অবস্থান ১.২ ছকের ৩ ও ৪ এর কলামে ইংরেজিতে লিখতে হবে। </p>
                                        <p>৪. জমির পরিমাণ একরে লিখতে হবে। এক একর (১০০ শতাংশের) কম হলে দশমিকের মাধ্যমে লিখতে হবে - যেমনঃ 0.35 বা 0.60 এভাবে লিখতে হবে।</p>

                                        <p style="font-weight: bold; margin-left: 50px;">২। আলুর উৎপাদন:</p>

                                        <p>৫. মৌজায় অবস্থিত নমুনা দাগগুচ্ছ বা দাগগুচ্ছের বাহিরে কোন জমিতে আলু কর্তন করলে সে মৌজার বা পার্শবর্তী মৌজার ৪ জন কৃষককে দৈব চয়নের ভিত্তিতে নির্বাচন করে তাদের নিকট হতে তথ্য সংগ্রহ করতে হবে। </p>
                                        <p>৬. ছক ২.১ এক ৫ কলামে কৃষক যে পরিমাণ জমি চলতি বছর কর্তন করেছে তার পরিমাণ এবং কর্তনকৃত জমিতে মোট যে আলু পেয়েছে তার হিসাব কলাম ৬-এ লিখতে হবে। একর প্রতি গড় ফলন লিখুন। </p>

                                        <button class="float-right btn btn-primary" id="noprintbtn" onclick="window.print()">Print</button>
                                    </div>
                                    

                                    
                                </div>

                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
</div>
@endsection