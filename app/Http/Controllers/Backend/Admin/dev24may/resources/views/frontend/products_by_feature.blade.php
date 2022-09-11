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
                                @if(isset($feature))
                                    @if($feature == 'best_selling')
                                        <li class="breadcrumb-item fw-600  text-dark">
                                            <a class="text-reset" href="{{ route('products.products_by_feature', $feature) }}"> "{{ translate('Best Selling') }}"</a>
                                        </li>
                                    @elseif($feature == 'todays_deal')
                                        <li class="breadcrumb-item fw-600  text-dark">
                                            <a class="text-reset" href="{{ route('products.products_by_feature', $feature) }}"> "{{ translate('Todays Deal') }}"</a>
                                        </li>
                                    @elseif($feature == 'new')
                                        <li class="breadcrumb-item fw-600  text-dark">
                                            <a class="text-reset" href="{{ route('products.products_by_feature', $feature) }}"> "{{ translate('New Products') }}"</a>
                                        </li>
                                    @elseif($feature == 'featured')
                                        <li class="breadcrumb-item fw-600  text-dark">
                                            <a class="text-reset" href="{{ route('products.products_by_feature', $feature) }}"> "{{ translate('Featured Products') }}"</a>
                                        </li>
                                    @endif
                                @endif
                            </ul>

                        @isset($category_id)
                            <input type="hidden" name="category" value="{{ \App\Models\Category::find($category_id)->slug }}">
                        @endisset
                        <div class="text-left">
                            <div class="row gutters-5 flex-wrap align-items-center">
                                <div class="col-lg col-10">
                                    <h1 class="h6 fw-600 text-body">
                                        @if(isset($feature))
                                            @if($feature == 'best_selling')
                                                {{ translate('Best Selling') }}
                                            @elseif($feature == 'todays_deal')
                                            {{ translate('Todays Deal') }}
                                            @else
                                            {{ ucwords($feature) }} Products
                                            @endif
                                        @endif
                                    </h1>
                                </div>
                                <div class="col-2 col-lg-auto d-xl-none mb-lg-3 text-right">
                                    <button type="button" class="btn btn-icon p-0" data-toggle="class-toggle" data-target=".aiz-filter-sidebar">
                                        <i class="la la-filter la-2x"></i>
                                    </button>
                                </div>
                                <div class="col-6 col-lg-auto mb-3 w-lg-200px">
                                    @if (Route::currentRouteName() != 'products.brand')
                                        <label class="mb-0 opacity-50">{{ translate('Brands')}}</label>
                                        <select class="form-control form-control-sm aiz-selectpicker" data-live-search="true" name="brand" onchange="filter()">
                                            <option value="">{{ translate('All Brands')}}</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->slug }}" @isset($brand_id) @if ($brand_id == $brand->id) selected @endif @endisset>{{ $brand->getTranslation('name') }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                                <div class="col-6 col-lg-auto mb-3 w-lg-200px">
                                    <label class="mb-0 opacity-50">{{ translate('Sort by')}}</label>
                                    <select class="form-control form-control-sm aiz-selectpicker" name="sort_by" onchange="filter()">
                                        <option value="newest" @isset($sort_by) @if ($sort_by == 'newest') selected @endif @endisset>{{ translate('Newest')}}</option>
                                        <option value="oldest" @isset($sort_by) @if ($sort_by == 'oldest') selected @endif @endisset>{{ translate('Oldest')}}</option>
                                        <option value="price-asc" @isset($sort_by) @if ($sort_by == 'price-asc') selected @endif @endisset>{{ translate('Price low to high')}}</option>
                                        <option value="price-desc" @isset($sort_by) @if ($sort_by == 'price-desc') selected @endif @endisset>{{ translate('Price high to low')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters-5 row-cols-xxl-6 row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2">
                            @foreach ($products as $key => $product)
                                    <div class="col mb-2">
                                        @include('frontend.partials.product_box_1',['product' => $product])
                                    </div>
                            @endforeach
                        </div>

                        

                        <div class="aiz-pagination aiz-pagination-center mt-4">
                            {{ $products->render() }}
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
