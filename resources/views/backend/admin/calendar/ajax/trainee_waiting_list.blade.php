@if($type=="pending_trainee_list")
        <form action="{{ route('admin.course.trainneApprovedForWaiting') }}" method="POST">
@else
    <form action="{{ route('admin.course.traineeApprovedForFinalList') }}" method="POST">
@endif
        @csrf 
    <table class="table table-separate table-head-custom table-checkable table-striped" id="">
        <thead>
            <tr>
                <th>#</th>
                <th>Employee Name</th>
                <th>Dept. Name</th>
                <th>Designation</th>
                <th>Course Name</th>
                <th>Fiscal Year</th>
                <th>Batch Name</th>
                <th>Module No</th>
                <th>Actions</th>
            </tr>
        </thead>

            <tbody>
                @php
                $count = 0;
                    $i = (($trainingCourseListDetails->currentPage() - 1) * $trainingCourseListDetails->perPage() + 1);
                @endphp
                 
                @forelse ($trainingCourseListDetails as $tcld )
                     <?php $count = 1 ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="waitingTaineeIds[]" class="trainee_candidate_cls form-check text-center d-inline" value="{{ $tcld->id }}" />
                                </td>
                                <td>{{ $tcld->user->first_name }}</td>
                                <td>{{ $tcld->user->department->name_en }}</td>
                                <td>{{ $tcld->user->designation->name_en }}</td>
                                <td>{{ $tcld->course_training_list->course->courseTitle->title  }}</td>
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
                            @php
                                $i++;
                            @endphp
                @empty  
                    <tr>
                        <td colspan="9"><p class="text-center">Item NOT Found.</p></td>
                    </tr>   
                @endforelse
            </tbody>

            @if ($count > 0)
                @if ($type == 'waiting_training_courses')
                <button type="submit" class="btn btn-success btn block">Approved Trainee List</button>
                @elseif($type == 'pending_trainee_list')
                <button type="submit" class="btn btn-success btn block">
                Approved All </button>
                @elseif($type == 'main_trainee_list')
                    <button type="submit" class="btn btn-success btn block">Move To Main List</button>
                @endif
            @endif
    </table>
</form>

@include('backend.admin.calendar.trainee_modify_comment_modal')
<script>
    function claimForModifyTrainee_modal_btn(user_id, ctld_id){
        $('#user_id_val').val(user_id);
        $('#ctld_id_val').val(ctld_id);

        $('#claimModifyForTrainee').modal('show')
    }
</script>