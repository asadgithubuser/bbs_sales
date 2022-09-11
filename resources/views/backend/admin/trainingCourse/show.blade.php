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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Show Course Detail</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                            </li>
                        
                            <li class="breadcrumb-item active">
                                <a class="text-muted">Show course details</a>
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
                                <h3 class="card-title">{{ $course->title }}</h3> 
                                
                                @if($type == 'modify_in_details')
                                    <button  style="height: 40px; margin-top: 15px;" type="button" onclick="createCourse_modal_btn(this.id)" id="{{ $course->id }}" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#claimForModify">Send For Modify</button>
                                @endif
                            </div>

                            <div class="container mt-2 mb-2">
                                <div class="card">
                                    <div class="card-header">
                                        Course Details
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive mt-10">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <th> Course Title </th>
                                                    <th> Fiscal Year </th>
                                                    <th> Course Director </th>
                                                    <th> Course Coordinator </th>
                                                    <th> Course Purpose </th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{$course->title}}</td>
                                                        <td>{{$course->courseYear ? $course->courseYear->name : ''}}</td>
                                                        
                                                        <td>{{$course->courseDirector ? $course->courseDirector->first_name.' '.$course->courseDirector->middle_name.' '.$course->courseDirector->last_name : ''}}</td>

                                                        <td>{{$course->courseCoordinator ? $course->courseCoordinator->first_name.' '.$course->courseCoordinator->middle_name.' '.$course->courseCoordinator->last_name : ''}}</td>

                                                        <td>{{$course->course_purpose}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="container mt-2 mb-2">
                                <div class="card">
                                    <div class="card-header">
                                        Course Duration
                                    </div>
                                    <div class="card-body">
                                        @if ($course->courseDuration->count() > 0)
                                            <div class="table-responsive mt-10">
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                        <th>Batch no</th>
                                                        <th>Month </th>
                                                        <th>Duration </th>
                                                        <th>Trainee type </th>
                                                        <th>Course hour </th>
                                                        <th>Total trainees </th>
                                                        <th>Training type </th>
                                                        <th>Total trainer allowance </th>
                                                        <th>Total trainee allowance </th>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($course->courseDurations as $courseDuration)
                                                            <tr>
                                                                <td>Batch-{{ $courseDuration->batch_no }}</td>
                                                                <td>{{ $courseDuration->month }}</td>
                                                                <td>{{ $courseDuration->duration }} Days</td>
                                                                <td>{{ $courseDuration->trainee_type }}</td>
                                                                <td>{{ $courseDuration->course_hour }}</td>
                                                                <td>{{ $courseDuration->total_trainees }}</td>
                                                                <td>{{ $courseDuration->training_type }}</td>
                                                                <td>{{ $courseDuration->total_trainer_allowance }} TK</td>
                                                                <td>{{ $courseDuration->total_trainee_allowance }} TK</td>
                                                            </tr>
                                                        @empty  
                                                            <tr>
                                                                <td colspan="9"><p class="text-center">Item NOT Found.</p></td>
                                                            </tr>   
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="container mt-2 mb-2">
                                <div class="card">
                                    <div class="card-header">
                                        Trainer detail
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive mt-10">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <th>Photo</th>
                                                    <th>Name</th>
                                                    <th>Mobile</th>
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <img width="100px" src="{{asset('storage/trainers/'.$course->trainer->photo)}}" alt="{{$course->trainer->name}}">
                                                        </td>
                                                        <td>{{ $course->trainer->name }}</td>
                                                        <td>{{ $course->trainer->phone }}</td>
                                                        <td>{{ $course->trainer->email }}</td>
                                                        <td>{{ $course->trainer->address }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @if ($type == 'modify_in_details')
        @include('backend.admin.calendar.modal')
    @endif

    <script>
        function createCourse_modal_btn(id){
            $('#course_id').val(id);
            $('#sendToWingModal').modal('show')
        }

    </script>
@endsection