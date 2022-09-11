@extends('backend.layout.master')
    @push('stackCss')
    {{-- <link href="{{ asset('css/chalanStyle.css') }}" rel="stylesheet" media="all"> --}}
    @endpush
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
							<h5 class="text-dark font-weight-bold my-1 mr-5">Submitted Applications</h5>
							<!--end::Page Title-->
							<!--begin::Breadcrumb-->
							<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
								<li class="breadcrumb-item">
									<a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
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
					
					<!--begin::Card--> 
					<div class="row">
                        @include('alerts.alerts')
						<div class="col-lg-12">
							<!--begin::Card-->
							<div class="card card-custom example example-compact">
								<div class="card-header">
									<h3 class="card-title">Manual Payment Options</h3>
								</div>

                                <form class="form" action="{{route('admin.payment.store',$application)}}" method="post" id="kt_form_1" enctype="multipart/form-data">
                                    @csrf
                                        <div class="form-group">
                                            <div class="alert alert-custom alert-default" role="alert">
                                                <div class="alert-text form_header"><span class="font-weight-bold">Payment Details</span></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-2"></div>
                                            <label class="col-md-6 weight_500">Total Amount To Pay: <span class="badge badge-info"><b>{{ $application->final_total }} TK</b></span> </label>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12 weight_500">Payment With <span class="text-danger">*</span> :</label>
                                            <div class="col-lg-8 col-md-8 col-sm-12" >
                                                <div class="radio-inline" id="method">
                                                    
                                                    <label class="col-form-label radio">
                                                    <input type="radio" class="dataChange" name="method" value="1" id="payment_type1" required="required">
                                                    <span></span>Bank</label>

                                                    <label class="col-form-label radio">
                                                    <input type="radio" class="dataChange" name="method" value="2" id="payment_type2" required="required" >
                                                    <span></span>Mobile Banking</label>
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-12">
                                                <div id="banks" style="display: none;">
                                                    <div class="form-group row">
                                                        <label class="col-form-label text-right col-lg-3 col-sm-12">Bank Name <span class="text-danger">*</span> :</label>
                                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                                            {{-- <input type="text" class="form-control bank_name" name="bank_name" id="bank_name"/> --}}
                                                            <select name="bank_name" class="form-control bank_name" id="bank_name">
                                                                <option value="">Select One</option>
                                                                <option value="Bangladesh Bank">Bangladesh Bank</option>
                                                                <option value="Sonali Bank">Sonali Bank</option>
                                                            </select>
                                                        </div>
                                                    </div> 

                                                    <div class="form-group row">
                                                        <label class="col-form-label text-right col-lg-3 col-sm-12">Date <span class="text-danger">*</span> :</label>
                                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                                            {{-- <input type="text" class="form-control bank_name" name="bank_name" id="bank_name"/> --}}
                                                            <input type="date" class="form-control " name="submission_date" id="">
                                                        </div>
                                                    </div> 

                                                    <div class="form-group row">
                                                        <label class="col-form-label text-right col-lg-3 col-sm-12">Chalan Number <span class="text-danger">*</span> :</label>
                                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                                            <input type="text" class="form-control bank_account" name="bank_account" id="bank_account"/>
                                                        </div>
                                                    </div> 
                                                    <input type="hidden" name="type" value="" id="value">

                                                    <div class="form-group row">
                                                        <label class="col-form-label text-right col-lg-3 col-sm-12">Upload Chalan Payment Copy<span class="text-danger">*</span> :</label>
                                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                                            <input type="file" class="form-control mb-2" name="chalan_scr" id="chalan_scr"/>
                                                            <span class="text-danger">file size should not be more than 5mb</span>
                                                        </div>
                                                    </div> 

                                                    <div class="form-group row">
                                                        <div class="col-form-label text-right col-lg-3 col-sm-12"></div>
                                                        <div class="col-lg-8 col-md-8 col-sm-12">

                                                            <a target="_blank" href="{{ route('admin.application.downloadChalan',$application) }}" class="btn btn-danger btn-sm">Download Chalan Copy</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="mobile_bank" style="display: none">
                                                    <div class="from-group row">
                                                        <label class="col-form-label text-right col-lg-3 col-sm-12 weight_500">Select Mobile Channel <span class="text-danger">*</span> :</label>
                                                        {{-- <div class="col-lg-8 col-md-8 col-sm-12">
                                                            <div class="radio-inline" id="method">
                                                                <label class="col-form-label radio">
                                                                <input type="radio" class="dataChange" name="method1" value="bKash" id="bkash" >
                                                                <span></span>bKash</label>
                                                                <label class="col-form-label radio">
                                                                    <input type="radio" class="dataChange" name="method1" value="rocket" id="rocket"  >
                                                                <span></span>Rocket (DBBL)</label>

                                                                <label class="col-form-label radio">
                                                                <input type="radio" class="dataChange" name="method1" value="nagad" id="nagad"  >
                                                                <span></span>Nagad</label>

                                                                <label class="col-form-label radio">
                                                                    <input type="radio" class="dataChange" name="method1" value="uPay" id="upay"  >
                                                                <span></span>uPay</label>

                                                                <label class="col-form-label radio">
                                                                    <input type="radio" class="dataChange" name="method1" value="SureCash" id=""  >
                                                                <span></span>SureCash</label>
                                                                
                                                            </div>
                                                            
                                                        </div> --}}
                                                        <div class="col-lg-8 col-md-8 col-sm-12" style="margin: 12px 0px 12px 0px;">
                                                            <select name="mobile_bank" class="form-control bank_name1" id="bank_name1">
                                                                <option value="">Select One</option>
                                                                <option  value="bKash">bKash</option>
                                                                <option value="rocket">rocket</option>
                                                                <option value="nagad">nagad</option>
                                                                <option value="uPay">uPay</option>
                                                                <option value="SureCash">SureCash</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label text-right col-lg-3 col-sm-12">Upload Payment Screenshot <span class="text-danger">*</span> :</label>
                                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                                            <input type="file" class="form-control mobile_bank_scr mb-2" name="mobile_bank_scr" id="mobile_bank_scr"/>
                                                            <span class="text-danger">file size should not be more than 5mb</span>
                                                        </div>
                                                    </div> 
                                                    
                                                </div>
                                            </div>
                                        </div>
                                         

                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-lg-2"></div>
                                            <div class="col-lg-4">
                                                <button type="submit" class="btn btn-success btn-sm">Submit Application</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
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
    </div>
	@endsection

    @push('stackScript')
        <script>
            $("input#payment_type1").click(function() {
				var data = $(this).val();

				$("#banks").show();
				$(".bank_name").attr("required", 'required');
				$(".bank_account").attr("required", 'required');
                $("#value").attr("value",'1');

				$("#mobile_bank").hide();
				$(".mobile_bank_scr").removeAttr("required");
				$(".bank_name1").removeAttr("required");

			});
            $("input#payment_type2").click(function() {
                document.getElementById("mobile_bank").style.display = "";
				var data = $(this).val();

				$("#banks").hide();
                $(".bank_name").removeAttr("required");
				$(".bank_account").removeAttr("required");
                


				$("#mobile_bank").show();
                $(".mobile_bank_scr").attr("required");
                $("#value").attr("value",'2');
			});
        </script>
        
    @endpush
					
