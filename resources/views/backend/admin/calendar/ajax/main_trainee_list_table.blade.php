
<form action="{{ route('admin.trainee.trainneMoveToWaitingList') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <table class="table table-separate table-head-custom table-checkable table-striped" id="">
    @if($trainingCourse->is_published == 1)
        <span onclick="sendEvaluationPDFModal()" class="btn btn-success btn block float-right">Send Evaluation To All Trainees</span> 
    @endif   
    <thead>
            <tr>
                <th>#</th>
                <th>Employee Name</th>
                <th>Dept. Name</th>
                <th>Designation</th>
                <th>Course Name</th>
                <th>Fiscal Year</th>
                <th>Batch Name</th>
                <th>Module No</th>
                <th>Actions</th>
            </tr>
        </thead>
            <tbody>
                @if($trainingCourse->is_published == 0 && $trainingCourse->forward == 1)
                    <button type="submit" class="btn btn-success btn block">Move To Waiting List</button>
                @else
                    @if(Auth::user()->role_id == 3 && $trainingCourse->is_published == 0)
                        <button type="submit" class="btn btn-success btn block">Move To Waiting List</button>
                    @endif
                @endif

                <!-- @if($type == 'main_trainee_list' && $trainingCourse->is_published == 0 && $trainingCourse->forward == 1)
                    <button type="submit" class="btn btn-success btn block">Move To Main List</button>
                @else
                    @if(Auth::user()->role_id == 3 && $trainingCourse->is_published == 0)
                        <button type="submit" class="btn btn-success btn block">Move To Main List</button>
                    @endif
                @endif -->


                @php
                $count = 0;
                    $i = (($main_trainingCourseListDetails->currentPage() - 1) * $main_trainingCourseListDetails->perPage() + 1);
                @endphp
                 
                @forelse ($main_trainingCourseListDetails as $key => $tcld )
                    <input type="hidden" id="course_id_val" name="course_id" value="{{ $tcld->course_training_list->course->id }}" />

                     <?php $count = 1 ?>
                        <tr>
                            <td>
                                @if($trainingCourse->is_published == 0 && $trainingCourse->forward == 1)
                                    <input type="checkbox" name="traineeIds[]" value="{{ $tcld->user_id }}">
                                @else
                                    @if(Auth::user()->role_id == 3 && $trainingCourse->is_published == 0)
                                        <input type="checkbox" name="traineeIds[]" value="{{ $tcld->user_id }}">
                                    @else
                                        {{ $i }}
                                    @endif
                                @endif
                            </td>
                            <td>{{ $tcld->user->first_name }}</td>
                            <td>{{ $tcld->user->department->name_en }}</td>
                            <td>{{ $tcld->user->designation->name_en }}</td>
                            <td>{{ $tcld->course_training_list->course->title }}</td>
                            <td>{{ $tcld->course_training_list->course->courseYear->name }}</td>
                            <td>Batch-@if(isset($tcld->course_duration)){{ $tcld->course_duration->batch_no }} @endif</td>
                            <td>@if(isset($tcld->course_curriculam)){{ $tcld->course_curriculam->subject_title }}@endif</td>
                            <td>
                                @if($tcld->trainee_pre_form != null)
                                    <a href="{{ route('admin.trainee.downloadSubmitedEForm', ['user_id' =>$tcld->user->id, 'course_id' => $tcld->course_training_list->course->id] ) }}" class="btn btn-success btn-sm"><i class="ml-2 fa fa-download" aria-hidden="true"></i></a>
                                @endif

                                <a href="#" class="btn btn-primary btn-sm" title="show"><i class="la la-eye"></i></a>
                                @if ($type == 'pending_trainee_list')
                                <button type="button" onclick="claimForModifyTrainee_modal_btn(this.id, this.value)" id="{{ $tcld->user->id }}" value="{{ $tcld->id }}" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#claimModifyForTrainee"><i class="la la-calendar-times"></i></button>
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
        </table>
                    
    </form>
    @include('backend.admin.calendar.send_evaluation_model')

    <script>
        function sendEvaluationPDFModal(){
            $('#sendEvaluationPDF').modal('show');
            var id = $('#course_id_val').val();
            $('#put_course_id').val(id);
        }
    </script>