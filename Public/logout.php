<?php
require_once __DIR__ . "/../Controller/auth.php";
require_once "../Controller/SessionCookie.php";


session_destroy();
header("Location:../Login_Signup/Login.php");
?>