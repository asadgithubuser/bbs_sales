@extends('backend.layout.master')

	@section('content')
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
							<h5 class="text-dark font-weight-bold my-1 mr-5">সকল আবেদন</h5>
							<!--end::Page Title-->
							<!--begin::Breadcrumb-->
							<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
								<li class="breadcrumb-item">
									<a href="{{route('admin.index')}}" class="text-muted">ড্যাশবোর্ড</a>
								</li>
								<li class="breadcrumb-item">
									<a href="{{route('admin.application.index')}}" class="text-muted">আবেদন পরিচালনা করুন</a>
								</li>
								<li class="breadcrumb-item active">
									<a class="text-muted">সকল আবেদন</a>
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
					<!--session msg-->
					@include('alerts.alerts')

					<!--begin::Card--> 
					<div class="row">
						<div class="col-lg-12">
							<!--begin::Card-->
							<div class="card card-custom example example-compact">
								<div class="card-header">
									<h3 class="card-title">সকল আবেদন</h3>
									<div class="d-flex align-items-center">
										<div class="row">
											<div class="col-md-12">
												<input type="text"data-url="{{ route('admin.searchAjax',['type'=> 'applications']) }}" class="form-control form-control-lg form-control-solid ajax-data-search" name="q" placeholder="অনুসন্ধান করুন">
	
											</div>
										</div>
									</div>
								</div>

								<div class="card-body">
									<div class="table-responsive ajax-data-container pt-3">
										<table class="table table-separate table-head-custom table-checkable table-striped">
                                            <thead>
                                                <tr>
                                                    <th>আবেদনের আইডি</th>
                                                    <th class="text-left">আবেদনকারীর নাম</th>
                                                    <th class="text-left">ব্যবহারের ধরন</th>
                                                    <th class="text-left">উদ্দেশ্য</th>
                                                    <th class="text-left">প্রেরক</th>
                                                    <th class="text-left">গ্রাহক</th>
                                                    <th class="text-left">আবেদনের তারিখ</th>
                                                    <th>বর্তমান অবস্থা</th>
                                                    <th>লেনদেনের অবস্থা</th>
                                                    <th>পেমেন্ট অনুমোদিত অবস্থা</th>
                                                    <th>অবস্থা</th>
                                                    <th>কার্যকলাপ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                @foreach ($applications as $application)

                                                    <tr>
                                                        <td>{{$application->application->application_id}}</td>

                                                        <td align="left">
                                                            {{ $application->application->user ? $application->application->user->first_name : '' }}
                                                            {{ $application->application->user ? $application->application->user->middle_name : '' }}
                                                            {{ $application->application->user ? $application->application->user->last_name : '' }}
                                                        </td>

                                                        @if ($application->application->usage_type == 1)
                                                            <td align="left">Organization</td>
                                                        @elseif ($application->application->usage_type == 2)
                                                            <td align="left">Researcher</td>
                                                        @else
                                                            <td align="left">Student</td>
                                                        @endif
                                                        
                                                        @if ($application->application->purpose_id == 100)
                                                            <td align="left">Others: {{$application->application->purpose_specify ? $application->application->purpose_specify : ''}}</td>    
                                                        @else
                                                            <td align="left">{{$application->application->applicationPurpose ? $application->application->applicationPurpose->name_en : ''}}</td>
                                                        @endif
                                                        
                                                        <td align="left">{{$application->application->senderRole ? $application->application->senderRole->name_en : ''}}</td>

                                                        <td align="left">{{$application->application->receiverRole ? $application->application->receiverRole->name_en : ''}}</td>

                                                        <td align="left">{{date('d-M-Y h:i:s A', $application->application->created_at->timestamp)}}</td>
                                                        
                                                        <td>
                                                            <span class="label label-lg font-weight-bold label-light-success label-inline" style="font-size: 15px; padding: 20px 10px;">{{$application->application->receiverRole ? $application->application->receiverRole->name_en : ''}}</span>
                                                        </td>

                                                        <td> 
                                                            @if ($application->application->payment)
                                                            <span class="label label-lg font-weight-bold label-light-success label-inline" style="font-size: 15px; padding: 17px;">পরিশোধিত</span>
                                                            @else 
                                                            <span class="label label-lg font-weight-bold label-light-danger label-inline" style="font-size: 15px; padding: 17px;">অপরিশোধিত</span>
                                        
                                                            @endif
                                                        </td>

                                                        <td>
                                                            @if ($application->application->payment and $application->application->is_paid == 0)
                                                                <span class="label label-lg font-weight-bold label-light-warning label-inline"
                                                                    style="font-size: 15px; padding: 17px;">অনুমোদন নয়</span>
                                                            @elseif($application->application->payment and $application->application->is_paid == 2)
                                                                <span class="label label-lg font-weight-bold label-light-danger label-inline"
                                                                    style="font-size: 15px; padding: 17px;">বাতিল</span>
                                                            @elseif($application->application->payment and $application->application->is_paid == 1)
                                                                <span class="label label-lg font-weight-bold label-light-success label-inline"
                                                                    style="font-size: 15px; padding: 17px;">অনুমোদিত</span>
                                                            @else
                                                                <span class="label label-lg font-weight-bold label-light-info label-inline"
                                                                    style="font-size: 15px; padding: 17px;">মুলতবি</span>
                                    
                                                            @endif
                                                        </td>

                                                        <td>
                                                            @if ($application->application->status == 1)
                                                                <span class="label label-lg font-weight-bold label-light-info label-inline" style="font-size: 15px; padding: 17px;">মুলতবি</span>
                                                            @elseif ($application->application->status == 2)
                                                                <span class="label label-lg font-weight-bold label-light-success label-inline" style="font-size: 15px; padding: 17px;">গৃহীত</span>
                                                            @elseif ($application->application->status == 3)
                                                                <span class="label label-lg font-weight-bold label-light-primary label-inline" style="font-size: 15px; padding: 17px;">প্রক্রিয়াধীন</span>
                                                            @elseif ($application->application->status == 4)
                                                                <span class="label label-lg font-weight-bold label-light-success label-inline" style="font-size: 15px; padding: 17px;">অনুমোদিত</span>
                                                            @elseif ($application->application->status == 5)
                                                                <span class="label label-lg font-weight-bold label-light-danger label-inline" style="font-size: 15px; padding: 17px;">বাতিল</span>
                                                            @else
                                                                <span class="label label-lg font-weight-bold label-light-danger label-inline" style="font-size: 15px; padding: 17px;">অজানা</span>
                                                            @endif
                                                        </td>
                                                        
                                                        <td>
                                                            <div class="btn-group btn-group-xs">
                                        
                                                                <a class="btn btn-primary btn-xs" >বিকল্প</a>
                                                            
                                                                <div class="btn-group " role="group">
                                                                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    
                                                                </button>
                                                                    <div class="dropdown-menu p-3" aria-labelledby="btnGroupDrop1">
                                                                        @can('application_detail')
                                                                            <a href="{{route('admin.application.show', $application->application->id)}}" class="dropdown-item   btn  btn-warning btn-sm" title="details">
                                                                                বিস্তারিত
                                                                            </a>
                                                                        @endcan
                                                                        @if ($application->application->status == 4)
                                                                            
                                                                            
                                        
                                                                            @if ($application->application->payment)
                                                                                
                                                                                @if (Auth::user()->role_id == 10)
                                                                                    @if ($application->application->payment->is_app == true)
                                                                                        
                                                                                        <a  href="{{ route('admin.application.itemsDownload', $application->application->id) }}" class="btn btn-sm mt-1 w3-gray  dropdown-item">তথ্য সংগ্রহ করুন </a>
                                                                                    @endif

                                                                                    <button data-toggle="modal" data-target="#payment{{ $application->application->id }}" class="btn btn-sm mt-1 btn-info dropdown-item  " title="pay">
                                                                                        প্রদান করুন
                                                                                    </button>

                                                                                @endif
                                                                                @if (Auth::user()->role_id != 10)
                                                                                    <button data-toggle="modal" data-target="#paymentDetail{{ $application->application->id }}" class="btn  btn-info btn-sm mt-1 dropdown-item  " title="paid">
                                                                                        পেমেন্ট বিস্তারিত
                                                                                    </button>
                                                                                    <a  href="{{ route('admin.application.itemsDownload', $application->application->id) }}" class="btn btn-sm mt-1 w3-gray  dropdown-item">তথ্য দেখুন</a>
                                                                                    
                                                                                    
                                                                                    @if ($application->application->is_paid == 0) 
                                            {{-- is_paid means approved from assistant officer for manual payment --}}
                                                                                        <a href="{{ route('admin.application.paymentApprove',['application'=>$application->application,'type'=>'approve']) }}" class="btn btn-sm mt-1 w3-green dropdown-item  " title="approve">
                                                                                            পেমেন্ট অনুমোদন
                                                                                        </a>
                                                                                        <a href="{{ route('admin.application.paymentApprove',['application'=>$application->application,'type'=>'cancel']) }}" class="btn  btn-sm mt-1 w3-red dropdown-item  " title="cancel">
                                                                                            বাতিল করুন
                                                                                        </a>
                                                                                    @endif

                                                                                @endif
                                                                            @endif     
                                                                                
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                
                                                
                                                    <!--begin::Role Modal-->
                                                    <div id="payment{{ $application->application->id }}" class="modal fade" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content" style="min-height: 350px;">
                                                                <div class="modal-header py-5">
                                                                    <h5 class="modal-title">পেমেন্টের ধরন নির্বাচন করুন
                                                                    <span class="d-block text-muted font-size-sm"></span></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <button class="col-md-5 w3-button w3-white w3-border w3-border-blue w3-hover-blue" style="box-shadow: 4px 6px 1px #c3c3c3;">
                                                                                
                                                                                <i class="la-3x w3-text-black"> <b>ই-পেমেন্ট</b></i>
                                                                                
                                                                            </button>
                                                                            <div class="col-md-1"></div>
                                                                            
                                                                            <a href="{{ route('admin.application.manualPay',$application->application) }}" class="col-md-5 w3-button w3-white w3-border w3-border-blue w3-hover-blue" style="box-shadow: 4px 6px 1px #c3c3c3;">
                                                                                <i class="la-3x w3-text-black"> <b>সরাসরি</b></i>                                            
                                                                            </a>
                                            
                                                                            
                                                                        </div>
                                                                    </div>                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="paymentDetail{{ $application->application->id }}" class="modal fade" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content" style="min-height: 350px;">
                                                                <div class="modal-header py-5">
                                                                    <h5 class="modal-title">পেমেন্টের বিবরণ
                                                                    <span class="d-block text-muted font-size-sm"></span></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            
                                                                            <div class="col-md-12">
                                                                                @if ($pay = $application->application->payment)
                                                                                    
                                                                                <iframe  src="{{ asset('storage/payments/'.$pay->document_img) }}" alt="" width="100%" height="600"></iframe>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                                                            
									</div>
									{{$applications->links()}}
								</div>
								<!--end::table-->
							</div>
							<!--end::Card-->
						</div>
					</div>
				</div>
				<!--end::Container-->
			</div>
			<!--end::Entry-->
		</div>
		<!--end::Content-->
	@endsection
					
    @push('stackScript')

        <script> 
            var dropdowntrig = document.getElementById("dropdownTrigger").getAttribute("class"); 
            
            $('.' + dropdowntrig).on('click', function(){
                $('.dropdown-trigger-detail').toggle();
            });
        </script>
    
    @endpush
