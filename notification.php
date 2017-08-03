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
		a#link4,
		a#link9 {
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
		function view_notif(id) {
			selected = id;
			text = $("div[id=" + id + "]").html();
			text = text.replace(",", "<br/>").replace(/,/g, "");
			text = text.replace(/Date:/g, "<br /><span class=\"fl-margin fl-text-black\">Date: </span>").replace(/Time:/g, "<span class=\"fl-margin fl-text-black\">Time: </span>")
				.replace(/Section:/g, "<span class=\"fl-margin fl-text-black\">Section: </span>");

			$('#notif_text').html(text);
			$('#buttons').show();
		}
		
		function handleRequest(str){
			confirmed = confirm("Are you sure?");
			if(!confirmed)
				return;
			
			data= { 
				"status": str, 
				"id": selected
			}
			
			$('#aiding_input').val(JSON.stringify(data));
			$('#aiding_form').submit();
		}
		
		
	</script>
</head>

<body class="fl-theme-k1">

	<div class="fl-row">
		<div style="padding-left:0; width:20%" class="fl-container fl-quarter">
			<nav class="fl-sidenav  fl-card-8 fl-theme-d5" style="width:20%">
				<h1></h1>
				<div class="fl-card-4 fl-center fl-content fl-theme-l5" style="width:260px;height:70px">
					<div class="fl-container fl-center">
						<h2>Requests</h2>
					</div>
				</div>
				<h1></h1>
				
				<?php 
					$servername = "localhost";
					$username = "root";
					$password = "";

					$conn = new mysqli($servername, $username, $password);
					mysqli_select_db($conn,"FLT");

					if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
					}
					$user = $_SESSION["user"];
					$sql = "SELECT * FROM `Notification` where recipient_id = '$user'";
					$result = $conn->query($sql);

					if($result){
						while($row = $result->fetch_assoc()){
							echo '<div style="" class="fl-container"><div  class="fl-card-4 fl-center fl-content fl-theme">
										<div class="fl-container fl-center">';
							echo "<h4>ID: " . $row['notification_id'] . "</h4>";
							$id = $row['id'];
							$sql = "SELECT name FROM `Faculty` where id = '$id'";
							$result2 = $conn->query($sql);
							$row2 = $result2->fetch_assoc();

							$faculty = $row2['name'];
							$msg = json_decode($row['message'], true);
							$message = "You have received a substitution request from $faculty:<br/>";
							foreach($msg as $date_hour => $section){
								$date_hour = explode(' ', $date_hour);
								$message = $message . "Date: " . $date_hour[0] . " Time: " . $date_hour[1] . " Section: " . $section . "<br/>";
							}

							echo "<h4>Name: " . $faculty . "</h4>";
							echo "<div class='fl-hide' id='" . $row['notification_id'] ."'>" . $message . "</div>";
							echo "<button onclick='view_notif(this.id);' style='border:2px;' id='" . $row['notification_id'] . "' class='fl-ripple fl-right fl-medium fl-btn fl-theme-d5 fl-round fl-hover-red'>
										View >></button></div></div></div><h1></h1>";

						}
					}
				?>
			</nav>
		</div>

		<div class=" fl-container fl-center fl-threequarter">
			<div style="width:80%" class="fl-content fl-theme-d5 fl-card-4">
				<h1 class="fl-center"><b>Requests Pending</h1></div>
			<h1></h1>
			<div style="width:105%" class="fl-mcontent fl-text-theme fl-theme-l5 fl-card-4">
				<div style="height:95%;" class="fl-container fl-center fl-xlmargin">
					<p id='notif_text'>No notifications to display, please choose one</p>
				</div>
				<div id="buttons" style="display:none">
					<button onclick="handleRequest('decline')" id="decline" class="fl-btn fl-round fl-red fl-margin">
						Decline
					</button>
					<button onclick="handleRequest('accept')" id="accept" class="fl-btn fl-round fl-green fl-margin">
						Accept
					</button>
				</div>
			</div>
		</div>

		<div class="fl-hide">
			<form id="aiding_form" action="handle_notification.php" method="post">
				<input id="aiding_input" type="text" name="data" value="" />
			</form>
		</div>

</body>
</html>