function addMore() {
  $("<div>").load("ajax_php/input.php", function() {
      $("#members").append($(this).html());
  });
}
function deleteRow() {
  $('div.name').each(function(index, item){
    jQuery(':checkbox', this).each(function () {
            if ($(this).is(':checked')) {
        $(item).remove();
            }
        });
  });
}
