<table class="table table-separate table-head-custom table-checkable table-striped" >
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">দাগগুচ্ছের নাম</th>
            <th class="text-left">কৃষকের নাম</th>
            <th>কৃষকের মোবাইল নম্বর</th>
            <th class="text-left">কৃষকের পিতার নাম</th>
            <th class="text-left">প্রস্তুতকারক</th>
            <th>ক্রিয়াকলাপ</th>
        </tr>
    </thead>
    <tbody>
        @if ($tofsil8sData->count() > 0)
        @php
            $i = (($tofsil8sData->currentPage() - 1) * $tofsil8sData->perPage() + 1);
        @endphp
            <form action="{{ route('admin.surveyTofsilForm8.submitForForward') }}" method="POST">
                @csrf

            @foreach ($tofsil8sData as $tofsil8Data)
                <input type="hidden" value="{{ $tofsil8Data->survey_notification_id }}" name="notification">
                <input type="hidden" value="{{ $tofsil8Data->survey_process_list_id }}" name="survey_process_list_id[]">

                <tr>
                    <td>{{$i}}</td>

                    <td align="left">{{ $tofsil8Data->cluster ? $tofsil8Data->cluster->name_en : '' }}</td>
                    <td  align="left">{{ $tofsil8Data->farmer ? $tofsil8Data->farmer->farmers_name : $tofsil8Data->farmers_name}}</td>
                    <td align="left">{{ $tofsil8Data->farmers_mobile }}</td>
                    <td align="left">{{ $tofsil8Data->fathers_name }}</td>

                    <td align="left">{{$tofsil8Data->user ? $tofsil8Data->user->first_name.' '.$tofsil8Data->user->middle_name.' '.$tofsil8Data->user->last_name : ''}}</td>

                    <td>
                        <a href="{{ route('admin.surveyTofsilForm8.show', $tofsil8Data) }}" class="btn btn-sm btn-clean btn-icon"><i class="la la-eye text-primary"></i></a>

                        <a href="{{ route('admin.surveyTofsilForm8.edit', $tofsil8Data) }}" class="btn btn-sm btn-clean btn-icon"><i class="la la-pencil text-primary"></i></a>
                    </td>
                </tr>
                @php
                    $i++;
                @endphp
               
            @endforeach

                <button type="submit" class="btn btn-success btn-sm">প্রেরণ করুন</button>
            </form>
        @else
            <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">কোনো রেকর্ড পাওয়া যায়নি</td></tr>
        @endif
    </tbody>
</table>