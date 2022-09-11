<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">পদবী (বাংলায়)</th>
            <th class="text-left">পদবী (ইংরেজি)</th> 
            <th class="text-left">বর্ণনা</th>
            {{-- <th class="text-left">অফিস</th> --}}
            <th class="text-left">ধাপ</th>
            <th>অর্ডার</th>
            <th>স্ট্যাটাস</th>
            <th>পদক্রম</th>
        </tr>
    </thead>
    <tbody>
        @if ($designations->count() > 0)
        @php
            $i = (($designations->currentPage() - 1) * $designations->perPage() + 1);
        @endphp
            @foreach ($designations as $designation)
                <tr>
                    <td>
                        {{$i}}
                    </td>
                    <td align="left">
                        {{$designation->name_bn}}
                    </td>
                    <td align="left">
                        {{$designation->name_en}} 
                    </td>
                    <td align="left">
                        {{$designation->description}}
                    </td>
                    {{-- <td align="left">
                        {{$designation->office ? $designation->office->title_en : ''}} ( {{$designation->office ? $designation->office->title_bn : ''}})
                    </td> --}}
                    <td align="left">
                        {{$designation->level_id ? $designation->level_id->name_bn : ''}}
                    </td>
                    <td>
                        {{$designation->ordering}}
                    </td>
                    <td>
                        @if ($designation->status == 1)
                            <span class="label label-lg font-weight-bold label-light-success label-inline">সক্রিয়</span>
                        @else
                            <span class="label label-lg font-weight-bold label-light-danger label-inline">নিষ্ক্রিয়</span>
                        @endif
                    </td>
                    <td>
                        @can('edit_designation')
                        <a href="{{route('admin.designation.edit', $designation)}}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                            <i class="la la-edit text-warning"></i>
                        </a>
                        @endcan
                        
                        @can('delete_designation')
                            @if ($designation->status == true)
                                <button  class="btn btn-sm btn-clean btn-icon" data-toggle="modal" data-target="#deleteApplicationPurpost{{$designation->id}}">                                                         
                                    <i class="la la-trash text-danger"></i>
                                </button>
                            @else
                                <button  class="btn btn-sm btn-clean btn-icon" data-toggle="modal" data-target="#deleteApplicationPurpost{{$designation->id}}">    
                                    <i class="la la-check-circle text-success la-2x"></i>
                                </button>
                            @endif
                        @endcan
                        
                        {{-- delete modal --}}
                        <div id="deleteApplicationPurpost{{$designation->id}}" class="modal fade" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header py-5">
                                        <h5 class="modal-title">{{$designation->status == true ? 'Disable' : 'Enable'}} পদবী
                                        <span class="d-block text-muted font-size-sm"></span></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <form class="form" action="{{route('admin.designation.destroy',$designation)}}" method="post">
                                        <div class="modal-body">
                                                @csrf
                                                <div class="container">আপনি কি {{$designation->status == true ? 'disable' : 'enable'}} উদ্দেশ্য আবেদন করতে চান?
                                                    {{-- Do you want to {{$designation->status == true ? 'disable' : 'enable'}} applicattion purpose ? --}}
                                                </div>                    
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-sm {{$designation->status == true ? 'btn-danger' : 'btn-primary'}} " type="submit">{{$designation->status == true ? 'Disable' : 'Enable'}}</button>
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