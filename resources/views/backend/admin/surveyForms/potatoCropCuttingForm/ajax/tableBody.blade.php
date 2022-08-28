<table class="table table-separate table-head-custom table-checkable table-striped" >
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">মৌজার নাম</th>
            <th class="text-left">আলুর ধরণ</th>
            <th class="text-left">কৃষকের নাম</th>
            <th class="text-center">জমির রেখাংশের সংকেত</th>
            <th class="text-center">জমির পরিমাণ</th>
            <th class="text-left">প্রস্তুতকারক</th>
            <th class="text-center">ক্রিয়াকলাপ</th>
        </tr>
    </thead>
    <tbody>
        @if ($potatoCropCuttingsData->count() > 0)
        @php
            $i = (($potatoCropCuttingsData->currentPage() - 1) * $potatoCropCuttingsData->perPage() + 1);
        @endphp
            <form action="{{ route('admin.potatoCropCutting.submitForForward') }}" method="POST">
                @csrf

            @foreach ($potatoCropCuttingsData as $potatoCropCuttingData)
                <input type="hidden" value="{{ $potatoCropCuttingData->survey_notification_id }}" name="notification">
                <input type="hidden" value="{{ $potatoCropCuttingData->survey_process_list_id }}" name="survey_process_list_id[]">

                {{-- @php
                    if ($potatoCropCuttingData->notification) {
                        
                        $total = $potatoCropCuttingData->notification->scope_of_action_number;
                    }
                    else {
                        $total = 0;
                    }
                @endphp --}}

                    <tr>
                        <td>{{$i}}</td>

                        <td align="left">{{ $potatoCropCuttingData->mouza ? $potatoCropCuttingData->mouza->name_en : '' }}</td>
                        
                        <td align="left">
                            @if ($potatoCropCuttingData->potato_varieties == 1)
                            দেশি
                            @elseif ($potatoCropCuttingData->potato_varieties == 2)
                            উচ্চ ফলনশীল
                            @else
                            ভারতীয়
                            @endif
                        </td>
                        <td align="left">{{ $potatoCropCuttingData->farmer ? $potatoCropCuttingData->farmer->farmers_name : '' }}</td>
                        <td>{{ $potatoCropCuttingData->land_segment_signal }}</td>
                        <td align="center">{{ $potatoCropCuttingData->land_amount_of_plot }}</td>

                        <td align="left">{{$potatoCropCuttingData->user ? $potatoCropCuttingData->user->first_name.' '.$potatoCropCuttingData->user->middle_name.' '.$potatoCropCuttingData->user->last_name : ''}}</td>

                        <td>
                            <a href="{{ route('admin.potatoCropCutting.show',$potatoCropCuttingData) }}" class="btn btn-sm btn-clean btn-icon">                                                         
                                <i class="la la-eye text-success"></i>
                            </a>
                            <a href="{{ route('admin.potatoCropCutting.edit',$potatoCropCuttingData) }}" class="btn btn-sm btn-clean btn-icon">                                                         
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