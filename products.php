<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
</head>
<style>
body {
  background: #cf9802;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  position: relative;
  font-family: Hack, monospace;
}

div {
  color: #727272;
  text-align: center;
  display:flex;
}


nav {
  margin: 25px;
  background-image: url(images/car-logo-background.jpg);
  background-repeat: no-repeat;
  background-size: 100%;
  border:5px solid #000;
  border-radius: 8px;
  padding: 16px;
}
nav .menuItems {
  list-style: none;
  display: flex;
}
nav .menuItems li {
  margin: 50px;
}
nav .menuItems li a {
  text-decoration: none;
  color: #ececec;
  text-shadow: 2px 5px #000;
  font-size: 30px;
  font-weight: 600;
  transition: all 0.5s ease-in-out;
  position: relative;
  text-transform: uppercase;
}
nav .menuItems li a::before {
  content: attr(data-item);
  color: #e3171e;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  width: 0;
  overflow: hidden;
}
nav .menuItems li a:hover::before {
  width: 100%;
  transition: all 0.5s ease-in-out;
}

footer {
  position: absolute;
  font-size: 12px;
  bottom: 0;
  width: 100%;
  height: 60px;
  line-height: 60px;
  font-size: 14px;
  background-color: #f1f1f1;
  color: #000000;
  text-align: center;
}
footer a {
  color: #007a85;
  border-bottom: 1px solid;
}
footer a:hover {
  border-bottom: 1px transparent;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  text-align: center;
  font-family: arial;
  display: inline-block;
  background:#fff;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: #cf9802;
  background-color: #ececec;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.row {
  margin-top:2%;
  text-align:center;
  display:block;
  width:100%;
}
  
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  position: relative;
}

.head{
  height:54px;
}

.description{
  height:95px;
}

.container {
  padding: 16px;
  display:inline-block;
}

  .container::after, .row::after {
    content: "";
    clear: both;
    display: table;
  }

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #1f97cb;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

  .button:hover {
    background-color: #000;
  }
  footer {
    text-align: center;
    padding: 3px;
    background-color: #000;
    color: #cf9802;
    position: relative;
    height: auto;
    font-size: larger;
    font-weight: 600;
    border-radius:10px;
}

</style>

<body>

<section>
  <nav>
    <ul class="menuItems">
      <li><a href='home.php' data-item='Home'>Home</a></li>
      <li><a href='products.php' data-item='Products'>Products</a></li>
      <li><a href='shoppingcart.php' data-item='cart'>Cart</a></li>
      <li><a href='contact.php' data-item='contact.php'>Contact</a></li>
      <li><a href="logout.php" data-item='LogOut'>Logout</a></li>
    </ul>
  </nav>

</section>

<div class="row">
		<?php
			include "DB.php";
			$sql="select * from products order by category";
      $result = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_array($result))
			{
        if($row['quantity'] > 0) {
          echo"<div class='column' style='margin:2%;display:inline-block;'>";
            echo"<div class='card'>";
            echo "<form style='display:inline-block;' action='add-product-to-cart.php' method='post' enctype='multipart/form-data'><input type='hidden' name='model' value='".$row['model']."'/>";
              echo "<img style='width:200px;height:200px;' src ='images/".$row['image']."'>";
                echo"<div class='container'>";
                  echo "<h2 class='head'>".$row['model']."</h2>";
                  echo "<p class='title'>".$row['price']."&#X20AA</p>";
                  echo "<p class='description'>".$row['description']."</p>";
                  echo "<button class='button' type='submit' name='add'>Add to cart</button>";
                echo "</div>";
              echo "</form>";
            echo "</div>";
          echo "</div>";
        }
			}
	
		?>
	</div>

  <footer>
  <p>Student: ghazy taha<br>
  <a style="text-decoration: none;" href="home.php">carstore.com</a></p>
</footer>

        
</body>
</html>

<?php 
    }else{
        header("Location: index.php");
        exit();
    }
 ?>