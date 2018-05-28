<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include("includes/db.php");
global $mysqli;

	$data = json_decode(file_get_contents("php://input"));
	$course_id = $data->course_id;
	
	$get_reviews = "SELECT * FROM `review` join course_customer on review.review_id = course_customer.review_id 
					join customer on customer.customer_id = course_customer.customer_id 
					where course_customer.course_id ='$course_id'";

	//$get_course_rate=SELECT round(AVG(rating)) FROM `review` join course_customer on review.review_id = course_customer.review_id where course_customer.course_id = 8
	
	$run_reviews = mysqli_query($mysqli, $get_reviews);

	$output="";
	
	while($row_reviews = mysqli_fetch_array($run_reviews)){

		if ($output != "") {$output .= ",";} 
		$output .='{"customer_id":"' . $row_reviews["customer_id"] . '",';
		$output .='"customer_username":"' . $row_reviews["customer_username"] . '",';
		$output .='"rating":"' . $row_reviews["rating"] . '",';
		$output .='"reviews":"' . $row_reviews["reviews"] . '"}';
	 	//$review_id = $row_reviews['review_id'];
	 	//$rating = $row_reviews['rating'];
	 	//$reviews = $row_reviews['reviews'];

	}
	
  
	$output ='{"records":['.$output.']}'; 
	mysqli_close($mysqli);
	echo($output); 
	?>