<?php
session_start();
$admin_fatch = $_SESSION['admin_log']['name'];
if(empty($_SESSION['admin_log']))
{
  header('location:admin_log.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin_Home</title>
  <link rel="stylesheet" href="css/style.css">
  <script>
    window.onload = function() {
      alert('Welcome to the Admin Home Page, Mr. <?php echo $admin_fatch; ?>!');
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
    <a style="color:white" > <h1>Welcome to Admin Login Page </marquee> </h1></a>
  </header>
  <div class="body_section">
    <div id="container" class="left_part">
        <div class="list_item_home_content">
        <label >Admin panel</label></br>
            <a href="admin_home.php" class="list_item_home">Home</a>
            <a href="add_course.php" class="list_item_home">Add Course</a>
            <a href="admin_conform.php" class="list_item_home">Verify Student</a>
            <a href="admin_reset_pass.php" class="list_item_home">Change Password</a>
        </div>
    </div>
    <div id="container" class="right_part">
        <div id="welcome-message">
        <h2 style="color:rgb(47, 218, 176);">Welcome <label style="color:red;display:inline;font-weight:bolder"> <?php echo $admin_fatch;?> !</label></h2>
            <div>
               <img src="https://static.vecteezy.com/system/resources/thumbnails/001/313/793/small/teacher-with-books-and-chalkboard-video-lesson-vector.jpg" alt="">
            </div>
          </div>
    </div>
  </div>
  <?php
  include("footer.php");
  ?>
</body>
</html>
