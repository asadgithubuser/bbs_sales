<table class="table table-separate table-head-custom table-checkable table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-left">Title</th>
            <th class="text-left">Sales Center</th>
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
                <td align="left">{{$item->title}}</td>
                <td align="left">{{$item->salesCenter ? $item->salesCenter->name_en : ''}}</td>
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