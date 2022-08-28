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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Farmers Detail</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a class="text-muted">Farmers Detail</a>
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
                                    <h3 class="card-label font-weight-bolder text-dark">{{ $farmerData->farmers_name }} এর তথ্য</h3>
                                </div>

                                <div class="card-toolbar">
                                    <a href="{{route('admin.farmersForm.edit', $farmerData->id)}}" class="btn btn-success mr-2">Edit {{ $farmerData->farmers_name }} এর তথ্য</a>
                                </div>
                                
                            </div>
                            
                                


                            <form>

                                <div class="card-body">

                                    <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                        <h3 style="color:#ffffff;">কৃষক তথ্য</h3>
                                    </div>
                                    <div class="card p-3" style="text-align: center;font-size: 1.2em; font-weight: bold;">
                                    
                                        <p><b> মৌজা:   {{ $farmerData->mouza ? $farmerData->mouza->name_en : '' }} </b>
                                            <br>
                                        <b>ইউনিয়ন:{{ $farmerData->union ? $farmerData->union->name_en : '' }} </b></p>
                                    </div>
                                    <div class="card">
                                        <div class="card-body w3-light-gray">
                                            <div class="row">

                                                <div class="col-md-6 col-sm-12" style="padding-left: 30px; padding-right:30px;">

                                                    <div class="form-group row">
                                                        <label for="union_id" style="font-size: 1.2em; font-weight: bold;"><b>দাগগুচ্ছের নাম: </b></label>
                                                        <input id="cluster_id" class="form-control" type="text" value="{{ $farmerData->mouza ? $farmerData->mouza->name_en : '' }}" disabled/>                                                            
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="union_id" style="font-size: 1.2em; font-weight: bold;"><b>খানার প্রকার: </b></label>
                                                        @if ($farmerData->food_type == 1)
                                                            <input id="food_type" class="form-control" type="text" value="Agricultural" disabled/>  
                                                        @else
                                                            <input id="food_type" class="form-control" type="text" value="Non-Agricultural" disabled/>
                                                        @endif
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="union_id" style="font-size: 1.2em; font-weight: bold;"><b>মোবাইল নাম্বার: </b></label>
                                                        <input id="farmers_mobile" class="form-control" type="number" value="{{$farmerData->farmers_mobile}}" disabled />
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="permanent_crop_ids" style="font-size: 1.2em; font-weight: bold;"><b>স্থায়ী ফসল: </b></label>
                                                        <select id="permanent_crop_ids" name="permanent_crop_ids[]" class="form-control select-multiple-additional" multiple disabled>
                                                            @foreach ($croplist as $item)
                                                                <option value="{{ $item->id }}" {{ (in_array($item->id, $permanent_crops)) ? 'selected' : '' }}>{{ $item->name_en }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="temporary_crop_ids" style="font-size: 1.2em; font-weight: bold;"><b>অস্থায়ী ফসল: </b></label>
                                                        <select id="temporary_crop_ids" name="temporary_crop_ids[]" class="form-control select-multiple-additional" multiple disabled>
                                                            @foreach ($croplist as $item)
                                                                <option value="{{ $item->id }}" {{ (in_array($item->id, $temporary_crops)) ? 'selected' : '' }}>{{ $item->name_en }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="col-md-6 col-sm-12" style="padding-left: 30px; padding-right:30px;">

                                                    <div class="form-group row">
                                                        <label for="farmers_name"  style="font-size: 1.2em; font-weight: bold;"><b>খানা প্রধানের নাম: </b></label>
                                                        <input id="farmers_name" class="form-control" type="text" value="{{$farmerData->farmers_name}}" disabled />	
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="father_name" style="font-size: 1.5em; font-weight: bold;"><b>খানা প্রধানের পিতা/স্বামীর নাম: </b></label>
                                                        <input id="farmers_name" class="form-control" type="text" value="{{$farmerData->father_name}}" disabled />	
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="farmers_class_division_type" style="font-size: 1.2em; font-weight: bold;"><b>কৃষকের শ্রেণি বিভাগ: </b></label>
                                                        @if ($farmerData->farmers_class_division_type == 1)
                                                            <input id="farmers_class_division_type" class="form-control" type="text" value="Small Farmer" disabled />    
                                                        @elseif($farmerData->farmers_class_division_type == 2)
                                                            <input id="farmers_class_division_type" class="form-control" type="text" value="Medium Farmer" disabled />
                                                        @else
                                                            <input id="farmers_class_division_type" class="form-control" type="text" value="Big Farmer" disabled />
                                                        @endif
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="village_name" style="font-size: 1.5em; font-weight: bold;"><b>গ্রামের নাম: </b></label>
                                                        <input name="village_name" class="form-control" type="text" value="{{ $farmerData->village_name }}" disabled/>	
                                                    </div>




                                                


                                                    <div class="form-group row">
                                                        <label for="land_amount"  style="font-size: 1.2em; font-weight: bold;"><b>চাষকৃত জমির আকার: </b><span class="text-danger">*</span></label>
                                                    
                                                        <input id="land_amount" name="land_amount" class="form-control" value="{{ $farmerData->land_amount ?? ''}}" type="text" disabled/>
                                                        
                                                    </div>
                                                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                                </div>

                            </form>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                {{-- <form>
                                    
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">

                                            <div class="form-group row">
                                                <label for="division_id" class="col-3 col-form-label"><b>Division Name: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="division_id" class="form-control" type="text" value="{{ $farmerData->division ? $farmerData->division->name_en : '' }}" disabled/>
                                                     </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="district_id" class="col-3 col-form-label"><b>District Name: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="district_id" class="form-control" type="text" value="{{ $farmerData->district ? $farmerData->district->name_en : '' }}" disabled/>
                                                     </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="upazila_id" class="col-3 col-form-label"><b>Upazila Name: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="upazila_id" class="form-control" type="text" value="{{ $farmerData->upazila ? $farmerData->upazila->name_en : '' }}" disabled/>
                                                     </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="union_id" class="col-3 col-form-label"><b>Union Name: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="union_id" class="form-control" type="text" value="{{ $farmerData->union ? $farmerData->union->name_en : '' }}" disabled/>
                                                     </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="mouza_id" class="col-3 col-form-label"><b>Mouza Name: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="mouza_id" class="form-control" type="text" value="{{ $farmerData->mouza ? $farmerData->mouza->name_en : '' }}" disabled/>
                                                     </div>
                                                </div>
                                            </div>

                                            <div class="form-group row" id="cluster_no">
                                                <label for="cluster_id" class="col-3 col-form-label"><b>Cluster Name: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <input id="cluster_id" class="form-control" type="text" value="{{ $farmerData->mouza ? $farmerData->mouza->name_en : '' }}" disabled/>
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

                                        </div>

                                        <div class="col-md-6 col-sm-12">

                                            <div class="form-group row">
                                                <label for="year" class="col-3 col-form-label"><b>Year: </b></label>
                                                <div class="col-9">
                                                    <input id="year" class="form-control" type="text" value="{{$farmerData->year}}" disabled/>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="food_type" class="col-3 col-form-label"><b>Type Of Khana: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        @if ($farmerData->food_type == 1)
                                                            <input id="food_type" class="form-control" type="text" value="Agricultural" disabled/>  
                                                        @else
                                                            <input id="food_type" class="form-control" type="text" value="Non-Agricultural" disabled/>
                                                        @endif
                                                     </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="farmers_name" class="col-3 col-form-label"><b>Name Of The Head Of The Khana: </b></label>
                                                <div class="col-9">
                                                    <input id="farmers_name" class="form-control" type="text" value="{{$farmerData->farmers_name}}" disabled />	
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="farmers_mobile" class="col-3 col-form-label"><b>Mobile Number: </b></label>
                                                <div class="col-9">
                                                    <input id="farmers_mobile" class="form-control" type="number" value="{{$farmerData->farmers_mobile}}" disabled />	
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="farmers_class_division_type" class="col-3 col-form-label"><b>Farmer Class Division: </b></label>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        @if ($farmerData->farmers_class_division_type == 1)
                                                            <input id="farmers_class_division_type" class="form-control" type="text" value="Small Farmer" disabled />    
                                                        @elseif($farmerData->farmers_class_division_type == 2)
                                                            <input id="farmers_class_division_type" class="form-control" type="text" value="Medium Farmer" disabled />
                                                        @else
                                                            <input id="farmers_class_division_type" class="form-control" type="text" value="Big Farmer" disabled />
                                                        @endif
                                                     </div>
                                                </div>
                                            </div>
    
                                            <div class="form-group row">
                                                <label for="land_amount" class="col-3 col-form-label"><b>Land Size: </b></label>
                                                <div class="col-9">
                                                    <input id="land_amount" class="form-control" type="text" value="{{$farmerData->land_amount}} Acre" disabled />	
                                                </div>
                                            </div>
    
                                            <div class="form-group row">
                                                <label for="sample_farmer_no" class="col-3 col-form-label"><b>Sample Farmer No: </b></label>
                                                <div class="col-9">
                                                    <input id="sample_farmer_no" class="form-control" type="text" value="{{$farmerData->sample_farmer_no}}" disabled />	
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="created_by" class="col-3 col-form-label"><b>Created By: </b></label>
                                                <div class="col-9">
                                                    @php
                                                        $createdBy = $farmerData->user ? $farmerData->user->first_name.' '.$farmerData->user->middle_name.' '.$farmerData->user->last_name :'';
                                                    @endphp
                                                    <input id="created_by" class="form-control" type="text" value="{{$createdBy}}" disabled/>	
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>

                                </form> --}}







                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

