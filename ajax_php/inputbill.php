<?php
session_start();
$conn= mysqli_connect("localhost","root","","slashbill");
if(isset($_SESSION['bill'])){
  $bill_name=$_SESSION['bill'];
}
$q="SELECT member1 FROM member WHERE bill_name='$bill_name' ;";
$q_r=mysqli_query($conn,$q);
while($row = mysqli_fetch_array($q_r)){
  $q=$row['member1'];
  echo '<input type="checkbox" class="agree" name="mem_index[]" value="'.$q.'"/>';
  echo $row['member1'];
  echo '<input type="number" id="value[]" name="paid[]" value="0" min="0"><br></br>';
}
?>
