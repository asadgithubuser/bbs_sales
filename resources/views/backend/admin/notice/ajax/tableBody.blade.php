<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">শিরোনাম</th>
            <th class="text-left">বিস্তারিত</th> 
            <th>মেয়াদ উত্তীর্ণের তারিখ</th>
            <th>স্ট্যাটাস</th>
            <th>পদক্রম</th>
        </tr>
    </thead>
    <tbody>
        @if ($notices->count() > 0)
        @php
            $i = (($notices->currentPage() - 1) * $notices->perPage() + 1);
        @endphp
            @foreach ($notices as $notice)
                <tr>
                    <td>{{$i}}</td>
                    <td align="left">{{$notice->title}}</td>
                    <td align="left">
                        {{custom_name($notice->detail,50)}}
                        <span class="badge badge-pill "><a href="{{route('admin.notice.show',$notice)}}" >আরও পড়ুন</a></span>
                    </td>
                    <td>
                        {{ $notice->exp_date }}
                    </td>
                    <td>
                        @if ($notice->status == 1)
                            <span class="label label-lg font-weight-bold label-light-success label-inline">সক্রিয়</span>
                        @else
                            <span class="label label-lg font-weight-bold label-light-danger label-inline">নিষ্ক্রিয়</span>
                        @endif
                    </td>
                    <td>
                        @can('edit_notice')
                        <a href="{{ route('admin.notice.edit',$notice) }}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                            <i class="la la-edit text-warning"></i>
                        </a>
                        @endcan
                        
                        @can('delete_notice')
                        <button  class="btn btn-sm btn-clean btn-icon" data-toggle="modal" data-target="#delete{{$notice->id}}">                                                         
                            <i class="la la-trash text-danger"></i>
                        </button>
                        @endcan

                        {{-- delete  --}}
                        <div id="delete{{$notice->id}}" class="modal fade" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header py-5">
                                        <h5 class="modal-title">নোটিশ মুছুন
                                        <span class="d-block text-muted font-size-sm"></span></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <form class="form" action="{{route('admin.notice.destroy',$notice)}}" method="post">
                                        <div class="modal-body">
                                                @csrf
                                                <div class="container">
                                                    আপনি এই বিজ্ঞপ্তি মুছে দিতে চান?
                                                </div>                    
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-sm btn-danger" type="submit">মুছে ফেলুন</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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