@extends('backend.layout.master')
<style>
    @media print {
        #buttons, #kt_subheader {
            display: none;
        }
        /* .page {
            -webkit-transform: rotate(-90deg); 
            -moz-transform:rotate(-90deg);
            filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
            margin-top: 180px;
        } */

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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Report</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">Dashboard</a>
                            </li>
                            @can('report')
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.report.SoldCopies') }}" class="text-muted">Sold Copies Report</a>
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
                            <span> <span style="font-weight: bold">Report Name:</span> Physical Data Sell </span>
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
                                        <th>Title</th>
                                        <th>Unite Price (TK)</th>
                                        <th>Total Stock</th>
                                        <th>Total Sold</th>
                                        <th>Remaining Stock</th>
                                        <th>Gross Amount (TK)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                    @foreach ($items as $item)
                                    @php
                                        $remainingStock = 0;
                                        $grossAmount = 0;
                                        $totalSold = 0;
                                        $totalStock = $item->number_of_sale_copies;
                                    @endphp
                                    @php
                                        foreach ($item->ServiceOrderItems as $value)
                                        {
                                            $totalSold += $value->quantity;
                                        }
                                        
                                        $totalStock = $item->number_of_sale_copies + $totalSold;
                                        $remainingStock = $totalStock - $totalSold;
                                        $grossAmount = $item->price * $totalSold;

                                    @endphp
                                    
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$item->title}}</td>
                                            <td>{{$item->price}} TK</td>
                                            <td>{{$totalStock}}</td>
                                            <td>{{$totalSold}}</td>
                                            <td>{{$remainingStock}}</td>
                                            <td>{{$grossAmount}} TK</td>
                                        </tr>
                                    @php
                                        $i++;
                                    @endphp
                            
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$items->links()}}
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