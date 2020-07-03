<?php
session_start();
// include_once '*/includes/dbh.inc.php';
$conn= mysqli_connect("localhost","root","","slashbill");

//yaha bhi tho name of bill chaie
if(isset($_SESSION['bill'])){
  $bill_name=$_SESSION['bill'];
}
// print_r($bill_name);
$query="SELECT member,SUM(receive-give) FROM slashbill  AS member WHERE bill_name='$bill_name' GROUP BY member ;";
//$query="SELECT SUM(receive-give) FROM slashbill WHERE member='EH';";
echo $bill_name;
$query_result=mysqli_query($conn,$query) or die(mysqli_error($conn));
echo "<table>
<tr>
<th>NAME</th>
<th>AMOUNT</th>
</tr>";
while($row = mysqli_fetch_array($query_result)){
  echo "<tr>";
  echo "<td>".$row['member']."</td>";
  echo "<td>".$row['SUM(receive-give)']."</td>";//HOW TO GET NAME'S OF DIFFERENT MEMBERS IN THE DATABASE
  echo "</td>";
  // echo "<br></br>";
}
echo "</table>";
?>
