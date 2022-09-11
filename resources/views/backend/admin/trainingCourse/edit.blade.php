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
                                <h3 class="card-title">Update Course</h3>
                            </div>
                        <form action="{{ route('admin.course.update') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $type }}" name="update_type">
                            <input type="hidden" value="{{ $course->id }}" name="course_idd">
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
                                                        value="{{ $course->title }}" class="form-control ajax-course-details-data-insert" name="title"
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
                                                            <option @if($course->fiscal_year_id == $year->id) selected @endif value="{{ $year->id }}">{{ $year->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-12 col-sm-12">Trainer</label>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <select name="trainer" id="trainer" class="form-control ajax-course-details-data-insert">
                                                        @foreach ($trainers as $trainer)
                                                            <option @if($course->trainer_id == $trainer->id) selected @endif value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-6">
                                        <div class="form-group row">
                                                <label class="col-form-label col-lg-12 col-sm-12">Course Director<span class="text-danger">
                                                        *</span></label>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                
                                                    <input type="hidden"  name="director" value="{{ $coursedirector->id }}">
                                                    <input type="text" class="form-control" value="{{ $coursedirector->first_name.' '.$coursedirector->middle_name.' '.$coursedirector->last_name }}" readonly >
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
                                                    <textarea type="text" name="purpose" id="purpose" class="form-control ajax-course-details-data-insert">{{ $course->course_purpose }}</textarea>
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
                                                                value="{{ $course->courseDuration->course_hour }}" required step="0.01">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label text-right col-lg-4 col-sm-12">Course Duration<span
                                                                    class="text-danger">
                                                                    *</span></label>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <input type="number" placeholder="Course Duration" class="form-control" name="duration"
                                                                value="{{ $course->courseDuration->duration }}" required step="0.01">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-form-label text-right col-lg-4 col-sm-12">Total Trainees<span
                                                                    class="text-danger">
                                                                    *</span></label>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <input type="number" placeholder="Total Trainees" class="form-control"
                                                                    name="total_trainees" value="{{ $course->courseDuration->total_trainees }}" required >
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-form-label text-right col-lg-4 col-sm-12">Trainer Allowance</label>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <input type="number" class="form-control" value="{{ $course->courseDuration->total_trainer_allowance }}" name="total_trainer_allowance" >
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
                                                                    <option @if($course->courseDuration->month == 'January') selected @endif value="January">January</option>
                                                                    <option @if($course->courseDuration->month == 'February') selected @endif value="February">February</option>
                                                                    <option @if($course->courseDuration->month == 'March') selected @endif value="March">March</option>
                                                                    <option @if($course->courseDuration->month == 'April') selected @endif value="April">April</option>
                                                                    <option @if($course->courseDuration->month == 'May') selected @endif value="May">May</option>
                                                                    <option @if($course->courseDuration->month == 'June') selected @endif value="June">June</option>
                                                                    <option @if($course->courseDuration->month == 'July') selected @endif value="July">July</option>
                                                                    <option @if($course->courseDuration->month == 'August') selected @endif value="August">August</option>
                                                                    <option @if($course->courseDuration->month == 'September') selected @endif value="September">September</option>
                                                                    <option @if($course->courseDuration->month == 'October') selected @endif value="October">October</option>
                                                                    <option @if($course->courseDuration->month == 'November') selected @endif value="November">November</option>
                                                                    <option @if($course->courseDuration->month == 'December') selected @endif value="December">December</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label text-right col-lg-4 col-sm-12">Trainee Type<span
                                                                    class="text-danger">
                                                                    *</span></label>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <select name="trainee_type" id="month" class="form-control" required>
                                                                    <option value="">-- Select Trainee Type --</option>
                                                                    <option @if($course->courseDuration->trainee_type == 'Officer') selected @endif value="Officer">Officer</option>
                                                                    <option @if($course->courseDuration->trainee_type == 'Employee') selected @endif value="Employee">Employee</option>
                                                                    <option @if($course->courseDuration->trainee_type == 'Officer/Employee') selected @endif value="Officer/Employee">Officer/Employee</option>
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
                                                                    <option @if($course->courseDuration->training_type == 'resident') selected @endif  value="resident">resident</option>
                                                                    <option @if($course->courseDuration->training_type == 'non resident') selected @endif  value="non resident">non resident</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label text-right col-lg-4 col-sm-12">Trainees Allowance</label>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <input type="number" class="form-control" value="{{ $course->courseDuration->total_trainee_allowance }}" name="total_trainees_allowance">

                                                            </div>
                                                        </div>
                                                    </div>
                                            
                                                </div>
                                        
                                            <div class="row">
                                            <div class="col-5 offset-8">
                                                <button type="submit" class="btn btn-success">Update Course</button>
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
