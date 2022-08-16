<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<?php include"nav.php"; ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Search</title>
</head>
<body>
<section>
	<section class="book">
	<h1>Booking Doctors</h1>
    <div class="row">
        <div class="option"style="padding-right: 5px;">
            <img src="dental.jpg">
            <div class="layer">
                <a href="dental.php"><h3>Dental</h3></a>
            </div>
        </div>
        <div class="option"style="padding-right: 5px;padding-left: 5px;">
            <img src="cardio.jpg">
            <div class="layer">
                <a href="heart.php"><h3>Cardiology and vascular disease</h3></a>
            </div>
        </div>
         <div class="option"style="padding-left: 5px;">
            <img src="baby1.jpg">
            <div class="layer">
            <a href="newborn.php"><h3>Pediatrics and New born</h3></a>           
         </div>
        </div>
    </div>
    <div class="row">
         <div class="option"style="padding-right: 5px;">
            <img src="bones1.jpg">
            <div class="layer">
            <a href="bones.php"><h3>Orthopedics</h3></a>           
         </div>
        </div>
         <div class="option"style="padding-right: 5px;padding-left: 5px;">
            <img src="skin.jpg">
            <div class="layer">
            <a href="skin.php"><h3>Dermatology(Skin)</h3></a>           
         </div>
    </div>
    <div class="option">
            <img src="nutri.jpg"style="padding-left: 5px;">
            <div class="layer">
            <a href="diet.php"><h3>Dietitian and Nutrition</h3></a>           
         </div>
    </div>	
    </div>
	
</section>
</section>
</body>
</html>