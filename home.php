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
}

p {
  color: #ccc;
  font-weight: 600;
  transition: all 1s ease-in-out;
  position: relative;
}
p::before {
  content: attr(data-item);
  color: #8254ff;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  width: 0;
  overflow: hidden;
}
p:hover::before {
  width: 100%;
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

  <h1 style="text-align:center;">Hello, <?php echo $_SESSION['name']; ?></h1>


</section>
<section>
  <img class="mySlides" src="images/car-logo.jpg"
  style="width:100%">
</section>

<p style="font-size:20px;text-align:center;width:80%">
  
<br>Welcome to car Shop</br>
<br>Welcome to my store</br>

</p>
<script>
// Automatic Slideshow - change image every 3 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 3000);
}
</script>

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