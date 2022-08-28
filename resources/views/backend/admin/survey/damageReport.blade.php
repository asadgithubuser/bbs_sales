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
                                    <p class="mt-4">Damage Report</p>
                                </div>
                                <div class="col-3">
                                    {{-- <p class="font-weight-bold text-right">তফসিল - ১</p> --}}
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive ajax-data-container pt-3">
                                    
                                    {{-- <p style="font-size: 1.3em; font-weight: 500">২। ভূমির ব্যবহার:</p> --}}
                                    <table class="table">
                                        <tr>
                                            <td rowspan="4" style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">SL NO</td>
                                            <td style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="left">ফসলের নাম: আমন (উফশী)</td>
                                            <td colspan="3" style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">ক্ষয়ক্ষতির প্রথান কারণ: ঘুর্ণিঝড় জোয়াদ</td>
                                            <td colspan="5" style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">ক্ষয়ক্ষতির সময়কাল: 10/07/21 হতে 22/7/21 <br>সন: 2021</td>
                                        </tr>
                                        <tr>
                                            
                                            <td rowspan="2" style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="left">জেলা</td>
                                            <td rowspan="2" style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">ফসলের আওতাধীন জমির পরিমান (একরে)</td>
                                            <td rowspan="2" style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">আংশিক ক্ষতি (একরে)</td>
                                            <td rowspan="2" style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">ক্ষতির শতকরা হার</td>
                                            <td colspan="3" style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">ক্ষতিগ্রস্থ ফসলী জমির পরিমান (একরে)</td>
                                            <td rowspan="2" style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">কাঙ্খিত একর প্রতি ফলন (কেজি)</td>
                                            <td rowspan="2" style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">প্রাক্কলিত ফসল ক্ষতির পরিমান (মে. টন)</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">আংশিক ক্ষতিতে সম্পূর্ণ ক্ষতির পরিমান (একরে)</td>
                                            <td style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">সম্পূর্ণ ক্ষতি</td>
                                            <td style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">মোট (৫+৬)</td>
                                        </tr>
                                        <tr>
                                            
                                            <td style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">১</td>
                                            <td style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">২</td>
                                            <td style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">৩</td>
                                            <td style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">৪</td>
                                            <td style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">৫</td>
                                            <td style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">৬</td>
                                            <td style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">৭</td>
                                            <td style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">৮</td>
                                            <td style="border: 1px solid #000; font-size: 1.2em; font-weight: bold;" align="middle">৯</td>
                                        </tr>

                                        {{-- Start: table data loop --}}
                                        <tr>
                                            <td style="border: 1px solid #000; font-size: 1.2em;" align="middle">1</td>
                                            <td style="border: 1px solid #000; font-size: 1.2em;" align="left">খুলনা</td>
                                            <td style="border: 1px solid #000; font-size: 1.2em;" align="middle">108423</td>
                                            <td style="border: 1px solid #000; font-size: 1.2em;" align="middle">6158.87</td>
                                            <td style="border: 1px solid #000; font-size: 1.2em;" align="middle">5.864</td>
                                            <td style="border: 1px solid #000; font-size: 1.2em;" align="middle">705.2706</td>
                                            <td style="border: 1px solid #000; font-size: 1.2em;" align="middle">0</td>
                                            <td style="border: 1px solid #000; font-size: 1.2em;" align="middle">705.3</td>
                                            <td style="border: 1px solid #000; font-size: 1.2em;" align="middle">6668.6</td>
                                            <td style="border: 1px solid #000; font-size: 1.2em;" align="middle">903.072
                                            </td>
                                        </tr>
                                        {{-- End: table data loop --}}

                                        
                                        
                                    </table>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mt-20">
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