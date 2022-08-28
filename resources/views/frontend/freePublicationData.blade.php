@extends('frontend.layout.master')
@section('content')
<style>
    
    .callout.callout-danger {
        border-left-color: #2138bd;
    }
    .callout {
        border-radius: 0.25rem;
        box-shadow: 0 1px 3px rgb(0 0 0 / 12%), 0 1px 2px rgb(0 0 0 / 24%);
        background-color: #fff;
        border-left: 5px solid #e9ecef;
        margin-bottom: 1rem;
        padding: 1rem;
    }
</style>
<div class="container w-75">
    <div class="row secondary_sc_content px-2 py-4"> 
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                {{-- <div class="col-xl-3 col-lg-3 col-md-3 col-sm-0 col-xs-0"></div> --}}
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 pb-4">
                    <h3 class="text-center pb-4"><b>Search Free e-publication </b></h3>
                    {{-- <div class="col-12 text-center pb-3"> --}}
                  
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('allDataForFreeBook')}}" method="get">
                                     <div class="form-group row">
                                       <div class="col-md-11">
                                        <select class="form-control step2-select"
                                                    name="e_book" id="e_book" 
                                                    
                                                    data-placeholder="Search free ebook"
                                                    data-select2-id="e_book"
                                                    tabindex="-1" 
                                                    aria-hidden="true"
                                                    data-ajax-url="{{route('searchAjax',['type'=>'book'])}}"
                                                    data-ajax-cache="true"
                                                    data-ajax-dataType="json"
                                                    data-ajax-delay="200">
                                                                                                       
                                        </select>
                                        
                                       </div>
                                       <div class="col-md-1">
                                          <button type="submit" class="btn btn-danger" style="float: right"><i class="fa-solid fa-magnifying-glass"></i></button>
                                       </div>
                                    </div>
                                 </form>
                                 {{-- @if($flag==1) --}}
                                    @if (isset($serviceInventories))
                                        @foreach ($serviceInventories as $book)                                        
                                            <div class="callout callout-danger">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <h5>{{ucfirst($book->title)}}</h5>
                                                        <p>{{ucfirst($book->sub_title)}}</p>
                                                    </div>
                                                    @if($flag==1)
                                                        
                                                        <div class="col-md-4">
                                                            <div class="row">
                                                                <div class="col-md-1">
                                                                    <a href="{{asset('public/storage/pos/ebookcover/'.$book->attach_file)}}" target="_blank">

                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <a href="{{asset('storage/pos/ebook/'.$book->attach_file)}}" download="">

                                                                        <i class="fa fa-download"></i>
                                                                    </a>
                                                                </div>
                                                                
                                                                <div class="col-md-4">
                                                                    
                                                                    <button class="btn btn-success btn-sm"><a style="text-decoration: none; color:inherit;" href="{{route('application.create')}}">Apply For Hard copy</a></button>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                {{-- @elseif($flag==0) --}}
                                    {{-- <div class="row"> --}}
                                        {{-- <div class="col-md-12"> --}}
                                            {{-- <h4 class="text-center" style="color: #c4161c;">Search Your e-book</h4> --}}
                                        {{-- </div> --}}
                                    {{-- </div> --}}
                                {{-- @endif --}}
                            </div>
                            
                        </div>
                    {{-- </div> --}}
                </div>
                {{-- <div class="col-xl-3 col-lg-3 col-md-3 col-sm-0 col-xs-0"></div> --}}

              </div>
          
       </div>
@endsection
@push('frontScript')
    {{-- <script>
        $(document).on("keyup change", ".ajax-data-search", function(e){
            
            e.preventDefault();
            
            var that = $( this );
            var q = e.target.value;
            var url = that.attr("data-url");
            var urls = url+'?q='+q;
            
            $.ajax({
                url: urls,
                type: 'GET',
                cache: false,
                dataType: 'json',
                success: function(response)
                {
                $(".ajax-data-container").empty().append(response.page);
                },
                error: function(){}
            });
        });
    </script> --}}
    <script>
        $('.step2-select').select2({
    
            ajax: {
                data: function (params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    // alert(data[0].s);
                    var data = $.map(data, function (obj) {
                        obj.id = obj.id || obj.id;
                        return obj;
                    });
                    var data = $.map(data, function (obj) {
                        
                        obj.text = obj.title || obj.sub_title;
                        return obj;
                    });
                    return {
                        results: data,
                        pagination: {
                        more: (params.page * 30) < data.total_count
                        }
                    };
                }
            },
        });
        
    </script>
@endpush