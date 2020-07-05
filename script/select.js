$(document).ready(function() {
  $.ajax( {
      url: "ajax_php/select.php",
      method: "post",
      success: function(strMessage) {
          $("#select").html(strMessage);
      }
  });
 });
