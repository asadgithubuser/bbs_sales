<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Cluster</th>
            <th class="text-left">Total Response</th>
            <th  class="text-left">Crop Name</th>
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
                <td class="text-left">{{ $list->cluster ? $list->cluster->name_en : '' }}</td>
                <td class="text-left">{{ $list->surveyClusterCount()}}</td>
                <td class="text-left">
                    @if ($form_1 =$list->form1($list))
                        {{ $form_1->crop ? $form_1->crop->name_en : '' }}
                    @endif
                </td>
                <td>{{ $list->year ? $list->year : ''}}</td>
                <td>
                    @if ($list->status == 2)
                    <button class="btn btn-success btn-sm w3-circle forward_btn" title="Forward" data-id="{{ $list->id }}">Forward</button>
                    <button class="btn btn-danger btn-sm w3-circle backward_btn" title="Backward" data-id="{{ $list->id }}">Backward</button>
                    <a href="{{ route('admin.processingList.show',$list) }}" class="btn btn-info btn-sm">Report</a>
                    <a href="{{ route('admin.processingList.allListOfClusters',$list) }}" class="btn btn-warning btn-sm">Edit</a>
                    @endif
                </td>
                @php
                    $i++;
                @endphp
                </tr>
            @endforeach
            @if ($list->status == 2)
            <a href="{{ route('admin.processingList.upazilaClusterData',$list) }}" class="w3-btn w3-teal w3-shadow-black" style="box-shadow: 0 8px 16px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);">উপজেলার সকল তথ্য</a>
            @endif
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
