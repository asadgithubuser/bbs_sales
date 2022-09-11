<div class="card card-custom example example-compact">
    <div class="card-header">
        <h3 class="card-title">Pre-Evaluation Form</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-6 col-sm-6">Download Pre-Evaluation Form</label>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        @if($preEvaluationForm != null)
                            <a href="{{ route('admin.trainee.downloadEvaluationForm', ['course_id' => $preEvaluationForm->course_id, 'type' => 'pre']) }}" class="btn btn-success btn-block @if($preEvaluationForm->form == null) disabled @endif ">Download Here<i class="ml-2 fa fa-download" aria-hidden="true"></i></a>
                        @else
                            <a href="" class="btn btn-success btn-block disabled ">Download Here<i class="ml-2 fa fa-download" aria-hidden="true"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.trainee.submitEvaluationFormTrainee') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($preEvaluationForm != null)
        <input name="type" type="hidden" value="pre_evaluation_form">
        <input name="course_id" type="hidden" value="{{ $preEvaluationForm->course_id }}">
        @endif
            <div class="col-lg-12 col-sm-12">
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-6 col-sm-6">Upload Pre-Evaluation Form</label>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <input class="form-control-custom-file" name="evaluation_form" type="file" id="formFile">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6">
                    @if($preEvaluationForm != null)
                        @if($traineeDetails->trainee_pre_form == null)
                            <button type="submit" class="btn btn-success btn-block">Submit<i class="ml-2 fa fa-upload" aria-hidden="true"></i></button>
                        @else
                            <a href="" class="btn btn-success btn-block disabled">Submited</a>
                        @endif
                    @else
                        <a href="" class="btn btn-success btn-block disabled">Submit<i class="ml-2 fa fa-upload" aria-hidden="true"></i></a>
                    @endif
                    </div>
                    
                </div>
            </div>
        </form>
    </div>
    </div>

   
    
    <div class="mt-5 card card-custom example example-compact">
        <div class="card-header">
            <h3 class="card-title">Course Materials</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <table class="table table-separate table-head-custom table-checkable table-striped 44" id="">   
                        <tbody id="upload_material_table">  
                            <?php $i = 1; ?>
                            @foreach($courseMaterials as $courseMaterial)
                                <tr class="mb-5">
                                    <td width="2%">#{{ $i++}}</td>
                                    <td class="text-left" width="68%">{{ $courseMaterial->form }}</td>
                                    <td class="text-left" width="3%">
                                        <a href="{{ route('admin.trainee.downloadCourseMaterials', ['id' => $courseMaterial->id]) }}" class="btn btn-success btn-block"><i class="ml-2 fa fa-download" aria-hidden="true"></i></a>
                                    </td>

                                </tr>  
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        
    </div>


    <div class="mt-5 card card-custom example example-compact">
        <div class="card-header">
            <h3 class="card-title">Post-Evaluation Form</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="form-group row">
                        <label class="col-form-label text-left col-lg-6 col-sm-6">Download Post-Evaluation Form</label>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                        @if($postEvaluationForm != null)
                            <a href="{{ route('admin.trainee.downloadEvaluationForm',['course_id' => $postEvaluationForm->course_id, 'type' => 'post']) }}" class="btn btn-success btn-block @if($postEvaluationForm->form == null) disabled @endif">Download Here<i class="ml-2 fa fa-download" aria-hidden="true"></i></a>
                        @else
                            <a href="" class="btn btn-success btn-block disabled">Download Here<i class="ml-2 fa fa-download" aria-hidden="true"></i></a>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.trainee.submitEvaluationFormTrainee') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if($postEvaluationForm != null)
                <input name="type" type="hidden" value="post_evaluation_form">
                <input name="course_id" type="hidden" value="{{ $postEvaluationForm->course_id }}">
            @endif
                <div class="col-lg-12 col-sm-12">
                    <div class="form-group row">
                        <label class="col-form-label text-left col-lg-6 col-sm-6">Upload Post-Evaluation Form</label>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <input class="form-control-custom-file" name="evaluation_form" type="file" id="formFile">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6">
                            
                        @if($postEvaluationForm != null)
                            @if($traineeDetails->trainee_post_form == null)
                                <button type="submit" class="btn btn-success btn-block">Submit<i class="ml-2 fa fa-upload" aria-hidden="true"></i></button>
                            @else
                                <a href="" class="btn btn-success btn-block disabled">Submited</a>
                            @endif
                        @else
                            <a href="" class="btn btn-success btn-block disabled">Submit<i class="ml-2 fa fa-upload" aria-hidden="true"></i></a>
                        @endif
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>


<div class="mt-5 card card-custom example example-compact">

        <div class="card-header">
            <h3 class="card-title">Certificate</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="form-group row">
                        <label class="col-form-label text-left col-lg-6 col-sm-6">Download  Your Certificate</label>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            @if($trainingCourse->publish_certificate == 1)
                                <a href="{{ route('admin.trainee.viewCertificateByTrainee') }}" class="btn btn-success btn-block ">Download Certificate<i class="ml-2 fa fa-download" aria-hidden="true"></i></a>
                            @else
                                <a href="" class="btn btn-success btn-block disabled">Download Certificate<i class="ml-2 fa fa-download" aria-hidden="true"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
</div>

