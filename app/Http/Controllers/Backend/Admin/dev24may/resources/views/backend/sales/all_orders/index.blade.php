@extends('backend.layouts.app')

@section('content')
@php
$refund_request_addon = \App\Models\Addon::where('unique_identifier', 'refund_request')->first();
$CurrentDate = date('Y-m-d');
@endphp
<div class="row gutters-10">
<div class="col-lg-12">
    <div class="row gutters-10">

        <div class="col-3">
            <div class="bg-grad-3 text-white rounded-lg mb-2 pb-2 overflow-hidden">
                <div class="px-3 pt-3">
                    <span class="fs-12 d-block">{{ translate('Today Order') }}</span>
                    <div class="h3 fw-700">{{ \App\Models\Order::all()->where('created_at', '>=', $CurrentDate)->count() }}</div>
                    <span class="fs-14 fw-700">৳{{number_format( \App\Models\Order::all()->where('created_at', '>=', $CurrentDate)->sum('grand_total')) }}</span>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="bg-grad-3 text-white rounded-lg mb-2  pb-2 overflow-hidden">
                <div class="px-3 pt-3">
                    <span class="fs-12 d-block">{{ translate('Today Paid Order') }}</span>
                    <div class="h3 fw-700">{{ \App\Models\Order::where('payment_status', 'paid')->where('created_at', '>=', $CurrentDate)->count() }}</div>
                    <span class="fs-14 fw-700">৳{{number_format( \App\Models\Order::where('payment_status', 'paid')->where('created_at', '>=', $CurrentDate)->sum('grand_total')) }}</span>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="bg-grad-3 text-white rounded-lg mb-2  pb-2 overflow-hidden">
                <div class="px-3 pt-3">
                    <span class="fs-12 d-block">{{ translate('Today Unpaid Order') }}</span>
                    <div class="h3 fw-700">{{ \App\Models\Order::where('payment_status', 'unpaid')->where('created_at', '>=', $CurrentDate)->count() }}</div>
                    <span class="fs-14 fw-700">৳{{number_format( \App\Models\Order::where('payment_status', 'unpaid')->where('created_at', '>=', $CurrentDate)->sum('grand_total')) }}</span>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="bg-grad-1 text-white rounded-lg mb-2  pb-2 overflow-hidden">
                <div class="px-3 pt-3">
                    <span class="fs-12 d-block">{{ translate('Today Due Amount') }}</span></br>
                    <div class="h3 fw-700">৳{{number_format( \App\Models\Order::where('created_at', '>=', $CurrentDate)->sum('due')) }}</div>
                </div>
            </div>
        </div>



    </div>
</div>
</div>
<div class="card">
    <form class="" action="" id="sort_orders" method="GET">
        <div class="card-header row gutters-5">
 

            <div class="dropdown mb-2 mb-md-0">
                <button class="btn border dropdown-toggle" type="button" data-toggle="dropdown">
                    {{ translate('All Orders') }} {{translate('Bulk Action')}}
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#" onclick="bulk_delete()"> {{translate('Delete selection')}}</a>
<!--                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal">
                        <i class="las la-sync-alt"></i>
                        {{translate('Change Order Status')}}
                    </a>-->
                </div>
            </div>

            <!-- Change Status Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                {{translate('Choose an order status')}}
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <select class="form-control aiz-selectpicker" onchange="change_status()" data-minimum-results-for-search="Infinity" id="update_delivery_status">
                                <option value="pending">{{translate('Pending')}}</option>
                                <option value="confirmed">{{translate('Confirmed')}}</option>
                                <option value="picked_up">{{translate('Picked Up')}}</option>
                                <option value="on_the_way">{{translate('On The Way')}}</option>
                                <option value="delivered">{{translate('Delivered')}}</option>
                                <option value="cancelled">{{translate('Cancel')}}</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 ml-auto">
                <select class="form-control aiz-selectpicker" name="delivery_status" id="delivery_status">
                    <option value="">{{translate('Filter by Delivery Status')}}</option>
                    <option value="pending" @if ($delivery_status == 'pending') selected @endif>{{translate('Pending')}}</option>
                    <option value="confirmed" @if ($delivery_status == 'confirmed') selected @endif>{{translate('Confirmed')}}</option>
                    <option value="picked_up" @if ($delivery_status == 'picked_up') selected @endif>{{translate('Picked Up')}}</option>
                    <option value="on_the_way" @if ($delivery_status == 'on_the_way') selected @endif>{{translate('On The Way')}}</option>
                    <option value="delivered" @if ($delivery_status == 'delivered') selected @endif>{{translate('Delivered')}}</option>
                    <option value="cancelled" @if ($delivery_status == 'cancelled') selected @endif>{{translate('Cancel')}}</option>
                </select>
            </div>

            <div class="col-lg-2 ml-auto">
                <select class="form-control form-control-sm aiz-selectpicker mb-2 mb-md-0" id="user_id" name="user_id" data-live-search="true" >
                    <option value="">{{ translate('Filter by Shop') }}</option>
                    @foreach (\App\Models\Shop::OrderBy('name', 'ASC')->get() as $key => $shop)
                        <option @isset($user_id) <?php if($user_id == $shop->user_id) echo "selected" ?> @endisset value="{{ $shop->user_id }}">{{ $shop->name }} </option>
                    @endforeach
                </select>
            </div>

            <div class="col-lg-2">
                <div class="form-group mb-0">
                    <input type="text" class="form-control" id="search_mobile" name="search_mobile" @isset($sort_mobile) value="{{ $sort_mobile }}" @endisset placeholder="{{ translate('Search Mobile Number') }}">
                </div>
            </div>


            <div class="col-lg-2">
                <div class="form-group mb-0">
                    <input type="text" class="aiz-date-range form-control" value="{{ $date }}" id="order_date"  name="date" placeholder="{{ translate('Filter by date') }}" data-format="DD-MM-Y" data-separator=" to " data-advanced-range="true" autocomplete="off">
                </div>
            </div>
            <div class="col-lg-1">
                <div class="form-group mb-0">
                    <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type Order code & hit Enter') }}">
                </div>
            </div>


            <div class="col-lg-1">
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">    
                    <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">

                        <button type="submit" class="  dropdown-item">{{ translate('Filter') }}</button>
                        <button id="resetOrderList" class=" dropdown-item">{{ translate('Reset') }}</button>
                        <a data-href="{{route('order.export.default')}}" id="export" style="cursor:pointer" class=" dropdown-item" onclick="exportTasks(event.target);">{{ translate('Export') }}</a>
                    </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="card-body">
            <!------table modification----------->
            <table class="table aiz-table mb-0">
                <thead>
                <tr>
                    <!--<th>#</th>-->
                    <th>
                        <div class="form-group">
                            <div class="aiz-checkbox-inline">
                                <label class="aiz-checkbox">
                                    <input type="checkbox" class="check-all">
                                    <span class="aiz-square-check"></span>
                                </label>
                            </div>
                        </div>
                    </th>
                    <th>#</th>
                    <th data-breakpoints="md">{{ translate('Date') }}</th>
                    <th>{{ translate('Order') }}</th>
                    <th data-breakpoints="md">{{ translate('Customer') }}</th>
                    <th data-breakpoints="md">{{ translate('Mobile No') }}</th>
                    <th data-breakpoints="md">{{ translate('Amount') }}</th>
                    <th data-breakpoints="md">{{ translate('Method') }}</th>
                    <th data-breakpoints="md">{{ translate('Payment') }}</th>
                    <th data-breakpoints="md">{{ translate('Delivery') }}</th>

                    <th class="text-right" width="15%">{{translate('options')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $key => $order)
                    <tr>
                        <td>
                            <div class="form-group">
                                <div class="aiz-checkbox-inline">
                                    <label class="aiz-checkbox">
                                        <input type="checkbox" class="check-one" name="id[]" value="{{$order->id}}">
                                        <span class="aiz-square-check"></span>
                                    </label>
                                </div>
                            </div>
                        </td>
                        <td>
                            {{ ($key+1) + ($orders->currentPage() - 1)*$orders->perPage() }}

                        </td>
                        <td><?php $datee = explode(' ', $order->created_at) ?>{{ $datee[0] }}</td>
                        <td>
                            {{ $order->code }}
                        </td>
                        <td>
                            @if ($order->user != null)
                                {{ $order->user->name }}
                            @else
                                Guest ({{ $order->guest_id }})
                            @endif
                        </td>
                        <td>
                            @if ($order->user != null)
                                {{ $order->user->phone }}
                            @endif
                        </td>
                        <td>
                            {{ single_price($order->grand_total) }}
                        </td>
                        <td><?php $pname = str_replace('_', " ", $order->payment_type); $paymentname = ucwords($pname) ?>{{ $paymentname }}</td>
                        <td>
                            @if ($order->payment_status == 'paid')
                                <span class="badge badge-inline badge-success">{{translate('Paid')}}</span>
                            @else
                                <span class="badge badge-inline badge-danger">{{translate('Unpaid')}}</span>
                            @endif
                        </td>
                        <td>
                            @php
                                $status = $order->delivery_status;
                                if($order->delivery_status == 'cancelled') {
                                    $status = '<span class="badge badge-inline badge-danger">'.translate('Cancel').'</span>';
                                }

                            @endphp
                            {!! $status !!}
                        </td>
                        <td class="text-right">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('all_orders.show', encrypt($order->id))}}" title="{{ translate('View') }}">
                                <i class="las la-eye"></i>
                            </a>
                            <a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="{{ route('invoice.download', $order->id) }}" title="{{ translate('Download Invoice') }}">
                                <i class="las la-download"></i>
                            </a>
                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('orders.destroy', $order->id)}}" title="{{ translate('Delete') }}">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-----table modification end------>

            <div class="aiz-pagination">
                {{ $orders->appends(request()->input())->links() }}
            </div>

        </div>
    </form>
</div>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection

@section('script')
    <script type="text/javascript">
        $(document).on("change", ".check-all", function() {
            if(this.checked) {
                // Iterate each checkbox
                $('.check-one:checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $('.check-one:checkbox').each(function() {
                    this.checked = false;
                });
            }

        });

//        function change_status() {
//            var data = new FormData($('#order_form')[0]);
//            $.ajax({
//                headers: {
//                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                },
//                url: "{{route('bulk-order-status')}}",
//                type: 'POST',
//                data: data,
//                cache: false,
//                contentType: false,
//                processData: false,
//                success: function (response) {
//                    if(response == 1) {
//                        location.reload();
//                    }
//                }
//            });
//        }

        function bulk_delete() {
            var data = new FormData($('#sort_orders')[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('bulk-order-delete')}}",
                type: 'POST',
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response == 1) {
                        location.reload();
                    }
                }
            });
        }

        $('#resetOrderList').on('click', function(){

        $('#order_date').val("");
        $('#user_id').val("");
        $('#search_mobile').val("");
        $('#search').val("");
		//delivery status filed value make empty
        $('#delivery_status').val('');
		//end delivery status field
        $('#sort_orders').submit();
        })

        function sort_orders(el){
            $('#sort_orders').submit();
        }

        function exportTasks(_this) {
            let _url = $(_this).data('href')+'?date='+$('#order_date').val()+'&user_id='+$('#user_id').val()+'&search_mobile='+$('#search_mobile').val()+'&delivery_status='+$('#delivery_status').val()+'&search='+$('#search').val();
            window.location.href = _url;
            console.log(_url);
        }


    </script>
@endsection
