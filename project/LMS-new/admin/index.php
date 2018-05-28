<!DOCTYPE>
<html>
	
<head>
	<title>Admin Page</title>
	<link href = "styles/style.css" rel = "stylesheet" media = "all"/>
</head>

<body>
	<div class = "main_wrapper">
		<div id = "header">

			<div id = "right">
				
				<h2 style = "text-align:center;">Manage Content</h2>

				<a href = "index.php?insert_courses">Insert Courses</a>
				<a href = "index.php?view_courses">View all Courses</a>
				<a href = "index.php?insert_cat">Insert New Category</a>
				<a href = "index.php?view_cats">View All Categories</a>
				<a href = "index.php?view_customers">View Customers</a>
				<a href = "index.php?view_orders">View Orders</a>
				<a href = "index.php?view_payments">View Payments</a>
				<a href = "logout.php">Admin Logout</a>


			</div>

			<div id = "left">
				<?php
				if (isset($_GET['insert_courses'])){
					include("insert_courses.php");
				}

				if (isset($_GET['view_courses'])){
					include("view_courses.php");
				}

				if (isset($_GET['edit_courses'])){
					include("edit_courses.php");
				}



				?>

			</div>

		</div>


	</div>


</body>

</html>