@extends('backend.layout.master')

@push('css')
    <style>
        .table thead th {
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Sales Invoice</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">Dashboard</a>
                            </li>
                            @can('manage_storage')
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.pos.invoice', $order) }}" class="text-muted">Sales
                                        Invoice</a>
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
        <div class="d-flex flex-column-fluid" id="printArea" style="font-size: 1.25rem !important; ">
            <!--begin::Container-->
            <div class="container-fluid">
                @include('alerts.alerts')
                <!-- begin::Card-->
                <div class="card card-custom overflow-hidden">
                    <div class="card-body p-0">
                        <!-- begin: Invoice-->
                        <!-- begin: Invoice header-->
                        <div class="row justify-content-center py-8 px-8 py-md-12 px-md-0">
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between flex-column flex-md-row">
                                    <img class="display-4 font-weight-boldest mb-10 mr-10" height="100%" width="15%"
                                        src="{{ asset('assets/media/logos/logo2.png') }}" alt="BBS logo">
                                    <div class="d-flex flex-column align-items-md-end px-0">
                                        <div class="mt-5">

                                            <span class="d-flex flex-column align-items-md-end opacity-70">
                                                <span>People's Republic of Bangladesh</span>
                                                <span>Bangladesh Bureau of Statistics</span>
                                                <span>FA & MIS Wing</span>
                                                <span>Parishankhyan Bhaban
                                                </span>
                                                <span>E -27IA, Agargaon ,Dhaka-1207</span>
                                                <span>Website: https://www.bbs.gov.bd</span>
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
                                    {{ $order->customer? ucfirst($order->customer->first_name) . ' ' . $order->customer->middle_name . ' ' . $order->customer->last_name: 'Walk in Customer' }}
                                </address>
                                <address>
                                    <b>Phone:</b> {{ $order->customer ? $order->customer->mobile : '' }}
                                </address>
                                <address><b>Address:</b>
                                    {{ $order->customer ? ucfirst($order->customer->present_address) : '' }}</address>
                            </div>
                        </div>
                        <!-- begin: Invoice body-->
                        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0" style="font-size: 1.25rem;">

                            <div class="col-md-9">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr class="table-header-size">
                                                {{-- <th class="text-center font-weight-bold text-muted text-uppercase">Service</th> --}}
                                                {{-- <th class="text-center font-weight-bold text-muted text-uppercase">Category</th> --}}
                                                <th class="text-center font-weight-bold text-muted text-uppercase">SL</th>
                                                <th class="text-center font-weight-bold text-muted text-uppercase">Title
                                                </th>
                                                <th class="text-center font-weight-bold text-muted text-uppercase">Quantity
                                                    (pcs)
                                                </th>
                                                <th class="text-center pr-0 font-weight-bold text-muted text-uppercase">Unit
                                                    Price</th>
                                                <th class="text-center pr-0 font-weight-bold text-muted text-uppercase">
                                                    Total
                                                    Price</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_price = 0;
                                            @endphp
                                            @foreach ($order->orderItems as $item)

                                                <tr class="font-weight-boldest">
                                                    <td class="text-center pt-7">{{ $loop->index + 1 }}</td>
                                                    <td class="text-center pt-7">
                                                        {{ $item->serviceInventory ? $item->serviceInventory->title : '' }}
                                                    </td>
                                                    <td class="text-black pr-0 pt-7 text-center">{{ $item->quantity }}
                                                    </td>
                                                    <td class="text-black pr-0 pt-7 text-center">{{ $item->price }} </td>
                                                    <td class="text-black pr-0 pt-7 text-center">
                                                        {{ $item->price * $item->quantity }} BDT</td>
                                                </tr>
                                                @php
                                                    $total_price += $item->price * $item->quantity;
                                                @endphp
                                            @endforeach
                                            <tr class="font-weight-boldest">

                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-primary pr-0 pt-7 text-center" style="font-size: 1.5rem;">
                                                    Total</td>
                                                <td class="text-black pr-0 pt-7 text-center" style="font-size: 1.5rem;"><b>
                                                        {{ $order->total_price }} BDT</b></td>


                                            </tr>
                                            @if ($order->payment_status == 'unpaid' or $order->payment_status == 'paid')

                                                <tr class="font-weight-boldest">

                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-primary pr-0 pt-7 text-center"
                                                        style="font-size: 1.5rem;">Discount 
                                                        @if ($order->payment_status == 'unpaid')
                                                            
                                                            <button type="button"
                                                                class="btn btn-info btn-sm" data-toggle="modal" id="noprintbtn "
                                                                data-target="#discountModal"><i
                                                                    class="la la-edit"></i></button></td>
                                                        @endif
                                                    <td class="text-black pr-0 pt-7 text-center" style="font-size: 1.5rem;">
                                                        <b> {{ $order->discount_amount }} {{ $order->discount_type == 'percentage' ? '%' : 'BDT' }}</b></td>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="discountModal" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-bottom"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-info">

                                                                    <h5 class="modal-title text-white"
                                                                        id="exampleModalLongTitle">Discount</h5>

                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>

                                                                <form action="{{ route('admin.pos.discount',$order) }}" method="post">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="form-group row">

                                                                            <label
                                                                                class="col-form-label col-lg-6 col-sm-12">Discount Type</label>

                                                                            <div class="col-lg-6 col-sm-12">
                                                                                <select name="discount_type" id="discount_type" class="form-control">
                                                                                    <option >Select Discount Type</option>
                                                                                    <option value="percentage">Percentage (%)</option>
                                                                                    <option value="plane">Without Percentage</option>

                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">

                                                                            <label class="col-form-label col-lg-6 col-sm-12">Discount Amount :<span class="text-danger">*</span></label>

                                                                            <div class="col-lg-6 col-sm-12">
                                                                                <input type="number" step=".01" class="form-control discount" placeholder="Enter Discount" name="discount" value="0. 00" required />
                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden" value="{{ $order->total_price }}" id="total_price">
                                                                        <div class="form-group row">

                                                                            <label
                                                                                class="col-form-label col-lg-6 col-sm-12">Final
                                                                                Amount:</label>

                                                                            <div class="col-lg-6 col-sm-12">
                                                                                <input type="text"  class="form-control final_total" value="{{ $order->total_price }}" disabled />

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>

                                                                        <input type="hidden" class="final_total"
                                                                            name="final_total" value="">

                                                                        <button type="submit"
                                                                            class="btn btn-primary">Submit</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>
                                                <tr class="font-weight-boldest">

                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-primary pr-0 pt-7 text-center"
                                                        style="font-size: 1.5rem;">Sub Total </td>
                                                    <td class="text-black pr-0 pt-7 text-center" style="font-size: 1.5rem;">
                                                        <b> 
                                                            @if($order->discount_type) 
                                                                {{ $order->final_amount }}
        
                                                            
                                                            @else 
                                                                
                                                                {{ $order->total_price }}
                                                            @endif
                                                            
                                                             BDT</b></td>

                                                    
                                                </tr>
                                            @endif


                                            <tr class="font-weight-boldest bg-secondary">
                                                <td></td>
                                                <td></td>
                                                <td class="text-primary pt-5 text-center">In Word : </td>


                                                @php
                                                    $f = new NumberFormatter('en', NumberFormatter::SPELLOUT);
                                                    if($order->discount_type) {
                                                        $word = $f->format($order->final_amount);

                                                    }
                                                    else {
                                                        
                                                        $word = $f->format($order->total_price);
                                                    }
                                                @endphp
                                                <td class="text-black pt-5 text-center">{{ ucfirst($word) }} taka only
                                                </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice body-->
                        <!-- begin: Invoice footer-->
                        <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-6">

                                        {!! QrCode::size(200)->generate('Invoice ID : 52.01.0000.215.01.000.12-00' . $order->id) !!}
                                    </div>
                                    <div class="col-md-2">

                                        @if ($order->payment_status == 'paid')

                                            <img src="{{ asset('image/seal/paid.png') }}" alt="" style="height: 150px;">
                                        @endif
                                    </div>
                                </div>

                            </div>


                            <div class="col-md-3">
                                <div class="text-center">
                                    <span>
                                        @if ($order->soldBy)
                                            <img src="{{ asset('storage/signatures/' . $order->soldBy->signature) }}" height="50"
                                                width="100" alt="signature">
                                        @else
                                            Signature
                                        @endif
                                    </span>
                                    <br>
                                    <span>({{ $order->soldBy ? ucfirst($order->soldBy->first_name) . ' '. ucfirst($order->soldBy->last_name)  : '' }})</span>
                                    <br>
                                    <span>
                                        @if ($soldBy = $order->soldBy)
                                            
                                        {{ $soldBy->designation ? ucfirst($soldBy->designation->name_en) : 'Designation' }}
                                        @endif
                                    </span>
                                    <br>
                                    <span>Email: {{ $order->soldBy ? $order->soldBy->email : '' }}</span>
                                    <br>
                                    <span>Phone: {{ $order->soldBy ? $order->soldBy->mobile : '' }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice footer-->
                        <!-- begin: Invoice action-->
                        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between">

                                    @if ($order->payment_status == 'paid')
                                        <button type="button" id="noprintbtn" class="btn btn-primary font-weight-bold"
                                            onclick="return printDiv('printArea');">Print Invoice</button>
                                    @elseif ($order->payment_status == 'unpaid')
                                        <a href="{{ route('admin.pos.paidPrice', ['order' => $order, 'type' => 'paid']) }}"
                                            class="btn btn-primary font-weight-bold">Pay now</a>
                                        <a href="{{ route('admin.pos.paidPrice', ['order' => $order, 'type' => 'cancel']) }}"
                                            class="btn btn-danger font-weight-bold">Order Cancel</a>

                                    @endif

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
    <script>
        // final_total

        // discount

        // discount_type
        $(document).ready(function() {
            
            $("#discount_type").change(function() {
                var type = this.value;

                                
                if(type == 'percentage')
                {
                    $(".discount").on('keyup',function() {
                        var discount = this.value;
                        var final_price = $('#total_price').val();
                        let cal_amount = Number(final_price) - ((Number(final_price) * Number(discount) ) / 100);
                        if(Number(discount) < 100)
                        {
                            $('.final_total').val(cal_amount);
                        }
                        else
                        {
                            alert('Invalid Input');

                        }
                    });
                }
                else if(type == 'plane')
                {
                    $(".discount").on('keyup',function() {
                        var discount = this.value;
                        var final_price = $('#total_price').val();
                        if(Number(final_price) >  Number(discount))
                        {
                            let cal_amount = Number(final_price) - Number(discount);

                            $('.final_total').val(cal_amount);
                        }
                        else
                        {
                            alert('Invalid Input');
                        }
                    });
                }
                

            });
        });
    </script>
@endpush
