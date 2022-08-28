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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">পদবী</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}" class="text-muted">ড্যাশবোর্ড</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-muted">পদবী যুক্ত করুন</a>
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
            <!--begin::Card-->
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Card-->
                    <div class="card card-custom example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">পদবী যুক্ত করুন</h3>
                        </div>

                        <form class="form" action="{{ route('admin.designation.store') }}" method="post" id="kt_form_1">
                            <div class="card-body">
                                @csrf

                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label class="col-form-label text-right">পদবীর শিরোনাম (বাংলায়):  <span class="text-danger">*</span></label>
                                       
                                            <input type="text" class="form-control {{ $errors->has('title_bn') ? ' is-invalid' : '' }}" name="title_bn" placeholder="বাংলায় শিরোনাম লিখুন" value="{{old('title_bn')}}" required/>
                                       
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="col-form-label text-right">পদবীর শিরোনাম (ইংরেজিতে):  <span class="text-danger">*</span></label>
                                   
                                            <input type="text" class="form-control {{ $errors->has('title_en') ? ' is-invalid' : '' }}" name="title_en" placeholder="ইংরেজিতে শিরোনাম লিখুন" value="{{old('title_en')}}" required/>
                                        
                                    </div>
    
                                    {{-- <div class="form-group col-sm-6">
                                        <label class="col-form-label text-right">অফিস:  <span class="text-danger">*</span></label>
                                        
                                            
                                            <select name="office" id="" class="form-control {{ $errors->has('office') ? ' is-invalid' : '' }}">
                                                <option value="">-- Select One --</option>
                                                @foreach ($offices as $office)
                                                    <option value="{{$office->id}}">{{$office->title_en}} ({{$office->title_bn}})</option>
                                                    
                                                @endforeach
                                            </select>
    
                                       
                                    </div> --}}
    
                                    
                                    <div class="form-group col-sm-6">
                                        <label class="col-form-label text-right">ধাপ:  <span class="text-danger">*</span></label>
                                        
                                            <select name="level" class="form-control" id="">
                                                <option value="">--একটা নির্বাচন করুন--</option>
                                                @foreach ($levels as $level)
                                                <option value="{{$level->id}}">{{$level->name_en}}({{$level->name_bn}})</option>
                                                    
                                                @endforeach
                                            </select>
                                       
                                    </div>
    
                                    <div class="form-group col-sm-6">
                                        <label class="col-form-label text-right">পদক্রম: <span class="text-danger"> *</span></label>
                                        
                                            <input type="number" class="form-control {{ $errors->has('ordering') ? ' is-invalid' : '' }}" name="ordering" placeholder="পদবি পদক্রম লিখুন" value="{{old('ordering')}}" required/>
                                        
                                    </div>
    
                                    <div class="form-group col-sm-6">
                                        <label class="col-form-label text-right">বিবরণ: <span class="text-danger"> *</span></label>
                                       
                                            <textarea type="text" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" placeholder="বিস্তারিত লিখুন"></textarea>
                                        
                                    </div>
                                </div>
                            

                            </div>

                            <div class="card-footer"> 
                                <div class="form-group row">
                                    <div class="col-lg-12 text-right">
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
@endsection