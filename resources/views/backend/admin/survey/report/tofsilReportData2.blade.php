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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Cluster Survey Report</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted">Cluster Survey Report</a>
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
                                    <p class="font-weight-bold mt-4">
                                        Estimate of 
                                        @if ($crop==5)
                                            Wheat
                                        @elseif ($crop==1)
                                            Aus
                                        @elseif ($crop==2)
                                            Aman
                                        @elseif ($crop==3)
                                            Boro
                                        @elseif ($crop==3)
                                            Jute
                                        @endif
                                    </p>
                                    <p class="mt-4">Crop cutting Result</p>
                                    <p class="mt-4">Conversion Factor = 43560/50=871.20</p>
                                </div>
                                <div class="col-3">
                                    {{-- <p class="font-weight-bold text-right">তফসিল - ১</p> --}}
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive ajax-data-container pt-3">
                                    
                                    {{-- <p style="font-size: 1.3em; font-weight: 500">২। ভূমির ব্যবহার:</p> --}}
                                    @foreach ($tofsilFormDatas as $data)
                                        @php
                                            $d = 0;
                                            foreach ( $data->allDistricts($data->district_id) as $key) {

                                                $d = $d ;
                                            }
                                        @endphp
                                        <table class="table">
                                            <tr>
                                                <td style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">SL NO</td>
                                                <td style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="left">Division Name</td>
                                                <td style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="left">District Name</td>
                                                <td style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="left">Upazila Name</td>
                                                <td style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">Cluster NO</td>
                                                <td style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">Plot NO</td>
                                                <td style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">Weight of Wheat Crop in KG with Moisture (50 SqFeet)</td>
                                                <td style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">Weight of Wheat Crop in KG with out Moisture (50 SqFeet)</td>
                                                <td style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">Per Acre yield in KG</td>
                                                <td style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">Per Acre yield in Maund</td>
                                            </tr>

                                            {{-- Start: loop table row --}}
                                                
                                            <tr>
                                                <td rowspan="{{ $d }}" style="border: 1px solid #000; font-size: 1.1em;" align="middle">01</td>
                                                <td style="border: 1px solid #000; font-size: 1.1em;" align="Left">
                                                    {{ $data->division ? $data->division->name_en : '' }}
                                                </td>
                                            </tr>
                                                @foreach ($data->allDistricts($data->district_id) as $item)
                                                
                                                    <tr>
                                                        <td style="border: 1px solid #000; font-size: 1.1em;" align="Left">
                                                            {{ $data->district ? $data->district->name_en : '' }}
                                                        </td>
                                                        <td style="border: 1px solid #000; font-size: 1.1em;" align="Left">Gouripur</td>
                                                        <td style="border: 1px solid #000; font-size: 1.1em;" align="middle">0</td>
                                                        <td style="border: 1px solid #000; font-size: 1.1em;" align="middle">0</td>
                                                        <td style="border: 1px solid #000; font-size: 1.1em;" align="middle">0.00</td>
                                                        <td style="border: 1px solid #000; font-size: 1.1em;" align="middle">1.100</td>
                                                        <td style="border: 1px solid #000; font-size: 1.1em;" align="middle">958</td>
                                                        <td style="border: 1px solid #000; font-size: 1.1em;" align="middle">25.68</td>
                                                    </tr>
                                                @endforeach
                                            
                                            {{-- End: loop table row --}}

                                            <tr>
                                                <td colspan="6" style="border: 1px solid #000; font-size: 1.1em; font-weight: bold;" align="right">Total</td>
                                                <td style="border: 1px solid #000; font-size: 1.1em; font-weight: bold;" align="right">0</td>
                                                <td style="border: 1px solid #000; font-size: 1.1em; font-weight: bold;" align="right">0</td>
                                                <td style="border: 1px solid #000; font-size: 1.1em; font-weight: bold;" align="right">0</td>
                                                <td style="border: 1px solid #000; font-size: 1.1em; font-weight: bold;" align="right">0</td>
                                            </tr>
                                            
                                        </table>
                                    @endforeach

                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mt-20">
                                        <div class="row">
                                            <div class="col-lg-4 ml-8">
                                                {{-- <p>তথ্য সংগ্রহকারীর স্বাক্ষর, নাম ও পদবী</p>
                                                <p>তারিখ :...................</p> --}}
                                            </div>
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-4 text-right mr-8">
                                                <table class="table">
                                                    <tr>
                                                        <th style="border-top: none;">Per Acre Yield in Mds</th>
                                                        <th style="border-top: none;">=</th>
                                                        <th style="border-top: none;">24.42</th>
                                                    </tr>
                                                    <tr>
                                                        <th style="border-top: none;">No of Cutting</th>
                                                        <th style="border-top: none;">=</th>
                                                        <th style="border-top: none;">33</th>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

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