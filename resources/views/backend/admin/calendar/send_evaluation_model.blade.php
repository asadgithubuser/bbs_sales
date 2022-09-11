<form action="{{ route('admin.trainee.uploadcourseMaterials', ['type' => 'pre-evaluation']) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="course_id" id="put_course_id" value="" />

    <div class="modal fade" id="sendEvaluationPDF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Upload Evaluation Form Modal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="form-group row">
                        <div class="mb-3">
                                <label for="formFile" class="form-label">Select Evaluation Form</label>
                                <input class="form-control-custom-file" name="material_file" type="file" id="formFile">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send To Trainees</button>
                </div>
        </div>
        </div>
    </div>
</form>






