@php
    $todays_deal_products = Cache::remember('todays_deal_products', 3600, function () {
        return filter_products(\App\Models\Product::where('published', 1)->where('todays_deal', 1))->get();
    });
     
    if(count($todays_deal_products) > 12){
        $todays_deal_products = $todays_deal_products->random(12);
    }   
@endphp

@if (count($todays_deal_products) > 0)
    <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
        <div class="d-flex mb-3 align-items-baseline border-bottom">
            <h3 class="h5 fw-700 mb-0">
                <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ translate('Todays Deal') }}</span>
            </h3>
            <a href="{{ route('products.products_by_feature', 'todays_deal') }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">{{ translate('View More') }}</a>
        </div>
        <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="6" data-lg-items="6"  data-md-items="4" data-sm-items="2" data-xs-items="2" data-arrows='true'>
            @foreach ($todays_deal_products as $key => $product)
            <div class="carousel-box">
                @include('frontend.partials.product_box_1',['product' => $product])
            </div>
            @endforeach
        </div>
    </div>
@endif