
<table class="table table-separate table-head-custom table-checkable table-striped" id="">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Course Name</th>
            <th class="text-left">Trainer Name</th>
            <th>Fiscal Year</th>
            <th>Total Batch</th>
            <th>Total Module</th>
            <th>Actions</th>
        </tr>
    </thead>
    <form action="{{ route('admin.calender.approved') }}" method="post">
        @csrf
        @if ($calender->count() > 0)
        @foreach ($calender as $cal)
                <input type="hidden" name="items[]" value="{{ $cal->id }}">
        @endforeach
            <button type="submit" class="btn btn-success btn block">Approved All</button>
        @endif
    </form>

        <tbody>
            @php
                $i = (($calender->currentPage() - 1) * $calender->perPage() + 1);
            @endphp
            @foreach ($calender as $cal)
                <input type="hidden" name="items[]" value="{{ $cal->id }}">
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
                        
                            
                        <a href="{{route('admin.course.show', $cal->course->id)}}" class="btn btn-primary btn-sm" title="show"><i class="la la-eye"></i></a>
                        
                        
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#claimForModify"><i class="la la-calendar-times"></i></button>
                        <!-- Modal -->
                        @include('backend.admin.calendar.modal')
                    </td>
                </tr>
                @php
                    $i++;
                @endphp
            @endforeach
        </tbody>
        
</table>