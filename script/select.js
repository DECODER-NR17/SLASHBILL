$(document).ready(function() {
  $.ajax( {
      // <!--insert.php calls the PHP file-->
      url: "ajax_php/select.php",
      method: "post",
      // data: $("form").serialize(),
      // dataType: 'html',
      success: function(strMessage) {
          $("#select").html(strMessage);
          // $("#amount")[0].reset();
      }
  });
 });
