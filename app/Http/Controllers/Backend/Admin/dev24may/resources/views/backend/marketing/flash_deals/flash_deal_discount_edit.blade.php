@if(count($product_ids) > 0)

        @foreach ($product_ids as $key => $pid) 
      
            @php
              $product = \App\Models\Product::findOrFail($pid);
              $flash_deal_product = \App\Models\FlashDealProduct::where('flash_deal_id', $flash_deal_id)->where('product_id', $product->id)->first();
              if(isset($flash_deal_product->discount)) $discount_val = $flash_deal_product->discount;
              else $discount_val = $product->discount;
            @endphp
            <tr id='p_{{$pid}}' onclick="getSelectedRow()" style="cursor: pointer;">
                <td>
                  <div class="form-group row">
                      <div class="col-auto">
                          <img src="{{ uploaded_asset($product->thumbnail_img)}}" class="size-60px img-fit" >
                      </div>
                      <div class="col">
                          <span>{{  $product->getTranslation('name')  }}</span>
                      </div>
                  </div>
                </td>
                <td>
                    <span>{{ $product->unit_price }}</span>
                </td>
                <td><?php  if(!empty($flash_deal_product)){ $fdp=$flash_deal_product->discount_type; }else{$fdp=$product->discount_type; }         
				$max=0;
				if($fdp == 'amount') {$max=$product->unit_price;}	else	{$max=100;}
				?> 
                <input type="number"  id="discount_{{$product->id}}" onkeyup="set_value_input(this.value,{{$product->id}})"    max="{{$max}}"  lang="en" name="discount_{{ $pid }}" value="{{ $discount_val }}" min="0" step="any" class="form-control" required>                
                 <input type="number" id="table_products"   name="table_products[]" value="{{ $product->id }}" style="display:none" >
				</td>                
                <td>                    
                    
                    <select  id="select_{{$product->id}}"  style="padding: 10px;border: 1px solid #e2e5ec;cursor: pointer;"  class="aiz-selectpicker2" name="discount_type_{{ $pid }}"  onchange="change_percent_amount(this.value,{{$product->id}},{{$product->unit_price}})">
                        <option value="amount" <?php       if($fdp == 'amount') echo "selected"; ?> >{{ translate('Flat') }}</option>
                        <option value="percent"<?php       if($fdp == 'percent') echo "selected";?> >{{ translate('Percent') }}</option>
                    </select>               
                </td>
            </tr>
        @endforeach

@endif
