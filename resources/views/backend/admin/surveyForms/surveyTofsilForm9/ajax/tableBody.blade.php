<table class="table table-separate table-head-custom table-checkable table-striped" >
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Upazila Name</th>
            <th>Upazila Code</th>
            <th>Upazila Volume</th>
            <th>Year</th>
            <th>Collection Timeline</th>
            <th class="text-left">Created By</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($surveyTofsilForm9sData->count() > 0)
        @php
            $i = (($surveyTofsilForm9sData->currentPage() - 1) * $surveyTofsilForm9sData->perPage() + 1);
        @endphp
            <form action="{{ route('admin.surveyTofsilForm9.submitForForward') }}" method="POST">
                @csrf

            @foreach ($surveyTofsilForm9sData as $surveyTofsilForm9Data)
                <input type="hidden" value="{{ $surveyTofsilForm9Data->survey_notification_id }}" name="notification">
                <input type="hidden" value="{{ $surveyTofsilForm9Data->survey_process_list_id }}" name="survey_process_list_id[]">

                    <tr>
                        <td>{{ $i }}</td>

                        <td align="left">{{ $surveyTofsilForm9Data->upazilaInfo ? $surveyTofsilForm9Data->upazilaInfo->name_en : '' }}</td>
                        
                        <td>{{ $surveyTofsilForm9Data->upazilaInfo ? $surveyTofsilForm9Data->upazilaInfo->upazila_bbs_code : '' }}</td>
                        <td>{{ $surveyTofsilForm9Data->upazilaInfo ? ucfirst($surveyTofsilForm9Data->upazilaInfo->land_area) : '' }}</td>

                        <td>
                            {{ $surveyTofsilForm9Data->year }}
                        </td>

                        <td>{{ $surveyTofsilForm9Data->information_collection_time }}</td>

                        <td align="left">{{$surveyTofsilForm9Data->user ? $surveyTofsilForm9Data->user->first_name.' '.$surveyTofsilForm9Data->user->middle_name.' '.$surveyTofsilForm9Data->user->last_name : ''}}</td>

                        <td>
                            <a href="{{ route('admin.surveyTofsilForm9.show',$surveyTofsilForm9Data) }}" class="btn btn-sm btn-clean btn-icon">                                                         
                                <i class="la la-eye text-success"></i>
                            </a>
                            <a href="{{ route('admin.surveyTofsilForm9.edit',$surveyTofsilForm9Data) }}" class="btn btn-sm btn-clean btn-icon">                                                         
                                <i class="la la-edit text-success"></i>
                            </a>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
               
            @endforeach

                <button type="submit" class="btn btn-success btn-sm">Submit</button>
            </form>
        @else
            <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">No matching records found</td></tr>
        @endif
    </tbody>
</table>