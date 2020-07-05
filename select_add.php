<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="css/style.css ?v=<?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <title>SELECT BILL/ ADD BILL</title>
  </head>
  <body>
    <div class="container">
      <h1 align=center>SLASH BILL</h1>
      <h4 align=center> SELECT BILL OR CREATE NEW BILL</h4>
      <!-- selection option and on clicking select should take you to addbill.php -->
      <form align="center" action="addbill.php" method="POST">
      	<div id="select"></div>
        <input type="submit"/>
      </form>
      <!-- If you want to create a new bill then click + -->
      <a href="addmem.php">
			<img src="img/create.png" alt="CREATE" class="centre" width="100" height="100" >
			</a>
    </div>
    <script src="script/select.js"></script>
  </body>
</html>
