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
            <th class="text-left">কৃষকের নাম</th>
            <th>কৃষকের মোবাইল নম্বর</th>
            <th>একর প্রতি ফলনের হার</th>
            <th class="text-left">প্রস্তুতকারক</th>
            <th>ক্রিয়াকলাপ</th>
        </tr>
    </thead>
    <tbody>
        @if ($temporaryCropsData->count() > 0)
        @php
            $i = (($temporaryCropsData->currentPage() - 1) * $temporaryCropsData->perPage() + 1);
        @endphp
            <form action="{{ route('admin.temporaryCropForm.submitForForward') }}" method="POST">
                @csrf

            @foreach ($temporaryCropsData as $temporaryCropData)
                <input type="hidden" value="{{ $temporaryCropData->survey_notification_id }}" name="notification">
                <input type="hidden" value="{{ $temporaryCropData->survey_process_list_id }}" name="survey_process_list_id[]">

                {{-- @php
                    if ($temporaryCropData->notification) {
                        
                        $total = $temporaryCropData->notification->scope_of_action_number;
                    }
                    else {
                        
                        $total = 0;
                    }
                @endphp --}}

                    <tr>
                        <td>{{$i}}</td>

                        <td align="left">{{ $temporaryCropData->mouza ? $temporaryCropData->mouza->name_en : '' }}</td>
                        <td align="left">{{ $temporaryCropData->crop ? ucfirst($temporaryCropData->crop->name_en) : '' }}</td>
                        <td align="left">{{ $temporaryCropData->farmer ? $temporaryCropData->farmer->farmers_name : '' }}</td>
                        <td>{{ $temporaryCropData->farmer->farmers_mobile }}</td>
                        {{-- <td>{{$temporaryCropData->last_year_land_amount}}</td>
                        <td>{{$temporaryCropData->last_year_land_producttion}}</td>
                        <td>{{$temporaryCropData->current_year_land_amount}}</td>
                        <td>{{$temporaryCropData->current_year_land_producttion}}</td> --}}
                        <td>{{$temporaryCropData->acre_reflection_rate}}</td>


                        <td align="left">{{$temporaryCropData->user ? $temporaryCropData->user->first_name.' '.$temporaryCropData->user->middle_name.' '.$temporaryCropData->user->last_name : ''}}</td>

                        <td>
                            <a href="{{ route('admin.temporaryCropForm.show', $temporaryCropData->id) }}" class="btn btn-sm btn-clean btn-icon"><i class="la la-eye text-success"></i></a>
                            <a href="{{ route('admin.temporaryCropForm.edit', $temporaryCropData->id) }}" class="btn btn-sm btn-clean btn-icon"><i class="la la-pencil text-primary"></i></a>
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