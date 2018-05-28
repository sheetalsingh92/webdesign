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
.collapsed{
  display: none;
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
  <h2><strong>My Cart</strong></h2><br>
  
<form action = "" method ="post"  enctype = "multipart/form-data">
<table class= "table-responsive" align ="center" width ="800" border="2" bgColor = "cornsilk">

<tr>
  <th width="5%"></th>
  <th width="30%" style="text-align: center">Course Title</th>
  <th width="30%" style="text-align: center">Course Image</th>
  <th width="10%" style="text-align: center">Price</th>
</tr>

<?php
$total = 0;
 global $mysqli;
 $ip = getIp();
 $sel_price = "select * from cart where ip_add = '$ip'";
 $run_price = mysqli_query($mysqli, $sel_price);
 while($c_price = mysqli_fetch_array($run_price)){
  $course_id = $c_price['course_id'];
  $c_price = "select * from course where course_id = '$course_id'";
  $run_course_price = mysqli_query($mysqli, $c_price);
  while($cc_price = mysqli_fetch_array($run_course_price)){
    //$course_price = array($cc_price['course_price']);
    $course_title = $cc_price['course_title'];
    $course_image = $cc_price['course_image'];
    $single_price = $cc_price['course_price'];
    

    $sub_total_price = $single_price;
    $course_price = array($sub_total_price);
    $values = array_sum($course_price);

    $total += $values;
?>

<tr align = "center">
  <td> <input type = "checkbox" name = "remove[]" value = "<?php echo $course_id; ?>" /><input type="hidden" name = "product_adjust_id[]" value = "<?php echo $course_id; ?>" /></td>
  <td> <?php echo $course_title ?> <br/></td>
  <td><img src = "admin/course_images/<?php echo $course_image;?>" width = "160" height = "100" /></td>
  <?php
   $ip = getIp();

  if((isset($_POST['update_cart'])) AND $_POST['remove'] == "")
    {

      $i = 0;

      $new_qty = $_POST['qty'];
      foreach($_POST['product_adjust_id'] as $pro_adj_id){
          $new_qty = $_POST['qty'][$i];
           $update_qty = "update cart set qty = '$new_qty' where ip_add = '$ip' and course_id = '$pro_adj_id'";
          $run_qty = mysqli_query($mysqli, $update_qty);
          ++$i;
      }

      echo "<script>window.location.href = window.location.href</script>";
     
    
    }

  ?>

  <td><?php echo "$" . $single_price ?></td>

  </tr>
<?php   } } ?>

  <tr align = "right" style="height: 30px;">
    <td colspan="4"> <b>Sub Total: </b><?php echo "$" . $total; ?></td>
  </tr>
  </table>

  <div style="margin-top: 40px">
   <input type = "submit" name = "update_cart" value = "Remove Selected" class="btn"></td>
   <input type ="submit" name="continue" value = "Continue Shopping" class="btn" style="margin-left: 3%"></td>
   <input type="submit" name="checkout" value="Checkout" class="btn" style="margin-left: 3%"></td>
  </div>
  </form>


 <?php

global $mysqli;

$ip = getIp();


if(isset($_POST['checkout'])){
  if(isset($_SESSION['customer_email'])){
    
    $customer_email = $_SESSION['customer_email'];
    $get_customer = "select * from customer where customer_email = '$customer_email'";
    $run_customer = mysqli_query($mysqli, $get_customer);
    $customer_id = mysqli_fetch_array($run_customer)['customer_id'];
    
    $update_cart = "update cart set customer_id = $customer_id";
    mysqli_query($mysqli, $update_cart);
    
    $get_cart_course = "select * from cart";
    $run_get_cart_course = mysqli_query($mysqli, $get_cart_course);
    while($row_get_cart_course = mysqli_fetch_array($run_get_cart_course)){
      $cart_course_id = $row_get_cart_course['course_id'];
    
      $add_mycourse = "insert into course_customer (course_id,customer_id) values ($cart_course_id,$customer_id)";
      mysqli_query($mysqli, $add_mycourse);
      
      $delete_cart_course = "DELETE FROM cart WHERE customer_id=$customer_id";
      mysqli_query($mysqli, $delete_cart_course);
    }
    echo "<script language=JavaScript> 
        location.replace(location.href);
          window.open('profilePage.php', '_self');
        </script>";
    
  }else{
    echo "<script language=JavaScript> 
          window.open('checkout.php', '_self');
        </script>";
  }
}
   

if(isset($_POST['update_cart'])){
  foreach($_POST['remove'] as $remove_id){
    $delete_course = "delete from cart where course_id = '$remove_id' AND ip_add = '$ip'";
    $run_delete = mysqli_query($mysqli, $delete_course);
    if($run_delete){
      echo "<script>window.open('cart.php', '_self')</script>";
    }
  }
}

if(isset($_POST['continue'])){
  echo "<script>window.open('index.php', '_self')</script>";
}
?>

</div>



<?php include("footer.php") ?>
</body>

</html>