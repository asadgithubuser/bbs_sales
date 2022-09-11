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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">প্রধান ফসলের মূল্য ও উৎপাদন খরচ জরিপ তফসিল </h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted">প্রধান ফসলের মূল্য ও উৎপাদন খরচ জরিপ তফসিল </a>
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
                                    <p class="font-weight-bold mt-4">প্রধান ফসলের মূল্য ও উৎপাদন খরচ জরিপ তফসিল</p>
                                    <p class="mt-4">(Cost of Production and Producer's Price of Major Crops)</p>
                                </div>
                                <div class="col-3">
                                    <p class="font-weight-bold text-right">তফসিল - ৭</p>
                                </div>
                            </div>
                            <div class="card-body">

                                <p style="font-size: 1.3em; font-weight: 600">১। এলাকা পরিচিতি</p>
                                <table class="table" style="margin-bottom: 25px">
                                    <tr>
                                        <td style="border: 1px solid #000" align="left" colspan="2">বিভাগ : <b>{{ $list->division ? $list->division->name_bn : "-"}}</b></td>
                                        <td style="border: 1px solid #000" align="left" colspan="2">জেলা : <b>{{ $list->district ? $list->district->name_bn : "-"}}</b></td>
                                        <td style="border: 1px solid #000" align="left" colspan="2">উপজেলা/থানা : <b>{{ $list->upazila ? $list->upazila->name_bd : "-"}}</b></td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="left">কোড :</td>
                                        <td style="border: 1px solid #000" align="left"> <b>{{ $list->division ? $list->division->division_bbs_code : "-"}}</b></td>
                                        <td style="border: 1px solid #000" align="left">কোড :</td>
                                        <td style="border: 1px solid #000" align="left"> <b>{{ $list->district ? $list->district->district_bbs_code : "-"}}</b></td>
                                        <td style="border: 1px solid #000" align="left">কোড :</td>
                                        <td style="border: 1px solid #000" align="left"> <b>{{ $list->upazila ? $list->upazila->upazila_bbs_code : "-"}}</b></td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="left">মৌজার নাম :</td>
                                        <td style="border: 1px solid #000" align="left">-</td>
                                        <td style="border: 1px solid #000" align="left">দাগগুচ্ছের নং :</td>
                                        <td style="border: 1px solid #000" align="left">-</td>
                                        <td style="border: 1px solid #000" align="left" colspan="2">তথ্য সংগ্রহের সময়কাল : {{ $list->collection_start_date }} তারিখ হতে {{ $list->collection_end_date }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="left" colspan="3">কৃষক/চাষীর নাম : {{ $list->farmer ? $list->farmer->farmers_name : ""}}</td>
                                        <td style="border: 1px solid #000" align="left" colspan="3">মোবাইল নম্বর : {{ $list->farmer ? $list->farmer->farmers_mobile : ""}}</td>
                                    </tr>
                                </table>

                                <p style="font-size: 1.3em; font-weight: 600">১। জমির ভাড়া/লিজ খরচ</p>
                                <table class="table" style="margin-bottom: 25px">
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">দাগগুচ্ছ/দাগগুচ্ছ বহির্ভুত আবাদকৃত জমির পরিমান (একরে)</td>
                                        <td style="border: 1px solid #000" align="center">জমির ধরণ : <br>নিজস্ব-1 <br>বর্গা-2 <br>ভাড়া/লিজকৃত-3</td>
                                        <td style="border: 1px solid #000" align="center">নিজস্ব জমি হলে বছরে আনুমানিক কত টাকা ভাড়া হতে পারে ?</td>
                                        <td style="border: 1px solid #000" align="center">বর্গা জমি হলে বছরে আনুমানিক কত টাকা ভাড়া হতে পারে ?</td>
                                        <td style="border: 1px solid #000" align="center">ভাড়া বা লিজকৃত হলে বছরে কত টাকা ভাড়া হতে পারে ?</td>
                                        <td style="border: 1px solid #000" align="center">শুধু এ ফসলের জন্য আনুমানিক ভাড়া কত ? (টাকা)</td>
                                        <td style="border: 1px solid #000" align="center">এলাকায় একর প্রতি বছরে ভাড়া (টাকা)</td>
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
                                        <td style="border: 1px solid #000" align="center">
                                            {{ $list->landRent ? $list->landRent->amount_of_cultivable_land_cluster_or_outside_cluster : '' }}
                                        </td>
                                        <td style="border: 1px solid #000" align="center">
                                            {{ $list->landRent ? $list->landRent->land_type : '' }}
                                        </td>
                                        <td style="border: 1px solid #000" align="center">
                                            @if ($list->landRent)
                                                @if($list->landRent->land_type == 1)
                                                {{ $list->landRent ? $list->landRent->land_rent_amount : '' }}
                                                @endif
                                            @else 
                                            -
                                            @endif
                                            
                                        </td>
                                        <td style="border: 1px solid #000" align="center">
                                            @if ($list->landRent)
                                                @if($list->landRent->land_type == 2)
                                                {{ $list->landRent ? $list->landRent->land_rent_amount : '' }}
                                                @else 
                                                -
                                                @endif
                                            @else 
                                            -
                                            @endif
                                        </td>
                                        <td style="border: 1px solid #000" align="center">
                                            @if ($list->landRent)
                                                @if($list->landRent->land_type == 3)
                                                {{ $list->landRent ? $list->landRent->land_rent_amount : '' }}
                                                @else 
                                                -
                                                @endif
                                            @else 
                                            -
                                            @endif
                                        </td>
                                        <td style="border: 1px solid #000" align="center">
                                            {{ $list->landRent ? $list->landRent->approximate_rent_amount : '' }}
                                        </td>
                                        <td style="border: 1px solid #000" align="center">
                                            {{ $list->landRent ? $list->landRent->area_rent_amount_per_year : ''}} 
                                        </td>
                                    </tr>
                                </table>

                                <p style="font-size: 1.3em; font-weight: 600">২। জমি কর্ষণ/চাষ করা</p>
                                <table class="table" style="margin-bottom: 25px">
                                    <tr>
                                        <td style="border: 1px solid #000" align="left">জমি কর্ষণ/চাষের ধরণ</td>
                                        <td style="border: 1px solid #000" align="center">সংখ্যা</td>
                                        <td style="border: 1px solid #000" align="center">খরচ (টাকা)</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="left">১ - নিজস্ব হাল/বলদ (চাষ সংখ্যা শ্রমিক সহ)</td>
                                        <td style="border: 1px solid #000" align="center">
                                            {{ $list->landCultivateCost ? $list->landCultivateCost->own_korshon_quantity : ''}}
                                        </td>
                                        <td style="border: 1px solid #000" align="center">
                                            {{ $list->landCultivateCost ? $list->landCultivateCost->own_korshon_amount : ''}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="left">২ - ভাড়া করা  হাল/বলদ (চাষ সংখ্যা শ্রমিক সহ)</td>
                                        <td style="border: 1px solid #000" align="center"> 
                                            {{ $list->landCultivateCost ? $list->landCultivateCost->rent_korshon_quantity : ''}}
                                        </td>
                                        <td style="border: 1px solid #000" align="center">
                                            {{ $list->landCultivateCost ? $list->landCultivateCost->rent_korshon_amount : ''}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="left">৩ - পাওয়ার টিলার/ট্রাক্টর ভাড়া (চাষ সংখ্যা শ্রমিক সহ)</td>
                                        <td style="border: 1px solid #000" align="center"> 
                                            {{ $list->landCultivateCost ? $list->landCultivateCost->power_tiler_korshon_quantity : '' }}
                                        </td>
                                        <td style="border: 1px solid #000" align="center">
                                            {{ $list->landCultivateCost ? $list->landCultivateCost->power_tiler_korshon_amount : '' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="left">৪ - শ্রমিক মজুরি (কর্ষণের/চাষের কাজে)</td>
                                        <td style="border: 1px solid #000" align="center">
                                            {{ $list->landCultivateCost ? $list->landCultivateCost->sromik_mojuri_quantity : '' }}
                                        </td>
                                        <td style="border: 1px solid #000" align="center">
                                            {{ $list->landCultivateCost ? $list->landCultivateCost->sromik_mojuri_amount : '' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="left">৫ - পারিবারিক শ্রমিক (কর্ষণের/চাষের সময় কাজ)</td>
                                        <td style="border: 1px solid #000" align="center">
                                            {{ $list->landCultivateCost ? $list->landCultivateCost->paribarik_sromik_quantity : '' }}
                                        </td>
                                        <td style="border: 1px solid #000" align="center">
                                            {{ $list->landCultivateCost ? $list->landCultivateCost->paribarik_sromik_amount : '' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="left">মোট :</td>
                                        <td style="border: 1px solid #000" align="center">{{ ($list->landCultivateCost ? $list->landCultivateCost->own_korshon_quantity : 0) +
                                            ($list->landCultivateCost ? $list->landCultivateCost->rent_korshon_quantity : 0) +
                                            ($list->landCultivateCost ? $list->landCultivateCost->power_tiler_korshon_quantity : 0) +
                                            ($list->landCultivateCost ? $list->landCultivateCost->sromik_mojuri_quantity : 0) +
                                            ($list->landCultivateCost ? $list->landCultivateCost->paribarik_sromik_quantity : 0) }}</td>
                                        <td style="border: 1px solid #000" align="center">
                                        {{ 
                                             $form2= ($list->landCultivateCost ? $list->landCultivateCost->own_korshon_amount : 0) + 
                                                ($list->landCultivateCost ? $list->landCultivateCost->rent_korshon_amount : 0) + 
                                                ($list->landCultivateCost ? $list->landCultivateCost->power_tiler_korshon_amount : 0) +
                                                ($list->landCultivateCost ? $list->landCultivateCost->sromik_mojuri_amount : 0) +
                                                ($list->landCultivateCost ? $list->landCultivateCost->paribarik_sromik_amount : 0)
                                            
                                            }}
                                        
                                        </td>
                                    </tr>
                                </table>

                                <p style="font-size: 1.3em; font-weight: 600">৩। বীজ/চারার খরচ</p>
                                <table class="table" style="margin-bottom: 25px">
                                    <tr>
                                        <td style="border: 1px solid #000" align="center" rowspan="2">বীজ/চারার ধরন</td>
                                        <td style="border: 1px solid #000" align="center" colspan="4">বীজ/চারার উৎস</td>
                                        <td style="border: 1px solid #000" align="center" colspan="2">বীজ/চারার মোট পরিমাণ</td>
                                        <td style="border: 1px solid #000" align="center" colspan="2">মূল্য (টাকা)</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">নিজস্ব</td>
                                        <td style="border: 1px solid #000" align="center">ক্রয়কৃত</td>
                                        <td style="border: 1px solid #000" align="center">প্রণোদনা</td>
                                        <td style="border: 1px solid #000" align="center">দান</td>
                                        <td style="border: 1px solid #000" align="center">কেজি</td>
                                        <td style="border: 1px solid #000" align="center">আটি</td>
                                        <td style="border: 1px solid #000" align="center">বীজ</td>
                                        <td style="border: 1px solid #000" align="center">চারা</td>
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
                                    <tr>
                                        <td style="border: 1px solid #000" align="left">১ - বীজ (কেজি)</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landSeedsCost ? $list->landSeedsCost->seeds_own_source : ''}}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landSeedsCost ? $list->landSeedsCost->seeds_sellable_source : ''}}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landSeedsCost ? $list->landSeedsCost->seeds_incentive_source : '' }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landSeedsCost ? $list->landSeedsCost->seeds_donated_source : '' }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landSeedsCost ? $list->landSeedsCost->seed_quantity : '' }}</td>
                                        <td style="border: 1px solid #000" align="center">-</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landSeedsCost ? $list->landSeedsCost->seed_value : "" }}</td>
                                        <td style="border: 1px solid #000" align="center">-</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="left">২ - চারা (আটির সংখ্যা)</td>
                                        <td style="border: 1px solid #000" align="center">-</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landSeedsCost ? $list->landSeedsCost->seedlings_sellable_source : '' }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landSeedsCost ? $list->landSeedsCost->seedlings_incentive_source : '' }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landSeedsCost ? $list->landSeedsCost->seedlings_donated_source : '' }}</td>
                                        <td style="border: 1px solid #000" align="center">-</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landSeedsCost ? $list->landSeedsCost->seedling_quantity : '' }}</td>
                                        <td style="border: 1px solid #000" align="center">-</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landSeedsCost ? $list->landSeedsCost->seedlings_value : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="left">৩ - বীজ নিজস্ব হলে চারা উৎপাদনের খরচ</td>
                                        <td style="border: 1px solid #000" align="center">-</td>
                                        <td style="border: 1px solid #000" align="center">-</td>
                                        <td style="border: 1px solid #000" align="center">-</td>
                                        <td style="border: 1px solid #000" align="center">-</td>
                                        <td style="border: 1px solid #000" align="center">-</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landSeedsCost ? $list->landSeedsCost->when_own_seed_quantity : '' }}</td>
                                        <td style="border: 1px solid #000" align="center">-</td>
                                        <td style="border: 1px solid #000" align="center">{{ $form3=($list->landSeedsCost ? $list->landSeedsCost->when_own_seed_value : 0) }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="right">মোট = </td>
                                        <td style="border: 1px solid #000" align="center">
                                            {{ $list->landSeedsCost ? $list->landSeedsCost->seeds_own_source : ''}}
                                        </td>
                                        <td style="border: 1px solid #000" align="center">
                                            {{ ($list->landSeedsCost ? $list->landSeedsCost->seeds_sellable_source : 0 )+ ($list->landSeedsCost ? $list->landSeedsCost->seedlings_sellable_source : 0)}}
                                        </td>
                                        <td style="border: 1px solid #000" align="center">
                                            {{ ($list->landSeedsCost ? $list->landSeedsCost->seeds_incentive_source : 0) + ($list->landSeedsCost ? $list->landSeedsCost->seedlings_incentive_source : 0)}}
                                        </td>
                                        <td style="border: 1px solid #000" align="center">
                                            {{ ($list->landSeedsCost ? $list->landSeedsCost->seeds_donated_source : 0 )+ ($list->landSeedsCost ? $list->landSeedsCost->seedlings_donated_source : 0)}}
                                            
                                        </td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landSeedsCost ? $list->landSeedsCost->seed_quantity : '' }}</td>
                                        <td style="border: 1px solid #000" align="center">
                                            {{ ($list->landSeedsCost ? $list->landSeedsCost->seedling_quantity : 0) + ($list->landSeedsCost ? $list->landSeedsCost->when_own_seed_quantity : 0) }}
                                            
                                        </td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landSeedsCost ? $list->landSeedsCost->seed_value : "" }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ ($list->landSeedsCost ? $list->landSeedsCost->seedlings_value : 0)+ ($list->landSeedsCost ? $list->landSeedsCost->when_own_seed_value : 0)}}
                                            </td>
                                    </tr>
                                </table>

                                <p style="font-size: 1.3em; font-weight: 600">৪। সার বাবদ খরচ</p>
                                <div class="row">
                                    <div class="col-6">
                                        <table class="table" style="margin-bottom: 25px">
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">(ক) অজৈব সার</td>
                                                <td style="border: 1px solid #000" align="center">পরিমান (কেজি)</td>
                                                <td style="border: 1px solid #000" align="center">খরচ (টাকা)</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">(১) ইউরিয়া</td>
                                                <td style="border: 1px solid #000" align="center">{{ $list->landFertilizerCost ? $list->landFertilizerCost->uriya_quantity : '' }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $list->landFertilizerCost ? $list->landFertilizerCost->uriya_cost : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">(২) টিএসপি</td>
                                                <td style="border: 1px solid #000" align="center">{{ $list->landFertilizerCost ? $list->landFertilizerCost->tsp_quantity : '' }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $list->landFertilizerCost ? $list->landFertilizerCost->uriya_cost : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">(৩) এমওপি</td>
                                                <td style="border: 1px solid #000" align="center">{{ $list->landFertilizerCost ? $list->landFertilizerCost->mop_quantity : '' }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $list->landFertilizerCost ? $list->landFertilizerCost->mop_cost : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">(৪) ডিএপি</td>
                                                <td style="border: 1px solid #000" align="center">{{ $list->landFertilizerCost ? $list->landFertilizerCost->dap_quantity : '' }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $list->landFertilizerCost ? $list->landFertilizerCost->dap_cost : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">(৫) জিপসাম</td>
                                                <td style="border: 1px solid #000" align="center">{{ $list->landFertilizerCost ? $list->landFertilizerCost->gypsum_quantity : '' }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $list->landFertilizerCost ? $list->landFertilizerCost->gypsum_cost : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">(৬) নিক্সসার</td>
                                                <td style="border: 1px solid #000" align="center">{{ $list->landFertilizerCost ? $list->landFertilizerCost->nixar_quantity : '' }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $list->landFertilizerCost ? $list->landFertilizerCost->nixar_cost : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">(৭) অন্যান্য অজৈব সার</td>
                                                <td style="border: 1px solid #000" align="center">{{ $list->landFertilizerCost ? $list->landFertilizerCost->other_inorganic_quantity : '' }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $list->landFertilizerCost ? $list->landFertilizerCost->other_inorganic_cost : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">মোট অজৈব সার খরচ</td>
                                                <td style="border: 1px solid #000" align="center">{{ $totalQuantityInorganic =
                                                ($list->landFertilizerCost ? $list->landFertilizerCost->uriya_quantity : 0 )+
                                                ($list->landFertilizerCost ? $list->landFertilizerCost->tsp_quantity : 0) +
                                                ($list->landFertilizerCost ? $list->landFertilizerCost->mop_quantity : 0) +
                                                ($list->landFertilizerCost ? $list->landFertilizerCost->dap_quantity : 0) +
                                                ($list->landFertilizerCost ? $list->landFertilizerCost->gypsum_quantity : 0) +
                                                ($list->landFertilizerCost ? $list->landFertilizerCost->nixar_quantity : 0) +
                                                ($list->landFertilizerCost ? $list->landFertilizerCost->other_inorganic_quantity : 0)
                                                }}</td>
                                                <td style="border: 1px solid #000" align="center">
                                                    
                                                {{                                                     
                                                     $totalCostInorganic =
                                                    ($list->landFertilizerCost ? $list->landFertilizerCost->uriya_cost : 0) + 
                                                    ($list->landFertilizerCost ? $list->landFertilizerCost->uriya_cost : 0) + 
                                                    ($list->landFertilizerCost ? $list->landFertilizerCost->mop_cost : 0) + 
                                                    ($list->landFertilizerCost ? $list->landFertilizerCost->dap_cost : 0 )+ 
                                                    ($list->landFertilizerCost ? $list->landFertilizerCost->gypsum_cost : 0) + 
                                                    ($list->landFertilizerCost ? $list->landFertilizerCost->nixar_cost : 0) + 
                                                    ($list->landFertilizerCost ? $list->landFertilizerCost->other_inorganic_cost : 0)    
                                                    
                                                }}
                                                
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-6">
                                        <table class="table" style="margin-bottom: 25px">
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">(খ) জৈব সার</td>
                                                <td style="border: 1px solid #000" align="center">পরিমান (কেজি)</td>
                                                <td style="border: 1px solid #000" align="center">খরচ (টাকা)</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">(১) গোবর</td>
                                                <td style="border: 1px solid #000" align="center">{{ $list->landFertilizerCost ? $list->landFertilizerCost->gobor_quantity : '-'}}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $list->landFertilizerCost ? $list->landFertilizerCost->gobor_cost : '-'}}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">(২) ছাই</td>
                                                <td style="border: 1px solid #000" align="center">
                                                    {{ $list->landFertilizerCost ? $list->landFertilizerCost->ash_quantity : '-'}}	
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    {{ $list->landFertilizerCost ? $list->landFertilizerCost->ash_cost : '-'}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">(৩) সবুজ সার</td>
                                                <td style="border: 1px solid #000" align="center">
                                                    {{ $list->landFertilizerCost ? $list->landFertilizerCost->green_quantity : '-'}}
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    {{ $list->landFertilizerCost ? $list->landFertilizerCost->green_cost : '-'}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">(৪) অন্যান্য জৈব সার</td>
                                                <td style="border: 1px solid #000" align="center">{{ $list->landFertilizerCost ? $list->landFertilizerCost->other_organic_quantity : '' }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $list->landFertilizerCost ? $list->landFertilizerCost->other_organic_cost : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">মোট জৈব সার খরচ</td>
                                                <td style="border: 1px solid #000" align="center">
                                                {{ 
                                                $totalQuntityOrganic =
                                                ($list->landFertilizerCost ? $list->landFertilizerCost->gobor_quantity : 0) +
                                                ($list->landFertilizerCost ? $list->landFertilizerCost->ash_quantity : 0) +
                                                ($list->landFertilizerCost ? $list->landFertilizerCost->green_quantity : 0) +
                                                ($list->landFertilizerCost ? $list->landFertilizerCost->other_organic_quantity :0 )

                                                }}
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                {{ $totalCostorganic =
                                                ($list->landFertilizerCost ? $list->landFertilizerCost->gobor_cost : 0) +
                                                ($list->landFertilizerCost ? $list->landFertilizerCost->ash_cost : 0) +
                                                ($list->landFertilizerCost ? $list->landFertilizerCost->green_cost : 0) +
                                                ($list->landFertilizerCost ? $list->landFertilizerCost->other_organic_cost : 0) 
                                                }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">মোট সার খরচ (ক+খ)</td>
                                                <td style="border: 1px solid #000" align="center">{{ $totalQuantityInorganic + $totalQuntityOrganic}}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $form4 = ($totalCostorganic +  $totalCostInorganic) }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <p style="font-size: 1.3em; font-weight: 600">৫। সেচ পদ্ধতি</p>
                                <table class="table" style="margin-bottom: 25px">
                                    <tr>
                                        <td style="border: 1px solid #000" align="left">খরচের খাত</td>
                                        <td style="border: 1px solid #000" align="center">শ্রমিক সংখ্যা</td>
                                        <td style="border: 1px solid #000" align="center">খরচ (টাকা)</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="left">(১) সেচ পদ্ধতি (ডিপ/স্যালো টিউবওয়েল, পাওয়ার পাম্প)</td>
                                        <td style="border: 1px solid #000" align="center">-</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landIrrigationCost ? $list->landIrrigationCost->tubewell_cost : ''}}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="left">(২) চাপকল/দোন</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landIrrigationCost ? $list->landIrrigationCost->chapcol_worker_list : 0}}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landIrrigationCost ? $list->landIrrigationCost->chapcol_cost : 0}}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="left">(৩) সেচের জন্য জ্বালানী/ডিজেল/পেট্রল/বিদ্যুৎ</td>
                                        <td style="border: 1px solid #000" align="center">-</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landIrrigationCost ? $list->landIrrigationCost->jalani_cost : 0}}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="left">মোট সেচ খরচ</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landIrrigationCost ? $list->landIrrigationCost->chapcol_worker_list : 0}}</td>
                                        <td style="border: 1px solid #000" align="center">
                                        {{ $form5 =
                                        ($list->landIrrigationCost ? $list->landIrrigationCost->tubewell_cost : 0) +
                                        ($list->landIrrigationCost ? $list->landIrrigationCost->chapcol_cost : 0) +
                                        ($list->landIrrigationCost ? $list->landIrrigationCost->jalani_cost : 0) }}</td>
                                    </tr>
                                </table>

                                <p style="font-size: 1.3em; font-weight: 600">৬। শ্রমিক খরচ</p>
                                <table class="table" style="margin-bottom: 25px">
                                    <tr>
                                        <td style="border: 1px solid #000" align="center" rowspan="2">শ্রমিক খরচের বিবরণ</td>
                                        <td style="border: 1px solid #000" align="center" colspan="2">শ্রমিকের সংখ্যা</td>
                                        <td style="border: 1px solid #000" align="center" rowspan="2">মোট শ্রমিক সংখ্যা</td>
                                        <td style="border: 1px solid #000" align="center" rowspan="2">মোট শ্রমিক মজুরী (টাকা)</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">পারিবারিক শ্রমিক</td>
                                        <td style="border: 1px solid #000" align="center">ভাড়া শ্রমিক</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">১</td>
                                        <td style="border: 1px solid #000" align="center">২</td>
                                        <td style="border: 1px solid #000" align="center">৩</td>
                                        <td style="border: 1px solid #000" align="center">৪</td>
                                        <td style="border: 1px solid #000" align="center">৫</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="left">(১) চারা রোপন/বপন</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landWorkerCost ? $list->landWorkerCost->seedling_family_worker_no : 0 }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landWorkerCost ? $list->landWorkerCost->seedling_hired_worker_no : 0 }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $totalLandWorkerCost1 = ($list->landWorkerCost ? $list->landWorkerCost->seedling_family_worker_no : 0) + ($list->landWorkerCost ? $list->landWorkerCost->seedling_hired_worker_no : 0) }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landWorkerCost ? $list->landWorkerCost->seedling_total_worker_cost : 0 }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="left">(২) নিড়ানী</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landWorkerCost ? $list->landWorkerCost->nirani_family_worker_no : 0 }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landWorkerCost ? $list->landWorkerCost->nirani_hired_worker_no : '' }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $totalLandWorkerCost2 =($list->landWorkerCost ? $list->landWorkerCost->nirani_family_worker_no : 0) + ($list->landWorkerCost ? $list->landWorkerCost->nirani_hired_worker_no : 0) }}</td>
                                        <td style="border: 1px solid #000" align="center">
                                        {{ $list->landWorkerCost ? $list->landWorkerCost->nirani_total_worker_cost : '' }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="border: 1px solid #000" align="left">(৩) ফসল কর্তন</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landWorkerCost ? $list->landWorkerCost->crop_cutting_family_worker_no : 0 }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landWorkerCost ? $list->landWorkerCost->crop_cutting_hired_worker_no : 0 }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $totalLandWorkerCost3 =($list->landWorkerCost ? $list->landWorkerCost->crop_cutting_family_worker_no : 0) + 
                                            ($list->landWorkerCost ? $list->landWorkerCost->crop_cutting_hired_worker_no : 0) }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landWorkerCost ? $list->landWorkerCost->crop_cutting_total_worker_cost : 0 }}</td>
                                    </tr>

                                    <tr>
                                        <td style="border: 1px solid #000" align="left">(৪) ফসল মাড়াই/ঝাড়াই</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landWorkerCost ? $list->landWorkerCost->crop_marai_family_worker_no : 0  }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landWorkerCost ? $list->landWorkerCost->crop_marai_hired_worker_no : 0  }}</td></td>
                                        <td style="border: 1px solid #000" align="center">{{ $totalLandWorkerCost4 =($list->landWorkerCost ? $list->landWorkerCost->crop_marai_hired_worker_no : 0)+ ($list->landWorkerCost ? $list->landWorkerCost->crop_marai_family_worker_no : 0)}}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landWorkerCost ? $list->landWorkerCost->crop_marai_total_worker_cost : 0 }} </td>
                                    </tr>

                                    <tr>
                                        <td style="border: 1px solid #000" align="left">(৫) পাট ফসলের জাক দেয়া/কাঠি থেকে আঁশ ছাড়ানো</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->landWorkerCost ? $list->landWorkerCost->jute_family_worker_no : 0 }}</td>
                                        <td style="border: 1px solid #000" align="center">{{  $list->landWorkerCost ? $list->landWorkerCost->jute_hired_worker_no : 0  }}</td>
                                        <td style="border: 1px solid #000" align="center">{{  $totalLandWorkerCost5 =($list->landWorkerCost ? $list->landWorkerCost->jute_family_worker_no : 0) + ($list->landWorkerCost ? $list->landWorkerCost->jute_hired_worker_no : 0) }}</td>
                                        <td style="border: 1px solid #000" align="center">{{  $list->landWorkerCost ? $list->landWorkerCost->jute_total_worker_cost : 0  }}</td>
                                    </tr>

                                    <tr>
                                        <td style="border: 1px solid #000" align="left">(৬) অন্যান্য</td>
                                        <td style="border: 1px solid #000" align="center">
                                            {{  $list->landWorkerCost ? $list->landWorkerCost->other_family_worker_no : 0  }}
                                        </td>
                                        <td style="border: 1px solid #000" align="center">{{  $list->landWorkerCost ? $list->landWorkerCost->jute_hired_worker_no : 0  }}</td>
                                        <td style="border: 1px solid #000" align="center">{{  $totalLandWorkerCost6 =($list->landWorkerCost ? $list->landWorkerCost->other_family_worker_no : 0)+ ($list->landWorkerCost ? $list->landWorkerCost->other_family_worker_no : 0) }}</td>
                                        <td style="border: 1px solid #000" align="center">{{  $list->landWorkerCost ? $list->landWorkerCost->other_total_worker_cost : 0  }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="left">মোট</td>
                                        <td style="border: 1px solid #000" align="center">
                                        {{ 

                                                ($list->landWorkerCost ? $list->landWorkerCost->seedling_family_worker_no : 0)+
                                               ( $list->landWorkerCost ? $list->landWorkerCost->nirani_family_worker_no : 0)+ 
                                                ($list->landWorkerCost ? $list->landWorkerCost->crop_cutting_family_worker_no : 0)+
                                                ($list->landWorkerCost ? $list->landWorkerCost->crop_marai_family_worker_no : 0 )+
                                                ($list->landWorkerCost ? $list->landWorkerCost->jute_family_worker_no : 0)+
                                                ($list->landWorkerCost ? $list->landWorkerCost->other_family_worker_no : 0)
                                        }}
                                        </td>
                                        <td style="border: 1px solid #000" align="center">
                                        {{ 
                                       ( $list->landWorkerCost ? $list->landWorkerCost->seedling_hired_worker_no : 0) +
                                        ($list->landWorkerCost ? $list->landWorkerCost->nirani_hired_worker_no : 0) +
                                        ($list->landWorkerCost ? $list->landWorkerCost->crop_cutting_hired_worker_no : 0) +
                                        ($list->landWorkerCost ? $list->landWorkerCost->crop_marai_hired_worker_no : 0) +
                                        ($list->landWorkerCost ? $list->landWorkerCost->jute_hired_worker_no : 0) +
                                        ($list->landWorkerCost ? $list->landWorkerCost->jute_hired_worker_no : 0)    
                                        }}
                                        
                                        </td>
                                        <td style="border: 1px solid #000" align="center">{{$totalLandWorkerCost1 +$totalLandWorkerCost2+ $totalLandWorkerCost3+$totalLandWorkerCost4+$totalLandWorkerCost5+$totalLandWorkerCost6 }}</td>
                                        <td style="border: 1px solid #000" align="center">
                                        {{ $form6 =
                                        ($list->landWorkerCost ? $list->landWorkerCost->seedling_total_worker_cost : 0) +
                                       ( $list->landWorkerCost ? $list->landWorkerCost->nirani_total_worker_cost : 0 ) +
                                        ($list->landWorkerCost ? $list->landWorkerCost->crop_cutting_total_worker_cost : 0) +
                                        ($list->landWorkerCost ? $list->landWorkerCost->crop_marai_total_worker_cost : 0) +
                                        ($list->landWorkerCost ? $list->landWorkerCost->jute_total_worker_cost : 0) +
                                        ($list->landWorkerCost ? $list->landWorkerCost->other_total_worker_cost : 0)
                                        }}
                                        </td>
                                    </tr>
                                </table>

                                <div class="row">
                                    <div class="col-6">
                                        <p style="font-size: 1.3em; font-weight: 600">৭। কীটনাশক ও বালাই নাশক খরচ</p>
                                        <table class="table" style="margin-bottom: 25px">
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">কীটনাশকের নাম</td>
                                                <td style="border: 1px solid #000" align="center">পরিমাণ (মিলি লিটারে লিখুন)</td>
                                                <td style="border: 1px solid #000" align="center">খরচ (টাকা)</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">১</td>
                                                <td style="border: 1px solid #000" align="center">২</td>
                                                <td style="border: 1px solid #000" align="center">৩</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">১। সুমিথিয়ন</td>
                                                <td style="border: 1px solid #000" align="center">{{ $list->landPesticideCost ?$list->landPesticideCost->sumithion_quantity : 0}}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $list->landPesticideCost ?$list->landPesticideCost->sumithion_cost : 0}}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">২। ম্যালাথিয়ন</td>
                                                <td style="border: 1px solid #000" align="center">
                                                {{ $list->landPesticideCost ?$list->landPesticideCost->malathion_quantity : 0}}
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                {{ $list->landPesticideCost ?$list->landPesticideCost->malathion_cost : 0}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">৩। বাসুডিন</td>
                                                <td style="border: 1px solid #000" align="center">
                                                    {{ $list->landPesticideCost ?$list->landPesticideCost->basudin_quantity : 0}}
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    {{ $list->landPesticideCost ?$list->landPesticideCost->basudin_cost : 0}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">৪। ফুরাডান</td>
                                                <td style="border: 1px solid #000" align="center">
                                                    {{ $list->landPesticideCost ?$list->landPesticideCost->furadon_quantity : 0}}
                                                </td>
                                                <td style="border: 1px solid #000" align="center">
                                                    {{ $list->landPesticideCost ?$list->landPesticideCost->furadon_cost : 0}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">৫। ফুরানল</td>
                                                <td style="border: 1px solid #000" align="center">                                                   
                                                    {{ $list->landPesticideCost ?$list->landPesticideCost->furanol_quantity : 0}}
                                                </td>
                                                <td style="border: 1px solid #000" align="center">                                                   
                                                    {{ $list->landPesticideCost ?$list->landPesticideCost->furanol_cost : 0}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">৬। অন্যান্য (নাম উল্লেখ করুন)</td>
                                                <td style="border: 1px solid #000" align="center">                                                    
                                                    {{ $list->landPesticideCost ?$list->landPesticideCost->other_quantity : 0}}</td>
                                                <td style="border: 1px solid #000" align="center">                                                    
                                                    {{ $list->landPesticideCost ?$list->landPesticideCost->other_cost : 0}}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="right">মোট</td>
                                                <td style="border: 1px solid #000" align="center">{{ 
                                                    ($list->landPesticideCost ?$list->landPesticideCost->sumithion_quantity : 0)+
                                                    ($list->landPesticideCost ?$list->landPesticideCost->malathion_quantity : 0)+
                                                    ($list->landPesticideCost ?$list->landPesticideCost->basudin_quantity : 0)+
                                                    ($list->landPesticideCost ?$list->landPesticideCost->furadon_quantity : 0)+
                                                    ($list->landPesticideCost ?$list->landPesticideCost->furanol_quantity : 0)+
                                                    ($list->landPesticideCost ?$list->landPesticideCost->other_quantity : 0)
                                                }}</td>
                                                <td style="border: 1px solid #000" align="center">
                                                    
                                                {{ 
                                                    $form7 =($list->landPesticideCost ?$list->landPesticideCost->sumithion_cost : 0)+
                                                    ($list->landPesticideCost ?$list->landPesticideCost->malathion_cost : 0)+
                                                    ($list->landPesticideCost ?$list->landPesticideCost->basudin_cost : 0)+
                                                    ($list->landPesticideCost ?$list->landPesticideCost->furadon_cost : 0)+
                                                    ($list->landPesticideCost ?$list->landPesticideCost->furanol_cost : 0)+
                                                    ($list->landPesticideCost ?$list->landPesticideCost->other_cost : 0)    
                                                }}
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-6">
                                        <p style="font-size: 1.3em; font-weight: 600">৮। পরিবহন খরচ</p>
                                        <table class="table" style="margin-bottom: 25px">
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">খাতের নাম</td>
                                                <td style="border: 1px solid #000" align="center">খরচ (টাকা)</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">১</td>
                                                <td style="border: 1px solid #000" align="center">২</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">১। জমির কর্ষ/চাষ করার সামগ্রী পরিবহন</td>
                                                <td style="border: 1px solid #000" align="center">{{$list->landtransportCost ?$list->landtransportCost->land_things_transport_cost : 0}}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">২। বীজ/চারা জমিতে নিয়ে আসার জন্য পরিবহন</td>
                                                <td style="border: 1px solid #000" align="center">{{$list->landtransportCost ?$list->landtransportCost->seed_transport_cost : 0}}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">৩। সার পরিবহন</td>
                                                <td style="border: 1px solid #000" align="center">{{ $list->landtransportCost ?$list->landtransportCost->fertilizer_transport_cost : 0 }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">৪। সেচ সংক্রান্ত সরঞ্জামাদি পরিবহন</td>
                                                <td style="border: 1px solid #000" align="center">{{$list->landtransportCost ?$list->landtransportCost->irrigation_transport_cost : 0}}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">৫। কীটনাশক ও বালাইনশক পরিবহন</td>
                                                <td style="border: 1px solid #000" align="center">{{$list->landtransportCost ?$list->landtransportCost->pesticide_transport_cost : 0}}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="left">৬। অন্যান্য (নাম উল্লেখ করুন)</td>
                                                <td style="border: 1px solid #000" align="center">{{$list->landtransportCost ?$list->landtransportCost->other_transport_cost : 0}}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="right">মোট</td>
                                                <td style="border: 1px solid #000" align="center">{{ 
                                                    $form8 = ($list->landtransportCost ? $list->landtransportCost->land_things_transport_cost : 0) + 
                                                    ($list->landtransportCost ? $list->landtransportCost->seed_transport_cost : 0) + 
                                                    ($list->landtransportCost ? $list->landtransportCost->fertilizer_transport_cost : 0) + 
                                                    ($list->landtransportCost ? $list->landtransportCost->irrigation_transport_cost : 0) + 
                                                    ($list->landtransportCost ? $list->landtransportCost->pesticide_transport_cost : 0) + 
                                                    ($list->landtransportCost ? $list->landtransportCost->other_transport_cost : 0)
                                                }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <p style="font-size: 1.3em; font-weight: 600">৯। কৃষক কর্তৃক দাগগুচ্ছ/দাগগুচ্ছ বহির্ভূত আবাদকৃত জমিতে ফসলের উৎপাদন ও তার মূল্য</p>
                                <table class="table" style="margin-bottom: 25px">
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">মোট আবাদি জমির পরিমান (একর)</td>
                                        <td style="border: 1px solid #000" align="center">মোট উৎপাদন (কেজি)</td>
                                        <td style="border: 1px solid #000" align="center">ফসলের মোট মূল্য</td>
                                        <td style="border: 1px solid #000" align="center">ফসলের উপজাতের পরিমান (কেজি/আটি)</td>
                                        <td style="border: 1px solid #000" align="center">উপজাতের মূল্য স্থানীয় বাজারদর অনুযায়ী</td>
                                        <td style="border: 1px solid #000" align="center">মোট উৎপাদিত দ্রব্যের মূল্য</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">১</td>
                                        <td style="border: 1px solid #000" align="center">২</td>
                                        <td style="border: 1px solid #000" align="center">৩</td>
                                        <td style="border: 1px solid #000" align="center">৪</td>
                                        <td style="border: 1px solid #000" align="center">৫</td>
                                        <td style="border: 1px solid #000" align="center">৬=(৩+৫)</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">{{ $list->arable_land }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->total_production }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->crops_total_value_tk }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->sub_varieties_crop_quantity }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->sub_varieties_crop_value }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->crops_total_value_tk +
                                            $list->sub_varieties_crop_value }}</td>
                                    </tr>
                                </table>

                                <p style="font-size: 1.3em; font-weight: 600">১০। ফসলের মূল্য (কেজিতে)</p>
                                <table class="table" style="margin-bottom: 25px">
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">কৃষকের বাড়িতে/খামারে</td>
                                        <td style="border: 1px solid #000" align="center">স্থানীয় বাজার/হাট</td>
                                        <td style="border: 1px solid #000" align="center">সরকারী ক্রয়কেন্দ্র/মিলার্স</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">১</td>
                                        <td style="border: 1px solid #000" align="center">২</td>
                                        <td style="border: 1px solid #000" align="center">৩</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000" align="center">{{ $list->crop_cost_farmer }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->crop_cost_local_market }}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->crop_cost_millers }}</td>
                                    </tr>
                                </table>

                                <p style="font-size: 1.3em; font-weight: 600">১১। দাগগুচ্ছ/দাগগুচ্ছ বহির্ভুত আবাদি জমির পরিমাণ, উৎপাদন খরচ এবং ফসলের মূল্য</p>
                                <table class="table" style="margin-bottom: 25px">
                                    <tr>
                                        <td align="left" style="border-top: none;">(ক) দাগগুচ্ছ/দাগগুচ্ছ বহির্ভুত আবাদি জমির পরিমাণ</td>
                                        <td style="border: 1px solid #000" align="center"> {{ $list->landRent ? $list->landRent->amount_of_cultivable_land_cluster_or_outside_cluster : '' }}</td>
                                        <td align="left" style="border-top: none;">একর</td>
                                        <td align="left" style="border-top: none;">(ঘ) মোট উৎপাদিত দ্রব্যের মূল্য (৯ এর ৬ কলাম)</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->crops_total_value_tk +
                                            $list->sub_varieties_crop_value }}</td>
                                        <td align="left" style="border-top: none;">টাকা</td>
                                    </tr>
                                    <tr>
                                        <td align="left" style="border-top: none;">(খ) উৎপাদন খরচ {(ক্রমিক ১ এর ৬)+(২+৩+৪+৫+৬+৭+৮)}</td>
                                        <td style="border: 1px solid #000" align="center">{{ $ttotal = ($list->landRent ? $list->landRent->approximate_rent_amount : 0) +  $form2 +  $form3 + +  $form4 +  $form5 +  $form6 +  $form7 +  $form8}}</td>
                                        <td align="left" style="border-top: none;">টাকা</td>
                                        <td align="left" style="border-top: none;">(ঙ) মূল্য সংযোজন/লাভ/ক্ষতি (ঘ - খ)</td>
                                        <td style="border: 1px solid #000" align="center">{{ ($list->crops_total_value_tk +
                                            $list->sub_varieties_crop_value)-$ttotal }}</td>
                                        <td align="left" style="border-top: none;">টাকা</td>
                                    </tr>
                                    <tr>
                                        <td align="left" style="border-top: none;">(গ) মোট ফসল উৎপাদন (৯ এর ২ কলাম)</td>
                                        <td style="border: 1px solid #000" align="center">{{ $list->total_production }}</td>
                                        <td align="left" style="border-top: none;">কেজি</td>
                                    </tr>
                                </table>




                                    
                                    
                                    
                                
                                {{-- ************** instruction section **************** --}}
                                <div class="row">
                                    <div class="col-lg-12 mt-20">
                                        <div class="row">
                                            <div class="col-lg-4 ml-8">
                                                @if ($processList->surveyBy)
                                                    <img src="{{ asset('storage/signatures/'.$processList->surveyBy->signature) }}" width="100" height="70">

                                                    <p>
                                                        {{ $processList->surveyBy->first_name.' '. $processList->surveyBy->middle_name.' '. $processList->surveyBy->last_name }}
                                                        
                                                    </p>
                                                    <p>
                                                        Designation: {{ $processList->surveyBy->designation->name_en }}
                                                    </p>
                                                @endif
                                                <p>তথ্য সংগ্রহকারীর স্বাক্ষর, নাম ও পদবী</p>
                                                <p>তারিখ : {{ $processList->updated_at->format('d/m/Y') }}</p>
                                            </div>
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-4 text-right mr-8">
                                                @if ($processList->createdBy)
                                                    <img src="{{ asset('storage/signatures/'.$processList->createdBy->signature) }}" width="100" height="70">
                                                @endif
                                                <p>কর্মকর্তার স্বাক্ষর ও সীল</p>
                                                <p>তারিখ : {{ $processList->created_at->format('d/m/Y') }}</p>
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