@extends('backend.layout.master') @section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
  <!--begin::Subheader-->
  <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
      <!--begin::Info-->
      <div class="d-flex align-items-center flex-wrap mr-1">
        <!--begin::Page Heading-->
        <div class="d-flex align-items-baseline flex-wrap mr-5">
          <!--begin::Page Title-->
          <h5 class="text-dark font-weight-bold my-1 mr-5">GetCertificate </h5>
          <!--end::Page Title-->
          <!--begin::Breadcrumb-->
          <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
              <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              <a class="text-muted">Certificate Info</a>
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
      <!--begin::Card-->
      <div class="row">
        <div class="col-lg-12">
          <!--begin::Card-->
          <div class="card card-custom example example-compact">
            <div class="card-header">
              <h3 class="card-title">Certificate</h3>
              <h3 class="card-title">
                <button class="btn btn-success" id="cmd">Download Certificate</button>
              </h3>
            </div>

            <div class="html-content ss mt-5">
              <div class="row mt-5 " style="margin-top:120px !important">
                <div class="col text-center ">
                  <img src="{{ asset('/images/'.$certificate->logo_1 )}}" style="margin-top: 11px " height="80px" width="80px">
                </div>
                <div class="col ">
                  <div class="text-center ">
                    <p class="mb-0 h3">{{ $certificate->heading_1 }}</p>
                    <p class="h1 mb-0 h-1">
                      <b>{{ $certificate->heading_2 }}</b>
                    </p>
                    <p class="mb-0 h6">{{ $certificate->heading_3 }}</p>
                    <p class="p-1">{{ $certificate->heading_4 }}</p>
                  </div>
                </div>
                <div class="col  text-center ">
                  <img src="{{ asset('/images/'. $certificate->logo_2) }}" height="80px" width="80px" style="margin-top: 11px ">
                </div>
              </div>
              <br>
              <br>
              <br>
              <br>

              <p class="text-center h1 font">
                <b>সনদ পত্র <b>
              </p>
              <br>
              <br>
              <br>

                <span class="s "><img src="{{ asset('/images/'. $certificate->logo_2) }}"  style="width:35%; margin-top: 40px ;z-index:-11">
                </span>

              <br>
              <br>
              <br>

              <div class=" text-justify   container " style="margin-top:30px !important">
                <div class="row  ">
                  <div class="col h3 p-5 m-5 th-4" style="margin-left:65px !important ; margin-right:65px !important ; line-height:50px !important">
                    <b>জনাব {{ Auth::user()->first_name.' '.Auth::user()->middle_name.' '.Auth::user()->last_name }}</b>,
                    <b>ইউিপ সদস্য (সাধারন)</b>,
                    <b>ইউিনয়ন- {{ Auth::user()->union->name_bn }}</b>,
                    <b>উপেজলা- {{ Auth::user()->upazila->name_bd }}</b>,
                    <b> জেলা- {{ Auth::user()->district->name_bn }}</b>,
                    <span>{{ $certificate->content_text }}</span>
                  </div>
                </div>
              </div>
              <br>
              <br>
              <br>



              <div class=" text-justify container">
                <div class="row  ">
                  <div class="col  p-5 m-5" style="margin-left:65px !important ; margin-right:65px !important">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col" class="h3">প্রাপ্ত মার্ক</th>
                          <th scope="col" class="h3">প্রাপ্ত পয়েন্ট</th>
                          <th scope="col" class="h3">গ্রেড</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row" class="h3">২৩</th>
                          <td scope="row" class="h3">৫.০০</td>
                          <td scope="row" class="h3">এ+</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <br>
              <br>
              <br>
              <br>
              <div class="container" style="margin-bottom:60px">
                <div class="row" style="margin-left:65px !important ; margin-right:65px !important">
                  <div class="col text-center h5 p-0 m-0" style="margin-top: 40px !important;margin-left:14px!important;">
                    <span class="align-items-center">{{ explode(' ', now())[0] }}</span>
                  </div>
                  <div class="col text-center">
                    <img src="{{ asset('/images/'.$certificate->cd_sign) }}" style="margin-top: 0px !important;margin-left:14px!important;" height="80px">
                  </div>
                  <div class="col text-center">
                    <img src="{{ asset('/images/'.$certificate->d_sign) }}" style="margin-top: 0px !important;margin-left:14px!important;" class="Name" height="80px">
                  </div>
                  <div class="col text-center">
                    <img src="{{ asset('/images/'.$certificate->dg_sign) }}" style="margin-top: 0px !important;margin-left:14px!important;" class="Name" height="80px">
                  </div>
                </div>
                <div class="row" style="margin-left:60px !important ; margin-right:65px !important">
                  <div class="col h4 text-center">তারিখ</div>
                  <div class="col h4 text-center">
                    <span>কোর্স পরিচালক</span>
                  </div>
                  <div class="col h4 text-center">
                    <span>পরিচালক <br>(প্রশিক্ষণ ও পরামর্শ) </span>
                  </div>
                  <div class="col text-center h4">
                    <span>মহাপরিচালক</span>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>



  <style>
    .ss {
        height: 100%;
        position: relative;
    }

    .s {

        display: -webkit-flexbox;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-flex-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
        justify-content: center;
        z-index: 1;
        opacity:.2;
        position: absolute;
    }
  </style>
</div>
@endsection
 
