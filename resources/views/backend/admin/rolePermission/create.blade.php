@extends('backend.layout.master')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">অনুমতি বরাদ্দ করুন</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}" class="text-muted">ড্যাশবোর্ড</a>
                        </li>
                        @can('assign_permission_list')
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.rolePermission.index')}}" class="text-muted">ভূমিকা এবং অনুমতি</a>
                            </li>
                        @endcan
                        <li class="breadcrumb-item active">
                            <a class="text-muted">অনুমতি বরাদ্দ করুন</a>
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
                            <h3 class="card-title">অনুমতি বরাদ্দ করুন</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" action="{{route('admin.rolePermission.store')}}" method="post" id="kt_form_1">
                                @csrf
                                <div class="card-body">
                                    <div class="alert alert-custom alert-light-danger d-none" role="alert" id="kt_form_1_msg">
                                    </div>
                                    <div class="form-group row">
                                       <div class="col-md-4">
                                            <div class="row">
                                                <label class="col-form-label text-right col-lg-2 col-sm-12">ভূমিকা <span style="color: red;">*</span> </label>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <select class="form-control" name="role" id="role" required>
                                                        <option >--ভূমিকা নির্বাচন করুন--</option>
                                                        @foreach ($roles as $role)
                                                            <option value="{{$role->id}}">{{ucfirst($role->name_en)}}</option>                                                            
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                       </div>
                                       <div class="col-md-8">
                                            <div class="radio-inline ml-5">
                                                <label class="radio radio-square">
                                                    <input type="checkbox" name="all-checked" id="all-checked"/>
                                                    <span></span>
                                                    অনুমতি <p style="color: red;" class="mt-2">*</p>
                                                </label>
                                            </div>
                                           {{-- <label class="col-form-label col-lg-4 col-sm-12 pl-3">অনুমতি <span style="color: red;">*</span> </label> --}}
                                                    <div class="row">
                                                        @foreach ($permissions as $permission)
                                                        <div class="col-md-6">
                                                            <div class="radio-inline ml-5">
                                                                <label class="radio radio-square">
                                                                    <input type="checkbox" value="{{$permission->id}}" name="permission[]"/>
                                                                    <span></span>
                                                                    {{ucfirst(str_replace('_', ' ', $permission->name_en))}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                           </div>
                                       </div>
                                    </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-10 text-right">
                                            <button type="submit" class="btn btn-primary font-weight-bold" name="submitButton">সংরক্ষণ করুন</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('stackScript')
    <script>
        $( document ).ready(function() {
            $('#all-checked').click(function(event) {
            if(this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;
                });
            }
            else {
                $(':checkbox').each(function() {
                    this.checked = false;
                });
            }
            });
        });
    </script>
@endpush