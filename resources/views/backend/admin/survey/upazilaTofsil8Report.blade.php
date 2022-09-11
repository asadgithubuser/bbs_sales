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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Potato Crop Cutting and Production Survey</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted">Potato Crop Cutting and Production Survey</a>
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
                                    <p class="font-weight-bold mt-4">মাসিক কৃষি মজুরি হার জরিপ তফসিল</p>
                                    <p class="mt-4">(Monthly Wage Rate Survey of Africultural Day Labourers)</p>
                                </div>
                                <div class="col-3">
                                    <p class="font-weight-bold text-right">তফসিল - ৮</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ajax-data-container pt-3">
                                    <p style="font-size: 1.3em; font-weight: 500">এলাকা পরিচিতি:</p>
                                    <table class="table" style="margin-bottom: 25px">
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" colspan="2">বিভাগ নাম: {{ $list->division ? $list->division->name_bn :'' }}</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">জেলা নাম: {{ $list->district ? $list->district->name_bn :'' }}</td>
                                            <td style="border: 1px solid #000" align="left" colspan="2">উপজেলা/থানা নাম: {{ $list->upazila ? $list->upazila->name_bd :'' }}</td>
                                            <td style="border: 1px solid #000" align="left">মাসের নাম (ইংরেজিতে) </td>
                                            <td style="border: 1px solid #000" align="left"> সন</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="left">কোড</td>
                                            <td style="border: 1px solid #000" align="left">{{ $list->division ? $list->division->division_bbs_code :'' }}</td>
                                            <td style="border: 1px solid #000" align="left">কোড</td>
                                            <td style="border: 1px solid #000" align="left">{{ $list->district ? $list->district->district_bbs_code :'' }}</td>
                                            <td style="border: 1px solid #000" align="left">কোড</td>
                                            <td style="border: 1px solid #000" align="left">{{ $list->upazila ? $list->upazila->upazila_bbs_code :'' }}</td>
                                            <td style="border: 1px solid #000" align="left">{{ $surveyNotification->created_at->format('F') }}</td>
                                            <td style="border: 1px solid #000" align="left">{{ $surveyNotification->created_at->format('Y') }}</td>
                                        </tr>
                                    </table>
                                    @foreach ($datas as $itemData)
                                        
                                        <p style="font-size: 1.3em; font-weight: 500">নির্বাচিত @if ($loop->index ==0)
                                            ১ম দাগগুচ্ছ:
                                            @elseif($loop->index ==1)
                                            ২য় দাগগুচ্ছ:
                                            @elseif($loop->index ==2)
                                            ৩য় দাগগুচ্ছ:
                                            @elseif($loop->index ==3)
                                            ৪র্থ দাগগুচ্ছ:
                                        @endif </p>
                                        <table class="table">
                                            <tr>
                                                <td style="border: 1px solid #000" align="left" rowspan="2" colspan="2">দাগগুচ্ছ নম্বর:</td>
                                                <td style="border: 1px solid #000" align="left" colspan="3">ইউনিয়ন:</td>
                                                <td style="border: 1px solid #000" align="left" colspan="5">মৌজা:</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">কোড</td>
                                                <td style="border: 1px solid #000" align="center" colspan="2"></td>
                                                <td style="border: 1px solid #000" align="center" colspan="2">কোড</td>
                                                <td style="border: 1px solid #000" align="center" colspan="3"></td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000; vertical-align: middle;" align="center" rowspan="3">ক্রমিক নং</td>
                                                <td style="border: 1px solid #000; vertical-align: middle;" align="center" rowspan="3">তথ্য প্রদানকারীর বিবরণ</td>
                                                <td style="border: 1px solid #000" align="center" colspan="6">খোরাকীসহ (টাকায়)</td>
                                                <td style="border: 1px solid #000; vertical-align: middle;" align="center" colspan="2" rowspan="2">বিনা খোরাকীতে (টাকায়)</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center" colspan="2">এক বেলা খোরাকী</td>
                                                <td style="border: 1px solid #000" align="center" colspan="2">দুই বেলা খোরাকী</td>
                                                <td style="border: 1px solid #000" align="center" colspan="2">তিন বেলা খোরাকী</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000" align="center">পুরুষ</td>
                                                <td style="border: 1px solid #000" align="center">মহিলা</td>
                                                <td style="border: 1px solid #000" align="center">পুরুষ</td>
                                                <td style="border: 1px solid #000" align="center">মহিলা</td>
                                                <td style="border: 1px solid #000" align="center">পুরুষ</td>
                                                <td style="border: 1px solid #000" align="center">মহিলা</td>
                                                <td style="border: 1px solid #000" align="center">পুরুষ</td>
                                                <td style="border: 1px solid #000" align="center">মহিলা</td>
                                            </tr>
                                            @php
                                            $total_one_meal_male = 0;
                                            $total_one_meal_female = 0;
                                            $total_two_meal_male = 0;
                                            $total_two_meal_female = 0;
                                            $total_three_meal_male = 0;
                                            $total_three_meal_female = 0;
                                            $total_without_meal_male = 0;
                                            $total_without_meal_female = 0;
                                        @endphp
                                        @foreach ($itemData->getAllCluster($itemData->cluster_id,$itemData->survey_process_list_id) as $data)
                                            
                                            <tr>
                                                <td style="border: 1px solid #000" align="right">১</td>
                                                <td style="border: 1px solid #000" align="left">
                                                    নাম: {{$data->farmer ? $data->farmer->farmers_name :$data->farmers_name }}<br>
                                                    পিতার নাম: {{ $data->fathers_name }}<br>
                                                    মোবাইল নম্বর: {{ $data->farmers_mobile }}
                                                </td>
                                                <td style="border: 1px solid #000" align="center">{{ $data->one_meal_male ? $data->one_meal_male :"-" }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $data->one_meal_female ? $data->one_meal_female : '-' }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $data->two_meal_male ? $data->two_meal_male :"-" }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $data->two_meal_female ? $data->two_meal_female : '-' }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $data->three_meal_female ? $data->three_meal_female : '-' }}</td>
                                                <td style="border: 1px solid #000" align="center">{{ $data->three_meal_female ? $data->three_meal_female : '-' }}</td>
                                                <td style="border: 1px solid #000" align="center">	{{ $data->without_meal_male }}</td>
                                                <td style="border: 1px solid #000" align="center">	{{ $data->without_meal_female }}</td>
                                            </tr>
                                            @php
                                                $total_one_meal_male += $data->one_meal_male;
                                                $total_one_meal_female += $data->one_meal_female;
                                                $total_two_meal_male += $data->two_meal_male;
                                                $total_two_meal_female += $data->two_meal_female;
                                                $total_three_meal_male += $data->three_meal_male;
                                                $total_three_meal_female += $data->three_meal_female;
                                                $total_without_meal_male += $data->without_meal_male;
                                                $total_without_meal_female += $data->without_meal_female;

                                            @endphp
                                        @endforeach
                                        
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" colspan="2">১। গড় মজুরি</td>
                                            <td style="border: 1px solid #000" align="center">{{ $total_one_meal_male }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $total_one_meal_female }}</td>
                                            <td style="border: 1px solid #000" align="center">{{  $total_two_meal_male }}</td>
                                            <td style="border: 1px solid #000" align="center">{{  $total_two_meal_female }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $total_three_meal_male }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $total_three_meal_female }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $total_without_meal_male }}</td>
                                            <td style="border: 1px solid #000" align="center">{{ $total_without_meal_female }}</td>
                                        </tr>
                                        </table>
                                        @if ($loop->index == 3)
                                            @break;
                                        @endif
                                    @endforeach

                                    {{-- <p style="font-size: 1.3em; font-weight: 500">নির্বাচিত ২য় দাগগুচ্ছ:</p>
                                    <table class="table">
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" rowspan="2" colspan="2">দাগগুচ্ছ নম্বর:</td>
                                            <td style="border: 1px solid #000" align="left" colspan="3">ইউনিয়ন:</td>
                                            <td style="border: 1px solid #000" align="left" colspan="5">মৌজা:</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center">কোড</td>
                                            <td style="border: 1px solid #000" align="center" colspan="2"></td>
                                            <td style="border: 1px solid #000" align="center" colspan="2">কোড</td>
                                            <td style="border: 1px solid #000" align="center" colspan="3"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="center" rowspan="3">ক্রমিক নং</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="center" rowspan="3">তথ্য প্রদানকারীর বিবরণ</td>
                                            <td style="border: 1px solid #000" align="center" colspan="6">খোরাকীসহ (টাকায়)</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="center" colspan="2" rowspan="2">বিনা খোরাকীতে (টাকায়)</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center" colspan="2">এক বেলা খোরাকী</td>
                                            <td style="border: 1px solid #000" align="center" colspan="2">দুই বেলা খোরাকী</td>
                                            <td style="border: 1px solid #000" align="center" colspan="2">তিন বেলা খোরাকী</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center">পুরুষ</td>
                                            <td style="border: 1px solid #000" align="center">মহিলা</td>
                                            <td style="border: 1px solid #000" align="center">পুরুষ</td>
                                            <td style="border: 1px solid #000" align="center">মহিলা</td>
                                            <td style="border: 1px solid #000" align="center">পুরুষ</td>
                                            <td style="border: 1px solid #000" align="center">মহিলা</td>
                                            <td style="border: 1px solid #000" align="center">পুরুষ</td>
                                            <td style="border: 1px solid #000" align="center">মহিলা</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="right">১</td>
                                            <td style="border: 1px solid #000" align="left">
                                                নাম: <br>
                                                পিতার নাম: <br>
                                                মোবাইল নম্বর:
                                            </td>
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
                                            <td style="border: 1px solid #000" align="right">২</td>
                                            <td style="border: 1px solid #000" align="left">
                                                নাম: <br>
                                                পিতার নাম: <br>
                                                মোবাইল নম্বর:
                                            </td>
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
                                            <td style="border: 1px solid #000" align="right">৩</td>
                                            <td style="border: 1px solid #000" align="left">
                                                নাম: <br>
                                                পিতার নাম: <br>
                                                মোবাইল নম্বর:
                                            </td>
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
                                            <td style="border: 1px solid #000" align="left" colspan="2">২। গড় মজুরি</td>
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

                                    <p style="font-size: 1.3em; font-weight: 500">নির্বাচিত ৩য় দাগগুচ্ছ:</p>
                                    <table class="table">
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" rowspan="2" colspan="2">দাগগুচ্ছ নম্বর:</td>
                                            <td style="border: 1px solid #000" align="left" colspan="3">ইউনিয়ন:</td>
                                            <td style="border: 1px solid #000" align="left" colspan="5">মৌজা:</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center">কোড</td>
                                            <td style="border: 1px solid #000" align="center" colspan="2"></td>
                                            <td style="border: 1px solid #000" align="center" colspan="2">কোড</td>
                                            <td style="border: 1px solid #000" align="center" colspan="3"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="center" rowspan="3">ক্রমিক নং</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="center" rowspan="3">তথ্য প্রদানকারীর বিবরণ</td>
                                            <td style="border: 1px solid #000" align="center" colspan="6">খোরাকীসহ (টাকায়)</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="center" colspan="2" rowspan="2">বিনা খোরাকীতে (টাকায়)</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center" colspan="2">এক বেলা খোরাকী</td>
                                            <td style="border: 1px solid #000" align="center" colspan="2">দুই বেলা খোরাকী</td>
                                            <td style="border: 1px solid #000" align="center" colspan="2">তিন বেলা খোরাকী</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center">পুরুষ</td>
                                            <td style="border: 1px solid #000" align="center">মহিলা</td>
                                            <td style="border: 1px solid #000" align="center">পুরুষ</td>
                                            <td style="border: 1px solid #000" align="center">মহিলা</td>
                                            <td style="border: 1px solid #000" align="center">পুরুষ</td>
                                            <td style="border: 1px solid #000" align="center">মহিলা</td>
                                            <td style="border: 1px solid #000" align="center">পুরুষ</td>
                                            <td style="border: 1px solid #000" align="center">মহিলা</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="right">১</td>
                                            <td style="border: 1px solid #000" align="left">
                                                নাম: <br>
                                                পিতার নাম: <br>
                                                মোবাইল নম্বর:
                                            </td>
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
                                            <td style="border: 1px solid #000" align="right">২</td>
                                            <td style="border: 1px solid #000" align="left">
                                                নাম: <br>
                                                পিতার নাম: <br>
                                                মোবাইল নম্বর:
                                            </td>
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
                                            <td style="border: 1px solid #000" align="right">৩</td>
                                            <td style="border: 1px solid #000" align="left">
                                                নাম: <br>
                                                পিতার নাম: <br>
                                                মোবাইল নম্বর:
                                            </td>
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
                                            <td style="border: 1px solid #000" align="left" colspan="2">৩। গড় মজুরি</td>
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

                                    <p style="font-size: 1.3em; font-weight: 500">নির্বাচিত ৪র্থ দাগগুচ্ছ:</p>
                                    <table class="table">
                                        <tr>
                                            <td style="border: 1px solid #000" align="left" rowspan="2" colspan="2">দাগগুচ্ছ নম্বর:</td>
                                            <td style="border: 1px solid #000" align="left" colspan="3">ইউনিয়ন:</td>
                                            <td style="border: 1px solid #000" align="left" colspan="5">মৌজা:</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center">কোড</td>
                                            <td style="border: 1px solid #000" align="center" colspan="2"></td>
                                            <td style="border: 1px solid #000" align="center" colspan="2">কোড</td>
                                            <td style="border: 1px solid #000" align="center" colspan="3"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="center" rowspan="3">ক্রমিক নং</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="center" rowspan="3">তথ্য প্রদানকারীর বিবরণ</td>
                                            <td style="border: 1px solid #000" align="center" colspan="6">খোরাকীসহ (টাকায়)</td>
                                            <td style="border: 1px solid #000; vertical-align: middle;" align="center" colspan="2" rowspan="2">বিনা খোরাকীতে (টাকায়)</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center" colspan="2">এক বেলা খোরাকী</td>
                                            <td style="border: 1px solid #000" align="center" colspan="2">দুই বেলা খোরাকী</td>
                                            <td style="border: 1px solid #000" align="center" colspan="2">তিন বেলা খোরাকী</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="center">পুরুষ</td>
                                            <td style="border: 1px solid #000" align="center">মহিলা</td>
                                            <td style="border: 1px solid #000" align="center">পুরুষ</td>
                                            <td style="border: 1px solid #000" align="center">মহিলা</td>
                                            <td style="border: 1px solid #000" align="center">পুরুষ</td>
                                            <td style="border: 1px solid #000" align="center">মহিলা</td>
                                            <td style="border: 1px solid #000" align="center">পুরুষ</td>
                                            <td style="border: 1px solid #000" align="center">মহিলা</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000" align="right">১</td>
                                            <td style="border: 1px solid #000" align="left">
                                                নাম: <br>
                                                পিতার নাম: <br>
                                                মোবাইল নম্বর:
                                            </td>
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
                                            <td style="border: 1px solid #000" align="right">২</td>
                                            <td style="border: 1px solid #000" align="left">
                                                নাম: <br>
                                                পিতার নাম: <br>
                                                মোবাইল নম্বর:
                                            </td>
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
                                            <td style="border: 1px solid #000" align="right">৩</td>
                                            <td style="border: 1px solid #000" align="left">
                                                নাম: <br>
                                                পিতার নাম: <br>
                                                মোবাইল নম্বর:
                                            </td>
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
                                            <td style="border: 1px solid #000" align="left" colspan="2">৪। গড় মজুরি</td>
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
                                            <td style="border: 1px solid #000" align="left" colspan="2">উপজেলা/থানার গড় মজুরি (১। গড় মজুরি + ২। গড় মজুরি + ৩। গড় মজুরি + ৪। গড় মজুরি)</td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                            <td style="border: 1px solid #000" align="center"></td>
                                        </tr>
                                    </table> --}}
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mt-20">
                                        <div class="row">
                                            <div class="col-lg-4 ml-8">
                                                @if ($list->surveyBy)
                                                    <img src="{{ asset('storage/signatures/'.$list->surveyBy->signature) }}" width="100" height="70">

                                                    <p>
                                                        {{ $list->surveyBy->first_name.' '. $list->surveyBy->middle_name.' '. $list->surveyBy->last_name }}
                                                        
                                                    </p>
                                                    <p>
                                                        Designation: {{ $list->surveyBy->designation->name_en }}
                                                    </p>
                                                @endif
                                                <p>তথ্য সংগ্রহকারীর স্বাক্ষর, নাম ও পদবী</p>
                                                <p>তারিখ : {{ $list->updated_at->format('d/m/Y') }}</p>
                                            </div>
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-4 text-right mr-8">
                                                @if ($list->createdBy)
                                                    <img src="{{ asset('storage/signatures/'.$list->createdBy->signature) }}" width="100" height="70">
                                                @endif
                                                <p>কর্মকর্তার স্বাক্ষর ও সীল</p>
                                                <p>তারিখ : {{ $list->created_at->format('d/m/Y') }}</p>
                                            </div>
                                        </div>
                                        
                                        <p class="text-center">তফসিল পূরণের নির্দেশাবলী</p>

                                        <p>১. কৃষি মজুরি বলতে ভূমি চাষ করার উপযোগী করা, বপন, রোপন, আগাছা পরিষ্কার, সেচ, শস্য কর্তন, ঝাড়াই, মাড়াই ইত্যাদি যাবতীয় কাজ করার শ্রমিককে বুঝবে।</p>
                                        <p>২. শুধুমাত্র ১৫ বৎসর ও তদুর্ধ বয়ষ্ক পুরুষ ও মহিলা কৃষি শ্রমিকের তথ্য নিতে হবে।</p>
                                        <p>৩. প্রতিটি বয়ষ্ক পুরুষ ও মহিলা কৃষি শ্রমিকের মজুরির জন্য ২টি ঘর আছে, প্রকৃত কৃষক/দিন মজুরকে জিজ্ঞাসা করে তার এলাকার তথ্যের ভিত্তিতে কৃষি মজুরির ঘর গুলো পূরণ করতে হবে।</p>
                                        <p>৪. প্রতিটি উপজেলা হতে দৈব চয়ন পদ্ধতিতে ৪ (চার) টি দাগগুচ্ছ নির্বাচন করতে হবে। ৪ (চার) টি দাগগুচ্ছ হতে ১০ (দশ) জন চাষী/কৃষি শ্রমিকের সাক্ষাৎকার গ্রহণ করতে হবে। দাগগুচ্ছ চাষী নির্বাচনের ক্ষেত্রে ক্ষুদ্র, মাঝারী ও বৃহৎ চাষী নির্বাচনের বিষয়ে গুরুত্ব প্রদান করতে হবে। নির্বাচিত দাগগুচ্ছে সর্বোচ্চ ৩ (তিন) জন চাষী/কৃষি শ্রমিকের সাক্ষাৎকার গ্রহণ করতে হবে।</p>
                                        <p>৫. কৃষি মজুর একবেলা খোরাকীতে, দুইবেলা খোরাকীতে, তিনবেলা খোরাকীতে এবং বিনা খোরাকীতে নিয়োজিত হতে পারে। দাগগুচ্ছে অবস্থিত মৌজায় যে পদ্ধতির মজুরিতে শ্রমিক ভাড়া করা হয় সে পদ্ধতির মজুরির তথ্য লিপিবদ্ধ করতে হবে। খোরাকীসহ মজুরির বেলায় এলাকায় যে পদ্ধতি চালু আছে তা লিখতে হবে। এ পদ্ধতি এক বা একাধিক হতে পারে। যদি একবেলা খোরাকী, দুইবেলা খোরাকী, তিনবেলা খোরাকী কোনটি এলাকার জন্য প্রযোজ্য না হয় তবে সেখানে শূন্য (০) দিতে হবে। বিনা খোরাকীতে মজুরির পদ্ধতি চালু না থাকলে পার্শ্ববর্তী এলাকা হতে বিনা খোরাকীতে মজুরির তথ্য সংগ্রহ করতে হবে। বিনা খোরাকীতে মজুরির ঘর অবশ্যই পূরণ করতে হবে।</p>
                                        <p>৬. প্রতিটি দাগগুচ্ছের তথ্য সংগ্রহের পর গড় মজুরি বের করতে হবে এবং ১০ (দশ) জন চাষীর তথ্য সংগ্রহের পর উপজেলা/থানার গড় মজুরি বের করে সংগৃহীত তথ্য জেলায় প্রেরণ করতে হবে, জেলা থেকে তথ্য প্রাপ্তির পর গড় করে বিভাগীয় অফিসে প্রেরণ করতে এবং জেলার গড় এগ্রিকালচার উইংয়ে প্রেরণ করতে হবে। একবেলা খোরাকী, দুইবেলা খোরাকী, তিনবেলা খোরাকী এবং বিনা খোরাকী মজুরির গড় পৃথক ভাবে বের করতে হবে।</p>
                                        <p>৭. প্রতি ইংরেজী মাসের জন্য তফসিল পূরণ করে পরবর্তী মাসের ৭ তারিখের মধ্যে জেলা পরিসংখ্যান অফিসে, ১২ তারিখের মধ্যে জেলা পরিসংখ্যান অফিস হতে বিভাগীয় পরিসংখ্যান অফিসে এবং ১৫ তারিখের মধ্যে বিভাগীয় পরিসংখ্যান অফিস হতে এগ্রিকালচার উইংয়ে অবশ্যই প্রেরণ করতে হবে।</p>


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