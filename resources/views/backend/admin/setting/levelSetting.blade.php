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
                                <h3 class="card-title">Levels List</h3>
                                <div class="d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" data-url="{{ route('admin.searchAjax',['type'=> 'level']) }}" class="form-control form-control-lg form-control-solid ajax-data-search" name="q" placeholder="Enter Level">

                                        </div>
                                        @can('add_level')
                                            
                                            <div class="col-md-6">
                                                <button data-toggle="modal" data-target="#add_level" class="btn btn-light-primary pb-4"> <i class="fa fa-plus"></i> New Level</button>

                                            </div>
                                        @endcan
                                    </div>                                    
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ajax-data-container pt-3">
                                    @include('backend.admin.setting.ajax.tableBodyLevel')                                    
                                </div>
                                {{$levels->links()}}
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

<!--begin::Role Modal-->
<div id="add_level" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="min-height: 350px;">
            <div class="modal-header py-5">
                <h5 class="modal-title">Add New Level
                <span class="d-block text-muted font-size-sm"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form class="form" action="{{route('admin.setting.createLevel')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-3 col-sm-12">Title (Bangla)  <span style="color: red;">*</span></label>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <input type="text" required class="form-control {{ $errors->has('name_bn') ? ' is-invalid' : '' }}" value="{{old('name_bn')}}" name="name_bn" placeholder="Enter Role Name (Bangla)" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-3 col-sm-12">Title (English) <span style="color: red;">*</span> </label>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <input type="text" required class="form-control {{ $errors->has('name_en') ? ' is-invalid' : '' }}" name="name_en" value="{{old('name_en')}}" placeholder="Enter Role Name (English)" />
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-3 offset-lg-4">
                                <button class="btn btn-bg-success btn-block" style="color: aliceblue">Save</button>
                            </label>
                        </div>                           
                    </form>
                </div>                    
            </div>
        </div>
    </div>
</div>
<!--end::Role Modal-->

@endsection

