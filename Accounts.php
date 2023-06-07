<?php
session_start();
include("Connection.php");
    $select = "select * from accounts";
    $querya=mysqli_query($con,$select);
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
    <title>Account Setting</title>
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
<body style="font-family: 'Poppins', sans-serif; background-color: aliceblue;">
<nav class="navbar navbar-expand-lg navbar-dark"  style="background-color: #41969e">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <img src="sdo3.png" alt="" style = "width:10%;">
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03"  style='margin-left:2%;'>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    <li class="nav-item active">
    <a class="navbar-brand" href="Main.php">Home</a>
    </li>
    <li class="nav-item active">
      <a class="navbar-brand" href=""  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">User setting</a>
      </li>
      <li class="nav-item">
      <a class="navbar-brand" href="Logout.php" style="color: white; ">Log out</a>
      </li>
    </ul>
  </div>
</nav><br><br>
<style>
  @media only screen and (max-width: 600px){
  .btn{
    margin-left:37.5%;
    width:38%;
  }
}
</style>
<h3 style='text-align:center;'>ACCOUNTS</h3>
<table class="table table-striped table-active table-bordered" style="width:100%; margin:auto; text-align:center;" id='itemTable'>
  <thead class="thead-dark" >
    <tr>
                <th style='text-align:center;'>UserName</th>
                <th style='text-align:center;'>Password</th>
                <th style='text-align:center;'>Position</th>
                <th style='text-align:center;'>Status</th>
      <th style='text-align:center;' >Action</th>
      <!-- <th style='text-align:center;' >Deactivate</th> -->
      <th style='text-align:center; width:15%;' >Password Reset</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $num=mysqli_num_rows($querya);
     if ($num>0) {
        while ($result = mysqli_fetch_assoc($querya)) {
          $val = $result['Activation'];
            
            echo"
        <tr>  
            <td >".$result['UserName']."</td>
            <td>".$result['Password']."</td>
            <td>".$result['Role']."</td>
            
           "
            ;
            if ($val== 0) {
              echo "<td>Deactivated</td>";
          } else if ($val == 1) {
              echo "<td>Activated</td>";
          }
          else if ($val == 2) {
            echo "<td>DEFUALT ACCOUNT</td>";
        }
            
          //   if($type == "USER"){

          //   }else{
          //           echo "<td class='upbtn'><a href='activate.php?id=".$result['id']."'onclick='activate()' return false; class='btn btn-success'>Activate</a></td>";
          //           // echo "<td class='upbtn'><a href='deactivate.php?id=".$result['id']."' onclick='deactivate()' class='btn btn-danger'>Deactivate</a></td>";
          //           echo "<td class='upbtn'><a href='passwordReset.php?id=".$result['id']."' onclick='deactivate()' class='btn btn-primary'>RESET</a></td>";
          // }
          $disable = $_SESSION['user_ID'] ;
          if($val == 0){
            if($result['id'] == $disable){
              echo "<td class='upbtn'><a href='' class='btn btn-success'>Activate</a></td>";
            }else{
              echo "<td class='upbtn'><a href='activate.php?id=".$result['id']."'onclick='activate()' return false; class='btn btn-success'>Activate</a></td>";
            }
            
            echo "<td class='upbtn'><a href='passwordReset.php?id=".$result['id']."' onclick='deactivate()' class='btn btn-primary'>RESET</a></td>";
          }
          elseif($val == 2){
            echo "<td class='upbtn'><a href=''class='btn btn-secondary'>DEFAULT ACCOUNT</a></td>";
            echo "<td class='upbtn'><a href='passwordReset.php?id=".$result['id']."' onclick='deactivate()' class='btn btn-primary'>RESET</a></td>";
          }
          else{
            if($result['id'] == $disable){
            echo "<td class='upbtn'><a href='' class='btn btn-danger'>Deactivate</a></td>";}
            else{
              echo "<td class='upbtn'><a href='deactivate.php?id=".$result['id']."' onclick='deactivate()' class='btn btn-danger'>Deactivate</a></td>";
            }
          echo "<td class='upbtn'><a href='passwordReset.php?id=".$result['id']."' onclick='deactivate()' class='btn btn-primary'>RESET</a></td>";
        }

       echo "</tr>";
        }
    }
    ?>
<script>
function activate() {
var result = confirm("Do you Want to activate this account?")
if(result == false){
  event.preventDefault();
}
}
function deactivate() {
var con = confirm("Do you Want to deactivate this account?")
if(con == false){
  event.preventDefault();
}
}
</script>
  </tbody></table></div><br><br>
  
  <!-- <table class="table" style="width:75%; margin:auto;" border='1'>
  <thead class="thead-dark">
    <tr>
                <th>Id</th>
                <th>EmployeID</th>
                <th>Name</th>
                <th>Gmail</th>
    </tr>
  </thead>
  <tbody> -->
    <?php
    // $num=mysqli_num_rows($querystaf);
    //  if ($num>0) {
    //     while ($result = mysqli_fetch_assoc($querystaf)) {
            
    //     echo"
    //     <tr>
    //         <td>".$result['id']."</td>
    //         <td>".$result['EmployeID']."</td>
    //         <td>".$result['Name']."</td>
    //         <td>".$result['Gmail']."</td>
    //        "      ;     
    //    echo "</tr>";
    //     }
    // }
    ?>
  <!-- </tbody></table></div> -->



<?php
    // if(isset($_POST['Add-account'])){
    //     $EmployeID = $_POST['EmpID'];
    //     $Name = $_POST['Name'];
    //     $email = $_POST['email'];
    // $addAccount = "INSERT INTO `stafaccounts`( `EmployeID`, `Name`, `Gmail`) VALUES ('$EmployeID','$Name','$email')";
    // $con->query($addAccount);
    // }
?>
<!-- User Setting -->
<div class="modal fade" id="activation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Setting</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        \
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="UserSetting.php" class="btn btn-primary">UPDATE</a>
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden=  "true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Setting</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <label for="">Name</label><br>
        <?php
        $id = $_SESSION['user_ID'];
        $select = "select * from accounts where id = '$id'";
        $query=mysqli_query($con,$select);
        
        $result = mysqli_fetch_assoc($query);
        echo'
        <span style="    font-weight: bold;" ">'.$result["UserName"].'</span><br>
        <div class="line1"></div><br>
        <label for="">Password</label><br>';

        echo'<span style="    font-weight: bold;" ">'.$result["Password"].'</span><br>
        
        <div class="line1"></div><br>';

        echo'<label for="">Position</label><br>
        <span style="    font-weight: bold;">'.$result["Role"].'</span><br>
        <div class="line1"></div><br>
        <br><br>'; ?>
        Reminder: You cant change your role and user name.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="UserSetting.php" class="btn btn-primary">UPDATE</a>
      </div>
    </div>
  </div>
</div>

<!-- ADD account  -->
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