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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">All {{ ucfirst($type)}} Calendar</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                            </li>
                        
                            <li class="breadcrumb-item active">
                                <a class="text-muted">All {{ ucfirst($type)}} Calendar List</a>
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
                    <!--begin::Card-->
                    <div class="col-lg-12">
                        <div class="card card-custom example example-compact">
                            <div class="card-header">
                                <h3 class="card-title font-weight-normal">Add Schedule and Trainer to <strong class="mr-2 ml-2">{{ $course->courseTitle->title  }}</strong> Course</h3>
                            </div>
                            <div class="card-body">
                                <div class="ajax-data-container pt-3">
                                <form action="{{ route('admin.course.updateScheduleInfo') }}" method="post" class="">
                                    @csrf
                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-12 col-sm-12">Schedule <span
                                                    class="text-danger">
                                                    *</span></label>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <input type="daterange" placeholder="days shedule" class="form-control" id="schedule" name="schedule"
                                                    value="{{ old('module_no') }}" required>
                                                    <span class="text-danger">Note: Please select duration for <strong>{{ $course->courseDuration->duration }}</strong> days in <strong>{{ $course->courseDuration->month }}</strong> month</span>
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group ">
                                            <label class="col-form-label col-lg-12 col-sm-12">Trainer <span
                                                    class="text-danger">
                                                    *</span></label>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                
                                                <select name="trainer_id[]" id="trainer_id" class="form-control ajax-course-details-data-insert selectpicker" multiple data-live-search="true">
    @foreach ($trainers as $trainer)
        <option value="{{ $trainer->id }}" @if(in_array($trainer->id, json_decode($course->trainer_id))) selected @endif>{{ $trainer->name }}</option>
    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-sm-12">
                                    <label class="col-form-label col-lg-12 col-sm-12"> <span
                                                    class="text-danger">
                                                    </span></label>
                                    <button type="button" class="btn btn-secondary btn-sm mt-5" data-toggle="modal" data-target="#addOuterTrainer">Add Trainer From Outside</
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-12 col-sm-12">Trainer Allowance <span
                                                    class="text-danger">
                                                    *</span></label>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <input type="number" placeholder="Module Number" class="form-control" id="trainer_allowance" name="trainer_allowance"
                                                    value="{{ $course->courseDuration->total_trainer_allowance }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-12 col-sm-12">Trainees Allowance <span
                                                    class="text-danger">
                                                    *</span></label>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <input type="text" placeholder="Subject Title" id="trainee_allowance" class="form-control" name="trainee_allowance"
                                                    value="{{ $course->courseDuration->total_trainee_allowance }}" required>
                                            </div>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 offset-md-4">
                                        <button class="btn btn-block btn-info" id="addcurriculam_btn" type="submit">Update Info</button>
                                    </div>
                                </div>
                            </form>

                            @include('backend.admin.calendar.add_outer_trainer_modal')
                        
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

$('input[name="schedule"]').daterangepicker({
    autoApply: true
});
			var avatar100 = new KTImageInput('kt_image_100');

			avatar100.on('cancel', function(imageInput) {});

			avatar100.on('change', function(imageInput) {});

			avatar100.on('remove', function(imageInput) {});
		</script>
	@endpush


