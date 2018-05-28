<!DOCTYPE>

<?php
session_start();
include("functions/functions.php");

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
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" ng-controller="mainController">
<?php

include("header.php");

?>

<?php


global $mysqli;

if(isset($_POST['register'])){

  $ip = getIp();
  $c_name = $_POST['c_name'];
  $c_password = $_POST['c_password'];
  $c_email = $_POST['c_email'];
  $c_username = $_POST['c_username'];
  $customer_image = $_FILES['customer_image']['name'];
  $customer_image_tmp = $_FILES['customer_image']['tmp_name'];

 if (empty($_FILES['customer_image']['tmp_name'])) {
     $customer_image = 'customer'.rand(1,4).'.jpg';
    echo "<script>alert('$customer_image')</script>";
 }
 else{
    move_uploaded_file($customer_image_tmp, "customer/customer_images/$customer_image");
 }

  

  $insert_c = "insert into customer (customer_ip, customer_name, customer_password, customer_email, customer_username, customer_image) values('$ip', '$c_name',
  '$c_password', '$c_email', '$c_username', '$customer_image')";

 //echo $insert_c;

$run_c = mysqli_query($mysqli, $insert_c);

$sel_cart = "select * from cart where ip_add = '$ip'";

$run_cart = mysqli_query($mysqli, $sel_cart);

$check_cart = mysqli_num_rows($run_cart);

if($check_cart == 0){

  $_SESSION['customer_email'] = $c_email;

  echo "<script>alert('Account has been created successfully!')</script>";

  echo "<script>window.open('customer/my_account.php', '_self')</script>";


}

else{


  $_SESSION['customer_email'] = $c_email;

  echo "<script>alert('Account has been created successfully!')</script>";

  echo "<script>window.open('checkout.php', '_self')</script>";

}

}


    ?>

    </nav>

<div class="text-center headcontainer row" id="#kkk">
<div class="col-xl-6 col-lg-6 col-md-4 col-sm-4 col-12 containerword text-center" width="50%">
  <br><h2><strong>Learning Management System You'll Love</strong></h2>
  <p class="intro"><em>An easy to set up and use learning management system that will fulfill all your corporate training needs.</em></p>
  

<div >
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                    <div class="panel-heading heading" role="tab" id="headingOne">
                      <h5 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                         Enroll To A Number Of Courses
                        </a>
                      </h5>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                      <div class="panel-body">
                        You can register to a variety of courses from major categories ranging from software development to music. Add the courses to your favorite list and access the courses from your
                        profile.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading heading" role="tab" id="headingTwo">
                      <h5 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Unlimited Access
                        </a>
                      </h5>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                      <div class="panel-body">
                        Courses, or any portion of a course, can be retaken or reviewed a limitless number of times without additional cost. This access ensures that users have every opportunity to master the material regardless of their personal schedules or interruptions.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading heading" role="tab" id="headingThree">
                      <h5 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Learn Anywhere
                        </a>
                      </h5>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                      <div class="panel-body">
                        Upon enrollment, users have instant access to the courses they have chosen,and can access the courses from mobile phones, laptops, and tablets. 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  <br>
</div>
<div class="col-xl-6 col-lg-6 col-md-8 col-sm-8 col-12 containerimage" width="50%">
                            <div class="slider-area">

                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="3000">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                            

                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner img-rounded" role="listbox">

                                        <div class="carousel-item active">
                                            <img src="images/image3.jpg" alt="">
                                        </div>

                                        <div class="carousel-item">
                                            <img src="images/image4.jpg" alt="">
                                        </div>

                                        <div class="carousel-item">
                                            <img src="images/image5.jpg" alt="">
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
</div>

<div>
<div class="container-fluid bg-3 text-center d-none d-lg-block" id="jumbo">  
<div class="jumbotron">  
  <div class="row">
  	     
    <div class="col-sm-4 offset-sm-0">
        <div class="section3">
            <span> <img src="images/icon1.svg" class="img-responsive" alt="Image" width="12%" height="7%" style="opacity: 0.8">
            <p>Learn Online</p></span>
             </div>
    </div>
      
    <div class="col-sm-4 offset-sm-0">
        <div class="section3">
            <span><img src="images/icon2.png" class="img-responsive" alt="Image" width="12%" height="7%" style="opacity: 0.8">
            <p>Interact with other students</p></span></div>
    </div>
    
      <div class="col-sm-4 offset-sm-0">
        <div class="section3">
            <span><img src="images/icon3.ico" class="img-responsive" alt="Image" width="12%" height="7%" style="opacity: 0.8">
            <p>Fully Responsive</p></span>
		</div>
    </div>
	</div>
  </div>
</div>
</div>

<div class="text-center content" style="margin-top:40px">
  <h2><strong>POPULAR COURSES</strong></h2><br>
  <div class="row">
 <?php
   getCourses()
   ?> 
   <?php getCatCourses();?>
</div>
</div>




<div class="text-center" style="margin-top:40px">
  <h2><strong>POPULAR CATEGORIES</strong></h2><br>
  <div class="row">
  <div class="col-xs-12 col-sm-3">
    <div class="rounded-circle">
      <a href='index.php?cat=5'><img src="images/managementIcon.jpeg" alt="Math" width="50%"></a>
      <p><strong>Management</strong></p><br>
    </div>
  </div>
  <div class="col-xs-12 col-sm-3">
    <div class="rounded-circle">
      <a href = 'index.php?cat=1'><img src="images/webIcon.png" alt="Web Development" width="50%"></a>
      <p><strong>Web Development</strong></p><br>
    </div>
  </div>
  <div class="col-xs-12 col-sm-3">
    <div class="rounded-circle">
      <a href='index.php?cat=2'><img src="images/musicIcon.png" alt="Music" width="50%"></a>
      <p><strong>Music</strong></p><br>
    </div>
  </div>
  <div class="col-12 col-sm-3">
    <div class="rounded-circle">
      <a href='index.php?cat=3'><img src="images/artIcon.jpeg" alt="Statistics" width="50%"></a>
      <p><strong>Art</strong></p><br>
    </div>
  </div>
</div>
</div>

<div class="text-center" style="margin-top:40px; margin-bottom:30px">
  <h2><strong>OUR TEAM MEMBERS</strong></h2><br>
	<div class="row">
                  <div class="container-fluid project-bg">
                     <div class="row text-center">
                           <div class="col-md-3 col-sm-6 col-12 col-lg-3">
                              <div class="team-member">
                                 <img class="rounded-circle" src="images/member1.jpeg" alt="">
                                 <h5>Jhansi Kambalapally</h5>
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-12 col-lg-3">
                              <div class="team-member">
                                 <img class="rounded-circle" src="images/member2.jpeg" alt="">
                                 <h5>Sheetal Singh</h5>
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-12 col-lg-3">
                              <div class="team-member">
                                 <img class="rounded-circle" src="images/member1.jpeg" alt="">
                                 <h5>Zhan Zhang</h5>
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-6 col-12 col-lg-3">
                              <div class="team-member">
                                 <img class="rounded-circle" src="images/member2.jpeg" alt="">
                                 <h5>Menglu Zhu</h5>
                              </div>
                           </div>
                    </div>
				</div>
				</div>
			</div>

<?php

include("footer.php");

?>

	
</body>

</html>