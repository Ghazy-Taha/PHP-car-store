<?php
$sname = "localhost";
$uname = "root";
$password = "";
$DB_name = "carstore";

$conn = mysqli_connect($sname,$uname,$password,$DB_name);

if(!$conn){
    echo "Connection failed!";
}
?>