<?php 

include("includes/db.php");
global $mysqli;

	//$content_type_args = explode(';', $_SERVER['CONTENT_TYPE']);
//if ($content_type_args[0] == 'application/json')
  //$_POST = json_decode(file_get_contents('php://input'),true);
	
$data = json_decode(file_get_contents("php://input"));
	$course_id = $data->course_id;
	$customer_id = $data->customer_id;
	$rating = $data->rating;
	$reviews = $data->reviews;
	
	
	$post_reviews = "INSERT INTO review (review_id, rating, reviews) VALUES (NULL,'".$rating."','".$reviews."')";
	mysqli_query($mysqli, $post_reviews);
	
	$get_review_id = "select max(review_id) from review";
	$run_get_review_id = mysqli_query($mysqli, $get_review_id);
	$row_review_id = mysqli_fetch_array($run_get_review_id)['max(review_id)'];
	
	$post_course_review = "INSERT INTO course_customer (review_id, course_id, customer_id) VALUES(null, '".$course_id."','".$customer_id."') ON DUPLICATE KEY UPDATE review_id = $row_review_id";
	$update_course_rate = "Update `course` set `course_rate` = (SELECT AVG(rating) FROM `review` join course_customer on review.review_id = course_customer.review_id where course_customer.course_id = $course_id) WHERE course_id = $course_id";
	mysqli_query($mysqli, $post_course_review);
	mysqli_query($mysqli, $update_course_rate);


	?>