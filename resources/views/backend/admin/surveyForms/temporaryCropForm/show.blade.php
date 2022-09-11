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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Temporary Crop Data Detail</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a class="text-muted">Temporary Crop Data Detail</a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                @include('alerts.alerts')
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <div class="card card-custom example example-compact">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                            </div>
                            
                            <div class="card-header py-3">
                                <div class="card-title align-items-start flex-column">
                                    <h3 class="card-label font-weight-bolder text-dark">Temporary Crop Data Detail</h3>
                                </div>

                                <div class="card-toolbar">
                                    <a href="{{route('admin.temporaryCropForm.edit', $temporaryCropData->id)}}" class="btn btn-success mr-2">Edit This Temporary Crop Data Info</a>
                                </div>
                                
                            </div>
                            <div class="card-body">
                                <form>
                                    
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12" style="padding-left: 35px; padding-right:35px;">

                                            {{-- <div class="form-group row">
                                                <label for="division_id" class="col-3 col-form-label"><b>Division Name: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="division_id" class="form-control" type="text" value="{{ $temporaryCropData->division ? $temporaryCropData->division->name_en : '' }}" disabled/>
                                                     </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="district_id" class="col-3 col-form-label"><b>District Name: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="district_id" class="form-control" type="text" value="{{ $temporaryCropData->district ? $temporaryCropData->district->name_en : '' }}" disabled/>
                                                     </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="upazila_id" class="col-3 col-form-label"><b>Upazila Name: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="upazila_id" class="form-control" type="text" value="{{ $temporaryCropData->upazila ? $temporaryCropData->upazila->name_en : '' }}" disabled/>
                                                     </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="union_id" class="col-3 col-form-label"><b>Union Name: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="union_id" class="form-control" type="text" value="{{ $temporaryCropData->union ? $temporaryCropData->union->name_en : '' }}" disabled/>
                                                     </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="mouza_id" class="col-3 col-form-label"><b>Mouza Name: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="mouza_id" class="form-control" type="text" value="{{ $temporaryCropData->mouza ? $temporaryCropData->mouza->name_en : '' }}" disabled/>
                                                     </div>
                                                </div>
                                            </div>
    
                                            <div class="form-group row">
                                                <label for="start_date" class="col-3 col-form-label"><b>Start Date: </b></label>
                                                <div class="col-9">
                                                    <input id="start_date" class="form-control" type="text" value="{{$surveyNotification->notification_start_data_field}}" disabled/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="end_date" class="col-3 col-form-label"><b>End Date: </b></label>
                                                <div class="col-9">
                                                    <input id="end_date" class="form-control" type="text" value="{{$surveyNotification->notification_end_data_field}}" disabled/>
                                                </div>
                                            </div> --}}

                                            

                                            <div class="form-group row">
                                                <label for="farmer_id" style="font-size: 1.2em; font-weight: bold;"><b>চাষীর নাম: </b><span class="text-danger">*</span></label>

                                                {{-- <div class="col-9"> --}}
                                                    <input id="farmers_name" class="form-control" type="text" value="{{ $temporaryCropData->farmer ? $temporaryCropData->farmer->farmers_name : '' }}" disabled />	
                                                {{-- </div> --}}
                                            </div>
                                            <div class="form-group row">
                                                <label for="last_year_land_amount" style="font-size: 1.2em; font-weight: bold;"><b>জমির পরিমাণ পূর্ববর্তী বছরের (একর): </b><span class="text-danger">*</span></label>
                                                {{-- <div class="col-9"> --}}
                                                    <input id="last_year_land_amount" class="form-control" type="text" value="{{ $temporaryCropData->last_year_land_amount }} Acre" disabled />	
                                                {{-- </div> --}}
                                            </div>
                                            <div class="form-group row">
                                                <label for="last_year_land_producttion" style="font-size: 1.2em; font-weight: bold;"><b>পূর্ববর্তী বছরের উৎপাদন (মণ): </b><span class="text-danger">*</span></label>
                                                {{-- <div class="col-9"> --}}
                                                    <input id="last_year_land_producttion" class="form-control" type="text" value="{{ $temporaryCropData->last_year_land_producttion }}" disabled />	
                                                {{-- </div> --}}
                                            </div>

                                            <div class="form-group row">
                                                <label for="last_acre_reflection_rate" style="font-size: 1.2em; font-weight: bold;"><b>পূর্ববর্তী বছরের একর প্রতি গড় ফলন (কেজি): </b><span class="text-danger">*</span></label>
                                                {{-- <div class="col-9"> --}}
                                                    <input id="last_acre_reflection_rate" class="form-control" type="text" value="{{ number_format((float)$temporaryCropData->last_acre_reflection_rate, 4, '.', '')  }}" disabled />	
                                                {{-- </div> --}}
                                            </div>
                                            

                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group row">
                                                <label for="farmer_id" style="font-size: 1.2em; font-weight: bold;"><b>ফসলের নাম:</b><span class="text-danger">*</span></label>
                                                {{-- <div class="col-9"> --}}
                                                    <input id="land_amount" class="form-control" type="text" value="{{ $temporaryCropData->crop ? ucfirst($temporaryCropData->crop->name_en) : '' }}" disabled />	
                                                {{-- </div> --}}
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="current_year_land_amount" style="font-size: 1.2em; font-weight: bold;"><b>জমির পরিমাণ চলতি বছরের (একর): </b><span class="text-danger">*</span></label>
                                                {{-- <div class="col-9"> --}}
                                                    <input id="current_year_land_amount" class="form-control" type="text" value="{{ $temporaryCropData->current_year_land_amount }} Acre" disabled />	
                                                {{-- </div> --}}
                                            </div>
                                            

                                            

                                            <div class="form-group row">
                                                <label for="current_year_land_producttion" style="font-size: 1.2em; font-weight: bold;"><b>চলতি বছরের উৎপাদন (মণ): </b><span class="text-danger">*</span></label>
                                                {{-- <div class="col-9"> --}}
                                                    <input id="current_year_land_producttion" class="form-control" type="text" value="{{ $temporaryCropData->current_year_land_producttion }}" disabled />	
                                                {{-- </div> --}}
                                            </div>

                                            

                                            <div class="form-group row">
                                                <label for="current_year_land_producttion" style="font-size: 1.2em; font-weight: bold;"><b>চলতি বছরের উৎপাদন (মণ): </b><span class="text-danger">*</span></label>
                                                {{-- <div class="col-9"> --}}
                                                    <input id="acre_reflection_rate" class="form-control" type="text" value="{{ number_format((float)$temporaryCropData->acre_reflection_rate, 4, '.', '')  }}" disabled />	
                                                {{-- </div> --}}
                                            </div>

                                            {{-- <div class="form-group row">
                                                <label for="created_by" class="col-3 col-form-label"><b>Created By: </b></label>
                                                <div class="col-9">
                                                    @php
                                                        $createdBy = $temporaryCropData->user ? $temporaryCropData->user->first_name.' '.$temporaryCropData->user->middle_name.' '.$temporaryCropData->user->last_name :'';
                                                    @endphp
                                                    <input id="created_by" class="form-control" type="text" value="{{$createdBy}}" disabled/>	
                                                </div>
                                            </div> --}}
                                            
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

