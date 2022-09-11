<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            {{-- <th class="text-left">Crop Catgory</th>             --}}
            <th class="text-left">Name (Bangla)</th>
            <th class="text-left">Name (English)</th>            
            <th class="text-left">Form Name</th>            
            {{-- <th class="text-left">Category</th> --}}
            <th >Code</th>            
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($crops->count() > 0)
        @php
            $i = (($crops->currentPage() - 1) * $crops->perPage() + 1);
        @endphp
            @foreach ($crops as $crop)
            <tr>
                <td>{{ $i }}</td>

                {{-- <td>
                    @if ($crop->crop_category == 1)
                        Permanent
                    @elseif ($crop->crop_category == 2)
                        Temporary
                    @else
                        Not Selected
                    @endif
                </td> --}}
                <td align="left">{{ucfirst($crop->name_bn)}}</td>
                <td align="left">{{ucfirst($crop->name_en)}}</td>
                
                @php
                    if ($crop->form_id > 0) {
                        $form_ids = explode(',', $crop->form_id);
                        $formAlls = App\Models\SurveyForm::whereIn('id', $form_ids)->get();
                    }
                @endphp

                <td align="left">
                    @if ($crop->form_id > 0)
                        @foreach ($formAlls as $form)
                            {{ ucfirst($form->display_name) }}, 
                        @endforeach
                    @endif
                    
                </td>
                {{-- <td align="left">{{$crop->cropCategory ? ucfirst($crop->cropCategory->name_en) : ''}}</td> --}}
                <td>{{ $crop->code }}</td>
                <td>
                    
                    <span class="label label-lg font-weight-bold {{ $crop->status == 1 ? 'label-light-success' : 'label-light-danger'}}  label-inline">{{ $crop->status == 1 ? 'Active' : 'Deactivated' }} </span>
                    
                </td>
                <td>
                    
                    
                    @can('edit_agriculture')
                    <a href="{{route('admin.crop.edit', $crop->id)}}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                        <i class="la la-edit"></i>
                    </a>
                    @endcan

                    @can('delete_agriculture')
                        @if ($crop->status == 1)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Delete" data-id="{{ $crop->id }}">
                                <i class="la la-trash"></i>
                            </button>
                        @elseif ($crop->status == 0)
                            <button class="btn btn-sm btn-clean btn-icon delete" title="Active" data-id="{{ $crop->id }}">
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
{{$crops->links()}}

@push('stackScript')
    <script> 
        $(".delete").click(function(e) {

            var data_id = $(this).attr("data-id");
            var url =  '<a href="{{route("admin.crop.delete",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
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