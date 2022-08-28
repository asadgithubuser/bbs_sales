<!--begin::table-->
<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">নাম (বাংলা)</th>
            <th class="text-left">নাম (ইংরেজি)</th>
            <th class="text-left">পরিষেবার নাম</th>
            <th>মূল্য</th>
            <th>পদক্রম</th>
            <th>স্ট্যাটাস</th>
            <th>পদক্ষেপ</th>
        </tr>
    </thead>
    <tbody>
        @if ($serviceItemAdditionals->count() > 0)
        @php
            $i = (($serviceItemAdditionals->currentPage() - 1) * $serviceItemAdditionals->perPage() + 1);
        @endphp
            @foreach ($serviceItemAdditionals as $serviceItemAdditional)
            <tr>
                <td>{{$i}}</td>
                <td align="left">{{$serviceItemAdditional->item_name_bn}}</td>
                <td align="left">{{ucfirst($serviceItemAdditional->item_name_bn)}}</td>
                <td align="left">{{$serviceItemAdditional->service ? $serviceItemAdditional->service->name_bn : ''}}</td>
                <td>{{number_format((float)$serviceItemAdditional->price, 2, '.', '')}}</td>
                <td>{{$serviceItemAdditional->ordering}}</td>
                <td>
                    @if ($serviceItemAdditional->status == 1)
                        <span class="label label-lg font-weight-bold label-light-success label-inline">সক্রিয়</span>
                    @else
                        <span class="label label-lg font-weight-bold label-light-danger label-inline">নিষ্ক্রিয়</span>
                    @endif
                </td>
                <td>
                    @can('view_service_additional_item')
                    <a href="{{route('admin.serviceItemAdditional.show', $serviceItemAdditional->id)}}" class="btn btn-sm btn-clean btn-icon" title="view">
                        <i class="la la-eye"></i>
                    </a>
                    @endcan
                    
                    @can('edit_service_additional_item')
                    <a href="{{route('admin.serviceItemAdditional.edit', $serviceItemAdditional->id)}}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                        <i class="la la-edit"></i>
                    </a>
                    @endcan

                    @can('delete_service_additional_item')
                        @if ($serviceItemAdditional->status == 1)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Delete" data-id="{{ $serviceItemAdditional->id }}">
                                <i class="la la-trash"></i>
                            </button>
                        @elseif ($serviceItemAdditional->status == 0)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Active" data-id="{{ $serviceItemAdditional->id }}">
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
            var url =  '<a href="{{route("admin.serviceItemAdditional.delete",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
            url = url.replace(':id', data_id );
            
            Swal.fire({
                title: 'Are you sure ?',
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