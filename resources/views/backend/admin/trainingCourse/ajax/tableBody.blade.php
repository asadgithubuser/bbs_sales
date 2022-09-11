<form action="{{ route('admin.course.sendForApproval') }}" method="post">
    @csrf
    <table class="table table-separate table-head-custom table-checkable table-striped" id="">
        <thead>
            <tr>
                <th>#</th>
                <th>Course Name</th>
                <th>Trainer Name</th>
                <th>Fiscal Year</th>
                <th>Month</th>
                <th>Course Hours</th>
                <th>Total Trainees</th>
                <th>Trainee Type</th>
                <th>Actions</th>
            </tr>
        </thead>

            <tbody>
                @php
                    $i = (($courses->currentPage() - 1) * $courses->perPage() + 1);
                @endphp
                    @forelse ($courses as $course)
                        <input type="hidden" name="items[]" value="{{ $course->id }}">
                        @if(isset($q))
                        <input type="hidden" name="fiscal_id" value="{{ $q }}">
                        @endif
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->trainer ? $course->trainer->name : '' }}</td>
                            <td>{{ $course->courseYear ?  $course->courseYear->name : ''}}</td>
                            <td>{{ $course->courseDuration->month }}</td>
                            <td>{{ $course->courseDuration->course_hour }}</td>
                            <td>{{ $course->courseDuration->total_trainees }}</td>
                            <td>{{ $course->courseDuration->trainee_type }}</td>
                            
                            <td>
                                @if ($course->forward == null)
                                    <a href="{{route('admin.course.show', ['id' => $course->id, 'type'=> 'details'])}}" class="btn btn-primary btn-sm" title="show"><i class="la la-eye"></i></a>

                                    @if($course->courseYear->status == 1)
                                        <a href="{{route('admin.course.edit', ['course_id' => $course->id, 'type'=> 'update'])}}" class="btn btn-warning btn-sm" title="edit 2"><i class="la la-pencil"></i></a>
                                    @endif
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
            @if ($courses->count() > 0 )
                @if ( $type == 'sent_course_list' )
                    <span style="cursor:default" class="btn btn-warning">Request Sent For Approval</span>
                @else
                    <button id="course_list_btn" class="btn btn-success btn block">Request For Approval</button>
                @endif
            @endif

    </table>
</form>