<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Mouza Name</th>
            <th class="text-left">Village Name</th>
            <th>Village Code</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($villages->count() > 0)
        @php
            $i = (($villages->currentPage() - 1) * $villages->perPage() + 1);
        @endphp
            @foreach ($villages as $village)
            <tr>
                <td>{{$i}}</td>
                <td align="left">{{$village->mouza ? $village->mouza->name_en : ''}}</td>
                <td align="left">{{ucfirst($village->name_en)}}</td>
                <td>{{ $village->village_code }}</td>
                <td>
                    
                    <span class="label label-lg font-weight-bold {{ $village->status == 1 ? 'label-light-success' : 'label-light-danger'}}  label-inline">{{ $village->status == 1 ? 'Active' : 'Deactivated' }} </span>
                    
                </td>
                <td>
                    @can('view_village')
                    <a href="{{route('admin.village.show', $village->id)}}" class="btn btn-sm btn-clean btn-icon" title="view">
                        <i class="la la-eye"></i>
                    </a>
                    @endcan
                    
                    @can('edit_village')
                    <a href="{{route('admin.village.edit', $village->id)}}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                        <i class="la la-edit"></i>
                    </a>
                    @endcan

                    @can('delete_village')
                        @if ($village->status == 1)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Delete" data-id="{{ $village->id }}">
                                <i class="la la-trash"></i>
                            </button>
                        @elseif ($village->status == 0)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Active" data-id="{{ $village->id }}">
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

{{$villages->links()}}

@push('stackScript')
    <script> 
        $(".delete").click(function(e) {

            var data_id = $(this).attr("data-id");
            var url =  '<a href="{{route("admin.village.delete",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
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