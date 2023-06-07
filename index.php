<?php
session_start();
include("Connection.php");

if(isset($_SESSION['UserName'])){
    header("Location: Main.php");
}

if(isset($_POST["submit"])){
    $Username = $_POST["uname"];
    $UserPass = $_POST["passwords"];
    // $UserRole = $_POST["Role"];
    
    $sql = "SELECT * FROM `accounts` WHERE `UserName` = binary '".$Username."' AND `Password` = binary '".$UserPass."'";
    $result = $con->query($sql);
    while($a = mysqli_fetch_row($result)){
        $userID = $a[0];
        $userType = $a[3];
        $activated = $a[4];
        $_SESSION['user_ID'] =  $userID;
    }
    if($result->num_rows > 0){
    if($activated == 1 || $activated == 2 ){
     
        $_SESSION['User_Name'] = $Username;
        $_SESSION['User_Password'] = $UserPass;
        $_SESSION['Role'] = $userType; 
 
          
        if($con){
            echo"<script>alert('LOG IN SUCCESSFUL!');window.location = 'Main.php?search=none'</script>";
         }
        die;

    }else{
      echo"<script>alert('LOG IN IS NOT SUCCESSFUL!')</script>";
    }



    }
    elseif(!$result->num_rows > 0){
        echo '<script>alert("connection Fail")</script>';
    }

}
// Create account
if(isset($_POST['Create-btn'])){
  $Uname = $_POST['UserName'];
  $pass = $_POST['User-Password'];
  $Pos = $_POST['Add-Role'];
  $fname = $_POST['Full_name'];


  $createAccount = "INSERT INTO `accounts`(`UserName`, `Password`, `Role`, `Activation`,`Fullname`)
   VALUES ('$Uname','$pass','$Pos','0','$fname')";
   $con->query($createAccount);
   echo("<script>alert('Your account is created. Wait for the admin to activate your account');window.location = 'index.php'</script>");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css  ">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="shortcut icon" href="sdoIcon.jpg" type="image/x-icon">    
<title>LOG IN</title>
    <!-- Custom styles for this template -->
  </head>
<style>
    html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: -webkit-box;
  display: flex;
  -ms-flex-align: center;
  -ms-flex-pack: center;
  -webkit-box-align: center;
  align-items: center;
  -webkit-box-pack: center;
  justify-content: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left\-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
img{
    width: 30%;
}

</style>
  <body class="text-center">
    <form class="form-signin" method="POST">
        <h5>Transmital Tracking System</h5>
        <img src="sdo3.png" alt="">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <input type="text" name="uname" id="inputEmail" class="form-control" placeholder="Email address" required autofocus><BR>
      <input type="password" id="myInput" name="passwords" id="inputPassword" class="form-control" placeholder="Password" required>
      </div>
      <input type="checkbox" onclick="myFunction()">Show Password
      <br>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">LOG IN</button>
      <button class="btn btn-lg btn-primary " type="button" name="SignUp"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">SIGN UP</button><br><br>
<br><br>
        <!-- script for showpassword -->
        <script>
          function myFunction() {
          var x = document.getElementById("myInput");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
}
        </script>
        <br><br>
      <p class="mt-5 mb-3 text-muted">&copy;CCBM</p>
    </form>
    <!-- Modal For Sign up -->
<form action="" method='post'>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Sign up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">User Name:</span>
  </div>
  <input type="text" class="form-control" name='UserName'  aria-label="Default" placeholder="User Name" aria-describedby="inputGroup-sizing-default" required>
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Full Name:</span>
  </div>
  <input type="text" class="form-control" name='Full_name'  aria-label="Default" placeholder="Full Name" aria-describedby="inputGroup-sizing-default" required>
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text"  id="inputGroup-sizing-default">Password:</span>

  </div>
  <input type="password" class="form-control" name="User-Password" aria-label="Default" placeholder="Password" id="password" aria-describedby="inputGroup-sizing-default" required>
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Confirm Password:</span>
  </div>
  <input type="password" class="form-control" id="confirm_password" aria-label="Default" placeholder="Confirm Password"  id="confirm_password" aria-describedby="inputGroup-sizing-default" required>
</div>
<select style='width:40%; float:left; border-radius:5px;' name="Add-Role" id="Role" required>
            <option value="">ROLE</option>
            <option name="Role" value="USER">USER</option>
            <option name="Role" value="ADMIN">ADMIN</option>
            <option name="Role" value="GUEST">GUEST</option>
</select><br><br>

<!-- <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="register_email" id="inputGroup-sizing-default">Gmail:</span>
  </div>
  <input type="email" class="form-control" name='Gmail' aria-label="Default" placeholder="Gmail" aria-describedby="inputGroup-sizing-default" required>
</div> -->

<!-- <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Pin number:</span>
  </div>
  <input type="text" class="form-control" aria-label="Default" placeholder="Pin number"  aria-describedby="inputGroup-sizing-default" required>
  <a href=""  class='btn btn-success' onclick='setLink()'>Send code</a>
</div> -->


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="Create-btn" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>
  </body>
<script>
var password = document.getElementById("password"),confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}
password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
<!-- <script>
  function setLink() {
    let regExp = /[a-zA-Z]/g;
    let emp = document.getElementById('register_empnumber').value;
    let employeeEmail = document.getElementById('register_email').value;
    let link = "sendOtp.php?email=" + employeeEmail;
        window.open(link, '_blank');
    // if (emp) {
    //   if (regExp.test(emp)) {
    //     alert("Employee Number contain Letters");
    //     return false;
    //   } else {
    //     // sendLink.href = "sendOtp.php?empnum=" + emp;\
        
    //   }

    // } else {
    //   alert("Enter your Employee Number");
    //   return false;
    // }
  }
</script> -->
</html>
