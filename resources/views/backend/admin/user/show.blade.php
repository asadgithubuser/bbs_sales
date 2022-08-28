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
										<h5 class="text-dark font-weight-bold my-1 mr-5">User Details</h5>
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
												<a class="text-muted">{{ $user->name_en }} User Details</a>
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

								<!--begin::row-->
								<div class="row">
									<div class="col-lg-12">
										<!--begin::Card-->
										<div class="card card-custom">
											<!--begin::Header-->
											<div class="card-header py-3">
												<div class="card-title align-items-start flex-column">
													<h3 class="card-label font-weight-bolder text-dark">{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }} <span class="badge badge-success ml-2 verified" style="display: none">verified</span> <button type="button" class="btn btn-primary ml-2 verify">Verify</button></h3>
												</div>
												<div class="card-toolbar">
													<a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-success mr-2">Edit User Information</a>
												</div>
											</div>
											<!--end::Header-->
                                            <div class="card-body">
                                                <!--begin::Form Group-->
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-right font-weight-bold">Photo : </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        @if ($user->photo)
                                                            <img src="{{ asset('storage/users/' . $user->photo) }}" alt="Photo" style="max-width: 80px;">
                                                        @else
                                                            <img src="{{ asset('assets/media/users/blank.png') }}" alt="Photo" style="max-width: 80px;"> 
                                                        @endif
                                                    </div>
                                                </div>

                                                @if ($user->signature)
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-right font-weight-bold">Signature : </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <img src="{{ asset('storage/signatures/' . $user->signature) }}" alt="Signature" style="max-width: 80px;">
                                                    </div>
                                                </div>
                                                @endif

                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-right font-weight-bold">Full Name : </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control form-control-lg form-control-solid" value="{{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}" disabled/>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-right font-weight-bold">Username : </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control form-control-lg form-control-solid" value="{{$user->username}}" disabled/>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-right font-weight-bold">Role : </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control form-control-lg form-control-solid" value="{{$user->role->name_en}}" disabled/>
                                                    </div>
                                                </div>

                                                @if ($user->level)
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-right font-weight-bold">Level : </label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$user->level ? $user->level->name_en : ''}}" disabled/>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($user->office)
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-right font-weight-bold">Office Title : </label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$user->office ? $user->office->title_en : ''}}" disabled/>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($user->designation)
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-right font-weight-bold">Designation : </label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$user->designation ? $user->designation->name_en : ''}}" disabled/>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-right font-weight-bold">Date of Birth : </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control form-control-lg form-control-solid" value="{{date('d M, Y', strtotime($user->dob))}}" disabled/>
                                                    </div>
                                                </div>

                                                @if ($user->nid_no)
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-right font-weight-bold">NID : </label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$user->nid_no}}" disabled/>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($user->birth_certificate_no)
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-right font-weight-bold">Birth Certificate No : </label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$user->birth_certificate_no}}" disabled/>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($user->present_address)
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-right font-weight-bold">Present Address : </label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$user->present_address}}" disabled/>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($user->permanent_address)
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-right font-weight-bold">Permanent Address : </label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input class="form-control form-control-lg form-control-solid" value="{{$user->permanent_address}}" disabled/>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-right font-weight-bold">Mobile : </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control form-control-lg form-control-solid" value="{{$user->mobile}}" disabled/>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-right font-weight-bold">Email : </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control form-control-lg form-control-solid" value="{{$user->email}}" disabled/>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-right font-weight-bold">Status : </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        @if ($user->status == 1)
                                                            <input class="form-control form-control-lg form-control-solid text-success" value="Active" disabled/>
                                                        @elseif ($user->status == 0)
                                                            <input class="form-control form-control-lg form-control-solid text-dark" value="Blocked" disabled/>
                                                        @elseif ($user->status == 2)
                                                            <input class="form-control form-control-lg form-control-solid text-danger" value="Deleted" disabled/>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-right font-weight-bold">Created By : </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control form-control-lg form-control-solid" value="{{ ($user->user) ? $user->user->username : '' }}" disabled/>
                                                    </div>
                                                </div>

                                                @if ($user->updated_by)
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-right font-weight-bold">Updated By : </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control form-control-lg form-control-solid" value="{{ ($user->user_update) ? $user->user_update->username : '' }}" disabled/>
                                                    </div>
                                                </div>
                                                @endif

                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-right font-weight-bold">Created Datetime : </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control form-control-lg form-control-solid" value="{{ date('d M, Y', strtotime($user->created_at))}}" disabled/>
                                                    </div>
                                                </div>

                                                @if ($user->updated_at)
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-right font-weight-bold">Updated Datetime : </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control form-control-lg form-control-solid" value="{{ date('d M, Y', strtotime($user->updated_at))}}" disabled/>
                                                    </div>
                                                </div>
                                                @endif
                                                <!--end::Form Group-->
                                            </div>
										</div>
										<!--end::Card-->
									</div>
								</div>
                                <!--end::row-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
	@endsection

    @push('stackScript')
        <script> 
            $(".verify").click(function(e) {

                // var data_id = $(this).attr("data-id");
                // var url =  '<a href="{{route("admin.user.delete",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
                // url = url.replace(':id', data_id );
                
                Swal.fire({
                    title: 'Verify NID of User?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire('Status Changed Successfully!', '', 'success')

                        $('.verified').show();
                        $('.verify').hide();
                    } else if (result.dismiss === "cancel") {
                        Swal.fire('Canceled', '', 'error')

                        $('.verified').hide();
                        $('.verify').show();
                    }
                })
            });
        </script>
    @endpush