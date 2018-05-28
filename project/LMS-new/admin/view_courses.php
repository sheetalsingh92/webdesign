<table width ="795" align ="center">

	<tr >
		<td><h2>View All Courses here</h2></td>
	</tr>

	<tr align = "center" >
		<th>S.N</th>
		<th>Title</th>
		<th>Image </th>
		<th>Price</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>

	<?php
	include("includes/db.php");

	$get_courses = "select * from course";

	$run_courses = mysqli_query($mysqli, $get_courses);

	$i = 0;

	while ($row_courses = mysqli_fetch_array($run_courses)){

		$course_id = $row_courses['course_id'];
		$course_title = $row_courses['course_title'];
		$course_image = $row_courses['course_image'];
		$course_price = $row_courses['course_price'];
		$i++;

	

	?>

	<tr align = "center">
		<td><?php echo $i; ?></td>
		<td><?php echo  $course_title; ?></td>
		<td><img src = "course_images/<?php echo $course_image; ?>" width = "60" height = "60" /></td>
		<td><?php echo  $course_price; ?></td>
		<td><a href = "index.php?edit_courses=<?php echo $course_id; ?>">Edit</a></td>
		<td><a href = "delete_courses.php?delete_courses=<?php echo $course_id; ?>">Delete</a></td>
	</tr>

	<?php } ?>

</table>