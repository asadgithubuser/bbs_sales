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
							<h5 class="text-dark font-weight-bold my-1 mr-5">ডলারের মূল্য নির্ধারণ</h5>
							<!--end::Page Title-->
							<!--begin::Breadcrumb-->
							<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
								<li class="breadcrumb-item">
									<a href="{{route('admin.index')}}" class="text-muted">ড্যাশবোর্ড</a>
								</li>

								@can('service_item_prices')
									<li class="breadcrumb-item">
										<a href="{{route('admin.serviceItemPrice.index')}}" class="text-muted">ডলারের মূল্য নির্ধারণ করুন টাকাতে</a>
									</li>
								@endcan
								
								<li class="breadcrumb-item active">
									<a class="text-muted">নির্ধারিত ডলারের মূল্য টাকাতে তালিকা</a>
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
									<h3 class="card-title">নির্ধারিত ডলারের মূল্য টাকাতে তালিকা</h3>
									  
								</div>

								<div class="card-body">
									<div class="dollar_convert_area">
										<form action="{{ route('admin.payment.convertedDollarValueStore') }}" method="POST"> 
											@csrf
										  <div class="form-group row">
										    <label for="staticEmail" class="col-sm-3 h4 text-right col-form-label">1 Dollar =</label>
										    <div class="col-sm-6">
										     	<input type="text" class="form-control form-control-lg form-control-solid ajax-data-search" name="dollarValue" placeholder="টাকাতে ডলারের মূল্য লিখুন">
										    </div>
										    <label for="staticEmail" class="col-sm-3 h4 text-left col-form-label"> টাকা</label>
										  </div>
										  <div class="form-group d-block col-10 ">
										     <button type="submit" class="btn mt-5 float-right btn-primary  h4 text-left mb-2">নির্ধারণ</button>
										  </div>
										</form>


									</div>
								</div>

								<div class="card-body">
									<div class="table-responsive ajax-data-container pt-3">
										<!--begin::table-->
										<table class="table table-separate table-head-custom table-checkable table-striped" >
										    <thead>
										        <tr>
										            <th width="5%">#</th>
										            <th width="25%">ইউজার</th>
										            <th width="35%">ডলারের মূল্য</th>
										            <th width="15%">নির্ধারন তারিখ</th>
										            <th width="15%">কার্যকরের শেষ তারিখ</th>
										        </tr>
										    </thead>
										    <tbody>
										        @if ($convertedDollarLists->count() > 0)
										            @php
										                $i = (($convertedDollarLists->currentPage() - 1) * $convertedDollarLists->perPage() + 1);
										            @endphp

										            @foreach ($convertedDollarLists as $convertedDollar)

										            <?php

										            	$user = App\Models\User::find($convertedDollar->user_id);
										            ?>
										            <tr>
										                <td>{{ $i }}</td>
										                <td>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>	                
										                <td>{{ $convertedDollar->dollar_value }}</td>	                
										                <td>{{ $convertedDollar->created_at->format('m/d/Y') }}</td>	                
										                <td>
										                	@if($convertedDollar->status == 'active')
										                	<span class="badge badge-primary">Active</span>
										                	@else
										                	{{ $convertedDollar->updated_at->format('m/d/Y') }}
										                	@endif
										                </td>	                
										            </tr>

										            @php
										                $i++;
										            @endphp
										            
										            @endforeach
										        @else
										            <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">কোনো রেকর্ড পাওয়া যায়নি</td></tr>
										        @endif
										    </tbody>
										</table>

										@push('stackScript')
										    <script> 
										        $(".delete").click(function(e) {

										            var data_id = $(this).attr("data-id");
										            var url =  '<a href="{{route("admin.serviceItemPrice.delete",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
										            url = url.replace(':id', data_id );
										            
										            Swal.fire({
										                title: 'Are you sure want to delete?',
										                icon: 'info',
										                showCancelButton: true,
										                confirmButtonText: url,
										            }).then((result) => {
										                if (result.isConfirmed) {
										                    Swal.fire('Status Changed Successfully!', '', 'success')
										                } else if (result.dismiss === "cancel") {
										                    Swal.fire('Canceled', '', 'error')
										                }
										            })
										        });

										    </script>
										@endpush
									</div>
									{{ $convertedDollarLists->links() }}
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
					
