<style>
  
</style>
<table class="table table-separate table-head-custom table-checkable table-striped" >
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">কৃষকের নাম</th>
            <th>মোবাইল নম্বর</th>
            <th class="text-left">খাবারের ধরন</th>
            <th class="text-left">শ্রেণী বিভাগ</th>
            {{-- <th>নমুনা নং</th> --}}
            <th class="text-left">মৌজা নাম</th>
            <th class="text-left">দাগগুচ্ছের নাম</th>
            <th class="text-left">প্রস্তুতকারক</th>
            {{-- <th>বিজ্ঞপ্তি</th> --}}
            <th>ক্রিয়াকলাপ</th>
        </tr>
    </thead>
    <tbody>
        @if ($farmersData->count() > 0)
        @php
            $i = (($farmersData->currentPage() - 1) * $farmersData->perPage() + 1);
        @endphp
            <form action="{{ route('admin.farmersForm.submitForForward') }}" method="POST">
                @csrf
            @foreach ($farmersData as $farmerData)
                <input type="hidden" value="{{ $farmerData->survey_notification_id }}" name="notification">
                <input type="hidden" value="{{ $farmerData->survey_process_list_id }}" name="survey_process_list_id[]">
                {{-- @php
                    if ($farmerData->notification) {
                        
                        $total = $farmerData->notification->scope_of_action_number;
                    }
                    else {
                        
                        $total = 0;
                    }
                @endphp --}}
                

                    <tr>
                        <td>{{$i}}</td>
                        <td align="left">{{$farmerData->farmers_name}}</td>
                        <td>{{$farmerData->farmers_mobile}}</td>
                        <td align="left">
                            @if ($farmerData->food_type == 1)
                                কৃষি
                            @else
                                অকৃষি
                            @endif
                        </td>
                        <td align="left">
                            @if ($farmerData->farmers_class_division_type == 1)
                                ক্ষুদ্র কৃষক
                            @elseif($farmerData->farmers_class_division_type == 2)
                                মাঝারি কৃষক
                            @else
                                বড় কৃষক
                            @endif
                        </td>
                        {{-- <td>{{$farmerData->sample_farmer_no}}</td> --}}
                        <td align="left">{{$farmerData->mouza ? $farmerData->mouza->name_en : ''}}</td>
                        <td align="left">{{$farmerData->cluster ? $farmerData->cluster->name_en : ''}}</td>
                        <td align="left">{{$farmerData->user ? $farmerData->user->first_name.' '.$farmerData->user->middle_name.' '.$farmerData->user->last_name : ''}}</td>
                        {{-- <td>{{ $farmerData->notification ? $farmerData->notification->scope_of_action_number :'' }}</td> --}}
                        <td>
                            <a href="{{ route('admin.farmersForm.detail', $farmerData->id) }}" class="btn btn-sm btn-clean btn-icon"><i class="la la-eye text-success"></i></a>
                            <a href="{{ route('admin.farmersForm.edit', $farmerData->id) }}" class="btn btn-sm btn-clean btn-icon"><i class="la la-pencil text-primary"></i></a>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
               
                @endforeach
                {{-- @if ($farmersData->count() == $total) --}}
                <button type="submit" class="btn btn-success btn-sm">প্রেরণ করুন</button>
                {{-- @endif --}}
            </form>
        @else
            <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">কোনো রেকর্ড পাওয়া যায়নি</td></tr>
        @endif
    </tbody>
</table>