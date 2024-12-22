<?php
session_start();
$fatch = $_SESSION['student_log']['student_id'];
if(empty($_SESSION['student_log']))
{
  header('location:student_log.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Student_Home</title>
  <link rel="stylesheet" href="css/style.css">
  <script>
    window.onload = function() {
      alert('Welcome to the student Home Page <?php echo$_SESSION['student_log']['first_name']." ".$_SESSION['student_log']['last_name'];?> !');
    };
    function confirmLogout() {
      return confirm('Are you sure you want to logout?');
    }
      if (logoutLink.style.display === 'none') {
        logoutLink.style.display = 'block';
      } else {
        logoutLink.style.display = 'none';
      }
  </script>
</head>
<body>
  <header id="header">
    <div class="admin_class">
      <a href="admin_logout.php" id="logout-link" onclick="return confirmLogout()">Logout</a>
    </div>
  
    <h1>Student Home Page</h1>
  </div>
  </header>
  <div class="body_section">
    <div id="container" class="left_part">
        <div class="list_item_home_content">
            <a href="student_home.php" class="list_item_home">Home</a>
            <a href="student_result.php" class="list_item_home">Result</a>
            <a href="profile.php" class="list_item_home">Profile</a>
            <a href="student_course_request.php" class="list_item_home">Course Registration</a>
            <a href="class_routine.php" class="list_item_home">Class Routine</a>
            <a href="student_reset_pass.php" class="list_item_home">Change Password</a>
        </div>
    </div>
    <div id="container" class="right_part">
        <div id="welcome-message">
            <h2 style="color:rgb(47, 218, 176);">Welcome Back <label style="color:Red;display:inline;font-weight:bolder"><?php echo$_SESSION['student_log']['first_name']." ".$_SESSION['student_log']['last_name'];?> !</label></h2>
            <div class="home_img">
                <img src="https://img.freepik.com/premium-vector/happy-diverse-students-school-break-girls-guy-talking_511716-13.jpg" alt="">
            </div>
          </div>
    </div>
  </div>
  <?php
  // include("footer.php");
  ?>
</body>

</html>
