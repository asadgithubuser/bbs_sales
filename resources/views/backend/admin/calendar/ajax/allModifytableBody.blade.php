
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
            <th>Comment for modify</th>
            <th>Actions</th>
        </tr>
    </thead>
    
    <form action="{{ route('admin.calender.requestApprovalFromModify') }}" method="post">
        @csrf
     
        <tbody>
            @php
            $count = 0;
                $i = (($calender->currentPage() - 1) * $calender->perPage() + 1);
            @endphp
            @forelse ($calender as $cal)
                <?php $count = 1 ?>
                <input type="hidden" name="items[]" value="{{ $cal->id }}">
                    @if($cal->course->forward == 1)
                        <tr>
                            <td>{{ $i }}</td>
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
                            <td>{{ $course->courseDuration->course_hour }}</td>
                            <td>{{ $course->courseDuration->total_trainees }}</td>
                            <td>{{ $course->courseDuration->trainee_type }}</td>
                            <td><span class="w3-text-red">{!! $cal->comment !!}</span></td>
                            <td>
                                <a href="{{route('admin.course.show', ['id' => $cal->course->id, 'type'=> 'details'])}}" class="btn btn-primary btn-sm" title="show"><i class="la la-eye"></i></a>
                                <a href="{{route('admin.course.edit', ['course_id' => $cal->course->id, 'type'=> 'modify-update'])}}" class="btn btn-warning btn-sm" title="edit"><i class="la la-pencil"></i></a> 
                            </td>
                        </tr>
                    @endif

                @php
                    $i++;
                @endphp
            @empty  
                <tr>
                    <td colspan="9"><p class="text-center">Item NOT Found.</p></td>
                </tr>   
            @endforelse
        </tbody>

        @if($count > 0)
            @if($type=="request_for_changes")
                <button type="submit" class="btn btn-success btn block">Request For Approval</button>
            @endif
        @endif
    </form>
</table>