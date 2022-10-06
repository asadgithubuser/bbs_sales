<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <!--begin::Brand-->
    <div class="brand flex-column-auto" id="kt_brand">
        <!--begin::Logo-->
        <a href="{{ route('index') }}" class="brand-logo">
            <img alt="Logo" class="mt-2" src="{{ asset('assets/media/logos/logo2.png') }}"
                style="max-height: 50px;" />
            <h6 class="mt-1 ml-5" style="color: #f1f1f1; font-size:15px; padding-top: 12px;"> Bangladesh Bureau of Statistics</h6>
        </a>
        <!--end::Logo-->
        <!--begin::Toggle-->
        {{-- <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
            <span class="svg-icon svg-icon svg-icon-xl">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path
                            d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                            fill="#000000" fill-rule="nonzero"
                            transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                        <path
                            d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.3"
                            transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
        </button> --}}
        <!--end::Toolbar-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside Menu-->
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper" style="background: #EBF9CF !important;">
        <!--begin::Menu Container-->
        <div id="kt_aside_menu" class="aside-menu mb-4" data-menu-vertical="1" data-menu-scroll="1"
            data-menu-dropdown-timeout="500">
            <!--begin::Menu Nav-->
            <ul class="menu-nav">

                @if (Auth::user()->role_id == 10)
                    <li class="menu-item {{ session('lsbm') == 'dashboard' ? ' menu-item-active ' : '' }} "
                        aria-haspopup="true">
                        <a href="{{ route('admin.index') }}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path
                                            d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                            fill="#000000" fill-rule="nonzero" />
                                        <path
                                            d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">Create Micro Data Application</span>
                        </a>
                    </li>

                    <li class="menu-item {{ session('lsbm') == 'publicationAppAdmin' ? ' menu-item-active ' : '' }} "
                        aria-haspopup="true">
                        <a href="{{ route('admin.application.publicationAppAdmin') }}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path
                                            d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                            fill="#000000" fill-rule="nonzero" />
                                        <path
                                            d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">Create Publication Application</span>
                        </a>
                    </li>
                @else
                    <li class="menu-item {{ session('lsbm') == 'dashboard' ? ' menu-item-active ' : '' }} "
                        aria-haspopup="true">
                        <a href="{{ route('admin.index') }}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path
                                            d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                            fill="#000000" fill-rule="nonzero" />
                                        <path
                                            d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">ড্যাশবোর্ড</span>
                        </a>
                    </li>
                @endif


                @can('manage_applications')
                    <!-- manage application -->
                    {{-- Hide manage application menu for storekeeper --}}
                    @if (Auth::user()->role_id == 11)
                    <li class="menu-item menu-item-submenu {{ session('lsbm') == 'applications' ? ' menu-item-open ' : '' }}"
                            aria-haspopup="true" data-menu-toggle="hover">
                            <a href="javascript:;" class="menu-link menu-toggle">
                                <span class="svg-icon menu-icon">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                fill="#000000" fill-rule="nonzero"
                                                transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                            <path
                                                d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-text">আবেদন পরিচালনা করুন</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu">
                                <i class="menu-arrow"></i>
                                <ul class="menu-subnav">
                                    <li class="menu-item  menu-item-parent" aria-haspopup="true">
                                        <span class="menu-link">
                                            <span class="menu-text">আবেদন পরিচালনা করুন</span>
                                        </span>
                                    </li>

                                    {{-- @can('create_application')
                                        <li class="menu-item {{ session('lsbsm') == 'addApplication' ? ' menu-item-active ' : '' }}" aria-haspopup="true">
                                            <a href="{{route('admin.application.create')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Create Application</span>
                                            </a>
                                        </li>
                                    @endcan --}}

                                    @can('submitted_applications')
                                        <li class="menu-item {{ session('lsbsm') == 'allApplications' ? ' menu-item-active ' : '' }}"
                                            aria-haspopup="true">
                                            <a href="{{ route('admin.application.index') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">সকল আবেদনসমূহ</span>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('pending_applications')
                                        <li class="menu-item {{ session('lsbsm') == 'pendingApplications' ? ' menu-item-active ' : '' }}"
                                            aria-haspopup="true">
                                            <a href="{{ route('admin.application.pending') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">বিচারাধীন আবেদনসমূহ</span>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('processing_applications')
                                        <li class="menu-item {{ session('lsbsm') == 'processingApplications' ? ' menu-item-active ' : '' }}"
                                            aria-haspopup="true">
                                            <a href="{{ route('admin.application.processing') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">প্রক্রিয়াধীন আবেদনসমূহ</span>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('approved_applications')
                                        <li class="menu-item {{ session('lsbsm') == 'approvedApplications' ? ' menu-item-active ' : '' }}"
                                            aria-haspopup="true">
                                            <a href="{{ route('admin.application.approved') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">অনুমোদিত  আবেদনসমূহ</span>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('canceled_applications')
                                        <li class="menu-item {{ session('lsbsm') == 'canceledApplications' ? ' menu-item-active ' : '' }}"
                                            aria-haspopup="true">
                                            <a href="{{ route('admin.application.canceled') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">বাতিলকৃত আবেদনসমূহ</span>
                                            </a>
                                        </li>
                                    @endcan

                                </ul>
                            </div>
                        </li>
                    @else
                        <li class="menu-item menu-item-submenu {{ session('lsbm') == 'applications' ? ' menu-item-open ' : '' }}"
                            aria-haspopup="true" data-menu-toggle="hover">
                            <a href="javascript:;" class="menu-link menu-toggle">
                                <span class="svg-icon menu-icon">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                fill="#000000" fill-rule="nonzero"
                                                transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                            <path
                                                d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-text">আবেদন পরিচালনা করুন</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu">
                                <i class="menu-arrow"></i>
                                <ul class="menu-subnav">
                                    <li class="menu-item  menu-item-parent" aria-haspopup="true">
                                        <span class="menu-link">
                                            <span class="menu-text">আবেদন পরিচালনা করুন</span>
                                        </span>
                                    </li>

                                    {{-- @can('create_application')
                                        <li class="menu-item {{ session('lsbsm') == 'addApplication' ? ' menu-item-active ' : '' }}" aria-haspopup="true">
                                            <a href="{{route('admin.application.create')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Create Application</span>
                                            </a>
                                        </li>
                                    @endcan --}}

                                    @can('submitted_applications')
                                        <li class="menu-item {{ session('lsbsm') == 'allApplications' ? ' menu-item-active ' : '' }}"
                                            aria-haspopup="true">
                                            <a href="{{ route('admin.application.index') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">সকল আবেদনসমূহ</span>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('pending_applications')
                                        <li class="menu-item {{ session('lsbsm') == 'pendingApplications' ? ' menu-item-active ' : '' }}"
                                            aria-haspopup="true">
                                            <a href="{{ route('admin.application.pending') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">বিচারাধীন আবেদনসমূহ</span>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('processing_applications')
                                        <li class="menu-item {{ session('lsbsm') == 'processingApplications' ? ' menu-item-active ' : '' }}"
                                            aria-haspopup="true">
                                            <a href="{{ route('admin.application.processing') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">প্রক্রিয়াধীন আবেদনসমূহ</span>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('approved_applications')
                                        <li class="menu-item {{ session('lsbsm') == 'approvedApplications' ? ' menu-item-active ' : '' }}"
                                            aria-haspopup="true">
                                            <a href="{{ route('admin.application.approved') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">অনুমোদিত  আবেদনসমূহ</span>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('canceled_applications')
                                        <li class="menu-item {{ session('lsbsm') == 'canceledApplications' ? ' menu-item-active ' : '' }}"
                                            aria-haspopup="true">
                                            <a href="{{ route('admin.application.canceled') }}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">বাতিলকৃত আবেদনসমূহ</span>
                                            </a>
                                        </li>
                                    @endcan

                                </ul>
                            </div>
                        </li>
                    @endif
                @endcan

                @can('manage_services')
                    <!-- manage service -->
                    <li class="menu-item menu-item-submenu {{ session('lsbm') == 'services' ? ' menu-item-open ' : '' }}"
                        aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                        <path
                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">পরিষেবাসমূহ পরিচালনা করুন</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item  menu-item-parent" aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">পরিষেবাসমূহ পরিচালনা করুন</span>
                                    </span>
                                </li>

                                @can('add_service')
                                    <li class="menu-item {{ session('lsbsm') == 'addService' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.service.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">পরিষেবা যোগ করুন</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('all_services')
                                    <li class="menu-item {{ session('lsbsm') == 'allServices' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.service.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">সকল পরিষেবাসমূহ</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('add_service_item')
                                    <li class="menu-item {{ session('lsbsm') == 'addServiceItem' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.serviceItem.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">পরিষেবা দফা যোগ করুন</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('all_service_items')
                                    <li class="menu-item {{ session('lsbsm') == 'allServiceItems' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.serviceItem.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">সকল পরিষেবা দফাসমূহ</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('add_service_additional_item')
                                    <li class="menu-item {{ session('lsbsm') == 'addServiceItemAdditional' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.serviceItemAdditional.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">পরিষেবা অতিরিক্ত দফা যোগ করুন</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('all_service_additional_items')
                                    <li class="menu-item {{ session('lsbsm') == 'allServiceItemAdditionals' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.serviceItemAdditional.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">সকল পরিষেবা অতিরিক্ত দফাসমূহ</span>
                                        </a>
                                    </li>
                                @endcan

                                {{-- @can('add_service_item_price')
                                    <li class="menu-item {{ session('lsbsm') == 'addServiceItemPrice' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.serviceItemPrice.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Add Price</span>
                                        </a>
                                    </li>
                                @endcan --}}

                                @can('service_item_prices')
                                    <li class="menu-item {{ session('lsbsm') == 'serviceItemPrices' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.serviceItemPrice.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">ক্ষুদ্র পরিষেবার দাম</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('add_sub_datatype')
                                    <li class="menu-item {{ session('lsbsm') == 'addSubDatatype' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.datatype.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">পরিষেবার উপশ্রেণী যোগ করুন</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('all_sub_datatypes')
                                    <li class="menu-item {{ session('lsbsm') == 'allSubDatatypes' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.datatype.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">সকল পরিষেবার উপশ্রেণীসমূহ</span>
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </div>
                    </li>
                @endcan

                @can('manage_offices')
                    <!-- manage office -->
                    <li class="menu-item menu-item-submenu {{ session('lsbm') == 'offices' ? ' menu-item-open ' : '' }}"
                        aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                        <path
                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">অফিস পরিচালনা</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item  menu-item-parent" aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">অফিস পরিচালনা</span>
                                    </span>
                                </li>

                                @can('add_office')
                                    <li class="menu-item {{ session('lsbsm') == 'addOffice' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.office.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">অফিস যুক্ত করুন</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('all_offices')
                                    <li class="menu-item {{ session('lsbsm') == 'allOffices' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.office.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">সকল অফিস দেখুন</span>
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </div>
                    </li>
                @endcan

                @can('manage_notice')
                    <!-- manage notice -->
                    <li class="menu-item menu-item-submenu {{ session('lsbm') == 'notices' ? ' menu-item-open ' : '' }}"
                        aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                        <path
                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">বিজ্ঞপ্তি পরিচালনা করুন</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent " aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">বিজ্ঞপ্তি পরিচালনা করুন</span>
                                    </span>
                                </li>

                                @can('all_notices')
                                    <li class="menu-item {{ session('lsbsm') == 'allNotices' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.notice.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">সকল বিজ্ঞপ্তি </span>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcan

                @can('manage_designation')
                    <!-- manage designation -->
                    <li class="menu-item menu-item-submenu {{ session('lsbm') == 'designation' ? ' menu-item-open ' : '' }}"
                        aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                        <path
                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">পদবী পরিচালনা করুন</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent " aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">পদবী পরিচালনা করুন</span>
                                    </span>
                                </li>

                                @can('all_designations')
                                    <li class="menu-item {{ session('lsbsm') == 'allDesignation' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.designation.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">সকল পদবী</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('add_designation')
                                    <li class="menu-item {{ session('lsbsm') == 'addDesignation' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.designation.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">পদবী যুক্ত করুন</span>
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </div>
                    </li>
                @endcan

                @can('manage_department')
                    <!-- manage department -->
                    <li class="menu-item menu-item-submenu {{ session('lsbm') == 'department' ? ' menu-item-open ' : '' }}"
                        aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                        <path
                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">বিভাগ পরিচালনা করুন</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>

                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent" aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">বিভাগ পরিচালনা করুন</span>
                                    </span>
                                </li>

                                @can('all_department')
                                    <li class="menu-item {{ session('lsbsm') == 'all_departments' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.department.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">সকল বিভাগ</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('add_department')
                                    <li class="menu-item {{ session('lsbsm') == 'add_department' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.department.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">বিভাগ যুক্ত করুন</span>
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </div>
                    </li>
                @endcan

                @can('manage_faqs')
                    <!-- manage faq -->
                    <li class="menu-item menu-item-submenu {{ session('lsbm') == 'faq' ? ' menu-item-open ' : '' }}"
                        aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                        <path
                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">Manage FAQ</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent " aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">Manage FAQ</span>
                                    </span>
                                </li>

                                @can('all_faq')
                                    <li class="menu-item {{ session('lsbsm') == 'allFAQ' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.faq.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">All FAQs</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('add_faq')
                                    <li class="menu-item {{ session('lsbsm') == 'addFAQ' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.faq.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Add FAQ</span>
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </div>
                    </li>
                @endcan

                @can('manage_storage')
                    <!-- manage storage -->
                    <li class="menu-item menu-item-submenu {{ session('lsbm') == 'storage' ? ' menu-item-open ' : '' }}"
                        aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                        <path
                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">Manage Store</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent " aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">Manage Store</span>
                                    </span>
                                </li>

                                <li class="menu-item {{ session('lsbsm') == 'posSystem' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.pos.index') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Point Of Sale (POS)</span>
                                    </a>
                                </li>

                                <li class="menu-item {{ session('lsbsm') == 'allSales' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.pos.allSales') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">All Sales</span>
                                    </a>
                                </li>


                                <li class="menu-item {{ session('lsbsm') == 'storeAllItem' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.storage.index') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">All Item</span>
                                    </a>
                                </li>

                                <li class="menu-item {{ session('lsbsm') == 'storeAddItem' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.storage.create') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Add Item</span>
                                    </a>
                                </li>
                                @can('manage_sales_center')
                                    <li class="menu-item {{ session('lsbsm') == 'salesCenter' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.salesCenter.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Sales Center</span>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcan

                @can('manage_requisition')
                    <!-- manage requisition -->
                    <li class="menu-item menu-item-submenu {{ session('lsbm') == 'requisition' ? ' menu-item-open ' : '' }}"
                        aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">

                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                        <path
                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">Manage Requisitions</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent " aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">Manage Requisitions</span>
                                    </span>
                                </li>

                                @can('create_requisition')
                                    <li class="menu-item {{ session('lsbsm') == 'createRequisition' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.requisition.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Create Requisition</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('all_requisitions')
                                    <li class="menu-item {{ session('lsbsm') == 'allRequisitions' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.requisition.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">All Requisitions</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('pending_requisitions')
                                    <li class="menu-item {{ session('lsbsm') == 'pendingRequisitions' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.requisition.pending') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Pending Requisitions</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('approved_requisitions')
                                    <li class="menu-item {{ session('lsbsm') == 'approvedRequisitions' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.requisition.approved') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Approved Requisitions</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('delivered_requisitions')
                                    <li class="menu-item {{ session('lsbsm') == 'deliveredRequisitions' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.requisition.delivered') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Delivered Requisitions</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('declined_requisitions')
                                    <li class="menu-item {{ session('lsbsm') == 'declinedRequisitions' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.requisition.declined') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Declined Requisitions</span>
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </div>
                    </li>
                @endcan

                @can('manage_fiscal_year')
                    <!-- manage faq -->
                    <li class="menu-item menu-item-submenu {{ session('lsbm') == 'fiscal' ? ' menu-item-open ' : '' }}"
                        aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                        <path
                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">Manage Fiscal Year</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent " aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">Manage Fiscal Year</span>
                                    </span>
                                </li>

                                @can('all_fiscal_year')
                                    <li class="menu-item {{ session('lsbsm') == 'all_fiscal' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.fiscal.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">All Fiscal Years</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('add_fiscal_year')
                                    <li class="menu-item {{ session('lsbsm') == 'add_fiscal' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.fiscal.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Add Fiscal Year</span>
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </div>
                    </li>
                @endcan

                @can('manage_course')
                    <li class="menu-item menu-item-submenu {{ session('lsbm') == 'course' ? ' menu-item-open ' : '' }}"
                        aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                        <path
                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">Manage Course</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent " aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">Manage Course</span>
                                    </span>
                                </li>

                            @if(Auth::user()->role_id == 4 || Auth::user()->role_id == 1 || Auth::user()->role_id == 2)   
                                <li class="menu-item {{ session('lsbsm') == 'createCourse' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.course.create') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Add Course</span>
                                    </a>
                                </li>


                                <li class="menu-item {{ session('lsbsm') == 'allCourse' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.course.index', ['type' => 'allCourse']) }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">All Courses</span>
                                    </a>
                                </li>

                                <li class="menu-item {{ session('lsbsm') == 'sent_course_list' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.calender.calender', ['type' => 'sent_course_list']) }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Sent For Approval Courses</span>
                                    </a>
                                </li>
                                <li class="menu-item {{ session('lsbsm') == 'allModifyCourse' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.course.allModify', ['type' => 'request_for_changes']) }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">All Modify Courses</span>
                                    </a>
                                </li>
                              
                                <li class="menu-item {{ session('lsbsm') == 'approvedCalendar' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.calender.calender', ['type' => 'approved']) }}"
                                        class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Approved Course List</span>
                                    </a>
                                </li>

                                <li class="menu-item {{ session('lsbsm') == 'courseCalendar' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.calender.courseCalendar') }}"
                                        class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Course Calender List</span>
                                    </a>
                                </li>
                                
                                <li class="menu-item {{ session('lsbsm') == 'main_training_courses' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.calender.calender', ['type' => 'main_training_courses']) }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Main Training Course List</span>
                                    </a>
                                </li>
                            @endif
                            @if(Auth::user()->role_id == 3 || Auth::user()->role_id == 1 || Auth::user()->role_id == 2)

                                <li class="menu-item {{ session('lsbsm') == 'training_course_list_cd' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.calender.calender', ['type' => 'training_course_list_cd']) }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Pending Training Course List</span>
                                    </a>
                                </li>
                            @endif        
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('manage_course')
                    <li class="menu-item menu-item-submenu {{ session('lsbm') == 'maximum_course_hourse' ? ' menu-item-open ' : '' }}"
                        aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                        <path
                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">All Training Settings</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent " aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">All Training Settings</span>
                                    </span>
                                </li>

                             

                                <li class="menu-item {{ session('lsbsm') == 'maximum_course_hourse' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.calender.calender', ['type' => 'training_course_list_cd']) }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Maximum Course Hours</span>
                                    </a>
                                </li>
                                   
                            </ul>
                        </div>
                    </li>
                @endcan

                @can('course_management')
                    <li class="menu-item menu-item-submenu {{ session('lsbm') == 'course_management' ? ' menu-item-open ' : '' }}"
                        aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                        <path
                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">Course Management</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent " aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">Course Management</span>
                                    </span>
                                </li>
                                <li class="menu-item {{ session('lsbsm') == 'courseList' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.trainee.courseList', ['type' => 'course_list']) }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Course List</span>
                                    </a>
                                </li>


                                

                            </ul>
                        </div>
                    </li>
                @endcan

                @can('manage_calender')
                    <li class="menu-item menu-item-submenu {{ session('lsbm') == 'calendar' ? ' menu-item-open ' : '' }}"
                        aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                        <path
                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">Manage Calender</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent " aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">Manage Calender</span>
                                    </span>
                                </li>
                                @if(Auth::user()->role_id == 3 || Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                <li class="menu-item {{ session('lsbsm') == 'pendingCalendar' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.calender.calender', ['type' => 'pending']) }}"
                                        class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Pending Calender</span>
                                    </a>
                                </li>
                                @endif

                                @if(Auth::user()->role_id == 4 || Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                <li class="menu-item {{ session('lsbsm') == 'approved_trainee_list' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.calender.calender', ['type' => 'approved_trainee_list']) }}"
                                        class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Approved Trainee List</span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endcan

                @can('manage_training')
                    <li class="menu-item menu-item-submenu {{ session('lsbm') == 'manage_training' ? ' menu-item-open ' : '' }}"
                        aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                        <path
                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">Manage Training</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">

                            @if(Auth::user()->role_id == 6 || Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                <li id="course_list_li" class="menu-item {{ session('lsbsm') == 'training_course_list' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.course.allTrainingList', ['type' => 'training_course_list']) }}"
                                        class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">All Course List</span>
                                    </a>
                                    <span class="course_list_count_staus">@if(isset($allcourseCountStatus)) {{ $allcourseCountStatus}} @endif</span>
                                </li>

                                <li class="menu-item {{ session('lsbsm') == 'traineeList' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.course.allTraineeList', ['type' => 'traineeList']) }}"
                                        class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Trainee List </span>
                                    </a>
                                </li>
<!--                                 <li class="menu-item {{ session('lsbsm') == 'claim_modify_trainee_list' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.course.claimModifyTraineeList', ['type' => 'claim_modify_trainee_list']) }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Claim Modify Trainee List</span>
                                    </a>
                                </li> -->
                                @endif
                                @if(Auth::user()->role_id == 5 || Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                <li class="menu-item {{ session('lsbsm') == 'pending_trainee_list' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.calender.calender', ['type' => 'pending_trainee_list']) }}"
                                        class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Pending Trainee List</span>
                                    </a>
                                </li>
                                @endif

                            </ul>
                        </div>
                    </li>
                @endcan


                @can('manage_certificate')
                    <li class="menu-item menu-item-submenu {{ session('lsbm') == 'certificate' ? ' menu-item-open ' : '' }}"
                        aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                        <path
                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">Manage Certificate</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">

                                <li class="menu-item {{ session('lsbsm') == 'create_certificate' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.certificate.create_certificate') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Create Certificate Template </span>
                                    </a>
                                </li>

                                <li class="menu-item {{ session('lsbsm') == 'view_certificate' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.certificate.view_certificate') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">View Certificate Template</span>
                                    </a>
                                </li>
                          
                                </ul>
                            </div>
                        </li>
                    @endcan




                @can('manage_trainer')
                    <!-- manage Trainer -->
                    <li class="menu-item menu-item-submenu {{ session('lsbm') == 'manageTrainer' ? ' menu-item-open ' : '' }}"
                        aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                        <path
                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">Manage Trainer</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent " aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">Manage Trainer</span>
                                    </span>
                                </li>

                                @can('add_trainer')
                                    <li class="menu-item {{ session('lsbsm') == 'addTrainer' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.trainer.add') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Add Trainer</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('all_trainer')
                                    <li class="menu-item {{ session('lsbsm') == 'allTrainer' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.trainer.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">All Trainers</span>
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </div>
                    </li>
                @endcan

                @can('report')
                    <!-- manage report -->
                    <li class="menu-item menu-item-submenu {{ session('lsbm') == 'report' ? ' menu-item-open ' : '' }}"
                        aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">

                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                        <path
                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">Manage Report</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent " aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">Report</span>
                                    </span>
                                </li>

                                <li class="menu-item {{ session('lsbsm') == 'onlineSales' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.report.onlineSales') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Online Sales</span>
                                    </a>
                                </li>

                                <li class="menu-item {{ session('lsbsm') == 'digitalData' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.report.digitalData') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">All Downloads</span>
                                    </a>
                                </li>

                                <li class="menu-item {{ session('lsbsm') == 'publicationSales' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.report.publicationSales') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Publication Sales</span>
                                    </a>
                                </li>

                                <li class="menu-item {{ session('lsbsm') == 'SoldCopies' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.report.SoldCopies') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Publication Stock</span>
                                    </a>
                                </li>

                                <li class="menu-item {{ session('lsbsm') == 'complementary' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.report.complementary') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Complementary</span>
                                    </a>
                                </li>

                                <li class="menu-item {{ session('lsbsm') == 'ComplementaryCopies' ? ' menu-item-active ' : '' }}"
                                    aria-haspopup="true">
                                    <a href="{{ route('admin.report.ComplementaryCopies') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Complementary Stock</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endcan

                {{-- manage location --}}
                @can('manage_location')
                    <li class="menu-item menu-item-submenu {{ session('lsbm') == 'location' ? ' menu-item-open ' : '' }}"
                        aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                        <path
                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">Manage Location</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent" aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">Manage Location</span>
                                    </span>
                                </li>

                                {{-- manage upazila --}}
                                @can('manage_upazila')
                                    <li class="menu-item menu-item-submenu {{ session('lsbsm') == 'upazila' ? ' menu-item-open ' : '' }}"
                                        aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="javascript:;" class="menu-link menu-toggle">
                                            <span class="svg-icon menu-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path
                                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                                        <path
                                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                            fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <span class="menu-text">Manage Upazila</span>
                                            <i class="menu-arrow"></i>
                                        </a>
                                        <div class="menu-submenu">
                                            <i class="menu-arrow"></i>
                                            <ul class="menu-subnav">
                                                <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                    <span class="menu-link">
                                                        <span class="menu-text">Manage Upazila</span>
                                                    </span>
                                                </li>

                                                @can('add_upazila')
                                                    <li class="menu-item {{ session('lsbssm') == 'addUpazila' ? ' menu-item-active ' : '' }}"
                                                        aria-haspopup="true">
                                                        <a href="{{ route('admin.upazila.create') }}" class="menu-link">
                                                            <i class="menu-bullet menu-bullet-dot">
                                                                <span></span>
                                                            </i>
                                                            <span class="menu-text">Add Upazila</span>
                                                        </a>
                                                    </li>
                                                @endcan

                                                @can('all_upazilas')
                                                    <li class="menu-item {{ session('lsbssm') == 'allUpazilas' ? ' menu-item-active ' : '' }}"
                                                        aria-haspopup="true">
                                                        <a href="{{ route('admin.upazila.index') }}" class="menu-link">
                                                            <i class="menu-bullet menu-bullet-dot">
                                                                <span></span>
                                                            </i>
                                                            <span class="menu-text">All Upazilas</span>
                                                        </a>
                                                    </li>
                                                @endcan

                                            </ul>
                                        </div>
                                    </li>
                                @endcan

                                {{-- manage union --}}
                                @can('manage_union')
                                    <li class="menu-item menu-item-submenu {{ session('lsbsm') == 'union' ? ' menu-item-open ' : '' }}"
                                        aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="javascript:;" class="menu-link menu-toggle">
                                            <span class="svg-icon menu-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path
                                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                                        <path
                                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                            fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <span class="menu-text">Manage Union</span>
                                            <i class="menu-arrow"></i>
                                        </a>
                                        <div class="menu-submenu">
                                            <i class="menu-arrow"></i>
                                            <ul class="menu-subnav">
                                                <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                    <span class="menu-link">
                                                        <span class="menu-text">Manage Union</span>
                                                    </span>
                                                </li>

                                                @can('add_union')
                                                    <li class="menu-item {{ session('lsbssm') == 'addunion' ? ' menu-item-active ' : '' }}"
                                                        aria-haspopup="true">
                                                        <a href="{{ route('admin.union.create') }}" class="menu-link">
                                                            <i class="menu-bullet menu-bullet-dot">
                                                                <span></span>
                                                            </i>
                                                            <span class="menu-text">Add Union</span>
                                                        </a>
                                                    </li>
                                                @endcan

                                                @can('all_unions')
                                                    <li class="menu-item {{ session('lsbssm') == 'allunions' ? ' menu-item-active ' : '' }}"
                                                        aria-haspopup="true">
                                                        <a href="{{ route('admin.union.index') }}" class="menu-link">
                                                            <i class="menu-bullet menu-bullet-dot">
                                                                <span></span>
                                                            </i>
                                                            <span class="menu-text">All Unions</span>
                                                        </a>
                                                    </li>
                                                @endcan

                                            </ul>
                                        </div>
                                    </li>
                                @endcan

                                {{-- manage mouza --}}
                                @can('manage_mouza')
                                    <li class="menu-item menu-item-submenu {{ session('lsbsm') == 'mouza' ? ' menu-item-open ' : '' }}"
                                        aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="javascript:;" class="menu-link menu-toggle">
                                            <span class="svg-icon menu-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path
                                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                                        <path
                                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                            fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <span class="menu-text">Manage Mouza</span>
                                            <i class="menu-arrow"></i>
                                        </a>
                                        <div class="menu-submenu">
                                            <i class="menu-arrow"></i>
                                            <ul class="menu-subnav">
                                                <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                    <span class="menu-link">
                                                        <span class="menu-text">Manage Mouza</span>
                                                    </span>
                                                </li>

                                                @can('add_mouza')
                                                    <li class="menu-item {{ session('lsbssm') == 'addMouza' ? ' menu-item-active ' : '' }}"
                                                        aria-haspopup="true">
                                                        <a href="{{ route('admin.mouza.create') }}" class="menu-link">
                                                            <i class="menu-bullet menu-bullet-dot">
                                                                <span></span>
                                                            </i>
                                                            <span class="menu-text">Add Mouza</span>
                                                        </a>
                                                    </li>
                                                @endcan

                                                @can('all_mouzas')
                                                    <li class="menu-item {{ session('lsbssm') == 'allMouzas' ? ' menu-item-active ' : '' }}"
                                                        aria-haspopup="true">
                                                        <a href="{{ route('admin.mouza.index') }}" class="menu-link">
                                                            <i class="menu-bullet menu-bullet-dot">
                                                                <span></span>
                                                            </i>
                                                            <span class="menu-text">All Mouzas</span>
                                                        </a>
                                                    </li>
                                                @endcan

                                            </ul>
                                        </div>
                                    </li>
                                @endcan

                                {{-- manage cluster --}}
                                @can('manage_cluster')
                                    <li class="menu-item menu-item-submenu {{ session('lsbsm') == 'manage_cluster' ? ' menu-item-open ' : '' }}"
                                        aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="javascript:;" class="menu-link menu-toggle">
                                            <span class="svg-icon menu-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path
                                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                                        <path
                                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                            fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <span class="menu-text">Manage Cluster</span>
                                            <i class="menu-arrow"></i>
                                        </a>
                                        <div class="menu-submenu">
                                            <i class="menu-arrow"></i>
                                            <ul class="menu-subnav">
                                                <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                    <span class="menu-link">
                                                        <span class="menu-text">Manage Cluster</span>
                                                    </span>
                                                </li>

                                                @can('add_cluster')
                                                    <li class="menu-item {{ session('lsbssm') == 'addCluster' ? ' menu-item-active ' : '' }}"
                                                        aria-haspopup="true">
                                                        <a href="{{ route('admin.cluster.create') }}" class="menu-link">
                                                            <i class="menu-bullet menu-bullet-dot">
                                                                <span></span>
                                                            </i>
                                                            <span class="menu-text">Add Cluster</span>
                                                        </a>
                                                    </li>
                                                @endcan

                                                @can('all_clusters')
                                                    <li class="menu-item {{ session('lsbssm') == 'allClusters' ? ' menu-item-active ' : '' }}"
                                                        aria-haspopup="true">
                                                        <a href="{{ route('admin.cluster.index') }}" class="menu-link">
                                                            <i class="menu-bullet menu-bullet-dot">
                                                                <span></span>
                                                            </i>
                                                            <span class="menu-text">All Clusters</span>
                                                        </a>
                                                    </li>
                                                @endcan

                                            </ul>
                                        </div>
                                    </li>
                                @endcan

                                {{-- manage village --}}
                                @can('manage_village')
                                    <li class="menu-item menu-item-submenu {{ session('lsbsm') == 'manage_village' ? ' menu-item-open ' : '' }}"
                                        aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="javascript:;" class="menu-link menu-toggle">
                                            <span class="svg-icon menu-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path
                                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                                        <path
                                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                            fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <span class="menu-text">Manage Village</span>
                                            <i class="menu-arrow"></i>
                                        </a>
                                        <div class="menu-submenu">
                                            <i class="menu-arrow"></i>
                                            <ul class="menu-subnav">
                                                <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                    <span class="menu-link">
                                                        <span class="menu-text">Manage Village</span>
                                                    </span>
                                                </li>

                                                @can('add_village')
                                                    <li class="menu-item {{ session('lsbssm') == 'add_village' ? ' menu-item-active ' : '' }}"
                                                        aria-haspopup="true">
                                                        <a href="{{ route('admin.village.create') }}" class="menu-link">
                                                            <i class="menu-bullet menu-bullet-dot">
                                                                <span></span>
                                                            </i>
                                                            <span class="menu-text">Add Village</span>
                                                        </a>
                                                    </li>
                                                @endcan

                                                @can('all_villages')
                                                    <li class="menu-item {{ session('lsbssm') == 'all_villages' ? ' menu-item-active ' : '' }}"
                                                        aria-haspopup="true">
                                                        <a href="{{ route('admin.village.index') }}" class="menu-link">
                                                            <i class="menu-bullet menu-bullet-dot">
                                                                <span></span>
                                                            </i>
                                                            <span class="menu-text">All Villages</span>
                                                        </a>
                                                    </li>
                                                @endcan

                                            </ul>
                                        </div>
                                    </li>
                                @endcan

                                {{-- manage ea --}}
                                @can('manage_ea')
                                    <li class="menu-item menu-item-submenu {{ session('lsbsm') == 'manage_ea' ? ' menu-item-open ' : '' }}"
                                        aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="javascript:;" class="menu-link menu-toggle">
                                            <span class="svg-icon menu-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path
                                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                                        <path
                                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                            fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <span class="menu-text">Manage EA</span>
                                            <i class="menu-arrow"></i>
                                        </a>
                                        <div class="menu-submenu">
                                            <i class="menu-arrow"></i>
                                            <ul class="menu-subnav">
                                                <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                    <span class="menu-link">
                                                        <span class="menu-text">Manage EA</span>
                                                    </span>
                                                </li>

                                                @can('add_ea')
                                                    <li class="menu-item {{ session('lsbssm') == 'add_ea' ? ' menu-item-active ' : '' }}"
                                                        aria-haspopup="true">
                                                        <a href="{{ route('admin.ea.create') }}" class="menu-link">
                                                            <i class="menu-bullet menu-bullet-dot">
                                                                <span></span>
                                                            </i>
                                                            <span class="menu-text">Add EA</span>
                                                        </a>
                                                    </li>
                                                @endcan

                                                @can('all_eas')
                                                    <li class="menu-item {{ session('lsbssm') == 'all_eas' ? ' menu-item-active ' : '' }}"
                                                        aria-haspopup="true">
                                                        <a href="{{ route('admin.ea.index') }}" class="menu-link">
                                                            <i class="menu-bullet menu-bullet-dot">
                                                                <span></span>
                                                            </i>
                                                            <span class="menu-text">All EAs</span>
                                                        </a>
                                                    </li>
                                                @endcan

                                            </ul>
                                        </div>
                                    </li>
                                @endcan

                                {{-- manage household --}}
                                @can('manage_household')
                                    <li class="menu-item menu-item-submenu {{ session('lsbsm') == 'manage_household' ? ' menu-item-open ' : '' }}"
                                        aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="javascript:;" class="menu-link menu-toggle">
                                            <span class="svg-icon menu-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path
                                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                                        <path
                                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                            fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <span class="menu-text">Manage House Hold</span>
                                            <i class="menu-arrow"></i>
                                        </a>
                                        <div class="menu-submenu">
                                            <i class="menu-arrow"></i>
                                            <ul class="menu-subnav">
                                                <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                    <span class="menu-link">
                                                        <span class="menu-text">Manage household</span>
                                                    </span>
                                                </li>

                                                @can('add_household')
                                                    <li class="menu-item {{ session('lsbssm') == 'add_household' ? ' menu-item-active ' : '' }}"
                                                        aria-haspopup="true">
                                                        <a href="{{ route('admin.household.create') }}" class="menu-link">
                                                            <i class="menu-bullet menu-bullet-dot">
                                                                <span></span>
                                                            </i>
                                                            <span class="menu-text">Add House Hold</span>
                                                        </a>
                                                    </li>
                                                @endcan

                                                @can('all_households')
                                                    <li class="menu-item {{ session('lsbssm') == 'all_households' ? ' menu-item-active ' : '' }}"
                                                        aria-haspopup="true">
                                                        <a href="{{ route('admin.household.index') }}" class="menu-link">
                                                            <i class="menu-bullet menu-bullet-dot">
                                                                <span></span>
                                                            </i>
                                                            <span class="menu-text">All House Holds</span>
                                                        </a>
                                                    </li>
                                                @endcan

                                            </ul>
                                        </div>
                                    </li>
                                @endcan

                                {{-- manage population --}}
                                @can('manage_population')
                                    <li class="menu-item menu-item-submenu {{ session('lsbsm') == 'manage_population' ? ' menu-item-open ' : '' }}"
                                        aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="javascript:;" class="menu-link menu-toggle">
                                            <span class="svg-icon menu-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path
                                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                                        <path
                                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                            fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <span class="menu-text">Manage Population Info</span>
                                            <i class="menu-arrow"></i>
                                        </a>
                                        <div class="menu-submenu">
                                            <i class="menu-arrow"></i>
                                            <ul class="menu-subnav">
                                                <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                    <span class="menu-link">
                                                        <span class="menu-text">Manage Population Info</span>
                                                    </span>
                                                </li>

                                                @can('add_population')
                                                    <li class="menu-item {{ session('lsbssm') == 'add_population' ? ' menu-item-active ' : '' }}"
                                                        aria-haspopup="true">
                                                        <a href="{{ route('admin.population.create') }}" class="menu-link">
                                                            <i class="menu-bullet menu-bullet-dot">
                                                                <span></span>
                                                            </i>
                                                            <span class="menu-text">Add Population Info</span>
                                                        </a>
                                                    </li>
                                                @endcan

                                                @can('all_populations')
                                                    <li class="menu-item {{ session('lsbssm') == 'all_populations' ? ' menu-item-active ' : '' }}"
                                                        aria-haspopup="true">
                                                        <a href="{{ route('admin.population.index') }}" class="menu-link">
                                                            <i class="menu-bullet menu-bullet-dot">
                                                                <span></span>
                                                            </i>
                                                            <span class="menu-text">All Population Infos</span>
                                                        </a>
                                                    </li>
                                                @endcan

                                            </ul>
                                        </div>
                                    </li>
                                @endcan

                            </ul>
                        </div>
                    </li>
                @endcan

                {{-- agriculture --}}
                @can('manage_agriculture')

                    <li class="menu-item menu-item-submenu {{ session('lsbm') == 'agriculture' ? ' menu-item-open ' : '' }}"
                        aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                        <path
                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">Manage Agriculture</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent" aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">Manage Agriculture</span>
                                    </span>
                                </li>



                                <li class="menu-item menu-item-submenu {{ session('lsbsm') == 'category' ? ' menu-item-open ' : '' }}"
                                    aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="javascript:;" class="menu-link menu-toggle">
                                        <span class="svg-icon menu-icon">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                                    <path
                                                        d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                        fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>

                                        </span>
                                        <span class="menu-text">Crop Type</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="menu-submenu">
                                        <i class="menu-arrow"></i>
                                        <ul class="menu-subnav">
                                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                <span class="menu-link">
                                                    <span class="menu-text">Crop Type</span>
                                                </span>
                                            </li>

                                            @can('add_agriculture')
                                                <li class="menu-item {{ session('lsbssm') == 'addCategory' ? ' menu-item-active ' : '' }}"
                                                    aria-haspopup="true">
                                                    <a href="{{ route('admin.cropCategory.create') }}"
                                                        class="menu-link">
                                                        <i class="menu-bullet menu-bullet-dot">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">Add Crop Type</span>
                                                    </a>
                                                </li>
                                            @endcan

                                            @can('all_agriculture')
                                                <li class="menu-item {{ session('lsbssm') == 'allCategories' ? ' menu-item-active ' : '' }}"
                                                    aria-haspopup="true">
                                                    <a href="{{ route('admin.cropCategory.index') }}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-dot">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">All Crop Type</span>
                                                    </a>
                                                </li>
                                            @endcan

                                        </ul>
                                    </div>
                                </li>

                                <li class="menu-item menu-item-submenu {{ session('lsbsm') == 'crop' ? ' menu-item-open ' : '' }}"
                                    aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="javascript:;" class="menu-link menu-toggle">
                                        <span class="svg-icon menu-icon">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                                    <path
                                                        d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                        fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-text">Manage Crop</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="menu-submenu">
                                        <i class="menu-arrow"></i>
                                        <ul class="menu-subnav">
                                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                <span class="menu-link">
                                                    <span class="menu-text">Crop</span>
                                                </span>
                                            </li>

                                            @can('add_crop')
                                                <li class="menu-item {{ session('lsbssm') == 'addCrop' ? ' menu-item-active ' : '' }}"
                                                    aria-haspopup="true">
                                                    <a href="{{ route('admin.crop.create') }}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-dot">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">Add Crop </span>
                                                    </a>
                                                </li>
                                            @endcan

                                            @can('all_crop')
                                                <li class="menu-item {{ session('lsbssm') == 'allCrop' ? ' menu-item-active ' : '' }}"
                                                    aria-haspopup="true">
                                                    <a href="{{ route('admin.crop.index') }}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-dot">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">All Crop</span>
                                                    </a>
                                                </li>
                                            @endcan

                                        </ul>
                                    </div>
                                </li>

                                <li class="menu-item menu-item-submenu {{ session('lsbsm') == 'survey' ? ' menu-item-open ' : '' }}"
                                    aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="javascript:;" class="menu-link menu-toggle">
                                        <span class="svg-icon menu-icon">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                                    <path
                                                        d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                        fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-text">Manage Survey Form</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="menu-submenu">
                                        <i class="menu-arrow"></i>
                                        <ul class="menu-subnav">
                                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                <span class="menu-link">
                                                    <span class="menu-text">Manage Survey Form</span>
                                                </span>
                                            </li>

                                            @can('add_survey')
                                                <li class="menu-item {{ session('lsbssm') == 'addsurvey' ? ' menu-item-active ' : '' }}"
                                                    aria-haspopup="true">
                                                    <a href="{{ route('admin.survey.create') }}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-dot">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">Add Survey Form </span>
                                                    </a>
                                                </li>
                                            @endcan

                                            @can('all_survey')
                                                <li class="menu-item {{ session('lsbssm') == 'allsurvey' ? ' menu-item-active ' : '' }}"
                                                    aria-haspopup="true">
                                                    <a href="{{ route('admin.survey.index') }}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-dot">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">All Survey Form</span>
                                                    </a>
                                                </li>
                                            @endcan

                                        </ul>
                                    </div>
                                </li>

                                <li class="menu-item menu-item-submenu {{ session('lsbsm') == 'surveyNotification' ? ' menu-item-open ' : '' }}"
                                    aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="javascript:;" class="menu-link menu-toggle">
                                        <span class="svg-icon menu-icon">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                                    <path
                                                        d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                        fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-text">Survey Notification</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="menu-submenu">
                                        <i class="menu-arrow"></i>
                                        <ul class="menu-subnav">
                                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                <span class="menu-link">
                                                    <span class="menu-text">Survey Notification</span>
                                                </span>
                                            </li>

                                            @can('add_surveyNotification')
                                                <li class="menu-item {{ session('lsbssm') == 'addsurveyNotification' ? ' menu-item-active ' : '' }}"
                                                    aria-haspopup="true">
                                                    <a href="{{ route('admin.surveyNotification.create') }}"
                                                        class="menu-link">
                                                        <i class="menu-bullet menu-bullet-dot">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">Add Survey Notification </span>
                                                    </a>
                                                </li>
                                            @endcan

                                            @can('all_surveyNotification')
                                                <li class="menu-item {{ session('lsbssm') == 'allsurveyNotification' ? ' menu-item-active ' : '' }}"
                                                    aria-haspopup="true">
                                                    <a href="{{ route('admin.surveyNotification.index') }}"
                                                        class="menu-link">
                                                        <i class="menu-bullet menu-bullet-dot">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">All Survey Notification</span>
                                                    </a>
                                                </li>
                                            @endcan

                                        </ul>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endcan

                {{-- /.end agriculture --}}

                
                {{-- End Survey forms menu --}}

                {{-- Start Farmers Data menu --}}
                @if (Auth::user()->designation_id == 9)
                
                @else
                {{-- Start Survey forms menu --}}
                @can('survey_forms')

                    <li class="menu-item menu-item-submenu {{ session('lsbm') == 'surveyForms' ? ' menu-item-open ' : '' }}"
                        aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                        <path
                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">জরিপ ফরম সমূহ</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent " aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">জরিপ ফরম সমূহ</span>
                                    </span>
                                </li>

                                @can('farmers_form')
                                    <li class="menu-item {{ session('lsbsm') == 'farmersForm' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.farmersForm.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">কৃষক তালিকা ফরম (সংকলন ফরম -১)</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('cluster_form')
                                    <li class="menu-item {{ session('lsbsm') == 'clusterForm' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.clusterForm.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">দাগগুচ্ছ জরিপ প্রতিবেদন (তফসিল-১)</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('crop_cutting_production')
                                    <li class="menu-item {{ session('lsbsm') == 'cropCuttingProduction' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.cropCuttingProductionForm.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">ফসল কর্তন ও উৎপাদন জরিপ তফসিল (তফসিল-২)</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('potato_crop_cutting_production')
                                    <li class="menu-item {{ session('lsbsm') == 'potatoCropCutting' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.potatoCropCutting.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">আলু ফসল কর্তন ও উৎপাদন জরিপ তফসিল (তফসিল-৫)</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('temporaryCrop')
                                    <li class="menu-item {{ session('lsbsm') == 'temporaryCrop' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.temporaryCropForm.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">অস্থায়ী ফসল উৎপাদন জরিপ তফসিল (তফসিল-৩)</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('perennialCropForm')
                                    <li class="menu-item {{ session('lsbsm') == 'perennialCropForm' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.perennialCropForm.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">স্থায়ী/বহুবর্ষজীবী ফসল উৎপাদন জরিপ তফসিল (তফসিল-৪)</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('surveyTofsilForm3Maize')
                                    <li class="menu-item {{ session('lsbsm') == 'surveyTofsilForm3Maize' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.surveyTofsilForm3Maize.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">ভুট্টা ফসল উৎপাদন জরিপ তফসিল (তফসিল-৬)</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('survey_tofsil_form7')
                                    <li class="menu-item {{ session('lsbsm') == 'surveyTofsilForm7' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.surveyTofsilForm7.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">প্রধান ফসলের মূল্য ও উৎপাদন খরচ জরিপ তফসিল (তফসিল-৭)</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('tofsil8')
                                    <li class="menu-item {{ session('lsbsm') == 'tofsil8' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.surveyTofsilForm8.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">মাসিক কৃষি  মজুরি  হার জরিপ তফসিল (তফসিল-৮)</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('survey_tofsil_form9')
                                    <li class="menu-item {{ session('lsbsm') == 'surveyTofsilForm9' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.surveyTofsilForm9.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">ভূমি ব্যাবহার ও সেচ পরিসংখ্যান জরিপ তফসিল (তফসিল-৯)</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('survey_tofsil_10')
                                    <li class="menu-item {{ session('lsbsm') == 'surveyTofsilForm10' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.surveyTofsilForm10.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">প্রধান ফসল পূর্বাভাস জরিপ তফসিল (তফসিল-১০)</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('survey_tofsil_form_11')
                                    <li class="menu-item {{ session('lsbsm') == 'surveyTofsil11' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.surveyTofsilForm11.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">অস্থায়ী ফসলের ক্ষয়ক্ষতির নিরূপণ তফসিল (তফসিল-১১)</span>
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </div>
                    </li>
                @endcan
                    @can('farmers_data')
                        <li class="menu-item menu-item-submenu {{ session('lsbm') == 'farmersData' ? ' menu-item-open ' : '' }}"
                            aria-haspopup="true" data-menu-toggle="hover">
                            <a href="javascript:;" class="menu-link menu-toggle">
                                <span class="svg-icon menu-icon">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                fill="#000000" fill-rule="nonzero"
                                                transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                            <path
                                                d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-text">জরিপ তথ্য</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu">
                                <i class="menu-arrow"></i>
                                <ul class="menu-subnav">

                                    <li class="menu-item menu-item-parent " aria-haspopup="true">
                                        <span class="menu-link">
                                            <span class="menu-text">জরিপ তথ্য</span>
                                        </span>
                                    </li>

                                    <li class="menu-item {{ session('lsbsm') == 'allFarmersData' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.farmersForm.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">সকল কৃষকের তথ্য তালিকা</span>
                                        </a>
                                    </li>

                                    <li class="menu-item {{ session('lsbsm') == 'clustersData' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.clusterForm.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">সকল দাগগুচ্ছের তথ্য তালিকা</span>
                                        </a>
                                    </li>

                                    <li class="menu-item {{ session('lsbsm') == 'cropCuttingProductionsData' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.cropCuttingProductionForm.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">সকল ফসল কাটা এবং উৎপাদনের তথ্য তালিকা</span>
                                        </a>
                                    </li>

                                    <li class="menu-item {{ session('lsbsm') == 'temporaryCropsData' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.temporaryCropForm.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">সকল অস্থায়ী ফসল উৎপাদনের তথ্য তালিকা</span>
                                        </a>
                                    </li>

                                    <li class="menu-item {{ session('lsbsm') == 'perennialCropsData' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.perennialCropForm.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">সকল স্থায়ী/বহুবর্ষজীবী ফসল উৎপাদনের তথ্য তালিকা</span>
                                        </a>
                                    </li>

                                    <li class="menu-item {{ session('lsbsm') == 'potatoCropCuttingData' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.potatoCropCutting.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">সকল আলু কাটা ও উৎপাদনের তথ্য তালিকা</span>
                                        </a>
                                    </li>

                                    <li class="menu-item {{ session('lsbsm') == 'surveyTofsilForm3MaizeData' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.surveyTofsilForm3Maize.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">সকল ভুট্টা উৎপাদনের তথ্য তালিকা</span>
                                        </a>
                                    </li>

                                    <li class="menu-item {{ session('lsbsm') == 'surveyTofsilForm7Data' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.surveyTofsilForm7.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">All Cost of Production and Producer's Price of Major Crop Data</span>
                                        </a>
                                    </li>

                                    <li class="menu-item {{ session('lsbsm') == 'tofsil8sData' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.surveyTofsilForm8.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">সকল মাসিক কৃষি মজুরি হারের তথ্য তালিকা</span>
                                        </a>
                                    </li>

                                    <li class="menu-item {{ session('lsbsm') == 'surveyTofsilForm9Data' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.surveyTofsilForm9.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">All Land Use and Irrigation Survey Data</span>
                                        </a>
                                    </li>

                                    <li class="menu-item {{ session('lsbsm') == 'surveyTofsilForm10Data' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.surveyTofsilForm10.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">প্রধান ফসল উৎপাদন পূর্বাভাস তথ্য তালিকা</span>
                                        </a>
                                    </li>

                                    <li class="menu-item {{ session('lsbsm') == 'surveyTofsil11Data' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.surveyTofsilForm11.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">অস্থায়ী ফসলের ক্ষয়ক্ষতির তথ্য তালিকা</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                    @endcan
                @endif

                {{-- End Farmers Data menu --}}

                @can('user_management')
                    <!-- user management -->
                    <li class="menu-item menu-item-submenu {{ session('lsbm') == 'roles' ? ' menu-item-open ' : '' }}"
                        aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                        <path
                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">ব্যাবহারকারী পরিচালন</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent " aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">ব্যাবহারকারী পরিচালন</span>
                                    </span>
                                </li>

                                @can('add_user')
                                    <li class="menu-item {{ session('lsbsm') == 'addUser' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.user.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">ব্যাবহারকারী যুক্ত করুন</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('all_users')
                                    <li class="menu-item {{ session('lsbsm') == 'allUsers' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.user.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">সকল ব্যবহারকারীর তালিকা</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('system_users')
                                    <li class="menu-item {{ session('lsbsm') == 'allSystemUsers' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.user.systemUserList') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">পদ্ধতি ব্যবহারকারীর তালিকা</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('public_users')
                                    <li class="menu-item {{ session('lsbsm') == 'allPublicUsers' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.user.publicUserList') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">সর্বসাধারণ ব্যবহারকারীর তালিকা</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('subscribers')
                                    <li class="menu-item {{ session('lsbsm') == 'subscribers' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.user.subscribers') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">সকল সদস্য</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('all_roles')
                                    <li class="menu-item {{ session('lsbsm') == 'allRoles' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.role.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">সকল ভূমিকা</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('all_permissions')
                                    <li class="menu-item {{ session('lsbsm') == 'permissions' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.permission.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">সকল অনুমতি</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('assign_permission')
                                    <li class="menu-item {{ session('lsbsm') == 'assignPerm' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.rolePermission.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">অনুমতি বরাদ্দ করুন</span>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcan

                @can('app_settings')
                    <!-- manage settings -->
                    <li class="menu-item menu-item-submenu {{ session('lsbm') == 'applicationSetting' ? ' menu-item-open ' : '' }}"
                        aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                        <path
                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">Application Settings</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent " aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">Application Settings</span>
                                    </span>
                                </li>

                                @can('all_application_purpose')
                                    <li class="menu-item {{ session('lsbsm') == 'allApplicationPurposes' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.purpose.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">All Application Purposes</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('add_application_purpose')
                                    <li class="menu-item {{ session('lsbsm') == 'addApplicationPurposes' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.purpose.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Add Application Purpose</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('all_application_forward_mapping')
                                    <li class="menu-item {{ session('lsbsm') == 'allApplicationForward' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.applicationForwarding.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">All Application Forward Mapping</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('add_application_forward_mapping')
                                    <li class="menu-item {{ session('lsbsm') == 'addApplicationForward' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.applicationForwarding.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Add Application Forward Mapping</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('all_receiving_mode')
                                    <li class="menu-item {{ session('lsbsm') == 'allReceivingModes' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.receivingMode.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">All Receiving Modes</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('add_receiving_mode')
                                    <li class="menu-item {{ session('lsbsm') == 'addReceivingMode' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.receivingMode.create') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Add Receiving Mode</span>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcan

                {{-- Agriculture Survey Notifications --}}




                @if (Auth::user()->designation_id == 10)
                @else
                    @can('agri_survey_notification')
                        <li class="menu-item menu-item-submenu {{ session('lsbm') == 'agriSurveyNoti' ? ' menu-item-open ' : '' }}"
                            aria-haspopup="true" data-menu-toggle="hover">
                            <a href="javascript:;" class="menu-link menu-toggle">
                                <span class="svg-icon menu-icon">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                fill="#000000" fill-rule="nonzero"
                                                transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                            <path
                                                d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-text">Agriculture Survey Notifications</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu">
                                <i class="menu-arrow"></i>
                                <ul class="menu-subnav">

                                    <li class="menu-item menu-item-parent " aria-haspopup="true">
                                        <span class="menu-link">
                                            <span class="menu-text">Agriculture Survey Notifications</span>
                                        </span>
                                    </li>

                                    <li class="menu-item {{ session('lsbsm') == 'allAgriSurveyNoti' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.agriSurveyNoti.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">All Notifications</span>
                                        </a>
                                    </li>

                                    <li class="menu-item {{ session('lsbsm') == 'allSurveyList' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.surveyList.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">All Assigned Field Officer</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                    @endcan
                    @can('survey_process_lists')
                        <li class="menu-item menu-item-submenu {{ session('lsbm') == 'surveyprocesslist' ? ' menu-item-open ' : '' }}"
                            aria-haspopup="true" data-menu-toggle="hover">
                            <a href="javascript:;" class="menu-link menu-toggle">
                                <span class="svg-icon menu-icon">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                fill="#000000" fill-rule="nonzero"
                                                transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                            <path
                                                d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-text">Manage Survey Processing</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu">
                                <i class="menu-arrow"></i>
                                <ul class="menu-subnav">

                                    <li class="menu-item menu-item-parent " aria-haspopup="true">
                                        <span class="menu-link">
                                            <span class="menu-text">Manage Survey Processing</span>
                                        </span>
                                    </li>

                                    {{-- <li class="menu-item {{ session('lsbsm') == 'allProcessingList' ? ' menu-item-active ' : '' }}" aria-haspopup="true">
                                        <a href="{{route('admin.processingList.index')}}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Processing List</span>
                                        </a>
                                    </li> --}}

                                    @foreach ($surveyLists as $list)
                                        <li class="menu-item {{ session('lsbsm') == 'allProcessingList' . $list->survey_form_id ? 'menu-item-active' : '' }}"
                                            aria-haspopup="true">
                                            @php
                                                $value = $list->survey_form_id;
                                                
                                            @endphp
                                            <a href="{{ route('admin.processingList.index', ['formId' => $value]) }}"
                                                class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text" style="font-size: 20px;">
                                                    @if ($value == 1)
                                                        সংকলন তালিকা
                                                    @elseif ($value == 2)
                                                        দাগগুচ্ছ তালিকা
                                                    @elseif ($value == 5)
                                                        ফসল কর্তন ও উৎপাদন তালিকা
                                                    @elseif ($value == 3)
                                                        অস্থায়ী শস্য তালিকা
                                                    @elseif ($value == 4)
                                                        বর্ষজীবী শস্য তালিকা
                                                    @elseif ($value == 7)
                                                        আলু কর্তন ও উৎপাদন তালিকা
                                                    @elseif ($value == 6)
                                                        ভুট্টা উৎপাদন তালিকা
                                                    @elseif ($value == 8)
                                                        মাসিক কৃষি মজুরী হার তালিকা
                                                    @elseif ($value == 10)
                                                        প্রধান ফসল পূর্বাভাস তালিকা
                                                    @elseif ($value == 11)
                                                        অস্থায়ী ফসলের ক্ষয়ক্ষতি নিরূপণ তালিকা
                                                    
                                                    @elseif ($value == 12)
                                                        প্রধান ফসলের মূল্য ও উৎপাদন খরচ জরিপ তফসিল
                                                    @elseif ($value == 13)
                                                        ভুমি ব্যাবহার ও সেচ পরিসংখ্যান জরিপ তফসিল
                                                    @endif
                                                </span>
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </li>
                    @endcan
                @endif

                @can('survey_report')
                <li class="menu-item menu-item-submenu {{ session('lsbm') == 'surveyReports' ? ' menu-item-open ' : '' }}"
                            aria-haspopup="true" data-menu-toggle="hover">
                            <a href="javascript:;" class="menu-link menu-toggle">
                                <span class="svg-icon menu-icon">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                fill="#000000" fill-rule="nonzero"
                                                transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                            <path
                                                d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-text">Survey Report</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu">
                                <i class="menu-arrow"></i>
                                <ul class="menu-subnav">

                                    <li class="menu-item menu-item-parent " aria-haspopup="true">
                                        <span class="menu-link">
                                            <span class="menu-text">Manage Survey Processing</span>
                                        </span>
                                    </li>
                                    
                                    <li class="menu-item {{ session('lsbsm') == 'surveyReportsShankalan3' ? 'menu-item-active' : '' }}"
                                        aria-haspopup="true">
                                        
                                        <a href="{{ route('admin.processingList.reportData') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">
                                                
                                                    সংকলন ফর্ম ৩ প্রতিবেদন 
                                                
                                            </span>
                                        </a>
                                    </li>
                                    
                                    <li class="menu-item {{ session('lsbsm') == 'surveyReportsShankalan4' ? 'menu-item-active' : '' }}"
                                        aria-haspopup="true">
                                        
                                        <a href="{{ route('admin.processingList.reportData4') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">
                                                
                                                    সংকলন ফর্ম ৪ প্রতিবেদন 
                                                
                                            </span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                @endcan



                @can('settings')
                    <!-- manage settings -->
                    <li class="menu-item menu-item-submenu {{ session('lsbm') == 'setting' ? ' menu-item-open ' : '' }}"
                        aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                        <path
                                            d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">Settings</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent " aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">Settings</span>
                                    </span>
                                </li>

                                @can('assessment_template')
                                    <li class="menu-item {{ session('lsbsm') == 'assessmentTemplate' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.setting.assessmentTemplate') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Assessment Template</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('all_template')
                                    <li class="menu-item {{ session('lsbsm') == 'templateSetting' ? ' menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.setting.templateSetting') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Template Settings</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('all_sms_template')
                                    <li class="menu-item {{ session('lsbsm') == 'smsTemplateSetting' ? 'menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.setting.smsTemplateSetting') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">SMS Template Settings</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('all_level')
                                    <li class="menu-item {{ session('lsbsm') == 'levelSetting' ? 'menu-item-active ' : '' }}"
                                        aria-haspopup="true">
                                        <a href="{{ route('admin.setting.levelSetting') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Level Setting</span>
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </div>
                    </li>
                @endcan

                {{-- logout --}}
                <li class="menu-item" aria-haspopup="true">
                    <a target="_blank" href="{{ route('logout') }}" class="menu-link" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                        fill="#000000" />
                                    <rect fill="#000000" opacity="0.3"
                                        transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                        x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">লগআউট</span>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
            <!--end::Menu Nav-->
        </div>
        <!--end::Menu Container-->
    </div>
    <!--end::Aside Menu-->
</div>
