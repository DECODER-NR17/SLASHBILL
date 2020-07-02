<?php
    include_once 'includes/dbh.inc.php';
    $netpaid=$_POST['netpaid'];
    $paid1=$_POST['paid'];
    $receive = array();
    $give = array();
    $conn = mysqli_connect("localhost","root","","slashbill");
    $data = mysqli_query($conn,'SELECT COUNT(DISTINCT member1) AS num FROM `member`') or die(mysqli_error());
    $row = mysqli_fetch_assoc($data);
    $count = $row['num'];
    foreach($paid1 as $value ){
        if($netpaid>0){
          $individualbill=floatval($netpaid/$count);

          if($value > $individualbill){
            $give[]=0;
            $receive[] = floatval( $value - $individualbill);
          }
          else if($value > 0){
            $receive[]=0;
            $give[]=floatval($individualbill-$value);
          }
          else{
            $receive[]=0;
            $give[] = $individualbill;
          }
        }
    }
    $conn= mysqli_connect("localhost","root","","slashbill");
    $sql = "INSERT INTO slashbill (member,give,receive,paid) VALUES (?,?,?,?)";
    $q="SELECT DISTINCT member1 FROM member;";
    $q_r=mysqli_query($conn,$q);
    $name=array();
    while($row = mysqli_fetch_array($q_r)){
      echo $row['member1'];
      $name[]=$row['member1'];
    }
    // PROBLEM:
    // I AM ABLE TO EXTRACT THE MEMBERS1 FROM MEMBER TABLE
    // BUT I NEED THE NAMES OF JUST THAT VALUE WHICH IS NOT SELECTED BY THE USER I.E {THE NAMES OF THE MEMBERS BETWEEN WHICH THE BILL IS SPLIT}
    // IF I DONOT WANT TO SPLIT BILL BETWEEN SOMEONE I SHOULD BE ABLE TO SELECT THEM AND THEN SEND THE ARRAY POSITION INTO PROCESS.php
    // SO THAT I WOULD DO THE CALCULATION ACCORDING todo
    // 1. NUMBER OF MEMBERS
    // 2. INSERT INTO SLASHBILL JUST THE NAMES BETWEEN WHICH THE BILL IS BEING SPLIT THE VALUES ARE CORRECTLY INSERTED

    for($x = 0; $x <count($name); $x++){
      $stmt = $conn->prepare($sql);
      if(!$stmt){
        die('Could not prepare statement');
      }
      if(!$stmt->bind_param("ssss",$name[$x],$give[$x],$receive[$x],$paid1[$x])){
        die('Could not bind statement');
      }
      if(!$stmt->execute()){
        die('Could not execute statement');
      }
   }
?>
