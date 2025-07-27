<?php
    $sname="localhost";
    $username="root";
    $password="";
    $dbname="carstore";

    $connection=mysqli_connect($sname,$username,$password,$dbname);

    if(!$connection)
        echo "Connection failed";
?>