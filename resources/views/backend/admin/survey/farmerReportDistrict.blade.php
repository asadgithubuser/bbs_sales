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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Farmers Data Listing</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted">Farmers Data Listing</a>
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
                                    <p class="font-weight-bold mt-4">কৃষক তালিকা ফরম</p>
                                    <p class="mt-4">(Farmer Listing Form)</p>
                                </div>
                                <div class="col-3">
                                    <p class="font-weight-bold text-right">সংকলন ফরম - ১</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ajax-data-container pt-3">
                                    <p style="font-size: 1.3em; font-weight: 500">এলাকা পরিচিতি:</p>
                                    <table class="table">
                                        <tr>
                                            <td style="border: 1px solid #000" align="left">বিভাগ: <b>{{ $list->division ? $list->division->name_bn : '' }}</b></td>
                                            <td style="border: 1px solid #000" align="left">জেলা: <b>{{ $list->district ? $list->district->name_bn : '' }}</b></td>
                                            <td style="border: 1px solid #000" align="left">উপজেলা: <b>{{ $list->upazila ? $list->upazila->name_bd : '' }}</b></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left">কোড: <b>{{ $list->division ? $list->division->division_bbs_code : '' }}</b></td>
                                            <td style="border: 1px solid #000" align="left">কোড: <b>{{ $list->district ? $list->district->district_bbs_code : '' }}</b></td>
                                            <td style="border: 1px solid #000" align="left">কোড: <b>{{ $list->upazila ? $list->upazila->upazila_bbs_code : '' }}</b></td>
                                        </tr>
                                        <tr>
                                            {{-- <td style="border: 1px solid #000" align="left">দাগগুচ্ছ অবস্থিত মৌজার নাম: {{ $list->mouza ? $list->mouza->name_bn : '' }}</td> --}}
                                            <td style="border: 1px solid #000" align="left">সন (ইংরেজিতে): {{ $list->year }}</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">তালিকা তৈরির সময় কাল: {{ $list->surveyNotification ? $list->surveyNotification->notification_start_data_field : '..............' }} তারিখ হতে {{ $list->surveyNotification ? $list->surveyNotification->notification_end_data_field : '..............' }}</td>
                                        </tr>
                                    </table>
                                    <table class="table">
                                        
                                        <tr>
                                            <td style="border: 1px solid #000"></td>
                                            <td style="border: 1px solid #000"></td>
                                            <td style="border: 1px solid #000"></td>
                                            <td colspan="3" style="border: 1px solid #000">কৃষকের শ্রেণী বিভাগ</td>
                                            <td colspan="3" style="border: 1px solid #000"></td>
                                            <td colspan="3" style="border: 1px solid #000"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000">ক্রমিক নং</td>
                                            <td style="border: 1px solid #000">খানার প্রকার: <br> কৃষি খানা-১ <br> অকৃষি খানা-২</td>
                                            <td style="border: 1px solid #000">খানা প্রধানের নাম, পিতার নাম ও মোবাইল নম্বর</td>
                                            <td style="border: 1px solid #000">ছোট/ক্ষুদ্র <br>কৃষক/চাষী <br> (০.০৫ - ২.৪৯ একর)</td>
                                            <td style="border: 1px solid #000">মাঝারী <br> কৃষক/চাষী <br> (২.৫০ - ৭.৪৯ একর)</td>
                                            <td style="border: 1px solid #000">বড়/বৃহৎ <br>কৃষক/চাষী <br> (৭.৫০ ও তদূর্ধ্ব একর জমি)</td>
                                            
                                            <td style="border: 1px solid #000">গ্রামের নাম</td>
                                            <td style="border: 1px solid #000">স্থায়ী ফসল</td>
                                            <td style="border: 1px solid #000">অস্থায়ী ফসল</td>
                                            <td style="border: 1px solid #000">নমুনা চাষীর নং</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000">১</td>
                                            <td style="border: 1px solid #000">২</td>
                                            <td style="border: 1px solid #000">৩</td>
                                            <td style="border: 1px solid #000">৪</td>
                                            <td style="border: 1px solid #000">৫</td>
                                            <td style="border: 1px solid #000">৬</td>
                                            <td style="border: 1px solid #000">৭</td>
                                            <td style="border: 1px solid #000">৮</td>
                                            <td style="border: 1px solid #000">৯</td>
                                            <td style="border: 1px solid #000">১০</td>
                                        </tr>
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($farmersDatas as $data)
                                            
                                            <tr>
                                                <td style="border: 1px solid #000">{{ $loop->index + 1}}</td>
                                                <td style="border: 1px solid #000">{{ $data->food_type == 1 ? 'Agriculture' : 'Non-Agriculture' }}</td>
                                                <td style="border: 1px solid #000"><b>Name: {{ ucfirst($data->farmers_name) }}</b>, <br> <b>Mobile: {{ $data->farmers_mobile }}</b></td>
                                                <td style="border: 1px solid #000">
                                                    @if ($data->farmers_class_division_type == 1)
                                                    {{ $data->land_amount }} acres 
                                                    @else 
                                                    -
                                                    @endif
                                                </td>
                                                <td style="border: 1px solid #000">
                                                    @if ($data->farmers_class_division_type == 2)
                                                    {{ $data->land_amount }} acres 
                                                    @else 
                                                    -
                                                    @endif
                                                </td>
                                                <td style="border: 1px solid #000">
                                                    @if ($data->farmers_class_division_type == 3)
                                                    {{ $data->land_amount }} acres 
                                                    @else 
                                                    -
                                                    @endif
                                                </td>
                                                

                                                <td style="border: 1px solid #000">
                                                    {{ $data->village_name }}
                                                </td>
                                                <td style="border: 1px solid #000">
        
                                                    @php
                                                        $values = explode(',', $data->permanent_crop_ids);
                                                    @endphp
                                                    @foreach ($values as $crop)
                                                        {{ $data->cropName($crop) }}
                                                        @if ($loop->last)
                                                        @else
                                                            ,
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td style="border: 1px solid #000">
        
                                                    @php
                                                        $values = explode(',', $data->temporary_crop_ids);
                                                    @endphp
                                                    @foreach ($values as $crop)
                                                        {{ $data->cropName($crop) }}
                                                        @if ($loop->last)
                                                        @else
                                                            ,
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td style="border: 1px solid #000">
                                                    @if($data->food_type == 1)
                                                    
                                                        {{ $count = $count + 1 }}
                                                    @else 
                                                    -
                                                    @endif
                                                </td>

                                            </tr>
                                            
                                        @endforeach
                                    </table>                                    
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mt-20">
                                        <div class="row">
                                            <div class="col-lg-4 ml-8">
                                                <p>{{ $list->surveyBy ? ucfirst($list->surveyBy->first_name). ' ' . ucfirst($list->surveyBy->middle_name). ' ' . ucfirst($list->surveyBy->last_name) : '' }}</p>
                                                @if ($list->surveyBy)
                                                    
                                                <img src="{{ asset('storage/signatures/'.$list->surveyBy->signature) }}" width="100" height="70">
                                                @endif
                                                
                                                <p>তথ্য সংগ্রহকারীর স্বাক্ষর, পূর্ণ নাম ও পদবী</p>
                                                <p>তারিখ : {{ $list->updated_at->format('d-m-Y') }}</p>
                                            </div>
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-4 text-right mr-8">
                                                
                                                <p>{{ $list->createdBy ? ucfirst($list->createdBy->first_name). ' ' . ucfirst($list->createdBy->middle_name). ' ' . ucfirst($list->createdBy->last_name) : '' }}</p>
                                                @if ($list->createdBy)
                                                    
                                                <img src="{{ asset('storage/signatures/'.$list->createdBy->signature) }}" width="100" height="70">
                                                @endif
                                                
                                                <p>কর্মকর্তার স্বাক্ষর ও সীল</p>
                                                <p>তারিখ : {{ $list->created_at->format('d-m-Y') }}</p>
                                            </div>
                                        </div>
                                        
                                        <p class="text-center">তালিকা ফরম পূরণের নির্দেশাবলী ও নমুনা চাষী নির্বাচন পদ্ধতি</p>
                                        <p>১. প্রত্যেক উপজেলার প্রতিটি ইউনিয়ন হতে যে সকল মৌজায় দাগগুচ্ছ আছে সেগুলো হতে দৈব চয়নের মাধ্যমে একটি মৌজা নির্বাচন করূন। কোন ইউনিয়নে দাগগুচ্ছ না থাকলে দৈব চয়নের মাধ্যমে যে কোন একটি মৌজা নির্বাচন করতে হবে। নির্বাচিত মৌজার সকল খানা তালিকায় লিপিবদ্ধ করুন। </p>
                                        <p>২. খানাটি যদি কৃষি খানা হয় তবে কোড ১ এবং অকৃষি খানা হলে ২ কোড ২নং কলামে লিখুন। কলাম ৩ এ খানা প্রধানের নাম ও মোবাইল নাম্বার লিখুন। কলাম ৪,৫ ও ৬ এ খানার পরিচালনাধীন কৃষি জমির পরিমান জেনে প্রযোজ্য ঘরে লিখুন। উদাহরণ কোন কৃষি খানার জমির পরিমান ৩.৫০ হলে ৫ কলামে ৩.৫০ লিখতে হবে। </p>
                                        <p>৩. এ কৃষক তালিকাটি ফসল কর্তন ও উৎপাদন জরিপ (তফসিল-২) এবং অস্থায়ী ফসল উৎপাদন জরিপ (তফসিল-৩) এর কাজে ব্যবহার করা হবে। </p>
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