<?php
require '../Config/UserDatabase.php';
require_once "../Controller/SessionCookie.php";



if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}


$error= []; 
if($_SERVER["REQUEST_METHOD"]=="POST"){


       if (
            !isset($_POST['csrf_token']) ||
            !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])
        ) {
            http_response_code(403);
            die('CSRF token validation failed');
        }



$name= htmlspecialchars($_POST['name']);
$email= htmlspecialchars($_POST['email']);
$password= htmlspecialchars($_POST['password']);

if(empty($name) || empty($email) || empty($password)){
    $error['error']="Please fill all the fields";
}



if(!is_string($name)){
    $error['name']="Please provide a valid name";
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $error['email']="Please provide a valid email";
}
if(strlen($password)<6){
     $error['password']="Weak password";
}

if(empty($error)){
    $hashed_password= password_hash($password,PASSWORD_BCRYPT);

    $checkEmail= $conn->prepare("select * from Usertable where email= ?");
    $checkEmail-> execute([$email]);
    if($checkEmail->rowCount() > 0){
$error['error']="this email is already registered";
    
    }else{
        $stmt= $conn-> prepare("INSERT INTO UserTable (name, email,password) values (?,?,?);");
if($stmt->execute([$name, $email, $hashed_password]));
header("Location:Login.php");
    }
}

}

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
   <link rel="stylesheet" href="../Assets/CSS/Signup.css">
  </head>
  <body>
    <section class="registerDiv">
      <form action=""  method="POST">
        <label for="Name">Enter Your Name: </label>
        <input type="text" name="name" />
        <div class="err"><?php echo $error['name']?? "" ;?></div>

        <label for="Email">Enter Your Email: </label>
        <input type="Email" name="email"/> 
         <div class="err"> <?php echo $error['email']?? "" ;?></div>

        <label for="Password">Enter Your Password: </label>
        <input type="password" name="password"  /> 
          <div class="err"><?php echo $error['password']?? "" ;?></div>
           <div class="err"><?php echo $error['error']?? "" ;?></div>
        <button type="submit">Register</button>
        <a href="Login.php">Already have a account</a>
           <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token'] ?>">
      </form>
    </section>
  </body>
</html>


