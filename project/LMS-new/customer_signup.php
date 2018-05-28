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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
include('header.php');
?>

<div class="text-center content" style="margin-top:40px; margin-left: 35%;">
  <div class="row">
  <?php 
include('signup.php');
?>
  </div>
</div>


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

 if (!preg_match("/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/",$c_email)) {
        $emailErr = " *Email is invalid"; 
        // echo "<script>alert('The email is invalid!')</script>";
      }
      else{

 if (empty($_FILES['customer_image']['tmp_name'])) {
     $customer_image = 'customer'.rand(1,4).'.jpg';
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
}



    ?>
<?php include("footer.php");?>
</body>

</html>