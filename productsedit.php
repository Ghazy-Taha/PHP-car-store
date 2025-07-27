<?php 
session_start();
if(!$_SESSION['isadmin'])
    header("Location: home.php");

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
  background-image: url(images/car-logo.jpg);
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

.container {  
max-width: 1350px;
margin: 50px;
height: auto;
display: block;
border: 3px solid #000;
border-radius: 5px;  
}  
  
body {  
  color: red;  
  font-size: 20px;  
  font-family: Verdana, Arial, Helvetica, monospace;  
  background-color: #F0E8A0;  
}  
  
h2 {  
  text-align: center;  
}  
  
.form_group {  
  padding: 10px;  
  ;    
display: block;  
}  
  
label {  
  float: left;  
  padding-right: 50px;  
  line-height: 10%;  
  display: block;  
  width: 208px;  
}       

</style>

<body>

<section>
  <nav>
    <ul class="menuItems">
      <li><a href='productsedit.php' data-item='Products'>Products</a></li>
      <li><a href='users-edit.php' data-item='Users'>Users</a></li>
      <li><a href="logout.php" data-item='LogOut'>Logout</a></li>
    </ul>
  </nav>

</section>

<h2>Insert / Update product</h2>    
        <form name = "form1" action="products-check.php" method = "post" enctype = "multipart/form-data" >
            <div class = "container">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <?php if (isset($_GET['success'])) { ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
                <?php } ?> 
                <div class = "form_group">    
                    <label>Category:</label> 
                    <?php if(isset($_GET['category'])) { ?>   
                        <input type = "text" name = "category" value = "<?php echo $_GET['category']?>"/>
                    <?php } else {?>
                        <input type = "text" name = "category"/>
                    <?php }?>
                </div>    
                <div class = "form_group">    
                    <label>Image:</label>    
                    <?php if(isset($_GET['image'])) { ?>   
                        <input type = "file" name = "image" value = "<?php echo $_GET['image']?>"/>
                    <?php } else {?>
                        <input type = "file" name = "image"/>
                    <?php }?>    
                </div>  
                <div class = "form_group">    
                    <label>Model:</label>    
                    <?php if(isset($_GET['model'])) { ?>   
                        <input type = "text" name = "model" value = "<?php echo $_GET['model']?>"/>
                    <?php } else {?>
                        <input type = "text" name = "model"/>
                    <?php }?>    
                </div>  
                <div class = "form_group">    
                    <label>Price:</label>    
                    <?php if(isset($_GET['price'])) { ?>   
                        <input type = "text" name = "price" value = "<?php echo $_GET['price']?>"/>
                    <?php } else {?>
                        <input type = "text" name = "price"/>
                    <?php }?>    
                </div>    
                <div class = "form_group">    
                    <label>Description:</label>    
                    <?php if(isset($_GET['description'])) { ?>   
                        <input type = "text" name = "description" value = "<?php echo $_GET['description']?>"/>
                    <?php } else {?>
                        <input type = "text" name = "description"/>
                    <?php }?>    
                </div>
                <div class = "form_group">    
                    <label>Quantity:</label>    
                    <?php if(isset($_GET['quantity'])) { ?>   
                        <input type = "text" name = "quantity" value = "<?php echo $_GET['quantity']?>"/>
                    <?php } else {?>
                        <input type = "text" name = "quantity"/>
                    <?php }?>    
                </div>
                <input type="submit" name="upload" value="Insert Product"/>    
            </div>    
        </form>

<h2>Delete product</h2>
        <form name = "form1" action="products-check.php" method = "post" enctype = "multipart/form-data" >
            <div class = "container">
                <?php if (isset($_GET['err'])) { ?>
                    <p class="error"><?php echo $_GET['err']; ?></p>
                <?php } ?>

                <?php if (isset($_GET['succ'])) { ?>
                    <p class="success"><?php echo $_GET['succ']; ?></p>
                <?php } ?> 
                <div class = "form_group">    
                    <label>Category:</label> 
                    <?php if(isset($_GET['category'])) { ?>   
                        <input type = "text" name = "category" value = "<?php echo $_GET['category']?>"/>
                    <?php } else {?>
                        <input type = "text" name = "category"/>
                    <?php }?>
                </div>      
                <div class = "form_group">    
                    <label>Model:</label>    
                    <?php if(isset($_GET['model'])) { ?>   
                        <input type = "text" name = "model" value = "<?php echo $_GET['model']?>"/>
                    <?php } else {?>
                        <input type = "text" name = "model"/>
                    <?php }?>    
                </div>  
                <input type="submit" name="delete" value="Delete Product"/>    
            </div>    
        </form>

        <table style="width:100%;border:solid 5px #000;margin-top:15px;text-align:center;">
				<thead>
					<tr>
            <th>Image</th>
						<th>product id</th>
						<th>Category</th>
						<th>Model</th>
						<th>Price</th>
						<th>Description</th>
						<th>Quantity</th>
					</tr>
				</thead>
				<tbody>
					<?php include "DB.php";
							$sql= "SELECT * FROM products";
							$result = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($result))
							{
							echo "<tr>";
                echo "<td><img width='100' src='images/".$row['image']."'/></td>";
								echo "<td><br>".$row['id']."</td>";
								echo "<td>".$row['category']."</td>";
								echo "<td>".$row['model']."</td>";
								echo "<td>".$row['price']."</td>";
								echo "<td>".$row['description']."</td>";
                echo "<td>".$row['quantity']."</td>";
							echo "</tr>";
						}?>
				</tbody>
			</table>
          </br>
          </br>

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