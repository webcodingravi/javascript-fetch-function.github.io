<?php

include 'cofig.php';

$id = $_GET['delId'];

$sql = "DELETE FROM student WHERE id = {$id}";

if(mysqli_query($conn, $sql)) {
      echo json_encode(array('delete' => 'success'));
}else {
    echo json_encode(array('delete' => 'failed'));
}




?>