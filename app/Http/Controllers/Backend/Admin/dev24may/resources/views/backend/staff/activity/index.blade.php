@extends('backend.layouts.app')

@section('content')
    @php
        $refund_request_addon = \App\Models\Addon::where('unique_identifier', 'refund_request')->first();
    @endphp

    <!--
<div class="row gutters-10">
    <div class="col-lg-12">
        <div class="row gutters-10">
			@foreach (App\Models\UserActivity::orderBy('id', 'desc')->groupBy('user_id')->get() as $user)
        <div class="col-2">
            <div class="bg-grad-3 text-white rounded-lg mb-2 pb-2 overflow-hidden">
                <a class="payac" href="#">
                    <div class="px-3 pt-3">
                        <span class="fs-12 d-block">{{ $user->user_name }}</span>
							<div class="h3 fw-700">{{ \App\Models\UserActivity::where('user_id')->count() }}</div>
						</div>
					</a>
                </div>
            </div>
			@endforeach


        </div>
    </div>
</div>
-->

    <div class="card">
        <form class="" id="sort_orders" action="" method="GET">
            <div class="card-header row gutters-5">
                <div class="col text-center text-md-left">
                    <h5 class="mb-md-0 h6">{{ translate('Staff Activity') }}</h5>
                </div>
            </div>
        </form>
        <div class="card-body">
            <table class="table table-bordered invoice-summary">
                <thead>
                <tr class="bg-trans-dark">
                    <th class="min-col">#</th>
                    <th class="min-col text-center">User Name</th>
                    <th class="min-col text-center">Date & Time</th>
                    <th class="text-center">Order Code</th>
                    <th class="text-center">Activity</th>
                    <th class="text-center" width="15%">Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($user_activity as $key => $useractivity)
                    <tr>
                        <td class="text-center"> {{ ($key+1) + ($user_activity->currentPage() - 1)*$user_activity->perPage() }}</td>
                        <td class="text-center">{{ $useractivity->user_name }}</td>
                        <td class="text-center">{{ date('d-m-Y h:i A', $useractivity->date) }}</td>
                        <td class="text-center">{{ $useractivity->orderID }}</td>
                        <td class="text-center">{{ ucfirst(str_replace('_', ' ', $useractivity->activity)) }}</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('user_activity.destroy', $useractivity->id)}}" title="{{ translate('Delete') }}">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>



            <div class="aiz-pagination">
                {{ $user_activity->appends(request()->input())->links() }}
            </div>
        </div>
    </div>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection

@section('script')
    <script type="text/javascript">
        function sort_orders(el){
            $('#sort_orders').submit();
        }
    </script>
@endsection

