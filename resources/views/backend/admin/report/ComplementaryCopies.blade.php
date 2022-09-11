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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Report</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">Dashboard</a>
                            </li>
                            @can('report')
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.report.ComplementaryCopies') }}" class="text-muted">Complementary Copies Report</a>
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
        <!--end::Subheader-->

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--session msg-->
                @include('alerts.alerts')
                <!--begin::Card-->
                <div class="row">
                    <div class="col-12">
                        <!--begin::Card-->
                        <div class="card card-custom example example-compact">
                            <div class="card-header">
								<h3 class="card-title">Complementary Copies Report</h3>
							</div>

                            <div class="card-body">
								<div class="table-responsive ajax-data-container pt-3">
									<table class="table table-separate table-head-custom table-checkable table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th class="text-left">Title</th>
                                                <th>Total Stock</th>
                                                <th>Given</th>
                                                <th>Remaining</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                            @foreach ($items as $item)
                                                @php
                                                    $totalStock = $item->number_of_complimentary_copies;
                                                    $totalGiven = 0;
                                                    $remainingStock = 0;

                                                    foreach ($item->requisitionItems as $value)
                                                    {
                                                        $totalGiven += $value->quantity;
                                                    }

                                                    $totalStock = $item->number_of_complimentary_copies + $totalGiven;
                                                    $remainingStock = $totalStock - $totalGiven;
                                                @endphp
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td align="left">{{$item->title}}</td>
                                                    <td>{{$totalStock == null ? 0 : $totalStock}}</td>
                                                    <td>{{$totalGiven == null ? 0 : $totalGiven}}</td>
                                                    <td>{{$remainingStock == null ? 0 : $remainingStock}}</td>
                                                </tr>
                                            @php
                                                $i++;
                                            @endphp
                                    
                                            @endforeach
                                        </tbody>
                                    </table>
								</div>
                                {{$items->links()}}
							</div>
                            
                            <div class="card-footer">
								<a href="{{route('admin.report.ComplementaryCopyPreview')}}" class="btn btn-secondary float-right">Preview</a>
							</div>

                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

@endsection
