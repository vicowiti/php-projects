<?php

//Global Error Handling
$dberror=false;
$createUserError=null;


if($_SERVER['REQUEST_METHOD'] === "POST"){
    include 'connect.php';

     

    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];
    $password=$_POST['password'];


   
    //Check if user exists

    $userChecksql = "SELECT * FROM users WHERE email='$email'";

    $userCheckResult = mysqli_query($connection,$userChecksql);

    if(mysqli_num_rows($userCheckResult) > 0){
        $createUserError=true;
    }else{
  $createUsersql="INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`) VALUES ('$first_name', '$last_name', '$email', '$password')";

    $result=mysqli_query($connection,$createUsersql);

    if($result)
    {
       $createUserError=false;
    }
    else
    {
       $createUserError=true;
    }
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

  <form class="col-4 border p-3 rounded" style="background-color: #fff;" method="POST" action="signup.php">

    <?php
        if($createUserError){
            echo '<div class="alert alert-danger" role="alert">
                    User Already Exists
                </div>';
        }

        if($createUserError === false){
            echo '<div class="alert alert-success" role="alert">
                    User Created Successfully
                </div>';
        }

        

    ?>

    <h3 class="text-center ">Register Account</h3>
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">First Name</label>
    <input type="text" class="form-control" name="first_name" >
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Last Name</label>
    <input type="text" class="form-control" name="last_name">
  </div>
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
  <p class="mt-3">Go to <a href="./login.php">Login</a></p>
</form>
  </div>
</html>