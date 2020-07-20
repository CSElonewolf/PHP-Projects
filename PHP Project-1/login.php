<?php
    $showInvalidCredentials=false;
    $showEmptyError = false;
    $username='';
if($_SERVER['REQUEST_METHOD']  == 'POST'){
include '_dbconnect.php';
$username = $_POST['username'];
$password = $_POST['password'];

if($username == '' || $password == ''){
$showEmptyError = true;
}
else{

    //check for dupliacte username
    $userquery = "SELECT * FROM `user` WHERE username='$username'";
    $useresult = mysqli_query($conn,$userquery);
    if(mysqli_num_rows($useresult) == 1){
        while($row = mysqli_fetch_assoc($useresult)){
            if(password_verify($password,$row['password'])){
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location:welcome.php");
            }
            else{
                    $showInvalidCredentials=true;
            }
        }
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP Login System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <?php 
  require 'navbar.php';
  ?>
    <div class="container">
    <?php
    if($showEmptyError){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!!</strong> Fill all the details
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }
    if($showInvalidCredentials){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!!</strong> Invalid Credentials
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }
        ?>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h3 class="text-center m-4">Enter your login credentials</h3>
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="username">Email:</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter Username/Email Id" name="username">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password"
                            name="password">
                    </div>
                    <button type="submit" class=" btn btn-block btn-primary">Login</button>
                </form>

            </div>
        </div>
    </div>

</body>
</html>