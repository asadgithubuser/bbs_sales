@extends('backend.layout.master')

@push('css')
    <style> 
        .table th, .table td{
            border-top: none !important;
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">প্রধান ফসল পূর্বাভাস জরিপ তফসিল (তফসিল-১০)</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">ড্যাশবোর্ড</a>
                            </li>

                            <li class="breadcrumb-item active">
                                <a class="text-muted">প্রধান ফসল পূর্বাভাস জরিপ তফসিল (তফসিল-১০)</a>
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
                                    <h3 class="card-title">প্রধান ফসল পূর্বাভাস জরিপ তফসিল (তফসিল-১০)</h3>
                                    
                                    <div class="card-toolbar">

                                    </div>
                                </div>
                                <!--begin::Form-->
                                <form action="{{ route('admin.surveyTofsilForm10.store') }}" method="post">
                                    @csrf

                                    {{-- hidden fields --}}
                                    @if (!empty($processList))
                                        <input type="hidden" name="survey_process_list_id" value="{{ $processListId }}" />
                                        <input type="hidden" name="survey_notification_id" value="{{ $processList->survey_notification_id }}" />
                                        <input type="hidden" name="division_id" value="{{ $processList->division_id }}" />
                                        <input type="hidden" name="district_id" value="{{ $processList->district_id }}" />
                                        <input type="hidden" name="upazila_id" value="{{ $processList->upazila_id }}" />
                                        <input type="hidden" name="union_id" value="{{ $processList->union_id }}" />
                                    @endif

                                    <div class="card-body">
                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">সাধারণ তথ্য</h3>
                                        </div>  
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                
                                                                <div class="form-group row">
                                                                    <label for="crops_id" style="font-size: 1.2em; font-weight: bold;"><b>ফসলের নাম: </b><span class="text-danger">*</span></label>
                                                            
                                                                            @if (isset($surveyNotification))
                                                                                @if ($surveyNotification->crop_id != '')
                                                                                    <input type="hidden" id="crops_id" name="crops_id" value="{{ $surveyNotification->crop_id }}">
                                                                                    <input type="text" class="form-control form-control-lg" value="{{ $surveyNotification->crop ? ucfirst($surveyNotification->crop->name_en) : '' }}" readonly>
                                                                                @else
                                                                                    <select class="select2 form-control form-control-lg" id="crops_id" name="crops_id" required>
                                                                                        <option value="">--ফসলের নাম নির্বাচন করুন--</option>

                                                                                        @foreach ($crops as $crop)
                                                                                            <option value="{{ $crop->id }}">{{ ucfirst($crop->name_en) }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                @endif

                                                                            @else
                                                                                <select class="select2 form-control form-control-lg" id="crops_id" name="crops_id" required>
                                                                                    <option value="">--ফসলের নাম নির্বাচন করুন--</option>

                                                                                    @foreach ($crops as $crop)
                                                                                        <option value="{{ $crop->id }}">{{ ucfirst($crop->name_en) }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            @endif
                                                                    
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="collection_start_date" style="font-size: 1.2em; font-weight: bold;"><b>তথ্য সংগ্রহের তারিখ শুরু: </b><span class="text-danger">*</span></label>
                                                                
                                                                        <input class="form-control" type="date" placeholder="শুরু" name="collection_start_date" id="collection_start_date" required/>
                                                                
                                                                </div>
                                                    
                                                    </div>

                                                    <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                              
                                               
                                                        <div class="form-group row">
                                                            <label for="collection_end_date" style="font-size: 1.2em; font-weight: bold;"><b>তথ্য সংগ্রহের শেষ তারিখ: </b><span class="text-danger">*</span></label>
                                                           
                                                                <input class="form-control" type="date" placeholder="শেষ" name="collection_end_date" id="collection_end_date" required/>
                                                           
                                                        </div>                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                            <h3 style="color:#ffffff;">ফসলের আওতাধীন জমির পরিমাণ</h3>
                                        </div>

                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                

                                                                        <div class="form-group row">
                                                                            <label for="crop_varieties" style="font-size: 1.2em; font-weight: bold;"><b>ফসলের জাত: </b><span class="text-danger">*</span></label>
                                                                                    <select class="form-control" id="crop_varieties" name="crop_varieties" required>
                                                                                        <option value="">--বাছাই করুন--</option>
                                                                                        <option value="1">দেশি</option>
                                                                                        <option value="2">উফশী</option>
                                                                                    </select>
                                                                            
                                                                        </div>
                                                                        {{-- <div class="form-group row">
                                                                            <label for="crop_varieties" style="font-size: 1.2em; font-weight: bold;"><b>ফসলের জাত: </b><span class="text-danger">*</span></label>
                                                                        
                                                                                <input class="form-control total_fruity_trees" type="text" placeholder="Enter Crop Variety" id="crop_varieties" name="crop_varieties" required/>
                                                                        
                                                                        </div> --}}

                                                                      

                                                                        <div class="form-group row">
                                                                            <label for="previous_year_land_amound_desi" style="font-size: 1.2em; font-weight: bold;"><b>গত বছরে দেশী ফসলের অধীনে জমির পরিমাণ (একরে): </b><span class="text-danger">*</span></label>
                                                                        
                                                                                <input class="form-control" type="number" step="0.01" placeholder="" name="previous_year_land_amound_desi" id="previous_year_land_amound_desi" required/>
                                                                        
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="current_year_land_amound_desi" style="font-size: 1.2em; font-weight: bold;"><b>চলতি বছরে দেশী ফসলের অধীনে জমির পরিমাণ (একরে): </b><span class="text-danger">*</span></label>
                                                                        
                                                                                <input class="form-control" type="number" step="0.01" placeholder="" name="current_year_land_amound_desi" id="current_year_land_amound_desi" required/>
                                                                        
                                                                        </div>

                                                                     
                                                                       

                                                                        <div class="form-group row">
                                                                            <label for="note_desi" style="font-size: 1.2em; font-weight: bold;"><b>গত বছরের তুলনায় দেশী ফসলের জমি হ্রাস/বৃদ্ধির প্রধান কারণ: </b><span class="text-danger">*</span></label>
                                                                        
                                                                            <textarea class="form-control" name="note_desi" id="note_desi"  rows="3" required></textarea>
                                                                                {{-- <input class="form-control" type="number" step="0.01" placeholder="" name="note_desi" id="note_desi" required/> --}}
                                                                        
                                                                        </div>
                                                                   

                                                                   

                                                            </div>

                                                            <div class="col-md-6" style="padding-left: 35px; padding-right:35px;">
                                                

                                                             

                                                                <div class="form-group row">
                                                                    <label for="temporary_crop_land_amound" style="font-size: 1.2em; font-weight: bold;"><b>অস্থায়ী ফসলের জমির পরিমাণ (একরে): </b><span class="text-danger">*</span></label>
                                                                
                                                                        <input class="form-control" type="number" step="0.01" placeholder="" name="temporary_crop_land_amound" id="temporary_crop_land_amound" required/>
                                                                
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="previous_year_land_amound_upashi" style="font-size: 1.2em; font-weight: bold;"><b>গত বছরে উফশী ফসলের অধীনে জমির পরিমাণ (একরে): </b><span class="text-danger">*</span></label>
                                                                
                                                                        <input class="form-control" type="number" step="0.01" placeholder="" name="previous_year_land_amound_upashi" id="previous_year_land_amound_upashi" required/>
                                                                
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="current_year_land_amound_upashi" style="font-size: 1.2em; font-weight: bold;"><b>চলতি বছরে উফশী ফসলের অধীনে জমির পরিমাণ (একরে): </b><span class="text-danger">*</span></label>
                                                                
                                                                        <input class="form-control" type="number" step="0.01" placeholder="" name="current_year_land_amound_upashi" id="current_year_land_amound_upashi" required/>
                                                                
                                                                </div>

                                                            
                                                                <div class="form-group row">
                                                                    <label for="note_upashi" style="font-size: 1.2em; font-weight: bold;"><b>গত বছরের তুলনায় উফশী ফসলের জমি হ্রাস/বৃদ্ধির প্রধান কারণ: </b><span class="text-danger">*</span></label>
                                                                
                                                                    <textarea class="form-control" name="note_upashi" id="note_upashi"  rows="3" required></textarea>
                                                                        {{-- <input class="form-control" type="number" step="0.01" placeholder="Enter Note(Upashi)" name="note_upashi" id="note_upashi" required/> --}}
                                                                
                                                                </div>


                                                            </div>
                                                    
                                                        </div>
                                                </div>
                                        
                                    </div>
                                    <div class="text-center" style="background-color: #134f1f; padding: 10px;">
                                        <h3 style="color:#ffffff;">ফসলের পাক্কিক উৎপাদন হিসাব ও ফসলের হার</h3>
                                    </div>
                                    
                                            <div class="card"> 
                                                <div class="card-body"> 
                                                    <div class="row">
                                                        <div class="col-md-12"> 
                                                
                                                            <table class="table table-responsive" id="tbl_posts">
                                                                <thead>
                                                                    <th style="font-size: 1.1em;"><label for="area_type_1" class=""><b>এলাকার ধরণ</b></label></th>
                                                                    <th style="font-size: 1.1em;"><label for="previous_land_amound_1" class=""><b>গত বছরের আবাদকৃত জমির পরিমান (একরে)</b></label></th>
                                                                    <th style="font-size: 1.1em;"><label for="previous_yield_1" class=""><b>গত বছরের একর প্রতি ফলন (কেজি)</b></label></th>
                                                                    <th style="font-size: 1.1em;"><label for="previous_total_production_1" class=""><b>গত বছরের মোট উৎপাদন (মে. টন)</b></label></th>
                                                                    <th style="font-size: 1.1em;"><label for="current_land_amound_1" class=""><b>চলতি বছরের আবাদকৃত জমির পরিমান (একরে): </b></label></th>
                                                                    <th style="font-size: 1.1em;"> <label for="current_yield_1" class=""><b>চলতি বছরের একর প্রতি ফলন (কেজি)</b></label></th>
                                                                    <th style="font-size: 1.1em;"><label for="current_total_production_1" class=""><b>চলতি বছরের প্রত্যাশিত উৎপাদন (মে. টন)</b></label></th>
                                                                    <th style="font-size: 1.1em;"> <label for="note_1" class=""><b>চলতি বছরের উৎপাদন হ্রাস/বৃদ্ধির কারণ</b></label></th>
                                                                </thead>
                                                                <tbody id="tbl_posts_body">
                                                                    <tr id="rec-1">
                                                                        <td>
                                                                            <div class="text-left">
                                                                                {{-- <label for="area_type_1" class=""><b>Area Type:</b></label> --}}

                                                                                <input class="form-control" type="number" step="0.01" placeholder="" name="area_type[]" id="area_type_1"/>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="text-left">
                                                                                {{-- <label for="previous_land_amound_1" class=""><b>Previous Year Land Amount: </b></label> --}}

                                                                                <input class="form-control" type="number" step="0.01" placeholder="একরে" name="previous_land_amound[]" id="previous_land_amound_1"/>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="text-left">
                                                                                {{-- <label for="previous_yield_1" class=""><b>Previous Year Yield: </b></label> --}}

                                                                                <input class="form-control" type="number" step="0.01" placeholder="কেজি" name="previous_yield[]" id="previous_yield_1"/>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="text-left">
                                                                                {{-- <label for="previous_total_production_1" class=""><b>Previous Year Total Production: </b></label> --}}

                                                                                <input class="form-control" type="number" step="0.01" placeholder="মে. টন" name="previous_total_production[]" id="previous_total_production_1"/>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="text-left">
                                                                                {{-- <label for="current_land_amound_1" class=""><b>Current Year Land Amount: </b></label> --}}

                                                                                <input class="form-control" type="number" step="0.01" placeholder="একরে" name="current_land_amound[]" id="current_land_amound_1"/>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="text-left">
                                                                                {{-- <label for="current_yield_1" class=""><b>Current Year Yield: </b></label> --}}

                                                                                <input class="form-control" type="number" step="0.01" placeholder="কেজি" name="current_yield[]" id="current_yield_1"/>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="text-left">
                                                                                {{-- <label for="current_total_production_1" class=""><b>Current Year Total Production: </b></label> --}}

                                                                                <input class="form-control" type="number" step="0.01" placeholder="মে. টন" name="current_total_production[]" id="current_total_production_1"/>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="text-left">
                                                                                {{-- <label for="note_1" class=""><b>Note: </b></label> --}}

                                                                                <input class="form-control" type="text" placeholder="" name="note[]" id="note_1"/>
                                                                            </div>
                                                                        </td>
                                                                        <td> 
                                                                            <div class="input-group-btn text-left ml-2"> 
                                                                                <button class="btn btn-sm btn-success add-record" type="button" style="padding: 0.75rem">Add</button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-12 text-right" style="padding-left: 35px; padding-right:35px;">
                                                @if ($number == true)
                                                    <button type="submit" class="btn btn-primary mr-5">সংরক্ষন</button>
                                                @else
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div style="display:none;">
                                    <table id="sample_table" style="width: 111%;" class="table table-responsive">
                                        <tr id="">
                                            <td>
                                                <div class="text-left">
                                                    {{-- <label for="area_type_1" class=""><b>Area Type:</b></label> --}}

                                                    <input class="form-control" type="number" step="0.01" placeholder="" name="area_type[]" id="area_type_1"/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-left">
                                                    {{-- <label for="previous_land_amound_1" class=""><b>Previous Year Land Amount: </b></label> --}}

                                                    <input class="form-control" type="number" step="0.01" placeholder="একরে" name="previous_land_amound[]" id="previous_land_amound_1"/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-left">
                                                    {{-- <label for="previous_yield_1" class=""><b>Previous Year Yield: </b></label> --}}

                                                    <input class="form-control" type="number" step="0.01" placeholder="কেজি" name="previous_yield[]" id="previous_yield_1"/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-left">
                                                    {{-- <label for="previous_total_production_1" class=""><b>Previous Year Total Production: </b></label> --}}

                                                    <input class="form-control" type="number" step="0.01" placeholder="মে. টন" name="previous_total_production[]" id="previous_total_production_1"/>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="text-left">
                                                    {{-- <label for="current_land_amound_1" class=""><b>Current Year Land Amount: </b></label> --}}

                                                    <input class="form-control" type="number" step="0.01" placeholder="একরে" name="current_land_amound[]" id="current_land_amound_1"/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-left">
                                                    {{-- <label for="current_yield_1" class=""><b>Current Year Yield: </b></label> --}}

                                                    <input class="form-control" type="number" step="0.01" placeholder="কেজি" name="current_yield[]" id="current_yield_1"/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-left">
                                                    {{-- <label for="current_total_production_1" class=""><b>Current Year Total Production: </b></label> --}}

                                                    <input class="form-control" type="number" step="0.01" placeholder="মে. টন" name="current_total_production[]" id="current_total_production_1"/>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="text-left">
                                                    {{-- <label for="note_1" class=""><b>Note: </b></label> --}}

                                                    <input class="form-control" type="text" placeholder="" name="note[]" id="note_1"/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group-btn text-left"> 
                                                    <button class="btn btn-sm btn-danger delete-record" type="button" data-id="0" style="padding: 0.75rem">Remove</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
@push('stackScript')
    <script type="text/javascript">
        $('#land_type').on('change', function() {
            let land_type = $(this).val();

            if (land_type == 1) {
                $('#land_no1').show();
                $('#land_no2').hide();

            } else {
                $('#land_no1').hide();
                $('#land_no2').hide();
            }

        });
        $('#kt_select2_1_modal').select2({
            placeholder: "Select a state"
        });
    </script>

    <script type="text/javascript">
        $('#interview_select').on('change', function() {
            let interview_type = $(this).val();

            if (interview_type == 1) {
                $('.aus_Interview_new').show();
                $('.potato_Interview_new').hide();

            } else if (interview_type == 2) {
                $('.aus_Interview_new').hide();
                $('.potato_Interview_new').show();
            } else {
                $('.aus_Interview_new').hide();
                $('.potato_Interview_new').hide();
            }

        });
    </script>

    <script> 
        $('.acreCalculate').on('keyup', function() {
            let current_year_land_producttion = $('#current_year_land_producttion').val();
            let current_year_land_amount = $('#current_year_land_amount').val();

            let acreCalculate = (Number(current_year_land_producttion) / Number(current_year_land_amount)) * 37.3242;

            if (current_year_land_producttion != '' && current_year_land_amount != '') {
                $('#acre_reflection_rate').val(acreCalculate);
            }
        });

        $('.lastacreCalculate').on('keyup', function() {
            let last_year_land_producttion = $('#last_year_land_producttion').val();
            let last_year_land_amount = $('#last_year_land_amount').val();

            let acreCalculate = (Number(last_year_land_producttion) / Number(last_year_land_amount)) * 37.3242;

            if (last_year_land_producttion != '' && last_year_land_amount != '') {
                $('#last_acre_reflection_rate').val(acreCalculate);
            }
        });
    </script>

    <script> 
        $('#in_cluster').on('change', function() {
            if ($(this).val() == 1) {
                $('#cluster_id_id').show();

                $('#cluster_id').attr('required', 'required');
            } else {
                $('#cluster_id_id').hide();

                $('#cluster_id').removeAttr('required');
            }
        });
    </script>

    <script> 

        $(document).delegate('button.add-record', 'click', function(e) {
        e.preventDefault();   

        var content = $('#sample_table tr'),
        size = $('#tbl_posts >tbody >tr').length + 1,
        element = null,    
        element = content.clone();
        element.attr('id', 'rec-'+size);
        element.find('.delete-record').attr('data-id', size);
        element.find('.area_type').attr('id', 'area_type'+size);
        element.find('.previous_land_amound').attr('id', 'previous_land_amound'+size);
        element.find('.previous_yield').attr('id', 'previous_yield'+size);
        element.find('.previous_total_production').attr('id', 'previous_total_production'+size);
        element.find('.current_land_amound').attr('id', 'current_land_amound'+size);
        element.find('.current_yield').attr('id', 'current_yield'+size);
        element.find('.current_total_production').attr('id', 'current_total_production'+size);
        element.find('.note').attr('id', 'note'+size);
        element.appendTo('#tbl_posts_body');

        // Select2
        $('.select_'+size).select2();

        $(document).delegate('button.delete-record', 'click', function(e) {
        e.preventDefault();    

        var id = $(this).attr('data-id');
        var targetDiv = $(this).attr('targetDiv');
        $('#rec-' + id).remove();

        return true;
    });
    });
    </script>
@endpush