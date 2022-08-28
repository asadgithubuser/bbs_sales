<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Dashboard</title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!--end::Fonts-->

    @include('backend.partials.css')
    <!--end::Layout Themes-->
    <style>
        @media print {
            #noprintbtn {
                display: none;
            }
        }

    </style>

    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">



    <!--begin::Main-->

    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">

            <!--begin::Aside-->
            @include('backend.partials.sidebar')
            <!--end::Aside-->

            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" class="header header-fixed">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex align-items-stretch justify-content-between">
                        <!--begin::Header Menu Wrapper-->
                        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                            <!--begin::Header Menu-->
                            <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                                <!--begin::Header Nav-->
                                <ul class="menu-nav">
                                    <li
                                        class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here menu-item-active">
                                        <a href="{{ route('admin.index') }}" class="">

                                            <span>
                                                <h2>BBS Dashboard</h2>
                                            </span>
                                            <i class="menu-arrow"></i>
                                        </a>
                                    </li>
                                </ul>
                                <!--end::Header Nav-->
                            </div>
                            <!--end::Header Menu-->
                        </div>
                        <!--end::Header Menu Wrapper-->
                        <!--begin::Topbar-->
                        <div class="topbar">
                            <!--begin::Search-->

                            <!--begin::Notifications-->
                            <div class="dropdown ajax-data-header">
                                @include('backend.layout.notification')
                            </div>
                            <!--end::Notifications-->

                            <div class="topbar-item">
                                <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
                                    id="kt_quick_user_toggle">
                                    {{-- <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span> --}}
                                    <span
                                        class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ Auth::user()->username }}
                                    </span>
                                    <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                                        <span
                                            class="symbol-label font-size-h5 font-weight-bold">{{ ucfirst(substr(Auth::user()->username, 0, 1)) }}</span>
                                    </span>
                                </div>
                            </div>
                            <!--end::User-->
                        </div>
                        <!--end::Topbar-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->

                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-md-12">

                                <div class="card" id="printArea">
                                    <div class="card-header">
                                        <a href="#" id="noprintbtn" target="_blank"
                                            class="btn btn-primary font-weight-bold btn-sm"
                                            onclick="return printDiv('printArea');">PDF</a>
                                        @if (!$template)
                                            <span id="noprintbtn" class="badge badge-danger">Please make a template for
                                                certificate this is default template</span>
                                        @endif
                                        @if (Auth::user()->role_id != 10)

                                            @if ($certificate)
                                                <button class="btn btn-warning btn-sm" id="noprintbtn" data-toggle="modal"
                                                    data-target="#kt_summernote_modal">Change</button>
                                                <!--begin::Modal-->
                                                <div class="modal fade" id="kt_summernote_modal" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Summernote Examples</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                                </button>
                                                            </div>
                                                            <form method="post"
                                                                action="{{ route('admin.application.changeCertificate', $certificate) }}"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="form-group row mt-2">
                                                                        <label
                                                                            class="col-form-label text-right col-lg-3 col-sm-12">Default
                                                                            Demo</label>
                                                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                                                            <textarea class="form-control summernote" name="body" id="" cols="30" rows="10">{!! $certificate->content !!}</textarea>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row mt-2">
                                                                        <label
                                                                            class="col-form-label text-right col-lg-3 col-sm-12">File
                                                                            Upload</label>
                                                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                                                            <input class="form-control" name="files"
                                                                                id="" type="file">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger mr-2"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Modal-->
                                            @endif
                                        @endif
                                    </div>
                                    @if ($certificate)
                                        {!! $template->header !!}

                                        <u>
                                            <h2 class="text-center">
                                                {{ ucfirst($applicationService->serviceItem->item_name_en) }}</h2>
                                        </u>


                                        <div id="certificate_body">
                                            {!! $certificate->content !!}
                                        </div>

                                        {!! $template->footer !!}
                                    @else
                                        {{-- default --}}
                                        {{-- body --}}
                                        <div class="card card-custom">
                                            <div class="tab-content">
                                                <div class="card-body p-0 tab-pane fade show active" id="details"
                                                    role="tabpanel">
                                                    <!--begin::Invoice-->
                                                    <!--begin::Invoice header-->
                                                    <div class="container">
                                                        <div class="card card-custom card-shadowless">
                                                            <div class="container">
                                                                <div class="card-body p-0">
                                                                    <div
                                                                        class="row justify-content-center py-8 px-2 px-md-0">
                                                                        <div class="col-md-12">
                                                                            <div class="d-flex justify-content-between">
                                                                                <img class="display-4 font-weight-boldest mt-7 mb-6 mr-10"
                                                                                    height="100%" width="15%"
                                                                                    src="https://media-eng.dhakatribune.com/uploads/2019/05/web-bba-statistics-logo-1557769503442-1559231347298.jpg"
                                                                                    alt="" />

                                                                                <span class="pt-10"
                                                                                    style="font-size: 15px">
                                                                                    গণপ্রজাতন্ত্রী বাংলাদেশ সরকার,
                                                                                    <br />
                                                                                    বাংলাদেশ পরিসংখ্যান ব্যুরো
                                                                                    <br />
                                                                                    মিরপুর, ঢাকা - ১২১৬
                                                                                    <br />
                                                                                    বাংলাদেশ ।
                                                                                </span>
                                                                            </div>
                                                                            <div class="border-bottom w-100"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="container">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div
                                                                                    class="d-flex flex-column flex-md-row">
                                                                                    <div class="d-flex flex-column">

                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ml-9">
                                                                {{-- <hr style="border-bottom: 2px solid #000; padding-bottom: 3px;display: inline-block"> --}}
                                                                <h4 class="mb-3">Applicant Name :
                                                                    {{ $application->user ? $application->user->first_name . ' ' . $application->user->middle_name : '' }}
                                                                </h4>
                                                                <h4 class="mb-3">Email :
                                                                    {{ $application->user ? $application->user->email : '' }}
                                                                </h4>
                                                                <h4 class="mb-3">Mobile :
                                                                    {{ $application->user ? $application->user->mobile : '' }}
                                                                </h4>
                                                                <h4 class="mb-3">Address :
                                                                    {{ $application->user ? $application->user->present_address : '' }}
                                                                </h4>
                                                                <h4 class="mb-3">Division :
                                                                    {{ $application->user ? $application->user->division->name_en : '' }}
                                                                </h4>
                                                                <h4 class="mb-3">District :
                                                                    {{ $application->user ? $application->user->district->name_en : '' }}
                                                                </h4>
                                                                <h4 class="mb-3">Upazilla :
                                                                    {{ $application->user ? $application->user->upazila->name_en : '' }}
                                                                </h4>
                                                                <h4 class="mb-3">Union :
                                                                    {{ $application->user ? $application->user->union->name_en : '' }}
                                                                </h4>
                                                                <h4 class="mb-3">Mouza :
                                                                    {{ $application->user ? $application->user->mouza->name_en : '' }}
                                                                </h4>
                                                                <br>
                                                            </div>
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h4>এই মর্মে প্রত্যয়ন করা যাইতেছে যে ,উপরিউক্ত
                                                                            ব্যাক্তি অত্র ইউনিয়নের একজন স্থায়ী বাসিন্দা
                                                                            হিসেবে আমার নিকট পরিচিত এবং জন্মসূত্রে
                                                                            বাংলাদেশের নাগরিক। তার নৈতিক চরিত্র ভালো।

                                                                        </h4>
                                                                        <h4>আমি তার জীবনের সর্বাঙ্গীন উন্নতি ও মঙ্গল
                                                                            কামনা করি।</h4>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!--end::Invoice header-->
                                                </div>
                                                <div class="card-footer">
                                                    <div class="row">
                                                        <div class="col-md-8"></div>
                                                        <div class="col-md-4">
                                                            <div class="text-center">
                                                                <span>
                                                                    <img src="https://static.cdn.wisestamp.com/wp-content/uploads/2020/08/Oprah-Winfrey-Signature-1.png"
                                                                        height="50" width="100" alt="signature">
                                                                </span>
                                                                <br>
                                                                <span>(Tajul Islam)</span>
                                                                <br>
                                                                <span>Director general</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- ./default --}}
                                    @endif
                                    @if ($certificate->attach_files)
                                        <div class="card" id="noprintbtn">
                                            <div class="card-body">
                                                <a href="{{ asset('storage/certificate/files/'.$certificate->attach_files) }}" class="btn btn-sm btn-info" target="_blank" id="noprintbtn">Preview Attachments</a>
                                                @if (Auth::user()->role_id == 10)
                                                    
                                                <a download="" id="noprintbtn" href="{{ asset('storage/certificate/files/'.$certificate->attach_files) }}" class="btn btn-sm btn-warning" target="_blank">Download <i class="fa fa-download"></i></a>
                                                @endif

                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!--begin::Footer-->
                <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                    <!--begin::Container-->
                    <div
                        class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted font-weight-bold mr-2">{{ date('Y') }} ©</span>
                            <a href="#" target="_blank" class="text-dark-75 text-hover-primary">BBS</a>
                        </div>
                        <!--end::Copyright-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->

    <!-- begin::User Panel-->
    @include('backend.partials.rightSidebar')
    <!-- end::User Panel-->

    <!--end::Header-->

    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop">
        <span class="svg-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
                    <path
                        d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                        fill="#000000" fill-rule="nonzero" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
    </div>
    <!--end::Scrolltop-->
    </div>
    <!--end::Content-->
    </div>
    <!--end::Demo Panel-->

    <!--begin::Global Config(global config for global JS scripts)-->
    @include('backend.partials.js')
    <!--end::Page Scripts-->
    <script type="text/javascript">
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            // document.body.innerHTML = originalContents;
        }
    </script>

    <script>
        window.onload = function myLoadFunction() {

            var userName = '<?php echo $application->user ? $application->user->first_name . ' ' . $application->user->middle_name : ''; ?>';
            var parentName = '<?php echo $application->parent_name; ?>';
            var address = '<?php echo $application->user ? $application->user->present_address : ''; ?>';
            var serviceItemName = '<?php echo $applicationService->serviceItem->item_name_en; ?>';

            document.body.innerHTML = document.body.innerHTML.replace('{name}', userName);
            document.body.innerHTML = document.body.innerHTML.replace('{parentName}', parentName);
            document.body.innerHTML = document.body.innerHTML.replace('{address}', address);
            document.body.innerHTML = document.body.innerHTML.replace('{serviceItemName}', serviceItemName);
            document.body.innerHTML = document.body.innerHTML.replace('{serviceItemName}', serviceItemName);

            document.body.innerHTML = document.body.innerHTML.replace('{name}', userName);
            document.body.innerHTML = document.body.innerHTML.replace('{parentName}', parentName);
            document.body.innerHTML = document.body.innerHTML.replace('{address}', address);
            document.body.innerHTML = document.body.innerHTML.replace('{serviceItemName}', serviceItemName);
            document.body.innerHTML = document.body.innerHTML.replace('{serviceItemName}', serviceItemName);

        }
    </script>
    <script>
        $('form')
            .each(function() {
                $(this).data('serialized', $(this).serialize())
            })
            .on('change input', function() {
                $(this)
                    .find('input:submit, button:submit')
                    .prop('disabled', $(this).serialize() == $(this).data('serialized'));
            })
            .find('input:submit, button:submit')
            .prop('disabled', false);
    </script>
</body>
<!--end::Body-->

</html>
