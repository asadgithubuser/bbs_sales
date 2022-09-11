<div class="card">
    <div class="card-header">
        Course Duration
    </div>
    <div id="curriculam_error_area"></div>
    <div class="card-body">
        <form action="" id="course_duration_form">
            <div class="row">
                <!--Left-->
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-4 col-sm-12">Course Hours<span
                                class="text-danger">
                                *</span></label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input type="number" placeholder="Course Total Hour" class="form-control" name="hour"
                                value="{{ old('hour') }}" required step="0.01">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-4 col-sm-12">Course Duration<span
                                class="text-danger">
                                *</span></label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input type="number" placeholder="Course Duration" class="form-control" name="duration"
                                value="{{ old('duration') }}" required step="0.01">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-4 col-sm-12">Total Trainees<span
                                class="text-danger">
                                *</span></label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input type="number" placeholder="Total Trainees" class="form-control"
                                name="total_trainees" value="{{ old('total_trainees') }}" required step="0.01">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-4 col-sm-12">Trainer Allowance<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input type="number" placeholder="Trainer Allowance" class="form-control"
                                name="total_trainer_allowance" value="{{ old('total_trainer_allowance') }}" required step="0.01">
                        </div>
                    </div>
                </div>

                <!--Right-->
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-4 col-sm-12">Month<span class="text-danger">
                                *</span></label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <select name="month" id="month" class="form-control" required>
                                <option value="">-- Selet Month --</option>

                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-4 col-sm-12">Trainee Type<span
                                class="text-danger">
                                *</span></label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <select name="trainee_type" id="month" class="form-control" required>
                                <option value="">-- Selet Trainee Type --</option>
                                <option value="Officer">Officer</option>
                                <option value="Employee">Employee</option>
                                <option value="Officer/Employee">Officer/Employee</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-4 col-sm-12">Training Type<span
                                class="text-danger">
                                *</span></label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <select name="training_type" id="month" class="form-control" required>
                                <option value="">-- Selet Trainee Type --</option>
                                <option value="resident">resident</option>
                                <option value="non resident">non resident</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-4 col-sm-12">Trainees Allowance<span
                                class="text-danger">
                                *</span></label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input type="number" placeholder="Trainees Allowance" class="form-control"
                                name="total_trainees_allowance" value="{{ old('total_trainees_allowance') }}"
                                required step="0.01">
                        </div>
                    </div>
                </div>
                <div class="col-md-3 offset-md-4">
                    <button class="btn btn-block btn-info disabled" id="course_duration_btn" type="submit">
                         Add {{ $courseDuration->count() > 0 ? 'More' : '' }}                        
                    </button>
                </div>
            </div>
        </form>
        
            
                <div class="table-responsive mt-10">

                    <table class="table table-bordered table-striped">
                        <thead>

                            <th>Batch no</th>
                            <th>Month </th>
                            <th>Duration </th>
                            <th>Trainee type </th>
                            <th>Course hour </th>
                            <th>Total trainees </th>
                            <th>Training type </th>
                            <th>Total trainer allowance </th>
                            <th>Total trainee allowance </th>
                            <th>Action</th>
                        </thead>
                        <tbody id="append_cduration_list">
                           
                        </tbody>
                    </table>
                </div>
           
       

    </div>
</div>

@push('stackScript')
<script>

    $(document).ready(function(){
       
        $('#curriculam_error_area').html = '';
        $('#course_duration_btn').on('click', function(e){
            e.preventDefault();
            var formdata = $('#course_duration_form').serializeArray();
            var course_id = $('#selected_course_id').val()
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            
    

            if(formdata[0]['value'] == '' || formdata[1]['value'] == '' || formdata[2]['value'] == '' || formdata[3]['value'] == '' || formdata[4]['value'] == '' || formdata[5]['value'] == '' || formdata[6]['value'] == '' || formdata[7]['value'] == ''){
                var html = '<div class="alert alert-danger alert-dismissible mt-2">'
                    +'<span id="curriculam_error_msg">'
                        +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                        +'Please fill all fields'
                    +'</span>'
                +'</div>';
                $('#curriculam_error_area').html(html);
            }else{
                 $.ajax({
                    url: "{{ route('addCourseDurationandShow') }}",
                    type: 'POST',
                    cache: false,
                    data:{_token: CSRF_TOKEN, course_id:course_id, formData: formdata},
                    dataType: 'json',
                    success: function(data2)
                    {
                        
                         $('#curriculam_error_area').html = '';
                        $('#course_duration_form')[0].reset();
                        $('#append_cduration_list').empty()     
                        $.each(data2, function(i, data) {
                        var item = '<tr>'
                                    +'<td>'+data.batch_no+'</td>'
                                    +'<td>'+data.month+'</td>'
                                    +'<td>'+data.duration+' Days</td>'
                                    +'<td>'+data.trainee_type+'</td>'
                                    +'<td>'+data.course_hour+'</td>'
                                    +'<td>'+data.total_trainees+'</td>'
                                    +'<td>'+data.training_type+'</td>'
                                    +'<td>'+data.total_trainer_allowance+' TK</td>'
                                    +'<td>'+data.total_trainee_allowance+' TK</td>'
                                    +'<td><a href="" class="btn btn-warning btn-sm"><i class="la la-pencil"></i></a>'
                                    +'<button type="button" onclick="" class="btn btn-danger btn-sm delete-course-duration"><i class="la la-trash"></i></button>'
                                    +'</td>'
                                +'</tr>';
                            
                            $('#append_cduration_list').append(item)
                        
                        })
                        
                    },
                    error: function (request, status, error) {
                        console.log(request.responseText);
                        console.log(status);
                        console.log(error);
                    }
                });
            }
        })
    })

</script>
@endpush
