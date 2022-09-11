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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Temporary Crop Production Survey</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted">Temporary Crop Production Survey</a>
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
                                    <p class="mt-4">(Temporary Crop Production Survey)</p>
                                </div>
                                <div class="col-3">
                                    <p class="font-weight-bold text-right">তফসিল - ৩</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ajax-data-container pt-3">
                                    <p style="font-size: 1.3em; font-weight: 500">১। এলাকা পরিচিতি :</p>
                                    <table class="table">
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" colspan="2">বিভাগ:</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">জেলা:</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">উপজেলা:</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left">কোড:</td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left">কোড:</td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left">কোড:</td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" rowspan="2">ফসলের নাম:</td>
                                            <td style="border: 1px solid #000" align="left" rowspan="2" colspan="2">ফসলের জাত:</td>
                                            <td style="border: 1px solid #000" align="left">ফসলের বছর:</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">তথ্য সংগ্রহের তারিখ</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left" colspan="2"></td>
                                        </tr>
                                    </table>

                                    <p style="font-size: 1.3em; font-weight: 500">১.১ ফসলের অধীন জমির পরিমান, উৎপাদন ও ফলনের হার</p>
                                    <table class="table">
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" rowspan="2">ইউনিয়নের নাম</td>
                                            <td style="border: 1px solid #000" align="left" rowspan="2">কৃষকের নাম ও মোবাইল নম্বর</td>
                                            <td style="border: 1px solid #000" align="left" rowspan="2">মৌজা/গ্রামের নাম</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">জমির পরিমান (একর)</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">মোট উৎপাদন (মণ)</td>
                                            <td style="border: 1px solid #000" align="left" rowspan="2">চলতি বছরে একর প্রতি ফলনের হার (কেজি)</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left">গত বছর ২০.....</td>
                                            <td style="border: 1px solid #000" align="left">চলতি বছর ২০.....</td>
                                            <td style="border: 1px solid #000" align="left">গত বছর ২০.....</td>
                                            <td style="border: 1px solid #000" align="left">চলতি বছর ২০.....</td>
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
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" rowspan="5">১।</td>
                                            <td style="border: 1px solid #000" align="left">১</td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left">২</td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left">৩</td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left">৪</td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left">৫</td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" colspan="3">মোট:</td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" colspan="4" rowspan="2">
                                                চলতি বছরের প্রাক্কলিত আয়তন = X x গত বছরের আয়তন = <br>
                                                চলতি বছরের প্রাক্কলিত উৎপাদন = Y  x গত বছরের উৎপাদন =
                                            </td>
                                            <td style="border: 1px solid #000" align="left" colspan="2"></td>
                                            <td style="border: 1px solid #000" align="left" colspan="2" rowspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" colspan="2"></td>
                                        </tr>
                                        
                                    </table>
                                </div>

                                <div class="row">
                                    <div class="col-lg-5 ml-8">
                                        <p>X = চলতি বছরের সাথে গত বছরের আয়তনের আনুপাতিক হার।</p>
                                        <p>Y = চলতি বছরের সাথে গত বছরের উৎপাদনের আনুপাতিক হার।</p>
                                        <p>২। উপজেলা/থানায় এ ফসলের অধীন (আনুপাতিক হরে) মোট প্রাক্কলিত জমির পরিমান (একরে)</p>
                                        <p>৩। চলতি বছরে উপজেলা/থানায় এ ফসলের (আনুপাতিক হরে) প্রাক্কলিত মোট উৎপাদন (মন)</p>
                                        <p>৪। গত বছরের তুলনায় চলতি বছরে জমির পরিমান, উৎপাদন ও ফলনের হ্রাস/বৃদ্ধির শতকরা হার।</p>
                                        <p>৫। গত বছর হতে চলতি বছরে আবাদি জমির পরিমান, উৎপাদন ও ফলন হ্রাস/বৃদ্ধির কারণ লিখুন।</p>
                                    </div>

                                    <div class="col-lg-1"></div>

                                    <div class="col-lg-5 text-left mr-8">
                                        <p>(ক) গত বছরে জমির পরিমান : ..............</p>
                                        <p>(ক) চলতি বছরে : ..............</p>
                                        <p>(ক) ফসলের উৎপাদন : ..............</p>
                                        <p>(খ) একর প্রতি ফলন : ..............</p>
                                        <p>(ক) জমির পরিমান শতকরা ................ ভাগ</p>
                                        <p>(খ) একর প্রতি ফলন শতকরা ................ ভাগ</p>
                                        <p>(গ) ফসল উৎপাদন শতকরা ................ ভাগ</p>
                                        <p>...........................................................................</p>
                                        <p>...........................................................................</p>
                                    </div>
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
                                        
                                        <p class="text-center">তফসিল পূরণ/তথ্য সংগ্রহের নির্দেশাবলী</p>

                                        <p>১. উপজেলার প্রতিটি ইউনিয়নের ৫ জন ফসল চাষীর নিকট হতে তথ্য সংগ্রহ করতে হবে। ৫ জন চাষী নির্বাচন কৃষক তালিকা ফরম (সংকলন-১) হতে দৈব চয়ন পদ্ধতিতে করতে হবে। </p>

                                        <p>২. কৃষক তালিকা ফরম (সংকলন-১) হতে ৩ জন ক্ষুদ্র কৃষক, ১ জন মাঝারী কৃষক এবং ১ জন বড় কৃষক দৈব চয়ন পদ্ধতিতে নির্বাচিত করে তথ্য সংগ্রহ করতে হবে। </p>

                                        <p>৩. প্রতি বছর এ ৫ জন নির্বাচিত কৃষকের নিকট হতে উৎপাদন তথ্য সংগ্রহ করা যেতে পারে। </p>

                                        <p>৪. প্রশ্ন ৪ এ শতকরা হ্রাস/বৃদ্ধি গত বছরের ভিত্তিতে করতে হবে। হ্রাস হলে শতকরা হিসাবের সামনে (-) চিহ্ন দিয়ে লিখতে হবে। </p>

                                        <p>৫. প্রশ্ন ৫ এ হ্রাস/বৃদ্ধির কারণ হিসাবে ভাল আবহাওয়া, প্রাকৃতিক দুর্যোগ, অর্থনৈতিকভাবে লাভজনক ইত্যাদি কারণ হতে পারে। বিস্তারিত কারণ উল্লেখ করুন।</p>

                                        <p>৬. এ জরিপ তথ্যের ভিত্তিতে প্রয়োজনীয় উপাত্ত "সংকলন ফরম-৩" পূরণ করে বিভাগীয়/জেলায় অফিসে নির্ধারিত সময়ের মধ্যে প্রেরণ করতে হবে। বিভাগীয় অফিস উপজেলা/জেলা সংকলন ফরম ৩ এর ভিত্তিতে উপজেলা/থানাওয়ারী তথ্য সংকলন করে এগ্রিকালচার উইংয়ে নির্ধারিত সময়ে প্রেরণ করতে হবে। "সংকলন ফরম-৩" এর মত "তফসিল-৩" জেলা অফিস, বিভাগ অফিস এবং এগ্রিকালচার উইং-এ প্রেরণ করতে হবে।</p>

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