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
	
	<title>Doctors</title>
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
		#myInput{
    background-image: url('searchicon.png');
  background-position: 10px 12px; 
  background-repeat: no-repeat; 
  width:100%;
  margin:auto;
  font-size: 16px; 
  padding: 12px 20px 12px 40px; 
  border: 1px solid white;
  margin-bottom: 12px; 
  }
button{
	width: 100px;
	height: 50px;
	font-size: 15px;
}
	</style>
</head>
<body>
<h1>Doctors </h1>
<br><BR>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search By Name, Speciality or Area" title="Type in a name" >

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
		<th> </th>
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
			<td>      <img src="data:image/jpg;charset-utf8;base64,<?php echo base64_encode($row['img']);?>"class="img-responsive" style="width: 200px; height: 200px;"/><br>
</td>
	<td style="color: darkblue;"> DR. <?php echo $row["name"]; ?></td>
	<td> <?php echo $row["title"]; ?></td>
	<td> <?php echo $row["speciality"]; ?></td>
      <td><?php echo $row["rate"]; ?></td>
      <td><?php echo $row["phone"]; ?></td>
      <td><?php echo $row["fees"]; ?> </td>
      <td> <?php echo $row["address"]; ?> </td>
	  <td> <button onclick="window.location.href='menu.php'">Book</button></td></tr>

<?php 
  
}
}
?>
	</table>
</div>
<script>

function myFunction() {
 var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
	td1 = tr[i].getElementsByTagName("td")[3];
	td2 = tr[i].getElementsByTagName("td")[7];
    if (td|| td1||td2) {
      txtValue = td.textContent || td.innerText;
	  txtValue1 = td1.textContent || td1.innerText;
	  txtValue2 = td2.textContent || td2.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1||txtValue1.toUpperCase().indexOf(filter) > -1||txtValue2.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</body>
</html>