<!--begin::table-->
<table class="table table-separate table-head-custom table-checkable table-striped" >
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">ব্যবহারের ধরন</th>
            <th class="text-left">দামের ধরন</th>
            <th>দাম</th>
            <th>পদক্ষেপ</th>
        </tr>
    </thead>
    <tbody>
        @if ($serviceItemPrices->count() > 0)

            @php
                $i = (($serviceItemPrices->currentPage() - 1) * $serviceItemPrices->perPage() + 1);
            @endphp

            @foreach ($serviceItemPrices as $serviceItemPrice)
            <tr>
                <td>{{ $i }}</td>

                @if ($serviceItemPrice->usage_type == 1)
                    <td align="left">সংগঠন</td>
                @elseif ($serviceItemPrice->usage_type == 2)
                    <td align="left">ব্যক্তিগত</td>
                @elseif ($serviceItemPrice->usage_type == 3)
                    <td align="left">ছাত্র</td>
                @endif

                @if ($serviceItemPrice->price_type == 1)
                    <td align="left">জরিপ</td>
                @elseif ($serviceItemPrice->price_type == 2)
                    <td align="left">জনগণনা</td>
                @elseif ($serviceItemPrice->price_type == 3)
                    <td align="left">বাংলাদেশী</td>
                @elseif ($serviceItemPrice->price_type == 4)
                    <td align="left">বিদেশী</td>
                @endif

                <td>{{ $serviceItemPrice->price }}</td>

                <td>
                    @can('edit_service_item_price')
                        <a href="{{ route('admin.serviceItemPrice.edit', $serviceItemPrice->id) }}" class="btn btn-sm btn-clean btn-icon" title="Edit">
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
            <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">কোনো রেকর্ড পাওয়া যায়নি</td></tr>
        @endif
    </tbody>
</table>

@push('stackScript')
    <script> 
        $(".delete").click(function(e) {

            var data_id = $(this).attr("data-id");
            var url =  '<a href="{{route("admin.serviceItemPrice.delete",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
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