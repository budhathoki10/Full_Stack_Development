<?php
require_once "../Controller/auth.php";
require_once "../Controller/SessionCookie.php";
require_once "../Config/MovieDatabase.php";


if(isset($_GET['id'])){
    $id= trim($_GET['id']);
    $delete= $conn->prepare("delete from MovieTable where id=?");
   if( $delete->execute([$id])){
 echo '<script>
        alert("Movie deleted successfully");
        window.location.href = "index.php";
    </script>';

   }
   else{
     echo '<script>
        alert("error in deleteing movie");
       
    </script>';
   }



}else{
    echo "no id provided";

}



?>