<?php
session_start();
$admin_fatch = $_SESSION['admin_log']['name'];
if(empty($_SESSION['admin_log']))
{
  header('location:teacher_log.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Teacher_Home</title>
  <link rel="stylesheet" href="css/style.css">
  <script>
    window.onload = function() {
      alert('Welcome to the Teacher Home Page,  <?php echo $admin_fatch; ?>!');
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
      <a href="teacher_logout.php" id="logout-link" onclick="return confirmLogout()">Logout</a>
    </div>
    <!-- <a style="color:white" > <h1><marquee behavior="scroll" direction="left">Welcome to Teacher Home Page </marquee> </h1></a> -->
    <a style="color:white" > <h1>Welcome to Teacher Home Page </marquee> </h1></a>
  </header>
  <div class="body_section">
    <div id="container" class="left_part">
        <div class="list_item_home_content">
        <label >Teacher panel</label></br>
            <a href="Teacher_home.php" class="list_item_home">Home</a>
            <a href="insert_result_home.php" class="list_item_home">Insert Result</a>
            <a href="attend_home.php" class="list_item_home">Attendance</a>
            <a href="teacher_reset_pass.php" class="list_item_home">Change Password</a>
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
