<?php
session_start();
if(!isset($_SESSION['user']) || strcmp($_SESSION['type'], "Admin") != 0)
	header('Location: logout.php');
?>

	<!doctype html>
	<html>

	<head>
		<link href="css/style.css" rel="stylesheet" />
		<link href="css/theme.css" rel="stylesheet" />
		<title> Handle details </title>
		<style>
			a#link4 {
				color: white;
				background-color: black;
				border-bottom:3px solid #fff;
			}
			
			.lbutton {
				padding: 15px 15px;
				width: 100px font-size: 24px;
				text-align: center;
				cursor: pointer;
				outline: none;
				color: #fff;
				background-color: #004d89;
				border: none;
				border-radius: 200px;
				box-shadow: 0 9px #999;
			}
			
			.lbutton:hover {
				background-color: #004d89
			}
			
			.lbutton:active {
				background-color: #004d89;
				box-shadow: 0 5px #666;
				transform: translateY(4px);
			}
			
			form {
				position: relative;
			}
			
			form div {}
			
			.scrollit {
				overflow: scroll;
				height: 345px;
			}
			
			form div.active {
				left: 0;
			}
		</style>
		<?php include("include/header.php");?>
		<?php include("include/admin_navigation.php");?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script>
			$('button').on('click', function(event) {
					event.preventDefault();
					$('form div').addClass('active');
				}

			);
		</script>
		<script>
			document.getElementById("header").className = "fl-left";

			function createJSON() {
				
				json = new Object();
				id = $('#id').val();
				name = $('#name').val();
				city = $('#city').val();
				type = $('#type').val();
				contact = $('#contact').val();
				email = $('#email').val();
				weekdays = new Object();
				sections = new Array();
				days = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat'];
				
				alert("Please verify and press OK");
				for (i = 0; i < days.length; i++) {
					$("input[id^='" + days[i] + "']:checked").each(function(item) {
							if (!(days[i] in weekdays))
								weekdays[days[i]] = new Array();
							weekdays[days[i]].push($(this).attr('id').split(' ')[1]);
					});
				}
				weekdays = JSON.stringify(weekdays)	;
				
				$("input[id^='1']:checked").each(function(item) {
							sections.push($(this).attr('id'));
				});
				$("input[id^='2']:checked").each(function(item) {
							sections.push($(this).attr('id'));
				});
				$("input[id^='3']:checked").each(function(item) {
							sections.push($(this).attr('id'));
				});
				$("input[id^='4']:checked").each(function(item) {
							sections.push($(this).attr('id'));
				});
				sections = sections.join(',');
				data= { 
					"id": id,
					"name": name,
					"city": city,
					"type": type,
					"contact": contact,
					"email": email,
					"freehours": weekdays,
					"sections": sections
				}
				$('#aiding_input').val(JSON.stringify(data));
				$('#aiding_form').submit();
				
			}
			

		</script>
	</head>

	<body class="fl-theme-k1">
		<h1></h1>
		<div style="width:80%" class="fl-content fl-theme-d5 fl-card-4">
			<h1 class="fl-center"><b>Admin</h1> </div>
		<h1></h1>
		<div style="width:80%" class="fl-content fl-center fl-theme-l5 fl-card-4">
			<div class="fl-container">
				<p>
					<center>
						<input id="input_id" name='display_user' class="fl-input fl-center fl-animate-input" placeholder="Faculty ID" onkeypress="handle(event)" type="text" style="width:30%"></p>
				<button onclick="handleAjaxRequest();" id="id_of_button" class="lbutton"><span>Get!</span></button>
			</div><br/>
			<div id="details" class="fl-container"> </div>
			<div class="fl-hide">
				<form id="aiding_form" action="modify_faculty.php" method="post">
					<input id="aiding_input" type="text" name="data" value=""/>
				</form>
				
			</div>
			
	</body>
	<script>
		function handleAjaxRequest() {
			$.post("fetch_myfacultydata.php", {
					display_user: $('#input_id').val()
				},
				function(data, status) {
					$('#details').html(data);
				});
		}
	</script>
	<script>
		function dropFunction(id) {
			id = id.split(' ')[0];
			var x = document.getElementById(id);
			if (x.className.indexOf("fl-show") == -1) {
				x.className += " fl-show";
			} else {
				x.className = x.className.replace(" fl-show", "");
			}
		}
	</script>

	</html>