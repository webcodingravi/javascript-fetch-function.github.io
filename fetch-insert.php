<?php
include 'cofig.php';

$input = file_get_contents('php://input');
$decode = json_decode($input, true);

$fname = $decode["fname"];
$lname = $decode["lname"];
$age = $decode["age"];
$city = $decode["city"];

$sql = "INSERT INTO student(stu_name, last_name, Age, City) VALUES('{$fname}', '{$lname}', {$age}, '{$city}')";

if(mysqli_query($conn, $sql)) {
      echo json_encode(array('insert' => 'success'));
}else {
    echo json_encode(array('insert' => 'failed'));
}



?>