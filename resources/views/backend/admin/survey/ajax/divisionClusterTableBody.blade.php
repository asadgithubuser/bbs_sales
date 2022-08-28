<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">District</th>
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
                <td class="text-left">{{ $list->district ? $list->district->name_en : '' }}</td>
                <td class="text-left">{{ $list->surveyCountClusterDistrict( $list->district_id)}}</td>
                <td>{{ $list->year ? $list->year : ''}}</td>
                <td>
                    
                    <button class="btn btn-success btn-sm w3-circle forward_btn" title="Forward" data-id="{{ $list->id }}">Forward</button>
                    <a href="{{ route('admin.processingList.showDistrictCluster',['list'=>$list->district_id,'form'=>$list->survey_form_id]) }}" class="btn btn-info btn-sm">All List</a>
                    <a href="{{ route('admin.processingList.districtClusterData',$list) }}" class="btn btn-info btn-sm">Report</a>
                    
                    <a href="{{ route('admin.processingList.backwardToDistrict',$list) }}" class="btn btn-danger btn-sm">Backward</a>

                </td>
                @php
                    $i++;
                @endphp
                </tr>
            @endforeach
            <a href="{{ route('admin.processingList.divisionClusterData',$list) }}" class="w3-btn w3-teal w3-shadow-black" style="box-shadow: 0 8px 16px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);">বিভাগের সকল তথ্য</a>

            
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
            var url = '<a href="{{route("admin.processingList.forwardToDg", ":id")}}" class="swal2-confirm swal2-styled" title="Forward">Confirm</a>';
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

    </script>
@endpush
