@extends('frontend.layout.master')
@section('content')
<div class="container w-75">
    <div class="row secondary_sc_content px-2 py-4">  

    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12">
    <div class="row">

       <div class="col-12 pb-4">
          <div class="card">
              <div class="card-header text-center">
                <h3 class="card-title"><b>{{ ucfirst($notice->title) }}</b></h3>
              </div>
              <div class="card-body">
                <p style="font-weight: 500">{{ ucfirst($notice->detail) }}</p>
              </div>
          </div>
       </div>

    </div>
    
 </div>
@endsection
