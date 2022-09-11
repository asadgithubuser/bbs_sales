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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">সংকলন - ৩</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted">সংকলন - ৩</a>
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
                                    <p class="mt-4">(সংকলন - ৩)</p>
                                </div>
                                <div class="col-3">
                                    <p class="font-weight-bold text-right">সংকলন - ৩</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ajax-data-container pt-3">
                                    {{-- <p style="font-size: 1.3em; font-weight: 500" class="text-center">Estimate of ......................... 2021-22</p> --}}
                                    <table class="table">
                                        <tr>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle" colspan="2" rowspan="2">District/Division</td>
                                            <td style="border: 1px solid #000" align="middle" colspan="3">2020-21</td>
                                            <td style="border: 1px solid #000" align="middle" colspan="3">2021-22</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="middle">Area (acre)</td>
                                            <td style="border: 1px solid #000" align="middle">Yield per acre (KG)</td>
                                            <td style="border: 1px solid #000" align="middle">Production (MT)</td>
                                            <td style="border: 1px solid #000" align="middle">Area (acre)</td>
                                            <td style="border: 1px solid #000" align="middle">Yield per acre (KG)</td>
                                            <td style="border: 1px solid #000" align="middle">Production (MT)</td>
                                        </tr>

                                        
                                        {{-- Start loop --}}
                                        @php
                                            $slNo = 1;
                                        @endphp
                                        @foreach ($divisions as $division)
                                            @php
                                                $distrcits = App\Models\District::where('division_id',$division->id)->get();

                                                // last year land_amount
                                                $lastYearDivisionArea = App\Models\SurveyTofsilForm3::where('division_id',$division->id)->where('status',1)->get()->sum('last_year_land_amount');

                                                // last year yeild per kg
                                                $lastYearYeildPerKgDivision = App\Models\SurveyTofsilForm3::where('division_id',$division->id)->where('status',1)->get()->sum('last_acre_reflection_rate');

                                                //last_year_land_producttion
                                                $lastYearLandProductionDivision = App\Models\SurveyTofsilForm3::where('division_id',$division->id)->where('status',1)->get()->sum('last_year_land_producttion');
                                                
                                                //current_year_land_amount
                                                $currentYearAreaDivision = App\Models\SurveyTofsilForm3::where('division_id',$division->id)->where('status',1)->get()->sum('current_year_land_amount');

                                                // current year yeild per kg
                                                $currentYearYeildPerKgDivision = App\Models\SurveyTofsilForm3::where('division_id',$division->id)->where('status',1)->get()->sum('acre_reflection_rate');

                                                $currentYearlandProductDivision = App\Models\SurveyTofsilForm3::where('division_id',$division->id)->where('status',1)->get()->sum('current_year_land_producttion');

                                            @endphp
                                            @foreach ($distrcits as $district)
                                                @php
                                                    // last year land_amount district
                                                    $lastYearArea = App\Models\SurveyTofsilForm3::where('division_id',$division->id)->where('district_id', $district->id)->where('status',1)->get()->sum('last_year_land_amount');
                                                
                                                    // last year yeild per kg
                                                    $lastYearYeildPerKg = App\Models\SurveyTofsilForm3::where('division_id',$division->id)->where('district_id',$district->id)->where('status',1)->get()->sum('last_acre_reflection_rate');

                                                    //last_year_land_producttion
                                                    $lastYearLandProducttion = App\Models\SurveyTofsilForm3::where('division_id',$division->id)->where('district_id',$district->id)->where('status',1)->get()->sum('last_year_land_producttion');

                                                    //current_year_land_amount
                                                    $currentYearArea = App\Models\SurveyTofsilForm3::where('division_id',$division->id)->where('district_id',$district->id)->where('status',1)->get()->sum('current_year_land_amount');

                                                    // current year yeild per kg
                                                    $currentYearYeildPerKg = App\Models\SurveyTofsilForm3::where('division_id',$division->id)->where('district_id',$district->id)->where('status',1)->get()->sum('acre_reflection_rate');

                                                    // current year yeild per kg
                                                    $currentYearlandProduct = App\Models\SurveyTofsilForm3::where('division_id',$division->id)->where('district_id',$district->id)->where('status',1)->get()->sum('current_year_land_producttion');

                                                @endphp
                                                <tr>
                                                    <td style="border: 1px solid #000" align="right">{{ $slNo }}</td>
                                                    <td style="border: 1px solid #000" align="left">{{ $district->name_en }}</td>
                                                    <td style="border: 1px solid #000" align="middle">{{ $lastYearArea }}</td>
                                                    <td style="border: 1px solid #000" align="middle">{{ number_format((float)$lastYearYeildPerKg, 4, '.', '') }}</td>
                                                    <td style="border: 1px solid #000" align="middle">{{ $lastYearLandProducttion }}</td>
                                                    <td style="border: 1px solid #000" align="middle">{{ $currentYearArea }}</td>
                                                    <td style="border: 1px solid #000" align="middle">{{ number_format((float)$currentYearYeildPerKg, 4, '.', '') }}</td>
                                                    <td style="border: 1px solid #000" align="middle">{{ $currentYearlandProduct }}</td>
                                                </tr>
                                                @php
                                                    $slNo =  $slNo + 1; 
                                                @endphp
                                            @endforeach
                                            <tr>
                                                <td style="border: 1px solid #000" align="right"><b>{{ $loop->index + 1 }}</b></td>
                                                <td style="border: 1px solid #000" align="left"><b>{{ $division->name_en }}</b></td>
                                                <td style="border: 1px solid #000" align="middle"><b>{{ $lastYearDivisionArea }}</b></td>
                                                <td style="border: 1px solid #000" align="middle"><b>{{ number_format((float)$lastYearYeildPerKgDivision, 4, '.', '') }}</b></td>
                                                <td style="border: 1px solid #000" align="middle"><b>{{ $lastYearLandProductionDivision }}</b></td>
                                                <td style="border: 1px solid #000" align="middle"><b>{{ $currentYearAreaDivision }}</b></td>
                                                <td style="border: 1px solid #000" align="middle"><b>{{ number_format((float)$currentYearYeildPerKgDivision, 4, '.', '') }}</b></td>
                                                <td style="border: 1px solid #000" align="middle"><b>{{ $currentYearlandProductDivision }}</b></td>
                                            </tr>
                                        @endforeach
                                        {{-- End loop --}}

                                        <!-- Footer row -->
                                        @php
                                            $lastYearAllArea = App\Models\SurveyTofsilForm3::where('status',1)->get()->sum('last_year_land_amount');

                                            // last year yeild per kg
                                            $lastYearYeildPerKgAll= App\Models\SurveyTofsilForm3::where('status',1)->get()->sum('last_acre_reflection_rate');

                                            //last_year_land_producttion
                                            $lastYearLandProductionAll = App\Models\SurveyTofsilForm3::where('status',1)->get()->sum('last_year_land_producttion');
                                            
                                            //current_year_land_amount
                                            $currentYearAreaAll = App\Models\SurveyTofsilForm3::where('status',1)->get()->sum('current_year_land_amount');

                                            // current year yeild per kg
                                            $currentYearYeildPerKgAll = App\Models\SurveyTofsilForm3::where('status',1)->get()->sum('acre_reflection_rate');

                                            $currentYearlandProductAll = App\Models\SurveyTofsilForm3::where('status',1)->get()->sum('current_year_land_producttion');
                                        @endphp
                                        
                                        <tr>
                                            <td style="border: 1px solid #000" align="middle" colspan="2"><b>BANGLADESH</b></td>
                                            <td style="border: 1px solid #000" align="middle"><b>{{ $lastYearAllArea }}</b></td>
                                            <td style="border: 1px solid #000" align="middle"><b>{{ number_format((float)$lastYearYeildPerKgAll, 4, '.', '') }}</b></td>
                                            <td style="border: 1px solid #000" align="middle"><b>{{ $lastYearLandProductionAll  }}</b></td>
                                            <td style="border: 1px solid #000" align="middle"><b>{{ $currentYearAreaAll }}</b></td>
                                            <td style="border: 1px solid #000" align="middle"><b>{{ number_format((float)$currentYearYeildPerKgAll, 4, '.', '') }}</b></td>
                                            <td style="border: 1px solid #000" align="middle"><b>{{ $currentYearlandProductAll }}</b></td>
                                        </tr>
                                    </table>
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