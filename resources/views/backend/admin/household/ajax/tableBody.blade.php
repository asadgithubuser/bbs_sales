<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">EA Name</th>
            <th class="text-left">House Hold</th>
            <th>House Hold Code</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($households->count() > 0)
        @php
            $i = (($households->currentPage() - 1) * $households->perPage() + 1);
        @endphp
            @foreach ($households as $household)
            <tr>
                <td>{{$i}}</td>
                <td align="left">{{$household->ea ? $household->ea->name_en : ''}}</td>
                <td align="left">{{ucfirst($household->name_en)}}</td>
                <td>{{ $household->household_code }}</td>
                <td>
                    
                    <span class="label label-lg font-weight-bold {{ $household->status == 1 ? 'label-light-success' : 'label-light-danger'}}  label-inline">{{ $household->status == 1 ? 'Active' : 'Deactivated' }} </span>
                    
                </td>
                <td>
                    @can('view_household')
                    <a href="{{route('admin.household.show', $household->id)}}" class="btn btn-sm btn-clean btn-icon" title="view">
                        <i class="la la-eye"></i>
                    </a>
                    @endcan
                    
                    @can('edit_household')
                    <a href="{{route('admin.household.edit', $household->id)}}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                        <i class="la la-edit"></i>
                    </a>
                    @endcan

                    @can('delete_household')
                        @if ($household->status == 1)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Delete" data-id="{{ $household->id }}">
                                <i class="la la-trash"></i>
                            </button>
                        @elseif ($household->status == 0)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Active" data-id="{{ $household->id }}">
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

{{$households->links()}}

@push('stackScript')
    <script> 
        $(".delete").click(function(e) {

            var data_id = $(this).attr("data-id");
            var url =  '<a href="{{route("admin.household.delete",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
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