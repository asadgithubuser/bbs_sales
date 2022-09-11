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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Maize Crop Compilation Form</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted">Maize Crop Compilation Form</a>
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
                                    <p class="font-weight-bold mt-4">ভূট্টা ফসল হিসাব সংকলন ফরম</p>
                                    <p class="mt-4">(Maize Crop Compilation Form)</p>
                                </div>
                                <div class="col-3">
                                    <p class="font-weight-bold text-right">সংকলন ফরম - ৬</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ajax-data-container pt-3">
                                    <p style="font-size: 1.3em; font-weight: 500">এলাকা পরিচিতি :</p>
                                    <table class="table">
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" colspan="6">বিভাগ: {{ $list->division ? $list->division->name_bn : '' }}</td>
                                            {{-- <td style="border: 1px solid #000" align="left" colspan="2">জেলা: {{ $list->district ? $list->district->name_bn : '' }}</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">উপজেলা: {{ $list->upazila ? $list->upazila->name_bd : '' }}</td> --}}
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" colspan="6">কোড: {{ $list->division ? $list->division->division_bbs_code : '' }}</td>
                                            {{-- <td style="border: 1px solid #000" align="left" colspan="2">কোড: {{ $list->district ? $list->district->district_bbs_code : '' }}</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">কোড: {{ $list->upazila ? $list->upazila->upazila_bbs_code : '' }}</td> --}}
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="middle">ফসলের নাম:</td>
                                            <td style="border: 1px solid #000" align="middle">{{ $surveyNotification->crop ? $surveyNotification->crop->name_bn : '' }}</td>
                                            <td style="border: 1px solid #000" align="middle">ফসলের জাত:</td>
                                            <td style="border: 1px solid #000" align="middle">{{ $surveyNotification->cropType ? $surveyNotification->cropType->crop_type_bn : '' }}</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">সংকলনের তারিখ "{{$surveyNotification->start_date_of_collection}}" হতে  "{{$surveyNotification->end_date_of_collection}}" পর্যন্ত</td>
                                        </tr>
                                    </table>

                                    <p style="font-size: 1.3em; font-weight: 500">১| ভুট্টা ফসলের অধীন জমির পরিমাণ ও উৎপাদন হার</p>
                                    <table class="table">
                                        <tr>
                                            <td style="border: 1px solid #000" align="middle" rowspan="2">বিভাগ</td>
                                            <td style="border: 1px solid #000" align="middle" colspan="2">ফসলের অধীন জমির পরিমাণ (একরে)</td>
                                            <td style="border: 1px solid #000" align="middle" colspan="2">মোট ফসল উৎপাদন (মে: টন)</td>
                                            <td style="border: 1px solid #000" align="middle" rowspan="2">চলতি বছর একর প্রতি ফলন হার (কেজি)</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="middle">গত বছর</td>
                                            <td style="border: 1px solid #000" align="middle">চলতি বছর</td>
                                            <td style="border: 1px solid #000" align="middle">গত বছর</td>
                                            <td style="border: 1px solid #000" align="middle">চলতি বছর</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left">১</td>
                                            <td style="border: 1px solid #000" align="left">২</td>
                                            <td style="border: 1px solid #000" align="left">৩</td>
                                            <td style="border: 1px solid #000" align="left">৪</td>
                                            <td style="border: 1px solid #000" align="left">৫</td>
                                            <td style="border: 1px solid #000" align="left">৬</td>
                                        </tr>
                                        {{-- data loop statrt --}}
                                        @php
                                            $lastYearTotalLand = 0;
                                            $currentYearTotalLand = 0;
                                            $lastYearTotalProduction = 0;
                                            $currentYearTotalProduction = 0;
                                            $lastTotalProductionRate = 0;
                                            $TotalProductionRate = 0;
                                            $lastAcreReflectionRate = 0;
                                            $AcreReflectionRate = 0;
                                        @endphp
                                        
                                        @foreach ($maizes as $maize)
                                            @php
                                                $data = 0;
                                                foreach ($maize->districtCrops($maize->district_id) as $key) {

                                                    $data = $data + 1;
                                                }
                                            @endphp
                                            <tr>
                                                <td style="border: 1px solid #000" align="left" rowspan="{{ $data + 1 }}">{{ $maize->district ? $maize->district->name_bn : '' }}</td>
                                                @foreach ($maize->districtCrops($maize->district_id) as $item)
                                                    <tr>
                                                        {{-- <td style="border: 1px solid #000" align="left">{{ $item->district ? $item->district->name_bn : '' }}</td> --}}
                                                        <td style="border: 1px solid #000" align="left">{{ $item->last_year_land_amount }}</td>
                                                        <td style="border: 1px solid #000" align="left">{{ $item->current_year_land_amount }}</td>
                                                        <td style="border: 1px solid #000" align="left">{{ $item->last_year_land_producttion }}</td>
                                                        <td style="border: 1px solid #000" align="left">{{ $item->current_year_land_producttion }}</td>
                                                        <td style="border: 1px solid #000" align="left">{{ $item->current_year_land_producttion / $item->current_year_land_amount * 1000 }}</td>
                                                    </tr>

                                                    @php
                                                        $lastYearTotalLand += $item->last_year_land_amount;
                                                        $currentYearTotalLand += $item->current_year_land_amount;
                                                        $lastYearTotalProduction += $item->last_year_land_producttion;
                                                        $currentYearTotalProduction += $item->current_year_land_producttion;
                                                        $lastTotalProductionRate += $item->last_year_land_producttion / $item->last_year_land_amount * 1000;
                                                        $TotalProductionRate += $item->current_year_land_producttion / $item->current_year_land_amount * 1000;
                                                        $lastAcreReflectionRate += $item->last_acre_reflection_rate;
                                                        $AcreReflectionRate += $item->acre_reflection_rate;
                                                    @endphp
                                                @endforeach
                                            </tr>
                                        @endforeach
                                        
                                        {{-- data loop end --}}

                                        <tr>
                                            <td style="border: 1px solid #000" align="left">মোট</td>
                                            <td style="border: 1px solid #000" align="left">{{$lastYearTotalLand}}</td>
                                            <td style="border: 1px solid #000" align="left">{{$currentYearTotalLand}}</td>
                                            <td style="border: 1px solid #000" align="left">{{$lastYearTotalProduction}}</td>
                                            <td style="border: 1px solid #000" align="left">{{$currentYearTotalProduction}}</td>
                                            <td style="border: 1px solid #000" align="left">{{$TotalProductionRate}}</td>
                                        </tr>
                                        
                                    </table>
                                </div>

                                <div class="row">
                                    <table class="table">
                                        <tr>
                                            <td style="border: none;" align="left" rowspan="2">২। উপজেলা/থানায় ভুট্টার অধীন মোট প্রাক্কলিত জমির পরিমান (একরে)</td>
                                            <td style="border: none;"  align="left">(ক) গত বছর</td>
                                            <td style="border: none;"  align="left">{{$lastYearTotalLand}} একর</td>
                                        </tr>
                                        <tr>
                                            <td style="border: none;"  align="left">(খ) চলতি বছর</td>
                                            <td style="border: none;"  align="left">{{$currentYearTotalLand}} একর</td>
                                        </tr>

                                        <tr>
                                            <td style="border: none;" align="left" rowspan="2">৩। উপজেলা/থানায় ভুট্টার প্রাক্কলিত মোট উৎপাদন</td>
                                            <td style="border: none;"  align="left">(ক) গত বছর</td>
                                            <td style="border: none;"  align="left">{{$lastYearTotalProduction}} মে.টন</td>
                                        </tr>
                                        <tr>
                                            <td style="border: none;"  align="left">(খ) চলতি বছর</td>
                                            <td style="border: none;"  align="left">{{$currentYearTotalProduction}} মে.টন</td>
                                        </tr>

                                        <tr>
                                            <td style="border: none;" align="left" rowspan="2">৪। উপজেলা/থানায় ভুট্টার একর প্রতি গড় ফলন হার</td>
                                            <td style="border: none;"  align="left">(ক) গত বছর</td>
                                            <td style="border: none;"  align="left">{{$lastTotalProductionRate}} কেজি</td>
                                        </tr>
                                        <tr>
                                            <td style="border: none;"  align="left">(খ) চলতি বছর</td>
                                            <td style="border: none;"  align="left">{{$TotalProductionRate}} কেজি</td>
                                        </tr>

                                        <tr>
                                            <td style="border: none;" align="left" rowspan="3">৫। গত বছরের তুলনায় চলতি বছর জমির পরিমাণ, উৎপাদন ও ফলনের হ্রাস/বৃদ্ধি শতকরা হার</td>
                                            <td style="border: none;"  align="left">(ক) জমির পরিমাণ</td>
                                            <td style="border: none;"  align="left">শতকরা {{($currentYearTotalLand - $lastYearTotalLand) / 100 }} ভাগ</td>
                                        </tr>
                                        <tr>
                                            <td style="border: none;"  align="left">(খ) একর প্রতি ফলন</td>
                                            <td style="border: none;"  align="left">শতকরা {{($AcreReflectionRate - $lastAcreReflectionRate) / 100 }} ভাগ</td>
                                        </tr>
                                        <tr>
                                            <td style="border: none;"  align="left">(গ) ফসল উৎপাদন</td>
                                            <td style="border: none;"  align="left">শতকরা {{($currentYearTotalProduction - $lastYearTotalProduction) / 100 }} ভাগ</td>
                                        </tr>

                                        <tr>
                                            <td style="border: none;" align="left" rowspan="3">৬। গত বছর হতে চলতি বছর; আবাদি জমির পরিমাণ উৎপাদন ও ফলন হার হ্রাস/বৃদ্ধির কারণ (লিখুন)</td>
                                            <td style="border: none;"  align="left" colspan="2">
                                                @if ($comment)
                                                    
                                                {{$comment->field_reason ? $comment->field_reason : '........................'}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: none;"  align="left" colspan="2">
                                                @if ($comment)
                                                {{$comment->production_reason ? $comment->production_reason : '........................'}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: none;"  align="left" colspan="2">
                                                @if ($comment)
                                                {{$comment->yield_reason ? $comment->yield_reason : '........................'}}
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
                                        
                                        <p class="text-center" style="font-weight: 600">তফসিল পূরণের নির্দেশাবলী</p>

                                        <p>১. ভুট্টা ফসল উৎপাদন জরিপের ক্ষেত্রে তফসিল-১ এর সাহায্য নেয়া যেতে পারে। ইউনিয়ন ভিত্তিক তথ্য সংগ্রহ করতে হবে। </p>

                                        <p>২. ভুট্টা চাষীর নিকট হতে তথ্য জেনে কলাম ৩ হতে ৮ পর্যন্ত পূরণ করতে হবে। মোট ভুট্টা উৎপাদনের হিসেবে শেষ সারিতে লিখতে হবে। </p>

                                        <p>৩. প্রশ্ন ২-৪ হিসাব সঠিকভাবে লিখতে হবে। প্রশ্ন ৫ এর হ্রাস/বৃদ্ধির প্রধান কারণসমূহ বিস্তারিত লিখতে হবে।</p>

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