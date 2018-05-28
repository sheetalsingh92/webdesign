<?php

include("includes/db.php");

global $mysqli;

if(isset($_GET['delete_courses'])){
	
	$delete_id = $_GET['delete_courses'];

	$delete_courses = "delete from course where course_id = '$delete_id'";

	$run_delete = mysqli_query($mysqli, $delete_courses);

	if($run_delete){

		echo "<script>alert('A product has been deleted!')</script>";
		echo "<script>window.open('index.php?view_courses','_self')</script>";

	}
}


?>