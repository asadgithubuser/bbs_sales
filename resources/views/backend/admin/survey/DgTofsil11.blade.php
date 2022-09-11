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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Crop Damage Estimation Survey</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted">Crop Damage Estimation Survey</a>
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
                                    <p class="font-weight-bold mt-4">অস্থায়ী ফসলের ক্ষয়ক্ষতি নিরূপণ তফসিল</p>
                                    <p class="mt-4">(Crop Damage Estimation Survey)</p>
                                </div>
                                <div class="col-3">
                                    <p class="font-weight-bold text-right">তফসিল - ১১</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ajax-data-container pt-3">
                                    <p style="font-size: 1.3em; font-weight: 500">১। এলাকা পরিচিতি:</p>
                                    <table class="table" style="margin-bottom: 25px">
                                        <tr>
                                            <td style="border: 1px solid #000" align="center" colspan="6">বাংলাদেশ</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center">ফসলের নাম: {{ $surveyNotification->crop ? $surveyNotification->crop->name_bn : '' }}</td>
                                            <td style="border: 1px solid #000" align="center" colspan="2">ক্ষয়ক্ষতির প্রধান কারণ: {{ $damageReason->cause_of_loss ? $damageReason->cause_of_loss : '' }}</td>
                                            <td style="border: 1px solid #000" align="left" colspan="3">ক্ষয়ক্ষতির সময়কাল: {{$startDate}} হতে {{$endDate}} তারিখ পর্যন্ত</td>
                                        </tr>
                                    </table>

                                    <p style="font-size: 1.3em; font-weight: 500; margin-top:15px;">১। ক্ষতিগ্রস্থ ফসলী জমি ও ফসলের ক্ষতির পরিমাণ:</p>
                                    <table class="table">
                                        <tr>
                                            <td style="border: 1px solid #000" align="center" rowspan="2">বিভাগ</td>
                                            <td style="border: 1px solid #000" align="center" rowspan="2">ফসলের আওতাধীন জমির পরিমাণ (একরে)</td>
                                            <td style="border: 1px solid #000" align="center" rowspan="2">আংশিক ক্ষতি (একরে)</td>
                                            <td style="border: 1px solid #000" align="center" rowspan="2">ক্ষতির শতকরা হার</td>
                                            <td style="border: 1px solid #000" align="center" colspan="3">ক্ষতিগ্রস্ত ফসলী জমির পরিমাণ (একরে)</td>
                                            <td style="border: 1px solid #000" align="center" rowspan="2">কাঙ্খিত একর প্রতি ফলন (কেজি)</td>
                                            <td style="border: 1px solid #000" align="center" rowspan="2">প্রাক্কলিত ফসল ক্ষতির পরিমাপ (মে.টন)</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center">আংশিক ক্ষতিতে সম্পূর্ণ ক্ষতির পরিমাণ (একরে)</td>
                                            <td style="border: 1px solid #000" align="center">সম্পূর্ণ ক্ষতি</td>
                                            <td style="border: 1px solid #000" align="center">মোট (৫+৬)</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center">১</td>
                                            <td style="border: 1px solid #000" align="center">২</td>
                                            <td style="border: 1px solid #000" align="center">৩</td>
                                            <td style="border: 1px solid #000" align="center">৪</td>
                                            <td style="border: 1px solid #000" align="center">৫</td>
                                            <td style="border: 1px solid #000" align="center">৬</td>
                                            <td style="border: 1px solid #000" align="center">৭</td>
                                            <td style="border: 1px solid #000" align="center">৮</td>
                                            <td style="border: 1px solid #000" align="center">৯</td>
                                        </tr>
                                        {{-- Start loop --}}
                                        @php
                                            // division total data
                                            $divisionTotalLand = 0;
                                            $divisionTotalPersialDamage = 0;
                                            $divisionTotalDamagePercentage = 0;
                                            $divisionTotalPersialToFullDamage = 0;
                                            $divisionTotalCompleteDamage = 0;
                                            $divisionTotalSummationDamage = 0;
                                            $divisionTotalEstimatedYield = 0;
                                            $divisionTotalEstimatedCropLoss = 0;

                                            // Final total data
                                            $finalTotalLand = 0;
                                            $finalTotalPersialDamage = 0;
                                            $finalTotalDamagePercentage = 0;
                                            $finalTotalPersialToFullDamage = 0;
                                            $finalTotalCompleteDamage = 0;
                                            $finalTotalSummationDamage = 0;
                                            $finalTotalEstimatedYield = 0;
                                            $finalTotalEstimatedCropLoss = 0;
                                            $TotalMoneyLoss = 0;
                                        @endphp
                                        @foreach ($tofsil11datas as $ata)
                                            @foreach ($ata->divisionDatas($ata->division_id) as $data)
                                            @php
                                                $divisionTotalLand += $data->land_amound;
                                                $divisionTotalPersialDamage += $data->partial_damage;
                                                $divisionTotalDamagePercentage += $data->percentage_of_damage;
                                                $divisionTotalPersialToFullDamage += $data->partial_damage_to_total_damage;
                                                $divisionTotalCompleteDamage += $data->complete_damage;
                                                $divisionTotalSummationDamage += $data->partial_damage_to_total_damage + $data->complete_damage;
                                                $divisionTotalEstimatedYield += $data->yield_per_desired_acre;
                                                $divisionTotalEstimatedCropLoss += $data->estimated_amount_of_crop_loss;
                                                $TotalMoneyLoss += $data->amount_of_crop_loss_tk;
                                            @endphp
                                            @endforeach
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">{{ $list->division ? $list->division->name_bn : '' }}</td>
                                                <td style="border: 1px solid #000" align="center">{{$divisionTotalLand}}</td>
                                                <td style="border: 1px solid #000" align="center">{{$divisionTotalPersialDamage}}</td>
                                                <td style="border: 1px solid #000" align="center">{{$divisionTotalDamagePercentage}}</td>
                                                <td style="border: 1px solid #000" align="center">{{$divisionTotalPersialToFullDamage}}</td>
                                                <td style="border: 1px solid #000" align="center">{{$divisionTotalCompleteDamage}}</td>
                                                <td style="border: 1px solid #000" align="center">{{$divisionTotalSummationDamage}}</td>
                                                <td style="border: 1px solid #000" align="center">{{$divisionTotalEstimatedYield}}</td>
                                                <td style="border: 1px solid #000" align="center">{{$divisionTotalEstimatedCropLoss}}</td>
                                            </tr>
                                            @php
                                                $finalTotalLand += $divisionTotalLand;
                                                $finalTotalPersialDamage += $divisionTotalPersialDamage;
                                                $finalTotalDamagePercentage += $divisionTotalDamagePercentage;
                                                $finalTotalPersialToFullDamage += $divisionTotalPersialToFullDamage;
                                                $finalTotalCompleteDamage += $divisionTotalCompleteDamage;
                                                $finalTotalSummationDamage += $divisionTotalSummationDamage;
                                                $finalTotalEstimatedYield += $divisionTotalEstimatedYield;
                                                $finalTotalEstimatedCropLoss += $divisionTotalEstimatedCropLoss;
                                            @endphp
                                        @endforeach
                                        {{-- End loop --}}
                                        <tr>
                                            <td style="border: 1px solid #000" align="center">মোট</td>
                                            <td style="border: 1px solid #000" align="center">{{$finalTotalLand}}</td>
                                            <td style="border: 1px solid #000" align="center">{{$finalTotalPersialDamage}}</td>
                                            <td style="border: 1px solid #000" align="center">{{$finalTotalDamagePercentage}}</td>
                                            <td style="border: 1px solid #000" align="center">{{$finalTotalPersialToFullDamage}}</td>
                                            <td style="border: 1px solid #000" align="center">{{$finalTotalCompleteDamage}}</td>
                                            <td style="border: 1px solid #000" align="center">{{$finalTotalSummationDamage}}</td>
                                            <td style="border: 1px solid #000" align="center">{{$finalTotalEstimatedYield}}</td>
                                            <td style="border: 1px solid #000" align="center">{{$finalTotalEstimatedCropLoss}}</td>
                                        </tr>
                                    </table>
                                    <p style="font-size: 1.3em; font-weight: 500; margin-top:15px;">বি.দ্রঃ প্রতিটি ক্ষতিগ্রস্থ ফসলের জন্য পৃথক তফসিল/ফরম ব্যবহার করতে হবে।</p>

                                    
                                    <table class="table">
                                        <tr>
                                            <td style="border:none;" align="left" rowspan="4">২। ক্ষতিগ্রস্ত ফসলী জমির পরিমাণ </td>
                                            <td style="border:none;"  align="left">(ক) মোট ফসলী জমির পরিমান </td>
                                            <td style="border:none;"  align="left">{{$finalTotalSummationDamage}} একর</td>
                                        </tr>
                                        <tr>
                                            <td style="border:none;"  align="left">(খ) আংশিক ক্ষতিগ্রস্ত জমির হার </td>
                                            <td style="border:none;"  align="left">{{number_format((float)$parsial = ($finalTotalPersialDamage / $finalTotalSummationDamage) * 100, 4, '.', '') }} ভাগ</td>
                                        </tr>
                                        <tr>
                                            <td style="border:none;"  align="left">(গ) সম্পূর্ণ ক্ষতিগ্রস্ত জমির হার </td>
                                            <td style="border:none;"  align="left">{{number_format((float)$full = ($finalTotalCompleteDamage / $finalTotalSummationDamage) * 100, 4, '.', '') }} ভাগ</td>
                                        </tr>
                                        <tr>
                                            <td style="border:none;"  align="left">(ঘ) মোট ক্ষতিগ্রস্ত জমির হার</td>
                                            <td style="border:none;"  align="left">{{number_format((float)$parsial + $full, 4, '.', '') }} ভাগ</td>
                                        </tr>

                                        <tr>
                                            <td style="border:none;"  align="left" rowspan="3">৩। প্রাক্কলিত ফসল উৎপাদনের পরিমান (মে.টন)</td>
                                            <td style="border:none;"  align="left">(ক) উপজেলায় কাঙ্খিত ফসলের উৎপাদনের পরিমান </td>
                                            <td style="border:none;"  align="left">{{$finalTotalEstimatedYield}} মে.টন</td>
                                        </tr>
                                        <tr>
                                            <td style="border:none;"  align="left">(খ) ফসল ক্ষতির পরিমান</td>
                                            <td style="border:none;"  align="left">{{$finalTotalEstimatedCropLoss}} মে.টন</td>
                                        </tr>
                                        <tr>
                                            <td style="border:none;"  align="left">(গ) ফসল ক্ষতির পরিমান</td>
                                            <td style="border:none;"  align="left">{{$TotalMoneyLoss}} টাকা</td>
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

                                        <p>১. অতিবৃষ্টি/অনাবৃষ্টি (খরা)/ঘুর্নিঝড়/বন্যা/শিলাবৃষ্টি/পোকার আক্রমনের কারনে ফসলের বেশ ক্ষয়ক্ষতি হলে এ তফসিল পূরণ করে পাঠাতে হবে। উপজেলায় কোন বছর উল্লেখযোগ্য ক্ষতি না হলে ক্ষয়ক্ষতির হিসাব প্রেরণ দরকার নাই। ক্ষয়ক্ষতির হিসাব দেশের কোন অংশে বা সমগ্র দেশে বিষয়টি বিরাট আকারে প্রাকৃতিক দুর্যোগ যেমন বন্যা/ঘূর্ণিঝড় হলে ক্ষয়ক্ষতির হিসাব যথাযথভাবে তড়িৎ নিরুপণের ব্যবস্থা গ্রহণ করতে হবে।</p>
                                        <p>২. প্রধান ফসলের (যেমন আউশ, আমন, বোরো, গম, পাট, আলু) ক্ষয়ক্ষতির হিসাব অবশ্যই নির্দিষ্ট সময়ের মধ্যে প্রস্তুত করে প্রেরণ করতে হবে।</p>
                                        <p>৩. উপজেলা/থানা অফিস ইউনিয়নওয়ারী ক্ষয়ক্ষতির হিসাব তৈরী করে অঞ্চলে পাঠাবেন। আঞ্চলিক অফিস উপজেলা ওয়ারী ক্ষয়ক্ষতির পরিমান এ তফসিলে (তফসিল-১১) সংকলন করে সদর দপ্তর ঢাকায় প্রেরণ করবেন।</p>
                                        <p>৪. আংশিক ক্ষতিগ্রস্ত জমি বলতে জমির ফসল সম্পূর্ণভাবে পাওয়া যায়নি বা যাবেনা অথবা ফলন হার কম হবে।  সম্পূর্ণ ক্ষতিগ্রস্ত ফসলি জমি বলতে যে সব জমি হতে মোটেই কোন ফসল পাওয়া যায়নি বা যাবেনা।</p>
                                        <p>৫. কাঙ্খিত একর প্রতি ফলন হার বলতে চাষী একর প্রতি কি পরিমান ফসল আশা করে ছিলেন।</p>
                                        <p>৬. প্রাক্কলিত ফসল ক্ষতির পরিমান = (কলাম ৮ x কলাম ৭)</p>
                                        
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