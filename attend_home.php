<?php
session_start();
include('conn.php');
if (empty($_SESSION['admin_log'])) {
    header('location:teacher_log.php');
    exit;
}
if (isset($_POST["submit"])) {
    $course = $_POST['course'];
    if (!empty($course) && $course !== 'Select') {
        $sql = "SELECT student_info.student_id, student_info.first_name, course_offer.course_name
                FROM course_taken
                JOIN student_info ON course_taken.student_id = student_info.student_id
                JOIN course_offer ON course_taken.course_id = course_offer.course_id
                WHERE course_taken.course_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $course);
        $stmt->execute();
        $query = $stmt->get_result();
        if ($query->num_rows > 0) {
            $fatch_student_info_table = $query->fetch_all(MYSQLI_ASSOC);
            $_SESSION['fatch_student_info'] = $fatch_student_info_table;
            $_SESSION['course_id'] = $course;
            header("location:attendence.php");
            exit;
        } else {
            $search_error_mgs = "No Data Found From Database!";
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin_Home</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div id="header">
    <div class="admin_class"><a href="admin_logout.php">Logout</a></div>
    <h1>Student Portal</h1>
  </div>
  <div class="body_section">
    <div id="container" class="left_part">
      <div class="list_item_home_content">
        <label>Teacher panel</label></br>
        <a href="teacher_home.php" class="list_item_home">Home</a>
        <a href="insert_result_home.php" class="list_item_home">Insert Result</a>
        <a href="attend_home.php" class="list_item_home">Attendance</a>
        <a href="teacher_reset_pass.php" class="list_item_home">Change Password</a>
      </div>
    </div>
    <div id="container" class="right_part">
      <div id="welcome-message">
        <h3 style="padding:10px;border-bottom:2px solid rgb(17, 143, 143);color:rgb(17, 143, 143);">Class Attendance Info</h3>
        <form action="attend_home.php" method="POST">
          <div id="pro_border" class="attend_sec_1">
            <div class="attend_box_middle">
              <label id="search_label" for="username">Course ID: </label>
              <select id="course_box" name="course">
                <option value="Select">Select Course</option>
                <?php
                  $sql_course = "SELECT * FROM course_offer";
                  $result_course = mysqli_query($conn, $sql_course);
                  if (mysqli_num_rows($result_course) > 0) {
                    while ($course_fatch = mysqli_fetch_assoc($result_course)) {
                      $course_id = $course_fatch['course_id'];
                      $course_name = $course_fatch['course_name'];
                ?>
                <option value="<?php echo $course_id; ?>"><?php echo "$course_id ($course_name)"; ?></option>
                <?php
                    }
                  }
                ?>
              </select>
              <input style="display:block;margin:20px auto;" type="submit" id="search_sub submit_shadow" name="submit" value="Search">
            </div>
          </div>
        </form>
        <label style="color:red;display:inline;margin-left:20px"><?php if (isset($search_error_mgs)) echo $search_error_mgs; ?></label>
      </div>
    </div>
  </div>
  <footer style="background-color: #004d00;color: white; padding: 10px; text-align: center; position:fixed;width: 100%;bottom: 0;">
    <p>&copy; 2024 Green University. All rights reserved.</p>
    <p>Contact Us: <a href="mailto:support@greenuniversity.edu" style="color: #ffcc00;">support@greenuniversity.edu</a> | Phone: (123) 456-7890</p>
    <p>Follow Us:
      <a href="https://www.facebook.com/greenuniversitybd" style="color: #ffcc00;">Facebook Page</a> | Or|
      <a href="https://green.edu.bd" style="color: #ffcc00;">Website</a>
    </p>
  </footer>
</body>
</html>