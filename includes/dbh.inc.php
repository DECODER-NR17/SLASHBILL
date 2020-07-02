<?php

$dbServername ="localhost";
$dbUsername ="root";
$dbPassword ="";
$dbName = "slashbill";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
//conneted successfully when placing  the website folder into C:/xammp/htdocs/ or else php code doesn't execute
//  echo "Connected successfully";
?>
