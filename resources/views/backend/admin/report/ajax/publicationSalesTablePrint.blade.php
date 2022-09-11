<table class="table table-striped ">
    <thead>
        <tr style="background-color: #0bb7af6b !important;">
            <th>#</th>
            <th style="color: rgb(0, 0, 0) !important;">Invoice ID</th>
            <th style="color: rgb(0, 0, 0) !important;" class="text-left">Customer</th>
            <th style="color: rgb(0, 0, 0) !important;">Total Item Quantity</th>
            <th style="color: rgb(0, 0, 0) !important;">Order Date</th>
            <th style="color: rgb(0, 0, 0) !important;">Total Price</th>
            {{-- <th style="color: rgb(0, 0, 0) !important;">Status</th>
            <th>Action</th> --}}
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