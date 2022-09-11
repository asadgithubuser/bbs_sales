<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        @php
            $auth = Auth::user()->role_id;
        @endphp
        <tr>
            <th>#</th>
            <th>Bunch Stains</th>
            <th>Land Identification No</th>
            <th>Crop</th>
            <th>Farmer's Name</th>
            <th>Farmer's Mobile</th>
            <th>Use land type</th>
            <th>Land Amount</th>
            <th>Cultivated Method</th>
            <th>How many irrigation time</th>
            <th>How many cultivated time yearly</th>
            @if ($auth == 9)

            <th>Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @if ($clustersData->count() > 0)

            @php
                
                $i = ($clustersData->currentPage() - 1) * $clustersData->perPage() + 1;
            @endphp


            @foreach ($clustersData as $list)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $list->cluster ? $list->cluster->name_en : ''}}</td>
                    <td>{{ $list->land_identification_no}}</td>
                    <td>{{ $list->crop ? $list->crop->name_en : ''}}</td>
                    <td>{{ $list->farmer ? $list->farmer->farmers_name : ''}}</td>
                    <td>{{ $list->farmer ? $list->farmer->farmers_mobile : ''}}</td>
                    <td>{{ $list->use_land_type == 1 ? 'Harvesable' : 'Non-Harvestable' }}</td>
                    
                    <td>{{ $list->land_amount }}</td>
                    <td>{{ $list->cultivated_method == 1 ? "Mechanical" : 'Non-mechenical' }}</td>
                    <td>{{ $list->how_many_irrigation_time }} <span>time(s)</span></td>
                    <td>{{ $list->how_many_cultivated_time_yearly }} <span>Harvestbale</span></td>
                    
                    @if ($auth == 9)
                        
                        <td>
                            <a href="{{ route('admin.clusterForm.edit',$list) }}" class="btn btn-warning btn-sm">Edit </a>
                        </td>
                    @endif
                @php
                    $i++;
                @endphp
                </tr>
            @endforeach

            
        @else
            <tr class="odd">
                <td valign="top" colspan="11" class="dataTables_empty">No matching records found</td>
            </tr>
        @endif
    
    </tbody>
</table>