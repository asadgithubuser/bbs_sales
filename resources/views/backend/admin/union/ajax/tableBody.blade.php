<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Union Name</th>
            <th class="text-left">Upazila Name</th>
            <th class="text-left">District Name</th>
            <th class="text-left">Division Name</th>
            <th>Union Code</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($unions->count() > 0)
        @php
            $i = (($unions->currentPage() - 1) * $unions->perPage() + 1);
        @endphp
            @foreach ($unions as $union)
            <tr>
                <td>{{$i}}</td>
                <td align="left">{{ucfirst($union->name_en)}}</td>
                <td align="left">{{ucfirst($union->upazila ? $union->upazila->name_en : '')}}</td>
                <td align="left">{{$union->district ? $union->district->name_en : ''}}</td>
                <td align="left">{{$union->division ? $union->division->name_en : ''}}</td>
                <td>{{$union->union_bbs_code}}</td>
                <td>
                    
                    <span class="label label-lg font-weight-bold {{ $union->status == 1 ? 'label-light-success' : 'label-light-danger'}}  label-inline">{{ $union->status == 1 ? 'Active' : 'Deactivated' }} </span>
                    
                </td>
                <td>
                    @can('view_union')
                    <a href="{{route('admin.union.show', $union->id)}}" class="btn btn-sm btn-clean btn-icon" title="view">
                        <i class="la la-eye"></i>
                    </a>
                    @endcan
                    
                    @can('edit_union')
                    <a href="{{route('admin.union.edit', $union->id)}}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                        <i class="la la-edit"></i>
                    </a>
                    @endcan

                    @can('delete_union')
                        @if ($union->status == 1)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Delete" data-id="{{ $union->id }}">
                                <i class="la la-trash"></i>
                            </button>
                        @elseif ($union->status == 0)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Active" data-id="{{ $union->id }}">
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
{{$unions->links()}}

@push('stackScript')
    <script> 
        $(".delete").click(function(e) {

            var data_id = $(this).attr("data-id");
            var url =  '<a href="{{route("admin.union.delete",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
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