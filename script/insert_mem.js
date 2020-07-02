$(document).ready(function() {
   $(".classesName").submit(function(e) {
     e.preventDefault();
     var classArr = [];
     // console.log("HI"); // To show that ajax is called again and again
     var inputs = $(this).find('input[type=text]');
     for (var i = 0; i < inputs.length; i++) {
       var val = inputs[i].value.toUpperCase();
       // console.log(val);
       if (classArr.indexOf(val) != -1) {
         alert("Duplicate Name Found");
         return false;
       } else
         classArr.push(val);
     }
     this.submit();
     $.ajax( {
        url: "ajax_php/mem.php",
        method: "post",
        data: $("form").serialize(),
        dataType: "text",
        async : false, //THIS AJAX CALL SHOULD FINISH BEFORE ANY OTHER AJAX CALL OCCURS
     });
  });
});
