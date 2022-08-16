<?php 

session_start();
include"nav.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Teleconsultation</title>
	<meta name="viewport" content="width-device-width, initial.scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
		<style>
	.text h3{
		color:darkblue;
	}
	.text p{
		color:black;
	}
	</style>
</head>
<body>
<section class="contact">
	<div class="content">
		<h2>Teleconsultation</h2>
	</div>
	<div class="container">
		<div class="contactInfo">
			<div class="box">
				
					<div class="text">
						<h3>Get well soon!</h3>
						<p>Please fill this form and one <br> of our team will contact you ..></p>
						
					</div>
			</div>
		</div>
		<div class="contactform">
			<form name="form" action="" method="POST">
				<h2>Send Message</h2>
				<div class="inputbox">
					<input type="text" name="fullname" required="required">
					<span>Full Name</span>
				</div>
				<div class="inputbox">
					<input type="text" name="phone" required="required">
					<span>Phone Number</span>
				</div>
				<div class="inputbox">
					<input type="text" name="specialty" required="required">
					<span>Specialty</span>
				</div>
				<div class="inputbox">
					<input type="text"name="more" required>
					<span>More Details</span>
				</div>
				<div class="inputbox">
					<input type="submit" name="submit" value="send"> 
				</div>
			</form>
		</div>
	</div>
</section>
</body>
</html>
<?php
$connect=mysqli_connect("localhost","root","","medical care");
if ($connect->connect_error) {
      die("Connection failed: " . $connect->connect_error);
  }
  if(isset($_POST['submit'])){
	  $fullname= $_POST['fullname'];
  $phone= $_POST['phone'];
  $specialty = $_POST['specialty'];
  $more = $_POST['more'];

  $sql1="INSERT INTO teleconsultation (fullname,phone,specialty,more) values ('$fullname','$phone','$specialty','$more')";
$result1=mysqli_query($connect,$sql1);
if(!$result1){
  echo "Error inserting into database". $sql;
}
else{
	echo'<script>alert=("Saved!")</script>';
}
}
?>