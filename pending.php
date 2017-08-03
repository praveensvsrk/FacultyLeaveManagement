<?php session_start(); ?>

<!doctype html>

<html>

<head>
	<link href="css/style.css" rel="stylesheet" />
	<link href="css/theme.css" rel="stylesheet" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<title>
		Application pending
	</title>
	<style>
		a#link4 {
			color: white;
			background-color: black;
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
		selected = '';
		function view_application(id) {
			selected = id;
			text = $("div[id=" + id + "]").html();
			text = text.replace(",", "<br/>").replace(/,/g, "");
			text = text.replace(/Date:/g, "<br /><span class=\"fl-margin fl-text-black\">Date: </span>").replace(/Time:/g, "<span class=\"fl-margin fl-text-black\">Time: </span>")
				.replace(/Section:/g, "<span class=\"fl-margin fl-text-black\">Section: </span>");

			$('#appl_text').html(text);
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
						<h2>Applications</h2>
					</div>
				</div>
				<h1></h1>
				<?php 
					$servername = "localhost";
					$username = "root";
					$password = "";

					$conn = new mysqli($servername, $username, $password);
					mysqli_select_db($conn,"FLT");

					$status = '';

					if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
					}

					$sql = "SELECT * FROM `Application` where status='HOD'"; 

					$result = $conn->query($sql);
					$row_cnt = $result->num_rows;
					$message='';
					if($row_cnt){
						while($row = $result->fetch_assoc()){
							$id = $row["id"];
							$applicant = $conn->query("SELECT name from `Faculty` where id='$id'")->fetch_assoc()['name'];
							echo '<div style="" class="fl-container"><div  class="fl-card-4 fl-center fl-content fl-theme">
										<div class="fl-container fl-center">';
							$app_id = $row['application_id'];
							echo "<h4>ID: " . $app_id . "</h4>";
							$sql = "SELECT * FROM `Finalsubs` where application_id = '$app_id'";
							
							$result2 = $conn->query($sql);
							$row_cnt = $result2->num_rows;

							if($row_cnt){
								$message = "<table class='fl-table-all'><th>Date</th><th>Hour</th><th>Section</th><th>Assignee</th>";
								while($row2 = $result2->fetch_assoc()){

									$faculty = $row2['faculty_id'];
									$sql = "SELECT name FROM `Faculty` where id = '$faculty'";
									$faculty = $conn->query($sql)->fetch_assoc()['name'];


									$msg = json_decode($row2['message'], true);

									foreach($msg as $date_hour => $section){
										$date_hour = explode(' ', $date_hour);
										$message = $message . "<tr><td> " . $date_hour[0] . " </td><td> " . $date_hour[1] . " </td><td> " 
											. $section . "</td><td>" . $faculty . "</td></tr>";
									}
								}
								$message = $message . "</table>";
							}
							echo "<h4>Name: " . $applicant . "</h4>";
							echo "<div class='fl-hide' id='" . $app_id ."'>" . $message . "</div>";
							echo "<button onclick='view_application(this.id);' style='border:2px;' id='" . $row['application_id'] . "' class='fl-ripple fl-right fl-medium fl-btn fl-theme-d5 fl-round fl-hover-red'>
										View >></button></div></div></div><h1></h1>";

						}
					}
				?>
			</nav>
		</div>

		<div class=" fl-container fl-center fl-threequarter">
			<div style="width:80%" class="fl-content fl-theme-d5 fl-card-4">
				<h1 class="fl-center"><b>Applications Pending</h1>
			</div>
			<h1></h1>
			<div style="width:105%" class="fl-mcontent fl-text-theme fl-theme-l5 fl-card-4">
				<div style="height:95%;" class="fl-container fl-center fl-xlmargin">
					<p id='appl_text'>No applications to display, please choose one</p>
				</div>
				<div id="buttons" style="display:none">
					<button onclick="handleRequest('Declined')" id="decline" class="fl-btn fl-round fl-red fl-margin">
						Decline
					</button>
					<button onclick="handleRequest('Accepted')" id="accept" class="fl-btn fl-round fl-green fl-margin">
						Accept
					</button>
				</div>
			</div>
		</div>
			
		<div class="fl-hide">
			<form id="aiding_form" action="hod_application_response.php" method="post">
				<input id="aiding_input" type="text" name="data" value="" />
			</form>
		</div>	


</body>

</html>