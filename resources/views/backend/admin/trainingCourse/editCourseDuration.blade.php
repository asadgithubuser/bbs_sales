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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Edit Course Duration Details</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                            </li>
                        
                            <li class="breadcrumb-item active">
                                <a class="text-muted">Edit Course Duration Details</a>
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
                                <h3 class="card-title">Edit Course Duration</h3>
                            </div>
                            <div class="card-body">
                                <form  action="{{ route('admin.course.updateCourseDuration',$courseDuration) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <!--Left-->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-form-label text-right col-lg-4 col-sm-12">Course Hours<span
                                                        class="text-danger">
                                                        *</span></label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <input type="number" placeholder="Course Total Hour" class="form-control" name="hour"
                                                        value="{{ $courseDuration->course_hour }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label text-right col-lg-4 col-sm-12">Course Duration<span
                                                        class="text-danger">
                                                        *</span></label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <input type="number" placeholder="Course Duration" class="form-control" name="duration"
                                                        value="{{ $courseDuration->duration }}" required>
                                                </div>
                                            </div>
                        
                                            <div class="form-group row">
                                                <label class="col-form-label text-right col-lg-4 col-sm-12">Total Trainees<span
                                                        class="text-danger">
                                                        *</span></label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <input type="number" placeholder="Total Trainees" class="form-control"
                                                        name="total_trainees" value="{{ $courseDuration->total_trainees }}" required>
                                                </div>
                                            </div>
                        
                                            <div class="form-group row">
                                                <label class="col-form-label text-right col-lg-4 col-sm-12">Trainer Allowance<span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <input type="number" placeholder="Trainer Allowance" class="form-control"
                                                        name="total_trainer_allowance" value="{{ $courseDuration->total_trainer_allowance }}" required>
                                                </div>
                                            </div>
                                        </div>
                        
                                        <!--Right-->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-form-label text-right col-lg-4 col-sm-12">Month<span class="text-danger">
                                                        *</span></label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <select name="month" id="month" class="form-control">
                                                        @if ($courseDuration->month)
                                                        <option value="{{ $courseDuration->month }}">{{ $courseDuration->month }}</option>
                                                        @else 
                                                        <option value="">-- Selet Month --</option>
                                                        @endif
                                                        
                        
                                                        <option value="January">January</option>
                                                        <option value="February">February</option>
                                                        <option value="March">March</option>
                                                        <option value="April">April</option>
                                                        <option value="May">May</option>
                                                        <option value="June">June</option>
                                                        <option value="July">July</option>
                                                        <option value="August">August</option>
                                                        <option value="September">September</option>
                                                        <option value="October">October</option>
                                                        <option value="November">November</option>
                                                        <option value="December">December</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label text-right col-lg-4 col-sm-12">Trainee Type<span
                                                        class="text-danger">
                                                        *</span></label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <select name="trainee_type" id="month" class="form-control">
                                                        @if ($courseDuration->trainee_type)
                                                        <option value="{{ $courseDuration->trainee_type }}">{{ $courseDuration->trainee_type }}</option>
                                                        @else 
                                                        <option value="">-- Selet Trainee Type --</option>

                                                        @endif
                                                        <option value="Officer">Officer</option>
                                                        <option value="Employee">Employee</option>
                                                        <option value="Officer/Employee">Officer/Employee</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label text-right col-lg-4 col-sm-12">Training Type<span
                                                        class="text-danger">
                                                        *</span></label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <select name="training_type" id="month" class="form-control">
                                                        @if ($courseDuration->training_type)
                                                        <option value="{{ $courseDuration->training_type }}">{{ $courseDuration->training_type }}</option>
                                                        @else 
                                                        <option value="">-- Selet Trainee Type --</option>


                                                        @endif

                                                        <option value="resident">resident</option>
                                                        <option value="non resident">non resident</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label text-right col-lg-4 col-sm-12">Trainees Allowance<span
                                                        class="text-danger">
                                                        *</span></label>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <input type="number" placeholder="Trainees Allowance" class="form-control"
                                                        name="total_trainees_allowance" value="{{ $courseDuration->total_trainee_allowance }}"
                                                        required> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 offset-md-4">
                                            <button class="btn btn-block btn-info" id="kt_btn_1" type="submit">
                                                 Update
                                            </button>
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