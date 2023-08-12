<?php

//Global Error Handling
$dberror=false;
$createUserError=null;


if($_SERVER['REQUEST_METHOD'] === "POST"){
    include 'connect.php';

    $email=$_POST['email'];
    $password=$_POST['password'];


   
    //Check if user exists

    $userExistssql = "SELECT * FROM users WHERE email='$email' and password='$password'";

    $userCheckResult = mysqli_query($connection,$userExistssql);
    
    

    if(mysqli_num_rows($userCheckResult) < 1){
        $createUserError=true;
    }else{

        session_start();
        $_SESSION['email']=$email;
        header("Location: ./home.php");
   
       }
;



  
}

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body style="background-color: #fefefe;">
    
  <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">

  <form class="col-4 border p-3 rounded" style="background-color: #fff;" method="POST" action="login.php">

    <?php
        if($createUserError){
            echo '<div class="alert alert-danger" role="alert">
                   Invalid credentials
                </div>';
        }

        if($createUserError === false){
            echo '<div class="alert alert-success" role="alert">
                    Login Successful
                </div>';
        }

        

    ?>

    <h3 class="text-center ">Login</h3>
   
  <div class="mb-3 ">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
   <p class="mt-3">Go to <a href="./signup.php">Register</a></p>
</form>
  </div>
</html>