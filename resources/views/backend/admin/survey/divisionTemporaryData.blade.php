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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Temporary Crop Production Survey</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted">Temporary Crop Production Survey</a>
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
                                    <p class="font-weight-bold mt-4">অস্থায়ী ফসল উৎপাদন জরিপ তফসিল</p>
                                    <p class="mt-4">(Temporary Crop Production Survey)</p>
                                </div>
                                <div class="col-3">
                                    <p class="font-weight-bold text-right">সংকলন - ৩</p>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive ajax-data-container pt-3">
                                    <p style="font-size: 1.3em; font-weight: 500">১। এলাকা পরিচিতি :</p>
                                    <table class="table">
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" colspan="6">বিভাগ: <b>{{ $list->division ? $list->division->name_bn : '' }}</b></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" colspan="3">কোড: </td>
                                            <td style="border: 1px solid #000" align="left"  colspan="3"><b>{{ $list->division ? $list->division->division_bbs_code : '' }}</b></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" rowspan="2">ফসলের নাম: <b>{{ $surveyNotification->crop ? $surveyNotification->crop->name_bn : '' }}</b></td>
                                            <td style="border: 1px solid #000" align="left" rowspan="2" colspan="2">ফসলের জাত: <b>{{ $surveyNotification->cropType ? $surveyNotification->cropType->crop_type_bn : '' }}</b></td>
                                            <td style="border: 1px solid #000" align="left">ফসলের বছর: </td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">তথ্য সংগ্রহের তারিখ: </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left"><b>{{ $list->year }}</b></td>
                                            <td style="border: 1px solid #000" align="left" colspan="2"><b>{{ date('d/m/Y', strtotime($list->year)) }}</b></td>
                                        </tr>
                                    </table>

                                    <p style="font-size: 1.3em; font-weight: 500">১.১ ফসলের অধীন জমির পরিমান, উৎপাদন ও ফলনের হার</p>
                                    <table class="table">
                                        <tr>
                                            {{-- <td style="border: 1px solid #000" align="left" rowspan="2">ইউনিয়নের নাম</td> --}}
                                            {{-- <td style="border: 1px solid #000" align="left" rowspan="2">কৃষকের নাম ও মোবাইল নম্বর</td> --}}
                                            <td style="border: 1px solid #000" align="left" rowspan="2">জেলা</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">জমির পরিমান (একর)</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">মোট উৎপাদন (মণ)</td>
                                            <td style="border: 1px solid #000" align="left" rowspan="2">চলতি বছরে একর প্রতি ফলনের হার (কেজি)</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left">গত বছর {{ date("Y", strtotime("-1 year")) }}</td>
                                            <td style="border: 1px solid #000" align="left">চলতি বছর {{ date('Y') }}</td>
                                            <td style="border: 1px solid #000" align="left">গত বছর {{ date("Y", strtotime("-1 year")) }}</td>
                                            <td style="border: 1px solid #000" align="left">চলতি বছর {{ date('Y') }}</td>
                                        </tr>
                                        <tr>
                                            {{-- <td style="border: 1px solid #000" align="left">১</td> --}}
                                            {{-- <td style="border: 1px solid #000" align="left">২</td> --}}
                                            <td style="border: 1px solid #000" align="left">১</td>
                                            <td style="border: 1px solid #000" align="left">২</td>
                                            <td style="border: 1px solid #000" align="left">৩</td>
                                            <td style="border: 1px solid #000" align="left">৪</td>
                                            <td style="border: 1px solid #000" align="left">৫</td>
                                            <td style="border: 1px solid #000" align="left">৬</td>
                                            {{-- <td style="border: 1px solid #000" align="left">৭</td> --}}
                                        </tr>

                                        @php
                                            $land_total_percentage = 0;
                                            $production_total_percentage = 0;
                                            $acre_total_percentage = 0;
                                            $production_total = 0;
                                            $avg_yield_acre_total = 0;
                                            $last_yield_acre_total = 0;
                                            $totalLastLandAmount = 0;
                                            $totalCurrentLandAmount = 0;
                                            $totalCurrentProduction = 0;
                                            $totallastProduction = 0;
                                            $totallastAcre = 0;
                                            $X = 0;
                                            $XX = 0;
                                            $Y = 0;
                                            $YY = 0;
                                            $alltotalLastLandAmount = 0;
                                            $alltotalCurrentLandAmount = 0;
                                            $alltotalCurrentLandAmount = 0;
                                            $alltotalCurrentProduction = 0;
                                            $alltotallastProduction = 0;
                                            $alltotalAcreReflection = 0;
                                            $alltotalLastAcreReflection = 0;
                                            $XXX = 0;
                                            $YYY = 0;

                                            $total_last_year_land_producttion = 0;
                                            $total_current_year_land_producttion = 0;
                                            $total_acre_reflection_rate = 0;
                                        @endphp

                                        @foreach ($temporaryCrops as $temporaryCrop)
                                            @php
                                                $data = 0;
                                                foreach($temporaryCrop->districtCrops($temporaryCrop->district_id) as $key){
                                                    $data = $data + 1;

                                                }
                                            @endphp
                                            <tr>
                                                <td style="border: 1px solid #000" align="left" rowspan="{{ $data + 1 }}">{{ $loop->index + 1}}.  {{ $temporaryCrop->district ? $temporaryCrop->district->name_bn : '' }}</td>

                                                @foreach ($temporaryCrop->districtCrops($temporaryCrop->district_id) as $item)
                                                    <tr>

                                                        {{-- <td style="border: 1px solid #000" align="left">
                                                            {{ $item->farmer ? $item->farmer->farmers_name : '' }}
                                                            <br>
                                                            {{ $item->farmer ? $item->farmer->farmers_mobile : '' }}
                                                        </td> --}}
                                                        {{-- <td style="border: 1px solid #000" align="left">{{ $item->mouza ? $item->mouza->name_bn : '' }}</td> --}}
                                                        <td style="border: 1px solid #000" align="left">{{ $item->last_year_land_amount }}</td>
                                                        <td style="border: 1px solid #000" align="left">{{ $item->current_year_land_amount }}</td>
                                                        <td style="border: 1px solid #000" align="left">{{ $item->last_year_land_producttion }}</td>
                                                        <td style="border: 1px solid #000" align="left">{{ $item->current_year_land_producttion }}</td>
                                                        <td style="border: 1px solid #000" align="left">{{ number_format((float)$item->acre_reflection_rate, 4, '.', '' ) }} </td>
                                                    </tr>

                                                    @php
                                                        $totalLastLandAmount += $item->last_year_land_amount;
                                                        $totalCurrentLandAmount += $item->current_year_land_amount;
                                                        $totalCurrentProduction += $item->current_year_land_producttion;
                                                        $totallastProduction += $item->last_year_land_producttion;

                                                        $X += ($item->last_year_land_amount / $item->current_year_land_amount);
                                                        $Y += ($item->last_year_land_producttion / $item->current_year_land_producttion);

                                                        $XX += $X * $item->last_year_land_amount;
                                                        $YY += $Y * $item->last_year_land_producttion;
                                                        $avg_yield_acre_total += $item->acre_reflection_rate;
                                                        $last_yield_acre_total += $item->last_acre_reflection_rate;
                                                        $total_last_year_land_producttion += $item->last_year_land_producttion;
                                                        $total_current_year_land_producttion +=$item->current_year_land_producttion;
                                                        $total_acre_reflection_rate += $item->acre_reflection_rate;
                                                    @endphp

                                                @endforeach

                                                
                                                
                                            </tr>

                                            @php
                                                $alltotalLastLandAmount += $totalLastLandAmount;
                                                $alltotalCurrentLandAmount += $totalCurrentLandAmount;
                                                $alltotalCurrentProduction += $totalCurrentProduction;
                                                $alltotallastProduction += $totallastProduction;
                                                $alltotalAcreReflection += $avg_yield_acre_total;
                                                $alltotalLastAcreReflection += $last_yield_acre_total;
                                                $YYY += $YY;
                                                $XXX += $XX;
                                            @endphp
                                        @endforeach
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" >মোট:</td>
                                            <td style="border: 1px solid #000" align="left">{{ $totalLastLandAmount }}</td>
                                            <td style="border: 1px solid #000" align="left">{{ $totalCurrentLandAmount }}</td>
                                            <td style="border: 1px solid #000" align="left">{{ $total_last_year_land_producttion }}</td>
                                            <td style="border: 1px solid #000" align="left">{{ $total_current_year_land_producttion }}</td>
                                            <td style="border: 1px solid #000" align="left">{{ number_format((float)$total_acre_reflection_rate, 4, '.', '' ) }}</td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="row">
                                    @php
                                        $land_total_percentage += ($alltotalCurrentLandAmount - $alltotalLastLandAmount) / 100;
                                        $production_total_percentage += ($alltotalCurrentProduction - $alltotallastProduction) / 100;
                                        $acre_total_percentage += ($alltotalAcreReflection - $alltotalLastAcreReflection) / 100;
                                    @endphp

                                    <table class="table">
                                        <tr>
                                            <td style="border: none;" align="left" colspan="2">
                                                X = চলতি বছরের সাথে গত বছরের আয়তনের আনুপাতিক হার। <br>
                                                Y = চলতি বছরের সাথে গত বছরের উৎপাদনের আনুপাতিক হার।          
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: none;" align="left" rowspan="2">২। উপজেলা/থানায় এ ফসলের অধীন (আনুপাতিক হরে) মোট প্রাক্কলিত জমির পরিমান (একরে)</td>
                                            <td style="border: none;" align="left">(ক) গত বছরে জমির পরিমান : {{ $alltotalLastLandAmount }} একর</td>
                                        </tr>
                                        <tr>
                                            <td style="border: none;" align="left">(খ) চলতি বছরে : {{ $alltotalCurrentLandAmount }} একর</td>
                                        </tr>

                                        <tr>
                                            <td style="border: none;" align="left" rowspan="2">৩। চলতি বছরে উপজেলা/থানায় এ ফসলের (আনুপাতিক হরে) প্রাক্কলিত মোট উৎপাদন (মন)</td>
                                            <td style="border: none;" align="left">(ক) ফসলের উৎপাদন : {{ $alltotalCurrentProduction }} মণ</td>
                                        </tr>
                                        <tr>
                                            <td style="border: none;" align="left">(খ) একর প্রতি ফলন : {{ number_format((float)$alltotalAcreReflection, 4, '.', '' )}} মণ</td>
                                        </tr>

                                        <tr>
                                            <td style="border: none;" align="left" rowspan="3">৪। গত বছরের তুলনায় চলতি বছরে জমির পরিমান, উৎপাদন ও ফলনের হ্রাস/বৃদ্ধির শতকরা হার।</td>
                                            <td style="border: none;" align="left">(ক) জমির পরিমান শতকরা : {{ number_format((float)$land_total_percentage, 4, '.', '' )}} ভাগ</td>
                                        </tr>
                                        <tr>
                                            <td style="border: none;" align="left">(খ) একর প্রতি ফলন শতকরা : {{ number_format((float)$acre_total_percentage, 4, '.', '' )}} ভাগ</td>
                                        </tr>
                                        <tr>
                                            <td style="border: none;" align="left">(গ) ফসল উৎপাদন শতকরা : {{ number_format((float)$production_total_percentage, 4, '.', '' )}} ভাগ</td>
                                        </tr>

                                        <tr>
                                            <td style="border: none;" align="left" rowspan="3">৫। গত বছর হতে চলতি বছরে আবাদি জমির পরিমান, উৎপাদন ও ফলন হ্রাস/বৃদ্ধির কারণ লিখুন।</td>
                                            <td style="border: none;" align="left">{{ $comment ? $comment->field_reason : '...............' }}</td>
                                        </tr>
                                        <tr>
                                            <td style="border: none;" align="left">{{ $comment ? $comment->production_reason : '...............' }}</td>
                                        </tr>
                                        <tr>
                                            <td style="border: none;" align="left">{{ $comment ? $comment->yield_reason : '...............' }}</td>
                                        </tr>
                                    </table>
                                    <table class="table">
                                        {{-- No: 6 start --}}
                                        <tr>
                                            <td style="border: none; width:40%;" align="left" rowspan="3">৬। ফসল কালীন সময়ে আবহাওয়ার অবস্থা (টিক চিহ্ন দিন)</td>
                                            <td style="border: none;" align="left">(ক) ভাল</td>
                                            @if ($comment != NULL && $comment->weather == 1)
                                                <td style="border: 1px solid black;" align="middle">
                                                    <i class="fa fa-check" style="font-size: 1.5em; color:#000"></i>
                                                </td>
                                            @else
                                                <td style="border: 1px solid black;" align="middle"></td>
                                            @endif
                                            <td style="border: none;" align="left"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: none;" align="left">(খ) মোটামুটি</td>
                                            @if ($comment != NULL && $comment->weather == 2)
                                                <td style="border: 1px solid black;" align="middle">
                                                    <i class="fa fa-check" style="font-size: 1.5em; color:#000"></i>
                                                </td>
                                            @else
                                                <td style="border: 1px solid black;" align="middle"></td>
                                            @endif
                                            <td style="border: none;" align="left"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: none;" align="left">(গ) খারাপ</td>
                                            @if ($comment != NULL && $comment->weather == 3)
                                                <td style="border: 1px solid black;" align="middle">
                                                    <i class="fa fa-check" style="font-size: 1.5em; color:#000"></i>
                                                </td>
                                            @else
                                                <td style="border: 1px solid black;" align="middle"></td>
                                            @endif
                                            <td style="border: none;" align="left"></td>
                                        </tr>
                                        {{-- No: 7 --}}
                                        <tr>
                                            <td style="border: none;" align="left" colspan="2">৭। প্রাকৃতিক দুর্যোগে (যদি হয়ে থাকে) ফসলের ক্ষতির হার</td>
                                            <td style="border: none" align="left">শতকরা {{$comment ? $comment->weather_loss_percentage : '...............'}} ভাগ</td>
                                            <td style="border: none" align="left"></td>
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
                                        
                                        <p class="text-center">তফসিল পূরণ/তথ্য সংগ্রহের নির্দেশাবলী</p>

                                        <p>১. উপজেলার প্রতিটি ইউনিয়নের ৫ জন ফসল চাষীর নিকট হতে তথ্য সংগ্রহ করতে হবে। ৫ জন চাষী নির্বাচন কৃষক তালিকা ফরম (সংকলন-১) হতে দৈব চয়ন পদ্ধতিতে করতে হবে। </p>

                                        <p>২. কৃষক তালিকা ফরম (সংকলন-১) হতে ৩ জন ক্ষুদ্র কৃষক, ১ জন মাঝারী কৃষক এবং ১ জন বড় কৃষক দৈব চয়ন পদ্ধতিতে নির্বাচিত করে তথ্য সংগ্রহ করতে হবে। </p>

                                        <p>৩. প্রতি বছর এ ৫ জন নির্বাচিত কৃষকের নিকট হতে উৎপাদন তথ্য সংগ্রহ করা যেতে পারে। </p>

                                        <p>৪. প্রশ্ন ৪ এ শতকরা হ্রাস/বৃদ্ধি গত বছরের ভিত্তিতে করতে হবে। হ্রাস হলে শতকরা হিসাবের সামনে (-) চিহ্ন দিয়ে লিখতে হবে। </p>

                                        <p>৫. প্রশ্ন ৫ এ হ্রাস/বৃদ্ধির কারণ হিসাবে ভাল আবহাওয়া, প্রাকৃতিক দুর্যোগ, অর্থনৈতিকভাবে লাভজনক ইত্যাদি কারণ হতে পারে। বিস্তারিত কারণ উল্লেখ করুন।</p>

                                        <p>৬. এ জরিপ তথ্যের ভিত্তিতে প্রয়োজনীয় উপাত্ত "সংকলন ফরম-৩" পূরণ করে বিভাগীয়/জেলায় অফিসে নির্ধারিত সময়ের মধ্যে প্রেরণ করতে হবে। বিভাগীয় অফিস উপজেলা/জেলা সংকলন ফরম ৩ এর ভিত্তিতে উপজেলা/থানাওয়ারী তথ্য সংকলন করে এগ্রিকালচার উইংয়ে নির্ধারিত সময়ে প্রেরণ করতে হবে। "সংকলন ফরম-৩" এর মত "তফসিল-৩" জেলা অফিস, বিভাগ অফিস এবং এগ্রিকালচার উইং-এ প্রেরণ করতে হবে।</p>

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