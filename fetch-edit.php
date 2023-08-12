<?php
include 'cofig.php';

$sid = $_GET['editId'];

$sql = "SELECT * FROM student WHERE id = {$sid}";

$result = mysqli_query($conn, $sql) or die("Query failed");
$output = [];

if($result->num_rows > 0) {
   while($row = $result->fetch_assoc()){
    $output['response'] [] = $row; 
   }
}

$sql1 = "SELECT DISTINCT(City) FROM student";

$result1 = mysqli_query($conn, $sql1) or die("Query failed");


if($result1->num_rows > 0) {
   while($row1 = $result1->fetch_assoc()){
    $output['city_name'] [] = $row1; 
   }
}


$conn->close();

echo json_encode($output);


?>