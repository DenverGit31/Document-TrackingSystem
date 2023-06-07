<?php
session_start();
include('Connection.php');
if(!isset($_SESSION['User_Name'])){
    header("Location: index.php");
}
if($_SESSION['User_Name'] && $_SESSION['User_Password'] && $_SESSION['Role']){
  $type = $_SESSION['Role'];
}else{
  header("location:index.php");
}
// Talbe
// $table = "SELECT * FROM trackingtbl";
// $query = mysqli_query($con,$table);
// Table for accepting
$table = "SELECT * FROM trackingtbl";
$query = mysqli_query($con,$table);


// Search
if(isset($_POST['Enter-tracknum'])){
  $Search = $_POST['Enter-tracknum'];
  $select = "select * from trackingtbl WHERE `Trackingnum` = '$Search'";
  $query=mysqli_query($con,$select);
}

// Request Id
if(isset($_REQUEST['id'])){
$Trnumber = $_REQUEST['id'];
// $remove = "DELETE FROM `accepted_tbl` WHERE `Trackingnum` = '$Trnumber'";
$id = $_SESSION['user_ID'];
$select1 = "select * from accounts where id = '$id'";
$query1=mysqli_query($con,$select1);
$date = date("Y/m/d");
$result = mysqli_fetch_assoc($query1);
// $con->query($remove);
$accepted = "UPDATE `trackingtbl` SET `Accepted`= '0' ,`AcceptedBy`='".$result["Fullname"]."' , Date_recieve = '$date'  WHERE `Trackingnum` = '$Trnumber' ";
$con->query($accepted);
echo"<script>alert('DOCUMENT IS ACCEPTED');window.location = 'Main.php'</script>";
// header('Location:Main.php');
}


?>
<script>
  // function Accepter(){
  //   if(true){
  //     alert('DOCUMENT IS ACCEPTED');
  //   }
  // }
  // function Decliner(){
  //   if(true){
  //     alert('DOCUMENT IS DECLINE');
  //   }
  // }
</script>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="sdoIcon.jpg" type="image/x-icon">    
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <title>Recieved</title>
</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
.searchbtn{
    border-radius: 5px;
    background-color: #fcfcfc;
    color: rgb(10, 10, 10);
}
.searchbtn:hover{
    background-color: #203f42;
    color: white;
    transition: .5s;
    
}
.navbar-brand{
    font-weight: bold;
    padding: 10px;
}
.nav-item.navbar-brand:hover{
    border-radius: 10px;
    background-color: #203f42;
    color: white;
    transition: .5s;

}
.navbar-brand:hover{
    padding: 10px;
    border-radius: 10px;
    background-color: #203f42;
    color: white;
    transition: .5s;
}
.Maincontainer .container label{
    float: left;
}
.container input{
    margin-right: 8%;
    outline: none;
    float: right;
    width: 400px;
    height: 30px;
    border-radius: 3px;
    

}
.disable-link {
    text-decoration: none;
    display: inline-block;
    padding: 4px;
    margin-left: 2%;
    color: white;
    border-radius: 5px;
    pointer-events: none;
    background-color: rgba(250, 2, 2, 0.595);
}
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark"  style="background-color: #41969e">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <img src="sdo3.png" alt="" style = "width:10%;">
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03" style='margin-left:2%;'>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    <li class="nav-item active">
    <a class="navbar-brand" href="Main.php">Home</a>
    </li>

      <?php
       if($type == 'USER'){
        // echo'<li class="nav-item">
        // <a class="navbar-brand" href="" style="color: white; ">Recieve</a>
        // </li>';
       }
       else{
        echo'<li class="nav-item">
        <a class="navbar-brand" href="Logout.php" style="color: white; ">Accounts</a>
        </li>';
       }
        ?>
      <li class="nav-item active">
      <a class="navbar-brand" href=""  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">User setting</a>
      </li>
      <li class="nav-item">
      <a class="navbar-brand" href="Logout.php" style="color: white; ">Log out</a>
      </li>
    </ul>
</nav><br><br>

<h3 style='text-align:center;'>Recieve Documents</h3><br>
<!-- Table -->

<div class='tableFlex' style='width:80%; margin:auto;max-height: 350px;overflow-y: scroll;'>
<table class='table table-striped table-active table-bordered' style=' margin:auto; text-align:center;' id='itemTable'>
  <thead class='thead-dark' >
    <tr>
                <th style='text-align:center; width:9% ;'>Tracking Number</th>
                <th style='text-align:center; width:15%;'>Type of transmital</th>
                <th style='text-align:center;'>Person responsible</th>
                <th style='text-align:center;'>Office</th>
                <th style='text-align:center;' >Date Forwarded</th>
                <th style='text-align:center;' >Submited By</th>
                <th style='text-align:center;' >ACCEPT</th>
                <th style='text-align:center;' >DECLINE</th>
    </tr>
  </thead>
  <tbody>
    <?php

    $num=mysqli_num_rows($query);
     if ($num>0) {
        while ($result = mysqli_fetch_assoc($query)) {
        //   $val = $result['Activated'];
            
            echo"
        <tr> 
            <td >".$result['Trackingnum']."</td>
            <td>".$result['Type_of_transmital']."</td>
            <td>".$result['Person_Responsible']."</td>
            <td>".$result['office']."</td>
            <td>".$result['date']."</td>
            <td>".$result['SubmitedBy']."</td>            
            ";
            if($result['Accepted'] == '1'){
              echo "<td class='upbtn'><a href='Forwarded.php?id=".$result['Trackingnum']."'onclick='activate(); Accepter();' onclick return false; class='btn btn-success'>Accept</a></td>";
              echo "<td class='upbtn'><a href='Decline.php?id=".$result['Trackingnum']."'onclick='Decline(); Decliner();' return false; class='btn btn-primary'>Decline</a></td>";
            }
            else{
              echo "<td class='upbtn'><a href='Forwarded.php?id=".$result['Trackingnum']."'onclick='activate()' return false; class='btn btn-success disable-link'>Accepted</a></td>";
              echo "<td class='upbtn'><a href='Decline.php?id=".$result['Trackingnum']."'onclick='Decline()' return false; class='btn btn-success disable-link'>Decline</a></td>";
            }
            echo"</tr> </div>";
        //     if ($val== 0) {
        //       echo "<td>Deactivated</td>";
        //   } else if ($val == 1) {
        //       echo "<td>Activated</td>";
        //   }      
            // if($type == "USER"){
               
            // }else{
            //     echo "<td class='upbtn'><a href='Accept.php?id=".$result['Trackingnum']."'onclick='activate()' return false; class='btn btn-success'>Accept</a></td>";
                    // echo "<td class='upbtn'><a href='activate.php?id=".$result['id']."'onclick='activate()' return false; class='btn btn-success'>Activate</a></td>";
                    // echo "<td class='upbtn'><a href='deactivate.php?id=".$result['id']."' onclick='deactivate()' class='btn btn-danger'>Deactivate</a></td>";

          
          }      
        }
    ?>
</tbody>
</table></div>
<br><br>

<!-- ACTIVATE CLICK -->
<script>
function activate() {
var result = confirm("Do you Want to Accept this Data?")
if(result == false){
  event.preventDefault();
}
}
function Decline() {
var result = confirm("Do you Want to Decline this Data?")
if(result == false){
  event.preventDefault();
}

}
</script>


<!-- END -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.2/b-2.3.4/b-html5-2.3.4/datatables.min.css" />
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.2/b-2.3.4/b-html5-2.3.4/datatables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#itemTable').DataTable({
                    "dom": 'Bfrtip',
                    buttons: [
                        'copyHtml5',
                        'csvHtml5'
                    ]

                })
            });
        </script>
</body>
</html>