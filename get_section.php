<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

<?php 
	include("connection.php");	
  $sql="SELECT * FROM sections WHERE classid='".$_POST['id']."'";
  $stmt=mysqli_query($con,$sql);
  if($num_row=mysqli_num_rows($stmt))
  {


?>
<option><--Select Section--></option>	
<?php
while ($row=mysqli_fetch_array($stmt)) {

  ?>
  <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

<?php 
}
}

?>
</body>
</html>