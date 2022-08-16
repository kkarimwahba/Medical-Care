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
	<title>Reservations</title>
	<style>
		body{
			background-image: url(rr.jpg);
		}
		h1{
			color: white;
			text-align: center;
		}
    .btn{
      border-radius:25px;
		width: 100%;
		height: 46px;
    padding: 10px;
		border: none;
		cursor: pointer;
		color: white;
		background-color: darkblue;
		font-size: 15px;
    }
	.in{
			width: 100%;
		}
		#myTable{
			width: 100%;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<h1>Reservations</h1>
<br><BR>
<table id="myTable">
	<tr>
		<th>ID</th>
		<th>Doctor Name</th>
		<th>Fees</th>
		<th>Phone</th>
		<th>Time</th>
		<th>Date</th>
		<th>Address</th>
		<th>Comment</th>
		<th>Action </th>

	</tr>
<?php
$query = "SELECT * FROM orders where patient_email='".$_SESSION["email"]."'";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{
?>
	<tr class="delete_mem<?php echo $row['id'] ?>">
		<td id=<?php echo $row['id'];?>><?php echo $row['id'];?></td>
		<td><?php echo $row["doctor_name"]; ?></td>
		<td><?php echo $row["fees"]; ?></td>
		<td><?php echo $row["phone"]; ?></td>
		<td><?php echo $row["time"]; ?></td>
		<td><?php echo $row["date"]; ?></td>
		<td><?php echo $row["location"]; ?></td>
		<td>	
            <form method="POST" action="updateRate.php">
            <input type ="hidden" name="id" value="<?php echo $ss['id']?>">
                <input type="text" placeholder="Write a Comment.... " id="comment" name="comment" class="in"><br>
        <input type="rate" placeholder="Rate Out Of 5." id="rate" name="rate" class="in" required> 
		<input type="submit" name="submit" value="submit" class="btn">
            </form>
	</td>
   <td> <a class="btn" id="<?php echo $row['id']; ?>" onclick="function()" >Cancel</a></td>
	</tr>
<?php 
}
}
?>
</table>
</body>
<script>
	//timer for the cancel button to delete the id row 
      /*const btn = document.getElementById("btn")
function myFunction() {
  btn.disabled = true;
  setTimeout(()=>{
    btn.disabled = false;
    console.log('Button Activated')}, 5000)
}*/
$(document).ready(function() {
	 $('.btn').click(function() {
            var id = $(this).attr("id");
            if (confirm("Are you sure you want to Cancel this Resversation?")) {
                $.ajax({
                    type: "POST",
                    url: "delete_member.php",
                    data: ({
                        id: id
                    }),
                    
                    success: function(html) {
                        $(".delete_mem" + id).fadeOut('slow');
                    }
                });
            } else {
                return false;
            }
        });
    });
</script>
</html>