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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Forecasting Survey on Major Crop Production</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted">Forecasting Survey on Major Crop Production</a>
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
                                    <p class="font-weight-bold mt-4">প্রধান ফসল পূর্বাভাস জরিপ তফসিল</p>
                                    <p class="mt-4">(Forecasting Survey on Major Crop Production)</p>
                                </div>
                                <div class="col-3">
                                    <p class="font-weight-bold text-right">তফসিল - ১০</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ajax-data-container pt-3">
                                    <p style="font-size: 1.3em; font-weight: 500">এলাকা পরিচিতি:</p>
                                    <table class="table" style="margin-bottom: 25px">
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" colspan="2">বিভাগ:</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">জেলা:</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">উপজেলা/থানা:</td>
                                            <td style="border: 1px solid #000" align="left">সন (ইংরেজিতে)</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left">কোড</td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left">কোড</td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left">কোড</td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" colspan="2">ফসলের নাম:</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">ফসলের জাত:</td>
                                            <td style="border: 1px solid #000" align="left" colspan="3">তথ্য সংগ্রহের তারিখ ................................. হতে ...............................</td>
                                        </tr>
                                    </table>

                                    <p style="font-size: 1.3em; font-weight: 500; font-weight: bold;">অংশ ১: প্রাক্কলিত জমির পরিমাণ</p>
                                    <p style="font-size: 1.3em; font-weight: 500; margin-top:15px;">১.১ ফসলের আওতাধীন জমির পরিমান</p>
                                    <table class="table">
                                        <tr>
                                            <td style="border: 1px solid #000" align="center">ক্রমিক নং</td>
                                            <td style="border: 1px solid #000" align="center">ইউনিয়ন/উপজেলা</td>
                                            <td style="border: 1px solid #000" align="center">অস্থায়ী ফসলের মোট জমির পরিমাণ (একরে)</td>
                                            <td style="border: 1px solid #000" align="center">ফসলের জাত দেশী-1 উফশী-2</td>
                                            <td style="border: 1px solid #000" align="center">গত বছরে এ ফসলের অধীনে জমির পরিমাণ (একরে)</td>
                                            <td style="border: 1px solid #000" align="center">চলতি বছর এ ফসলের অধীন প্রাক্কলিত জমির পরিমান</td>
                                            <td style="border: 1px solid #000" align="center">গত বছরের তুলনায় জমি হ্রাস/বৃদ্ধির প্রধান কারণ</td>
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

                                        {{-- start loop --}}
                                        <tr>
                                            <td style="border: 1px solid #000" align="center" rowspan="2"></td>
                                            <td style="border: 1px solid #000" align="center" rowspan="2"></td>
                                            <td style="border: 1px solid #000" align="center" rowspan="2"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                        </tr>
                                        {{-- end loop --}}

                                        <tr>
                                            <td style="border: 1px solid #000" align="left" rowspan="2" colspan="2">উপজেলার মোট</td>
                                            <td style="border: 1px solid #000" align="center" rowspan="2"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" colspan="2">উপজেলায় অবস্থিত</td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" colspan="2">সব দাগগুচ্ছ</td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                        </tr>
                                    </table>

                                    <p style="font-size: 1.3em; font-weight: 500; font-weight: bold;">অংশ ২: প্রাক্কলিত ফসল উৎপাদন</p>
                                    <p style="font-size: 1.3em; font-weight: 500; margin-top:15px;">২.১ ফসলের প্রাক্কলিত উৎপাদন হিসাব ও ফলনের হার</p>
                                    <table class="table">
                                        <tr>
                                            <td style="border: 1px solid #000" align="center" rowspan="2">ক্রমিক নং</td>
                                            <td style="border: 1px solid #000" align="center" rowspan="2">এলাকার ধরন</td>
                                            <td style="border: 1px solid #000" align="center" rowspan="2">ফসলের নাম ও জাত</td>
                                            <td style="border: 1px solid #000" align="center" colspan="3">গত বছরের হিসাব</td>
                                            <td style="border: 1px solid #000" align="center" colspan="4">চলতি বছরের পূর্বাভাস তথ্য</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center">আবাদকৃত জমির পরিমাণ (একরে)</td>
                                            <td style="border: 1px solid #000" align="center">একর প্রতি ফলন (কেজি)</td>
                                            <td style="border: 1px solid #000" align="center">মোট উৎপাদন (মে.টন)</td>
                                            <td style="border: 1px solid #000" align="center">আবাদকৃত জমির পরিমাণ (একরে)</td>
                                            <td style="border: 1px solid #000" align="center">একর প্রতি ফলন (কেজি)</td>
                                            <td style="border: 1px solid #000" align="center">প্রত্যাশিত উৎপাদন (মে.টন)</td>
                                            <td style="border: 1px solid #000" align="center">উৎপাদন হ্রাস/বৃদ্ধির কারণ</td>
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
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center" rowspan="2">১।</td>
                                            <td style="border: 1px solid #000" align="center" rowspan="2">উপজেলা/থানা</td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center" rowspan="2">২।</td>
                                            <td style="border: 1px solid #000" align="center" rowspan="2">নমুনা দাগগুচ্ছ</td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                        </tr>
                                    </table>
                                    <p style="font-size: 1.3em; font-weight: 500; margin-top:15px;">কোড (কলাম ১০): অনুকূল আবহাওয়া (সময়োপযোগী বৃষ্টিপাত ও তাপমাত্রা-১, পর্যাপ্ত উপকরণ ব্যাবহার-২, বন্যা-৩, অতিবৃষ্টি-৪, অনাবৃষ্টি/খরা-৫, শিলাবৃষ্টি-৬, ঘূর্ণিঝড়-৭, পোকার আক্রমণ-৮)</p>
                                    
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mt-20">
                                        <div class="row">
                                            <div class="col-lg-4 ml-8">
                                                <p>তথ্য সংগ্রহকারীর স্বাক্ষর, নাম ও পদবী</p>
                                                <p>তারিখ :...................</p>
                                            </div>
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-4 text-right mr-8">
                                                <p>কর্মকর্তার স্বাক্ষর ও সীল</p>
                                                <p>তারিখ :....................</p>
                                            </div>
                                        </div>
                                        
                                        <p class="text-center">তফসিল পূরণের নির্দেশাবলী</p>

                                        <p style="font-size: 1.3em; font-weight: 500; font-weight: bold;">সাধারণ নির্দেশাবলী:</p>

                                        <p>১. ফসল পূর্বাভাস জরিপ শুধু প্রধান ফসলের (আউশ, আমন, বোরো, গম, পাট ও আলু) জন্য প্রযোজ্য।</p>
                                        <p>২. প্রতিটি প্রধান ফসল আবাদের সময় অর্থাৎ "আবাদি জমির প্রাক্কলিত হিসাব" তথ্য সংগ্রহ করে, বিভাগ/জেলা অফিসের মাধ্যমে ঢাকা সদর দপ্তরে প্রেরণ করতে হবে।</p>
                                        <p>৩. এই তফসিল প্রতি ফসলের জন্য ২ বার পূরণ করে পাঠাতে হবে। প্রথমে শুধু আবাদি জমির পূর্বাভাস। অর্থাৎ অংশ-১ পূরণ করে পাঠাতে হবে। অংশ-২ পূরণ করতে হবে ফসল কাটার ১০/১৫ দিন আগে অর্থাৎ জমিতে ফসল পাকার অবস্থায়/সময়। একসাথে ২টি অংশ পূরণ করা যাবে না। </p>

                                        <p style="font-size: 1.3em; font-weight: 500; font-weight: bold;">অংশ-১: আবাদি জমির প্রাক্কলিত হিসাব:</p>

                                        <p>৪. ইউনিয়ন ভিত্তিক তথ্য সংগ্রহ করে পূরণ করতে হবে। শেষ লাইনে উপজেলায় অবস্থিত সব নমুনা দাগগুচ্ছ সমূহের তথ্য সংগ্রহ করে পূরণ করতে হবে।</p>
                                        <p>৫. কলাম-৩ হতে কলাম-৬ যথাযথভাবে পূরণ করতে হবে। কলাম-৭ এ দুইটি উল্লেখযোগ্য কারণ লিখতে হবে।</p>

                                        <p style="font-size: 1.3em; font-weight: 500; font-weight: bold;">অংশ-২: প্রাক্কলিত ফসল উৎপাদন:</p>

                                        <p>৬. সকল জেলা/উপজেলা/থানার একত্রে গত বছরের তথ্য এবং চলতি বছরের পূর্বাভাস তথ্য সংগ্রহ করে পূরণ করতে হবে।</p>
                                        <p>৭. ৩টি নমুনা দাগগুচ্ছ পরিদর্শন পূর্বক গত বছর ও চলতি বছরের কলাম ৩ হতে কলাম ১০ এর চাহিত তথ্য দ্বারা পূরণ করতে হবে।</p>
                                        


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