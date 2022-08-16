<?php
session_start();
include'nav.php';
$connect=mysqli_connect("localhost","root","","medical care");
if ($connect->connect_error) {
      die("Connection failed: " . $connect->connect_error);
  }

    if(!empty($_POST['name'])&&!empty($_POST['email'])&&!empty($_POST['password'])&&!empty($_POST['confirmpassword'])&&!empty($_POST['gender'])&&!empty($_POST['birthofdate'])){
if(isset($_POST['signup'])){
  print_r($_POST);
$fullname= $_POST['fullname'];
$password = $_POST['password'];
$confirmpassword=$_POST['confirmpassword'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$birthofdate=$_POST['birthofdate'];
$gender=$_POST['gender'];
$img = $_POST['img'];
$target_dir = "uploads/";
$img = $target_dir . basename($_FILES["img"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($img,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["img"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["img"]["tmp_name"], $img)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["img"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

 if($password!=$confirmpassword)
  {
  echo '<script>alert("Passwords not match");return false;</script>';
  }
  if(strlen("$password")<8)
  {
  echo '<script>alert("Password must be at least 6 characters");window.location.href="signup.php";</script>';
  }
  if(filter_var($email,FILTER_VALIDATE_EMAIL)==false)
  {
  echo '<script>alert("Wrong email format");window.location.href="signup.php";</script>';
  }

  
$sql="INSERT INTO users (fullname,phone,email,password,birthofdate,gender,role/*,img*/) values ('$fullname','$phone','$email','$password','$birthofdate','$gender','2'/*,'$img'*/)";
$result=mysqli_query($connect,$sql);
$_SESSION['user_id'];
$_SESSION['fullname']=$fullname;
$_SESSION['email']=$email;
$_SESSION['password']=$password;
$_SESSION['phone']=$phone;
$_SESSION['gender']=$gender;
$_SESSION['birthofdate']=$birthofdate;
$_SESSION['role']=2;
echo"<script>alert('Your Account has submitted Successfully!')</script>";

header("location:index.php");

}}
else{
  echo"<script>alert('Please all fields Required!')</script>";
}

?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign Up</title>
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
    input[type=text], input[type=password],input[type=email] {
    width: 60%;
    padding: 12px 20px;
    display: flex;
    margin: auto;
    display: inline-block;
    border-radius:15px;
        font-size: 13px;
    border: 1px solid #ccc;
    }
    button{
    border-radius:25px;
    width: 50%;
    height: 30px;
    border: none;
    cursor: pointer;
    color: white;
    background-color: darkblue;
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
      color: black;
    }
    #birthofdate
    {
    width: 50%;
    padding: 12px 20px;
    display: flex;
    margin: auto;
    display: inline-block;
    border-radius:15px;
        font-size: 13px;
    border: 1px solid #ccc;
    }
.error-text {
	text-align: right;
	bottom: 0;
	right: 0;
	font-size: .8rem;
	font-style: italic;
	color: hsl(0, 100%, 74%);
	font-weight: 500;
}
.error-icon {
	position: absolute;
	top: 0;
	right: 20px;
	top: 28%;
}
.field-group.error .error-text,
.field-group.error .error-icon{
	display: block;
}
.field-group.error input {
	border: 2px solid hsl(0, 100%, 74%);
}
.error-icon,
.error-text{
	display: none;
}
.email-ok{
  color:green;

}
.email-wrong{
  color:red;
}
#gender{
      width: 60%;
    padding: 12px 20px;
    display: flex;
    margin: auto;
    display: inline-block;
    border-radius:15px;
        font-size: 13px;
    border: 1px solid #ccc;
    }
  </style>

</head>
<body>
<div class="container">
<form action="" method="POST" name="form" >
  <h1>Sign Up</h1>
  <br>
  <div class="field-group">
  <label for="fullname"> Full Name:</label>
<input type="text" name="fullname" placeholder="Full Name" id="fullname" ><br><br>
<img src="icon-error.svg" class="error-icon" alt="pci">
<p class="error-text">First Name cannot be empty</p>          
</div> 
<div class="field-group">
  <label for="username"> username:</label>
<input type="text" name="username" placeholder="User Name" id="username" ><br><br>
<img src="icon-error.svg" class="error-icon" alt="pci">
<p class="error-text">User Name cannot be empty</p>          
</div> 
<div class="field-group">
<label for="phone"> Phone Number:</label>
<input type="text" name="phone" placeholder="Phone Number" id="phone"><br><br>
<img src="icon-error.svg" class="error-icon" alt="">
<p class="error-text">Phone Number cannot be empty</p>              
</div>
<div class="field-group">
 <label for="email"> Email:</label>
<input type="email" name="email" placeholder="Email Address" id="email" ><br><br>
<img src="icon-error.svg" class="error-icon" alt="">
<p class="error-text">Looks like this is not email</p>              
</div> 
<div class="field-group">
<label for="password"> Password:</label>
<input type="password" name="password" placeholder="Password"  maxlength="30" id="password"><br><br>
<img src="icon-error.svg" class="error-icon" alt="">
<p class="error-text">Password cannot be empty</p>
</div> 
<div class="field-group">
<label for="confirmpassword"> Confirm Password:</label>
<input type ="password" name="confirmpassword" placeholder="Confirm Password"  maxlength="30" id="confirmpassword"> <br><br>
<img src="icon-error.svg" class="error-icon" alt="">
<p class="error-text">Password cannot be empty</p>    
</div>
<label for="birthofdate">Birth Of Date:</label>
<input type="date" id="birthofdate" name="birthofdate">
<br><br>
<label for="gender">Gender:</label>
<select id=gender name="gender" placeholder="Gender">
<option>Not Specified</option>
<option> Male</option>
<option>Female</option>
</select>
 <br><Br>
 <!--<label for="Image"><b>Insert your picture</b></label>
  <input type="file" name="img" accept="image/*"   required /><br>-->
  <br>  <br>
<button type="submit" class="button" name="signup" id="submit">Sign Up</button><br><br>
<p><b>Already have an account?</b></p><button class="button" onclick="window.location.href='signin.php'">Sign in</button>
</form>
</div>

</body>
</html>
