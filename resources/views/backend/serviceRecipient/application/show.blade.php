@extends('backend.layout.master')
<style>
    @media print {

        #buttons,
        #kt_subheader {
            display: none;
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Submitted Application Details</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.application.index') }}" class="text-muted">Manage
                                    Applications</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a class="text-muted">Submitted Applications Details</a>
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
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--session msg-->
                @include('alerts.alerts')

                <!--begin::row-->
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <div class="card card-custom">

                            <div class="card-header card-header-tabs-line" id="kt_subheader">
                                <div class="card-title">
                                    <h3 class="card-label font-weight-bolder text-dark">Submitted Application</h3>
                                </div>
                                <div class="card-toolbar">
                                    <ul class="nav nav-tabs nav-bold nav-tabs-line">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#details">Application
                                                Details</a>
                                        </li>
                                        @can('application_process_history')
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#history">Process History</a>
                                            </li>
                                        @endcan
                                    </ul>
                                </div>
                            </div>


        <div class="card card-custom">
            <div class="tab-content">

                <div class="card-body p-0 tab-pane fade show active" id="details" role="tabpanel">
                    <!--begin::Invoice-->
                    <!--begin::Invoice header-->
                    <div class="container">
                        <div class="card card-custom card-shadowless">
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-2 px-md-0">
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-between">

                                            <img class="display-4 font-weight-boldest mb-6 mr-10"
                                                height="100%" width="12%"
                                                src="{{ asset('assets/media/logos/logo2.png') }}"
                                                alt="">

                                            <span class="pt-10" style="font-size: 15px;">
                                                গণপ্রজাতন্ত্রী বাংলাদেশ সরকার,
                                                <br>
                                                বাংলাদেশ পরিসংখ্যান ব্যুরো
                                                <br>
                                                মিরপুর, ঢাকা - ১২১৬
                                                <br>
                                                বাংলাদেশ ।
                                            </span>
                                        </div>
                                        <div class="border-bottom w-100"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container mb-5">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex flex-column flex-md-row">
                                            <div class="d-flex flex-column">
                                                <div
                                                    class="d-flex justify-content-between font-size-lg ">
                                                    <span
                                                        class="font-weight-bold mr-15 w3-large">Application
                                                        ID:</span>

                                                    <span class="text-right text-primary w3-large">
                                                        #{{ $application->application_id }}
                                                    </span>
                                                </div>

                                                <div
                                                    class="d-flex justify-content-between font-size-lg ">
                                                    <span
                                                        class="font-weight-bold mr-15 w3-large">Date:</span>

                                                    <span class="text-right w3-large">

                                                        {{ date('d-M-Y', strtotime($application->created_at)) }}
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="position-relative">
                        <div class="container top-0 left-0 right-0">
                            <div class="d-flex justify-content-between ">
                                <div>
                                    <p style="font-size: 18px;">
                                        To, <br>
                                        Director General,<br>
                                        Bangladesh Bureau of Statistics (BBS), <br>
                                        Parishankhyan Bhaban, <br>
                                        E-27/A, Agargaon, Dhaka-1207, <br>
                                        Bangladesh.
                                    </p>
                                    <p style="font-size: 17px;"><b>Subject :</b> {!! $application->application_sub !!}
                                    </p>
                                    <p style="font-size: 17px; white-space:pre-line;">
                                        {!! $application->applicant_text !!}</p>
                                </div>
                            </div>
                            <div class="row">
                                @foreach ($applicationProcess as $ap)
                                    @if ($ap->sender_role_id == 10)
                                        <div class="col-6">
                                            <p
                                                style="font-size: 16px; border-bottom: 1px solid gray; padding-bottom: 10px;">
                                                <span style="white-space:pre-line;">
                                                    {{ $ap->comment }}</span>
                                                <br>

                                                @if ($ap->user)
                                                    {{ $ap->user->first_name . ' ' . $ap->user->last_name }}
                                                @endif
                                                <br>
                                                @if ($ap->user->designation)
                                                    {{ $ap->user->designation->name_en }}
                                                @else
                                                @endif

                                                @if ($applicat = $ap->user)
                                                    <b>Address:</b>
                                                    {{ $applicat->union ? $applicat->union->name_en : '' }}
                                                    <br>
                                                    {{ $applicat->division ? $applicat->division->name_en : '' }}
                                                    <br>
                                                    {{ $applicat->district ? $applicat->district->name_en : '' }}
                                                    <br>
                                                    {{ $applicat->upazila ? $applicat->upazila->name_en : '' }}
                                                    <br>
                                                @endif


                                            </p>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <br> <br>
                    <!--end::Invoice header-->
                    <!--begin::Invoice Body-->
                    <div class="position-relative">

                        <!--begin:Table-->
                        <div class="container top-0 left-0 right-0">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card-header p-0">
                                        <h3 class="card-title mb-3 font-weight-bold"
                                            style="font-size: 30px;">Order Details</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr class="font-weight-boldest h-65px">
                                                    <td class="align-middle font-size-h4 pl-0 border-0">
                                                    SL
                                                    </td>
                                                    
                                                    <td class="align-middle font-size-h4 pl-0 border-0">
                                                        Title</td>
                                                        <td class="align-middle font-size-h4 pl-0 border-0">
                                                            Quantity(pcs)</td>

                                                        <td
                                                        class="align-middle font-size-h4 text-right pr-0 border-0">
                                                        Unit Price</td>
                                                    <td
                                                        class="align-middle font-size-h4 text-right pr-0 border-0">
                                                        Price</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($applicationServices as $item)
                                                    <tr>
                                                        <td class="align-middle pl-0 border-0 font-size-h6 text-info font-weight-boldest">
                                                            {{$loop->index + 1}}
                                                        </td>
                                                        

                                                        <td class="align-middle pl-0 border-0 font-size-h6 text-primary font-weight-bolder">

                                                            {{ $item->serviceItem ? $item->serviceItem->item_name_en : '' }}
                                                            <br>
                                                            @if ($service = $item->serviceItem->service_additional_id)
                                                                @php
                                                                    $additionals = explode(',', $service);
                                                                    
                                                                    $serviceItemAdditionals = App\Models\ServiceItemAdditional::whereIn('id', $additionals)->get();
                                                                @endphp

                                                                @foreach ($serviceItemAdditionals as $addItem)
                                                                    <span
                                                                        class="pb-2 text-secondary font-weight-light">{{ ucfirst($addItem->item_name_en) }}
                                                                        (Additional Item)</span>
                                                                    <br>
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                        
                                                        <td class="align-middle pl-0 border-0 font-size-h6 text-info font-weight-boldest">
                                                            1
                                                        </td>
                                                        <td class="align-middle text-right text-primary font-weight-bolder font-size-h6 pr-0 border-0">
                                                            @if ($application->user->country_id == 19) 
                                                                    <?php $itemPrice = number_format((float) $item->service_item_price, 2, '.', '') ?>

                                                                    {{ $itemPrice * $dollarConvertToTaka }} BDT 
                                                            @else
                                                                {{ number_format((float) $item->service_item_price, 2, '.', '') }}
                                                                USD
                                                            @endif

                                                            <br>

                                                            @if ($service = $item->serviceItem->service_additional_id)
                                                                @php
                                                                    $additionals = explode(',', $service);
                                                                    
                                                                    $serviceItemAdditionals = App\Models\ServiceItemAdditional::whereIn('id', $additionals)->get();
                                                                @endphp

                                                                @foreach ($serviceItemAdditionals as $addItem)
                                                                    <span
                                                                        class="pb-2 text-secondary font-weight-light">{{ $addItem->price != 0 ? $addItem->price . ' TK' : 'Free' }}
                                                                    </span>
                                                                    <br>
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                        <td
                                                            class="align-middle text-right text-primary font-weight-bolder font-size-h6 pr-0 border-0">
                                                            @if ($application->user->country_id == 19) 
                                                                    <?php $itemFee =  number_format((float) $item->service_item_price, 2, '.', ''); ?>
                                                                    {{ $itemFee * $dollarConvertToTaka }}
                                                                    BDT
                                                                
                                                            @else
                                                                {{ number_format((float) $item->service_item_price, 2, '.', '') }}
                                                                USD
                                                            @endif

                                                            <br>

                                                            @if ($service = $item->serviceItem->service_additional_id)
                                                                @php
                                                                    $additionals = explode(',', $service);
                                                                    
                                                                    $serviceItemAdditionals = App\Models\ServiceItemAdditional::whereIn('id', $additionals)->get();
                                                                @endphp

                                                                @foreach ($serviceItemAdditionals as $addItem)
                                                                    <span
                                                                        class="pb-2 text-secondary font-weight-light">{{ $addItem->price != 0 ? $addItem->price . ' TK' : 'Free' }}
                                                                    </span>
                                                                    <br>
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end:Table-->
                        <!--begin::Total-->
                        <div class="container">
                            <div class="row justify-content-center pb-10">
                                <div class="col-md-12" style="border-top: 1px solid #000;">
                                    <div
                                        class="rounded d-flex align-items-center justify-content-between max-w-425px position-relative ml-auto py-5 bgi-no-repeat bgi-size-cover bgi-position-center">
                                        <div class="font-weight-boldest font-size-h5">SUBTOTAL AMOUNT 
                                        </div>
                                        <div class="text-right d-flex flex-column">

                                            <span
                                                class="font-weight-boldest font-size-h3 line-height-sm text-primary">
                                                @if ($application->user->country_id == 19)
                                                    <?php $tPrice = number_format((float) $application->total_price, 2, '.', '') ?>
                                                    {{ $tPrice * $dollarConvertToTaka }} BDT
                                                @else
                                                    {{ number_format((float) $application->total_price, 2, '.', '') }} USD

                                                @endif
                                            </span>
                                        </div>
                                    </div>

                                    <div
                                        class="rounded d-flex align-items-center justify-content-between max-w-425px position-relative ml-auto pb-5 bgi-no-repeat bgi-size-cover bgi-position-center">
                                        <div class="font-weight-boldest font-size-h5">DISCOUNT</div>
                                        <div class="text-right d-flex flex-column">

                                            <span
                                                class="font-weight-boldest font-size-h3 line-height-sm text-danger">
                                                <?php $dtPrice = 0;  ?>
                                                @if ($application->user->country_id == 19)
                                                   <?php $dPrice = $application->discount != '' ? number_format((float) $application->discount, 2, '.', '') : 0.0 ; 
                                                    $dtPrice = $dPrice * $dollarConvertToTaka;
                                                   ?>
                                                    {{ $dtPrice }} BDT  

                                                @else
                                                    <?php $dtPrice= $application->discount != '' ? number_format((float) $application->discount, 2, '.', '') : 0.0 ; ?>
                                                    {{ $dtPrice }} BDT 

                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12" style="border-top: 1px solid #000;">

                                    <div
                                        class="rounded d-flex align-items-center justify-content-between max-w-425px position-relative ml-auto py-5 bgi-no-repeat bgi-size-cover bgi-position-center">
                                        <div class="font-weight-boldest font-size-h5">TOTAL AMOUNT</div>
                                        <div class="text-right d-flex flex-column">

                                            <span
                                                class="font-weight-boldest font-size-h3 line-height-sm text-success">
                                                @if ($application->user->country_id == 19)
                                                    <?php $final_totall = number_format((float) $application->final_total, 2, '.', '') ;

                                                    $tfinal_totall = $final_totall * $dollarConvertToTaka;
                                                    ?>
                                                    {{ $tfinal_totall - $dtPrice }} BDT 

                                                @else
                                                    <?php $tfinal_totall = number_format((float) $application->final_total, 2, '.', '') ; ?>


                                                        {{ $tfinal_totall - $dtPrice }} USD

                                                @endif
                                            </span>
                                        </div>
                                    </div>

                                    @can('application_discount')
                                        <div
                                            class="rounded d-flex align-items-center justify-content-between max-w-425px position-relative py-5 float-right">
                                            <div class="font-weight-boldest font-size-h5">
                                                <!-- Button trigger modal -->
                                                @if ($application->discount != '' || $application->discount != 0.0)
                                                    <button type="button" class="btn btn-primary text-right"
                                                        data-toggle="modal"
                                                        data-target="#exampleModalCenter">
                                                        Edit Discount
                                                    </button>
                                                @else
                                                    <button type="button" class="btn btn-primary text-right"
                                                        data-toggle="modal"
                                                        data-target="#exampleModalCenter">
                                                        Apply Discount
                                                    </button>
                                                @endif

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalCenter"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalCenterTitle"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-bottom"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-info">

                                                                @if ($application->discount != '' || $application->discount != 0.0)
                                                                    <h5 class="modal-title text-white"
                                                                        id="exampleModalLongTitle">Edit
                                                                        Discount</h5>
                                                                @else
                                                                    <h5 class="modal-title text-white"
                                                                        id="exampleModalLongTitle">Apply
                                                                        Discount</h5>
                                                                @endif

                                                                <button type="button"
                                                                    class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <form
                                                                action="{{ route('admin.application.discount', $application->id) }}"
                                                                method="post">
                                                                @csrf

                                                                <div class="modal-body">
                                                                    <div class="form-group row">

                                                                        @if ($application->user->country_id == 19)
                                                                            <label
                                                                                class="col-form-label col-lg-6 col-sm-12">Current
                                                                                Amount (USD):</label>
                                                                        @else
                                                                            <label
                                                                                class="col-form-label col-lg-6 col-sm-12">Current
                                                                                Amount (USD):</label>
                                                                        @endif

                                                                        <div class="col-lg-6 col-sm-12">
                                                                            <input type="text"
                                                                                class="form-control current_amount"
                                                                                value="{{ number_format((float) $application->total_price, 2, '.', '') }}"
                                                                                disabled />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">

                                                                        @if ($application->user->country_id == 19)
                                                                            <label
                                                                                class="col-form-label col-lg-6 col-sm-12">Discount
                                                                                Amount (USD):<span
                                                                                    class="text-danger">*</span></label>
                                                                        @else
                                                                            <label
                                                                                class="col-form-label col-lg-6 col-sm-12">Discount
                                                                                Amount (USD):<span
                                                                                    class="text-danger">*</span></label>
                                                                        @endif

                                                                        <div class="col-lg-6 col-sm-12">
                                                                            <input type="number" step=".01"
                                                                                class="form-control discount"
                                                                                placeholder="Enter Discount Amount"
                                                                                name="discount"
                                                                                value="{{ $application->discount != '' ? number_format((float) $application->discount, 2, '.', '') : 0.0 }}"
                                                                                required />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">

                                                                        @if ($application->user->country_id == 19)
                                                                            <label
                                                                                class="col-form-label col-lg-6 col-sm-12">Final
                                                                                Amount (BDT):</label>
                                                                        @else
                                                                            <label
                                                                                class="col-form-label col-lg-6 col-sm-12">Final
                                                                                Amount (USD):</label>
                                                                        @endif

                                                                        <div class="col-lg-6 col-sm-12">
                                                                            <input type="text"
                                                                                class="form-control final_total"
                                                                                value="{{ $application->final_total != ''? number_format((float) $application->final_total, 2, '.', ''): number_format((float) $application->total_price, 2, '.', '') }}"
                                                                                disabled />

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>

                                                                    <input type="hidden"
                                                                        class="final_total"
                                                                        name="final_total" value="">

                                                                    <button type="submit"
                                                                        class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <!--end::Total-->
                        @if (Auth::user()->role_id != 10)
                            <div class="container top-0 left-0 right-0">
                                <div class="row">
                                    @foreach ($applicationProcess as $ap)
                                        @if ($loop->first)
                                        @else
                                            <div class="col-6">
                                                <p
                                                    style="font-size: 16px; border-bottom: 1px solid gray; padding-bottom: 10px; ">
                                                    <span style="white-space:pre-line;">
                                                        {{ $ap->comment }}</span>
                                                    <br>

                                                    @if ($ap->user)
                                                        {{ $ap->user->first_name . ' ' . $ap->user->last_name }}
                                                    @endif
                                                    <br>
                                                    @if ($ap->user->designation)
                                                        {{ $ap->user->designation->name_en }}
                                                    @else
                                                    @endif
                                                    <br>

                                                    @if ($ap->user->signature)
                                                        <img style="max-width: 150px"
                                                            alt="Signature Not Available"
                                                            src={{ asset('storage/signatures/') . '/' . $ap->sender_signature }} />
                                                    @endif
                                                    <br>
                                                    {{ date('d-M-Y h:i a', strtotime($ap->created_at)) }}

                                                </p>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-12 text-right">


                                    @if ($application->status == 4)



                                        @if ($application->payment)

                                            @if (Auth::user()->role_id == 10)
                                                @if ($application->payments->is_app == true)
                                                    
                                                @elseif($application->payments->is_app == false)
                                                    <button data-toggle="modal"
                                                        data-target="#payment{{ $application->id }}"
                                                        class="btn btn-sm mt-1 btn-info   "
                                                        title="pay">
                                                        Pay 
                                                    </button>
                                                @endif
                                            @endif
                                            
                                        @else
                                            @if (Auth::user()->role_id == 10)
                                                <button data-toggle="modal"
                                                    data-target="#payment{{ $application->id }}"
                                                    class="btn btn-sm mt-1 btn-info "
                                                    title="pay">
                                                    Pay 
                                                </button>
                                            @endif

                                        @endif

                                    @endif
                                    <div id="payment{{ $application->id }}" class="modal fade"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content" style="min-height: 350px;">
                                                <div class="modal-header py-5">
                                                    <h5 class="modal-title">Choose Payment System
                                                        <span
                                                            class="d-block text-muted font-size-sm"></span>
                                                    </h5>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <i aria-hidden="true"
                                                            class="ki ki-close"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <a href="{{ route('admin.application.ePay', $application) }}"
                                                                class="col-md-5 w3-button w3-white w3-border w3-border-blue w3-hover-blue"
                                                                style="box-shadow: 4px 6px 1px #c3c3c3;">

                                                                <i class="la-3x w3-text-black">
                                                                    <b>ePayment</b></i>

                                                            </a>
                                                            <div class="col-md-1"></div>

                                                            <a href="{{ route('admin.application.manualPay', $application) }}"
                                                                class="col-md-5 w3-button w3-white w3-border w3-border-blue w3-hover-blue"
                                                                style="box-shadow: 4px 6px 1px #c3c3c3;">
                                                                <i class="la-3x w3-text-black">
                                                                    <b>Manual</b></i>
                                                            </a>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- @if (Auth::user()->role_id != 10) --}}
                                        {{-- <a href="{{ route('admin.application.assessment',$application) }}" class="btn btn-secondary font-weight-bolder py-4 mr-3 mr-sm-14 my-1 px-7">Assessment</a> --}}
                                        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0"
                                            id="buttons">
                                            <div class="col-md-9">
                                                <div class="d-flex justify-content-between">
                                                    <button type="button"
                                                        class="btn btn-light-primary font-weight-bold"
                                                        onclick="window.print();">Download</button>
                                                    <button type="button"
                                                        class="btn btn-primary font-weight-bold"
                                                        onclick="window.print();">Print</button>
                                                </div>
                                            </div>
                                        </div>
                                    {{-- @endif --}}


                                    @if ($application->current_receiver_role_id >= 7 && $application->status != 4 && $application->status != 5)
                                        @if (Auth::user()->role_id == $application->current_receiver_role_id)
                                            @can('cancel_application')
                                                <button data-toggle="modal"
                                                    data-target="#cancel{{ $application->id }}"
                                                    class="btn btn-danger font-weight-bolder py-4 mr-3 mr-sm-14 my-1 px-7"
                                                    title="Reject">Reject</button>
                                            @endcan
                                        @endif


                                        @if (Auth::user()->role_id == $application->current_receiver_role_id)
                                            @can('forward_application')
                                                <button type="button"
                                                    class="btn btn-light-success font-weight-bolder py-4 mr-3 mr-sm-14 my-1 px-7"
                                                    data-toggle="modal" data-target="#forwardModal">
                                                    Up
                                                </button>
                                            @endcan
                                        @endif
                                        @can('approve_application')
                                            <button
                                                class="btn btn-success approve font-weight-bolder py-4 mr-3 mr-sm-14 my-1 px-7"
                                                title="Approve"
                                                data-id="{{ $application->id }}">Approve</button>
                                        @endcan
                                        @if (Auth::user()->role_id == $application->current_receiver_role_id)
                                            @can('return_application')
                                                <button type="button"
                                                    class="btn btn-light-danger font-weight-bolder py-4 mr-3 mr-sm-14 my-1 px-7"
                                                    data-toggle="modal" data-target="#returnModal">
                                                    Down
                                                </button>
                                            @endcan
                                        @endif
                                        
                                    @elseif($application->current_receiver_role_id <= 6 && $application->status != 4 && $application->status != 5)
                                        @if (Auth::user()->role_id == $application->current_receiver_role_id)
                                            @can('cancel_application')
                                                <button data-toggle="modal"
                                                    data-target="#cancel{{ $application->id }}"
                                                    class="btn btn-danger font-weight-bolder py-4 mr-3 mr-sm-14 my-1 px-7"
                                                    title="Reject">Reject</button>
                                            @endcan
                                        @endif

                                        @if (Auth::user()->role_id == $application->current_receiver_role_id)
                                            @can('return_application')
                                                <button type="button"
                                                    class="btn btn-light-danger font-weight-bolder py-4 mr-3 mr-sm-14 my-1 px-7"
                                                    data-toggle="modal" data-target="#returnModal">
                                                    Down
                                                </button>
                                            @endcan
                                        @endif

                                        @if (Auth::user()->role_id == $application->current_receiver_role_id)
                                            @can('forward_application')
                                                <button type="button"
                                                    class="btn btn-light-success font-weight-bolder py-4 mr-3 mr-sm-14 my-1 px-7"
                                                    data-toggle="modal" data-target="#forwardModal">
                                                    Up 
                                                </button>
                                            @endcan
                                        @endif
                                    @endif

                                    @if ($isApprovedPerson && $application->status != 4 && $application->status != 5)
                                        @can('approve_application')
                                            <button
                                                class="btn btn-success approve font-weight-bolder py-4 mr-3 mr-sm-14 my-1 px-7"
                                                title="Approve"
                                                data-id="{{ $application->id }}">Approve</button>
                                        @endcan
                                    @endif



                                    <div class="modal fade" id="cancel{{ $application->id }}"
                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        Reject The Application</h5>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <i aria-hidden="true"
                                                            class="ki ki-close"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form"
                                                        action="{{ route('admin.application.cancel', $application->id) }}"
                                                        method="get" enctype="multipart/form-data">

                                                        <div class="form-group row">
                                                            <div class="col-3">
                                                                <label for="comment">Comment : </label>
                                                            </div>
                                                            <div class="col-9">
                                                                <textarea name="comment" id="comment" class="form-control"></textarea>
                                                            </div>
                                                        </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button"
                                                        class="btn btn-light-primary font-weight-bold"
                                                        data-dismiss="modal">Close</button>
                                                    <input type="submit"
                                                        class="btn btn-success font-weight-bold"
                                                        value="Submit" />

                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- @endif --}}
                                </div>
                            </div>
                        </div>

                    </div>

                    <!--end::Invoice Body-->

                </div> {{-- Details tab end --}}


                <div class="card-body p-0 tab-pane fade mb-15" id="history" role="tabpanel">
                    <div class="container">
                        <div class="card mt-16">
                            <div class="card-body">
                                <h5 class="card-title">Application Process History</h5>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            {{-- <th>Sender Username</th> --}}
                                            {{-- <th>Sender Role</th> --}}
                                            <th>Sender Designation</th>
                                            <th>Attachments</th>
                                            <th>Application Receive Time</th>
                                            <th>Application Forward Time</th>
                                            <th>Receiver Designation</th>
                                            <th>Comment</th>
                                            <th>Status</th>
                                            <th>Flow</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($applicationProcess->count() > 0)
                                            @foreach ($applicationProcess as $item)
                                                <tr>
                                                    {{-- <td>{{$item->user->username}}</td> --}}
                                                    {{-- <td>{{$item->senderRole->display_name}}</td> --}}
                                                    <td>
                                                        @if ($item->user)
                                                            @if ($item->user->role_id != 10)
                                                                @if ($item->user->role_id == 1)
                                                                    Super Admin
                                                                @else
                                                                    {{ $item->designation ? $item->designation->name_en : '' }}
                                                                @endif
                                                            @else
                                                                Service Recipient
                                                            @endif
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if ($item)
                                                            @if ($item->attachment)
                                                                <a href="{{ asset('storage/attachments/' . $item->attachment) }}"
                                                                    download
                                                                    class="btn btn-sm btn-primary"><i
                                                                        class="la la-download"
                                                                        style="color: white;"></i></a>
                                                            @else
                                                                Empty
                                                            @endif
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if ($item->receive_time == null)
                                                        @else
                                                            {{ date('d-M-Y h:i a', strtotime($item->receive_time)) }}
                                                        @endif
                                                    </td>

                                                    <td>{{ date('d-M-Y h:i a', strtotime($item->created_at)) }}
                                                    </td>

                                                    <td>{{ $item->receiverRole ? $item->receiverRole->name_en : '' }}
                                                    </td>

                                                    <td>{{ $item->comment ? $item->comment : '' }}</td>

                                                    <td>
                                                        @if ($item->status == 4)
                                                            <span
                                                                class="label label-lg font-weight-bold label-light-success label-inline"
                                                                style="font-size: 15px;">Approved</span>
                                                        @elseif($item->status == 5)
                                                            <span
                                                                class="label label-lg font-weight-bold label-light-danger label-inline"
                                                                style="font-size: 15px;">Rejected</span>
                                                        @elseif($item->status == 1)
                                                            <span
                                                                class="label label-lg font-weight-bold label-warning label-inline"
                                                                style="font-size: 15px;color: black;">Pending</span>
                                                        @elseif($item->sender_role_id > $item->receiver_role_id)
                                                            <span
                                                                class="label label-lg font-weight-bold label-light-primary label-inline"
                                                                style="font-size: 15px;">Forwarded</span>
                                                        @elseif($item->sender_role_id < $item->receiver_role_id)
                                                            <span
                                                                class="label label-lg font-weight-bold label-light-danger label-inline"
                                                                style="font-size: 15px;">Returned</span>
                                                        @else
                                                            <span
                                                                class="label label-lg font-weight-bold label-light-primary label-inline"
                                                                style="font-size: 15px;">Unknown</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->sender_role_id > $item->receiver_role_id)
                                                            <i
                                                                class="icon-xl far fa-arrow-alt-circle-up text-success"></i>
                                                        @else
                                                            <i
                                                                class="icon-xl far fa-arrow-alt-circle-down text-danger"></i>
                                                        @endif
                                                    </td>


                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7">Initial Submission from Service
                                                    Recipient</td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> {{-- History tab end --}}
            </div>



                            </div>

                        </div>
                        <!--end::Card-->

                    </div>
                </div>
                <!--end::row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->


    <!-- Forward Modal -->
    <div class="modal fade" id="forwardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Forward The Application</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form"
                        action="{{ route('admin.application.forwardApplication', $application->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <div class="col-3">
                                <label for="forward">Forward To : </label>
                            </div>
                            <div class="col-9">
                                <select name="forward_role_id" id="forward_role_id" class="form-control" required>
                                    <option value="">--Select Receiver--</option>
                                    @foreach ($forwards as $forward)
                                        <option value="{{ $forward->forward_role_id }}">
                                            {{ $forward->forwardRole->name_en }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-3">
                                <label for="comment">Comment : </label>
                            </div>
                            <div class="col-9">
                                <textarea name="comment" id="comment" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-3">
                                <label for="comment">Upload File : </label>
                            </div>
                            <div class="col-9">
                                <input type="file" name="file" id="comment" class="form-control py-2">
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success font-weight-bold" value="Submit" />

                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Return Modal -->
    <div class="modal fade" id="returnModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Return The Application</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form"
                        action="{{ route('admin.application.forwardApplication', $application->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <div class="col-3">
                                <label for="forward">Return To : </label>
                            </div>
                            <div class="col-9">
                                <select name="forward_role_id" id="forward_role_id" class="form-control" required>
                                    <option value="">--Select Receiver--</option>
                                    @foreach ($backwards as $back)
                                        <option value="{{ $back->forward_role_id }}">{{ $back->forwardRole->name_en }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-3">
                                <label for="comment">Comment : </label>
                            </div>
                            <div class="col-9">
                                <textarea name="comment" id="comment" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-3">
                                <label for="comment">Upload File : </label>
                            </div>
                            <div class="col-9">
                                <input type="file" name="file" id="comment" class="form-control py-2">
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success font-weight-bold" value="Submit" />

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@push('stackScript')
    <script>
        $(".delete").click(function(e) {

            var data_id = $(this).attr("data-id");
            var url =
                '<a href="{{ route('admin.application.cancel', ':id') }}" class="swal2-confirm swal2-styled" title="Cancel">Confirm</a>';
            url = url.replace(':id', data_id);

            Swal.fire({
                title: 'Are you sure, You want to Cancel the Application process ?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: url,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Status Changed Successfully!', '', 'success')
                } else if (result.dismiss === "cancel") {
                    Swal.fire('Canceled', '', 'error')
                }
            })
        });

        $(".approve").click(function(e) {

            var data_id = $(this).attr("data-id");
            var url =
                '<a href="{{ route('admin.application.approve', ':id') }}" class="swal2-confirm swal2-styled" title="Cancel">Confirm</a>';
            url = url.replace(':id', data_id);

            Swal.fire({
                title: 'Are you sure, You want to Approve this Application ?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: url,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Application Approved Successfully!', '', 'success')
                } else if (result.dismiss === "cancel") {
                    Swal.fire('Canceled', '', 'error')
                }
            })
        });
    </script>

    <script>
        $('.discount').on('keyup', function() {
            let discount = $(this).val();
            let current_amount = $('.current_amount').val();

            let cal_amount = Number(current_amount) - Number(discount);

            $('.final_total').val(cal_amount);

            if (Number(discount) > Number(current_amount)) {
                Swal.fire('Invalid Discount Amount', '', 'warning');

                $(this).val('');
                $('.final_total').val(current_amount);

                return true;
            }
        });
    </script>
@endpush