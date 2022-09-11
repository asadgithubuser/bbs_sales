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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">দাগগুচ্ছ জরিপ প্রতিবেদন (তফসিল-১)</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">ড্যাশবোর্ড</a>
                            </li>

                            <li class="breadcrumb-item active">
                                <a class="text-muted">দাগগুচ্ছ জরিপ প্রতিবেদন(তফসিল-১)</a>
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
                            <div class="card-header">
                                <h3 class="card-title">দাগগুচ্ছ জরিপ প্রতিবেদন (তফসিল-১)</h3>
                            </div>
                         
                            <form action="{{ route('admin.clusterForm.store') }}" method="post">
                                @csrf

                                {{-- hidden fields --}}
                                @if (!empty($processList))
                                    <input type="hidden" name="survey_process_list_id" value="{{ $processListId }}" />
                                    <input type="hidden" name="survey_notification_id" value="{{ $processList->survey_notification_id }}" />
                                    <input type="hidden" name="division_id" value="{{ $processList->division_id }}" />
                                    <input type="hidden" name="district_id" value="{{ $processList->district_id }}" />
                                    <input type="hidden" name="upazila_id" value="{{ $processList->upazila_id }}" />
                                    <input type="hidden" name="bunch_stains_id" value="{{ $processList->bunch_stains_id }}" />
                                @endif

                                @if (!empty($surveyNotification))
                                    <input type="hidden" name="survey_episode" value="{{ $surveyNotification->survey_episode }}" />
                                @endif

                                <div class="card-body">
                                    <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                        <h3 style="color:#ffffff;">সাধারণ তথ্য</h3>
                                    </div>
                                    <div class="row">
                                      
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body w3-light-gray">
                                                    @if (!empty($surveyNotification) && ($surveyNotification->survey_episode == 1))
                                                        <p style="font-weight: 600; font-size: 1.2em;" class="text-right">Phase No: 1 (January to March)</p>
                                                    @elseif(!empty($surveyNotification) && ($surveyNotification->survey_episode == 2))
                                                        <p style="font-weight: 600; font-size: 1.2em;" class="text-right">Phase No: 2 (April to June)</p>
                                                    @elseif(!empty($surveyNotification) && ($surveyNotification->survey_episode == 3))
                                                        <p style="font-weight: 600; font-size: 1.2em;" class="text-right">Phase No: 3 (July to September)</p>
                                                    @elseif(!empty($surveyNotification) && ($surveyNotification->survey_episode == 4))
                                                        <p style="font-weight: 600; font-size: 1.2em;" class="text-right">Phase No: 4 (October to December)</p>
                                                    @else
                                                        <p style="font-weight: 600; font-size: 1.2em;" class="text-right">Unknown phase given...!</p>
                                                    @endif

                                                    <div class="row" style="padding-left: 10px; padding-right:10px; margin:-5px 0px;">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label for="land_identification_no" style="font-size: 1.5em; font-weight: bold;"><b>ভূমি শনাক্তকরণ নং : </b><span class="text-danger">*</span></label><br>
                                                                    <input class="form-control" type="number" step="0.01" placeholder="ভূমি শনাক্তকরণ নং লিখুন" name="land_identification_no" id="land_identification_no" required/>
                                                             
                                                            </div>
                                                        </div>
                                                    </div>

                                                   <div class="row" style="padding-left: 25px; padding-right:25px; margin-bottom:-5px;">
                                                        <div class="col-md-12">

                                                            <div class="form-group row">
                                                                <label for="farmers_name" style="font-size: 1.5em; font-weight: bold;">চাষীর নাম:<span class="text-danger">*</span></label><br>

                                                                <input class="form-control" type="text" placeholder="চাষীর নাম লিখুন" name="farmers_name" id="farmers_name" required/>
                                                            
                                                            </div>

                                                        </div>
                                                   </div>

                                                   <div class="row" style="padding-left: 25px; padding-right:25px; margin-bottom:-5px;">
                                                    <div class="col-md-12">

                                                        <div class="form-group row">
                                                            <label for="farmers_father_name" style="font-size: 1.5em; font-weight: bold;">চাষীর পিতার নাম:<span class="text-danger">*</span></label><br>

                                                            <input class="form-control" type="text" placeholder="চাষীর পিতার নাম লিখুন" name="farmers_father_name" id="farmers_father_name" required/>
                                                        
                                                        </div>

                                                    </div>
                                               </div>
                                                    
                                                    <div class="row">
                                                       
                                                                
                                                        <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                            
                                                                    

                                                            <div class="form-group row">
                                                                <label for="farmers_mobile" style="font-size: 1.5em; font-weight: bold;">ইউনিয়নের নাম: <span class="text-danger">*</span></label><br>
                                                                <input class="form-control" type="text" @isset($processList) value="{{$processList->cluster ? $processList->cluster->union->name_bn : ''}}" @endisset   readonly/>

                                                            </div>
        
                                                            <div class="form-group row">
                                                                <label for="crops_id" style="font-size: 1.5em; font-weight: bold;">ফসলের নাম:</label><br>
                                                                <select class="select2 form-control form-control-lg" id="crops_id" name="crops_id">
                                                                    <option value="">--ফসলের নাম--</option>
                                                                    
                                                                    @if (isset($crops))
                                                                        @foreach ($crops as $crop)
                                                                            <option value="{{ $crop->id }}">{{ $crop->name_bn }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                    
                                                                </select>
                                                            </div>
        
                                                            <div class="form-group row">
                                                                <label for="use_land_type" style="font-size: 1.5em; font-weight: bold;">ভুমি খন্ড/জমির ব্যাবহার লিখুন:<span class="text-danger">*</span></label>
                    
                                                                    <select class="form-control form-control-lg" id="use_land_type" name="use_land_type" required>
                                                                        <option>--জমি বাছাই করুন--</option>
                                                                        <option value="1">চাষযোগ্য জমি</option>
                                                                        <option value="2">ফসলের অযোগ্য জমি</option>
                                                                    </select>
                                                                    
                                                            </div>
                   
                                                        </div>

                                                        {{-- Right side --}}
    
                                                        <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                       
                                                                    <div class="form-group row">
                                                                        <label for="mouza_name"style="font-size: 1.5em; font-weight: bold;">মৌজা নাম:<span class="text-danger">*</span></label><br>
                                                                                <input class="form-control" type="text" @isset($processList) value="{{$processList->cluster ? $processList->cluster->name_bn : ''}}" @endisset readonly/>
                
                                                                    </div>
        
                                                                    <div class="form-group row">
                                                                        <label for="crop_code" style="font-size: 1.5em; font-weight: bold;">ফসলের কোড:</label><br>
                                                                        <input id="crop_code" class="form-control" type="text" value="" readonly/>        
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="how_many_cultivated_time_yearly" style="font-size: 1.5em; font-weight: bold;">এ ভূমি খণ্ডটিতে বছরে কতবার বিভিন্ন ফসলের চাষ করা হয়:</label>
                           
                                                                                <select class="form-control form-control-lg" id="how_many_cultivated_time_yearly" name="how_many_cultivated_time_yearly">
                                                                                    <option value="">--বাছাই করুন--</option>
                                                                                    <option value="1">এক ফসলী</option>
                                                                                    <option value="2">দুই ফসলী</option>
                                                                                    <option value="3">তিন ফসলী</option>
                                                                                </select>
                                                                         
                                                                    </div>
        
                                                                
                                                        </div>

                                                    </div>
                                                    
                                                    

                                                    
                                                    <div class="row">
                                                   
                                                        <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                            
                                                                    <div class="form-group row">
                                                                        <label for="farmers_mobile" style="font-size: 1.5em; font-weight: bold;"><b>কৃষকের মোবাইল নম্বর: </b><span class="text-danger">*</span></label><br>
                                                                                <input class="form-control" type="text" placeholder="কৃষকের মোবাইল নম্বর লিখুন" name="farmers_mobile" id="farmers_mobile" required/>
                                                                        
                                                                    </div>

                                                                    {{-- <div class="form-group row">
                                                                        <label for="crops_id" class="col-4 col-form-label"><b>Crops: </b><span class="text-danger">*</span></label>
                                                                        <div class="col-8">
                                                                            <div class="form-group">
                                                                                <select class="select2 form-control form-control-lg" id="crops_id" name="crops_id" required>
                                                                                    <option value="">--Select Crop--</option>
                                                                                    
                                                                                    @if (isset($crops))
                                                                                        @foreach ($crops as $crop)
                                                                                            <option value="{{ $crop->id }}">{{ ucfirst($crop->name_bn) }}</option>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div> --}}

                                                          
                                                                    <div class="form-group row">
                                                                        <label for="irrigation_system" style="font-size: 1.5em; font-weight: bold;"><b>ভূমি খন্ডের সেচ পদ্ধতি:</b><span class="text-danger">*</span></label><br>
                                                                                <select class="form-control form-control-lg" id="irrigation_system" name="irrigation_system" required>
                                                                                    <option value="">--সেচ ব্যবস্থার ধরন নির্বাচন করুন--</option>
                                                                                    <option value="1">সেচ নেই</option>
                                                                                    <option value="2">পাওয়ার পাম্প</option>
                                                                                    <option value="3">গভীর নলকূপ</option>
                                                                                    <option value="4">শ্যালো মেশিন</option>
                                                                                    <option value="5">ম্যানুয়াল টিউবওয়েল</option>
                                                                                    <option value="6">ঐতিহ্যগত এবং অন্যান্য</option>
                                                                                </select>
                                                                   
                                                                    </div>
                                                              

                                
                                                        </div>

                                                        <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                            
                                                                    <div class="form-group row">
                                                                        <label for="land_amount" style="font-size: 1.5em; font-weight: bold;"><b>জমির পরিমাণ (একর):</b><span class="text-danger">*</span></label>
                                                                      
                                                                            <input class="form-control" type="number" step="0.01" placeholder="জমির পরিমাণ লিখুন" id="land_amount" name="land_amount"  required/>
                                                                    
                                                                    </div>
                                                                 

                                                                   

                                                                    <div class="form-group row">
                                                                        <label for="how_many_irrigation_time" style="font-size: 1.5em; font-weight: bold;"><b>এ ভূমিখন্ডে বিভিন্ন ফসলের জন্য গত বছরে কতবার সেচ দেয়া হয়েছে:</b></label><br>
                                                                                <select class="form-control form-control-lg" id="how_many_irrigation_time" name="how_many_irrigation_time">
                                                                                    <option value="">--নির্বাচন করুন--</option>
                                                                                    <option value="1">এক বার</option>
                                                                                    <option value="2">দুই বার</option>
                                                                                    <option value="3">তিন বার</option>
                                                                                </select>
                                                                            
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="cultivated_method" style="font-size: 1.5em; font-weight: bold;"><b>জমি চাষ পদ্ধতি:</b></label><br>
                                                                                <select class="form-control form-control-lg" id="cultivated_method" name="cultivated_method">
                                                                                    <option value="">--পদ্ধতি নির্বাচন করুন--</option>
                                                                                    <option value="1">যান্ত্রিক</option>
                                                                                    <option value="2">অযান্ত্রিক</option>
                                                                                </select>
                                                                       
                                                                    </div>
                               
                                                             
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            
                                        </div>

                                     
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-right" style="padding-left: 35px; padding-right:35px;">
                                            @if ($number == true)
                                                <button type="submit" class="btn btn-primary font-weight-bold" name="submitButton">সংরক্ষন</button>
                                            @else
                                            @endif
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

@push('stackScript')
    <script>
        $("#crops_id").on('change', function(e){
            e.preventDefault();

            let cropCode = $("#crop_code");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{route('getCropCode')}}",
                data: {
                    _token:$('input[name=_token]').val(),
                    crop_id: $(this).val()
                },
                success:function(response){
                    $(cropCode).val(response.code);
                }
            });
        });
    </script>
@endpush