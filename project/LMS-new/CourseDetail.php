<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include("functions/functions.php");

?>

<head>
  <title>Homepage_sample</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<script src="https://use.fontawesome.com/1e6a9a1261.js"></script>
  	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<link href="coursedetail_format.css" rel="stylesheet"/>
	<link href="plugins.css" rel="stylesheet"/>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="bootstrap-rating-input.min.js"></script>

<script type="text/javascript">
    $(function ()    {
        $('<div>').dialog({
            modal: true,
            open: function ()
            {
                $(this).load('CourseDetail.php');
            },         
            height: 400,
            width: 400,
            title: 'Dynamically Loaded Page'
        });
    });
</script>

<style>
.panel-heading a{
  background-color: #f4a945;
}
.panel-heading a:hover{
  background-color: #f4a945;
}

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
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<script>
window.onscroll = function() {
				scrollFunction();
				sidescrollFunction();
				};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

function sidescrollFunction() {
	var distanceToTop = document.documentElement.scrollTop || document.body.scrollTop;
	var visibleHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight; 
    
	if (distanceToTop >= document.getElementById("instruction").clientHeight) {
		document.getElementById("sideBar").style.top = "80px";
        document.getElementById("sideBar").style.position = "fixed";
    } 
	else {
		document.getElementById("sideBar").style.position = "relative";
		document.getElementById("sideBar").style.top = "0px";
        document.getElementById("sideBar").style.display = "block";
    }
	
	if(distanceToTop >= document.documentElement.scrollHeight -visibleHeight -document.getElementById("footer").clientHeight){
		document.getElementById("sideBar").style.position = "relative";
		document.getElementById("sideBar").style.display = "block";
	}
}


var app = angular.module("myShoppingList", []); 
app.controller("myCtrl", function($scope,$http) {
	$http.post("get.php",{'course_id':document.getElementById("course_id").value}).then(function (response) {
        $scope.reviews = response.data.records;
    });
	
	$scope.addItem = function () {
		if(!document.getElementById("customer_username").value==''){
			var review = {
					customer_id: document.getElementById("customer_id").value,
					customer_username: document.getElementById("customer_username").value,
					reviews: $scope.addMe,
					rating: document.getElementById("rate").value,
			};

			var len = $scope.reviews.length;
			var exist = true;
			for (var i = 0; i < len; i++) {
				if ($scope.reviews[i].customer_id === document.getElementById("customer_id").value) {
					exist = false;
					alert("You have already reviewed this course. Please edit your review.");
					break;
				}
				
				if (document.getElementById("rate").value == 0){
					exist = false;
					alert("You must give a rating to your review.");
					break;
				}
			}
			if (exist){
				$scope.reviews.push(review);
				$http.post("post.php",{'customer_id':document.getElementById("customer_id").value,'rating':document.getElementById("rate").value,'reviews':$scope.addMe,'course_id':document.getElementById("course_id").value})
			.success(function(){
				alert("saufhauhsnfdiahfouhesnfknsa");
			});
			}
			
			
		}else{
			alert("you are not login");
		}
    }
	
	$scope.emptyText = function () {
		document.getElementById("reviewTextArea").value="";
		document.getElementById("rate").style = "data-clearable:'remove'";
	}
    
});

</script>

<?php

include("header.php");

?>

<div style="margin-top:60px;margin-bottom:10px">

	<?php
	
		global $mysqli;

	if(isset($_GET['course_id'])){

	$course_id = $_GET['course_id'];

	$get_courses = "select * from course join category on category.cat_id = course.course_cat where course_id = '$course_id'";

	$run_courses = mysqli_query($mysqli, $get_courses);

	while($row_courses = mysqli_fetch_array($run_courses)){
		
		$course_id = $row_courses['course_id'];
	 	$cat_title = $row_courses['cat_title'];
		$cat_id = $row_courses['cat_id'];
	 	$course_title = $row_courses['course_title'];
		$course_price = $row_courses['course_price'];
		$course_image= $row_courses['course_image'];
		$course_video = $row_courses['course_video'];
		$course_desc = $row_courses['course_desc'];
		$course_rate = $row_courses['course_rate'];
		$course_instructor = $row_courses['instructor'];
		
		echo "<p><a href='index.php?cat=$cat_id'>$cat_title</a> > $course_title ></p>";
		
		}
	}
	?>
</div>

<div id="instruction" class="headcontainer row" id="#kkk">
<script type="text/javascript">
					!function(a){"use strict";function b(a){return"[data-value"+(a?"="+a:"")+"]"}function c(a,b,c){var d=c.activeIcon,e=c.inactiveIcon;a.removeClass(b?e:d).addClass(b?d:e)}function d(b,c){var d=a.extend({},i,b.data(),c);return d.inline=""===d.inline||d.inline,d.readonly=""===d.readonly||d.readonly,d.clearable===!1?d.clearableLabel="":d.clearableLabel=d.clearable,d.clearable=""===d.clearable||d.clearable,d}function e(b,c){if(c.inline)var d=a('<span class="rating-input"></span>');else var d=a('<div class="rating-input"></div>');d.addClass(b.attr("class")),d.removeClass("rating");for(var e=c.min;e<=c.max;e++)d.append('<i class="'+c.iconLib+'" data-value="'+e+'"></i>');return c.clearable&&!c.readonly&&d.append("&nbsp;").append('<a class="'+f+'"><i class="'+c.iconLib+" "+c.clearableIcon+'"/>'+c.clearableLabel+"</a>"),d}var f="rating-clear",g="."+f,h="hidden",i={min:1,max:5,"empty-value":0,iconLib:"fa",activeIcon:"fa-star",inactiveIcon:"fa-star-o",clearable:!1,clearableIcon:"fa-times",clearableRemain:!1,inline:!1,readonly:!1},j=function(a,b){var c=this.$input=a;this.options=d(c,b);var f=this.$el=e(c,this.options);c.addClass(h).before(f),c.attr("type","hidden"),this.highlight(c.val())};j.VERSION="0.4.0",j.DEFAULTS=i,j.prototype={clear:function(){this.setValue(this.options["empty-value"])},setValue:function(a){this.highlight(a),this.updateInput(a)},highlight:function(a,d){var e=this.options,f=this.$el;if(a>=this.options.min&&a<=this.options.max){var i=f.find(b(a));c(i.prevAll("i").addBack(),!0,e),c(i.nextAll("i"),!1,e)}else c(f.find(b()),!1,e);d||(this.options.clearableRemain?f.find(g).removeClass(h):a&&a!=this.options["empty-value"]?f.find(g).removeClass(h):f.find(g).addClass(h))},updateInput:function(a){var b=this.$input;b.val()!=a&&b.val(a).change()}};var k=a.fn.rating=function(c){return this.filter("input[type=number]").each(function(){var d=a(this),e="object"==typeof c&&c||{},f=new j(d,e);f.options.readonly||f.$el.on("mouseenter",b(),function(){f.highlight(a(this).data("value"),!0)}).on("mouseleave",b(),function(){f.highlight(d.val(),!0)}).on("click",b(),function(){f.setValue(a(this).data("value"))}).on("click",g,function(){f.clear()})})};k.Constructor=j,a(function(){a("input.rating[type=number]").each(function(){a(this).rating()})})}(jQuery);
					</script>
<?php 



		echo "
		<div class='col-xl-6 col-lg-6 col-md-8 col-sm-8 col-12 containerword text-center' width='50%'>
<img src='admin/course_images/$course_image' width ='400' height = '300'/>
</div>
<div class='col-xl-6 col-lg-6 col-md-4 col-sm-4 col-12 containerword' width='50%''>
	<h2><strong>$course_title</strong></h2>
	<p>Instructor: $course_instructor</p>
	<p>
		<input type='number' name='your_awesome_parameter' id='rating' class='rating' value=$course_rate data-readonly data-inline/>
		<span> | </span>
		<span><i class='fa fa-graduation-cap' style='color:orange' aria-hidden='true'></i> 23,000</span>
		<span> | </span>
		<span><i class='fa fa-language' style='color:orange' aria-hidden='true'></i> English</span>
	</p>
	<input id='course_id' style='display:none' value=$course_id>
	<p>Become a master at using Logic Pro X. Learn how to produce music and record & edit audio to a professional standard.</p>
	<hr>
	<a href ='index.php?add_cart=$course_id'><button type='button' class='btn btn-secondary btn-lg btn-block'>Enroll Now</button></a>
  <br>



</div>";

	?>

</div>

<div class="row container">
<main class="col-sm-10 col-md-10 col-lg-10"><div class="rc-Header bt3-row align-horizontal-center" data-reactid="88">
	<div id="description" class="content">
        <h2>Description</h2>
		<hr>
		<p>Hi! Welcome to the Web Developer Bootcamp, the <strong>only course you need to learn web development. <span></span></strong>There are a lot of options for online developer training, but this course is without a doubt the most comprehensive and effective on the market.  Here's why:</p><ul><li>This is the only online course taught by a professional bootcamp instructor.</li><li><strong>94% of my bootcamp students go on to get full-time developer jobs</strong>. Most of them are complete beginners when I start working with them.</li><li>The previous 2 bootcamp programs that I taught cost <strong>$14,000 and $21,000</strong>.  This course is just as comprehensive but with brand new content for a fraction of the price.</li><li>Everything I cover is up-to-date and relevant to today's developer industry.<strong> No PHP or other dated technologies. This course does not cut any corners.</strong></li><li>This is the only complete beginner full-stack developer course that covers NodeJS.</li><li>We build 13+ projects, including a <strong>gigantic production application </strong>called YelpCamp. No other course walks you through the creation of such a substantial application.</li><li>The course is <strong>constantly updated</strong> with new content, projects, and modules.  Think of it as a subscription to a never-ending supply of developer training.</li><li>You get to meet my dog Rusty!</li></ul><p>When you're learning to program you often have to sacrifice learning the exciting and current technologies in favor of the "beginner friendly" classes.  With this course, you get the best of both worlds.  This is a course designed for the complete beginner, yet it covers some of the most exciting and relevant topics in the industry.</p><p>Throughout the course we cover tons of tools and technologies including:</p><ul><li><span><strong>HTML5</strong></span></li><li><span><strong>CSS3</strong></span></li><li><span><strong>JavaScript</strong></span></li><li><span><strong>Bootstrap</strong></span></li><li>SemanticUI</li><li>DOM Manipulation</li><li><span><strong>jQuery</strong></span></li><li>Unix(Command Line) Commands</li><li><span><strong>NodeJS</strong></span></li><li>NPM</li><li><span><strong>ExpressJS</strong></span></li><li>REST</li><li><span><strong>MongoDB</strong></span></li><li>Database Associations</li><li><span><strong>Authentication</strong></span></li><li>PassportJS</li><li>Authorization</li></ul><p>This course is also unique in the way that it is structured and presented. Many online courses are just a long series of "watch as I code" videos.  This course is different. I've incorporated everything I learned in my years of teaching to make this course not only more effective but more engaging. The course includes:<br></p><ul><li>Lectures</li><li>Code-Alongs</li><li>Projects</li><li>Exercises</li><li>Research Assignments</li><li>Slides</li><li>Downloads</li><li>Readings</li><li>Too many pictures of my dog Rusty</li></ul><p>If you have any questions, please don't hesitate to contact me.  I got into this industry because I love working with people and helping students learn.  Sign up today and see how fun, exciting, and rewarding web development can be!</p>
		<div class="audience" data-purpose="course-audience">
            <div class="audience__title">
                Who is the target audience?
            </div>
            <ul class="audience__list">
                <li>This course is for anyone who wants to learn about web development, regardless of previous experience</li>
                <li>It's perfect for complete beginners with zero experience</li>
                <li>It's also great for anyone who does have some experience in a few of the technologies(like HTML and CSS) but not all</li>
                <li>If you want to take ONE COURSE to learn everything you need to know about web development, take this course</li>
            </ul>
        </div>
    </div>
	
	<div id="curriculum" class="content">
		<h2>Course Curriculum</h2>
		<hr>
		<table border=1 class="curriculumtable">
			<tr>
				<td colspan="3">&nbsp;
				<i class="fa fa-plus-square-o dropdown" aria-hidden="true" data-toggle="collapse" data-target=".test" aria-expanded="false" aria-controls=".test"></i>
				&nbsp;&nbsp;Course Introduction</td>
				<td >2 Lectures</td>
				<td>07:01</td>
			</tr>
			<tr class="dropDownTextArea collapse test">
				<td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-video-camera" aria-hidden="true"></i>&nbsp;&nbsp;Introduction</td>
				<td>02:44</td>
			</tr>
			<tr class="dropDownTextArea collapse test">
				<td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-video-camera" aria-hidden="true"></i>&nbsp;&nbsp;Building a Song In Under 120 Seconds</td>
				<td>04:04</td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;
				<i class="fa fa-plus-square-o dropdown" aria-hidden="true" data-toggle="collapse" data-target=".test2" aria-expanded="false" aria-controls=".test2"></i>
				&nbsp;&nbsp;Introduction to Logic Pro X</td>
				<td >6 Lectures</td>
				<td>16:46</td>
			</tr>
			<tr class="dropDownTextArea collapse test2">
				<td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-video-camera" aria-hidden="true"></i>
				&nbsp;&nbsp;Introduction to 'Interface and Basics'</td>
				<td>02:00</td>
			</tr>
			<tr class="dropDownTextArea collapse test2">
				<td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-video-camera" aria-hidden="true"></i>
				&nbsp;&nbsp;What is a DAW?</td>
				<td>02:28</td>
			</tr>
			<tr class="dropDownTextArea collapse test2">
				<td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-video-camera" aria-hidden="true"></i>
				&nbsp;&nbsp;Why Logic Pro?</td>
				<td>02:00</td>
			</tr>
			<tr class="dropDownTextArea collapse test2">
				<td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-video-camera" aria-hidden="true"></i>
				&nbsp;&nbsp;Creating a Project</td>
				<td>02:00</td>
			</tr>
			<tr class="dropDownTextArea collapse test2">
				<td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-video-camera" aria-hidden="true"></i>
				&nbsp;&nbsp;Understanding The Interface</td>
				<td>02:00</td>
			</tr>
			<tr class="dropDownTextArea collapse test2">
				<td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-video-camera" aria-hidden="true"></i>
				&nbsp;&nbsp;Understand Channels</td>
				<td>02:00</td>
			</tr>
		</table>
	</div>
	
	<div id="instructor" class="content">
		<h2>About the Instructor</h2>
		<hr>
		<div class="row">
			<div width="50%" class="col-md-3 col-lg-3">
				<img src="team/member1.jpeg">
				<div style="text-align:center">
					<p>Rob Mayzes</p>
					<p>Musician & Entrepreneur</p>
				</div>
			</div>
			<div width="50%" class="col-md-9 col-lg-9">
			- Professional mixer and musician. Founder of Musician on a Mission, an online learning resource for musicians and home recordists with over 25,000 subscribers.

- Successful entrepreneur and co-founder of Sweet Marketing, a global social media management agency.

I worked in a range of studios in London thorough my teenage years and early twenties, both as an professional engineer and musician...

But then my interests shifted to building businesses, and eventually teaching!

So, now I want to help YOU to achieve your biggest music and business goals. Let's do this :)
			</div>
		</div>
	</div>
			
			
	<div id="feedback" class="content">
		<h2>Student Feedback</h2>
		<hr>
		<div ng-app="myShoppingList" class="ng-cloak" ng-controller="myCtrl">
			
<?php 

	//global $mysqli;

//if(isset($_GET['course_id'])){

	//$course_id = $_GET['course_id'];

	//$get_courses = "select course_rate from course where course_id = '$course_id'";

	//$run_courses = mysqli_query($mysqli, $get_courses);

	//while($row_courses = mysqli_fetch_array($run_courses)){
		//$course_rate = $row_courses['course_rate'];
		echo "
		<div class='row'>
			<div width='50%' class='col-md-6 col-lg-6'>
			<h4>Total Rating</h4>
			</div>
			<div width='50%' class='col-md-6 col-lg-6'>
			<input type='number' name='your_awesome_parameter' id='rating-readonly' class='rating' value=$course_rate data-readonly data-inline/>
			</div>
		</div>
		";
	//}

	$get_review_counts = "SELECT count(*) FROM `review` join course_customer on review.review_id = course_customer.review_id WHERE course_customer.course_id = '$course_id'";
	$run_review_counts = mysqli_query($mysqli, $get_review_counts);
	$course_review_count = mysqli_fetch_array($run_review_counts)['count(*)'];
	echo"
		<hr>
		<div class='row'>
			<div width='50%' class='col-md-6 col-lg-6'>
			<h4>Reviews</h4>
			</div>
			<div width='50%' class='col-md-6 col-lg-6'>
			<p>$course_review_count Comments&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
			</div>
		</div>";
//}
?>
				
			
			<hr>
			<p id="student_review"><strong>Student Review</strong></p>

			<div>
				<div ng-repeat="x in reviews">
					<hr>
					<table>
					<tr>
						<td colspan="2">{{x.reviews}}</td>
					</tr>
					<tr>
						<td><i class="fa fa-user-circle" aria-hidden="true"></i>&emsp;{{x.customer_username}}</td>
						<td><input type="number" name="your_awesome_parameter" id="rating-readonly" class="rating" data-clearable="remove" value={{x.rating}} data-readonly/></td>
					<script type="text/javascript">
					!function(a){"use strict";function b(a){return"[data-value"+(a?"="+a:"")+"]"}function c(a,b,c){var d=c.activeIcon,e=c.inactiveIcon;a.removeClass(b?e:d).addClass(b?d:e)}function d(b,c){var d=a.extend({},i,b.data(),c);return d.inline=""===d.inline||d.inline,d.readonly=""===d.readonly||d.readonly,d.clearable===!1?d.clearableLabel="":d.clearableLabel=d.clearable,d.clearable=""===d.clearable||d.clearable,d}function e(b,c){if(c.inline)var d=a('<span class="rating-input"></span>');else var d=a('<div class="rating-input"></div>');d.addClass(b.attr("class")),d.removeClass("rating");for(var e=c.min;e<=c.max;e++)d.append('<i class="'+c.iconLib+'" data-value="'+e+'"></i>');return c.clearable&&!c.readonly&&d.append("&nbsp;").append('<a class="'+f+'"><i class="'+c.iconLib+" "+c.clearableIcon+'"/>'+c.clearableLabel+"</a>"),d}var f="rating-clear",g="."+f,h="hidden",i={min:1,max:5,"empty-value":0,iconLib:"fa",activeIcon:"fa-star",inactiveIcon:"fa-star-o",clearable:!1,clearableIcon:"fa-times",clearableRemain:!1,inline:!1,readonly:!1},j=function(a,b){var c=this.$input=a;this.options=d(c,b);var f=this.$el=e(c,this.options);c.addClass(h).before(f),c.attr("type","hidden"),this.highlight(c.val())};j.VERSION="0.4.0",j.DEFAULTS=i,j.prototype={clear:function(){this.setValue(this.options["empty-value"])},setValue:function(a){this.highlight(a),this.updateInput(a)},highlight:function(a,d){var e=this.options,f=this.$el;if(a>=this.options.min&&a<=this.options.max){var i=f.find(b(a));c(i.prevAll("i").addBack(),!0,e),c(i.nextAll("i"),!1,e)}else c(f.find(b()),!1,e);d||(this.options.clearableRemain?f.find(g).removeClass(h):a&&a!=this.options["empty-value"]?f.find(g).removeClass(h):f.find(g).addClass(h))},updateInput:function(a){var b=this.$input;b.val()!=a&&b.val(a).change()}};var k=a.fn.rating=function(c){return this.filter("input[type=number]").each(function(){var d=a(this),e="object"==typeof c&&c||{},f=new j(d,e);f.options.readonly||f.$el.on("mouseenter",b(),function(){f.highlight(a(this).data("value"),!0)}).on("mouseleave",b(),function(){f.highlight(d.val(),!0)}).on("click",b(),function(){f.setValue(a(this).data("value"))}).on("click",g,function(){f.clear()})})};k.Constructor=j,a(function(){a("input.rating[type=number]").each(function(){a(this).rating()})})}(jQuery);
					</script>
					</tr>
					</table>
				</div>
				<hr>
				<div id="review">
					<div class="form-group">
					<?php
						//global $mysqli;
						
						if(isset($_SESSION['customer_email'])){
							$customer_email = $_SESSION['customer_email'];
							$get_customer = "select * from customer where customer_email = '$customer_email'";
							$run_customer = mysqli_query($mysqli, $get_customer);
							
							while($row_customer = mysqli_fetch_array($run_customer)){

								$customer_id = $row_customer['customer_id'];
								$customer_username = $row_customer['customer_username'];
								$customer_email = $row_customer['customer_email'];
							
							echo "
							<p><i class='fa fa-user-circle' aria-hidden='true'></i>&nbsp;&nbsp;
							<input id='customer_username' style='border:0px' readonly='readonly' value=$customer_username>
							<input id='customer_id' style='display:none;border:0px' readonly='readonly' value=$customer_id></p>
							";
							}
							
						}else{
							echo"
							<p><i class='fa fa-user-circle' aria-hidden='true'></i>&nbsp;&nbsp;
							<input id='customer_username' style='display:none;' value=''> Welcome Guest</p>
							";
						}

					?>
						
						<p>My rating: <input type="number" name="your_awesome_parameter" id="rate" class="rating" data-clearable="remove" data-inline ng-model="addrate"></p>
						<textarea class="form-control" id="reviewTextArea" rows="5" placeholder="Please enter your review here" ng-model="addMe"></textarea>
					</div>
						<div >
							<button class="btn btn-secondary" ng-click="addItem()">
							Submit
							</button>
							<button class="btn btn-secondary" ng-click="emptyText()">
							Cancel
							</button>
						</div>
				</div>
			</div>
		</div>	
		
		
		
		
		
		
		
	</div>	
		
</main>

<section class="d-none d-md-block col-sm-2 col-md-2 col-lg-2">
	<div id="sideBar" class="card" style="width: 250px; ">
		<div class="inner-container" >
			<div class="list-group">
				<a href="#description" class="list-group-item list-group-item-action">Description</a>
				<a href="#curriculum" class="list-group-item list-group-item-action">Courses Curriculum</a>
				<a href="#instructor" class="list-group-item list-group-item-action">About Instructor</a>
				<a href="#feedback" class="list-group-item list-group-item-action">Student Feedback</a>
				<a href="#student_review" class="list-group-item list-group-item-action" style="display:none">Student review</a>
			</div>
			<div class="enroll-button-container" style="background-color:#F7F7F7">
				<div class="enroll-button-inner bgcolor-white text-center" >
					
					<?php
				echo	"<a href ='index.php?add_cart=$course_id'><button name='enroll_now' class='btn btn-secondary btn-lg btn-block'>
					Enroll Now
					</button></a>";
					?>
				</div>
			</div>
		</div>
	</div>
</section>
</div>


<?php
include('footer.php'); ?>
</body>
</html>