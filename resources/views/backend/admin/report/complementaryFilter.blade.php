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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Complementary Copies</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}" class="text-muted">Dashboard</a>
                        </li>
                        @can('manage_storage')
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.report.complementary') }}" class="text-muted">Complementary Copies</a>
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
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--session msg-->
            @include('alerts.alerts')
            <!--begin::Card-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Complementary Copies</h4>
                        </div>

                        <div class="form-group card-body mb-0 pb-0">
                    
                            <form class="form-inline" action="{{route('admin.report.complementaryFilter')}}" method="POST">
                                @csrf
                            
                                <div class="form-group">
                                    <label class="pr-2 pl-2" for="fromDate">From</label>
                                    <input class="form-control" type="date" name="fromDate" id="fromDate">
                                </div>
                                <div class="form-group">
                                    <label class="pr-2 pl-2" for="toDate">To</label>
                                    <input class="form-control" type="date" name="toDate" id="toDate">
                                </div>
                                
                                <button type="submit" class="btn btn-success ml-2">Submit</button>
                                    
                            </form>

                        </div>

                        <div class="card-body">
                            <div class="table-responsive ajax-data-container-product">
                                <table class="table table-striped ">
                                    <thead>
                                        <tr style="background-color: #0bb7af6b !important;">
                                
                                            <th style="color: rgb(0, 0, 0) !important;">#</th>
                                            <th style="color: rgb(0, 0, 0) !important;">Requisition No</th>
                                            <th style="color: rgb(0, 0, 0) !important;">Full Name</th>
                                            <th style="color: rgb(0, 0, 0) !important;">Organization Name</th>
                                            <th style="color: rgb(0, 0, 0) !important;">Designation</th>
                                            <th style="color: rgb(0, 0, 0) !important;">Phone</th>
                                            <th style="color: rgb(0, 0, 0) !important;">Address</th>
                                            <th style="color: rgb(0, 0, 0) !important;">Date</th>
                                            <th style="color: rgb(0, 0, 0) !important;">Quantity</th>
                                            <th style="color: rgb(0, 0, 0) !important;">Status</th>
                                            <th style="color: rgb(0, 0, 0) !important;">Action</th>
                                        </tr>
                                
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                            $totalPcs = 0;
                                        @endphp
                                        @foreach ($requisitions as $requisition)
                                            @php
                                                $totalQty = 0;
                                            @endphp
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$requisition->requisition_number}}</td>
                                                <td>{{$requisition->name}}</td>
                                                <td>{{$requisition->organization_name}}</td>
                                                <td>{{$requisition->designation}}</td>
                                                <td>{{$requisition->phone}}</td>
                                                <td>{{$requisition->address}}</td>
                                                <td>{{date('d-m-Y', strtotime($requisition->created_at))}}</td>
                                                @php
                                                    foreach($requisition->requisitionItems as $item)
                                                    {
                                                        $totalQty += $item->quantity;
                                                    }
                                                @endphp

                                                <td>{{$totalQty}}</td>

                                                @if ($requisition->status == 0)
                                                    <td>
                                                        <span class="badge badge-warning">Request</span>
                                                    </td>
                                                @elseif($requisition->status == 1)
                                                    <td>
                                                        <span class="badge badge-success">Approved</span>
                                                    </td>
                                                @elseif($requisition->status == 2)
                                                    <td>
                                                        <span class="badge badge-danger">Rejected</span>
                                                    </td>
                                                @else
                                                    <td>
                                                        <span class="badge badge-success">Delivered</span>
                                                    </td>
                                                @endif
                                                <td>
                                                    <a href="{{route('admin.requisition.show', $requisition->id)}}" class="btn btn-primary" title="Details">Details</a>
                                                </td>
                                                
                                            </tr>
                                            @php
                                                $i++;
                                                $totalPcs += $totalQty;
                                            @endphp
                                        @endforeach
                                        <tr>
                                            <td colspan="8" align="right">Total Publications Delivered</td>
                                            <td>{{$totalPcs}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </div>
                            {{ $requisitions->links() }}
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
                        <table class="table table-striped ">
                            <thead>
                                <tr style="background-color: #0bb7af6b !important;">
                                    <th style="color: rgb(0, 0, 0) !important;">#</th>
                                    <th style="color: rgb(0, 0, 0) !important;">Requisition No</th>
                                    <th style="color: rgb(0, 0, 0) !important;">Full Name</th>
                                    <th style="color: rgb(0, 0, 0) !important;">Organization Name</th>
                                    <th style="color: rgb(0, 0, 0) !important;">Designation</th>
                                    <th style="color: rgb(0, 0, 0) !important;">Phone</th>
                                    <th style="color: rgb(0, 0, 0) !important;">Address</th>
                                    <th style="color: rgb(0, 0, 0) !important;">Date</th>
                                    <th style="color: rgb(0, 0, 0) !important;">Quantity</th>
                                </tr>
                        
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                    $totalPcs = 0;
                                @endphp
                                @foreach ($requisitions as $requisition)
                                    @php
                                        $totalQty = 0;
                                    @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$requisition->requisition_number}}</td>
                                        <td>{{$requisition->name}}</td>
                                        <td>{{$requisition->organization_name}}</td>
                                        <td>{{$requisition->designation}}</td>
                                        <td>{{$requisition->phone}}</td>
                                        <td>{{$requisition->address}}</td>
                                        <td>{{date('d-m-Y', strtotime($requisition->created_at))}}</td>
                                        @php
                                            foreach($requisition->requisitionItems as $item)
                                            {
                                                $totalQty += $item->quantity;
                                            }
                                        @endphp

                                        <td>{{$totalQty}}</td>
                                        
                                    </tr>
                                    @php
                                        $i++;
                                        $totalPcs += $totalQty;
                                    @endphp
                                @endforeach
                                <tr>
                                    <td colspan="8" align="right">Total Publications Delivered</td>
                                    <td>{{$totalPcs}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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