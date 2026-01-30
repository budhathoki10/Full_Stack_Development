<?php
$servername = "localhost";
$username   = "root";
$password   = "";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("CREATE DATABASE if not exists  Movie_application");
    // echo " Database created successfully!";
$conn->exec("use Movie_application");


    $sql= "CREATE TABLE IF NOT EXISTS UserTable (
    id int primary key auto_increment,
    name varchar(250) not null, 
    email varchar (250) not null,
    password varchar(250) not null,
    role varchar(250) default 'user'
    );
    ";

    if($conn->query($sql)){
        // echo "table created sucessfully"; 
    }
} catch (PDOException $e) {
    echo " Error: " . $e->getMessage();
}




?>