<!--begin::table-->
<table class="table table-separate table-head-custom table-checkable table-striped" >
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Mode Name (Bangla)</th>
            <th class="text-left">Mode Name (English)</th>
            <th class="text-left">Description</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($receivingModes->count() > 0)
        @php
            $i = (($receivingModes->currentPage() - 1) * $receivingModes->perPage() + 1);
        @endphp
            @foreach ($receivingModes as $receivingMode)
            <tr>
                <td>{{$i}}</td>
                <td align="left">{{$receivingMode->name_bn}}</td>
                <td align="left">{{ucfirst($receivingMode->name_en)}}</td>
                <td align="left">{{$receivingMode->description}}</td>
                <td>
                    @if ($receivingMode->status == 1)
                        <span class="label label-lg font-weight-bold label-light-success label-inline">Active</span>
                    @else
                        <span class="label label-lg font-weight-bold label-light-danger label-inline">Deactivated</span>
                    @endif
                </td>
                <td>
                    @can('view_receiving_mode')
                        
                        <a href="{{route('admin.receivingMode.show', $receivingMode->id)}}" class="btn btn-sm btn-clean btn-icon" title="view">
                            <i class="la la-eye"></i>
                        </a>
                    @endcan
                    @can('edit_receiving_mode')

                        <a href="{{route('admin.receivingMode.edit', $receivingMode->id)}}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                            <i class="la la-edit"></i>
                        </a>
                    @endcan
                    @can('delete_receiving_mode')
                        
                        @if ($receivingMode->status == 1)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Delete" data-id="{{ $receivingMode->id }}">
                                <i class="la la-trash"></i>
                            </button>
                        @elseif ($receivingMode->status == 0)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Active" data-id="{{ $receivingMode->id }}">
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

@push('stackScript')
    <script> 
        $(".delete").click(function(e) {

            var data_id = $(this).attr("data-id");
            var url =  '<a href="{{route("admin.receivingMode.delete",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
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