<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Mouza</th>
            <th class="text-left">Total Response</th>
            <th >Year</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($lists->count() > 0)
            @php
                $i = ($lists->currentPage() - 1) * $lists->perPage() + 1;
            @endphp


            @foreach ($lists as $list)
                <tr>
                    <td>{{ $i }}</td>
                    <td class="text-left">{{ $list->mouza ? $list->mouza->name_en : '' }}</td>
                    <td class="text-left">{{ $list->cropCuttingCount()}}</td>
                    <td>{{ $list->year ? $list->year : ''}}</td>
                    <td>
                        @if ($list->status == 2)
                            <button class="btn btn-success btn-sm w3-circle forward_btn" title="Forward" data-id="{{ $list->id }}">Forward</button>
                            <button class="btn btn-danger btn-sm w3-circle backward_btn" title="Backward" data-id="{{ $list->id }}">Backward</button>
                            <a href="{{ route('admin.processingList.showUpazilaTofsil4', $list) }}" class="btn btn-info btn-sm">Report</a>
                            <a href="{{ route('admin.processingList.daeOfficerTofsil2',$list) }}" class="btn btn-warning btn-sm">DAE Officer</a>
                        @endif
                    </td>
                @php
                    $i++;
                @endphp
                </tr>
            @endforeach
            
        @else
            <tr class="odd">
                <td valign="top" colspan="11" class="dataTables_empty">No matching records found</td>
            </tr>
        @endif
    </tbody>
</table>

@push('stackScript')
    <script> 
        $(".forward_btn").click(function(e) {
            var data_id = $(this).attr("data-id");
            var url = '<a href="{{route("admin.processingList.forwardToDistrict", ":id")}}" class="swal2-confirm swal2-styled" title="Forward">Confirm</a>';
            url = url.replace(':id', data_id );
            
            Swal.fire({
                title: 'Are you sure want to forward ?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: url,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Data Forwarded Successfully!', '', 'success')
                } else if (result.dismiss === "cancel") {
                    Swal.fire('Canceled', '', 'error')
                }
            })
        });

        $(".backward_btn").click(function(e) {
            var data_id = $(this).attr("data-id");
            var url = '<a href="{{route("admin.processingList.backwardToUnion", ":id")}}" class="swal2-confirm swal2-styled" title="Backward">Confirm</a>';
            url = url.replace(':id', data_id );
            
            Swal.fire({
                title: 'Are you sure want to return this data?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: url,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Data Backwarded Successfully!', '', 'success')
                } else if (result.dismiss === "cancel") {
                    Swal.fire('Canceled', '', 'error')
                }
            })
        });

    </script>
@endpush
