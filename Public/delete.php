<?php
require_once "../Controller/auth.php";
require_once "../Controller/SessionCookie.php";
require_once "../Config/MovieDatabase.php";


if (isset($_GET['id'])) {
    $id = trim($_GET['id']);
    $delete = $conn->prepare("delete from MovieTable where id=?");
    if ($delete->execute([$id])) {
        header("Location:index.php");
        exit;
        
    }
} else {
    echo 'no any id provided';
}




?>