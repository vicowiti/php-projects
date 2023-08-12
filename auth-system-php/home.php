<?php
session_start();

if(!isset($_SESSION['email'])){
    header("Location: ./login.php");
}

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body style="background-color: #fefefe;">
    
  <div class="container d-flex  justify-content-center align-items-center" style="height: 100vh; flex-direction:column">

  <h1>Welcome <?php echo $_SESSION['email'] ?> to the home page</h1>

  
  <a href="./logout.php">
<button class="btn btn-danger mt-5">Logout</button>
  </a>
  </div>
</html>