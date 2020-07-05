<?php
session_start();
$conn= mysqli_connect("localhost","root","","slashbill");

if(isset($_SESSION['bill'])){
  $bill_name=$_SESSION['bill'];
}

$query="SELECT member,SUM(receive-give) FROM slashbill  AS member WHERE bill_name='$bill_name' GROUP BY member ;";
$query_result=mysqli_query($conn,$query) or die(mysqli_error($conn));
echo "<table>
<tr>
<th>NAME</th>
<th>AMOUNT</th>
</tr>";
while($row = mysqli_fetch_array($query_result)){
  echo "<tr>";
  echo "<td>".$row['member']."</td>";
  echo "<td>".$row['SUM(receive-give)']."</td>";
  echo "</td>";
}
echo "</table>";
?>
