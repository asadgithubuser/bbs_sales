
  
<form action="{{ route('admin.course.trainneApproveForCco') }}" method="POST">
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
                <th>Module</th>
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
                    <input type="hidden" name="items[]" value="{{ $tcld->id }}">
                            <tr>
                                <td>{{ $i ++ }}</td>
                                <td align="left">{{ $tcld->user->first_name }}</td>
                                <td align="left">{{ $tcld->user->department->name_en }}</td>
                                <td>{{ $tcld->user->designation->name_en }}</td>
                                <td>{{ $tcld->course_training_list->course->title }}</td>
                                <td>{{ $tcld->course_training_list->course->courseYear->name }}</td>
                                <td>Batch-{{ $tcld->course_duration->batch_no }}</td>
                                <td>{{ $tcld->course_curriculam->subject_title }}</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm" title="show"><i class="la la-eye"></i></a>   
                                    <button type="button"  class="btn btn-warning btn-sm" ><i class="la la-pencil"></i></button>           
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
                    Request For Approval to CCO </button>
            @endif
  
    </table>
</form>

