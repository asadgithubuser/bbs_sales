
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
                $courseHour = App\Models\TemplateSetting::where('type', 'course_max_hours')->first()->service_id;
                $i = (( $trainingCourseList->currentPage() - 1) * $trainingCourseList->perPage() + 1);
                
            @endphp
            @forelse ($trainingCourseList as $trainingList)
            <?php $ii = 1; ?>
                @if(isset($trainingList->course) && $trainingList->course != null)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $trainingList->course ? $trainingList->course->courseTitle->title  : '' }}</td>
 
                        <td>@foreach(json_decode($trainingList->course->trainer_id) as $id) <strong>{{$ii++}}</strong>. {{App\Models\TrainingTrainer::find($id)->name }},<br> @endforeach</td>
                        
                        <td>
                            {{ $trainingList->course ? $trainingList->course->courseYear->name : '' }}
                        </td>

                        <td>{{ $trainingList->course ? $trainingList->course->courseDuration->month : '' }}</td>
                        <td> @if(isset($trainingList->course)) @if($courseHour < $trainingList->course->courseDuration->course_hour) <span class="text-danger bold">{{$trainingList->course->courseDuration->course_hour}}</span> @else <span class="">{{$trainingList->course->courseDuration->course_hour}}</span> @endif @else '' @endif</td> 

                        <td>{{ $trainingList->course ? $trainingList->course->courseDuration->total_trainees : '' }}</td>
                        <td>{{ $trainingList->course ? $trainingList->course->courseDuration->trainee_type : '' }}</td>
                        <td>
                            @if( isset($trainingList->course->courseListDetails) && $trainingList->course->courseListDetails)
                                
                            @else
                                <a href="{{ route('admin.course.createTraineeList', $trainingList->id) }}" class="btn btn-success btn-sm">Create Trainee List</a>
                            @endif
                                
                            <a href="{{ route('admin.course.show', ['id' => $trainingList->course->id, 'type'=> 'details']) }}" class="btn btn-primary btn-sm" title="show"><i class="la la-eye"></i></a>
                        @include('backend.admin.calendar.trainee_list_modal')
                        
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endif
                @empty  
                    <tr>
                        <td colspan="9"><p class="text-center">Item NOT Found.</p></td>
                    </tr>   
                @endforelse
        </tbody>
        
</table>
<script>
    
    function xx(id){
        $('#training_list_id').val(id);
        $('#sendToWingModal').modal('show')
    }
</script>