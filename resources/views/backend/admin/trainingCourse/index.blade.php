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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">All Courses</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.index')}}" class="text-muted">Dashboard</a>
                            </li>
                        
                            <li class="breadcrumb-item active">
                                @if($type == "sent_course_list")
                                    <a class="text-muted">Sended For Approval Courses</a>
                                @else
                                    <a class="text-muted">All Courses</a>
                                @endif
                            </li>
                            
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
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
                                @if($type == "sent_course_list")
                                    <h3 class="card-title">Sended For Approval Courses</h3>
                                @else
                                    <h3 class="card-title">All Courses</h3>
                                @endif
                                
                                <div class="d-flex align-items-center">
                                    <div class="row mr-3">
                                        <div class="col-md-12 ">
                                            <select name="fiscal_year" data-select="{{ route('admin.searchAjaxTableList',['type'=> $type]) }}" id="" class="form-control form-control-lg ajax-data-search-fiscal form-control-solid">
                                                <option value="">-- Select Fiscal Year --</option>
                                                @foreach ($allFiscal as $year)
                                                <?php 
                                                    $cy = explode('-', $year->name)[0];     
                                                ?>
                                                    <option value="{{ $year->id }}" @if($cy == $current_fiscal) selected @endif>{{ $year->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">                                        
                                        <div class="col-md-12">
                                            <input type="text" id="{{$type}}" class="calenderListSearchFeaild form-control form-control-lg form-control-solid" name="q" placeholder="Search Course"> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ajax-data-container pt-3">
                                    @include('backend.admin.trainingCourse.ajax.tableBody')                                    
                                </div>
                                {{$courses->links()}}
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@push('stackScript')
<script>
    $('.calenderListSearchFeaild').on('keyup change', function(){
        var type = $(this).attr('id');
        var value = $(this).val();
        var TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "{{ route('admin.allTableDataListSearch') }}",
            type: 'POST',
            dataType: 'text',
            data: {_token: TOKEN, type: type, value:value},
            success: function(data){
                console.log(data)
            }
        })
    })

</script>
@endpush