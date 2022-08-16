<?php 
session_start();
include"nav.php";
include"header.php";
$connect=mysqli_connect("localhost","root","","medical care");
if ($connect->connect_error) {
      die("Connection failed: " . $connect->connect_error);
  }
  if(isset($_POST['submit']))
  {
	$patientname=$row['patient_name'];
    $rate=$_POST['rate'];
	$comment=$_POST['comment'];
$sql="UPDATE orders SET doctor_rate=$rate , doctor_comment=$comment where patient_name='$patientname' ";//cannot defiend the id number.
    $result=mysqli_query($connect,$sql);
echo '<script>alert("Your Rating Submitted!");window.location.href="appointments.php";</script>';
header("location:appointments.php");
}
  ?>
  <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Appointments</title>
	<style>
		body{
			background-image: url(rr.jpg);
		}
		h1{
			color: white;
			text-align: center;
		}
		.in{
			width: 100%;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <br>
<h1>Appointments</h1>
<br><BR>
<table id="myTable">
	<tr>
		<th>ID</th>
		<th>Patient Name</th>
		<th>Patient Email</th>
        <th>Patient Number</th>
		<th>Patient ID</th>
        <th>Date</th>
        <th>Time</th>
        <th>Rate</th>
		

	</tr>
<?php
$query = "SELECT * FROM orders  where doctor_name ='".$_SESSION["fullname"]."'";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{
?>
	<tr>
		<td id=<?php echo $row['id'];?>><?php echo $row['id'];?></td>
		<td><?php echo $row["patient_name"]; ?></td>
		<td><?php echo $row["patient_email"]; ?></td>
        <td><?php echo $row["patient_number"]; ?></td>
 <td><?php echo $row["patient_id"]; ?></td>       
  <td><?php echo $row["date"]; ?></td>
        <td><?php echo $row["time"]; ?></td>
        <form method="POST" action="">
		<td>	<input type="text" placeholder="Write a Comment.... " id="comment" name="comment" class="in"><br>
        <input type="rate" placeholder="Rate Out Of 5." id="rate" name="rate" class="in" required> 
		<input type="submit" name="submit" value="submit" class="btn">
	</td>
        </form>
	</tr>
<?php 
}
}
?>
</table>
</body>
</html>