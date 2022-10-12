    <form action="{{ route('admin.course.traineeApprovedForFinalList') }}" method="POST">

        @csrf 
  <table class="table table-separate table-head-custom table-checkable table-striped" id="">
        <thead>
            <tr>
                <th>#</th>
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
                                
                                <td>{{ $tcld->course_training_list->course->courseTitle->title  }}</td>
                                <td>{{ $tcld->course_training_list->course->courseYear->name }}</td>
                                <td>Batch-@if(isset($tcld->course_duration)){{ $tcld->course_duration->batch_no }} @endif</td>
                                <td>@if(isset($tcld->course_curriculam)){{ $tcld->course_curriculam->subject_title }}@endif</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm" title="show"><i class="la la-eye"></i></a>
                                    <a href="{{ route('admin.course.editFinalTrainingList',$tcld->course_training_list->course->id ) }}" class="btn btn-warning btn-sm"><i class="la la-pencil"></i></a>
                                   
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
                <button type="submit" class="btn btn-success btn block">
                Approved All</button>
               
            @endif
    </table>
</form>


