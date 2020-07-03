<!-- PROBLEMS
1.#####HOW TO CHECK FOR NETPAID ==SUM(AMOUNT SPLIT BETWEEN THE MEMBERS), THE PROBLEM IS THE FORM IS DYNAMIC
2.#####THE DETAILS OF THE NET AMOUNT OF EACH MEMBER DOESN'T REFRESHES EACH TIME I ADD A NEW BILL/ WHEN THIS PAGE LOADS JUST THE FIRST NAME IS PRINTED IN INPUT FIELD NAMES SO I HAVE TO REFRESH THE PAGE TO GET ALL THE OTHER NAMES
3.WHAT IF THE BILL IS SPLIT WITH SOME MEMBERS AND NOT ALL-->
<?php
session_start();
include_once 'includes/dbh.inc.php';
if ( isset($_POST['bill'])){
	$_SESSION['bill']=$_POST['bill'];
	$bill_name=$_SESSION['bill'];
	// print_r($bill_name);
}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css ?v=<?php echo time(); ?>">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- <meta http-equiv="refresh" content="1"> -->
  <title>CREATE BILL</title>
</head>
<body>
    <div class="container">
      <h1 align=center>CREATE BILL</h1>
      <h4 align="center">Enter the bill amount to be divided</h4>
			<!-- for results details temp. tag -->
			<p id="message"></p>
			 <form align="center" id="amount" method="post" action="">
        <label for="netpaid">NET PAID</label><br>
        <input type="text" id="netpaid" name="netpaid" placeholder="bill_value"/><br><br/>
				<!-- name field and input field -->
				<div id="user_bill">
        </div>
				<!-- details -->
				<p id="message"></p>
        <input type="submit"/>
				<button id="button" type="button" name="button">DETAILS</button>
      </form>
      <a href="select_add.php">
      <img src="img/create.png" alt="CREATE" class="centre" width="100" height="100" >
      </a>
    </div>
    <!-- script for checking NETPAID=SUM(Amount split between the members) -->
		<!-- <script src="script/sum.js"></script> -->
		<script>
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
		</script>
    <!-- for printing name input field [   ]-->
		<script src="script/name_input.js"></script>
    <!-- insert the values into the database -->
		<!-- Now this is done in sum.js since only when all the conditions satify you should perform insertion operation -->
    <!-- <script src="script/final_insert.js"></script> -->
		<!-- for printing details of anount of each member DETAILS -->
		<script src="script/details.js"></script>
</body>
</html>
