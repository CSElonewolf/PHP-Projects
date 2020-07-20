<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !=true){
  header("location:login.php");
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
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">iSecure</a>
  </nav>
  <div class="container text-center m-4">
  <div class="alert alert-success  fade show" role="alert">
        Welcome<strong><?php echo " ".$_SESSION['username']." ";?></strong>to My First Bootstrap Page.To logout <a href="logout.php">Click Here</a>
        </div>
  </div>

</body>

</html>