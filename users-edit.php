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
  background-image: url(images/T-Store-BackGround.jpg);
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

<h2>Update User</h2>    
        <form name = "form1" action="users-check.php" method = "post" enctype = "multipart/form-data" >
            <div class = "container">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <?php if (isset($_GET['success'])) { ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
                <?php } ?> 
                <div class = "form_group">    
                    <label>UserName:</label> 
                    <?php if(isset($_GET['user_name'])) { ?>   
                        <input type = "text" name = "user_name" value = "<?php echo $_GET['user_name']?>"/>
                    <?php } else {?>
                        <input type = "text" name = "user_name"/>
                    <?php }?>
                </div>    
                <div class = "form_group">    
                    <label>Password:</label>    
                    <?php if(isset($_GET['password'])) { ?>   
                        <input type = "text" name = "password" value = "<?php echo $_GET['password']?>"/>
                    <?php } else {?>
                        <input type = "text" name = "password"/>
                    <?php }?>    
                </div>  
                <div class = "form_group">    
                    <label>Name:</label>    
                    <?php if(isset($_GET['name'])) { ?>   
                        <input type = "text" name = "name" value = "<?php echo $_GET['name']?>"/>
                    <?php } else {?>
                        <input type = "text" name = "name"/>
                    <?php }?>    
                </div>  
                <div class = "form_group">    
                    <label>IsAdmin:</label>    
                    <?php if(isset($_GET['isadmin'])) { ?>   
                        <input type = "text" name = "isadmin" value = "<?php echo $_GET['isadmin']?>"/>
                    <?php } else {?>
                        <input type = "text" name = "isadmin"/>
                    <?php }?>    
                </div>    
                <input type="submit" name="update" value="Update User"/>    
            </div>    
        </form> 

<h2>Delete user</h2>
        <form name = "form1" action="users-check.php" method = "post" enctype = "multipart/form-data" >
            <div class = "container">
                <?php if (isset($_GET['err'])) { ?>
                    <p class="error"><?php echo $_GET['err']; ?></p>
                <?php } ?>

                <?php if (isset($_GET['succ'])) { ?>
                    <p class="success"><?php echo $_GET['succ']; ?></p>
                <?php } ?> 
                <div class = "form_group">    
                    <label>UserName:</label> 
                    <?php if(isset($_GET['user_name'])) { ?>   
                        <input type = "text" name = "user_name" value = "<?php echo $_GET['user_name']?>"/>
                    <?php } else {?>
                        <input type = "text" name = "user_name"/>
                    <?php }?>
                </div>      
                <div class = "form_group">    
                    <label>Name:</label>    
                    <?php if(isset($_GET['name'])) { ?>   
                        <input type = "text" name = "name" value = "<?php echo $_GET['name']?>"/>
                    <?php } else {?>
                        <input type = "text" name = "name"/>
                    <?php }?>    
                </div>  
                <input type="submit" name="delete" value="Delete User"/>    
            </div>    
        </form>

        <table style="width:100%;border:solid 5px #000;margin-top:15px;text-align:center;">
				<thead>
					<tr>
						<th>User id</th>
						<th>UserName</th>
						<th>Password</th>
						<th>Name</th>
						<th>isAdmin</th>
					</tr>
				</thead>
				<tbody>
					<?php include "DB.php";
							$sql= "SELECT * FROM users";
							$result = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($result))
							{
							echo "<tr>";
								echo "<td><br>".$row['id']."</td>";
								echo "<td>".$row['user_name']."</td>";
								echo "<td>".$row['password']."</td>";
								echo "<td>".$row['name']."</td>";
								echo "<td>".$row['isadmin']."</td>";
							echo "</tr>";
						}?>
				</tbody>
			</table>
          </br>
          </br>

  <footer>
  <p>Students: Tamer katesh & Sanad Tarboosh<br>
  <a style="text-decoration: none;" href="home.php">Toolstore.com</a></p>
</footer>

        
</body>
</html>

<?php 
    }else{
        header("Location: index.php");
        exit();
    }
 ?>