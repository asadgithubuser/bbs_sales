<table class="table table-separate table-head-custom table-checkable table-striped 44" id="">   
            <tbody>
                <?php $i =1 ?>
                <?php for($i =1; $i <= $trainingCourse->courseDuration->duration; $i++){ ?>  
                    <?php 
                        $day = 'day_'.$i;
                        $taken_day = App\Models\TraineeAttendance::where(['day'=> $day, 'course_id' => $trainingCourse->id])->count();
                    ?>
                    <tr>
                        <td width="10%">For Day <span class="badge badge-warning">#{{$i}}</span></td>
                        <td width="15%" class="text-left">Take Attendence</td>
                        <td width="20%"></td>
                        <td width="20%">
                            @if($taken_day > 0)
                                <a href="" class="btn btn-warning disabled text-dark block float-right">Already Taken Day#{{$i}}</a>   
                            @else
                                <button id="{{$day}}" onclick="takeAttendance(this.id)" class="btn btn-success btn block float-right">Take Attendence <i class="ml-2 fa fa-upload" aria-hidden="true"></i></button>    
                            @endif
                        </td>
                    </tr> 
            <?php } ?>
               
            </tbody>
        </table>

        @include('backend.admin.calendar.ajax.trainee_attendance_modal')      


 <script>
    function takeAttendance(day){
        $('#attendance_day').val(day)

        $('#takeTraineeAttendance').modal('show')
    }
 </script>