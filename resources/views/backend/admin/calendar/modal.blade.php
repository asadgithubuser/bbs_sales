<div class="modal fade" id="claimForModify" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="{{ route('admin.calender.claimForChange',$cal->id) }}" method="POST">
            <div class="modal-body">
                <div class="container">
                    @csrf

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Comment<span style="color: red;">*</span></label>
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <input type="text" required="" class="form-control" name="comment" placeholder="Comment For Changes">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
    </div>
</div>