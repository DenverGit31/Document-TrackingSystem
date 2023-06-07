<?php
session_start();
require_once 'Connection.php';

if (!isset($_SESSION['userID'])) {
    header("index.php");
}

if (isset($_REQUEST['id'])) {
    $userId = $_REQUEST['id'];

    $query_activate = "UPDATE `accounts` SET `Activation`= '0' WHERE id = '$userId';";
    try {
        $result_deactivate = mysqli_query($con, $query_activate);

        if ($result_deactivate) {
            echo"<script> window.location = 'Accounts.php' </script>";
            // header("Location:Accounts.php");
        } else {
            echo "<script>window.location = 'Accounts.php' </script>";
        }
    } catch (\Throwable $th) {
        //throw $th;
    }
}
?>