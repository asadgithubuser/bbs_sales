<table class="table table-separate table-head-custom table-checkable table-striped" >
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Mouza Name</th>
            <th class="text-left">Farmer's Name</th>
            <th class="text-left">Crop Name</th>
            <th class="text-left">Crop Variety</th>
            <th class="text-center">Land Segment Signal</th>
            <th class="text-left">Created By</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($surveyTofsilForm7sData->count() > 0)
        @php
            $i = (($surveyTofsilForm7sData->currentPage() - 1) * $surveyTofsilForm7sData->perPage() + 1);
        @endphp
        
        <form action="{{ route('admin.surveyTofsilForm7.submitForForward') }}" method="POST">
            <button type="submit" class="btn btn-success btn-sm">Submit</button>
                @csrf

            @foreach ($surveyTofsilForm7sData as $surveyTofsilForm7Data)
                
                <input type="hidden" value="{{ $surveyTofsilForm7Data->survey_notification_id }}" name="notification">
                <input type="hidden" value="{{ $surveyTofsilForm7Data->survey_process_list_id }}" name="survey_process_list_id[]">

                    <tr>
                        <td>{{ $i }}</td>

                        <td align="left">{{ $surveyTofsilForm7Data->mouza ? $surveyTofsilForm7Data->mouza->name_en : '' }}</td>
                        
                        <td align="left">{{ $surveyTofsilForm7Data->farmer ? $surveyTofsilForm7Data->farmer->farmers_name : '' }}</td>
                        <td align="left">{{ $surveyTofsilForm7Data->crop ? ucfirst($surveyTofsilForm7Data->crop->name_en) : '' }}</td>

                        <td align="left">
                            @if ($surveyTofsilForm7Data->crop_varieties == 1)
                                দেশি
                            @elseif ($surveyTofsilForm7Data->crop_varieties == 2)
                                উফশি
                            @else
                                হাইব্রিড
                            @endif
                        </td>

                        <td>{{ $surveyTofsilForm7Data->pot_of_land }}</td>

                        <td align="left">{{$surveyTofsilForm7Data->user ? $surveyTofsilForm7Data->user->first_name.' '.$surveyTofsilForm7Data->user->middle_name.' '.$surveyTofsilForm7Data->user->last_name : ''}}</td>

                        <td>
                            <a href="{{ route('admin.surveyTofsilForm7.show',$surveyTofsilForm7Data) }}" class="btn btn-sm btn-clean btn-icon">                                                         
                                <i class="la la-eye text-success"></i>
                            </a>
                            <a href="{{ route('admin.surveyTofsilForm7.edit',$surveyTofsilForm7Data) }}" class="btn btn-sm btn-clean btn-icon">                                                         
                                <i class="la la-edit text-success"></i>
                            </a>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
               
            @endforeach
        </form>
        @else
            <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">No matching records found</td></tr>
        @endif
    </tbody>
</table>