
    <div class="card card-custom example example-compact">
        <div class="card-header">
            <h3 class="card-title font-weight-normal">All Courses</h3>
        </div>
        <div class="card-body">
            <table class="table table-separate table-head-custom table-checkable table-striped" id="">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Course Name</th>
                        <th>Trainer Name</th>
                        <th>Fiscal Year</th>
                        <th>Month</th>
                        <th>Duration</th>
                        <th>Schedule</th>
                        <th>Trainee Type</th>
                        <th>Number of Trainees</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($trainingCourseDetails as $tcld)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $tcld->course_training_list->course->title }}</td>
                                    <td>{{ $tcld->course_training_list->course->trainer->name }}</td>
                                    <td>{{ $tcld->course_training_list->course->courseYear->name }}</td>
                                    <td>{{ $tcld->course_training_list->course->courseDuration->month }}</td>
                                    <td>{{ $tcld->course_training_list->course->courseDuration->duration }}</td>
                                    <td>{{ $tcld->course_training_list->course->courseDuration->start_date }} - {{  $tcld->course_training_list->course->courseDuration->end_date}}</td>
                                    <td>{{  $tcld->course_training_list->course->courseDuration->trainee_type }}</td>
                                    <td>{{  $tcld->course_training_list->course->courseDuration->total_trainees }}</td>
                                    
                                    <td>
                                        <a href="{{ route('admin.trainee.traineeDetailsShow', ['id'=>$tcld->course_training_list->course->id]) }}" class="btn btn-primary btn-sm" title="show"><i class="la la-eye"></i></a>
                                    </td>
                                </tr>
                            
                        @endforeach
                    </tbody>
                
            </table>
        </div>
    </div>