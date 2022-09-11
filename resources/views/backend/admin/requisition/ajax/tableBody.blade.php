<!--begin::table-->
<table class="table table-separate table-head-custom table-checkable table-striped" >
    <thead>
        <tr>
            <th>#</th>
            <th>Requisition No.</th>
            <th class="text-left">Full Name</th>
            <th class="text-left">Organization Name</th>
            <th class="text-left">Designation</th>
            <th>Phone</th>
            <th class="text-left">Address</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($requisitions->count() > 0)
            @php
                $i = (($requisitions->currentPage() - 1) * $requisitions->perPage() + 1);
            @endphp
            @foreach ($requisitions as $requisition)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $requisition->requisition_number }}</td>
                    <td align="left">{{ ucfirst($requisition->name) }}</td>
                    <td align="left">{{ ucfirst($requisition->organization_name) }}</td>
                    <td align="left">{{ $requisition->designation }}</td>
                    <td>{{ $requisition->phone }}</td>
                    <td align="left">{{ $requisition->address }}</td>
                    <td>
                        @if ($requisition->status == 1)
                            <span class="label label-lg font-weight-bold label-light-success label-inline">Approved</span>
                        @elseif ($requisition->status == 2)
                            <span class="label label-lg font-weight-bold label-light-danger label-inline">Declined</span>
                        @elseif ($requisition->status == 3)
                            <span class="label label-lg font-weight-bold label-success label-inline">Delivered</span>
                        @else
                            <span class="label label-lg font-weight-bold label-light-primary label-inline">Pending</span>
                        @endif
                    </td>

                    <td>
                        <a href="{{route('admin.requisition.show', $requisition->id)}}" class="btn btn-primary" title="Details">Details</a>
                        
                    </td>
                </tr>
                @php
                    $i++;
                @endphp
            @endforeach
        @else
            <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">No data found</td></tr>
        @endif
    </tbody>
</table>