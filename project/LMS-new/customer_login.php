<?php

include("includes/db.php");
?>


<form method ="post" enctype = "multipart/data" > <!-- Log in Modal Window -->
        <div class = "modal-dialog">
      
          <div class = "modal-content">
            <div class = "modal-header">
              <h4 class="modal-title">Login - We Collaborate</h4>        
            </div>
        
            <div class="modal-body">
              
              <span>Enter your email: <input type = "email" class="form-control" id = "email"  name = "email" required="true" /></span>

              <span>Enter your password : <input type = "password" class="form-control" id = "password" name = "pass" required="true" /></span>

              
              
            </div>
        
            <div class="modal-footer">
              <button ng-click="login(user)" type = "submit" class = "btn btn-primary" id= "loginInButton" name = "login" >Login</button>
              <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>

        <h2><i class="fa fa-user-circle" aria-hidden="true"></i><a href='customer_signup.php' data-toggle="modal" href="#signUpModal"> New? Register Here</a></h2>
      </form> <!-- end of login -->

<?php

if(isset($_POST['login'])){

  $c_email = $_POST['email'];
  $c_pass = $_POST['pass'];

  $sel_c = "select * from customer where customer_password = '$c_pass' and customer_email = '$c_email'";

  $run_c = mysqli_query($mysqli, $sel_c);

  $check_customer = mysqli_num_rows($run_c);

  if($check_customer == 0){

    echo "<script>alert('PASSWORD OR EMAIL IS INCORRECT!')</script>";
    exit();
  }

  $ip = getIp();

  $sel_cart = "select * from cart where ip_add = '$ip'";

$run_cart = mysqli_query($mysqli, $sel_cart);

$check_cart = mysqli_num_rows($run_cart);

if($check_customer > 0 AND $check_cart == 0){


  $_SESSION['customer_email'] = $c_email;

  echo "<script>alert('You logged in  successfully!')</script>";

  echo "<script>window.open('profilePage.php', '_self')</script>";


}

else{

  $_SESSION['customer_email'] = $c_email;

  echo "<script>alert('You logged in successfully!')</script>";

  echo "<script>window.open('checkout.php', '_self')</script>";


}


}
?>






