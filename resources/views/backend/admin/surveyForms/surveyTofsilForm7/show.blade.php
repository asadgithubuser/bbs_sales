
@extends('backend.layout.master')

@push('css')
    <style> 
        .table th, .table td{
            border-top: none !important;
            font-size: 1.5em;
        }
        .table thead th{
            font-size: 1.5em;
        }
        tbody#tbl_posts_body label {
            height: 40px;
        }
    </style>
@endpush

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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">প্রধান ফসলের মূল্য ও উৎপাদন খরচ জরিপ তফসিল (তফসিল-৭)</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">ড্যাশবোর্ড</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a class="text-muted">প্রধান ফসলের মূল্য ও উৎপাদন খরচ জরিপ তফসিল (তফসিল-৭)</a>
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
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <div class="card card-custom example example-compact">
                            <div class="card card-custom gutter-b example example-compact">
                                <div class="card-header">
                                    <h3 class="card-title">প্রধান ফসলের মূল্য ও উৎপাদন খরচ জরিপ তফসিল (তফসিল-৭)</h3>
                                    
                                    <div class="card-toolbar">

                                    </div>
                                </div>
                                <!--begin::Form-->
                                <form>
                                    
                                    <div class="card-body">
                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">সাধারণ তথ্য</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="farmer_id"style="font-size: 1.5em; font-weight: bold;"><b>বর্তমান ভূমি খন্ড ব্যাবহারকারী/চাষির নামঃ </b></label>
                                                            @if($surveyTofsilForm7Data->farmer_id)
                                                                <input class="form-control" value="{{ $surveyTofsilForm7Data->farmer ? $surveyTofsilForm7Data->farmer->farmers_name : '' }}" name="farmer_id" id="farmer_id" disabled/>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="pot_of_land"style="font-size: 1.5em; font-weight: bold;"><b> ভূমি খন্ডের সংক্ষেত নংঃ </b></label>
                                                            <input class="form-control" type="number" value="{{ $surveyTofsilForm7Data->pot_of_land }}" name="pot_of_land" id="pot_of_land" disabled/>
                                                        
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;"> 
                                                        <div class="form-group row">
                                                            <label for="crops_id" style="font-size: 1.5em; font-weight: bold;"><b> ফসলের নামঃ </b></label>
                                                            
                                                            @if (isset($surveyNotification))
                                                                @if ($surveyNotification->crop_id != '')
                                                                    <input type="text" class="form-control form-control-lg" value="{{ $surveyNotification->crop ? ucfirst($surveyNotification->crop->name_en) : '' }}" disabled>
                                                                @endif

                                                            @else
                                                                <input type="text" class="form-control form-control-lg" value="{{ $surveyTofsilForm7Data->crop ? ucfirst($surveyTofsilForm7Data->crop->name_en) : '' }}" disabled>
                                                            @endif
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="crop_varieties" style="font-size: 1.5em; font-weight: bold;"><b>ফসলের জাতঃ </b></label>
                                                            @if ($surveyTofsilForm7Data->crop_varieties == 1)
                                                                <input type="text" class="form-control form-control-lg" value="দেশি" disabled>
                                                            @elseif ($surveyTofsilForm7Data->crop_varieties == 2)
                                                                <input type="text" class="form-control form-control-lg" value="উফশী" disabled>
                                                            @elseif ($surveyTofsilForm7Data->crop_varieties == 3)
                                                                <input type="text" class="form-control form-control-lg" value="হাইব্রিড" disabled>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="collection_start_date" style="font-size: 1.5em; font-weight: bold;"><b>তথ্য সংগ্রহের শুরু সময়কালঃ </b></label>
                                                            <input class="form-control" type="date" name="collection_start_date" value="{{ $surveyTofsilForm7Data->collection_start_date }}" id="collection_start_date" disabled/>
                                                        </div> 
                                                    </div> 

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="collection_end_date" style="font-size: 1.5em; font-weight: bold;"><b>তথ্য সংগ্রহের শেষ সময়কালঃ </b></label>
                                                            <input class="form-control"  value="{{ $surveyTofsilForm7Data->collection_end_date }}" type="date" name="collection_end_date" id="collection_end_date" disabled/>
                                                        </div> 
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">জমির ভাড়া/লিজ খরচ</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">

                                                        <div class="form-group row">
                                                            <label for="amount_of_cultivable_land_cluster_or_outside_cluster"style="font-size: 1.5em; font-weight: bold;"><b> দাগগুচ্ছ/দাগগুচ্ছ বহির্ভূত আবাদকৃত জমির পরিমাণ (একরে): </b></label>
                                                            <input class="form-control" type="number" value="{{ $surveyJomirRent->amount_of_cultivable_land_cluster_or_outside_cluster ?? '' }}" name="amount_of_cultivable_land_cluster_or_outside_cluster" id="amount_of_cultivable_land_cluster_or_outside_cluster" disabled/>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="land_type" style="font-size: 1.5em; font-weight: bold;"><b>জমির ধরন: </b></label>
                                                            @if ($surveyJomirRent->land_type == 1)
                                                                <input class="form-control"  value="নিজস্ব" name="land_type" id="land_type" disabled/>
                                                            @elseif ($surveyJomirRent->land_type == 2)
                                                                <input class="form-control"  value="বর্গা" name="land_type" id="land_type" disabled/>
                                                            @elseif ($surveyJomirRent->land_type == 3)
                                                                <input class="form-control"  value="ভাড়া/লিজকৃত" name="land_type" id="land_type" disabled/>
                                                            @endif
                                                        </div>

                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">

                                                        <div class="form-group row">
                                                            <label for="land_rent_amount" style="font-size: 1.5em; font-weight: bold;"><b> আনুমানিক কত টাকা ভাড়া হতে পারে? :</b></label>
                                                            <input class="form-control" value="{{ $surveyJomirRent->land_rent_amount ?? '' }}" type="number"  name="land_rent_amount" id="land_rent_amount" disabled />
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="approximate_rent_amount" style="font-size: 1.5em; font-weight: bold;"><b> শুধু এ ফসলের জন্য আনুমানিক ভাড়া কত? (টাকা) : </b></label>
                                                            
                                                            <input class="form-control" type="number" name="approximate_rent_amount" value="{{ $surveyJomirRent->approximate_rent_amount ?? '' }}" id="approximate_rent_amount" disabled/>
                                                        
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="area_rent_amount_per_year" style="font-size: 1.5em; font-weight: bold;"><b> এলাকায় একর প্রতি বছরে ভাড়া (টাকা): </b></label>
                                                            <input class="form-control" value="{{ $surveyJomirRent->area_rent_amount_per_year }}" type="number"  name="area_rent_amount_per_year" id="area_rent_amount_per_year" disabled/>
                                                        
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">জমির কর্ষ/চাষ করা</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                           
                                                <div class="row">
                                                    <div class="col-md-12" style="padding-left: 35px; padding-right:35px;">

                                                        <table class="table table-bordered"> 
                                                            <thead> 
                                                                <tr>
                                                                    <th style="text-align: left">জমি কর্ষণ/চাষের ধরন</th>
                                                                    <th>সংখ্যা</th>
                                                                    <th>খরচ (টাকা)</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody> 
                                                                <tr> 
                                                                    <td align="left">নিজস্ব হাল/বলদ</td>
                                                                    <td><input class="form-control" type="number" value="{{ $surveyJomiChasKora->own_korshon_quantity ?? '' }}" name="own_korshon_quantity" id="own_korshon_quantity" disabled/></td>
                                                                    <td><input class="form-control" value="{{ $surveyJomiChasKora->own_korshon_amount ?? '' }}" type="number" name="own_korshon_amount" id="own_korshon_amount" disabled /></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td align="left">ভাড়া করা হাল/বলদ</td>
                                                                    <td><input class="form-control" type="number" value="{{ $surveyJomiChasKora->rent_korshon_quantity }}" name="rent_korshon_quantity" id="rent_korshon_quantity" disabled /></td>
                                                                    <td><input class="form-control" type="number" value="{{ $surveyJomiChasKora->rent_korshon_amount }}" name="rent_korshon_amount" id="rent_korshon_amount" disabled /></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td align="left">পাওয়ার টিলার/ট্রাক্টর ভাড়া</td>
                                                                    <td><input class="form-control" type="number"  value="{{ $surveyJomiChasKora->power_tiler_korshon_quantity }}" name="power_tiler_korshon_quantity" id="power_tiler_korshon_quantity" disabled /></td>
                                                                    <td><input class="form-control" type="number" value="{{ $surveyJomiChasKora->power_tiler_korshon_amount }}" name="power_tiler_korshon_amount" id="power_tiler_korshon_amount" disabled /></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td align="left">শ্রমিক মজুরী (কর্ষণের/চাষের কাজে)</td>
                                                                    <td><input class="form-control" value="{{ $surveyJomiChasKora->sromik_mojuri_quantity }}" type="number" name="sromik_mojuri_quantity" id="sromik_mojuri_quantity" disabled /></td>
                                                                    <td><input class="form-control" value="{{ $surveyJomiChasKora->sromik_mojuri_amount }}" type="number" name="sromik_mojuri_amount" id="sromik_mojuri_amount" disabled /></td>
                                                                    
                                                                </tr>

                                                                <tr> 
                                                                    <td align="left">পারিবারিক শ্রমিক (কর্ষণের/চাষের সময় কাজ)</td>
                                                                    <td><input class="form-control" type="number" value="{{ $surveyJomiChasKora->paribarik_sromik_quantity }}" name="paribarik_sromik_quantity" id="paribarik_sromik_quantity" disabled /></td>
                                                                    <td><input class="form-control" type="number" value="{{ $surveyJomiChasKora->paribarik_sromik_amount }}" name="paribarik_sromik_amount" id="paribarik_sromik_amount" disabled /></td>
                                                                </tr>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>   
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">বীজ/চারার খরচ</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                           
                                                <div class="row">
                                                    <div class="col-md-12" style="padding-left: 35px; padding-right:35px;">
                                                        <table class="table table-bordered"> 
                                                            <thead> 
                                                                <tr>
                                                                    <th rowspan="2">বীজ/চারার ধরন</th>
                                                                    <th colspan="4">বীজ/চারার উৎস</th>
                                                                    <th colspan="2">বীজ/চারার মোট পরিমাণ</th>
                                                                    <th colspan="2">মূল্য (টাকা)</th>
                                                                </tr>

                                                                <tr>
                                                                    <th>নিজস্ব</th>
                                                                    <th>ক্রয়ক্রিত</th>
                                                                    <th>প্রনোদনা</th>
                                                                    <th>দান</th>

                                                                    <th>কেজি</th>
                                                                    <th>আটি</th>

                                                                    <th>বীজ</th>
                                                                    <th>চারা</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody> 
                                                                <tr> 
                                                                    <td>বীজ (কেজি)</td>
                                                                    <td>
                                                                        <input class="form-control" type="number" value="{{ $surveySeed->seeds_own_source }}" name="seeds_own_source" id="seeds_own_source" disabled />
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" type="number" value="{{ $surveySeed->seeds_sellable_source }}" name="seeds_sellable_source" id="seeds_sellable_source" disabled />
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveySeed->seeds_incentive_source }}" type="number" name="seeds_incentive_source" id="seeds_incentive_source" disabled />
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveySeed->seeds_donated_source }}" type="number" name="seeds_donated_source" id="seeds_donated_source" disabled />
                                                                    </td>

                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveySeed->seed_quantity }}" type="number" name="seed_quantity" id="seed_quantity" disabled />
                                                                    </td>
                                                                    <td>------</td>
                                                                    
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveySeed->seed_value }}" type="number" name="seed_value" id="seed_value" disabled />
                                                                    </td>
                                                                    <td>------</td>
                                                                </tr>
                                                                
                                                                <tr> 
                                                                    <td>চারা (আটি সংখ্যা)</td>
                                                                    <td>------</td>
                                                                    <td><input class="form-control" type="number" value="{{ $surveySeed->seedlings_sellable_source }}" name="seedlings_sellable_source" id="seedlings_sellable_source" disabled /></td>
                                                                    <td><input class="form-control" type="number" value="{{ $surveySeed->seedlings_incentive_source }}" name="seedlings_incentive_source" id="seedlings_incentive_source" disabled /></td>
                                                                    <td><input class="form-control" type="number" value="{{ $surveySeed->seedlings_donated_source }}" name="seedlings_donated_source" id="seedlings_donated_source" disabled /></td>
                                                                    
                                                                    <td>------</td>
                                                                    <td><input class="form-control"  value="{{ $surveySeed->seedling_quantity }}" type="number" name="seedling_quantity" id="seedling_quantity" disabled /></td>
                                                                    
                                                                    <td>------</td>
                                                                    <td><input class="form-control" value="{{ $surveySeed->seedlings_value }}" type="number" name="seedlings_value" id="seedlings_value" disabled /></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td>বীজ নিজস্ব হলে চারা উৎপাদনের খরচ </td>
                                                                    <td>------</td>
                                                                    <td>------</td>
                                                                    <td>------</td>
                                                                    <td>------</td>
                                                                    
                                                                    <td>------</td>
                                                                    <td><input class="form-control" value="{{ $surveySeed->when_own_seed_quantity }}" type="number" name="when_own_seed_quantity" id="when_own_seed_quantity" disabled /></td>
                                                                    
                                                                    <td>------</td>
                                                                    <td><input class="form-control" value="{{ $surveySeed->when_own_seed_value }}" type="number" name="when_own_seed_value" id="when_own_seed_value" disabled /></td>
                                                                </tr>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">সার বাবদ খরচ</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12" style="padding-left: 35px; padding-right:35px;">
                                                        <table class="table table-bordered"> 
                                                            <thead> 
                                                                <tr>
                                                                    <th>অজৈব সার</th>
                                                                    <th>পরিমাণ (কেজি)</th>
                                                                    <th>খরচ (টাকা)</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody> 
                                                                <tr> 
                                                                    <td>ইউরিয়া</td>
                                                                    <td><input class="form-control" value="{{ $surveyFertilizerCost->uriya_quantity }}" type="number" name="uriya_quantity" id="uriya_quantity" disabled /></td>
                                                                    <td><input class="form-control" value="{{ $surveyFertilizerCost->uriya_cost }}" type="number" name="uriya_cost" id="uriya_cost" disabled /></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td>টিএসপি</td>
                                                                    <td><input class="form-control" value="{{ $surveyFertilizerCost->tsp_quantity }}" type="number" name="tsp_quantity" id="tsp_quantity" disabled /></td>
                                                                    <td><input class="form-control" value="{{ $surveyFertilizerCost->tsp_cost }}" type="number" name="tsp_cost" id="tsp_cost" disabled /></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td>এমওপি</td>
                                                                    <td><input class="form-control" value="{{ $surveyFertilizerCost->mop_quantity }}" type="number" name="mop_quantity" id="mop_quantity" disabled /></td>
                                                                    <td><input class="form-control" value="{{ $surveyFertilizerCost->mop_cost }}" type="number" name="mop_cost" id="mop_cost" disabled /></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td>ডিএপি</td>
                                                                    <td><input class="form-control" value="{{ $surveyFertilizerCost->dap_quantity }}" type="number" name="dap_quantity" id="dap_quantity" disabled /></td>
                                                                    <td><input class="form-control" value="{{ $surveyFertilizerCost->dap_cost }}" type="number" name="dap_cost" id="dap_cost" disabled /></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td>জিপসাম</td>
                                                                    <td><input class="form-control" value="{{ $surveyFertilizerCost->gypsum_quantity }}" type="number" name="gypsum_quantity" id="gypsum_quantity" disabled /></td>
                                                                    <td><input class="form-control" value="{{ $surveyFertilizerCost->gypsum_cost }}" type="number" name="gypsum_cost" id="gypsum_cost" disabled /></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td>নিক্সসার</td>
                                                                    <td><input class="form-control" value="{{ $surveyFertilizerCost->nixar_quantity }}" type="number" name="nixar_quantity" id="nixar_quantity" disabled /></td>
                                                                    <td><input class="form-control" value="{{ $surveyFertilizerCost->nixar_cost }}" type="number" name="nixar_cost" id="nixar_cost" disabled /></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td>অন্যান্য অজৈব সার</td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveyFertilizerCost->other_inorganic_quantity }}" type="number" name="other_inorganic_quantity" id="other_inorganic_quantity" disabled />
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveyFertilizerCost->other_inorganic_cost }}" type="number" name="other_inorganic_cost" id="other_inorganic_cost" disabled />
                                                                    </td>
                                                                </tr>
                                                                
                                                            </tbody>
                                                        </table>

                                                        <table class="table table-bordered mt-2"> 
                                                            <thead> 
                                                                <tr>
                                                                    <th>জৈব সার</th>
                                                                    <th>পরিমাণ (কেজি)</th>
                                                                    <th>খরচ (টাকা)</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody> 
                                                                <tr> 
                                                                    <td>গোবর</td>
                                                                    <td><input class="form-control" value="{{ $surveyFertilizerCost->gobor_quantity }}" type="number" name="gobor_quantity" id="gobor_quantity" disabled /></td>
                                                                    <td><input class="form-control" value="{{ $surveyFertilizerCost->gobor_cost }}" type="number" name="gobor_cost" id="gobor_cost" disabled /></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td>ছাই</td>
                                                                    <td><input class="form-control" value="{{ $surveyFertilizerCost->ash_quantity }}" type="number" name="ash_quantity" id="ash_quantity" disabled /></td>
                                                                    <td><input class="form-control" value="{{ $surveyFertilizerCost->ash_cost }}" type="number" name="ash_cost" id="ash_cost" disabled /></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td>সবুজ সার</td>
                                                                    <td><input class="form-control" value="{{ $surveyFertilizerCost->green_quantity }}" type="number" name="green_quantity" id="green_quantity" disabled /></td>
                                                                    <td><input class="form-control" value="{{ $surveyFertilizerCost->green_cost }}" type="number" name="green_cost" id="green_cost" disabled /></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td>অন্যান্য অজৈব সার</td>
                                                                    <td><input class="form-control" value="{{ $surveyFertilizerCost->other_organic_quantity }}" type="number" name="other_organic_quantity" id="other_organic_quantity" disabled /></td>
                                                                    <td><input class="form-control" value="{{ $surveyFertilizerCost->other_organic_cost }}" type="number" name="other_organic_cost" id="other_organic_cost" disabled /></td>
                                                                </tr>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">সেচ পদ্ধতি</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                           
                                                <div class="row">
                                                    <div class="col-md-12" style="padding-left: 35px; padding-right:35px;">
                                                        <table class="table table-bordered"> 
                                                            <thead> 
                                                                <tr>
                                                                    <th>খরচের খাত</th>
                                                                    <th>শ্রমিক সংখ্যা</th>
                                                                    <th>খরচ (টাকা)</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody> 
                                                                <tr> 
                                                                    <td>সেচ পদ্ধতি (ডিপ/শ্যালো টিউবওয়েল, পাওয়ার পাম্প)</td>
                                                                    <td>------</td>
                                                                    <td><input class="form-control" value="{{ $surveyIrrigationProcess->tubewell_cost }}" type="number" name="tubewell_cost" id="tubewell_cost" disabled /></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td>চাপকল/দোন</td>
                                                                    <td><input class="form-control" value="{{ $surveyIrrigationProcess->chapcol_worker_list }}" type="number" name="chapcol_worker_list" id="chapcol_worker_list" disabled /></td>
                                                                    <td><input class="form-control" value="{{ $surveyIrrigationProcess->chapcol_cost }}" type="number" name="chapcol_cost" id="chapcol_cost" disabled /></td>
                                                                </tr>

                                                                <tr> 
                                                                    <td>সেচের জন্য জ্বালানী/ডিজেল/পেট্রোল/বিদ্যুৎ</td>
                                                                    <td>------</td>
                                                                    <td><input class="form-control" value="{{ $surveyIrrigationProcess->jalani_cost }}" type="number" name="jalani_cost" id="jalani_cost" disabled /></td>
                                                                </tr>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">শ্রমিক খরচ</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                           
                                                <div class="row">
                                                    <div class="col-md-12" style="padding-left: 35px; padding-right:35px;">
                                                        <table class="table table-bordered"> 
                                                            <thead> 
                                                                <tr>
                                                                    <th rowspan="2">শ্রমিক খরচের বিবরণ</th>
                                                                    <th colspan="2">শ্রমিকের সংখ্যা</th>
                                                                    <th rowspan="2">মোট শ্রমিক মজুরী (টাকা)</th>
                                                                </tr>

                                                                <tr> 
                                                                    <th>পারিবারিক শ্রমিক</th>
                                                                    <th>ভাড়া শ্রমিক</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody> 
                                                                <tr> 
                                                                    <td>চারা রোপন/বপন</td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveyWorkerCost->seedling_family_worker_no }}" type="number" name="seedling_family_worker_no" id="seedling_family_worker_no" disabled />
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveyWorkerCost->seedling_hired_worker_no }}" type="number" name="seedling_hired_worker_no" id="seedling_hired_worker_no" disabled />
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveyWorkerCost->seedling_total_worker_cost }}" type="number" name="seedling_total_worker_cost" id="seedling_total_worker_cost" disabled />
                                                                    </td>
                                                                </tr>
                                                                
                                                                <tr> 
                                                                    <td>নিড়ানি</td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveyWorkerCost->nirani_family_worker_no }}" type="number" name="nirani_family_worker_no" id="nirani_family_worker_no" disabled />
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveyWorkerCost->nirani_hired_worker_no }}" type="number" name="nirani_hired_worker_no" id="nirani_hired_worker_no" disabled />
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveyWorkerCost->nirani_total_worker_cost }}" type="number" name="nirani_total_worker_cost" id="nirani_total_worker_cost" disabled />
                                                                    </td>
                                                                </tr>

                                                                <tr> 
                                                                    <td>ফসল কর্তন</td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveyWorkerCost->crop_cutting_family_worker_no }}" type="number" name="crop_cutting_family_worker_no" id="crop_cutting_family_worker_no" disabled />
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveyWorkerCost->crop_cutting_hired_worker_no }}" type="number" name="crop_cutting_hired_worker_no" id="crop_cutting_hired_worker_no" disabled />
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveyWorkerCost->crop_cutting_total_worker_cost }}" type="number" name="crop_cutting_total_worker_cost" id="crop_cutting_total_worker_cost" disabled />
                                                                    </td>
                                                                </tr>

                                                                <tr> 
                                                                    <td>ফসল মারাই/ঝারাই</td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveyWorkerCost->crop_marai_family_worker_no }}" type="number" name="crop_marai_family_worker_no" id="crop_marai_family_worker_no" disabled />
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveyWorkerCost->crop_marai_hired_worker_no }}" type="number" name="crop_marai_hired_worker_no" id="crop_marai_hired_worker_no" disabled />
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveyWorkerCost->crop_marai_total_worker_cost }}" type="number" name="crop_marai_total_worker_cost" id="crop_marai_total_worker_cost" disabled />
                                                                    </td>
                                                                </tr>

                                                                <tr> 
                                                                    <td>পাট ফসলের জাক দেয়া/কাঠি থেকে আঁশ ছাড়ানো</td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveyWorkerCost->jute_family_worker_no }}" type="number" name="jute_family_worker_no" id="jute_family_worker_no" disabled />
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveyWorkerCost->jute_hired_worker_no }}" type="number" name="jute_hired_worker_no" id="jute_hired_worker_no" disabled />
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveyWorkerCost->jute_total_worker_cost }}" type="number" name="jute_total_worker_cost" id="jute_total_worker_cost" disabled />
                                                                    </td>
                                                                </tr>

                                                                <tr> 
                                                                    <td>অন্যান্য</td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveyWorkerCost->other_family_worker_no }}" type="number" name="other_family_worker_no" id="other_family_worker_no" disabled />
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveyWorkerCost->other_hired_worker_no }}" type="number" name="other_hired_worker_no" id="other_hired_worker_no" disabled/>
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveyWorkerCost->other_total_worker_cost }}" type="number" name="other_total_worker_cost" id="other_total_worker_cost" disabled />
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>  
 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">কীটনাশক ও বালাইনাশক খরচ</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                           
                                                <div class="row">
                                                    <div class="col-md-12" style="padding-left: 35px; padding-right:35px;">
                                                        <table class="table table-bordered"> 
                                                            <thead> 
                                                                <tr>
                                                                    <th>কীটনাশকের নাম</th>
                                                                    <th>পরিমাণ (মিলি লিটারে লিখুন)</th>
                                                                    <th>খরচ (টাকা)</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody> 
                                                                <tr> 
                                                                    <td>সুমিথিয়ন</td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveyPesticideCost->sumithion_quantity }}" type="number" name="sumithion_quantity" id="sumithion_quantity" disabled />
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveyPesticideCost->sumithion_cost }}" type="number" name="sumithion_cost" id="sumithion_cost" disabled />
                                                                    </td>
                                                                </tr>
                                                                <tr> 
                                                                    <td>ম্যালাথিয়ন</td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveyPesticideCost->malathion_quantity }}" type="number" name="malathion_quantity" id="malathion_quantity" disabled />
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveyPesticideCost->malathion_cost }}" type="number" name="malathion_cost" id="malathion_cost" disabled />
                                                                    </td>
                                                                </tr>
                                                                <tr> 
                                                                    <td>বাসুডিন</td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveyPesticideCost->basudin_quantity }}" type="number" name="basudin_quantity" id="basudin_quantity" disabled />
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $surveyPesticideCost->basudin_cost }}" type="number" name="basudin_cost" id="basudin_cost" disabled />
                                                                    </td>
                                                                </tr>
                                                                <tr> 
                                                                    <td>ফুরাডান</td>
                                                                    <td><input class="form-control" value="{{ $surveyPesticideCost->furadon_quantity }}" type="number" name="furadon_quantity" id="furadon_quantity" disabled /></td>
                                                                    <td><input class="form-control" value="{{ $surveyPesticideCost->furadon_cost }}" type="number" name="furadon_cost" id="furadon_cost" disabled /></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td>ফুরানল</td>
                                                                    <td><input class="form-control" value="{{ $surveyPesticideCost->furanol_quantity }}" type="number" name="furanol_quantity" id="furanol_quantity" disabled /></td>
                                                                    <td><input class="form-control" value="{{ $surveyPesticideCost->furanol_cost }}" type="number" name="furanol_cost" id="furanol_cost" disabled /></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td>অন্যান্য</td>
                                                                    <td><input class="form-control" value="{{ $surveyPesticideCost->other_quantity }}" type="number" name="other_quantity" id="other_quantity" disabled /></td>
                                                                    <td><input class="form-control" value="{{ $surveyPesticideCost->other_cost }}" type="number" name="other_cost" id="other_cost" disabled /></td>
                                                                <tr> 
                                                            </tbody>
                                                        </table>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">পরিবহন খরচ</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                           
                                                <div class="row">
                                                    <div class="col-md-12" style="padding-left: 35px; padding-right:35px;">
                                                        <table class="table table-bordered mt-2"> 
                                                            <thead> 
                                                                <tr>
                                                                    <th>খাতের নাম</th>
                                                                    <th>খরচ (টাকা)</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody> 
                                                                <tr> 
                                                                    <td>জমির কর্ষ/চাষ করার সামগ্রী পরিবহন</td>
                                                                    <td><input class="form-control" value="{{ $surveyTransportCost->land_things_transport_cost }}" type="number" name="land_things_transport_cost" id="land_things_transport_cost" disabled /></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td>বীজ/চারা জমিতে নিয়ে আসার জন্য পরিবহন</td>
                                                                    <td><input class="form-control" value="{{ $surveyTransportCost->seed_transport_cost }}" type="number" name="seed_transport_cost" id="seed_transport_cost" disabled /></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td>সার পরিবহন</td>
                                                                    <td><input class="form-control" value="{{ $surveyTransportCost->fertilizer_transport_cost }}" type="number" name="fertilizer_transport_cost" id="fertilizer_transport_cost" disabled /></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td>সেচ সংক্রান্ত সরঞ্জামাদি পরিবহন</td>
                                                                    <td><input class="form-control" value="{{ $surveyTransportCost->irrigation_transport_cost }}" type="number" name="irrigation_transport_cost" id="irrigation_transport_cost" disabled /></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td>কীটনাশক ও বালাইনশক পরিবহন</td>
                                                                    <td><input class="form-control" value="{{ $surveyTransportCost->pesticide_transport_cost }}" type="number" name="pesticide_transport_cost" id="pesticide_transport_cost" disabled /></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td>অন্যান্য</td>
                                                                    <td><input class="form-control" value="{{ $surveyTransportCost->other_transport_cost }}" type="number" name="other_transport_cost" id="other_transport_cost" disabled /></td>
                                                                <tr> 
                                                            </tbody>
                                                        </table>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">কৃষক কর্তৃক দাগগুচ্ছ/দাগগুচ্ছ বহির্ভূত আবাদকৃত জমিতে ফসলের উৎপাদন ও তার মূল্য সংক্রান্ত তথ্যাদি </h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                           
                                                <div class="row">
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="arable_land"style="font-size: 1.5em; font-weight: bold;"><b> মোট আবাদি জমির পরিমান (একর): </b></label>
                                                            
                                                            <input class="form-control" value="{{ $surveyTofsilForm7Data->arable_land }}" type="number" name="arable_land" id="arable_land" disabled/>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="total_production"style="font-size: 1.5em; font-weight: bold;"><b> মোট উৎপাদন (কেজি): </b></label>
                                                            
                                                            <input class="form-control" value="{{ $surveyTofsilForm7Data->total_production }}" type="number"  name="total_production" id="total_production" disabled/>
                                                        
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="crops_total_value_tk"style="font-size: 1.5em; font-weight: bold;"><b> ফসলের মোট মূল্য: </b></label>
                                                            
                                                            <input class="form-control" value="{{ $surveyTofsilForm7Data->crops_total_value_tk }}" type="number"  name="crops_total_value_tk" id="crops_total_value_tk" disabled/>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="sub_varieties_crop_quantity" style="font-size: 1.5em; font-weight: bold;"><b> ফসলের উপজাতের পরিমান (কেজি/আটি): </b></label>
                                                            
                                                            <input class="form-control" value="{{ $surveyTofsilForm7Data->sub_varieties_crop_quantity }}" type="text"  name="sub_varieties_crop_quantity" id="sub_varieties_crop_quantity" disabled/>
                                                        
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="sub_varieties_crop_value" style="font-size: 1.5em; font-weight: bold;"><b> উপজাতের মূল্য স্থানীয় বাজারদর অনুযায়ী : </b></label>
                                                            
                                                            <input class="form-control" value="{{ $surveyTofsilForm7Data->sub_varieties_crop_value }}" type="number"  name="sub_varieties_crop_value" id="sub_varieties_crop_value" disabled/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">ফসলের মূল্য (কেজিতে)</h3>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                           
                                                <div class="row">
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="crop_cost_farmer"style="font-size: 1.5em; font-weight: bold;"><b>কৃষকের বাড়িতে/খামারে: </b></label>
                                                            
                                                            <input class="form-control" value="{{ $surveyTofsilForm7Data->crop_cost_farmer }}" type="number" name="crop_cost_farmer" id="crop_cost_farmer" disabled/>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="crop_cost_local_market"style="font-size: 1.5em; font-weight: bold;"><b> স্থানীয় বাজার/হাট: </b></label>
                                                            
                                                            <input class="form-control" value="{{ $surveyTofsilForm7Data->crop_cost_local_market }}" type="number" name="crop_cost_local_market" id="crop_cost_local_market" disabled/>
                                                        
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                        <div class="form-group row">
                                                            <label for="crop_cost_millers" style="font-size: 1.5em; font-weight: bold;"><b> সরকারী ক্রয়কেন্দ্র/মিলার্স: </b></label>
                                                            
                                                            <input class="form-control"  value="{{ $surveyTofsilForm7Data->crop_cost_millers }}" type="number" name="crop_cost_millers" id="crop_cost_millers" disabled/>
                                                        </div>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
