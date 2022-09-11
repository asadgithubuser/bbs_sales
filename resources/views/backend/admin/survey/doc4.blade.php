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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">সংকলন - ৪</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted">সংকলন - ৪</a>
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
                                    <p class="mt-4">(সংকলন - ৪)</p>
                                </div>
                                <div class="col-3">
                                    <p class="font-weight-bold text-right">সংকলন - ৪</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ajax-data-container pt-3">
                                    <p style="font-size: 1.3em; font-weight: 500" class="text-center">Estimate of ......................... 2021-22</p>
                                    <table class="table">
                                        <tr>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle" rowspan="3">Sl. No.</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle" rowspan="3">Name of District/Division</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle" colspan="6">Number of Trees</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle" colspan="2" rowspan="2">Area under Garden (Acre)</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle" colspan="2" rowspan="2">Average Yield Per Fruit bearing tree (KG)</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle" colspan="3">2020-21</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle" colspan="3">2021-22</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">Fruit bearing</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">Non-Fruit bearing</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">Total</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">Fruit bearing</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">Non-Fruit bearing</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">Total</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">Last Year 2020-21</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">Current Year 2021-22</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">Last Year 2020-21</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">Current Year 2021-22</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">1</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">2</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">3</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">4</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">5</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">6</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">7</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">8</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">9</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">10</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">11</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">12</td>
                                        </tr>



                                        {{-- Start loop --}}
                                        <tr>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="right">1</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left">Barguna</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="right">2</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left">Barishal</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                        </tr>
                                        {{-- End loop --}}
                                        

                                        <tr>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left" colspan="2">Bangladesh</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                        </tr>
                                    </table>
                                </div>

                            </div>

                            {{-- 2nd part --}}
                            <div class="card-body">
                                <div class="table-responsive ajax-data-container pt-3">
                                    <p style="font-size: 1.3em; font-weight: 500" class="text-center">Estimate of ......................... 2021-22</p>
                                    <table class="table">
                                        <tr>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle" rowspan="2">Sl. No.</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle" rowspan="2">Name of District/Division</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle" colspan="6">Total Production (Metric Tons)</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">Last Year (Inside Garden) 2020-21</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">Current Year (Inside Garden) 2021-22</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">Last Year (Outside Garden) 2020-21</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">Current Year (Outside Garden) 2021-22</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">Total of Last Year (Inside & Outside Garden) 2020-21</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">Total of Current Year (Inside & Outside Garden) 2021-22</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">1</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">2</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">3</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">4</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">5</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">6</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">7</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="middle">8</td>
                                        </tr>



                                        {{-- Start loop --}}
                                        <tr>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="right">1</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left">Barguna</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="right">2</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left">Barishal</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                        </tr>
                                        {{-- End loop --}}
                                        

                                        <tr>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left" colspan="2">Bangladesh</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="left"></td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                            {{-- /2nd part --}}
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