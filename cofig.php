<?php
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_dbname = "info";

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_dbname);

if($conn->connect_error) {
    die("Connection failed :".$conn->connect_error);
}










?>