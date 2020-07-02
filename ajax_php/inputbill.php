<?php
// include_once 'includes/dbh.inc.php';
$conn= mysqli_connect("localhost","root","","slashbill");

// $p=[];
// foreach($_POST['paid'] as $key=>$value){
//   $p[]=$value;
// }
// $sql = "INSERT INTO member (amount) VALUES (?)";
// for($x = 0; $x <count($p); $x++){
//   $stmt = $conn->prepare($sql);
//   if(!$stmt){
//     die('Could not prepare statement');
//   }
//   if(!$stmt->bind_param("s",$p[$x])){
//     die('Could not bind statement');
//   }
//   if(!$stmt->execute()){
//     die('Could not execute statement');
//   }
// }
//
// $data = mysqli_query($conn,'SELECT SUM(`amount`) AS num FROM `member`') or die(mysqli_error());
// $row = mysqli_fetch_assoc($data);
// $sum = $row['num'];
// if($sum != $_POST['netpaid']){
//   alert("Net paid is not equal to that split between your friends");
// }

$q="SELECT DISTINCT member1 FROM member;"; // SELECTING DISTINCT CANNOT ALWAYS PROVIDE RELEAVANT INFORMATION YOU SHOULD TRY TO DO IT IN THE BEGGINING IT SELF IN ADDBILL.PHP

//$query="SELECT SUM(receive-give) FROM slashbill WHERE member='EH';";
$q_r=mysqli_query($conn,$q);
while($row = mysqli_fetch_array($q_r)){
  echo $row['member1'];
  echo '<input type="number" id="value[]" name="paid[]" value="0" min="0"><br></br>';//php input field
  // echo '<input type="checkbox" name="mem_index[]>"'; onclick should disable the input form field
}
?>
