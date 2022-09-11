<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">অফিসের শিরোনাম (বাংলা)</th>
            <th class="text-left">অফিস শিরোনাম (ইংরেজি)</th>
            <th>অফিস কোড</th>
            <th>অফিসের ধাপ</th>
            <th>মোবাইল</th>
            <th class="text-left">ঠিকানা</th>
            <th>স্ট্যাটাস</th>
            <th>পদক্রম</th>
        </tr>
    </thead>
    <tbody>
        @if ($offices->count() > 0)
        @php
            $i = (($offices->currentPage() - 1) * $offices->perPage() + 1);
        @endphp
            @foreach ($offices as $office)
            <tr>
                <td>{{$i}}</td>
                <td align="left">{{$office->title_bn}}</td>
                <td align="left">{{ucfirst($office->title_en)}}</td>
                <td>{{$office->office_code}}</td>
                <td>{{$office->lev ? $office->lev->name_bn : ''}}</td>
                <td>{{$office->phone}}</td>
                <td align="left">{{$office->address}}</td>
                <td>
                    @if ($office->status == 1)
                        <span class="label label-lg font-weight-bold label-light-success label-inline">সক্রিয়</span>
                    @elseif ($office->status == 0)
                        <span class="label label-lg font-weight-bold label-light-danger label-inline">নিষ্ক্রিয়</span>
                    @endif
                </td>
                <td>
                    @can('view_office')
                    <a href="{{route('admin.office.show', $office->id)}}" class="btn btn-sm btn-clean btn-icon" title="view">
                        <i class="la la-eye"></i>
                    </a>
                    @endcan
                    
                    @can('edit_office')
                    <a href="{{route('admin.office.edit', $office->id)}}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                        <i class="la la-edit"></i>
                    </a>
                    @endcan

                    @can('delete_office')
                        @if ($office->status == 1)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Delete" data-id="{{ $office->id }}">
                                <i class="la la-trash"></i>
                            </button>
                        @elseif ($office->status == 0)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Active" data-id="{{ $office->id }}">
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

<div class="ajax-pagination-area"> 

    
    {{ $offices->appends([
    
    
        'q' => isset($q) ? $q : null,
        'offices' => isset($offices) ? $offices : null
        ])->render() }}
        
</div>

@push('stackScript')
    <script> 
        $(".delete").click(function(e) {

            var data_id = $(this).attr("data-id");
            var url =  '<a href="{{route("admin.office.delete",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
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