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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<title>
		Application Summerize
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
	<?php include("include/admin_navigation.php");?>
	<script>
		document.getElementById("header").className = "fl-left";
	</script>
	<script>
		// Get the modal
		var modal = document.getElementById('im01');

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
	</script>
</head>

<body class="fl-theme-k1">

	<div style="width:80%" class="fl-content fl-theme-d5 fl-card-4">
		<h1 class="fl-center"><b>Faculty on leave Today</h1></div>
	<h1></h1>
	<div style="width:90%" class="fl-mcontent fl-text-theme fl-theme-d5 fl-card-4">
		<div style="height:80%;" class="fl-container fl-center">
			<h1></h1>
			<div class="fl-row">
				<table class = "fl-margin-bottom fl-center fl-table-all">
					<th class='fl-xlarge fl-center'>Faculty</th>
					<th class='fl-xlarge fl-center'>Hour</th>
					<th class='fl-xlarge fl-center'>Assignee</th>
					<?php
						$servername = "localhost";
						$username = "root";
						$password = "";

						$conn = new mysqli($servername, $username, $password);
						mysqli_select_db($conn,"FLT");
						
						if ($conn->connect_error) {
 				   		die("Connection failed: " . $conn->connect_error);
						}
						$result = $conn->query("SELECT * FROM `Application` where status='Accepted'");
						$rowcnt = $result->num_rows;
						if($rowcnt){
							while($row = $result->fetch_assoc()){
								$application_id = $row['application_id'];
								$faculty_id = $row['id'];
								$faculty_name = $conn->query("SELECT name FROM `Faculty` where id = '$faculty_id'")->fetch_assoc()['name'];
								$result2 = $conn->query("SELECT * FROM `Finalsubs` where application_id = '$application_id'");
								$rowcnt = $result2->num_rows;
								if($rowcnt){
									while($row2 = $result2->fetch_assoc()){
										$date_time_array = array_keys(json_decode($row2['message'], true));
										$dates = array();
										$times = array();
										$assignee_id = $row2['faculty_id'];
										$assignee = $conn->query("SELECT name FROM `Faculty` where id = '$assignee_id'")->fetch_assoc()['name'];
										foreach($date_time_array as $datetime){
											$datetime = explode(' ', $datetime);
											array_push($dates, $datetime[0]);
											array_push($times, $datetime[1]);
										}
										$hours = array();
										$faculty_on_leave = '';
										for ($i = 0; $i < count($dates); $i++) {
												$date = $dates[$i];
												$time = $times[$i];
												if((time()-(60*60*24)) < strtotime($date)){
													$faculty_on_leave = $faculty_name;
													array_push($hours, $time);
												}
										} 
										if(strcmp($faculty_on_leave, '') != 0){
											$hours = join('<br>', $hours);
											echo "<tr><td class='fl-center'>" . $faculty_on_leave . "</td><td class='fl-center'>" . $hours . "</td><td class='fl-center'>" . $assignee . "</td></tr>";
 										}
									}
								}
							}					
						}				
						$conn->close();
					?>
				</table>

			</div>
		</div>
	</div>

	</div>
</body>

</html>