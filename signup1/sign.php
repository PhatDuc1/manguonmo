<?php
$success=0;
$user=0;
$invalid=0;

    if($_SERVER['REQUEST_METHOD']=='POST'){
        include 'connect.php';
        $username=$_POST['username'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];


        $sql="Select * from `registration` where
        username='$username'";

        $result=mysqli_query($con,$sql);
        if($result){
            $num=mysqli_num_rows($result);
            if($num>0){
                // echo "User already exist";
                $user=1;
            }else{
              if($password===$cpassword){
                $sql="insert into `registration`(username,password)
                values('$username','$password')";
                $result=mysqli_query($con,$sql);
                if($result){
                    // echo "Signup successfully";
                    $success=1;
                    header('location:login.php');
                }
                else{
                    $invalid=1;
                }
                    }
                }}
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>SIGNUP PAGE</title>
  </head>
  <body>

    <?php
    if($user){
            echo'<div class="alert alert-danger
            alert-dismissible fade show" role="alert">
    <strong>Error!</strong> User already exits
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    }
    ?>

    <?php
    if($invalid){
            echo'<div class="alert alert-danger
            alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Invalid credentials
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    }
    ?>

    <?php
        if($success){
                echo'<div class="alert alert-success
                alert-dismissible fade show" role="alert">
        <strong>Success</strong> You are successfully sign up.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>';
        }
        ?>
    <h1 class="text-center">Sign up page</h1>
    <div class="container mt-5">
    
    <form action="sign.php" method="post">
  <div class="form-group">
    <label for="username">Name</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Name" required>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
  </div>
  <div class="form-group">
    <label for="password">Confirm Password</label>
    <input type="password" class="form-control" id="password" name="cpassword" placeholder="Confirm Password" required>
  </div>
  <button type="submit" class="btn btn-primary w-100">Submit</button>
</form>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
