<?php 
session_start();
include"nav.php";
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
	<title>Doctors Database</title>
	<style>
		body{
			background-image: url(rr.jpg);
			background-repeat: no-repeat;
			background-size: cover;
		}
		h1
		{
			text-align: center;
			padding: 20px;
		}
		h2{
			text-align: center;
			color: darkblue;
			padding: 20px;
			text-transform: uppercase;
		}
	</style>
</head>
<body>
<h1>Doctors Database</h1>
<br><BR>
<h2>Dentistry</h2>

<div class="">
	<table id=myTable>
		<tr><th>Image</th>
		<th>Doctor Name</th>
		<th>Title</th>
		<th>Rate</th>
		<th>Phone</th>
		<th>Fees</th>
		<th>Address</th>
		</tr>
		<?php

$query = "SELECT * FROM dental";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_array($result))
  {
?>
		<tr><td>      <img src="data:image/jpg;charset-utf8;base64,<?php echo base64_encode($row['img']);?>"class="img-responsive" style="width: 200px; height: 200px;"/><br />
</td>
			<td> <?php echo $row["name"]; ?></td>
				<td> <?php echo $row["title"]; ?></td>
      <td><?php echo $row["rate"]; ?></td>
      <td><?php echo $row["phone"]; ?></td>
      <td><?php echo $row["fees"]; ?> </td>
      <td> <?php echo $row["address"]; ?> </td>
		</tr>

	<?php 

}
}?>
	</table>
</div>
<br><br><br><br>
<h2>Cardiology and vascular disease</h2>

<div class="">
	<table id=myTable>
		<tr><th>Image</th>
		<th>Doctor Name</th>
		<th>Title</th>
		<th>Rate</th>
		<th>Phone</th>
		<th>Fees</th>
		<th>Address</th>
		</tr>
		<?php

$query = "SELECT * FROM cardiology";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_array($result))
  {
?>
		<tr><td>      <img src="data:image/jpg;charset-utf8;base64,<?php echo base64_encode($row['img']);?>"class="img-responsive" style="width: 200px; height: 200px;"/><br />
</td>
			<td> <?php echo $row["name"]; ?></td>
				<td> <?php echo $row["title"]; ?></td>
      <td><?php echo $row["rate"]; ?></td>
      <td><?php echo $row["phone"]; ?></td>
      <td><?php echo $row["fees"]; ?> </td>
      <td> <?php echo $row["address"]; ?> </td>
		</tr>

	<?php 

}
}?>
	</table>
</div>
<br><br><br><br>
<h2>Pediatrics and New born</h2>
<div class="">
	<table id=myTable>
		<tr><th>Image</th>
		<th>Doctor Name</th>
		<th>Title</th>
		<th>Rate</th>
		<th>Phone</th>
		<th>Fees</th>
		<th>Address</th>
		</tr>
		<?php

$query = "SELECT * FROM pediatricsnewborn";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_array($result))
  {
?>
		<tr><td>      <img src="data:image/jpg;charset-utf8;base64,<?php echo base64_encode($row['img']);?>"class="img-responsive" style="width: 200px; height: 200px;"/><br />
</td>
			<td> <?php echo $row["name"]; ?></td>
				<td> <?php echo $row["title"]; ?></td>
      <td><?php echo $row["rate"]; ?></td>
      <td><?php echo $row["phone"]; ?></td>
      <td><?php echo $row["fees"]; ?> </td>
      <td> <?php echo $row["address"]; ?> </td>
		</tr>

	<?php 

}
}?>
	</table>
</div>
<br><br><br><br>
<h2>Orthopedics</h2>
<div class="">
	<table id=myTable>
		<tr><th>Image</th>
		<th>Doctor Name</th>
		<th>Title</th>
		<th>Rate</th>
		<th>Phone</th>
		<th>Fees</th>
		<th>Address</th>
		</tr>
		<?php

$query = "SELECT * FROM orthopedics";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_array($result))
  {
?>
		<tr><td>      <img src="data:image/jpg;charset-utf8;base64,<?php echo base64_encode($row['img']);?>"class="img-responsive" style="width: 200px; height: 200px;"/><br />
</td>
			<td> <?php echo $row["name"]; ?></td>
				<td> <?php echo $row["title"]; ?></td>
      <td><?php echo $row["rate"]; ?></td>
      <td><?php echo $row["phone"]; ?></td>
      <td><?php echo $row["fees"]; ?> </td>
      <td> <?php echo $row["address"]; ?> </td>
		</tr>

	<?php 

}
}?>
	</table>
</div>
<br><br><br><br>
<h2>Dermatology(Skin)</h2>
<div class="">
	<table id=myTable>
		<tr><th>Image</th>
		<th>Doctor Name</th>
		<th>Title</th>
		<th>Rate</th>
		<th>Phone</th>
		<th>Fees</th>
		<th>Address</th>
		</tr>
		<?php

$query = "SELECT * FROM dermatology";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_array($result))
  {
?>
		<tr><td>      <img src="data:image/jpg;charset-utf8;base64,<?php echo base64_encode($row['img']);?>"class="img-responsive" style="width: 200px; height: 200px;"/><br />
</td>
			<td> <?php echo $row["name"]; ?></td>
				<td> <?php echo $row["title"]; ?></td>
      <td><?php echo $row["rate"]; ?></td>
      <td><?php echo $row["phone"]; ?></td>
      <td><?php echo $row["fees"]; ?> </td>
      <td> <?php echo $row["address"]; ?> </td>
		</tr>

	<?php 

}
}?>
	</table>
</div>
<br><br><br><br>
<h2>Dietitian and Nutrition</h2>
<div class="">
	<table id=myTable>
		<tr>
			<th>Image</th>
		<th>Doctor Name</th>
		<th>Title</th>
		<th>Rate</th>
		<th>Phone</th>
		<th>Fees</th>
		<th>Address</th>
		</tr>
		<?php

$query = "SELECT * FROM diet";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_array($result))
  {
?>
		<tr>
			<td>      <img src="data:image/jpg;charset-utf8;base64,<?php echo base64_encode($row['img']);?>"class="img-responsive" style="width: 200px; height: 200px;"/><br />
</td>
			<td> <?php echo $row["name"]; ?></td>
				<td> <?php echo $row["title"]; ?></td>
      <td><?php echo $row["rate"]; ?></td>
      <td><?php echo $row["phone"]; ?></td>
      <td><?php echo $row["fees"]; ?> </td>
      <td> <?php echo $row["address"]; ?> </td>
		</tr>

	<?php 

}
}?>
	</table>
</div>
<br>
<h2>Dermatology(Skin)</h2>
<div class="">
	<table id=myTable>
		<tr><th>Image</th>
		<th>Doctor Name</th>
		<th>Title</th>
		<th>Rate</th>
		<th>Phone</th>
		<th>Fees</th>
		<th>Address</th>
		</tr>
		<?php

$query = "SELECT * FROM dermatology";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_array($result))
  {
?>
		<tr><td>      <img src="data:image/jpg;charset-utf8;base64,<?php echo base64_encode($row['img']);?>"class="img-responsive" style="width: 200px; height: 200px;"/><br />
</td>
			<td> <?php echo $row["name"]; ?></td>
				<td> <?php echo $row["title"]; ?></td>
      <td><?php echo $row["rate"]; ?></td>
      <td><?php echo $row["phone"]; ?></td>
      <td><?php echo $row["fees"]; ?> </td>
      <td> <?php echo $row["address"]; ?> </td>
		</tr>

	<?php 

}
}?>
	</table>
</div>
<br><br>
<h2>All Doctors</h2>
<div class="">
	<table id=myTable>
		<tr>
			<th>Image</th>
		<th>Doctor Name</th>
		<th>Title</th>
		<th>Speciality</th>
		<th>Rate</th>
		<th>Phone</th>
		<th>Fees</th>
		<th>Address</th>
		</tr>
		<?php

$query = "SELECT * FROM doctors";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_array($result))
  {
?>
		<tr>
			<td>      <img src="data:image/jpg;charset-utf8;base64,<?php echo base64_encode($row['img']);?>"class="img-responsive" style="width: 200px; height: 200px;"/><br />
</td>
			<td> <?php echo $row["name"]; ?></td>
				<td> <?php echo $row["title"]; ?></td>
				<td> <?php echo $row["speciality"]; ?></td>
      <td><?php echo $row["rate"]; ?></td>
      <td><?php echo $row["phone"]; ?></td>
      <td><?php echo $row["fees"]; ?> </td>
      <td> <?php echo $row["address"]; ?> </td>
		</tr>

	<?php 

}
}?>
	</table>
</div>
</body>
</html>