@extends('backend.layout.master')
<style>
    @media print {
        #buttons, #kt_subheader {
            display: none !important;
        }
    }
</style>
@section('content')
{{-- All Download blade --}}
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
                                    <a href="{{ route('admin.report.digitalData') }}" class="text-muted">Data Sales</a>
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
								<h3 class="card-title">Data Sales Report</h3>
                                {{-- <div class="d-flex align-items-center">                                    
                                    <input type="text" data-url="{{ route('admin.searchAjax',['type'=> 'dataSales']) }}" class="form-control form-control-lg form-control-solid ajax-data-search" name="q" placeholder="Service/Item Name">
                                </div> --}}
							</div>

                            <div class="form-group card-body mb-0 pb-0">
                    
                                <form class="form-inline" action="{{route('admin.report.allDownloadFilter')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="pr-2" for="fromDate">From</label>
                                        <input class="form-control" type="date" name="fromDate" id="fromDate" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="pr-2 pl-2" for="toDate">To</label>
                                        <input class="form-control" type="date" name="toDate" id="toDate" required>
                                    </div>
                                    <button type="submit" class="btn btn-success ml-2">Submit</button>
                                </form>
                            </div>

                            <div class="card-body">
								<div class="table-responsive ajax-data-container pt-3">
									@include('backend.admin.report.ajax.tableBody')
								</div>
                                {{$items->links()}}
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
                            <table class="table table-separate table-head-custom table-checkable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Application ID</th>
                                        <th>Service Name</th>
                                        <th>Service Item Name</th>
                                        <th>IP Address</th>
                                        <th>Total Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{ $item->itemDownloadDetail ? $item->itemDownloadDetail->user->username : '' }}</td>
                                            <td>{{ $item->application ?  $item->application->application_id : '' }}</td>
                                            <td>{{ $item->service ? $item->service->name_en : '' }}</td>
                                            <td>{{ $item->serviceItem ? $item->serviceItem->item_name_en : '' }}</td>
                                            <td>{{ $item->itemDownloadDetail ? $item->itemDownloadDetail->ip_address : '' }}</td>
                                            <td>{{ $item->total_download }}</td>
                                        </tr>
                                    @php
                                        $i++;
                                    @endphp
                            
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- {{$items->links()}} --}}
                    </div>
                </div>
                <!-- end: Invoice footer-->
                <!-- begin: Invoice action-->
                <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0" id="buttons">
                    <div class="col-md-9">
                        <div class="d-flex justify-content-between float-right">
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