<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">District Name</th>
            
            <th >Year</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($lists->count() > 0)
            @php
                $i = ($lists->currentPage() - 1) * $lists->perPage() + 1;
            @endphp


            @foreach ($lists as $list)
                <tr>
                    <td>{{ $i }}</td>
                <td class="text-left">{{ $list->district ? $list->district->name_en : '' }}</td>
                
                <td>{{ $list->created_at->format('Y')}}</td>
                <td>
                    
                    
                    <a href="{{ route('admin.processingList.upazilaCropCropCuttingData', $list->survey_process_list_id) }}" class="btn btn-info btn-sm">Report</a>
                    
                </td>
                @php
                    $i++;
                @endphp
                </tr>

                {{-- Modal --}}
                <div class="modal fade" id="exampleModalCenter{{$list->id}}" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-bottom" role="document">
                       <div class="modal-content">
                          <div class="modal-header bg-info">
                             <h5 class="modal-title text-white" id="exampleModalLongTitle">Provide your comment</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">×</span>
                             </button>
                          </div>
                          <form action="{{ route('admin.processingList.commentDistrictTofsil4', $list) }}" method="post">
                            @csrf
                             
                             <div class="modal-body">
                                <div class="form-group row">
                                   <label class="col-form-label col-12">বিভাগ/জেলা/উপজেলা/থানায় গত বছর হতে চলতি বছরে উৎপাদন ও ফলন হার হ্রাস/বৃদ্ধির কারণ:</label>
                                   <div class="col-lg-12">
                                      <textarea name="comment_district_tofsil4" class="form-control" required></textarea>
                                   </div>
                                </div>
                             </div>
                             <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                             </div>
                          </form>
                       </div>
                    </div>
                 </div>
                {{-- end Modal --}}
            @endforeach

            
        @else
            <tr class="odd">
                <td valign="top" colspan="11" class="dataTables_empty">No matching records found</td>
            </tr>
        @endif
    </tbody>
</table>
