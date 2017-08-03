<!DOCTYPE html>
<html>
<title>edit page</title>
  
<link href="css/style.css" rel="stylesheet"/>
<link href="css/theme.css" rel="stylesheet"/>
<style>
  .scrollit {
    overflow:scroll;
    height:345px;
}
 .fl-table td:first-child{padding-left:8px}
</style>
<body style="max-width:400px" class="fl-white">
<form class="fl-container" action="fetch_myfacultydata.php" method="POST">
  <label class="fl-label fl-text-theme fl-left fl-xlarge"><b>ID</b></label>
  <input class="fl-input fl-border fl-white" type="text" value="14331A05F0" disabled>
  
  <label class="fl-label fl-text-theme fl-left fl-xlarge"><b>Name</b></label>
  <input class="fl-input fl-border fl-white" type="text">

  <label class="fl-label fl-text-theme fl-left fl-xlarge"><b>City</b></label>
  <input class="fl-input fl-border fl-white" type="text">
  
  <label class="fl-label fl-text-theme fl-left fl-xlarge"><b>Faculty Type</b></label>
  <input class="fl-input fl-border fl-white" type="text">
  
  <label class="fl-label fl-text-theme fl-left fl-xlarge"><b>Contact</b></label>
  <input class="fl-input fl-border fl-white" type="number">
  
  <label class="fl-label fl-text-theme fl-left fl-xlarge"><b>Email</b></label>
  <input class="fl-input fl-border fl-white" type="email">
  <h1></h1>
  <div class="fl-container">
				<div class="fl-dropdown-click">
					<span class="fl-btn fl-black fl-theme-d1" onclick="dropFunction()">Select Free Hours</span>
					<div class="fl-dropdown-content fl-card-2 fl-white" id="myDIV">
            <div class="scrollit">
						<table class="fl-table">
              <tr>
                <td colspan='2' class="fl-center" style="border-bottom:1pt solid grey"><i>Monday</i></td>
              </tr>
							<tr><td><input class="fl-check" type="checkbox" value="First_period"></td><td class="fl-left">9:00-9:50</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Second_period"></td><td class="fl-left">9:50-10:40</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Third_period"></td><td class="fl-left">10:40-11:30</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Fourth_period"></td><td class="fl-left">11:30-12:20</td></tr>              
							<tr><td><input class="fl-check" type="checkbox" value="Fifth_period"></td><td class="fl-left">12:20-1:10</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Sixth_period"></td><td class="fl-left">1:10-2:00</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Seventh_period"></td><td class="fl-left">2:00-2:50</td></tr>
  						<tr><td><input class="fl-check" type="checkbox" value="Eighth_period"></td><td class="fl-left">2:50-3:40</td></tr>

              <tr>
                <td colspan='2' class="fl-center" style="border-bottom:1pt solid grey"><i>Tuesday</i></td>
              </tr>
							<tr><td><input class="fl-check" type="checkbox" value="First_period"></td><td class="fl-left">9:00-9:50</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Second_period"></td><td class="fl-left">9:50-10:40</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Third_period"></td><td class="fl-left">10:40-11:30</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Fourth_period"></td><td class="fl-left">11:30-12:20</td></tr>              
							<tr><td><input class="fl-check" type="checkbox" value="Fifth_period"></td><td class="fl-left">12:20-1:10</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Sixth_period"></td><td class="fl-left">1:10-2:00</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Seventh_period"></td><td class="fl-left">2:00-2:50</td></tr>
  						<tr><td><input class="fl-check" type="checkbox" value="Eighth_period"></td><td class="fl-left">2:50-3:40</td></tr>
              
              <tr>
                <td colspan='2' class="fl-center" style="border-bottom:1pt solid grey"><i>Wednesday</i></td>
              </tr>
							<tr><td><input class="fl-check" type="checkbox" value="First_period"></td><td class="fl-left">9:00-9:50</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Second_period"></td><td class="fl-left">9:50-10:40</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Third_period"></td><td class="fl-left">10:40-11:30</td></tr>
              <tr><td colspan='2' class="fl-center">lunch break</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Fourth_period"></td><td class="fl-left">12:20-1:10</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Fifth_period"></td><td class="fl-left">1:10-2:00</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Sixth_period"></td><td class="fl-left">2:00-2:50</td></tr>
  						<tr><td><input class="fl-check" type="checkbox" value="Seventh_period"></td><td class="fl-left">2:50-3:40</td></tr>
              
              <tr>
                <td colspan='2' class="fl-center" style="border-bottom:1pt solid grey"><i>Thursday</i></td>
              </tr>
							<tr><td><input class="fl-check" type="checkbox" value="First_period"></td><td class="fl-left">9:00-9:50</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Second_period"></td><td class="fl-left">9:50-10:40</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Third_period"></td><td class="fl-left">10:40-11:30</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Fourth_period"></td><td class="fl-left">11:30-12:20</td></tr>              
							<tr><td><input class="fl-check" type="checkbox" value="Fifth_period"></td><td class="fl-left">12:20-1:10</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Sixth_period"></td><td class="fl-left">1:10-2:00</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Seventh_period"></td><td class="fl-left">2:00-2:50</td></tr>
  						<tr><td><input class="fl-check" type="checkbox" value="Eighth_period"></td><td class="fl-left">2:50-3:40</td></tr>
              
              <tr>
                <td colspan='2' class="fl-center" style="border-bottom:1pt solid grey"><i>Friday</i></td>
              </tr>
							<tr><td><input class="fl-check" type="checkbox" value="First_period"></td><td class="fl-left">9:00-9:50</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Second_period"></td><td class="fl-left">9:50-10:40</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Third_period"></td><td class="fl-left">10:40-11:30</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Fourth_period"></td><td class="fl-left">11:30-12:20</td></tr>              
							<tr><td><input class="fl-check" type="checkbox" value="Fifth_period"></td><td class="fl-left">12:20-1:10</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Sixth_period"></td><td class="fl-left">1:10-2:00</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Seventh_period"></td><td class="fl-left">2:00-2:50</td></tr>
  						<tr><td><input class="fl-check" type="checkbox" value="Eighth_period"></td><td class="fl-left">2:50-3:40</td></tr>
              
              <tr>
                <td colspan='2' class="fl-center" style="border-bottom:1pt solid grey"><i>Saturday</i></td>
              </tr>
							<tr><td><input class="fl-check" type="checkbox" value="First_period"></td><td class="fl-left">9:00-9:50</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Second_period"></td><td class="fl-left">9:50-10:40</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Third_period"></td><td class="fl-left">10:40-11:30</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Fourth_period"></td><td class="fl-left">11:30-12:20</td></tr>              
							<tr><td><input class="fl-check" type="checkbox" value="Fifth_period"></td><td class="fl-left">12:20-1:10</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Sixth_period"></td><td class="fl-left">1:10-2:00</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Seventh_period"></td><td class="fl-left">2:00-2:50</td></tr>
  						<tr><td><input class="fl-check" type="checkbox" value="Eighth_period"></td><td class="fl-left">2:50-3:40</td></tr>
						
             </table>
             </tr>
            </div>
					</div>
				</div>
			</div>
	<div class="fl-container">
				<div class="fl-dropdown-click">
					<span class="fl-btn fl-black fl-theme-d1" onclick="dropFunction1()">Select Section</span>
					<div class="fl-dropdown-content fl-card-2 fl-white" id="myDIV1">
            <div class="scrollit">
						<table class="fl-table">
              <tr>
                <td colspan='2' class="fl-center" style="border-bottom:1pt solid grey"><i>Section-'A'</i></td>
              </tr>
							<tr><td><input class="fl-check" type="checkbox" value="First_year"></td><td class="fl-left">I-Year</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Second_year"></td><td class="fl-left">II-Year</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Third_year"></td><td class="fl-left">III-Year</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Fourth_year"></td><td class="fl-left">IV-Year</td></tr>
							
							<tr>
                <td colspan='2' class="fl-center" style="border-bottom:1pt solid grey"><i>Section-'B'</i></td>
              </tr>
							<tr><td><input class="fl-check" type="checkbox" value="First_year"></td><td class="fl-left">I-Year</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Second_year"></td><td class="fl-left">II-Year</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Third_year"></td><td class="fl-left">III-Year</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Fourth_year"></td><td class="fl-left">IV-Year</td></tr>
							
							<tr>
                <td colspan='2' class="fl-center" style="border-bottom:1pt solid grey"><i>Section-'C'</i></td>
              </tr>
							<tr><td><input class="fl-check" type="checkbox" value="First_year"></td><td class="fl-left">I-Year</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Second_year"></td><td class="fl-left">II-Year</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Third_year"></td><td class="fl-left">III-Year</td></tr>
							<tr><td><input class="fl-check" type="checkbox" value="Fourth_year"></td><td class="fl-left">IV-Year</td></tr>
							
							</table>
             </tr>
            </div>
					</div>
				</div>
			</div>
							
  <button class="fl-btn-block fl-section fl-theme-d5 fl-ripple fl-padding">Send</button>
</form>
	<script>
	function dropFunction() {
    var x = document.getElementById("myDIV");
    if (x.className.indexOf("fl-show") == -1) {
        x.className += " fl-show";
    } else {
        x.className = x.className.replace(" fl-show", "");
    }
	}
  </script>
<script>
	function dropFunction1() {
    var x = document.getElementById("myDIV1");
    if (x.className.indexOf("fl-show") == -1) {
        x.className += " fl-show";
    } else {
        x.className = x.className.replace(" fl-show", "");
    }
	}
  </script>
</body>
