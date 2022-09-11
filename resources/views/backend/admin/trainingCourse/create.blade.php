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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Create Courses</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                            </li>
                        
                            <li class="breadcrumb-item active">
                                <a class="text-muted">Create Courses</a>
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
                                <h3 class="card-title">Add New Course</h3>
                                
                            </div>
                        <form action="{{ route('admin.course.store') }}" method="post">
                            @csrf
                            <div class="container mt-2 mb-2 ajax-course-data-container">
                                <div class="card">
                                    <div class="card-header">
                                        Course Details
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-12 col-sm-12">Course Title<span class="text-danger">
                                                        *</span></label>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <input type="text" 
                                                        placeholder="Course Title" class="form-control ajax-course-details-data-insert" name="title"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-12 col-sm-12">Fiscal Year<span class="text-danger">
                                                        *</span></label>
                                                <div class="col-lg-12 col-md-12 col-sm-12">

                                                    <select name="fiscal_year" id="fiscal_year" class="form-control ajax-course-details-data-insert">
                                                        <option value="">-- Select Fiscal Year --</option>
                                                        @foreach ($years as $year)
                                                            <option value="{{ $year->id }}">{{ $year->name }}</option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-12 col-sm-12">Trainer</label>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <select name="trainer" id="trainer" class="form-control ajax-course-details-data-insert">
                                                        @foreach ($trainers as $trainer)
                                                            <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-6">
                                        <div class="form-group row">
                                                <label class="col-form-label col-lg-12 col-sm-12">Course Director</label>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                
                                                    <input type="hidden"  name="director" value="{{ $coursedirector->id }}">
                                                    <input type="text" class="form-control" value="{{ $coursedirector->first_name.' '.$coursedirector->middle_name.' '.$coursedirector->last_name }}" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-12 col-sm-12">Course Coordinator<span class="text-danger">
                                                        *</span></label>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <input type="hidden" name="coordinator" value="{{ $courseCoordinator->id }}">
                                                    <input type="text" class="form-control" value="{{ $courseCoordinator->first_name.' '.$courseCoordinator->middle_name.' '.$courseCoordinator->last_name }}" readonly>
                                                    
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-12 col-sm-12">Course Purpose</label>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <textarea type="text" name="purpose" id="purpose" class="form-control ajax-course-details-data-insert"
                                                        placeholder="Course Purpose"></textarea>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        </div>
                                    
                                    </div>
                                </div>

                            </div>
                                
                            </div>
                        <div class=" mt-2 mb-2 ajax-course-duration-data-container">
                            <div class="card">
                                <div class="card-header">
                                        Course Duration
                                    </div>
                                    <div id="curriculam_error_area"></div>
                                        <div class="card-body">
                                                <div class="row">
                                                    <!--Left-->
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label text-right col-lg-4 col-sm-12">Course Hours<span
                                                                    class="text-danger">
                                                                    *</span></label>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <input type="number" placeholder="Course Total Hour" class="form-control" name="hour"
                                                                    value="{{ old('hour') }}" required step="0.01">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label text-right col-lg-4 col-sm-12">Course Duration<span
                                                                    class="text-danger">
                                                                    *</span></label>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <input type="number" placeholder="Course Duration" class="form-control" name="duration"
                                                                    value="{{ old('duration') }}" required step="0.01">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-form-label text-right col-lg-4 col-sm-12">Total Trainees<span
                                                                    class="text-danger">
                                                                    *</span></label>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <input type="number" placeholder="Total Trainees" class="form-control"
                                                                    name="total_trainees" value="{{ old('total_trainees') }}" required step="0.01">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-form-label text-right col-lg-4 col-sm-12">Trainer Allowance</label>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <input type="number" placeholder="Trainer Allowance" class="form-control"
                                                                    name="total_trainer_allowance" value="{{ old('total_trainer_allowance') }}"  step="0.01">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--Right-->
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label text-right col-lg-4 col-sm-12">Month<span class="text-danger">
                                                                    *</span></label>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <select name="month" id="month" class="form-control" required>
                                                                    <option value="">-- Selet Month --</option>
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
                                                                <select name="trainee_type" id="month" class="form-control" required>
                                                                    <option value="">-- Selet Trainee Type --</option>
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
                                                                <select name="training_type" id="month" class="form-control" required>
                                                                    <option value="">-- Selet Trainee Type --</option>
                                                                    <option value="resident">resident</option>
                                                                    <option value="non resident">non resident</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label text-right col-lg-4 col-sm-12">Trainees Allowance</label>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <input type="number" placeholder="Trainees Allowance" class="form-control"
                                                                    name="total_trainees_allowance" value="{{ old('total_trainees_allowance') }}"
                                                                    step="0.01">
                                                            </div>
                                                        </div>
                                                    </div>
                                            
                                                </div>
                                        
                                            
                                                
                                            <div class="row">
                                            <div class="col-5 offset-8">
                                                <button type="submit" class="btn btn-success" >Create Course</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>

    </div>
@endsection
