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
										<h5 class="text-dark font-weight-bold my-1 mr-5">পরিষেবা দফার বিবরণ</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="{{route('admin.index')}}" class="text-muted">ড্যাশবোর্ড</a>
											</li>
											@can('all_service_items')
												<li class="breadcrumb-item">
													<a href="{{route('admin.serviceItem.index')}}" class="text-muted">পরিষেবা দফা পরিচালনা করুন</a>
												</li>
											@endcan
											<li class="breadcrumb-item active">
												<a class="text-muted">{{ $serviceItem->name_en }} পরিষেবা দফার বিবরণ</a>
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
													<h3 class="card-label font-weight-bolder text-dark">{{ $serviceItem->item_name_en }} পরিষেবা দফার বিবরণ</h3>
												</div>

                                                @can('edit_service_item')
                                                <div class="card-toolbar">
													<a href="{{route('admin.serviceItem.edit', $serviceItem->id)}}" class="btn btn-success mr-2">পরিষেবা দফার তথ্য সংশোধন করুন</a>
												</div>
                                                @endcan
												
											</div>
											<!--end::Header-->
                                            <div class="card-body">
                                                <!--begin::Form Group-->
                                                {{-- <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-right font-weight-bold">Service Item Name (Bangla) : </label>
                                                    
                                                        <input class="form-control form-control-lg form-control-solid" value="{{$serviceItem->item_name_bn}}" disabled/>
                                                    </div>
                                                </div> --}}

                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">পরিষেবা দফার নাম (ইংরেজি) : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$serviceItem->item_name_en}}" disabled/>
                                                        
                                                    </div>
    
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">পরিষেবার নাম : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$serviceItem->service ? $serviceItem->service->name_en : ''}}" disabled/>
                                                        
                                                    </div>
                                                    @if ($serviceItem->department)
                                                        <div class="form-group col-sm-6">
                                                            <label class="col-form-label text-right font-weight-bold">বিভাগ নাম: </label>
                                                        
                                                                <input class="form-control form-control-lg form-control-solid" value="{{$serviceItem->department ? $serviceItem->department->name_en : ''}}" disabled/>
                                                            
                                                        </div>
                                                    @endif


                                                    @if ($serviceItem->year)
                                                        <div class="form-group col-sm-6">
                                                            <label class="col-form-label text-right font-weight-bold">পরিষেবা দফার বছর : </label>
                                                            
                                                                <input class="form-control form-control-lg form-control-solid" value="{{$serviceItem->year}}" disabled/>
                                                        
                                                        </div>
                                                    @endif


                                                    @if (count($serviceItemAdditionals) > 0)
                                                        <div class="form-group col-sm-6">
                                                            <label class="col-form-label text-right font-weight-bold">অতিরিক্ত পরিষেবা দফা : </label>
                                                            
                                                                <input type="text" class="form-control form-control-lg form-control-solid" value="@foreach ($serviceItemAdditionals as $serviceItemAdditional){{ $serviceItemAdditional->item_name_en }}, @endforeach" disabled>
                                                            
                                                        </div>
                                                    @endif

                                                    @if ($serviceItem->data_type)
                                                        <div class="form-group col-sm-6">
                                                            <label class="col-form-label text-right font-weight-bold">ডেটা টাইপ : </label>
                                                            
                                                                <input class="form-control form-control-lg form-control-solid" value="{{$serviceItem->data_type == 1 ? 'Hardcopy' : 'Softcopy'}}" disabled/>
                                                            
                                                        </div>
                                                    @endif

                                                    @if ($serviceItem->service_item_type)
                                                        <div class="form-group col-sm-6">
                                                            <label class="col-form-label text-right font-weight-bold">ডেটা বিভাগ : </label>

                                                                <input class="form-control form-control-lg form-control-solid" value="{{$serviceItem->service_item_type == 1 ? 'Survey' : 'Census'}}" disabled/>
                                                            
                                                        </div>
                                                    @endif

                                                    @if ($serviceItem->data_subcategory)
                                                        <div class="form-group col-sm-6">
                                                            <label class="col-form-label text-right font-weight-bold">ডেটা উপশ্রেণি : </label>

                                                                <input class="form-control form-control-lg form-control-solid" value="{{ $serviceItem->data_subcategory ? $serviceItem->data_subcategory->name_en : '' }}" disabled/>
                                                            
                                                        </div>
                                                    @endif


                                                    @if ($serviceItem->file_type)
                                                        <div class="form-group col-sm-6">
                                                            <label class="col-form-label text-right font-weight-bold">ফাইল এক্সটেনশনের প্রকার : </label>
                                                            
                                                                @if ($serviceItem->file_type == 'excel')
                                                                    <input class="form-control form-control-lg form-control-solid" value="Excel" disabled/>
                                                                @elseif ($serviceItem->file_type == 'stata')
                                                                    <input class="form-control form-control-lg form-control-solid" value="Stata" disabled/>
                                                                @else
                                                                    <input class="form-control form-control-lg form-control-solid" value="Others" disabled/>
                                                                @endif
                                                                
                                                           
                                                        </div>
                                                    @endif

                                          

                                                    @if ($serviceItem->description)
                                                        <div class="form-group col-sm-6">
                                                            <label class="col-form-label text-right font-weight-bold">পরিষেবার বর্ণনা : </label>
                                                            
                                                                <textarea class="form-control form-control-lg form-control-solid" cols="" rows="3" disabled>{{$serviceItem->description}}</textarea>
                                                            
                                                        </div>
                                                    @endif

                                                    @if ($serviceItem->price_bdt_personal)
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">মূল্য বিডিটি (ব্যক্তিগত/শিক্ষার্থী) : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{number_format((float)$serviceItem->price_bdt_personal, 2, '.', '')}}" disabled/>
                                                        
                                                    </div>
                                                @endif
                                                
                                                @if ($serviceItem->price_bdt_org)
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">মূল্য বিডিটি (সংগঠন) : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{number_format((float)$serviceItem->price_bdt_org, 2, '.', '')}}" disabled/>
                                                       
                                                    </div>
                                                @endif

                                                @if ($serviceItem->price_usd_personal)
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">মূল্য ইউএসডি (ব্যক্তিগত/শিক্ষার্থী) : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{number_format((float)$serviceItem->price_usd_personal, 2, '.', '')}}" disabled/>
                                                        
                                                    </div>
                                                @endif
                                                
                                                @if ($serviceItem->price_usd_org)
                                                    <div class="form-group col-sm-6">
                                                        <label class="col-form-label text-right font-weight-bold">মূল্য ইউএসডি (সংগঠন) : </label>
                                                        
                                                            <input class="form-control form-control-lg form-control-solid" value="{{number_format((float)$serviceItem->price_usd_org, 2, '.', '')}}" disabled/>
                                                       
                                                    </div>
                                                @endif

                                                {{-- <div class="form-group col-sm-6">
                                                    <label class="col-form-label text-right font-weight-bold">Service Item Rank Order : </label>
                                                    
                                                        <input class="form-control form-control-lg form-control-solid" value="{{$serviceItem->ordering}}" disabled/>
                                                    </div>
                                                </div> --}}

                                                @if (count($serviceItemLocations) > 0)
                                                    <div class="form-group col-sm-6" >
                                                        <label class="col-form-label text-right font-weight-bold">বিভাগ:</label>
                                                        
                                                            <input disabled class="form-control" type="text" value="@foreach ($serviceItemLocations as $serviceItemLocation) {{$serviceItemLocation->division ? $serviceItemLocation->division->name_en.',' :''}}@endforeach">
                                                       
                                                    </div>

                                                    <div class="form-group col-sm-6" >
                                                        <label class="col-form-label text-right font-weight-bold">জেলা:</label>
                                                        
                                                            <input disabled class="form-control" type="text" value="@foreach ($serviceItemLocations as $serviceItemLocation) {{$serviceItemLocation->district ? $serviceItemLocation->district->name_en.',' :''}}@endforeach">
                                                        
                                                    </div>

                                                    <div class="form-group col-sm-6" >
                                                        <label class="col-form-label text-right font-weight-bold">উপজেলা:</label>
                                                        
                                                            <input disabled class="form-control" type="text" value="@foreach ($serviceItemLocations as $serviceItemLocation) {{$serviceItemLocation->upazila ? $serviceItemLocation->upazila->name_en.',' :''}}@endforeach">
                                                       
                                                    </div>

                                                    <div class="form-group col-sm-6" >
                                                        <label class="col-form-label text-right font-weight-bold">ইউনিয়ন:</label>
                                                        
                                                            <input disabled class="form-control" type="text" value="@foreach ($serviceItemLocations as $serviceItemLocation) {{$serviceItemLocation->union ? $serviceItemLocation->union->name_en.',' :''}}@endforeach">
                                                       
                                                    </div>

                                                    <div class="form-group col-sm-6" >
                                                        <label class="col-form-label text-right font-weight-bold">মৌজা:</label>
                                                        
                                                            <input disabled class="form-control" type="text" value="@foreach ($serviceItemLocations as $serviceItemLocation) {{$serviceItemLocation->mouza ? $serviceItemLocation->mouza->name_en.',' :''}}@endforeach">
                                                        
                                                    </div>

                                                    <div class="form-group col-sm-6" >
                                                        <label class="col-form-label text-right font-weight-bold">গ্রাম:</label>
                                                        
                                                            <input disabled class="form-control" type="text" value="@foreach ($serviceItemLocations as $serviceItemLocation) {{$serviceItemLocation->village ? $serviceItemLocation->village->name_en.',' :''}}@endforeach">
                                                       
                                                    </div>

                                                    <div class="form-group col-sm-6" >
                                                        <label class="col-form-label text-right font-weight-bold">ইএ:</label>
                                                        
                                                            <input disabled class="form-control" type="text" value="@foreach ($serviceItemLocations as $serviceItemLocation) {{$serviceItemLocation->ea ? $serviceItemLocation->ea->name_en.',' :''}}@endforeach">
                                                       
                                                    </div>

                                                    <div class="form-group col-sm-6" >
                                                        <label class="col-form-label text-right font-weight-bold">হাউস হোল্ড:</label>
                                                        
                                                            <input disabled class="form-control" type="text" value="@foreach ($serviceItemLocations as $serviceItemLocation) {{$serviceItemLocation->household ? $serviceItemLocation->household->name_en.',' :''}}@endforeach">
                                                        
                                                    </div>

                                                    <div class="form-group col-sm-6" >
                                                        <label class="col-form-label text-right font-weight-bold">জনসংখ্যা:</label>
                                                        
                                                            <input disabled class="form-control" type="text" value="@foreach ($serviceItemLocations as $serviceItemLocation) {{$serviceItemLocation->population ? $serviceItemLocation->population->name_en.',' :''}}@endforeach">
                                                        
                                                    </div>
                                                @endif

                                                <div class="form-group col-sm-6">
                                                    <label class="col-form-label text-right font-weight-bold">স্ট্যাটাস : </label>
                                                    
                                                        @if ($serviceItem->status == 1)
                                                            <input class="form-control form-control-lg form-control-solid text-success" value="সক্রিয়" disabled/>
                                                        @else
                                                            <input class="form-control form-control-lg form-control-solid text-danger" value="নিষ্ক্রিয়" disabled/>
                                                        @endif
                                                    
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label class="col-form-label text-right font-weight-bold">ক্রিটেড বাই : </label>
                                                    
                                                        <input class="form-control form-control-lg form-control-solid" value="{{ ($serviceItem->user) ? $serviceItem->user->username : '' }}" disabled/>
                                                   
                                                </div>

                                                @if ($serviceItem->updated_by)
                                                <div class="form-group col-sm-6">
                                                    <label class="col-form-label text-right font-weight-bold">আপডেটেড বাই : </label>
                                                    
                                                        <input class="form-control form-control-lg form-control-solid" value="{{ ($serviceItem->user_update) ? $serviceItem->user_update->username : '' }}" disabled/>
                                                    
                                                </div>
                                                @endif

                                                <div class="form-group col-sm-6">
                                                    <label class="col-form-label text-right font-weight-bold">তৈরির তারিখ ও সময় : </label>
                                                        <input class="form-control form-control-lg form-control-solid" value="{{ date('d M, Y', strtotime($serviceItem->created_at))}}" disabled/>
                                                </div>

                                                @if ($serviceItem->updated_at)
                                                <div class="form-group col-sm-6">
                                                    <label class="col-form-label text-right font-weight-bold">আপডেট তারিখ ও সময় : </label>
                                                    
                                                        <input class="form-control form-control-lg form-control-solid" value="{{ date('d M, Y', strtotime($serviceItem->updated_at))}}" disabled/>
                                                    
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
					