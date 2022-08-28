
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
    <form action="{{ route('admin.course.forwardCourse') }}" method="post">
        @csrf
        <tbody>
            @php
                $i = (($courses->currentPage() - 1) * $courses->perPage() + 1);
            @endphp
            @foreach ($courses as $course)
                <input type="hidden" name="items[]" value="{{ $course->id }}">
                <tr>
                    <td>{{ $i }}</td>
                    <td align="left">{{ $course->title }}</td>
                    <td align="left">{{ $course->trainer ? $course->trainer->name : '' }}</td>
                    <td>{{ $course->courseYear ?  $course->courseYear->name : ''}}</td>
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
                    
                    <td>
                        @if ($course->forward == null)
                            
                            <a href="{{route('admin.course.show', $course->id)}}" class="btn btn-primary btn-sm" title="show"><i class="la la-eye"></i></a>
                            <a href="{{route('admin.course.edit', $course->id)}}" class="btn btn-warning btn-sm" title="edit"><i class="la la-pencil"></i></a>
                        @endif
                    </td>
                </tr>
                @php
                    $i++;
                @endphp
            @endforeach
        </tbody>
        @if ($courses->count() > 0)
            <button class="btn btn-success btn block">Request For Approval</button>
        @endif
    </form>
</table>