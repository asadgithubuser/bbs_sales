@extends('backend.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Flash Deal Information')}}</h5>
				<p id="tt"></p>
            </div>
            <div class="card-body">
                <form action="{{ route('flash_deals.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="name">{{translate('Title')}}</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="{{translate('Title')}}" id="name" name="title" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="background_color">{{translate('Background Color')}} <small>(Hexa-code)</small></label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="{{translate('#FFFFFF')}}" id="background_color" name="background_color" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label" for="name">{{translate('Text Color')}}</label>
                        <div class="col-lg-9">
                            <select name="text_color" id="text_color" class="form-control aiz-selectpicker" required>
                                <option value="">{{translate('Select One')}}</option>
                                <option value="white">{{translate('White')}}</option>
                                <option value="dark">{{translate('Dark')}}</option>
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
                                <input type="hidden" name="banner" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                            <span class="small text-muted">{{ translate('This image is shown as cover banner in flash deal details page.') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="start_date">{{translate('Date')}}</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control aiz-date-range" name="date_range" placeholder="Select Date" data-time-picker="true" data-format="DD-MM-Y HH:mm:ss" data-separator=" to " autocomplete="off" required>
                        </div>
                    </div>
                    
                    <!---Flash deal category--->
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="products">{{translate('Flash Deal Category')}}</label>
                        <div class="col-sm-9">
                            <select name="flashdeal_category"  class="form-control aiz-selectpicker" data-placeholder="{{ translate('Select flash deal category') }}" data-live-search="true" data-selected-text-format="count">
                                <option>Select flash deal category</option>
                                @foreach(\App\Models\CampaignCategory::get() as $cat)
                                    <option value="{{$cat->id}}">{{$cat->category_name}}</option>
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

 


                    <div class="form-group row mb-3">
                        <label class="col-sm-3 control-label" for="products">{{translate('Products')}}</label>
                        <div class="col-sm-9" id="push_product">
							<span><i>Select a product category for load products</i></span>
                        </div>
                    </div>

                    <div class="alert alert-danger">
                        {{ translate('If any product has discount or exists in another flash deal, the discount will be replaced by this discount & time limit.') }}
                    </div>
                    <br>
                    
                    <div class="form-group" id="discount_table">
						<table class="table table-bordered"   id="table" border="1">
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
	
	    /*Start select option product load*/ 
		var selected_id_collection='';
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
						$('.this_product_load').selectpicker('refresh');
				   }
			   });	 						
			});	
        });
		/*End select option product load*/
		
		
		
		/*Start table product*/ 
		var store_table='';
		var initial=1;
		var previous_data=[];
		var sorted_array=[];
		function load_products(val){
			var pro_fetch=1;
			var selected = $('#products_').val();		
			let different = previous_data.filter(x => !selected.includes(x)).concat(selected.filter(x => !previous_data.includes(x)));
				 
			if(previous_data.length>0){	
				var index=previous_data.indexOf(different.toString());
				if(parseInt(index)>-1){
							//pop 
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
						//push 
						sorted_array.push(different);
					}
			}else{
				//push
				sorted_array.push(different);
			}
			
			
			previous_data=selected;
		    selected_id_collection=selected.toString();
			var product_ids = sorted_array.toString().split(',');
			if(initial==0){var product_ids =different.toString().split(',');}
			if(initial==1){initial=0;}
			
			 if(product_ids.length > -1){
				 if(pro_fetch==1){
					$.post('{{ route('flash_deals.product_discount') }}', {_token:'{{ csrf_token() }}', product_ids:product_ids}, function(data){
						var previous='';
						var previous_table_body=$('#my_table_body').html();
						console.log(previous_table_body);
						$('#my_table_body').html(previous_table_body+data);
						 
						
						AIZ.plugins.fooTable();
					});					 
				 }
			}
			else{
				$('#discount_table').html(null);
			}  
			}
			/*End table product*/ 
	
	 		
		
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
                        }
                       
                        index = this.rowIndex;
                        this.classList.toggle("selectedrow");

                    };
                }
				$("#updown").fadeIn();
                    
            }			
			
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
