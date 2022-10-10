<form action="{{ route('admin.trainee.takeTraineeAttendance') }}" method="POST">
    @csrf   
    
    <!-- modal for tainee attendance -->
    <div class="modal fade" id="takeTraineeAttendance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Trainees List</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input name="day" id="attendance_day" value="" type="hidden">
                <div class="modal-body">
                <div class="container">
                    <div class="form-group">
                    <table class="table table-separate table-head-custom table-checkable table-striped" id="">
                        <thead>
                            <tr>
                                <th>Attendance</th>
                                <th >Name</th>
                                <th >Designation</th>
                                <th>Wing</th>
                                <th>BBS ID</th>
                            </tr>
                        </thead>
                            <tbody>
                            @forelse($main_trainingCourseListDetails as $key => $tcld )
                                <input type="hidden" name="trainees[{{$key}}][user_id]" value="{{ $tcld->user->id }}" />
                                <input type="hidden" name="trainees[{{$key}}][course_id]" value="{{ $tcld->course_training_list->course->id }}" />
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="trainees[{{$key}}][attendance]" class="trainee_candidate_cls form-check text-center d-inline" value="1" />
                                        </td>
                                        <td>{{ $tcld->user->first_name }} {{ $tcld->user->last_name }}</td>
                                        <td>{{ $tcld->user->designation->name_en }}</td>
                                        <td>{{ $tcld->user->department->name_en }}</td>
                                        <td>bbs id</td>
                                        
                                    </tr>
                            @empty  
                                <tr>
                                    <td colspan="9"><p class="text-center">Item NOT Found.</p></td>
                                </tr>   
                            @endforelse                        
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END modal for tainee attendance -->
</form>



