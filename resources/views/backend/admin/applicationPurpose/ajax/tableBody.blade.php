<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Title Bangla</th>
            <th class="text-left">Title English</th> 
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($applicationPurposes->count() > 0)
        @php                
            $i = (($applicationPurposes->currentPage() - 1) * $applicationPurposes->perPage() + 1); 
        @endphp
            @foreach ($applicationPurposes as $ap)
                <tr>
                    <td>
                        {{$i}}
                    </td>
                    <td align="left">
                        {{$ap->name_en}}
                    </td>
                    <td align="left">
                        {{$ap->name_bn}} 
                        
                        
                    </td>
                    <td>
                        @if ($ap->status == 1)
                            <span class="label label-lg font-weight-bold label-light-success label-inline">Active</span>
                        @else
                            <span class="label label-lg font-weight-bold label-light-danger label-inline">Inactive</span>
                        @endif
                    </td>
                    <td>
                        
                        @can('edit_application_purpose')
                        <a href="{{route('admin.purpose.edit',$ap)}}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                            <i class="la la-edit text-warning"></i>
                        </a>
                        @endcan
                        @can('delete_application_purpose')
                            
                            @if ($ap->status == true)
                                
                            <button  class="btn btn-sm btn-clean btn-icon" data-toggle="modal" data-target="#deleteApplicationPurpost{{$ap->id}}">                                                         
                                <i class="la la-trash text-danger"></i>
                            </button>
                            @else
                            <button  class="btn btn-sm btn-clean btn-icon" data-toggle="modal" data-target="#deleteApplicationPurpost{{$ap->id}}">                                                         
                                
                                <i class="la la-check-circle text-success la-2x"></i>
                            </button>
                            @endif
                        @endcan
                        {{-- delete modal --}}
                        <div id="deleteApplicationPurpost{{$ap->id}}" class="modal fade" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header py-5">
                                        <h5 class="modal-title">{{$ap->status == true ? 'Disable' : 'Enable'}} Application Purpose
                                        <span class="d-block text-muted font-size-sm"></span></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <form class="form" action="{{route('admin.purpose.destroy',$ap)}}" method="post">
                                    <div class="modal-body">
                                            @csrf
                                            <div class="container">
                                                Do you want to {{$ap->status == true ? 'disable' : 'enable'}} applicattion purpose ?
                                            </div>                    
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-sm {{$ap->status == true ? 'btn-danger' : 'btn-primary'}} " type="submit">{{$ap->status == true ? 'Disable' : 'Enable'}}</button>

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
            <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">No matching records found</td></tr>
        @endif
    </tbody>
</table>