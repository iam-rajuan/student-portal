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
  <link rel="stylesheet" href="css/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="body_first">
  <!-- <div id="header"> -->
  <!-- <div class="admin_class"><a href="admin_log.php">Admin</a></div> -->


  <!-- <a style="color:white" href="index.php"><h1><marquee behavior="scroll" direction="left">Welcome to student Login Page </marquee></h1></a> -->
  <!-- <a style="color:white" href="index.php"><h1>Welcome to student Login Page</h1></a> -->


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
            <label style="color:red;display:inline;margin-left:10px;margin-top:10px"><?php if (isset($_POST['submit'])) {
                                                                                        echo $error_mgs;
                                                                                      } ?></label>
            <button><a href="index.php">Back Home Page </a></button>
          </form>
        </div>
      </div>
    </div> -->

  <div class="wrapper">
    <form action="">
      <!-- login form -->
      <h1>Login</h1>
      <div class="input-box">
        <input type="text" placeholder="Username" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Password" required>
        <i class='bx bxs-lock-alt'></i>
      </div>
      <div class="remember-forgot">
        <label for="">
          <input type="checkbox">Remember Me
        </label>
        <a href="#">Forgot Password</a>
      </div>
      <button type="submit" class="btn">Login</button>

      <div class="register-link">
        <p>Don't have an account?
          <a href="#">Register</a>
        </p>
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
            <label style="color:red;display:inline;margin-left:10px;margin-top:10px"><?php if (isset($_POST['submit'])) {
                                                                                        echo $error_mgs;
                                                                                      } ?></label>
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
      include("footer.php");
      ?>
</body>

</html>