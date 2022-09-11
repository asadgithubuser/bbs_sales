<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Name (Bangla)</th>
            <th class="text-left">Name (English)</th>            
            <th class="text-left">Crop Name</th>            
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($categories->count() > 0)
        @php
            $i = (($categories->currentPage() - 1) * $categories->perPage() + 1);
        @endphp
            @foreach ($categories as $category)
            <tr>
                <td>{{$i}}</td>
                <td align="left">{{ucfirst($category->crop_type_bn)}}</td>
                <td align="left">{{ucfirst($category->crop_type_en)}}</td>
                <td align="left">{{ $category->crop ? ucfirst($category->crop->name_en) : ''}}</td>
                
                <td>
                    
                    <span class="label label-lg font-weight-bold {{ $category->status == 1 ? 'label-light-success' : 'label-light-danger'}}  label-inline">{{ $category->status == 1 ? 'Active' : 'Deactivated' }} </span>
                    
                </td>
                <td>
                
                    @can('edit_agriculture')
                    <a href="{{route('admin.cropCategory.edit', $category->id)}}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                        <i class="la la-edit"></i>
                    </a>
                    @endcan

                    @can('delete_agriculture')
                        @if ($category->status == 1)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Delete" data-id="{{ $category->id }}">
                                <i class="la la-trash"></i>
                            </button>
                        @elseif ($category->status == 0)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Active" data-id="{{ $category->id }}">
                                <i class="la la-check"></i>
                            </button>
                        @endif
                    @endcan
                </td>
            </tr>
            @php
                $i++;
            @endphp
            @endforeach
        @else
            <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">No matching records found</td></tr>
        @endif
    </tbody>
</table>
{{$categories->links()}}

@push('stackScript')
    <script> 
        $(".delete").click(function(e) {

            var data_id = $(this).attr("data-id");
            var url =  '<a href="{{route("admin.cropCategory.delete", ":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
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
@endpush