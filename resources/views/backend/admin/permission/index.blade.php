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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">নতুন অফিস যোগ করুন</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.index')}}" class="text-muted">ড্যাশবোর্ড</a>
                            </li>
                            @can('all_permissions')
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin.permission.index')}}" class="text-muted">অনুমতি</a>
                                </li>
                            @endcan
                            
                            <li class="breadcrumb-item active">
                                <a class="text-muted">সকল অনুমতি</a>
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
                                <h3 class="card-title">সকল অনুমতি</h3>
                                <div class="d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text"data-url="{{ route('admin.searchAjax',['type'=> 'permission']) }}" class="form-control form-control-lg form-control-solid ajax-data-search" name="q" placeholder="অনুমতির নাম লিখুন">

                                        </div>
                                        <div class="col-md-6">
                                            @can('add_permission')
                                                
                                                <a href="#" class="btn btn-light-primary pb-4" data-toggle="modal" data-target="#add_permission"> <i class="fa fa-plus"></i> নতুন অনুমতি যোগ করুন</a>
                                            @endcan
                                        </div>
                                    </div>                                   
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ajax-data-container pt-3">
                                    @include('backend.admin.permission.ajax.tableBody')                                    
                                </div>
                                
                                {{$permissions->links()}}
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
    <!--end::Content-->



    <!--begin::Role Modal-->
    <div id="add_permission" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="min-height: 350px;">
                <div class="modal-header py-5">
                    <h5 class="modal-title">Add New Permision
                    <span class="d-block text-muted font-size-sm"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form class="form" action="{{route('admin.permission.create')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">অনুমতির নাম (বাংলা) <span style="color: red;">*</span></label>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <input type="text" required class="form-control {{ $errors->has('perm_name_bn') ? ' is-invalid' : '' }}" value="{{old('perm_name_bn')}}" name="perm_name_bn" placeholder="অনুমতির নাম লিখুন (বাংলা) " />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">অনুমতির নাম (ইংরেজি)<span style="color: red;">*</span> </label>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <input type="text" required class="form-control {{ $errors->has('perm_name_en') ? ' is-invalid' : '' }}" name="perm_name_en" value="{{old('perm_name_en')}}" placeholder="অনুমতির নাম লিখুন (ইংরেজি)" />
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 offset-lg-4">
                                    <button class="btn btn-bg-success btn-block" style="color: aliceblue">সংরক্ষণ করুন</button>
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