<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movie Database Landing Page</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="Assets/CSS/index.css">
</head>
<body>
  <header>
    <h1><i class="fa-solid fa-file-video"></i> Movie Database</h1>
    <p>Your one‑stop place to manage and explore movies</p>
  </header>

  <section>
    <h2>Why Movies Matter</h2>
    <p style="max-width:600px; margin:auto; color:#ddd;">
      Movies are more than entertainment — they inspire us, make us laugh, 
      teach us lessons, and connect people across cultures. 
      They capture human emotions, tell powerful stories, and preserve history. 
      In our database, you can explore, manage, and share the films that shape our lives.
    </p>
  </section>

  <!-- Bottom Section with Admin & User Control -->
  <section>
    <h2>Access Control</h2>
    <div class="features">


    <!-- admin  -->
      <div class="feature" onclick="window.location.href='Login_Signup/Login.php'">
        <i class="fa-solid fa-user-shield"></i>
        <h3>Admin Control</h3>
        <p>Secure role-based access for admins.</p>
      </div>

      <!--user  -->
      <div class="feature" onclick="window.location.href='Login_Signup/Signup.php'">
        <i class="fa-solid fa-user"></i>
        <h3>User Control</h3>
        <p>Register and view your movie preferences.</p>
      </div>
    </div>
  </section>

  <footer>
    <p>&copy; 2026 Movie Database. All rights reserved.</p>
  </footer>
</body>
</html>