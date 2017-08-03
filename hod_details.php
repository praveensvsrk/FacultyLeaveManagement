<?php session_start(); 
if(!isset($_SESSION['user']))
  header('Location: '.'login.html');
?>
<!doctype html>

<html>

<head>
	<link href="css/style.css" rel="stylesheet" />
	<link href="css/theme.css" rel="stylesheet" />
	<link href="css/css-circular-prog-bar.css" media="all" rel="stylesheet" />
	<link href="css/css-circular-prog-bar-huge.css" media="all" rel="stylesheet" />
	<title>
		Faculty Details
	</title>
	<style>
		a#link2, a#link7 {
			border-bottom:3px solid #fff;
		}
		.fb-btn{
				background: #4060A5;
		}
		.fb-btn:hover{
				color: #4060A5;
				background: #fff;
				border-color: #4060A5; 
		}
		.gp-btn{
				background: #e64522;
		}
		.gp-btn:hover{
					color: #e64522;
					background: #fff;
					border-color: #e64522;
		}

	</style>
	<?php include("include/header.php");?>
  <?php include("include/hod_navigation.php");?>
  
	<script>
		document.getElementById("header").className = "fl-animate-right fl-left";
		document.getElementById("header").style = "padding-right:120px";
	</script>
</head>

<body class="fl-theme-k1">
	
	<h1></h1>
	
	<div style="width:70%" class="fl-content fl-theme-d5 fl-card-4">
		<h1 class="fl-center"><b>Faculty Details</h1>
	</div>
		
	<h1></h1>
		
	<div style="width:90%" class="fl-content fl-text-theme fl-theme-d5 fl-card-4">
		<div style="height:80%;" class="fl-container fl-center fl-xlmargin">
			<h1></h1>	
			<div style="width:80%" class="fl-content fl-text-theme fl-theme-l5 fl-card-4">
				<div style="height:70%;" class="fl-container fl-center fl-xlmargin">  
					<br/>
					<div class="image-with-text">
						<img src="images/avatar3.png"  class="fl-image fl-left" alt="avatar3" style="margin-bottom:10px;width:250px" /><br/>
						<p>Faculty: <?php $_SESSION['type'];  ?></p>
					</div>
					<div class="fl-container fl-left">
						<span class="fl-left" style="font-size:25px"><?php echo $_SESSION['user'] ?></span><br/>
						<h1><b><?php echo $_SESSION['name'] ?>, </b><span style="font-size:25px" class="fl-text-grey">CSE</span><br/></h1>
						<h3><sup class=" fl-text-grey fl-left">Visakhapatnam</sup></h3>
						
					</div>
					

				</div>
			</div>			
			<br/>
		</div>
	</div>
		
	<h1></h1>
	<h1></h1>
		
<div style="width:90%; height:100%" class="fl-content fl-center fl-theme-l5 fl-card-4">
	<div class="fl-container fl-content">
		<div class="fl-row">
				<div class="fl-col s12 m12 l6">
					<div style="display: inline-block" class="fl-container">
						<table>
							<tr  class="fl-center">
								<td style="padding-top: 25%;">
									<div class="progress-circle-huge over-50-huge p70">
									 <span>82%</span>
										<div class="left-half-clipper-huge">
											<div class="first50-bar-huge"></div>
											<div class="value-bar-huge"></div>
										</div>
									</div>
									<label>Overall</label>
								</td>
							</tr>
						</table>
					</div>
				</div>	
				<div class="fl-col s12 m12 l6">
					<div style="display: inline-block" class="fl-container">
						<table>
						<tr class="fl-center">
						<td>
							<div class="progress-circle p30">
							 <span>30%</span>
								<div class="left-half-clipper">
									<div style="background-color:red" class="first50-bar"></div>
									<div style="border: 0.45em solid red" class="value-bar"></div>
								</div>
							</div>
							<p>Special Leave</p>
						</td>
						<td>
							<div class="progress-circle p90 over50">
							 <span>90%</span>
								<div class="left-half-clipper">
									<div style="background-color:green" class="first50-bar"></div>
									<div style="border: 0.45em solid green" class="value-bar"></div>
								</div>
							</div>
							<p>Casual Leave</p>
						</td>
						<td>
							<div class="progress-circle p40">
							 <span>40%</span>
								<div class="left-half-clipper">
									<div style="background-color:yellow" class="first50-bar"></div>
									<div style="border: 0.45em solid yellow" class="value-bar"></div>
								</div>
							</div>
							<p>Medical Leave</p>
						</td>
						</tr>
						</table>
						</div>
						</div>
					<div class="fl-col s12 m12 l6">
					<div style="display: inline-block" class="fl-container">
					<table>
						<tr class="fl-center">
						<td>
							<div class="progress-circle p20">
							 <span>20%</span>
								<div class="left-half-clipper">
									<div style="background-color:red" class="first50-bar"></div>
									<div style="border: 0.45em solid red" class="value-bar"></div>
								</div>
							</div>
							<p>Special Casual Leave</p>
						</td>
						<td>
						</td>
						<td>
							<div class="progress-circle p70 over50">
							 <span>70%</span>
								<div class="left-half-clipper">
									<div style="background-color:green" class="first50-bar"></div>
									<div style="border: 0.45em solid green" class="value-bar"></div>
								</div>
							</div>
							<p>On duty Leave</p>
						</td>
						</tr>
					</table>
				</div>
				</div>
	</div>
	</div>
		</div>
		<h1>
			
		</h1>
	<div style="width:90%" class="fl-padding-8 fl-content fl-theme-d5 fl-card-4">
		<div class="fl-row">
			<div class="fl-col l6 m6 s6">
				<div id="social_buttons" class="fl-left">
					<button style="font-size:35px" class="fl-btn fl-margin-left fl-margin-top fl-btn-floating-large fb-btn">
					f
					</button>
					<button style="font-size:35px" class="fl-btn fl-margin-left fl-margin-top fl-btn-floating-large gp-btn">
					g+
					</button>
				</div>
			</div>
			<div style="float:right"class="fl-col l6 m6 s6">
				<div class="fl-right fl-margin-right">
					<table>
						<tr>
							<td><label>Contact:</label></td>
							<td><label>7033225588</label></td>
						</tr>
						<tr>
							<td><label>Email:</label></td>
							<td><label>riyaz@gmail.com</label></td>
						</tr>
					</table>
					
				</div>
			</div>
		</div>
	</div>
</body>
</html>