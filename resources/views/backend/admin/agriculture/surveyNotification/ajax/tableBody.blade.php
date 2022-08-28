<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Form Name</th> 
            <th class="text-left">Crop Name</th>

            {{-- <th >Kormo Poridi Number</th>             --}}
                    
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($surveyNoti->count() > 0)
        @php
            $i = (($surveyNoti->currentPage() - 1) * $surveyNoti->perPage() + 1);
        @endphp
            @foreach ($surveyNoti as $survey)
            <tr>
                <td>{{$i}}</td>
                <td align="left">{{ $survey->surveyForm ? ucfirst($survey->surveyForm->display_name ) : ''}}</td>
                <td align="left">{{ $survey->crop ? ucfirst($survey->crop->name_en ) : 'This Form Does Not Include Crop'}}</td>
                {{-- <td >{{ucfirst($survey->scope_of_action_number)}}</td> --}}
                <td>
                    
                    <span class="label label-lg font-weight-bold {{ $survey->status == 1 ? 'label-light-success' : 'label-light-danger'}}  label-inline">{{ $survey->status == 1 ? 'Active' : 'Deactivated' }} </span>
                    
                </td>
                <td>
                    @can('details_surveyNotification')
                    <a href="{{route('admin.surveyNotification.show', $survey->id)}}" class="btn btn-sm btn-clean btn-icon" title="Show">
                        <i class="la la-eye"></i>
                    </a>
                    @endcan
                    
                    @can('edit_surveyNotification')
                    <a href="{{route('admin.surveyNotification.edit', $survey->id)}}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                        <i class="la la-edit"></i>
                    </a>
                    @endcan

                    @can('delete_surveyNotification')
                        @if ($survey->status == 1)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Delete" data-id="{{ $survey->id }}">
                                <i class="la la-trash"></i>
                            </button>
                        @elseif ($survey->status == 0)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Active" data-id="{{ $survey->id }}">
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
            <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">No matching records found</td></tr>
        @endif
    </tbody>
</table>
{{$surveyNoti->links()}}

@push('stackScript')
    <script> 
        $(".delete").click(function(e) {

            var data_id = $(this).attr("data-id");
            var url =  '<a href="{{route("admin.surveyNotification.delete",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
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