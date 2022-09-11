<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Farmer</th>
            
            <th>Year</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($tofsil7datas->count() > 0)
            @php
                $i = ($tofsil7datas->currentPage() - 1) * $tofsil7datas->perPage() + 1;
            @endphp

            @foreach ($tofsil7datas as $list)
                <tr>
                    <td>{{ $i }}</td>
                    <td class="text-left">{{ $list->farmer ? $list->farmer->farmers_name : '' }}</td>
                    
                    <td>{{ $listData->year ? $listData->year : ''}}</td>
                    <td>
                        
                        <a href="{{ route('admin.processingList.showUpazilaTofsil7',$list) }}" class="btn btn-info btn-sm">Report</a>
                        
                        
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
        

        

    </script>
@endpush
