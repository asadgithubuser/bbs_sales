@extends('frontend.layouts.app')

@section('content')
    {{-- Categories , Sliders --}}
    <div class="home-banner-area mb-4 pt-3">
        <div class="container-fluid">
            <div class="row gutters-10 position-relative">
               
                <div class="col-lg-12">
                    @if (get_setting('home_slider_images') != null)
                        <div class="aiz-carousel dots-inside-bottom mobile-img-auto-height" data-arrows="true" data-dots="true" data-autoplay="true">
                            @php 
                            $slider_images = json_decode(get_setting('home_slider_images'), true);    
                            $slider_orders = json_decode(get_setting('home_slider_order'), true);     
                            $slider_orders_bc=$slider_orders;
                            rsort($slider_orders);  //shorted
                            @endphp

                           
                            @foreach ($slider_orders as $key => $value)
                            @php $place_key = array_search($value, $slider_orders_bc); @endphp
                                <div class="carousel-box">
                                    <a href="{{ json_decode(get_setting('home_slider_links'), true)[$place_key] }}">
                                        <img
                                            class="d-block mw-100 img-fit rounded shadow-sm overflow-hidden"
                                            src="{{ uploaded_asset($slider_images[$place_key]) }}"
                                            alt="{{ env('APP_NAME')}} promo"
                                            @if(count($featured_categories) == 0)
                                            height="457"
                                            @else
                                            height="auto"
                                            @endif
                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-home-banner.png') }}';"
                                        >
                                    </a>
                                </div>{{-- height:315 --}}
                            @endforeach

                        </div>
                    @endif
                    @if (count($featured_categories) > 0)
                        <ul class="list-unstyled mb-0 row gutters-5">
                            @foreach ($featured_categories as $key => $category)
                                <li class="minw-0 col-4 col-md mt-3">
                                    <a href="{{ route('products.category', $category->slug) }}" class="d-block rounded bg-white p-2 text-reset shadow-sm">
                                        <img
                                            src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                            data-src="{{ uploaded_asset($category->banner) }}"
                                            alt="{{ $category->getTranslation('name') }}"
                                            class="lazyload img-fit"
                                            height="78"
                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-home-banner.png') }}';"
                                        >
                                        <div class="text-truncate fs-12 fw-600 mt-2 opacity-70">{{ $category->getTranslation('name') }}</div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>                
                <div class="col-lg-12">
				 
                </div>             
            </div>
        </div>
    </div>

    {{-- Todays Deal --}}
    <section class="mb-4">
        <div class="container-fluid">
            <div class="">
                <div id="todays_deal_product_sec"></div>
            </div>
        </div>
    </section>
    {{-- Todays Deal --}}
    
    {{-- Flash Deal --}}
	@if(count($flash_deal->flash_deal_products)>20)
    @if($flash_deal != null && strtotime(date('Y-m-d H:i:s')) >= $flash_deal->start_date && strtotime(date('Y-m-d H:i:s')) <= $flash_deal->end_date)
    <section class="mb-4">
        <div class="container-fluid">
            <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">

                <div class="d-flex mb-3 align-items-baseline border-bottom">
                    <h3 class="h5 fw-700 mb-0">
                        <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ translate($flash_deal->title) }}</span>
                    </h3>
                    <div class="aiz-count-down ml-lg-3 align-items-center" data-date="{{ date('Y/m/d H:i:s', $flash_deal->end_date) }}"></div>
                    <a href="{{ route('flash-deal-details', $flash_deal->slug) }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md w-100 w-md-auto">{{ translate('View More') }}</a>
                </div>

                <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="6" data-lg-items="6"  data-md-items="4" data-sm-items="2" data-xs-items="2" data-arrows='true'>
                    @foreach ($flash_deal->flash_deal_products->random(20) as $key => $flash_deal_product)
                        @php
                            $product = \App\Models\Product::find($flash_deal_product->product_id);
                        @endphp
                        @if ($product != null && $product->published != 0)
                            <div class="carousel-box">
                                @include('frontend.partials.product_box_1',['product' => $product])
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif
    @endif



    {{-- Banner section 1 --}}
    @if (get_setting('home_banner1_images') != null)
    <section class="mb-4">
        <div class="container-fluid">
            <div class="row gutters-10">
                @php 
                    $banner_1_imags = json_decode(get_setting('home_banner1_images')); 
                
                @endphp
                 @if(isset($banner_1_imags[0]))
                    <div class="col-lg-6 col-xl">
                        <div class="mb-3 mb-lg-0">
                            <a href="{{ json_decode(get_setting('home_banner1_links'), true)[0] }}" class="d-block text-reset">
                                <img src="{{ static_asset('assets/img/placeholder-home-banner.png') }}" data-src="{{ uploaded_asset($banner_1_imags[0]) }}" alt="{{ env('APP_NAME') }} promo" height="450px" class="lazyload w-100">
                            </a>
                        </div>
                    </div>
                 @endif
                    <div class="col-lg-6 col-xl">
                        @if(isset($banner_1_imags[1]))
                        <div class="row">
                            <div class="col-12 mb-3">
                                <a href="{{ json_decode(get_setting('home_banner1_links'), true)[1] }}" class="d-block text-reset">
                                    <img src="{{ static_asset('assets/img/placeholder-home-banner.png') }}" data-src="{{ uploaded_asset($banner_1_imags[1]) }}" alt="{{ env('APP_NAME') }} promo" height="217px" class="lazyload w-100">
                                </a>
                            </div>
                        </div>
                        @endif
                        @if(isset($banner_1_imags[2]))
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ json_decode(get_setting('home_banner1_links'), true)[2] }}" class="d-block text-reset">
                                    <img src="{{ static_asset('assets/img/placeholder-home-banner.png') }}" data-src="{{ uploaded_asset($banner_1_imags[2]) }}" alt="{{ env('APP_NAME') }} promo" height="217px" class="lazyload w-100">
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
               
            </div>
        </div>
    </section>
    @endif


    <section class="">
        <div id="container-fluid">
            <div class="row mr-0 ml-0">
                  {{-- Featured Section --}}
                <div class="col-lg-6 mb-4">
                    <div id="section_featured">

                    </div>
                </div>
                {{-- end Featured section  --}}

                {{-- new products section  --}}
                <div class="col-lg-6 mb-4">
                    <div id="section_new_products">

                    </div>
                </div>
                {{-- end new products section  --}}

            </div>
        </div>
    </section>
  
    <section class=""> 
        <div id="container-fluid">
            <div class="row mr-0 ml-0">
                  {{-- best selling Section --}}
                <div class="col-lg-6 mb-4">
                    <div id="section_best_selling">

                    </div>
                </div>
                {{-- end best selling section  --}}

                {{-- best sellers section  --}}
                <div class="col-lg-6 mb-4">
                    <div id="section_best_sellers">

                    </div>
                </div>
                {{-- end best sellers section  --}}

            </div>
        </div>
    </section>

        {{-- Top 10 categories and Brands --}}
        @if (get_setting('top10_categories') != null && get_setting('top10_brands') != null)
        <section class="mb-4">
            <div class="container-fluid">
                <div class="row gutters-10">
                    @if (get_setting('top10_categories') != null)
                        <div class="col-lg-6">
                            <div class="d-flex mb-3 align-items-baseline border-bottom">
                                <h3 class="h5 fw-700 mb-0">
                                    <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ translate('Top Categories') }}</span>
                                </h3>
                                <a href="{{ route('categories.all') }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">{{ translate('View More') }}</a>
                            </div>
                            <div class="row gutters-5">
                                @php $top10_categories = json_decode(get_setting('top10_categories')); @endphp
                                @foreach ($top10_categories as $key => $value)
                                    @php $category = \App\Models\Category::find($value); @endphp
                                    @if ($category != null)
                                        <div class="col-sm-6">
                                            <a href="{{ route('products.category', $category->slug) }}" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                                <div class="row align-items-center no-gutters">
                                                    <div class="col-3 text-center">
                                                        <img
                                                            src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                            data-src="{{ uploaded_asset($category->banner) }}"
                                                            alt="{{ $category->getTranslation('name') }}"
                                                            class="img-fluid img lazyload h-60px"
                                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                        >
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-truncat-2 pl-3 fs-14 fw-600 text-left">{{ $category->getTranslation('name') }}</div>
                                                    </div>
                                                    <div class="col-2 text-center">
                                                        <i class="la la-angle-right text-primary"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if (get_setting('top10_brands') != null)
                        <div class="col-lg-6">
                            <div class="d-flex mb-3 align-items-baseline border-bottom">
                                <h3 class="h5 fw-700 mb-0">
                                    <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ translate('Top  Brands') }}</span>
                                </h3>
                                <a href="{{ route('brands.all') }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">{{ translate('View More') }}</a>
                            </div>
                            <div class="row gutters-5">
                                @php $top10_brands = json_decode(get_setting('top10_brands')); @endphp
                                @foreach ($top10_brands as $key => $value)
                                    @php $brand = \App\Models\Brand::find($value); @endphp
                                    @if ($brand != null)
                                        <div class="col-sm-6">
                                            <a href="{{ route('products.brand', $brand->slug) }}" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                                <div class="row align-items-center no-gutters">
                                                    <div class="col-4 text-center">
                                                        <img
                                                            src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                            data-src="{{ uploaded_asset($brand->logo) }}"
                                                            alt="{{ $brand->getTranslation('name') }}"
                                                            class="img-fluid img lazyload h-60px"
                                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                        >
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="text-truncate-2 pl-3 fs-14 fw-600 text-left">{{ $brand->getTranslation('name') }}</div>
                                                    </div>
                                                    <div class="col-2 text-center">
                                                        <i class="la la-angle-right text-primary"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        @endif

        {{-- Banner Section 2 --}}
        @if (get_setting('home_banner2_images') != null)
        <div class="">
            <div class="container-fluid">
                <div class="row gutters-10">
                    @php $banner_2_imags = json_decode(get_setting('home_banner2_images')); @endphp
                    @foreach ($banner_2_imags as $key => $value)
                        <div class="col-xl col-md-6">
                            <div class="mb-4">
                                <a href="{{ json_decode(get_setting('home_banner2_links'), true)[$key] }}" class="d-block text-reset">
                                    <img src="{{ static_asset('assets/img/placeholder-home-banner.png') }}" data-src="{{ uploaded_asset($banner_2_imags[$key]) }}" alt="{{ env('APP_NAME') }} promo" class="img-fluid lazyload w-100">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

    <!-- Auction Product -->
    @if(addon_is_activated('auction'))
        <div id="auction_products">

        </div>
    @endif

    {{-- Category wise Products --}}
    <div id="section_home_categories">

    </div>

    {{-- Classified Product --}}
    @if(get_setting('classified_product') == 1)
        @php
            $classified_products = \App\Models\CustomerProduct::where('status', '1')->where('published', '1')->take(10)->get();
        @endphp
           @if (count($classified_products) > 0)
               <section class="mb-4">
                   <div class="container">
                       <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
                            <div class="d-flex mb-3 align-items-baseline border-bottom">
                                <h3 class="h5 fw-700 mb-0">
                                    <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ translate('Classified Ads') }}</span>
                                </h3>
                                <a href="{{ route('customer.products') }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">{{ translate('View More') }}</a>
                            </div>
                           <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'>
                               @foreach ($classified_products as $key => $classified_product)
                                   <div class="carousel-box">
                                        <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                                            <div class="position-relative">
                                                <a href="{{ route('customer.product', $classified_product->slug) }}" class="d-block">
                                                    <img
                                                        class="img-fit lazyload mx-auto h-140px h-md-210px"
                                                        src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                        data-src="{{ uploaded_asset($classified_product->thumbnail_img) }}"
                                                        alt="{{ $classified_product->getTranslation('name') }}"
                                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                    >
                                                </a>
                                                <div class="absolute-top-left pt-2 pl-2">
                                                    @if($classified_product->conditon == 'new')
                                                       <span class="badge badge-inline badge-success">{{translate('new')}}</span>
                                                    @elseif($classified_product->conditon == 'used')
                                                       <span class="badge badge-inline badge-danger">{{translate('Used')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="p-md-3 p-2 text-left">
                                                <div class="fs-15 mb-1">
                                                    <span class="fw-700 text-primary">{{ single_price($classified_product->unit_price) }}</span>
                                                </div>
                                                <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                                    <a href="{{ route('customer.product', $classified_product->slug) }}" class="d-block text-reset">{{ $classified_product->getTranslation('name') }}</a>
                                                </h3>
                                            </div>
                                       </div>
                                   </div>
                               @endforeach
                           </div>
                       </div>
                   </div>
               </section>
           @endif
       @endif

    {{-- Banner Section 2 --}}
    @if (get_setting('home_banner3_images') != null)
    <div class="">
        <div class="container-fluid">
            <div class="row gutters-10">
                @php $banner_3_imags = json_decode(get_setting('home_banner3_images')); @endphp
                @foreach ($banner_3_imags as $key => $value)
                    <div class="col-xl col-md-6">
                        <div class="mb-4">
                            <a href="{{ json_decode(get_setting('home_banner3_links'), true)[$key] }}" class="d-block text-reset">
                                <img src="{{ static_asset('assets/img/placeholder-home-banner.png') }}" data-src="{{ uploaded_asset($banner_3_imags[$key]) }}" alt="{{ env('APP_NAME') }} promo" class="img-fluid lazyload w-100">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $.post('{{ route('home.section.featured') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_featured').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.new_products') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_new_products').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.todays_deal') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#todays_deal_product_sec').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.best_selling') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_selling').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.auction_products') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#auction_products').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.home_categories') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_home_categories').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.best_sellers') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_sellers').html(data);
                AIZ.plugins.slickCarousel();
            });
        });
        
    </script>
@endsection