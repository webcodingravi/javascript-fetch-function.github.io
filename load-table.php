<?php
include 'cofig.php';

$sql = "SELECT * FROM student";

$result = mysqli_query($conn, $sql) or die("Query failed");
$output = [];

if($result->num_rows > 0) {
   while($row = $result->fetch_assoc()){
    $output[] = $row; 
   }
}else{
    $output['empty'] = ['empty']; 

}

$conn->close();

echo json_encode($output);








?>