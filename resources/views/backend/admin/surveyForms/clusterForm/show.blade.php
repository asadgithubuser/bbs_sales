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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Cluster Data Detail</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a class="text-muted">Cluster Data Detail</a>
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
                                    <h3 class="card-label font-weight-bolder text-dark">{{ $clusterData->cluster ? $clusterData->cluster->name_en : '' }} Cluster Data</h3>
                                </div>

                                <div class="card-toolbar">
                                    <a href="{{route('admin.clusterForm.edit', $clusterData->id)}}" class="btn btn-success mr-2">Edit {{ $clusterData->cluster ? $clusterData->cluster->name_en : '' }} Cluster Data</a>
                                </div>
                                
                            </div>
                            <div class="card-body">
                                <form>
                                    
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">

                                            <div class="form-group row">
                                                <label for="division_id" class="col-3 col-form-label"><b>Division Name: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="division_id" class="form-control" type="text" value="{{ $clusterData->division ? $clusterData->division->name_en : '' }}" disabled/>
                                                     </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="district_id" class="col-3 col-form-label"><b>District Name: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="district_id" class="form-control" type="text" value="{{ $clusterData->district ? $clusterData->district->name_en : '' }}" disabled/>
                                                     </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="upazila_id" class="col-3 col-form-label"><b>Upazila Name: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="upazila_id" class="form-control" type="text" value="{{ $clusterData->upazila ? $clusterData->upazila->name_en : '' }}" disabled/>
                                                     </div>
                                                </div>
                                            </div>

                                            <div class="form-group row" id="cluster_no">
                                                <label for="cluster_id" class="col-3 col-form-label"><b>Cluster Name: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="cluster_id" class="form-control" type="text" value="{{ $clusterData->cluster ? $clusterData->cluster->name_en : '' }}" disabled/>
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
                                            </div>

                                            <div class="form-group row">
                                                <label for="land_amount" class="col-3 col-form-label"><b>Crop Name: </b></label>
                                                <div class="col-9">
                                                    <input id="land_amount" class="form-control" type="text" value="{{ $clusterData->crop ? ucfirst($clusterData->crop->name_en) : '' }}" disabled />	
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="farmers_name" class="col-3 col-form-label"><b>Farmer's Name: </b></label> 
                                                <div class="col-9">
                                                    <input id="farmers_name" class="form-control" type="text" value="{{ $clusterData->farmers_name }}" disabled />	
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="farmers_mobile" class="col-3 col-form-label"><b>Farmer's Mobile No: </b></label> 
                                                <div class="col-9">
                                                    <input id="farmers_mobile" class="form-control" type="text" value="{{ $clusterData->farmers_mobile }}" disabled />	
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6 col-sm-12">

                                            <div class="form-group row">
                                                <label for="use_land_type" class="col-3 col-form-label"><b>Land Type: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        @if ($clusterData->use_land_type == 1)
                                                            <input id="use_land_type" class="form-control" type="text" value="Harvestable" disabled />    
                                                        @else
                                                            <input id="use_land_type" class="form-control" type="text" value="Non-Harvestable" disabled />
                                                        @endif
                                                     </div>
                                                </div>
                                            </div>
    
                                            <div class="form-group row">
                                                <label for="land_amount" class="col-3 col-form-label"><b>Land Amount: </b></label>
                                                <div class="col-9">
                                                    <input id="land_amount" class="form-control" type="text" value="{{$clusterData->land_amount}} Acre" disabled />	
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="cultivated_method" class="col-3 col-form-label"><b>Cultivated Method: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        @if ($clusterData->cultivated_method == 1)
                                                            <input id="cultivated_method" class="form-control" type="text" value="Mechanical" disabled />    
                                                        @else
                                                            <input id="cultivated_method" class="form-control" type="text" value="Non-Mechanical" disabled />
                                                        @endif
                                                     </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="irrigation_system" class="col-3 col-form-label"><b>Irrigation System Method: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        @if ($clusterData->irrigation_system == 1)
                                                            <input id="irrigation_system" class="form-control" type="text" value="No Irrigation" disabled />    
                                                        @elseif ($clusterData->irrigation_system == 2)
                                                            <input id="irrigation_system" class="form-control" type="text" value="Power Pump" disabled />    
                                                        @elseif ($clusterData->irrigation_system == 3)
                                                            <input id="irrigation_system" class="form-control" type="text" value="Deep Tubewell" disabled />        
                                                        @elseif ($clusterData->irrigation_system == 4)
                                                            <input id="irrigation_system" class="form-control" type="text" value="Shallow Tubewell" disabled />    
                                                        @elseif ($clusterData->irrigation_system == 5)
                                                            <input id="irrigation_system" class="form-control" type="text" value="Manual Tubewell" disabled />   
                                                        @else
                                                            <input id="irrigation_system" class="form-control" type="text" value="Traditional & Others" disabled />
                                                        @endif
                                                     </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="how_many_irrigation_time" class="col-3 col-form-label"><b>Irrigration Time: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        @if ($clusterData->how_many_irrigation_time == 1)
                                                            <input id="how_many_irrigation_time" class="form-control" type="text" value="One Time" disabled />    
                                                        @elseif ($clusterData->how_many_irrigation_time == 2)
                                                            <input id="how_many_irrigation_time" class="form-control" type="text" value="Two Time" disabled />    
                                                        @else
                                                            <input id="how_many_irrigation_time" class="form-control" type="text" value="Three Time" disabled />
                                                        @endif
                                                     </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="how_many_cultivated_time_yearly" class="col-3 col-form-label"><b>Cultivated Time Yearly: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        @if ($clusterData->how_many_cultivated_time_yearly == 1)
                                                            <input id="how_many_cultivated_time_yearly" class="form-control" type="text" value="One Harvestable" disabled />    
                                                        @elseif ($clusterData->how_many_cultivated_time_yearly == 2)
                                                            <input id="how_many_cultivated_time_yearly" class="form-control" type="text" value="Two Harvestable" disabled />    
                                                        @else
                                                            <input id="how_many_cultivated_time_yearly" class="form-control" type="text" value="Three Harvestable" disabled />
                                                        @endif
                                                     </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="created_by" class="col-3 col-form-label"><b>Created By: </b></label>
                                                <div class="col-9">
                                                    @php
                                                        $createdBy = $clusterData->user ? $clusterData->user->first_name.' '.$clusterData->user->middle_name.' '.$clusterData->user->last_name :'';
                                                    @endphp
                                                    <input id="created_by" class="form-control" type="text" value="{{$createdBy}}" disabled/>	
                                                </div>
                                            </div>
                                            
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

