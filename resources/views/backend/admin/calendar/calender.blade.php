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
                        @if($type == 'main_training_courses')
                            <h5 class="text-dark font-weight-bold my-1 mr-5">Main Training Courses</h5>
                        @elseif($type == 'approved_trainee_list')
                            <h5 class="text-dark font-weight-bold my-1 mr-5">Approved Training List</h5>
                        @elseif($type == 'traineeList')
                            <h5 class="text-dark font-weight-bold my-1 mr-5">All Training List</h5>
                        @elseif($type == 'claim_modify_trainee_list')
                            <h5 class="text-dark font-weight-bold my-1 mr-5">Modified Trainee List</h5>
                        @elseif($type == 'training_course_list_cd')
                            <h5 class="text-dark font-weight-bold my-1 mr-5">Pending Course List</h5>
                        @elseif($type == 'pending_trainee_list')
                            <h5 class="text-dark font-weight-bold my-1 mr-5">Pending Trainee List</h5>
                        @else
                            <h5 class="text-dark font-weight-bold my-1 mr-5">All {{ ucfirst($type)}} Calendar</h5>
                        @endif
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                            </li>
                            
                            <li class="breadcrumb-item active">
                                @if($type == 'main_training_courses')
                                    <a class="text-muted">Main Training Courses</a>
                                @elseif($type == 'approved_trainee_list')
                                    <a class="text-muted">Approved Training List</a>
                                @elseif($type == 'traineeList')
                                    <a class="text-muted">All Training List</a>
                                @elseif($type == 'claim_modify_trainee_list')
                                    <a class="text-muted">Modified Trainee List</a>
                                @elseif($type == 'training_course_list_cd')
                                    <a class="text-muted">Pending Course List</a>
                                @elseif($type == 'pending_trainee_list')
                                    <a class="text-muted">Pending Trainee List</a>
                                @else
                                    <a class="text-muted">All {{ ucfirst($type)}} Calendar List</a>
                                @endif
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
                    <div class="ccol-lg-12">
                        <!--begin::Card-->
                        <div class="card card-custom example example-compact">
                            <div class="card-header">
                            @if($type != 'courseCalendar' && $type == 'main_training_courses')
                                <h3 class="card-title">Main Training Courses</h3>
                            @elseif($type != 'courseCalendar' && $type == 'approved_trainee_list')
                                <h3 class="card-title">Approved Training List</h3>
                            @elseif($type != 'courseCalendar' && $type == 'traineeList')
                                <h3 class="card-title">All Training List</h3>
                            @elseif($type != 'courseCalendar' && $type == 'claim_modify_trainee_list')
                                <h3 class="card-title">Modified Trainee List</h3>
                            @elseif($type != 'courseCalendar' && $type == 'training_course_list_cd')
                                <h3 class="card-title">Pending Course List</h3>
                            @elseif($type != 'courseCalendar' && $type == 'pending_trainee_list')
                                <h3 class="card-title">Pending Trainee List</h3>
                            @else
                                <h3 class="card-title">All {{ ucfirst($type)}} @if($type != 'training-course' && $type != 'traineeList') Calendar List  @endif</h3>
                            @endif
                       
                            @if($type == 'approved')
                                <div class="d-flex align-items-center">
                                    <div class="row mr-3">
                                        <div class="col-md-12 ">
                                            <select name="fiscal_year" data-select="{{ route('admin.searchAjaxApprovedList') }}" id="" class="form-control form-control-lg ajax-data-search-fiscal-cl form-control-solid">
                                                <option value="">-- Select Fiscal Year --</option>
                                                @foreach ($allFiscal as $year)
                                                <?php 
                                                    $cy = explode('-', $year->name)[0];     
                                                ?>
                                                    <option value="{{ $year->id }}" @if($cy == $current_fiscal) selected @endif>{{ $year->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">                                        
                                        <div class="col-md-12">
                                            <input type="text" id="{{$type}}" class="calenderListSearchFeaild form-control form-control-lg form-control-solid ajax-data-search" name="q" placeholder="Search Course"> 
                                        </div>
                                    </div>
                                </div>

                                @endif   
                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive pt-3">
                                @if($type == 'training_course_list')                                  
                                        @include('backend.admin.calendar.ajax.training_list_table')  
                                    @elseif($type == 'traineeList')                                  
                                        @include('backend.admin.calendar.ajax.main_training_courses')
                                    @elseif($type == 'view_trainee_list')                                  
                                        @include('backend.admin.calendar.ajax.trainee_list_table')    
                                    @elseif($type == 'pending_trainee_list')                                  
                                        @include('backend.admin.calendar.ajax.main_training_courses')  
                                    @elseif($type == 'waiting_trainee_list')                                  
                                        @include('backend.admin.calendar.ajax.pending_trainee_list')   
                                    @elseif($type == 'main_training_courses')                                  
                                        @include('backend.admin.calendar.ajax.main_training_courses')   
                                    @elseif($type == 'training_course_list_cd')                                  
                                        @include('backend.admin.calendar.ajax.main_training_courses')   
                                    @elseif($type == 'approved_trainee_list_for_cco')                                  
                                        @include('backend.admin.calendar.ajax.pending_trainee_list')  
                                    @elseif($type == 'final_training_courses')                                  
                                        @include('backend.admin.calendar.ajax.final_training_courses')  
                                    @elseif($type == 'claim_modify_trainee_list')                                  
                                        @include('backend.admin.calendar.ajax.claim_modify_trainee_list')  
                                    @elseif($type == 'approved_trainee_list')                                  
                                        @include('backend.admin.calendar.ajax.approved_trainee_list')  
                                    @elseif($type == 'modified_trainee_list_from_wa')                                  
                                        @include('backend.admin.calendar.ajax.claim_modify_trainee_list')  
                                    @elseif($type == 'approved')
                                        @include('backend.admin.calendar.ajax.tableBody')  
                                    @elseif($type == 'pending')
                                        @include('backend.admin.calendar.ajax.tableBody')  
                                    @endif                         
                                </div>
                                @if($type == 'pending' && $type != 'approved' && $type != 'modified_trainee_list_from_wa')
                                    {{ $calender->links() }}
                                @endif
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
                @if($type == 'courseCalendar')
                    @include('backend.admin.calendar.ajax.course_calendar_list')                                                  
                @endif
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
                    $(".ajax-data-container22").empty().append(response.page);
                },
                error: function(response){
                    console.log(response) 
                }
            });
        });
</script>



@endpush

