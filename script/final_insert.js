$(document).ready(function() {
     $("#amount").submit(function(e) {
         e.preventDefault();
         $.ajax( {
             url: "ajax_php/process.php",
             method: "post",
             data: $("form").serialize(),
             dataType: "text",
             success: function(strMessage) {
                 $("#amount")[0].reset();
             }
         });
     });
 });
