$(document).on("click",".active",function(e){
    e.preventDefault();
    var id = $(this).data("id");
    let route_name = "<?php echo e(route($route_name)); ?>";

    $.ajax({
        url: route_name,
        type: "GET",
        data: {id:id},
        error: function(response){
            console.log(response)
            var dataKeys   = Object.keys(response.responseJSON.errors);
            var dataValues = Object.values(response.responseJSON.errors);
            let html = '<div class="alert alert-danger">';
            for (let count = 0; count < dataValues.length; count++) {
                html += '<p>' + dataValues[count] + '</p>';
            }
            html += '</div>';
            $('#alert_message').fadeIn("slow"); //Check in top in this blade
            $('#alert_message').html(html);
            setTimeout(function() {
                $('#alert_message').fadeOut("slow");
            }, 3000);
        },
        success: function(data){
            console.log(data);
            if (data.demo) {
                $('#alert_message').fadeIn("slow"); //Check in top in this blade
                $('#alert_message').addClass('alert alert-danger').html(data.demo);
                setTimeout(function() {
                    $('#alert_message').fadeOut("slow");
                }, 3000);
            }
            else if(data.success){
                $('#dataListTable').DataTable().ajax.reload();
                $('#alert_message').fadeIn("slow"); //Check in top in this blade
                $('#alert_message').addClass('alert alert-success').html(data.success);
                setTimeout(function() {
                    $('#alert_message').fadeOut("slow");
                }, 3000);
            }
        }
    });
});
<?php /**PATH /var/www/html/cartpro/cartproshop_new/resources/views/admin/includes/common_js/active_js.blade.php ENDPATH**/ ?>