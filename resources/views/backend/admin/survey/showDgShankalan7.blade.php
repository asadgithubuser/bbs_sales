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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">প্রধান ফসলের মূল্য ও উৎপাদন খরচ জরিপ</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted">প্রধান ফসলের মূল্য ও উৎপাদন খরচ জরিপ</a>
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
                        <div class="card card-custom" style="font-size: 90%;">
                            <div class="card-header mt-5">
                                
                                <div class="col-lg-6 offset-lg-3 text-center mt-4" style="line-height: 100%">
                                    <p class="font-weight-bold">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</p>
                                    <p class="font-weight-bold">পরিকল্পনা মন্ত্রণালয়</p>
                                    <p class="font-weight-bold">বাংলাদেশ পরিসংখ্যান ব্যুরো</p>
                                    <p class="font-weight-bold">এগ্রিকালচার উইং</p>
                                    <p class="font-weight-bold">পরিসংখ্যান ভবন</p>
                                    <p class="font-weight-bold">ই-২৭/এ আগারগাঁও, ঢাকা-১২০৭</p>
                                    <p class="font-weight-bold mt-4">প্রধান ফসলের মূল্য ও উৎপাদন খরচ জরিপ</p>
                                    {{-- <p class="mt-4">(Monthly Wage Rate Survey of Agricultural Day Labourers)</p> --}}
                                </div>
                                <div class="col-3">
                                    <p class="font-weight-bold text-right">সংকলন - ৭</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ajax-data-container pt-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p style="font-size: 1.3em; font-weight: 500">বিভাগ: <b>{{ $list->division ?$list->division->name_bn : ''}}</b></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="w3-right" style="font-size: 1.3em; font-weight: 500">ফসলের নাম: <b>{{ $cropName->crop ? $cropName->crop->name_bn : ''}}</b></p>

                                        </div>
                                    </div>
                                    <table class="table" style="margin-bottom: 25px">
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" rowspan="2">ক্রমিক নং</td>
                                            <td style="border: 1px solid #000" align="left" rowspan="2">উপজেলার নাম</td>
                                            {{-- <td style="border: 1px solid #000" align="left" rowspan="2">দাগগুচ্ছ নম্বর</td>
                                            <td style="border: 1px solid #000" align="left" rowspan="2">কৃষকের নাম</td> --}}
                                            <td style="border: 1px solid #000" align="left" colspan="2">জমির পরিমান ও ফসল</td>
                                            <td style="border: 1px solid #000" align="left" rowspan="2">এই বছরের জন্য জমির মোট ভাড়া (টাকা)</td>
                                            <td style="border: 1px solid #000" align="center" colspan="8">জমি থেকে ফসল উৎপাদন খরচ (টাকা)</td>
                                            <td style="border: 1px solid #000" align="left" rowspan="2">মোট খরচ (টাকা)</td>
                                            <td style="border: 1px solid #000" align="left" rowspan="2">ফসলের মোট মূল্য (টাকা)</td>
                                            <td style="border: 1px solid #000" align="left" rowspan="2">মোট লাভ (ফসলের মোট মূল্য - মোট খরচ) (টাকা)</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left">জমির পরিমান (একর)</td>
                                            <td style="border: 1px solid #000" align="left">জমিতে মোট উৎপাদন (কেজি)</td>
                                            <td style="border: 1px solid #000" align="left">এই ফসলের জন্য জমির মোট ভাড়া</td>
                                            <td style="border: 1px solid #000" align="left">জমির কর্ষণ/চাষ খরচ</td>
                                            <td style="border: 1px solid #000" align="left">বীজ/চারা খরচ</td>
                                            <td style="border: 1px solid #000" align="left">সার বাবদ খরচ</td>
                                            <td style="border: 1px solid #000" align="left">সেচ খরচ</td>
                                            <td style="border: 1px solid #000" align="left">শ্রমিক খরচ</td>
                                            <td style="border: 1px solid #000" align="left">কীটনাশক বা বালাইনাশক খরচ</td>
                                            <td style="border: 1px solid #000" align="left">পরিবহন খরচ</td>
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
                                            <td style="border: 1px solid #000" align="center">১০</td>
                                            <td style="border: 1px solid #000" align="center">১১</td>
                                            <td style="border: 1px solid #000" align="center">১২</td>
                                            <td style="border: 1px solid #000" align="center">১৩</td>
                                            <td style="border: 1px solid #000" align="center">১৪</td>
                                            <td style="border: 1px solid #000" align="center">১৫</td>
                                            <td style="border: 1px solid #000" align="center">১৬</td>
                                            {{-- <td style="border: 1px solid #000" align="center">১৭</td>
                                            <td style="border: 1px solid #000" align="center">১৮</td> --}}
                                        </tr>

                                        {{-- Start loop --}}
                                        @php
                                            $totalKorsonCost = $totalSeedCost =  $totalFertilizerCost = $totalIrrigationCost = $totalWorkerCost = $totalPesticideCost = $totaltransportCost = $totalCost = 0;
                                            
                                            $totalLandAmount = $toalProductionInLand = $totalLandFareCurrentYear = $totalLandFareForthisLand = $totalLandCultivationCost = $totalLandSeedsCost = $totalLandFertilizerCost = $totalLandIrrigationCost = $totalLandWorkerCost = $totalLandPesticideCost = $totalLandTrasportCost = $overAllLandCost = $totalLandCropCost =$totalLandProfite = 0;

                                        @endphp
                                        @foreach ($shankalan7datas as $data)
                                            
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">{{ BanglaConverter::enTobn($loop->index + 1); }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $data->district ? $data->district->name_bn :'' }}</td>
                                                {{-- <td style="border: 1px solid #000" align="center"></td>
                                                <td style="border: 1px solid #000" align="center"></td> --}}
                                                <td style="border: 1px solid #000" align="center">
                                                    {{ $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'arable_land','main') }}
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    {{ $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'total_production','main') }}
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                     {{ $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'area_rent_amount_per_year','landRent') }}
                                                    
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    {{ $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'land_rent_amount','landRent') }}
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    
                                                    @if ($data->landCultivateCost)
                                                        {{  $totalKorsonCost = $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'own_korshon_amount','chasKora') + $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'rent_korshon_amount','chasKora') + $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'power_tiler_korshon_amount','chasKora') +$data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'sromik_mojuri_amount','chasKora') +$data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'paribarik_sromik_amount','chasKora')}}
                                                    @else 
                                                    -
                                                    @endif
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    @if ($data->landSeedsCost)
                                                        {{ $totalSeedCost =  $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'seed_value','seed') + $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'seedlings_value','seed') + $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'when_own_seed_value','seed') }}
                                                    
                                                    @else 
                                                    -
                                                    @endif
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    @if ($data->landFertilizerCost)
                                                    {{   $totalFertilizerCost =
                                                    $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'tsp_cost','fertilizer') +
                                                    $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'mop_cost','fertilizer')+
                                                    $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'dap_cost','fertilizer')+
                                                    $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'gypsum_cost','fertilizer')+
                                                    $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'nixar_cost','fertilizer')+
                                                    $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'other_inorganic_cost','fertilizer')+
                                                    $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'gobor_cost','fertilizer')+
                                                    $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'ash_cost','fertilizer')
                                                    +
                                                    $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'green_cost','fertilizer')
                                                    +
                                                    $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'other_organic_cost','fertilizer')
                                                    }}
                                                    @else 
                                                    -
                                                    @endif
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    @if ($data->landIrrigationCost)
                                                    {{  $totalIrrigationCost = $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'tubewell_cost','landIrrigationCost')  +  $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'chapcol_cost', 'landIrrigationCost') +  $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'jalani_cost','landIrrigationCost')}}

                                                    
                                                    @else 
                                                    -
                                                    @endif
                                                    
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    @if ($data->landWorkerCost)
                                                    {{ $totalWorkerCost =  $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'seedling_total_worker_cost','landWorkerCost') +  $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'nirani_total_worker_cost','landWorkerCost')+  $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'crop_cutting_total_worker_cost','landWorkerCost')+  $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'crop_marai_total_worker_cost','landWorkerCost')+  $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'jute_total_worker_cost','landWorkerCost')+ $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'other_total_worker_cost','landWorkerCost')
                                                    }}

                                                    
                                                    @else 
                                                    -
                                                    @endif
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    @if ($data->landPesticideCost)
                                                    {{  $totalPesticideCost = $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'sumithion_cost','landPesticideCost') + 
                                                    $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'malathion_cost','landPesticideCost') + 
                                                    $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'basudin_cost','landPesticideCost') + 
                                                    $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'furadon_cost','landPesticideCost') + 
                                                    $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'furanol_cost','landPesticideCost') + 
                                                    $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'other_cost','landPesticideCost')  }}

                                                   
                                                    @else 
                                                    -
                                                    @endif
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    @if ($data->landtransportCost)
                                                    
                                                    {{ $totaltransportCost =  $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'land_things_transport_cost','landtransportCost') + 
                                                    $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'seed_transport_cost','landtransportCost') + 
                                                    $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'fertilizer_transport_cost','landtransportCost') + 
                                                    $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'irrigation_transport_cost','landtransportCost') + 
                                                    $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'pesticide_transport_cost','landtransportCost') + 
                                                    $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'other_transport_cost','landtransportCost')  }}



                                                    
                                                    @else 
                                                    -
                                                    @endif
                                                </td>
                                                <td style="border: 1px solid #000" align="center">{{ $totalCost = $totalKorsonCost + $totalSeedCost +  $totalFertilizerCost + $totalIrrigationCost + $totalWorkerCost + $totalPesticideCost + $totaltransportCost }}</td>
                                                <td style="border: 1px solid #000" align="center">
                                                    {{ $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'crops_total_value_tk','main') }}
                                                    
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    {{ $profit =$data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'crops_total_value_tk','main')- $totalCost }}
                                                </td>
                                            </tr>
                                            @php
                                                $totalLandAmount +=  $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'arable_land','main');

                                                $toalProductionInLand   +=  $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'total_production','main') ;

                                                $totalLandFareCurrentYear +=  $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'area_rent_amount_per_year','landRent') ;

                                                $totalLandFareForthisLand +=  $data->districtDatas($data->id,$data->survey_notification_id,$data->district_id,'land_rent_amount','landRent') ;
                                                $totalLandCultivationCost += $totalKorsonCost;
                                                $totalLandSeedsCost += $totalSeedCost;
                                                $totalLandFertilizerCost += $totalFertilizerCost;
                                                $totalLandIrrigationCost +=$totalIrrigationCost;
                                                $totalLandWorkerCost += $totalWorkerCost;
                                                $totalLandPesticideCost +=$totalPesticideCost;
                                                $totalLandTrasportCost +=$totaltransportCost;

                                                $overAllLandCost += $totalCost;

                                                $totalLandCropCost += $data->crops_total_value_tk;
                                                $totalLandProfite += $profit;
                                            @endphp
                                        @endforeach
                                        {{-- End loop --}}

                                        <tr>
                                            <td style="border: 1px solid #000" align="center" colspan="2">সর্বমোট</td>
                                            {{-- <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td> --}}
                                            <td style="border: 1px solid #000" align="center">{{ $totalLandAmount }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $toalProductionInLand }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $totalLandFareCurrentYear }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $totalLandFareForthisLand }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $totalLandCultivationCost }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $totalLandSeedsCost }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $totalLandFertilizerCost }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $totalLandIrrigationCost }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $totalLandWorkerCost }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $totalLandPesticideCost }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $totalLandTrasportCost }}</td>

                                            <td style="border: 1px solid #000" align="center">{{ $overAllLandCost }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $totalLandCropCost }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $totalLandProfite }}</td>
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
                                        
                                        <p class="text-center" style="font-weight: bold">সংকলন/ফরম পুরণের নির্দেশাবলী</p>

                                        <p>১. এ জরিপ শুধু প্রধান ফসল (আউশ, আমন, বোরো, গম, পাট ও আলু) এর জন্য প্রযোজ্য। ফসল উত্তোলনের পর ও জরিপ করতে হবে।</p>
                                        <p>২. প্রতিটি উপজেলা হতে দৈব চয়ন পদ্ধতিতে ৪ (চার) টি দাগগুচ্ছ নির্বাচন করতে হবে। ৪ (চার) টি দাগগুচ্ছ হতে ১০ (দশ) জন চাষীর সাক্ষাৎকার গ্রহণ করতে হবে। দাগগুচ্ছ চাষী নির্বাচনের ক্ষেত্রে ক্ষুদ্র, মাঝারী ও বৃহৎ চাষী নির্বাচনের বিষয়ে গুরুত্ব প্রদান করতে হবে। নির্বাচিত দাগগুচ্ছে সর্বোচ্চ ৩ (তিন) জন চাষীর সাক্ষাৎকার গ্রহণ করতে হবে।</p>
                                        <p>৩. ৬ জন চাষীর নিকট হতে তথ্য গ্রহণ করতে হবে। তফসিল ১ - ১০ নং প্রশ্ন যথাযথভাবে পূরণ করতে হবে।</p>
                                        <p>৪. পারিবারিক শ্রমিক যদি ভাড়া করা শ্রমিকের মত সময় ধরে কাজ করে, তবে ভাড়া করা শ্রমিকের মজুরির হার ধরে পারিবারিক শ্রমিকের মজুরি হিসাব করুন। নিজের জমি চাষ করে থাকলে সে ক্ষেত্রে উক্ত এলাকার জমির বাৎসরিক ভাড়া কেমন তা জেনে নিয়ে লিখতে হবে। ঐ ফসলের সময়ের জন্য ভাড়া কত তা হিসাব করে প্রশ্ন-১ এর ৫ কলামে লিখুন।</p>
                                        <p>৫. দাগগুচ্ছে জরিপকৃত ফসল না থাকলে, ঐ ক্ষেত্রে বিকল্প হিসাবে দাগগুচ্ছ বহির্ভুত কৃষিকের সাক্ষাৎকার নেয়া যাবে। খালি তফসিল প্রেরণ করা যাবে না।</p>
                                        <p>৬. ১০ এর ১ কলামে দর দিয়ে ৯ (২) এর কলামের গুনফল হবে ৯ (৩) কলামে।</p>
                                        <p>৭. উপজেলা অফিসে এ জরিপ তথ্যের ভিত্তিতে প্রয়োজনীয় উপাত্ত "সংকলন ফরম-৭" পূরণ করে জেলা অফিসে নির্ধারিত সময়ের মধ্যে প্রেরণ করবে। জেলা অফিস অধীনস্থ সকল উপজেলার সংকলন ফরম -৭ এর ভিত্তিতে তথ্য সংকলন করে বিভাগীয় অফিসে প্রেরণ করবে এবং বিভাগীয় অফিস অধীনস্থ সকল অফিস সমূহ হতে প্রাপ্ত "সংকলন ফরম-৭" সংকলন করে এগ্রিকালচার উইংয়ে নির্ধারিত সময়ে প্রেরণ করবে। "সংকলন ফরম-৭" এর মত "তফসিল-৭" উপজেলা হতে জেলা অফিস, বিভাগ অফিস এবং এগ্রিকালচার উইং - এ প্রেরণ করতে হবে।</p>

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