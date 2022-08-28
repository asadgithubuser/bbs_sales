@extends('backend.layout.master')

	@push('css')
		<style> 
			td {
				border-top: none !important;
			}
			.select2.select2-container.select2-container--default {
				width: 100% !important;
			}
		</style>
		
	@endpush

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
							<h5 class="text-dark font-weight-bold my-1 mr-5">Add New Requisition</h5>
							<!--end::Page Title-->
							<!--begin::Breadcrumb-->
							<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
								<li class="breadcrumb-item">
									<a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
								</li>
								@can('all_requisitions')
									<li class="breadcrumb-item">
										<a href="{{route('admin.requisition.index')}}" class="text-muted">Manage Requisitions</a>
									</li>
								@endcan
								
								<li class="breadcrumb-item active">
									<a class="text-muted">Add New Requisition</a>
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
									<h3 class="card-title">Add New Requisition</h3>
								</div>
								
								
								<!--begin::Form-->
								<form class="form" action="{{route('admin.requisition.store')}}" method="post" id="kt_form_1">
									@csrf

									<div class="card-body">

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-2 col-sm-12">Organization Name: <span class="text-danger">*</span></label>
											<div class="col-lg-4 col-sm-12">
												<input type="text" class="form-control" name="organization_name" placeholder="Enter Organization Name" value="{{old('organization_name')}}" required/>
											</div>

											<label class="col-form-label text-right col-lg-2 col-sm-12">Receiver Name: <span class="text-danger">*</span></label>
											<div class="col-lg-4 col-sm-12">
												<input type="text" class="form-control" name="name" placeholder="Enter Receiver Name" value="{{old('name')}}" required/>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-2 col-sm-12">Designation Name: <span class="text-danger">*</span></label>
											<div class="col-lg-4 col-sm-12">
												<input type="text" class="form-control" name="designation" placeholder="Enter Designation" value="{{old('designation')}}" required/>
											</div>

											<label class="col-form-label text-right col-lg-2 col-sm-12">Phone: <span class="text-danger">*</span></label>
											<div class="col-lg-4 col-sm-12">
												<input type="text" class="form-control" name="phone" placeholder="Enter Phone" value="{{old('phone')}}" required/>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label text-right col-lg-2 col-sm-12">Address: <span class="text-danger">*</span></label>
											<div class="col-lg-4 col-sm-12">
												<textarea class="form-control" name="address" row="2" required> {{old('address')}}</textarea>
											</div>
										</div>

										<table class="table" id="tbl_posts">
											<tbody id="tbl_posts_body">
												<tr id="rec-1">
													<td>
														<div class="text-left">
															<label class="">Services <span class="text-danger">*</span></label>

															<select class="form-control req_service_id_1 select_1" id="req_service_id_1" name="service_id" required>
																<option value="">--Select Service--</option> 
																@foreach ($services as $service)
																	<option value="{{ $service->id }}">{{ $service->name_en }}</option>
																@endforeach
															</select>
														</div>
													</td>
													<td>
														<div class="text-left">
															<label class="">Service Items <span class="text-danger">*</span></label>

															<select class="form-control req_service_item_id_1 select_1" name="service_item_id" id="req_service_item_id_1" required>
																<option value="">--Select Service First--</option> 
															</select>
														</div>
													</td>
													<td>
														<div class="text-left">
															<label class="">Items Name<span class="text-danger">*</span></label>

															<select class="form-control req_service_inventory_id_1 select_1" id="req_service_inventory_id_1" name="service_inventory_id[]" required>
																<option value="">--Select Category First--</option> 
															</select>
														</div>
													</td>

													<td>
														<div class="text-left current_quantity" id="current_quantity_1">
															<label class="">Available Quantity</label>
															<input type="text" class="form-control current_quantity_value" id="current_quantity_value_1" value="--Select Item First--" disabled>
														</div>
													</td>

													<td>
														<div class="text-left">
															<label class="">Enter Quantity <span class="text-danger">*</span></label>

															<input type="text" class="form-control quantity" placeholder="Enter Quantity" name="quantity[]" id="quantity_1" required>
														</div>
													</td>
													
													<td> 
														<div class="input-group-btn text-left mt-8"> 
															<button class="btn btn-sm btn-success add-record" type="button" style="padding: 0.75rem">Add</button>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</div>

									<div class="card-footer">
										<div class="row">
											<div class="col-lg-12 text-right">
												<button type="submit" class="btn btn-primary font-weight-bold" name="submitButton">Submit</button>
											</div>
										</div>
									</div>
								</form>
								<!--end::Form-->

								<div style="display:none;">
									<table id="sample_table">
										<tr id="">
											<td>
												<div class="text-left">
													<label class="">Services <span class="text-danger">*</span></label>

													<select class="form-control req_service_id select_" id="" name="service_id" required>
														<option value="">--Select Service--</option> 
														@foreach ($services as $service)
															<option value="{{ $service->id }}">{{ $service->name_en }}</option>
														@endforeach
													</select>
												</div>
											</td>
											<td>
												<div class="text-left">
													<label class="">Service Items <span class="text-danger">*</span></label>

													<select class="form-control req_service_item_id select_" id="" name="service_item_id" required>
														<option value="">--Select Service First--</option> 
													</select>
												</div>
											</td>
											<td>
												<div class="text-left">
													<label class="">Items Name<span class="text-danger">*</span></label>

													<select class="form-control req_service_inventory_id select_" id="" name="service_inventory_id[]" required>
														<option value="">--Select Category First--</option> 
													</select>
												</div>
											</td>

											<td>
												<div class="text-left current_quantity" id="">
													<label class="">Available Quantity</label>
													<input type="text" class="form-control current_quantity_value" value="--Select Item First--" id="" disabled>
												</div>
											</td>

											<td>
												<div class="text-left">
													<label class="">Enter Quantity <span class="text-danger">*</span></label>

													<input type="text" class="form-control quantity" id="" placeholder="Enter Quantity" name="quantity[]" required>
												</div>
											</td>
											<td>
												<div class="input-group-btn text-left mt-8"> 
													<button class="btn btn-sm btn-danger delete-record" type="button" data-id="0" style="padding: 0.75rem">Remove</button>
												</div>
											</td>
										</tr>
									</table>
								</div>
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

		<script type="text/javascript">
			$('#quantity_1').on('keyup', function(){

				let quantity = $(this).val();
				let complementoryQuantity = $('#current_quantity_value_1').val();

				if(Number(quantity) > Number(complementoryQuantity)) {
                    Swal.fire('Quantity is more than stock', '', 'warning');
					$('#quantity_1').val('');

					return true;
				}
			});
		</script>

		<script> 
			// Select2
			$('.select_1').select2();

			$("#req_service_id_1").on('change', function(e){
				e.preventDefault();

				var service_item_list = $("#req_service_item_id_1");
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$.ajax({
					type: 'POST',
					url: "{{route('reqServiceItems')}}",
					data: {_token:$('input[name=_token]').val(),
					service_id: $(this).val()},

					success:function(response){
						$('option', service_item_list).remove();
						$('#req_service_item_id_1').append('<option value="">--Select Category--</option>');
						$.each(response, function(){
							$('<option/>', {
								'value': this.id,
								'text': this.item_name_en
							}).appendTo('#req_service_item_id_1');
						});
					}

				});
			});

			$("#req_service_item_id_1").on('change', function(e){
				e.preventDefault();
				
				var service_inventory_item_list = $("#req_service_inventory_id_1");
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$.ajax({
					type: 'POST',
					url: "{{route('reqServiceInventoryItems')}}",
					data: {_token:$('input[name=_token]').val(),
					service_item_id: $(this).val()},

					success:function(response){
						$('option', service_inventory_item_list).remove();
						$('#req_service_inventory_id_1').append('<option value="">--Select Item--</option>');
						$.each(response, function(){
							$('<option/>', {
								'value': this.id,
								'text': this.title
							}).appendTo('#req_service_inventory_id_1');
						});
					}

				});
			});

			$("#req_service_inventory_id_1").on('change', function(e){
				e.preventDefault();
				
				var available_quantity = $("#current_quantity_value_1");
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$.ajax({
					type: 'POST',
					url: "{{route('reqComplementaryQuantity')}}",
					data: {_token:$('input[name=_token]').val(),
					service_inventory_item_id: $(this).val()},

					success:function(response){
						$(available_quantity).val(response.number_of_complimentary_copies);
					}

				});
			});
		</script>

		<script> 
			$(document).delegate('button.add-record', 'click', function(e) {
				e.preventDefault();   

				var content = $('#sample_table tr'),
				size = $('#tbl_posts >tbody >tr').length + 1,
				element = null,    
				element = content.clone();
				element.attr('id', 'rec-'+size);
				element.find('.delete-record').attr('data-id', size);
				element.find('.select_').addClass('select_'+size);
				element.find('.req_service_id').attr('id', 'req_service_id_'+size);
				element.find('.req_service_item_id').attr('id', 'req_service_item_id_'+size);
				element.find('.req_service_inventory_id').attr('id', 'req_service_inventory_id_'+size);
				element.find('.quantity').attr('id', 'quantity_'+size);
				element.find('.current_quantity_value').attr('id', 'current_quantity_value_'+size);
				element.appendTo('#tbl_posts_body');

				// Select2
				$('.select_'+size).select2();

				$("#req_service_id_"+size).on('change', function(e){
					e.preventDefault();

					var service_item_list = $("#req_service_item_id_"+size);
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});

					$.ajax({
						type: 'POST',
						url: "{{route('reqServiceItems')}}",
						data: {_token:$('input[name=_token]').val(),
						service_id: $(this).val()},

						success:function(response){
							$('option', service_item_list).remove();
							$('#req_service_item_id_'+size).append('<option value="">--Select Category--</option>');
							$.each(response, function(){
								$('<option/>', {
									'value': this.id,
									'text': this.item_name_en
								}).appendTo('#req_service_item_id_'+size);
							});
						}

					});
				});

				$("#req_service_item_id_"+size).on('change', function(e){
					e.preventDefault();
					
					var service_inventory_item_list = $("#req_service_inventory_id_"+size);
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});

					$.ajax({
						type: 'POST',
						url: "{{route('reqServiceInventoryItems')}}",
						data: {_token:$('input[name=_token]').val(),
						service_item_id: $(this).val()},

						success:function(response){
							$('option', service_inventory_item_list).remove();
							$('#req_service_inventory_id_'+size).append('<option value="">--Select Item--</option>');
							$.each(response, function(){
								$('<option/>', {
									'value': this.id,
									'text': this.title
								}).appendTo('#req_service_inventory_id_'+size);
							});
						}

					});
				});

				$("#req_service_inventory_id_"+size).on('change', function(e){
					e.preventDefault();
					
					var available_quantity = $("#current_quantity_value_"+size);
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});

					$.ajax({
						type: 'POST',
						url: "{{route('reqComplementaryQuantity')}}",
						data: {_token:$('input[name=_token]').val(),
						service_inventory_item_id: $(this).val()},

						success:function(response){
							
							$(available_quantity).val(response.number_of_complimentary_copies);
						}

					});
				});

				$('#quantity_'+size).on('keyup', function(){

					let quantity = $(this).val();
					let complementoryQuantity = $('#current_quantity_value_'+size).val();

					if(Number(quantity) > Number(complementoryQuantity)) {
						Swal.fire('Quantity is more than stock', '', 'warning');
						$('#quantity_'+size).val('');

						return true;
					}
				});
			});

			$(document).delegate('button.delete-record', 'click', function(e) {
				e.preventDefault();    

				var id = $(this).attr('data-id');
				var targetDiv = $(this).attr('targetDiv');
				$('#rec-' + id).remove();

				return true;
			});
		</script>
	@endpush