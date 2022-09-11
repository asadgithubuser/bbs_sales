<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Fiscal Year Name</th>
            <th class="text-left">Status</th>
            <th class="text-left">Created By</th> 
            <th class="text-left">Updated By</th> 
            
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($fiscals->count() > 0)
            @php
                $i = (($fiscals->currentPage() - 1) * $fiscals->perPage() + 1);
            @endphp

            @foreach ($fiscals as $fiscal)
                <tr>
                    <td>
                        {{$i}}
                    </td>
                    <td align="left">
                        {{$fiscal->name}}
                    </td>

                    <td align="left">
                        {{$fiscal->status == 1 ? 'Active' : 'Inactive'}}
                    </td>

                    <td align="left"> 
                        {{ ($fiscal->user) ? $fiscal->user->username : '' }}
                    </td>

                    <td align="left"> 
                        {{ ($fiscal->user_update) ? $fiscal->user_update->username : 'Not Updated Yet' }}
                    </td>

                    <td>
                        @can('edit_fiscal_year')
                            <a href="{{route('admin.fiscal.edit', $fiscal->id)}}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                                <i class="la la-edit"></i>
                            </a>
                        @endcan
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