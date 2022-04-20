
<script type="text/javascript">
    $(document).on("click",".delete",function(e){
        e.preventDefault();
        let id = $(this).data("id");
        let route_name = "{{route($route_name)}}";

        if (!confirm('Are you sure you want to continue?')) {
            alert(false);
        }else{
            $.ajax({
                url: route_name,
                type: "GET",
                data: {id:id},
                success: function(data){
                    console.log(data);
                    if(data.success){
                        $('#dataListTable').DataTable().ajax.reload();
                        $('#alert_message').fadeIn("slow"); //Check in top in this blade
                        $('#alert_message').addClass('alert alert-success').html(data.success);
                        setTimeout(function() {
                                $('#alert_message').fadeOut("slow");
                        }, 3000);
                    }
                }
            });
        }
    });
</script>
