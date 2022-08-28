<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Upazila Name</th>
            <th class="text-left">Division Name</th>
            <th class="text-left">District Name</th>
            <th>Upazila Code</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($upazilas->count() > 0)
        @php
            $i = (($upazilas->currentPage() - 1) * $upazilas->perPage() + 1);
        @endphp
            @foreach ($upazilas as $upazila)
            <tr>
                <td>{{$i}}</td>
                <td align="left">{{ucfirst($upazila->name_en)}}</td>
                <td align="left">{{$upazila->division ? $upazila->division->name_en : ''}}</td>
                <td align="left">{{$upazila->district ? $upazila->district->name_en : ''}}</td>
                <td>{{$upazila->upazila_bbs_code}}</td>
                <td>
                    
                    <span class="label label-lg font-weight-bold {{ $upazila->status == 1 ? 'label-light-success' : 'label-light-danger'}}  label-inline">{{ $upazila->status == 1 ? 'Active' : 'Deactivated' }} </span>
                    
                </td>
                <td>
                    @can('view_upazila')
                    <a href="{{route('admin.upazila.show', $upazila->id)}}" class="btn btn-sm btn-clean btn-icon" title="view">
                        <i class="la la-eye"></i>
                    </a>
                    @endcan
                    
                    @can('edit_upazila')
                    <a href="{{route('admin.upazila.edit', $upazila->id)}}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                        <i class="la la-edit"></i>
                    </a>
                    @endcan

                    @can('delete_upazila')
                        @if ($upazila->status == 1)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Delete" data-id="{{ $upazila->id }}">
                                <i class="la la-trash"></i>
                            </button>
                        @elseif ($upazila->status == 0)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Active" data-id="{{ $upazila->id }}">
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
{{$upazilas->links()}}

@push('stackScript')
    <script> 
        $(".delete").click(function(e) {

            var data_id = $(this).attr("data-id");
            var url =  '<a href="{{route("admin.upazila.delete",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
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