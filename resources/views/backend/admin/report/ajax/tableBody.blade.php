<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Applicant Name</th>
            <th>Application ID</th>
            <th>Application Date</th>
            <th class="text-left">Service Name</th>
            <th class="text-left">Service Item Name</th>
            <th>IP Address</th>
            <th>Download Date</th>
            <th>Total Download</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($items as $item)
            <tr>
                <td>{{$i}}</td>
                <td align="left">
                    @if ( $itemDetails = $item->itemDownloadDetail)
                    {{ $itemDetails->user ? $itemDetails->user->first_name .' '. $itemDetails->user->middle_name .' '. $itemDetails->user->last_name : '' }}
                    @endif
                    
                </td>
                <td>{{ $item->application ? $item->application->application_id : '' }}</td>
                <td>{{ date('d-m-Y', strtotime($item->application ? $item->application->created_at : '')) }}</td>
                <td align="left">{{ $item->service ? $item->service->name_en : '' }}</td>
                <td align="left">{{ $item->serviceItem ? $item->serviceItem->item_name_en : '' }}</td>
                <td>{{ $item->itemDownloadDetail ? $item->itemDownloadDetail->ip_address : '' }}</td>
                <td>
                    @if ($item->total_download > 0)
                        {{ date('d-m-Y', strtotime($item->updated_at)) }}
                    @endif
                </td>
                <td>{{ $item->total_download }}</td>
            </tr>
        @php
            $i++;
        @endphp

        @endforeach
    </tbody>
</table>