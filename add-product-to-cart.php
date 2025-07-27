<?php 
session_start(); 
include "DB.php";

if (isset($_POST['add'])) {

	$mod = $_POST['model'];

	$sql = "SELECT * FROM cart WHERE model='$mod' and user_id=".$_SESSION['id'];
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
	   $sql = "update cart set quota=quota+1 where model='$mod' and user_id=".$_SESSION['id'];
	   $result = mysqli_query($conn, $sql);
		header("Location: shoppingcart.php");
		exit();
	}else {
	   $sql = "INSERT INTO cart (user_id, model, quota) VALUES(".$_SESSION['id'].", '$mod', 1)";
	   $result = mysqli_query($conn, $sql);
		header("Location: shoppingcart.php");
		exit();
	}	
}else{
	header("Location: products.php");
	exit();
}