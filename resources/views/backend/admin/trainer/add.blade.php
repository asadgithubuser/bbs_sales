@extends('backend.layout.master')

@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Trainer</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted">Add Trainer</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Card-->
                    <div class="card card-custom example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Add Trainer</h3>
                            
                        </div>
                        <form class="form" action="{{route('admin.trainer.store')}}" method="post" id="kt_form_1" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="card-body">
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
                            
                            <div class="card-footer"> 
                                <div class="form-group row">
                                    <div class="col-lg-9 text-right">
                                        <button type="submit" class="btn btn-primary font-weight-bold" name="submitButton">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('stackScript')
		<script> 
			var avatar100 = new KTImageInput('kt_image_100');

			avatar100.on('cancel', function(imageInput) {});

			avatar100.on('change', function(imageInput) {});

			avatar100.on('remove', function(imageInput) {});
		</script>
	@endpush