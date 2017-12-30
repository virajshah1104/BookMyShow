<?php
$conn = new mysqli("localhost","root","admin","bms");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		} 
session_start();
$bool = false;
?>
<html>
    <meta content="Book My Show allows you to book tickets for your favorite movies at different theaters in Mumbai at affordable prices. The prices vary according to the timings."
 </meta>
    <title>Lights Camera Action- Book your favorite movies
</title>
<head>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
<style>
body {
  background: url('gif.gif') no-repeat center center fixed;
 background-size: cover;
 margin: 0px;
 overflow : hidden;
 opacity : 0.8;
}
#opaquebox{
background-color: black;

padding: 0px;
margin: 0px;
height: 100%;
width: 100%;
opacity: 0.9;
;
}
.p1{
position: absolute;
margin-left: 37%;
margin-top: 23%;
	
	font-family: 'Parchment';
	font-size: 60px;
	}
.navbar {
    overflow: hidden;
    background-color: black;
    font-family: "Bookman Old Style";
		}

.navbar a {
    float: left;
    font-size: 16px;
    color: white;
    text-align: left;
    padding: 30px 50px;
    text-decoration: none;
	
}
.navbar abcde{
    float: left;
    font-size: 16px;
    color: white;
    text-align: left;
    padding: 30px 50px;
    text-decoration: none;
}

.dropdown {
    float: left;
    overflow: hidden;
}

.dropdown .dropbtn {
    font-size: 16px;    
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
	width : 250px;
	text-align:left;
}

.navbar a:hover, .dropdown:hover .dropbtn {
    background-color: gray;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: gray;
    width: 250px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
	height: 100%;
	
}


.dropdown-content a {
    float: none;
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    
}

.dropdown-content a:hover {
    background-color: gray;
	color:black;
}

.dropdown:hover .dropdown-content {
    display: block;
}
footer{
padding-top: 400px;
font-size: 12px;
margin-left: 9px;
text-align:left;
 }

 .abc{
    list-style-type: none;
    margin: 0px;
    padding: 0px;
    overflow: hidden;
    background-color: black;
    float: right;
	 font-family: "Bookman Old Style";

}

li {
    float: left;
}

li a {
    
    color: white;
    text-align: center;
    padding: 16px;
    text-decoration: none;
	}
	
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: yellow;
  border: none;
  color: black;
  text-align: center;
  font-size: 15px;
 font-family: "Bookman Old Style";
  font-weight: 500;
  width: 200px;
  height: 30px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
  margin-left: 570px;
  margin-top: 350px;
  
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
.submit  {
    background: rgba(255,255,255,0.0);
	
	border: none;
    color: white;
    
    text-decoration: none;
    position: relative;
	left: -60px;
	top: 8px;
    cursor: pointer;
    font-size: 16px;
	font-family: "Bookman Old Style";
}
.submit:hover  {
color: black;
}
.logout{
     text-align: center;
     font-size: 15px;
     font-family: "Bookman Old Style";
     color: white;
     background-color: black;
      display: inline-block;
        border: none;
    
    
}

</style>

</head>
<body>
    <p hidden id="s">show show</p>
<div id="opaquebox">
<p class="p1" ><font color="yellow">Lights.</font><font color="white">Camera.</font><font color="yellow">Action</font></p>
<?php
if(isset($_SESSION["userid"])){
    $v=$_SESSION["userid"];
    $sql = "SELECT username FROM user WHERE uid='$v'";
                    	$result = $conn->query($sql);
                        while($row = mysqli_fetch_assoc($result)){
                        $name = $row['username'];
                        }
echo "<div class='abc'><ul>";
    echo "<li><a>Welcome $name</a></li>";
    echo "<li><a href='logout.php'><button name='log' class='logout'>Logout</button></a></li>";
echo "</ul>";
echo "</div>";
}
else
{
    echo "<div class='abc'><ul>";
    echo "<li><a>Welcome user !</a></li>";
    echo "<li><a href='login.php'>Login</a></li>";
    echo "<li><a href='signup.php'>Signup</a></li>";
    echo "</ul>";
    echo "</div>";
}




?>

<div class="navbar">

  
  <div class="dropdown">
   
    <button class="dropbtn"> 
     <i class="fa fa-bars"></i>  <font style="Bookman Old Style">&nbsp&nbsp&nbsp Menu</font>
    </button>
    <center><div class="dropdown-content">
      <a href="#">My Account</a>
      <a href="bookingform.php">Book Tickets</a>
      <a href="contactus.php">Contact</a>
	  <a href="aboutus.php">About us</a>
  
	  <footer><font color="white">Copyright &copy All Rights Reserved </font></footer>
	 </div> 
  
    </div>
	
	</center>
	

</div>
  <button class="button" ><span><a href="movies.php">Look for Movies</a></span></button>
</div>

</body>
</html>