<?php
$server = 'localhost';
$username = 'root';
$password = 'Qqwerty67@';
$database = 'loginsystem';

$conn = mysqli_connect($server,$username,$password,$database);

if(!$conn){
    echo "error".mysqli_connect_error();
}
?>