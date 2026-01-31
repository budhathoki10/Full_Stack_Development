<?php
require_once __DIR__ . "/../Controller/auth.php";
require_once "../Controller/SessionCookie.php";
require "../Config/MovieDatabase.php";

$stmt = $conn->prepare("SELECT * FROM MovieTable");
$stmt->execute();
$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../Assets/CSS/index.css">
</head>


<body>
   <?php require"../Assets/HTML/header.html"?>
    <?php if (isAdmin()): ?>
        <button onclick=openForm() id="addMovie"> <i class="fa-solid fa-plus"></i> Add Movie</button>

        <?php require "./addMovie.php"; ?>
    <?php endif; ?>
    <br>

    <input type="text" placeholder="Enter Movie name to search" id="search"><i class="fa-solid fa-magnifying-glass" id="glass"></i>


    <table id="table">
        <tr>
            <th>Movie Name</th>
            <th>Year</th>
            <th>Genre</th>
            <th>Cast</th>
            <th>Rating</th>


<?php
if (isAdmin()) {
    echo "<th>Actions</th>";
}
?>

        </tr>


        <?php
        foreach ($movies as $movie) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($movie['Moviename']); ?> </td>
                <td><?php echo htmlspecialchars($movie['year']); ?> </td>
                <td><?php echo htmlspecialchars($movie['genres']); ?> </td>
                <td><?php echo htmlspecialchars($movie['cast']); ?> </td>
                <td><?php echo htmlspecialchars($movie['rating']); ?> </td>

                <?php if (isAdmin()): ?>
                    <td>
                        <a href="edit.php?id=<?= $movie['id'] ?>"> <i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <a href="delete.php?id=<?= $movie['id'] ?>" onclick="return confirm('Delete this movie?')"><i class="fa-solid fa-trash"></i></i></i>Delete</a>
                    </td>
                <?php endif; ?>



            </tr>
            <a href="logout.php"><button class="logout" onclick="return confirm('Do you want to Logout')" ><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button></a>

            <?php
        }
        ?>
    </table>


<script src="../Assets/JS/Ajax.js"></script>
</body>

</html>

<?php  require "../Assets/HTML/footer.html"; ?>