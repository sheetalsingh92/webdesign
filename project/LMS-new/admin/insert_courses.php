<!DOCTYPE >
<?php

include("includes/db.php");

?>
<html>
<head>
 <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

<title>Insert_courses</title>
</head>

<body bgcolor = "skyblue">
	<form action = "insert_courses.php" method="post" enctype ="multipart/form-data">

		<table align="center" width ="750" border = "2">
			<tr align="center">
				<td colspan="7"><h2>Insert New Post Here</td>

			</tr>

			<tr>
				<td align="right">Course Title:</td>
				<td><input type="text" name="course_title"/></td>
			</tr>
			<tr>
				<td align="right">Course Category:</td>
				<td>
					<select name = "course_cat">
						<option> Select a category</option>

						<?php 
						global $mysqli;

	$get_cat = "select * from category";

	$run_cat = mysqli_query($mysqli, $get_cat);

	while($row_cat=mysqli_fetch_array($run_cat)){

		$cat_id = $row_cat['cat_id'];

		$cat_title = $row_cat['cat_title'];
	

	echo "<option value = '$cat_id'>$cat_title</option>";
}

?>
						
					</select>
				</td>
			</tr>
			<tr>
				<td align="right">Course Image:</td>
				<td><input type="file" name="course_image"/></td>
			</tr>

			<tr>
				<td align="right">Course Video:</td>
				<td><input type="file" name="course_video"/></td>
			</tr>
			<tr>
				<td align="right">Course Price:</td>
				<td><input type="text" name="course_price"/></td>
			</tr>
			<tr>
				<td align="right">Course Description:</td>
				<td><textarea name="course_desc" cols="20" rows="10"></textarea></td>
			</tr>
			<tr>
				<td align="right">Course Keywords:</td>
				<td><input type="text" name="course_keyword"/></td>
			</tr>
			

			<tr align="center">
				<td colspan="7"><input type="submit" name="insert_courses" value="Insert Now" /></td>
			</tr>


		</table>
	</form>
</body>

</html>


<?php

global $mysqli;

if (isset($_POST['insert_courses'])){

	//getting text data from fields

	$course_title = $_POST['course_title'];
	$course_cat = $_POST['course_cat'];
	$course_desc = $_POST['course_desc'];
	$course_price = $_POST['course_price'];
	$course_keyword = $_POST['course_keyword'];


	//getting image from field

	$course_image = $_FILES['course_image']['name'];
	$course_image_tmp = $_FILES['course_image']['tmp_name'];

	move_uploaded_file($course_image_tmp, "course_images/$course_image");

	$course_video = $_FILES['course_video']['name'];
	$course_video_tmp = $_FILES['course_video']['tmp_name'];

	move_uploaded_file($course_video_tmp, "course_videos/".$course_video);

$url = "http://127.0.0.1/LMS/admin/course_videos/$course_video";

	$insert_courses = "insert into course (course_cat,course_title,course_desc,course_price, course_image, course_keywords, course_video) values ('$course_cat','$course_title','$course_desc','$course_price','$course_image','$course_keyword', '$url')";

	$insert_pro = mysqli_query($mysqli, $insert_courses);

	if($insert_pro){
		echo "<script>alert('Course has been inserted')</script>";
		echo "<script>window.open('index.php?insert_courses.php','_self')</script>";
	}
}

?>