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
                            <h5 class="text-dark font-weight-bold my-1 mr-5">Edit Profile</h5>
                            <!--end::Page Title-->
                            <!--begin::Breadcrumb-->
                            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                                </li>
                                @can('all_users')
                                    <li class="breadcrumb-item">
                                        <a href="{{route('admin.user.index')}}" class="text-muted">User Management</a>
                                    </li>
                                @endcan
                                <li class="breadcrumb-item active">
                                    <a class="text-muted">Update Your Profile</a>
                                </li>
                            </ul>
                            <!--end::Breadcrumb-->
                        </div>
                        <!--end::Page Heading-->
                    </div>
                    <!--end::Info-->
                </div>
            </div>
            <div class="d-flex flex-column-fluid">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--session msg-->
                    @include('alerts.alerts')
                    <div class="row">

                        <div class="col-md-12">
                            <!--begin::Card-->
                            <div class="card card-custom example example-compact">
                                <div class="card-header">
                                    <h3 class="card-title">Change Password</h3>
                                </div>											
                                
                                <!--begin::Form-->
                                <form class="form" action="{{route('admin.user.updatePassword', $user->id)}}" method="post" id="kt_form_2">
                                    @csrf
                                    @method('patch')
            
                                    <div class="card-body">
            
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-2 col-sm-12">Current Password <span class="text-danger">*</span></label>
                                            <div class="col-lg-8 col-md-8 col-sm-12">
                                                <input type="password" class="form-control" name="current_password" placeholder="Enter Current Password" required/>
                                            </div>
                                        </div>
            
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-2 col-sm-12">New Password <span class="text-danger">*</span></label>
                                            <div class="col-lg-8 col-md-8 col-sm-12">
                                                <input type="password" class="form-control" name="password" placeholder="Enter New Password" required/>
                                            </div>
                                        </div>
            
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-2 col-sm-12">Confirm Password <span class="text-danger">*</span></label>
                                            <div class="col-lg-8 col-md-8 col-sm-12">
                                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm New Password" required/>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-lg-10 text-right">
                                                <button type="submit" class="btn btn-primary font-weight-bold" name="submitButton">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Card-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection