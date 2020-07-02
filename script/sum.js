$(document).ready(function(){
      if(parseInt($("#netpaid").val())<0){
        alert("Money Split Can't Be Negative");
      }
      $("#amount").submit(function(e) {
        e.preventDefault();
        var value = $(this).find('input[type=number]');
        var sum = 0;
        var i;
        for(i = 0; i < value.length; i++){
          var indamt = parseInt($(value[i]).val());
          sum = sum + indamt;
        }
        console.log(sum);
        console.log(parseInt($("#netpaid").val()));

        if (sum != parseInt($("#netpaid").val()) ) {
          alert("Net paid is not equal to that split between your friends");
          return false;
        }
        this.submit();
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
