<?php
session_start();
$conn= mysqli_connect("localhost","root","","slashbill");
// foreach($_SESSION as $value){
//   $bill_name=$value;
// }

//yaha bhi tho name of bill chaie
// if ( isset($_POST['bill'])){
// 	$_SESSION['bill']=$_POST['bill'];
// 	$bill_name=$_SESSION['bill'];
// 	print_r($bill_name);
// }
if(isset($_SESSION['bill'])){
  $bill_name=$_SESSION['bill'];
}
// WHERE bill_name='$bill_name'
$q="SELECT DISTINCT member1 FROM member WHERE bill_name='$bill_name' ;"; // SELECTING DISTINCT CANNOT ALWAYS PROVIDE RELEAVANT INFORMATION YOU SHOULD TRY TO DO IT IN THE BEGGINING IT SELF IN ADDBILL.PHP
$q_r=mysqli_query($conn,$q);
while($row = mysqli_fetch_array($q_r)){
  echo $row['member1'];
  echo '<input type="number" id="value[]" name="paid[]" value="0" min="0"><br></br>';//php input field
  // echo '<input type="checkbox" name="mem_index[]>"'; onclick should disable the input form field
}
?>
