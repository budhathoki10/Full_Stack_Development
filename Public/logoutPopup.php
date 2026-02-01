<?php
require_once __DIR__ . "/../Controller/auth.php";
require_once "../Controller/SessionCookie.php";

echo '<!DOCTYPE html>
<html>
<head>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <script>
    Swal.fire({
      title: "Do you really want to logout?",
      icon: "question",
      showCancelButton: true,
      confirmButtonText: "Yes, Logout",
      cancelButtonText: "Cancel"
    }).then((response) => {
      if (response.isConfirmed) {
        Swal.fire({
          icon: "success",
          title: "Logging out...",
          showConfirmButton: false,
          timer: 2000
        }).then(() => {
          window.location.href = "logout.php";
        });
      } else {
        
        // If cancelled, go back to dashboard or index
        window.location.href = "./index.php";
      }
    });
  </script>
</body>
</html>';
?>