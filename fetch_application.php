<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);
mysqli_select_db($conn,"FLT");

$status = '';
$hod = false;

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['data'])){
  $status = $_POST['data'];
  $user = $_SESSION["user"];
  if(strcmp($status, "All") == 0)
    $sql = "SELECT * FROM `Application` where id = '$user'";
  else
    $sql = "SELECT * FROM `Application` where id = '$user' and status = '$status'";
}
else{
  $hod = true;
  $sql = "SELECT * FROM `Application` where status IN ('Accepted', 'Rejected')"; //For sanctioned applications in HOD
}
$result = $conn->query($sql);
$row_cnt = $result->num_rows;
$message='';
if($row_cnt){
  while($row = $result->fetch_assoc()){
    $id = $row["id"];
		$applicant = $conn->query("SELECT name from `Faculty` where id='$id'")->fetch_assoc()['name'];
    echo '<div class="fl-col fl-padding s12 m6 l3"><div  class="fl-card-4 fl-center fl-content fl-theme">
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
    if(!$hod)
      echo "<h4>Status: " . $row['status'] . "</h4>";
    else
      echo "<h4>Name: " . $applicant . "</h4>";
    echo "<div class='fl-hide' id='" . $app_id ."'>" . $message . "</div>";
    echo "<button onclick='view_application(this.id);' style='border:2px;' id='" . $app_id . "' class='fl-ripple fl-right fl-medium fl-btn fl-theme-d5 fl-round fl-hover-red'>
          View >></button></div></div></div>";

  }
}
?>