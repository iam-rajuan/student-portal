<?php
session_start();
require("conn.php");
if (isset($_POST['submit'])) {
  $email = $_POST['mail'];
  $pass = $_POST['password'];

  $sql_admin = " SELECT * FROM admin_info WHERE email = '$email' AND admin_pass = '$pass' ";
  $query_admin = $conn->query($sql_admin);
  if ($query_admin->num_rows > 0) {
    $admin_compear = $query_admin->FETCH_ASSOC();
    $_SESSION['admin_log'] = $admin_compear;
    header('location:admin_home.php');
  } else {
    $error_mgs = "admin Combination error!";
  }
}



//ok
?>
<!DOCTYPE html>
<html>

<head>
  <title>Admin</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/login.css">
  <!-- <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      /* background: #83c5be; */
      background-image: url('logo/gub.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
    }
  </style> -->
</head>

<body class="body_first">
  <!-- <div id="header"> -->
  <!-- <div class="admin_class"><a href="student_log.php">User</a></div> -->
  <!-- <a style="color:white" > <h1><marquee behavior="scroll" direction="left">Welcome to Admin Login Page </marquee> </h1></a> -->
  <!-- <a style="color:white" > <h2>Welcome to Admin Login Page </h2></a> -->
  <!-- </div> -->
  <!-- <div class="container" >
    <div >
      <div id="container_form">
      <h2 style="padding:10px;border-bottom:2px solid rgb(17, 143, 143);color:rgb(17, 143, 143);"> Admin Login</h2>
        <form action="admin_log.php" method="POST">
          <label for="username">Email:</label>
          <input type="text" id="username" name="mail" placeholder="Enter Admin Email" required>
          
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" placeholder="Enter Password" required>
    
          <input id="submit_shadow" type="submit" name="submit" value="Login">
          <label style="color:red;display:inline;margin-left:5px">
            <?php
            // if(isset($_POST['submit'])){echo $error_mgs;}
            ?></label>
          <button class="btn_home" ><a href="index.php">Back Home Page </a></button>
        </form>
      </div>
    </div>
  </div> -->


  <div class="wrapper">
    <form action="admin_log.php" method="POST">
      <!-- login form -->
      <h1>Admin Login</h1>
      <div class="input-box">
        <input type="text" name="mail" id="username" placeholder="Enter Admin Email" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" name="password" id="password" placeholder="Password" required>
        <i class='bx bxs-lock-alt'></i>
      </div>
      <div class="remember-forgot">
        <label for="">
          <input type="checkbox">Remember Me
        </label>
        <a href="#">Forgot Password</a>
      </div>
      <button type="submit" name="submit" value="login" class="btn">Login</button>

      <label style="color:red;display:inline;margin-left:10px;margin-top:10px">
        <?php
        if (isset($_POST['submit'])) {
          echo $error_mgs;
        }
        ?>
      </label>

      <div class="register-link">
        <!-- <p>Don't have an account? -->
          <!-- <a href="student_signup.php" class="reg">Register</a><br> -->
          <a href="index.php" class="reg">Back to Home Page</a>
        </p>



        <script>
          function validateForm() {
            let email = document.getElementById("username").value;
            let password = document.getElementById("password").value;
            if (email === "" || password === "") {
              alert("Both fields are required.");
              return false;
            }
            if (!validateEmail(email)) {
              alert("Please enter a valid email address.");
              return false;
            }

            return true;
          }

          function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(String(email).toLowerCase());
          }
        </script>
        <?php
        // include("footer.php");
        ?>
</body>

</html>