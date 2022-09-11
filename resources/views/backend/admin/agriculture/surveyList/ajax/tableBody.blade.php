<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Survey By</th>
            <th class="text-left">Survey Of</th> 
            <th class="text-left">Cluster</th>            
            <th class="text-left">Mouza</th>            
            <th class="text-left">Union</th>
            <th class="text-left">Upazila</th>            
            <th class="text-left">District</th>            
            <th class="text-left">Division</th>            
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @if ($surveyProcessList->count() > 0)
        @php
            $i = (($surveyProcessList->currentPage() - 1) * $surveyProcessList->perPage() + 1);
        @endphp
            @foreach ($surveyProcessList as $spl)
            <tr>
                <td>{{ $i }}</td>

                <td align="left">{{ $spl->surveyBy ? ucfirst($spl->surveyBy->first_name).' '.ucfirst($spl->surveyBy->middle_name).' '.ucfirst($spl->surveyBy->last_name) : ''}}</td>
                <td align="left">{{ $spl->surveyForm ? ucfirst($spl->surveyForm->display_name) : '-'}}</td>
                <td align="left">{{$spl->cluster ? $spl->cluster->name_en : '-'}}</td>
                <td align="left">{{$spl->mouza ? $spl->mouza->name_en : '-'}}</td>
                <td align="left">{{ $spl->union ? $spl->union->name_en : '-'}}</td>
                <td align="left">{{$spl->upazila ? $spl->upazila->name_en : ''}}</td>
                <td align="left">{{$spl->district ? $spl->district->name_en : ''}}</td>
                <td align="left">{{$spl->division ? $spl->division->name_en : ''}}</td>

                <td>{{ date('d-M-Y', strtotime($spl->created_at)) }}</td>

                <td>
                    <a href="{{ route('admin.form.edit', $spl) }}" class="btn btn-sm btn-clean btn-icon btn-success" title="Edit">
                        Edit
                    </a>
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
{{$surveyProcessList->links()}}

