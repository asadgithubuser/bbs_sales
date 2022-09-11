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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Edit Item In
                            Inventory</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">Dashboard</a>
                            </li>
                            @can('all_service_additional_items')
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.storage.create') }}" class="text-muted">Edit Item In
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
                                <h3 class="card-title">Edit Item</h3>

                            </div>
                            <!--begin::Form-->
                            <form class="form" action="{{ route('admin.storage.update',$item) }}" method="post"
                                id="kt_form_1" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Service Name:  <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-5 col-sm-12">
                                            <select class="form-control select2" name="service_id" id="service_id" required>
                                                @if ($item->service_id) 
                                                <option value="{{ $item->service_id }}">
                                                    {{$item->service ? $item->service->name_en :''}}
                                                </option>
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}">{{ $service->name_en }}</option>
                                                @endforeach
                                                @else
                                                <option value="">--Select Service--</option>
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}">{{ $service->name_en }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Category Name:  <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-5 col-sm-12">
                                            <select class="form-control select2" name="service_item_id" id="service_item_id" required>
                                                @if ($item->service_id) 
                                                <option value="{{ $item->service_item_id }}">
                                                    {{$item->serviceItem ? $item->serviceItem->item_name_en :''}}
                                                </option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Title: <span class="text-danger"> *</span></label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" placeholder="Enter Title" value="{{$item->title}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Subtitle: <span class="text-danger"> *</span></label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="text" class="form-control {{ $errors->has('subtitle') ? ' is-invalid' : '' }}" name="subtitle" placeholder="Enter Subtitle" value="{{$item->sub_title}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Data Source: </label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="text" class="form-control {{ $errors->has('data_source') ? ' is-invalid' : '' }}" name="data_source" placeholder="Enter Data source" value="{{$item->data_source}}" >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Survey / Census Date: <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="date" class="form-control {{ $errors->has('survey_date') ? ' is-invalid' : '' }}" name="survey_date"  value="{{$item->survey_date}}" >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Publish Date: <span class="text-danger"> *</span></label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="date" class="form-control {{ $errors->has('publish_date') ? ' is-invalid' : '' }}" name="publish_date" value="{{$item->publish_date}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Downloadable Link: </label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="text" class="form-control {{ $errors->has('downloadadble_link') ? ' is-invalid' : '' }}" name="downloadadble_link" placeholder="Enter Downloadable Link" value="{{$item->downloadable_link}}" >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Number of Complimentary Copies:  <span class="text-danger"> *</span></label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="number" min="0" readonly class="form-control {{ $errors->has('number_of_complimentary_copies') ? ' is-invalid' : '' }}" name="number_of_complimentary_copies" placeholder="Enter Number of complimentary Copies" value="{{$item->number_of_complimentary_copies}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Number of Sale Copies:  <span class="text-danger"> *</span></label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="number" min="0" readonly class="form-control {{ $errors->has('no_of_sale_copies') ? ' is-invalid' : '' }}" name="no_of_sale_copies" placeholder="Enter Number of sale copies" value="{{$item->number_of_sale_copies}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Number of Hardcopies:  <span class="text-danger"> *</span></label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="number" min="0" class="form-control {{ $errors->has('no_of_hard_copies') ? ' is-invalid' : '' }}" readonly name="no_of_hard_copies" placeholder="Enter Number of hardcopies" value="{{$item->number_of_hard_copies}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Store Room Number:  <span class="text-danger"> *</span></label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="text"  class="form-control {{ $errors->has('store_room') ? ' is-invalid' : '' }}" name="store_room" placeholder="Enter Store Room Number" value="{{$item->store_room}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Shelf / Almirah Number:  <span class="text-danger"> *</span></label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="text"  class="form-control {{ $errors->has('shelf_no') ? ' is-invalid' : '' }}" name="shelf_no" placeholder="Enter Shelf Number" value="{{$item->shelf_no}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Rack Number: <span class="text-danger"> *</span></label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="text"  class="form-control {{ $errors->has('rack_no') ? ' is-invalid' : '' }}" name="rack_no" placeholder="Enter Rack Number" value="{{$item->rack_no}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-4 col-sm-12">Price:  <span class="text-danger"> *</span></label>
                                        <div class="col-lg-5 col-sm-12">
                                            <input type="number" min="0" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" placeholder="Enter Price" value="{{$item->price}}" required>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-9 text-right">
                                            <button type="submit" class="btn btn-primary font-weight-bold"
                                                >Update</button>
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
                $('#service_item_id').empty()
                data.forEach(element => {
                    $('#service_item_id').append(`
                    <option value="${element.id}">${element.item_name_en}</option>
                    `)
                });
            });
  
        });
    })
</script>
@endpush
