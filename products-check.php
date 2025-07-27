<?php 
session_start(); 
include "DB.php";

if (isset($_POST['upload'])) {
	
	$target = "images/".basename($_FILES['image']['name']);

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

    $cat = validate($_POST['category']);
	$img = $_FILES['image']['name'];
	$mod = validate($_POST['model']);
	$prc = validate($_POST['price']);
	$dsc = validate($_POST['description']);
	$quan = validate($_POST['quantity']);

	$user_data = 'model='. $mod. '&description='. $dsc;


	if(empty($cat)){
        header("Location: productsedit.php?error=Category is required&$user_data");
	    exit();
	}
    else if(empty($img)){
        header("Location: productsedit.php?error=Image is required&$user_data");
	    exit();
	}
	else if(empty($mod)){
        header("Location: productsedit.php?error=Model is required&$user_data");
	    exit();
	}
	
	else if(empty($prc)){
        header("Location: productsedit.php?error=Price is required&$user_data");
	    exit();
	}

	else if(empty($dsc)){
        header("Location: productsedit.php?error=Discription is required&$user_data");
	    exit();
	}
	
	else if(empty($quan)){
        header("Location: productsedit.php?error=Quantity is required&$user_data");
	    exit();
	}
	
	else{


	    $sql = "SELECT * FROM products WHERE model='$mod' and category='$cat'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
            $sql="update products set image='$img',price='$prc',description='$dsc',quantity=quantity+'$quan' where model='$mod' and category='$cat'";
            $result = mysqli_query($conn,$sql);
			header("Location: productsedit.php?success=You have this product in your DB ,the product was updating");
	        exit();
		}else {
           $sql = "INSERT INTO products(category,image, model, price, description, quantity) VALUES('$cat','$img', '$mod', '$prc', '$dsc', '$quan')";
           $result = mysqli_query($conn, $sql);
           if ($result) {
			 if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
					$msg = "Image uploaded successfully";
				}
			else
			{
				$msg = "There was a problem uploading image";	
			}
           	 header("Location: productsedit.php?success=The product was insert");
	         exit();
           }else {
	           	header("Location: productsedit.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	

}if (isset($_POST['delete'])) {
	


    $cat = $_POST['category'];
	$mod = $_POST['model'];
	

	if(empty($cat)){
        header("Location: productsedit.php?err=Category is required&$user_data");
	    exit();
	}
	else if(empty($mod)){
        header("Location: productsedit.php?err=Model is required&$user_data");
	    exit();
	}
	
	else{


	    $sql = "SELECT * FROM products WHERE model='$mod' and category='$cat'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
            $sql="delete from products where model='$mod' and category='$cat'";
            $result = mysqli_query($conn,$sql);
			header("Location: productsedit.php?succ=The product you want was deleting");
	        exit();
		}else {
			header("Location: productsedit.php?err=you havnts this product in your DB&$user_data");
			exit();
		}
	}
	
}else{
	header("Location: productsedit.php");
	exit();
}