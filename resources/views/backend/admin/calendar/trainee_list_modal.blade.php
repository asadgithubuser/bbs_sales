<div class="modal fade" id="sendToWingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Trainee List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <input type="hidden" id="training_list_id" value="">
            <div class="modal-body">
                <div class="container">
                    <div class="form-group">
                    <table class="table table-separate table-head-custom table-checkable table-striped" id="">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th class="text-left">Name</th>
                                <th class="text-left">Designation</th>
                                <th>Wing</th>
                                <th>BBS ID</th>
                                <th>Training Hour</th>
                                <th>Select Batch</th>
                                <th>Select Module</th>
                            </tr>
                        </thead>
                            <tbody>
                            @if(count($trainee_list) > 0)
                                @forelse ($trainee_list as $trainee)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="trainee_candidate_cls form-check text-center d-inline" value="{{ $trainee->id }}" />
                                        </td>
                                        <td>{{ $trainee->first_name }}</td>
                                        <td>{{ $trainee->designation->name_en }}</td>
                                        <td>{{ $trainee->department->name_en }}</td>
                                        <td>bbs id</td>
                                        <td>00</td>
                                        <td>
                                        <select name="course_list_batch_id" id="course_list_batch_id" class="form-control ajax-course-details-data-insert">
                                            
                                        </select>
                                        </td>
                                    </tr>
                                @empty  
                                    <tr>
                                        <td colspan="9"><p class="text-center">Item NOT Found.</p></td>
                                    </tr>   
                                @endforelse  
                            @endif                    
                            </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="create-trainee-list btn btn-primary">Create List</button>
            </div>  
    </div>
    </div>
</div>