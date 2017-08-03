<?php
session_start();
// if(!isset($_SESSION['user']) || strcmp($_SESSION['type'], "HOD") != 0)
// 	header('Location: logout.php');
?>
<!doctype html>

<html>

<head>
	<link href="css/style.css" rel="stylesheet" />
	<link href="css/theme.css" rel="stylesheet" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<title>
		Application Sanctioned
	</title>
	<style>
		a#link3 {
			border-bottom:3px solid #fff;
		}
		
		.fl-mcontent {
			max-width: 10000px;
			margin: auto
		}
	</style>
	<?php include("include/header.php");?>
	<?php include("include/hod_navigation.php");?>
	<script>
		document.getElementById("header").className = "fl-left";
	</script>
	<script>
		// Get the modal
		var modal = document.getElementById('appl_text_modal');

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
		
		function view_application(id) {
			text = $("div[id=" + id + "]").html();
			$('#appl_text_modal').show();
			$('#appl_text').html(text);
			$('#id_heading').html(id);
		}
		$.post("fetch_application.php", {}, function(data, status){
			$('#applications').html(data);
		});
	</script>
</head>

<body class="fl-theme-k1">

	<div style="width:80%" class="fl-content fl-theme-d5 fl-card-4">
		<h1 class="fl-center"><b>Applications Sanctioned</h1></div>
	<h1></h1>
	<div style="width:90%" class="fl-mcontent fl-text-theme fl-theme-d5 fl-card-4">
		<div style="height:80%;" class="fl-container fl-center">
			<h1></h1>
			<div id="applications">

				
			</div>
		</div>
	</div>
	<!-- Model code -->
	<div id="appl_text_modal" class="fl-modal">
		<div class="fl-modal-content fl-text-theme fl-card-8 fl-animate-top">
			<header class="fl-container fl-theme-d5">
				<span onclick="document.getElementById('appl_text_modal').style.display='none'" class="fl-closebtn">&times;</span>
				ID:<h2 id="id_heading"></h2>
			</header>
			<div id="appl_text" class="fl-container">
				
			</div>
		</div>
	</div>
	</div>
</body>

</html>