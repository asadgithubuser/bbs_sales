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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Assign For Survey</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">Dashboard</a>
                            </li>


                            <li class="breadcrumb-item active">
                                <a class="text-muted">Assign For Survey</a>
                            </li>
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
                        <!--begin::Card-->
                        <div class="card card-custom example example-compact">
                            <div class="card-header w3-blue">
                                <h3 class="card-title text-white">Assign For Survey</h3>
                            </div>
                            <form action="{{ route('admin.form.update',$list) }}" method="post">
                                <div class="card-body">
                                    @csrf
                                    
                                    <input type="hidden" value="{{ $form->id }}" name="form_id">
                                    <div class="row">
                                       
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-form-label text-right col-lg-4 col-sm-12">Officers:</label>
                                                <div class="col-lg-5 col-sm-12">
                                                    <select name="officer" id="" class="form-control select2">
                                                        @if ($list->survey_by)
                                                            <option value="{{ $list->survey_by }}">
                                                                {{ ucfirst($list->surveyBy->first_name) . ' ' . ucfirst($list->surveyBy->middle_name) . ' ' . ucfirst($list->surveyBy->last_name) }}
                                                            </option>
                                                            @foreach ($officersLists as $officer)
                                                            <option selected value="{{ $officer->id }}">
                                                                {{ ucfirst($officer->first_name) . ' ' . ucfirst($officer->middle_name) . ' ' . ucfirst($officer->last_name) }}
                                                            </option>
                                                            @endforeach
                                                        @else 
                                                        <option value="">--Select Officer--</option>

                                                        @foreach ($officersLists as $officer)
                                                            <option value="{{ $officer->id }}">
                                                                {{ ucfirst($officer->first_name) . ' ' . ucfirst($officer->middle_name) . ' ' . ucfirst($officer->last_name) }}
                                                            </option>
                                                            @endforeach
                                                        @endif
                                                        
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-form-label text-right col-lg-4 col-sm-12">Unions:</label>
                                                <div class="col-lg-5 col-sm-12">
                                                    <select name="union_id" id="union_id" class="form-control select2">
                                                        

                                                        @if ($list->union_id)
                                                            <option selected value="{{ $list->union_id }}">
                                                                {{ ucfirst($list->union->name_en) }}
                                                            </option>
                                                            @foreach ($unions as $union)
                                                            <option value="{{ $union->id }}">{{ $union->name_en }}
                                                            </option>
                                                        @endforeach
                                                        @else 
                                                        <option value="">--Select Union--</option>
                                                        @foreach ($unions as $union)
                                                            <option value="{{ $union->id }}">{{ $union->name_en }}
                                                            </option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label text-right col-lg-4 col-sm-12">Mouzas:</label>
                                                <div class="col-lg-5 col-sm-12">
                                                    <select name="mouza_id" id="mouza_id" 
                                                        class="form-control select2">
                                                        @if ($list->mouja_id)
                                                            <option value="{{ $list->mouja_id }}">
                                                                {{ ucfirst($list->mouza->name_en) }}
                                                            </option>
                                                            @foreach ($mouzas as $item)
                                                            <option  value="{{ $item->id }}">
                                                                {{ ucfirst($item->name_en) }}
                                                            </option>
                                                            @endforeach
                                                        @endif
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-9 text-right">

                                        </div>
                                        <div class="col-lg-3 text-right">
                                            <button type="submit" class="btn btn-primary font-weight-bold"
                                                name="submitButton">Update</button>
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
