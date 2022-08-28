<!--begin::table-->
<table class="table table-separate table-head-custom table-checkable table-striped" >
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">তথ্য বিভাগ</th>
            <th class="text-left">তথ্য উপশ্রেণির নাম (বাংলা)</th>
            <th class="text-left">তথ্য উপশ্রেণির নাম (ইংরেজি)</th>
            <th>স্ট্যাটাস </th>
            <th>পদক্ষেপ</th>
        </tr>
    </thead>
    <tbody>
        @if ($datatypes->count() > 0)

            @php
                $i = (($datatypes->currentPage() - 1) * $datatypes->perPage() + 1);
            @endphp

            @foreach ($datatypes as $datatype)
            <tr>
                <td>{{ $i }}</td>
                <td align="left">{{ $datatype->service_item_type == 1 ? 'জরিপ' : 'জনগণনা' }}</td>
                <td align="left">{{ ucfirst($datatype->name_bn) }}</td>
                <td align="left">{{ ucfirst($datatype->name_en) }}</td>
                <td>
                    @if ($datatype->status == 1)
                        <span class="label label-lg font-weight-bold label-light-success label-inline">সক্রিয়</span>
                    @else
                        <span class="label label-lg font-weight-bold label-light-danger label-inline">নিষ্ক্রিয়</span>
                    @endif
                </td>

                <td>
                    @can('view_sub_datatype')
                    <a href="{{ route('admin.datatype.show', $datatype->id) }}" class="btn btn-sm btn-clean btn-icon" title="view">
                        <i class="la la-eye"></i>
                    </a>
                    @endcan

                    @can('edit_sub_datatype')
                    <a href="{{ route('admin.datatype.edit', $datatype->id) }}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                        <i class="la la-edit"></i>
                    </a>
                    @endcan

                    @can('delete_sub_datatype')
                        @if ($datatype->status == 1)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Delete" data-id="{{ $datatype->id }}">
                                <i class="la la-trash"></i>
                            </button>
                        @elseif ($datatype->status == 0)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Active" data-id="{{ $datatype->id }}">
                                <i class="la la-check"></i>
                            </button>
                        @endif
                    @endcan
                    
                </td>
            </tr>

            @php
                $i++;
            @endphp
            
            @endforeach
        @else
            <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">কোনো রেকর্ড পাওয়া যায়নি</td></tr>
        @endif
    </tbody>
</table>

@push('stackScript')
    <script> 
        $(".delete").click(function(e) {

            var data_id = $(this).attr("data-id");
            var url =  '<a href="{{route("admin.datatype.delete",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
            url = url.replace(':id', data_id );
            
            Swal.fire({
                title: 'Are you sure want to delete?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: url,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Status Changed Successfully!', '', 'success')
                } else if (result.dismiss === "cancel") {
                    Swal.fire('Canceled', '', 'error')
                }
            })
        });

    </script>
@endpush