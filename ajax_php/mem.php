<?php
      $name=[];
      foreach($_POST['name'] as $key=>$value){
        $name[]=$value;
      }

      $bill_name=$_POST['bill'];
      
      include_once 'includes/dbh.inc.php';
      $conn= mysqli_connect("localhost","root","","slashbill");
      $sql = "INSERT INTO member (bill_name,member1) VALUES (?,?)";
      for($x = 0; $x <count($name); $x++){
        $stmt = $conn->prepare($sql);
        if(!$stmt){
          die('Could not prepare statement');
        }
        if(!$stmt->bind_param("ss",$bill_name,$name[$x])){
          die('Could not bind statement');
        }
        if(!$stmt->execute()){
          die('Could not execute statement');
        }
     }
?>
