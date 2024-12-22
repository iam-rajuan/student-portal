<?php
session_start();
include("conn.php");

if (empty($_SESSION['admin_log'])) {
    header('location:teacher_log.php');
    exit;
}

if (empty($_SESSION['fatch_student_info']) || empty($_SESSION['course_id'])) {
    header('location:attend_home.php');
    exit;
}

$fatch_course_taken = $_SESSION['fatch_student_info'];
$course_id = $_SESSION['course_id'];
$present_date = date("Y-m-d");

if (isset($_POST['submit'])) {
    $stmt = $conn->prepare("INSERT INTO attendence (student_id, course_id, p_date, attendence) VALUES (?, ?, ?, ?)");
    foreach ($fatch_course_taken as $student) {
        $student_id = $student['student_id'];
        $attendance_status = isset($POST["attendance$student_id"]) ? $POST["attendance$student_id"] : 'Absent';

        $stmt->bind_param("isss", $student_id, $course_id, $present_date, $attendance_status);
        $stmt->execute();
    }
    $stmt->close();
    $success_msg = "Attendance Taken Successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Attendance</title>
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
            <a href="teacher_home.php" class="list_item_home">Home</a>
            <a href="insert_result_home.php" class="list_item_home">Insert Result</a>
            <a href="attend_home.php" class="list_item_home">Attendance</a>
            <a href="teacher_reset_pass.php" class="list_item_home">Change Password</a>
        </div>
    </div>
    <div id="container" class="right_part">
        <div id="attendence_body">
            <h3 style="padding:10px;border-bottom:2px solid rgb(17, 143, 143);color:rgb(17, 143, 143);text-align:center;font-size:25px">Student Attendance</h3>
            <div class="student_list">
            <label style="color:red;display:block;margin:50px 20px;"><?php if (isset($success_msg)) echo $success_msg; ?></label>
                    <form action="attendence.php" method="POST">
                        <label style="display:block;padding:10px;text-align:center;font-size:18px;color:#b90000;text-shadow:3px 2px 8px #b90033"><?php echo $present_date; ?></label>
                        <table>
                            <tr>
                                <th style="padding:10px 15px;background-color:#91e989a2;">Student ID</th>
                                <th style="padding:10px 15px;background-color:#3a558ea1;">Student Name</th>
                                <th style="padding:10px 15px;background-color:#90d98952;">Course Name</th>
                                <th style="padding:10px 15px;background-color:#11c989a2;">Attendance Section</th>
                            </tr>
                            <?php foreach ($fatch_course_taken as $student): ?>
                                <tr>
                                    <td style="padding:10px 45px;background-color:#ccc;"><?php echo $student['student_id']; ?></td>
                                    <td style="padding:10px 45px;background-color:#ccc;"><?php echo $student['first_name']; ?></td>
                                    <td style="padding:10px 45px;background-color:#ccc;"><?php echo $student['course_name']; ?></td>
                                    <td style="padding:10px 35px;background-color:#ccc;">
                                        <input type="radio" name="attendance_<?php echo $student['student_id']; ?>" value="Present" required> Present
                                        <input type="radio" name="attendance_<?php echo $student['student_id']; ?>" value="Absent" required> Absent
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                        <input style="display:block;margin:20px auto;" type="submit" id="search_sub submit_shadow" name="submit" value="Submit">
                    </form>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>
</body>
</html>