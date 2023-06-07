<?php
session_start();
include('Connection.php');
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
}
$Reset = "UPDATE `accounts` SET `Password`='12345' WHERE `id` = $id";
$con->query($Reset);
echo"<script>alert('Password is Resetted!');window.location = 'Accounts.php'</script>";

// This function will return a random
// string of specified length
// function random_strings($length_of_string)
// {
 
//     // String of all alphanumeric character
//     $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
 
//     // Shuffle the $str_result and returns substring
//     // of specified length
//     return substr(str_shuffle($str_result),
//                        0, $length_of_string);
// }
 
?>