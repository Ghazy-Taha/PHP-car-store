<?php
$sname="localhost";
$username="root";
$password="";

$connection = new mysqli($sname,$username,$password);

if($connection->connect_error){
    die("Connection failed: ".$connection->connect_error);
}

$sql = "Create database carstore";
if($connection->query($sql) === TRUE){
    echo "Database created successfully";
}
else{
    echo "Error creating database: ".$connection->error;
}

$connection->close();
?>