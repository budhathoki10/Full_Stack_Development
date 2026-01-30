<?php
require_once "../Controller/auth.php";
require_once "../Controller/SessionCookie.php";
require_once "../Config/MovieDatabase.php";


if(isset($_GET['id'])){
$id= trim($_GET['id']);
$query= $conn->prepare("SELECT * FROM  MovieTable where id=?");
$query->execute([$id]);

$rows= $query->fetch(PDO::FETCH_ASSOC);
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="../Assets/CSS/edit.css">
<style>
    
.errors{
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
    <form action="update.php" method="POST">
        <h1>Update Movies</h1>
        <label for="Moviename">Enter Movie name: </label>
        <input type="text" name="movie" id="Moviename" value="<?php echo $rows['Moviename'] ?>"> <br>

        <label for="genre">Enter Movie Genre: </label>
        <input type="text" name="moviegenre" id="genre" value="<?php echo $rows['genres'] ?>" ><br>


        <label for="cast">Enter Movie Cast: </label>
        <input type="text" name="moviecast" id="cast" value="<?php echo $rows['cast'] ?>"><br>


        <label for="year">Enter Movie Release Date: </label>
        <input type="Date" name="year" id="year" value="<?php echo $rows['year'] ?>"><br>


        <label for="Rating">Enter Movie Rating: </label>
        <select id="Rating" name="rating" value="<?php echo $rows['rating'] ?>" >
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
<div class="errors"><?php echo $empty['errors'] ?? "" ; ?></div>
        <button>Update Movie</button>
        <input type="hidden" name="id" value="<?php echo $rows['id'] ?>">
            <a href="index.php" id="back"> back to main</a>


    </form>

</body>

</html>


<?php

}else{
    echo "no ani id provided";

}
?>
