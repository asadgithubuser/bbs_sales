@extends('backend.layout.master')

@push('css')
    <style>
        .table thead th{
            font-size: 15px !important;
        }
    </style>
@endpush
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Application Invoice</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">Dashboard</a>
                            </li>
                            
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <div class="d-flex flex-column-fluid" id="printArea" style="font-size: 1.25rem !important; ">
            <!--begin::Container-->
            <div class="container-fluid">
                <!-- begin::Card-->
                <div class="card card-custom overflow-hidden">
                    <div class="card-body p-0">
                        <!-- begin: Invoice-->
                        <!-- begin: Invoice header-->
                        <div class="row justify-content-center py-8 px-8 py-md-12 px-md-0">
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between flex-column flex-md-row">
                                    <img class="display-4 font-weight-boldest mb-10 mr-10" height="100%" width="15%"
                                        src="{{ asset('assets/media/logos/logo2.png') }}" alt="">
                                    <div class="d-flex flex-column align-items-md-end px-0">
                                        <div class="mt-5">

                                            <span class="d-flex flex-column align-items-md-end opacity-70">
                                                <span>People's Republic of Bangladesh</span>
                                                <span>Bangladesh Bureau of Statistics</span>
                                                <span>Computer wing</span>
                                                <span>Parishankhyan Bhaban
                                                </span>
                                                <span>E -27IA, Agargaon ,Dhaka-1207</span>
                                            </span>
                                        </div>

                                    </div>
                                </div>
                                <div class="border-bottom w-100"></div>
                                <div class="d-flex pt-6">

                                    <div class="col-md-6">
                                        <span><i style="color: black !important;"><b>No.
                                                    52.01.0000.215.01.000.12-00{{ $order->id }}</b></i></span>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-3">
                                        <span style="font-size: 1.25rem;"><b>Date: {{ date('d M Y') }}</b></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end: Invoice header-->
                        <div class="row justify-content-center" style="font-size: 1.25rem;">
                            <h3 style="font-size: 32px;"><u>Invoice</u></h3>
                        </div>
                        <div class="row justify-content-center mt-4 pl-0" style="font-size: 1.25rem;">
                            <div class="col-md-8 pl-0">
                                <address><b>Name Of Person:</b>
                                    {{ $order->user ? ucfirst($order->user->first_name) . ' ' . $order->user->middle_name . ' ' . $order->user->last_name : 'Walk in Customer' }}
                                </address>
                                @if ($data = $order->user)
                                    <address>
                                        @if ($data->mobile)
                                            
                                            <b>Phone</b>: {{ $order->user ? $order->user->mobile : '' }}
                                        @endif
                                    </address>
                                    

                                    <address> 
                                        @if ($data->present_address)
                                            
                                            <b>Address</b>: {{ $order->user ? ucfirst($order->user->present_address) : '' }}

                                        @endif
                                    </address>
                                    <address> 
                                            <b>Application ID</b>: {{ $order->application_id }}
                                    </address>
                                @endif

                                
                            </div>
                        </div>
                        <!-- begin: Invoice body-->
                        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0" style="font-size: 1.25rem;">

                            <div class="col-md-9">
                                <div class="table-responsive">
                                    <table class="table" >
                                        <thead>
                                            <tr class="table-header-size">
                                                <th class="text-center text-uppercase"><h5 class="font-weight-bold text-dark"> Service</h5></th>
                                                <th class="text-center text-uppercase"><h5 class="font-weight-bold text-dark"> Service Item</h5></th>
                                                <th class="text-center pr-0 text-uppercase"><h5 class="font-weight-bold text-dark"> Total Price</h5></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->allApplicationServices as $item)
                                                <tr class="font-weight-boldest">
                                                    <td class="pl-0 pt-7" style="color: #8950fc;">{{ $item->service ? $item->service->name_en : '' }}</td>
                                                    <td class="text-center pt-7" style="color: #3699ff;">{{ $item->serviceItem ? $item->serviceItem->item_name_en  : ''}}</td>

                                                    @if ($order->user->country_id == 19)
                                                        <td class="text-black pr-0 pt-7 text-center" style="color: #ff0000;"> {{ $item->service_item_price }} BDT</td>
                                                    @else
                                                        <td class="text-black pr-0 pt-7 text-center" style="color: #ff0000;"> {{ $item->service_item_price }} USD</td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                            <tr class="font-weight-boldest">
                                                <td></td>
                                                
                                                <td class="text-dark pr-0 pt-7 text-center" style="font-size: 1.5rem;">Sub-total</td>
                                                <td class="text-black pr-0 pt-7 text-center font-weight-boldest" style="font-size: 1.5rem; color: #ff0000;">
                                                    @if ($order->user->country_id == 19)
                                                        <b class="font-weight-boldest">{{ $order->total_price }} BDT</b>
                                                    @else
                                                        <b class="font-weight-boldest">{{ $order->total_price }} USD</b>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr class="font-weight-boldest">
                                                <td style="border: none;"></td>
                                                
                                                <td class="text-dark pr-0 pt-7 text-center" style="font-size: 1.5rem;border: none;">Discount</td>
                                                <td class="text-black pr-0 pt-7 text-center font-weight-boldest" style="border: none;font-size: 1.5rem; color: #cc00ff">
                                                    @if ($order->user->country_id == 19)
                                                        <b class="font-weight-boldest">{{ ($order->discount != '') ? number_format((float)$order->discount, 2, '.', '') : 0.00 }} BDT</b>
                                                    @else
                                                        <b class="font-weight-boldest">{{ ($order->discount != '') ? number_format((float)$order->discount, 2, '.', '') : 0.00 }} USD</b>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr class="font-weight-boldest">
                                                <td style="border: none;"></td>
                                                
                                                <td class="text-dark pr-0 pt-7 text-center" style="border: none;font-size: 1.5rem;">Total</td>
                                                <td class="text-success pr-0 pt-7 text-center font-weight-boldest" style="border: none;font-size: 1.5rem;">
                                                    @if ($order->user->country_id == 19)
                                                        <b class="font-weight-boldest">{{ $order->final_total }} BDT</b>
                                                    @else
                                                        <b class="font-weight-boldest">{{ $order->final_total }} USD</b>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice body-->
                        
                        <!-- begin: Invoice action-->
                        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between">
                                    <button type="button" id="noprintbtn" class="btn btn-primary font-weight-bold" onclick="return printDiv('printArea');">Print Invoice</button>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice action-->
                        <!-- end: Invoice-->
                    </div>
                </div>
                <!-- end::Card-->
            </div>
            <!--end::Container-->
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
