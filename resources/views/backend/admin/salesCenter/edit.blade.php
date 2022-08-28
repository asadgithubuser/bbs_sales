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
							<h5 class="text-dark font-weight-bold my-1 mr-5">Edit Sales Center</h5>
							<!--end::Page Title-->
							<!--begin::Breadcrumb-->
							<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
								<li class="breadcrumb-item">
									<a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
								</li>
							
                                <li class="breadcrumb-item">
                                    <a href="#" class="text-muted">Edit Sales Center</a>
                                </li>
							
								<li class="breadcrumb-item active">
									<a class="text-muted">Edit Sales Center</a>
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
									<h3 class="card-title">Edit Sales Center</h3>
								</div>
								
								
								<!--begin::Form-->
								<form class="form" action="{{route('admin.salesCenter.update')}}" method="post" id="kt_form_1">
									@csrf

									<div class="card-body offset-lg-3">

                                        <div class="form-group row">
											<label class="col-form-label text-right col-lg-2 col-sm-12">Name (English): <span class="text-danger">*</span></label>
											<div class="col-lg-5 col-sm-12">
												<input type="text" class="form-control" name="name_en" value="{{$salesCenter->name_en}}" required/>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-2 col-sm-12">Name (Bangla): <span class="text-danger">*</span></label>
											<div class="col-lg-5 col-sm-12">
												<input type="text" class="form-control" name="name_bn" value="{{$salesCenter->name_bn}}" required/>
											</div>
										</div>

                                        <div class="form-group row">
											<label class="col-form-label text-right col-lg-2 col-sm-12">Address: <span class="text-danger">*</span></label>
											<div class="col-lg-5 col-sm-12">
                                                <textarea name="address" cols="59" rows="5">{{$salesCenter->address}}</textarea>
											</div>
										</div>

                                        <div class="form-group row">
											<label class="col-form-label text-right col-lg-2 col-sm-12">Active:</label>
											<div class="col-lg-1 col-sm-12">
                                                @if ($salesCenter->status == 1)
												    <input type="checkbox" class="form-control" name="status" style="width: 18px" value="1" checked/>
                                                @else
                                                    <input type="checkbox" class="form-control" name="status" style="width: 18px" value="1"/>
                                                @endif
											</div>
										</div>

									</div>

									<div class="card-footer">
										<div class="row">
											<div class="col-lg-9 text-right">
                                                <input type="hidden" name="id" value="{{$salesCenter->id}}">
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