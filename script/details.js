$("#button").click(function(){
  $(document).ready(function() {
        $.ajax( {
            url: "ajax_php/details.php",
            method: "post",
            data: $("form").serialize(),
            success: function(strMessage) {
                $("#message").html(strMessage);
            }
        });
   });
});
