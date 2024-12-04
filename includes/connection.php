<?php

$host = "localhost";
$dbUsername = "root";
$dbPwd = "";
$dbName = "todoapp";

$conn = mysqli_connect($host, $dbUsername, $dbPwd, $dbName);
if(!$conn){
   die("Connection failed: " . mysqli_connect_error());
}