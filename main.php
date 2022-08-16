<?php 
session_start();
?>
<html>
    <head>
    	<meta name="viewport" content="with=device-width , inirial-scale=1.0">
        <title>Medical Care</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css">
    </head>
    <body>
        <section class="header">
        	<?php include"nav.php";  ?>
  <div class="text-box">
  	<h1>Better Healthcare for a Better Life</h1>
  	<h3>Book online or call <span style="color:red;">16676</span></h3>
  </div>
        </section>
<?php
if(!empty($_SESSION["role"]) && $_SESSION["role"]==3){
	?>
  <section class="book">
	<h1>Doctor Options</h1>
    <div class="row">
        <div class="option">
            <img src="doctor-time.jpg">
            <div class="layer">
                <a href="appointments.php">  <h3>Appointments</h3></a>
            </div>
        </div>
        
        <div class="option">
            <img src="icondoc.jpg">
            <div class="layer">
                <a href="profile.php"><h3>Setting</h3></a>
            </div>
        </div>
        </div>
    
    </div> <?php
}

elseif(!empty($_SESSION["role"]) && $_SESSION["role"]==1){
	?>


<section class="book">
	<h1>Welcome Admin</h1>
    <div class="row">
        <div class="option">
            <img src="safe.png">
            <div class="layer">
                <a href="add.php">  <h3>Add a Doctor</h3></a>
            </div>
        </div>
        </div>
    
    </div>
	<?php }


else{
	?>


<section class="book">
	<h1>Booking Options</h1>
    <div class="row">
        <div class="option">
            <img src="safe.png">
            <div class="layer">
                <a href="menu.php">  <h3>Doctor Booking</h3></a>
            </div>
        </div>
        <div class="option">
            <img src="tele.png">
            <div class="layer">
                <a href="Teleconsultation.php"><h3>Teleconsultation</h3></a>
            </div>
        </div>
         <div class="option">
            <img src="home.jpg">
            <div class="layer">
            <a href="homevisit.php"><h3>Home Visit</h3></a>           
         </div>
        </div>
    
    </div>
	<?php }
    ?>
</section>
<section class="footer">
    <div class="row">
    <div class="ff">
    <img alt="All your healthcare needs" src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/44701/_next/static/images/medical-care-icon.svg" class="UniqueSellingPointsstyle__PointImage-sc-1eleeat-3 kTeMXj">
    <h4>All your healthcare needs</h4>
    <p>Search and book a clinic visit, home visit, or a teleconsultation. <br>Order your medicine and book a service or operation.</p>
</div>
<div class="ff">
<img alt="Your booking is confirmed" src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/44701/_next/static/images/booking-icon.svg" class="UniqueSellingPointsstyle__PointImage-sc-1eleeat-3 kTeMXj">
    <h4>Verified patient reviews</h4>
    <p>Doctor ratings are from patients<br> who booked and visited the doctor through Medical Care.</p>
</div>
<div class="ff">
<img alt="Book for free, and pay in the clinic " src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/44701/_next/static/images/security-icon.svg" class="UniqueSellingPointsstyle__PointImage-sc-1eleeat-3 kTeMXj">
    <h4>Book for free, and pay in the clinic</h4>
    <p>The consultation fees stated on Medical Care are <br>the actual doctor's fees with no extra charges.</p>
</div>
</div>
</section>

        <script>
        var navLinks = document.getElementById("navLinks");
        function showMenu(){
        	navLinks.style.right="0";

        }
        function hideMenu(){
        	navLinks.style.right="-200px";
        	
        }
    </script>
        
       
    </body>
</html>