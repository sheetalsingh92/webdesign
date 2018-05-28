<!DOCTYPE>

<?php

include("functions/functions.php");

?>
<style type="text/css">
  <?php

include("functions/functions.css");

?>

</style>

<html lang="en" ng-app="BostonPublicLibrary">
<head>
  <title>Homepage_sample</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/1e6a9a1261.js"></script>

    <link rel="stylesheet" href="jquery.rateyo.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.0.1/jquery.rateyo.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.0.1/jquery.rateyo.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular-route.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
 <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
 
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/base/jquery-ui.css" rel="stylesheet">
  <script src="app.js"></script>
  <link href="homepage_format.css" rel="stylesheet"/>
  <link href="plugins.css" rel="stylesheet"/>
  <link href="search.css" rel="stylesheet"/>
<style>


@media (max-width: 993px) {
    .carousel-caption {
        display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
	.image-word{
		display:none;
	}
  .intro{
    font-size: 120%;
  }
  .container3{
    font-size: 80%;
  }
  .intro{
    display: none;
  }
  .dropdown-menu{
  background-color:#424141;

}
.navbar-dark .navbar-nav .dropdown-menu .nav-link {
    color: rgb(189, 186, 181);
    font-size:11px;
}

}

@media (max-width:768px)and (min-width:366px){
#table1 {
	display:none;
	}
#table2{
	display:block;
}
.container{
	padding:10px 10px;
}
h2{
	font-size:180%;
}
.containerimage{
	margin-top:4%;
}	
.containerword{
	position:relative;
	margin-top:4%;
}

.product-box {
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .product-box:hover {
        background-color: #f8f8f8;
    }
    .product-box:hover a {
        color: #333 !important;
    }
 
    .feature_box .service {
        border-bottom: 1px solid #eee;
    }

.intro{
	display:none;
}
.dropdown-menu{
	background-color:#424141;
}
.navbar-dark .navbar-nav .dropdown-menu .nav-link {
    color: rgb(189, 186, 181);
}


}

@media only screen and (max-width:365px){
#table1 {
	display:none;
	}
#table2{
	display:block;
}
.container{
	padding:10px 10px;
}
h2{
	font-size:110%;
}
.containerimage{
}	
.containerword{
	position:relative;
	margin-top:10%;
}
.intro{
	display:none;
}
.containerword ul li{
	display:table-cell;
}
.containerword ul li span{
	vertical-align:middle;
	display:inline-block;
}
.dropdown-menu{
	background-color:#424141;
}
.navbar-dark .navbar-nav .dropdown-menu .nav-link {
    color: rgb(189, 186, 181);
}
}

@media only screen and (max-width:360px){
#table1 {
	display:none;
	}
#table2{
	display:block;
}
.container{
	padding:10px 10px;
}
h2{
	font-size:110%;
}
.containerimage{
}	
.containerword{
	position:relative;
	margin-top:10%;
}
.intro{
	display:none;
}
.containerword ul li{
	display:table-cell;
}
.containerword ul li span{
	vertical-align:middle;
	display:inline-block;
}
.container3{
	display:none;
}
.dropdown-menu{
	background-color:#424141;
}
.navbar-dark .navbar-nav .dropdown-menu .nav-link {
    color: rgb(189, 186, 181);
}
}
</style>  
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" ng-controller="mainController">

<?php

include("header.php");

?>


<div class="text-center content" style="margin-top:70px">
  <h2><strong>Search Results</strong></h2><br>
  <div class="row">
<?php 

 global $mysqli;

 if(isset($_GET['search'])){

  $search_query = $_GET['user_query'];

$get_courses = "select * from course where course_keywords like '%$search_query%'";
  $run_courses = mysqli_query($mysqli, $get_courses);

    $count_course = mysqli_num_rows($run_courses);

if($count_course == 0){
    echo "<h2>There is no such course</h2>";
    
  }
  while($row_courses = mysqli_fetch_array($run_courses)){

    $course_id = $row_courses['course_id'];
  //  $course_cat = $row_courses['course_cat'];
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
      <a href = 'CourseDetail.php?course_id=$course_id' > Details</a>
      <a href = 'index.php?add_cart=$course_id'><button> Add to Favorites</button></a>
      <div class='overlayFunc'>
        <div class='textFunc'>$course_desc</div>
      </div>
    </div>
    </div>
    </div>
    ";

    // echo "
    //     <div class='row border search-course'>
    //     <img src='admin/course_images/$course_image' class='course-img col-lg-3' style='height: 150px;width:200px'>
    //     <div class='course-desc col-lg-8'>
    //     <a href=''>
    //       <h5 class='course-title'><strong><a style='color: black' href='CourseDetail.php?course_id=$course_id'>$course_title</a></strong><span class='badge badge-secondary'></span></h5>
    //     </a>
    //     <a href='' class='instructor'>Jonas Schmedtmann• Web Developer, Designer, and Teacher</a>
    //     <p>$course_desc</p>
    //       <div class='course-rate'>
    //       <p>
    //       <input type='number' name='your_awesome_parameter' id='rating' class='rating' value=$course_rate data-readonly data-inline/> 
    //       $course_rate ($course_review_count ratings)
          
    //       </p>
    //       </div>
    //       ";
 
  }
}

?>
</div>
</div>




<?php include('footer.php') ?>

	
</body>

</html>