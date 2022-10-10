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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Course Details</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a class="text-muted">Course Details</a>
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
                <!--begin::Card-->
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <div class="card card-custom example example-compact">
                            <div class="card-header">
                                <h3 class="card-title">{{ $training course->courseTitle->title  }}</h3>
                            </div>
                            <div id="tab_header_tabs" class="trainee_details_card_header">
                                <ul class="nav details_trainee_tab nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="trainee_tab_item" data-toggle="tab" href="#main_trainee_list" role="tab" aria-controls="home" aria-selected="true">Main List</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="trainee_tab_item" data-toggle="tab" href="#waiting_trainee_list" role="tab" aria-controls="profile" aria-selected="false">Waiting List</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="trainee_tab_item" href="#upload_materials" @if($trainingCourse->is_published == 1) data-toggle="tab" @else  @endif role="tab" aria-controls="contact" aria-selected="false">Upload Materials</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="trainee_tab_item" href="#trainee_attendance" @if($trainingCourse->is_published == 1) data-toggle="tab" @else  @endif role="tab" aria-controls="contact" aria-selected="false">Trainee Attendence</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="trainee_tab_item" href="#post_ev_form" @if($trainingCourse->is_published == 1) data-toggle="tab" @else  @endif role="tab" aria-controls="contact" aria-selected="false">Post-Evaluation Form</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="trainee_tab_item" href="#certificate" @if($trainingCourse->is_published == 1) data-toggle="tab" @else  @endif role="tab" aria-controls="contact" aria-selected="false">Certificate</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ajax-data-container pt-3">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="main_trainee_list" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="row_int">
                                                <div class="col-lg-12">
                                                    <!--begin::Card-->
                                                    <div class="card card-custom example example-compact">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Main Trainee List</h3>
                                                        </div>
                                                        <div class="card-body_int">
                                                            <div class="table-responsive pt-3">
                                                                @include('backend.admin.calendar.ajax.main_trainee_list_table')                          
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Card-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="tab-pane fade" id="waiting_trainee_list" role="tabpanel" aria-labelledby="profile-tab">
                                            <div class="row_int">
                                                <div class="col-lg-12">
                                                    <div class="card card-custom example example-compact">
                                                        <div class="card-header">
                                                            <h3 class="card-title">All Waiting Trainee List</h3>
                                                        </div>
                                                        <div class="card-body_int">
                                                            <div class="table-responsive ajax-data-container pt-3">
                                                                @include('backend.admin.calendar.ajax.pending_trainee_list')                       
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="upload_materials" role="tabpanel" aria-labelledby="trainee_tab_item">
                                            <div class="row_int">
                                                <div class="col-lg-12">
                                                    <!--begin::Card-->
                                                    <div class="card card-custom example example-compact">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Upload Course Materials</h3>
                                                        </div>
                                                        <div class="card-body_int">
                                                            <div class="table-responsive pt-3">
                                                                @include('backend.admin.calendar.ajax.upload_course_materials')                          
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Card-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="trainee_attendance" role="tabpanel" aria-labelledby="trainee_tab_item">
                                            <div class="row_int">
                                                <div class="col-lg-12">
                                                    <!--begin::Card-->
                                                    <div class="card card-custom example example-compact">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Trainee Attendence</h3>
                                                            
                                                        </div>
                                                        <div class="card-body_int">
                                                            <div class="table-responsive pt-3">
                                                                @include('backend.admin.calendar.ajax.upload_trainee_attendance')                          
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Card-->
                                                </div>
                                            </div>
                                            <div class="row_int">
                                                <div class="col-lg-12">
                                                    <!--begin::Card-->
                                                    <div class="card card-custom example example-compact">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Trainee Attendence Report</h3>
                                                        </div>
                                                        <div class="card-body_int">
                                                            <div class="table-responsive pt-3">
                                                                @include('backend.admin.calendar.ajax.trainee_attendance_report')                          
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Card-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="post_ev_form" role="tabpanel" aria-labelledby="trainee_tab_item">
                                            <div class="row_int">
                                                <div class="col-lg-12">
                                                    <!--begin::Card-->
                                                    <div class="card card-custom example example-compact">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Upload Post-Evaluation Form</h3> 
                                                        </div>
                                                        <div class="card-body_int">
                                                            <div class="table-responsive pt-3">
                                                                @include('backend.admin.calendar.ajax.upload_post_evaluation')                          
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Card-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="certificate" role="tabpanel" aria-labelledby="trainee_tab_item">
                                            <div class="row_int">
                                                <div class="col-lg-12">
                                                    <!--begin::Card-->
                                                    <div class="card card-custom example example-compact">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Certificate</h3>
                                                        </div>
                                                        <div class="card-body_int">
                                                            <div class="table-responsive pt-3">
                                                            <table class="table table-separate table-head-custom table-checkable table-striped 44" id="">   
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="4%"></td>
                                                                        <td width="45%" class="text-left pt-4">Publish the certificate to allow the trainee to download</td>
                                                                        <td width="15%">
                                                                            @if($trainingCourse->publish_certificate == 0)
                                                                            <a href="{{ route('admin.trainee.publishCertificateForTrainee',$trainingCourse->id ) }}"  class="btn btn-success btn block float-right">Publish Certificate</button>    
                                                                            @else
                                                                            <a href="" class="btn disabled btn-success btn block float-right">Certificate Published</button>  
                                                                            @endif
                                                                        </td>
                                                                    </tr> 
                                                                </tbody>
                                                            </table>                         
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Card-->
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>                
                                </div>
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
@push('stackScript')
<script>
    $(document).on("change", ".ajax-data-search-fiscal-cl", function(e){
            
            e.preventDefault();
            
            var that = $(this);
            var fiscal_id = e.target.value;
console.log(fiscal_id)
            var url = that.attr("data-select");
            var urls = url+'?fiscal_id='+fiscal_id;
            

            $.ajax({
                url: urls,
                type: 'GET',
                cache: false,
                dataType: 'json',
                success: function(response)
                {
                    console.log(response)
                $(".ajax-data-container2").empty().append(response.page);
                },
                error: function(response){
                    console.log(response) 
                }
            });
        });

</script>

@endpush

