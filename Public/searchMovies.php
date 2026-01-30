<?php
require_once __DIR__ . "/../Controller/auth.php";
require_once "../Controller/SessionCookie.php";
require "../Config/MovieDatabase.php";


$a= $_GET['query'] ?? "";


$query=$conn->prepare("select * from MovieTable where 
Moviename like ? or 
year like ? or 
genres like ? or 
rating like ? ") ;
$query->execute(['%'.$a.'%','%'.$a.'%','%'.$a.'%','%'.$a.'%']);

$result= $query->fetchAll(PDO::FETCH_ASSOC);
// it convert array to json 
echo json_encode([
    "isAdmin"=>isAdmin(),
    "Movies"=>$result
]);



?>