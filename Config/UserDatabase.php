<?php
// $servername = "localhost";
// $username   = "NP03CS4A240072";
// // $username   = "root";
// $password   = "jVmOwQ9Ztm";
// // $password   = "";

$servername = "localhost";
$username   = "NP03CS4A240072";
$password   = "jVmOwQ9Ztm";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("CREATE DATABASE if not exists  NP03CS4A240072");
    // echo " Database created successfully!";
$conn->exec("use NP03CS4A240072");


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