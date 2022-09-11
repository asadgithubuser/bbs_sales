@php
    $best_selers = Cache::remember('best_selers', 86400, function () {
        return \App\Models\Seller::where('verification_status', 1)->orderBy('num_of_sale', 'desc')->take(20)->get();
    });
   // var_dump($best_selers);
@endphp

@if(get_setting('vendor_system_activation') == 1)
    @if (count($best_selers) > 0)
    {{-- <section class="mb-4"> --}}
            <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
                <div class="d-flex mb-3 align-items-baseline border-bottom">
                    <h3 class="h5 fw-700 mb-0">
                        <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ translate('Best Sellers') }}</span>
                    </h3>
                    <a href="{{ route('sellers') }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">{{ translate('View More') }}</a>
                </div>
                <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="3" data-xl-items="3" data-lg-items="3"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'>
                    @foreach ($best_selers as $key => $seller)
            @if (  !empty($seller->user) &&   !empty($seller->user->shop->slug)     && !empty($seller->user->shop->name) )
                <div class="carousel-box" id="item-best-seller">
                    <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
                        <div class="bseller-left">
                            <a href="{{ route('shop.visit', $seller->user->shop->slug) }}" class="d-block">
                                <img
                                    class="img-fit lazyload mx-auto h-140px h-md-210px"
                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                    data-src="
                    				@if ($seller->user->shop->logo !== null)
                    				{{ uploaded_asset($seller->user->shop->logo) }}
                    				@endif
                    				"
                                    alt="{{  $seller->user->shop->name  }}"
                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                >
                            </a>
                        </div>
                        <div class="bseller-right border-left border-light">
                            <div class="p-3 text-left">
                                <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                    @php
                                    if(strlen($seller->user->shop->name)>20)
                                    $seller_name = substr($seller->user->shop->name,0,18).'...';
                                    else
                                    $seller_name = $seller->user->shop->name;
                                    @endphp
                                    <a href="{{ route('shop.visit', $seller->user->shop->slug) }}" class="text-reset">{{ $seller_name }}</a>
                                </h3>
                                <div class="rating rating-sm mb-2">
                                    {{ renderStarRating($seller->rating) }}
                                </div>
                                <a href="{{ route('shop.visit', $seller->user->shop->slug) }}" class="btn btn-soft-primary btn-sm">
                                    {{ translate('Visit Store') }} <i class="las la-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
			@else
				
                <div class="carousel-box" id="item-best-seller">
                    <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
                        <div class="bseller-left">
                             
                        </div>
                        <div class="bseller-right border-left border-light">
                            <div class="p-3 text-left">
                                <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
								{{$seller->user}}
                                </h3>
                                <div class="rating rating-sm mb-2">
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>			
			
            @endif
        @endforeach
        </div>
    </div>
        
    {{-- </section>    --}}
    @endif
@endif


    