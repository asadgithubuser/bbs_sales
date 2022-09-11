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
										<h5 class="text-dark font-weight-bold my-1 mr-5">Inventory Item Barcode</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
											</li>
											<li class="breadcrumb-item">
												<a href="{{route('admin.storage.index')}}" class="text-muted">Manage Store</a>
											</li>
											<li class="breadcrumb-item active">
												<a class="text-muted">{{ $item->title }} Barcodes</a>
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
											<div class="card-header">
												<div class="card-title align-items-start flex-column">
													<h3 class="card-label font-weight-bolder text-dark pt-4">{{ $item->title }} Barcodes (Total {{ $item->number_of_hard_copies }} Copies)</h3>
												</div>
											</div>

                                            <div id="printArea"> 
                                                <!--end::Header-->
                                                <div class="card-body text-center">
                                                    <div class="row">
														<!--begin::Form Group-->
														@php
															$total_quantity = $item->number_of_hard_copies;
															$bar_code = $item->serviceItem->barcode;
															
															$i;
														@endphp
	
														@for ($i=1; $i <= $total_quantity; $i++)
	
															<div class="col-lg-4"> 
																<div class="form-group pt-8">
																	<svg id="barcode_item"></svg>
		
																	<h5>{{ $item->serviceItem->barcode }}</h5>
																</div>
																
															</div>
															
														@endfor
														<!--end::Form Group-->
													</div>
                                                </div>
                                            </div>
											

                                            <div class="card-footer text-right"> 
                                                <button type="button" class="btn btn-primary font-weight-bold btn-lg" onclick="return printDiv('printArea');">Print</button>
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
            let barcode = '<?php echo $bar_code; ?>';

            JsBarcode("#barcode_item", barcode, {
                lineColor: "#000",
                height: 50,
                displayValue: false
            });
        </script>

    <script type="text/javascript">
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            // document.body.innerHTML = originalContents;
        }
    </script>
    @endpush
					