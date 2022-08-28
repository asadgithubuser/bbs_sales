<style>
    th{
        font-size: 14px !important;
    }
</style>

<table class="table table-separate table-head-custom table-checkable table-striped" >
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">মৌজার নাম</th>
            <th class="text-left">ফসলের নাম</th>
            <th class="text-left">চাষের ধরন</th>
            <th class="text-left">কৃষকের নাম</th>
            <th class="text-center">জমির রেখাংশের সংকেত </th>
            <th class="text-center">জমির পরিমাণ</th>
            <th>পানি সেচ</th>
            <th>সার ব্যবহার করেছেন?</th>
            <th>কীটনাশক ব্যবহার করেছে?</th>
            <th class="text-left">প্রস্তুতকারক</th>
            <th>ক্রিয়াকলাপ</th>
        </tr>
    </thead>
    <tbody>
        @if ($cropCuttingProductionsData->count() > 0)
        @php
            $i = (($cropCuttingProductionsData->currentPage() - 1) * $cropCuttingProductionsData->perPage() + 1);
        @endphp
            <form action="{{ route('admin.temporaryCropForm.submitForForward') }}" method="POST">
                @csrf

            @foreach ($cropCuttingProductionsData as $cropCuttingProductionData)
                <input type="hidden" value="{{ $cropCuttingProductionData->survey_notification_id }}" name="notification">
                <input type="hidden" value="{{ $cropCuttingProductionData->survey_process_list_id }}" name="survey_process_list_id[]">

                    <tr>
                        <td>{{$i}}</td>

                        <td align="left">{{ $cropCuttingProductionData->mouza ? $cropCuttingProductionData->mouza->name_en : '' }}</td>
                        <td align="left">{{ $cropCuttingProductionData->crop ? ucfirst($cropCuttingProductionData->crop->name_en) : '' }}</td>
                        <td align="left">
                            @if ($cropCuttingProductionData->type_of_cultivation == 6)
                            বোনা
                            @elseif ($cropCuttingProductionData->type_of_cultivation == 7)
                            রোপা
                            @endif
                        </td>
                        <td align="left">{{ $cropCuttingProductionData->farmer ? $cropCuttingProductionData->farmer->farmers_name : '' }}</td>
                        <td>{{ $cropCuttingProductionData->land_segment_signal }}</td>
                        <td align="center">{{ $cropCuttingProductionData->amount_of_land }}</td>

                        <td>
                            @if ($cropCuttingProductionData->water_irrigation == 1)
                                হ্যাঁ
                            @elseif ($cropCuttingProductionData->water_irrigation == 2)
                                না
                            @endif
                        </td>
                        <td>
                            @if ($cropCuttingProductionData->has_used_fertilizer == 1)
                                হ্যাঁ
                            @elseif ($cropCuttingProductionData->has_used_fertilizer == 2)
                                না
                            @endif
                        </td>
                        <td>
                            @if ($cropCuttingProductionData->is_used_pesticide == 1)
                                হ্যাঁ
                            @elseif ($cropCuttingProductionData->is_used_pesticide == 2)
                                না
                            @endif
                        </td>

                        <td align="left">{{$cropCuttingProductionData->user ? $cropCuttingProductionData->user->first_name.' '.$cropCuttingProductionData->user->middle_name.' '.$cropCuttingProductionData->user->last_name : ''}}</td>

                         <td>
                            <a href="{{ route('admin.cropCuttingProductionForm.show', $cropCuttingProductionData->id) }}" class="btn btn-sm btn-clean btn-icon"><i class="la la-eye text-success"></i></a>
                            <a href="{{ route('admin.cropCuttingProductionForm.edit', $cropCuttingProductionData->id) }}" class="btn btn-sm btn-clean btn-icon"><i class="la la-pencil text-primary"></i></a>
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