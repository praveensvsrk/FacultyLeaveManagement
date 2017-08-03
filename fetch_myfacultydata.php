<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FLT";

// Create connection
$conn = new mysqli($servername, $username, $password);
mysqli_select_db($conn,"FLT");
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}
$user = $_POST['display_user'];

$sql = "SELECT * FROM Faculty where id='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
        
  echo '<form class="fl-container">';
  echo '<label class="fl-label fl-text-theme fl-left fl-xlarge"><b>ID</b></label>';
  echo '<input id="id" class="fl-input fl-border fl-white" type="text" value="'.$row["id"].'" disabled>';
  
  echo '<label class="fl-label fl-text-theme fl-left fl-xlarge"><b>Name</b></label>';
  echo '<input id="name" class="fl-input fl-border fl-white" type="text" value="'.$row["name"].'">';

  echo '<label class="fl-label fl-text-theme fl-left fl-xlarge"><b>City</b></label>';
  echo '<input id="city" class="fl-input fl-border fl-white" type="text" value="'.$row["city"].'">';
  
  echo '<label class="fl-label fl-text-theme fl-left fl-xlarge"><b>Faculty Type</b></label>';
  echo '<input id="type" class="fl-input fl-border fl-white" type="text" value="'.$row["type"].'">';
  
  echo '<label class="fl-label fl-text-theme fl-left fl-xlarge"><b>Contact</b></label>';
  echo '<input id="contact" class="fl-input fl-border fl-white" type="number" value="'.$row["contact"].'">';
  
  echo '<label class="fl-label fl-text-theme fl-left fl-xlarge"><b>Email</b></label>';
  echo '<input id="email" class="fl-input fl-border fl-white" type="email" value="'.$row["email"].'">';
  echo '<h1></h1>';
  echo '<div class="fl-left fl-container">';
				echo '<div class="fl-dropdown-click">';
					echo '<span id="hours span" class="fl-btn fl-black fl-theme-d1" onclick="dropFunction(this.id)">Select Free Hours</span>';
					echo '<div class="fl-dropdown-content fl-card-2 fl-white" id="hours">';
            echo '<div class="scrollit">';
						echo '<table class="fl-table">';
              echo '<tr>';
                echo '<td colspan=\'2\' class="fl-center" style="border-bottom:1pt solid grey"><i>Monday</i></td>';
              echo '</tr>';
							echo '<tr><td><input id="mon 1" class="fl-check" type="checkbox" value="First_period"></td><td class="fl-left">9:00-9:50</td></tr>';
							echo '<tr><td><input id="mon 2" class="fl-check" type="checkbox" value="Second_period"></td><td class="fl-left">9:50-10:40</td></tr>';
							echo '<tr><td><input id="mon 3" class="fl-check" type="checkbox" value="Third_period"></td><td class="fl-left">10:40-11:30</td></tr>';
							echo '<tr><td><input id="mon 4" class="fl-check" type="checkbox" value="Fourth_period"></td><td class="fl-left">11:30-12:20</td></tr>';
							echo '<tr><td><input id="mon 5" class="fl-check" type="checkbox" value="Fifth_period"></td><td class="fl-left">12:20-1:10</td></tr>';
							echo '<tr><td><input id="mon 6" class="fl-check" type="checkbox" value="Sixth_period"></td><td class="fl-left">1:10-2:00</td></tr>';
							echo '<tr><td><input id="mon 7" class="fl-check" type="checkbox" value="Seventh_period"></td><td class="fl-left">2:00-2:50</td></tr>';
  						echo '<tr><td><input id="mon 8" class="fl-check" type="checkbox" value="Eighth_period"></td><td class="fl-left">2:50-3:40</td></tr>';

              echo '<tr>';
                echo '<td colspan=\'2\' class="fl-center" style="border-bottom:1pt solid grey"><i>Tuesday</i></td>';
              echo '</tr>';
							echo '<tr><td><input id="tue 1" class="fl-check" type="checkbox" value="First_period"></td><td class="fl-left">9:00-9:50</td></tr>';
							echo '<tr><td><input id="tue 2" class="fl-check" type="checkbox" value="Second_period"></td><td class="fl-left">9:50-10:40</td></tr>';
							echo '<tr><td><input id="tue 3" class="fl-check" type="checkbox" value="Third_period"></td><td class="fl-left">10:40-11:30</td></tr>';
							echo '<tr><td><input id="tue 4" class="fl-check" type="checkbox" value="Fourth_period"></td><td class="fl-left">11:30-12:20</td></tr>';
							echo '<tr><td><input id="tue 5" class="fl-check" type="checkbox" value="Fifth_period"></td><td class="fl-left">12:20-1:10</td></tr>';
							echo '<tr><td><input id="tue 6" class="fl-check" type="checkbox" value="Sixth_period"></td><td class="fl-left">1:10-2:00</td></tr>';
							echo '<tr><td><input id="tue 7" class="fl-check" type="checkbox" value="Seventh_period"></td><td class="fl-left">2:00-2:50</td></tr>';
  						echo '<tr><td><input id="tue 8" class="fl-check" type="checkbox" value="Eighth_period"></td><td class="fl-left">2:50-3:40</td></tr>';
              
              echo '<tr>';
                echo '<td colspan=\'2\' class="fl-center" style="border-bottom:1pt solid grey"><i>Wednesday</i></td>';
              echo '</tr>';
							echo '<tr><td><input id="wed 1" class="fl-check" type="checkbox" value="First_period"></td><td class="fl-left">9:00-9:50</td></tr>';
							echo '<tr><td><input id="wed 2" class="fl-check" type="checkbox" value="Second_period"></td><td class="fl-left">9:50-10:40</td></tr>';
							echo '<tr><td><input id="wed 3" class="fl-check" type="checkbox" value="Third_period"></td><td class="fl-left">10:40-11:30</td></tr>';
							echo '<tr><td><input id="wed 4" class="fl-check" type="checkbox" value="Fourth_period"></td><td class="fl-left">11:30-12:20</td></tr>';
							echo '<tr><td><input id="wed 5" class="fl-check" type="checkbox" value="Fifth_period"></td><td class="fl-left">12:20-1:10</td></tr>';
							echo '<tr><td><input id="wed 6" class="fl-check" type="checkbox" value="Sixth_period"></td><td class="fl-left">1:10-2:00</td></tr>';
							echo '<tr><td><input id="wed 7" class="fl-check" type="checkbox" value="Seventh_period"></td><td class="fl-left">2:00-2:50</td></tr>';
  						echo '<tr><td><input id="wed 8" class="fl-check" type="checkbox" value="Eighth_period"></td><td class="fl-left">2:50-3:40</td></tr>';
              
              echo '<tr>';
                echo '<td colspan=\'2\' class="fl-center" style="border-bottom:1pt solid grey"><i>Thursday</i></td>';
             echo '</tr>';
							echo '<tr><td><input id="thu 1" class="fl-check" type="checkbox" value="First_period"></td><td class="fl-left">9:00-9:50</td></tr>';
							echo '<tr><td><input id="thu 2" class="fl-check" type="checkbox" value="Second_period"></td><td class="fl-left">9:50-10:40</td></tr>';
							echo '<tr><td><input id="thu 3" class="fl-check" type="checkbox" value="Third_period"></td><td class="fl-left">10:40-11:30</td></tr>';
							echo '<tr><td><input id="thu 4" class="fl-check" type="checkbox" value="Fourth_period"></td><td class="fl-left">11:30-12:20</td></tr>';
							echo '<tr><td><input id="thu 5" class="fl-check" type="checkbox" value="Fifth_period"></td><td class="fl-left">12:20-1:10</td></tr>';
							echo '<tr><td><input id="thu 6" class="fl-check" type="checkbox" value="Sixth_period"></td><td class="fl-left">1:10-2:00</td></tr>';
							echo '<tr><td><input id="thu 7" class="fl-check" type="checkbox" value="Seventh_period"></td><td class="fl-left">2:00-2:50</td></tr>';
  						echo '<tr><td><input id="thu 8" class="fl-check" type="checkbox" value="Eighth_period"></td><td class="fl-left">2:50-3:40</td></tr>';
              
              echo '<tr>';
               echo '<td colspan=\'2\' class="fl-center" style="border-bottom:1pt solid grey"><i>Friday</i></td>';
              echo '</tr>';
							echo '<tr><td><input id="fri 1" class="fl-check" type="checkbox" value="First_period"></td><td class="fl-left">9:00-9:50</td></tr>';
							echo '<tr><td><input id="fri 2" class="fl-check" type="checkbox" value="Second_period"></td><td class="fl-left">9:50-10:40</td></tr>';
							echo '<tr><td><input id="fri 3" class="fl-check" type="checkbox" value="Third_period"></td><td class="fl-left">10:40-11:30</td></tr>';
							echo '<tr><td><input id="fri 4" class="fl-check" type="checkbox" value="Fourth_period"></td><td class="fl-left">11:30-12:20</td></tr>';
							echo '<tr><td><input id="fri 5" class="fl-check" type="checkbox" value="Fifth_period"></td><td class="fl-left">12:20-1:10</td></tr>';
							echo '<tr><td><input id="fri 6" class="fl-check" type="checkbox" value="Sixth_period"></td><td class="fl-left">1:10-2:00</td></tr>';
							echo '<tr><td><input id="fri 7" class="fl-check" type="checkbox" value="Seventh_period"></td><td class="fl-left">2:00-2:50</td></tr>';
  						echo '<tr><td><input id="fri 8" class="fl-check" type="checkbox" value="Eighth_period"></td><td class="fl-left">2:50-3:40</td></tr>';
			 
              echo '<tr>';
                echo '<td colspan=\'2\' class="fl-center" style="border-bottom:1pt solid grey"><i>Saturday</i></td>';
              echo '</tr>';
							echo '<tr><td><input id="sat 1" class="fl-check" type="checkbox" value="First_period"></td><td class="fl-left">9:00-9:50</td></tr>';
							echo '<tr><td><input id="sat 2" class="fl-check" type="checkbox" value="Second_period"></td><td class="fl-left">9:50-10:40</td></tr>';
							echo '<tr><td><input id="sat 3" class="fl-check" type="checkbox" value="Third_period"></td><td class="fl-left">10:40-11:30</td></tr>';
							echo '<tr><td><input id="sat 4" class="fl-check" type="checkbox" value="Fourth_period"></td><td class="fl-left">11:30-12:20</td></tr>';
							echo '<tr><td><input id="sat 5" class="fl-check" type="checkbox" value="Fifth_period"></td><td class="fl-left">12:20-1:10</td></tr>';
							echo '<tr><td><input id="sat 6" class="fl-check" type="checkbox" value="Sixth_period"></td><td class="fl-left">1:10-2:00</td></tr>';
							echo '<tr><td><input id="sat 7" class="fl-check" type="checkbox" value="Seventh_period"></td><td class="fl-left">2:00-2:50</td></tr>';
  						echo '<tr><td><input id="sat 8" class="fl-check" type="checkbox" value="Eighth_period"></td><td class="fl-left">2:50-3:40</td></tr>';
						
             echo '</table>';
             echo '</tr>';
            echo '</div>';
					echo '</div>';echo '</div>';
					echo '</div>';

	echo '<div class="fl-right fl-container">';
				echo '<div class="fl-dropdown-click">';
					echo '<span id="section span" class="fl-btn fl-black fl-theme-d1" onclick="dropFunction(this.id)">Select Section</span>';
					echo '<div class="fl-dropdown-content fl-card-2 fl-white" id="section">';
            echo '<div class="scrollit">';
						echo '<table class="fl-table">';
              echo '<tr>';
                echo '<td colspan=\'2\' class="fl-center" style="border-bottom:1pt solid grey"><i>Section-\'A\'</i></td>';
              echo '</tr>';
							echo '<tr><td><input id="1A" class="fl-check" type="checkbox" value="First_year"></td><td class="fl-left">I-Year</td></tr>';
							echo '<tr><td><input id="2A" class="fl-check" type="checkbox" value="Second_year"></td><td class="fl-left">II-Year</td></tr>';
							echo '<tr><td><input id="3A" class="fl-check" type="checkbox" value="Third_year"></td><td class="fl-left">III-Year</td></tr>';
							echo '<tr><td><input id="4A" class="fl-check" type="checkbox" value="Fourth_year"></td><td class="fl-left">IV-Year</td></tr>';
							
							echo '<tr>';
               echo '<td colspan=\'2\' class="fl-center" style="border-bottom:1pt solid grey"><i>Section-\'B\'</i></td>';
              echo '</tr>';
							echo '<tr><td><input id="1B" class="fl-check" type="checkbox" value="First_year"></td><td class="fl-left">I-Year</td></tr>';
							echo '<tr><td><input id="2B" class="fl-check" type="checkbox" value="Second_year"></td><td class="fl-left">II-Year</td></tr>';
							echo '<tr><td><input id="3B" class="fl-check" type="checkbox" value="Third_year"></td><td class="fl-left">III-Year</td></tr>';
							echo '<tr><td><input id="4B" class="fl-check" type="checkbox" value="Fourth_year"></td><td class="fl-left">IV-Year</td></tr>';
							
							echo '<tr>';
                echo '<td colspan=\'2\' class="fl-center" style="border-bottom:1pt solid grey"><i>Section-\'C\'</i></td>';
              echo '</tr>';
							echo '<tr><td><input id="1C" class="fl-check" type="checkbox" value="First_year"></td><td class="fl-left">I-Year</td></tr>';
							echo '<tr><td><input id="2C" class="fl-check" type="checkbox" value="Second_year"></td><td class="fl-left">II-Year</td></tr>';
							echo '<tr><td><input id="3C" class="fl-check" type="checkbox" value="Third_year"></td><td class="fl-left">III-Year</td></tr>';
							echo '<tr><td><input id="4C" class="fl-check" type="checkbox" value="Fourth_year"></td><td class="fl-left">IV-Year</td></tr>';
							
							echo '</table>';
             echo '</tr>';
            echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';

							
  echo '<span id="modify" onclick="createJSON();" class="fl-btn-block fl-section fl-theme-d5 fl-ripple fl-padding">Modify</span>';
	echo '<button id="delete" class="fl-btn-block fl-section fl-theme-d5 fl-ripple fl-padding">Delete</button>';
echo '</form>';
     }
} else {
	     
			echo '<div style="display: inline-block" class="fl-container">';
							echo "No results found!!";
				echo '<p><button class="fl-btn fl-theme-d5">Add Faculty</button></p>';			
				echo '</div>';

}

$conn->close();
?>

	</body>

	</html>