<?php
session_start();
unset($_SESSION['User_Name']);
unset( $_SESSION['User_Password']);
unset( $_SESSION['Role']);
session_destroy();
header("location:index.php");

?>