<?php  
session_start();
if(isset($_SESSION["user_name"]) && !$_SESSION['isadmin'])
{
 header("location:home.php");
}
else{
	if(isset($_SESSION["user_name"]) && $_SESSION['isadmin'])
	header("Location: productsedit.php");
}
$connect = mysqli_connect("localhost", "root", "", "carstore");  
if(isset($_POST["login"]))   
{  
 if(!empty($_POST["uname"]) && !empty($_POST["password"]))
 {
  $name = mysqli_real_escape_string($connect, $_POST["uname"]);
  $password = md5(mysqli_real_escape_string($connect, $_POST["password"]));
  $sql = "Select * from users where user_name = '" . $name . "' and password = '" . $password . "'";  
  $result = mysqli_query($connect,$sql);  
  $user = mysqli_fetch_array($result);  
  if($user)   
  {  
   if(!empty($_POST["remember"]))   
   {  
    setcookie ("member_login",$name,time()+ (10 * 365 * 24 * 60 * 60));  
    setcookie ("member_password",$password,time()+ (10 * 365 * 24 * 60 * 60));
    $_SESSION["user_name"] = $name;
   }  
   else  
   {  
    if(isset($_COOKIE["member_login"]))   
    {  
     setcookie ("member_login","");  
    }  
    if(isset($_COOKIE["member_password"]))   
    {  
     setcookie ("member_password","");  
    }  
   }
   if(!$_SESSION['isadmin'])
  		header("location:home.php");
   else
   		header("Location: productsedit.php");
  }  
  else  
  {  
   $message = "Invalid Login";  
  } 
 }
 else
 {
  $message = "Both are Required Fields";
 }
}  
 ?>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="login.php" method="post">
        <img src="images/car-logo.jpg" style="width:100%"/>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
		<div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?>><br>

		<div class="field-group" style="display:table;">
			<label for="remember-me">Remember me</label>
			<input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
		</div>

     	<button type="submit">Login</button>
          <a href="signup.php" class="ca">Create an account</a>
     </form>
</body>
</html>