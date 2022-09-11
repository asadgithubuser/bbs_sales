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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">নতুন বিজ্ঞপ্তি তৈরি করুন</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}" class="text-muted">ড্যাশবোর্ড</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.notice.index')}}" class="text-muted">সকল বিজ্ঞপ্তি</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted">নতুন বিজ্ঞপ্তি তৈরি করুন</a>
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
                                <h3 class="card-title">নতুন বিজ্ঞপ্তি তৈরি করুন</h3>
                            </div>

                            <!--begin::Form-->
                            <form class="form" action="{{route('admin.notice.store')}}" method="post" id="kt_form_1">
                                @csrf

                                <div class="card-body">
                                    <div class="alert alert-custom alert-light-danger d-none" role="alert" id="kt_form_1_msg">
                                        
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label class="col-form-label text-right">শিরোনাম: <span class="text-danger">*</span></label>
                                           
                                                <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" placeholder="Enter Notice Title" value="{{old('title')}}" required/>
                                          
                                        </div>
    
                                        <div class="form-group col-sm-6">
                                            <label class="col-form-label text-right">বিস্তারিত: <span class="text-danger">*</span></label>
                                           
                                                <textarea type="text" class="form-control  {{ $errors->has('detail') ? ' is-invalid' : '' }}" name="detail" placeholder="Enter Notice Details"  required>{{old('detail')}}</textarea>
                                          
                                        </div>
    
                                        <div class="form-group col-sm-6">
                                            <label class="col-form-label text-right">মেয়াদ উত্তীর্ণের তারিখ: <span class="text-danger">*</span></label>
    
                                             <input type="date" class="form-control  {{ $errors->has('date') ? ' is-invalid' : '' }}" name="date"  required>
                                            
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class="col-form-label text-right"></label>
                                            
                                            <div class="radio-inline">
                                                <label class="radio radio-square">
                                                    <input type="checkbox" name="status">
                                                    <span></span>
                                                    সক্রিয় করুন
                                                </label>
                                                                                                            
                                            </div>
                                            
                                        </div>
                                    </div>

                    

                                

                                    
                                </div>

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-right">
                                            <button type="submit" class="btn btn-primary font-weight-bold" name="submitButton">সংরক্ষণ করুন</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--end::Form-->
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