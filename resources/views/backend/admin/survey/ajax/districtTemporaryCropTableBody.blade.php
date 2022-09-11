<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Upazila</th>
            <th class="text-left">Total Response</th>
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
                <td class="text-left">{{ $list->upazila ? $list->upazila->name_en : '' }}</td>
                <td class="text-left">{{ $list->surveyCountTemporayCrop($list->upazila_id)}}</td>
                <td>{{ $list->year ? $list->year : ''}}</td>
                <td>
                    
                    <button class="btn btn-success btn-sm w3-circle forward_btn" title="Forward" data-id="{{ $list->id }}">Forward</button>
                    <a href="{{ route('admin.processingList.upazilaTemporaryData', $list) }}" class="btn btn-info btn-sm">Report</a>
                    <a href="{{ route('admin.processingList.backwardToUpazila',$list) }}" class="btn btn-danger btn-sm">Backward</a>
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{$list->id}}">
                        Comment
                    </button>

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
                          <form action="{{ route('admin.processingList.commentDistrictTofsil3', $list) }}" method="post">
                            @csrf
                             
                            <div class="modal-body">
                                <div class="form-group row">
                                   <label class="col-form-label col-12">গত বছর হতে চলতি বছরে আবাদি জমির পরিমান হ্রাস/বৃদ্ধির কারণ লিখুন:</label>
                                   <div class="col-lg-12">
                                      <textarea name="field_reason" class="form-control" required></textarea>
                                   </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-12">গত বছর হতে চলতি বছরে উৎপাদন হ্রাস/বৃদ্ধির কারণ লিখুন:</label>
                                    <div class="col-lg-12">
                                       <textarea name="production_reason" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-12">গত বছর হতে চলতি বছরে ফলন হ্রাস/বৃদ্ধির কারণ লিখুন:</label>
                                    <div class="col-lg-12">
                                       <textarea name="yield_reason" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-12">ফসল কালীন সময়ে আবহাওয়ার অবস্থা</label>
                                    <div class="col-lg-12">
                                       <select name="weather" class="form-control" required>
                                           <option value="">--Select an option--</option>
                                           <option value="1">ভাল</option>
                                           <option value="2">মোটামুটি</option>
                                           <option value="3">খারাপ</option>
                                       </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-12">প্রাকৃতিক দুর্যোগে (যদি হয়ে থাকে) ফসলের ক্ষতির হার:</label>
                                    <div class="col-lg-12">
                                       <input type="number" name="weather_loss_percentage" class="form-control" placeholder="Percentage" required>
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
            <a href="{{ route('admin.processingList.zilaTemporaryData', $list) }}" class="w3-btn w3-teal w3-shadow-black" style="box-shadow: 0 8px 16px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);">জেলার সকল তথ্য</a>

            
        @else
            <tr class="odd">
                <td valign="top" colspan="11" class="dataTables_empty">No matching records found</td>
            </tr>
        @endif
    </tbody>
</table>

@push('stackScript')
    <script> 
        $(".forward_btn").click(function(e) {
            var data_id = $(this).attr("data-id");
            var url = '<a href="{{route("admin.processingList.forwardToDivision", ":id")}}" class="swal2-confirm swal2-styled" title="Forward">Confirm</a>';
            url = url.replace(':id', data_id );
            
            Swal.fire({
                title: 'Are you sure want to forward ?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: url,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Data Forwarded Successfully!', '', 'success')
                } else if (result.dismiss === "cancel") {
                    Swal.fire('Canceled', '', 'error')
                }
            })
        });

    </script>
@endpush