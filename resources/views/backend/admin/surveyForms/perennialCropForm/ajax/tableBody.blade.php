<table class="table table-separate table-head-custom table-checkable table-striped" >
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">মৌজার নাম</th>
            <th class="text-left">ফসলের নাম</th>
            <th class="text-left">কৃষকের নাম</th>
            {{-- <th>কৃষকের মোবাইল নম্বর</th> --}}
            <th>মোট গাছের সংখ্যা</th>
            {{-- <th>চলতি বছরে বাগানে ফলবান গাছের সংখ্যা</th>
            <th>চলতি বছরে ফলবান বিক্ষিপ্ত গাছের সংখ্যা</th> --}}
            <th>মোট ফলবান গাছের সংখ্যা</th>
            <th>ফলবান গাছের অধীনে জমির আয়তন</th>
            <th>ফলবান গাছের প্রতি গড় ফলন</th>
            <th class="text-left">প্রস্তুতকারক</th>
            <th>ক্রিয়াকলাপ</th>
        </tr>
    </thead>
    <tbody>
        @if ($perennialCropsData->count() > 0)
        @php
            $i = (($perennialCropsData->currentPage() - 1) * $perennialCropsData->perPage() + 1);
        @endphp
            <form action="{{ route('admin.perennialCropForm.submitForForward') }}" method="POST">
                @csrf

            @foreach ($perennialCropsData as $perennialCropData)
                <input type="hidden" value="{{ $perennialCropData->survey_notification_id }}" name="notification">
                <input type="hidden" value="{{ $perennialCropData->survey_process_list_id }}" name="survey_process_list_id[]">

                {{-- @php
                    if ($perennialCropData->notification) {
                        
                        $total = $perennialCropData->notification->scope_of_action_number;
                    }
                    else {
                        
                        $total = 0;
                    }
                @endphp --}}

                    <tr>
                        <td>{{$i}}</td>

                        <td align="left">{{ $perennialCropData->mouza ? $perennialCropData->mouza->name_en : '' }}</td>
                        <td align="left">{{ $perennialCropData->crop ? ucfirst($perennialCropData->crop->name_en) : '' }}</td>
                        <td align="left">{{ $perennialCropData->farmer ? $perennialCropData->farmer->farmers_name : '' }}</td>
                        {{-- <td>{{ $perennialCropData->farmer ? $perennialCropData->farmer->farmers_mobile : ''}}</td> --}}
                        <td>{{ $perennialCropData->total_trees }}</td>
                        {{-- <td>{{ $perennialCropData->total_fruity_trees_in_garden }}</td>
                        <td>{{ $perennialCropData->total_fruity_scattered_trees }}</td> --}}
                        <td>{{ $perennialCropData->total_fruity_trees }}</td>
                        <td>{{ $perennialCropData->land_amount_under_the_fruitly_trees }}</td>
                        <td>{{ number_format((float)$perennialCropData->average_yield_per_tree, 4, '.', '') }}</td>

                        <td align="left">{{$perennialCropData->user ? $perennialCropData->user->first_name.' '.$perennialCropData->user->middle_name.' '.$perennialCropData->user->last_name : ''}}</td>

                        <td>
                            <a href="{{ route('admin.perennialCropForm.show', $perennialCropData->id) }}" class="btn btn-sm btn-clean btn-icon"><i class="la la-eye text-success"></i></a>
                            <a href="{{ route('admin.perennialCropForm.edit', $perennialCropData->id) }}" class="btn btn-sm btn-clean btn-icon"><i class="la la-pencil text-primary"></i></a>
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