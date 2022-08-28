<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Farmer's Name</th>
            <th>Farmer's Mobile</th>
            <th>Type</th>
            <th>Land amount</th>
            <th>Farmer class</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if ($farmersData->count() > 0)

            @php
                
                $i = ($farmersData->currentPage() - 1) * $farmersData->perPage() + 1;
            @endphp


            @foreach ($farmersData as $list)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $list->farmers_name }}</td>
                    <td>{{ $list->farmers_mobile }}</td>
                    <td>{{ $list->food_type == 1 ? 'Agriculture' : 'Non-Agriculture'  }}</td>
                    <td>{{ $list->land_amount }}</td>
                    <td>{{ $list->farmers_class_division_type == 1 ? 'Small' : '' }} {{ $list->farmers_class_division_type == 2 ? 'Medium' : '' }} {{ $list->farmers_class_division_type == 3 ? 'Big' : '' }}</td>
                    <td>
                        <a href="{{ route('admin.farmersForm.edit',$list) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
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