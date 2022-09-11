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
										<h5 class="text-dark font-weight-bold my-1 mr-5">তথ্য উপশ্রেণি বিবরণ</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="{{route('admin.index')}}" class="text-muted">ড্যাশবোর্ড</a>
											</li>
											@can('all_datatypes')
												<li class="breadcrumb-item">
													<a href="{{route('admin.datatype.index')}}" class="text-muted">তথ্য উপশ্রেণিগুলি পরিচালনা করুন</a>
												</li>
											@endcan
											<li class="breadcrumb-item active">
												<a class="text-muted">{{ $datatype->name_bn }} তথ্য উপশ্রেণি বিবরণ</a>
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
													<h3 class="card-label font-weight-bolder text-dark">{{ $datatype->name_en }} তথ্য উপশ্রেণি বিবরণ</h3>
												</div>

                                                @can('edit_sub_datatype')
                                                <div class="card-toolbar">
													<a href="{{route('admin.datatype.edit', $datatype->id)}}" class="btn btn-success mr-2">তথ্যের উপশ্রেণি সংশোধন করুন</a>
												</div>
                                                @endcan
											</div>
											<!--end::Header-->
                                            <div class="card-body">
                                                <!--begin::Form Group-->
												<div class="row">
													<div class="form-group col-sm-6">
														<label class="col-form-label text-right font-weight-bold">তথ্যের বিভাগ : </label>
													
															<input class="form-control form-control-solid" value="{{ $datatype->service_item_type == 1 ? 'Survey' : 'Census' }}" disabled/>
													
													</div>
	
													<div class="form-group col-sm-6">
														<label class="col-form-label text-right font-weight-bold">তথ্যের উপশ্রেণির নাম (বাংলা) : </label>
													
															<input class="form-control form-control-solid" value="{{ $datatype->name_bn }}" disabled/>
													
													</div>
	
													<div class="form-group col-sm-6">
														<label class="col-form-label text-right font-weight-bold">তথ্যের উপশ্রেণির নাম (ইংরেজি): </label>
													
															<input class="form-control form-control-solid" value="{{ $datatype->name_en }}" disabled/>
														
													</div>
	
													<div class="form-group col-sm-6">
														<label class="col-form-label text-right font-weight-bold">স্ট্যাটাস : </label>
													
															@if ($datatype->status == 1)
																<input class="form-control form-control-solid text-success" value="সক্রিয়" disabled/>
															@else
																<input class="form-control form-control-solid text-danger" value="নিষ্ক্রিয়" disabled/>
															@endif
														
													</div>
	
													<div class="form-group col-sm-6">
														<label class="col-form-label text-right font-weight-bold">ক্রিয়েটেড বাই : </label>
													
															<input class="form-control form-control-solid" value="{{ ($datatype->user) ? $datatype->user->first_name.' '.$datatype->user->middle_name.' '.$datatype->user->last_name : '' }}" disabled/>
														
													</div>
	
													@if ($datatype->updated_by)
													<div class="form-group col-sm-6">
														<label class="col-form-label text-right font-weight-bold">আপডেটেড বাই : </label>
													
															<input class="form-control form-control-solid" value="{{ ($datatype->user_update) ? $datatype->user_update->first_name.' '.$datatype->user_update->middle_name.' '.$datatype->user_update->last_name : '' }}" disabled/>
													
													</div>
													@endif
	
													<div class="form-group col-sm-6">
														<label class="col-form-label text-right font-weight-bold">তৈরির তারিখ ও সময় : </label>
													
															<input class="form-control form-control-solid" value="{{ date('d M, Y', strtotime($datatype->created_at))}}" disabled/>
														
													</div>
	
													@if ($datatype->updated_at)
													<div class="form-group col-sm-6">
														<label class="col-form-label text-right font-weight-bold">আপডেটের তারিখ ও সময় : </label>
													
															<input class="form-control form-control-solid" value="{{ date('d M, Y', strtotime($datatype->updated_at))}}" disabled/>
														
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
					