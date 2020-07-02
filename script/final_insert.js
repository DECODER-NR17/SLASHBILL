$(document).ready(function() {
     // <!--#my-form grabs the form id-->
     $("#amount").submit(function(e) {
         e.preventDefault();
         $.ajax( {
             // <!--insert.php calls the PHP file-->
             url: "ajax_php/process.php",
             method: "post",
             data: $("form").serialize(),
             dataType: "text",
             success: function(strMessage) {
                 // $("#message").html(strMessage);
                 $("#amount")[0].reset();
             }
         });
     });
 });
