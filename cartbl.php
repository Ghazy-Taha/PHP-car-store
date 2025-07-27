<?php
include "conn_db.php";

$sql = "Create table cart (
    user_id INT(11) PRIMARY KEY,
    model VARCHAR(255) NOT NULL,
    quantity int(11) NOT NULL)";

if($connection->query($sql) === TRUE){
    echo "Table cart created successfully";
}else{
    echo "Error creating table: ".$connection->error;
}

$connection->close();
?>