$(document).ready(function() {
  $.ajax( {
      // <!--insert.php calls the PHP file-->
      url: "ajax_php/inputbill.php",
      method: "post",
      // data: $("form").serialize(),
      // dataType: 'html',
      success: function(strMessage) {
          $("#user_bill").html(strMessage);
          // $("#amount")[0].reset();
      }
  });
 });
