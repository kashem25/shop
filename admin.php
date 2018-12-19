<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
	<style type="text/css">
		.student{
			background-color: #FF8A65;
            height: 176px;
            margin:20px; 
		}
		.employee{
			background-color: #00A2E8;
			height: 176px;
			margin: 20px;

		}
		.class{
			background-color: #3F48CC;
			height: 176px;
			margin: 20px
		}

	</style>
  	
	
</head>
<body>
	<header class="cd-main-header">
		<a href="#0" class="cd-logo"><img src="img/cd-logo.svg" alt="Logo"></a>
		
		<div class="cd-search is-hidden">
			<form action="#0">
				<input type="search" placeholder="Search...">
			</form>
		</div> <!-- cd-search -->

		

		<nav class="cd-nav">
			<ul class="cd-top-nav">
				
				<li class="has-children account">
					<a href="#0">
						<img src="img/cd-avatar.png" alt="avatar">
						Account
					</a>

					<ul>

						<li><a href="#0">My Account</a></li>
						<li><a href="#0">Edit Account</a></li>
						<li><a href="#0">Logout</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header> <!-- .cd-main-header -->

	<main class="cd-main-content">
		<nav class="cd-side-nav">
			<ul>
				<li class="cd-label">Main</li>
				<li class="has-children overview">
					<a href="#0">View User</a>
					
					<ul>
						<li><a href="#0">All Data</a></li>
						<li><a href="#0">Student </a></li>
						<li><a href="#0">Employee</a></li>
					</ul>
				</li>
				<li class="has-children notifications active">
					<a href="#0">Email<span class="count">3</span></a>
					
					<ul>
						<li><a href="#0">All Email</a></li>
						<li><a href="#0">Employe's Email</a></li>
						<li><a href="#0">Other's Email</a></li>
					</ul>
				</li>

			

				<li class="has-children users">
					<a>Add People</a>
					
					<ul>
						<li> <a href='?action=addstudent'>Add Student</a></li>
						<li><a href='?action=addemployee'>Add Employee</a></li>
						<li><a href='?action=addclass'>Add Class</a></li>
						<li><a href='?action=addclass'>Add Section</a></li>
					</ul>
				</li>
				<li class="has-children">
					<a href="#0">View Amount</a>
					
					<ul>
						<li><a href="#0">Collected Amount</a></li>
						<li><a href="#0">Due Amount</a></li>
						<li><a href="#0">Overview</a></li>
					</ul>
				</li>
			</ul>


		</nav>
		<?php
         $action=$_REQUEST['action'];
         if($action=='home'){   
		 ?>
		 <div class="content-wrapper">
			<div class="row">
				<div class="col-md-4 student" >
					Total Student
				</div>
				<div class="col-md-4 employee">
					Total Employee
				</div>
				<div class="col-md-4 class">
					Total Class
				</div>

			</div>
		</div> <!-- .content-wrapper -->
	</main> <!-- .cd-main-content -->
    <?php
     } else if($action=='addstudent'){

    ?>
    <div class="content-wrapper">
			<div class="row">
				<div class="col-md-6">
					<form action="" method="post" >
						<label>First Name</label>

					</form>
				</div>

			</div>
		</div> <!-- .content-wrapper -->
		<?php }?>
<script src="js/jquery-2.1.4.js"></script>
<script src="js/jquery.menu-aim.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>