<?php
session_start();
include('Connection.php');
if(isset($_REQUEST['id'])){
    $Tr = $_REQUEST['id'];
}
// Declined btn
if(isset($_POST['Decline-btn'])){
    $id = $_SESSION['user_ID'];
    $select = "select * from accounts where id = '$id'";
    $query=mysqli_query($con,$select);
    
    $result = mysqli_fetch_assoc($query);
    $DateofDecline = $_POST['date'];
    $ReasonOfDecline = $_POST['Feedback'];
    $InsertdodRod = "UPDATE `trackingtbl` SET `Accepted`='2',  `Declined_tbl`='2',`Date_of_declined`='$DateofDecline',`Reason`='$ReasonOfDecline', `Declinedby_tbl`='".$result["Fullname"]."'  WHERE `Trackingnum` ='$Tr'";
    $con->query($InsertdodRod);
    echo"<script>alert('DOCUMENT IS DECLINED');window.location = 'Main.php'</script>";
}
// Table
$table = "SELECT * FROM trackingtbl";
$query = mysqli_query($con,$table);
// Table for coa

// Log out  
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="sdoIcon.jpg" type="image/x-icon">    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
      <a class="navbar-brand" href="Logs.php" >Logs</a>
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

      <li class="nav-item active">
      <a class="navbar-brand" href=""  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">User setting</a>
      </li>
      <li class="nav-item">
      <a class="navbar-brand" href="Logout.php" style="color: white; ">Log out</a>
      </li>
    </ul>
</nav><br><br>



<div class="wrapper bg-white mt-sm-5">
    <h4 class="pb-4 border-bottom">Please Submit feedback of declining</h4>
    <label for="">You are Declining this Tracking number</label>
    <input style='text-align:center; border-radius:10px;' type="text" disabled value="<?php echo $Tr;?>"><hr>
        <form method="post">
                <div class="">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Date of decline</label>
                    <input type="date" name='date' style='width:100%; border-radius:5px; ' required>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Reason of declining</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='Feedback' placeholder='Enter Here...' required></textarea>
                </div>
                </div>
                
                <div class="py-3 pb-4 border-bottom">
                    <button type="submit" class="btn btn-primary mr-3" name="Decline-btn" >Decline</button>
                    <a href="Main.php" class="btn border button">Cancel</a>
                </div>
        </form>
        <div class="d-sm-flex align-items-center pt-3" id="deactivate">
        </div>
    </div>
</div>
<br>
</body>
</html>