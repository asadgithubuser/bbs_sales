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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Perennial Crop Data Detail</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a class="text-muted">Perennial Crop Data Detail</a>
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
                                    <h3 class="card-label font-weight-bolder text-dark">Perennial Crop Data Detail</h3>
                                </div>

                                <div class="card-toolbar">
                                    <a href="{{route('admin.perennialCropForm.edit', $perennialCropData->id)}}" class="btn btn-success mr-2">Edit Perennial Crop Data Info</a>
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
                                                        <input id="division_id" class="form-control" type="text" value="{{ $perennialCropData->division ? $perennialCropData->division->name_en : '' }}" disabled/>
                                                     </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="district_id" class="col-3 col-form-label"><b>District Name: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="district_id" class="form-control" type="text" value="{{ $perennialCropData->district ? $perennialCropData->district->name_en : '' }}" disabled/>
                                                     </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="upazila_id" class="col-3 col-form-label"><b>Upazila Name: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="upazila_id" class="form-control" type="text" value="{{ $perennialCropData->upazila ? $perennialCropData->upazila->name_en : '' }}" disabled/>
                                                     </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="union_id" class="col-3 col-form-label"><b>Union Name: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="union_id" class="form-control" type="text" value="{{ $perennialCropData->union ? $perennialCropData->union->name_en : '' }}" disabled/>
                                                     </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="mouza_id" class="col-3 col-form-label"><b>Mouza Name: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="mouza_id" class="form-control" type="text" value="{{ $perennialCropData->mouza ? $perennialCropData->mouza->name_en : '' }}" disabled/>
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
                                                    <input id="land_amount" class="form-control" type="text" value="{{ $perennialCropData->crop ? ucfirst($perennialCropData->crop->name_en) : '' }}" disabled />	
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="farmers_name" class="col-3 col-form-label"><b>Farmer's Name: </b></label>
                                                <div class="col-9">
                                                    <input id="farmers_name" class="form-control" type="text" value="{{ $perennialCropData->farmer ? $perennialCropData->farmer->farmers_name : '' }}" disabled />	
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="total_fruity_trees" class="col-3 col-form-label"><b>Current Year Total Fruitful Trees: </b></label>
                                                <div class="col-9">
                                                    <input id="total_fruity_trees" class="form-control" type="text" value="{{ $perennialCropData->total_fruity_trees }} Acre" disabled />	
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="last_total_fruity_trees" class="col-3 col-form-label"><b>Last Year Total Fruitful Trees: </b></label>
                                                <div class="col-9">
                                                    <input id="last_total_fruity_trees" class="form-control" type="text" value="{{ $perennialCropData->last_total_fruity_trees }} Acre" disabled />	
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="land_amount_under_the_fruitly_trees" class="col-3 col-form-label"><b>Current Year Land Amount Under The Fruitful Trees(Acre): </b></label>
                                                <div class="col-9">
                                                    <input id="land_amount_under_the_fruitly_trees" class="form-control" type="text" value="{{ $perennialCropData->land_amount_under_the_fruitly_trees }} Acre" disabled />	
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="last_land_amount_under_the_fruitly_trees" class="col-3 col-form-label"><b>Last Year Land Amount Under The Fruitful Trees(Acre): </b></label>
                                                <div class="col-9">
                                                    <input id="last_land_amount_under_the_fruitly_trees" class="form-control" type="text" value="{{ $perennialCropData->last_land_amount_under_the_fruitly_trees }} Acre" disabled />	
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="total_fruity_trees_in_garden" class="col-3 col-form-label"><b>Current Year Total Fruitful Trees In Garden: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="total_fruity_trees_in_garden" class="form-control" type="text" value="{{ $perennialCropData->total_fruity_trees_in_garden }}" disabled />
                                                     </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="last_total_fruity_trees_in_garden" class="col-3 col-form-label"><b>Last Year Total Fruitful Trees In Garden: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="last_total_fruity_trees_in_garden" class="form-control" type="text" value="{{ $perennialCropData->last_total_fruity_trees_in_garden }}" disabled />
                                                     </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6 col-sm-12">

                                            <div class="form-group row">
                                                <label for="total_fruitless_trees" class="col-3 col-form-label"><b>Total Fruitless Trees: </b></label>
                                                <div class="col-9">
                                                    <input id="total_fruitless_trees" class="form-control" type="text" value="{{ $perennialCropData->total_fruitless_trees }} Acre" disabled />	
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="total_fruity_scattered_trees" class="col-3 col-form-label"><b>Current Year Total Fruitful Scattered Trees:</b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="total_fruity_scattered_trees" class="form-control" type="text" value="{{ $perennialCropData->total_fruity_scattered_trees }}" disabled />
                                                     </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="last_total_fruity_scattered_trees" class="col-3 col-form-label"><b>Last Year Total Fruitful Scattered Trees:</b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="last_total_fruity_scattered_trees" class="form-control" type="text" value="{{ $perennialCropData->last_total_fruity_scattered_trees }}" disabled />
                                                     </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="total_production" class="col-3 col-form-label"><b>Current Year Total Production(Metric Tonne): </b></label>
                                                <div class="col-9">
                                                    <input id="total_production" class="form-control" type="text" value="{{ $perennialCropData->total_production }} Acre" disabled />	
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="last_total_production" class="col-3 col-form-label"><b>Last Year Total Production(Metric Tonne): </b></label>
                                                <div class="col-9">
                                                    <input id="last_total_production" class="form-control" type="text" value="{{ $perennialCropData->last_total_production }} Acre" disabled />	
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="average_yield_per_tree" class="col-3 col-form-label"><b>Average Yield Per Tree: </b></label>
                                                <div class="col-9">
                                                    <input id="average_yield_per_tree" class="form-control" type="text" value="{{ number_format((float)$perennialCropData->average_yield_per_tree, 4, '.', '') }} Acre" disabled />	
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="land_amount_under_the_fruitless_trees" class="col-3 col-form-label"><b>Current Year Land Amount Under The Fruitless Trees: </b></label>
                                                <div class="col-9">
                                                    <input id="land_amount_under_the_fruitless_trees" class="form-control" type="text" value="{{ $perennialCropData->land_amount_under_the_fruitless_trees }} Acre" disabled />	
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="last_land_amount_under_the_fruitless_trees" class="col-3 col-form-label"><b>Last Year Land Amount Under The Fruitless Trees: </b></label>
                                                <div class="col-9">
                                                    <input id="last_land_amount_under_the_fruitless_trees" class="form-control" type="text" value="{{ $perennialCropData->last_land_amount_under_the_fruitless_trees }} Acre" disabled />	
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="total_land_amount_under_the_trees" class="col-3 col-form-label"><b>Current Year Total Land Amount Under The Trees: </b></label>
                                                <div class="col-9">
                                                    <input id="total_land_amount_under_the_trees" class="form-control" type="text" value="{{ $perennialCropData->total_land_amount_under_the_trees }} Acre" disabled />	
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="last_total_land_amount_under_the_trees" class="col-3 col-form-label"><b>Last Year Total Land Amount Under The Trees: </b></label>
                                                <div class="col-9">
                                                    <input id="last_total_land_amount_under_the_trees" class="form-control" type="text" value="{{ $perennialCropData->last_total_land_amount_under_the_trees }} Acre" disabled />	
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="created_by" class="col-3 col-form-label"><b>Created By: </b></label>
                                                <div class="col-9">
                                                    @php
                                                        $createdBy = $perennialCropData->user ? $perennialCropData->user->first_name.' '.$perennialCropData->user->middle_name.' '.$perennialCropData->user->last_name :'';
                                                    @endphp
                                                    <input id="created_by" class="form-control" type="text" value="{{ $createdBy }}" disabled/>	
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

