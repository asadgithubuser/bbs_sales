<div class="modal fade" id="sendToWingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Wing Department List</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            
            
        </div>
        
        <form action="{{ route('admin.calender.sendCalenderList') }}" method="POST">
        @csrf
            <input type="hidden" name="course_id" id="course_id" value="" >
            <div class="modal-body">
            
                <div class="container">
                    <div class="form-group body_head">
                        <div class="row">
                            <div class="col-lg-1 offset-1">
                                <input id="allDeptCheck" class=" form-check-input" type="checkbox">
                            </div>
                            <div class="col-lg-10">
                                <label style="display:block; text-align:left" class="form-check-label text-start" for="flexCheckChecked">
                                    Select All Departments
                                </label>
                            </div>
                        </div>
                    </div>
                  
                    <div class="form-group dept-list">
                        @foreach($depertments as $depertment)
                            <div class="row ">
                                <div class="col-lg-1 offset-1">
                                    <input name="dept_ids[]" class="dept_list_item form-check-input" type="checkbox" value="{{ $depertment->id }}" id="flexCheckChecked">
                                </div>
                                <div class="col-lg-10">
                                    <label style="display:block; text-align:left" class="form-check-label text-start" for="flexCheckChecked">
                                        {{ $depertment->name_bn }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="wing-modal-confirm btn btn-primary">Send Confirmed</button>
            </div>
        </form>
    </div>
    </div>
</div>