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
										<h5 class="text-dark font-weight-bold my-1 mr-5">অফিসের বিবরণ</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="{{route('admin.index')}}" class="text-muted">ড্যাশবোর্ড</a>
											</li>
											<li class="breadcrumb-item">
												<a href="{{route('admin.office.index')}}" class="text-muted">অফিস পরিচালনা করুন</a>
											</li>
											<li class="breadcrumb-item active">
												<a class="text-muted">{{ $office->title_bn }} অফিসের বিবরণ</a>
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
													<h3 class="card-label font-weight-bolder text-dark">{{ $office->title_bn }} অফিসের বিবরণ</h3>
												</div>

                                                @can('edit_office')
                                                <div class="card-toolbar">
													<a href="{{route('admin.office.edit', $office->id)}}" class="btn btn-success mr-2">অফিস তথ্য সংশোধন করুন</a>
												</div>
                                                @endcan
											</div>
											<!--end::Header-->
                                            <div class="card-body">
                                                <div class="row">
                                                    <!--begin::Form Group-->
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">অফিসের শিরোনাম (বাংলা) : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$office->title_bn}}" disabled/>
                                                       
                                                    </div>

                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">অফিস শিরোনাম (ইংরেজি) : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$office->title_en}}" disabled/>
                                                        
                                                    </div>

                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">অফিসের ধাপ : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$office->lev ? $office->lev->name_en : ''}}" disabled/>
                                                        
                                                    </div>

                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">অফিস কোড : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$office->office_code}}" disabled/>
                                                       
                                                    </div>

                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">বিভাগ : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$office->division ? $office->division->name_en : ''}}" disabled/>
                                                       
                                                    </div>

                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">জেলা : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$office->district ? $office->district->name_en : ''}}" disabled/>
                                                       
                                                    </div>

                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">উপজেলা : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$office->upazila ? $office->upazila->name_en : ''}}" disabled/>
                                                      
                                                    </div>

                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">ঠিকানা : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$office->address}}" disabled/>
                                                        
                                                    </div>

                                                    @if ($office->web_url)
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">ওয়েব ইউআরএল : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$office->web_url}}" disabled/>
                                                       
                                                    </div>
                                                    @endif

                                                    @if ($office->about_info)
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">তথ্য সম্পর্কে : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$office->about_info}}" disabled/>
                                                      
                                                    </div>
                                                    @endif

                                                    @if ($office->email)
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">ইমেইল : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$office->email}}" disabled/>
                                                       
                                                    </div>
                                                    @endif

                                                    @if ($office->fax)
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">ফ্যাক্স : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$office->fax}}" disabled/>
                                                       
                                                    </div>
                                                    @endif

                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">অফিস পদক্রম : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$office->ordering}}" disabled/>
                                                        
                                                    </div>

                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">স্ট্যাটাস : </label>
                                                        
                                                            @if ($office->status == 1)
                                                                <input class="form-control form-control-lg form-control-solid text-success" value="সক্রিয়" disabled/>
                                                            @else
                                                                <input class="form-control form-control-lg form-control-solid text-danger" value="নিষ্ক্রিয়" disabled/>
                                                            @endif
                                                        
                                                    </div>

                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">ক্রিয়েটেড বাই : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{ ($office->user) ? $office->user->username : '' }}" disabled/>
                                                        
                                                    </div>

                                                    @if ($office->updated_by)
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">আপডেটেড বাই : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{ ($office->user_update) ? $office->user_update->username : '' }}" disabled/>
                                                        
                                                    </div>
                                                    @endif

                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">তৈরির তারিখ ও সময়  : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{ date('d M, Y', strtotime($office->created_at))}}" disabled/>
                                                        
                                                    </div>

                                                    @if ($office->updated_at)
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">আপডেটের তারিখ ও সময় : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{ date('d M, Y', strtotime($office->updated_at))}}" disabled/>
                                                        
                                                    </div>
                                                    @endif
                                                    <!--end::Form Group-->
                                                </div>
                                         
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
					