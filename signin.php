<?php 
session_start();
include'nav.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medical care";
$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_POST['Submit'])){
  $sql="SELECT * from users where email ='".$_POST["email"]."' and password='".$_POST["password"]."'";
    $result = mysqli_query($conn,$sql);
    if($row=mysqli_fetch_array($result)){
    $_SESSION['user_id']=$row["user_id"];
    $_SESSION['fullname']=$row['fullname'];
    $_SESSION['email']=$row['email'];
    $_SESSION['password']=$row['password'];
    $_SESSION['phone']=$row['phone'];
    $_SESSION['role']=$row['role'];
  
    if(isset($_POST['remember'])){
      setcookie('email',$_POST['email'],time()+(86400*30));
      setcookie('password',$_POST['password'],time()+(86400*30));
     
    }
    header("Location:index.php");
  }
  else
{
echo '<script>alert("Incorrect Email or Password")</script>';

}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <script>src= "https://code.jquery.com/jquery-2.2.1.min.js" type="text/javascript"></script>
	<title>Sign In</title>
	<style>
    body{
      background-image: url('rr.jpg');
      background-repeat: no-repeat;
      background-size: cover;
       background-position: center;
    }
    .container{

      padding-top: 50px;
      padding-bottom: 40px;
      padding: 50px;
      margin-top: 40px;

    }
    form{
      width: 50%;
      margin: auto;
     text-align: center;
     padding-top: 150px;
      background-color:   white;
      padding: 50px;
      border: none;
    font-size: 16px;
    margin-right: auto;
    margin-left: auto;
   margin-top: 0px;
    flex-direction: row; 
    justify-content: center; 
    }
    label
    {
 text-align: right;
    clear: both;
    float:left;
    margin-right:15px;    font-weight: bold;
    font-size: 18px;
    }
    input[type=text], input[type=password] {
    width: 80%;
    padding: 12px 20px;
    display: flex;
    margin: auto;
    display: inline-block;
    border-radius:15px ;
        font-size: 13px;
    border: 1px solid #ccc;
    }
    button{
    border-radius:25px;
    width: 50%;
    height: 30px;
    border: none;
    cursor: pointer;
    background-color: darkblue;
    color: white;
    font-size: 15px;
    }
    button:hover
    {
      background-color: darkblue;
      opacity: 0.8;
      text-transform: 2px;
      letter-spacing: 1px;
  transition: 0.5s;
      font-size: 16px;

    }
    h1{
      font-weight: bold;
      color:black;
    }
    .myForm #email_error,
.myForm #pass_error{
	margin-top: 5px;
	width: 345px;
  margin:auto;
	font-size: 18px;
	color: #C62828;
	background: rgba(255,0,0,0.1);
	text-align: center;
	padding: 5px 8px;
	border-radius: 3px;
	border: 1px solid #EF9A9A;
	display: none;

}
.error{
  color: #C62828;
  text-align:center;
}
.invalid{
color :red;

}

  </style>
</head>
<body>
<div class="container">
<form class='myForm' action="" method="post" name="myForm" onsubmit="return valid()"> 
    <h1>LOGIN</h1>
	<label for="email" >Email:</label>
<input type="text" placeholder="Enter Email" class="in" name="email" id="email"  ><br><br>
<div id='email_error'>Please fill up your Email</div>
<br>
<label for="password"class="caption" >Password:</label>
<input type="password" class="in"  placeholder="Enter Password" name="password"  >
<br>
<div id='pass_error'>Please fill up your Password</div>
<br>
<label><input type="checkbox" name="remember"> Remember Me </label>
<br>
<br>
<button type="submit"  class="btn " style="width: 20%;"name="Submit">Login</button>
<br>
<!--<p class="invalid" name="error">Wrong Email and Password</p>-->
<!--<span class="error"></span>-->
<strong>Don't have an account?</strong> <br><button  class="btn"style="width: 20%;"onclick=" window.location.href='signup1.php'">Register</button>
</form>
</div>
</body>
</html>

	