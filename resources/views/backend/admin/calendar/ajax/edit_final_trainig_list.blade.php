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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">All {{ ucfirst($type)}} Calendar</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                            </li>
                        
                            <li class="breadcrumb-item active">
                                <a class="text-muted">All {{ ucfirst($type)}} Calendar List</a>
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
                <!--begin::Card-->
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <div class="card card-custom example example-compact">
                            <div class="card-header">
                                <h3 class="card-title font-weight-normal">Update Training List for <strong class="font-weight-700 ml-2">{{ $course->title }}</strong></h3>
                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ajax-data-container pt-3">
                                <form action="{{ route('admin.course.traineeApprovedForFinalList') }}" method="POST">

                                    @csrf 
                                    <table class="table table-separate table-head-custom table-checkable table-striped" id="">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th >Employee Name</th>
                                            <th >Dept. Name</th>
                                            <th>Designation</th>
                                            <th>Course Name</th>
                                            <th>Fiscal Year</th>
                                            <th>Batch Name</th>
                                            <th>Module No</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                        <tbody>
                                            
                                            @foreach ($course->trainingCourseList->approved_users_course_details as $tcld )
                                                <?php $count = 1 ?>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="waitingTaineeIds[]" class="trainee_candidate_cls form-check text-center d-inline" value="{{ $tcld->id }}" />
                                                    </td>
                                                    <td align="left">{{ $tcld->user->first_name }}</td>
                                                    <td align="left">{{ $tcld->user->department->name_en }}</td>
                                                    <td>{{ $tcld->user->designation->name_en }}</td>
                                                    <td>{{ $tcld->course_training_list->course->title }}</td>
                                                    <td>{{ $tcld->course_training_list->course->courseYear->name }}</td>
                                                    <td>Batch-@if(isset($tcld->course_duration)){{ $tcld->course_duration->batch_no }} @endif</td>
                                                    <td>@if(isset($tcld->course_curriculam)){{ $tcld->course_curriculam->subject_title }}@endif</td>
                                                    <td>
                                                        <a href="" class="btn btn-primary btn-sm" title="show"><i class="la la-eye"></i></a>
                                                        @if ($type == 'pending_trainee_list')
                                                        <button type="button" onclick="claimForModifyTrainee_modal_btn(this.id, this.value)" id="{{ $tcld->user->id }}" value="{{ $tcld->id }}" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#claimModifyForTrainee"><i class="la la-calendar-times"></i></button>
                                                        @endif
                                                        
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                            <button type="submit" class="btn btn-success btn block">
                                            Approved All</button>
                                        
                                    </table>
                                    </form>


                        
                                </div>
                               
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                </div>

                <div class="row">
                
                    @forelse ($course->courseDuration as $courseDuration)
                        <!--begin::Card-->
                        <div class="col-lg-12">
                            <div class="card card-custom example example-compact">
                                <div class="card-header">
                                    <h3 class="card-title font-weight-normal">Batch-{{ $courseDuration->batch_no}}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="ajax-data-container pt-3">
                                    <form action="" id="addcurriculam_form" class="add-course-curriculam">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-12 col-sm-12">Schedule <span
                                                        class="text-danger">
                                                        *</span></label>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <input type="number" placeholder="{{ $courseDuration->duration }} days shedule" class="form-control" id="module_no" name="module_no"
                                                        value="{{ old('module_no') }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        

                                        <div class="col-lg-4 col-sm-12">
                                            <div class="form-group ">
                                                <label class="col-form-label col-lg-12 col-sm-12">Trainer <span
                                                        class="text-danger">
                                                        *</span></label>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <select name="selected_course_id" id="selected_course_id" class="form-control ajax-courert">
                                                    @foreach($trainers as $trainer)
                                                                <option @if($trainer->id == $courseDuration->id ) selected @endif value="1">{{ $trainer->name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-12">
                                        <label class="col-form-label col-lg-12 col-sm-12"> <span
                                                        class="text-danger">
                                                        </span></label>
                                        <button class="btn btn-block btn-secondary mt-5" id="addcurriculam_btn" type="submit">Add Trainer From Outside</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-12 col-sm-12">Trainer Allowance <span
                                                        class="text-danger">
                                                        *</span></label>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <input type="number" placeholder="Module Number" class="form-control" id="module_no" name="module_no"
                                                        value="{{ $courseDuration->total_trainer_allowance }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-12">
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-12 col-sm-12">Trainees Allowance <span
                                                        class="text-danger">
                                                        *</span></label>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <input type="text" placeholder="Subject Title" id="subject_title" class="form-control" name="subject_title"
                                                        value="{{ $courseDuration->total_trainee_allowance }}" required>
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                        

                                        <div class="col-md-3 offset-md-4">
                                            <button class="btn btn-block btn-info" id="addcurriculam_btn" type="submit">Update Batch Info</button>
                                        </div>
                                    </div>
                                </form>

                            
                                    </div>
                                
                                </div>
                            </div>
                            <!--end::Card-->

                        </div>

                    @empty  
                    <tr>
                        <td colspan="9"><p class="text-center">Item NOT Found.</p></td>
                    </tr>   
                    @endforelse
                </div>


            </div>
        </div>
    </div>
    
@endsection