<?php
session_start();
$admin_fatch = $_SESSION['admin_log']['name'];
include('conn.php');
if(empty($_SESSION['admin_log']))
{
  header('location:teacher_log.php');
}
if(isset($_POST["submit"])){
  $student_id = $_POST["s_id"];
  $sql = "SELECT * FROM student_info WHERE student_id = '$student_id'";
  $quary = $conn->query($sql);
  if($quary-> num_rows > 0)
  {
    if(!empty($student_id)){
      $fatch = $quary-> FETCH_ASSOC();
      $_SESSION['fatch_data']= $fatch;
      header("location:insert_result.php");
    }
    
  }else{
      $search_error_mgs = "No Data Found From Database !";
    }
    
  }

?>

<!DOCTYPE html>
<html>
<head>
  <title>Insert Student Marks</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div id="header">
    <div class="admin_class"><a href="teacher_logout.php">Logout</a></div>
    <h1>Student Portal</h1>
  </div>

  <div class="body_section">
    <div id="container" class="left_part">
        <div class="list_item_home_content">
        <label >Teacher panel</label></br>
            <a href="teacher_home.php" class="list_item_home">Home</a>
            <a href="insert_result_home.php" class="list_item_home">Insert Result</a>
            <a href="attend_home.php" class="list_item_home">Attendance</a>
            <a href="teacher_reset_pass.php" class="list_item_home">Change Password</a>
        </div>
    </div>
    <div id="container" class="right_part">
        <div id="welcome-message">
        <div id="container">
          <h3 style="padding:10px;border-bottom:2px solid rgb(17, 143, 143);color:rgb(17, 143, 143);">Insert Student Marks</h3>
          <form action="insert_result_home.php" method="POST">
            <div  id="pro_border" class="profile_sec_1">
              <div class="search_box_middle">
                <label id="search_label"  for="username">Student ID :</label>
                <input type="text" id="search_box" name="s_id" placeholder="Student ID" required>
                <input type="submit" id="search_sub submit_shadow" name="submit" value="Search">
              </div>
            </div>
            <label style="color:red;display:inline;margin-left:20px"><?php if(isset($_POST['submit'])){echo $search_error_mgs;}?></label>
          </form>
        </div>
          </div>
    </div>
  </div>
  <footer style="background-color: #004d00;color: white; padding: 10px; text-align: center; position:fixed;width: 100%;bottom: 0; ">
   <p>&copy; 2024 Green University. All rights reserved.</p>
  <p>Contact Us: <a href="mailto:support@greenuniversity.edu" style="color: #ffcc00;">support@greenuniversity.edu</a> | Phone: (123) 456-7890</p>
  <p>Follow Us: 
    <a href="https://www.facebook.com/greenuniversitybd" style="color: #ffcc00;">Facebook Page </a> | Or|
    <a href="https://green.edu.bd" style="color: #ffcc00;"> Website </a>
      </p>
</body>
</html>
