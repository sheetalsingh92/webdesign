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
		$customer_password = $row_customer['customer_password'];
        $customer_img = $row_customer['customer_image'];
	}
	
}else{
	include("customer_login.php");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Profile_sample</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/1e6a9a1261.js"></script>
  <link href="homepage_format.css" rel="stylesheet"/>
  <link href="search.css" rel="stylesheet"/>

  
  	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="bootstrap-rating-input.min.js"></script>
</head>

<style>
    .inputClass{
        width: 100%;
        margin-bottom: 2%;
        height: 40px;
    }
    .borderBottom{
         border-bottom:1px solid #b5abab;
    }

    #myPage{
        padding-top:50px;
    }
</style>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
<?php include("header.php") ?>
<div class="row" style="border:1px solid #b5abab; margin:2% 10% 0 10%;">


    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3" style="border-right:1px solid #b5abab; text-align:center;">
        <?php
        echo "<img src='customer_images/$customer_img' width='150' height='150' style='margin-top:20px'>";
        echo "<h3 style='margin-top:10px'>$customer_username</h3>";
        ?>
        <a href="#accountDetails" id="accountDetailsA">Account</a><br>
        <a href="#myCourses" id="myCoursesA">My Courses</a>

    </div>

    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9"  style=" padding:0;">

        <div id="accountDetails">
            <div style="text-align:center; margin-top:2%;">
                <h5>Account</h5>
                <span>Edit your account settings and change your password here</span>
            </div>
            <hr class="borderBottom">
            <div style="margin:1% 10% 0 10%;">
                <span>
                    Username:
                    <input type="text" value="<?php echo $customer_username;?>" name="" id="" class="inputClass" readonly>
                    Email:
                    <input type="text" value="<?php echo $customer_email;?>" name="" id="" class="inputClass" readonly><span class="error"><?php echo $emailErr;?></span>
                </span>
            </div>
            <form method ="post">
            <hr class="borderBottom">
            <div style="margin:1% 10% 0 10%;">
                <span class="inputClass">
                    Current Password:
                    <input type="text" placeholder="Enter Current Password" name="currentPassword" id="currentPassword" class="inputClass" required>
                    New Password:
                    <input type="text" placeholder="Enter New Password" name="newPassword" id="newPassword" class="inputClass" required>
                    Retype New Password:
                    <input type="text" placeholder="Re-type New Password" name="reNewPassword" id="reNewPassword" class="inputClass" required>
                </span>
            </div>
            <hr class="borderBottom">
            <div style="margin:1% 10% 3% 10%; text-align:center;">
                <input type="submit" name="change_pass" class="btn" on-click="" value="Change Password">
            </div>
            </form>
        </div>

        <?php
        if(isset($_POST['change_pass'])){
            $current_pass = $_POST['currentPassword'];
            $new_pass = $_POST['newPassword'];
            $new_pass_again = $_POST['reNewPassword'];

            if($new_pass != $new_pass_again){
                echo "<script>alert('Two new passwords are not the same!')</script>";
                exit();
            }
            else if($customer_password != $current_pass){
                echo "<script>alert('Your current password is wrong')</script>";
                exit();
            }
            else{
                $update_pass = "update customer set customer_password = '$new_pass' where customer_email = '$customer_email'";
                $run_update = mysqli_query($mysqli, $update_pass);
                echo "<script>alert('password is updated successfully')</script>";
                echo "<script>window.open('profilePage.php','_self')</script>";
            }
        }
        ?>


        <div class="text-center content" id="myCourses" style="margin-top:2%;">
            <h5>My Courses</h5><br>
            <div class="row">
			<script type="text/javascript">
					!function(a){"use strict";function b(a){return"[data-value"+(a?"="+a:"")+"]"}function c(a,b,c){var d=c.activeIcon,e=c.inactiveIcon;a.removeClass(b?e:d).addClass(b?d:e)}function d(b,c){var d=a.extend({},i,b.data(),c);return d.inline=""===d.inline||d.inline,d.readonly=""===d.readonly||d.readonly,d.clearable===!1?d.clearableLabel="":d.clearableLabel=d.clearable,d.clearable=""===d.clearable||d.clearable,d}function e(b,c){if(c.inline)var d=a('<span class="rating-input"></span>');else var d=a('<div class="rating-input"></div>');d.addClass(b.attr("class")),d.removeClass("rating");for(var e=c.min;e<=c.max;e++)d.append('<i class="'+c.iconLib+'" data-value="'+e+'"></i>');return c.clearable&&!c.readonly&&d.append("&nbsp;").append('<a class="'+f+'"><i class="'+c.iconLib+" "+c.clearableIcon+'"/>'+c.clearableLabel+"</a>"),d}var f="rating-clear",g="."+f,h="hidden",i={min:1,max:5,"empty-value":0,iconLib:"fa",activeIcon:"fa-star",inactiveIcon:"fa-star-o",clearable:!1,clearableIcon:"fa-times",clearableRemain:!1,inline:!1,readonly:!1},j=function(a,b){var c=this.$input=a;this.options=d(c,b);var f=this.$el=e(c,this.options);c.addClass(h).before(f),c.attr("type","hidden"),this.highlight(c.val())};j.VERSION="0.4.0",j.DEFAULTS=i,j.prototype={clear:function(){this.setValue(this.options["empty-value"])},setValue:function(a){this.highlight(a),this.updateInput(a)},highlight:function(a,d){var e=this.options,f=this.$el;if(a>=this.options.min&&a<=this.options.max){var i=f.find(b(a));c(i.prevAll("i").addBack(),!0,e),c(i.nextAll("i"),!1,e)}else c(f.find(b()),!1,e);d||(this.options.clearableRemain?f.find(g).removeClass(h):a&&a!=this.options["empty-value"]?f.find(g).removeClass(h):f.find(g).addClass(h))},updateInput:function(a){var b=this.$input;b.val()!=a&&b.val(a).change()}};var k=a.fn.rating=function(c){return this.filter("input[type=number]").each(function(){var d=a(this),e="object"==typeof c&&c||{},f=new j(d,e);f.options.readonly||f.$el.on("mouseenter",b(),function(){f.highlight(a(this).data("value"),!0)}).on("mouseleave",b(),function(){f.highlight(d.val(),!0)}).on("click",b(),function(){f.setValue(a(this).data("value"))}).on("click",g,function(){f.clear()})})};k.Constructor=j,a(function(){a("input.rating[type=number]").each(function(){a(this).rating()})})}(jQuery);
					</script>
                <?php
					
					if(isset($_SESSION['customer_email'])){
		global $mysqli;
		$customer_email = $_SESSION['customer_email'];
		$get_customer = "select * from customer where customer_email = '$customer_email'";
		$run_customer = mysqli_query($mysqli, $get_customer);
		
		while($row_customer = mysqli_fetch_array($run_customer)){

			$customer_id = $row_customer['customer_id'];
			$customer_username = $row_customer['customer_username'];
			$customer_email = $row_customer['customer_email'];
			$customer_password = $row_customer['customer_password'];
		}
		

		$get_customer_courses = "SELECT * FROM `customer` join course_customer on customer.customer_id = course_customer.customer_id join course on course.course_id = course_customer.course_id WHERE customer.customer_email ='$customer_email'";
			$run_customer_courses = mysqli_query($mysqli, $get_customer_courses);
			
			while($row_customer_courses = mysqli_fetch_array($run_customer_courses)){
				$course_id = $row_customer_courses['course_id'];
				$course_image = $row_customer_courses['course_image'];
				$course_title = $row_customer_courses['course_title'];
				$course_desc = $row_customer_courses['course_desc'];
				$course_rate = $row_customer_courses['course_rate'];
				$course_review_id = $row_customer_courses['review_id'];
                $course_instructor = $row_customer_courses['instructor'];
				
				$get_review_counts = "SELECT count(*) FROM `review` join course_customer on review.review_id = course_customer.review_id WHERE course_customer.course_id = '$course_id'";
				$run_review_counts = mysqli_query($mysqli, $get_review_counts);
				$course_review_count = mysqli_fetch_array($run_review_counts)['count(*)'];

				echo "
				<div class='row border search-course'>
				<img src='admin/course_images/$course_image' class='course-img col-lg-3' style='height: 150px; width:200px'>
				<div class='course-desc col-lg-8'>
				<a href=''>
				  <h5 class='course-title'><strong><a style='color: black' href='CourseDetail.php?course_id=$course_id'>$course_title</a></strong><span class='badge badge-secondary'></span></h5>
				</a>
				<a href='' class='instructor'>$course_instructor</a>
				<p>$course_desc</p>
				  <div class='course-rate'>
					<p>
					<input type='number' name='your_awesome_parameter' id='rating' class='rating' value=$course_rate data-readonly data-inline/> 
					$course_rate ($course_review_count ratings)
					
					</p>
				  </div>
				  ";
				  if($course_review_id==null){
				   echo "<a class='btn' href='CourseDetail.php?course_id=$course_id#student_review'>write review</a>";
				  }else{
					  echo "<a class='btn' href ='update.php?course_id=$course_id'>update review</a>";
				  }
				echo"
				</div>
			  </div>
				";
			}
		}
					
				?> 
            </div>
        </div>
    
    </div>
</div>

<?php include("footer.php") ?>



<script>
    $(document).ready(function(){
        $("#myCourses").hide();
        $("#accountDetailsA").click(function(){
            $("#accountDetails").show();
            $("#profileDetails").hide();
            $("#myCourses").hide();
        });
        $("#myCoursesA").click(function(){
            $("#accountDetails").hide();
            $("#profileDetails").hide();
            $("#myCourses").show();
        });
    });
</script>



</body>

</html>