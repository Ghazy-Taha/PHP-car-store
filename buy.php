<?php 
session_start(); 
include "DB.php";

if (isset($_POST['buy'])) {

    $sql= "select * from cart where user_id=".$_SESSION['id'];
    $result= mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
        $count=$row['quota'];
        $mod=$row['model'];
        $sql2 = "update products set quantity=quantity-'$count' where model='$mod'";
        $result2 = mysqli_query($conn,$sql2);
    }
    $sql3 = "delete from cart where user_id=".$_SESSION['id'];
    $result3=mysqli_query($conn,$sql3);
    header("Location: shoppingcart.php");
    exit();
}else{
    header("Location: products.php");
	exit();
}