<?php
include 'cofig.php';

$sql = "SELECT DISTINCT(City) FROM student";

$result = mysqli_query($conn, $sql) or die("Query failed");
$output = [];

if($result->num_rows > 0) {
   while($row = $result->fetch_assoc()){
    $output[] = $row; 
   }
}else{
    return false; 

}

$conn->close();

echo json_encode($output);










?>