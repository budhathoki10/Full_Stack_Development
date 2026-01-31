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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../Assets/CSS/edit.css">

<body>
    <form action="update.php" method="POST">
        <h1> <i class="fa-solid fa-clapperboard"></i> Update Movies</h1>
        <label for="Moviename">Enter Movie name: </label>
        <input type="text" name="movie" id="Moviename" value="<?php echo $rows['Moviename'] ?>"> <br>

        <label for="genre">Enter Movie Genre: </label>
        <input type="text" name="moviegenre" id="genre" value="<?php echo $rows['genres'] ?>" ><br>


        <label for="cast">Enter Movie Cast: </label>
        <input type="text" name="moviecast" id="cast" value="<?php echo $rows['cast'] ?>"><br>


        <label for="year">Enter Movie Release Date: </label>
        <input type="Date" name="year" id="year" value="<?php echo $rows['year'] ?>"><br>


       <label for="Rating">Enter Movie Rating: </label>
<select id="Rating" name="rating">
    <option value="1" <?php if($rows['rating']==1) echo "selected"; ?>>1</option>
    <option value="2" <?php if($rows['rating']==2) echo "selected"; ?>>2</option>
    <option value="3" <?php if($rows['rating']==3) echo "selected"; ?>>3</option>
    <option value="4" <?php if($rows['rating']==4) echo "selected"; ?>>4</option>
    <option value="5" <?php if($rows['rating']==5) echo "selected"; ?>>5</option>
    <option value="6" <?php if($rows['rating']==6) echo "selected"; ?>>6</option>
    <option value="7" <?php if($rows['rating']==7) echo "selected"; ?>>7</option>
    <option value="8" <?php if($rows['rating']==8) echo "selected"; ?>>8</option>
    <option value="9" <?php if($rows['rating']==9) echo "selected"; ?>>9</option>
    <option value="10" <?php if($rows['rating']==10) echo "selected"; ?>>10</option>
</select>
<div class="errors"><?php echo $empty['errors'] ?? "" ; ?></div>
        <button>Update Movie </button>
        <input type="hidden" name="id" value="<?php echo $rows['id'] ?>">
            <a href="index.php" id="back"> <i class="fa-solid fa-arrow-left-long"> </i> Back to index</a>


    </form>

</body>

</html>


<?php

}else{
    echo "no ani id provided";

}
?>
