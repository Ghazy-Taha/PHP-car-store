<?php 
session_start(); 
include "DB.php";

if (isset($_POST['remove'])) {

	$mod = $_POST['model'];

	$sql = "delete FROM cart WHERE model='$mod' and user_id=".$_SESSION['id'];
	$result = mysqli_query($conn, $sql);
	header("Location: shoppingcart.php");
}else{
	header("Location: products.php");
	exit();
}