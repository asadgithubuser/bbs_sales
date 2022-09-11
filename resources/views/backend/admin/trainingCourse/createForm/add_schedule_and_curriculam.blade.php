@extends('backend.layout.master')

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Create Courses</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                            </li>
                        
                            <li class="breadcrumb-item active">
                                <a class="text-muted">Create Courses</a>
                            </li>
                            
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                @include('alerts.alerts')

                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <div class="card card-custom example example-compact">
                            <div class="card-header">
                                <h3 class="card-title">Add Schedule And Curriculam</h3>
                            </div>
                            <div class="container mt-2 mb-2 ajax-course-data-container">
                            <div class="card">
                                <div class="row card-header">
                                <div class="col-lg-4">
                                    <label class="col-form-label col-lg-12 col-sm-12">Select Course<span class="text-danger">*</span></label>
                                </div>
                                <div class="col-lg-8">
                                    <select name="selected_course_id" id="selected_course_id" class="form-control ajax-courert">
                                        <option value="00">--Select Fiscal Year--</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                                <div id="course_details_sec" class="card-body">
                                    <input type="hidden" id="course_id" value="">
                                    <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-12 col-sm-12">Course Title<span class="text-danger">
                                                    *</span></label>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <input type="text" placeholder="Course Title" class="form-control " id="title"
                                                readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-12 col-sm-12">Fiscal Year<span class="text-danger">
                                                    *</span></label>
                                            <div class="col-lg-12 col-md-12 col-sm-12">

                                                <input type="text" name="fiscal_year" id="fiscal_year" class="form-control " readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-12 col-sm-12">Trainer<span class="text-danger">
                                                    *</span></label>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <input type="text" name="trainer" id="trainer" class="form-control "readonly>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="form-group row">
                                            <label class="col-form-label col-lg-12 col-sm-12">Course Director</label>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                 <input type="text" name="director" id="director" class="form-control "readonly>
                                                
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-12 col-sm-12">Course Coordinator<span class="text-danger">
                                                    *</span></label>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <input type="text" name="coordinator" id="coordinator" class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-12 col-sm-12">Course Purpose<span class="text-danger">*</span></label>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <textarea type="text" name="purpose" id="purpose" class="form-control" placeholder="Course Purpose" readonly></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    </div>
                                </div>
                            </div>

                            </div>
                            <div class="container mt-2 mb-2 ajax-course-duration-data-container">
                                @include('backend.admin.trainingCourse.createForm.courseDuration')
                            </div>
                            <div class="container mt-2 mb-2 ajax-course-curriculam-data-container">
                                @include('backend.admin.trainingCourse.createForm.courseCurriculam')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('stackScript')
<script>
    $(document).ready(function() {
        $('#course_details_sec').css('display', 'none')
        $('#selected_course_id').on('change', function(){
            var course_id = $(this).val()
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            console.log(course_id)
            if(course_id != 00){
                $('#addcurriculam_btn').removeClass('disabled')
                $('#course_duration_btn').removeClass('disabled')
            }else{
                $('#addcurriculam_btn').addClass('disabled')
                $('#course_duration_btn').addClass('disabled')
            }

            $.ajax({
                url: "{{ route('getDataBySelectedCourse') }}",
                type: 'POST',
                cache: false,
                data:{_token: CSRF_TOKEN, id:course_id},
                dataType: 'json',
                success: function(data)
                {
                    $('#append_cduration_list').empty()     
                    $('#course_details_sec').css('display', 'block')
                    $('#course_id').val(data.course.id)
                    $('#title').val(data.course.title)
                    $('#fiscal_year').val(data.fiscal_yr)
                    $('#trainer').val(data.trainer)
                    $('#director').val(data.cd_name)
                    $('#coordinator').val(data.coo_name)
                    $('#purpose').val(data.course.course_purpose)

                    $.each(data.course_list, function(i, data) {
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
                error: function(){
                    // alert('Someting Went To wrong.');
                }
            });

        })
    });

    $(document).ready(function() {

        var delay = (function(){
            var timer = 0;
            return function(callback, ms){
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
            };
        });

        $(document).on("keyup change", ".", function(e){
            
            e.preventDefault();
            
            var that = $( this );
            var data = e.target.value;
            var url = that.attr("data-url");
            var urls = url + '?title=' + data;

            
            $.ajax({
                url: urls,
                type: 'GET',
                cache: false,
                dataType: 'json',
                success: function(response)
                {
                    $(".ajax-course-data-container").empty().append(response.page);
                },
                error: function(){
                    // alert('Someting Went To wrong.');
                }
            });
        });

        $(document).on("submit", ".course-duration-add", function(e){
            
            e.preventDefault();
            var that = $( this );
            var urls = that.attr("data-save-url");
            let data = $('.course-duration-add').serialize();
            $.ajax({
                url: urls,
                type: 'POST',
                data: data+'&_token={{csrf_token()}}',
                cache: false,
                dataType: 'json',
                success: function(response)
                {
                    $(".ajax-course-duration-data-container").empty().append(response.page);
                    if(response.sessionMessage)
                    {
                        Swal.fire(response.sessionMessage,'','warning');
                    }
                    
                },
                error: function(){
                    // alert('Someting Went To wrong.');
                }
            });
        });


        // Course curriculam ajax
        $(document).on("submit", ".add-course-curriculam", function(e){
            e.preventDefault();
            var that = $(this);
            var urls = that.attr("curriculam-save-url");
            let data = $('.add-course-curriculam').serialize();
            $.ajax({
                url: urls,
                type: 'POST',
                data: data + '&_token={{csrf_token()}}',
                cache: false,
                dataType: 'json',
                success: function(response)
                {
                    $(".ajax-course-curriculam-data-container").empty().append(response.page);
                    if(response.sessionMessage)
                    {
                        Swal.fire(response.sessionMessage, '', 'warning');
                    }
                },
                error: function(){
                    // alert('Someting Went To wrong.');

                }
            });
        });

    });

    // delete course duration
    
    function deleteCourseDuration(id){
        var data_id = id;
        var url =  '<a href="{{route("admin.course.deleteCourseDuration",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
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
    }

    // Delete course curriculam
    function deleteCourseCurriculam(id)
    {
        var data_id = id;
        var url = '<a href="{{route("admin.course.deleteCourseCurriculam","id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
        url = url.replace('id', data_id);

        Swal.fire({
            title: 'Are you sure ?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: url,
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire('Deleted Successfully!', '', 'success')
            } else if (result.dismiss == "cancel") {
                Swal.fire('Canceled', '', 'error')
            }
        })
    }

</script>
@endpush