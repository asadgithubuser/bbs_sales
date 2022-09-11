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
						<h5 class="text-dark font-weight-bold my-1 mr-5">All Items of Inventory</h5>
						<!--end::Page Title-->
						<!--begin::Breadcrumb-->
						<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
							<li class="breadcrumb-item">
								<a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
							</li>
							@can('manage_storage')
								<li class="breadcrumb-item">
									<a href="{{route('admin.storage.index')}}" class="text-muted">All Items of Inventory</a>
								</li>
							@endcan
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
								<h3 class="card-title">All Items of Inventory</h3>
								
								
								<div class="card-toolbar">
									<div class="row">
										@if (Auth::user()->role_id != 11)
											<div class="col-md-7 pr-0">
												<select class="form-control form-control-lg form-control-solid ajax-data-search align-left" name="salesCenterId" id="salesCenter" data-select="{{ route('admin.searchAjax', ['type' => 'salesCenterFilter']) }}" required>
													<option value="">--Select Sales Center--</option>
													@foreach ($salesCenters as $salesCenter)
														<option value="{{$salesCenter->id}}">{{$salesCenter->name_en}}</option>
													@endforeach
												</select>
											</div>

											<div class="col-md-5">
												<input type="text" data-url="{{ route('admin.searchAjax',['type'=> 'inventoryItem']) }}" class="form-control form-control-lg form-control-solid ajax-data-search align-left" name="q" placeholder="Search Items" style="">
											</div>
										@else
											<div class="col-md-12">
												<input type="text" data-url="{{ route('admin.searchAjax',['type'=> 'inventoryItem']) }}" class="form-control form-control-lg form-control-solid ajax-data-search align-left" name="q" placeholder="Search Items" style="">
											</div>
										@endif
									</div>
								</div>
								
							</div>
							
							<div class="card-body">
								<div class="table-responsive ajax-data-container pt-3">
									@include('backend.admin.storage.ajax.tableBody')                                    
								</div>
								{{$items->links()}}
							</div>
							<!--end::table-->
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


