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
                                <h3 class="card-title">Add New Course</h3>
                            </div>
                            <div class="container mt-2 mb-2 ajax-course-data-container">
                                @include('backend.admin.trainingCourse.form.courseDetails')
                            </div>
                            <div class="container mt-2 mb-2 ajax-course-duration-data-container">
                                @include('backend.admin.trainingCourse.form.courseDuration')
                            </div>
                            <div class="container mt-2 mb-2 ajax-course-curriculam-data-container">
                                @include('backend.admin.trainingCourse.form.courseCurriculam')
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

        var delay = (function(){
            var timer = 0;
            return function(callback, ms){
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
            };
        });

        $(document).on("keyup change", ".ajax-course-details-data-insert", function(e){
            
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