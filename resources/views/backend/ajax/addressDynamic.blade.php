<script>
    $("#division_id").on('change',function(e){
        e.preventDefault();

        var district_list = $("#district_id");
        var division_bbs_code = $("#division_bbs_code");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: "{{route('districts')}}",
            data: {_token:$('input[name=_token]').val(),
            division_id: $(this).val()},

            success:function(response){
                $('option', district_list).remove();
                $('#district_id').append('<option value="">--Select District--</option>');
                $.each(response, function(){
                    $('<option/>', {
                        'value': this.id,
                        'text': this.name_en
                    }).appendTo('#district_id');
                });
            }

        });

        $.ajax({
            type: 'POST',
            url: "{{route('divisioncode')}}",
            data: {_token:$('input[name=_token]').val(),
            division_id: $(this).val()},

            success:function(response){
                if ($('#division_id').val() == '') {
                    $(division_bbs_code).val('--Select Division First--');
                } else {
                    $.each(response, function(){
                        $(division_bbs_code).val(response.division_bbs_code);
                    });
                }
            }

        });
    });

    $("#division_id2").on('change',function(e){
        e.preventDefault();

        var district_list = $("#district_id2");
        var division_bbs_code = $("#division_bbs_code");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: "{{route('districts')}}",
            data: {_token:$('input[name=_token]').val(),
            division_id: $(this).val()},

            success:function(response){
                $('option', district_list).remove();
                $('#district_id2').append('<option value="">--Select District--</option>');
                $.each(response, function(){
                    $('<option/>', {
                        'value': this.id,
                        'text': this.name_en
                    }).appendTo('#district_id2');
                });
            }

        });
    });

    $("#district_id").on('change',function(e){
        e.preventDefault();
        
        var area_list = $("#upazila_id");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url: "{{route('upazilas')}}",
            data: {_token:$('input[name=_token]').val(),
            district_id: $(this).val()},

            success:function(response){
                $('option', area_list).remove();
                $('#upazila_id').append('<option value="">--Select Upazila--</option>');
                $.each(response, function(){
                    $('<option/>', {
                        'value': this.id,
                        'text': this.name_en
                    }).appendTo('#upazila_id');
                });
            }
        });

        $.ajax({
            type: 'POST',
            url: "{{route('districtcode')}}",
            data: {_token:$('input[name=_token]').val(),
            district_id: $(this).val()},

            success:function(response){
                if ($('#district_id').val() == '') {
                    $(district_bbs_code).val('--Select District First--');
                } else {
                    $.each(response, function(){
                        $(district_bbs_code).val(response.district_bbs_code);
                    });
                }
            }

        });
    });

    $("#district_id2").on('change',function(e){
        e.preventDefault();
        
        var area_list = $("#upazila_id2");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url: "{{route('upazilas')}}",
            data: {_token:$('input[name=_token]').val(),
            district_id: $(this).val()},

            success:function(response){
                $('option', area_list).remove();
                $('#upazila_id2').append('<option value="">--Select Upazila--</option>');
                $.each(response, function(){
                    $('<option/>', {
                        'value': this.id,
                        'text': this.name_en
                    }).appendTo('#upazila_id2');
                });
            }
        });
    });

    $("#upazila_id").on('change',function(e){
        e.preventDefault();

        var area_list = $("#office_id");
        var union_list = $("#union_id");
        var upazila_bbs_code = $("#upazila_bbs_code");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url: "{{route('offices')}}",
            data: {_token:$('input[name=_token]').val(),
            upazila_id: $(this).val()},

            success:function(response){
                $('option', area_list).remove();
                $('#office_id').append('<option value="">--Select Office--</option>');
                $.each(response, function(){
                    $('<option/>', {
                        'value': this.id,
                        'text': this.title_en
                    }).appendTo('#office_id');
                });
            }
        });

        $.ajax({
            type:'POST',
            url: "{{route('unions')}}",
            data: {_token:$('input[name=_token]').val(),
            upazila_id: $(this).val()},

            success:function(response){
                $('option', union_list).remove();
                $('#union_id').append('<option value="">--Select Union--</option>');
                $.each(response, function(){
                    $('<option/>', {
                        'value': this.id,
                        'text': this.name_en
                    }).appendTo('#union_id');
                });
            }
        });

        $.ajax({
            type: 'POST',
            url: "{{route('upazilacode')}}",
            data: {_token:$('input[name=_token]').val(),
            upazila_id: $(this).val()},

            success:function(response){
                if ($('#upazila_id').val() == '') {
                    $(upazila_bbs_code).val('--Select Upazila First--');
                } else {
                    $.each(response, function(){
                        $(upazila_bbs_code).val(response.upazila_bbs_code);
                    });
                }
            }

        });
    });

    $("#upazila_id2").on('change',function(e){
        e.preventDefault();

        var union_list = $("#union_id2");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url: "{{route('unions')}}",
            data: {_token:$('input[name=_token]').val(),
            upazila_id: $(this).val()},

            success:function(response){
                $('option', union_list).remove();
                $('#union_id2').append('<option value="">--Select Union--</option>');
                $.each(response, function(){
                    $('<option/>', {
                        'value': this.id,
                        'text': this.name_en
                    }).appendTo('#union_id2');
                });
            }
        });
    });

    $("#union_id").on('change',function(e){
        e.preventDefault();
        
        var union_bbs_code = $("#union_bbs_code");
        var nunion_bbs_code = $("#nunion_bbs_code");
        var mouza_list = $("#mouza_id");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: "{{route('unioncode')}}",
            data: {_token:$('input[name=_token]').val(),
            union_id: $(this).val()},

            success:function(response){
                if ($('#union_id').val() == '') {
                    $(union_bbs_code).val('--Select Upazila First--');
                    $(nunion_bbs_code).val('--Select Upazila First--');
                } else {
                    $.each(response, function(){
                        $(union_bbs_code).val(response.union_bbs_code);
                        $(nunion_bbs_code).val(response.nunion_bbs_code);
                    });
                }
            }

        });

        $.ajax({
            type:'POST',
            url: "{{route('mouzas')}}",
            data: {_token:$('input[name=_token]').val(),
            union_id: $(this).val()},

            success:function(response){
                $('option', mouza_list).remove();
                $('#mouza_id').append('<option value="">--Select Mouza--</option>');
                $.each(response, function(){
                    $('<option/>', {
                        'value': this.id,
                        'text': this.name_en
                    }).appendTo('#mouza_id');
                });
            }
        });
    });

    $("#union_id2").on('change',function(e){
        e.preventDefault();
        
        var mouza_list = $("#mouza_id2");

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
                $('#mouza_id2').append('<option value="">--Select Mouza--</option>');
                $.each(response, function(){
                    $('<option/>', {
                        'value': this.id,
                        'text': this.name_en
                    }).appendTo('#mouza_id2');
                });
            }
        });
    });

    $("#mouza_id").on('change',function(e){
        e.preventDefault();
        
        var area_list = $("#village_id");
        var cluster_list = $("#cluster_id");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url: "{{route('villages')}}",
            data: {_token:$('input[name=_token]').val(),
            mouza_id: $(this).val()},

            success:function(response){
                $('option', area_list).remove();
                $('#village_id').append('<option value="">--Select Village--</option>');
                $.each(response, function(){
                    $('<option/>', {
                        'value': this.id,
                        'text': this.name_en
                    }).appendTo('#village_id');
                });
            }
        });
    });

    $("#village_id").on('change',function(e){
        e.preventDefault();
        
        var area_list = $("#ea_id");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url: "{{route('eas')}}",
            data: {_token:$('input[name=_token]').val(),
            village_id: $(this).val()},

            success:function(response){
                $('option', area_list).remove();
                $('#ea_id').append('<option value="">--Select EA--</option>');
                $.each(response, function(){
                    $('<option/>', {
                        'value': this.id,
                        'text': this.name_en
                    }).appendTo('#ea_id');
                });
            }
        });
    });

    $("#ea_id").on('change',function(e){
        e.preventDefault();
        
        var area_list = $("#household_id");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url: "{{route('households')}}",
            data: {_token:$('input[name=_token]').val(),
            ea_id: $(this).val()},

            success:function(response){
                $('option', area_list).remove();
                $('#household_id').append('<option value="">--Select House Hold--</option>');
                $.each(response, function(){
                    $('<option/>', {
                        'value': this.id,
                        'text': this.name_en
                    }).appendTo('#household_id');
                });
            }
        });
    });

    $("#household_id").on('change',function(e){
        e.preventDefault();
        
        var area_list = $("#population_id");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url: "{{route('populations')}}",
            data: {_token:$('input[name=_token]').val(),
            household_id: $(this).val()},

            success:function(response){
                $('option', area_list).remove();
                $('#population_id').append('<option value="">--Select Population Digit--</option>');
                $.each(response, function(){
                    $('<option/>', {
                        'value': this.id,
                        'text': this.name_en
                    }).appendTo('#population_id');
                });
            }
        });
    });

    $("#level_id").on('change', function(e){
        e.preventDefault();
        var department_list = $("#department_id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url: "{{route('departments')}}",
            data: {_token:$('input[name=_token]').val(),
            level_id: $(this).val()},

            success:function(response){
                $('option', department_list).remove();
                $('#department_id').append('<option value="">--Select Department--</option>');
                $.each(response, function(){
                    $('<option/>', {
                        'value': this.id,
                        'text': this.name_en
                    }).appendTo('#department_id');
                });
            }
        });
    });

    $("#crop_id").on('change', function(e){
        e.preventDefault();
        var type_list = $("#crop_type");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url: "{{route('cropTypes')}}",
            data: {_token:$('input[name=_token]').val(),
            crop_id: $(this).val()},

            success:function(response){
                $('option', type_list).remove();
                $('#crop_type').append('<option value="">--Select Crop Type--</option>');
                $.each(response, function(){
                    $('<option/>', {
                        'value': this.id,
                        'text': this.crop_type_bn
                    }).appendTo('#crop_type');
                });
            }
        });
    });

    $("#service_item_type").on('change', function(e){
        e.preventDefault();

        var type_list = $("#data_subcategory_id");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url: "{{route('dataSubcategorys')}}",
            data: {_token:$('input[name=_token]').val(),
            service_item_type: $(this).val()},

            success:function(response){
                $('option', type_list).remove();
                $('#data_subcategory_id').append('<option value="">--Select Data Subcategory--</option>');
                
                $.each(response, function(){
                    $('<option/>', {
                        'value': this.id,
                        'text': this.name_en
                    }).appendTo('#data_subcategory_id');
                });
            }
        });
    });

</script>