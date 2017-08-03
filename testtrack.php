<!doctype html>

<html>

<head>
	<link href="css/style.css" rel="stylesheet" />
	<link href="css/theme.css" rel="stylesheet" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<title>
		Application Tracking
	</title>
	<style>
		a#link4, a#link9 {
			border-bottom:3px solid #fff;
		}
		
		.fl-mcontent {
			max-width: 10000px;
			margin: auto
		}
	</style>
	<?php include("include/header.php");?>
	<?php include("include/navigation.php");?>
	<script>
		document.getElementById("header").className = "fl-left";
	</script>
	<script>
		function openTab(evt, tabName) {
			var i, x, tablinks;
			x = document.getElementsByClassName("category");
			for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";
			}
			tablinks = document.getElementsByClassName("tablink");
			for (i = 0; i < x.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" fl-border-blue", "");
			}
			document.getElementById(tabName).style.display = "block";
			evt.currentTarget.firstElementChild.className += " fl-border-blue";
		}
	</script>
</head>

<body class="fl-theme-k1">

	<div style="width:80%" class="fl-content fl-theme-d5 fl-card-4">
		<h1 class="fl-center"><b>Track Applications</h1></div>
	<h1></h1>
	<div style="width:90%" class="fl-mcontent fl-theme-d5 fl-card-4">
		<div style="height:80%;" class="fl-container">
			<h1></h1>
			<div class="fl-row">
				<div class="fl-col s12 m4 l4">
					<h2 class="fl-left"><b>Status:</h2>
				</div>
			</div>
			<div class="fl-container">
				<div class="fl-row">

					<a href="javascript:void(0)" onclick="openTab(event, 'all');">
						<div class="fl-col l2 tablink fl-bottombar fl-hover-light-grey fl-padding">ALL</div>
					</a>


					<a href="javascript:void(0)" onclick="openTab(event, 'pending');">
						<div class="fl-col l2 tablink fl-bottombar fl-hover-light-grey fl-padding">Pending</div>
					</a>

					<a href="javascript:void(0)" onclick="openTab(event, 'my_confirmation');">
						<div class="fl-col l2 tablink fl-bottombar fl-hover-light-grey fl-padding">MY Confirmation</div>
					</a>

					<a href="javascript:void(0)" onclick="openTab(event, 'hod_confirmation');">
						<div class="fl-col l2 tablink fl-bottombar fl-hover-light-grey fl-padding">HOD Confirmation</div>
					</a>

					<a href="javascript:void(0)" onclick="openTab(event, 'accepted');">
						<div class="fl-col l2 tablink fl-bottombar fl-hover-light-grey fl-padding">Accepted</div>
					</a>

					<a href="javascript:void(0)" onclick="openTab(event, 'declined');">
						<div class="fl-col l2 tablink fl-bottombar fl-hover-light-grey fl-padding">Declined/Canceled</div>
					</a>
				</div>
				<h1></h1>
			</div>
		</div>
	</div>
	<h1></h1>
	<div style="width:90%" class="fl-mcontent fl-text-theme fl-theme-l5 fl-card-4">
		<div style="height:80%;" class="fl-container fl-center">
			<h1></h1>
			<div class="fl-container">
				<div id="all" class="fl-container category" style="display:none">
					<h2>London</h2>
					<p>London is the capital category of England.</p>
				</div>

				<div id="pending" class="fl-container category" style="display:none">
					<h2>Paris</h2>
					<p>Paris is the capital of France.</p>
				</div>

				<div id="my_confirmation" class="fl-container category" style="display:none">
					<h2>my confirm</h2>
					<p>Tokyo is the capital of Japan.</p>
				</div>

				<div id="hod_confirmation" class="fl-container category" style="display:none">
					<h2>hod confirm</h2>
					<p>Tokyo is the capital of Japan.</p>
				</div>

				<div id="accepted" class="fl-container category" style="display:none">
					<h2>accepted</h2>
					<p>Tokyo is the capital of Japan.</p>
				</div>

				<div id="declined" class="fl-container category" style="display:none">
					<h2>declined</h2>
					<p>Tokyo is the capital of Japan.</p>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>
<script>
$(document).ready(function() {
			openTab(event, 'all');
		});
</script>
</html>