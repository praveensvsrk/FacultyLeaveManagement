<?php session_start(); ?>

<!doctype html>

<html>

<head>
	<link href="css/style.css" rel="stylesheet" />
	<link href="css/theme.css" rel="stylesheet" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<title>
		Notification Center
	</title>
	<style>
		a#link3,
		a#link8 {
			border-bottom: 3px solid #fff;
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
		selected = '';
		status = '';
		function view_application(id) {
			selected = id;
			text = $("div[id=" + id + "]").html();


			$('#appl_text_modal').show();
			$('#appl_text').html(text);
			$('#id_heading').html(id);
			if(status != "Accepted" && status != "Declined" && status != "HOD")
				$('#cancel').show();
			if(status == "Confirm")
				$('#send').show();
		}

		function handleRequest(str) {
			confirmed = confirm("Are you sure?");
			if (!confirmed)
				return;

			data = {
				id: selected,
				action: str
			}

			$('#aiding_input').val(JSON.stringify(data));
			$('#aiding_form').submit();
			//location.reload();
		}

		function openTab(evt, tabName) {
			status = tabName;
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
			
			$.post("fetch_application.php", {data : tabName}, function(data, status){
				$('#'+tabName).html(data);
			});
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

					<a href="javascript:void(0)" onclick="openTab(event, 'All');">
						<div class="fl-col l2 tablink fl-bottombar fl-hover-light-grey fl-padding">All</div>
					</a>


					<a href="javascript:void(0)" onclick="openTab(event, 'Pending');">
						<div class="fl-col l2 tablink fl-bottombar fl-hover-light-grey fl-padding">Pending</div>
					</a>

					<a href="javascript:void(0)" onclick="openTab(event, 'Confirm');">
						<div class="fl-col l2 tablink fl-bottombar fl-hover-light-grey fl-padding">Confirm</div>
					</a>

					<a href="javascript:void(0)" onclick="openTab(event, 'HOD');">
						<div class="fl-col l2 tablink fl-bottombar fl-hover-light-grey fl-padding">HOD Confirmation</div>
					</a>

					<a href="javascript:void(0)" onclick="openTab(event, 'Accepted');">
						<div class="fl-col l2 tablink fl-bottombar fl-hover-light-grey fl-padding">Accepted</div>
					</a>

					<a href="javascript:void(0)" onclick="openTab(event, 'Declined');">
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
				<div id="All" class="fl-container category" style="display:none">
				</div>

				<div id="Pending" class="fl-container category" style="display:none">
				</div>

				<div id="Confirm" class="fl-container category" style="display:none">
				</div>

				<div id="HOD" class="fl-container category" style="display:none">
				</div>

				<div id="Accepted" class="fl-container category" style="display:none">
				</div>

				<div id="Declined" class="fl-container category" style="display:none">
				</div>
			</div>
		</div>
	</div>
	</div>

	<div style="display:none" id="appl_text_modal" class="fl-modal fl-animate-opacity">
    <div class="fl-modal-content fl-card-8">
      <header class="fl-container fl-theme-dark"> 
        <span onclick="document.getElementById('appl_text_modal').style.display='none'" 
        class="fl-closebtn">&times;</span>
        <h2 id="id_heading"></h2>
      </header>
      <div id="appl_text" class="fl-container">
      </div>
      <footer class="fl-container fl-theme-dark">
        	<div id="buttons">
						<button style="display:none" onclick="handleRequest('cancel')" id="cancel" class="fl-btn fl-round fl-red fl-margin">
							Cancel
						</button>
						<button style="display:none" onclick="handleRequest('send')" id="send" class="fl-btn fl-round fl-green fl-margin">
							Send to HOD
						</button>	
					</div>
      </footer>
    </div>
  </div>


	<div class="fl-hide">
		<form id="aiding_form" action="modify_application.php" method="post">
			<input id="aiding_input" type="text" name="data" value="" />
		</form>
	</div>
</body>
<script>
	$(document).ready(function() {
		openTab(event, 'All');
	});
</script>

</html>