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
                            <h5 class="text-dark font-weight-bold my-1 mr-5">Add Application Forwarding</h5>
                            <!--end::Page Title-->
                            <!--begin::Breadcrumb-->
                            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a class="text-muted">Add New Application Forwarding</a>
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

                    <!--begin::Card-->
                    <div class="row">
                        <div class="col-lg-12">
                            <!--begin::Card-->
                            <div class="card card-custom example example-compact">
                                <div class="card-header">
                                    <h3 class="card-title">Add New Application Forwarding</h3>
                                </div>
                                
                                
                                <!--begin::Form-->
                                <form class="form" action="{{route('admin.applicationForwarding.store')}}" method="post" id="kt_form_1">
                                    @csrf

                                    <div class="card-body">

                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-4 col-sm-12">Division:</label>
                                            <div class="col-lg-5 col-sm-12">
                                                <select class="form-control select2" name="division_id" id="division_id">
                                                    <option value="3">Dhaka</option> 
                                                @foreach ($divisions as $division)
                                                    <option value="{{ $division->id }}">{{ $division->name_en }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-4 col-sm-12">District:</label>
                                            <div class="col-lg-5 col-sm-12">
                                                <select class="form-control select2" name="district_id" id="district_id">
                                                    <option value="13">DHAKA</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-4 col-sm-12">Upazila:</label>
                                            <div class="col-lg-5 col-sm-12">
                                                <select class="form-control select2" name="upazila_id" id="upazila_id">
                                                    <option value="51">Mirpur</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-4 col-sm-12">Office:</label>
                                            <div class="col-lg-5 col-sm-12">
                                                <select class="form-control select2" name="office_id" id="office_id">
                                                    <option value="1">Head Office</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-4 col-sm-12">Level: <span class="text-danger">*</span></label>
                                            <div class="col-lg-5 col-sm-12">
                                                <select class="form-control select2" name="level_id" required>
                                                    <option value="">--Select Level--</option>
                                                    @foreach ($levels as $level)
                                                        <option value="{{$level->id}}">{{$level->name_en}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-4 col-sm-12">Sender Role: <span class="text-danger">*</span></label>
                                            <div class="col-lg-5 col-sm-12">
                                                <select class="form-control select2" name="sender_role_id" id="sender_role_id" required>
                                                <option value="">--Select Sender Role--</option> 
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name_en }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-4 col-sm-12">Forward Role: <span class="text-danger">*</span></label>
                                            <div class="col-lg-5 col-sm-12">
                                                <select class="form-control select2" name="forward_role_id" id="forward_role_id" required>
                                                <option value="">--Select Forward Role--</option> 
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name_en }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-4 col-sm-12"></label>
                                            <div class="col-lg-5 col-sm-12">
                                                <input type="checkbox" name="is_approved_person" > Is Approved Person
                                            </div>
                                        </div>

                                    </div>

                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-lg-9 text-right">
                                                <button type="submit" class="btn btn-primary font-weight-bold" name="submitButton">Submit</button>
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
                <!--end::Container-->
            </div>
            <!--end::Entry-->
        </div>
        <!--end::Content-->
	@endsection
					