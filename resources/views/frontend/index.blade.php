@extends('frontend.layout.master')
    @section('content')

           <div class="container w-75">
              <div class="row secondary_sc_content px-2 py-4">  
    
              <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12">
              <div class="row">
                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center pb-3">
                    @include('frontend.partials.message')
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                       <ol class="carousel-indicators">
                         <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                         <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                         <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                       </ol>
                       <div class="carousel-inner">
                         <div class="carousel-item active">
                           <img class="d-block w-100" src="{{asset('frontend/assets/images/slider/National-Portal-Card-PM.jpeg')}}" alt="First slide">
                         </div>
                         <div class="carousel-item">
                           <img class="d-block w-100" src="{{asset('frontend/assets/images/slider/National-Portal-Card-PM.jpeg')}}" alt="Second slide">
                         </div>
                         <div class="carousel-item">
                           <img class="d-block w-100" src="{{asset('frontend/assets/images/slider/National-Portal-Card-PM.jpeg')}}" alt="Third slide">
                         </div>
                       </div>
                       <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                         <span class="sr-only">Previous</span>
                       </a>
                       <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                         <span class="carousel-control-next-icon" aria-hidden="true"></span>
                         <span class="sr-only">Next</span>
                       </a>
                    </div>
                 </div>
    
                 <div class="col-12 text-center pb-3">
                    <h3 style="font-weight: 800;
                    font-size: 30px;
                    border-bottom: 2px solid #904097;
                    padding-bottom: 8px;
                }">Our Services</h3>
                 </div>
    
                 @foreach ($services as $service)
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 text-center pb-3">
                     <a href="{{route('service', $service->id)}}" class="card-link">
                        <div class="sc_animate">
                        <div class="sc_box" style="background-color: #5bba5b; padding: 20px 0px">
                           <h5 class="pb-4 pt-4" style="color: white;margin-top: 10px; font-size: 23px;">
                              {{ $service->name_en }}
                           </h5>
                        </div>
                        </div>
                     </a>
                  </div>
                 @endforeach

                 <div class="col-12">
                  {{-- Search panel --}}
                  <form action="{{route('search')}}" method="GET">
                     @csrf
                     <div class="form-group row">
                        <div class="col-md-8">
                           <input type="text" name="search_item" class="form-control text-left" placeholder="Search Your Desired Census/Survey Data">
                        </div>
                        <div class="col-md-1 text-left">
                           <button type="submit" class="btn btn-danger"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                        <div class="col-md-3 text-right">
                           <a href="{{route('application.create')}}" class="btn btn-success">Advance Search</a>
                        </div>
                        {{-- <div class="col-md-1"></div> --}}
                     </div>
                  </form>
                 </div>
    
                 <div class="col-12 text-center">
                    <h3 style="font-weight: 800;
                    font-size: 30px;
                    border-bottom: 2px solid #904097;
                    padding-bottom: 8px;
                }">Notices</h3>
                 </div>
    
                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center pb-3">
                    
                  @foreach ($notices as $notice)
                     @if ($notice->exp_date >= date("Y-m-d"))
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border:1px solid #ccc; margin-top: 8px; padding: 5px 20px; height: 30px;">
                           <span style="float: left; margin-right: 10px;">{{$notice->title}}: </span>
                           <div id="example" style="overflow: hidden; position: relative; height: 30px;">
                              <ul style="border: 0px solid red; position: absolute; margin: 0px; padding: 0px;">  
                                 <li style="margin: 0px; padding: 0px;">
                                    <p style="font-weight: 500">{!! custom_name($notice->detail,100) !!}
                                       <span>
                                          <a href="{{ route('notice',$notice->id) }}">Read More</a>
                                       </span>
                                    </p>
                                 </li>
                                 
                              </ul>
                           </div>
                        </div>
                     @endif                            
                  @endforeach
                    
    
                 </div>
    
              </div>
              
           </div>

    @endsection