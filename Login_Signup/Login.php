<?php
require '../Config/UserDatabase.php';
require_once "../Controller/SessionCookie.php";

$error = [];

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = htmlspecialchars($_POST['email']);
    $passwords = htmlspecialchars($_POST['Password']);

    if (empty($email) || empty($passwords)) {
        $error['error'] = "Please fill all the fields";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "Please provide a valid email";
    }


    if (empty($error)) {

        $checkEmail = $conn->prepare("select * from Usertable where email= ?");
        $checkEmail->execute([$email]);
        if ($checkEmail->rowCount() <= 0) {
            $error['error'] = "this email is not registered yet";

        } else {
            $user = $checkEmail->fetch(PDO::FETCH_ASSOC);

            if (password_verify($passwords, $user['password'])) {
                $_SESSION['role']    = $user['role'];
                $_SESSION['user_id'] = $user['id'];
                session_regenerate_id(true); 
                header("Location:../Public/index.php");
            } else {
                $error['error'] = "Incorrect passoword";
            }

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
    <link rel="stylesheet" href="../Assets/CSS/Login.css">
</head>
<style>
    .err {
        color: red;
        font-size: smaller;
    }
</style>

<body>

    <section class="Login_div">

        <form action="" method="POST">

            <label for="Email">Enter Your Email: </label>
            <input type="Email" name="email"> 


            <label for="Password">Enter Your Password: </label>
            <input type="password" name="Password"> 
            <div class="err"><?php echo $error['error'] ?? "" ; ?></div>

            <button type="submit">Register</button>
            <a href="Signup.php">Create a new account</a>
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token'] ?>">
        </form>


    </section>

</body>

</html>