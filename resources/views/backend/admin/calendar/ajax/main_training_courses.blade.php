@if($type == 'main_training_courses')
<form action="{{ route('admin.course.finalApprovalRequestToCD') }}" method="POST">
@elseif($type == 'traineeList')
<form action="{{ route('admin.course.forwardTraineeList') }}" method="POST">
@elseif($type == 'pending_trainee_list')
<form action="{{ route('admin.course.trainneApprovedForWaiting') }}" method="POST">
@else
<form action="{{ route('admin.course.publishTrainingCourse') }}" method="POST">
@endif
    @csrf
    <table class="table table-separate table-head-custom table-checkable table-striped" id="">
        <thead>
            <tr>
                <th>#</th>
                <th >Course Name</th>
                <th >Trainer Name</th>
                <th>Fiscal Year</th>
                <th>Month</th>
                <th>Duration</th>
                <th>Schedule</th>
                <th>Trainee Type</th>
                <th>Total Trainees</th>
                <th>Actions</th>
            </tr>
        </thead>

            @if ($courses->count() > 0)
                @if($type == 'pending_trainee_list')
                    <button type="submit" class="btn btn-success btn block">Approved All</button>
                @elseif($type == 'main_training_courses' || $type == 'traineeList')
                    <button type="submit" class="btn btn-success btn block">Request For Approval</button>
                @else
                    <button type="submit" class="btn btn-success btn block">Publish Courses</button>
                @endif
            @endif
            <tbody>
                @php
                    $i = (($courses->currentPage() - 1) * $courses->perPage() + 1);
                @endphp
                @forelse ($courses as $course)
                    <?php if($course != null){ ?>
                        <tr>
                        @if($type == 'traineeList')
                            @if($course->courseListDetails->forward == 1)
                                <td> <span class="badge badge-warning">pending</span> </td> 
                            @elseif($course->courseListDetails->forward == 3)
                                <td> <span class="badge badge-success">approved</span> </td> 
                            @else
                                <td>
                                    <input type="checkbox" name="trainingCourseListIds[]" value="{{ $course->id }}">
                                </td>
                            @endif
                        @elseif($type == 'pending_trainee_list')
                            @if($course->courseListDetails->forward == 3)
                                <td> <span class="badge badge-success">approved</span> </td> 
                            @else
                                <td>
                                    <input type="checkbox" name="trainingCourseListIds[]" value="{{ $course->id }}">
                                </td>
                            @endif 
                        @elseif($type == 'main_training_courses')
                            @if($course->forward == 2 && $course->is_published == 0)
                                <td> <span class="badge badge-warning">pending</span> </td>
                            @elseif($course->forward == 2 && $course->is_published == 1)
                                <td> <span class="badge badge-success">approved</span> </td>
                            @else
                                <td>
                                    <input type="checkbox" name="courseIds[]" class="form-check text-center d-inline" value="{{ $course->id }}" />
                                </td>
                            @endif
                        @else
                            @if ($course->is_published == 1)
                                <td> <span class="badge badge-warning">published</span> </td>
                            @else
                                <td>
                                    <input type="checkbox" name="courseIds[]" class="form-check text-center d-inline" value="{{ $course->id }}" />
                                </td>
                            @endif
                        @endif

                            <td>{{ $course->title }}</td>
                            <td>{{ $course->trainer->name }}</td>
                            <td>{{ $course->courseYear->name }}</td>
                            <td>{{ $course->courseDuration->month }}</td>
                            <td>{{ $course->courseDuration->duration }}</td>
                            <td>{{ $course->courseDuration->start_date }} - {{  $course->courseDuration->end_date }}</td>
                            <td>{{ $course->courseDuration->trainee_type }}</td>
                            <td>{{ $course->courseDuration->total_trainees }}</td>
                            <td>

                            @if($type == 'training_course_list_cd')
                                @if ($course->is_published == 0)
                                    <a href="{{ route('admin.course.addScheduleAndTrainerToCourse',$course->id) }}" class="btn btn-warning btn-sm" title="show"><i class="la la-pencil"></i></a>
                                    @endif
                            @endif
                            @if($type == 'traineeList' || $type == 'pending_trainee_list')
                                <a href="{{ route('admin.trainee.viewTraineeList', ['id'=>$course->id]) }}" class="btn btn-primary btn-sm" title="show"><i class="la la-eye"></i></a>

                                @if($type == 'traineeList' && $course->courseListDetails->forward == 0)
                                    <a href="{{ route('admin.course.editTraineeList',['id' => $course->trainingCourseList->id, 'type2' => 'traineeList']) }}" class="btn btn-warning btn-sm" title="show"><i class="la la-pencil"></i></a>
                                @elseif($type == 'pending_trainee_list' && $course->courseListDetails->forward == 1)
                                    <a href="{{ route('admin.course.editTraineeList',['id' => $course->trainingCourseList->id, 'type2' => 'pending_trainee_list']) }}" class="btn btn-warning btn-sm" title="show"><i class="la la-pencil"></i></a>
                                @endif
                            @else
                            <a href="{{ route('admin.course.getWaitingTraineeList', ['id'=>$course->id]) }}" class="btn btn-primary btn-sm" title="show3"><i class="la la-eye"></i></a>

                            @endif
                                
                            </td>
                        </tr>
                    <?php } ?>
                    @php
                        $i++;
                    @endphp

                @empty  
                    <tr>
                        <td colspan="9"><p class="text-center">Item NOT Found.</p></td>
                    </tr>   
                @endforelse
            </tbody>
        
    </table>
</form>
  