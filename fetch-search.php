<?php

include 'cofig.php';

$search_trem = $_GET['search'];

$sql = "SELECT * FROM student WHERE concat(stu_name, last_name, Age, City) LIKE '%{$search_trem}%'";

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