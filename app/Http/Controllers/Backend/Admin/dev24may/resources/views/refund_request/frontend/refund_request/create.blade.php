@extends('frontend.layouts.app')

@section('content')

    <section class="py-5">
        <div class="container">
            <div class="d-flex align-items-start">
                @include('frontend.inc.user_side_nav')
                <div class="aiz-user-panel">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6">{{translate('Send Refund Request')}}</h5>
                        </div>
                        <div class="card-body">
                          <form class="" action="{{route('refund_request_send', $order_detail->id)}}" method="POST" enctype="multipart/form-data" id="choice_form">
                              @csrf
                              <div class="form-box bg-white mt-4">
                                  <div class="form-box-content p-3">
                                      <div class="row">
                                          <div class="col-md-3">
                                              <label>{{translate('Product Name')}} <span class="text-danger">*</span></label>
                                          </div>
                                          <div class="col-md-9">
                                              <input type="text" class="form-control mb-3" name="name" placeholder="{{translate('Product Name')}}" value="{{ $order_detail->product->getTranslation('name') }}" readonly>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-3">
                                              <label>{{translate('Product Price')}} <span class="text-danger">*</span></label>
                                          </div>
                                          <div class="col-md-9">
                                              <input type="number" class="form-control mb-3" name="name" placeholder="{{translate('Product Price')}}" value="{{ $order_detail->product->unit_price }}" readonly>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-3">
                                              <label>{{translate('Order Code')}} <span class="text-danger">*</span></label>
                                          </div>
                                          <div class="col-md-9">
                                              <input type="text" class="form-control mb-3" name="code" value="{{ $order_detail->order->code }}" readonly>
                                          </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-3">
                                            <label>{{translate('Select Refund Reason')}} <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                             
                                            <select class="form-control aiz-selectpicker mb-3" name="reason_select" id="reason_select" data-live-search="true" required>   
                                                <option   value="">--Select Refund Reason--</option>                                             
                                                <option   value="Not as advertised">Not as advertised</option>
                                                <option   value="Item defective">Item defective</option>
                                                <option   value="Wrong item">Wrong item</option>
                                                <option   value="Missing parts/accessories">Missing parts/accessories</option>
                                                <option   value="Wrong size">Wrong size</option>
                                                <option   value="Missing free items">Missing free items</option>
                                            </select>

                                        </div>
                                    </div>

                                      <div class="row">
                                          <div class="col-md-3">
                                              <label>{{translate('Refund Reason Explain')}}</label>
                                          </div>
                                          <div class="col-md-9">
                                              <textarea name="reason" rows="8" class="form-control mb-3"></textarea>
                                          </div>
                                      </div>

@php
    $order_id=$order_detail->order_id;
    $order_payment_type=APP\Models\Order::where('id', $order_id)->firstOrFail()->payment_type;    
@endphp


                                      <div class="row">
                                        <div class="col-md-3">
                                            <label>{{translate('Select Refund Method')}} <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                             
                                            <select class="form-control aiz-selectpicker mb-3" name="refund_method" id="refund_method" data-live-search="true" required>                                                
                                                <option   value="Wallet">Wallet</option>
                                                
@if($order_payment_type=='cash_on_delivery')
                                                <option   value="Bank">Bank</option>
                                                <option   value="Mobile Financial Service">Mobile Financial Service</option>

@else                                               
                                               <option   value="SSLCommerz">SSLCommerz</option>
@endif                                                

                                            </select>

                                        </div>
                                    </div>


                                    <div class="row" style="display:none" id="bank_option">
                                        <div class="col-md-3">
                                            <label>{{translate('Bank Credentials')}} <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                             
                                              <div class="form-group">
                                                <label for="email">Bank name:<span class="text-danger">*</span></label>
                                                <input type="text" name="bank_credentials[]" class="form-control" placeholder="Enter Bank name" id="">
                                              </div>
                                              <div class="form-group">
                                                <label for="pwd">Branch Name:<span class="text-danger">*</span></label>
                                                <input type="text"  name="bank_credentials[]"  class="form-control" placeholder="Enter Branch Name" id="">
                                              </div> 
                                              <div class="form-group">
                                                <label for="email">Account Name:<span class="text-danger">*</span></label>
                                                <input type="text"  name="bank_credentials[]"  class="form-control" placeholder="Enter Account Name" id="">
                                              </div>
                                              <div class="form-group">
                                                <label for="pwd">Account Number:<span class="text-danger">*</span></label>
                                                <input type="text"  name="bank_credentials[]"  class="form-control" placeholder="Enter Account Number" id="">
                                              </div>


                                        </div>
                                    </div>




                                    <div class="row" style="display:none" id="mfs_option">
                                        <div class="col-md-3">
                                            <label>{{translate('MFS Credentials')}} <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-9">                                            
                                              <div class="form-group">
                                                <label for="email">Select MFS:<span class="text-danger">*</span></label>
                                                <select  name="mfs_credentials[]"  class="form-control aiz-selectpicker mb-3" name="refund_method" id="refund_method" data-live-search="true" >                                                
                                                    <option   value="Bkash">Bkash</option>
                                                    <option   value="Nagad">Nagad</option>
                                                    <option   value="Rocket">Rocket</option>
                                                </select>                                            
                                              </div>
                                              <div class="form-group">
                                                <label for="pwd">Account Number:<span class="text-danger">*</span></label>
                                                <input name="mfs_credentials[]"  type="text" class="form-control" placeholder="Enter Account Number" id="">
                                              </div> 
                                        </div>
                                    </div>




                                      <div class="form-group mb-0 text-right">
                                          <button type="submit" class="btn btn-primary">{{translate('Send Request')}}</button>
                                      </div>
                                  </div>
                              </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

@section('script')
    <script type="text/javascript">
        $(function () {
            $("#refund_method").change(function () {
                var selectedText = $(this).find("option:selected").text();
                var selectedValue = $(this).val();
                if(selectedValue=='Wallet' || selectedValue=='SSLCommerz'){
                    
                    $("#bank_option").css("display","none")
                    $("#mfs_option").css("display","none")
                }               
                if(selectedValue=='Bank'){
                    
                    $("#bank_option").toggle();
                }else{
                    $("#bank_option").css("display","none")
                }

                if(selectedValue=='Mobile Financial Service'){
                    $("#mfs_option").toggle();
                    
                }else{
                    $("#mfs_option").css("display","none")
                }

            });
        });
    </script>
@endsection