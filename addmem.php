<!-- PROBLEMS
0. CREATE A GROUP ID FOR DIFFERENT SPLIT BILL LIKE, MUMBAI TOUR BILL, HOUSE BILL, AND SO ON
1. #####HOW TO AVOID DUPLICATE VALUES LIKE NITISH and nitish
2. #####WHEN DUPLICATES OCCUR AN ALERT MESSAGE POPS UP BUT THE MEMBERS ARE STILL INSERTED INTO THE DATABASE, AND WHEN YOU MAKE CHANGES AGAIN IT IS INSERTED INTO THE DATABASE/
   IF A DUPLICATE NAME OCCURS I HAVE TO CLICK SUBMIT TWICE TO GET THE ALERT MESSAGE SO IT INSERTS TWICE INTO THE DATABASE
3. #####TO SOLVE PROBLEM 2. I HAVE INSERTED DISTINCT IN ALL THE SQL QUERIES-->
<?php
	session_start();
	include_once 'includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html>
	<head>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css ?v=<?php echo time(); ?>">
		<title>ADD MEMBERS</title>
		<!-- script for adding and deleting members -->
    <script src="script/add_remove.js"></script>
	</head>
	<body>
		<div class=container>
			<h4 align=center> ADD MEMBERS</h4>
			<form  align="center" class="classesName" action="addbill.php" method="POST" autocomplete="off" >
        <!-- DYNAMIC FORM HANDLING -->
        <div id="outer">
          <div id="header">
          <div class="float-left">&nbsp;</div>
          <div class="float-left col-heading">Name</div>
          </div>
					<label>NAME OF BILL</label><input type="text" class="bill_n" name="bill" pattern="[a-zA-Z][a-zA-Z ]{2,}" required=""/>
          <div id="members">
          <?php require_once("ajax_php/input.php") ?>
          </div>
          <div class="btn-action float-clear">
            <input type="button" name="add_item" value="Add More" onClick="addMore();" />
            <input type="button" name="del_item" value="Delete" onClick="deleteRow();" />
          </div>
          <div class="footer">
            <input type="submit"/>
          </div>
        </div>
      </form>
			<!-- inserts into databse slashbill/member the members name -->
      <script src="script/insert_mem.js"></script>
	</div>
	</body>
</html>
