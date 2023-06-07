<?php
session_start();

include('Connection.php');
$id = $_SESSION['user_ID'];
$select = "select * from accounts where id = '$id'";
$query=mysqli_query($con,$select);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="sdoIcon.jpg" type="image/x-icon">    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>User Setting</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    font-family: 'Poppins', sans-serif;
    background-color: aliceblue;
}

.wrapper{
    padding: 30px 50px;
    border: 1px solid #ddd;
    border-radius: 15px;
    margin: 10px auto;
    max-width: 600px;
}
h4{
    letter-spacing: -1px;
    font-weight: 400;
}
.img{
    width: 70px;
    height: 70px;
    border-radius: 6px;
    object-fit: cover;
}
#img-section p,#deactivate p{
    font-size: 12px;
    color: #777;
    margin-bottom: 10px;
    text-align: justify;
}
#img-section b,#img-section button,#deactivate b{
    font-size: 14px; 
}

label{
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 500;
    color: #777;
    padding-left: 3px;
}

.form-control{
    border-radius: 10px;
}

input[placeholder]{
    font-weight: 500;
}
.form-control:focus{
    box-shadow: none;
    border: 1.5px solid #0779e4;
}
select{
    display: block;
    width: 100%;
    border: 1px solid #ddd;
    border-radius: 10px;
    height: 40px;
    padding: 5px 10px;
    /* -webkit-appearance: none; */
}

select:focus{
    outline: none;
}
.button{
    background-color: #fff;
    color: #0779e4;
}
.button:hover{
    background-color: #0779e4;
    color: #fff;
}
.btn-primary{
    background-color: #0779e4;
}
.danger{
    background-color: #fff;
    color: #e20404;
    border: 1px solid #ddd;
}
.danger:hover{
    background-color: #e20404;
    color: #fff;
}
@media(max-width:576px){
    .wrapper{
        padding: 25px 20px;
    }
    #deactivate{
        line-height: 18px;
    }
}
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
<!-- Confirm Password -->
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
      <li class="nav-item active">
      <a class="navbar-brand" href="UserSetting.php">User setting</a>
      </li>

      <li class="nav-item">
      <a class="navbar-brand" href="Logout.php" style="color: white; ">Log out</a>
      </li>
    </ul>
  </div>
</nav>
<div class="wrapper bg-white mt-sm-5">
    <h4 class="pb-4 border-bottom">Account settings</h4>
    <div class="py-2">
    <?php
            if(isset($_POST['usersetting-update'])){
            $updatePass = $_POST['User-Password'];
            $Newpass = "UPDATE `accounts` SET `Password`='$updatePass' WHERE `id`= $id ";
            $con->query($Newpass);
            if($con){
                // header("location:Main.php");
                echo"<script>alert('UPDATE PASSWORD SUCCESSFULL!');window.location = 'Main.php'</script>";
            }
            else{
                echo"<script>alert('UPDATE PASSWORD NOT SUCCESSFULL!');window.location = 'UserSetting.php'</script>";
            }
            }
            
            ?>
        <form action="" method="post">
        <div class="row py-2">
            <div class="col-md-6 pt-md-0 pt-3">
                <label for="phone">New Password</label>
                <input type="password" class="bg-light form-control" placeholder="New Password" id="password" name="User-Password"  required>
                <label for="phone">Confirm Password</label>
                <input type="password" class="bg-light form-control" placeholder="Confirm Password"  id="confirm_password"  required>
            </div>
        </div>
        
        <div class="py-3 pb-4 border-bottom">
            <button type="submit" class="btn btn-primary mr-3" name="usersetting-update" onclick='alrtBtn()'>Save Changes</button>
            <a href="Main.php" class="btn border button">Cancel</a>
        </div>
        </form>
        <div class="d-sm-flex align-items-center pt-3" id="deactivate">
            <div>
                <p>REMINDER: Role or Possition is not editable</p>
            </div>
        </div>
    </div>
</div>
<br>
</body>
</html>
<!-- <script>
function alrtBtn() {
  alert("Your Password is updated");
}
</script> -->
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
