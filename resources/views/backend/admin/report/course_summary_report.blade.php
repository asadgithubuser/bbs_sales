@extends('backend.layout.master')
<style>
    @media print {
        #buttons, #kt_subheader, .noprint {
            display: none !important;
        }
    }
</style>
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Report</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">Dashboard</a>
                            </li>
                            @can('report')
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.report.onlineSales') }}" class="text-muted">Online Sales</a>
                                </li>
                            @endcan
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Subheader-->

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--session msg-->
                @include('alerts.alerts')
                <!--begin::Card-->
                <div class="row">
                    <div class="col-12">
                        <!--begin::Card-->
                        <div class="card card-custom example example-compact">
                            <div class="card-header">
								<h3 class="card-title">Course summary report</h3>
							</div>

                            <div class="form-group card-body mb-0 pb-0">
                                <form class="form-inline" action="" method="GET">
                                    @csrf
                                        <div class="row">
                                            <div class="col-md-3 col-sm-6 form-group">
                                                <label class="mr-3 mb-0 d-none d-md-block">Wing Name:</label>
                                                <select class="form-control select2 ajax-data-search2" name="depertment_id">
                                                    <option value="">--Select Service--</option>
                                                    @foreach($depertments as $depertment)
                                                        <option value="{{ $depertment->id }}">{{ $depertment->name_bn}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-6 form-group">
                                                <label class="mr-3 mb-0 d-none d-md-block">Fiscal Year:</label>
                                                <select class="form-control select2 ajax-data-search2" name="fiscal_id">
                                                    <option value="">--Select fiscal--</option>
                                                    @foreach($fiscal_all as $fiscal)
                                                        <option value="{{$fiscal->id}}">{{ $fiscal->name}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-6 form-group d-block">
                                                <label class="mr-3 mb-0 d-md-block">Course Name:</label>
                                                <input class="form-control d-md-block" type="text" name="course_name" placeholder="Enter course name">
                                            </div>

                                            <div class="col-md-2 col-sm-6 pt-7">
                                                <button type="submit" class="btn btn-success ml-2">Submit</button>
                                             </div>
                                         </div>
                                </form>
                            </div>

                            <div class="card-body">
								<div class="table-responsive ajax-data-container pt-3">
									<table class="table table-separate table-head-custom table-checkable table-striped" id="">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Course Name</th>
                                                <!-- <th>Trainer Name</th> -->
                                                <th>Fiscal Year</th>
                                                <th>Wing</th>
                                                <th>Schedule</th>
                                                <th>Course Hour</th>
                                                <th>Trainee Type</th>
                                                <th>Total Trainees</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                            <tbody>
                                                @php
                                                    $i = (($courses->currentPage() - 1) * $courses->perPage() + 1);
                                                @endphp
                                                @forelse ($courses as $course)
                                                    <?php if($course != null){ ?>
                                                        <tr>
                                                        
                                                            <td> <span class="badge badge-success">{{$i++}}</span> </td>
                                                            
                                                            <td>{{ $course->courseTitle->title  }}</td>
                                                            
                                                            <td>{{ $course->courseYear->name }}</td>

        

            <td>@if(isset($course->courseListDetails->user->department) && $course->courseListDetails->user->department != null){{ $course->courseListDetails->user->department->name_en }}@endif</td>
                                                            <td>{{ $course->courseDuration->start_date }} - {{  $course->courseDuration->end_date }}</td>
                                                            <td>{{ $course->courseDuration->course_hour }}</td>
                                                            <td>{{ $course->courseDuration->trainee_type }}</td>
                                                            <td>{{ $course->courseDuration->total_trainees }}</td>
                                                            <td>

                                                            
                                                             
                                                            <a href="{{ route('admin.course.getWaitingTraineeList', ['id'=>$course->id]) }}" class="btn btn-primary btn-sm" title="show3"><i class="la la-eye"></i></a>

                                                           
                                                                
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    @php
                                                        $i++;
                                                    @endphp

                                                @empty  
                                                    <tr>
                                                        <td colspan="9"><p class="text-center">Item NOT Found.</p></td>
                                                    </tr>   
                                                @endforelse
                                            </tbody>
                                        
                                    </table>  
								</div>
                                 
							</div>

                            <div class="card-footer">
								{{-- <a href="{{route('admin.report.digitalDataPreview')}}" class="btn btn-secondary float-right">Preview</a> --}}
                                <button type="button" id="noprintbtn" class="btn btn-primary font-weight-bold float-right"
                                        onclick="return printDiv('printReport');">Print</button>
							</div>

                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    {{-- Print section --}}
    <div class="content d-flex flex-column flex-column-fluid" style="display:none !important;" id="printReport">
        <!--begin::Subheader-->
        {{-- <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Report</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">Dashboard</a>
                            </li>
                            @can('report')
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.report.digitalData') }}" class="text-muted">Digital Data</a>
                                </li>
                            @endcan
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div> --}}
        <!--end::Subheader-->
        <div class="container-fluid">
            <!-- begin::Card-->
        <div class="card card-custom overflow-hidden">
            <div class="card-body p-0">
                <!-- begin: Invoice-->
                <!-- begin: Invoice header-->
                <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
                    <div class="col-md-9">
                        <div class="d-flex justify-content-between">
                            
                            <img class="display-4 font-weight-boldest mb-10 mr-10" height="100%" width="15%" src="{{ asset('assets/media/logos/logo2.png') }}" alt="">
                            
                            
                            <span class="pt-10" style="font-size: 18px;">
                                গণপ্রজাতন্ত্রী বাংলাদেশ সরকার
                                <br>
                                বাংলাদেশ পরিসংখ্যান ব্যুরো
                                <br>
                                মিরপুর, ঢাকা - ১২১৬
                                <br>
                                বাংলাদেশ ।
                            </span>
                        </div>
                        <div class="border-bottom w-100"></div>
                        <div class="d-flex justify-content-between pt-6">
                            <span> <span style="font-weight: bold">Report Name:</span> Digital Data Downloads </span>
                            <span>Date: {{date('d-M-Y')}}</span>
                        </div>
                    </div>
                </div>
                <!-- end: Invoice header-->
                
                <!-- begin: Invoice footer-->
                <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
                    <div class="col-md-9">
                        <div class="table-responsive">
                                    <table class="table table-separate table-head-custom table-checkable table-striped" id="">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Course Name</th>
                                                <!-- <th>Trainer Name</th> -->
                                                <th>Fiscal Year</th>
                                                <th>Month</th>
                                                <th>Duration</th>
                                                <th>Schedule</th>
                                                <th>Course Hour</th>
                                                <th>Trainee Type</th>
                                                <th>Total Trainees</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                           
                                             <button type="submit" class="btn btn-success btn block">Approved All</button>
                                                
                                            <tbody>
                                                @php
                                                    $i = (($courses->currentPage() - 1) * $courses->perPage() + 1);
                                                @endphp
                                                @forelse ($courses as $course)
                                                    <?php if($course != null){ ?>
                                                        <tr>
                                                        
                                                                <td> <span class="badge badge-success">{{$i++}}</span> </td>
                                                            

                                                            <td>{{ $course->courseTitle->title  }}</td>
                                                           
                                                            <td>{{ $course->courseYear->name }}</td>
                                                            <td>{{ $course->courseDuration->month }}</td>
                                                            <td>{{ $course->courseDuration->duration }}</td>
                                                            <td>{{ $course->courseDuration->start_date }} - {{  $course->courseDuration->end_date }}</td>
                                                            <td>{{ $course->courseDuration->course_hour }}</td>
                                                            <td>{{ $course->courseDuration->trainee_type }}</td>
                                                            <td>{{ $course->courseDuration->total_trainees }}</td>
                                                            <td>

                                                            
                                                             
                                                            <a href="{{ route('admin.course.getWaitingTraineeList', ['id'=>$course->id]) }}" class="btn btn-primary btn-sm" title="show3"><i class="la la-eye"></i></a>

                                                           
                                                                
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    @php
                                                        $i++;
                                                    @endphp

                                                @empty  
                                                    <tr>
                                                        <td colspan="9"><p class="text-center">Item NOT Found.</p></td>
                                                    </tr>   
                                                @endforelse
                                            </tbody>
                                        
                                    </table>  
                        </div>
                        {{-- {{$items->links()}} --}}
                    </div>
                </div>
                <!-- end: Invoice footer-->
                <!-- begin: Invoice action-->
                {{-- <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0" id="buttons">
                    <div class="col-md-9">
                        <div class="d-flex justify-content-between float-right">
                            <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print</button>
                        </div>
                    </div>
                </div> --}}
                <!-- end: Invoice action-->
                <!-- end: Invoice-->
            </div>
        </div>
        <!-- end::Card-->
        </div>
    </div>

@endsection


@push('stackScript')
    <script type="text/javascript">
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            // document.body.innerHTML = originalContents;
        }
    </script>
@endpush