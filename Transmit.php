<?
session_start();
include('Connection.php');
if(!isset($_SESSION['UserName'])){
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transmit</title>
    <link rel="shortcut icon" href="sdoIcon.jpg" type="image/x-icon">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
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
<nav class="navbar navbar-expand-lg navbar-dark"  style="background-color: #41969e">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <img src="track.png" alt="" style = "width:10%;">
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
        <a class="navbar-brand" href="Main.php">Home</a>
        </li>
        <li class="nav-item active">
        <a class="navbar-brand" href=""  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Logs</a>
        </li>
        <li class="nav-item active">
        <a class="navbar-brand" href=""  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">User setting</a>
        </li>

        <li class="nav-item">
        <a class="navbar-brand" href="Logout.php" style="color: white; ">Log out</a>
        </li>
        </ul>
</nav>
<br><br>
<!-- Input fields -->
<form class="form-inline" method='POST'; style='margin:auto; width:30%; background-color: #51bec7; padding:30px; border-radius:5px;'>
  <div class="form-group mx-sm-3 mb-2">

    <input type="text" class="form-control" id="Typeoftransmit"  placeholder="Tracking number" value='<?php
    if(isset($_POST['generate'])){
    echo $RandomNum = rand(100000000,999999999);}?>'>
  </div>
  <button type="submit" name='generate' class="btn btn-primary mb-2">Generate</button>
  <div class="form-group mx-sm-3 mb-2">
    <input type="text" class="form-control" id="Typeoftransmit"  placeholder="type of transmital">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <input type="text" class="form-control" id="Typeoftransmit"  placeholder="Person responsible">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <input type="text" class="form-control" id="Typeoftransmit"  placeholder="Office">
  </div>
  <div class="form-group mx-sm-3 mb-2">

    <input type="date" class="form-control" id="Typeoftransmit"  placeholder="Date">
  </div>
  <button type="submit" class="btn btn-primary mb-2" style='width:25%;'>Send</button>
</form>
</body>
</html>