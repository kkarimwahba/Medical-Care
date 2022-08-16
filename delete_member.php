<?php
session_start();
$connect=mysqli_connect("localhost","root","","medical care");
if ($connect->connect_error) {
      die("Connection failed: " . $connect->connect_error);
  }
  $id=$_POST['id'];
  $delete = "DELETE FROM orders WHERE id=$id";
  $result = mysqli_query($connect,$delete) or die(mysqli_error($connect,$delete))
?>