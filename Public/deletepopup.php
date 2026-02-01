<?php
require_once "../Controller/auth.php";
require_once "../Controller/SessionCookie.php";
require_once "../Config/MovieDatabase.php";

$id= htmlspecialchars($_GET['id'])?? "";
if(!$id){
  echo 'no any id provided'; 
}

echo '<!DOCTYPE html>
<html>
<head>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <script>
    Swal.fire({
      title: "Do you really want to delete this movie?",
      icon: "question",
      showCancelButton: true,
      confirmButtonText: "Yes",
      cancelButtonText: "Cancel",
          confirmButtonText: "Yes",
    }).then((response) => {
      if (response.isConfirmed) {
        Swal.fire({
          icon: "success",
          title: "Movie deleted sucessfully",
          showConfirmButton: true,
          timer: 2000
        }).then(() => {
          window.location.href = "delete.php?id='. $id. '";
        });
      } else {
        
        // If cancelled, go back to dashboard or index
        window.location.href = "index.php";
      }
    });
  </script>
</body>
</html>';




?>