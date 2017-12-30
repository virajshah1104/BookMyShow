<?php
if(isset($_POST["sub"])){
    setcookie("mname", $_POST["movie_name"], time() + (86400), "/");
    setcookie("tname", $_POST["theatre"], time() + (86400), "/");
    setcookie("tickets", $_POST["tickets_quantity"], time() + (86400), "/");
    setcookie("time", $_POST["movie_timing"], time() + (86400), "/");
    header('Location:booking.php');
}
$conn = new mysqli("localhost","root","admin","bms");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		} 
?>
<html>
    <title>BOOKING LAYOUT: LIGHTS CAMERA ACTION</title>
<body>
<head>
    <meta content="The booking layout of Lights Camera Action shows the layout of the theatre. The legend defines the price of a seat. Prices change according to the time."></meta>
    <style>
    option{
    color : BLACK;]
    }
    </style>
  <meta charset="UTF-8">
  <title>Booking Form</title>

      <link rel="stylesheet" href="css/style.css">
</head>

<fieldset>
 <div class="login-wrap">
	<div class="login-html">
	
<div class="login-form">
<div class="sign-up-htm">
			<form action="<?=$_SERVER['PHP_SELF']?>" method = "POST">
				<div class="group">
					
					<p>
					 <label for="movie_name">&nbsp&nbspSelect Movie</label><br>
					<select id="movie_name" name="movie_name" class="input" autofocus>
					    <?php
					    $sql = "SELECT mname FROM movie";
                    	$result = $conn->query($sql);
                        while($row = mysqli_fetch_assoc($result)){
                        $name = $row['mname'];
                        echo "<option value='$name'>$name</option>";}
                        ?>
					</select>
					</p>
					
							</div>
							<div class="group">
								<p>
					  <label for="theaters">&nbsp&nbspSelect Theater</label><br>
					  <select id="theaters" class="input" name = "theatre">
						<?php
					    $sql = "SELECT tname FROM theatre";
                    	$result = $conn->query($sql);
                        while($row = mysqli_fetch_assoc($result)){
                        $name = $row['tname'];
                        echo "<option value='$name'>$name</option>";}
                        ?>
					  </select>
					</p>
				</div>
				<div class="group">
					
					<p>
					 <label for="movie_name">&nbsp&nbspTimings</label><br>
					<select id="movie_name" name="movie_timing" class="input">
					    <?php
					    
                        $tim=array("9:30 AM","1:45 PM","8:00 PM");
                        for($i=0;$i<3;$i++)
                        {
                            echo "<option value='$tim[$i]'>$tim[$i]</option>";
                        }
                        ?>
					</select>
					</p>
					
							</div>
				
				<div class="group">
								
								 <p>
								  <label for="tickets_quantity">&nbsp&nbspNumber Of Tickets</label><br>
								  <input type="number" min="1" max = "20" name="tickets_quantity" class="input" id="tickets_quantity" value = "2"/>
								</p>
				</div>
				
				<div class="group">
					 <input type="submit" class="button" value="Book Seats" name = "sub">
				</div>
				
				</div>
				</div>
				</div>
				</fieldset>
</form>
<?php
$conn->close();
?>
</body>
</html>