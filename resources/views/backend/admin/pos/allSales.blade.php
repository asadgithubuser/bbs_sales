@extends('backend.layout.master')

@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">All Sales</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}" class="text-muted">Dashboard</a>
                        </li>
                        @can('manage_storage')
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.pos.allSales') }}" class="text-muted">All Sales</a>
                            </li>
                        @endcan
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--session msg-->
            @include('alerts.alerts')
            <!--begin::Card-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Sales</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive ajax-data-container-product">
                                @include('backend.admin.pos.ajax.salesTable')
                            </div>
                            {{ $orders->links() }}
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>
</div>
    
@endsection