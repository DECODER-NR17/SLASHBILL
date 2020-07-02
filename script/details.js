$("#button").click(function(){
  // e.preventdefault();
  $(document).ready(function() {
        $.ajax( {
            // <!--insert.php calls the PHP file-->
            url: "ajax_php/details.php",
            method: "post",
            data: $("form").serialize(),
            // dataType: 'html',
            success: function(strMessage) {
                $("#message").html(strMessage);
                // $("#amount")[0].reset();
            }
        });
   });
});
