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

th{
    padding:2%;
}
.cart_btn a:hover {
    background-color: #1f97cb;
}

</style>

<body>

<section>
  <nav>
    <ul class="menuItems">
      <li><a href='home.php' data-item='Home'>Home</a></li>
      <li><a href='products.php' data-item='Products'>Products</a></li>
      <li><a href='shoppingcart.php' data-item='cart'>Cart</a></li>
      <li><a href='contact.php' data-item='contact'>Contact</a></li>
      <li><a href="logout.php" data-item='LogOut'>Logout</a></li>
    </ul>
  </nav>

</section>

<div style="text-align:center;width: 100%;display:inline-block;">
		<div style="text-align:center;width:90%;display:inline-block">
			<table style="width:100%;border:solid 5px #000;margin-top:15px;text-align:center;background:#fff;">
				<thead style="color:#000;font-size:20px;">
					<tr>
                        <th>Product Image</th>
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Total</th>
						<th style="border:none;"></th>                   
                    </tr>
				</thead>
				<tbody>
					<?php include "DB.php";			
						$sql= "SELECT cr.*, pr.*, cr.quota*pr.price as total FROM cart cr join products pr on cr.model=pr.model where cr.user_id=".$_SESSION['id'];
						$result = mysqli_query($conn,$sql);
						while($row = mysqli_fetch_array($result))
						{
							echo "<tr>";
                echo "<td><img style='width:200px;height:200px;' src ='images/".$row['image']."'</td>";
								echo "<td>".$row['model']."</td>";
								echo "<td>".$row['quota']."</td>";
								echo "<td>".$row['price']."</td>";
								echo "<td>".$row['total']."</td>";
								echo "<td style='text-align:center;width:20%'><form style='display:inline-block;' action='remove-product-from-cart.php' method='post' enctype='multipart/form-data'><input type='hidden' name='model' value='".$row['model']."'/>";
								echo "<button type='submit' name='remove' style='background:#000;color:#cf9802;border-radius:3px;padding:8px;cursor:pointer;font-weight:600;'>Delete from cart</button>";
								echo "</form></td>";
							echo "</tr>";
						}?>
				</tbody>
			</table>
		</div>
	</div>
    <div class="butn" style="width:90%;display:block;">
    <?php
    echo "<form action='buy.php' method='post' enctype='multipart/form-data'>";
        echo "<input type='submit' name='buy' onclick='myFunction()' style='float:right;background:#00a33b;color:#000;margin-top:10px;text-decoration:none;padding:10px;border:2px solid #000;border-radius:3px;margin-left:10px;font-weight:600;cursor:pointer;' value='Buy the products'>";
    echo "</form>";
    ?>
        <a class="cart_btn" href="products.php" style="float:left;background:#007a85;color:#000;margin-top:10px;text-decoration:none;padding:10px;border:2px solid #000;border-radius:3px;margin-left:10px;font-weight:600;">Countinue Shopping</a>
    </div>
    </br>
	</br>
	</br>
  <?php if(mysqli_num_rows($result) > 0) {?>
    <script>
function myFunction() {
  alert("Thank you! You buying the products!");
}
</script>
<?php }?>

  <footer>
  <p>Student : ghazy taha<br>
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