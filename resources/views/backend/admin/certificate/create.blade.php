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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Create Certificate Template</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted">Add Certificate Info</a>
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
            <!--begin::Card-->
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Card-->
                    <div class="card card-custom example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Info</h3>
                        </div>

                        <form class="form" action="{{ route('admin.certificate.info') }}" method="post" id="kt_form_1" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf

                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label class="col-form-label text-right">Logo 1:  <span class="text-danger">*</span></label>
                                            <br/><input type="file"  name="logo_1"  required/>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="col-form-label text-right">Logo 2:  <span class="text-danger">*</span></label>
                                           <br> <input type="file" name="logo_2"  required/>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label class="col-form-label text-right">Heading 1:  <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="heading_1" placeholder="Enter Heading"  required/>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="col-form-label text-right">Heading 2:  <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="heading_2" placeholder="Enter Heading"  required/>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="form-group col-sm-6">
                                        <label class="col-form-label text-right">Heading 3:  <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="heading_3" placeholder="Enter Heading"  required/>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="col-form-label text-right">Heading 4:  <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="heading_4" placeholder="Enter Heading"  required/>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="form-group col-lg-12">
                                        <label class="col-form-label text-right">Content Text:  <span class="text-danger">*</span></label>
                                            <textarea type="text" class="form-control" name="content_text" placeholder="Enter Heading"  required/></textarea>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label class="col-form-label text-right">Create Date:  <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="create_date" required/>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="col-form-label text-right">Course Director Sign:  <span class="text-danger">*</span></label>
                                          <br>  <input type="file"  name="cd_sign"  required/>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="col-form-label text-right">Director Sign:  <span class="text-danger">*</span></label>
                                        <br>  <input type="file"  name="d_sign"  required/>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="col-form-label text-right">Director General Sign:  <span class="text-danger">*</span></label>
                                        <br> <input type="file" name="dg_sign"   required/>
                                    </div>

                                </div>
                                    <div class="form-group col-sm-6">
                                        <div class="form-check">
                                            <input class="form-check-input" name="status" type="checkbox" value="1">
                                            <label class="form-check-label">Active</label>
                                        </div>
                                    </div>

                            <div class="card-footer">
                                <div class="form-group row">
                                    <div class="col-lg-12 text-left">
                                        <input type="submit" class="btn btn-info" style="margin-left: -17px !important" name="submit" value="Create Certificate">
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
@endsection
