@extends('backend.layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">{{translate('Product Bulk Upload')}}</h5>
        </div>
        <div class="card-body">


			
            <br>
            <div class="">
                <a href="{{ route('pdf.download_category') }}"><button class="btn btn-info">{{translate('Download Category')}}</button></a>
                <a href="{{ route('pdf.download_brand') }}"><button class="btn btn-info">{{translate('Download Brand')}}</button></a>
                <a href="{{ route('pdf.download_seller') }}"><button class="btn btn-info">{{translate('Download Seller')}}</button></a>
				          
                <a href="{{ static_asset('download/product_bulk_demo.xlsx') }}" download><button class="btn btn-info">{{ translate('Sample Upload .xlsx')}}</button></a>
            
            </div>
            <br>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6"><strong>{{translate('Upload Product File')}}</strong></h5>
        </div>
        <div class="card-body">			
		    <div class="alert" style="margin-bottom:15px !important; color: #004085;background-color: #ffff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                <strong># Bulk Upload Documentation</strong>
 <table style="border-collapse: collapse; width: 100%; height: 162px;" border="1">
<tbody>
<tr style="height: 18px;">
<td style="width: 8.38068%; height: 18px;">&nbsp;</td>
<td style="width: 31.9601%; height: 18px;">Option</td>
<td style="width: 39.2047%; height: 18px;">Required Field</td>
<td style="width: 20.4545%; height: 18px;">Note</td>
</tr>
<tr style="height: 18px;">
<td style="width: 8.38068%; height: 18px;">1</td>
<td style="width: 31.9601%; height: 18px;">Shipping Related Update</td>
<td style="width: 39.2047%; height: 18px;">id, shipping_type, shipping_cost, est_shipping_days</td>
<td style="width: 20.4545%; height: 18px;">
<ol>
<li><strong>shipping_type&nbsp;</strong>should be:&nbsp;weight_based/free/category_wise/flat_rate&nbsp;<em>otherwise</em>&nbsp;<em>error message showed.</em></li>
<li><strong>shipping_cost&nbsp;</strong>Always Numeric.</li>
<li>If&nbsp;<strong>shipping_type</strong>&nbsp;not empty and&nbsp;<strong>shipping_cost</strong>&nbsp;empty then product not updated except&nbsp;<strong>shipping_type</strong>&nbsp;is&nbsp;free</li>
<li>If&nbsp;<strong>shipping_type</strong>&nbsp;is&nbsp;free&nbsp;then&nbsp;<strong>shipping_cost&nbsp;</strong>default<strong>&nbsp;0</strong></li>
</ol>
</td>
</tr>
<tr style="height: 18px;">
<td style="width: 8.38068%; height: 18px;">2</td>
<td style="width: 31.9601%; height: 18px;">Price Related Update</td>
<td style="width: 39.2047%; height: 18px;">id, unit_price, purchase_price, discount, discount_type</td>
<td style="width: 20.4545%; height: 18px;">
<ol>
<li>discount&nbsp;should be numeric or empty</li>
<li>unit_price&nbsp;and&nbsp;purchase_price&nbsp;can not be empty</li>
<li>discount_type&nbsp;value Should be&nbsp;amount&nbsp;or&nbsp;percent</li>
</ol>
</td>
</tr>
<tr style="height: 18px;">
<td style="width: 8.38068%; height: 18px;">3</td>
<td style="width: 31.9601%; height: 18px;">Information Related Update</td>
<td style="width: 39.2047%; height: 18px;">id, name, description, unit, tags, sku, current_stock, min_qty, max_qty, refundable, published, approved</td>
<td style="width: 20.4545%; height: 18px;">
<ol>
<li>Empty field not updated</li>
</ol>
</td>
</tr>
<tr style="height: 18px;">
<td style="width: 8.38068%; height: 18px;">4</td>
<td style="width: 31.9601%; height: 18px;">Category Update</td>
<td style="width: 39.2047%; height: 18px;">id, category_id</td>
<td style="width: 20.4545%; height: 18px;">&nbsp;</td>
</tr>
<tr style="height: 18px;">
<td style="width: 8.38068%; height: 18px;">5</td>
<td style="width: 31.9601%; height: 18px;">Seller Update</td>
<td style="width: 39.2047%; height: 18px;">id, seller_id</td>
<td style="width: 20.4545%; height: 18px;">&nbsp;</td>
</tr>
<tr style="height: 18px;">
<td style="width: 8.38068%; height: 18px;">6</td>
<td style="width: 31.9601%; height: 18px;">Brand Update</td>
<td style="width: 39.2047%; height: 18px;">id, brand_id</td>
<td style="width: 20.4545%; height: 18px;">&nbsp;</td>
</tr>
<tr style="height: 18px;">
<td style="width: 8.38068%; height: 18px;">7</td>
<td style="width: 31.9601%; height: 18px;">#Bulk Create</td>
<td style="width: 39.2047%; height: 18px;">name, category_id, current_stock, unit_price, purchase_price, thumbnail_img, gallery1</td>
<td style="width: 20.4545%; height: 18px;"> View "Sample Upload .xlsx"<br></td> 
</tr>
<tr style="height: 18px;">
<td style="width: 8.38068%; height: 18px;">8</td>
<td style="width: 31.9601%; height: 18px;">#Order Update</td>
<td style="width: 39.2047%; height: 18px;">invoice_no, delivery_status, payment_status, order_comments</td>
<td style="width: 20.4545%; height: 18px;">

<ol>
<li><strong>delivery_status&nbsp;</strong>should be:&nbsp;pending/confirmed/picked_up/on_the_way/delivered/cancelled&nbsp;<em>otherwise</em>&nbsp;<em>error message showed.</em></li>
<li><strong>payment_status&nbsp;</strong>should be:&nbsp;paid/unpaid&nbsp;<em>otherwise</em>&nbsp;<em>error message showed.</em></li>
<li><strong></strong>Empty column not updated.</em></li>
</ol>

</td> 
</tr>

</tbody>
</table>
<form class="form-horizontal" action="{{ route('bulk_product_upload') }}" style="margin-top:20px" enctype="multipart/form-data" method="POST">        

 
 

		   @csrf 
                <div class="form-group row">
                    <div class="col-sm-9">
                        <div class="custom-file">
    						<label class="custom-file-label">
    							<input type="file" name="bulk_file" class="custom-file-input" required>
    							<span class="custom-file-name">{{ translate('Choose File')}}</span>
    						</label>
    					</div>
                    </div>
					 <div class="col-sm-3">
					 <select name="mode" class="form-control aiz-selectpicker">
						  <option disabled selected value="" style="color:gray">Select Upload Mode</option>
						  <option value="shipping_related">1. Shipping Related Update </option>
						  <option value="price">2. Price Related Update </option>
						  <option value="pro_info">3. Information Related Update</option>
						  <option value="cat_update">4. Category Update</option>
						  <option value="seller_update">5. Seller Update</option>
						  <option value="brand_update">6. Brand Update</option>
						  
						  <option value="pro_upload">#Bulk Create</option>
						  <option value="order_update">8. Order Update</option>
					</select>
					 </div>
                </div>
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-info">{{translate('Upload .xlsx')}}</button>
                </div>
            </form>
			
  
			
        </div>
    </div>
 

@endsection
