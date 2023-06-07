<?php
session_start();
$date = date("Y-m-d");
include('Connection.php');
if(isset($_REQUEST['id'])){
    $Tr = $_REQUEST['id'];
}
    $id = $_SESSION['userID'];
    $select = "select * from accounts where id = '$id'";
    $query=mysqli_query($con,$select);

    $result = mysqli_fetch_assoc($query);

    $InsertdodRod = "UPDATE `trackingtbl` SET `Resend_By`='".$result["Fullname"]."', `Accepted`='1', `Declined_tbl`='0',`Date`='$date',`Reason`='' WHERE `Trackingnum` ='$Tr'";
    $con->query($InsertdodRod);
    echo"<script>alert('DOCUMENT IS RESENDED');window.location = 'Main.php'</script>";
?>