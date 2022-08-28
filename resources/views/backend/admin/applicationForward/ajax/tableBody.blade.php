<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Sender Role</th>
            <th class="text-left">Forward Role</th>
            <th class="text-left">Division</th>
            <th class="text-left">District</th>
            <th class="text-left">Upazila</th>
            <th class="text-left">Office</th>
            <th class="text-left">Level</th>
            <th>Can Approve</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = (($applicationForwardMaps->currentPage() - 1) * $applicationForwardMaps->perPage() + 1);
        @endphp
        @foreach ($applicationForwardMaps as $applicationForwardMap)
        <tr>
            <td>{{$i}}</td>
            <td align="left">{{$applicationForwardMap->senderRole->name_en ? $applicationForwardMap->senderRole->name_en : ''}}</td>
            <td align="left">{{$applicationForwardMap->forwardRole->name_en ? $applicationForwardMap->forwardRole->name_en : ''}}</td>
            <td align="left">{{$applicationForwardMap->division->name_en ? $applicationForwardMap->division->name_en : ''}}</td>
            <td align="left">{{$applicationForwardMap->district->name_en ? $applicationForwardMap->district->name_en : ''}}</td>
            <td align="left">{{$applicationForwardMap->upazila->name_en ? $applicationForwardMap->upazila->name_en : ''}}</td>
            <td align="left">{{$applicationForwardMap->office->title_en ? $applicationForwardMap->office->title_en : ''}}</td>
            <td align="left">{{$applicationForwardMap->level->name_en ? $applicationForwardMap->level->name_en : ''}}</td>
            <td >
                @if ($applicationForwardMap->is_approved_person == 1)
                    <span class="label label-lg font-weight-bold label-light-success label-inline">Yes</span>
                @elseif ($applicationForwardMap->is_approved_person == 0)
                    <span class="label label-lg font-weight-bold label-light-danger label-inline">No</span>
                @endif
            </td>
            <td>
                @can('edit_application_forward_mapping')
                    
                    <a href="{{route('admin.applicationForwarding.edit', $applicationForwardMap->id)}}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                        <i class="la la-edit"></i>
                    </a>
                @endcan
            </td>
        </tr>
        @php
            $i++;
        @endphp
        @endforeach
    </tbody>
</table>