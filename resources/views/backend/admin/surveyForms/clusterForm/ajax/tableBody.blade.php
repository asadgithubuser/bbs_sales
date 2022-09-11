<style>
    th{
        font-size: 14px !important;
    }
</style>
<table class="table table-separate table-head-custom table-checkable table-striped" >
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">দাগগুচ্ছের নাম</th>
            <th class="text-left">ফসলের নাম</th>
            <th class="text-left"> কৃষকের নাম</th>
            {{-- <th>কৃষকের মোবাইল নম্বর</th> --}}
            <th class="text-left">সংগ্রহ নং</th>
            <th class="text-left">জমির ধরন</th>
            <th class="text-left">ভূমি শনাক্তকরণ নম্বর</th>
            {{-- <th class="text-left">সেচ পদ্ধতি</th> --}}
            <th class="text-left">সেচের সময় নম্বর</th>
            <th class="text-left">তৈরির তারিখ</th>
            <th>ক্রিয়াকলাপ</th>
        </tr>
    </thead>
    <tbody>
        @if ($clustersData->count() > 0)
        @php
            $i = (($clustersData->currentPage() - 1) * $clustersData->perPage() + 1);
        @endphp
            <form action="{{ route('admin.clusterForm.submitForForward') }}" method="POST">
                @csrf

            @foreach ($clustersData as $clusterData)
                <input type="hidden" value="{{ $clusterData->survey_notification_id }}" name="notification">
                <input type="hidden" value="{{ $clusterData->survey_process_list_id }}" name="survey_process_list_id">

                {{-- @php
                    if ($clusterData->notification) {
                        
                        $total = $clusterData->notification->scope_of_action_number;
                    }
                    else {
                        
                        $total = 0;
                    }
                @endphp --}}

                    <tr>
                        <td>{{$i}}</td>

                        <td align="left">{{ $clusterData->cluster ? $clusterData->cluster->name_en : '' }}</td>
                        <td align="left">{{ $clusterData->crop ? $clusterData->crop->name_en : '' }}</td>
                        <td align="left">{{ $clusterData->farmer ? $clusterData->farmer->farmers_name : '' }}</td>
                        {{-- <td>{{ $clusterData->farmer->farmers_mobile }}</td> --}}

                        <td align="left">
                            @if ($clusterData->survey_episode == 1)
                            ১ম পর্ব (জানুয়ারি থেকে মার্চ)
                            @elseif($clusterData->survey_episode == 2)
                            ২য় পর্ব (এপ্রিল থেকে জুন)
                            @elseif($clusterData->survey_episode == 3)
                            ৩য় পর্ব (জুলাই থেকে সেপ্টেম্বর)
                            @else
                            ৪র্থ পর্ব (অক্টোবর থেকে ডিসেম্বর)
                            @endif
                        </td>

                        <td align="left">
                            @if ($clusterData->use_land_type == 1)
                            সংগ্রহযোগ্য
                            @else
                            সংগ্রহযোগ্য নয়
                            @endif
                        </td>

                        <td>{{$clusterData->land_identification_no}}</td>

                        {{-- <td align="left">{{ $clusterData->irrigation_system }}</td> --}}

                        <td align="left">
                            @if ($clusterData->how_many_irrigation_time == 1)
                                এক বার
                            @elseif($clusterData->how_many_irrigation_time == 2)
                                দুই বার
                            @else
                                তিন বার
                            @endif
                        </td>


                        <td align="left">{{$clusterData->user ? $clusterData->user->first_name.' '.$clusterData->user->middle_name.' '.$clusterData->user->last_name : ''}}</td>

                        <td>
                            <a href="{{ route('admin.clusterForm.show', $clusterData->id) }}" class="btn btn-sm btn-clean btn-icon"><i class="la la-eye text-success"></i></a>
                            <a href="{{ route('admin.clusterForm.edit', $clusterData->id) }}" class="btn btn-sm btn-clean btn-icon"><i class="la la-pencil text-primary"></i></a>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
               
            @endforeach

                <button type="submit" class="btn btn-success btn-sm" style="font-size: 18px;">প্রেরণ করুন</button>
            </form>
        @else
            <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">কোনো রেকর্ড পাওয়া যায়নি</td></tr>
        @endif
    </tbody>
</table>