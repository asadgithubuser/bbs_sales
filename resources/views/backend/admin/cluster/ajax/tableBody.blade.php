<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Cluster Name</th>
            <th>Cluster Code</th>
            <th class="text-left">Division Name</th>
            <th class="text-left">District Name</th>
            <th class="text-left">Upazila Name</th>
            <th class="text-left">Union Name</th>
            <th class="text-left">Mouza Name</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($clusters->count() > 0)
        @php
            $i = (($clusters->currentPage() - 1) * $clusters->perPage() + 1);
        @endphp
            @foreach ($clusters as $cluster)
            
                @php
                    $unions_id = explode(',', $cluster->union_id);
                    $unions = App\Models\Union::whereIn('id', $unions_id)->get();

                    $mouzas_id = explode(',', $cluster->mouza_id);
                    $mouzas = App\Models\Mouza::whereIn('id', $mouzas_id)->get();
                @endphp

                <tr>
                    <td>{{$i}}</td>
                    <td align="left">{{ucfirst($cluster->name_en)}}</td>
                    <td>{{$cluster->code}}</td>
                    <td align="left">{{$cluster->division ? $cluster->division->name_en : ''}}</td>
                    <td align="left">{{$cluster->district ? $cluster->district->name_en : ''}}</td>
                    <td align="left">{{$cluster->upazila ? $cluster->upazila->name_en : ''}}</td>
                    <td align="left">
                        @foreach ($unions as $union)
                            {{$union->name_en}};
                        @endforeach
                    </td>
                    <td align="left">
                        @foreach ($mouzas as $mouza)
                            {{$mouza->name_en}};
                        @endforeach
                    </td>
                    <td>
                        <span class="label label-lg font-weight-bold {{ $cluster->status == 1 ? 'label-light-success' : 'label-light-danger'}}  label-inline">{{ $cluster->status == 1 ? 'Active' : 'Deactivated' }} </span>
                    </td>
                    <td>
                        {{-- <a href="{{route('admin.mouza.show', $cluster->id)}}" class="btn btn-sm btn-clean btn-icon" title="view">
                            <i class="la la-eye"></i>
                        </a> --}}
                        
                        <a href="{{route('admin.cluster.edit', $cluster->id)}}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                            <i class="la la-edit"></i>
                        </a>

                        @if ($cluster->status == 1)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Delete" data-id="{{ $cluster->id }}">
                                <i class="la la-trash"></i>
                            </button>
                        @elseif ($cluster->status == 0)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Active" data-id="{{ $cluster->id }}">
                                <i class="la la-check"></i>
                            </button>
                        @endif
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
{{$clusters->links()}}

@push('stackScript')
    <script> 
        $(".delete").click(function(e) {

            var data_id = $(this).attr("data-id");
            var url =  '<a href="{{route("admin.cluster.changeStatus",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
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