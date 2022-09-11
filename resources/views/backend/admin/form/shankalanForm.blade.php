@push('css')
    <style>
        td{
            border-top: none !important;
        }
    </style>
@endpush

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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Assign For {{ $form->template_name }} Survey</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}" class="text-muted">Dashboard</a>
                            </li>


                            <li class="breadcrumb-item active">
                                <a class="text-muted">Assign For {{ $form->template_name }} Survey</a>
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
                                <h3 class="card-title text-white">Assign For {{ $form->template_name }} Survey</h3>
                            </div>
                            <form action="{{ route('admin.form.store') }}" method="post">
                                <div class="card-body">
                                    @csrf

                                    <input type="hidden" value="{{ $form->id }}" name="form_id">
                                    <input type="hidden" value="{{ $notification }}" name="notification_id">

                                    <div class="row">
                                        {{-- @if ($survey_noti->survey_form_id == 2)
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-form-label text-right col-lg-4 col-sm-12">Officers:</label>
                                                <div class="col-lg-5 col-sm-12">
                                                    <select name="officer" id="" class="form-control select2">
                                                        <option value="">--Select Officer--</option>
                                                        @foreach ($officersLists as $officer)
                                                            <option value="{{ $officer->id }}">
                                                                {{ ucfirst($officer->first_name) . ' ' . ucfirst($officer->middle_name) . ' ' . ucfirst($officer->last_name) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        @endif --}}

                                        <div class="col-md-{{ $survey_noti->survey_form_id == 2 ? '12' : '12' }}">
                                            
                                            @isset($survey_noti)

                                            <table class="table" id="tbl_posts">
                                                <tbody id="tbl_posts_body">
                                                    <tr id="rec-1">
                                                        <td>
                                                            <div class="form-group row">
                                                                <label class="col-form-label text-right col-lg-4 col-sm-12">Officers:</label>
                                                                <div class="col-lg-5 col-sm-12">
                                                                    <select name="officer[]" id="officer_id_1" class="form-control select_1">
                                                                        <option value="">--Select Officer--</option>
                                                                        @foreach ($officersLists as $officer)
                                                                            <option value="{{ $officer->id }}">
                                                                                {{ ucfirst($officer->first_name) . ' ' . ucfirst($officer->middle_name) . ' ' . ucfirst($officer->last_name) }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        @if ($survey_noti->survey_form_id == 2)
                                                        <td>
                                                            <div class="form-group row">
                                                                <label class="col-form-label text-right col-lg-4 col-sm-12">Cluster:</label>
                                                                <div class="col-lg-5 col-sm-12">
                                                                    <select name="cluster_id[]" id="cluster_id_1" class="form-control select_1" required >
                                                                        <option value="">--Select Cluster--</option>
                                                                        <option value="{{ $cluster->id }}">{{ $cluster->name_en }}</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        @elseif ($survey_noti->survey_form_id == 13)
                                                        <td>
                                                            
                                                        </td>

                                                        @elseif($survey_noti->survey_form_id == 10 || $survey_noti->survey_form_id == 11)
                                                        <td>
                                                            <div class="form-group row">
                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Union:</label>
                                                                <div class="col-lg-9 col-sm-12">
                                                                    <select name="union_id[]" id="union_id_1"
                                                                        class="form-control union_id_1 select_1" required>
                                                                        <option value="">--Select Union--</option>
                                                                        @foreach ($unions as $union)
                                                                            <option value="{{ $union->id }}">
                                                                                {{ $union->name_en }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        @else
                                                        <td>
                                                            <div class="form-group row">
                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Union:</label>
                                                                <div class="col-lg-9 col-sm-12">
                                                                    <select name="union_id[]" id="union_id_1"
                                                                        class="form-control union_id_1 select_1" required>
                                                                        <option value="">--Select Union--</option>
                                                                        @foreach ($unions as $union)
                                                                            <option value="{{ $union->id }}">
                                                                                {{ $union->name_en }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group row">
                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Mouza:</label>

                                                                <div class="col-lg-9 col-sm-12">
                                                                    <select name="mouza_id[]" id="mouza_id_1"
                                                                        class="form-control mouza_id_1 select_1" style="display: inline-block" required>
                                                                        <option value="">--Select Union First--</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        @endif

                                                        <td> 
                                                            <div class="input-group-btn text-left ml-2"> 
                                                                <button class="btn btn-sm btn-success add-record" type="button" style="padding: 0.75rem">Add</button>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-right">
                                            <button type="submit" class="btn btn-primary font-weight-bold"
                                                name="submitButton">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div style="display:none;">
                                
                                <table id="sample_table" style="width: 100%;">
                                    <tr id="">
                                        <td>
                                            <div class="form-group row">
                                                <label class="col-form-label text-right col-lg-4 col-sm-12">Officers:</label>
                                                <div class="col-lg-5 col-sm-12">
                                                    <select name="officer[]" id="officer_id" class="form-control select_">
                                                        <option value="">--Select Officer--</option>
                                                        @foreach ($officersLists as $officer)
                                                            <option value="{{ $officer->id }}">
                                                                {{ ucfirst($officer->first_name) . ' ' . ucfirst($officer->middle_name) . ' ' . ucfirst($officer->last_name) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </td>

                                        @if ($survey_noti->survey_form_id == 2)
                                        <td>
                                            <div class="form-group row">
                                                <label class="col-form-label text-right col-lg-4 col-sm-12">Cluster:</label>
                                                <div class="col-lg-5 col-sm-12">
                                                    <select name="cluster_id[]" id="cluster_id_1" class="form-control select_" required >
                                                        <option value="">--Select Cluster--</option>
                                                        <option value="{{ $cluster->id }}">{{ $cluster->name_en }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>

                                        @elseif ($survey_noti->survey_form_id == 13)
                                        <td>
                                            
                                        </td>
                                        
                                        @elseif($survey_noti->survey_form_id == 10 || $survey_noti->survey_form_id == 11)
                                        <td>
                                            <div class="form-group row">
                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Union:</label>
                                                <div class="col-lg-9 col-sm-12">
                                                    <select name="union_id[]"
                                                        class="form-control union_id select_" required>
                                                        <option value="">--Select Union--</option>
                                                        @foreach ($unions as $union)
                                                            <option value="{{ $union->id }}">
                                                                {{ $union->name_en }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </td>

                                        @else
                                        <td>
                                            <div class="form-group row">
                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Union:</label>
                                                <div class="col-lg-9 col-sm-12">
                                                    <select name="union_id[]"
                                                        class="form-control union_id select_" required>
                                                        <option value="">--Select Union--</option>
                                                        @foreach ($unions as $union)
                                                            <option value="{{ $union->id }}">
                                                                {{ $union->name_en }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-group row">
                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Mouza:</label>

                                                <div class="col-lg-9 col-sm-12">
                                                    <select name="mouza_id[]"
                                                        class="form-control mouza_id select_" style="display: inline-block" required>
                                                        <option value="">--Select Mouza First--</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        @endif

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
@endsection


@push('stackScript')
<script> 
    // Select2
    $('.select_1').select2();

    $("#union_id_1").on('change', function(e){
        e.preventDefault();

        var mouza_list = $("#mouza_id_1");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url: "{{route('mouzas')}}",
            data: {_token:$('input[name=_token]').val(),
            union_id: $(this).val()},

            success:function(response){
                $('option', mouza_list).remove();
                $('#mouza_id_1').append('<option value="">--Select Mouza--</option>');
                $.each(response, function(){
                    $('<option/>', {
                        'value': this.id,
                        'text': this.name_en
                    }).appendTo('#mouza_id_1');
                });
            }
        });
    });

    $(document).delegate('button.add-record', 'click', function(e) {
        e.preventDefault();   

        var content = $('#sample_table tr'),
        size = $('#tbl_posts >tbody >tr').length + 1,
        element = null,    
        element = content.clone();
        element.attr('id', 'rec-'+size);
        element.find('.delete-record').attr('data-id', size);
        element.find('.select_').addClass('select_'+size);
        element.find('.union_id').attr('id', 'union_id'+size);
        element.find('#officer_id').attr('id', 'officer_id'+size);
        element.find('#cluster_id').attr('id', 'cluster_id'+size);
        element.find('.mouza_id').attr('id', 'mouza_id'+size);
        element.appendTo('#tbl_posts_body');

        // Select2
        $('.select_'+size).select2();

        $("#union_id"+size).on('change', function(e){
            e.preventDefault();

            var mouza_list = $("#mouza_id"+size);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'POST',
                url: "{{route('mouzas')}}",
                data: {_token:$('input[name=_token]').val(),
                union_id: $(this).val()},

                success:function(response){
                    $('option', mouza_list).remove();
                    $('#mouza_id'+size).append('<option value="">--Select Mouza--</option>');
                    $.each(response, function(){
                        $('<option/>', {
                            'value': this.id,
                            'text': this.name_en
                        }).appendTo('#mouza_id'+size);
                    });
                }
            });
        });
    });

    $(document).delegate('button.delete-record', 'click', function(e) {
        e.preventDefault();    

        var id = $(this).attr('data-id');
        var targetDiv = $(this).attr('targetDiv');
        $('#rec-' + id).remove();

        return true;
    });

</script>
@endpush