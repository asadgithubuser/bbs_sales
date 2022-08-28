@extends('frontend.layout.master')
    @section('content')

           <div class="container w-75">
            <div class="row secondary_sc_content px-2 py-4">  
    
              <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12">
              <div class="row">
                
                <div class="col-12 pb-4 pt-4">
                    @include('frontend.partials.message')
                    @foreach ($serviceItems as $item)
                        <div class="card mb-2" style="box-shadow: 0px 0px 3px 0px;">
                            <div class="card-body">
                                <h5 class="card-title">Item Name: {{$item->item_name_en}}</h5>
                                <h6 class="card-subtitle mb-2">Item Price: {{$item->price_usd_personal < 1 ? "Free" : $item->price_usd_personal}} USD <i><b>(BBS authorities can give discount)</b></i></h6>
                                <p class="card-text" style="font-weight: 500">
                                    {{Str::limit($item->description, 100, ' ...')}}

                                    <button type="button" class="btn btn-sm btn-primary" style="cursor:pointer" data-toggle="modal" data-target="#itemPreview{{$item->id}}">Preview</button>
                                    
                                </p>
                            </div>
                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="itemPreview{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document" style="margin-top: 5%; max-width: 80%;">
                                <div class="modal-content" style="height: 80vh;">
                                    <div class="modal-header" style="padding: 20px 60px;">
                                        <img src="{{asset('frontend/assets/images/bbs_logo.png')}}" class="img-fluid" style="width: 95px;">
                                        <span style="color:red;">Bangladesh Bureau of Statistics</span>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" class="btn btn-sm btn-danger">Close</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" style="padding: 20px 80px;">
                                        <h3 class="modal-title" id="exampleModalLabel">{{$item->item_name_en}} </h3>
                                        <h5>Item Price: {{$item->price < 1 ? "Free" : $item->price}}</h5>
                                        <hr>
                                        <p style="font-weight: 500">{{$item->description}}</p>

                                        <div class="row">
                                            <div class="col-md-6">
                                                @if ($item->sample_attachment)
                                                    <h2><a href="{{ asset('storage/service/item/' . $item->sample_attachment) }}" class="sample_data_btn" download>Download Sample Data</a></h2>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <h2><a href="{{ route('application.create') }}" class="app_purchase_btn">Purchase</a></h2>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>


                    @endforeach

                </div>

              </div>
              
           </div>


    @endsection
    