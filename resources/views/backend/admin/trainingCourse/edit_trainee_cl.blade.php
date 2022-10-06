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
            <form action="{{ route('admin.course.updateTraineeList', $type2) }}" method="post">
                @csrf
                <div class="row">
                <div class="col-lg-12">
                    <input type="hidden" name="trainign_course_list" value="{{ $trainign_course_list->id }}" />
                    <input type="hidden" name="course_id" value="{{ $trainign_course_list->course_id }}" />
                    <!--begin::Card-->
                    <div class="card card-custom example example-compact">
                    <div class="card-header">
                        <h3 class="card-title font-weight-normal">Create Trainee List for<strong class="ml-2" style="font-weight:700 !important;"> {{ $trainign_course_list->course->title }}</strong></h3>
                        
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ajax-data-container pt-3">                                
                        <div class="container">
                    <div class="form-group">

                    <table class="table table-separate table-head-custom table-checkable table-striped" id="">
                    <thead>
                        <tr>
                            <th>Select </th>
                            <th">Name</th>
                            <th>Designation</th>
                            <th>Department</th>
                            <th>BBS ID</th>
                            <th>Training Hour</th>
                        </tr>
                    </thead>
                        <tbody>
                        @foreach($trainee_list as $key => $trainee)
                        <?php
                            $traineeExist = App\Models\TrainingCourseListDetails::where(['course_id' => $trainign_course_list->course_id, 'user_id' => $trainee->id])->first();
                        ?>
                            <tr>
                                <td>
                                @if($traineeExist != null)
                                    <input name="trainee[{{$key}}][id]" type="checkbox" class="trainee_candidate_cls22 form-check text-center d-inline" value="{{ $trainee->id }}" checked/>
                                @else
                                    <input name="trainee[{{$key}}][id]" type="checkbox" class="trainee_candidate_cls22 form-check text-center d-inline" value="{{ $trainee->id }}" />

                                @endif
                                </td>
                                <td>{{ $trainee->first_name }}</td>
                                <td>{{ $trainee->designation->name_en }}</td>
                                <td>{{ $trainee->department->name_en }}</td>
                                <td>bbs id</td>
                                <td>@if( $course_hour[$trainee->id] >= 100) <span class="text-danger bold">{{ $course_hour[$trainee->id] }}</span>@else {{ $course_hour[$trainee->id] }} @endif</td>
                                
                            </tr>
                        @endforeach                            
                        </tbody>
                    </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="create-trainee-list22 btn btn-primary">Update List</button>
                    </div> 
                </form>
                </div>  

                </div>
                @if($type == 'training_course_list' && $type != 'traineeList' && $type != 'pending_trainee_list' && $type != 'claim_modify_trainee_list' && $type != 'approved_trainee_list' && $type != 'modified_trainee_list')
                {{ $calender->links() }}
                @endif
                </div>
                </div>
                <!--end::Card-->
                </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection