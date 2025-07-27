<?php 
session_start(); 
include "DB.php";

if (isset($_POST['update'])) {
	
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

    $uname = validate($_POST['user_name']);
	$pass = validate($_POST['password']);
	$name = validate($_POST['name']);
	$isadmin = validate($_POST['isadmin']);

	$user_data = 'Username='. $uname. '&password='. $pass;


	if(empty($uname)){
        header("Location: users-edit.php?error=UserName is required&$user_data");
	    exit();
	}
    else if(empty($pass)){
        header("Location: users-edit.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($name)){
        header("Location: users-edit.php?error=Name is required&$user_data");
	    exit();
	}
	
	else if(empty($isadmin) || $isadmin < 0){
        header("Location: users-edit.php?error=IsAdmin is required&$user_data");
	    exit();
	}
	else{


	    $sql = "SELECT * FROM users WHERE user_name='$uname' and name='$name'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
            $sql="update users set user_name='$uname',password='$pass',name='$name',isadmin='$isadmin' where user_name='$uname' and name='$name'";
            $result = mysqli_query($conn,$sql);
			header("Location: users-edit.php?success=The user you want has updating");
	        exit();
		}else {
            header("Location: users-edit.php?error=You haven't this user in your database&$user_data");
            exit();
		}
	}
	

}if (isset($_POST['delete'])) {
	


    $uname = $_POST['user_name'];
	$name = $_POST['name'];
	

	if(empty($uname)){
        header("Location: users-edit.php?err=Username is required&$user_data");
	    exit();
	}
	else if(empty($name)){
        header("Location: users-edit.php?err=Name is required&$user_data");
	    exit();
	}
	
	else{


	    $sql = "SELECT * FROM users WHERE user_name='$uname' and name='$name'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
            $sql="delete from users where user_name='$uname' and name='$name'";
            $result = mysqli_query($conn,$sql);
			header("Location: users-edit.php?succ=The user you want has deleting");
	        exit();
		}else {
			header("Location: users-edit.php?err=This user is not exist in your DB&$user_data");
			exit();
		}
	}
	
}else{
	header("Location: users-edit.php");
	exit();
}