<?php
require "UserDatabase.php";

try {

    $table = "CREATE TABLE IF NOT EXISTS MovieTable (
    id int primary key auto_increment,
    Moviename varchar(250) not null, 
    genres varchar (250) not null,
    cast varchar(250) not null,
    year date not null,
    rating varchar(250) not null

    );
    ";

    if ($conn->query($table)) {
        // echo "movie table created sucessfully"; 
    }


} catch (PDOException $e) {
    echo " Error: " . $e->getMessage();
}


?>