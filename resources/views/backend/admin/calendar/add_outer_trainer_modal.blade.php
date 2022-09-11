<form class="form" action="{{route('admin.trainer.store', ['type' => 'add_outer_trainer'])}}" method="post" enctype="multipart/form-data">
@csrf
<div class="modal fade" id="addOuterTrainer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>

        <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-4 col-sm-12">Upload Photo: </label>
                        <div class="col-lg-5 col-sm-12">
                            <div class="image-input image-input-empty image-input-outline" id="kt_image_100" style="background-image: url({{asset('assets/media/users/blank.png')}})">
                                <div class="image-input-wrapper"></div>
                                
                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Photo">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="photo" accept=".png, .jpg, .jpeg"/>
                                </label>
                                
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel Photo">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                                
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove Photo">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                                
                            </div>
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-4 col-sm-12">Name: <span class="text-danger"> *</span></label>
                        <div class="col-lg-5 col-sm-12">
                            <input type="text" name="name" class="form-control" placeholder="Enter Trainer Name" value="{{old('name')}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-4 col-sm-12">Phone: <span class="text-danger"> *</span></label>
                        <div class="col-lg-5 col-sm-12">
                            <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" value="{{old('phone')}}" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-4 col-sm-12">Email: <span class="text-danger"></span></label>
                        <div class="col-lg-5 col-sm-12">
                            <input type="email" name="email" class="form-control" placeholder="Enter Email Address" value="{{old('email')}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-4 col-sm-12">Address: <span class="text-danger">*</span></label>
                        <div class="col-lg-5 col-sm-12">
                            <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{old('address')}}" required>
                        </div>
                    </div>
                    
                </div>
                       
            <div class="modal-footer">
         
                    <button type="submit" class="btn btn-primary font-weight-bold" name="submitButton">Create Trainer</button>
               
        </div>
           
    </div>
</div>
</form>








                            
                            
