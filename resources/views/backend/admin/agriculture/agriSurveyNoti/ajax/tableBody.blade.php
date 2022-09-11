<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Sender Name</th> 
            <th class="text-left">Sender Designation</th>
            <th class="text-left">Survey Form Name</th>            
            <th>Date</th>
            {{-- <th>Actions</th> --}}
        </tr>
    </thead>
    <tbody>
        @if ($notifications->count() > 0)
        @php
            $i = (($notifications->currentPage() - 1) * $notifications->perPage() + 1);
        @endphp
            @foreach ($notifications as $notification)
            <tr>
                <td>{{$i}}</td>

                <td align="left">{{ $notification->senderUser ? ucfirst($notification->senderUser->first_name).' '.ucfirst($notification->senderUser->middle_name).' '.ucfirst($notification->senderUser->last_name) : ''}}</td>

                <td align="left">{{ $notification->senderUser ? $notification->senderUser->designation ? $notification->senderUser->designation->name_en : '' : ''}}</td>

                <td align="left">{{$notification->surveyForm ? $notification->surveyForm->display_name : ''}}</td>

                <td>{{date('d-M-Y', strtotime($notification->created_at))}}</td>

                {{-- <td>
                    <a href="{{route('admin.form.shankalanForm', ['id' => $notification->survey_form_id, 'notification' => $notification->id])}}" class="btn btn-sm btn-clean btn-icon btn-success" title="Show"> Go </a>
                </td> --}}
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
{{$notifications->links()}}

