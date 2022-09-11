
<table class="table table-separate ajax-data-container22 table-head-custom table-checkable table-striped" id="">
    <thead>
        <tr>
            <th>#</th>
            <th >Course Name</th>
            <th >Trainer Name</th>
            <th>Fiscal Year</th>
            <th>Month</th>
            <th>Total Trainees</th>
            <th>Trainee Type</th>
            <th>Actions</th>
        </tr>
    </thead>
    <form action="{{ route('admin.calender.approved') }}" method="post">
        @csrf
        @if ($calender->count() > 0)
            @if ($type == 'pending')
                <button type="submit" class="btn btn-success btn block">Approved All</button>
            @endif

        @endif
        <tbody>
            @php
                $i = (($calender->currentPage() - 1) * $calender->perPage() + 1);
            @endphp
            @forelse ($calender as $cal)
                <tr>
                    <td>
                        @if ($type == 'pending')
                        <input class="ml-3" type="checkbox" name="items[]" value="{{ $cal->id }}">
                        @else
                            {{ $i }}
                        @endif
                    </td>
                    <td>{{$cal->course ? $cal->course->title : '' }}</td>
                    <td>
                        @if ($course = $cal->course)
                            {{ $course->trainer ? $course->trainer->name : '' }}
                        @endif
                    </td>
                    <td>
                        @if ($course = $cal->course)
                            {{ $course->courseYear ?  $course->courseYear->name : ''}}
                        @endif
                    </td>
                    <td>{{ $course->courseDuration->month }}</td>
                    <td>{{ $course->courseDuration->total_trainees }}</td>
                    <td>{{ $course->courseDuration->trainee_type }}</td>
                    
                    <td>
                        @if ($type == 'approved')
                            @if ($cal->course->trainingCourseList)
                                <button type="button" class="btn btn-success btn-sm disabled">Already Sent</button>
                        <a href="{{route('admin.course.addScheduleAndTrainerToCourse', $cal->course->id)}}" class="btn btn-warning btn-sm" title="show"><i class="la la-pencil"></i></a>
                            @else
                                @if ($cal->course->courseDuration->start_date != null)
                                    <button type="button" onclick="createCourse_modal_btn(this.id)" id="{{ $cal->course->id }}" class="btn btn-success btn-sm" data-toggle="modal" >Send to Wings</button>
                                    <a href="{{route('admin.course.addScheduleAndTrainerToCourse', $cal->course->id)}}" class="btn btn-warning btn-sm" title="show"><i class="la la-pencil"></i></a>
                                @else    
                                    <a href="{{route('admin.course.addScheduleAndTrainerToCourse', $cal->course->id)}}" class="btn btn-primary btn-sm" title="show">Add Schedule & Trainer</a>
                                @endif
                            @endif
                        @endif
                        @if($type == 'pending')
                            <a href="{{route('admin.course.show', ['id' => $cal->course->id, 'type'=> 'modify_in_details'])}}" class="btn btn-primary btn-sm" title="show "><i class="la la-eye"></i></a>
                        @else 
                            <a href="{{route('admin.course.show', ['id' => $cal->course->id, 'type'=> 'details'])}}" class="btn btn-primary btn-sm" title="show "><i class="la la-eye"></i></a>
                        @endif 
                        @if ($type == 'pending')
                        <button type="button" onclick="createCourse_modal_btn(this.id)" id="{{ $cal->course->id }}" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#claimForModify"><i class="la la-calendar-times"></i></button>
                        @endif

                    </td>
                </tr>
                @php
                    $i++;
                @endphp
            @empty
                <p class="text-center">Item NOT Found.</p>
            @endforelse
        </tbody>
        </form>
</table>

    <!-- Modal -->
    @if ($type == 'approved')
        @include('backend.admin.calendar.wing_modal')
    @endif
    @if ($type == 'pending')
        @include('backend.admin.calendar.modal')
    @endif
<script>
    function createCourse_modal_btn(id){
        $('#course_id').val(id);
        $('#sendToWingModal').modal('show')
    }

</script>
@push('stackScript')
<script>
    $('#allDeptCheck').click(function() {   
        if(this.checked) {
            document.querySelectorAll('.dept-list .row div .dept_list_item').forEach(function(e) {
                e.checked = true;                        
            });
        } else {
            document.querySelectorAll('.dept-list .row div .dept_list_item').forEach(function(e) {
                e.checked = false;                       
            });
        }
    });

</script>
@endpush
