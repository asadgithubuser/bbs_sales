   
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Course Calendar</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                            </li>
                            
                            <li class="breadcrumb-item active">
                                <a class="text-muted">Course Calendar List</a>
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
                            <div class="row">
                                <div class="col-md-12 text-center mt-3">
                                    <button id="downloadCourseCalender" class=" btn ml-8 btn-primary btn-sm" title="download">Download</button>
                                </div>
                            </div>
                            <div class="courseListCalender">
                                <div class="calender-top-tile text-center">
                                    <h2>প্রশিক্ষণ বর্ষপঞ্জি ২০২২-২০২৩</h2>
                                </div>
                                <div class="calender-year-plan-tile text-center">
                                    <h2>এক নজরে ২০২২-২৩ অর্থ বছরের প্রশিক্ষণ পরিকল্পনা</h2>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive ajax-data-container pt-3">
                                    <table id="calenter-ctable" class="table table-separate table-checkable table-striped" id="">
                                        <thead>
                                            <tr>
                                                <th>ক্রমিক নং</th>
                                                <th>প্রশিক্ষণ কোর্সের নাম</th>
                                                <th>সময়</th>
                                                <th>মেয়াদ</th>
                                                <th>প্রশিক্ষণার্থী</th>
                                                <th>প্রশিক্ষণার্থীর সংখ্যা</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php
                                                $i = (($courseCalendars->currentPage() - 1) * $courseCalendars->perPage() + 1);
                                            @endphp
                                            
                                            @forelse ($courseCalendars as $courseCalendar )
                                                <tr>
                                                    <td>
                                                        {{ $i++ }}
                                                    </td>
                                                    <td align="left">{{ $courseCalendar->course->title }}</td>
                                                    <td align="left">{{ $courseCalendar->course->courseDuration->month }}</td>
                                                    <td>{{ $courseCalendar->course->courseDuration->duration }}</td>
                                                    <td>{{ $courseCalendar->course->courseDuration->trainee_type }}</td>
                                                    <td>{{ $courseCalendar->course->courseDuration->total_trainees }}</td>
                                                    
                                                </tr>
                                            @empty  
                                                <tr>
                                                    <td colspan="9"><p class="text-center">Item NOT Found.</p></td>
                                                </tr>   
                                            @endforelse
                                            </tbody>
                                        </table>                       
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
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
    
    
    