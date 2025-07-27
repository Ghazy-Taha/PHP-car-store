<?php
include "conn_db.php";

$sql = "Create table users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(30) NOT NULL )";

if($connection->query($sql) === TRUE){
    echo "Table users created successfully";
}else{
    echo "Error creating table: ".$connection->error;
}

$connection->close();
?>