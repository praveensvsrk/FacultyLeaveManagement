<?php
session_start();
if(!isset($_SESSION['user']) || strcmp($_SESSION['type'], "Admin") != 0)
	header('Location: logout.php');

?>
<html>

<head>
	<link href="css/style.css" rel="stylesheet" />
	<link href="css/theme.css" rel="stylesheet" />
	<title>
		Admin Dashboard
	</title>
	<style>
		a#link1 {
			color: #000000;
			background-color: #fff;
		}
		
		.psp {
			color: black;
			-webkit-text-fill-color: black;
			/* Will override color (regardless of order) */
			-webkit-text-stroke-width: 1px;
			-webkit-text-stroke-color: #004d89;
		}
	</style>
	<?php include("include/header.php");?>
</head>

<body class="fl-theme-k1">


	<div class="fl-center fl-xlmargin">
		<div class="fl-content  fl-section fl-display-container">

			<img class="fl-card-16 mySlides fl-animate-opacity fl-image" style="width:1000px;height:350px" src="images/trailimages/11.png">
			<img class="fl-card-16 mySlides fl-animate-opacity fl-image" style="width:1000px;height:350px" src="images/trailimages/mvgr1.png">
			<img class="fl-card-16 mySlides fl-animate-opacity fl-image" style="width:1000px;height:350px" src="images/trailimages/33.png">

			<p class="fl-xxlarge psp fl-center" style="position:absolute; top:100px; left: 0; right: 0;">
				Welcome,Admin
			</p>
		</div>

		<div class="fl-row-padding fl-margin-top">
			<a href="admin_details.php" class="fl-ripple fl-margin fl-hover-red fl-btn fl-xlarge">
			Details
		</a>
			<a href="summarize.php" class="fl-ripple fl-margin fl-hover-red fl-btn  fl-xlarge">
			Summarize
		</a>
			<a href="admin.php" class="fl-ripple fl-margin fl-hover-red fl-btn fl-xlarge">
			Handle Details 
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
		if (myIndex > x.length) {
			myIndex = 1
		}
		x[myIndex - 1].style.display = "block";
		setTimeout(carousel, 8000); // Change image every 2 seconds
	}
</script>


</html>