<!DOCTYPE>

<?php

session_start();
include("functions/functions.php");
include("includes/db.php");

global $mysqli;
if(isset($_SESSION['customer_email'])){
	$customer_email = $_SESSION['customer_email'];
	$get_customer = "select * from customer where customer_email = '$customer_email'";
	$run_customer = mysqli_query($mysqli, $get_customer);
	
	while($row_customer = mysqli_fetch_array($run_customer)){

		$customer_id = $row_customer['customer_id'];
		$customer_username = $row_customer['customer_username'];
		$customer_email = $row_customer['customer_email'];
	}
	
}

if(isset($_GET['course_id'])){
	$course_id = $_GET['course_id'];
	$get_course = "select * from course join course_customer on course.course_id = course_customer.course_id join review on review.review_id = course_customer.review_id where course.course_id = '$course_id' and course_customer.customer_id = $customer_id";
	$run_course = mysqli_query($mysqli, $get_course);
	
	while($row_customer_courses = mysqli_fetch_array($run_course)){

		$course_id = $row_customer_courses['course_id'];
		$course_image = $row_customer_courses['course_image'];
		$course_title = $row_customer_courses['course_title'];
		$course_desc = $row_customer_courses['course_desc'];
		$customer_rate = $row_customer_courses['rating'];
		$course_review = $row_customer_courses['reviews'];
	}
	
}


?>

<html lang="en" >
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
    	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="bootstrap-rating-input.min.js"></script>
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

<div class="text-center content" style="margin-top:100px;">
  <h2><strong>Your Review</strong></h2><br>
  
 <form action = "" method ="post"  enctype = "multipart/form-data">
<table class= "table-responsive" align ="center" width ="1000" border="2" bgColor = "cornsilk">
<tr>
			<script type="text/javascript">
					!function(a){"use strict";function b(a){return"[data-value"+(a?"="+a:"")+"]"}function c(a,b,c){var d=c.activeIcon,e=c.inactiveIcon;a.removeClass(b?e:d).addClass(b?d:e)}function d(b,c){var d=a.extend({},i,b.data(),c);return d.inline=""===d.inline||d.inline,d.readonly=""===d.readonly||d.readonly,d.clearable===!1?d.clearableLabel="":d.clearableLabel=d.clearable,d.clearable=""===d.clearable||d.clearable,d}function e(b,c){if(c.inline)var d=a('<span class="rating-input"></span>');else var d=a('<div class="rating-input"></div>');d.addClass(b.attr("class")),d.removeClass("rating");for(var e=c.min;e<=c.max;e++)d.append('<i class="'+c.iconLib+'" data-value="'+e+'"></i>');return c.clearable&&!c.readonly&&d.append("&nbsp;").append('<a class="'+f+'"><i class="'+c.iconLib+" "+c.clearableIcon+'"/>'+c.clearableLabel+"</a>"),d}var f="rating-clear",g="."+f,h="hidden",i={min:1,max:5,"empty-value":0,iconLib:"fa",activeIcon:"fa-star",inactiveIcon:"fa-star-o",clearable:!1,clearableIcon:"fa-times",clearableRemain:!1,inline:!1,readonly:!1},j=function(a,b){var c=this.$input=a;this.options=d(c,b);var f=this.$el=e(c,this.options);c.addClass(h).before(f),c.attr("type","hidden"),this.highlight(c.val())};j.VERSION="0.4.0",j.DEFAULTS=i,j.prototype={clear:function(){this.setValue(this.options["empty-value"])},setValue:function(a){this.highlight(a),this.updateInput(a)},highlight:function(a,d){var e=this.options,f=this.$el;if(a>=this.options.min&&a<=this.options.max){var i=f.find(b(a));c(i.prevAll("i").addBack(),!0,e),c(i.nextAll("i"),!1,e)}else c(f.find(b()),!1,e);d||(this.options.clearableRemain?f.find(g).removeClass(h):a&&a!=this.options["empty-value"]?f.find(g).removeClass(h):f.find(g).addClass(h))},updateInput:function(a){var b=this.$input;b.val()!=a&&b.val(a).change()}};var k=a.fn.rating=function(c){return this.filter("input[type=number]").each(function(){var d=a(this),e="object"==typeof c&&c||{},f=new j(d,e);f.options.readonly||f.$el.on("mouseenter",b(),function(){f.highlight(a(this).data("value"),!0)}).on("mouseleave",b(),function(){f.highlight(d.val(),!0)}).on("click",b(),function(){f.setValue(a(this).data("value"))}).on("click",g,function(){f.clear()})})};k.Constructor=j,a(function(){a("input.rating[type=number]").each(function(){a(this).rating()})})}(jQuery);
					</script>
<?php




echo"<div class='row' style='border:1px solid #b5abab; margin:2% 10% 0 10%;'>
				<img src='admin/course_images/$course_image' class='course-img col-lg-3' style='height: 150px;width:200px'>
				<div class='course-desc col-lg-8'>
				<a href=''>
				  <h5 class='course-title'><strong><a style='color: black' href='CourseDetail.php?course_id=$course_id'>$course_title</a></strong><span class='badge badge-secondary'></span></h5>
				</a>
				<p>$course_desc</p>
				  <div class='course-rate'>
					<input type='number' name='your_awesome_parameter' id='rating' class='rating' value=$customer_rate data-inline/> 
				  </div>
					<form action=''>

					<textarea name='test'>$course_review</textarea>

					</form>

				 </div>
</div>
<div style='margin-top:4%'>

<button name='update' class='btn'>Update</button>
<button class='btn' name='cancel' style='margin-left:5%'>Cancel</button>

</div>
";

if(isset($_POST['cancel'])){
	echo "<script>window.open('profilePage.php','_self')</script>";
}



?>
</tr>
<?php

global $mysqli;
if(isset($_POST['update'])){
	$new_review = $_POST['test'];
	$new_rating = $_POST['your_awesome_parameter'];
	echo "<script language=JavaScript> 
					    alert('Review updated successfully!');
					  </script>";
	$update_review = "update review set reviews = '$new_review', rating = $new_rating where review_id = (select review_id from course_customer where customer_id = $customer_id and course_id = $course_id)";
	$run_update = mysqli_query($mysqli, $update_review);
	echo "<script language=JavaScript> 
					    window.open('profilePage.php', '_self');
					  </script>";

}

?>
</table>
 </form>

</div>



<?php include("footer.php") ?>
</body>

</html>
