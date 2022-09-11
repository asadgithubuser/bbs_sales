@if(count($product_ids) > 0)

      @foreach ($product_ids as $key => $id)
      	@php
      		$product = \App\Models\Product::findOrFail($id);
      	@endphp
          <tr id='p_{{$id}}' onclick="getSelectedRow()" style="cursor: pointer;">
            <td>
              <div class="from-group row">
                <div class="col-auto">
                  <img class="size-60px img-fit" src="{{ uploaded_asset($product->thumbnail_img)}}">
                </div>
                <div class="col">
                  <span>{{  $product->getTranslation('name')  }}</span>
                </div>
              </div>
            </td>
            <td>
                <span>{{ $product->unit_price }}</span>
            </td>
             <td>
			 
			 @php 
			 
				$max=0;
				if($product->discount_type == 'amount') {$max=$product->unit_price;}	else	{$max=100;}
				
			 @endphp
			 
                  <input type="number" id="discount_{{$product->id}}" onkeyup="set_value_input(this.value,{{$product->id}})"    max="{{$max}}"  name="discount_{{ $id }}" value="{{ $product->discount }}" min="0" step="any" class="form-control" required>
                  <input type="number"    name="table_products[]" value="{{ $product->id }}" style="display:none" >
              </td>
              <td>
                  <select id="select_{{$product->id}}" class="aiz-selectpicker2" style="padding: 10px;border: 1px solid #e2e5ec;cursor: pointer;" name="discount_type_{{ $id }}"  onchange="change_percent_amount(this.value,{{$product->id}},{{$product->unit_price}})">
                      <option value="amount" <?php if($product->discount_type == 'amount') echo "selected";?> >{{ translate('Flat') }}</option>
                      <option value="percent" <?php if($product->discount_type == 'percent') echo "selected";?> >{{ translate('Percent') }}</option>
                  </select>
              </td>
          </tr>
      @endforeach

@endif
