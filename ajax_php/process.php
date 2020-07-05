<?php
    session_start();

    include_once 'includes/dbh.inc.php';

    $netpaid=$_POST['netpaid'];
    $paid1=$_POST['paid'];
    $receive = array();
    $give = array();

    //for selecting the billing cycle according to the user
    if(isset($_SESSION['bill'])){
      $bill_name=$_SESSION['bill'];
    }
    // if some of the members are not included in the billing cycle
    if(isset($_POST['mem_index'])){
      $_SESSION['mem_index']=$_POST['mem_index'];
      foreach ($_SESSION['mem_index'] as $value) {
        $index[]=$value;
      }
    }

    $conn = mysqli_connect("localhost","root","","slashbill");
    $s="SELECT COUNT(member1) AS num FROM member WHERE bill_name='$bill_name'";
    $data = mysqli_query($conn,$s) or die(mysqli_error());
    $row = mysqli_fetch_assoc($data);
    $count = $row['num']-count($index);

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

    if(isset($_SESSION['bill'])){
      $bill_name=$_SESSION['bill'];
    }

    $conn= mysqli_connect("localhost","root","","slashbill");
    $sql = "INSERT INTO slashbill (member,give,receive,paid,bill_name) VALUES (?,?,?,?,?)";

    $q="SELECT member1 FROM member WHERE bill_name='$bill_name';";
    $q_r=mysqli_query($conn,$q);
    $name=array();
    while($row = mysqli_fetch_array($q_r)){
      $name[]=$row['member1'];
      for ($i=0; $i < count($index) ; $i++) {
        $q=$index[$i];
        if(in_array($q,$name)){
          $key=array_search($q,$name);
          array_splice($name,$key);
        }
      }
      print_r($name);
    }

    for($x = 0; $x <count($name); $x++){
      $stmt = $conn->prepare($sql);
      if(!$stmt){
        die('Could not prepare statement');
      }
      if(!$stmt->bind_param("sssss",$name[$x],$give[$x],$receive[$x],$paid1[$x],$bill_name)){
        die('Could not bind statement');
      }
      if(!$stmt->execute()){
        die('Could not execute statement');
      }
   }
?>
