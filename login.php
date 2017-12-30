<?php
$err = array("","");
if(isset($_POST["submit"])){
    $check = false;
if (empty($_POST["email"])) { $err[0] = "* Email is required"; } else { $email = $_POST["email"];}
if (empty($_POST["pass"])) { $err[1] = "* Password is required"; } else { $pass = $_POST["pass"];}
	for($i=0;$i<2;$i++)
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
	$sql = "SELECT * FROM user WHERE email = '$email'";
	$result = $conn->query($sql);
	if($result){
    $row = mysqli_fetch_assoc($result); 
        $uid = $row['uid'];
        $name = $row['username'];
		$password = $row['password'];
	if($pass != $password)
	{
	    $err[1] = "* Wrong Password. Please try again.";
	}
	else
	{
	$conn->close();
	session_start();
	$_SESSION["userid"] = $uid;
	header('Location: homepage.php');	
	}
	}
	else{
	$err[0] = "* No user found";
	}
}
}
?>
<html>
<head>
    <style>
    img{
    height: 50px;
    width: 50px;
    }
    </style>
  <meta charset="UTF-8">
  <title>Login Form</title>

      <link rel="stylesheet" href="css/style.css">

  
</head>
<body>
<a href="homepage.php"><img src="home.png">
</a>
 <div class="login-wrap">
	<div class="login-html">
	
<div class="login-form">
<div class="sign-in-htm">
<form action="signup.php">
<input type="submit"  class="button1" name="signin"  value="Sign Up">

</form>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
			
				<div class="group">
					
					<input id="user" type="text" class="input" name="email" placeholder="Email" autofocus>
					<span class="error"><?php echo $err[0]; ?></span>
				</div>
				<div class="group">
					
					<input id="pass" type="password" class="input" data-type="password" placeholder="Password" name="pass">
					<span class="error"><?php echo $err[1]; ?></span>
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In" name="submit">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Forgot Password?</a>
				</div>
			</div>
		</form>
		</body>
		</html>