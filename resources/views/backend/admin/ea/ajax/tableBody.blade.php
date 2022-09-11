<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Village Name</th>
            <th class="text-left">EA Name</th>
            <th>EA Code</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($eas->count() > 0)
        @php
            $i = (($eas->currentPage() - 1) * $eas->perPage() + 1);
        @endphp
            @foreach ($eas as $ea)
            <tr>
                <td>{{$i}}</td>
                <td align="left">{{$ea->village ? $ea->village->name_en : ''}}</td>
                <td align="left">{{ucfirst($ea->name_en)}}</td>
                <td>{{ $ea->ea_code }}</td>
                <td>
                    
                    <span class="label label-lg font-weight-bold {{ $ea->status == 1 ? 'label-light-success' : 'label-light-danger'}}  label-inline">{{ $ea->status == 1 ? 'Active' : 'Deactivated' }} </span>
                    
                </td>
                <td>
                    @can('view_ea')
                    <a href="{{route('admin.ea.show', $ea->id)}}" class="btn btn-sm btn-clean btn-icon" title="view">
                        <i class="la la-eye"></i>
                    </a>
                    @endcan
                    
                    @can('edit_ea')
                    <a href="{{route('admin.ea.edit', $ea->id)}}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                        <i class="la la-edit"></i>
                    </a>
                    @endcan

                    @can('delete_ea')
                        @if ($ea->status == 1)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Delete" data-id="{{ $ea->id }}">
                                <i class="la la-trash"></i>
                            </button>
                        @elseif ($ea->status == 0)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Active" data-id="{{ $ea->id }}">
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

{{$eas->links()}}

@push('stackScript')
    <script> 
        $(".delete").click(function(e) {

            var data_id = $(this).attr("data-id");
            var url =  '<a href="{{route("admin.ea.delete",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
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