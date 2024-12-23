<?php
session_start();
require('conn.php');

if (isset($_POST['submit'])) {
  $s_id = $_POST['s_id'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM student_info WHERE student_id = '$s_id' AND pass= '$password'";
  $query = $conn->query($sql);
  if ($query->num_rows > 0) {
    $compear = $query->FETCH_ASSOC();
    $_SESSION['student_log'] = $compear;
    header('location:student_home.php');
  } else {
    $error_mgs = "Wrong Combination !";
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Student Portal</title>
  <!-- <link rel="stylesheet" href="css/style.css"> -->
  <link rel="stylesheet" href="css/login.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="body_first">
  <!-- <div id="header"> -->
    <!-- <div class="admin_class"><a href="admin_log.php">Admin</a></div> -->

    <!-- 
  <a style="color:white" href="index.php"><h1><marquee behavior="scroll" direction="left">Welcome to student Login Page </marquee></h1></a>
  <a style="color:white" href="index.php"><h1>Welcome to student Login Page</h1></a> -->


    <!-- </div>
    <div class="container" >
      <div >
        <div id="container_form">
          <h2 style="padding:10px;border-bottom:2px solid rgb(17, 143, 143);color:rgb(17, 143, 143);"> Student Login</h2>
          <form action="student_log.php" method="POST">
            <label for="username">Student ID:</label>
            <input type="text" id="username" name="s_id" placeholder="Enter Student ID" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" required>
            
            <input  type="submit" name="submit" value="Login">
            <label style="color:red;display:inline;margin-left:10px;margin-top:10px">
              <?php
              // if (isset($_POST['submit'])) {
              // echo $error_mgs;} 
              ?>
                  </label>
            <button><a href="index.php">Back Home Page </a></button>
          </form>
        </div>
      </div>
    </div> -->

    <div class="wrapper">
      <form action="student_log.php" method="POST">
        <!-- login form -->
        <h1>Student Login</h1>
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
          <!-- <div><a href="index.php"><i class='bx bxs-home'></i></a></div> -->
          <!-- <button type="submit" name="submit" value="login" class="btn"><a href="index.php">Back Home Page </a></button> -->
        </div>
        <!-- 
    <div class="container" >
      <div >
        <div id="container_form">
          <h2 style="padding:10px;border-bottom:2px solid rgb(17, 143, 143);color:rgb(17, 143, 143);"> Student Login</h2>
          <form action="student_log.php" method="POST">
            <label for="username">Student ID:</label>
            <input type="text" id="username" name="s_id" placeholder="Enter Student ID" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" required>
            
            <input  type="submit" name="submit" value="Login">
            <label style="color:red;display:inline;margin-left:10px;margin-top:10px">
              <?php
              // if (isset($_POST['submit'])) {
              // echo $error_mgs;} 
              ?></label>
            <button><a href="index.php">Back Home Page </a></button>
          </form>
        </div>
      </div>
    </div> -->





        <script>
          function validateForm() {
            let s_id = document.getElementById("username").value;
            let password = document.getElementById("password").value;
            if (s_id === "" || password === "") {
              alert("Both fields are required.");
              return false;
            }

            return true;
          }
        </script>
        <?php
        // include("footer.php");
        ?>
</body>

</html>