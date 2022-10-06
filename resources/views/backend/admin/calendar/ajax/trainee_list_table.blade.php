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
                <th>Actions</th>
            </tr>
        </thead>
            <tbody>
                @php
                    $i = (($trainingCourseListDetails->currentPage() - 1) * $trainingCourseListDetails->perPage() + 1);
                @endphp
                 <?php  $i = 1;
                        $ii = 1; ?>
                @forelse ($trainingCourseListDetails as $tcld)
                    <input type="hidden" name="trainingCourseListIds[]" value="{{ $tcld->id }}">
                    <tr>
                        <td>{{ $ii ++ }}</td>
                        <td>{{ $tcld->user->first_name }}</td>
                        <td>{{ $tcld->user->department->name_en }}</td>
                        <td>{{ $tcld->user->designation->name_en }}</td>
                        <td>{{ $tcld->course_training_list->course->title }}</td>
                        <td>{{ $course_hour[$tcld->user->id] }}</td>
                        <td>{{ $tcld->course_training_list->course->courseYear->name }}</td>
                        <td>
                            <a href=" " class="btn btn-primary btn-sm" title="show"><i class="la la-eye"></i></a>
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
          
    </table>




