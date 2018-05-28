<?php
session_start();
include("functions/functions.php");
global $mysqli;

 $ip = getIp();  

$data = json_decode(file_get_contents("php://input"));
 
  $c_name = $data->name;
  $c_password = $data->password;
  $c_email = $data ->emailID;
  $c_username = $data->username;
  // $customer_image = $_FILES['customer_image']['name'];
  // $customer_image_tmp = $_FILES['customer_image']['tmp_name'];


    $customer_image = 'customer'.rand(1,4).'.jpg';




//  move_uploaded_file($customer_image_tmp, "customer/customer_images/$customer_image");

  $insert_c = "INSERT INTO customer (customer_ip, customer_name, customer_password, customer_email, customer_username, customer_image) values('".$ip."', '".$c_name."',
  '".$c_password."', '".$c_email."', '".$c_username."', '".$customer_image."')";


  $check_email = "select * from customer where customer_email = '".$c_email."'";
  $run_email = mysqli_query($mysqli, $check_email);
  $email_num = mysqli_num_rows($run_email);
  if($email_num != 0){
      echo "<script type = 'text/javascript'>alert('The email already exits!');</script>";
    echo "<script>window.open('index.php', '_self')</script>";
    exit();
  }
  else{

    $run_c = mysqli_query($mysqli, $insert_c);

    $sel_cart = "select * from cart where ip_add = '$ip'";

    $run_cart = mysqli_query($mysqli, $sel_cart);

    $check_cart = mysqli_num_rows($run_cart);

   
    $_SESSION['customer_email'] = $c_email;

   



}

    ?>