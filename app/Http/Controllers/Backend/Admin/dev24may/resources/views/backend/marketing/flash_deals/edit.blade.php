@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">{{translate('Flash Deal Information')}}</h5>
</div>

<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="card">
            <div class="card-body p-0">
              <ul class="nav nav-tabs nav-fill border-light">
                @foreach (\App\Models\Language::all() as $key => $language)
                  <li class="nav-item">
                    <a class="nav-link text-reset @if ($language->code == $lang) active @else bg-soft-dark border-light border-left-0 @endif py-3" href="{{ route('flash_deals.edit', ['id'=>$flash_deal->id, 'lang'=> $language->code] ) }}">
                      <img src="{{ static_asset('assets/img/flags/'.$language->code.'.png') }}" height="11" class="mr-1">
                      <span>{{$language->name}}</span>
                    </a>
                  </li>
                 @endforeach
              </ul>
              <form class="p-4" action="{{ route('flash_deals.update', $flash_deal->id) }}" method="POST">
                @csrf
                  <input type="hidden" name="_method" value="PATCH">
                  <input type="hidden" name="lang" value="{{ $lang }}">

                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{translate('Title')}} <i class="las la-language text-danger" title="{{translate('Translatable')}}"></i></label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="{{translate('Title')}}" id="name" name="title" value="{{ $flash_deal->getTranslation('title', $lang) }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="background_color">{{translate('Background Color')}}<small>(Hexa-code)</small></label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="{{translate('#0000ff')}}" id="background_color" name="background_color" value="{{ $flash_deal->background_color }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-from-label" for="text_color">{{translate('Text Color')}}</label>
                        <div class="col-lg-9">
                            <select name="text_color" id="text_color" class="form-control demo-select2" required>
                                <option value="">Select One</option>
                                <option value="white" @if ($flash_deal->text_color == 'white') selected @endif>{{translate('White')}}</option>
                                <option value="dark" @if ($flash_deal->text_color == 'dark' || $flash_deal->text_color == '') selected @endif>{{translate('Dark')}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Banner')}} <small>(1920x500)</small></label>
                        <div class="col-md-9">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                </div>
                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                <input type="hidden" name="banner" value="{{ $flash_deal->banner }}" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>

                    @php
                      $start_date = date('d-m-Y H:i:s', $flash_deal->start_date);
                      $end_date = date('d-m-Y H:i:s', $flash_deal->end_date);
                    @endphp

                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="start_date">{{translate('Date')}}</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control aiz-date-range" value="{{ $start_date.' to '.$end_date }}" name="date_range" placeholder="Select Date" data-time-picker="true" data-format="DD-MM-Y HH:mm:ss" data-separator=" to " autocomplete="off" required>
                        </div>
                    </div>
                    
                  <!---Flash deal category--->
                  <div class="form-group row">
                      <label class="col-sm-3 col-from-label" for="products">{{translate('Flash Deal Category')}}</label>
                      <div class="col-sm-9">
                          <select name="flashdeal_category"  class="form-control aiz-selectpicker" data-placeholder="{{ translate('Select flash deal category') }}" data-live-search="true" data-selected-text-format="count">
                              <option>Select flash deal category</option>
                              @php
                                  $flashCat = \App\Models\CampaignCategory::get();
                              @endphp
                              @foreach($flashCat as $cat)
                                  @if($flash_deal->category == $cat->id)
                                      <option value="{{$cat->id}}" selected>{{$cat->category_name}}</option>
                                  @else
                                      <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                  @endif
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <!---mostak addition end--->


		  
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="products">{{ translate('Product Category')}}</label>
                        <div class="col-sm-9">
							<select id="product_category"  class="form-control aiz-selectpicker" data-live-search="true"    data-minimum-results-for-search="Infinity" >
								<option value="">{{ translate('Select Category') }}</option>
								@foreach (\App\Models\Category::get() as $category)
								@php if($category->level=='0'){$added='';}  if($category->level=='1'){$added='-';}  if($category->level=='2'){$added='--';} @endphp
									<option  value="{{ $category->id }}">{{$added}} {{ $category->getTranslation('name') }}</option>	 
								@endforeach
							</select>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="products">{{translate('Products')}}</label>
                        <div class="col-sm-9" id="push_product">
                            <select name="products[]" id="products_"  onchange="load_products(this.value)"  class="form-control aiz-selectpicker" multiple required data-placeholder="Choose Products" data-live-search="true" data-selected-text-format="count">
                           
									@php
                                         $flash_deal_product = \App\Models\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->pluck('product_id');
                                    @endphp

									@foreach(\App\Models\Product::select('id','name')->where('published',1)->whereIn('id',$flash_deal_product)->get() as $product)

                                    <option value="{{$product->id}}"  selected >{{ $product->getTranslation('name') }}</option>
									@endforeach
                            </select>
                        </div>
						 <input type="text"    id="initialize_products" value="{{ $flash_deal_product }}" style="display:none" >
                    </div>

                    <div class="alert alert-danger">
                        {{ translate('If any product has discount or exists in another flash deal, the discount will be replaced by this discount & time limit.') }}
                    </div>

                    <br>
                    <div class="form-group" id="discount_table">
					 
					<?php
					/*$data_array=explode(' ',$excel_data);
					$sw=0;
					$error=0;
					$pro_ids=array();
					$previous_pro_id='';
					foreach($data_array as $data_array_){
						echo $data_array_.'<br>';
						if($data_array_>-1){}else{$error=1;}
						
						if($sw==0){//pro_id
							$previous_pro_id=$data_array_;
							
							$sw=1;
						}else{//discount
							$sw=0;	 
							$pro_ids[$previous_pro_id]=$data_array_;		
						}
						
						
					}*/
					
					//print_r($pro_ids);
					?>
					<table  id="table" border="1" class="table table-bordered">
						<thead>
						  <tr>
							<td width="50%">
								<span>{{translate('Product')}}</span>
							</td>
							<td data-breakpoints="lg" width="20%">
								<span>{{translate('Base Price')}}</span>
							</td>
							<td data-breakpoints="lg" width="20%">
								<span>{{translate('Discount')}}</span>
							</td>
							<td data-breakpoints="lg" width="10%">
								<span>{{translate('Discount Type')}}</span>
							</td>
						  </tr>
						</thead>
						<tbody id="my_table_body">
 
						
<div style="position:fixed; left:50%; z-index: 999999; top:50%; width: 3rem; height: 3rem;" id="spinner-border" class="spinner-border " role="status"> <span class="sr-only">Loading...</span></div>
						</tbody>
					</table>

                    </div>

                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
                    </div>
                  </form>
				  
				  
					<div style="position: fixed;right: 10px;top: 50%;display:none;" id="updown">
						<button class="btn button btn-success" onclick="upNdown('up');">↑</button>
						<button class="btn button btn-info" onclick="upNdown('down');">↓</button>
					</div>
		
			  
				  
				  
              </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script type="text/javascript">
	
	var selected_id_collection='<?php echo $flash_deal_product; ?>';
	
			$(document).ready(function(){
				$('#product_category').on('change', function(){
					var category_id = $('#product_category').val();
					$.ajax({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						type:"POST",
						url:'{{ route('flash_deals.get_products_by_category') }}',
						data:{
						   category_id: category_id, selected_id_collection:selected_id_collection
						},
					   success: function(data) {
	 
							$('#push_product').html(data); 
							$('.aiz-selectpicker').selectpicker('refresh');
					   }
				   });							
				});	
			});

			

 
			var sorted_array_initialize = "<?php echo substr(substr($flash_deal_product, 0, -1), 1); ?>";  
			var store_table='';
			var sorted_array=sorted_array_initialize.split(",");
			var previous_data = sorted_array_initialize.split(",");
			
			var initial=1;	 
			load_products(' ');
			function load_products(val){
				$('#spinner-border').fadeIn();
			    var pro_fetch=1;
				var selected = $('#products_').val();	
		
				let different = previous_data.filter(x => !selected.includes(x)).concat(selected.filter(x => !previous_data.includes(x)));
				if(different.length>0){
					if(previous_data.length>0){	
						var index=previous_data.indexOf(different.toString());
						if(parseInt(index)>-1){
							//pop 
							$('#spinner-border').fadeOut();
							var id='p_'+different.toString();
							var removable_tr=$('#'+id)[0].outerHTML;
							store_table = store_table.replace(removable_tr, '');
							document.getElementById('p_'+different.toString()).remove();
							store_table=$('#my_table_body').html();
							pro_fetch=0;
							var temp=[];
							sorted_array.forEach(element => {
								if(parseInt(different)!=parseInt(element)){ temp.push(element); }
							});
							
							sorted_array=temp;

							}else{
								sorted_array.push(different);
							}
					}else{
						sorted_array.push(different);
					}
				}
				previous_data=selected;
				selected_id_collection=selected.toString();
				var product_ids = sorted_array.toString().split(',');
				
				if(initial==0){var product_ids =different.toString().split(',');}
				if(initial==1){initial=0;}
			
				if(product_ids.length > -1){
				 if(pro_fetch==1){
					$.post('{{ route('flash_deals.product_discount_edit') }}', {_token:'{{ csrf_token() }}', product_ids:product_ids, flash_deal_id:{{ $flash_deal->id }}}, function(data){
						var previous='';
						var previous_table_body=$('#my_table_body').html();
						console.log(previous_table_body);
						$('#my_table_body').html(previous_table_body+data);
						$('#spinner-border').fadeOut();
						 
					}); 
				 }
				}
				else{
					$('#my_table_body').html(null);
				}  	
			}		

		   function change_percent_amount(val,id,price){
			   $("#select_"+id+" option[value="+val+"]").attr('selected', 'selected');
			   //disselect another
			   if(val=='amount'){val2='percent';}else{val2='amount';}
			   $("#select_"+id+" option[value="+val2+"]").removeAttr('selected');
			   
			   
			   $("#select_"+id+" option[value="+val+"]").attr('selected', 'selected');
			   
				 if(val=='amount'){
					$("#discount_"+id). attr({ "max" : price,  "min" : 0 });  
				}else{
					$("#discount_"+id). attr({ "max" : 100,  "min" : 0 }); 
				} 
			}
			
			
			function set_value_input(value,id){
				$("#discount_"+id).attr("value",value);
			}

  
            var index;  // variable to set the selected row index
            function getSelectedRow()
            {	
                var table = document.getElementById("table");
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                        // clear the selected from the previous selected row
                        // the first time index is undefined
                        if(typeof index !== "undefined"){
                            table.rows[index].classList.toggle("selectedrow");

                        }else{
							
						}
                       
                        index = this.rowIndex;
                        this.classList.toggle("selectedrow");
 
                    };
                }
				$("#updown").fadeIn();
                    
            }
  

            //getSelectedRow();
            
            
            function upNdown(direction)
            {
                var rows = document.getElementById("table").rows,
                    parent = rows[index].parentNode;
                 if(direction === "up")
                 {
                     if(index > 1){
                        parent.insertBefore(rows[index],rows[index - 1]);
                        // when the row go up the index will be equal to index - 1
                        index--;
                    }
                 }
                 
                 if(direction === "down")
                 {
                     if(index < rows.length -1){
                        parent.insertBefore(rows[index + 1],rows[index]);
                        // when the row go down the index will be equal to index + 1
                        index++;
                    }
                 }
            }
            			
    </script>
@endsection
