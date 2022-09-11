@extends('frontend.layouts.user_panel')
@section('panel_content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <h1 class="mb-0 h6">{{ translate('Edit Product') }}</h5>
</div>
<div class="">
    <form class="form form-horizontal mar-top" action="{{route('wholesale_product_update.seller', $product->id)}}" method="POST" enctype="multipart/form-data" id="choice_form">
        <div class="row gutters-5">
            <div class="col-lg-8">
                <input name="_method" type="hidden" value="POST">
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="hidden" name="lang" value="{{ $lang }}">
                @csrf
                <div class="card">
                    <ul class="nav nav-tabs nav-fill border-light">
                        @foreach (\App\Models\Language::all() as $key => $language)
                        <li class="nav-item">
                            <a class="nav-link text-reset @if ($language->code == $lang) active @else bg-soft-dark border-light border-left-0 @endif py-3" href="{{ route('wholesale_product_edit.seller', ['id'=>$product->id, 'lang'=> $language->code] ) }}">
                                <img src="{{ static_asset('assets/img/flags/'.$language->code.'.png') }}" height="11" class="mr-1">
                                <span>{{$language->name}}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{translate('Product Name')}} <i class="las la-language text-danger" title="{{translate('Translatable')}}"></i></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="name" placeholder="{{translate('Product Name')}}" value="{{ $product->getTranslation('name', $lang) }}" required>
                            </div>
                        </div>
                        <div class="form-group row" id="category">
                            <label class="col-lg-3 col-from-label">{{translate('Category')}}</label>
                            <div class="col-lg-8">
                                <select class="form-control aiz-selectpicker" name="category_id" id="category_id" data-selected="{{ $product->category_id }}" data-live-search="true" required>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->getTranslation('name') }}</option>
                                    @foreach ($category->childrenCategories as $childCategory)
                                    @include('categories.child_category', ['child_category' => $childCategory])
                                    @endforeach
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" id="brand">
                            <label class="col-lg-3 col-from-label">{{translate('Brand')}}</label>
                            <div class="col-lg-8">
                                <select class="form-control aiz-selectpicker" name="brand_id" id="brand_id" data-live-search="true">
                                    <option value="">{{ translate('Select Brand') }}</option>
                                    @foreach (\App\Models\Brand::all() as $brand)
                                    <option value="{{ $brand->id }}" @if($product->brand_id == $brand->id) selected @endif>{{ $brand->getTranslation('name') }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{translate('Unit')}} <i class="las la-language text-danger" title="{{translate('Translatable')}}"></i> </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="unit" placeholder="{{ translate('Unit (e.g. KG, Pc etc)') }}" value="{{$product->getTranslation('unit', $lang)}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{translate('Minimum Purchase Qty')}}</label>
                            <div class="col-lg-8">
                                <input type="number" lang="en" class="form-control" name="min_qty" value="@if($product->min_qty <= 1){{1}}@else{{$product->min_qty}}@endif" min="1" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{translate('Tags')}}</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control aiz-tag-input" name="tags[]" id="tags" value="{{ $product->tags }}" placeholder="{{ translate('Type to add a tag') }}" data-role="tagsinput">
                            </div>
                        </div>
                        
                        @if (addon_is_activated('pos_system'))
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{translate('Barcode')}}</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="barcode" placeholder="{{ translate('Barcode') }}" value="{{ $product->barcode }}">
                            </div>
                        </div>
                        @endif

                        @if (addon_is_activated('refund_request'))
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{translate('Refundable')}}</label>
                            <div class="col-lg-8">
                                <label class="aiz-switch aiz-switch-success mb-0" style="margin-top:5px;">
                                    <input type="checkbox" name="refundable" @if ($product->refundable == 1) checked @endif>
                                    <span class="slider round"></span></label>
                                </label>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Product Images')}}</h5>
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Gallery Images')}}</label>
                            <div class="col-md-8">
                                <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="photos" value="{{ $product->photos }}" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Thumbnail Image')}} <small>(290x300)</small></label>
                            <div class="col-md-8">
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="thumbnail_img" value="{{ $product->thumbnail_img }}" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Product Videos')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{translate('Video Provider')}}</label>
                            <div class="col-lg-8">
                                <select class="form-control aiz-selectpicker" name="video_provider" id="video_provider">
                                    <option value="youtube" <?php if ($product->video_provider == 'youtube') echo "selected"; ?> >{{translate('Youtube')}}</option>
                                    <option value="dailymotion" <?php if ($product->video_provider == 'dailymotion') echo "selected"; ?> >{{translate('Dailymotion')}}</option>
                                    <option value="vimeo" <?php if ($product->video_provider == 'vimeo') echo "selected"; ?> >{{translate('Vimeo')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{translate('Video Link')}}</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="video_link" value="{{ $product->video_link }}" placeholder="{{ translate('Video Link') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Product price + stock')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{translate('Unit price')}}</label>
                            <div class="col-lg-6">
                                <input type="text" placeholder="{{translate('Unit price')}}" name="unit_price" class="form-control" value="{{$product->unit_price}}" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{translate('Purchase price')}}</label>
                            <div class="col-lg-6">
                                <input type="text" placeholder="{{translate('Purchase price')}}" name="purchase_price" class="form-control" value="{{$product->purchase_price}}" required>
                            </div>
                        </div>
                        @if(addon_is_activated('club_point'))
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">
                                    {{translate('Set Point')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="number" lang="en" min="0" value="{{ $product->earn_point }}" step="1" placeholder="{{ translate('1') }}" name="earn_point" class="form-control">
                                </div>
                            </div>
                        @endif

                        <div id="show-hide-div">
                            <div class="form-group row" id="quantity">
                                <label class="col-lg-3 col-from-label">{{translate('Quantity')}}</label>
                                <div class="col-lg-6">
                                    <input type="number" lang="en" value="{{ optional($product->stocks->first())->qty }}" step="1" placeholder="{{translate('Quantity')}}" name="current_stock" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">
                                    {{translate('SKU')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="{{ translate('SKU') }}" value="{{ optional($product->stocks->first())->sku }}" name="sku" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">
                                {{translate('Wholesale Prices')}}
                            </label>
                            <div class="col-md-6">
                                <div class="qunatity-price">
                                    @foreach ($product->stocks->first()->wholesalePrices as $wholesalePrice)
                                        <div class="row gutters-5">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="{{translate('Min QTY')}}" name="wholesale_min_qty[]" value="{{ $wholesalePrice->min_qty }}" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="{{ translate('Max QTY') }}" name="wholesale_max_qty[]" value="{{ $wholesalePrice->max_qty }}" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="{{ translate('Price per piece') }}" name="wholesale_price[]" value="{{ $wholesalePrice->price }}" required>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
                                                    <i class="las la-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button
                                    type="button"
                                    class="btn btn-soft-secondary btn-sm"
                                    data-toggle="add-more"
                                    data-content='<div class="row gutters-5">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="{{translate('Min Qty')}}" name="wholesale_min_qty[]" required>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="{{ translate('Max Qty') }}" name="wholesale_max_qty[]" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="{{ translate('Price per piece') }}" name="wholesale_price[]" required>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
                                                <i class="las la-times"></i>
                                            </button>
                                        </div>
                                    </div>'
                                    data-target=".qunatity-price">
                                    {{ translate('Add More') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Product Description')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{translate('Description')}} <i class="las la-language text-danger" title="{{translate('Translatable')}}"></i></label>
                            <div class="col-lg-9">
                                <textarea class="aiz-text-editor" name="description">{{ $product->getTranslation('description', $lang) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

<!--                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Product Shipping Cost')}}</h5>
                    </div>
                    <div class="card-body">

                    </div>
                </div>-->

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('PDF Specification')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('PDF Specification')}}</label>
                            <div class="col-md-8">
                                <div class="input-group" data-toggle="aizuploader">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="pdf" value="{{ $product->pdf }}" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('SEO Meta Tags')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{translate('Meta Title')}}</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="meta_title" value="{{ $product->meta_title }}" placeholder="{{translate('Meta Title')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-from-label">{{translate('Description')}}</label>
                            <div class="col-lg-8">
                                <textarea name="meta_description" rows="8" class="form-control">{{ $product->meta_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Meta Images')}}</label>
                            <div class="col-md-8">
                                <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="meta_img" value="{{ $product->meta_img }}" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{translate('Slug')}}</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="{{translate('Slug')}}" id="slug" name="slug" value="{{ $product->slug }}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">

<!--Start Shipping Configuration-->
 <div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">{{translate('Product Shipping Cost')}}</h5>

    </div>
    <div class="card-body">
        <div class="form-group row">
            <div class="col-md-3">
                <h5 class="mb-0 h6">{{translate('Free Shipping')}}</h5>
            </div>
            <div class="col-md-9">
                <div class="form-group row">
                    <label class="col-md-4 col-from-label">{{translate('Status')}}</label>
                    <div class="col-md-7">
                        <label class="aiz-switch aiz-switch-success mb-0">
                            <input type="radio" @if($product->shipping_type == 'free') checked @endif  onclick="shipping_type_change(this.value)"  name="shipping_type" value="free" >
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3">
                <h5 class="mb-0 h6">{{translate('Flat Rate')}}</h5>
            </div>
            <div class="col-md-9">
                <div class="form-group row">
                    <label class="col-md-4 col-from-label">{{translate('Status')}}</label>
                    <div class="col-md-7">
                        <label class="aiz-switch aiz-switch-success mb-0">
                            <input type="radio"   @if($product->shipping_type == 'flat_rate') checked @endif  onclick="shipping_type_change(this.value)" name="shipping_type" value="flat_rate" >
                            <span></span>
                        </label>
                    </div>
                </div>
                <div class="form-group row" id="flat_rate"  @if($product->shipping_type != 'flat_rate') style="display:none" @endif >
                    <label class="col-md-4 col-from-label">{{translate('Flat Shipping cost (All Area)')}}</label>
                    <div class="col-md-7">
                        <input type="number" id="flat_rate_shipping_cost"  onClick="this.select();"  min="0" @if($product->shipping_type == 'flat_rate') name="shipping_cost"  value="{{ $product->shipping_cost }}"  @endif    step="0.01" placeholder="{{ translate('Shipping cost') }}"   class="form-control" >
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3">
                <h5 class="mb-0 h6">{{translate('Weight Based & Regular')}}</h5>
            </div>
            <div class="col-md-9">
                <div class="form-group row">
                    <label class="col-md-4 col-from-label">{{translate('Status')}}</label>
                    <div class="col-md-7">
                        <label class="aiz-switch aiz-switch-success mb-0">
                            <input type="radio"   @if($product->shipping_type == 'weight_based') checked @endif   onclick="shipping_type_change(this.value)" name="shipping_type" value="weight_based" >
                            <span></span>
                        </label>
                    </div>
                </div>
                <div class="form-group row" id="weight_based"    @if($product->shipping_type != 'weight_based') style="display:none" @endif>
                    <label class="col-md-4 col-from-label">{!!translate('Product Weight Based Shipping (Kg)')!!}</label>
                    <div class="col-md-7">
                        <input type="text"  id="weight_based_shipping_cost"   @if($product->shipping_type == 'weight_based') name="shipping_cost"  value="{{ $product->shipping_cost }}" @endif      onClick="this.select();"   placeholder="{{ translate('Product Max Weight (Kg)') }}"  class="form-control" >
                        <i class="text-warning">*Default weight 1 (Kg)</i>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3">
                <h5 class="mb-0 h6">{{translate('Category Based')}}</h5>
                <input type="text" @if($product->shipping_type == 'category_wise') name="shipping_cost" value="{{ $product->shipping_cost }}" @endif   id="category_wise_shipping_cost"  placeholder="{{ translate('Shipping cost Category') }}"   class="form-control d-none" >
            </div>
            <div class="col-md-9">
                <div class="form-group row">
                    <label class="col-md-4 col-from-label">{{translate('Status')}}</label>
                    <div class="col-md-7">
                        <label class="aiz-switch aiz-switch-success mb-0">
                            <input type="radio"   @if($product->shipping_type == 'category_wise') checked @endif   onclick="shipping_type_change(this.value)" name="shipping_type" value="category_wise" >
                            <span></span>
                        </label>
                    </div>
                </div>
                <div class="form-group row" id="category_wise"   @if($product->shipping_type != 'category_wise') style="display:none" @endif>
                    <label class="col-md-4 col-from-label">{!!translate('Shipping Cost Category')!!}</label>
                    <div class="col-md-7">
                        <p class="border border-1 cursor-pointer shipcatpath" id="costCategorybtn" style="color: #482f92">
                            @if($product->shipping_type == 'category_wise') {!!app('App\Http\Controllers\ShippingController')->shippingCatPath($product->shipping_cost)!!} @else <i class="text-secondary">select shipping cost category</i></p> @endif
                    </div>
                    <div id="costCategory" class="col-md-12 " style="display: none;">
                        <div class="row">
                            <style>.list-group-item.active { z-index: 2; color: black; background-color: white; border-color: white; font-weight: bold; opacity: .8;}.list-group-item { padding: 0.1rem 1.25rem; }.costcat{padding: 10px; border: 1px solid #BFBFBF; background-color: white; box-shadow: 4px 7px 10px #aaaaaac9; margin-bottom: 20px;} .costcat{width: 100%;} .boxh{  height: 300px; overflow-y: scroll; margin-top:15px; "}</style>
                            <div class="row costcat">
                                <input autocomplete="off" id="myInput" placeholder="Search Cost Category..." onkeyup="search_shipping_category()" type="text" class="form-control "  >
                                        <div class="col-4 boxh">
                                            <div class="list-group" id="list-tab" role="tablist">
                                                <ul id="myUL">
                                                    @php $sl=1; @endphp
                                                    @foreach (app('App\Http\Controllers\ShippingController')->shippingCategories(null)  as $shipcat)
                                                        <li style="list-style-type: none;"  onclick="shipping_category_change('list-home-list{{ $shipcat->id }}')" >  <a class="  list-group-item list-group-item-action" id="list-home-list{{ $shipcat->id }}" data-toggle="list" href="#list-home{{ $shipcat->id }}" role="tab" aria-controls="{{ $shipcat->name }}" aria-selected="true">{{ $sl++ }}. {{ $shipcat->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                       <div class="col-8 boxh">
                                            <div class="tab-content" id="nav-tabContent">
											
                                               @php  $get_data=app('App\Http\Controllers\ShippingController')->costbyArea2(); @endphp											
											
                                                @foreach (app('App\Http\Controllers\ShippingController')->shippingCategories(null)  as $shipcat)
                                                    <div class="tab-pane fade" id="list-home{{ $shipcat->id }}" role="tabpanel" aria-labelledby="ist-home-list{{ $shipcat->id }}">
                                                        <p class="text-center ">{{ $shipcat->name }}</p>
                                                        <table class="shipcat" border="1" width="100%">
                                                            <thead>
                                                            <tr class=" bg-light">
                                                                <th class="pl-1" data-breakpoints="lg">#</th>
                                                                <th class="pl-1 ">Subcategory</th>
                                                                @php $shipping_cost_area=app('App\Http\Controllers\BusinessSettingsController')->BusinessSettings('shipping_cost_area'); @endphp
                                                                @foreach ($shipping_cost_area['area'] as $each_area)
                                                                    <th class="pr-1 text-right">{{explode(' ',$each_area)[array_key_last(explode(' ',$each_area))]}}</th>
                                                                @endforeach
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @php $sl=1;  @endphp
															
                                                            @foreach (app('App\Http\Controllers\ShippingController')->shippingCategories($shipcat->id) as $shippingSubCategoriesSingle)
                                                                <tr id="tr1 " onclick="selectSubCat({{$shippingSubCategoriesSingle->id}},'{{addslashes(trim($shipcat->name))}} <x class=\'text-dark\'> » </x> {{addslashes($shippingSubCategoriesSingle->name)}} <span onclick=\'clearShipCat()\'  class=\'badge badge-inline badge-danger text-center\'>✘</span>')">
                                                                    <td class="pl-1  bg-light">{{$sl++}}</td>
                                                                    <td style="width:60%"  class="pl-1 bg-light cursor-pointer">{{$shippingSubCategoriesSingle->name}}</td>
                                                                    @foreach ($shipping_cost_area['area'] as $key=>$area)
                                                                        <td class="pl-1  bg-light">{{$get_data[$shipcat->id][$shippingSubCategoriesSingle->id][$shipping_cost_area['id'][$key]]}}</td>
                                                                    @endforeach
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Shipping Configuration-->

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Low Stock Quantity Warning')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="name">
                                {{translate('Quantity')}}
                            </label>
                            <input type="number" name="low_stock_quantity" value="{{ $product->low_stock_quantity }}" min="0" step="1" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">
                            {{translate('Stock Visibility State')}}
                        </h5>
                    </div>

                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-md-6 col-from-label">{{translate('Show Stock Quantity')}}</label>
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="radio" name="stock_visibility_state" value="quantity" @if($product->stock_visibility_state == 'quantity') checked @endif>
                                    <span></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-6 col-from-label">{{translate('Show Stock With Text Only')}}</label>
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="radio" name="stock_visibility_state" value="text" @if($product->stock_visibility_state == 'text') checked @endif>
                                    <span></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-6 col-from-label">{{translate('Hide Stock')}}</label>
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="radio" name="stock_visibility_state" value="hide" @if($product->stock_visibility_state == 'hide') checked @endif>
                                    <span></span>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Cash On Delivery')}}</h5>
                    </div>
                    <div class="card-body">
                        @if (get_setting('cash_payment') == '1')
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-md-6 col-from-label">{{translate('Status')}}</label>
                                    <div class="col-md-6">
                                        <label class="aiz-switch aiz-switch-success mb-0">
                                            <input type="checkbox" name="cash_on_delivery" value="1" @if($product->cash_on_delivery == 1) checked @endif>
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                            <p>
                                {{ translate('Cash On Delivery option is disabled. Activate this feature from here') }}
                                <a href="{{route('activation.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['shipping_configuration.index','shipping_configuration.edit','shipping_configuration.update'])}}">
                                    <span class="aiz-side-nav-text">{{translate('Cash Payment Activation')}}</span>
                                </a>
                            </p>
                        @endif
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Featured')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-md-6 col-from-label">{{translate('Status')}}</label>
                                    <div class="col-md-6">
                                        <label class="aiz-switch aiz-switch-success mb-0">
                                            <input type="checkbox" name="featured" value="1" @if($product->featured == 1) checked @endif>
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Todays Deal')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-md-6 col-from-label">{{translate('Status')}}</label>
                                    <div class="col-md-6">
                                        <label class="aiz-switch aiz-switch-success mb-0">
                                            <input type="checkbox" name="todays_deal" value="1" @if($product->todays_deal == 1) checked @endif>
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Flash Deal')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="name">
                                {{translate('Add To Flash')}}
                            </label>
                            <select class="form-control aiz-selectpicker" name="flash_deal_id" id="video_provider">
                                <option value="">Choose Flash Title</option>
                                @foreach(\App\Models\FlashDeal::where("status", 1)->get() as $flash_deal)
                                    <option value="{{ $flash_deal->id}}" @if($product->flash_deal_product && $product->flash_deal_product->flash_deal_id == $flash_deal->id) selected @endif>
                                        {{ $flash_deal->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">
                                {{translate('Discount')}}
                            </label>
                            <input type="number" name="flash_discount" value="{{$product->flash_deal_product ? $product->flash_deal_product->discount : '0'}}" min="0" step="1" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">
                                {{translate('Discount Type')}}
                            </label>
                            <select class="form-control aiz-selectpicker" name="flash_discount_type" id="">
                                <option value="">Choose Discount Type</option>
                                <option value="amount" @if($product->flash_deal_product && $product->flash_deal_product->discount_type == 'amount') selected @endif>
                                    {{translate('Flat')}}
                                </option>
                                <option value="percent" @if($product->flash_deal_product && $product->flash_deal_product->discount_type == 'percent') selected @endif>
                                    {{translate('Percent')}}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Estimate Shipping Time')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="name">
                                {{translate('Shipping Days')}}
                            </label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="est_shipping_days" value="{{ $product->est_shipping_days }}" min="1" step="1" placeholder="{{translate('Shipping Days')}}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">{{translate('Days')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('VAT & Tax')}}</h5>
                    </div>
                    <div class="card-body">
                        @foreach(\App\Models\Tax::where('tax_status', 1)->get() as $tax)
                        <label for="name">
                            {{$tax->name}}
                            <input type="hidden" value="{{$tax->id}}" name="tax_id[]">
                        </label>

                        @php
                        $tax_amount = 0;
                        $tax_type = '';
                        foreach($tax->product_taxes as $row) {
                            if($product->id == $row->product_id) {
                                $tax_amount = $row->tax;
                                $tax_type = $row->tax_type;
                            }
                        }
                        @endphp

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="number" lang="en" min="0" value="{{ $tax_amount }}" step="0.01" placeholder="{{ translate('Tax') }}" name="tax[]" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <select class="form-control aiz-selectpicker" name="tax_type[]">
                                    <option value="amount" @if($tax_type == 'amount') selected @endif>
                                        {{translate('Flat')}}
                                    </option>
                                    <option value="percent" @if($tax_type == 'percent') selected @endif>
                                        {{translate('Percent')}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="col-12">
                <div class="mb-3 text-right">
                    <button type="submit" name="button" class="btn btn-info">{{ translate('Update Product') }}</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@section('script')

<script type="text/javascript">

    "use strict";

    $(document).ready(function (){
        show_hide_shipping_div();
        $('.remove-files').on('click', function(){
            $(this).parents(".col-md-4").remove();
        });
    });

    $("[name=shipping_type]").on("change", function (){
        show_hide_shipping_div();
    });

    function show_hide_shipping_div() {
        var shipping_val = $("[name=shipping_type]:checked").val();

        $(".flat_rate_shipping_div").hide();

        if(shipping_val == 'flat_rate'){
            $(".flat_rate_shipping_div").show();
        }
    }

    AIZ.plugins.tagify();
    /*Start Shipping Configuration*/
    function search_shipping_category() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        ul = document.getElementById("myUL");
        li = ul.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }


    $("#costCategorybtn").click(function(){
        $("#costCategory").fadeToggle();
        $( "#myInput" ).focus();
    });


    function selectSubCat(catid,catpath) {
        $("#category_wise_shipping_cost").val(catid);
        $( ".shipcatpath" ).html(catpath);
        $("#costCategory").fadeToggle();
    }

    function clearShipCat() {
        $("input[name='shipping_cost_category']").val('');
        $( ".shipcatpath" ).html('<i class="text-secondary">select shipping cost category</i>');
    }

    var previous_shipping_type='{{$product->shipping_type}}';
    function shipping_type_change(val) {

        $("#"+val+"_shipping_cost").attr("name", "shipping_cost");
        $("#"+previous_shipping_type+"_shipping_cost").removeAttr("name");

        $("#"+val).fadeToggle();
        if(previous_shipping_type!=''){$("#"+previous_shipping_type).fadeToggle();}
        previous_shipping_type=val;
    }

    var previous_shipping_cat='';
    function shipping_category_change(val) {
        try {
            $("#"+previous_shipping_cat).removeClass("active");
        } catch (error) {}
        previous_shipping_cat=val;
    }
    /*End Shipping Configuration*/
</script>

@endsection
