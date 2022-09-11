@extends('backend.layouts.app')

@section('content')

    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">{{translate('All Flash Deals Category')}}</h1>
            </div>
            <!---author mostak--->
            <div class="col-md-6 text-md-right">
                <a href="{{ route('add-campaign-category') }}" class="btn btn-circle btn-info">
                    <span>{{translate('Add Category')}}</span>
                </a>
            </div>
            <!---end--->
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">{{translate('Flash Deals Category')}}</h5>
            <div class="pull-right clearfix">
                <form class="" id="sort_flash_deals" action="" method="GET">
                    <div class="box-inline pad-rgt pull-left">
                        <div class="" style="min-width: 200px;">
                            <input type="text" class="form-control" id="search" name="search"@isset($search_key) value="{{ $search_key }}" @endisset placeholder="{{ translate('Type name & Enter') }}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <table class="table aiz-table mb-0" >
                <thead>
                <tr>
                    <th>{{translate('Title')}}</th>
                    <th data-breakpoints="lg">{{ translate('Banner') }}</th>
                    <th data-breakpoints="lg">{{ translate('Status') }}</th>
                    <th data-breakpoints="lg">{{ translate('Page Link') }}</th>
                    <th class="text-right">{{translate('Options')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->category_name }}</td>
                        <td><img src="{{ uploaded_asset($category->banner) }}" alt="banner" class="h-50px"></td>
                        <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="update_flash_deal_cat_status(this)" value="{{ $category->id }}" type="checkbox" @if($category->status == 1) checked @endif >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>{{ route('flashDealsByCat',strtolower(str_replace(' ','-',$category->category_name))) }}</td>
                        <td class="text-right">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('edit-campaign-category', $category->id )}}" title="{{ translate('Edit') }}">
                                <i class="las la-edit"></i>
                            </a>
                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('flash-cat-destroy', $category->id)}}" title="{{ translate('Delete') }}">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                <div class="pull-right">
                    {{ $categories->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection

@section('script')
    <script type="text/javascript">
        function update_flash_deal_cat_status(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('flash-cat-status') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    location.reload();
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }
    </script>
@endsection
