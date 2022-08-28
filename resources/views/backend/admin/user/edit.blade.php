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
										<h5 class="text-dark font-weight-bold my-1 mr-5">ব্যবহারকারী তথ্য সংশোধণ</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="{{route('admin.index')}}" class="text-muted">ড্যাশবোর্ড</a>
											</li>
											@can('all_users')
												<li class="breadcrumb-item">
													<a href="{{route('admin.user.index')}}" class="text-muted">ব্যবহারকারী পরিচালন</a>
												</li>
											@endcan
											<li class="breadcrumb-item active">
												{{-- <a class="text-muted">Edit {{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }} User</a> --}}
												<a class="text-muted">ব্যবহারকারী তথ্য সংশোধণ</a>
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
									<div class="col-lg-12">
										<!--begin::Card-->
										<div class="card card-custom example example-compact">
											<div class="card-header">
												<h3 class="card-title">Edit {{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }} user</h3>
											</div>											
											
											<!--begin::Form-->
											<form class="form" action="{{route('admin.user.update', $user->id)}}" method="post" id="kt_form_1" enctype="multipart/form-data">
												@csrf
                                                @method('patch')

												<div class="card-body">
													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Upload Photo: </label>

														<div class="col-lg-5 col-sm-12">
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

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Upload Signature: </label>
														
														<div class="col-lg-5 col-sm-12">
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

                                                    <div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">First Name:  <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<input type="text" class="form-control" name="first_name" placeholder="Enter First Name" value="{{$user->first_name}}" required/>
														</div>
													</div>

                                                    <div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Middle Name: </label>
														<div class="col-lg-5 col-sm-12">
															<input type="text" class="form-control" name="middle_name" placeholder="Enter Middle Name" value="{{$user->middle_name}}"/>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Last Name: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" value="{{$user->last_name}}" required/>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Role: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
														 <select class="form-control select2" name="role_id" id="role_id" onchange="roleList()" required>
															@foreach ($roles as $role)
																<option value="{{ $role->id }}" {{ ($role->id == $user->role_id) ? 'selected' : '' }}>{{ $role->name_en }}</option>
															@endforeach
														 </select>
														</div>
													</div>

													<div class="form-group row" id="salesCenterDiv" style="display: none;"> {{-- style="display: flex/none" --}}
														<label class="col-form-label text-right col-lg-4 col-sm-12">Sales Center: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<select class="form-control select2" name="salesCenter" id="salesCenter">
															@if ($user->sales_center)
																<option value="{{ $user->sales_center }}">{{$user->salesCenter ? $user->salesCenter->name_en : ''}}</option> 
																@foreach ($salesCenters as $salesCenter)
																	<option value="{{ $salesCenter->id }}">{{ $salesCenter->name_en }}</option>
																@endforeach
															@else 
																@foreach ($salesCenters as $salesCenter)
																	<option value="{{ $salesCenter->id }}">{{ $salesCenter->name_en }}</option>
																@endforeach
															@endif
															</select>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Level: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
														 <select class="form-control select2" name="level_id" id="level_id" onchange="levelCheck()" required>
															@foreach ($levels as $level)
																<option value="{{ $level->id }}" {{ ($level->id == $user->level_id) ? 'selected' : '' }}>{{ $level->name_en }}</option>
															@endforeach
														 </select>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Department:</label>
														<div class="col-lg-5 col-sm-12">
															<select class="form-control select2" name="department_id" id="department_id" >
																@foreach ($departments as $department)
																	<option value="{{ $department->id }}" {{ ($department->id == $user->department_id) ? 'selected' : '' }}>{{ $department->name_en }}</option>
																@endforeach
															</select>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Office: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<select class="form-control select2" name="office_id" id="office_id" required>
																@foreach ($offices as $office)
																	<option value="{{ $office->id }}" {{ ($office->id == $user->office_id) ? 'selected' : '' }}>{{ $office->title_en }}</option>
																@endforeach
															</select>
														</div>
													</div>

													<div class="form-group row" id="division" style="display: none;">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Division:</label>
														<div class="col-lg-5 col-sm-12">
															<select class="form-control select2" name="division_id" id="division_id" >
															<option value="">--Select Division--</option> 
															@foreach ($divisions as $division)
																<option value="{{ $division->id }}">{{ $division->name_en }}</option>
															@endforeach
															</select>
														</div>
													</div>
			
													<div class="form-group row" id="district" style="display: none;">
														<label class="col-form-label text-right col-lg-4 col-sm-12">District:</label>
														<div class="col-lg-5 col-sm-12">
															<select class="form-control select2" name="district_id" id="district_id" >
															<option value="">--Select District--</option> 
															@foreach ($districts as $district)
																<option value="{{ $district->id }}">{{ $district->name_en }}</option>
															@endforeach
															</select>
														</div>
													</div>
													
			
													<div class="form-group row"  id="upazila" style="display: none;">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Upazila:</label>
														<div class="col-lg-5 col-sm-12">
															<select class="form-control select2" name="upazila_id" id="upazila_id" >
															<option value="">--Select Upazila--</option> 
															@foreach ($upazilas as $upazila)
																<option value="{{ $upazila->id }}">{{ $upazila->name_en }}</option>
															@endforeach
															</select>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Designation: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
														 <select class="form-control select2" name="designation_id" id="designation_id" required>
															@foreach ($designations as $designation)
																<option value="{{ $designation->id }}" {{ ($designation->id == $user->designation_id) ? 'selected' : '' }}>{{ $designation->name_en }}</option>
															@endforeach
														 </select>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Present Address: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<textarea class="form-control" name="present_address" row="2" required> {{$user->present_address}}</textarea>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Permanent Address: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<textarea class="form-control" name="permanent_address" row="2" required> {{$user->permanent_address}}</textarea>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Mobile: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<input type="text" class="form-control" name="mobile" placeholder="Enter Mobile Number" value="{{$user->mobile}}" required/>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Email: <span class="text-danger">*</span></label>
														<div class="col-lg-5 col-sm-12">
															<input type="texy" class="form-control" name="email" placeholder="Enter Email Address" value="{{$user->email}}" required/>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-form-label text-right col-lg-4 col-sm-12">Status: </label>
														<div class="col-lg-5 col-sm-12">
															<select class="form-control select2" name="status" id="status" required>
																@if ($user->status == 1)
																	<option value="1" selected>Active</option>
																	<option value="0">Blocked</option>
																	<option value="2">Deleted</option>
																@elseif ($user->status == 0)
																	<option value="1">Active</option>
																	<option value="0" selected>Blocked</option>
																	<option value="2">Deleted</option>
																@elseif ($user->status == 2)
																	<option value="1">Active</option>
																	<option value="0">Blocked</option>
																	<option value="2" selected>Deleted</option>
																@endif
															</select>
														</div>
													</div>
												</div>

												<div class="card-footer">
													<div class="row">
														<div class="col-lg-9 text-right">
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
		<script>
			var role_id = '<?php echo $user->role_id ?>';
			
				
			if(role_id == 11)
			{
				document.getElementById('salesCenterDiv').style.display = "";
				document.getElementById('salesCenter').setAttribute('required', 'required');
				document.getElementById('salesCenter').removeAttribute('disabled');
			}else{
				document.getElementById('salesCenterDiv').style.display = "none";
				document.getElementById('salesCenter').setAttribute('disabled', 'disabled');
			}
			
		</script>
		<script>
			// sales center selection
			function roleList(){
				let roleId = document.getElementById('role_id').value;
				
				if(roleId == 11)
				{
					document.getElementById('salesCenterDiv').style.display = "";
					document.getElementById('salesCenter').setAttribute('required', 'required');
					document.getElementById('salesCenter').removeAttribute('disabled');
				}else{
					document.getElementById('salesCenterDiv').style.display = "none";
					document.getElementById('salesCenter').setAttribute('disabled', 'disabled');
				}
			}
		</script>

<script>
	function levelCheck(){
		let levelId = document.getElementById('level_id').value;
		
		if(levelId == 1){
			document.getElementById('division').style.display = "none";
			document.getElementById('district').style.display = "none";
			document.getElementById('upazila').style.display = "none";
			
			document.getElementById('district_id').removeAttribute('disabled');
			document.getElementById('division_id').removeAttribute('disabled');
			document.getElementById('upazila_id').removeAttribute('disabled');

		}
		else if(levelId == 2){
			document.getElementById('division').style.display = "";
			document.getElementById('district').style.display = "none";
			document.getElementById('upazila').style.display = "none";

			document.getElementById('division_id').setAttribute('required', 'required');
			document.getElementById('district_id').removeAttribute('disabled');
			document.getElementById('upazila_id').removeAttribute('disabled');

		}else if(levelId == 3){
			document.getElementById('division').style.display = "";
			document.getElementById('district').style.display = "";
			document.getElementById('upazila').style.display = "none";

			document.getElementById('division_id').setAttribute('required', 'required');
			document.getElementById('district_id').setAttribute('required', 'required');
			document.getElementById('upazila_id').removeAttribute('disabled');
		}else if(levelId == 4){
			document.getElementById('division').style.display = "";
			document.getElementById('district').style.display = "";
			document.getElementById('upazila').style.display = "";

			document.getElementById('division_id').setAttribute('required', 'required');
			document.getElementById('district_id').setAttribute('required', 'required');
			document.getElementById('upazila_id').setAttribute('required', 'required');
		}
		// if(roleId == 11)
		// {
		// 	document.getElementById('salesCenterDiv').style.display = "";
		// 	document.getElementById('salesCenter').setAttribute('required', 'required');
		// 	document.getElementById('salesCenter').removeAttribute('disabled');
		// }else{
		// 	document.getElementById('salesCenterDiv').style.display = "none";
		// 	document.getElementById('salesCenter').setAttribute('disabled', 'disabled');
		// }
	}
</script>
	@endpush
					