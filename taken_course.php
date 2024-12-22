<?php
session_start();

if(empty( $_SESSION['student_log'])){
  header('location:student_log.php');
}

if($_GET['student_id']){
    $s_id = $_GET['student_id'];
    $sql = "INSERT INTO course_taken(student_id,course_id,course_name,credit) values('$student_id,$course_id','$course_name','$credit')";
    $query = $conn->query($sql);
}

?>
<?php
session_start();
if (empty($_SESSION['student_log'])) {
    header('location:student_log.php');
}

include('your_database_connection_file.php');


if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];


    $sql = "DELETE FROM course_taken WHERE student_id = '$student_id'";
    $query = $conn->query($sql);


    if ($query) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request. Student ID not provided.";
}


$conn->close();
?>
