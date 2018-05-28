<!DOCTYPE >
<?php

include("includes/db.php");
if(isset($_GET['edit_courses'])){

	$get_id = $_GET['edit_courses'];

	$get_courses = "select * from course where course_id = '$get_id'";

	$run_courses = mysqli_query($mysqli, $get_courses);


	$row_courses = mysqli_fetch_array($run_courses); 

		$course_id = $row_courses['course_id'];
		$course_title = $row_courses['course_title'];
		$course_image = $row_courses['course_image'];
		$course_price = $row_courses['course_price'];
		$course_desc = $row_courses['course_desc'];
		$course_keywords = $row_courses['course_keywords'];
		$course_cat = $row_courses['course_cat'];
		$course_video = $row_courses['course_video'];

		$get_cat = "select * from category where cat_id = '$course_cat'";

		$run_cat = mysqli_query($mysqli,$get_cat);

		$row_cat = mysqli_fetch_array($run_cat);

		$category_title = $row_cat['cat_title'];

}

?>
<html>
<head>
 <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

<title>Edit and Uodate courses</title>
</head>

<body bgcolor = "skyblue">
	<form action = "" method="post" enctype ="multipart/form-data">

		<table align="center" width ="750" border = "2">
			<tr align="center">
				<td colspan="7"><h2>Insert New Post Here</td>

			</tr>

			<tr>
				<td align="right">Course Title:</td>
				<td><input type="text" name="course_title" value = "<?php echo $course_title; ?>" required/></td>
			</tr>
			<tr>
				<td align="right">Course Category:</td>
				<td>
					<select name = "course_cat">
						<option> <?php echo $category_title; ?></option>

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
				<td><input type="file" name="course_image" required /><img src = "course_images/<?php echo $course_image; ?>" width = "60" height = "60" /></td>
			</tr>

			<tr>
				<td align="right">Course Video:</td>
				<td><input type="file" name="course_video" disabled="true" /></td>
			</tr>
			<tr>
				<td align="right">Course Price:</td>
				<td><input type="text" name="course_price" value = "<?php echo $course_price; ?>" required/></td>
			</tr>
			<tr>
				<td align="right">Course Description:</td>
				<td><textarea name="course_desc" cols="20" rows="10" required=""><?php echo $course_desc; ?></textarea></td>
			</tr>
			<tr>
				<td align="right">Course Keywords:</td>
				<td><input type="text" name="course_keyword" value = "<?php echo $course_keywords; ?>" /></td>
			</tr>
			

			<tr align="center">
				<td colspan="7"><input type="submit" name="update_courses" value="Update Courses" /></td>
			</tr>


		</table>
	</form>
</body>

</html>


<?php

global $mysqli;

if (isset($_POST['update_courses'])){

	//getting text data from fields
	$update_id = $course_id;
	$c_title = $_POST['course_title'];
	$c_cat = $_POST['course_cat'];
	$c_desc = $_POST['course_desc'];
	$c_price = $_POST['course_price'];
	$c_keyword = $_POST['course_keyword'];


	//getting image from field

	$c_image = $_FILES['course_image']['name'];
	$c_image_tmp = $_FILES['course_image']['tmp_name'];

	move_uploaded_file($c_image_tmp, "course_images/$c_image");

	$c_video = $_FILES['course_video']['name'];
	$c_video_tmp = $_FILES['course_video']['tmp_name'];

	move_uploaded_file($c_video_tmp, "course_videos/".$c_video);

$url = "http://127.0.0.1/LMS/admin/course_videos/$c_video";

	$update_courses = "update course set course_cat = '$c_cat', course_title = '$c_title', course_desc = '$c_desc' , course_price = '$c_price', course_image = '$c_image', course_keywords = '$c_keyword' where course_id = '$update_id'";

	$update_pro = mysqli_query($mysqli, $update_courses);

	if($update_pro){
		echo "<script>alert('Course has been updated')</script>";
		echo "<script>window.open('index.php?view_courses','_self')</script>";
	}
}

?>