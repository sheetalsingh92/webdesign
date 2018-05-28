<style>
<?php include 'functions.css'; ?>
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="bootstrap-rating-input.min.js"></script>


<?php
DEFINE('DB_USERNAME', 'root');
  DEFINE('DB_PASSWORD', 'root');
  DEFINE('DB_HOST', 'localhost');
  DEFINE('DB_DATABASE', 'las');

  $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

  if (mysqli_connect_error()) {
    die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
  }

//getting user IP address
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

// creating shopping cart
function cart(){

	global $mysqli;

	if (isset($_GET['add_cart'])){

		$course_id = $_GET['add_cart'];
		$ip = getIp();

		$check_pro = "select * from cart where ip_add = '$ip' AND course_id = '$course_id'";

		$run_check = mysqli_query($mysqli, $check_pro);

		if(mysqli_num_rows($run_check)>0){

			echo "";
		}

		else{

			$insert_courses = "insert into cart(course_id, ip_add) values ('$course_id','$ip')";
			$run_courses = mysqli_query($mysqli, $insert_courses);

			//echo " <script>window.open('index.php','_self')</script>";
		}

	}
}

//getting total added items

function total_items(){

	if(isset($_GET['add_cart'])){

		global $mysqli;

		$ip = getIp();

		$get_items = "select * from cart where ip_add = '$ip'";

		$run_items = mysqli_query($mysqli, $get_items);

		$count_items = mysqli_num_rows($run_items);

	}

	else{

		global $mysqli;
		$ip = getIp();

		$get_items = "select * from cart where ip_add = '$ip'";

		$run_items = mysqli_query($mysqli, $get_items);

		$count_items = mysqli_num_rows($run_items);

	}

  echo $count_items;
}



//getting the categories
function getCategory(){

	global $mysqli;

	$get_cat = "select * from category";

	$run_cat = mysqli_query($mysqli, $get_cat);

	while($row_cat=mysqli_fetch_array($run_cat)){

		$cat_id = $row_cat['cat_id'];

		$cat_title = $row_cat['cat_title'];
	

	echo "<li> <a href = 'index.php?cat=$cat_id'>$cat_title</a></li>";
}

}



function getCourses(){

if(!isset($_GET['cat'])){
	global $mysqli;

	if(isset($_SESSION['customer_email'])){
		global $mysqli;
		$customer_email = $_SESSION['customer_email'];
		
		$get_courses = "select *,
						(case when course_id in (select course_id from course_customer 
							join customer on course_customer.customer_id = customer.customer_id 
							where customer_email = '$customer_email') then course_id end) as mycourse,
						(case when course_id not in (select course_id from course_customer 
							join customer on course_customer.customer_id = customer.customer_id 
							where customer_email = '$customer_email') then course_id end) as ordinarycourse 
						from course order by RAND() LIMIT 0,8";
		$run_courses = mysqli_query($mysqli, $get_courses);
		
			while($row_courses = mysqli_fetch_array($run_courses)){

			$course_id = $row_courses['course_id'];
			$course_title = $row_courses['course_title'];
			$course_price = $row_courses['course_price'];
			$course_image= $row_courses['course_image'];
			$course_mycourse = $row_courses['mycourse'];
			$course_ordinarycourse = $row_courses['ordinarycourse'];
			$course_desc= $row_courses['course_desc'];

			if($course_mycourse!=null){
				echo " 
	 				<div class='col-12 col-sm-3 col-md-3 col-lg-3'>
   					<div class='containerFunc'>
   						<div class='card'>
      						<img class='card-img-top imageFunc' src='admin/course_images/$course_image' alt='Art Course' >
      						<a class='card-text' ><p><strong>$course_title</strong></p></a>
      						<b> $ $course_price </b>
      						<a href = 'CourseDetail.php?course_id=$course_id' > Details</a>
      						
      						<div class='overlayFunc'>
        						<div class='textFunc'>$course_desc</div>
      						</div>
    					</div>
    				</div>
    				</div>
    				";
			}

			else{
		echo " 
	 <div class='col-12 col-sm-3 col-md-3 col-lg-3'>
   <div class='containerFunc'>
   <div class='card'>
      <img class='card-img-top imageFunc' src='admin/course_images/$course_image' alt='Art Course' >
      <a class='card-text' ><p><strong>$course_title</strong></p></a>
      <b> $ $course_price </b>
      <a href = 'index.php?add_cart=$course_id'><button> Add to Cart</button></a>
      <div class='overlayFunc'>
        <div class='textFunc'>$course_desc</div>
      </div>
    </div>
    </div>
    </div>
    ";
			}
	 
		}

	}else{
	$get_courses = "select * from course order by RAND() LIMIT 0,8";
	$run_courses = mysqli_query($mysqli, $get_courses);
	while($row_courses = mysqli_fetch_array($run_courses)){

	 	$course_id = $row_courses['course_id'];
	// 	$course_cat = $row_courses['course_cat'];
	 	$course_title = $row_courses['course_title'];
	 	$course_price = $row_courses['course_price'];
		$course_image= $row_courses['course_image'];
		$course_desc= $row_courses['course_desc'];

	echo " 
	 <div class='col-12 col-sm-3 col-md-3 col-lg-3'>
   <div class='containerFunc'>
   <div class='card'>
      <img class='card-img-top imageFunc' src='admin/course_images/$course_image' alt='Art Course' >
      <a class='card-text' ><p><strong>$course_title</strong></p></a>
      <b> $ $course_price </b>
      <a href = 'index.php?add_cart=$course_id'><button> Add to Cart</button></a>
      <div class='overlayFunc'>
        <div class='textFunc'>$course_desc</div>
      </div>
    </div>
    </div>
    </div>
    ";
 
	}
	}
}

}


function getCatCourses(){

if(isset($_GET['cat'])){

	$cat_id = $_GET['cat'];

	global $mysqli;
	
	if(isset($_SESSION['customer_email'])){
		global $mysqli;
		$customer_email = $_SESSION['customer_email'];
		$get_cat_courses ="select *,
							(case when course_id in (select course_id 
								from course_customer join customer on 
								course_customer.customer_id = customer.customer_id 
								where customer_email = '$customer_email') then course_id end) as mycourse,
							(case when course_id not in (select course_id 
								from course_customer join customer on 
								course_customer.customer_id = customer.customer_id 
								where customer_email = '$customer_email') then course_id end) as ordinarycourse
							from course where course_cat ='$cat_id'";
							
		$run_cat_courses = mysqli_query($mysqli, $get_cat_courses);

		$count_cat = mysqli_num_rows($run_cat_courses);

		if($count_cat == 0){
			echo "<h2>There is no product in this category</h2>";
			
		}

		while($row_cat_courses = mysqli_fetch_array($run_cat_courses)){

			$course_id = $row_cat_courses['course_id'];
			$course_title = $row_cat_courses['course_title'];
			$course_price = $row_cat_courses['course_price'];
			$course_image= $row_cat_courses['course_image'];
			$course_mycourse = $row_cat_courses['mycourse'];
			$course_ordinarycourse = $row_cat_courses['ordinarycourse'];
			$course_desc = $row_cat_courses['course_desc'];


		if($course_mycourse!=null){
				echo " 
	 <div class='col-12 col-sm-3 col-md-3 col-lg-3'>
   <div class='containerFunc'>
   <div class='card'>
      <img class='card-img-top imageFunc' src='admin/course_images/$course_image' alt='Art Course' >
      <a class='card-text'  ><p><strong>$course_title</strong></p></a>
      <b> $ $course_price </b>
      <a href = 'CourseDetail.php?course_id=$course_id' > Details</a>
      <div class='overlayFunc'>
        <div class='textFunc'>$course_desc</div>
      </div>
    </div>
    </div>
    </div>
    ";
			}

		else{
		

		echo " 
	 <div class='col-12 col-sm-3 col-md-3 col-lg-3'>
   <div class='containerFunc'>
   <div class='card'>
      <img class='card-img-top imageFunc' src='admin/course_images/$course_image' alt='Art Course' >
      <a class='card-text' ><p><strong>$course_title</strong></p></a>
      <b> $ $course_price </b>
      <a href = 'index.php?add_cart=$course_id'><button> Add to Cart</button></a>
      <div class='overlayFunc'>
        <div class='textFunc'>$course_desc</div>
      </div>
    </div>
    </div>
    </div>
    ";
			

			}

	 
		}
	}else{

	$get_cat_courses = "select * from course where course_cat = '$cat_id'";

	$run_cat_courses = mysqli_query($mysqli, $get_cat_courses);

	$count_cat = mysqli_num_rows($run_cat_courses);

if($count_cat == 0){
		echo "<h2>There is no product in this category</h2>";
		
	}

	while($row_cat_courses = mysqli_fetch_array($run_cat_courses)){

	 	$course_id = $row_cat_courses['course_id'];
	// 	$course_cat = $row_courses['course_cat'];
	 	$course_title = $row_cat_courses['course_title'];
	 	$course_price = $row_cat_courses['course_price'];
		$course_image= $row_cat_courses['course_image'];
		$course_desc= $row_cat_courses['course_desc'];


	

echo " 
	 <div class='col-12 col-sm-3 col-md-3 col-lg-3'>
   <div class='containerFunc'>
   <div class='card'>
      <img class='card-img-top imageFunc' src='admin/course_images/$course_image' alt='Art Course' >
      <a class='card-text' ><p><strong>$course_title</strong></p></a>
      <b> $ $course_price </b>
      <a href = 'index.php?add_cart=$course_id'><button> Add to Cart</button></a>
      <div class='overlayFunc'>
        <div class='textFunc'>$course_desc</div>
      </div>
    </div>
    </div>
    </div>
    ";

 
	}
	}
}

}







?>