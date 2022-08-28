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
                            <h5 class="text-dark font-weight-bold my-1 mr-5">Requisition #{{ $requisition->requsition_number }} Details</h5>
                            <!--end::Page Title-->
                            <!--begin::Breadcrumb-->
                            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin.requisition.index')}}" class="text-muted">Manage Requisitions</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a class="text-muted">Requisition #{{ $requisition->requsition_number }} Details</a>
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

                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label font-weight-bolder text-dark">Requisition #{{ $requisition->requisition_number }} Details</h3>
                                    </div>
                                </div>
                                
                                
                                <div class="card card-custom">
                                    <div class="">

                                        <div class="card-body p-0" id="printArea">
                                            <!--begin::Invoice-->
                                            <!--begin::Invoice header-->
                                            <div class="container">
                                                <div class="card card-custom card-shadowless">
                                                    <div class="card-body p-0">
                                                        <div class="row justify-content-center py-8 px-2 px-md-0">
                                                            <div class="col-md-12">
                                                                <div class="d-flex justify-content-between">
                            
                                                                    <img class="display-4 font-weight-boldest mb-6 mr-10" height="100%" width="12%" src="{{ asset('assets/media/logos/logo2.png') }}" alt="">
                                                                    
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

                                            <div class="container mb-15">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6 mt-7 mt-md-0">

                                                                <div class="d-flex justify-content-between font-size-lg mb-3">
                                                                    <span class="font-weight-bold mr-15 w3-large">Requisition No:</span>

                                                                    <span class="text-right text-info w3-large">
                                                                        #{{ $requisition->requisition_number }}
                                                                    </span>
                                                                </div>

                                                                <div class="d-flex justify-content-between font-size-lg mb-3">
                                                                    <span class="font-weight-bold mr-15 w3-large">Date:</span>

                                                                    <span class="text-right">
                                                                        {{ date('d M, Y', strtotime($requisition->created_at)) }}
                                                                    </span>
                                                                </div>

                                                                <div class="d-flex justify-content-between font-size-lg mb-3">
                                                                    <span class="font-weight-bold mr-15">Fullname:</span>

                                                                    <span class="text-right">
                                                                        {{$requisition->name}} 
                                                                    </span>
                                                                </div>

                                                                <div class="d-flex justify-content-between font-size-lg mb-3">
                                                                    <span class="font-weight-bold mr-15">Organization Name:</span>
                                                                    <span class="text-right">{{$requisition->organization_name}}</span>
                                                                </div>

                                                                <div class="d-flex justify-content-between font-size-lg mb-3">
                                                                    <span class="font-weight-bold mr-15">Designation:</span>
                                                                    <span class="text-right">{{$requisition->designation}}</span>
                                                                </div>

                                                                <div class="d-flex justify-content-between font-size-lg mb-3">
                                                                    <span class="font-weight-bold mr-15">Address:</span>
                                                                    <span class="text-right">{{$requisition->address}}</span>
                                                                </div>

                                                                <div class="d-flex justify-content-between font-size-lg mb-3">
                                                                    <span class="font-weight-bold mr-15">Phone:</span>
                                                                    <span class="text-right">{{$requisition->phone}}</span>
                                                                </div>

                                                                <div class="d-flex justify-content-between font-size-lg mb-3">
                                                                    <span class="font-weight-bold">Requisition Status:</span>

                                                                    @if ($requisition->status == 2)
                                                                        <span class="text-right text-danger">Declined</span>
                                                                    @elseif ($requisition->status == 1)
                                                                        <span class="text-right text-success">Approved</span>
                                                                    @elseif ($requisition->status == 3)
                                                                        <span class="text-right badge badge-success text-white">Requisition Items Delivered</span>
                                                                    @else
                                                                        <span class="text-right text-primary">Pending</span>
                                                                    @endif
                                                                </div>

                                                                @if ($requisition->status == 2)
                                                                    <div class="d-flex justify-content-between font-size-lg mb-3">
                                                                        <span class="font-weight-bold mr-15">Comment:</span>
                                                                        <span class="text-right">{{$requisition->comment}}</span>
                                                                    </div>
                                                                @endif
                                                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--end::Invoice header-->
                                            <!--begin::Invoice Body-->
                                            <div class="position-relative">
                                                
                                                <!--begin:Table-->
                                                <div class="container top-0 left-0 right-0">
                                                    <div class="row justify-content-center">
                                                        <div class="col-md-12">
                                                            <div class="card-header p-0">
                                                                <h3 class="card-title mb-3 font-weight-bold" style="font-size: 30px;">Requisition Order Details</h3>
                                                            </div>
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr class="font-weight-boldest h-65px">
                                                                            <td class="align-middle font-size-h4 pl-0 border-0">Service Name</td>
                                                                            <td class="align-middle font-size-h4 pl-0 border-0">Category Name</td>
                                                                            <td class="align-middle font-size-h4 pl-0 border-0">Item Name</td>
                                                                            <td class="align-middle font-size-h4 text-right pr-0 border-0">Quantity</td>   
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($requisition_items as $requisition_item)
                                                                            <tr>
                                                                                <td class="align-middle pl-0 border-0 font-size-h6">{{$requisition_item->service ? $requisition_item->service->name_en : ''}}</td>
                                                                                <td class="align-middle pl-0 border-0 font-size-h6">
                                                                                    {{$requisition_item->serviceItem ? $requisition_item->serviceItem->item_name_en : ''}}
                                                                                </td>
                                                                                <td class="align-middle pl-0 border-0 font-size-h6">
                                                                                    {{$requisition_item->serviceInventory ? $requisition_item->serviceInventory->title : ''}}
                                                                                </td>
                                                                                <td class="align-middle text-right text-danger font-weight-boldest font-size-h6 pr-0 border-0">
                                                                                    {{$requisition_item->quantity}} 
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
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-lg-12 text-right"> 
                                                    @if ($requisition->status == 1)
                                                        @can('deliver_requisition')
                                                            <button type="button" class="btn btn-primary font-weight-bolder deliver mr-4" data-id="{{ $requisition->id }}">Deliver</button>
                                                        @endcan 
                                                    @elseif ($requisition->status == 3 && Auth::user()->role_id == 11) 
                                                        <button type="button" id="noprintbtn" class="btn btn-primary font-weight-bold" onclick="return printDiv('printArea');">Print Invoice</button>
                                                    @elseif ($requisition->status == 2) 
                                                        <span class="badge badge-danger font-weight-bolder">Requisition Request Declined</span>
                                                    @else
                                                        @can('approve_requisition')
                                                            <button type="button" class="btn btn-success font-weight-bolder approve mr-4" data-id="{{ $requisition->id }}">Approve</button>
                                                        @endcan

                                                        @can('decline_requisition')
                                                            <button type="button" class="btn btn-danger font-weight-bolder decline mr-4" data-toggle="modal" data-target="#declineModal">Decline</button>
                                                        @endcan
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
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

        <!-- Decline Modal -->
        <div class="modal fade" id="declineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Decline Requisition #{{ $requisition->requisition_number }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <form class="form" action="{{route('admin.requisition.decline', $requisition->id)}}" method="post">
                        @csrf

                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-3">
                                    <label for="comment">Comment : </label>
                                </div>
                                <div class="col-9">
                                    <textarea name="comment" id="comment" class="form-control" row="8"></textarea>
                                </div>
                            </div>
                        
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-success font-weight-bold" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

	@endsection

    @push('stackScript')
        <script> 
            $(".approve").click(function(e) {
                e.preventDefault();

                var data_id = $(this).attr("data-id");
                var url =  '<a href="{{route("admin.requisition.approve", ":id")}}" class="swal2-confirm swal2-styled" title="Approve">Confirm</a>';
                url = url.replace(':id', data_id );
                
                Swal.fire({
                    title: 'Are you sure?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: url,
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire('Requisition Approved Successfully!', '', 'success')
                    } else if (result.dismiss === "cancel") {
                        Swal.fire('Canceled', '', 'error')
                    }
                })
            });
        </script>

        <script> 
            $(".deliver").click(function(e) {
                e.preventDefault();

                var data_id = $(this).attr("data-id");
                var url =  '<a href="{{route("admin.requisition.deliver", ":id")}}" class="swal2-confirm swal2-styled" title="Approve">Confirm</a>';
                url = url.replace(':id', data_id );
                
                Swal.fire({
                    title: 'Are you sure?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: url,
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire('Delivered Successfully!', '', 'success')
                    } else if (result.dismiss === "cancel") {
                        Swal.fire('Canceled', '', 'error')
                    }
                })
            });
        </script>

        <script type="text/javascript">
            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
            }
        </script>
    @endpush