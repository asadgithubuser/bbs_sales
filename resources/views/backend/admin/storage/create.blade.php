@extends('backend.layout.master')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Add Item In
                            Inventory</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">Dashboard</a>
                            </li>
                            @can('manage_storage')
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.storage.create') }}" class="text-muted">Add Item In
                                        Inventory</a>
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
                <!--begin::Card-->
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <div class="card card-custom example example-compact">
                            <div class="card-header">
                                <h3 class="card-title">Add New Item</h3>

                            </div>
                            <!--begin::Form-->
                            <form class="form" action="{{ route('admin.storage.store') }}" method="post" id="kt_form_1" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    @if (Auth::user()->role_id != 11)
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-4 col-sm-12">Sales Center: <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-5 col-sm-12">
                                                <select class="form-control select2" name="salesCenterId" id="salesCenter" required>
                                                    <option value="">--Select Sales Center--</option>
                                                    @foreach ($salesCenters as $salesCenter)
                                                        <option value="{{ $salesCenter->id }}">{{ $salesCenter->name_en }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>    
                                    @endif
                                    
                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Service Name: <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="text" class="form-control {{ $errors->has('service_id') ? ' is-invalid' : '' }}"  value="{{ $services->name_en }}" readonly>
                                            <input type="hidden" class="form-control" name="service_id"  value="{{ $services->id }}" required readonly>

                                            {{-- <select class="form-control select2" name="service_id" id="service_id" readonly required>
                                                
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}" selected>{{ $service->name_en }}</option>
                                                @endforeach
                                            </select> --}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Category Name: <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-5 col-sm-12">
                                            <select class="form-control select2" name="service_item_id"  required>
                                                <option value="">--Select Service First--</option>
                                                @foreach ($serviceItems as $item)
                                                    <option value="{{ $item->id }}">{{ $item->item_name_en }}</option>
                                                    
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Item Code:</label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="text" id="item_code" class="form-control" value="Select Service Item First" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Title: <span class="text-danger"> *</span></label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" placeholder="Enter Title" value="{{old('title')}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Subtitle: </label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="text" class="form-control {{ $errors->has('subtitle') ? ' is-invalid' : '' }}" name="subtitle" placeholder="Enter Subtitle" value="{{old('subtitle')}}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Data Source:</label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="text" class="form-control {{ $errors->has('data_source') ? ' is-invalid' : '' }}" name="data_source" placeholder="Enter Data source" value="{{old('data_source')}}" >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Survey / Census Year: <span class="text-danger">*</span></label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="text" placeholder="Ex: 2021" class="form-control {{ $errors->has('survey_date') ? ' is-invalid' : '' }}" name="survey_date"  value="{{old('survey_date')}}" required>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Publish Year: </label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="text" class="form-control {{ $errors->has('publish_date') ? ' is-invalid' : '' }}" name="publish_date" placeholder="Ex: 2021" value="{{old('publish_date')}}" >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Downloadable Link:</label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="text" class="form-control {{ $errors->has('downloadadble_link') ? ' is-invalid' : '' }}" name="downloadadble_link" placeholder="Enter Downloadable Link" value="{{old('downloadadble_link')}}" >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Number of Complimentary Copies: <span class="text-danger"> *</span></label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="number" min="0" id="number_of_complimentary_copies" class="form-control {{ $errors->has('number_of_complimentary_copies') ? ' is-invalid' : '' }}" name="number_of_complimentary_copies" placeholder="Enter Number of complimentary Copies" value="{{old('number_of_complimentary_copies')}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Number of Sale Copies: <span class="text-danger"> *</span></label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="number" min="0" class="form-control {{ $errors->has('no_of_sale_copies') ? ' is-invalid' : '' }}" id="no_of_sale_copies" name="no_of_sale_copies" placeholder="Enter Number of sale copies" value="{{old('no_of_sale_copies')}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Number of Hardcopies: <span class="text-danger"> *</span></label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="number" min="0" class="form-control {{ $errors->has('no_of_hard_copies') ? ' is-invalid' : '' }}" id="no_of_hard_copies" name="no_of_hard_copies"  disabled>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Store Room Number: <span class="text-danger"> *</span></label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="text"  class="form-control {{ $errors->has('store_room') ? ' is-invalid' : '' }}" name="store_room" placeholder="Enter Store Room Number" value="{{old('store_room')}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Shelf / Almirah Number: <span class="text-danger"> *</span></label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="text"  class="form-control {{ $errors->has('shelf_no') ? ' is-invalid' : '' }}" name="shelf_no" placeholder="Enter Shelf Number" value="{{old('shelf_no')}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Rack Number: <span class="text-danger"> *</span></label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="text"  class="form-control {{ $errors->has('rack_no') ? ' is-invalid' : '' }}" name="rack_no" placeholder="Enter Rack Number" value="{{old('rack_no')}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Price (BDT): <span class="text-danger"> *</span></label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="number" min="0" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" placeholder="Enter Price" value="{{old('price')}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Price (USD): <span class="text-danger"> *</span></label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="number" min="0" class="form-control {{ $errors->has('price_dollor') ? ' is-invalid' : '' }}" name="price_dollor" placeholder="Enter Price" value="{{old('price_dollor')}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12"></label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="checkbox" name="can_download" id="can_download"> Can download for free
                                        </div>
                                    </div>
                                    <div class="form-group row" id="file_attach">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">File Upload</label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="file" class="form-control" name="attach_file" id="attach_file">
                                        </div>
                                    </div>
                                    <div class="form-group row" id="cover_attach">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Book Cover</label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="file" class="form-control" name="cover_file" id="cover_file">
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-9 text-right">
                                            <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection

@push('stackScript')
<script>
    $(document).ready(function(){
        $( "#service_id" ).change(function() {
            var catId= $("#service_id").val();   
            var url= window.location.origin+`/bbs/storage/service_id/${catId}/get-subcat`;
            
            $.getJSON(url, function(data){
                $('#service_item_id').html('<option value="">Select Service Item</option>');
                data.forEach(element => {
                    $('#service_item_id').append(`
                    <option value="${element.id}">${element.item_name_en}</option>
                    `);
                });
            });
  
        });

        $( "#service_item_id" ).on('change', function() {
            var catId= $("#service_item_id").val();   
            var url= window.location.origin+`/bbs/storage/service_item_id/${catId}/get-barcode`;
            
            $.getJSON(url, function(data){
                $('#item_code').empty();
                data.forEach(element => {
                    $('#item_code').val(element.barcode);
                });
            });
  
        });

        // $("#can_download").on()
        $('#file_attach').hide();
        $('#cover_attach').hide();
        $('#can_download').click(function() {
            $("#file_attach").toggle(this.checked);
            $("#cover_attach").toggle(this.checked);
        });
    })
</script>
<script>
    $(document).ready(function(){
        $(document).on("change keyup keypress mouseenter",'#no_of_sale_copies, #number_of_complimentary_copies', function(e){
        var no_of_sale_copies = parseFloat($('#no_of_sale_copies').val()) || 0;
            var number_of_complimentary_copies = parseFloat($('#number_of_complimentary_copies').val()) || 0;

            $('#no_of_hard_copies').val((no_of_sale_copies + number_of_complimentary_copies));  
        });
    });
</script>
@endpush
