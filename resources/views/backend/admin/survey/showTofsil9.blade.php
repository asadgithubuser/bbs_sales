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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">ভূমি ব্যবহার ও সেচ পরিসংখ্যান জরিপ তফসিল </h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted">ভূমি ব্যবহার ও সেচ পরিসংখ্যান জরিপ তফসিল </a>
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
                                    <p class="font-weight-bold mt-4">ভূমি ব্যবহার ও সেচ পরিসংখ্যান জরিপ তফসিল</p>
                                    <p class="mt-4">(Land Use and Irrigation Survey)</p>
                                </div>
                                <div class="col-3">
                                    <p class="font-weight-bold text-right">তফসিল - ৯</p>
                                </div>
                            </div>
                            <div class="card-body">

                                <p style="font-size: 1.3em; font-weight: 600">এলাকা পরিচিতি</p>
                                <table class="table" style="margin-bottom: 25px">
                                    <tr>
                                        <td style="border: 1px solid #000" align="left" colspan="2">বিভাগ : {{ $list->division ? $list->division->name_bn :'' }}</td>
                                        <td style="border: 1px solid #000" align="left" colspan="2">জেলা : {{ $list->district ? $list->district->name_bn :'' }}</td>
                                        <td style="border: 1px solid #000" align="left" colspan="2">উপজেলা/থানা : {{ $list->upazila ? $list->upazila->name_bd :'' }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="left">কোড : </td>
                                        <td style="border: 1px solid #000" align="left">{{ $list->division ? $list->division->division_bbs_code : '' }}</td>
                                        <td style="border: 1px solid #000" align="left">কোড :</td>
                                        <td style="border: 1px solid #000" align="left">{{ $list->district ? $list->district->district_bbs_code : '' }}</td>
                                        <td style="border: 1px solid #000" align="left">কোড :</td>
                                        <td style="border: 1px solid #000" align="left">{{ $list->upazila ? $list->upazila->upazila_bbs_code : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center" rowspan="2">উপজেলা/থানা মোট আয়তন</td>
                                        <td style="border: 1px solid #000" align="right">বর্গ কিলোমিটারে</td>
                                        <td style="border: 1px solid #000" align="center">{{ $tofsil9->upazila_volume_in_squre_kilometer }}</td>
                                        <td style="border: 1px solid #000" align="center">সন</td>
                                        <td style="border: 1px solid #000" align="left" rowspan="2" colspan="2">তথ্য সংগ্রহের সময়কাল : {{ $tofsil9->information_collection_time }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="right">একরে</td>
                                        <td style="border: 1px solid #000" align="center">{{ $tofsil9->upazila_volume_in_acre }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $tofsil9->year }}</td>
                                    </tr>
                                </table>

                                <p style="font-size: 1.3em; font-weight: 600">অংশ-১: ভূমি ব্যবহার:</p>
                                <p style="font-size: 1.3em; font-weight: 600;" class="text-center">সারণী-১: ভূমি ব্যবহার</p>
                                <div class="row">

                                    <div class="col-6">
                                        <table class="table" style="margin-bottom: 25px">
                                            <tr>
                                                <td style="border: 1px solid #000" align="center" rowspan="2">ভূমির ব্যবহার (কোড)</td>
                                                <td style="border: 1px solid #000" align="center" rowspan="2">ভূমির ব্যবহার</td>
                                                <td style="border: 1px solid #000" align="center" colspan="2">জমির পরিমাপ (একরে)</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">গত বছর</td>
                                                <td style="border: 1px solid #000" align="center">চলতি বছর</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">১</td>
                                                <td style="border: 1px solid #000" align="center">২</td>
                                                <td style="border: 1px solid #000" align="center">৩</td>
                                                <td style="border: 1px solid #000" align="center">৪</td>
                                            </tr>

@php
    $last_year_permanent_crops_land         = $agricultural_land_data->last_year_permanent_crops_land;
    $current_year_permanent_crops_land      = $agricultural_land_data->current_year_permanent_crops_land;
    $last_year_temporary_crops_land         = $agricultural_land_data->last_year_temporary_crops_land;
    $current_year_temporary_crops_land      = $agricultural_land_data->current_year_temporary_crops_land;
    $last_year_current_fallow_land          = $agricultural_land_data->last_year_current_fallow_land;
    $current_year_current_fallow_land       = $agricultural_land_data->current_year_current_fallow_land;
    $last_year_arable_uncultivated_land     = $agricultural_land_data->last_year_arable_uncultivated_land;
    $current_year_arable_uncultivated_land  = $agricultural_land_data->current_year_arable_uncultivated_land;

    $total_last_year_agricultural_land      = $last_year_permanent_crops_land + $last_year_temporary_crops_land + $last_year_current_fallow_land + $last_year_arable_uncultivated_land;
    $total_current_year_agricultural_land   = $current_year_permanent_crops_land + $current_year_temporary_crops_land + $current_year_current_fallow_land + $current_year_arable_uncultivated_land;
@endphp

                                            <tr>
                                                <td style="border: 1px solid #000" align="left" colspan="4">1. কৃষি জমি:</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">101</td>
                                                <td style="border: 1px solid #000" align="left">স্থায়ী ফসলের জমি (খামার ব্যাতিত/শুধু বাগানে)</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_permanent_crops_land }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_permanent_crops_land }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">102</td>
                                                <td style="border: 1px solid #000" align="left">অস্থায়ী ফসলের নীট জমি (খামার ব্যাতিত)</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_temporary_crops_land }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_temporary_crops_land }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">103</td>
                                                <td style="border: 1px solid #000" align="left">চলতি পতিত জমি</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_current_fallow_land }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_current_fallow_land }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">104</td>
                                                <td style="border: 1px solid #000" align="left">আবাদযোগ্য অনাবাদী জমি</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_arable_uncultivated_land }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_arable_uncultivated_land }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center" colspan="2">মোট</td>
                                                <td style="border: 1px solid #000" align="center">{{ $total_last_year_agricultural_land }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $total_current_year_agricultural_land }}</td>
                                            </tr>

@php
    $last_year_land_jute_research                       = $farm_land_data->last_year_land_jute_research;
    $current_year_land_jute_research                    = $farm_land_data->current_year_land_jute_research;
    $last_year_land_wheat                               = $farm_land_data->last_year_land_wheat;
    $current_year_land_wheat                            = $farm_land_data->current_year_land_wheat;
    $last_year_land_paddy_research                      = $farm_land_data->last_year_land_paddy_research;
    $current_year_land_paddy_research                   = $farm_land_data->current_year_land_paddy_research;
    $last_year_land_sugarcane_research                  = $farm_land_data->last_year_land_sugarcane_research;
    $current_year_land_sugarcane_research               = $farm_land_data->current_year_land_sugarcane_research;
    $last_year_land_vegetables_and_others_research      = $farm_land_data->last_year_land_vegetables_and_others_research;
    $current_year_land_vegetables_and_others_research   = $farm_land_data->current_year_land_vegetables_and_others_research;

    $last_year_land_cotton_research                     = $farm_land_data->last_year_land_cotton_research;
    $current_year_land_cotton_research                  = $farm_land_data->current_year_land_cotton_research;
    $last_year_land_fruit_research                      = $farm_land_data->last_year_land_fruit_research;
    $current_year_land_fruit_research                   = $farm_land_data->current_year_land_fruit_research;
    $last_year_land_others_permanent_research           = $farm_land_data->last_year_land_others_permanent_research;
    $current_year_land_others_permanent_research        = $farm_land_data->current_year_land_others_permanent_research;

    $last_year_land_fish                                = $farm_land_data->last_year_land_fish;
    $current_year_land_fish                             = $farm_land_data->current_year_land_fish;
    $last_year_land_cattle                              = $farm_land_data->last_year_land_cattle;
    $current_year_land_cattle                           = $farm_land_data->current_year_land_cattle;
    $last_year_land_poultry                             = $farm_land_data->last_year_land_poultry;
    $current_year_land_poultry                          = $farm_land_data->current_year_land_poultry;
    $last_year_land_others                              = $farm_land_data->last_year_land_others;
    $current_year_land_others                           = $farm_land_data->current_year_land_others;

    $total_last_year_farm_land                          = $last_year_land_jute_research + $last_year_land_wheat + $last_year_land_paddy_research + $last_year_land_sugarcane_research + $last_year_land_vegetables_and_others_research + $last_year_land_cotton_research + $last_year_land_fruit_research + $last_year_land_others_permanent_research + $last_year_land_fish + $last_year_land_cattle + $last_year_land_poultry + $last_year_land_others;

    $total_current_year_farm_land                       = $current_year_land_jute_research + $current_year_land_wheat + $current_year_land_paddy_research + $current_year_land_sugarcane_research + $current_year_land_vegetables_and_others_research + $current_year_land_cotton_research + $current_year_land_fruit_research + $current_year_land_others_permanent_research + $current_year_land_fish + $current_year_land_cattle + $current_year_land_poultry + $current_year_land_others;
@endphp

                                            <tr>
                                                <td style="border: 1px solid #000" align="left" colspan="4">2. খামার/ফার্মের অধীন জমি:</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="left" colspan="4">2.1 অস্থায়ী ফসলের খামারের অধীন জমি:</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">205</td>
                                                <td style="border: 1px solid #000" align="left">পাট গবেষণা খামার</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_jute_research }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_jute_research }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">206</td>
                                                <td style="border: 1px solid #000" align="left">গম গবেষণা খামার</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_wheat }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_wheat }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">207</td>
                                                <td style="border: 1px solid #000" align="left">ধান গবেষণা খামার</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_paddy_research }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_paddy_research }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">208</td>
                                                <td style="border: 1px solid #000" align="left">ইক্ষু/আখ গবেষণা খামার</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_sugarcane_research }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_sugarcane_research }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">209</td>
                                                <td style="border: 1px solid #000" align="left">সবজি ও অন্যান্য গবেষণা খামার</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_vegetables_and_others_research }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_vegetables_and_others_research }}</td>
                                            </tr>

                                            <tr>
                                                <td style="border: 1px solid #000" align="left" colspan="4">2.2 স্থায়ী ফসলের খামারের অধীন জমি:</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">210</td>
                                                <td style="border: 1px solid #000" align="left">তুলা গবেষণা খামার</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_cotton_research }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_cotton_research }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">211</td>
                                                <td style="border: 1px solid #000" align="left">ফল গবেষণা খামার</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_fruit_research }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_fruit_research }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">212</td>
                                                <td style="border: 1px solid #000" align="left">অন্যান্য স্থায়ী ফসলের খামার </td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_others_permanent_research }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_others_permanent_research }}</td>
                                            </tr>

                                            <tr>
                                                <td style="border: 1px solid #000" align="left" colspan="4">2.3 ফসল বহির্ভুত খামারের অধীন জমি:</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">213</td>
                                                <td style="border: 1px solid #000" align="left">মৎস খামার</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_fish }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_fish }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">214</td>
                                                <td style="border: 1px solid #000" align="left">গবাদি পশু খামার</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_cattle }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_cattle }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">215</td>
                                                <td style="border: 1px solid #000" align="left">হাঁস-মুরগি খামার</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_poultry }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_poultry }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">216</td>
                                                <td style="border: 1px solid #000" align="left">অন্যান্য খামারের অধীন জমি</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_others }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_others }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center" colspan="2">মোট</td>
                                                <td style="border: 1px solid #000" align="center">{{ $total_last_year_farm_land }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $total_current_year_farm_land }}</td>
                                            </tr>

@php
    $last_year_land_govt_nursery        = $nursery_and_forest_data->last_year_land_govt_nursery;
    $current_year_land_govt_nursery     = $nursery_and_forest_data->current_year_land_govt_nursery;
    $last_year_land_private_nursery     = $nursery_and_forest_data->last_year_land_private_nursery;
    $current_year_land_private_nursery  = $nursery_and_forest_data->current_year_land_private_nursery;

    $last_year_land_govt_forest         = $nursery_and_forest_data->last_year_land_govt_forest;
    $current_year_land_govt_forest      = $nursery_and_forest_data->current_year_land_govt_forest;
    $last_year_land_private_forest      = $nursery_and_forest_data->last_year_land_private_forest;
    $current_year_land_private_forest   = $nursery_and_forest_data->current_year_land_private_forest;

    $total_last_year_nursery            = $last_year_land_govt_nursery + $last_year_land_private_nursery;
    $total_current_year_nursery         = $current_year_land_govt_nursery + $current_year_land_private_nursery;

    $total_last_year_forest             = $last_year_land_govt_forest + $last_year_land_private_forest;
    $total_current_year_forest          = $current_year_land_govt_forest + $current_year_land_private_forest;
@endphp

                                            <tr>
                                                <td style="border: 1px solid #000" align="left" colspan="4">3. নার্সারি:</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">316</td>
                                                <td style="border: 1px solid #000" align="left">সরকারি নার্সারি</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_govt_nursery }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_govt_nursery }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">317</td>
                                                <td style="border: 1px solid #000" align="left">বেসরকারি নার্সারি</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_private_nursery }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_private_nursery }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center" colspan="2">মোট</td>
                                                <td style="border: 1px solid #000" align="center">{{ $total_last_year_nursery }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $total_current_year_nursery }}</td>
                                            </tr>

                                            <tr>
                                                <td style="border: 1px solid #000" align="left" colspan="4">4. বনভূমি/জঙ্গল:</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">418</td>
                                                <td style="border: 1px solid #000" align="left">সরকারি বনভূমি</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_govt_forest }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_govt_forest }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">419</td>
                                                <td style="border: 1px solid #000" align="left">বেসরকারি বনভূমি</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_private_forest }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_private_forest }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center" colspan="2">মোট</td>
                                                <td style="border: 1px solid #000" align="center">{{ $total_last_year_forest }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $total_current_year_forest }}</td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="col-6">
                                        <table class="table" style="margin-bottom: 25px">
                                            <tr>
                                                <td style="border: 1px solid #000" align="center" rowspan="2">ভূমির ব্যবহার (কোড)</td>
                                                <td style="border: 1px solid #000" align="center" rowspan="2">ভূমির ব্যবহার</td>
                                                <td style="border: 1px solid #000" align="center" colspan="2">জমির পরিমাপ (একরে)</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">গত বছর</td>
                                                <td style="border: 1px solid #000" align="center">চলতি বছর</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">১</td>
                                                <td style="border: 1px solid #000" align="center">২</td>
                                                <td style="border: 1px solid #000" align="center">৩</td>
                                                <td style="border: 1px solid #000" align="center">৪</td>
                                            </tr>

@php
    $last_year_land_river           = $river_data->last_year_land_river;
    $current_year_land_river        = $river_data->current_year_land_river;
    $last_year_land_pond            = $river_data->last_year_land_pond;
    $current_year_land_pond         = $river_data->current_year_land_pond;
    $last_year_land_canal           = $river_data->last_year_land_canal;
    $current_year_land_canal        = $river_data->current_year_land_canal;
    $last_year_land_haor_baor       = $river_data->last_year_land_haor_baor;
    $current_year_land_haor_baor    = $river_data->current_year_land_haor_baor;
    $last_year_land_dive            = $river_data->last_year_land_dive;
    $current_year_land_dive         = $river_data->current_year_land_dive;

    $total_last_year_river_land     = $last_year_land_river + $last_year_land_pond + $last_year_land_canal + $last_year_land_haor_baor + $last_year_land_dive;

    $total_current_year_river_land  = $current_year_land_river + $current_year_land_pond + $current_year_land_canal + $current_year_land_haor_baor + $current_year_land_dive;
@endphp

                                            <tr>
                                                <td style="border: 1px solid #000" align="left" colspan="4">5. জলাশয়/নদ-নদী:</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">520</td>
                                                <td style="border: 1px solid #000" align="left">নদ-নদী</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_river }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_river }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">521</td>
                                                <td style="border: 1px solid #000" align="left">পুকুর/দিঘী</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_pond }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_pond }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">522</td>
                                                <td style="border: 1px solid #000" align="left">খাল-বিল</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_canal }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_canal }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">523</td>
                                                <td style="border: 1px solid #000" align="left">ডোবা-নালা</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_haor_baor }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_haor_baor }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">524</td>
                                                <td style="border: 1px solid #000" align="left">হাওড়-বাওড়</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_dive }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_dive }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center" colspan="2">মোট</td>
                                                <td style="border: 1px solid #000" align="center">{{ $total_last_year_river_land }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $total_current_year_river_land }}</td>
                                            </tr>

@php
    $last_year_land_hills                       = $minerals_and_hill_data->last_year_land_hills;
    $current_year_land_hills                    = $minerals_and_hill_data->current_year_land_hills;
    $last_year_land_gas_field_or_oil_field      = $minerals_and_hill_data->last_year_land_gas_field_or_oil_field;
    $current_year_land_gas_field_or_oil_field   = $minerals_and_hill_data->current_year_land_gas_field_or_oil_field;
    $last_year_land_stone_mine                  = $minerals_and_hill_data->last_year_land_stone_mine;
    $current_year_land_stone_mine               = $minerals_and_hill_data->current_year_land_stone_mine;
    $last_year_land_coil_mine                   = $minerals_and_hill_data->last_year_land_coil_mine;
    $current_year_land_coil_mine                = $minerals_and_hill_data->current_year_land_coil_mine;
    $last_year_land_others_min                  = $minerals_and_hill_data->last_year_land_others_min;
    $current_year_land_others_min               = $minerals_and_hill_data->current_year_land_others_min;

    $total_last_year_minerals_and_hill_land     = $last_year_land_hills + $last_year_land_gas_field_or_oil_field + $last_year_land_stone_mine + $last_year_land_coil_mine + $last_year_land_others_min;

    $total_current_year_minerals_and_hill_land  = $current_year_land_hills + $current_year_land_gas_field_or_oil_field + $current_year_land_stone_mine + $current_year_land_coil_mine + $current_year_land_others_min;
@endphp

                                            <tr>
                                                <td style="border: 1px solid #000" align="left" colspan="4">6. খনিজ ও পাহাড়:</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">625</td>
                                                <td style="border: 1px solid #000" align="left">পাহাড়/টিলা</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_hills }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_hills }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">626</td>
                                                <td style="border: 1px solid #000" align="left">গ্যাস/তৈল ক্ষেত্র</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_gas_field_or_oil_field }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_gas_field_or_oil_field }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">627</td>
                                                <td style="border: 1px solid #000" align="left">পাথর খনি</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_stone_mine }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_stone_mine }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">628</td>
                                                <td style="border: 1px solid #000" align="left">কয়লা খনির জমি</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_coil_mine }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_coil_mine }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">629</td>
                                                <td style="border: 1px solid #000" align="left">অন্যান্য খনিজ এর অধীন জমি</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_others_min }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_others_min }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center" colspan="2">মোট</td>
                                                <td style="border: 1px solid #000" align="center">{{ $total_last_year_minerals_and_hill_land }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $total_current_year_minerals_and_hill_land }}</td>
                                            </tr>

@php
    $last_year_land_houses                      = $non_agriculture_data->last_year_land_houses;
    $current_year_land_houses                   = $non_agriculture_data->current_year_land_houses;
    $last_year_land_roads                       = $non_agriculture_data->last_year_land_roads;
    $current_year_land_roads                    = $non_agriculture_data->current_year_land_roads;
    $last_year_land_market                      = $non_agriculture_data->last_year_land_market;
    $current_year_land_market                   = $non_agriculture_data->current_year_land_market;
    $last_year_land_office_organization         = $non_agriculture_data->last_year_land_office_organization;
    $current_year_land_office_organization      = $non_agriculture_data->current_year_land_office_organization;
    $last_year_land_educational_organization    = $non_agriculture_data->last_year_land_educational_organization;
    $current_year_land_educational_organization = $non_agriculture_data->current_year_land_educational_organization;
    $last_year_land_mill_factory                = $non_agriculture_data->last_year_land_mill_factory;
    $current_year_land_mill_factory             = $non_agriculture_data->current_year_land_mill_factory;
    $last_year_land_bus_stand                   = $non_agriculture_data->last_year_land_bus_stand;
    $current_year_land_bus_stand                = $non_agriculture_data->current_year_land_bus_stand;
    $last_year_land_religious_organization      = $non_agriculture_data->last_year_land_religious_organization;
    $current_year_land_religious_organization   = $non_agriculture_data->current_year_land_religious_organization;
    $last_year_land_cemetery                    = $non_agriculture_data->last_year_land_cemetery;
    $current_year_land_cemetery                 = $non_agriculture_data->current_year_land_cemetery;
    $last_year_land_social_organization         = $non_agriculture_data->last_year_land_social_organization;
    $current_year_land_social_organization      = $non_agriculture_data->current_year_land_social_organization;
    $last_year_land_park                        = $non_agriculture_data->last_year_land_park;
    $current_year_land_park                     = $non_agriculture_data->current_year_land_park;
    $last_year_land_others                      = $non_agriculture_data->last_year_land_others;
    $current_year_land_others                   = $non_agriculture_data->current_year_land_others;

    $total_last_year_non_agriculture_land       = $last_year_land_houses + $last_year_land_roads + $last_year_land_market + $last_year_land_office_organization + $last_year_land_educational_organization + $last_year_land_mill_factory + $last_year_land_bus_stand + $last_year_land_religious_organization + $last_year_land_cemetery + $last_year_land_social_organization + $last_year_land_park + $last_year_land_others;

    $total_current_year_non_agriculture_land    = $current_year_land_houses + $current_year_land_roads + $current_year_land_market + $current_year_land_office_organization + $current_year_land_educational_organization + $current_year_land_mill_factory + $current_year_land_bus_stand + $current_year_land_religious_organization + $current_year_land_cemetery + $current_year_land_social_organization + $current_year_land_park + $current_year_land_others;

    $final_total_last_year_land                 = $total_last_year_agricultural_land + $total_last_year_farm_land + $total_last_year_nursery + $total_last_year_forest + $total_last_year_river_land + $total_last_year_minerals_and_hill_land + $total_last_year_non_agriculture_land;

    $final_total_current_year_land              = $total_current_year_agricultural_land + $total_current_year_farm_land + $total_current_year_nursery + $total_current_year_forest + $total_current_year_river_land + $total_current_year_minerals_and_hill_land + $total_current_year_non_agriculture_land;
@endphp

                                            <tr>
                                                <td style="border: 1px solid #000" align="left" colspan="4">7. অকৃষি জমি:</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">730</td>
                                                <td style="border: 1px solid #000" align="left">ঘরবাড়ি/বসত বাড়ি</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_houses }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_houses }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">731</td>
                                                <td style="border: 1px solid #000" align="left">রাস্তা-ঘাট/রেলপথ</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_roads }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_roads }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">732</td>
                                                <td style="border: 1px solid #000" align="left">হাট-বাজার</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_market }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_market }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">733</td>
                                                <td style="border: 1px solid #000" align="left">অফিস-আদালত ও ব্যবসা প্রতিষ্ঠান</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_office_organization }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_office_organization }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">734</td>
                                                <td style="border: 1px solid #000" align="left">শিক্ষা প্রতিষ্ঠান</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_educational_organization }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_educational_organization }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">735</td>
                                                <td style="border: 1px solid #000" align="left">মিল-কারখানা</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_mill_factory }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_mill_factory }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">736</td>
                                                <td style="border: 1px solid #000" align="left">বাসস্ট্যান্ড/রেলস্টেশন/স্থলবন্দর/বিমানবন্দর</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_bus_stand }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_bus_stand }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">737</td>
                                                <td style="border: 1px solid #000" align="left">ধর্মীয় প্রতিষ্ঠান, মসজিদ, মন্দির, গির্জা</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_religious_organization }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_religious_organization }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">738</td>
                                                <td style="border: 1px solid #000" align="left">কবরস্থান/শ্মশান</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_cemetery }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_cemetery }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">739</td>
                                                <td style="border: 1px solid #000" align="left">সামাজিক প্রতিষ্ঠান/আশ্রম/এতিমখানা/মাজার ইত্যাদি</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_social_organization }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_social_organization }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">740</td>
                                                <td style="border: 1px solid #000" align="left">খেলার মাঠ/স্টেডিয়াম/পার্ক</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_park }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_park }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">741</td>
                                                <td style="border: 1px solid #000" align="left">অন্যান্য</td>
                                                <td style="border: 1px solid #000" align="center">{{ $last_year_land_others }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $current_year_land_others }}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td style="border: 1px solid #000" align="center" colspan="2">মোট</td>
                                                <td style="border: 1px solid #000" align="center">{{ $total_last_year_non_agriculture_land }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $total_current_year_non_agriculture_land }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center" colspan="2">সর্বমোট</td>
                                                <td style="border: 1px solid #000" align="center">{{ $final_total_last_year_land }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $final_total_current_year_land }}</td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>

@php
    
    $last_year_land_forest                          = $main_class_division_land_data->last_year_land_forest;
    $current_year_land_forest                       = $main_class_division_land_data->current_year_land_forest;
    $last_year_land_net_temporary_crop              = $main_class_division_land_data->last_year_land_net_temporary_crop;
    $current_year_land_net_temporary_crop           = $main_class_division_land_data->current_year_land_net_temporary_crop;
    $last_year_land_permanent                       = $main_class_division_land_data->last_year_land_permanent;
    $current_year_land_permanent                    = $main_class_division_land_data->current_year_land_permanent;
    $last_year_land_nursery                         = $main_class_division_land_data->last_year_land_nursery;
    $current_year_land_nursery                      = $main_class_division_land_data->current_year_land_nursery;
    $last_year_land_fallen                          = $main_class_division_land_data->last_year_land_fallen;
    $current_year_land_fallen                       = $main_class_division_land_data->current_year_land_fallen;
    $last_year_land_arable_uncultivable             = $main_class_division_land_data->last_year_land_arable_uncultivable;
    $current_year_land_arable_uncultivable          = $main_class_division_land_data->current_year_land_arable_uncultivable;
    $last_year_land_unavailable                     = $main_class_division_land_data->last_year_land_unavailable;
    $current_year_land_unavailable                  = $main_class_division_land_data->current_year_land_unavailable;

    $total_last_year_main_class_division_land       = $last_year_land_forest + $last_year_land_net_temporary_crop + $last_year_land_permanent + $last_year_land_nursery + $last_year_land_fallen + $last_year_land_arable_uncultivable + $last_year_land_unavailable;

    $total_current_year_main_class_division_land    = $current_year_land_forest + $current_year_land_net_temporary_crop + $current_year_land_permanent + $current_year_land_nursery + $current_year_land_fallen + $current_year_land_arable_uncultivable + $current_year_land_unavailable;
@endphp

                                <p style="font-size: 1.3em; font-weight: 600" class="text-center">সারণী-২: ভূমির প্রধান শ্রেণী বিভাগ</p>
                                <table class="table" style="margin-bottom: 25px">
                                    <tr>
                                        <td style="border: 1px solid #000" align="center" rowspan="2">ক্রমিক নং</td>
                                        <td style="border: 1px solid #000" align="center" rowspan="2">ভূমির প্রধান শ্রেণী বিভাগ</td>
                                        <td style="border: 1px solid #000" align="center" rowspan="2">কোড</td>
                                        <td style="border: 1px solid #000" align="center" colspan="2">জমির পরিমাণ (একরে)</td>
                                        <td style="border: 1px solid #000" align="center" rowspan="2">গত বছরের তুলনায় হ্রাস/বৃদ্ধির কারণ</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">গত বছর</td>
                                        <td style="border: 1px solid #000" align="center">চলতি বছর</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">১</td>
                                        <td style="border: 1px solid #000" align="center">২</td>
                                        <td style="border: 1px solid #000" align="center">৩</td>
                                        <td style="border: 1px solid #000" align="center">৪</td>
                                        <td style="border: 1px solid #000" align="center">৫</td>
                                        <td style="border: 1px solid #000" align="center">৬</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">১</td>
                                        <td style="border: 1px solid #000" align="left">বনভূমি</td>
                                        <td style="border: 1px solid #000" align="center">10</td>
                                        <td style="border: 1px solid #000" align="center">{{ $last_year_land_forest }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $current_year_land_forest }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $main_class_division_land_data->reason_forest }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">২</td>
                                        <td style="border: 1px solid #000" align="left">নীট অস্থায়ী ফসলের জমি</td>
                                        <td style="border: 1px solid #000" align="center">11</td>
                                        <td style="border: 1px solid #000" align="center">{{ $last_year_land_net_temporary_crop }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $current_year_land_net_temporary_crop }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $main_class_division_land_data->reason_net_temporary_crop }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">৩</td>
                                        <td style="border: 1px solid #000" align="left">স্থায়ী ফসলের জমি (শুধু বাগান)</td>
                                        <td style="border: 1px solid #000" align="center">12</td>
                                        <td style="border: 1px solid #000" align="center">{{ $last_year_land_permanent }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $current_year_land_permanent }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $main_class_division_land_data->reason_permanent_crop }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">৪</td>
                                        <td style="border: 1px solid #000" align="left">নার্সারির অধীন জমি</td>
                                        <td style="border: 1px solid #000" align="center">13</td>
                                        <td style="border: 1px solid #000" align="center">{{ $last_year_land_nursery }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $current_year_land_nursery }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $main_class_division_land_data->reason_nursery }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">৫</td>
                                        <td style="border: 1px solid #000" align="left">চলতি পতিত জমি</td>
                                        <td style="border: 1px solid #000" align="center">14</td>
                                        <td style="border: 1px solid #000" align="center">{{ $last_year_land_fallen }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $current_year_land_fallen }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $main_class_division_land_data->reason_fallen }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">৬</td>
                                        <td style="border: 1px solid #000" align="left">আবাদযোগ্য অনাবাদী জমি</td>
                                        <td style="border: 1px solid #000" align="center">15</td>
                                        <td style="border: 1px solid #000" align="center">{{ $last_year_land_arable_uncultivable }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $current_year_land_arable_uncultivable }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $main_class_division_land_data->reason_arable_uncultivable }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">৭</td>
                                        <td style="border: 1px solid #000" align="left">আবাদের জন্য অপ্রাপ্য জমি</td>
                                        <td style="border: 1px solid #000" align="center">16</td>
                                        <td style="border: 1px solid #000" align="center">{{ $last_year_land_unavailable }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $current_year_land_unavailable }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $main_class_division_land_data->reason_unavailable }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center" colspan="2">মোট(10 +.................+ 16)</td>
                                        <td style="border: 1px solid #000" align="center">17</td>
                                        <td style="border: 1px solid #000" align="center">{{ $total_last_year_main_class_division_land }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $total_current_year_main_class_division_land }}</td>
                                        <td style="border: 1px solid #000" align="center"></td>
                                    </tr>
                                </table>
                                <p>নোট-১: জেলা/উপজেলা/থানার আয়তন=(10 +.................+ 16)</p>
                                <p>নোট-২: কোড (625) পাহাড়/টিলায় শস্য আবাদ হয়ে থাকলে তা স্থায়ী/অস্থায়ী ফসলের জমি হিসাবে অন্তর্ভুক্ত হবে।</p>

@php
    
    $last_year_land_one_crop                        = $temporary_net_crop_data->last_year_land_one_crop;
    $current_year_land_one_crop                     = $temporary_net_crop_data->current_year_land_one_crop;
    $last_year_land_two_crop                        = $temporary_net_crop_data->last_year_land_two_crop;
    $current_year_land_two_crop                     = $temporary_net_crop_data->current_year_land_two_crop;
    $last_year_land_three_crop                      = $temporary_net_crop_data->last_year_land_three_crop;
    $current_year_land_three_crop                   = $temporary_net_crop_data->current_year_land_three_crop;
    $last_year_land_four_or_more_crop               = $temporary_net_crop_data->last_year_land_four_or_more_crop;
    $current_year_land_four_or_more_crop            = $temporary_net_crop_data->current_year_land_four_or_more_crop;

    $total_last_year_temporary_net_crop_land        = $last_year_land_one_crop + $last_year_land_two_crop + $last_year_land_three_crop + $last_year_land_four_or_more_crop;

    $total_current_year_temporary_net_crop_land     = $current_year_land_one_crop + $current_year_land_two_crop + $current_year_land_three_crop + $current_year_land_four_or_more_crop;
@endphp

                                <p style="font-size: 1.3em; font-weight: 600" class="text-center">সারণী-৩: অস্থায়ী নীট ফসলাধীন জমির ব্যবহারভেদে জমির পরিমাণ</p>
                                <table class="table" style="margin-bottom: 25px">
                                    <tr>
                                        <td style="border: 1px solid #000" align="center" rowspan="2">ক্রমিক নং</td>
                                        <td style="border: 1px solid #000" align="center" rowspan="2">অস্থায়ী ফসলাধীন জমির ধরণ</td>
                                        <td style="border: 1px solid #000" align="center" rowspan="2">কোড</td>
                                        <td style="border: 1px solid #000" align="center" colspan="2">জমির পরিমাণ (একরে)</td>
                                        <td style="border: 1px solid #000" align="center" rowspan="2">গত বছরের তুলনায় হ্রাস/বৃদ্ধির কারণ</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">গত বছর</td>
                                        <td style="border: 1px solid #000" align="center">চলতি বছর</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">১</td>
                                        <td style="border: 1px solid #000" align="center">২</td>
                                        <td style="border: 1px solid #000" align="center">৩</td>
                                        <td style="border: 1px solid #000" align="center">৪</td>
                                        <td style="border: 1px solid #000" align="center">৫</td>
                                        <td style="border: 1px solid #000" align="center">৬</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">১</td>
                                        <td style="border: 1px solid #000" align="left">এক-ফসলী জমি</td>
                                        <td style="border: 1px solid #000" align="center">20</td>
                                        <td style="border: 1px solid #000" align="center">{{ $last_year_land_one_crop }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $current_year_land_one_crop }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $temporary_net_crop_data->reason_one_crop }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">২</td>
                                        <td style="border: 1px solid #000" align="left">দুই-ফসলী জমি</td>
                                        <td style="border: 1px solid #000" align="center">21</td>
                                        <td style="border: 1px solid #000" align="center">{{ $last_year_land_two_crop }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $current_year_land_two_crop }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $temporary_net_crop_data->reason_two_crop }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">৩</td>
                                        <td style="border: 1px solid #000" align="left">তিন-ফসলী জমি</td>
                                        <td style="border: 1px solid #000" align="center">22</td>
                                        <td style="border: 1px solid #000" align="center">{{ $last_year_land_three_crop }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $current_year_land_three_crop }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $temporary_net_crop_data->reason_three_crop }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">৪</td>
                                        <td style="border: 1px solid #000" align="left">চার ও তদূর্ধ্ব-ফসলী জমি</td>
                                        <td style="border: 1px solid #000" align="center">23</td>
                                        <td style="border: 1px solid #000" align="center">{{ $last_year_land_four_or_more_crop }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $current_year_land_four_or_more_crop }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $temporary_net_crop_data->reason_four_or_more_crop }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center" colspan="2">মোট নীট অস্থায়ী ফসলের জমি</td>
                                        <td style="border: 1px solid #000" align="center">24</td>
                                        <td style="border: 1px solid #000" align="center">{{ $total_last_year_temporary_net_crop_land }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $total_current_year_temporary_net_crop_land }}</td>
                                        <td style="border: 1px solid #000" align="center"></td>
                                    </tr>
                                </table>
                                <p>বি.দ্রঃ সারণী-২ এর 11 কোডের সমান হবে।</p>

@php
    
    $last_year_land_robi_grain                      = $crop_seasonal_land_data->last_year_land_robi_grain;
    $current_year_land_robi_grain                   = $crop_seasonal_land_data->current_year_land_robi_grain;
    $last_year_land_kharip_grain                    = $crop_seasonal_land_data->last_year_land_kharip_grain;
    $current_year_land_kharip_grain                 = $crop_seasonal_land_data->current_year_land_kharip_grain;
    $last_year_land_fruit_grain                     = $crop_seasonal_land_data->last_year_land_fruit_grain;
    $current_year_land_fruit_grain                  = $crop_seasonal_land_data->current_year_land_fruit_grain;
    $last_year_land_fruitless_grain                 = $crop_seasonal_land_data->last_year_land_fruitless_grain;
    $current_year_land_fruitless_grain              = $crop_seasonal_land_data->current_year_land_fruitless_grain;

    $total_last_year_crop_seasonal_land             = $last_year_land_robi_grain + $last_year_land_kharip_grain;
    $total_current_year_crop_seasonal_land          = $current_year_land_robi_grain + $current_year_land_kharip_grain;
    $total_last_year_fruit_grain                    = $last_year_land_fruit_grain + $last_year_land_fruitless_grain;
    $total_current_year_fruitless_grain             = $current_year_land_fruit_grain + $current_year_land_fruitless_grain;

    $final_total_last_year_crop_seasonal_land       = $total_last_year_crop_seasonal_land + $total_last_year_fruit_grain;
    $final_total_current_year_crop_seasonal_land    = $total_current_year_crop_seasonal_land + $total_current_year_fruitless_grain;
@endphp

                                <p style="font-size: 1.3em; font-weight: 600" class="text-center">সারণী-৪: ফসল/ঋতুভেদে মোট ফসলাধীন জমির পরিমাণ</p>
                                <table class="table" style="margin-bottom: 25px">
                                    <tr>
                                        <td style="border: 1px solid #000" align="center" rowspan="2">ক্রমিক নং</td>
                                        <td style="border: 1px solid #000" align="center" rowspan="2">অস্থায়ী ফসলাধীন জমির ধরণ</td>
                                        <td style="border: 1px solid #000" align="center" rowspan="2">কোড</td>
                                        <td style="border: 1px solid #000" align="center" colspan="2">জমির পরিমাণ (একরে)</td>
                                        <td style="border: 1px solid #000" align="center" rowspan="2">গত বছরের তুলনায় হ্রাস/বৃদ্ধির কারণ</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">গত বছর</td>
                                        <td style="border: 1px solid #000" align="center">চলতি বছর</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">১</td>
                                        <td style="border: 1px solid #000" align="center">২</td>
                                        <td style="border: 1px solid #000" align="center">৩</td>
                                        <td style="border: 1px solid #000" align="center">৪</td>
                                        <td style="border: 1px solid #000" align="center">৫</td>
                                        <td style="border: 1px solid #000" align="center">৬</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="left" colspan="6">অস্থায়ী ফসলাধীন জমি</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">১</td>
                                        <td style="border: 1px solid #000" align="left">রবি শস্য</td>
                                        <td style="border: 1px solid #000" align="center">30</td>
                                        <td style="border: 1px solid #000" align="center">{{ $last_year_land_robi_grain }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $current_year_land_robi_grain }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $crop_seasonal_land_data->reason_robi_grain }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">২</td>
                                        <td style="border: 1px solid #000" align="left">খরিপ শস্য</td>
                                        <td style="border: 1px solid #000" align="center">31</td>
                                        <td style="border: 1px solid #000" align="center">{{ $last_year_land_kharip_grain }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $current_year_land_kharip_grain }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $crop_seasonal_land_data->reason_kharip_grain }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center" colspan="2">মোট</td>
                                        <td style="border: 1px solid #000" align="center"></td>
                                        <td style="border: 1px solid #000" align="center">{{ $total_last_year_crop_seasonal_land }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $total_current_year_crop_seasonal_land }}</td>
                                        <td style="border: 1px solid #000" align="center"></td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="left" colspan="6">স্থায়ী/বর্ষজীবি ফসলাধীন জমি</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">৩</td>
                                        <td style="border: 1px solid #000" align="left">ফলজাতীয় শস্য</td>
                                        <td style="border: 1px solid #000" align="center">40</td>
                                        <td style="border: 1px solid #000" align="center">{{ $last_year_land_fruit_grain }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $current_year_land_fruit_grain }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $crop_seasonal_land_data->reason_fruit_grain }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">৪</td>
                                        <td style="border: 1px solid #000" align="left">ফলবিহীন শস্য</td>
                                        <td style="border: 1px solid #000" align="center">41</td>
                                        <td style="border: 1px solid #000" align="center">{{ $last_year_land_fruitless_grain }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $current_year_land_fruitless_grain }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $crop_seasonal_land_data->reason_fruitless_grain }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center" colspan="2">মোট</td>
                                        <td style="border: 1px solid #000" align="center"></td>
                                        <td style="border: 1px solid #000" align="center">{{ $total_last_year_fruit_grain }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $total_current_year_fruitless_grain }}</td>
                                        <td style="border: 1px solid #000" align="center"></td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center" colspan="2">সর্বমোট</td>
                                        <td style="border: 1px solid #000" align="center"></td>
                                        <td style="border: 1px solid #000" align="center">{{ $final_total_last_year_crop_seasonal_land }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $final_total_current_year_crop_seasonal_land }}</td>
                                        <td style="border: 1px solid #000" align="center"></td>
                                    </tr>
                                </table>

@php
    $total_last_year_land_powered_pump              = $irrigation_process_data->total_last_year_land_powered_pump;
    $total_current_year_land_powered_pump           = $irrigation_process_data->total_current_year_land_powered_pump;
    $total_last_year_land_deep_tubewell             = $irrigation_process_data->total_last_year_land_deep_tubewell;
    $total_current_year_land_deep_tubewell          = $irrigation_process_data->total_current_year_land_deep_tubewell;
    $total_last_year_land_shallow_tubewell          = $irrigation_process_data->total_last_year_land_shallow_tubewell;
    $total_current_year_land_shallow_tubewell       = $irrigation_process_data->total_current_year_land_shallow_tubewell;
    $total_last_year_land_manual_tubewell           = $irrigation_process_data->total_last_year_land_manual_tubewell;
    $total_current_year_land_manual_tubewell        = $irrigation_process_data->total_current_year_land_manual_tubewell;
    $total_last_year_land_traditional_method        = $irrigation_process_data->total_last_year_land_traditional_method;
    $total_current_year_land_traditional_method     = $irrigation_process_data->total_current_year_land_traditional_method;
    $net_last_year_land_powered_pump                = $irrigation_process_data->net_last_year_land_powered_pump;
    $net_current_year_land_powered_pump             = $irrigation_process_data->net_current_year_land_powered_pump;
    $net_last_year_land_deep_tubewell               = $irrigation_process_data->net_last_year_land_deep_tubewell;
    $net_current_year_land_deep_tubewell            = $irrigation_process_data->net_current_year_land_deep_tubewell;
    $net_last_year_land_shallow_tubewell            = $irrigation_process_data->net_last_year_land_shallow_tubewell;
    $net_current_year_land_shallow_tubewell         = $irrigation_process_data->net_current_year_land_shallow_tubewell;
    $net_last_year_land_manual_tubewell             = $irrigation_process_data->net_last_year_land_manual_tubewell;
    $net_current_year_land_manual_tubewell          = $irrigation_process_data->net_current_year_land_manual_tubewell;
    $net_last_year_land_traditional_method          = $irrigation_process_data->net_last_year_land_traditional_method;
    $net_current_year_land_traditional_method       = $irrigation_process_data->net_current_year_land_traditional_method;

    $total_last_year_irrigation_process             = $total_last_year_land_powered_pump + $total_last_year_land_deep_tubewell + $total_last_year_land_shallow_tubewell + $total_last_year_land_manual_tubewell + $total_last_year_land_traditional_method;

    $total_current_year_irrigation_process          = $total_current_year_land_powered_pump + $total_current_year_land_deep_tubewell + $total_current_year_land_shallow_tubewell + $total_current_year_land_manual_tubewell + $total_current_year_land_traditional_method;

    $total_last_year_net_irrigation_process         = $net_last_year_land_powered_pump + $net_last_year_land_deep_tubewell + $net_last_year_land_shallow_tubewell + $net_last_year_land_manual_tubewell + $net_last_year_land_traditional_method;

    $total_current_year_net_irrigation_process      = $net_current_year_land_powered_pump + $net_current_year_land_deep_tubewell + $net_current_year_land_shallow_tubewell + $net_current_year_land_manual_tubewell + $net_current_year_land_traditional_method;
@endphp

                                <p style="font-size: 1.3em; font-weight: 600" class="text-center">সারণী-৫: সেচ পদ্ধতি অনুযায়ী সেচের আওতায় জমির পরিমাণ</p>
                                <table class="table" style="margin-bottom: 25px">
                                    <tr>
                                        <td style="border: 1px solid #000" align="center" rowspan="2">ক্রমিক নং</td>
                                        <td style="border: 1px solid #000" align="center" rowspan="2">সেচ পদ্ধতি</td>
                                        <td style="border: 1px solid #000" align="center" rowspan="2">কোড</td>
                                        <td style="border: 1px solid #000" align="center" colspan="2">মোট সেচকৃত জমির পরিমাণ</td>
                                        <td style="border: 1px solid #000" align="center" colspan="2">নীট সেচকৃত জমির পরিমাণ</td>
                                        <td style="border: 1px solid #000" align="center" rowspan="2">গত বছরের তুলনায় হ্রাস/বৃদ্ধির কারণ</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">গত বছর</td>
                                        <td style="border: 1px solid #000" align="center">চলতি বছর</td>
                                        <td style="border: 1px solid #000" align="center">গত বছর</td>
                                        <td style="border: 1px solid #000" align="center">চলতি বছর</td>
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
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">১</td>
                                        <td style="border: 1px solid #000" align="left">শক্তি চালিত পাম্প</td>
                                        <td style="border: 1px solid #000" align="center">1</td>
                                        <td style="border: 1px solid #000" align="center">{{ $total_last_year_land_powered_pump }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $total_current_year_land_powered_pump }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $net_last_year_land_powered_pump }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $net_current_year_land_powered_pump }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $irrigation_process_data->reason_powered_pump }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">২</td>
                                        <td style="border: 1px solid #000" align="left">গভীর নলকূপ</td>
                                        <td style="border: 1px solid #000" align="center">2</td>
                                        <td style="border: 1px solid #000" align="center">{{ $total_last_year_land_deep_tubewell }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $total_current_year_land_deep_tubewell }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $net_last_year_land_deep_tubewell }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $net_current_year_land_deep_tubewell }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $irrigation_process_data->reason_deep_tubewell }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">৩</td>
                                        <td style="border: 1px solid #000" align="left">অ-গভীর নলকূপ</td>
                                        <td style="border: 1px solid #000" align="center">3</td>
                                        <td style="border: 1px solid #000" align="center">{{ $total_last_year_land_shallow_tubewell }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $total_current_year_land_shallow_tubewell }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $net_last_year_land_shallow_tubewell }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $net_current_year_land_shallow_tubewell }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $irrigation_process_data->reason_shallow_tubewell }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">৪</td>
                                        <td style="border: 1px solid #000" align="left">হস্তচালিত নলকূপ</td>
                                        <td style="border: 1px solid #000" align="center">4</td>
                                        <td style="border: 1px solid #000" align="center">{{ $total_last_year_land_manual_tubewell }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $total_current_year_land_manual_tubewell }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $net_last_year_land_manual_tubewell }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $net_current_year_land_manual_tubewell }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $irrigation_process_data->reason_manual_tubewell }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">৫</td>
                                        <td style="border: 1px solid #000" align="left">সনাতন পদ্ধতি দোন/বালতি/খাল ইত্যাদি</td>
                                        <td style="border: 1px solid #000" align="center">5</td>
                                        <td style="border: 1px solid #000" align="center">{{ $total_last_year_land_traditional_method }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $total_current_year_land_traditional_method }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $net_last_year_land_traditional_method }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $net_current_year_land_traditional_method }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $irrigation_process_data->reason_traditional_method }}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td style="border: 1px solid #000" align="center" colspan="2">মোট</td>
                                        <td style="border: 1px solid #000" align="center">6</td>
                                        <td style="border: 1px solid #000" align="center">{{ $total_last_year_irrigation_process }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $total_current_year_irrigation_process }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $total_last_year_net_irrigation_process }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $total_current_year_net_irrigation_process }}</td>
                                        <td style="border: 1px solid #000" align="center"></td>
                                    </tr>
                                </table>

@php
    
    $last_year_land_amon                    = $irrigation_land_data->last_year_land_amon;
    $current_year_land_amon                 = $irrigation_land_data->current_year_land_amon;
    $last_year_land_borough	                = $irrigation_land_data->last_year_land_borough	;
    $current_year_land_borough              = $irrigation_land_data->current_year_land_borough;
    $last_year_land_wheat                   = $irrigation_land_data->last_year_land_wheat;
    $current_year_land_wheat                = $irrigation_land_data->current_year_land_wheat;
    $last_year_land_sugarcane               = $irrigation_land_data->last_year_land_sugarcane;
    $current_year_land_sugarcane            = $irrigation_land_data->current_year_land_sugarcane;
    $last_year_land_cotton                  = $irrigation_land_data->last_year_land_cotton;
    $current_year_land_cotton               = $irrigation_land_data->current_year_land_cotton;
    $last_year_land_potatoes	            = $irrigation_land_data->last_year_land_potatoes	;
    $current_year_land_potatoes             = $irrigation_land_data->current_year_land_potatoes;
    $last_year_land_vegetables              = $irrigation_land_data->last_year_land_vegetables;
    $current_year_land_vegetables           = $irrigation_land_data->current_year_land_vegetables;
    $last_year_land_others                  = $irrigation_land_data->last_year_land_others;
    $current_year_land_others               = $irrigation_land_data->current_year_land_others;

    $total_last_year_irrigation_land        = $last_year_land_amon + $last_year_land_borough	 + $last_year_land_wheat + $last_year_land_sugarcane + $last_year_land_cotton + $last_year_land_potatoes + $last_year_land_vegetables + $last_year_land_others;

    $total_current_year_irrigation_land     = $current_year_land_amon + $current_year_land_borough + $current_year_land_wheat + $current_year_land_sugarcane + $current_year_land_cotton + $current_year_land_potatoes + $current_year_land_vegetables + $current_year_land_others;
@endphp

                                <p style="font-size: 1.3em; font-weight: 600" class="text-center">সারণী-৬: ফসলভেদে সেচ জমির পরিমাণ</p>
                                <table class="table" style="margin-bottom: 25px">
                                    <tr>
                                        <td style="border: 1px solid #000" align="center" rowspan="2">ক্রমিক নং</td>
                                        <td style="border: 1px solid #000" align="center" rowspan="2">ফসলের নাম</td>
                                        <td style="border: 1px solid #000" align="center" rowspan="2">ফসল কোড</td>
                                        <td style="border: 1px solid #000" align="center" colspan="2">সেচকৃত জমির পরিমাণ (একরে)</td>
                                        <td style="border: 1px solid #000" align="center" rowspan="2">গত বছরের তুলনায় হ্রাস/বৃদ্ধির কারণ</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">গত বছর</td>
                                        <td style="border: 1px solid #000" align="center">চলতি বছর</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">১</td>
                                        <td style="border: 1px solid #000" align="center">২</td>
                                        <td style="border: 1px solid #000" align="center">৩</td>
                                        <td style="border: 1px solid #000" align="center">৪</td>
                                        <td style="border: 1px solid #000" align="center">৫</td>
                                        <td style="border: 1px solid #000" align="center">৬</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">১</td>
                                        <td style="border: 1px solid #000" align="center">আমন</td>
                                        <td style="border: 1px solid #000" align="center">11</td>
                                        <td style="border: 1px solid #000" align="center">{{ $last_year_land_amon }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $current_year_land_amon }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $irrigation_land_data->reason_amon }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">২</td>
                                        <td style="border: 1px solid #000" align="center">বোরো</td>
                                        <td style="border: 1px solid #000" align="center">12</td>
                                        <td style="border: 1px solid #000" align="center">{{ $last_year_land_borough }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $current_year_land_borough }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $irrigation_land_data->reason_borough }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">৩</td>
                                        <td style="border: 1px solid #000" align="center">গম</td>
                                        <td style="border: 1px solid #000" align="center">13</td>
                                        <td style="border: 1px solid #000" align="center">{{ $last_year_land_wheat }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $current_year_land_wheat }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $irrigation_land_data->reason_wheat }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">৪</td>
                                        <td style="border: 1px solid #000" align="center">আখ</td>
                                        <td style="border: 1px solid #000" align="center">14</td>
                                        <td style="border: 1px solid #000" align="center">{{ $last_year_land_sugarcane }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $current_year_land_sugarcane }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $irrigation_land_data->reason_sugarcane }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">৫</td>
                                        <td style="border: 1px solid #000" align="center">তুলা</td>
                                        <td style="border: 1px solid #000" align="center">15</td>
                                        <td style="border: 1px solid #000" align="center">{{ $last_year_land_cotton }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $current_year_land_cotton }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $irrigation_land_data->reason_cotton }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">৬</td>
                                        <td style="border: 1px solid #000" align="center">আলু</td>
                                        <td style="border: 1px solid #000" align="center">16</td>
                                        <td style="border: 1px solid #000" align="center">{{ $last_year_land_potatoes }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $current_year_land_potatoes }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $irrigation_land_data->reason_potatoes }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">৭</td>
                                        <td style="border: 1px solid #000" align="center">সবজি</td>
                                        <td style="border: 1px solid #000" align="center">17</td>
                                        <td style="border: 1px solid #000" align="center">{{ $last_year_land_vegetables }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $current_year_land_vegetables }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $irrigation_land_data->reason_vegetables }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">৮</td>
                                        <td style="border: 1px solid #000" align="center">অন্যান্য</td>
                                        <td style="border: 1px solid #000" align="center">18</td>
                                        <td style="border: 1px solid #000" align="center">{{ $last_year_land_others }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $current_year_land_others }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $irrigation_land_data->reason_others }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center" colspan="2">মোট</td>
                                        <td style="border: 1px solid #000" align="center"></td>
                                        <td style="border: 1px solid #000" align="center">{{ $total_last_year_irrigation_land }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $total_current_year_irrigation_land }}</td>
                                        <td style="border: 1px solid #000" align="center"></td>
                                    </tr>
                                    
                                </table>
                                <p>বিঃ দ্রঃ সারণী-৫ এর মোট সেচকৃত জমির পরিমাণ (কলাম ৪ ও ৫) এবং সারণী-৬ এর সেচকৃত জমির পরিমাণ (কলাম ৪ ও ৫) একই হবে।</p>

                                




                                    
                                    
                                    
                                
                                {{-- ************** instruction section **************** --}}
                                <div class="row">
                                    <div class="col-lg-12 mt-20">
                                        <div class="row">
                                            <div class="col-lg-4 ml-8">
                                                <p>তথ্য সংকলনকারীর স্বাক্ষর, পূর্ণ নাম ও পদবী</p>
                                                <p>তারিখ :...................</p>
                                            </div>
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-4 text-right mr-8">
                                                <p>কর্মকর্তার পদবী ও সীল</p>
                                                <p>তারিখ :....................</p>
                                            </div>
                                        </div>
                                        
                                        <p class="text-center" style="font-weight: bold">তফসিল পূরণ/তথ্য সংগ্রহের নির্দেশাবলি</p>
                                        <p style="font-size: 1.3em; font-weight: 600">সাধারণ নির্দেশাবলি:</p>
                                        <p class="m-1 ml-10">০১. প্রতি বছর ৩০ সেপ্টেম্বর -এর মধ্যে অবশ্যই বিভাগীয় পরিসংখ্যান অফিস এবং জেলা পরিসংখ্যান অফিসের মাধ্যমে ঢাকায় পৌঁছাতে হবে । </p>
                                        <p class="m-1 ml-10">০২. জেলা পরিসংখ্যান অফিস উপজেলা তথ্যের ভিত্তিতে উপজেলা / থানাওয়ারি সংকলন করে (সারণী ১ হতে ৬ পর্যন্ত ) প্রেরণ করবে ।</p>
                                        <p class="m-1 ml-10">০৩. বিভাগীয় পরিসংখ্যান অফিস জেলার তথ্যের ভিত্তিতে জেলার সংকলন করে ( সারণী ১ হতে ৬ পর্যন্ত ) এগ্রিকালচার উইং -এ প্রেরণ করবে ।</p>
                                        <p class="m-1 ml-10">০৪. সব সংখ্যা ইংরেজিতে লিখতে হবে ।</p>
                                        <p class="m-1 ml-10">০৫. এ তফসিলটি দেশের প্রতিটি উপজেলা /থানার জন্য প্রযোজ্য ।</p>


                                        <p style="font-size: 1.3em; font-weight: 600" class="mt-4">অংশ-১: ভূমির ব্যবহার</p>
                                        <p style="font-size: 1.2em; font-weight: 600">সারণী-১</p>
                                        <p class="m-1 ml-10">০১. এ সরণীতে প্রতিটি জেলা /উপজেলা /থানা মোট আয়তন  বা এলাকার গত এক বছরে ভূমির ব্যবহারের ভিত্তিতে আয়তন (একরে ) সংগ্রহ করতে হবে ।</p>
                                        <p class="m-1 ml-10">০২. কলাম-২ এ ভূমির ব্যবহার অনুযায়ী তার বিপরীতে জমির পরিমাণ কলাম ৩ ও ৪ এ লিখতে হবে । মনে রাখতে   হবে জেলা / উপজেলা /থানা মোট আয়তনের সাথে ভূমির ব্যবহারের যোগফলের সমান হবে ।</p>
                                        <p class="m-1 ml-10">০৩. সরকারি বন বলতে প্রতিষ্ঠিত আইনানুসারে বোন বিভাগের আওতায় বোন হিসেবে শ্রেণীভুক্ত অথবা বোন বিভাগ কর্তৃক অথবা কৌশল দিক হতে নিয়ন্ত্রিত জমি বুঝাবে ।</p>
                                        <p class="m-1 ml-10">০৪. কোন বছরের নীট ফসলাধিন জমির পরিমাণ এক,দুই এবং তিন ফসলী জমির যোগফলের সমান হবে । এ যোগ করার সময় দুই এবং তিন ফসলী জমির পরিমাণ এক ফসলী জমির পরিমাণের ন্যায় মাত্র একবার গণনা করতে হবে ।</p>
                                        <p class="m-1 ml-10">০৫. পতিত-জমির অন্তর্ভুক্ত হবে সে সমস্ত জমি যা নির্দিষ্ট বছরে পতিত রয়েছে কিন্তু আগের বছরে সেখানে এক বা  একাধিক ফসলের চাষ করা হয়েছে।</p>
                                        <p class="m-1 ml-10">০৬. আবাদযোগ্য অনাবাদি জমি বলতে সে সমস্ত জমি বুঝাবে যা আবাদযোগ্য কিন্তু অদ্যাবধি তাতে কোন শস্য আবাদ করা হয়নি । খড় জাতীয় ঘাস ও গাছপালার অধীন জঙ্গল এলাকাও, যা বনের অংশ নয়, অন্তর্ভুক্ত হবে ।</p>
                                        <p class="m-1 ml-10">০৭. আবাদের জন্য অপ্রাপ্য জমি বলতে চাষাবাদ করা সম্ভব নয় এমন জমি বুঝবে । ঘর, দালানকোঠা, রাস্তা,  নদীনালা, ডোবা, খেলার মাঠ ইত্যাদির অধীন জমি যেখানে শস্য আবাদ সম্ভব নহে এসব অন্তর্ভুক্ত হবে ।</p>
                                        <p class="m-1 ml-10">০৮. হর্টিকালচার বোর্ড- এর অধীন যে সব নার্সারি রয়েছে সেগুলো সরকারি নার্সারি হিসেবে অন্তর্ভুক্ত হবে ।</p>


                                        <p style="font-size: 1.2em; font-weight: 600" class="mt-8">সারণী-২ এর ক্রমিক নং ১ থেকে ৭ এর তথ্যের জন্য সারণী ১ এর কোন কোন কতগুলো নিতে হবে তা নিয়ে উল্লেখ করা হলো।</p>
                                        <p class="m-1 ml-10">০১. বনভূমির জমির পরিমাণের ক্ষেত্রে কোড - 4।</p>
                                        <p class="m-1 ml-10">০২. নীট অস্থায়ী ফসলের জমির ক্ষেত্রে কোড 102 + কোড 2.1।</p>
                                        <p class="m-1 ml-10">০৩. স্থায়ী ফসলের জমি = কোড 101 + কোডে 2.2।</p>
                                        <p class="m-1 ml-10">০৪. নার্সারী = কোড 3।</p>
                                        <p class="m-1 ml-10">০৫. চলতি পতিত জমি = কোড 103।</p>
                                        <p class="m-1 ml-10">০৬. আবাদযোগ্য অনাবাদি জমি = কোড 104।</p>
                                        <p class="m-1 ml-10">০৭. আবাদের জন্য অপ্রাপ্য জমি = কোড 2.3 + কোড 5 + কোড 6 + কোড 7।</p>

                                        <p style="font-size: 1.2em; font-weight: 600" class="mt-8">সারণী -৩</p>
                                        <p class="m-1 ml-10">০১. এক ফসলী জমি বলতে সারা বছরে যে সব জমিতে কেবলমাত্র একটি ফসল একবার করা হয়েছে এরূপ জমি বুঝাবে।</p>
                                        <p class="m-1 ml-10">০২. দুই ফসলী জমি বলতে সারা বছরে যে সব জমিতে দুই ফসল হয়েছে এমন জমি বুঝাবে।</p>
                                        <p class="m-1 ml-10">০৩. তিন ফসলী জমি বলতে সারা বছরে যে সব জমিতে তিনটি ফসল হয়েছে এমন জমি বুঝবে।</p>

                                        <p style="font-size: 1.2em; font-weight: 600" class="mt-8">সারণী-৪</p>
                                        <p class="m-1 ml-10">০১. রবি শস্য: আমন, শীতকালীন তিল, আখ, বোরো, গম, বার্লি, রবি, জোয়ার, অন্যান্য রবি সিরিয়াল, ছোলা, অড়হর, মুগ, মুশুর, মাস কালাই, খেসারি, মটর, অন্যান্য রবি ডাল, রাই ও সরিষা, রবি বাদাম, তিষি, কেষ্টর, অন্যান্য তৈলবীজ, রবি বেগুন , বাঁধাকপি , ফুলকপি , লাউ , কুমড়া ,টমেটো , মূল , শিম , অন্যান্য রবি শাক-সবজি , রবি মরিচ , পিঁয়াজ , রসুন , ধনিয়া , হলুদ , আদা , অন্যান্য মসলা , আলু , মিষ্টি আলু , অন্যান্য রবি খাদ্যশস্য , তামাক , রবি গো-খাদ্য ইত্যাদি।</p>
                                        <p class="m-1 ml-10">০২. খরিপ শস্য: আউশ , বাজরা , ভূট্টা , ভাদই জোয়ার , অন্যান্য খরিপ সিরিয়াল , গাড়ি কলাই , বরবটি , অন্যান্য খরিপ ডাল , গ্রীষ্মকালীন তিল , খরিপ চীন বাদাম, খরিপ বেগুন , অন্যান্য খরিপ শাক-সবজি , খরিপ  মরিচ , অন্যান্য খরিপ খাদ্য শস্য , পাট , তুলা , খরিপ শনপাট, পটল , করলা , কচু , ঢেঁড়শ , চালকুমড়া , পুঁইশাক , খরিপ গো-খাদ্য ইত্যাদি।</p>
                                        <p class="m-1 ml-10">০৩. বহু বর্ষজীবি শস্য: আম , কলা , নারিকেল , কাঁঠাল, কমলা লেবু , লেবু , আনারস , পেঁপে , ডুমুর , পেঁয়ারা , কুল , তুত , অন্যান্য ফল , চা , পান সুপারি , তাল , খেজুর , গোলপাতা , ইত্যাদি। বিভিন্ন সারণীতে প্রদত্ত তথ্যে consistency বা মিল থাকতে হবে। রবি ও খরিপ শস্যের আওতাধীন জমি পরিমান লিখতে হবে।  </p>

                                        <p style="font-size: 1.3em; font-weight: 600" class="mt-4">অংশ-১: সেচ ব্যবস্থা : </p>
                                        <p class="m-1 ml-10">০১. দেশে সেচের আওতায় মোট জমির পরিমাণ নির্ণয়ের জন্য ৫ ও ৬ সারণীতে তথ্য সংগ্রহ করতে হবে। সারণি ৫-এ সেচের পদ্ধতি অনুযায়ী সেচ জমির পরিমাণ তথ্য সংগ্রহ করতে হবে। মনে রাখতে হবে ১ একর বোরো ধানে তিনবার সেচ বা পানি দেয়ার দরকার হয়েছে সে ক্ষেত্রে সেচ জমির পরিমাণ এক একর হবে । এখানে ১ একর * ৩ * ৩ একর হবে না ।তবে সেই একই পদ্ধতিতে বোরো ধানের পর অন্য ফসল লাগিয়ে আবার যদি সেচ দেয়া হয় তবে বোরো ধানের জমি যোগ এ ফসলের জমি সমান মোট সেচের জমি হবে । সারণী -৫ এর মোট সেচকৃত জমির পরিমাণ (কলাম ৪ ও ৫) সরণী -৬ (কলাম ৪ ও ৫) এর মোট একই হবে ।</p>
                                        <p class="m-1 ml-10">০২. তফসিল-১ (দাগগুচ্ছ ব্যবহার জরিপ) এর তথ্য এই জরিপের তথ্য হিসাবে বিবেচনায় আনা যেতে পারে ।</p>
                                        <p class="m-1 ml-10">তফসিল-৯/৪০,০০০/০৭</p>

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