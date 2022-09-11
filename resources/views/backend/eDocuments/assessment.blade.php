@extends('backend.layout.master')
<style>
    @media print {
        #buttons, #kt_subheader {
            display: none;
        }

    }
</style>
@section('content')
    <div class="content d-flex flex-column flex-column-fluid">


        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Application Assessment</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a class="text-muted">Application Assessment</a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
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
                            
                            
                            <span class="pt-10" style="font-size: 15px;">
                                বাংলাদেশ পরিসংখ্যান ব্যুরো
                                <br>
                                গণপ্রজাতন্ত্রী বাংলাদেশ সরকার,
                                <br>
                                মিরপুর, ঢাকা - ১২১৬
                                <br>
                                বাংলাদেশ ।
                            </span>
                        </div>
                        <div class="border-bottom w-100"></div>

                        <div class="mt-5">
                            <h4>Application Detail</h4>
                            <p style="font-size: 16px">
                                Application ID: #{{ $application->application_id }} 
                                <br>
                                Applicant Name: {{$application->user ? $application->user->first_name : ''}} {{$application->user ? $application->user->middle_name : ''}} {{$application->user ? $application->user->last_name : ''}} 
                                <br>
                                Usage Type: @if($application->usage_type == 1)
                                                <span class="text-right">Organization</span>
                                            @else
                                                <span class="text-right">Personal</span>
                                            @endif
                                <br>
                                Purpose: @if ($application->purpose_id == 100)
                                            <span class="text-right">{{$application->purpose_specify}}</span>
                                        @else
                                            <span class="text-right">{{$application->applicationPurpose ? $application->applicationPurpose->name_en : ''}}</span>
                                        @endif
                            </p>
                            
                        </div>

                        <div class="d-flex justify-content-between pt-6">
                            @if (!$assessmentTemplate)
                                <p class="text-danger">Please active an assessment template from setting</p>
                            @else
                                <p style="font-size: 17px">{{$assessmentTemplate->header}}</p>
                            @endif
                        </div>
                        
                        

                        <div class="mt-5">
                            
                            <div class="row">
                                @foreach ($applicationProcess as $ap)
                                    <div class="col-6">
                                        <p style="font-size: 16px; border-bottom: 1px solid gray; padding-bottom: 10px; ">
                                           <span style="white-space:pre-line;"> {{ $ap->comment }}</span> 
                                            <br>

                                                @if ($ap->user)
                                                    {{ $ap->user->first_name.' '. $ap->user->last_name }}
                                                @endif
                                            <br>
                                                @if ($ap->user->designation)
                                                    {{ $ap->user->designation->name_en}}
                                                @else

                                                @endif
                                            <br>
                                            
                                                @if ($ap->user->signature)
                                                    <img style="max-width: 150px" alt="Signature Not Available" src={{asset('storage/signatures/').'/'.$ap->sender_signature}} />
                                                @endif
                                            <br>
                                            {{ date('d-M-Y h:i a', strtotime($ap->created_at))  }}
                                            
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                                                        
                        </div>
                        <div class="d-flex justify-content-between pt-6">
                            @if (!$assessmentTemplate)
                                <p class="text-danger">Please active an assessment template from setting</p>
                            @else
                                <p style="font-size: 17px">{{$assessmentTemplate->footer}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- end: Invoice header-->
                
                <!-- begin: Invoice action-->
                <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0" id="buttons">
                    <div class="col-md-9">
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download</button>
                            <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print</button>
                        </div>
                    </div>
                </div>
                <!-- end: Invoice action-->
                <!-- end: Invoice-->
            </div>
        </div>
        <!-- end::Card-->
        </div>
    </div>

@endsection