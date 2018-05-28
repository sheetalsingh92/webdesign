
  
      <form method ="post" enctype = "multipart/data" id = "loginModal" class = "modal fade" role = "dialog"> <!-- Log in Modal Window -->
        <div class = "modal-dialog">
      
          <div class = "modal-content">
            <div class = "modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Login - We Collaborate</h4>        
            </div>
      
            <div class="modal-body">
              <span>Enter your Username : <input ng-model="user.username" type = "text" placeholder = "Name" class="form-control" id = "name25" /></span>
              
              <span>Enter your password : <input ng-model="user.password" type = "password" class="form-control" id = "password25" /></span>
              
            </div>
        
            <div class="modal-footer">
              <button ng-click="login(user)" type = "submit" class = "btn btn-primary" id= "loginInButton">Login</button>
              <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </form> <!-- end of log in Modal -->
    
<nav class="navbar-expand-lg navbar navbar-dark bg-inverse fixed-top"> 
        <a class="navbar-brand" href="index.php">WeCollaborate</a>       
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false" aria-controls="navcollapse" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> 
        </button>
        <div class="collapse navbar-collapse" id="myNavbar">
		  <ul class="navbar-nav mr-auto">
			<li class="nav-item dropdown">
				<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<?php getCategory(); ?>
			</ul>
			</li>
			<li>
					<div id ="form" class="input-group">
						<form method="get" action="results.php" enctype="multipart/form-data">
              <div class="input-group">
            <input type="text" class="form-control" name="user_query" placeholder="Search Courses" style="width: 400px;">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit" name="search">
              <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </div>   
              </form> 
					</div>
			</li>

      <div class="navbar-collapse" id="myNavbar1">                  
          <ul class="nav navbar-nav navbar-right">
        <li ng-show="showCurrentUser"><a href="#">
          <span
          ng-show="showCurrent" class="glyphicon glyphicon-user"></span>
          <?php
              if(isset($_SESSION['customer_email'])){
              echo "<a href='profilePage.php'><b> Welcome:</b>" . $_SESSION['customer_email']."</a>";
              }

              else{

              echo "<b>Welcome Guest!</b>";

            }

              ?></li>

               <?php
              if(!isset($_SESSION['customer_email'])){
           echo "<li ng-hide='showCurrentUser'><a href='customer_signup.php'></span> Sign Up</a></li>";
         }
         else{
          echo "";
         }
         ?>

            <?php cart(); ?>
            <li><a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart(<b><?php total_items(); ?></b>)</a> </li>
            <li>
              <?php
              if(!isset($_SESSION['customer_email'])){
              echo "<a href = 'checkout.php'>Login</a>";

            }

            else{
            echo "<a href= 'logout.php'>Logout</a>";
          }
              ?>
           
            </li>
          </ul>

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
        echo "<script>alert('The email is invalid!')</script>";
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

  echo "<script>window.open('profilePage.php', '_self')</script>";


}


}
}



    ?>

    </nav>


