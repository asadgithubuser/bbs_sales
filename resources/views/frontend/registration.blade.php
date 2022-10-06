
@extends('frontend.layout.master')
    @section('content')

           <div class="container w-80">
            <div class="row secondary_sc_content px-2 py-4">  
    
              <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12">

              <div class="row">
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 pb-4 subs_div">
                    <!-- @include('frontend.partials.message') -->

                    <h3>Citizen Registration</h3>
                    <hr>

					@include('alerts.alerts')
						<form class="form" action="{{route('admin.user.store')}}" method="post" id="kt_form_1" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="open_registration" value="notNull">
						<!--begin::Form-->
						<div class="card">
							<div class="card-body w3-light-gray">
								<div class="row">
									<div class="card-body">

										<div class="form-group row" style="padding: 0px 13px;">
											<label class="col-form-label text-right">ছবি সংযুক্ত করুন: </label>
											<div class="col-lg-5 col-sm-12">
												<div class="image-input image-input-empty image-input-outline" id="kt_image_5" style="background-image: url({{asset('assets/media/users/blank.png')}})">
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
												<h2 id="FullUsername"></h2>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-sm-4">
												<label class="col-form-label text-right">নামের প্রথম অংশ: <span class="text-danger">*</span></label>
											
													<input type="text" class="form-control" name="first_name" placeholder="Enter First Name" value="{{old('first_name')}}" required id="fname" oninput="username()" />
												
											</div>

											<div class="form-group col-sm-4">
												<label class="col-form-label text-right">নামের মধ্য অংশ: </label>
											
													<input type="text" class="form-control" name="middle_name" placeholder="Enter Middle Name" value="{{old('middle_name')}}" id="mname" oninput="username()" />
											
											</div>

											<div class="form-group col-sm-4">
												<label class="col-form-label text-right">নামের শেষাংশ: <span class="text-danger">*</span></label>
											
													<input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" value="{{old('last_name')}}" required id="lname" oninput="username()" />
												
											</div>
										</div>

										<div class="row">

											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">বর্তমান ঠিকানা: <span class="text-danger">*</span></label>
											
													<textarea class="form-control" name="present_address" row="2" required> {{old('present_address')}}</textarea>
												
											</div>

											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">স্থায়ী ঠিকানা: <span class="text-danger">*</span></label>
											
													<textarea class="form-control" name="permanent_address" row="2" required> {{old('permanent_address')}}</textarea>
											
											</div>
										</div>

										<div class="row">
											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">মোবাইল: <span class="text-danger">*</span></label>
											
													<input type="text" class="form-control" name="mobile" placeholder="Enter Mobile Number" value="{{old('mobile')}}" required/>
											
											</div>

											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">ইমেইল: <span class="text-danger">*</span></label>
											
													<input type="texy" class="form-control" name="email" placeholder="Enter Email Address" value="{{old('email')}}" required/>
												
											</div>
										</div>
										<div class="row">
											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">জন্মতারিখ: <span class="text-danger">*</span></label>
													<input type="date" class="form-control" name="date_of_birth"  value="{{old('date_of_birth')}}" required/>
											
											</div>
											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">BBS ID: </label>
													<input type="text" placeholder="Enter Your BBS ID" class="form-control" name="bbs_id"  value="{{old('bbs_id')}}" required/>
											</div>

										</div>
										<div class="row">

											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">বিভাগ:</label>
											
													<select class="form-control select2" name="division_id" id="division_id" >
														<option value="">--বিভাগ নির্বাচন করুন--</option> 
														@foreach ($divisions as $division)
															<option value="{{ $division->id }}">{{ $division->name_en }}</option>
														@endforeach
													</select>
												
											</div>

											
 
											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">অফিস: <span class="text-danger">*</span></label>
											
													<select class="form-control select2" name="office_id" id="office_id" required>
													<option value="">--অফিস নির্বাচন করুন--</option> 
													@foreach ($offices as $office)
														<option value="{{ $office->id }}">{{ $office->title_en }}</option>
													@endforeach
													</select>
												
											</div>

										</div>

										<div class="row">
											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">শ্রেণী: <span class="text-danger">*</span></label>
											
													<select class="form-control select2" name="class" id="" required>
													<option value="">--শ্রেণী নির্বাচন করুন--</option> 
														<option value="1">Class I</option>
														<option value="2">Class II</option>
														<option value="3">Class III</option>
														<option value="4">Class IV</option>
														<option value="4">Class V</option>
													</select>
												
											</div>


											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">পদবী: <span class="text-danger">*</span></label>
											
													<select class="form-control select2" name="designation_id" required>
														<option value="">--পদবী নির্বাচন করুন--</option>
														@foreach ($designations as $designation)
															<option value="{{$designation->id}}">{{$designation->name_en}}</option>
														@endforeach
													</select>
											
											</div>
										</div>
										<div class="row">
											
											<div class="form-group col-sm-6" id="salesCenterDiv" style="display: none;"> {{-- style="display: flex/none" --}}
												<label class="col-form-label text-right">বিক্রয় কেন্দ্র: <span class="text-danger">*</span></label>
											
													<select class="form-control select2" name="salesCenter" id="salesCenter">
													<option value="">--বিক্রয় কেন্দ্র নির্বাচন করুন--</option> 
													@foreach ($salesCenters as $salesCenter)
														<option value="{{ $salesCenter->id }}">{{ $salesCenter->name_en }}</option>
													@endforeach
													</select>
											
											</div>
										</div>
									
							
										<div class="row">

											<div class="form-group col-sm-6" id="district" style="display: none;">
												<label class="col-form-label text-right">জেলা:</label>
											
													<select class="form-control select2" name="district_id" id="district_id" >
													<option value="">--জেলা নির্বাচন করুন--</option> 
													@foreach ($districts as $district)
														<option value="{{ $district->id }}">{{ $district->name_en }}</option>
													@endforeach
													</select>
												
											</div>
											

											<div class="form-group col-sm-6"  id="upazila" style="display: none;">
												<label class="col-form-label text-right">উপজেলা:</label>
											
													<select class="form-control select2" name="upazila_id" id="upazila_id" >
													<option value="">--উপজেলা নির্বাচন করুন--</option> 
													@foreach ($upazilas as $upazila)
														<option value="{{ $upazila->id }}">{{ $upazila->name_en }}</option>
													@endforeach
													</select>
												
											</div>
										</div>
								
										


										<div class="row">
											<div class="form-group col-sm-6" >
												<label class="col-form-label text-right">পাসওয়ার্ড: <span class="text-danger">*</span></label>
											
													<input type="password" class="form-control" name="password" placeholder="at least 8 characters" required/>
												
											</div>
											<div class="form-group col-sm-6">
												<label class="col-form-label text-right">পাসওয়ার্ড আবার লিখুন: <span class="text-danger">*</span></label>
											
													<input type="password" class="form-control" name="confirm-password" required/>
												
											</div>
										</div>
																																

										<div class="form-group row" style="padding: 0px 13px;">
											<label class="col-form-label text-right">স্বাক্ষর সংযুক্ত করুন: </label>
											<div class="col-lg-5 col-sm-12" style="margin-top: 10px;">
												<input type="file" name="signature" accept=".png, .jpg, .jpeg"/>
											</div>
											
											{{-- <div class="col-lg-5 col-sm-12">
												<div class="image-input image-input-empty image-input-outline" id="kt_image_6" style="background-image: url({{asset('assets/media/users/blank.png')}})">
													<div class="image-input-wrapper"></div>
													
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
											</div> --}}
										</div>
									</div>

								
							
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="row">
								<div class="col-lg-12 text-right">
									<button type="submit" class="btn btn-primary font-weight-bold" name="submitButton">সংরক্ষন করুন</button>
								</div>
							</div>
						</div>

						</form>

                    <div class="reg_btn mt-3"> 
                        <span style="font-size: 1rem;">Don't Have an Account ? Fill Up the <a style="font-size: 14px; text-decoration: underline !important;" href="{{ route('application.create') }}"><span class="">Micro Data Service Form</span></a> or <a style="font-size: 14px; text-decoration: underline !important;" href="{{ route('application.publicationApp') }}"><span class="">Publication Service Form</span></a> to be a registered user!</span>
                    </div>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

              </div>

              
           </div>

    @endsection

  		
 

	@push('frontScript')
 
		<script> 
			var avatar5 = new KTImageInput('kt_image_5');
			var avatar6 = new KTImageInput('kt_image_6');

			avatar5.on('cancel', function(imageInput) {
				// swal.fire({
				//     title: 'Image successfully changed !',
				//     type: 'success',
				//     buttonsStyling: false,
				//     confirmButtonText: 'Awesome!',
				//     confirmButtonClass: 'btn btn-primary font-weight-bold'
				// });
			});

			avatar5.on('change', function(imageInput) {});

			avatar5.on('remove', function(imageInput) {});

			avatar6.on('cancel', function(imageInput) {});

			avatar6.on('change', function(imageInput) {});

			avatar6.on('remove', function(imageInput) {});
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
			
		}
	</script>

	<script>
		function username(){
			var f = document.getElementById('fname').value;
			var m = document.getElementById('mname').value;
			var l = document.getElementById('lname').value;
			var fullname = f+' '+m+' '+l;
			document.getElementById('FullUsername').innerHTML = fullname;
		}
	</script>






	@endpush
