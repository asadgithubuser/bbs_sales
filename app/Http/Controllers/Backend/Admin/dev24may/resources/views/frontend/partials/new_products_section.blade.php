@php
    $new_products = Cache::remember('new_products', 86400, function () {
        return filter_products(\App\Models\Product::where('new', 1)->orderBy('id', 'desc'))->get();
    });   

    if(count($new_products) > 12){
        $new_products = $new_products->random(12);
    }
@endphp

@if (count($new_products) > 0)
    {{-- <section class="mb-4"> --}}
            <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
                <div class="d-flex mb-3 align-items-baseline border-bottom">
                    <h3 class="h5 fw-700 mb-0">
                        <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ translate('New Products') }}</span>
                    </h3>
                    <a href="{{ route('products.products_by_feature', 'new') }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">{{ translate('View More') }}</a>
                </div>
                <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="3" data-xl-items="3" data-lg-items="3"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'>
                    @foreach ($new_products as $key => $product)
                    <div class="carousel-box">
                        @include('frontend.partials.product_box_1',['product' => $product])
                    </div>
                    @endforeach
                </div>
            </div>
    {{-- </section>    --}}
@endif