<?php
$conn= mysqli_connect("localhost","root","","slashbill");
$query = "SELECT DISTINCT bill_name FROM member";
$query_result=mysqli_query($conn,$query);
?>
<select name="bill" onchange="showTrip(this.value)">
<?php
while ($row = mysqli_fetch_array($query_result))
{
    // echo $row['bill_name'];
    // option value=??
    echo '<option >'.$row['bill_name'].'</option>';
}
?>
</select>
