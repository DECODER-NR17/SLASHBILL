$(document).ready(function() {
  $.ajax( {
      url: "ajax_php/inputbill.php",
      method: "post",
      success: function(strMessage) {
          $("#user_bill").html(strMessage);
      }
  });
 });
