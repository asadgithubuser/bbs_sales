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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Level Setting</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted">All Levels</a>
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
                @include('alerts.alerts')
                <!--begin::Card-->
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <div class="card card-custom example example-compact">
                            <div class="card-header">
                                <h3 class="card-title">Edit Level</h3>
                                
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.setting.updateLevel',$level)}}" method="post" >
                                    <div class="card-body">
                                        @csrf
                                            
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12 text-right">Title (Bangla) <span style="color: red;">*</span></label>
                                            <div class="col-lg-8 col-md-8 col-sm-12">
                                                <input type="text" name="name_bn" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{$level->name_bn}}" placeholder="Enter Title (Bangla)">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12 text-right">Title (English) <span style="color: red;">*</span></label>
                                            <div class="col-lg-8 col-md-8 col-sm-12">
                                                <input type="text" name="name_en" class="form-control {{ $errors->has('details') ? ' is-invalid' : '' }}" value="{{$level->name_en}}" placeholder="Enter Title (English)">
                                                
                                            </div>
                                        </div>
    
                                        
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-lg-9 ml-lg-auto">
                                                <button type="submit" class="btn btn-primary mr-2">Save</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
</div>



@endsection

