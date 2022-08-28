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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Trainer</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted">All Trainer</a>
                        </li>
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
                @include('alerts.alerts')
                <!--begin::Card-->
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <div class="card card-custom example example-compact">
                            <div class="card-header">
                                <h3 class="card-title">Trainer List</h3>
                                {{-- <div class="d-flex align-items-center">                                    
                                    <input type="text" data-url="{{ route('admin.searchAjax',['type'=> 'faq']) }}" class="form-control form-control-lg form-control-solid ajax-data-search" name="q" placeholder="Enter Question or Answer">
                                </div> --}}
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ajax-data-container pt-3">
                                    <table class="table table-separate table-head-custom table-checkable" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th >Photo</th>
                                                <th class="text-left">Name</th>
                                                <th>Phone</th>
                                                <th class="text-left">Email</th>
                                                <th class="text-left">Address</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($trainers->count() > 0)
                                                @php
                                                    $i = (($trainers->currentPage() - 1) * $trainers->perPage() + 1);
                                                @endphp
                                                @foreach ($trainers as $trainer)
                                                    <tr>
                                                        <td>
                                                            {{$i}}
                                                        </td>
                                                        <td >
                                                            <img width="90px" src="{{asset('storage/trainers/'.$trainer->photo)}}" alt="Trainer">
                                                        </td>
                                                        <td align="left">
                                                            {{$trainer->name}} 
                                                        </td>
                                                        
                                                        <td >
                                                            {{$trainer->phone}}
                                                        </td>
                                                        <td align="left">
                                                            {{$trainer->email}}
                                                        </td>
                                                        <td align="left">
                                                            {{$trainer->address}}
                                                        </td>
                                                        <td>
                                                            @if ($trainer->status == 1)
                                                                <span class="label label-lg font-weight-bold label-light-success label-inline">Active</span>
                                                            @else
                                                                <span class="label label-lg font-weight-bold label-light-danger label-inline">Inactive</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @can('edit_trainer')
                                                                
                                                                <a href="{{route('admin.trainer.edit',$trainer->id)}}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                                                                    <i class="la la-edit text-warning"></i>
                                                                </a>

                                                            @endcan
                                    
                                                            @can('trainer_status')

                                                                @if ($trainer->status == 1)
                                                                    
                                                                    <button  class="btn btn-sm btn-clean btn-icon" data-toggle="modal" data-target="#deleteTrainer{{$trainer->id}}">                                                         
                                                                        <i class="la la-trash text-danger"></i>
                                                                    </button>
                                                                @else
                                                                    <button  class="btn btn-sm btn-clean btn-icon" data-toggle="modal" data-target="#deleteTrainer{{$trainer->id}}">                                                         
                                                                        
                                                                        <i class="la la-check-circle text-success la-2x"></i>
                                                                    </button>
                                                                @endif

                                                            @endcan
                                                            
                                                            {{-- delete modal --}}
                                                            <div id="deleteTrainer{{$trainer->id}}" class="modal fade" role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header py-5">
                                                                            <h5 class="modal-title">{{$trainer->status == 1 ? 'Disable' : 'Enable'}} Trainer
                                                                            <span class="d-block text-muted font-size-sm"></span></h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <i aria-hidden="true" class="ki ki-close"></i>
                                                                            </button>
                                                                        </div>
                                                                        <form class="form" action="{{route('admin.trainer.changeStatus',$trainer->id)}}" method="post">
                                                                            <div class="modal-body">
                                                                                    @csrf
                                                                                    <div class="container">
                                                                                        Do you want to {{$trainer->status == 1 ? 'disable' : 'enable'}} Trainer ?
                                                                                    </div>                    
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-sm {{$trainer->status == 1 ? 'btn-danger' : 'btn-primary'}} " type="submit">{{$trainer->status == 1 ? 'Disable' : 'Enable'}}</button>
                                                                                
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $i++;
                                                    @endphp
                                                @endforeach
                                            @else
                                                <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">No matching records found</td></tr>
                                            @endif
                                        </tbody>
                                    </table>                                    
                                </div>
                                {{-- {{$faqs->links()}} --}}
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
</div>
@endsection

