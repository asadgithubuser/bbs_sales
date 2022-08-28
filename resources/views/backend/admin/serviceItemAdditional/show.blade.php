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
										<h5 class="text-dark font-weight-bold my-1 mr-5">পরিষেবা অতিরিক্ত আইটেম বিবরণ</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="{{route('admin.index')}}" class="text-muted">ড্যাশবোর্ড</a>
											</li>
											@can('all_service_additional_items')
												<li class="breadcrumb-item">
													<a href="{{route('admin.serviceItemAdditional.index')}}" class="text-muted">পরিষেবা অতিরিক্ত আইটেম পরিচালনা করুন</a>
												</li>
											@endcan
											<li class="breadcrumb-item active">
												<a class="text-muted">{{ $serviceItemAdditional->item_name_bn }} পরিষেবা অতিরিক্ত আইটেম বিবরণ</a>
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

								<!--begin::row-->
								<div class="row">
									<div class="col-lg-12">
										<!--begin::Card-->
										<div class="card card-custom">
											<!--begin::Header-->
											<div class="card-header py-3">
												<div class="card-title align-items-start flex-column">
													<h3 class="card-label font-weight-bolder text-dark">{{ $serviceItemAdditional->item_name_bn }} পরিষেবা অতিরিক্ত আইটেম বিবরণ</h3>
												</div>

                                                @can('edit_service_additional_item')
                                                <div class="card-toolbar">
													<a href="{{route('admin.serviceItemAdditional.edit', $serviceItemAdditional->id)}}" class="btn btn-success mr-2">পরিষেবা অতিরিক্ত আইটেম সংশোধন করুন</a>
												</div>
                                                @endcan
												
											</div>
											<!--end::Header-->
                                            <div class="card-body">
                                                <!--begin::Form Group-->
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">পরিষেবার অতিরিক্ত আইটেমের নাম (বাংলা): </label>
                                                     
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$serviceItemAdditional->item_name_bn}}" disabled/>
                                                        
                                                    </div>
    
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">পরিষেবার অতিরিক্ত আইটেমের নাম (ইংরেজি): </label>
                                                       
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$serviceItemAdditional->item_name_en}}" disabled/>
                                                        
                                                    </div>
    
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">পরিষেবার নাম : </label>
                                                       
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$serviceItemAdditional->service ? $serviceItemAdditional->service->name_en : ''}}" disabled/>
                                                       
                                                    </div>
    
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">পরিষেবা অতিরিক্ত আইটেম বিবরণ : </label>
                                                       
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$serviceItemAdditional->description}}" disabled/>
                                                        
                                                    </div>
    
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">পরিষেবা অতিরিক্ত আইটেম মূল্য : </label>
                                                       
                                                            <input class="form-control form-control-lg form-control-solid" value="{{number_format((float)$serviceItemAdditional->price, 2, '.', '')}}" disabled/>
                                                        
                                                    </div>
    
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">পরিষেবা অতিরিক্ত আইটেম পদক্রম: : </label>
                                                       
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$serviceItemAdditional->ordering}}" disabled/>
                                                        
                                                    </div>
    
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">স্ট্যাটাস : </label>
                                                       
                                                            @if ($serviceItemAdditional->status == 1)
                                                                <input class="form-control form-control-lg form-control-solid text-success" value="সক্রিয়" disabled/>
                                                            @else
                                                                <input class="form-control form-control-lg form-control-solid text-danger" value="নিষ্ক্রিয়" disabled/>
                                                            @endif
                                                        
                                                    </div>
    
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">ক্রিয়েটেড বাই : </label>
                                                  
                                                            <input class="form-control form-control-lg form-control-solid" value="{{ ($serviceItemAdditional->user) ? $serviceItemAdditional->user->username : '' }}" disabled/>
                                                        
                                                    </div>
    
                                                    @if ($serviceItemAdditional->updated_by)
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">আপডেটেড বাই : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{ ($serviceItemAdditional->user_update) ? $serviceItemAdditional->user_update->username : '' }}" disabled/>
                                                        
                                                    </div>
                                                    @endif
    
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">তৈরির তারিখ ও সময় : </label>
                                                      
                                                            <input class="form-control form-control-lg form-control-solid" value="{{ date('d M, Y', strtotime($serviceItemAdditional->created_at))}}" disabled/>
                                                       
                                                    </div>
    
                                                    @if ($serviceItemAdditional->updated_at)
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">হালনাগাদ এর তারিখ ও সময় : </label>
                                                       
                                                            <input class="form-control form-control-lg form-control-solid" value="{{ date('d M, Y', strtotime($serviceItemAdditional->updated_at))}}" disabled/>
                                                        
                                                    </div>
                                                    @endif
                                                </div>
                                           
                                                <!--end::Form Group-->
                                            </div>
										</div>
										<!--end::Card-->
									</div>
								</div>
                                <!--end::row-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
	@endsection
					