<?php
// include_once '*/includes/dbh.inc.php';
$conn= mysqli_connect("localhost","root","","slashbill");

$query="SELECT member,SUM(receive-give) FROM slashbill AS member GROUP BY member;";
//$query="SELECT SUM(receive-give) FROM slashbill WHERE member='EH';";
$query_result=mysqli_query($conn,$query);
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
