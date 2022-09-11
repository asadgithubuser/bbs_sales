<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Union</th>
            <th class="text-left">Mouja</th>
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
                <td class="text-left">{{ $list->union ? $list->union->name_en : '' }}</td>
                <td class="text-left">{{ $list->mouza ? $list->mouza->name_en : '' }}</td>
                <td class="text-left">{{ $list->surveyCount()}}</td>
                <td>{{ $list->year ? $list->year : ''}}</td>
                <td>
                    
                    @if ($list->surveyCount() > 0)
                        
                        <a href="{{ route('admin.processingList.show',$list) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('admin.processingList.backwardToUpazila',$list) }}" class="btn btn-danger btn-sm">Backward</a>
                        
                    @else 

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
