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
</head>
<body class="body_first" >
  <div id="header">
    <!-- <a style="color:white" > <h1><marquee behavior="scroll" direction="left">Welcome to Teacher Login Page </marquee> </h1></a> -->
    <a style="color:white" > <h1>Welcome to Teacher Login Page </marquee> </h1></a>
  </div>
  <div class="container" >
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
  </div>
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
  include("footer.php");
  ?>
</body>
</html>
