<?php
require('conn.php');
if (isset($_POST['submit'])) {
  $firstName = $_POST['firstname'];
  $lastName = $_POST['lastname'];
  $email = $_POST['email'];
  $department = $_POST['department'];
  $semester = $_POST['semester'];
  $phone = $_POST['phone'];
  $new_password = $_POST['new_password'];
  $confirm_password = $_POST['confirm_password'];
  $uniqi_id = mt_rand(100, 10000);
  $sql = " INSERT INTO student_info(student_id,first_name,last_name,email,depart_name,semester,pass,mobile) VALUES ('$uniqi_id','$firstName','$lastName','$email','$department','$semester','$new_password','$phone')";
  if (($new_password == $confirm_password)) {
    $conn->query($sql);
    $Insert_msg = " Data Inserted Successfully!";
  } else {
    $Insert_msg_error = "Sorry! Data Not Inserted.";
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Signup Form</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="css/signup.css">
</head>

<body id="body_img">
  <!-- <header id="header">
    <div class="admin_class"><a href="student_log.php">User</a></div>
    <h1><marquee behavior="scroll" direction="left">Welcome to Sing up Page .All fillup the input field</marquee>
    <img src="logo/logo.png" alter="logo" aling="middle" class="logo">
    <h1>
      Welcome to Sing up Page .All fillup the input field
    </h1>
  </header> -->

  <section id="header1">
        <a href="index.php"><img src="logo/logo.png" alt=""></a>

        <div>
            <ul id="navbar">
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="student_log.php">Student</a></li>
                <li><a href="admin_log.php">Admin</a></li>
                <li><a href="teacher_log.php">Teacher</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="cart.html"></a><i class="fa-solid fa-bag-shopping"></i></li>
            </ul> 
        </div>
    </section>
  <!-- <div>
    <img src="logo/logo.png" alter="logo" aling="middle" class="logo">
  </div> -->
  <div>
    <label style="color:green;display:block;margin:20px 50px; text-align: center; ">
      <?php if (isset($_POST['submit']) && ($new_password == $confirm_password)) {
        echo $Insert_msg;
      } ?>
      <label style="color:red;display:inline; text-align:center"> <?php if (isset($_POST['submit']) && ($new_password == $confirm_password)) {
                                                                    echo "<br>Your Unique ID : " . $uniqi_id . " And Password : " . $new_password . " <br>Remember this Unique Id As a Student ID to Log In the First Time";
                                                                  } ?>
      </label>
    </label>
    <label style="color:red;display:block;margin:20px 50px;"><?php if (isset($_POST['submit']) && ($new_password != $confirm_password)) {
                                                                echo $Insert_msg_error;
                                                              } ?></label>
  </div>
  <div id="container" class="body_Container_size_signup">
    <div>
      <div class="container_form">
        <h2 style="padding:10px;border-bottom:2px solid rgb(17, 143, 143);color:rgb(17, 143, 143);">Sign Up Form</h2>
        <form action="student_signup.php" method="POST">
          <div class="body_section">
            <div id="left_part">
              <label for="firstname">First Name</label>
              <input type="text" id="firstname" name="firstname" placeholder="Enter your first name" required>

              <label for="lastname">Last Name</label>
              <input type="text" id="lastname" name="lastname" placeholder="Enter your last name" required>

              <label for="email">Email</label>
              <input type="text" id="email" name="email" placeholder="Enter your email">

              <label for="phone">Mobile Number</label>
              <input type="text" id="phone" name="phone" placeholder="Enter your Mobile Number">
            </div>
            <div id="right_part">
              <label for="department">Department</label>
              <select id="department" name="department" required>
                <option value="Select">Select</option>
                <option value="CSE">CSE</option>
                <option value="EEE">EEE</option>
                <option value="TEX">TEX</option>
                <option value="BBA">BBA</option>
                <option value="ENG">ENG</option>
                <option value="LAW">LAW</option>
                <option value="SOC">SOC</option>
              </select>

              <label for="semester">Semester</label>
              <select id="semester" name="semester" required>
                <option value="Select">Select</option>
                <option value="Summer">Summer</option>
                <option value="Spring">Spring</option>
                <option value="Fall">Fall</option>
              </select>
              <label for="new-password">Enter Password</label>
              <input type="password" id="new-password" name="new_password" placeholder="Enter Password" required>

              <label for="confirm-password">Confirm Password</label>
              <input type="password" id="confirm-password" name="confirm_password" placeholder="Repeat Password" required>
            </div>
          </div>
          <input class="already" type="submit" name="submit" value="Sign Up">
          <label style="text-align: center;" class="already" for="log in">Already have an account <a href="student_log.php">Log In</a></label>
          <label style="text-align: center;"> OR </label>
          <button class="already"><a href="index.php">Back Home Page</a></button>
      </div>
      </form>
    </div>
  </div>
  </div>
  <script>
    function validateForm() {
      let firstName = document.getElementById("firstname").value;
      let lastName = document.getElementById("lastname").value;
      let email = document.getElementById("email").value;
      let phone = document.getElementById("phone").value;
      let department = document.getElementById("department").value;
      let semester = document.getElementById("semester").value;
      let password = document.getElementById("new-password").value;
      let confirmPassword = document.getElementById("confirm-password").value;
      if (department === "Select" || semester === "Select") {
        alert("Please select a valid department and semester.");
        return false;
      }

      if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
      }
      return true;
    }

    function checkPasswords() {
      let password = document.getElementById("new-password").value;
      let confirmPassword = document.getElementById("confirm-password").value;
      let message = document.getElementById("password-message");

      if (password !== confirmPassword) {
        message.style.color = 'red';
        message.innerText = 'Passwords do not match';
      } else {
        message.style.color = 'green';
        message.innerText = 'Passwords match';
      }
    }
  </script>
  <?php
  include("footer.php");
  ?>
</body>

</html>