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
                                            <p style="font-size: 1.3em; font-weight: 500">উপজেলা: <b>{{ $list->upazila ?$list->upazila->name_bd : ''}}</b></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="w3-right" style="font-size: 1.3em; font-weight: 500">ফসলের নাম: <b>{{ $cropName->crop ? $cropName->crop->name_bn : ''}}</b></p>

                                        </div>
                                    </div>
                                    <table class="table" style="margin-bottom: 25px">
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" rowspan="2">ক্রমিক নং</td>
                                            <td style="border: 1px solid #000" align="left" rowspan="2">ইউনিয়নের নাম</td>
                                            <td style="border: 1px solid #000" align="left" rowspan="2">দাগগুচ্ছ নম্বর</td>
                                            <td style="border: 1px solid #000" align="left" rowspan="2">কৃষকের নাম</td>
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
                                            <td style="border: 1px solid #000" align="center">১৭</td>
                                            <td style="border: 1px solid #000" align="center">১৮</td>
                                        </tr>

                                        {{-- Start loop --}}
                                        @php
                                            $totalKorsonCost = $totalSeedCost =  $totalFertilizerCost = $totalIrrigationCost = $totalWorkerCost = $totalPesticideCost = $totaltransportCost = $totalCost = 0;
                                            
                                            $totalLandAmount = $toalProductionInLand = $totalLandFareCurrentYear = $totalLandFareForthisLand = $totalLandCultivationCost = $totalLandSeedsCost = $totalLandFertilizerCost = $totalLandIrrigationCost = $totalLandWorkerCost = $totalLandPesticideCost = $totalLandTrasportCost = $overAllLandCost = $totalLandCropCost =$totalLandProfite = 0;

                                        @endphp
                                        @foreach ($shankalan7datas as $data)
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">
                                                    {{ BanglaConverter::enTobn($loop->index + 1); }}
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    {{ $data->union ? $data->union->name_bn : '' }}
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    {{ $data->cluster ? $data->cluster->name_bn : '-' }}
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    {{ $data->farmer ? $data->farmer->farmers_name : '-' }}
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    {{ $data->arable_land }}
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    {{ $data->total_production }}
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    {{ $data->landRent ? $data->landRent->area_rent_amount_per_year : '' }}
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    {{ $data->landRent ? $data->landRent->land_rent_amount : ''}}
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    @if ($data->landCultivateCost)
                                                        
                                                    {{ $totalKorsonCost =  $data->totalKorsonCost($data->landCultivateCost->own_korshon_amount,$data->landCultivateCost->rent_korshon_amount,$data->landCultivateCost->power_tiler_korshon_amount,$data->landCultivateCost->sromik_mojuri_amount,$data->landCultivateCost->paribarik_sromik_amount) }}
                                                    @else 
                                                    -
                                                    @endif
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    @if ($data->landSeedsCost)
                                                        
                                                    {{ $totalSeedCost = $data->totalSeedCost($data->landSeedsCost->seed_value,$data->landSeedsCost->seedlings_value,$data->landSeedsCost->when_own_seed_value) }}
                                                    @else 
                                                    -
                                                    @endif
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    @if ($data->landFertilizerCost)
                                                    {{ $totalFertilizerCost = $data->totalFertilizerCost($data->landFertilizerCost->uriya_cost,$data->landFertilizerCost->tsp_cost,$data->landFertilizerCost->mop_cost,$data->landFertilizerCost->dap_cost,$data->landFertilizerCost->gypsum_cost,$data->landFertilizerCost->nixar_cost,
                                                    $data->landFertilizerCost->other_inorganic_cost,
                                                    $data->landFertilizerCost->gobor_cost,
                                                    $data->landFertilizerCost->ash_cost,$data->landFertilizerCost->green_cost,$data->landFertilizerCost->other_organic_cost) }}
                                                    @else 
                                                    -
                                                    @endif
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    @if ($data->landIrrigationCost)
                                                    {{ $totalIrrigationCost = $data->totalIrrigationCost($data->landIrrigationCost->tubewell_cost,$data->landIrrigationCost->chapcol_cost,$data->landIrrigationCost->jalani_cost) }}
                                                    @else 
                                                    -
                                                    @endif
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    @if ($data->landWorkerCost)
                                                    {{ $totalWorkerCost = $data->totalWorkerCost($data->landWorkerCost->seedling_total_worker_cost,$data->landWorkerCost->nirani_total_worker_cost,$data->landWorkerCost->crop_cutting_total_worker_cost,$data->landWorkerCost->crop_marai_total_worker_cost,$data->landWorkerCost->jute_total_worker_cost,$data->landWorkerCost->other_total_worker_cost) }}
                                                    @else 
                                                    -
                                                    @endif
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    
                                                    @if ($data->landPesticideCost)
                                                    {{ $totalPesticideCost = $data->totalPesticideCost($data->landPesticideCost->sumithion_cost,$data->landPesticideCost->malathion_cost,$data->landPesticideCost->basudin_cost,$data->landPesticideCost->furadon_cost,$data->landPesticideCost->furanol_cost,$data->landPesticideCost->other_cost) }}
                                                    @else 
                                                    -
                                                    @endif
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    @if ($data->landtransportCost)
                                                    {{$totaltransportCost = $data->totaltransportCost($data->landtransportCost->land_things_transport_cost,$data->landtransportCost->seed_transport_cost,$data->landtransportCost->fertilizer_transport_cost,$data->landtransportCost->irrigation_transport_cost,$data->landtransportCost->pesticide_transport_cost,$data->landtransportCost->other_transport_cost) }}
                                                    @else 
                                                    -
                                                    @endif
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    {{ $totalCost = $totalKorsonCost + $totalSeedCost +  $totalFertilizerCost + $totalIrrigationCost + $totalWorkerCost + $totalPesticideCost + $totaltransportCost }}
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    {{ $data->crops_total_value_tk }}
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    {{ $profit =$data->crops_total_value_tk - $totalCost }}
                                                </td>
                                            </tr>
                                            @php
                                                $totalLandAmount +=  $data->arable_land;

                                                $toalProductionInLand   += $data->total_production;

                                                $totalLandFareCurrentYear += $data->landRent ?$data->landRent->area_rent_amount_per_year : 0;

                                                $totalLandFareForthisLand += $data->landRent ? $data->landRent->land_rent_amount : 0;
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
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
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