
      <form action="{{ route('admin.course.trainneModifyUpdate') }}" method="POST">
        @csrf
        <table class="table table-separate table-head-custom table-checkable table-striped" id="">
        <thead>
            <tr>
                <th>#</th>
                <th>Employee Name</th>
                <th>Wing</th>
                <th>Designation</th>
                <th>Course Name</th>
                <th>Course Hours</th>
                <th>Fiscal Year</th>
                <th>Comment</th>
                <th>Actions</th>
            </tr>
        </thead>

            <tbody>
                @php
                $count = 0;
                    $i = (($trainingCourseListDetails->currentPage() - 1) * $trainingCourseListDetails->perPage() + 1);
                @endphp
                 
                @forelse ($trainingCourseListDetails as $tcld )
                    <input type="hidden" name="modifyTraineeListIds[]" value="{{ $tcld->id }}" />
                     <?php $count = 1 ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="modifyTraineeListIds[]" class="trainee_candidate_cls form-check text-center d-inline" value="{{ $tcld->id }}" />
                                </td>
                                <td align="left">{{ $tcld->user->first_name }}</td>
                                <td align="left">{{ $tcld->user->department->name_en }}</td>
                                <td>{{ $tcld->user->designation->name_en }}</td>
                                <td>{{ $tcld->course_training_list-> course->courseTitle->title  }}</td>
                                <td>{{ $course_hour[$tcld->user->id] }}</td>
                                <td>{{ $tcld->course_training_list->course->courseYear->name }}</td>
                                <td style="color:red">{{ $tcld->claim_modify_trainee->comment }}</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm" title="show"><i class="la la-eye"></i></a>
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#claimModifyForTrainee"><i class="la la-pencil"></i></button>     
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
                <button type="submit" class="btn btn-success btn block">Request For Approval</button>
            @endif
    </table>
</form>
@include('backend.admin.calendar.modal')
<script>
    function claimForModify_modal_btn(user_id, ctld_id){
        $('#user_id_val').val(user_id);
        $('#ctld_id_val').val(ctld_id);
        $('#claimForModify').modal('show')
    }
</script>
