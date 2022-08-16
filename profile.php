<?php 
session_start();
include"nav.php";
include"header.php";
$connect=mysqli_connect("localhost","root","","medical care");
if ($connect->connect_error) {
      die("Connection failed: " . $connect->connect_error);
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo$_SESSION['fullname']; ?></title>
	<style src="style.css">
		body{
			background-image: url(rr.jpg);
		}
		h1{
			text-align: center;
			text-transform: uppercase;
			color: darkblue;
		}
	h4{
	text-align: left;
	}
	.card{
		width: 30%;
		margin: auto;
		cen
	}
</style>
</head>
<body>
	<?php 
	if(empty($_SESSION['email'])){ 
		header('location:signin.php');
	}else{
	?>
	<br><BR><BR>
	<h1>Profile</h1>
	<BR><BR>
	<?php 

	$query = "SELECT * FROM users where fullname='".$_SESSION["fullname"]."'";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{
?>

<div class="card">


	 <img src="data:image/jpg;charset-utf8;base64,<?php echo base64_encode($row['img']);?>"class="img-responsive" style="width: 200px; height: 200px;"/><br>
<h4>FullName:  <?php echo $row['fullname']; ?></h4>
<h4>Email:  <?php echo $row['email']; ?></h4>
<h4>Phone:  <?php echo $row['phone']; ?></h4>
<h4>Password:  <?php echo $row['password']; ?></h4>
<h4>Birth Of Date:   <?php echo $row['birthofdate']; ?></h4>
<h4>Gender:   <?php echo $row['gender']; ?></h4>


<button onclick="window.location.href='CRUD.php';">
Edit profile    </button>

</div>

<?php
}}
}
?>
</body>
</html>