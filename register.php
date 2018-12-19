<?PHP
  ini_set('mysqli_connect_timeout',300);
  ini_set('default_socket_timeout',300);

?>


<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/npm.js"></script>
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
<?php
//for save class
include("connection.php");
if(isset($_POST['saveClassbtn']))
{
  $name=$_POST['classname'];
  $sql="INSERT INTO CLASSES(name) VALUES('$name') ";
  $stmt=mysqli_query($con,$sql);

}
//Delete class
if(isset($_POST['deleteClassbtn']))
{
   $id=$_POST['classid'];
    $deletesql="DELETE FROM CLASSES WHERE id='$id'";
    $stmt=mysqli_query($con,$deletesql);
}
//save section
if(isset($_POST['saveSection']))
{
      $class=$_POST['classname'];
      $section=$_POST['sectionname'];
      $sql="INSERT INTO sections(name,classid) VALUES('$section','$class')";
      $stmt=mysqli_query($con,$sql);
}
//Delete Section 
if(isset($_POST['deleteSectionbtn']))
{
	$id=$_POST['sectionid'];
	$deletesql="DELETE FROM sections WHERE id='$id'";
    $stmt=mysqli_query($con,$deletesql);

}
//Save course
if(isset($_POST['saveSubject']))
{
	$subject=$_POST['subjectname'];
	$class=$_POST['classname'];
	$sql="INSERT INTO subjects (name,classid) VALUES ('$subject','$class')";
	$stmt=mysqli_query($con,$sql);


}
//Delete Subject
if(isset($_POST['deleteSubject']))
{
$id=$_POST['subjectid'];
	$deletesql="DELETE FROM subjects WHERE id='$id'";
    $stmt=mysqli_query($con,$deletesql);
}
//add student
if(isset($_POST['savestudent']))
{
   $firstname=$_POST['firstname'];
   $lastname=$_POST['lastname'];
   $class=$_POST['studentclass'];
   $section=$_POST['sectionname'];
   $gender=$_POST['gender'];
   $dateofbirth=$_POST['dateofbirth'];
   $accedemicyear=$_POST['accedemicyear'];
   $joiningdate=$_POST['joiningdate'];
   $mothername=$_POST['mothername'];
   $fathername=$_POST['fathername'];
   $fathercontact=$_POST['fathercontact'];
   $mothercontact=$_POST['mothercontact'];
   $fatheroccupation=$_POST['fatheroccupation'];
   $motheroccupation=$_POST['motheroccupation'];
   $guardianname=$_POST['guardianname'];
   $guardiancontact=$_POST['guardiancontact'];
   $target="img/".basename($_FILES['image']['name']);
   $image=$_FILES['image']['name'];
     $bloodgroup=$_POST['bloodgroup'];
     $religion=$_POST['religion'];
     $mothertounge=$_POST['mothertounge'];
     $nationality=$_POST['nationality'];
     $presentaddress=$_POST['presentaddress'];
     $permenantaddress=$_POST['permenantaddress'];
     $rollno=0;
     $i=0;
     $sql="SELECT * FROM students WHERE sectionid='$section'";
     $stmt=mysqli_query($con,$sql);
     while($row=mysqli_fetch_array($stmt))
         {
           $i++;

         }
         $rollno=$i+1;;
         $msg="";
     $sql="INSERT INTO students( first_name, last_name, date_of_birth, gender, accedemicyear, joining_date, blood_group, religion, nationality, mother_tounge, present_address, permenant_address, father_name, father_contact, mother_name, mother_contact, father_occupation, mother_occupation, guardian_name, guardian_contact, image, classid, sectionid, roll_no) VALUES('$firstname','$lastname','$dateofbirth','$gender','$accedemicyear','$joiningdate','$bloodgroup','$religion','$nationality','$mothertounge','$presentaddress','$permenantaddress','$fathername', '$fathercontact','$mothername','$mothercontact','$fatheroccupation','$motheroccupation','$guardianname','$guardiancontact','$image','$class','$section','$rollno')";
     $stmt=mysqli_query($con,$sql); 
     if($stmt)
     {
     	echo "<script type='text/javascript'>
     	          alert('Save successfully');

     	</script>";
     } 
     if(move_uploaded_file($_FILES ['image']['tmp_name'],$target))
     {
     	$msg="image Upload successfully";
     }
     else
     {
     	$msg="image upload fail";
     }


 }  
 ///Add Notice------------------------------------------------------
 if(isset($_POST['postnotice']))
 {
 	$notice=$_POST['noticebody'];
 	$sql="INSERT INTO notices(notice) VALUES('$notice')";
 	$stmt=mysqli_query($con,$sql);
 	

 }
 //Delete Notice-----------------------------------------------
 if(isset($_POST['deleteNotice']))
 {
 	$id=$_POST['noticeid'];
 	$deletesql="DELETE FROM notices WHERE id='$id'";
    $stmt=mysqli_query($con,$deletesql);

 }







?>



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
						<li><a href="#0">Admin's Email</a></li>
					</ul>
				</li>

			

				<li class="has-children users">
					<a>Add People</a>
					
					<ul>
						<li> <a href='?action=addstudent'>Add Student</a></li>
						<li><a href='?action=addclass'>Add Class</a></li>
						<li><a href='?action=addsection'>Add Section</a></li>
						<li><a href='?action=addsubject'>Add Subject</a></li>
					</ul>
				</li>
				
				<li class="has-children">
					<a href="#0">Course Allocation</a>
					
					<ul>
						<li><a href='?action=scheduletime'>Schedule Time</a></li>
						<li><a href=href='?action=selectcourse'>Select Teacher</a></li>
						
					</ul>
				</li>
				<li class="has-children">
					<a >Notice</a>
					
					<ul>
						<li><a href='?action=addnotice'>Add Notice</a></li>
						<li><a href='?action=viewnotice'>View Notice</a></li>
						
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
    <!---addd student section-->
    <div class="content-wrapper">
     <!--##############Add Student###3#####-->
			<div class="row">
			<h3>Admit new student</h3>
			<hr>
				<div class="col-md-12">
					<form action="" method="post" enctype="multipart/form-data" >

					  <div class="form-group">
					  	<div class="col-md-2">
					  		<label>Accedemic Year</label>
					  	</div>
					  	<div class="col-md-4">
					  		<input type="text" name="accedemicyear" class="form-control" placeholder="Session">
					  	</div>
					  	<label class="col-md-2">Joining Date</label>
					  	<div class="col-md-4">
					  		<input type="Date" name="joiningdate" class="form-control">
					  	</div>
					  </div>
				
					  <div class="row">
					  	<div class="col-md-12" style="margin-top: 5px;">
					  		<div class="form-group">
					  	    <label class="col-md-2">Class</label>
					    	<div class="col-md-4">
					  		<select class="classname form-control" name="studentclass" id="studentclass" onchange="getsection(this.value);" >
					  		               <option value=""  
					  		               ><--Select Class--></option>
											<?php 
											//Add Class for student dropdown
				 							  include("connection.php"); 
				  							 $sql="SELECT * FROM CLASSES";
                   							 $stmt=mysqli_query($con,$sql);
                   							 $num_row=mysqli_num_rows($stmt);
                    							$i=0;
 
                    							if($num_row)
                    							 {
       				  							 while($row=mysqli_fetch_array($stmt))
      												{
      												?>
      										<option value="<?php echo $row['id']; ?>" >
      											<?php echo $row['name']; ?>
      										</option>	

      										  <?php
                    								 }
                  								 }


												?>									
							
				        	</select>
					  	    </div>
					  	    </div>
					  	    <div class="form-group">
					  	    <label class="col-md-2 control-label">Section</label>
					  	    <div class="col-md-4">
					  	    	<select name="sectionname" id="sectionname" class="sectionname form-control">
										<option selected="selected">--Select State--</option>
										</select>
										
					  	    </div>
					     </div>

					  	</div>
					  </div>
					  <hr>
					  <div class="row">
					  	<div class="col-md-12" style="margin-top: 20px;">
					  		<div class="form-group"><label class="col-md-2">First Name</label>
					  		<div class="col-md-4"><input type="text" name="firstname" class="form-control"></div>
					  		</div>
					  	
					  	<div class="form-group">
					  		<label class="col-md-2">Last Name</label>
					  		<div class="col-md-4">
					  			<input type="text" name="lastname" class="form-control">
					  		</div>
					  	</div>
					  	</div>
					  </div>
					
					  <div class="row">
					  	<div class="col-md-12" style="margin-top: 20px;">
					  		<div class="form-group" >
					  			<label class="col-md-2">Date of Birth</label>
					  			<div class="col-md-4"><input type="Date" name="dateofbirth" class="form-control"></div>
					  		</div>
					  		<label class="col-md-2">Gender</label>
					  		<div class="col-md-4">
					  			<input type="radio" name="gender" value="Male">Male
					  			<input type="radio" name="gender" value="Female">Female
					  		</div>
					  	</div>
					  </div>

					  <div class="row">
					  	<div class="col-md-12" style="margin-top: 20px;">
					  	  <div class="form-group">
					  		<label class="col-md-2">Blood Group</label>
					  		<div class="col-md-4">
					  			<select class="form-control" name="bloodgroup">
					  				<option value=""><--Select Blood Group--></option>
					  				<option value="A+">A+</option>
					  				<option value="A-">A-</option>
					  				<option value="B+">B+</option>
					  				<option value="B-">B-</option>
					  				<option value="O+">O+</option>
					  			</select>
					  		</div>
					  		<div class="form-group">
					  			<label class="col-md-2">Religion</label>
					  			<div class="col-md-4">
					  				<input type="text" name="religion" class="form-control">
					  			</div>
					  		</div>

					  		 </div>
					  	</div>
					  </div>
					  <hr>
					  <div class="row">
					  	<div class="col-md-12" style="margin-top: 20px;">
					  		<div class="form-group">
					  		   <label class="col-md-2">Nationality</label> 
					  		   <div class="col-md-4">
					  		   	<input type="text" name="nationality" class="form-control">
					  		   </div>

					  		 </div>
					  		 <div class="form-group">
					  		 	<label class="col-md-2">Mother Tounge</label>
					  		 	<div class="col-md-4">
					  		 		<input type="text" name="mothertounge" class="form-control">
					  		 	</div>
					  		 </div>
					  	</div>
					  </div>
					  <div class="row">
					  	<div class="col-md-12" style="margin-top: 20px;">
					  		<div class="form-group">
					  			<label class="col-md-2">Present Address</label>
					  			<div class="col-md-4"><textarea rows="3" name="presentaddress" class="form-control"></textarea></div>
					  		</div>
					  		<div class="form-group">
					  			<label class="col-md-2">Permanent Address</label>
					  			<div class="col-md-4"><textarea rows="3" name="permenantaddress" class="form-control"></textarea></div>
					  		</div>
					  	</div>
					  </div>
					  <hr>
					  <div class="row">
					  	<div class="col-md-12" style="margin-top: 20px;"> 
					  	    <div class="form-group">
					  	    	<label class="col-md-2">Father's Name</label>
					  	    	<div class="col-md-4">
					  	    		<input type="text" name="fathername" class="form-control">
					  	    	</div>
					  	    </div>
					  	    <div class="form-group">
					  	    	<label class="col-md-2">Contact</label>
					  	    	<div class="col-md-4"><input type="text" name="fathercontact" class="form-control"></div>
					  	    </div>

					  	</div>
					  </div>
					  <div class="row">
					  	<div class="col-md-12" style="margin-top: 20px;">
					  		<div class="form-group">
					  			<label class="col-md-2">Mother's Name</label>
					  		<div class="col-md-4"><input type="text" name="mothername" class="form-control"></div>
					  		</div>
					  		<div class="form-group">
					  			<label class="col-md-2">Contact</label>
					  			<div class="col-md-4"><input type="text" name="mothercontact" class="form-control"></div>
					  		</div>
					  	</div>

					  </div>
					  <div class="row">
					  	<div class="col-md-12" style="margin-top: 20px;">
					  		<div class="form-group">
					  			<label class="col-md-2">Father's Occupation</label>
					  			<div class="col-md-4">
					  				<input type="text" name="fatheroccupation" class="form-control">
					  			</div>
					  		</div>
					  		<div class="form-group">
					  			<label class="col-md-2">Mother's Occupation</label>
					  			<div class="col-md-4">
					  				<input type="text" name="motheroccupation" class="form-control">
					  			</div>
					  		</div>
					  	</div>
					  </div>
					  <hr>
					  <div class="row">
					  	<div class="col-md-12" style="margin-top: 20px;">
					  		<div class="form-group">
					  			<label class="col-md-2">Guardian Name</label>
					  			<div class="col-md-4">
					  				<input type="text" name="guardianname" class="form-control">
					  			</div>
					  		</div>
					  		<div class="form-group">
					  			<label class="col-md-2">Contact</label>
					  			<div class="col-md-4">
					  				<input type="text" name="guardiancontact" class="form-control">
					  			</div>
					  		</div>
					  	</div>
					  </div>
					  <div class="row">
					  	<div class="col-md-12" style="margin-top: 20px;">
					  		<div class="form-group">
					  			<label class="col-md-2">Image</label>
					  			<div class="col-md-4">
					  				<input type="file" name="image" >
					  			</div>
					  		</div>
					  		
					  	</div>
					  </div>
					   <div class="row">
					  	<div class="col-md-12" style="margin-top: 20px;">
					  		<div class="form-group">
					  			
					  			<div class=" col-md-offset-4 col-md-4">
					  				<button name="savestudent" class="btn btn-success" value="Upload"><span class="glyphicon glyphicon-plus">Save</span></button>
					  			</div>
					  		</div>
					  		
					  	</div>
					  </div>



					</form>
				</div>

			</div>
		</div> <!-- .content-wrapper -->
		<?php } else if($action=='addclass'){ ?>
		<!--#####################add class#################3#####-->
		 <div class="content-wrapper">
		 <h3>Add Class</h3>
			<div class="row">
				<div class="col-md-12">
					<form action="" method="post" name="saveClassform">
					
						<div class="form-group">
						<label class="col-sm-1">Name</label>
						<div class="col-sm-6">
							<input type="text" name="classname" class="form-control" >
						</div>
						<div class="col-sm-1">
							<button class="btn btn-primary" name="saveClassbtn">Save</button>
						</div>
						</div>
					</form>
				</div>
				<div class="row" ">
				<div class="col-md-12" style="margin-top: 20px;">
			    <table class="table" >
					<tr >
                   	<td>#</td>
                   	<td>Name</td>
                   	<td>Remove</td>
                   </tr>
				<?php 
				   include("connection.php"); 
				   $sql="SELECT * FROM CLASSES";
                    $stmt=mysqli_query($con,$sql);
                    $num_row=mysqli_num_rows($stmt);
                    $i=0;
 
                    if($num_row)
                     {
       				   while($row=mysqli_fetch_array($stmt))
      					 {
         					 $i++;
        
                            ?>
                           <tr>
                           	<td class="active"><?php echo $i; ?></td>
                           	<td class="success"> <?php echo $row['name']; ?> </td>
                           	<td class="warning"> <form method="post" action="">
                           		<input type="hidden" name="classid" value="<?php echo $row['id'] ?>">
                           		<button name="deleteClassbtn" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Remove</button>
                           	</form> </td>
                           </tr>



                     <?php
                     }
                   }


				?>

					</table>
				</div>
			</div>

			</div>

		</div>
		<?php } else if($action=='addsection'){?>

		<!--##################Section add##############3-->
		 <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12">
					<form action="" method="post">
				        <div class="form-group">
				        	<label class="col-md-1">Section</label>
				        	<div class="col-md-4">
				        		<input type="text" name="sectionname" class="form-control"
				        		>
				        	</div>
				        	<div class="form-group">
				        		<label class="col-md-1">
				        			Course
				        		</label>
				        		<div class="col-md-4">
				        			<select class="form-control" name="classname" >
											<?php 
				 							  include("connection.php"); 
				  							 $sql="SELECT * FROM CLASSES";
                   							 $stmt=mysqli_query($con,$sql);
                   							 $num_row=mysqli_num_rows($stmt);
                    							$i=0;
 
                    							if($num_row)
                    							 {
       				  							 while($row=mysqli_fetch_array($stmt))
      												{
      												?>
      										<option value="<?php echo $row['id']; ?>" >
      											<?php echo $row['name']; ?>
      										</option>	

      										  <?php
                    								 }
                  								 }


												?>									
							
				        			</select>

				        		</div>

				        	</div>
				        	<div class="form-group">
				        		<div class="col-md-1"><button name="saveSection" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Save</button></div>
				        	</div>
				        </div>
					</form>
				</div>
				<div class="row">
					<div class="col-md-12" style="margin-top: 20px;">
						<table class="table">
						<tr >
                   	<td>#</td>
                   	<td>Section</td>
                   	<td>Class</td>
                   	<td>Remove</td>
                   </tr>
							
							<?php 
				   include("connection.php"); 
				   $sql = "SELECT s.id, s.name AS sectionname,c.name AS classname FROM sections AS s LEFT OUTER JOIN classes AS c ON s.classid=c.id";
                    $stmt=mysqli_query($con,$sql);
                    $num_row=mysqli_num_rows($stmt);
                    $i=0;
 
                    if($num_row)
                     {
       				   while($row=mysqli_fetch_array($stmt))
      					 {
         					 $i++;
        
                            ?>

                              
                           <tr>
                           	<td class="active"><?php echo $i; ?></td>
                           	<td class="success"> <?php echo $row['sectionname']; ?> </td>
                           	<td class="active"><?php echo $row['classname']; ?></td>
                           	<td class="warning"> <form method="post" action="">
                           		<input type="hidden" name="sectionid" value="<?php echo $row['id'] ?>">
                           		<button name="deleteSectionbtn" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Remove</button>
                           	</form> </td>
                           </tr>



                     <?php
                     }
                   }


				?>
						</table>
					</div>
				</div>

			</div>
		</div>
		<!--************Add subject*************************-->
		<?php } else if($action=='addsubject') { ?>
         <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12">
					<form action="" method="post">
				        <div class="form-group">
				        	<label class="col-md-1">Course</label>
				        	<div class="col-md-4">
				        		<input type="text" name="subjectname" class="form-control"
				        		>
				        	</div>
				        	<div class="form-group">
				        		<label class="col-md-1">
				        			Class
				        		</label>
				        		<div class="col-md-4">
				        			<select class="form-control" name="classname" >
											<?php 
				 							  include("connection.php"); 
				  							 $sql="SELECT * FROM CLASSES";
                   							 $stmt=mysqli_query($con,$sql);
                   							 $num_row=mysqli_num_rows($stmt);
                    							$i=0;
 
                    							if($num_row)
                    							 {
       				  							 while($row=mysqli_fetch_array($stmt))
      												{
      												?>
      										<option value="<?php echo $row['id']; ?>" >
      											<?php echo $row['name']; ?>
      										</option>	

      										  <?php
                    								 }
                  								 }


												?>									
							
				        			</select>

				        		</div>

				        	</div>
				        	<div class="form-group">
				        		<div class="col-md-1"><button name="saveSubject" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Save</button></div>
				        	</div>
				        </div>
					</form>
				</div>
				<div class="row">
				<div class="col-md-12" style="margin-top: 20px;">
					<form method="post" action="">
						<div class="col-md-offset-1 col-md-8">
							<input type="text" name="searchCourse" class="form-control " placeholder="Search by Class">
						</div>
						<div class="col-md-1">
							<button name="searchCoursebtn" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span>Search</button>
						</div>
					</form>
				</div>
					<div class="col-md-12" style="margin-top: 20px;">
						<table class="table">
						<tr >
                   	<td>#</td>
                   	<td>Section</td>
                   	<td>Class</td>
                   	<td>Remove</td>
                   </tr>
							
				 <?php
					 if(isset($_POST['searchCoursebtn']))
					     {

				    	include("connection.php");
				    	$class=$_POST['searchCourse']; 
				   		$sql = "SELECT s.id, s.name AS ssubjectname,c.name AS classname FROM 	subjects AS s LEFT OUTER JOIN classes AS c ON s.classid=c.id WHERE c.name = '$class'";
                    	$stmt=mysqli_query($con,$sql);
                    	$num_row=mysqli_num_rows($stmt);
                   				 $i=0;
 
                    	if($num_row)
                     		{
       				 			  while($row=mysqli_fetch_array($stmt))
      							 {
         							 $i++;
        
                            ?>

                              
                           <tr>
                           	<td class="active"><?php echo $i; ?></td>
                           	<td class="success"> <?php echo $row['ssubjectname']; ?> </td>
                           	<td class="active"><?php echo $row['classname']; ?></td>
                           	<td class="warning"> <form method="post" action="">
                           		<input type="hidden" name="subjectid" value="<?php echo $row['id'] ?>">
                           		<button name="deleteSubject" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Remove
                           		</button>
                           	</form> </td>
                           </tr>



                     <?php
                     }
                   }


				
					     } else{




					    ?>
					    <?php
					    include("connection.php");
				    	
				   		$sql = "SELECT s.id, s.name AS ssubjectname,c.name AS classname FROM 	subjects AS s LEFT OUTER JOIN classes AS c ON s.classid=c.id";
                    	$stmt=mysqli_query($con,$sql);
                    	$num_row=mysqli_num_rows($stmt);
                   				 $i=0;
 
                    	if($num_row)
                     		{
       				 			  while($row=mysqli_fetch_array($stmt))
      							 {
         							 $i++;
        
                            ?>

                              
                           <tr>
                           	<td class="active"><?php echo $i; ?></td>
                           	<td class="success"> <?php echo $row['ssubjectname']; ?> </td>
                           	<td class="active"><?php echo $row['classname']; ?></td>
                           	<td class="warning"> <form method="post" action="">
                           		<input type="hidden" name="subjectid" value="<?php echo $row['id'] ?>">
                           		<button name="deleteSubject" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Remove
                           		</button>
                           	</form> </td>
                           </tr>



                     <?php
                     }
                   }


				
					     }
					     ?>

						</table>
					</div>
				</div>

			</div>
		</div>

		<?php } else if($action=='addnotice') { ?>
		<!---######################Add Notice###########-->
		  <div class="row" style="overflow: hidden;">
		 
		  	<div class="col-md-12" style="margin-top: 100px;">
		  	 <h3>Add Notice</h3>
		  	 <hr>
		  		<form method="post" action="">
		  		   <div class="row">
		  		   	<div class="col-md-12">
		  		   		<div class="form-group">
		  		   	<label class="col-md-1">Notice</label>
		  		   	<div class="col-md-8" >
		  		   		<textarea class="form-control"  name="noticebody" rows="10"></textarea>
		  		   	</div>
		  		   </div>
		  		   	</div>
		  		   </div>
		  		  
		  		   <div class="col-md-12" style="margin-top: 20px;">
		  		   	 <div class="form-group">
		  		   	<div class="col-md-offset-4 col-md-2">
		  		   		<button name="postnotice" class="btn btn-success"><span class="glyphicon glyphicon-tags"></span>Post</button>
		  		   	</div>
		  		   </div>
		  		   </div> 
		  		  
		  		</form>
		  	</div>
		  </div>
		
		<?php } elseif ($action=='viewnotice') { ?>
		<div class="row" style="overflow: hidden;">
					<div class="col-md-12" style="margin-top: 100px;">
					<h3>Notices</h3>
					<hr>
						<table class="table">
						<tr >
                   	<td>#</td>
                   	<td>Notice</td>
                   	<td>Date</td>
                   	<td>Remove notice</td>
                   </tr>
							
							<?php 
				   include("connection.php"); 
				   $sql = "SELECT * FROM `notices` ORDER BY date DESC";
                    $stmt=mysqli_query($con,$sql);
                    $num_row=mysqli_num_rows($stmt);
                    $i=0;
 
                    if($num_row)
                     {
       				   while($row=mysqli_fetch_array($stmt))
      					 {
         					 $i++;
        
                            ?>

                              
                           <tr>
                           	<td class="active"><?php echo $i; ?></td>
                           	<td class="success"> <?php echo $row['notice']; ?> </td>
                           	<td class="active"><?php echo $row['date']; ?></td>
                           	<td class="warning"> <form method="post" action="">
                           		<input type="hidden" name="noticeid" value="<?php echo $row['id'] ?>">
                           		<button name="deleteNotice" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Remove</button>
                           	</form> </td>
                           </tr>



                     <?php
                     }
                   }


				?>
						</table>
					</div>
				</div>

		<?php } ?>

<script src="js/jquery-2.1.4.js"></script>
<script src="js/jquery.menu-aim.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
<script type="text/javascript">
	
function getsection(val)
{
	$.ajax({
       
       type:"POST",
       url:"get_section.php",
       data:'id='+val,
       success: function(data)
       {
       	$("#sectionname").html(data);
       }

	});

}
</script>
</body>
</html>