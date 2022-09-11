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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Crop Cutting & Production Survey</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted">Crop Cutting & Production Survey</a>
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
                                    <p class="font-weight-bold mt-4">ফসল কর্তন ও উৎপাদন জরিপ তফসিল</p>
                                    <p class="mt-4">(Crop Cutting & Production Survey)</p>
                                </div>
                                <div class="col-3">
                                    <p class="font-weight-bold text-right">তফসিল - ২</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ajax-data-container pt-3">
                                    <p style="font-size: 1.4em; font-weight: 600">১। নমুনা দাগ্গুচ্ছের পরিচিতি :</p>
                                    <table class="table">
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" colspan="2">বিভাগ:</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">জেলা:</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">উপজেলা/থানা:</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left">কোড</td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left">কোড</td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left">কোড</td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" colspan="2">ইউনিয়ন:</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">মৌজা:</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">দাগ্গুচ্ছের সংকেত নং (প্রযোজ্য ক্ষেত্রে):</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left">কোড</td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left">কোড</td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left">নম্বর</td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="right" colspan="3">কর্তনকৃত ভূমি খন্ডের সংকেত নং</td>
                                            <td style="border: 1px solid #000" align="left" colspan="3"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" colspan="2">নমুনার অবস্থান: (কোড: দাগ্গুচ্ছের ভেতরে হলে 1 এবং দাগ্গুচ্ছের বহির্ভূত হলে 2)</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2"></td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">ফসল কর্তনের তারিখ</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" colspan="4" rowspan="2">চাষীর নাম ও মোবাইল নম্বর:</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="right" rowspan="2">দাগ্গুচ্ছের আয়তন:</td>
                                            <td style="border: 1px solid #000" align="left">একর</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left"></td>
                                        </tr>
                                        
                                    </table>

                                    <p style="font-size: 1.4em; font-weight: 600">১.১ কর্তনকৃত ভূমি খন্ডে জমির পরিমাণ ও অবস্থান (দৈব চয়ন ভিত্তিতে)</p>
                                    <p style="font-size: 1.4em; font-weight: 600" class="text-center">অংশ-১: ফসল কর্তন সংক্রান্ত তথ্যাদি</p>
                                    <table class="table">
                                        <tr>
                                            <td style="border: 1px solid #000" align="left">নির্বাচিত ভূমি খন্ডে জমির পরিমাণ</td>
                                            <td style="border: 1px solid #000" align="center" colspan="5">নির্বাচিত মাঠের (Field) পরিমাপ ও কর্তনবিন্দু/স্থাননির্ণয়</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="center" rowspan="2">একর</td>
                                            <td style="border: 1px solid #000" align="center" colspan="5">নির্বাচিত মাঠের (Field) দক্ষিণ-পশ্চিম কর্ণার নির্ণয়</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center" colspan="3">দক্ষিণ-পশ্চিম কর্ণার হতে পূর্ব-দক্ষিণ কর্ণারের দূরত্ব ........ ফুট</td>
                                            <td style="border: 1px solid #000" align="center" colspan="2">দক্ষিণ-পশ্চিম কর্ণার হতে উত্তর-পশ্চিম কর্ণারের দূরত্ব ........ ফুট</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="center" rowspan="2"></td>
                                            <td style="border: 1px solid #000" align="center" colspan="3">উত্তর প্রান্ত হতে ৯ ফুটবাদ দিয়ে ২ট সংখ্যা পাওয়া যাবে ৯ এবং........</td>
                                            <td style="border: 1px solid #000" align="center" colspan="2">উত্তর প্রান্ত হতে ৯ ফুটবাদ দিয়ে ২ট সংখ্যা পাওয়া যাবে ৯ এবং........</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center" colspan="3">৯ এবং........ এর মধ্যে দৈবচয়িত সংখ্যা.........</td>
                                            <td style="border: 1px solid #000" align="center" colspan="2">৯ এবং........ এর মধ্যে দৈবচয়িত সংখ্যা.........</td>
                                        </tr>
                                        
                                    </table>

                                    <table class="table">
                                        <tr>
                                            <td style="border:none;" align="left">১.২ ফসলের কোড লিখুন</td>
                                            <td style="border:none;" align="left">...............</td>
                                        </tr>
                                        <tr>
                                            <td style="border:none;" align="left">১.৩ চাষের ধরণের কোড লিখুন </td>
                                            <td style="border:none;" align="left">...............</td>
                                        </tr>
                                        <tr>
                                            <td style="border:none;" align="left">১.৪ ফসলের ধরণের কোড লিখুন</td>
                                            <td style="border:none;" align="left">...............</td>
                                        </tr>
                                    </table>
                                    <p style="font-size: 1.3em; font-weight: 500">বি:দ্র: (ক) নাম ও কোড: আউশ-1, আমন-2, বোরো-3, পাট-4, গম-5 (খ) চাষের ধরণের কোড: বোনা-6, রোপা-7, এবং (গ) ফসলের ধরণের কোড: দেশি-8, উপসী (HYV)-9, হাইব্রীড-10</p>

                                    <p style="font-size: 1.4em; font-weight: 600; margin-top: 20px;">১.৫ কর্তনপ্রাপ্ত ফসলের ওজন</p>
                                    <table class="table">
                                        <tr>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="center" rowspan="2">বিবরণ</td>
                                            <td style="border: 1px solid #000" align="center" colspan="2">ধান কর্তনের পর (কাঁচা অবস্থায়) (২০ বর্গমিটার/২১৫.২৭৮ বর্গফুট)</td>
                                            <td style="border: 1px solid #000" align="center" colspan="2">গম (কাঁচা অবস্থায়) (৫০ বর্গফুট)</td>
                                            <td style="border: 1px solid #000" align="center" colspan="2">পাট (শুকনা অবস্থায়) (৫০ বর্গফুট)</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center" colspan="2">কেজি</td>
                                            <td style="border: 1px solid #000" align="center" colspan="2">কেজি</td>
                                            <td style="border: 1px solid #000" align="center" colspan="2">কেজি</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left">কর্তনকৃত ফসলের ওজন</td>
                                            <td style="border: 1px solid #000" align="center" colspan="2"></td>
                                            <td style="border: 1px solid #000" align="center" colspan="2"></td>
                                            <td style="border: 1px solid #000" align="center" colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td align="left" colspan="6">১.৬ ধানের ক্ষেত্রে পরিমাপকৃত ধানের আদ্রতার হার (moisture)</td>
                                            <td align="left">............. %</td>
                                        </tr>
                                    </table>

                                    <p style="font-size: 1.4em; font-weight: 600; margin-top: 20px;">১.৭ নির্বাচিত মাঠের (Field) সেচ সংক্রান্ত তথ্য (সঠিক উত্তরটিতে টিক চিহ্ন দিন)</p>
                                    <table class="table">
                                        <tr>
                                            <td style="border:none;" align="left">(ক) মাঠে পানি সেচ দেয়া হয়েছে কি? কোড লিখুন (কোড: হ্যা-1, না-2)</td>
                                            <td style="border:none;" align="left">...............</td>
                                        </tr>
                                        <tr>
                                            <td style="border:none;" align="left">(খ) হ্যা হলে পানির উৎসের কোড লিখুন (প্রাকৃতিক-1, যান্ত্রিক-2, উভয়-3)</td>
                                            <td style="border:none;" align="left">...............</td>
                                        </tr>
                                        <tr>
                                            <td style="border:none;" align="left">(গ) পানি সেচ পর্যাপ্ত ছিল কি? (উত্তর হ্যা হলে কোড লিখুন: পর্যাপ্ত-1, মাঝারি-2, অপর্যাপ্ত-3)</td>
                                            <td style="border:none;" align="left">...............</td>
                                        </tr>
                                    </table>

                                    <p style="font-size: 1.4em; font-weight: 600; margin-top: 20px;">১.৮ নির্বাচিত মাঠের (Field) সার সংক্রান্ত তথ্য (সঠিক উত্তরটিতে টিক চিহ্ন দিন এবং গ-এ পরিমাণ লিখতে হবে)</p>
                                    <table class="table">
                                        <tr>
                                            <td style="border:none;" align="left">(ক) মাঠে সার ব্যবহার হয়েছে কি? কোড লিখুন (কোড: হ্যা-1, না-2)</td>
                                            <td style="border:none;" align="left">...............</td>
                                        </tr>
                                        <tr>
                                            <td style="border:none;" align="left">(খ) হ্যা হলে কোন ধরণের সার ব্যবহার হয়েছে তার কোড লিখুন (কোড: রাসায়নিক সার-1, জৈব-2)</td>
                                            <td style="border:none;" align="left">...............</td>
                                        </tr>
                                        <tr>
                                            <td style="border:none;" align="left">(গ) কি সার ব্যবহার হয়েছে? কোড লিখুন (ইউরিয়া-1, টিএসপি-2, পটাশ/এমওপি-3, ডিএপি-4, জিংক-5, জৈব সার-6)</td>
                                            <td style="border:none;" align="left">...............</td>
                                        </tr>
                                        <tr>
                                            <td style="border:none;" align="left">(ঘ) পরিমান লিখুন (কেজি)</td>
                                            <td style="border:none;" align="left">...............</td>
                                        </tr>
                                    </table>

                                    <p style="font-size: 1.4em; font-weight: 600; margin-top: 20px;">১.৯ নির্বাচিত মাঠের (Field) বালাইনাশক ব্যবহার সংক্রান্ত তথ্য (সঠিক উত্তরটিতে টিক চিহ্ন দিন এবং গ-এ পরিমাণ লিখতে হবে)</p>
                                    <table class="table">
                                        <tr>
                                            <td style="border:none;" align="left">(ক) নির্বাচিত মাঠে বালাইনাশক ব্যবহার হয়েছে কি? কোড লিখুন (কোড: হ্যা-1, না-2)</td>
                                            <td style="border:none;" align="left">...............</td>
                                        </tr>
                                        <tr>
                                            <td style="border:none;" align="left">(খ) কোন ধরণের বালাইনাশক ব্যবহার হয়েছে তার কোড লিখুন (কোড: প্রাকৃতিক-1, রাসায়নিক-2, উভয়-3)</td>
                                            <td style="border:none;" align="left">...............</td>
                                        </tr>
                                        <tr>
                                            <td style="border:none;" align="left">(গ) ব্যবহারের পরিমাণ (লিটার)</td>
                                            <td style="border:none;" align="left">...............</td>
                                        </tr>
                                    </table>

                                    <p style="font-size: 1.4em; font-weight: 600">২ নির্বাচিত মাঠের (Field) আশেপাশে উক্ত জাতের ফসল চাষ করেছে এমন চাষীর সাক্ষাৎকার</p>
                                    <table class="table">
                                        <tr>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="center" rowspan="2">ক্রমিক নং</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="center" colspan="2" rowspan="2">চাষীর নাম, পিতার নাম ও মোবাইল নম্বর</td>
                                            <td style="border: 1px solid #000" align="center" colspan="2">পূর্ববর্তী বছর ২০১......</td>
                                            <td style="border: 1px solid #000" align="center" colspan="2">চলতি বছর ২০১......</td>
                                            <td style="border: 1px solid #000" align="center" rowspan="2">মন্তব্য: ১. ভাল <br> ২.খারাপ </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center">আয়তন (একর)</td>
                                            <td style="border: 1px solid #000" align="center">উৎপাদন (মণ)</td>
                                            <td style="border: 1px solid #000" align="center">আয়তন (একর)</td>
                                            <td style="border: 1px solid #000" align="center">উৎপাদন (মণ)</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="center">১।</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">নাম <br> পিতার নাম <br> মোবাইল নম্বর </td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="center">২।</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">নাম <br> পিতার নাম <br> মোবাইল নম্বর </td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="center">৩।</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">নাম <br> পিতার নাম <br> মোবাইল নম্বর </td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="center">৪।</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">নাম <br> পিতার নাম <br> মোবাইল নম্বর </td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="center">৫।</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">নাম <br> পিতার নাম <br> মোবাইল নম্বর </td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                        </tr>
                                        <tr>
                                            
                                            <td style="border: 1px solid #000" align="right" colspan="3">মোট=</td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                            <td style="border: 1px solid #000" align="left"></td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mt-20">
                                        <div class="row">
                                            <div class="col-lg-4 ml-8">
                                                <p class="text-center">কৃষি সম্প্রসারণ অধিদপ্তর (ডিএই)</p>
                                                <p>উপজেলা কৃষি কর্মকর্তা/প্রতিনিধির স্বাক্ষর:</p>
                                                <p>নাম:</p>
                                                <p>পদবি:</p>
                                                <p>তারিখ:</p>
                                                <p>উপজেলা:</p>
                                                <p>(সীল)</p>
                                            </div>
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-4 text-right mr-8">
                                                <p class="text-center">বাংলাদেশ পরিসংখ্যান ব্যুরো (বিবিএস)</p>
                                                <p class="text-left">তথ্য সংগ্রহকারীর নাম:</p>
                                                <p class="text-left">উপজেলা/থানা পরিসংখ্যান কর্মকর্তার নাম:</p>
                                                <p class="text-left">উপজেলা/থানা পরিসংখ্যান কর্মকর্তার স্বাক্ষর:</p>
                                                <p class="text-left">তারিখ:</p>
                                                <p class="text-left">(সীল)</p>
                                            </div>
                                        </div>
                                        
                                        <p class="text-center">তফসিল পুরণের নির্দেশাবলী</p>

                                        <p style="font-size: 1.4em; font-weight: 600;">অংশ-১: ফসল কর্তন</p>
                                        <p>১। ফসল কর্তন জরিপের মূল উদ্দ্যেশ্যহলো সঠিকভাবে কর্তনকৃত ফসলের ভিত্তিতে সে এলাকার একর প্রতি ফসলের উৎপাদন/ফলন হার প্রাক্কলন করা। নমুনা দাগ্গুচ্ছে প্রধানত: ফসলের (ধান, গম ও পাট) জাতভেদে কর্তন করতে হবে। বিশেষ ক্ষেত্রে দাগ্গুচ্ছের বাহিরে কোন জমিতে কর্তন করা যেতে পারে।</p>
                                        <p>২। ধান, পাট, গম সার্কেল পদ্ধতিতে কর্তন করতে হবে। কোন ফসল কতখানি জায়গায়/জমিতে কর্তন করতে হবে তা অপর পৃষ্ঠায় ১.৩ এ উল্লেখ করা হয়েছে।</p>
                                        <p>৩। কর্তনকৃত জমিতে কাঁচা ও শুকনা ওজনের ব্যাপারে খুবই যত্নবান হতে হবে। সামান্য ২/১ গ্রাম কম/বেশী ওজনের জন্য ফলন হার প্রাক্কলনে বিরাট পরিবর্তন/Effect করবে।</p>
                                        <p>৪। কর্তনকৃত কাঁচা ধান ময়েশ্চার মেশিনের সাহায্যে আদ্রতা পরিমাপ করে বা এক কেজি নমুনা কাঁচা ধান ১০ দিন শুকানোর পর ওজন নিতে হবে এবং এ শুকনো ফসলের ওজন যথাস্থানে লিখতে হবে। </p>
                                        <p>৫। যদি ফসল কর্তন দাগ্গুচ্ছের বাহিরে কোন জমিতে করা হয় তাহলে দাগ্গুচ্ছের নং এর ঘর খালি থাকবে এবং ভূমিখণ্ডের সংকেত নং এর ঘরে মূল দাগ নং দিতে হবে। </p>

                                        <p style="font-size: 1.4em; font-weight: 600;">অংশ-২: ফসল উৎপাদন</p>
                                        <p>৬। সাধারণত: বিভিন্ন দেশে ৩টি পদ্ধতিতে প্রধান/অপ্রধান ফসলের উৎপাদন হিসাব প্রাক্কলন করে থাকে যেমন (১) ফসল কর্তন পদ্ধতি, (২) কৃষক (চাষী) জরিপ পদ্ধতি এবং (৩) আকাশ চিত্র পদ্ধতি। বাংলাদেশ পরিসংখ্যান ব্যুরো ফসল কর্তন পদ্ধতি ব্যবহার করার পাশাপাশি চাষী জরিপ পদ্ধতির মাধ্যমে ফসল উৎপাদনের হিসাব নিরূপণ করে থাকে। বর্তমানে উক্ত কর্তনের পাশাপাশি প্রতিটি উপজেলায় ২০ জন চাষীর সাক্ষাৎকার গ্রহণ করতে হবে। যে সকল মৌজায় কৃষক তালিকা ফরম (সংকলন-১) তৈরি করা হয়েছে সেখান থেকে দৈবচয়ন পদ্ধতিতে ৪টি ইউনিয়ন হতে ৪টি মৌজার তথ্য সংগ্রহ করতে হবে। ৪টি কর্তনে ২০ জন চাষীর সাক্ষাৎকার গ্রহণ শেষে অবশিষ্ট কর্তনের ক্ষেত্রে কৃষক সাক্ষাৎকারের প্রয়োজন নাই। উপজেলায় মোট ২০ জন নমুনা চাষীর মধ্যে ১২ জন "ছোট/ক্ষুদ্র চাষী" ৪ জন "বড়/বৃহৎ চাষী" এর নিকট হতে তথ্য সংগ্রহ করতে হবে।</p>

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