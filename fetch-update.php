<?php

include 'cofig.php';

$input = file_get_contents('php://input');
$decode = json_decode($input, true);

$id = $decode["id"];
$fname = $decode["fname"];
$lname = $decode["lname"];
$age = $decode["age"];
$city = $decode["city"];

$sql = "UPDATE student SET stu_name = '{$fname}', last_name = '{$lname}', Age = {$age}, City = '{$city}' WHERE id = {$id}";

if(mysqli_query($conn, $sql)) {
      echo json_encode(array('update' => 'success'));
}else {
    echo json_encode(array('update' => 'failed'));
}


?>