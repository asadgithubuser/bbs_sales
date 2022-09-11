<!--begin::table-->
<table class="table table-separate table-head-custom table-checkable table-striped" >
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">পরিষেবা নাম (বাংলায়)</th>
            <th class="text-left">পরিষেবা নাম (ইংরেজিতে)</th>
            <th class="text-left">ধাপসমূহ</th>
            <th class="text-left">অফিস শিরোনাম</th>
            <th>পরিষেবার পদক্রম</th>
            <th>স্ট্যাটাস</th>
            <th>পদক্ষেপ</th>
        </tr>
    </thead>
    <tbody>
        @if ($services->count() > 0)
            @php
                $i = (($services->currentPage() - 1) * $services->perPage() + 1);
            @endphp
            @foreach ($services as $service)
            <tr>
                <td>{{$i}}</td>
                <td align="left">{{$service->name_bn}}</td>
                <td align="left">{{ucfirst($service->name_en)}}</td>
                <td align="left">{{ $service->level ? $service->level->name_en : ''}}</td>
                <td align="left">{{ $service->office ? $service->office->title_en : ''}}</td>
                <td>{{$service->ordering}}</td>
                <td>
                    @if ($service->status == 1)
                        <span class="label label-lg font-weight-bold label-light-success label-inline">সক্রিয়</span>
                    @else
                        <span class="label label-lg font-weight-bold label-light-danger label-inline">নিষ্ক্রিয়</span>
                    @endif
                </td>
                <td>

                    @can('view_service')
                    <a href="{{route('admin.service.show', $service->id)}}" class="btn btn-sm btn-clean btn-icon" title="view">
                        <i class="la la-eye"></i>
                    </a>
                    @endcan

                    @can('edit_service')
                    <a href="{{route('admin.service.edit', $service->id)}}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                        <i class="la la-edit"></i>
                    </a>
                    @endcan

                    @can('delete_service')
                        @if ($service->status == 1)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Delete" data-id="{{ $service->id }}">
                                <i class="la la-trash"></i>
                            </button>
                        @elseif ($service->status == 0)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Active" data-id="{{ $service->id }}">
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
            var url =  '<a href="{{route("admin.service.delete",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
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