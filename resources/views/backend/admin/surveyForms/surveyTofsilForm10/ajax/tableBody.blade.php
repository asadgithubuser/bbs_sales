<table class="table table-separate table-head-custom table-checkable table-striped" >
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">ইউনিয়নের নাম</th>
            <th class="text-left">ফসলের নাম</th>
            <th class="text-left">ফসলে ধরন</th>
            <th>সংগ্রহ শুরুর তারিখ</th>
            <th>সংগ্রহ শেষ হওয়ার তারিখ</th>
            <th class="text-left">প্রস্তুতকারক</th>
            <th>ক্রিয়াকলাপ</th>
        </tr>
    </thead>
    <tbody>
        @if ($surveyTofsilForm10Datas->count() > 0)
        @php
            $i = (($surveyTofsilForm10Datas->currentPage() - 1) * $surveyTofsilForm10Datas->perPage() + 1);
        @endphp
            <form action="{{ route('admin.surveyTofsilForm10.submitForForward') }}" method="POST">
                @csrf

            @foreach ($surveyTofsilForm10Datas as $surveyTofsilForm10Data)
                <input type="hidden" value="{{ $surveyTofsilForm10Data->survey_notification_id }}" name="notification">
                <input type="hidden" value="{{ $surveyTofsilForm10Data->survey_process_list_id }}" name="survey_process_list_id[]">

                    <tr>
                        <td>{{$i}}</td>

                        <td align="left">{{ $surveyTofsilForm10Data->union ? $surveyTofsilForm10Data->union->name_en : '' }}</td>
                        <td align="left">{{ $surveyTofsilForm10Data->crop ? ucfirst($surveyTofsilForm10Data->crop->name_en) : '' }}</td>
                        <td align="left">{{ $surveyTofsilForm10Data->crop_varieties }}</td>
                        <td>{{ date('M d, Y', strtotime($surveyTofsilForm10Data->collection_start_date)) }}</td>
                        <td>{{ date('M d, Y', strtotime($surveyTofsilForm10Data->collection_end_date)) }}</td>

                        <td align="left">{{$surveyTofsilForm10Data->user ? $surveyTofsilForm10Data->user->first_name.' '.$surveyTofsilForm10Data->user->middle_name.' '.$surveyTofsilForm10Data->user->last_name : ''}}</td>

                        <td>
                            <a href="{{ route('admin.surveyTofsilForm10.show', $surveyTofsilForm10Data) }}" class="btn btn-sm btn-clean btn-icon"><i class="la la-eye text-primary"></i></a>
                            
                            <a href="{{ route('admin.surveyTofsilForm10.edit', $surveyTofsilForm10Data) }}" class="btn btn-sm btn-clean btn-icon"><i class="la la-pencil text-primary"></i></a>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
               
            @endforeach

                <button type="submit" class="btn btn-success btn-sm">প্রেরণ করুন</button>
            </form>
        @else
            <tr class="odd"><td valign="top" colspan="10" class="dataTables_empty">কোনো রেকর্ড পাওয়া যায়নি</td></tr>
        @endif
    </tbody>
</table>