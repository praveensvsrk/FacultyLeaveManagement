<html>
<?php session_start(); 
if(!isset($_SESSION['user']))
  header('Location: '.'login.html');
?>
<head>
	<link href="css/style.css" rel="stylesheet" />
	<link href="css/theme.css" rel="stylesheet" />
	<title>
		Faculty Dashboard
	</title>
	<style>
		a#link1 {
			color: #000000;
			background-color: #fff;
		}
		.psp {
   color: black;
   -webkit-text-fill-color: black; /* Will override color (regardless of order) */
   -webkit-text-stroke-width: 1px;
   -webkit-text-stroke-color: #004d89;
}
	</style>
	<?php include("include/header.php");?>
</head>

<body class="fl-theme-k1">

	
	<div  class="fl-center fl-xlmargin">
		<div class="fl-content  fl-section fl-display-container">

			<img class="fl-card-16 mySlides fl-animate-opacity fl-image" style="width:1000px;height:350px" src="images/trailimages/11.png">
			<img class="fl-card-16 mySlides fl-animate-opacity fl-image" style="width:1000px;height:350px" src="images/trailimages/mvgr1.png">
			<img class="fl-card-16 mySlides fl-animate-opacity fl-image" style="width:1000px;height:350px" src="images/trailimages/33.png">

			<p class="fl-xxlarge fl-center psp" style="position:absolute; top:100px; left: 0; right: 0;">
				<?php
					echo "Welcome, " . $_SESSION['name'];
				?>
			</p>
		</div>
	
	<div class="fl-row-padding fl-margin-top">
		<a href="details.php" class="fl-ripple fl-margin fl-hover-red fl-btn fl-xlarge">
			Details
		</a>
		<a href="new_application.php" class="fl-ripple fl-margin fl-hover-red fl-btn  fl-xlarge">
			New Leave Application
		</a>
		<a href="track_application.php" class="fl-ripple fl-margin fl-hover-red fl-btn fl-xlarge">
			Track Application
		</a>
		<a href="notification.php" class="fl-ripple fl-margin fl-hover-red fl-btn fl-xlarge">
			Notification Center
		</a>
	</div>
	</div>
	
</body>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 8000); // Change image every 2 seconds
}
</script>


</html>