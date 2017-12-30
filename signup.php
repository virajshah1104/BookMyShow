<?php
$err = array("","","","");
if(isset($_POST["submit"])){
    $check = false;
if (empty($_POST["name"])) { $err[0] = "* Name is required"; } else { $name = $_POST["name"]; if (!preg_match("/^[a-zA-Z ]*$/",$name)) { $err[1] = "* Only letters and white space allowed";}}
if (empty($_POST["email"])) { $err[1] = "* Email Id is required"; } else { $email = $_POST["email"]; if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $err[0] = "* Invalid email format"; }}
if (empty($_POST["pass"])) { $err[2] = "* Password is required"; } else { $pass = $_POST["pass"]; if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $pass)) { $err[2] = "* Invalid password format"; }}
if (empty($_POST["retypepass"])) { $err[3] = "* Confirm Password required"; } else { $retypepass = $_POST["retypepass"]; if($pass != $retypepass){ $err[3] = "* Password and Confirm password do not match";}}
for($i=0;$i<4;$i++)
    if($err[$i] != "")
    {
        $check = true;
        break;
    }

if($check == false)
{
	$conn = new mysqli("localhost","root","admin","bms");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		} 
	$sql = "INSERT INTO user(username,email,password) VALUES('$name','$email','$pass')";
	$result =  $conn->query($sql);
	if($result){
	    $sql1 = "SELECT * FROM user WHERE email = '$email'";
	$result1 = $conn->query($sql1);
    $row1 = mysqli_fetch_assoc($result1); 
    $uid = $row1['uid'];
	$conn->close();	
	session_start();
	$_SESSION["userid"] = $uid;
	header('Location: homepage.php');	
	}		
	else
	$err[1] = "* Email already used";
}
}
?>
<html>
<body>
    <a href="homepage.php"><img src="home.png">
</a>
<head>
  <meta charset="UTF-8">
  <title>Sign up Form</title>

      <link rel="stylesheet" href="css/style.css">

  <style>
    img{
    height: 50px;
    width: 50px;
    }
    </style>
</head>


 <div class="login-wrap">
	<div class="login-html">
	
<div class="login-form">
<div class="sign-up-htm">
<form action="login.php">
<input type="submit"  class="button1" name="signin"  value="Sign in">

</form>
			<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
				<div class="group">
					<input id="user" type="text" class="input" placeholder="Username" name="name" autofocus>
					<span class="error"><?php echo $err[0]; ?></span>
				</div>
				<div class="group">
					
					<input id="pass" type="text" class="input" placeholder="Email id" name="email">
					<span class="error"><?php echo $err[1]; ?></span>
				</div>
				<div class="group">
					
					<input id="pass" type="password" class="input" data-type="password" placeholder="Password" name="pass">
					<span class="error"><?php echo $err[2]; ?></span>
				</div>
				<div class="group">
					
					<input id="pass" type="password" class="input" data-type="password" placeholder="Confirm Password" name="retypepass">
					<span class="error"><?php echo $err[3]; ?></span>
				</div>
				
				<div class="group">
					<input type="submit" class="button" value="Sign Up" name="submit">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="login.php" >Already a member?</a>
				</div>
				</div>
				</div>
				</div>
</form>
</body>
</html>