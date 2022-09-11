@extends('backend.layouts.app')

@section('content')

<div id="product-filter-sec" class="card">
    <form class="" action="" id="sort_products" method="GET">
        <div class="card-header row gutters-5">
            <div class="col">
                <h5 class="mb-md-0 h6">{{ translate('All Products') }}</h5>
            </div>

            <div class="col-lg-2 ml-auto">
                <select class="form-control aiz-selectpicker" onchange="sort_products()" data-minimum-results-for-search="Infinity" name="product_limit" id="product_limit">
                    <option value="">{{ translate('num of products') }}</option>
                    <option @if($product_limit == '100') selected @endif value="100">{{ translate('100') }}</option>
                    <option @if($product_limit == '500') selected @endif value="500">{{ translate('500') }}</option>
                    <option @if($product_limit == '1000') selected @endif value="1000">{{ translate('1000') }}</option>
                    <option @if($product_limit == 'all_products') selected @endif value="all_products">{{ translate('All Products') }}</option>
                </select>
            </div>
            <div class="col-lg-2 ml-auto">
                <select class="form-control aiz-selectpicker" onchange="sort_products()" data-minimum-results-for-search="Infinity" name="seller_id" id="seller_id">
                    <option value="">{{ translate('Select Seller') }}</option>
                    @foreach ($sellers as $seller)
                            <option @if($seller_id == $seller->id) selected @endif value="{{ $seller->id }}">{{ $seller->name }}</option>
                    @endforeach
                    
                </select>
            </div>
            <div class="col-lg-2">
                <div class="form-group mb-0">
                    <select class="form-control aiz-selectpicker" onchange="sort_products()" data-minimum-results-for-search="Infinity" name="brand_id" id="brand_id">
                        <option value="">{{ translate('Select Brand') }}</option>
                        @foreach ($brands as $brand)
                                <option @if($brand_id == $brand->id) selected @endif value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                        
                    </select>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group mb-0">
                    <select class="form-control aiz-selectpicker" onchange="sort_products()" data-minimum-results-for-search="Infinity" name="category_id" id="category_id">
                        <option value="">{{ translate('Select Category') }}</option>
                        @foreach ($categories as $category)
                            <option @if($category_id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->getTranslation('name') }}</option>
                            @foreach ($category->childrenCategories as $childCategory)
                                @include('categories.child_category', ['child_category' => $childCategory])
                            @endforeach
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
                <span class="float-left"><h6>Products Found: @if($total_products == null ) 0 @else {{ count($total_products) }} @endif</h6></span>
                <a href="#shipping-cost-section" type="submit" class="float-right btn btn-info">Assign Csot Section</a>
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
                        <th>{{ translate('Name') }}</th>
                        <th data-breakpoints="md">{{ translate('Seller Name') }}</th>
                        <th data-breakpoints="md">{{ translate('Category') }}</th>
                        <th data-breakpoints="md">{{ translate('Brand') }}</th>
                        <th data-breakpoints="md">{{ translate('Shipping Cost') }}</th>
                        <th data-breakpoints="md">{{ translate('Shipping Type') }}</th>
                        <th data-breakpoints="md">{{ translate('Unit Price') }}</th>
                        <th data-breakpoints="md">{{ translate('Purchase Price') }}</th>
                        <th data-breakpoints="md">{{ translate('Delivery Status') }}</th>
                        <th class="text-right" width="15%">{{translate('options')}}</th>
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
                            {{ $product->name }}
                        </td>
                        <td>
                            {{ $product->user->name }}
                        </td>
                        <td>
                            category->name
                        </td>
                        <td>
                            {{ $product->brand->name }} 
                        </td>
                        <td>
                            {{ $product->shipping_cost }}
                        </td>
                        <td>
                            {{ $product->shipping_type }}
                        </td>
                        <td>
                            {{ $product->unit_price }}
                        </td>
                        <td>
                            {{ $product->purchase_price }}
                        </td>
                        <td>
                            @if ($product->cash_on_delivery == 1)
                            <span class="badge badge-inline badge-success">{{translate('Cash On Delivery')}}</span>
                            @else
                            <span class="badge badge-inline badge-success">{{translate('Online Payment')}}</span>
                            @endif
                        </td>
                        
                        <td class="text-right">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('all_orders.show', encrypt($product->id))}}" title="{{ translate('View') }}">
                                <i class="las la-eye"></i>
                            </a>
                            <a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="{{ route('invoice.download', $product->id) }}" title="{{ translate('Download Invoice') }}">
                                <i class="las la-download"></i>
                            </a>
                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('orders.destroy', $product->id)}}" title="{{ translate('Delete') }}">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="aiz-pagination">
                {{-- @if($paginate == 'paginate')
                    {!! $products->render() !!}
                @endif --}}
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
                                                            @php $sl=1; @endphp
                                                            @foreach (app('App\Http\Controllers\ShippingController')->shippingCategories($shipcat->id) as $shippingSubCategoriesSingle)
                                                                <tr id="tr1 " onclick="selectSubCat({{$shippingSubCategoriesSingle->id}},'{{addslashes(trim($shipcat->name))}} <x class=\'text-dark\'> » </x> {{addslashes($shippingSubCategoriesSingle->name)}} <span onclick=\'clearShipCat()\'  class=\'badge badge-inline badge-danger text-center\'>✘</span>')">
                                                                    <td class="pl-1  bg-light">{{$sl++}}</td>
                                                                    <td style="width:60%"  class="pl-1 bg-light cursor-pointer">{{$shippingSubCategoriesSingle->name}}</td>
                                                                    @foreach ($shipping_cost_area['area'] as $key=>$area)
                                                                        <td class="pl-1  bg-light">{{app('App\Http\Controllers\ShippingController')->costbyArea($shipcat->id)[$shippingSubCategoriesSingle->id][$shipping_cost_area['id'][$key]]}}</td>
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













