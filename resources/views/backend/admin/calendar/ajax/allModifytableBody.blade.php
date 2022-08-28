
<table class="table table-separate table-head-custom table-checkable table-striped" id="">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Course Name</th>
            <th class="text-left">Trainer Name</th>
            <th>Fiscal Year</th>
            <th>Total Batch</th>
            <th>Total Module</th>
            <th>Comment for modify</th>
            <th>Actions</th>
        </tr>
    </thead>
    
    <form action="{{ route('admin.course.forwardCourse') }}" method="post">
        @csrf
        @foreach ($calender as $cal)
        <input type="hidden" name="items[]" value="{{ $cal->course_id }}">
        @endforeach
        <tbody>
            @php
                $i = (($calender->currentPage() - 1) * $calender->perPage() + 1);
            @endphp
            @foreach ($calender as $cal)
                
                <tr>
                    <td>{{ $i }}</td>
                    <td align="left">{{$cal->course ? $cal->course->title : '' }}</td>
                    <td align="left">
                        @if ($course = $cal->course)
                            
                            {{ $course->trainer ? $course->trainer->name : '' }}
                        @endif
                    </td>
                    <td>
                        @if ($course = $cal->course)

                        {{ $course->courseYear ?  $course->courseYear->name : ''}}
                        @endif

                    </td>
                    @if ($course = $cal->course)
                        @if (!$course->courseDuration)
                            <td></td>
                        @else
                            <td>{{$course->courseDuration->count()}}</td>
                        @endif

                        @if(!$course->courseCurriculam)
                            <td></td>
                        @else
                            <td>{{$course->courseCurriculam->count()}}</td>
                        @endif
                    @endif
                    <td>
                        
                        <span class="w3-text-red">{!! $cal->comment !!}</span>
                    </td>
                    <td>
                        
                            
                        <a href="{{route('admin.course.show', $cal->course->id)}}" class="btn btn-primary btn-sm" title="show"><i class="la la-eye"></i></a>
                        
                        <a href="{{route('admin.course.edit', $cal->course->id)}}" class="btn btn-warning btn-sm" title="edit"><i class="la la-pencil"></i></a>
                        
                        
                    </td>
                </tr>
                @php
                    $i++;
                @endphp
            @endforeach
        </tbody>
    <button class="btn btn-success btn block">Request For Approval</button>

    </form>
</table>