<?php
$host="localhost";
$user="root";
$password="";
$db="trackingsyste_accounts";

//Sql Connection
$con = mysqli_connect($host,$user,$password,$db);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }
  //echo '<script>alert("connection test")</script>';

?>