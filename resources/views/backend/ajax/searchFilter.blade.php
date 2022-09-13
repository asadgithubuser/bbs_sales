{{-- Initialize Plugins --}}
<script>










    $(document).on('click', '.ajax-pagination-area .pagination li a', function(e) {
        e.preventDefault();

        var url = $(this).attr('href');

        $.ajax({
            url: url,
            type: 'GET',
            cache: false,
            dataType: 'json',
            success: function(response)
            {
                $(".ajax-data-container").empty().append(response.page);
            },
            error: function(){}
        });

    });

    $(document).ready(function() {

        var delay = (function(){
            var timer = 0;
            return function(callback, ms){
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
            };
        });


        $(document).on("keyup change", ".ajax-data-search", function(e){
            
            e.preventDefault();
            
            var that = $( this );
            var q = e.target.value;
            var url = that.attr("data-url");
            var urls = url+'?q='+q;
            

            $.ajax({
                url: urls,
                type: 'GET',
                cache: false,
                dataType: 'json',
                success: function(response)
                {
                $(".ajax-data-container").empty().append(response.page);
                },
                error: function(){}
            });
        });

        $(document).on("change", ".ajax-data-search", function(e){
            
            e.preventDefault();
            
            var that = $( this );
            var q = e.target.value;
            var url = that.attr("data-select");
            var urls = url+'?q='+q;
            
            $.ajax({
                url: urls,
                type: 'GET',
                cache: false,
                dataType: 'json',
                success: function(response)
                {
                $(".ajax-data-container").empty().append(response.page);
                },
                error: function(){}
            });
        });

        $(document).on("change", ".ajax-data-search2", function(e){
            
            let division = $('#division_id').val();
            let district = $('#district_id').val();
            let upazila = $('#upazila_id').val();
            let union = $('#union_id').val();
            let mouza = $('#mouza_id').val();
            let type = $(this).attr('data-select');
            
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{route('admin.search_location')}}",
                data: {_token:$('input[name=_token]').val(),
                division: division,
                district: district,
                upazila: upazila,
                union: union,
                mouza: mouza,
                type: type},

                success: function(response)
                {
                    $(".ajax-data-container").empty().append(response.page);
                },
                error: function(){}
            });
        });
    });
</script>
