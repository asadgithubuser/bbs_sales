<table class="table table-separate table-head-custom table-checkable table-striped" >
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">মৌজার নাম</th>
            <th class="text-left">ফসলের নাম</th>
            <th>গত বছরের জমির পরিমাণ</th>
            <th>গত বছরের জমি উৎপাদন</th>
            <th>গত বছরের একর প্রতি ফলন হার</th>
            <th>চলতি বছরের জমির পরিমাণ</th>
            <th>চলতি বছরের জমি উৎপাদন</th>
            <th>চলতি বছরের একর প্রতি ফলন হার</th>
            <th class="text-left">প্রস্তুতকারক</th>
            <th>ক্রিয়াকলাপ</th>
        </tr>


        
    </thead>
    <tbody>
        @if ($surveyTofsilForm3MaizeDatas->count() > 0)

        @php
            $i = (($surveyTofsilForm3MaizeDatas->currentPage() - 1) * $surveyTofsilForm3MaizeDatas->perPage() + 1);
        @endphp
            <form action="{{ route('admin.surveyTofsilForm3Maize.submitForForward') }}" method="POST">
            @csrf

            @foreach ($surveyTofsilForm3MaizeDatas as $surveyTofsilForm3MaizeData)
                <input type="hidden" value="{{ $surveyTofsilForm3MaizeData->survey_notification_id }}" name="notification">
                <input type="hidden" value="{{ $surveyTofsilForm3MaizeData->survey_process_list_id }}" name="survey_process_list_id[]">

                    <tr>
                        <td>{{$i}}</td>

                        <td align="left">{{ $surveyTofsilForm3MaizeData->mouza ? $surveyTofsilForm3MaizeData->mouza->name_en : '' }}</td>
                        <td align="left">{{ $surveyTofsilForm3MaizeData->crop ? ucfirst($surveyTofsilForm3MaizeData->crop->name_en) : '' }}</td>
                        <td>{{ $surveyTofsilForm3MaizeData->last_year_land_amount }}</td>
                        <td>{{ $surveyTofsilForm3MaizeData->last_year_land_producttion }}</td>
                        <td>{{ number_format((float)$surveyTofsilForm3MaizeData->last_acre_reflection_rate, 4, '.', '') }}</td>
                        <td>{{ $surveyTofsilForm3MaizeData->current_year_land_amount }}</td>
                        <td>{{ $surveyTofsilForm3MaizeData->current_year_land_producttion }}</td>
                        <td>{{ number_format((float)$surveyTofsilForm3MaizeData->acre_reflection_rate, 4, '.', '') }}</td>

                        <td align="left">{{ $surveyTofsilForm3MaizeData->user ? $surveyTofsilForm3MaizeData->user->first_name.' '.$surveyTofsilForm3MaizeData->user->middle_name.' '.$surveyTofsilForm3MaizeData->user->last_name : '' }}</td>

                        <td>
                            <a href="{{ route('admin.surveyTofsilForm3Maize.show',$surveyTofsilForm3MaizeData) }}" class="btn btn-sm btn-clean btn-icon">                                                         
                                <i class="la la-eye text-success"></i>
                            </a>
                            
                            <a href="{{ route('admin.surveyTofsilForm3Maize.edit',$surveyTofsilForm3MaizeData) }}" class="btn btn-sm btn-clean btn-icon">                                                         
                                <i class="la la-edit text-success"></i>
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