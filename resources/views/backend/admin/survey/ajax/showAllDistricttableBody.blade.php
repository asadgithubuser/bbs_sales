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
                <td class="text-left">{{ $list->surveyCountDistrict($list->district_id)}}</td>
                <td>{{ $list->year ? $list->year : ''}}</td>
                <td>
                    
                    <a href="{{ route('admin.processingList.showDistrict',['list'=>$list->district_id,'form'=>$list->survey_form_id]) }}" class="btn btn-info btn-sm">All List</a>
                    <a href="{{ route('admin.processingList.backwardToDistrict',$list) }}" class="btn btn-danger btn-sm">Backward</a>
                    
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
