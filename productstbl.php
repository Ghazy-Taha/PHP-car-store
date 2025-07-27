<?php
include "DB.php";

$sql = "Create table products (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category  VARCHAR(255) NOT NULL,
    image VARCHAR(30) NOT NULL,
    model VARCHAR(255) NOT NULL,
    price INT(11) NOT NULL,
    description VARCHAR(255) NOT NULL,
    quantity int(11) )";

if($conn->query($sql) === TRUE){
    echo "Table products created successfully";
}else{
    echo "Error creating table: ".$conn->error;
}

$conn->close();
?>