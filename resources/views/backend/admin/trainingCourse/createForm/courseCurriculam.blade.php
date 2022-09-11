<div class="card">
    <div class="card-header">
        Course Curriculam Details
    </div>
    <div id="curriculam_error_area">

    </div>

    <div class="card-body">
        <form action="" id="addcurriculam_form" class="add-course-curriculam">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-12 col-sm-12">Module No: <span
                                class="text-danger">
                                *</span></label>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <input type="number" placeholder="Module Number" class="form-control" id="module_no" name="module_no"
                                value="{{ old('module_no') }}" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-12 col-sm-12">Subject Code: <span
                                class="text-danger">
                                *</span></label>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <input type="text" placeholder="Subject Code" id="subject_code" class="form-control" name="subject_code"
                                value="{{ old('subject_code') }}" required>
                        </div>
                    </div>

                    </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-12 col-sm-12">Subject Title: <span
                                class="text-danger">
                                *</span></label>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <input type="text" placeholder="Subject Title" id="subject_title" class="form-control" name="subject_title"
                                value="{{ old('subject_title') }}" required>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-md-3 offset-md-4">
                    <button class="btn btn-block btn-info disabled" id="addcurriculam_btn" type="submit">Add</button>
                </div>
            </div>
        </form>


        <div class="table-responsive mt-10">
            <table class="table table-bordered table-striped">
                <thead>
                    <th>Module</th>
                    <th> Subject Title </th>
                    <th> Subject Code </th>
                    <th> Action </th>
                </thead>
                <tbody id="curriculam_list">
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('stackScript')
<script>
    $(document).ready(function(){
        $('#curriculam_error_area').html = '';
        $('#addcurriculam_btn').on('click', function(e){
            e.preventDefault()
            var formdata = $('#addcurriculam_form').serializeArray();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var course_id = $('#selected_course_id').val()


            if(formdata[0]['value'] == '' || formdata[1]['value'] == '' || formdata[2]['value'] == ''){
                var html = '<div class="alert alert-danger alert-dismissible mt-2">'
                    +'<span id="curriculam_error_msg">'
                        +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                        +'Please fill all fields'
                    +'</span>'
                +'</div>';
                $('#curriculam_error_area').html(html);
            }else{
                $.ajax({
                    url: "{{ route('addCourseCurriculam') }}",
                    method: 'post',
                    data: {_token: CSRF_TOKEN, course_id:course_id, formData:formdata},
                    datatype: 'json',
                    success: function(data3){
                        $('#curriculam_error_area').html = '';
                        $('#curriculam_list').empty()
                        $('#addcurriculam_form')[0].reset();    
                        $.each(data3, function(i, item){
                        
                            var list = '<tr>'
                                +'<td>'+item.module_no+'</td>'
                                +'<td>'+item.subject_title+'</td>'
                                +'<td>'+item.subject_code+'</td>'
                                +'<td><a href="" class="btn btn-warning btn-sm"><i class="la la-pencil"></i></a><button type="button" class="btn btn-danger btn-sm delete-course-curriculam"><i class="la la-trash"></i></button></td>'
                            +'</tr>';

                            $('#curriculam_list').append(list)
                        })
                    },
                    error: function(errors){

                    }
                })
            }
        })
    })
</script>
@endpush
<tr>
                                  