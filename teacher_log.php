<?php
session_start();
require("conn.php");
if(isset($_POST['submit'])){
  $email = $_POST['mail'];
  $pass = $_POST['password'];

    $sql_admin = " SELECT * FROM admin_info WHERE email = '$email' AND admin_pass = '$pass' ";
    $query_admin = $conn->query($sql_admin);
    if($query_admin -> num_rows > 0)
    {
      $admin_compear = $query_admin -> FETCH_ASSOC();
      $_SESSION['admin_log'] = $admin_compear;
      header('location:teacher_home.php');
    }
    else{
      $error_mgs = "teacher Combination error!";
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>teacher</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/login.css">
</head>
<body class="body_first" >
  <div id="header">
    <!-- <a style="color:white" > <h1><marquee behavior="scroll" direction="left">Welcome to Teacher Login Page </marquee> </h1></a> -->
    <a style="color:white" > <h1>Welcome to Teacher Login Page </marquee> </h1></a>
  </div>
  <!-- <div class="container" >
    <div >
      <div id="container_form">
      <h2 style="padding:10px;border-bottom:2px solid rgb(17, 143, 143);color:rgb(17, 143, 143);"> Teacher Login</h2>
        <form action="teacher_log.php" method="POST">
          <label for="username">Email:</label>
          <input type="text" id="username" name="mail" placeholder="Enter teacher Email" required>
          
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" placeholder="Enter Password" required>
    
          <input id="submit_shadow" type="submit" name="submit" value="Login">
          <label style="color:red;display:inline;margin-left:5px"><?php if(isset($_POST['submit'])){echo $error_mgs;}?></label>
          <button class="btn_home" ><a href="index.php">Back Home Page </a></button>
        </form>
      </div>
    </div>
  </div> -->

  <div class="wrapper">
      <form action="student_log.php" method="POST">
        <!-- login form -->
        <h1>Teacher Login</h1>
        <div class="input-box">
          <input type="text" name="s_id" id="username" placeholder="Enter Your Student ID" required>
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
          <p>Don't have an account?
            <a href="student_signup.php" class="reg">Register</a><br>
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
