<?php
$server = 'localhost';
$username = 'root';
$password = 'Qqwerty67@';
$database = 'coursesitedb';

$conn = mysqli_connect($server,$username,$password,$database);

if(!$conn){
    echo "error".mysqli_connect_error();
}
?>