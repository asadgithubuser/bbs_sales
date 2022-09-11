@extends('backend.layout.master')

@push('css')
    <style> 
        .table th, .table td{
            border-top: none !important;
        }
        tbody#tbl_posts_body label {
            height: 40px;
        }
    </style>
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Crop Cutting Production Form</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">Dashboard</a>
                            </li>

                            <li class="breadcrumb-item active">
                                <a class="text-muted">Crop Cutting Production Form</a>
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
                            <div class="card card-custom gutter-b example example-compact">
                                <div class="card-header">
                                    <h3 class="card-title">Crop Cutting Production Form</h3>
                                    
                                    <div class="card-toolbar">

                                    </div>
                                </div>
                                <!--begin::Form-->
                                <form action="{{ route('admin.cropCuttingProductionForm.storeData',$data) }}" method="post" enctype="multipart/form-data">
                                    @csrf                             
                                    
                                    <div class="row">
                                        <div class="card-body offset-md-2 col-md-6">
                                            <div class="form-group row">
                                                <label for="agricultural_officer_name" class="col-7 col-form-label"><b> Department of Agricultural Extension Officer Name: </b><span class="text-danger">*</span></label>
                                                <div class="col-5">
                                                    <input class="form-control" type="text" value="{{ $data->agricultural_officer_name }}" placeholder="Enter Extension Officer Name" name="agricultural_officer_name" id="agricultural_officer_name" required/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="designation" class="col-7 col-form-label"><b> Department of Agricultural Extension Officer Designation: </b><span class="text-danger">*</span></label>
                                                <div class="col-5">
                                                    <input class="form-control" type="text" placeholder="Enter Extension Officer Designation" name="agricultural_officer_designation" value="{{ $data->agricultural_officer_designation }}" id="designation" required/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="agricultural_officer_upazila" class="col-7 col-form-label"><b> Upazila Name: </b><span class="text-danger">*</span></label>
                                                <div class="col-5">
                                                    <input class="form-control" type="text" readonly value="{{ $data->upazila ? $data->upazila->name_en : ''}}" name="agricultural_officer_upazila" id="agricultural_officer_upazila" required/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="agricultural_officer_signature" class="col-7 col-form-label"><b>  Upload Signature: </b><span class="text-danger">*</span></label>
                                                <div class="col-5">
                                                    <input class="form-control" type="file" value="{{ $data->upazila ? $data->upazila->name_en : ''}}" name="agricultural_officer_signature" id="agricultural_officer_signature" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-12 text-right">
                                                <button type="submit" class="btn btn-success mr-2">Submit</button>
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

@push('stackScript')
    
@endpush
