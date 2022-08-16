<?php
session_start();
include"nav.php";
include"header.php";
$connect=mysqli_connect("localhost","root","","medical care");
if ($connect->connect_error) {
      die("Connection failed: " . $connect->connect_error);
 }
 if(isset($_POST['submit'])){

  $name= $_POST['name'];
  $title = $_POST['title'];
  $speciality=$_POST['speciality'];
  $rate = $_POST['rate'];
  $phone = $_POST['phone'];
  $fees = $_POST['fees'];
  $address=$_POST['address'];

	$sql="INSERT INTO doctors (name,title,speciality,rate,phone,fees,address) values ('$name','$title','$speciality','$rate','$phone','$fees','$address')";

 	$result=mysqli_query($connect,$sql);
	if(!$result)
	{	
	echo"Wrong input";
	}
	else{
	echo"<script>alert('New doctor Added!')</script>";
	header('location:doctordatabase.php');
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add a Doctor</title>
	<style src="style.css">
		body{
			background-image:url(rr.jpg);
		}
		form{
			width: 60%;
			margin: auto;
			background-color: white;
			text-align: center;
			padding: 10px 10px;
		}
		.in{
			width:80%;
			margin-top: 5px;
			margin-bottom: 5px;
			border-color: darkblue;
		}
		h1{
			text-align: center;
			padding: 10px 5px;
			color:darkblue;
		}
		.subm{
			border-radius:25px;
		width: 60%;
		height: 40px;
		border: none;
		cursor: pointer;
		color: white;
		background-color: darkblue;
		font-size: 15px;
		}
		.subm:hover
		{
		  background-color: darkblue;
		  opacity: 0.8;
		  text-transform: 2px;
		  letter-spacing: 1px;
	  transition: 0.5s;
		  font-size: 16px;
	
		}
		
	</style>
</head>
<body>
	<br>
	<form method="POST" action="" name="form">
	<h1>Add A Doctor</h1> 
		<input type="text" name="name" placeholder="FullName"class="in"> <br>
		<input type="text" name="title" placeholder="Title"class="in"><br>
		<input type="text" name="rate"placeholder="Rate"class="in"><br>
		<input type="text" name="phone" placeholder="Phone Number"class="in"><br>
		<input type="text" name="fees" placeholder="Fees"class="in"><br>
		<input type="text" name="address" placeholder="Address"class="in"><br>
		<input type="text" name="speciality"placeholder="Speciality"class="in"><br>
		<input type="file" name="img" accept="image/*" class="custom-file-input"  /><br>
  <br>  <br>
		<input type="submit" class="subm" name="submit" value="add">
		<br>

	</form>

</body>
</html>