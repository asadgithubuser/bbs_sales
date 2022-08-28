<table class="table table-separate table-head-custom table-checkable dataTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Subscriber ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @if ($users->count() > 0)
            @php
                $i = (($users->currentPage() - 1) * $users->perPage() + 1);
            @endphp
            @foreach ($users as $user)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>
                    @if ($user->is_active == 1)
                        <span class="label label-lg font-weight-bold label-light-danger label-inline">Not Registered</span>
                    @elseif ($user->is_active == 0)
                        <span class="label label-lg font-weight-bold label-light-success label-inline">Registered</span>
                    @endif
                </td>
            </tr>
            @php
                $i++;
            @endphp
            @endforeach
        @else
            <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">No matching records found</td></tr>
        @endif
        
    </tbody>
</table>