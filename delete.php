<?php
include("conn.php");
$d=$_GET['del'];
$sql=mysqli_query($al,"DELETE FROM students WHERE id='$d'");
if($sql)
{
	?>
	<script type="text/javascript" >
	alert('Successfully Deleted');
	{
  header('location:admin_log.php');
}
<?php

}
?>