<?php
require_once __DIR__ . "/../Controller/auth.php";
require_once "../Controller/SessionCookie.php";
require "../Config/MovieDatabase.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = htmlspecialchars(trim($_POST['id']));
    $movie = htmlspecialchars(trim($_POST['movie']));

    $moviegenre = htmlspecialchars(trim($_POST['moviegenre']));

    $moviecast = htmlspecialchars(trim($_POST['moviecast']));

    $year = htmlspecialchars(trim($_POST['year']));
    $rating = htmlspecialchars(trim($_POST['rating']));
    
    $updates= $conn->prepare("UPDATE  MovieTable set Moviename= ?, genres= ?, cast= ?, year=?, rating=? where id= ?");
    if($updates->execute([$movie,$moviegenre,$moviecast,$year,$rating,$id])){
            
 echo '<!DOCTYPE html>
        <html>
        <head>
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        </head>
        <body>
          <script>
            Swal.fire({
              icon: "success",
              title: "Movie Updated successfully",
              showConfirmButton: true,
              timer: 2000
            }).then(() => {
            // after popup redirect to index.php
              window.location.href = "index.php";
            });
          </script>
        </body>
        </html>';
    }else{
            
 echo '<script>
        alert("Error in updating movie");
    </script>';
    }




}



?>