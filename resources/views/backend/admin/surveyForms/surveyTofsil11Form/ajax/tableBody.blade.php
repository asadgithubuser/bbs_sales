<table class="table table-separate table-head-custom table-checkable table-striped" >
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">ইউনিয়নের নাম</th>
            <th class="text-left">ফসলের নাম</th>
            <th>ক্ষতির সময়কাল শুরুর তারিখ</th>
            <th>ক্ষতির মেয়াদ শেষ হওয়ার তারিখ</th>
            <th class="text-left">প্রস্তুতকারক</th>
            <th>ক্রিয়াকলাপ</th>
        </tr>
    </thead>
    <tbody>
        @if ($surveyTofsil11Datas->count() > 0)
        @php
            $i = (($surveyTofsil11Datas->currentPage() - 1) * $surveyTofsil11Datas->perPage() + 1);
        @endphp
            <form action="{{ route('admin.surveyTofsilForm11.submitForForward') }}" method="POST">
                @csrf

            @foreach ($surveyTofsil11Datas as $surveyTofsil11Data)
                <input type="hidden" value="{{ $surveyTofsil11Data->survey_notification_id }}" name="notification">
                <input type="hidden" value="{{ $surveyTofsil11Data->survey_process_list_id }}" name="survey_process_list_id[]">

                    <tr>
                        <td>{{$i}}</td>

                        <td align="left">{{ $surveyTofsil11Data->union ? $surveyTofsil11Data->union->name_en : '' }}</td>
                        <td align="left">{{ $surveyTofsil11Data->crop ? $surveyTofsil11Data->crop->name_en : '' }}</td>
                        <td>{{ date('M d, Y', strtotime($surveyTofsil11Data->loss_period_start_date)) }}</td>
                        <td>{{ date('M d, Y', strtotime($surveyTofsil11Data->loss_period_end_date)) }}</td>

                        <td align="left">{{$surveyTofsil11Data->user ? $surveyTofsil11Data->user->first_name.' '.$surveyTofsil11Data->user->middle_name.' '.$surveyTofsil11Data->user->last_name : ''}}</td>

                        <td>
                            <a href="{{ route('admin.surveyTofsilForm11.show',$surveyTofsil11Data) }}" class="btn btn-sm btn-clean btn-icon">                                                         
                                <i class="la la-eye text-info"></i>
                            </a>

                            <a href="{{ route('admin.surveyTofsilForm11.edit',$surveyTofsil11Data) }}" class="btn btn-sm btn-clean btn-icon">                                                         
                                <i class="la la-edit text-info"></i>
                            </a>
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