<?php
session_start();



include("fetch_facultydata.php");

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);
mysqli_select_db($conn,"FLT");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$begin = new DateTime($_POST["start"]);
$end = new DateTime($_POST["end"]);
$type = $_POST["type"];
$user = $_SESSION['user'];
switch($type){
  case "Casual Leave":
    $type = 'casual';
    break;
  case "Special Casual Leave":
    $type = 'scasual';
    break;
  case "On Duty Leave":
    $type = 'onduty';
    break;
  case "Medical Leave":
    $type = 'medical';
    break;
  case "Academic Leave":
    $type = 'academic';
    break;
}


$interval = DateInterval::createFromDateString('1 day');
$end->add($interval);
$period = new DatePeriod($begin, $interval, $end);

$dates = array();

foreach ( $period as $dt )
  array_push($dates, $dt->format( "l, Y-m-d" ));

$count = 0;
foreach ( $dates as $date){
  $weekday = date('l', strtotime( $date));
  if($weekday != 'Sunday'){
    $count++;
  }
}

$quota = $conn->query("SELECT * FROM `leavesquota` where id='$user'")->fetch_assoc()[$type];
if(intval($quota) < $count){
  echo  "LOSS OF PAY";
}
else{
  $str = "";
  $weekdays = array(
    "Monday" => "mon",
    "Tuesday" => "tue",
    "Wednesday" => "wed",
    "Thursday" => "thu",
    "Friday" => "fri",
    "Saturday" => "sat"
  );
  $faculty_json = json_decode($_SESSION['freehours'], true);

  $hours = array(
    "09:00-09:50" => array(),
    "09:50-10:40" => array(),
    "10:40-11:30" => array(),
    "11:30-12:20" => array(),
    "12:20-13:10" => array(),
    "13:10-14:00" => array(),
    "14:00-14:50" => array(),
    "14:50-15:40" => array()
  );

  $faculty_free_hours = array(
    "mon" => $hours,
    "tue" => array_merge(array(), $hours),
    "wed" => array_merge(array(), $hours),
    "thu" => array_merge(array(), $hours),
    "fri" => array_merge(array(), $hours),
    "sat" => array_merge(array(), $hours)
  );

  $current_faculty = '';
  foreach ($faculty_json as $faculty => $free_hours){
    foreach ($free_hours as $weekday => $hours_array){
      foreach ($hours_array as $hour){
        $faculty_name = explode(',', $faculty)[1];

        if(explode(',', $faculty)[0] == $_SESSION['user'])
          $current_faculty = $faculty_json[$faculty];
        else
          array_push($faculty_free_hours[$weekday][$hour], $faculty);
      }
    }
  }

  echo "<table class='fl-table'>";
  foreach ( $dates as $date){
    $weekday = date('l', strtotime( $date));
    if($weekday != 'Sunday'){
      $date = substr($date, strpos($date, ",") + 2,10);
      echo "<tr><td style='width:5%'><input type='radio' class='fl-radio' 
      name='dates' id='$date' value='$date' onclick='javascript:focusGained(this);'/></td>";
      echo "<td>$date</td></tr>";
      echo "<tr><td></td>";
      echo "<td><div style='display:none' class='fl-white fl-padding-16 fl-padding-left fl-padding-right' id='$date-selector'>";

      echo "<table class='fl-table-all'>";
      echo "<th></th><th>Hours</th><th>Substitute</th><th>Section</th>";
      foreach ($current_faculty[$weekdays[$weekday]] as $key => $hours){
        echo "<tr id=\"$date $hours row\" >";
        echo "<td style='width:5%'><input name=\"$date $hours\" type='checkbox' disabled/></td>";
        echo "<td>". $hours ."</td>";
        echo "<td><div class='fl-dropdown-click'><span class='fl-btn fl-black' onclick='dropFunction(\"$date $hours\")'>Select Substitute</span>
        <div style='z-index:5' class='fl-dropdown-content fl-card-2 fl-white' id=\"$date $hours\"><div class='scrollit'><table id=\"$date $hours substitute\" class='fl-table'>";

        foreach ($faculty_free_hours[$weekdays[$weekday]][$hours] as $f){
          $faculty_id_name = explode(',', $f);
          $dh = $date.','.$hours;
          echo '<tr><td><input onchange=selectall("'.$dh.'");'.' name='.$faculty_id_name[0].' class="fl-check" type="checkbox" value=""></td>
                <td class="fl-left">'.$faculty_id_name[1].'</td></tr>';
        }
        echo "</table></div></div></div></td>";
        $sectionid = $date . " " . $hours . " section";
        echo "<td><select class=\"w3-select\" name='section' id='$sectionid'>";
        $sections =explode(',', $_SESSION['section']);
        foreach ($sections as $section){
          echo '<option name='.$section.' value='.$section.'>'. $section .'</option>';
        }

        echo "</select></td></tr>";
      }
      echo "</table></div></td></tr>";
    }

  }
  echo "</table>";

}

?>