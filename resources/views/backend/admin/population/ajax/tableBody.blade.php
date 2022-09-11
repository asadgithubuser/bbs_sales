<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">House Hold</th>
            <th class="text-left">Population Info</th>
            <th>Population Number</th>
            <th>Population Code</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($populations->count() > 0)
        @php
            $i = (($populations->currentPage() - 1) * $populations->perPage() + 1);
        @endphp
            @foreach ($populations as $population)
            <tr>
                <td>{{$i}}</td>
                <td align="left">{{$population->household ? $population->household->name_en : ''}}</td>
                <td align="left">{{ucfirst($population->name_en)}}</td>
                <td>{{ $population->digit_en }}</td>
                <td>{{ $population->population_code }}</td>
                <td>
                    
                    <span class="label label-lg font-weight-bold {{ $population->status == 1 ? 'label-light-success' : 'label-light-danger'}}  label-inline">{{ $population->status == 1 ? 'Active' : 'Deactivated' }} </span>
                    
                </td>
                <td>
                    @can('view_population')
                    <a href="{{route('admin.population.show', $population->id)}}" class="btn btn-sm btn-clean btn-icon" title="view">
                        <i class="la la-eye"></i>
                    </a>
                    @endcan
                    
                    @can('edit_population')
                    <a href="{{route('admin.population.edit', $population->id)}}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                        <i class="la la-edit"></i>
                    </a>
                    @endcan

                    @can('delete_population')
                        @if ($population->status == 1)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Delete" data-id="{{ $population->id }}">
                                <i class="la la-trash"></i>
                            </button>
                        @elseif ($population->status == 0)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Active" data-id="{{ $population->id }}">
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

{{$populations->links()}}

@push('stackScript')
    <script> 
        $(".delete").click(function(e) {

            var data_id = $(this).attr("data-id");
            var url =  '<a href="{{route("admin.population.delete",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
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