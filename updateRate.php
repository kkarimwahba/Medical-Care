<?php
session_start();
$connect=mysqli_connect("localhost","root","","medical care");
if ($connect->connect_error) {
      die("Connection failed: " . $connect->connect_error);
  }
  $id=$_POST['id'];
  if(isset($_POST['submit']))
  {
  
    $rate=$_POST['rate'];
    $comment=$_POST['comment'];
    $sql="UPDATE orders SET patient_rate='$rate' , patient_comment='$comment'  WHERE id='$id'";

    $result=mysqli_query($connect,$sql);
echo '<script>alert("Your Rating Submitted!");window.location.href="orders.php";</script>';
header("location:orders.php");
  
}
?>