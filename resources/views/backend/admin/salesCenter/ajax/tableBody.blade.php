<table class="table table-separate table-head-custom table-checkable table-striped" >
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Name English</th>
            <th class="text-left">Name Bangla</th>
            <th class="text-left">Address</th>
            <th class="text-left">Created By</th>
            <th class="text-left">Updated By</th>
            <th>Created At</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($salesCenters->count() > 0)
            @php                
                $i = (($salesCenters->currentPage() - 1) * $salesCenters->perPage() + 1); 
            @endphp
            
            @foreach ($salesCenters as $salesCenter)
                <tr>
                    <td>
                        {{ $i }}
                    </td>
                    <td align="left">
                        {{$salesCenter->name_en}}
                    </td>
                    <td align="left">
                        {{$salesCenter->name_bn}} 
                    </td>
                    <td align="left">
                        {{$salesCenter->address}}
                    </td>
                    <td align="left"> 
                        {{$salesCenter->createdBy ? $salesCenter->createdBy->first_name.' '.$salesCenter->createdBy->middle_name.' '.$salesCenter->createdBy->last_name : ''}} 
                    </td>
                    <td align="left"> 
                        {{$salesCenter->updatedBy ? $salesCenter->updatedBy->first_name.' '.$salesCenter->updatedBy->middle_name.' '.$salesCenter->updatedBy->last_name : ''}}
                    </td>
                    <td align="middle"> 
                        {{date('d-m-Y', strtotime($salesCenter->created_at))}} 
                    </td>
                    <td>
                        @if ($salesCenter->status == 1)
                            <span class="label label-lg font-weight-bold label-light-success label-inline">Active</span>
                        @else
                            <span class="label label-lg font-weight-bold label-light-danger label-inline">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('admin.salesCenter.edit', $salesCenter->id)}}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                            <i class="la la-edit text-warning"></i>
                        </a>
                    </td>
                </tr>
                @php $i++; @endphp

            @endforeach
        @else
            <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">No matching records found</td></tr>
        @endif
    </tbody>
</table>