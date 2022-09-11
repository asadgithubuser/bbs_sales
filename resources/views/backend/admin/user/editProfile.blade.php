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
										<h5 class="text-dark font-weight-bold my-1 mr-5">Edit Profile</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
											</li>
											@can('all_users')
												<li class="breadcrumb-item">
													<a href="{{route('admin.user.index')}}" class="text-muted">User Management</a>
												</li>
											@endcan
											<li class="breadcrumb-item active">
												<a class="text-muted">Update Your Profile</a>
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
								<!--session msg-->
								@include('alerts.alerts')

								<!--begin::Card-->
								<div class="row">
									<div class="col-lg-6">
										<!--begin::Card-->
										<div class="card card-custom example example-compact">
											<div class="card-header">
												<h3 class="card-title">Update Your Profile</h3>
											</div>											
											
											<!--begin::Form-->
											<form class="form" action="{{route('admin.user.updateProfile', $user->id)}}" method="post" id="kt_form_1" enctype="multipart/form-data">
												@csrf
												
                                                @method('patch')

												<div class="card-body">

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-2 col-sm-12">Upload Photo</label>

														<div class="col-lg-8 col-md-8 col-sm-12">
															<div class="image-input image-input-empty image-input-outline" id="kt_image_5" style="background-image: url({{asset('assets/media/users/blank.png')}})">
																<div class="image-input-wrapper" style="background-image: url({{asset('storage/users/' . $user->photo )}})"></div>
															   
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

													@if (Auth::user()->role_id != 10)
														<div class="form-group row">
															<label class="col-form-label text-right col-lg-2 col-sm-12">Upload Signature</label>
															
															<div class="col-lg-8 col-md-8 col-sm-12">
																<div class="image-input image-input-empty image-input-outline" id="kt_image_5" style="background-image: url({{asset('assets/media/users/blank.png')}})">
																	<div class="image-input-wrapper" style="background-image: url({{asset('storage/signatures/' . $user->signature )}})"></div>
																
																	<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Signature">
																		<i class="fa fa-pen icon-sm text-muted"></i>
																		<input type="file" name="signature" accept=".png, .jpg, .jpeg"/>
																	</label>
																
																	<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel Signature">
																	<i class="ki ki-bold-close icon-xs text-muted"></i>
																	</span>
																
																	<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove Signature">
																	<i class="ki ki-bold-close icon-xs text-muted"></i>
																	</span>
																</div>
															</div>
														</div>
													@endif

                                                    <div class="form-group row">
														<label class="col-form-label text-right col-lg-2 col-sm-12">First Name <span class="text-danger">*</span></label>
														<div class="col-lg-8 col-md-8 col-sm-12">
															<input type="text" class="form-control" name="first_name" placeholder="Enter First Name" value="{{$user->first_name}}" required/>
														</div>
													</div>

                                                    <div class="form-group row">
														<label class="col-form-label text-right col-lg-2 col-sm-12">Middle Name</label>
														<div class="col-lg-8 col-md-8 col-sm-12">
															<input type="text" class="form-control" name="middle_name" placeholder="Enter Middle Name" value="{{$user->middle_name}}"/>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-2 col-sm-12">Last Name <span class="text-danger">*</span></label>
														<div class="col-lg-8 col-md-8 col-sm-12">
															<input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" value="{{$user->last_name}}" required/>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-2 col-sm-12">Present Address <span class="text-danger">*</span></label>
														<div class="col-lg-8 col-md-8 col-sm-12">
															<textarea class="form-control" name="present_address" row="2" required> {{$user->present_address}}</textarea>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-2 col-sm-12">Permanent Address <span class="text-danger">*</span></label>
														<div class="col-lg-8 col-md-8 col-sm-12">
															<textarea class="form-control" name="permanent_address" row="2" required> {{$user->permanent_address}}</textarea>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-2 col-sm-12">Mobile <span class="text-danger">*</span></label>
														<div class="col-lg-8 col-md-8 col-sm-12">
															<input type="text" class="form-control" name="mobile" placeholder="Enter Mobile Number" value="{{$user->mobile}}" required/>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-2 col-sm-12">Email <span class="text-danger">*</span></label>
														<div class="col-lg-8 col-md-8 col-sm-12">
															<input type="texy" class="form-control" name="email" placeholder="Enter Email Address" value="{{$user->email}}" required/>
														</div>
													</div>
												</div>

												<div class="card-footer">
													<div class="row">
														<div class="col-lg-10 text-right">
															<button type="submit" class="btn btn-primary font-weight-bold" name="submitButton">Update</button>
														</div>
													</div>
												</div>
											</form>
											<!--end::Form-->
										</div>
										<!--end::Card-->
									</div>

									<div class="col-lg-6">
										<!--begin::Card-->
										<div class="card card-custom example example-compact">
											<div class="card-header">
												<h3 class="card-title">Change Password</h3>
											</div>											
											
											<!--begin::Form-->
											<form class="form" action="{{route('admin.user.updatePassword', $user->id)}}" method="post" id="kt_form_2">
												@csrf
                                                @method('patch')

												<div class="card-body">

                                                    <div class="form-group row">
														<label class="col-form-label text-right col-lg-2 col-sm-12">Current Password <span class="text-danger">*</span></label>
														<div class="col-lg-8 col-md-8 col-sm-12">
															<input type="password" class="form-control" name="current_password" placeholder="Enter Current Password" required/>
														</div>
													</div>

                                                    <div class="form-group row">
														<label class="col-form-label text-right col-lg-2 col-sm-12">New Password <span class="text-danger">*</span></label>
														<div class="col-lg-8 col-md-8 col-sm-12">
															<input type="password" class="form-control" name="password" placeholder="Enter New Password" required/>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-2 col-sm-12">Confirm Password <span class="text-danger">*</span></label>
														<div class="col-lg-8 col-md-8 col-sm-12">
															<input type="password" class="form-control" name="password_confirmation" placeholder="Confirm New Password" required/>
														</div>
													</div>
												</div>

												<div class="card-footer">
													<div class="row">
														<div class="col-lg-10 text-right">
															<button type="submit" class="btn btn-primary font-weight-bold" name="submitButton">Update</button>
														</div>
													</div>
												</div>
											</form>
											<!--end::Form-->
										</div>
										<!--end::Card-->
									</div>
								</div>
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
	@endsection

	@push('stackScript')
		<script> 
			var avatar5 = new KTImageInput('kt_image_5');

			avatar5.on('cancel', function(imageInput) {
				// swal.fire({
				//     title: 'Image successfully changed !',
				//     type: 'success',
				//     buttonsStyling: false,
				//     confirmButtonText: 'Awesome!',
				//     confirmButtonClass: 'btn btn-primary font-weight-bold'
				// });
			});

			avatar5.on('change', function(imageInput) {
				// swal.fire({
				//     title: 'Image successfully changed !',
				//     type: 'success',
				//     buttonsStyling: false,
				//     confirmButtonText: 'Awesome!',
				//     confirmButtonClass: 'btn btn-primary font-weight-bold'
				// });
			});

			avatar5.on('remove', function(imageInput) {
				// swal.fire({
				//     title: 'Image successfully removed !',
				//     type: 'error',
				//     buttonsStyling: false,
				//     confirmButtonText: 'Got it!',
				//     confirmButtonClass: 'btn btn-primary font-weight-bold'
				// });
			});
		</script>
	@endpush
					