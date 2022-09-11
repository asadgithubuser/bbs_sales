

@extends('backend.layouts.app')

@section('content')

<div class="row gutters-10">
    <div class="col-md-3">
        <div class="bg-grad-3 text-white rounded-lg mb-4 overflow-hidden">
          <div class="px-3 pt-3">
            <div class="h3 fw-700">
              {{$weight_based_free_products}}  
            </div>
            <div class="opacity-70">{{ translate('Weight BAsed Products')}}</div>
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
              <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,192L26.7,192C53.3,192,107,192,160,202.7C213.3,213,267,235,320,218.7C373.3,203,427,149,480,117.3C533.3,85,587,75,640,90.7C693.3,107,747,149,800,149.3C853.3,149,907,107,960,112C1013.3,117,1067,171,1120,202.7C1173.3,235,1227,245,1280,213.3C1333.3,181,1387,107,1413,69.3L1440,32L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z"></path>
          </svg>
        </div>
    </div>

    <div class="col-md-3">
        <div class="bg-grad-1 text-white rounded-lg mb-4 overflow-hidden">
            <div class="px-3 pt-3">
                <div class="h3 fw-700">
                  {{$total_flat_rate_products}}
                </div>
                <div class="opacity-70">{{ translate('Flat Rate Products')}}</div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,192L30,208C60,224,120,256,180,245.3C240,235,300,181,360,144C420,107,480,85,540,96C600,107,660,149,720,154.7C780,160,840,128,900,117.3C960,107,1020,117,1080,112C1140,107,1200,85,1260,74.7C1320,64,1380,64,1410,64L1440,64L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
            </svg>
        </div>
    </div>

    <div class="col-md-3">
        <div class="bg-grad-2 text-white rounded-lg mb-4 overflow-hidden">
            <div class="px-3 pt-3">
                <div class="h3 fw-700">{{$total_free_products}}</div>
                <div class="opacity-70">{{ translate('Free Shippig Products') }}</div>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                  <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
              </svg>
        </div>
    </div>

    <div class="col-md-3">
        <div class="bg-grad-3 text-white rounded-lg mb-4 overflow-hidden">
          <div class="px-3 pt-3">
              <div class="h3 fw-700">
                  {{$total_category_wise_products}}
              </div>
              <div class="opacity-70">{{ translate('Categorywise Cost Products')}}</div>
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
              <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,192L26.7,192C53.3,192,107,192,160,202.7C213.3,213,267,235,320,218.7C373.3,203,427,149,480,117.3C533.3,85,587,75,640,90.7C693.3,107,747,149,800,149.3C853.3,149,907,107,960,112C1013.3,117,1067,171,1120,202.7C1173.3,235,1227,245,1280,213.3C1333.3,181,1387,107,1413,69.3L1440,32L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z"></path>
          </svg>
        </div>
    </div>
</div>

<div id="product-filter-sec" class="card">
    <form class="" action="" id="sort_products" method="GET">
        <div class="card-header row gutters-5">
            <div class="col">
                <h5 class="mb-md-0 h6">{{ translate('All Products') }} {{$total_db_products}}</h5>
            </div>

            <div class="col-lg-2 ml-auto">
                <select class="form-control aiz-selectpicker" onchange="sort_products()" data-minimum-results-for-search="Infinity" name="product_limit" id="product_limit">
                    <option value="">{{ translate('#no of products') }}</option>
                    <option @if($product_limit == '100') selected @endif value="100">{{ translate('100') }}</option>
                    <option @if($product_limit == '500') selected @endif value="500">{{ translate('500') }}</option>
                    <option @if($product_limit == '1000') selected @endif value="1000">{{ translate('1000') }}</option>
                </select>
            </div>
            <div class="col-lg-2 ml-auto">
                <select class="form-control aiz-selectpicker" onchange="sort_products()" data-live-search="true" data-minimum-results-for-search="Infinity" name="seller_id" id="seller_id">
                    <option value="">{{ translate('Select Seller') }}</option>
                    @foreach ($sellers as $seller)
                            <option @if($seller_id == $seller->id) selected @endif value="{{ $seller->id }}">{{ $seller->name }}</option>
                    @endforeach
                    
                </select>
            </div>
            <div class="col-lg-2">
                <div class="form-group mb-0">
                    <select class="form-control aiz-selectpicker" data-live-search="true" onchange="sort_products()" data-minimum-results-for-search="Infinity" name="brand_id" id="brand_id">
                        <option value="">{{ translate('Select Brand') }}</option>
                        @foreach ($brands as $brand)
                                <option @if($brand_id == $brand->id) selected @endif value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                        
                    </select>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group mb-0">
                    <select class="form-control aiz-selectpicker" data-live-search="true"  onchange="sort_products()" data-minimum-results-for-search="Infinity" name="category_id" id="category_id">
                        <option value="">{{ translate('Select Category') }}</option>
                        @foreach ($categories as $category)
						@php if($category->level=='0'){$added='';}  if($category->level=='1'){$added='-';}  if($category->level=='2'){$added='--';} @endphp
                            <option @if($category_id == $category->id) selected @endif value="{{ $category->id }}">{{$added}} {{ $category->getTranslation('name') }}</option>
                             
                        @endforeach
                        
                    </select>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group mb-0">
                    <select class="form-control aiz-selectpicker" onchange="sort_products()" data-minimum-results-for-search="Infinity" name="shipping_type" id="shipping_type">
                        <option value="">{{ translate('Shipping Type') }}</option>
                        <option @if($shipping_type == 'free') selected @endif value="free">{{ translate('Free Shipping') }}</option>
                        <option @if($shipping_type == 'flat_rate') selected @endif value="flat_rate">{{ translate('Flat Rate') }}</option>
                        <option @if($shipping_type == 'weight_based') selected @endif value="weight_based">{{ translate('Weight Based') }}</option>
                        <option @if($shipping_type == 'category_wise') selected @endif value="category_wise">{{ translate('Category Wise') }}</option>
                    </select>
                </div>
            </div>
            <div class="col-auto">
                <div class="form-group mb-0">
                    <button onclick="allFilterReset()" type="submit" class="btn btn-primary">{{ translate('Reset') }}</button>
                </div>
            </div>
        </div>
    </form>

        <div class="card-body">
            <div class="filter-top-btns">
                <span class="float-left"><h6>Filter Result: @if($total_products == null ) 0 @else {{ count($total_products) }}  @endif ()(Published product)</h6></span>
                @if($category_id||$seller_id)
				<a href="{{Request::root()}}/product-bulk-export/{{$category_id}}&{{$seller_id}}" target="_blank" class="float-right ml-5 btn btn-success">Export</a>
                @endif
				<a href="#shipping-cost-section" type="submit" class="float-right btn btn-info">Assign Cost Section</a>
            </div>
            <table class="table aiz-table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>
                            <div class="form-group">
                                <div class="aiz-checkbox-inline">
                                    <p>Select All</p>
                                    <label class="aiz-checkbox">
                                        <input type="checkbox" class="check-all">
                                        <span class="aiz-square-check"></span>
                                    </label>
                                </div>
                            </div>
                        </th>
                        <th>{{ translate('ID') }}</th>
                        <th>{{ translate('Name') }}</th>
                        <th data-breakpoints="md">{{ translate('Seller Name') }}</th>
                        <th data-breakpoints="md">{{ translate('Category') }}</th>
                        <th data-breakpoints="md">{{ translate('Brand') }}</th>
                        <th data-breakpoints="md">{{ translate('Shipping Cost') }}</th>
                        <th data-breakpoints="md">{{ translate('Shipping Type') }}</th>
                        <th data-breakpoints="md">{{ translate('Unit Price') }}</th>
                        <th data-breakpoints="md">{{ translate('Purchase Price') }}</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>
                            <div class="form-group">
                                <div class="aiz-checkbox-inline">
                                    <label class="aiz-checkbox">
                                        <input type="checkbox" class="check-one" name="checkbox" value="{{$product->id}}">
                                        <span class="aiz-square-check"></span>
                                    </label>
                                </div>
                            </div>
                        </td>
						<td>
                            {{ $product->id }}
                        </td>
                        <td>
                            {{ $product->name }}
                        </td>                        
						
                        <td>
                            @if($product->user != null)
                             {{ $product->user->name }} 
                            @else
                                
                            @endif
                        </td>
                        <td>
                            @if($product->category != null)
                             {{ $product->category->name }} 
                            @else
                                
                            @endif
                        </td>
                        <td>
                            @if($product->brand != null)
                             {{ $product->brand->name }} 
                            @else
                                
                            @endif
                        </td>
                        <td>
						@if($product->shipping_type=='category_wise')
							 @php $dd=DB::table('shipping_categories')->where('id','=', $product->shipping_cost)->first(); @endphp
							{{DB::table('shipping_categories')->where('id','=', $dd->parent_id)->first()->name}}/{{$dd->name}}
						@else
							{{ $product->shipping_cost }}
						@endif
                            
                        </td>
                        <td>
                            <?php
                             $name = str_replace('_', ' ', $product->shipping_type);
                            
                            ?>
                            {{ ucwords($name) }}
                        </td>
                        <td>
                            {{ $product->unit_price }}
                        </td>
                        <td>
                            {{ $product->purchase_price }}
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="aiz-pagination">
			<?php if($i!=1){
				echo $products->appends(request()->input())->links();
			}?>
                  
            </div>

        </div>
    </div>
      
            <!--Start Shipping Configuration-->
        <div id="shipping-cost-section" class="card p-3">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Assing Shipping Cost')}}</h5>
                <a href="#product-filter-sec" class="btn btn-info">{{ translate('Product Filter Section') }}</a>
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
                                    <input type="radio"  onclick="shipping_type_change(this.value)" name="shipping_type" value="free" >
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
                                    <input type="radio" onclick="shipping_type_change(this.value)" name="shipping_type" value="flat_rate" checked>
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row" id="flat_rate" style="display:flex">
                            <label class="col-md-4 col-from-label">{{translate('Flat Shipping cost (All Area)')}}</label>
                            <div class="col-md-7">
                                <input type="number" id="flat_rate_shipping_cost" onClick="this.select();"  min="0" value="0" step="0.01" placeholder="{{ translate('Shipping cost') }}"   class="form-control" >
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
                                    <input type="radio"  onclick="shipping_type_change(this.value)" name="shipping_type" value="weight_based" >
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row" id="weight_based" style="display:none">
                            <label class="col-md-4 col-from-label">{!!translate('Product Weight Based Shipping (Kg)')!!}</label>
                            <div class="col-md-7">
                                <input type="text" id="weight_based_shipping_cost" value="" name="shipping_cost" onClick="this.select();"   placeholder="{{ translate('Product Max Weight (Kg)') }}"  class="form-control" >
                                <i class="text-warning">*Default weight 1 (Kg)</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <h5 class="mb-0 h6">{{translate('Category Based')}}</h5>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group row">
                            <label class="col-md-4 col-from-label">{{translate('Status')}}</label>
                            <div class="col-md-7">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="radio"  onclick="shipping_type_change(this.value)" name="shipping_type" value="category_wise" >
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row" id="category_wise" style="display:none">
                            <label class="col-md-4 col-from-label">{!!translate('Shipping Cost Category')!!}</label>
                            <div class="col-md-7">
                                <p class="border border-1 cursor-pointer shipcatpath" id="costCategorybtn" style="color: #482f92"><i class="text-secondary">select shipping cost category</i></p>
                                <input type="number"  id="category_wise_shipping_cost"  placeholder="{{ translate('Shipping cost Category') }}"   class="form-control  d-none" >
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
                        <button id="assign-cost-btn" onclick="shipping_cost_assign()" class="float-right btn btn-info"><i class="fa fa-spinner fa-spin mr-1"></i>{{ translate('Assign Cost') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <!--End Shipping Configuration-->
      
    


@endsection


@section('script')
    <script type="text/javascript">
        function sort_products(el){
            $('#sort_products').submit();
        }

        function allFilterReset(){
            var product_limit = $('#product_limit').empty(); 
            var seller_id = $('#seller_id').empty(); 
            var brand_id = $('#brand_id').empty(); 
            var category_id = $('#category_id').empty(); 
            var shipping_type = $('#shipping_type').empty(); 

            $.post('{{ route('cost.index') }}', {_token: '{{ @csrf_token() }}', product_limit:product_limit, seller_id:seller_id, brand_id:brand_id, category_id:category_id, shipping_type:shipping_type }, function(data){
                console.log('reset feilds success')
            })
        }

 
        $(document).on('change', '.check-all', function(){
            if(this.checked){
                $('.check-one:checkbox').each(function(){
                    this.checked = true
                })
            }else{
                $('.check-one:checkbox').each(function(){
                    this.checked = false
                })
            }
        })
    </script>



<script type="text/javascript">
    function add_more_customer_choice_option(i, name){
        $('#customer_choice_options').append('<div class="form-group row"><div class="col-md-3"><input type="hidden" name="choice_no[]" value="'+i+'"><input type="text" class="form-control" name="choice[]" value="'+name+'" placeholder="{{ translate('Choice Title') }}" readonly></div><div class="col-md-8"><input type="text" class="form-control aiz-tag-input" name="choice_options_'+i+'[]" placeholder="{{ translate('Enter choice values') }}" data-on-change="update_sku"></div></div>');

    	AIZ.plugins.tagify();
    }

	$('input[name="colors_active"]').on('change', function() {
	    if(!$('input[name="colors_active"]').is(':checked')){
			$('#colors').prop('disabled', true);
		}
		else{
			$('#colors').prop('disabled', false);
		}
		update_sku();
	});

	$('#colors').on('change', function() {
	    update_sku();
	});

    // Textbox to input product link is shown and required property is assigned when isLinked toggle switch is ON.
    // Otherwise product link is hidden and required property gets false. And link is removed.
    // Start
    $('input[name="isLinked"]').on('change', function(){
        if($('input[name="isLinked"]').is(':checked')){
            $('#product_link').show();
            $('#product_link').prop('required', true);
        }
        else{
            $('#product_link').hide();
            $('#product_link').prop('required', false);
            $('#product_link').val("");
        }
    });
    // End


        $('input[name="unit_price"]').on('keyup', function() {
	    update_sku();
	});

	$('input[name="name"]').on('keyup', function() {
	    update_sku();
	});

	function delete_row(em){
		$(em).closest('.form-group row').remove();
		update_sku();
	}

    function delete_variant(em){
		$(em).closest('.variant').remove();
	}

	function update_sku(){
		$.ajax({
		   type:"POST",
		   url:'{{ route('products.sku_combination') }}',
		   data:$('#choice_form').serialize(),
		   success: function(data){
			   $('#sku_combination').html(data);
			   if (data.length > 1) {
				   $('#quantity').hide();
			   }
			   else {
					$('#quantity').show();
			   }
		   }
	   });
	}

	$('#choice_attributes').on('change', function() {
		$('#customer_choice_options').html(null);
		$.each($("#choice_attributes option:selected"), function(){
            add_more_customer_choice_option($(this).val(), $(this).text());
        });
		update_sku();
	});

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

    var catid2 = '';
    var shipping_type = '';
    function selectSubCat(catid,catpath) {
        $("#category_wise_shipping_cost").val(catid);
        $( ".shipcatpath" ).html(catpath);
        $("#costCategory").fadeToggle();

        catid2 = catid
    }

    function clearShipCat() {
        $("#category_wise_shipping_cost").val('');
        $( ".shipcatpath" ).html('<i class="text-secondary">select shipping cost category</i>');
    }

    var previous_shipping_type='flat_rate';
    
    function shipping_type_change(val) {
        $("#"+val+"_shipping_cost").attr("name", "shipping_cost");
        $("#"+previous_shipping_type+"_shipping_cost").removeAttr("name");
        
        $("#"+val).fadeToggle();
        if(previous_shipping_type!=''){$("#"+previous_shipping_type).fadeToggle();}
        previous_shipping_type=val;

        shipping_type = val;
       
    }


    var previous_shipping_cat='';
    function shipping_category_change(val) {
        try {
            $("#"+previous_shipping_cat).removeClass("active");
        } catch (error) {}
        previous_shipping_cat=val;
    }
    /*End Shipping Configuration*/


     function shipping_cost_assign(){
        var array = []
        var last_array;
        var checkboxes = document.querySelectorAll('.check-one[type=checkbox]:checked')

        for (var i = 0; i < checkboxes.length; i++) {
           array.push(checkboxes[i].value)
        }

        last_array = array.slice();
        
        var flat_rate_cost = $('#flat_rate_shipping_cost').val();
        var weight_based_cost = $('#weight_based_shipping_cost').val();

        if(last_array.length > 0){
             $('#sloading').css({'display':'block'})

            $.post('{{ route('cost.assign') }}', {_token: '{{ @csrf_token() }}', products_id: last_array, shipping_type:shipping_type, catId:catid2, flat_rate_cost:flat_rate_cost, weight_based_cost:weight_based_cost}, function(data){
                var ddata = JSON.parse(data)
                if(ddata.status == 'success'){
                    $('#sloading').css({'display':'none'})
                    location.reload();
                    console.log(data)
                }
            })
        }else{
            AIZ.plugins.notify('warning', '{{ translate('Please select products') }}');
        }
           
    
    }
</script>

@endsection