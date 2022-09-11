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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Maize Crop Production Survey</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted">Maize Crop Production Survey</a>
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
                                    <p class="font-weight-bold mt-4">ভুট্টা ফসল উৎপাদন জরিপ তফসিল</p>
                                    <p class="mt-4">(Maize Crop Production Survey)</p>
                                </div>
                                <div class="col-3">
                                    <p class="font-weight-bold text-right">তফসিল - ৬</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ajax-data-container pt-3">
                                    <p style="font-size: 1.3em; font-weight: 500">এলাকা পরিচিতি :</p>
                                    <table class="table">
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" colspan="2">বিভাগ:</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">জেলা:</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">উপজেলা:</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="right">কোড:</td>
                                            <td style="border: 1px solid #000" align="right"></td>
                                            <td style="border: 1px solid #000" align="right">কোড:</td>
                                            <td style="border: 1px solid #000" align="right"></td>
                                            <td style="border: 1px solid #000" align="right">কোড:</td>
                                            <td style="border: 1px solid #000" align="right"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" colspan="2">ফসলের জাত:</td>
                                            <td style="border: 1px solid #000" align="middle">কোড লিখুন (রবি-১, খরিপ-২)</td>
                                            <td style="border: 1px solid #000" align="middle"></td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">তথ্য সংগ্রহের তারিখ  .................................... হতে  .................................. পর্যন্ত</td>
                                        </tr>
                                    </table>

                                    <p style="font-size: 1.3em; font-weight: 500">১| ভুট্টা ফসলের অধীন জমি, উৎপাদন ও ফলন হার</p>
                                    <table class="table">
                                        <tr>
                                            <td style="border: 1px solid #000" align="middle" rowspan="2">ইউনিয়নের নাম</td>
                                            <td style="border: 1px solid #000" align="middle" rowspan="2">মৌজার নাম</td>
                                            <td style="border: 1px solid #000" align="middle" colspan="2">ভুট্টা চাষের অধীন জমির পরিমাণ (একরে)</td>
                                            <td style="border: 1px solid #000" align="middle" colspan="2">একর প্রতি ফলন (কেজি)</td>
                                            <td style="border: 1px solid #000" align="middle" colspan="2">মোট উৎপাদন (মে.টন)</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="middle">গত বছর</td>
                                            <td style="border: 1px solid #000" align="middle">চলতি বছর</td>
                                            <td style="border: 1px solid #000" align="middle">গত বছর</td>
                                            <td style="border: 1px solid #000" align="middle">চলতি বছর</td>
                                            <td style="border: 1px solid #000" align="middle">গত বছর</td>
                                            <td style="border: 1px solid #000" align="middle">চলতি বছর</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left">১</td>
                                            <td style="border: 1px solid #000" align="left">২</td>
                                            <td style="border: 1px solid #000" align="left">৩</td>
                                            <td style="border: 1px solid #000" align="left">৪</td>
                                            <td style="border: 1px solid #000" align="left">৫</td>
                                            <td style="border: 1px solid #000" align="left">৬</td>
                                            <td style="border: 1px solid #000" align="left">৭</td>
                                            <td style="border: 1px solid #000" align="left">৮</td>
                                        </tr>
                                        {{-- data loop statrt --}}
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" rowspan="5"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                        </tr>
                                        {{-- data loop end --}}

                                        <tr>
                                            <td style="border: 1px solid #000" align="left">মোট</td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                        </tr>
                                        
                                    </table>
                                    <p style="font-size: 1.3em; font-weight: 500">বিঃ দ্রঃ উপজেলার অধীন যে সব ইউনিয়ন/মৌজায় চলতি বছর ভুট্টা চাষ হয়েছে তার ভিত্তিতে ভুট্টা উৎপাদনের হিসাব করতে হবে। তফসিল-১ এবং তফসিল-৩ এর উপর ভিত্তি করে ভুট্টা ফসল উৎপাদন জরিপের তথ্য সংগ্রহ করা যায়। </p>
                                </div>

                                <div class="row">
                                    <table class="table">
                                        <tr>
                                            <td style="border: none;" align="left" rowspan="2">২। উপজেলা/থানায় ভুট্টার অধীন মোট প্রাক্কলিত জমির পরিমান (একরে)</td>
                                            <td style="border: none;"  align="left">(ক) গত বছর</td>
                                            <td style="border: none;"  align="left">.......একর</td>
                                        </tr>
                                        <tr>
                                            <td style="border: none;"  align="left">(খ) চলতি বছর</td>
                                            <td style="border: none;"  align="left">.......একর</td>
                                        </tr>

                                        <tr>
                                            <td style="border: none;" align="left" rowspan="2">৩। উপজেলা/থানায় গত বছর ও চলতি বছর এ ফসলের প্রাক্কলিত উৎপাদন (মে.টন)</td>
                                            <td style="border: none;"  align="left">(ক) গত বছর</td>
                                            <td style="border: none;"  align="left">.......মে.টন</td>
                                        </tr>
                                        <tr>
                                            <td style="border: none;"  align="left">(খ) চলতি বছর</td>
                                            <td style="border: none;"  align="left">.......মে.টন</td>
                                        </tr>

                                        <tr>
                                            <td style="border: none;" align="left" rowspan="2">৪। উপজেলা/থানায় ভুট্টার একর প্রতি গড় ফলন হার</td>
                                            <td style="border: none;"  align="left">(ক) গত বছর</td>
                                            <td style="border: none;"  align="left">.......কেজি</td>
                                        </tr>
                                        <tr>
                                            <td style="border: none;"  align="left">(খ) চলতি বছর</td>
                                            <td style="border: none;"  align="left">.......কেজি</td>
                                        </tr>

                                        <tr>
                                            <td style="border: none;" align="left">৫। গত বছর হতে চলতি বছর; আবাদি জমির পরিমাণ উৎপাদন ও ফলন হার হ্রাস/বৃদ্ধির কারণ (লিখুন)</td>
                                            <td style="border: none;"  align="left" colspan="2">...............................................................................................................................................</td>
                                        </tr>
                                    </table>
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
                                        
                                        <p class="text-center" style="font-weight: 600">তফসিল পূরণের নির্দেশাবলী</p>

                                        <p>১. ভুট্টা ফসল উৎপাদন জরিপের ক্ষেত্রে তফসিল-১ এর সাহায্য নেয়া যেতে পারে। ইউনিয়ন ভিত্তিক তথ্য সংগ্রহ করতে হবে। </p>

                                        <p>২. ভুট্টা চাষীর নিকট হতে তথ্য জেনে কলাম ৩ হতে ৮ পর্যন্ত পূরণ করতে হবে। মোট ভুট্টা উৎপাদনের হিসেবে শেষ সারিতে লিখতে হবে। </p>

                                        <p>৩. প্রশ্ন ২-৪ হিসাব সঠিকভাবে লিখতে হবে। প্রশ্ন ৫ এর হ্রাস/বৃদ্ধির প্রধান কারণসমূহ বিস্তারিত লিখতে হবে।</p>

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