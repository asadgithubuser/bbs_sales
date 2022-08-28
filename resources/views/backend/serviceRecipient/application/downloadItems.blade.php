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
                            <h5 class="text-dark font-weight-bold my-1 mr-5">Download Application Service Items</h5>
                            <!--end::Page Title-->
                            <!--begin::Breadcrumb-->
                            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin.application.index')}}" class="text-muted">All Applications</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a class="text-muted">Download Application Service Items</a>
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

                                <div class="card-header card-header-tabs-line">
                                    <div class="card-title">
                                        <h3 class="card-label font-weight-bolder text-dark">{{ $serviceId== 2 ? '' :'Download'}} Application Service Items</h3>
                                    </div>
                                </div>
                                
                                
                                <div class="card card-custom">
                                    <div class="tab-content">
                                           
                                        <div class="container">
                                            <div class="card card-custom card-shadowless">
                                                <div class="card-body p-0">
                                                    <div class="row justify-content-center py-8 px-2 px-md-0">
                                                        <div class="col-md-12">
                                                            <div class="d-flex justify-content-between">
                        
                                                                <img class="display-4 font-weight-boldest mb-6 mr-10" height="100%" width="12%" src="{{ asset('assets/media/logos/logo2.png') }}" alt="BBS Logo">
                                                                
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

                                        <!--end::Invoice header-->
                                        <!--begin::Invoice Body-->
                                        <div class="position-relative">
                                            
                                            <!--begin:Table-->
                                            <div class="container top-0 left-0 right-0">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-12">
                                                        <div class="card-header p-0 text-center">
                                                            <h3 class="card-title mb-3 font-weight-bold" style="font-size: 30px;">Item {{ $serviceId== 2 ? '' :'Download'}} </h3>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr class="font-weight-boldest h-65px">
                                                                        <td class="align-middle font-size-h4 pl-0 border-0">Service Name</td>
                                                                        <td class="align-middle font-size-h4 pl-0 border-0">Service Item Name</td>
                                                                        <td class="align-middle font-size-h4 text-right pr-0 border-0">Action</td>   
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    
                                                                    @foreach ($applicationServices as $item)
                                                                        <tr>
                                                                            <td class="align-middle pl-0 border-0 font-size-h6">{{$item->service ? $item->service->name_en : ''}}</td>
                                                                            <td class="align-middle pl-0 border-0 font-size-h6">
                                                                                {{$item->serviceItem ? $item->serviceItem->item_name_en : ''}}
                                                                                <br>
                                                                                
                                                                            </td>
                                                                            <td class="align-middle text-right text-danger font-weight-boldest font-size-h6 pr-0 border-0">
                                                                                
                                                                                {{-- <a href="{{route('admin.application.downloadItem', $item->link)}}" class="btn btn-secondary btn-sm mb-1">Download</a>

                                                                                <br> --}}

                                                                                @if ($servicees = $item->service)
                                                                                    @if ($servicees->id == 3)
                                                                                    <a href="{{ route('admin.application.certificatePreview',['serviceItem'=>$item->serviceItem->id,'application'=>$item->application_id]) }}" class="btn btn-light-success font-weight-bolder">
                                                                                        Preview
                                                                                    </a> 
                                                                                    @else 
                                                                                    
                                                                                        @if ($serviceItem = $item->serviceItem)
                                                                                            {{-- @if($serviceItem->data_type == 2) --}}
                                                                                                @if ($applicationTT = $item->application)
                                                                                                    @if ($applicationTT->receiving_mode_softcopy == 4)
                                                                                                        @if ($item->total_download >= 3)
                                                                                                            <button type="button" class="btn btn-danger font-weight-bolder" disabled>
                                                                                                                Download Limit Exceeded
                                                                                                            </button>    
                                                                                                        @else
                                                                                                            <button type="button" class="btn btn-light-success font-weight-bolder " data-toggle="modal" data-target="#downloadModal{{$item->id}}">
                                                                                                                Download
                                                                                                            </button>
                                                                                                        @endif
                                                                                                        {{-- <button type="button" class="btn btn-light-success font-weight-bolder " data-toggle="modal" data-target="#downloadModal{{$item->id}}">
                                                                                                            Download
                                                                                                        </button>  --}}
                                                                                                    @elseif($applicationTT->receiving_mode_softcopy == 3)
                                                                                                        <span class="badge badge-info font-weight-bolder " >
                                                                                                        Receive by CD / Flash Drive
                                                                                                        </span>
                                                                                                    @endif
                                                                                                @endif
                                                                                                @else
                                                                                                @if ($applicationTT = $item->application)
                                                                                                    @if ($applicationTT->receiving_mode_hardcopy == 1)
                                                                                                    <span class="badge badge-info font-weight-bolder">
                                                                                                        Publications Data
                                                                                                    </span>
                                                                                                    @if ($item->is_deliver == false)
                                                                                                        @if (Auth::user()->role_id == 11)
                                                                                                            
                                                                                                            <button data-toggle="modal" data-target="#provide{{$item->application_id}}" class="btn btn-light-primary pb-4"> Hand over</button>
                                                                                                        @endif
                                                                                                    @elseif($item->is_deliver == true)
                                                                                                    <span class="badge badge-success font-weight-bolder">
                                                                                                        Delivered
                                                                                                    </span>
                                                                                                    @endif


                                                                                                    <!-- Modal -->
                                                                                                    <div id="provide{{ $item->application_id }}" class="modal" aria-hidden="true">
                                                                                                        <div class="modal-dialog modal-md">
                                                                                                            <div class="modal-content">
                                                                                                                <div class="modal-header py-5">
                                                                                                                    <h5 class="modal-title">Deliver Item
                                                                                                                    <span class="d-block text-muted font-size-sm"></span></h5>
                                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                                <div class="modal-body">
                                                                                                                    <div class="container">
                                                                                                                        <form class="form" action="{{ route('admin.application.delivery',['application'=>$item->application_id]) }}" method="POST">
                                                                                                                            
                                                                                                                            @csrf             
                                                                                                                            <div class="form-group row">
                                                                                                                                Are you Sure Want To Deliver This Item ?
                                                                                                                                <input type="hidden" required="" class="form-control" value="{{ $item->application_id }}" name="application">
                                                                                                                                
                                                                                                                                <input type="hidden" required="" class="form-control" value="{{ $item->service_inventory_item_id }}" name="service_inventory_item_id">
                                                                                                                            </div>
                                                                                                    
                                                                                                                           
                                                                                                                            
                                                                                                                            <div class="form-group row">
                                                                                                                                <label class="col-form-label text-right col-lg-3 offset-lg-4">
                                                                                                                                    <button class="btn btn-bg-success btn-block" style="color: aliceblue" disabled="">Yes</button>
                                                                                                                                </label>
                                                                                                                            </div>                           
                                                                                                                        </form>
                                                                                                                    </div>                    
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    @elseif($applicationTT->receiving_mode_hardcopy == 2)
                                                                                                    @if ($applicationTT->courier_token)
                                                                                                    
                                                                                                    @if (Auth::user()->role_id == 10)
                                                                                                        <span class="badge badge-primary font-weight-bolder " >
                                                                                                            On Courier
                                                                                                        </span>
                                                                                                        <span class="badge badge-primary font-weight-bolder " >
                                                                                                            Tracking Link: {{ $applicationTT->courier_token }}
                                                                                                        </span>
                                                                                                    @endif

                                                                                                    @else 
                                                                                                        <span class="badge badge-info font-weight-bolder " >
                                                                                                            Courier on your address
                                                                                                        </span>
                                                                                                    @endif
                                                                                                    @if (Auth::user()->role_id == 11)
                                                                                                        
                                                                                                        @if ($applicationTT->courier_token)
                                                                                                            <span class="badge badge-primary font-weight-bolder " >
                                                                                                                Tracking Link: {{ $applicationTT->courier_token }}
                                                                                                            </span>
                                                                                                        @else
                                                                                                            
                                                                                                            <button data-toggle="modal" data-target="#trakingNumber{{$item->application_id}}" class="btn btn-light-primary pb-4"> Courier Traking No</button>
                                                                                                        @endif
                                                                                                    @endif
                                                                                                    <!-- Modal -->
                                                                                                    <div id="trakingNumber{{ $item->application_id }}" class="modal" aria-hidden="true">
                                                                                                        <div class="modal-dialog modal-lg">
                                                                                                            <div class="modal-content" style="min-height: 350px;">
                                                                                                                <div class="modal-header py-5">
                                                                                                                    <h5 class="modal-title">Courier Traking No
                                                                                                                    <span class="d-block text-muted font-size-sm"></span></h5>
                                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                                <div class="modal-body">
                                                                                                                    <div class="container">
                                                                                                                        <form class="form" action="{{ route('admin.application.token',['application'=>$item->application_id]) }}" method="POST">
                                                                                                                            
                                                                                                                            @csrf             
                                                                                                                            <div class="form-group row">
                                                                                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Courier Traking No <span style="color: red;">*</span></label>
                                                                                                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                                                                                                    <input type="text" required="" class="form-control" value="" name="token" placeholder="Courier Traking No">
                                                                                                                                    <input type="hidden" required="" class="form-control" value="{{ $item->application_id }}" name="application">
                                                                                                                                
                                                                                                                                <input type="hidden" required="" class="form-control" value="{{ $item->service_inventory_item_id }}" name="service_inventory_item_id">
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                    
                                                                                                                           
                                                                                                                            
                                                                                                                            <div class="form-group row">
                                                                                                                                <label class="col-form-label text-right col-lg-3 offset-lg-4">
                                                                                                                                    <button class="btn btn-bg-success btn-block" style="color: aliceblue" disabled="">Save</button>
                                                                                                                                </label>
                                                                                                                            </div>                           
                                                                                                                        </form>
                                                                                                                    </div>                    
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    @endif

                                                                                                    
                                                                                                @endif
                                                                                                
                                                                                            {{-- @endif --}}
                                                                                            
                                                                                        @endif
                                                                                    @endif
                                                                                @endif
                                                                                
                                                                                
                                                                                




                                                                                    <!-- Forward Modal -->
                                                                                    <div class="modal fade" id="downloadModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog" role="document">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <h5 class="modal-title" id="exampleModalLabel">Download application data </h5>
                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                                                                    </button>
                                                                                                </div>
                                                                                                <div class="modal-body">
                                                                                                    <form class="form" action="{{route('admin.application.downloadItem', $item->link)}}" method="post" enctype="multipart/form-data">
                                                                                                        @csrf

                                                                                                        <div class="form-group row">
                                                                                                            <div class="col-3">
                                                                                                                <label for="download_token">Download Token: </label>
                                                                                                            </div>
                                                                                                            <div class="col-9">
                                                                                                                <input type="text" name="download_token" id="download_token" class="form-control" />
                                                                                                            </div>
                                                                                                            <p style="margin: 0 auto; font-size: .9em;">download count: {{$item->total_download}}
                                                                                                            </p>
                                                                                                            <p style="margin: 0 auto; font-size: .9em;">
                                                                                                            You can download an item maximum 3 times...!</p>
                                                                                                        </div>
                                                                                                    
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                                                                                    @if ($item->total_download >= 3)
                                                                                                        <input type="submit" class="btn btn-danger font-weight-bold" value="Download Limit Exceeded" disabled/>    
                                                                                                    @else
                                                                                                        <input type="submit" class="btn btn-success font-weight-bold" value="Submit" />
                                                                                                    @endif

                                                                                                    </form>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>














                                                                                
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
                                        <!--end::Invoice Body-->

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




	@endsection

   @push('stackScript')
   <script> 
    $('form')
        .each(function(){
            $(this).data('serialized', $(this).serialize())
        })
        .on('change input', function(){
            $(this)             
                .find('input:submit, button:submit')
                    .prop('disabled', $(this).serialize() == $(this).data('serialized'))
            ;
        })
        .find('input:submit, button:submit')
            .prop('disabled', false)
    ;
</script>
   @endpush