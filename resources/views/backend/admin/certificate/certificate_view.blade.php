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
          <h5 class="text-dark font-weight-bold my-1 mr-5">Create Certificate Template</h5>
          <!--end::Page Title-->
          <!--begin::Breadcrumb-->
          <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
              <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              <a class="text-muted">Add Certificate Info</a>
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
            </div>

            <div class="">
                <div class="row mt-5 " style="margin-top:80px !important">
                    <div class="col text-center ">
                      <img src="{{ asset('/'.$certificate->logo_1 )}}" style="margin-top: 11px " height="80px" width="80px">
                    </div>
                    <div class="col ">
                      <div class="text-center " >
                        <p class="mb-0 h4">{{ $certificate->heading_1 }}</p>
                        <p class="h1 mb-0 p-1">
                          <b>{{ $certificate->heading_2 }}</b>
                        </p>
                        <p class="mb-0 h6">{{ $certificate->heading_3 }}</p>
                        <p class="p-1">{{ $certificate->heading_4 }}</p>
                      </div>
                    </div>
                    <div class="col  text-center ">
                      <img src="{{ asset('/'. $certificate->logo_2) }}" height="80px" width="80px" style="margin-top: 11px ">
                    </div>
                  </div>
              <br>
              <br>
              <p class="text-center h1 font">
                <b>সনদ পত্র <b>
              </p>
              <br>
              <br>
              <br>

              <div class=" text-justify   container">
                <div class="row  ">
                         <div class="col h3 p-5 m-5" style="margin-left:65px !important ; margin-right:65px !important">
                         <b>জনাব নাম</b>,
                         <b>ইউিপ সদস্য (সাধারন)</b>,
                         <b>ইউিনয়ন- ইউনিয়নের নাম</b>,
                         <b>উপেজলা- উপজেলার নাম</b>,
                         <b> জেলা- জেলার নাম</b>,
                        <span>{{ $certificate->content_text }}</span>
                </div>
                </div>
              </div>
              <br>
              <br>
              <div class=" text-justify container">
                <div class="row">
                    <div class="col  p-5 m-5" style="margin-left:65px !important ; margin-right:65px !important">
                      <table class="table table-bordered">
                          <thead>
                            <tr >
                              <th scope="col" class="h4">প্রাপ্ত মার্ক</th>
                              <th scope="col" class="h4">প্রাপ্ত পয়েন্ট</th>
                              <th scope="col" class="h4">গ্রেড</th>

                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row" class="h4">২৩</th>
                              <td scope="row" class="h4">৫.০০</td>
                              <td scope="row" class="h4">এ+</td>
                            </tr>
                          </tbody>
                        </table>
                  </div>
                 </div>
              </div>
              <br>
              <br>

                <div class="container" style="margin-bottom:80px">
                    <div class="row Name" style="margin-left:65px !important ; margin-right:65px !important">
                    <div class="col Name text-center h5 p-0 m-0" style="margin-top: 90px !important;margin-left:14px!important;"><span class="align-items-center">{{ $certificate->create_date }}</div>
                        <div class="col Name text-center" ><img src="{{ asset('/'.$certificate->cd_sign) }}" style="margin-top: 40px !important;margin-left:14px!important;" height="80px"></div>
                        <div class="col Name text-center"><img src="{{ asset('/'.$certificate->d_sign) }}"style="margin-top: 40px !important;margin-left:14px!important;" class="Name" height="80px"></div>
                        <div class="col Name text-center"><img src="{{ asset('/'.$certificate->dg_sign) }}" style="margin-top: 40px !important;margin-left:14px!important;" class="Name" height="80px"></div>
                    </div>
                    <div class="row Name" style="margin-left:65px !important ; margin-right:65px !important">
                        <div class="col Name h4 text-center">তারিখ</div>
                        <div class="col Name h4 text-center"><span>কোর্স পরিচালক</span></div>
                        <div class="col Name h4 text-center"> <span>পরিচালক <br>(প্রশিক্ষণ ও পরামর্শ)</span></div>
                        <div class="col Name text-center h4"><span>মহাপরিচালক</span></div>
                      </div>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> @endsection
