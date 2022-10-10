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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Create Course Title</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                            </li>
                        
                            <li class="breadcrumb-item active">
                                <a class="text-muted">Create Course Title</a>
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
        <div class=" ">
            <!--begin::Container-->
            <div class="container">
                @include('alerts.alerts')

                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                  
                        <div class=" mt-2 mb-2 ajax-course-duration-data-container">
                            <div class="card">
                                <form action="{{route('admin.course.storeCourseTitle')}}" method="POST"> 
                                    @csrf
                                    <div class="card-header">
                                           Add Course Title
                                        </div>
                                        <div id="curriculam_error_area"></div>
                                            <div class="card-body">
                                                    <div class="row">
                                                        <!--Left-->
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <label class="col-form-label text-left col-lg-12 col-md-12 col-sm-6">Course Title<span class="text-danger">
                                                                        *</span></label>
                                                                <div class="col-lg-12 col-md-12 col-sm-6">
                                                                    <input type="text" placeholder="Enter Course Title" class="form-control" name="courseTitle"
                                                                        value="{{ old('courseTitle') }}" required>
                                                                </div>
                                                            </div>
                                                             
                                                            </div>
                                                        </div>

                                                        <!--Right-->
                                                       
                                                
                                                    </div>
                                        
                                                
                                                <div class="row mb-4">
                                                <div class="col-5 offset-8">
                                                    <button type="submit" class="btn btn-success" >Add Course Title</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="row mt-4">
                    <div class="form-group col-12">
                        <div class="card">
                            <div class="card-body p-5">
                                
                                <table class="table table-separate table-head-custom table-checkable table-striped" id="">
                                <thead>
                                    <tr>
                                        <th class="text-left" style="" width="85%">Course Title</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                    @foreach($courseTitles as $title)
                                        <tr>
                                            <td class="text-left" style="">{{$title->title}}</td>
                                            <td>
                                                <a href="" class="btn btn-primary btn-sm" title="show"><i class="la la-eye"></i></a>

                                                <a href="" class="btn btn-warning btn-sm" title="edit 2"><i class="la la-pencil"></i></a>
                                            </td>
                                             
                                        </tr> 
                                        @endforeach                     
                                    </tbody>
                                </table>
                                            
                            </div>
                        </div>
                    </div>
                </div>
                
            
        </div>

    </div>
@endsection
