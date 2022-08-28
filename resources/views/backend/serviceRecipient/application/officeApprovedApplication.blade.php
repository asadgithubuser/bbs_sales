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
							<h5 class="text-dark font-weight-bold my-1 mr-5">Approved Applications</h5>
							<!--end::Page Title-->
							<!--begin::Breadcrumb-->
							<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
								<li class="breadcrumb-item">
									<a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
								</li>
								<li class="breadcrumb-item">
									<a href="{{route('admin.application.index')}}" class="text-muted">Manage Applications</a>
								</li>
								<li class="breadcrumb-item active">
									<a class="text-muted">Approved Applications</a>
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
									<h3 class="card-title">Approved Applications</h3>
									{{-- <div class="d-flex align-items-center">
										<div class="row">
											<div class="col-md-12">
												<input type="text"data-url="{{ route('admin.searchAjax',['type'=> 'applications']) }}" class="form-control form-control-lg form-control-solid ajax-data-search" name="q" placeholder="Search">
	
											</div>
										</div>
									</div> --}}
								</div>

								<div class="card-body">
									<div class="table-responsive ajax-data-container pt-3">
										<table class="table table-separate table-head-custom table-checkable">
                                            <thead>
                                                <tr>
                                                    <th>Application ID</th>
                                                    <th class="text-left">Applicant Name</th>
                                                    <th class="text-left">User Type</th>
                                                    <th class="text-left">Purpose</th>
                                                    <th class="text-left">Sender</th>
                                                    <th class="text-left">Receiver</th>
                                                    <th class="text-left">Application Date</th>
                                                    <th>Currently At</th>
                                                    <th>Payment Status</th>
                                                    <th>Payment Approved Status</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @if ($applications->count() < 1)
                                                    <tr>
                                                        <td align="middle" colspan="12" class="bg-warning" style="font-size: 1.3em;"> No application found </td>
                                                    </tr>
                                                @else
                                                    @foreach ($applications as $application)
                                                    
                                                        <tr>
                                                            <td>{{$application->application_id}}</td>

                                                            <td align="left">
                                                                {{ $application->user ? $application->user->first_name : '' }}
                                                                {{ $application->user ? $application->user->middle_name : '' }}
                                                                {{ $application->user ? $application->user->last_name : '' }}
                                                            </td>

                                                            @if ($application->usage_type == 1)
                                                                <td align="left">Organization</td>
                                                            @elseif ($application->usage_type == 2)
                                                                <td align="left">Researcher</td>
                                                            @else
                                                                <td align="left">Student</td>
                                                            @endif
                                                            
                                                            @if ($application->purpose_id == 100)
                                                                <td align="left">Others: {{$application->purpose_specify ? $application->purpose_specify : ''}}</td>    
                                                            @else
                                                                <td align="left">{{$application->applicationPurpose ? $application->applicationPurpose->name_en : ''}}</td>
                                                            @endif
                                                            
                                                            <td align="left">{{$application->senderRole ? $application->senderRole->name_en : ''}}</td>

                                                            <td align="left">{{$application->receiverRole ? $application->receiverRole->name_en : ''}}</td>

                                                            <td>{{date('d-M-Y h:i:s A', $application->created_at->timestamp)}}</td>

                                                            <td>
                                                                <span class="label label-lg font-weight-bold label-light-success label-inline" style="font-size: 15px; padding: 20px 10px;">{{$application->receiverRole ? $application->receiverRole->name_en : ''}}</span>
                                                            </td>

                                                            <td> 
                                                                @if ($application->payment)
                                                                <span class="label label-lg font-weight-bold label-light-success label-inline" style="font-size: 15px; padding: 17px;">Paid</span>
                                                                @else 
                                                                <span class="label label-lg font-weight-bold label-light-danger label-inline" style="font-size: 15px; padding: 17px;">Unpaid</span>
                                            
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if ($application->payment and $application->is_paid == 0)
                                                                    <span class="label label-lg font-weight-bold label-light-warning label-inline"
                                                                        style="font-size: 15px; padding: 17px;">Not Approve</span>
                                                                @elseif($application->payment and $application->is_paid == 2)
                                                                    <span class="label label-lg font-weight-bold label-light-danger label-inline"
                                                                        style="font-size: 15px; padding: 17px;">Canceled</span>
                                                                @elseif($application->payment and $application->is_paid == 1)
                                                                    <span class="label label-lg font-weight-bold label-light-success label-inline"
                                                                        style="font-size: 15px; padding: 17px;">Approved</span>
                                                                @else
                                                                    <span class="label label-lg font-weight-bold label-light-info label-inline"
                                                                        style="font-size: 15px; padding: 17px;">Pending </span>
                                        
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if ($application->status == 1)
                                                                    <span class="label label-lg font-weight-bold label-light-primary label-inline">Pending</span>
                                                                @elseif ($application->status == 2)
                                                                    <span class="label label-lg font-weight-bold label-light-success label-inline">Received</span>
                                                                @elseif ($application->status == 3)
                                                                    <span class="label label-lg font-weight-bold label-light-success label-inline">Processing</span>
                                                                @elseif ($application->status == 4)
                                                                    <span class="label label-lg font-weight-bold label-light-success label-inline">Approved</span>
                                                                @elseif ($application->status == 5)
                                                                    <span class="label label-lg font-weight-bold label-light-danger label-inline">Rejected</span>
                                                                @else
                                                                    <span class="label label-lg font-weight-bold label-light-danger label-inline">Unknown</span>
                                                                @endif
                                                            </td>

                                                            <td>
                                                                <div class="btn-group btn-group-xs">
                                            
                                                                    <a class="btn btn-primary btn-xs" >Options</a>
                                                                
                                                                    <div class="btn-group " role="group">
                                                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        
                                                                    </button>
                                                                        <div class="dropdown-menu p-3" aria-labelledby="btnGroupDrop1">
                                                                            @can('application_detail')
                                                                                <a href="{{route('admin.application.show', $application->id)}}" class="dropdown-item   btn  btn-warning btn-sm" title="details">
                                                                                    Details
                                                                                </a>
                                                                            @endcan
                                                                            @if ($application->status == 4)
                                                                                
                                                                                
                                            
                                                                                @if ($application->payment)
                                                                                    <button  class="btn  btn-success btn-sm mt-1 dropdown-item  " title="paid">
                                                                                        Paid
                                                                                    </button>
                                                                                    
                                                                                    {{-- <a  href="{{ route('admin.application.itemsDownload', $application->application->id) }}" class="btn btn-sm mt-1 w3-gray  dropdown-item">Show Data {{ $application->application }}</a> --}}

                                                                                    <a href="{{ route('admin.application.paymentApprove',['application'=>$application,'type'=>'approve']) }}" class="btn btn-sm mt-1 w3-green dropdown-item  " title="approve">
                                                                                        Approve
                                                                                    </a>
                                                                                    <a href="{{ route('admin.application.paymentApprove',['application'=>$application,'type'=>'cancel']) }}" class="btn  btn-sm mt-1 w3-red dropdown-item  " title="approve">
                                                                                        Cancel
                                                                                    </a>
                                                                                @endif
                                                                            @endif     
                                                                                    @if (Auth::user()->role_id == 10)
                                                                                        @if ($application->payment->is_app == true)
                                                                                            
                                                                                            <a  href="{{ route('admin.application.itemsDownload', $application->id) }}" class="btn btn-sm mt-1 w3-gray  dropdown-item">Download </a>
                                                                                        @endif
                                                                                        <button data-toggle="modal" data-target="#payment{{ $application->id }}" class="btn btn-sm mt-1 btn-info dropdown-item  " title="pay">
                                                                                            Pay
                                                                                        </button>
                                                                                    @endif
                                                                                    @if (Auth::user()->role_id != 10)
                                                                                        <button data-toggle="modal" data-target="#paymentDetail{{ $application->id }}" class="btn  btn-info btn-sm mt-1 dropdown-item  " title="paid">
                                                                                            Payment
                                                                                        </button>
                                            
                                                                                        <a href="{{ route('admin.application.paymentApprove',['application'=>$application,'type'=>'approve']) }}" class="btn btn-sm mt-1 w3-green dropdown-item  " title="approve">
                                                                                            Approve
                                                                                        </a>
                                                                                        <a href="{{ route('admin.application.paymentApprove',['application'=>$application,'type'=>'cancel']) }}" class="btn  btn-sm mt-1 w3-red dropdown-item  " title="approve">
                                                                                            Cancel
                                                                                        </a>
                                                                                    @endif
                                                                                {{-- @endif      --}}
                                                                                    
                                                                                
                                                                            {{-- @endif --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                    
                                                    
                                                        <!--begin::Role Modal-->
                                                        <div id="payment{{ $application->id }}" class="modal fade" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content" style="min-height: 350px;">
                                                                    <div class="modal-header py-5">
                                                                        <h5 class="modal-title">Choose Payment System
                                                                        <span class="d-block text-muted font-size-sm"></span></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <button class="col-md-5 w3-button w3-white w3-border w3-border-blue w3-hover-blue" style="box-shadow: 4px 6px 1px #c3c3c3;">
                                                                                    
                                                                                    <i class="la-3x w3-text-black"> <b>ePayment</b></i>
                                                                                    
                                                                                </button>
                                                                                <div class="col-md-1"></div>
                                                                                
                                                                                <a href="{{ route('admin.application.manualPay',$application) }}" class="col-md-5 w3-button w3-white w3-border w3-border-blue w3-hover-blue" style="box-shadow: 4px 6px 1px #c3c3c3;">
                                                                                    <i class="la-3x w3-text-black"> <b>Manual</b></i>                                            
                                                                                </a>
                                                
                                                                                
                                                                            </div>
                                                                        </div>                    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div id="paymentDetail{{ $application->id }}" class="modal fade" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content" style="min-height: 350px;">
                                                                    <div class="modal-header py-5">
                                                                        <h5 class="modal-title">Payment Details
                                                                        <span class="d-block text-muted font-size-sm"></span></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                
                                                                                <div class="col-md-12">
                                                                                    @if ($pay = $application->payment)
                                                                                        
                                                                                    <iframe  src="{{ asset('storage/payments/'.$pay->document_img) }}" alt="" width="100%" height="600"></iframe>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>                    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Role Modal-->
                                                    
                                                    @endforeach
                                                @endif
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