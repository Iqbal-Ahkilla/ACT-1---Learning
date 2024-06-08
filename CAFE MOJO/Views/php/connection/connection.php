<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "cafe_mojo_test";

$conn = new mysqli($host, $username, $password, $database);

if(!$conn){
    die("Can't connect to MySQL database " . $conn->connect_error());
}

?>