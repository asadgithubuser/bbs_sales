@extends('backend.layout.master', ['allcourseCountStatus' => $allcourseCountStatus])

	@section('content')
	
		<!--begin::Content-->
		<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
			<!--begin::Subheader-->
			<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
				<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
					<!--begin::Info-->
					<div class="d-flex align-items-center flex-wrap mr-2">
						<!--begin::Page Title-->
						<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">হ্যালো, {{ Auth::user()->first_name }} {{ Auth::user()->middle_name }} {{ Auth::user()->last_name }}</h5>
						
						<!--end::Page Title-->
					</div>
					<!--end::Info-->
					<!--begin::Toolbar-->
					{{-- <div class="d-flex align-items-center">
						<!--begin::Actions-->
						<a href="#" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">Today</a>
						<a href="#" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">Month</a>
						<a href="#" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">Year</a>
						<!--end::Actions-->
						<!--begin::Daterange-->
						<a href="#" class="btn btn-sm btn-light font-weight-bold mr-2" id="kt_dashboard_daterangepicker" data-toggle="tooltip" title="Select dashboard daterange" data-placement="left">
							<span class="text-muted font-size-base font-weight-bold mr-2" id="kt_dashboard_daterangepicker_title">Today</span>
							<span class="text-primary font-size-base font-weight-bolder" id="kt_dashboard_daterangepicker_date">Aug 16</span>
						</a>
						<!--end::Daterange-->
						<!--begin::Dropdowns-->
						<div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
							<a href="#" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="svg-icon svg-icon-success svg-icon-lg">
									<!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24" />
											<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
											<path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>
							</a>
							<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right py-3">
								<!--begin::Navigation-->
								<ul class="navi navi-hover py-5">
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-icon">
												<i class="flaticon2-drop"></i>
											</span>
											<span class="navi-text">New Group</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-icon">
												<i class="flaticon2-list-3"></i>
											</span>
											<span class="navi-text">Contacts</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-icon">
												<i class="flaticon2-rocket-1"></i>
											</span>
											<span class="navi-text">Groups</span>
											<span class="navi-link-badge">
												<span class="label label-light-primary label-inline font-weight-bold">new</span>
											</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-icon">
												<i class="flaticon2-bell-2"></i>
											</span>
											<span class="navi-text">Calls</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-icon">
												<i class="flaticon2-gear"></i>
											</span>
											<span class="navi-text">Settings</span>
										</a>
									</li>
									<li class="navi-separator my-3"></li>
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-icon">
												<i class="flaticon2-magnifier-tool"></i>
											</span>
											<span class="navi-text">Help</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-icon">
												<i class="flaticon2-bell-2"></i>
											</span>
											<span class="navi-text">Privacy</span>
											<span class="navi-link-badge">
												<span class="label label-light-danger label-rounded font-weight-bold">5</span>
											</span>
										</a>
									</li>
								</ul>
								<!--end::Navigation-->
							</div>
						</div>
						<!--end::Dropdowns-->
					</div> --}}
					<!--end::Toolbar-->
				</div>
			</div>
			<!--end::Subheader-->
			<!--begin::Entry-->
			<div class="d-flex flex-column-fluid">
				<!--begin::Container-->
				<div class="container-fluid">
					<!--begin::Dashboard-->

					<!--begin::Row-->
					<div class="row">
						{{-- <div class="col-lg-12 col-xxl-12">
							<div class="card card-custom gutter-b">
								<div class="card-body rounded p-0 bg-light">
									<div class="d-flex align-items-center ">
										<img src="{{asset('assets/media/logos/BBS.jpg')}}" alt="Bangladesh Bureau of Statistics" style="max-height: 200px">
										<h2 class="font-weight-bolder text-dark mb-0 ml-10 d-inline-block"><p class="display2 display3-lg">Welcome to BBS Dashboard</p></h2>
									</div>
								</div>
							</div>
						</div> --}}
						
						@can('total_application_count')
						<div class="col-lg-3 col-xxl-3">
							<!--begin::Stats Widget 11-->
							<div class="card card-custom gutter-b dash-count-card w3-blue">
								<!--begin::Body-->
								<div class="card-body p-0 ">
									<a href="{{ route('admin.application.index') }}" class="dash-click-card"> 
										<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
											<i class="icon-xl fas fa-layer-group fa-4x mr-2 w3-text-white"></i>
											<div class="d-flex flex-column text-right">
												<span class=" font-weight-bolder font-size-h2">{{ $applications }}</span>
												<span class="font-weight-bolder font-size-h6 mt-2 ">Total Applications</span>
											</div>
										</div>
									</a>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 11-->
						</div>
						@endcan

						@can('total_submitted_application_count')
						<div class="col-lg-3 col-xxl-3"> 
							<!--begin::Stats Widget 11-->
							
							<div class="card card-custom gutter-b dash-count-card w3-teal">
								<!--begin::Body-->
								<div class="card-body p-0 ">
									<a href="{{ route('admin.application.pending') }}" class="dash-click-card"> 
										<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
											<i class="icon-xl fas fa-layer-group fa-4x mr-2 w3-text-white"></i>
											<div class="d-flex flex-column text-right">
												<span class="font-weight-bolder font-size-h2 w3-text-white">{{ $submittedApplications }}</span>
												
												<span class="font-weight-bolder font-size-h6 mt-1">Total Pending Applications</span>
											</div>
										</div>
									</a>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 11-->
						</div>
						@endcan

						@can('total_received_application_count')
						<div class="col-lg-3 col-xxl-3">
							<!--begin::Stats Widget 11-->
							<div class="card card-custom gutter-b dash-count-card w3-deep-purple">
								<!--begin::Body-->
								<div class="card-body p-0 ">
									<a href="{{ route('admin.application.processing') }}" class="dash-click-card"> 
										<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
											<i class="icon-xl fas fa-layer-group fa-4x mr-2 w3-text-white"></i>
											<div class="d-flex flex-column text-right">
												<span class="font-weight-bolder font-size-h2 w3-text-white">{{ $receivedApplications }}</span>
												<span class="font-weight-bolder font-size-h6 mt-1">Total Received Applications</span>
											</div>
										</div>
									</a>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 11-->
						</div>
						@endcan

						@can('total_processed_application_count')
						<div class="col-lg-3 col-xxl-3">
							<!--begin::Stats Widget 12-->
								<!--begin::Body-->
								
								<div class="card card-custom gutter-b dash-count-card w3-orange">
									<!--begin::Body-->
									<div class="card-body p-0 ">
										<a href="{{ route('admin.application.processing') }}" class="dash-click-card"> 
											<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
												<i class="icon-xl fas fa-layer-group fa-4x mr-2 w3-text-white"></i>
												<div class="d-flex flex-column text-right">
													<span class="font-weight-bolder font-size-h2 w3-text-white">{{ $processedApplications }}</span>
													
													<span class="font-weight-bolder font-size-h6 w3-text-white mt-1">Total Processed Applications</span>
												</div>
											</div>
										</a>
									</div>
									<!--end::Body-->
								</div>
								<!--end::Body-->
							<!--end::Stats Widget 12-->
						</div>
						@endcan

						@can('total_approved_application_count')
						<div class="col-lg-3 col-xxl-3">
							<!--begin::Stats Widget 11-->
							
							<div class="card card-custom gutter-b dash-count-card w3-green">
								<!--begin::Body-->
								<div class="card-body p-0 ">
									<a href="{{ route('admin.application.approved') }}" class="dash-click-card"> 
										<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
											<i class="icon-xl fas fa-layer-group fa-4x mr-2 w3-text-white"></i>
											<div class="d-flex flex-column text-right">
												<span class="font-weight-bolder font-size-h2 w3-text-white">{{ $approvedApplications }}</span>
												
												<span class="font-weight-bolder font-size-h6 ">Total Approved Applications</span>
											</div>
										</div>
									</a>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 11-->
						</div>
						@endcan

						@can('total_rejected_application_count')
						<div class="col-lg-3 col-xxl-3">
							<!--begin::Stats Widget 11-->
							<div class="card card-custom gutter-b dash-count-card w3-red">
								<!--begin::Body-->
								<div class="card-body p-0 ">
									<a href="{{ route('admin.application.canceled') }}" class="dash-click-card"> 
										<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
											<i class="icon-xl fas fa-layer-group fa-4x mr-2 w3-text-white"></i>
											<div class="d-flex flex-column text-right">
												<span class=" font-weight-bolder font-size-h2">{{ $rejectedApplications }}</span>
												<span class=" font-weight-bolder font-size-h6 mt-2">Total Rejected Applications</span>
											</div>
										</div>
									</a>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 11-->
						</div>
						@endcan

						@can('total_role_count')
						<div class="col-lg-3 col-xxl-3">
							<!--begin::Stats Widget 12-->
							
							<!--end::Stats Widget 12-->
							<div class="card card-custom gutter-b dash-count-card w3-cyan">
								<!--begin::Body-->
								<div class="card-body p-0 ">
									<a href="{{ route('admin.role.index') }}" class="dash-click-card"> 
										<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
											<i class="icon-xl fas fa-user-cog fa-4x mr-2 w3-text-white"></i>
											<div class="d-flex flex-column text-right">
												<span class="font-weight-bolder font-size-h2 w3-text-white">{{ $roles }}</span>
												<span class="font-weight-bolder font-size-h6 w3-text-white mt-2">Total Roles</span>
											</div>
										</div>
									</a>
								</div>
								<!--end::Body-->
							</div>
						</div>
						@endcan
						

						@can('total_subscriber_count')
						<div class="col-lg-3 col-xxl-3">
							<!--begin::Stats Widget 12-->
							
							<div class="card card-custom gutter-b dash-count-card w3-purple">
								<!--begin::Body-->
								<div class="card-body p-0 ">
									<a href="{{ route('admin.user.subscribers') }}" class="dash-click-card"> 
										<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
											<i class="icon-xl fas fa-user-tag fa-4x mr-2 w3-text-white"></i>
											<div class="d-flex flex-column text-right">

												<span class="font-weight-bolder font-size-h2">{{ $subscribers }}</span>
												<span class="font-weight-bolder font-size-h6 mt-2">Total Subscribers</span>
											</div>
										</div>
									</a>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 12-->
						</div>
						@endcan
						

						@can('total_registered_user_count')
						<div class="col-lg-3 col-xxl-3">
							<!--begin::Stats Widget 12-->
							
							<div class="card card-custom gutter-b dash-count-card w3-brown">
								<!--begin::Body-->
								<div class="card-body p-0 ">
									<a href="{{ route('admin.user.publicUserList') }}" class="dash-click-card"> 
										<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
											<i class="icon-xl fas fa-user-check fa-4x mr-2 w3-text-white"></i>
											<div class="d-flex flex-column text-right">
												<span class="font-weight-bolder font-size-h2">{{ $registeredUsers }}</span>
												<span class="font-weight-bolder font-size-h6 mt-2">Total Registered Users</span>
											</div>
										</div>
									</a>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 12-->
						</div>
						@endcan
						

						@can('total_system_user_count')
						<div class="col-lg-3 col-xxl-3">
							<!--begin::Stats Widget 12-->
							

							<div class="card card-custom gutter-b dash-count-card w3-light-green">
								<!--begin::Body-->
								<div class="card-body p-0 ">
									<a href="{{ route('admin.user.systemUserList') }}" class="dash-click-card"> 
										<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
											<i class="icon-xl fas fa-user-tie fa-4x mr-2 w3-text-white"></i>
											<div class="d-flex flex-column text-right">


												<span class="font-weight-bolder font-size-h2 w3-text-white">{{ $systemUsers }}</span>
												<span class="font-weight-bolder font-size-h6 w3-text-white mt-2">Total System Users</span>
											</div>
										</div>
									</a>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 12-->

						</div>
						@endcan
						

						@can('total_service_count')
						<div class="col-lg-3 col-xxl-3">
							<!--begin::Stats Widget 12-->
							<div class="card card-custom gutter-b dash-count-card w3-blue-gray">
								<!--begin::Body-->
								<div class="card-body p-0 ">
									<a href="{{ route('admin.service.index') }}" class="dash-click-card"> 
										<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
											<i class="icon-xl fas fa-list fa-4x mr-2 w3-text-white"></i>
											<div class="d-flex flex-column text-right">
												<span class="font-weight-bolder font-size-h2">{{ $services }}</span>
												<span class="font-weight-bolder font-size-h6 mt-2">Total Services</span>

												
											</div>
										</div>
									</a>
								</div>
								<!--end::Body-->
							</div>

							<!--end::Stats Widget 12-->
						</div>
						@endcan
						

						@can('total_office_count')
						<div class="col-lg-3 col-xxl-3">
							<!--begin::Stats Widget 12-->
							

							<div class="card card-custom gutter-b dash-count-card w3-pink">
								<!--begin::Body-->
								<div class="card-body p-0 ">
									<a href="{{ route('admin.office.index') }}" class="dash-click-card"> 
										<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
											<i class="icon-xl fas fa-home fa-4x mr-2 w3-text-white"></i>
											<div class="d-flex flex-column text-right">
												<span class="font-weight-bolder font-size-h2">{{ $offices }}</span>
												<span class="font-weight-bolder font-size-h6 mt-2 w3-text-white">Total Offices</span>		
											</div>
										</div>
									</a>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 12-->
						</div>
						@endcan
						

						@can('user_application_count')
						<!--begin::Stats Widget 11-->
							
						<div class="col-lg-3 col-xxl-3">
							<!--begin::Stats Widget 11-->
							<div class="card card-custom gutter-b dash-count-card w3-blue">
								<!--begin::Body-->
								<div class="card-body p-0 ">
									<a href="{{ route('admin.application.index') }}" class="dash-click-card"> 
										<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
											<i class="icon-xl fas fa-layer-group fa-4x mr-2 w3-text-white"></i>
											<div class="d-flex flex-column text-right">
												<span class=" font-weight-bolder font-size-h2">{{ $userApplications }}</span>
												<span class="font-weight-bolder font-size-h6 mt-2 ">Total Applications</span>
											</div>
										</div>
									</a>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 11-->
						</div>
						@endcan
						

						@can('user_submitted_application_count')
						<div class="col-lg-3 col-xxl-3"> 
							<!--begin::Stats Widget 11-->
							
							<div class="card card-custom gutter-b dash-count-card w3-teal">
								<!--begin::Body-->
								<div class="card-body p-0 ">
									<a href="{{ route('admin.application.pending') }}" class="dash-click-card"> 
										<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
											<i class="icon-xl fas fa-layer-group fa-4x mr-2 w3-text-white"></i>
											<div class="d-flex flex-column text-right">
												<span class="font-weight-bolder font-size-h2 w3-text-white">{{ $userSubmittedApplications }}</span>
												
												<span class="font-weight-bolder font-size-h6 mt-1">Total Pending Applications</span>
											</div>
										</div>
									</a>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 11-->
						</div>
						@endcan
						

						@can('user_received_application_count')
						<div class="col-lg-3 col-xxl-3">
							<!--begin::Stats Widget 11-->
							<div class="card card-custom gutter-b dash-count-card w3-deep-purple">
								<!--begin::Body-->
								<div class="card-body p-0 ">
									<a href="{{ route('admin.application.processing') }}" class="dash-click-card"> 
										<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
											<i class="icon-xl fas fa-layer-group fa-4x mr-2 w3-text-white"></i>
											<div class="d-flex flex-column text-right">
												<span class="font-weight-bolder font-size-h2 w3-text-white">{{ $userReceivedApplications }}</span>
												<span class="font-weight-bolder font-size-h6 mt-1">Total Received Applications</span>
											</div>
										</div>
									</a>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 11-->
						</div>
						@endcan
						

						@can('user_processed_application_count')
						<div class="col-lg-3 col-xxl-3">
							<!--begin::Stats Widget 12-->
								<!--begin::Body-->
								
								<div class="card card-custom gutter-b dash-count-card w3-orange">
									<!--begin::Body-->
									<div class="card-body p-0 ">
										<a href="{{ route('admin.application.processing') }}" class="dash-click-card"> 
											<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
												<i class="icon-xl fas fa-layer-group fa-4x mr-2 w3-text-white"></i>
												<div class="d-flex flex-column text-right">
													<span class="font-weight-bolder font-size-h2 w3-text-white">{{ $userProcessedApplications }}</span>
													
													<span class="font-weight-bolder font-size-h6 w3-text-white mt-1">Total Processed Applications</span>
												</div>
											</div>
										</a>
									</div>
									<!--end::Body-->
								</div>
								<!--end::Body-->
							<!--end::Stats Widget 12-->
						</div>
						@endcan
						

						@can('user_approved_application_count')
						<div class="col-lg-3 col-xxl-3">
							<!--begin::Stats Widget 11-->
							
							<div class="card card-custom gutter-b dash-count-card w3-green">
								<!--begin::Body-->
								<div class="card-body p-0 ">
									<a href="{{ route('admin.application.approved') }}" class="dash-click-card"> 
										<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
											<i class="icon-xl fas fa-layer-group fa-4x mr-2 w3-text-white"></i>
											<div class="d-flex flex-column text-right">
												<span class="font-weight-bolder font-size-h2 w3-text-white">{{ $userApprovedApplications }}</span>
												
												<span class="font-weight-bolder font-size-h6 ">Total Approved Applications</span>
											</div>
										</div>
									</a>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 11-->
						</div>
						@endcan
						

						@can('user_received_application_count')
						<div class="col-lg-3 col-xxl-3">
							<!--begin::Stats Widget 11-->
							<div class="card card-custom gutter-b dash-count-card w3-red">
								<!--begin::Body-->
								<div class="card-body p-0 ">
									<a href="{{ route('admin.application.canceled') }}" class="dash-click-card"> 
										<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
											<i class="icon-xl fas fa-layer-group fa-4x mr-2 w3-text-white"></i>
											<div class="d-flex flex-column text-right">
												<span class=" font-weight-bolder font-size-h2">{{ $userRejectedApplications }}</span>
												<span class=" font-weight-bolder font-size-h6 mt-2">Total Rejected Applications</span>
											</div>
										</div>
									</a>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 11-->
						</div>
						@endcan
						

						@can('receiver_application_count')
						<div class="col-lg-3 col-xxl-3">
							<!--begin::Stats Widget 11-->
							
							<div class="card card-custom gutter-b dash-count-card w3-deep-orange">
								<!--begin::Body-->
								<div class="card-body p-0 ">
									<a href="{{ route('admin.application.index') }}" class="dash-click-card"> 
										<div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
											<i class="icon-xl fas fa-layer-group fa-4x mr-2 w3-text-white"></i>
											<div class="d-flex flex-column text-right">
												<span class="font-weight-bolder font-size-h2 w3-text-white">{{ $receiverRoleApplications }}</span>
												
												<span class="font-weight-bolder font-size-h6 ">Total Received Applications</span>
											</div>
										</div>
									</a>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 11-->
						</div>
						@endcan

						@can('application_bar_chart')
							<div class="col-lg-6">
								<!--begin::Card-->
								<div class="card card-custom gutter-b">
									<div class="card-header">
										<div class="card-title">
											<h3 class="card-label">Number of Applications</h3>
										</div>
									</div>
									<div class="card-body">
										<!--begin::Chart-->
										<div id="chart_3"></div>
										<!--end::Chart-->
									</div>
								</div>
								<!--end::Card-->
							</div>
						@endcan

						@can('system_user_login_line_chart')
						<div class="col-lg-6">
							<!--begin::Card-->
							<div class="card card-custom gutter-b">
								<!--begin::Header-->
								<div class="card-header h-auto">
									<!--begin::Title-->
									<div class="card-title py-5">
										<h3 class="card-label">Total Office Users Login</h3>
									</div>
									<!--end::Title-->
								</div>
								<!--end::Header-->
								<div class="card-body">
									<!--begin::Chart-->
									<div id="chart_1"></div>
									<!--end::Chart-->
								</div>
							</div>
							<!--end::Card-->
						</div>
						@endcan

						@can('citizen_served_pie_chart')
							<div class="col-lg-6">
								<!--begin::Card-->
								<div class="card card-custom gutter-b">
									<div class="card-header">
										<div class="card-title">
											<h3 class="card-label">Number of Citizen Served</h3>
										</div>
									</div>
									<div class="card-body">
										<!--begin::Chart-->
										<div id="chart_12" class="d-flex justify-content-center" data-service1="{{ $citizenServedData }}" data-service2="{{ $citizenServedPublication }}" data-service3="{{ $citizenServedCertificate }}"></div>
										<!--end::Chart-->
									</div>
								</div>
								<!--end::Card-->
							</div>
						@endcan

						@can('total_online_money_earn')
						<div class="col-lg-6">
							<!--begin::Mixed Widget 14-->
							<div class="card card-custom card-stretch gutter-b">
								<!--begin::Header-->
								<div class="card-header">
									<div class="card-title">
										<h3 class="card-label">Total Online Sale Money</h3>
									</div>
								</div>
								<!--end::Header-->
								<!--begin::Body-->
								<div class="card-body d-flex flex-column">
									<div class="flex-grow-1">
										<div id="kt_mixed_widget_141_chart" style="height: 215px" data-value="{{ $totalOnlineMoney ? number_format((float)$totalOnlineMoney, 2, '.', '') : '0'}}"></div>
									</div>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Mixed Widget 14-->
						</div>
						@endcan

						@can('total_publication_money_earn')
						<div class="col-lg-6">
							<!--begin::Mixed Widget 14-->
							<div class="card card-custom card-stretch gutter-b">
								<!--begin::Header-->
								<div class="card-header">
									<div class="card-title">
										<h3 class="card-label">Total Publication Sales</h3>
									</div>

									{{-- <div class="apexcharts-toolbar" style="top: 15px; right: 40px;">
										<div class="apexcharts-menu-icon publication_btn" title="Menu">
											<button type="button" class="btn"><i class="fa fa-bars text-dark"></i></button>
										</div>

										<div class="apexcharts-menu publication_btn_menu">
											<div class="apexcharts-menu-item today" title="">Today</div>
											<div class="apexcharts-menu-item weekly" title="">Weekly</div>
											<div class="apexcharts-menu-item monthly" title="">Monthly</div>
											<div class="apexcharts-menu-item yearly" title="">Yearly</div>
										</div>
									</div> --}}
								</div>
								<!--end::Header-->
								<!--begin::Body-->
								<div class="card-body d-flex flex-column">
									<div class="flex-grow-1">
										<div id="kt_mixed_widget_142_chart" style="height: 215px" data-value="{{ $totalSaleMoney ? number_format((float)$totalSaleMoney, 2, '.', '') : '0'}}"></div>
									</div>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Mixed Widget 14-->
						</div>
						@endcan

						@can('total_money_earn')
							<div class="col-lg-6">
								<!--begin::Mixed Widget 14-->
								<div class="card card-custom card-stretch gutter-b">
									<!--begin::Header-->
									<div class="card-header">
										<div class="card-title">
											<h3 class="card-label">Total Amount of Money</h3>
										</div>
									</div>
									<!--end::Header-->
									<!--begin::Body-->
									<div class="card-body d-flex flex-column">
										<div class="flex-grow-1">
											<div id="kt_mixed_widget_14_chart" style="height: 215px" data-value="{{ $finalTotalMoney ? number_format((float)$finalTotalMoney, 2, '.', '') : '0'}}"></div>
										</div>
									</div>
									<!--end::Body-->
								</div>
								<!--end::Mixed Widget 14-->
							</div>
						@endcan

					</div>
					<!--end::row-->
					<!--end::Dashboard-->
				</div>
				<!--end::Container-->
			</div>
			<!--end::Entry-->
		</div>
		<!--end::Content-->
	@endsection

	@push('stackScript')
		<script> 
			$('.publication_btn').on('click', function() {
				$(".publication_btn_menu").toggleClass("apexcharts-menu-open");
			});
		</script>
	@endpush
					
