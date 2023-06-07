<?php
session_start();
include('Connection.php');
$table = "SELECT * FROM trackingtbl";
$query = mysqli_query($con,$table);
// Session
if($_SESSION['User_Name'] && $_SESSION['User_Password'] && $_SESSION['Role']){
    $type = $_SESSION['Role'];
}else{
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="sdoIcon.jpg" type="image/x-icon">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Logs</title>
</head>
<!-- Style -->
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
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark"  style="background-color: #41969e;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <img src="sdo3.png" alt="" style = "width:10%;">
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03" style='margin-left:2%;'>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    <li class="nav-item active">
    <a class="navbar-brand" href="Main.php">Home</a>
    </li>
        <!-- <li class="nav-item">
         <a class="navbar-brand" href="#" style="color: white;"  class="btn btn-primary" data-toggle="modal" data-target="#ForRecieve">Recieve</a>
        </li> -->
        <?php
        if($type == 'ADMIN'){
          echo'<li class="nav-item">
          <a class="navbar-brand" href="Accounts.php" style="color: white; ">Accounts</a>
          </li>';
        }
        ?>
      <li class="nav-item">
      <a class="navbar-brand" href="Logout.php" style="color: white; ">Log out</a>
      </li>
    </ul>
</nav><br><br>

<!-- Table -->
<div class='tableFlex' style='width:100%;'>
<h4 style="text-align:center;">Recieved and Forwarded Data</h4>
<table class=' table  table-active table-bordered' style=' margin:auto; text-align:center;'  id='itemTable'>
  <thead class='thead-dark' >
    <tr>
                <th style='text-align:center; width:9% ;'>Tracking Number</th>
                <th style='text-align:center; width:15%;'>Type of transmital</th>
                <th style='text-align:center;'>Person responsible</th>
                <th style='text-align:center;'>Office</th>
                <th style='text-align:center;' >Date Forwarded</th>
                <th style='text-align:center;' >Submited By</th>
                <th style='text-align:center;' >Accepted By</th>
                <th style='text-align:center;' >Resend By</th>
                <th style='text-align:center;' >Date of Recieve</th>
                <th style='text-align:center;' >Remarks</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // Display per row in table
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
            <td>".$result['AcceptedBy']."</td>
            <td>".$result['Resend_By']."</td>
            <td>".$result['Date_recieve']."</td>";
          if($result['Accepted'] == '1' ){
              echo"<td class='upbtn'><labe  class='btn btn-success'l>FORWARDED</label></td>";  
          }
          elseif($result['Accepted'] == '2'){
            echo"<td class='upbtn'><labe  class='btn btn-secondary'l>DECLINED</label></td>"; 
          }
          else{
            echo"<td class='upbtn'><labe  class='btn btn-danger'l>ACCEPTED</label></td>";
          }

           echo" </tr> </div>";
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

<!-- END -->
<!-- Dt Table -->
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