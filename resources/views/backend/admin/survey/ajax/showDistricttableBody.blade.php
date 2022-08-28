<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Upazila</th>
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
                <td class="text-left">{{ $list->upazila ? $list->upazila->name_en : '' }}</td>
                <td class="text-left">{{ $list->surveyCountUpazila($list->upazila_id)}}</td>
                <td>{{ $list->year ? $list->year : ''}}</td>
                <td>
                    
                    <a href="{{ route('admin.processingList.showUpazila',$list->upazila_id) }}" class="btn btn-info btn-sm">All Report</a>
                    <a href="{{ route('admin.processingList.backwardToUpazila',$list) }}" class="btn btn-danger btn-sm">Backward</a>
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
