<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact</title>
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
.admin-contact{
    border:2px solid #000;
    font-weight: 600;
    border-radius: 10px;
    background-color: #000;
    display:inline-block;
    width: 100%;
    margin:5% auto;
    padding:5% auto;
}
.admin-contact h3{
    color: #cf9802;
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
  <div class="admin-contact">
     <div style='display:inline-block;width:35%;background:#fff;margin:2% auto;margin-left:2%;border-radius:10px;'>
        <h2 style="color:#000;">Admin 1</h2>
        <h3>Name:   ghazy </h3><br>
        <h3>Phone:   0537227548</h3><br>
        <h3>Email:   f@gmail.com</h3><br>
     </div>

    
        
  </div>

</section>
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