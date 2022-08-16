<?php
session_start();
include "nav.php";
include"header.php";
$connect=mysqli_connect("localhost","root","","medical care");
$nameErr = $emailErr = $passErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
if(isset($_POST['signup'])){
if(empty($_POST['fullname'])||empty($_POST['phone'])||empty($_POST['email'])||empty($_POST['password'])||empty($_POST['confirmpass'])){
  echo'<script>alert("PLease All Inputs Reqiured")</script>';
}else{

$fullname= $_POST["fullname"];
$password = $_POST["password"];
$confirmpassword=$_POST["confirmpass"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$birthofdate=$_POST['birthofdate'];
$gender=$_POST['gender'];
$img = $_POST['img'];
$_SESSION["fullname"]=$fullname;
$_SESSION["email"]=$email;
$_SESSION["password"]=$password;
$_SESSION["phone"]=$phone;
$_SESSION["Role"]=3;
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
  if(!empty($_POST["email"])) {
    $query = "SELECT * FROM users WHERE email='" . $_POST["email"] . "'";
    $result = mysqli_query($connect,$query);
    $count = mysqli_num_rows($result);
    if($count>0) {
      echo "<script> Sorry Email already exists .</script>";
      //echo "<script>$('#submit').prop('disabled',true);</script>";
    }else{
      //echo "<span style='color:green'> User available for Registration .</span>";
      //echo "<script>$('#submit').prop('disabled',false);</script>";
    }
  }
	if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
	
    echo '<script>alert("Wrong email format");window.location.href="doctorSignup.php";</script>';
  }
  if(strlen("$password")<6)
  {
    echo '<script>alert("Password must be at least 6 characters");window.location.href="doctorSignup.php";</script>';
  }
  else if($confirmpassword!=$password)
  {
    echo '<script>alert("Passwords Must Match");window.location.href="doctorSignup.php";</script>';
  }
  else{

 

$sql="INSERT INTO users (fullname,phone,email,password,birthofdate,gender,role,img) values ('$fullname','$phone','$email','$password','$birthofdate','$gender','3','$img')";
  }
$result=mysqli_query($connect,$sql);
if(!$result){
	echo "Error inserting into database";
}
header("location:signin.php");
}
}


?>
<html>
  <head>
    <title>signUp</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
	color: red;
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
    .custom-file-input::-webkit-file-upload-button {
  visibility: hidden;
}
.custom-file-input::before {
  content: 'Select some files';
  display: inline-block;
  background: linear-gradient(top, #f9f9f9, #e3e3e3);
  border: 1px solid #999;
  border-radius: 3px;
  padding: 5px 8px;
  color :white ;
  background-color: darkblue;
  outline: none;
  white-space: nowrap;
  -webkit-user-select: none;
  cursor: pointer;
  text-shadow: 1px 1px #fff;
  font-weight: 700;
  font-size: 10pt;
}
.custom-file-input:hover::before {
  border-color: black;
}
.custom-file-input:active::before {
  background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
}
 /* Change dissabled Button color  */
 #submit:disabled{
       background-color: red;
      opacity:0.5;   
}

  </style>
 <link rel="stylesheet" href="CSS/authenticate.css">
        <!-- links for the font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- link for the ajax -->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
</head>
<body>
 <br><br>
  <div>

<form action="" method="post"  enctype = "multipart/form-data" name="form">
<h1>SignUP</h1>


<input type="text" name="fullname" placeholder="Full name" id="fullname" ><br><br>
<span class="error">

<input type="text" name="phone" placeholder="Phone number"id="phone" ><br><br>
<span class="error">
<input type="text" name="email" placeholder="Email address"id="email" onInput="checkemail()"/><br><br>
<span id="check-email"></span>
<span class="error">
<input type="password" name="password" placeholder="Password" id="password" maxlength="30" ><br><br>
<span class="error">

<input type ="password" name="confirmpass" placeholder="Confirm Password" id="confirmpass" maxlength="30" > <br><br>
<span class="error">

<label for="birthofdate">Birth Of Date:</label>
<input type="date" id="birthofdate" name="birthofdate" max="2004-1-1" placeholder="Date Of Birth"><br>
<br><label for="gender">Gender:</label>
<select id=gender name="gender" placeholder="Gender">
<option>Not Specified</option>
<option> Male</option>
<option>Female</option>
</select><br>
<span class="error">

 <br><label for="Image"><b>Insert your picture</b></label>

  <input type="file" name="img" accept="image/*" class="custom-file-input"  /><br>
  <br>  <br>
<button type="submit" class="button" name="signup">Sign Up</button><br>
Already have an account?<br><button type="submit" class="button" onclick="window.location.href='/signin.php'">Sign in</button>
</form>

</div>
</body>

<script>
function checkemail() {
    
    jQuery.ajax({
    url: "uploadSignup.php",
    data:'email='+$("#email").val(),
    type: "POST",
    success:function(data){
        $("#check-username").html(data);
    },
    error:function (){}
    });
}
</script>
</html>