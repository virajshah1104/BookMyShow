<!DOCTYPE html>
<html>
<head>
<style>
img{
    height: 50px;
    width: 50px;
    }
body{
	background:url("c.png");
	color: #008CBA;
	background-repeat:no-repeat;
	ba
}
h1{
	font-family:cursive;
	font-size:45px;
}
.container {
  position: relative;
  width: 50%;
  margin-left:0px;
  margin-right:800px;
  float:left;
}

.image {
  width: 50%;
  height: auto;   
  border-radius:100px;

}
.overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: #008CBA;
  border-radius:100px;
  overflow: hidden;
  width: 0;
  height: 100%;
  transition: .5s ease;
  opacity:0.8;
}

.container:hover .overlay {
  width: 30%;
}

.text {
  white-space: nowrap; 
  color: white;
  font-size: 20px;
  position: absolute;
  overflow: hidden;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.description{
	margin-top:50px;
	margin-right:250px;
	float:right;
}

</style>
</head>
<body>
    <a href="homepage.php"><img src="home.png">
</a>
<center><h1>About Us</h1></center>
<div class="container">
  <img src="drishti.jpg" style="height:200px; width:200px;" alt="Avatar" class="image">
  <div class="overlay">
    <div class="text">Drishti Shah</div>
  </div>
</div>
<div class="container">
  <img src="nida.jpg" alt="Avatar" style="height:200px; width:200px;" class="image">
  <div class="overlay">
    <div class="text">Nida Shah</div>
  </div>
</div>
</body>
</html>
