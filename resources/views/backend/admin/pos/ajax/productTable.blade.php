<table class="table table-striped">
    <thead>
        <tr>
            <th class="text-left">Service Name</th>
            <th class="text-left">Category Name</th>
            <th class="text-left">Title</th>
            <th class="text-left">Sales Center</th>
            <th>Available Quantity</th>
            <th>Add to Cart</th>
        </tr>

    </thead>
    <tbody>
        @foreach ($items as $item)

            <tr>
                <td align="left">{{ $item->service ? $item->service->name_en : ''}}</td>
                <td align="left">{{ $item->serviceItem ? $item->serviceItem->item_name_en : '' }}</td>
                <td align="left">{{ ucfirst($item->title) }}</td>
                <td align="left">{{ $item->salesCenter ? $item->salesCenter->name_en : '' }}</td>
                <td><span class="{{ $item->number_of_sale_copies <= 5 ? 'w3-text-red font-weight-bolder w3-large' : 'w3-text-green font-weight-bolder w3-large' }}">{{ $item->number_of_sale_copies > 0 ? $item->number_of_sale_copies  : 'Out Of Stock' }}</span></td>
                <td>
                    <button  class="btn  {{ $item->number_of_sale_copies > 0 ? 'add-to-cart btn-danger' : 'btn-secondary' }} " onclick="addToCartFunction({{ $item->id }})" data-id="{{ $item->id }}">
                        <i class="la la-shopping-cart la-3x"></i>
                        
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
