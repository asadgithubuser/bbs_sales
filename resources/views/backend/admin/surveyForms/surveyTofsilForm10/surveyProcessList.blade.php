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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Major Crop Production Forecasting Form</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">Dashboard</a>
                            </li>

                            <li class="breadcrumb-item active">
                                <a class="text-muted">Major Crop Production Forecasting Form</a>
                            </li>

                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                {{-- modal --}}
                <style>
                    .animate-top1{
                        animation: animatetop 0.9s;
                    }
                    .w3-animate-right1{
                        
                        animation: animateright 0.9s;
                    }
                </style>
                <div class="modal fade animate-top1" id="myModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Select Union for Major Crop Production Forecasting Form Survey</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                
                                <div class="row">
                                    @foreach ($processLists as $processList)

                                    <div class="col-md-3 w3-animate-right1 mb-3">
                                        <div class="w3-card w3-hover-shadow">
                                            <div class="card-body w3-green">
                                                
                                                <a href="{{ route('admin.surveyTofsilForm10.create', ['surveyProListId' => $processList->id]) }}">
                                                    <div class="w3-container ">
                                                        <i class="la la-map-marker la-5x w3-text-white"></i>
                                                        <h5 class="w3-text-white pt-2">{{ $processList->union ? $processList->union->name_en : '' }}</h5>
                                                    </div>
                                                </a>
                                                  
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('admin.index') }}" class="btn btn-danger">Return Back</a>
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
            $("#myModal").modal({backdrop: 'static', keyboard: false});
            
        });
    </script>
@endpush
