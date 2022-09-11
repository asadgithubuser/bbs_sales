<table class="table table-striped ">
    <thead>
        <tr style="background-color: #0bb7af6b !important;">
            <th>#</th>
            <th style="color: rgb(0, 0, 0) !important;">Invoice ID</th>
            <th style="color: rgb(0, 0, 0) !important;" class="text-left">Customer</th>
            <th style="color: rgb(0, 0, 0) !important;">Total Item Quantity</th>
            <th style="color: rgb(0, 0, 0) !important;">Order Date</th>
            <th style="color: rgb(0, 0, 0) !important;">Total Price</th>
            <th style="color: rgb(0, 0, 0) !important;" class="hideIt">Status</th>
            <th class="hideIt">Action</th>
        </tr>

    </thead>
    <tbody>
        @php
            $i = 1;
            $totalQty = 0;
            $totalBDT = 0;
        @endphp
        @foreach ($orders as $order)
            <tr>
                <td>{{$i}}</td>
                <td>52.01.0000.215.01.000.12-00{{ $order->id }}</td>
                <td align="left">{{ $order->customer ? ucfirst($order->customer->first_name) . ' '. $order->customer->last_name :'Walk in Customer' }}</td>
                <td>{{ $order->total_quantity }}</td>
                <td>{{date('d-m-Y', strtotime($order->created_at))}}</td>
                <td>{{ $order->discount_type ? $order->final_amount : $order->total_price }}</td>
                <td class="hideIt">
                    @if ($order->payment_status == 'unpaid')
                        <span class="badge badge-warning">Unpaid</span>
                    @elseif($order->payment_status == 'paid')   
                        <span class="badge badge-success">Paid</span>
                    @elseif($order->payment_status == 'cancel')  
                        <span class="badge badge-danger">Cancelled</span>
                    @endif
                    
                </td>
                <td class="hideIt">
                    <a target="_blank" href="{{ route('admin.pos.invoice',$order) }}" class="btn btn-info">
                        @if ($order->payment_status == 'paid')
                            Invoice
                        @elseif ($order->payment_status == 'unpaid')
                            Details
                        @elseif ($order->payment_status == 'cancel')
                            Details
                        @endif
                    </a>
                </td>
            </tr>
            @php
                $i++;
                $totalQty += $order->total_quantity;
                $totalBDT += $order->discount_type ? $order->final_amount : $order->total_price;
            @endphp
        @endforeach
        <tr>
            <td colspan="3" align="right">Total Publications</td>
            <td>{{$totalQty}} pcs</td>
            <td align="right">Total Price</td>
            <td>{{$totalBDT}} TK</td>
        </tr>
    </tbody>
</table>