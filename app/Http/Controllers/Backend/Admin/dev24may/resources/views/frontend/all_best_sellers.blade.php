@extends('frontend.layouts.app')

@section('content')
    <section class="mb-4 pt-3">
        <div class="container sm-px-0">
            <form class="" id="search-form" action="" method="GET">
                <div class="row">
                    
                    <div class="col-xl-12">
                        <ul class="breadcrumb bg-transparent p-0">
                            <li class="breadcrumb-item opacity-50">
                                <a class="text-reset" href="{{ route('home') }}">{{ translate('Home')}}</a>
                            </li>
                            <li class="breadcrumb-item fw-600  text-dark">
                                <a class="text-reset" href="{{ route('all.best.sellers') }}">"{{ translate('Best Sellers') }}"</a>
                            </li>
                        </ul>
                        
                        <div class="text-left">
                            <div class="row gutters-5 flex-wrap align-items-center">
                                <div class="col-lg col-10">
                                    <h1 class="h6 fw-600 text-body">
                                        {{ translate('Best Sellers') }}
                                    </h1>
                                </div>
                                <div class="col-2 col-lg-auto d-xl-none mb-lg-3 text-right">
                                </div>
                                <div class="col-6 col-lg-auto mb-3 w-lg-200px">
                                </div>
                                <div class="col-6 col-lg-auto mb-3 w-lg-200px">
                                    <label class="mb-0 opacity-50">{{ translate('Sort by')}}</label>
                                    <select class="form-control form-control-sm aiz-selectpicker" name="sort_by" onchange="filter()">
                                        <option value="newest" @isset($sort_by) @if ($sort_by == 'newest') selected @endif @endisset>{{ translate('Newest')}}</option>
                                        <option value="oldest" @isset($sort_by) @if ($sort_by == 'oldest') selected @endif @endisset>{{ translate('Oldest')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters-5 row-cols-xxl-8 row-cols-xl-6 row-cols-lg-5 row-cols-md-4 row-cols-2">
                            @foreach ($sellers as $key => $seller)
                            @if ($seller->user != null)
                                <div class="carousel-box" >
                                    <div class="row no-gutters box-3 align-items-center border border-light rounded hov-shadow-md my-2 has-transition">
                                        <div class="bseller-left">
                                            <a href="{{ route('shop.visit', $seller->user->shop->slug) }}" class="d-block p-3">
                                                <img
                                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                    data-src="@if ($seller->user->shop->logo !== null) {{ uploaded_asset($seller->user->shop->logo) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif"
                                                    alt="{{ $seller->user->shop->name }}"
                                                    class="img-fluid lazyload"
                                                >
                                            </a>
                                        </div>
                                        <div class="bseller-right border-left border-light">
                                            <div class="p-3 text-left">
                                                <h2 class="h6 fw-600 text-truncate">
                                                    <a href="{{ route('shop.visit', $seller->user->shop->slug) }}" class="text-reset">{{ $seller->user->shop->name }}</a>
                                                </h2>
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
                            @endif
                        @endforeach
                        </div>

                        <div class="aiz-pagination aiz-pagination-center mt-4">
                            {{ $sellers->render() }}
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript">
        function filter(){
            $('#search-form').submit();
        }
    </script>
@endsection
