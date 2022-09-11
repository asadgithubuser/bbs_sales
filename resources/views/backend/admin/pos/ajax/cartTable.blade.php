<table class="table table-striped ">
    <thead>
        <tr style="background-color: #6e3cbc !important;">

            <th style="color: #fff !important;">Item</th>
            <th style="color: #fff !important;">Quantity</th>
            <th style="color: #fff !important;">Price</th>
        </tr>

    </thead>
    <tbody>
        @isset($inventoryItems)            
            @foreach ($inventoryItems as $item)
            <tr>
                <td>{{ $item->serviceInventory ?  $item->serviceInventory->title : ''}}</td>
                <td>
                    
                    <input type="text" style="width: 60px; text-align: center;" class="update-cart-quantity{{ $item->id }}" onkeyup="updateCartQuantity({{ $item->id }})"  item-id="{{ $item->id }}" value="{{ $item->quantity }}"> 
                    <span class="test"></span>
                    <button type="button" class="btn pt-1 btn-delete{{ $item->id }}" onclick="deleteCart({{ $item->id }})" style="margin-top: -8px; margin-left: -10px;" data-id="{{ $item->id }}"><i class="la la-trash w3-text-red"></i></button>
                </td>
                <input type="hidden" name="total_price" value="{{ $total_price }}">
                <td>{{ $item->price * $item->quantity }}</td>
                
            </tr>
            @endforeach
            
        @endisset
    </tbody>
</table>

<div class="card-footer">
    @if ($total_price > 0)
    <table class="table table-striped ">
                    
        <tr>
            <td><b>Total</b></td>
            <td></td>
            <td>{{ $total_price }}</td>
        </tr>
    </table>
    @endif
</div>