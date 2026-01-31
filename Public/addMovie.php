<?php
require_once __DIR__ . "/../Controller/auth.php";
require_once "../Controller/SessionCookie.php";
require "../Config/MovieDatabase.php";
$empty = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $Moviename = htmlspecialchars(trim($_POST['movie']));
    $Moviegenre = htmlspecialchars(trim($_POST['moviegenre']));
    $Moviecast = htmlspecialchars(trim($_POST['moviecast']));
    $date = htmlspecialchars(trim($_POST['year']));
    $Movierating = htmlspecialchars(trim($_POST['rating']));

    if (empty($Moviename) || empty($Moviegenre) || empty($Moviecast) || empty($date) || empty($Movierating)) {
        $empty["errors"] = "Please fill all the fields";



    }
    if (empty($empty)) {
        $stmt = $conn->prepare("INSERT INTO MovieTable (Moviename, genres,cast,year,rating) values (?,?,?,?,?);");
        if ($stmt->execute([$Moviename, $Moviegenre, $Moviecast, $date, $Movierating])) {

            echo '<script>
        alert("Movie added successfully");
        window.location.href = "index.php";
    </script>';

        } else {
            echo '<script>
        alert("error in adding movie");
    </script>';
        }


    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="../Assets/CSS/addMovie.css">
<style>
    .errors {
        color: red;
        font-size: smaller;
    }

    #back {
        display: inline-block;
        font-size: small;
        color: #b19292;
        text-decoration: none;
        margin-top: 30px;
    }

    #back:hover {
        display: inline-block;
        font-size: medium;
        color: #996868;
        text-decoration: underline;
    }
</style>

<body>
    <section class="popup-overlay" id="popup" style="display: none;">
    <form action="" method="POST" id="myForm">

        <h1>Add Movies</h1>
        <label for="Moviename">Enter Movie name: </label>
        <input type="text" name="movie" id="Moviename" required> <br>

        <label for="genre">Enter Movie Genre: </label>
        <input type="text" name="moviegenre" id="genre" required><br>


        <label for="cast">Enter Movie Cast: </label>
        <input type="text" name="moviecast" id="cast" required ><br>


        <label for="year">Enter Movie Release Date: </label>
        <input type="Date" name="year" id="year" required><br>


        <label for="Rating">Enter Movie Rating: </label>
        <select id="Rating" name="rating" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <div class="errors"><?php echo $empty['errors'] ?? ""; ?></div>
        <button>Add Movie</button>
        <button type="button" class="cancel" onclick='closeForm()'>Close</button>
    </form>
    </section>
    <script src="../Assets/JS/popup.js"></script>
</body>

</html>