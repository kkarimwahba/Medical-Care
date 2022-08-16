<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>

	<title>Contact Us</title>
	<meta name="viewport" content="width-device-width, initial.scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>
<body>
<section class="header">
        	<?php include"nav.php";  ?>

<section class="contact">
	<div class="content">
		<h2>Contact Us</h2>
	</div>
	<div class="container">
		<div class="contactInfo">
			<div class="box">
				<div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i>
					<div class="text">
						<h3>Address</h3>
						<p>4671 Wadi-Degla street, <br> Zahraa El-Maadi</p>
					</div>
				</div>
			</div>
			<div class="box">
				<div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i>
					<div class="text">
						<h3>Email</h3>
						<p>Medical.care@gmail.com</p>
					</div>
				</div>
			</div>
			<div class="box">
				<div class="icon"><i class="fa fa-phone" aria-hidden="true"></i>
					<div class="text">
						<h3>Phone</h3>
						<p>01048402222</p>
					</div>
				</div>
			</div>
		</div>
		<div class="contactform">
			<form>
				<h2>Send Message</h2>
				<div class="inputbox">
					<input type="text" name="" required="required">
					<span>Full Name</span>
				</div>
				<div class="inputbox">
					<input type="text" name="" required="required">
					<span>Email</span>
				</div>
				<div class="inputbox">
					<textarea required="required"></textarea>
					<span>Type Your Message...</span>
				</div>
				<div class="inputbox">
					<input type="submit" name="" value="send"> 
				</div>
			</form>
		</div>
	</div>
</section>
</section>
</body>
</html>