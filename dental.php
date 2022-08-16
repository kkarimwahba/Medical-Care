<?php 
session_start();
include'nav.php';
$connect=mysqli_connect("localhost","root","","medical care");
if ($connect->connect_error) {
      die("Connection failed: " . $connect->connect_error);
  }
  if(!empty ($_SESSION['email'])){
  if(isset($_POST["book"]))
  {
    if(isset($_SESSION["cart"]))
    {
      $doctor_array_id = array_column($_SESSION["cart"], "doctor_id");
      if(!in_array($_GET["id"], $doctor_array_id))
      {
        $count = count($_SESSION["cart"]);
        $doctor_array = array(
          'doctor_id'			=>	$_GET["id"],
          'doctor_name'			=>	$_POST["hidden_name"],
          'patient_name'			=>	$_SESSION['fullname'],
          'patient_email'			=>	$_SESSION['email'],
          'patient_id'			=>	$_SESSION['user_id'],
          'doctor_fees'		=>	$_POST["hidden_fees"],
          'doctor_phone'		=>	$_POST["hidden_phone"],
          'doctor_time'		=>	$_POST["time"],
        'doctor_date'		=>	$_POST["date"],
          'doctor_address'		=>	$_POST["hidden_address"]
          
        );
        $_SESSION["cart"][$count] = $doctor_array;
      }
      else
      {
        echo '<script>alert("Doctor Already Booked")</script>';
      }
    }
    else
    {
      $doctor_array = array(
        'doctor_id'			=>	$_GET["id"],
        'doctor_name'			=>	$_POST["hidden_name"],
        'patient_name'			=>	$_SESSION['fullname'],
        'patient_email'			=>	$_SESSION['email'],
        'patient_id'			=>	$_SESSION['user_id'],
        'doctor_fees'		=>	$_POST["hidden_fees"],
        'doctor_phone'		=>	$_POST["hidden_phone"],
        'doctor_time'		=>	$_POST["time"],
        'doctor_date'		=>	$_POST["date"],
          'doctor_address'		=>	$_POST["hidden_address"]
        
      );
      $_SESSION["cart"][0] = $doctor_array;
    }
  }

  
  if(isset($_GET["action"]))
  {
    if($_GET["action"] == "delete")
    {
      foreach($_SESSION["cart"] as $keys => $values)
      {
        if($values["doctor_id"] == $_GET["id"])
        {
          unset($_SESSION["cart"][$keys]);
          echo '<script>alert("doctor Removed")</script>';
          echo '<script>window.location="dental.php"</script>';
        }
      }
    }
  }  
}
else{
  header('location:signin.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Dentistry</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="">
<style src="style.css"> 
  .card{
    background-color: white;
  }
  
  .name{
	color: darkblue;
	font-size: 30px;
}
</style>
</head>
<body>
<section class="book">
<h1>Dentistry</h1>
<!--<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Items.." title="Type in a name" >-->
<br><br>
<div class="row">

    <div class="card">
<?php

$query = "SELECT * FROM dental";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_array($result))
  {
?>

<form method="POST" action="dental.php?action=add&id=<?php echo $row["id"]; ?>">
      <h3>Dr.  <?php echo $row["name"]; ?> </h3>
      <img src="data:image/jpg;charset-utf8;base64,<?php echo base64_encode($row['img']);?>"class="img-responsive" style="width: 200px; height: 200px;"/><br />
     
      <ul>
      <li> Title: <?php echo $row["title"]; ?></li>
      <li>Rate: <?php echo $row["rate"]; ?></li>
      <li> Phone: <?php echo $row["phone"]; ?></li>
      <li>Fees: <?php echo $row["fees"]; ?> L.E</li>
      <li>Address: <?php echo $row["address"]; ?> </li>
      <!--<li> <button  onclick="window.location.href='profile61.html'">book</button>  </li>-->
      
    </ul>
    <input type="time" name="time"value="1" class="in" />
    <input type="date" name="date"value="1" class="in" />
    <input type="hidden" name="hidden_name" class="caption" value="<?php echo $row["name"]; ?>" />

<input type="hidden" name="hidden_phone" class="caption" value="<?php echo $row["phone"]; ?>" />

<input type="hidden" name="hidden_fees" class="caption" value="<?php echo $row["fees"]; ?>" />

<input type="hidden" name="hidden_address" class="caption" value="<?php echo $row["address"]; ?>" />
<input type="submit" name="book" style="margin-top:5px;"  class="btn" value="Book" />
    <br><br>
  </form>
<hr>

  <?php
				echo'<br><br>';	}
				}
			?>
 
      </div>
</div>   
  </section>
  <section class="book">
<h3 class="doctor">Book Details</h3><br>
			<div class="table-responsive">
				<form method="POST" action="">
				<table id="myTable" style="font-size:20px ;">
					<tr>
						<th width="20%">Doctor Name</th>
						<th width="20%">Phone</th>
						<th width="15%">Fees</th>
						<th width="15%">Address</th>
            <th width="15%">Time</th>
            <th width="15%">Date</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["cart"]))
					{

						$fees = 0;
						foreach($_SESSION["cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["doctor_name"]; ?></td>
						<td><?php echo $values["doctor_phone"]; ?></td>
						<td><?php echo $values["doctor_fees"]; ?>L.E </td>
            <td><?php echo $values["doctor_address"]; ?></td>
            <td><?php echo $values["doctor_time"]; ?></td>
            <td><?php echo $values["doctor_date"]; ?></td>
						<td><a href="dental.php?action=delete&id=<?php echo $values["doctor_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
          $fees = $fees + ($values["doctor_fees"]);
						}
					?>
					<tr>
						<td colspan="3" text-align="right">Fees</td>
						<td text-align="right"><?php echo number_format($fees, 2); ?>L.E</td>				
						<td><input type="submit" name="submit" value="Book" class="btn"></td>
					</tr>
			</table>
			<?php 
      
				if(isset($_POST["submit"])){
				 foreach($_SESSION['cart'] as $array){
       	 $sql="INSERT INTO orders(doctor_name,patient_name,patient_email,patient_id,date,time,fees,location,phone,patient_number) values ('".$array['doctor_name']."','".$array['patient_name']."','".$array['patient_email']."','".$array['patient_id']."','".$array['doctor_date']."','".$array['doctor_time']."','".$array['doctor_fees']."','".$array['doctor_address']."','".$array['doctor_phone']."','".$_SESSION['phone']."')";
       			 $result=mysqli_query($connect,$sql);
       			echo '<script>alert("The Booking Submitted Successfully");alert("You have 5 hours to Cancel the Booking!"); window.location.href="orders.php";
       			</script>';
       }
       $_SESSION['cart']=array();
   }

?>
				</form>
				<?php
					}
					?>
					
			</div>
		</div>
	</div>
	<br />
</section>
<script>
</script>
</body>
</html>