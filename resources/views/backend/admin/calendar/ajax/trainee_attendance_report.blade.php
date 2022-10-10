<table class="table table-separate table-head-custom table-checkable table-striped" id="">
    <thead>
        <tr>
            <th>Name</th>
            <th>Designation</th>
            <th>Department</th>
            <th>Course Name</th>
            <th>Duration</th>
            <th>Present</th>
            <th>Absent</th>
        </tr>
    </thead>
    <tbody>
    @forelse ($main_trainingCourseListDetails as $key => $tcld )
            <tr>
                <td>{{ $tcld->user->first_name }} {{ $tcld->user->last_name }}</td>
                <td>{{ $tcld->user->designation->name_en }}</td>
                <td>{{ $tcld->user->department->name_en }}</td>
                <td>{{ $tcld->course_training_list-> course->courseTitle->title  }}</td>
                <td>{{ $tcld->course_training_list->course->courseDuration->duration }}</td>
                <td><span class="badge badge-primary">{{ $tcld->course_training_list->course->traineeAttendancePresent($tcld->user->id) }}</span></td>
                <td><span class="badge badge-warning">{{ $tcld->course_training_list->course->traineeAttendanceAbsent($tcld->user->id) }}</span></td>
                
            </tr>
            @empty  
                <tr>
                    <td colspan="9"><p class="text-center">Item NOT Found.</p></td>
                </tr>   
            @endforelse                        
    </tbody>
</table>



       

        




