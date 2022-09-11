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
										<h5 class="text-dark font-weight-bold my-1 mr-5">{{ $service->name_bn }} পরিষেবার বিবরণ</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="{{route('admin.index')}}" class="text-muted">ড্যাশবোর্ড</a>
											</li>
											@can('all_services')
												<li class="breadcrumb-item">
													<a href="{{route('admin.service.index')}}" class="text-muted">পরিষেবাসমূহ পরিচালনা করুন</a>
												</li>
											@endcan
											<li class="breadcrumb-item active">
												<a class="text-muted">{{ $service->name_bn }} পরিষেবার বিবরণ</a>
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
													<h3 class="card-label font-weight-bolder text-dark">{{ $service->name_bn }} পরিষেবার বিবরণ</h3>
												</div>

                                                @can('edit_service')
                                                <div class="card-toolbar">
													<a href="{{route('admin.service.edit', $service->id)}}" class="btn btn-success mr-2">পরিষেবা সংশোধন করুন</a>
												</div>
                                                @endcan
											</div>
											<!--end::Header-->
                                            <div class="card-body">
                                                <!--begin::Form Group-->
                                                <div class="row"> 
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">পরিষেবা নাম (বাংলায়): </label>
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$service->name_bn}}" disabled/>
                                                    </div>
    
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">পরিষেবা নাম (ইংরেজিতে): </label>
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$service->name_en}}" disabled/>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">ধাপসমূহ: </label>
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$service->level ? $service->level->name_en : ''}}" disabled/>
                                                       
                                                    </div>
    
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">অফিস শিরোনাম: </label>
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$service->office ? $service->office->title_en : ''}}" disabled/>
                                                      
                                                    </div>
                                                </div>
                                             
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">পরিষেবার পদক্রম : </label>
                                                       
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$service->ordering}}" disabled/>
                                                        
                                                    </div>
    
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">স্ট্যাটাস : </label>
                                                       
                                                            @if ($service->status == 1)
                                                                <input class="form-control form-control-lg form-control-solid text-success" value="সক্রিয়" disabled/>
                                                            @else
                                                                <input class="form-control form-control-lg form-control-solid text-danger" value="নিষ্ক্রিয়" disabled/>
                                                            @endif
                                                       
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">ক্রিটেড বাই : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{ ($service->user) ? $service->user->username : '' }}" disabled/>
                                                        
                                                    </div>
    
                                                    @if ($service->updated_by)
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">আপডেটেড বাই : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{ ($service->user_update) ? $service->user_update->username : '' }}" disabled/>
                                                       
                                                    </div>
                                                    @endif
    
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">তৈরি করার তারিখ ও সময় : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{ date('d M, Y', strtotime($service->created_at))}}" disabled/>
                                                      
                                                    </div>
    
                                                    @if ($service->updated_at)
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">আপডেট তারিখ ও সময়: </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{ date('d M, Y', strtotime($service->updated_at))}}" disabled/>
                                                        
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
					