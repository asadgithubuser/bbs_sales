<script>
    let arr1 = [];
    let arr2 = [];
    let valueSI = [];

    $(".service_id").on('change', function(e){

        var service_item_list = $(".service_item_id");

        let country_id          = $('#country_id').val();
        let division_id         = $('#division_id').val();
        let district_id         = $('#district_id').val();
        let upazila_id          = $('#upazila_id').val();
        let union_id            = $('#union_id').val();
        let mouza_id            = $('#mouza_id').val();
        let service_item_type   = $('#service_item_type').val();
        let data_subcategory_id = $('#data_subcategory_id').val();
        let department_id       = $('#department_id').val();
        let year                = $('#year').val();
        let usage_type_val      = $("input[name='usage_type']:checked").val();

        if(usage_type_val == null){
            Swal.fire('Please, choose an usage type!', '', 'warning');
            $('.service_id').prop("checked", false);

            return false;
        }

        if(country_id == ''){
            Swal.fire('Please, select country!', '', 'warning');
            $('.service_id').prop("checked", false);

            return false;
        }

        if (this.checked) {
            e.preventDefault();

            let service_val = $(this).val();

            if (service_val == 3) {
                $('#division_id2').attr('required', 'required');
                $('#district_id2').attr('required', 'required');
                $('#upazila_id2').attr('required', 'required');
                $('#union_id2').attr('required', 'required');
                $('#mouza_id2').attr('required', 'required');
            } else {
                $('#division_id2').removeAttr('required');
                $('#district_id2').removeAttr('required');
                $('#upazila_id2').removeAttr('required');
                $('#union_id2').removeAttr('required');
                $('#mouza_id2').removeAttr('required');
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{route('serviceItems')}}",
                data: {_token:$('input[name=_token]').val(),
                division_id: division_id,
                district_id: district_id,
                upazila_id: upazila_id,
                union_id: union_id,
                mouza_id: mouza_id,
                service_item_type: service_item_type,
                data_subcategory_id: data_subcategory_id,
                department_id:department_id,
                year: year,
                service_id: $(this).val()},

                success:function(response){
                    $('.service_item_list').append(response);
                    $('.select22').select2({
                        placeholder: 'Select Service Item',
                    });                   
                    $.each(response, function(){
                        $('.service_item_list').html(response);
                    });
                }

            });

            servicePrice($(this).val());

            $('.locate').on('change', function() {

                let division_id         = $('#division_id').val();
                let district_id         = $('#district_id').val();
                let upazila_id          = $('#upazila_id').val();
                let union_id            = $('#union_id').val();
                let mouza_id            = $('#mouza_id').val();
                let service_item_type   = $('#service_item_type').val();
                let data_subcategory_id = $('#data_subcategory_id').val();
                let department_id       = $('#department_id').val();
                let year                = $('#year').val();

                let service_value = '';

                let i = parseInt(0);

                $(".service_id:checkbox:checked").each(function() {
                    if (i == 0) {
                        service_value += this.value;
                    } else {
                        service_value += ','+this.value;
                    }
                    i=i+1;
                });

                $.ajax({
                    type: 'POST',
                    url: "{{route('serviceItems')}}",
                    data: {_token:$('input[name=_token]').val(),
                    division_id: division_id,
                    district_id: district_id,
                    upazila_id: upazila_id,
                    union_id: union_id,
                    mouza_id: mouza_id,
                    service_item_type: service_item_type,
                    data_subcategory_id: data_subcategory_id,
                    department_id: department_id,
                    year: year,
                    service_id: service_value},

                    success:function(response){
                        $('.service_item_list').html(response);
                        $('.select22').select2({
                            placeholder: 'Select Service Item',
                        }); 
                        $.each(response, function(){
                            $('.service_item_list').html(response);
                        });
                    }

                });
            });

        } else if(!(this.checked)) {

            let service_val = $(this).val();

            if (service_val == 3) {
                $('#division_id2').removeAttr('required');
                $('#district_id2').removeAttr('required');
                $('#upazila_id2').removeAttr('required');
                $('#union_id2').removeAttr('required');
                $('#mouza_id2').removeAttr('required');
            }

            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

            $(".items"+$(this).val()).remove();
            $(".price"+$(this).val()).remove();
            $(".additems"+$(this).val()).remove();
            $(".addprice"+$(this).val()).remove();
            // $(".selectservice"+$(this).val()).remove();
            $(".s_item_list"+$(this).val()).remove();
            
            // total();

            $.ajax({
                type: 'POST',
                url: "{{route('serviceValueRemoved')}}",
                data: {_token:$('input[name=_token]').val(),
                service_id: $(this).val()},

                success:function(){
                    
                }

            });
        }
    });

    function serviceInventoryItem(id) {
        var service_item_list = $(".service_inventory_item_id");

        let country_id          = $('#country_id').val();
        let division_id         = $('#division_id').val();
        let district_id         = $('#district_id').val();
        let upazila_id          = $('#upazila_id').val();
        let union_id            = $('#union_id').val();
        let mouza_id            = $('#mouza_id').val();
        let service_item_type   = $('#service_item_type').val();
        let data_subcategory_id = $('#data_subcategory_id').val();
        let department_id       = $('#department_id').val();
        let year                = $('#year').val();
        let usage_type_val      = $("input[name='usage_type']:checked").val();

        if(usage_type_val == null){
            Swal.fire('Please, choose an usage type!', '', 'warning');
            $('.serviceItem_id').prop("checked", false);

            return false;
        }

        if(country_id == ''){
            Swal.fire('Please, select country!', '', 'warning');
            $('.serviceItem_id').prop("checked", false);

            return false;
        }

        if ($('input.serviceItem_id').is(':checked')) {

            let service_val = id;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('serviceInventoryItems') }}",
                data: {_token:$('input[name=_token]').val(),
                service_item_type: service_item_type,
                data_subcategory_id: data_subcategory_id,
                service_id: id},

                success:function(response){
                    $('.service_item_list').append(response);
                    $('.select22').select2({
                        placeholder: 'Select Service Inventory Item',
                    });                   
                    $.each(response, function(){
                        $('.service_item_list').html(response);
                    });
                }

            });

            $.ajax({
                type: 'POST',
                url: "{{ route('servicePublicationAdditionalItems') }}",
                data: {_token:$('input[name=_token]').val(),
                service_id: id},

                success:function(response){
                    $('.service_additional_item_list').append(response);
                    $.each(response, function(){
                        $('.service_additional_item_list').html(response);
                    });
                }

            });

            servicePrice($(this).val());

        } else if(!$('input.serviceItem_id').is(':checked')) {

            let service_val = id;

            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

            $(".items"+id).remove();
            $(".price"+id).remove();
            $(".additems"+id).remove();
            $(".addprice"+id).remove();
            // $(".selectservice"+$(this).val()).remove();
            $(".s_item_list"+id).remove();
            
            // total();

            $.ajax({
                type: 'POST',
                url: "{{route('serviceValueRemoved')}}",
                data: {_token:$('input[name=_token]').val(),
                service_id: id},

                success:function(){
                    
                }

            });
        }
    }

    $('.usage_type').on('change', function(){
        // $(".service_id:checkbox:checked").each(function(){
        //     $(".price"+$(this).val()).remove();
        //     servicePrice($(this).val());
        // });

        // $(".service_item_id:checkbox:checked").each(function(){
        //     $(".selectitems"+$(this).val()).remove();
            
        // });

        itemSelect(1);
        inventoryItemSelect(1);

    });

    $('#country_id').on('change', function(){
        // $(".service_id:checkbox:checked").each(function(){
        //     $(".price"+$(this).val()).remove();
        //     servicePrice($(this).val());
        // });

        // $(".service_item_id:checkbox:checked").each(function(){
        //     $(".selectitems"+$(this).val()).remove();
            
        // });

        itemSelect(1);
        inventoryItemSelect(1);

        // alert('aaa01');

    });

    function servicePrice(id) {
            
        let usage_type = $("input[name='usage_type']:checked").val();
        let country_id = $("#country_id").val();

        $.ajax({
            type: 'POST',
            url: "{{route('serviceItemPrice')}}",
            data: {_token:$('input[name=_token]').val(),
            service_id: id,
            usage_type: usage_type,
            country_id: country_id},

            success:function(response){
                // $('.service_item_price').empty();
                
                $('.service_item_price').append(response);
                $.each(response, function(){
                    $('.service_item_price').html(response);
                });
            }

        });
    }

    function onlyUnique(value, index, self) {
        return self.indexOf(value) === index;
    }

    function itemSelect(id){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let valueSI = [];

        $('.service_item_select').each(function(){
            let arrP = $(this).val();
            
            valueSI.push(arrP);
            
        });

        let selectedItems = '';

        let i = parseInt(0);

        $('.selected_serviceItem').each(function(){
            if(i !=0){
                selectedItems += ',';
            }
            selectedItems += $(this).val();
            i = i+1;
        });

        let usage_type_val = $("input[name='usage_type']:checked").val();
        let country_id = $("#country_id").val();

        $.ajax({
            type: 'POST',
            url: "{{route('serviceItemsvalue')}}",
            data: {_token:$('input[name=_token]').val(),
            service_ids: valueSI,
            selectedItems:selectedItems,
            country_id: country_id,
            usage_type: usage_type_val},

            success:function(response){
                
                $('.select_service_list').html('');
                $('.select_service_item_list').html('');
                $('.select_service_price_list').html('');

                let i = parseInt(0);

                $.each(response, function(){
                    $('.select_service_list').append(response[i]);
                    $('.select_service_item_list').append(response[i+1]);
                    $('.select_service_price_list').append(response[i+2]);
                    i=i+3;
                });
                
                total();
                // receive();
            }

        });

        $.ajax({
            type: 'POST',
            url: "{{route('serviceAdditionalItems')}}",
            data: {_token:$('input[name=_token]').val(),
            service_ids: valueSI,
            selectedItems:selectedItems},

            success:function(response){
                $('.service_additional_item_list').html('');
                $('.service_additional_item_list').html(response);
            }

        });

        // $.ajax({
        //     type: 'POST',
        //     url: "{{route('serviceAdditionalItemPrice')}}",
        //     data: {_token:$('input[name=_token]').val(),
        //     service_ids: valueSI,
        //     selectedItems:selectedItems},

        //     success:function(response){
        //         $('.service_additional_item_price').append(response);
        //         $.each(response, function(){
        //             $('.service_additional_item_price').html(response);
        //         });
        //     }

        // });
    }

    function inventoryItemSelect(id){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let valueSI = [];

        $('.service_item_select').each(function(){
            let arrP = $(this).val();
            
            valueSI.push(arrP);
            
        });

        let selectedItems = '';

        let i = parseInt(0);

        $('.selected_serviceItem').each(function(){
            if(i !=0){
                selectedItems += ',';
            }
            selectedItems += $(this).val();
            i = i+1;
        });

        let usage_type_val = $("input[name='usage_type']:checked").val();
        let country_id = $("#country_id").val();

        $.ajax({
            type: 'POST',
            url: "{{route('serviceInventoryItemsvalue')}}",
            data: {_token:$('input[name=_token]').val(),
            service_ids: valueSI,
            selectedItems:selectedItems,
            country_id: country_id,
            usage_type: usage_type_val},

            success:function(response){
                
                $('.select_service_list').html('');
                $('.select_service_item_list').html('');
                $('.select_service_price_list').html('');

                let i = parseInt(0);

                $.each(response, function(){
                    $('.select_service_list').append(response[i]);
                    $('.select_service_item_list').append(response[i+1]);
                    $('.select_service_price_list').append(response[i+2]);
                    i=i+3;
                });
                
                total();
                // receive();
            }

        });
    }

    // function receive(){

    //     let data = $('.appForm').serialize();

    //     $.ajax({
    //         type: 'POST',
    //         url: "{{route('serviceItemReceiving')}}",
    //         data: data+'&_token={{csrf_token()}}',

    //         success:function(response){
    //             $('#receiving_mode1').html(response[0]);
    //             $('#receiving_mode2').html(response[1]);
    //         }

    //     });
    // }
    
    function total(){
        var total=0;
        $('.total').each(function(){
            var totalAmount = $(this).val();
            total +=parseInt(totalAmount);
        });
        $('.totalPrice').text(total.toFixed(2));
        $('.totalPrice').val(total.toFixed(2));
    }

    $(".clear").click(function(){
        $('.select_service_list').html('');
        $('.select_service_item_list').html('');
        $('.select_service_price_list').html('');

        $('.service_item_list').html('');
        $('.service_item_price').html('');
        $('.service_additional_item_list').html('');
        $('.service_additional_item_price').html('');
        total();
    })

    function remove_select(id) {
        $(".remove_select"+id).remove();
        total();
        // receive();
    }

    $(document).ready(function () {
        $(".service_item_id:checkbox:checked").each(function(){
            $(".selectitems"+$(this).val()).remove();
            item($(this).val());
        });
    })

    $('.filterPub').on('change', function() {
        
        let service_item_type   = $('#service_item_type').val();
        let data_subcategory_id = $('#data_subcategory_id').val();
        $.ajax({
            type: 'POST',
            url: "{{route('serviceItemsGet')}}",
            data: {_token:$('input[name=_token]').val(),
            service_item_type: service_item_type,
            data_subcategory_id: data_subcategory_id},
            success:function(response){
                $('.get_service_item_list').html('');
                $('.service_item_list').html('');
                $('.get_service_item_list').html(response);
            }
        });
    });
 

</script>