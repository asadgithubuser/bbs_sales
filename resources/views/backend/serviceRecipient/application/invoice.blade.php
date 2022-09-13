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
                                <div class="d-flex flex-column flex-md-row">
                                    <img class="display-4 font-weight-boldest mb-10 mr-10" height="100%" width="15%"
                                        src="{{ asset('assets/media/logos/logo2.png') }}" alt="">
                                    <div class="px-0" style="margin: 0 auto;">
                                        <div class="mt-5">

                                            <span class="d-flex flex-column opacity-70 text-center">
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
                                <address><b>Name Of Person</b>
                                    <span>: {{ $order->user ? ucfirst($order->user->first_name) . ' ' . $order->user->middle_name . ' ' . $order->user->last_name : 'Walk in Customer' }}</span>
                                </address>
                                <address><b>Designation</b>
                                    <span>: {{ $order->user->designation ? ucfirst($order->user->designation->name_en) : '' }}</span>
                                </address>
                                <address>
                                    <b>Organization</b>
                                    <span>: {{ $order ? ucfirst($order->organization_name) : '' }}</span>
                                </address>
                                @if ($data = $order->user)
                                    <address>
                                        @if ($data->mobile)
                                            <b>Phone</b><span>: {{ $order->user ? $order->user->mobile : '' }}</span>
                                        @endif
                                    </address>
                                    <address> 
                                        @if ($data->present_address)
                                            <b>Address</b><span>: {{ $order->user ? ucfirst($order->user->present_address) : '' }}</span>
                                        @endif
                                    </address>
                                @endif

                                <address><b>Requirement</b>
                                    <span>: @if(!empty($applicationServices))
                                                @foreach($applicationServices as $item)
                                                    {{ $item->serviceItem->item_name_en }},
                                                @endforeach
                                            @endif
                                    </span>
                                </address>
                                <address>
                                    <b>Data Offered</b>
                                    <span>: @if(!empty($applicationServices))
                                                @foreach($applicationServices as $item)
                                                    {{ $item->serviceItem->item_name_en }},
                                                @endforeach
                                            @endif
                                    </span>
                                </address>
                                <address>  
                                        <b>Unit Price</b>
                                        <span>: @if(!empty($applicationServices))
                                                    @foreach($applicationServices as $item)
                                                        TK  @if ($order->user->country_id == 19)
                                                             {{ $item->service_item_price * $dollarValueForTaka }}
                                                            @else
                                                             {{ $item->service_item_price }}
                                                            @endif
                                                         ({{ $item->serviceItem->item_name_en }}),
                                                    @endforeach
                                                @endif
                                        </span>
                                </address>

                                <address>  
                                        <b>Total Price</b>
                                        <span>: @if(!empty($applicationServices))
                                                    <?php $totalPrice = 0; $priceItem = array(); $total = 0; $price1 = 0; ?>
                                                    @foreach($applicationServices as $item)
                                                        <?php
                                                            if ($order->user->country_id == 19){
                                                                $total += $item->service_item_price;
                                                                $price = $item->service_item_price;

                                                                $totalPrice = $total * $dollarValueForTaka; 
                                                                $price1 = $price * $dollarValueForTaka; 
                                                            }else{
                                                                $totalPrice += $item->service_item_price;
                                                                $price1 = $item->service_item_price;
                                                            }
                                                         ?>  
                                                    <?php array_push($priceItem, $price1); ?>

                                                    @endforeach
                                                    <span class="d-flex mr-2">TK</span><span class="mr-3 d-flex" id="totalLoanAmount">{{$totalPrice}}</span> ( <span class="appSinglePrice d-flex">
                                                        @foreach($applicationServices as $i => $item)
                                                            <span class="mr-2 ml-2 d-flex"> + </span> {{ $priceItem[$i] }}
                                                        @endforeach
                                                        </span>
                                                    ) 
                                                @endif
                                        </span>
                                </address>
                                <address>  
                                        <b>Vendor</b>
                                        <span>:  
                                            Director General, Bangladesh Bureau of Statictics
                                        </span>
                                </address>
                                @if($type == 'chalan')
                                    <address>  
                                        <b>Transaction ID</b>
                                        <span>: 
                                            @if($order->payment)
                                                @if($order->payment->pay_type == 'epay_online')
                                                    {{ $order->payment->transaction_id }}
                                                @elseif($order->payment->pay_type == "off_bank")
                                                    {{ $order->payment->account_number }}, {{ $order->payment->bank_name }}
                                                @elseif($order->payment->pay_type == "off_mobile_bank")
                                                    {{ $order->payment->transaction_id }}, {{ $order->payment->bank_name }}
                                                @endif
                                            @endif
                                        </span>
                                    </address>
                                    <address>  
                                        <b>Mode Of Payment</b>
                                        <span>:  
                                            @if($order->payment)
                                                @if($order->payment->pay_type == 'epay_online')
                                                    ekPay, Online Payment System
                                                @elseif($order->payment->pay_type == "off_bank")
                                                     {{ $order->payment->bank_name }}
                                                @elseif($order->payment->pay_type == "off_mobile_bank")
                                                     {{ $order->payment->bank_name }}, Mobile Banking
                                                @endif
                                           

                                            @endif
                                        </span>
                                    </address>
                                @endif

                                
                            </div>
                        </div>
                        <!-- begin: Invoice body-->
                        <div class="row justify-content-end mt-12 px-8 px-md-0" style="font-size: 1.25rem;">

                            <div class="col-md-4">
                                <div class="text-left systemAdminInfo">
                                     <address class="mb-0"><img src="{{ url('/', 'signatures/'.$systemAdminInfo->signature) }}"></address>
                                     <address class="mb-0">({{ $systemAdminInfo->first_name }} {{ $systemAdminInfo->middle_name }} {{ $systemAdminInfo->last_name }})</address>
                                     <address class="mb-0">{{ $systemAdminInfo->role->name_en }}</address>
                                     <address class="mb-0">e-mail: {{ $systemAdminInfo->email }}</address>
                                     <address class="mb-0">phone: {{ $systemAdminInfo->mobile }}</address>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice body-->

                         <!-- begin: Invoice body-->
                        <div class="row px-8 px-md-0" style="font-size: 1.25rem;">
                            <div class="offset-md-2 col-md-4">
                                <div class="text-left systemAdminInfo">
                                    @if(Auth::check())
                                    <?php $applicant = Auth::user(); ?>
                                     <address class="mb-0">{{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->last_name }}</address>
                                     <address class="mb-0">e-mail: {{ $applicant->email }}</address>
                                     <address class="mb-0">Phone: {{ $applicant->mobile }}</address>
                                     <address class="mb-0">{{ $applicant->present_address }}</address>
                                     @endif
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

 <script src="{{ asset('assets/js/integer2Word.js') }}"> </script>
    <script type="text/javascript">
        

            var amount = $("#totalLoanAmount").html();

            var enAmount = NumToBangla.replaceBn2EnNumbers(amount);
            var num = parseInt(enAmount);
            if(num.toString().length < 16) {
                $("#totalLoanAmountText").html(NumToBangla.convert(num));
            } else{
            toastr.error('টাকার পরিমাণ অনেক দীর্ঘ', "Error");
            }
       

    </script>


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
