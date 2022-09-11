<script>

function notificationMarkAsRead()
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".markAsRead").click(function(e){
        e.preventDefault();

        var notificationId = $("input[name=notification_id]").val();
        var url = "{{route('markAsRead')}}";
        
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                id: notificationId,
            },
            success:function(response){
                if(response.success){
                    $(".ajax-data-header").empty().append(response.page);
                }else{
                    alert('error')
                }
            },
            error:function(error){
                console.log(error)
            }
        });
    });
}
    

</script>