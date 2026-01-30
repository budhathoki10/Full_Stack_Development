<?php
require_once __DIR__."/SessionCookie.php";

if (!isset($_SESSION['user_id'])) {
  header("Location:../Login_Signup/Login.php");
  exit;
}

function isAdmin() {
  return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}
