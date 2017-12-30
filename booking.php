<?php
session_start();
$conn = new mysqli("localhost","root","admin","bms");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		} 
	$mname =  $_COOKIE["mname"];
    $tname =  $_COOKIE["tname"];
    $time = $_COOKIE["time"];
    $tickets = $_COOKIE["tickets"];
	$sql = "SELECT mid FROM movie WHERE mname = '$mname'";
                    	$result = $conn->query($sql);
                        while($row = mysqli_fetch_assoc($result))
                        {$mid = $row['mid'];}	
    $sql1 = "SELECT tid FROM theatre WHERE tname = '$tname'";
                    	$result1 = $conn->query($sql1);
                        while($row1 = mysqli_fetch_assoc($result1))
                        {$tid = $row1['tid'];}
    $sql2 = "SELECT Sid FROM Shows WHERE tid = $tid AND mid = $mid AND timing = '$time'";
                    	$result2 = $conn->query($sql2);
                        $row = mysqli_fetch_assoc($result2);
                        $sid = $row['Sid'];
if(isset($_POST["submit"]))
{
    $checkbox=array();
    if(isset($_POST["checkbox"]))
    $checkbox= $_POST["checkbox"];
    if(sizeof($checkbox) == $tickets){
        $checkbox = $_POST["checkbox"];
        for($i=0;$i<$tickets;$i++)
        setcookie('checkbox', json_encode($checkbox), time()+3600);
        if(isset($_SESSION["userid"]))
        header('Location:receipt.php');
        else
        header('Location:login.php');
       } else { 
          echo "<script type='text/javascript'>alert(\"Please select $tickets seats !\");</script>";
       } 
}
?>
<html>
<title>Book Tickets:Book my Show Lights Camera Action</title>
<meta content="Book My Show: Lights Camera Action's booking page to confirm the theatre, the movie, its timings and the number of tickets the customer is going to book."></meta>
<head><style>
#message{
    color:white;
    font-family:Georgia;
}
#row1{
	background:#191970;
}
#row2{
	background:#4169E1;
}
#row3{
	background: #00BFFF;
}
#row4{
	background: #00BFFF;
}
body{
	background-color: black;
	color:WHITE;
	}
fieldset{
	margin-top : 50px;
	margin-left: 450px;
	margin-right: 450px;
	padding-right:10px;
	border : 3px solid #1161ee;
	border-radius : 25px;
	
}
input[type="checkbox"]{
    -webkit-appearance: initial;
	
    appearance: initial;
    background: #6a6f8c;
    width: 60px;
    height: 60px;
    border-radius:5px;
    
    position: relative;
	  
}
#row1:checked{
	background:white;
	border:3px dashed #191970;
}
#row2:checked{
	background:white;
	border:3px dashed #4169E1;
}
#row3:checked{
	background:white;
	border:3px dashed #00BFFF;
}
#row4:checked{
	background:white;
	border:3px dashed #00BFFF;
}
input[type="checkbox"]:checked {
    background: gray;
	
}
input[type="checkbox"]:checked:after {
   
	border: 1px solid white;
    position: absolute;
    left: 50%;
    top: 50%;
    background: gray;
    transform: translate(-50%,-50%);
}
#button{
	cursor:pointer;
	border:none;
	padding:15px 20px;
	border-radius:25px;
background:rgba(255,255,255,.5);
}
#price1{
	background:#191970;
	border-radius:5px;
	border:none;
	color:white;
	height:50px;
	width:100px;
}
#price2{
	background:#4169E1;
	border-radius:5px;
	border:none;
	color:white;
	height:50px;
	width:100px;
}
#price3{
	background:#00BFFF;
	border-radius:5px;
	border:none;
	color:white;
	height:50px;
	width:100px;
}
#price{
	margin-left:1000px;
	margin-bottom:100px;
	margin-top:0px;
	width:100px;
}
</style></head>
<body>
<center>
<form action="<?=$_SERVER['PHP_SELF']?>" method = "POST">

<fieldset>
    <?php
    for($i=0;$i<4;$i++)
    {
        echo "<p>";
        for($j=1;$j<=5;$j++)
        {
            $v = ($i*5)+$j;
            $t=$i+1;
            $sql3 = "SELECT userid FROM seats WHERE sid = $sid AND seatid = $v";
                    	$result3 = $conn->query($sql3);
                        while($row3 = mysqli_fetch_assoc($result3))
                        $uid = $row3['userid'];
            if($uid>0)
            echo "<input type='checkbox' name='checkbox[]' id='row$t' value=$v checked disabled>";
            else
            echo "<input type='checkbox' name='checkbox[]' id='row$t' value=$v>";
        }
        echo "</p>";
    }
?>
<p hidden>book book book</p>
<p id="message"></p>&#8595 All eyes this way &#8595 </p>
</fieldset>
<br>

<input type="submit" value="Proceed" id="button" name = "submit">
</form>
</center>
<fieldset id="price">
<button id="price1">&#8377 250/-</button><br><br>
<button id="price2">&#8377 200/-</button><br><br>
<button id="price3">&#8377 150/-</button><br><br></fieldset>
</body>
</html>