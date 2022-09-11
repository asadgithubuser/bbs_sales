<!--begin::table-->
<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Title</th>
            <th class="text-left">Subtitle</th>
            <th class="text-left">Sales Center</th>
            <th>Item Code</th>
            <th class="text-left">Service Name (English)</th>
            <th class="text-left">Category Name (English)</th>
            <th >Survey / Census Date</th>
            <th>Price</th>
            <th>Publish Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($items->count() > 0)
        @php
            $i = (($items->currentPage() - 1) * $items->perPage() + 1);
        @endphp
            @foreach ($items as $item)
            <tr>
                <td>{{$i}}</td>
                <td align="left">{{ ucfirst($item->title) }}</td>
                <td align="left">{{ ucfirst($item->sub_title) }}</td>
                <td align="left">{{ $item->salesCenter ? $item->salesCenter->name_en : '' }}</td>
                <td>{{ $item->serviceItem ? $item->serviceItem->barcode : '' }}</td>
                <td align="left">{{ $item->service ? $item->service->name_en : '' }}</td>
                <td align="left">{{ $item->serviceItem ? $item->serviceItem->item_name_en : '' }}</td>
                <td >{{ ucfirst($item->survey_date) }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->publish_date }}</td>
                <td>
                    <a data-toggle="modal" data-target="#exampleModal{{ $item->id }}" class="btn btn-sm btn-clean btn-icon" title="view">
                        <i class="la la-eye"></i>
                    </a>
                    <a href="{{ route('admin.storage.edit',$item) }}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                        <i class="la la-edit"></i>
                    </a>
                    <button data-toggle="modal" data-target="#quantityAdd{{ $item->id }}" class="btn btn-sm btn-clean btn-icon" title="add quantity">
                        <i class="la la-plus"></i>
                    </button>
                    {{-- @can('delete_service_item') --}}
                        @if ($item->status == 1)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Delete" data-id="{{ $item->id }}">
                                <i class="la la-trash"></i>
                            </button>
                        @elseif ($item->status == 0)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Active" data-id="{{ $item->id }}">
                                <i class="la la-check"></i>
                            </button>
                        @endif

                    {{-- @endcan --}}
                    @if ($item->number_of_hard_copies > 0)
                        <a href="{{ route('admin.storage.barcode', $item->id) }}" class="btn btn-sm btn-clean btn-icon" title="barcode">
                            <i class="la la-barcode"></i>
                        </a>
                    @endif
                    
                </td>
            </tr>
            @php
                $i++;
            @endphp

            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ ucfirst($item->title) }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-2 col-sm-12">Service Name</label>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <input type="text" disabled value="{{$item->service ? $item->service->name_en :''}}" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-2 col-sm-12">Category Name </label>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <input type="text" disabled value="{{$item->serviceItem ? $item->serviceItem->item_name_en :''}}" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-2 col-sm-12">Title</label>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" placeholder="Enter Title" value="{{$item->title}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-2 col-sm-12">Subtitle</label>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <input type="text" class="form-control {{ $errors->has('subtitle') ? ' is-invalid' : '' }}" name="subtitle" placeholder="Enter Subtitle" value="{{$item->sub_title}}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-2 col-sm-12">Data Source</label>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <input type="text" class="form-control {{ $errors->has('data_source') ? ' is-invalid' : '' }}" name="data_source" placeholder="Enter Data source" disabled value="{{$item->data_source}}" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-2 col-sm-12">Survey / Census Date</label>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <input type="date" class="form-control {{ $errors->has('survey_date') ? ' is-invalid' : '' }}" name="survey_date"  value="{{$item->survey_date}}" disabled>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-2 col-sm-12">Publish Date</label>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <input type="date" class="form-control {{ $errors->has('publish_date') ? ' is-invalid' : '' }}" name="publish_date" value="{{$item->publish_date}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-2 col-sm-12">Downloadable Link</label>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <input type="text" class="form-control {{ $errors->has('downloadadble_link') ? ' is-invalid' : '' }}" name="downloadadble_link" placeholder="Enter Downloadable Link" disabled value="{{$item->downloadable_link}}" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-2 col-sm-12">Number of hardcopies </label>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <input type="number" min="0" class="form-control {{ $errors->has('no_of_hard_copies') ? ' is-invalid' : '' }}" name="no_of_hard_copies" placeholder="Enter Number of hardcopies" value="{{$item->number_of_hard_copies}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-2 col-sm-12">Number of complimentary Copies </label>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <input type="number" min="0" class="form-control {{ $errors->has('number_of_complimentary_copies') ? ' is-invalid' : '' }}" name="number_of_complimentary_copies" placeholder="Enter Number of complimentary Copies" value="{{$item->number_of_complimentary_copies}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-2 col-sm-12">Number of sale Copies </label>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <input type="number" min="0" class="form-control {{ $errors->has('no_of_sale_copies') ? ' is-invalid' : '' }}" name="no_of_sale_copies" placeholder="Enter Number of sale copies" value="{{$item->number_of_sale_copies}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-2 col-sm-12">Store Room Number </label>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <input type="text"  class="form-control {{ $errors->has('store_room') ? ' is-invalid' : '' }}" name="store_room" placeholder="Enter Store Room Number" value="{{$item->store_room}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-2 col-sm-12">Shelf / Almirah Number </label>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <input type="text"  class="form-control {{ $errors->has('shelf_no') ? ' is-invalid' : '' }}" name="shelf_no" placeholder="Enter Shelf Number" value="{{$item->shelf_no}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-2 col-sm-12">Rack Number </label>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <input type="text"  class="form-control {{ $errors->has('rack_no') ? ' is-invalid' : '' }}" name="rack_no" placeholder="Enter Rack Number" value="{{$item->rack_no}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-2 col-sm-12">Price </label>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <input type="number" min="0" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" placeholder="Enter Price" value="{{$item->price}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('admin.storage.barcode', $item->id) }}" class="btn btn-primary">Print Barcode</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>

            <div class="modal fade" id="quantityAdd{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ ucfirst($item->title) }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form action="{{ route('admin.storage.updateInventory',$item) }}" method="POST" class="form-group">
                        @csrf
                        <div class="modal-body">                       
        
                            <div class="form-group">
                                <h5 class="text-center">Current Status In Inventory</h5>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-4 col-sm-12">Total hardcopies inventory</label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="number" min="0" class="form-control" value="{{$item->number_of_hard_copies}}" disabled>
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-4 col-sm-12">For complimentary Copies </label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="number" min="0" class="form-control" value="{{$item->number_of_complimentary_copies}}" disabled>
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-4 col-sm-12">For sale Copies </label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="number" min="0" class="form-control" value="{{$item->number_of_sale_copies}}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5 class="text-center">Update Inventory</h5>
                            </div>
                            {{-- <div class="form-group row">
                                <label class="col-form-label text-right col-lg-4 col-sm-12">Number of hardcopies <span class="text-danger"> *</span></label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="number" min="0" class="form-control {{ $errors->has('no_of_hard_copies') ? ' is-invalid' : '' }}" id="no_of_hard_copies1" name="no_of_hard_copies"  disabled>
                                </div>
                            </div> --}}

                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-4 col-sm-12">Number of complimentary Copies </label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="number" min="0" id="number_of_complimentary_copies1" class="form-control {{ $errors->has('number_of_complimentary_copies') ? ' is-invalid' : '' }}" name="number_of_complimentary_copies" placeholder="Enter Number of complimentary Copies" value="{{old('number_of_complimentary_copies')}}" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-4 col-sm-12">Number of sale Copies </label>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="number" min="0" class="form-control {{ $errors->has('no_of_sale_copies') ? ' is-invalid' : '' }}" id="no_of_sale_copies1" name="no_of_sale_copies" placeholder="Enter Number of sale copies" value="{{old('no_of_sale_copies')}}" >
                                </div>
                            </div>


        
                            
                        </div>
                        <div class="modal-footer">
                            
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
                        </div>
                    </form>
                </div>
                </div>
            </div>

            @endforeach
        @else
            <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">No matching records found</td></tr>
        @endif
    </tbody>
</table>

@push('stackScript')
    <script> 
        $(".delete").click(function(e) {

            var data_id = $(this).attr("data-id");
            var url =  '<a href="{{route("admin.storage.delete",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
            url = url.replace(':id', data_id );
            
            Swal.fire({
                title: 'Are you sure ?',
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
    <script>
        $(document).ready(function(){
            $(document).on("change keyup keypress mouseenter",'#no_of_sale_copies1, #number_of_complimentary_copies1', function(e){
            var no_of_sale_copies = parseFloat($('#no_of_sale_copies1').val()) || 0;
                var number_of_complimentary_copies = parseFloat($('#number_of_complimentary_copies1').val()) || 0;
    
                $('#no_of_hard_copies1').val((no_of_sale_copies + number_of_complimentary_copies));  
            });
        });
    </script>
@endpush