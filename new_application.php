<?php session_start(); 
if(!isset($_SESSION['user']))
  header('Location: '.'login.html');
?>

<!doctype html>

<html>

<head>
	<link href="css/style.css" rel="stylesheet" />
	<link href="css/theme.css" rel="stylesheet" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<title>
		Leave Application
	</title>
	<style>
			a#link5 {
			color: white;
			background-color: black;
			border-bottom:3px solid #fff;
		}
		
		html, body{
  min-height: 100%;
}
body{
  position: relative;
}
.overlay{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  max-height: 17%;
  z-index: 10;
  background-color: rgba(21,143,238,0.95); /*dim the background*/
}
	</style>
	<?php include("include/header.php");?>
	<?php include("include/navigation.php");?>
	<script>
				
		document.getElementById("header").className = "fl-animate-right fl-left";
		document.getElementById("header").style = "padding-right:120px";
		document.getElementById("header").className = "fl-left";
		
		$(document).ready(function() {
			$("#getDates").click(function() {
				datesInterface = document.getElementById("datesInterface");
				if($('#start').val() == '' || $('#end').val() == ''){
					$('#error_text_content').html("Please fill in the dates");
					$('#error_text').show();
					datesInterface.innerHTML = "";
					$(window).scrollTop(0);
					return;
				}
				$.post("application_data.php", {
						start: $('#start').val(),
						end: $('#end').val(),
						type: $('#leavetype').find(":selected").text()
					},
					function(data, status) {
						
						if(data === "LOSS OF PAY"){
							$('#error_text_content').html(data + ". Insufficient "
																	+ $('#leavetype').find(":selected").text() + "s");
							$('#error_text').show();
							datesInterface.innerHTML = "";
						}
						else
							datesInterface.innerHTML = data;
					});
			});
			$('#submit_form').click(function(e){
				if($('#start').val() == '' || $('#end').val() == '' 
					 || ($('#leavetype').find(":selected").text() == "Leave Type") || ($('#reason').find(":selected").text() == "Reason")){
					$('#error_text_content').html("Please fill in all the fields");
					$('#error_text').show();
					$(window).scrollTop(0);
					return;
				}
				if(datesInterface.innerHTML === ""){
					$('#error_text_content').html("No dates selected");
					$('#error_text').show();
					return;
				}
				data= { 
					"leavetype": $('#leavetype').find(":selected").text(), 
					"reason": $('#reason').find(":selected").text(), 
					"application_json":  createJSON() 
				}
				$('#aiding_input').val(JSON.stringify(data));
				$('#aiding_form').submit();
			});

		});

		function createJSON() {
			json = new Object();
			$("tr[id$='row']").each(function(item) {

				id = $(this).attr('id');
				checkbox = id.split(' ');
				checkbox = checkbox[0] + ' ' + checkbox[1];

				$(this).find("input[name='" + checkbox + "']:checked").each(function(item) {
					substitute_time = $(this).attr('name');
					$("table[id='" + checkbox + " substitute']").each(function(item) {
						$(this).find("input:checked").each(function(item) {
							
							faculty = $(this).attr('name');
							section = $("select[id='" + checkbox + " section']").find(':selected').text();
							
							obj = new Object();
							obj['time'] = substitute_time;
							obj['section'] = section;
							if (faculty in json) {
								json[faculty].push(JSON.stringify(obj));
							} else {
								json[faculty] = new Array();
								json[faculty].push(JSON.stringify(obj));
							}
							
						});
					});
				});

			});
			return JSON.stringify(json);

		}
		
		function dropFunction(div) {
			var x = document.getElementById(div);
			if (x.className.indexOf("fl-show") == -1) {
				x.className += " fl-show";
			} else {
				x.className = x.className.replace(" fl-show", "");
			}
		}

		// Filter
		function filterFunction() {
			var input, filter, ul, li, a, i;
			input = document.getElementById("myInput");
			filter = input.value.toUpperCase();
			div = document.getElementById("myDIV");
			a = div.getElementsByTagName("tr");
			for (i = 0; i < a.length; i++) {
				if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
					a[i].style.display = "";
				} else {
					a[i].style.display = "none";
				}
			}
		}

		function CheckColors(val) {
			var element = document.getElementById('color');
			if (val == 'others')
				element.style.display = 'block';
			else
				element.style.display = 'none';
		}



		function selectall(id) {
			id = id.replace(",", " ");
			var row = document.getElementById(id + " substitute");
			var chk = row.getElementsByTagName('input');
			var len = chk.length;

			for (var i = 0; i < len; i++) {
				if (chk[i].checked == true) {
					document.getElementsByName(id)[0].checked = true;
					return;
				}
			}
			document.getElementsByName(id)[0].checked = false;
		}

		
	</script>
<!--alert-->
	</head>
	<div class="fl-center">
	<div id="error_text" style="display:none;height:auto; width:30%;color:white" class="fl-panel overlay fl-animate-left">
    <span onclick="this.parentElement.style.display='none'" class="fl-closebtn">&times;</span>
    <h3>Alert!</h3>
    <p id="error_text_content">Please Fill all the details</p>
  </div>
	</div>
	
	
	<body class="fl-theme-k1">
		<div style="width:80%" class="fl-content fl-theme-d5 fl-card-4">
			<h1 class="fl-center"><b>Faculty Details</h1></div>
		<h1></h1>
		<div style="width:80%" class="fl-content fl-text-theme fl-theme-l5 fl-card-4">
			<div style="height:70%;" class="fl-container fl-center fl-xlmargin">
				<form id="application_form">
					<br/>

					<select class="fl-select" id="leavetype" name="leavetype">
						<option value="" disabled selected>Leave Type</option>
						<option value="Casual">Casual Leave</option>
						<option value="Medical">Medical Leave</option>
						<option value="On Duty">On Duty Leave</option>
						<option value="Special Casual">Special Casual Leave</option>
						<option value="Academic">Academic Leave</option>
					</select>

					<br/><br/>
					<div class="fl-row">

						<div class="fl-container">
							<label class="fl-left">Start Date:
			 <input id="start" class="fl-date" type="date" name="start"></label>
						<label id="getDates" class="fl-btn fl-right fl-border"style="background-color:transparent;color:black">
							&#10140;
						</label>
							<label class="fl-right">End Date:
			<input id="end" class="fl-date fl-right-align" type="date" name="end"></label>	
						</div>
						
						<div class="fl-container" id="datesInterface">

						</div>

					</div>
					<br/><br/>
					<div class="form-group">
						<select id="reason" onchange="spawn(this, 'color');" class="fl-select" name="option">
							<option value="" disabled selected>Reason</option>
							<option value="Casual Leave">Festival</option>
							<option value="Medical Leave">Hospitalized</option>
							<option value="On Duty Leave">Casual</option>
							<option value="Special Casual Leave">Seminar/Confernce</option>
							<option value="others">others</option>
						</select>
						<textarea id="color" style="display:none;" rows="4" cols="50"></textarea>
						<br/><br/><br/>
						<label class="fl-left">
							<!-- 		<form method="post" action="mailto:shaikriyaz0106@gmail.com" enctype="multipart/form-data"> 
									Attachment: <input type="file" name="attachedfile" maxlength=50 ALLOW="text/*" > 
							</form> -->
						</label>
					</div>
					<p><input id="submit_form" type="button" value="Apply" class="fl-btn fl-theme-d5" /></p>
				</form>
				<br/>

			</div>
		</div>
		<div class="fl-hide">
			<form id="aiding_form" action="handle_application.php" method="post">
				<input id="aiding_input" type="text" name="data" value=""/>
			</form>

		</div>
	</body>
	<script>
		function focusGained(button) {
			hideall();
			b = document.getElementById(button.id + '-selector').style.display = 'block';
		}

		function hideall() {
			dates = document.getElementsByName('dates');
			for (i = 0; i < dates.length; i++)
				document.getElementById(dates[i].id + '-selector').style.display = 'none';
		}

		function spawn(select, txtarea) {
			if (select.selectedIndex == 5)
				document.getElementById(txtarea).style.display = 'block';
			else
				document.getElementById(txtarea).style.display = 'none';
		}
	</script>

</html>