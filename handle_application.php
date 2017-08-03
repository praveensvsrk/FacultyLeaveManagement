<?php 
session_start();
$user = $_SESSION['user'];
$json = json_decode($_POST['data'], true);
$leavetype = $json['leavetype'];
echo $leavetype;
$reason = $json['reason'];
$application_json = json_decode($json['application_json'], true);

$servername = "localhost";
$username = "root";
$password = "";


$conn = new mysqli($servername, $username, $password);
mysqli_select_db($conn,"FLT");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/* Creating of unique application id */
$application_id = uniqid();
$sql = "SELECT * FROM `Application` where id='$application_id'";
$result = $conn->query($sql);
$row_cnt = $result->num_rows;
while ($row_cnt) {
  $application_id = uniqid();
  $sql = "SELECT * FROM `Application` where id='$application_id'";
  $result = $conn->query($sql);
  $row_cnt = $result->num_rows;
}
/* End of unique application id creation */

$user = $_SESSION["user"];
$dates = array();


foreach($application_json as $faculty => $faculty_json){
  $time_date = json_decode($faculty_json[0], true)['time'];
  array_push($dates, explode(' ', $time_date)[0]);
  $hours = array();
  $message = array();
  //$sections = array();
  foreach($faculty_json as $index => $time_section){
    $time_section = json_decode($time_section, true);
    array_push($hours, $time_section['time']);
    $message[$time_section['time']] = $time_section['section'];
  }
  $message = json_encode($message);
  $hours = join(',', $hours);
  /* Creating of unique notification id */
  $notification_id = uniqid();
  $sql = "SELECT * FROM `Notification` where id='$notification_id'";
  $result = $conn->query($sql);
  $row_cnt = $result->num_rows;
  while ($row_cnt) {
    $notification_id = uniqid();
    $sql = "SELECT * FROM `Notification` where id='$notification_id'";
    $result = $conn->query($sql);
    $row_cnt = $result->num_rows;
  }
  /* End of unique notification id creation */
  
  $sql = "INSERT INTO `Notification` (notification_id, application_id, id, recipient_id, hours, message) 
  VALUES ('$notification_id', '$application_id', '$user', '$faculty', '$hours', '$message')";
  $result = $conn->query($sql);
  
}

$dates = join(',', $dates);

$sql = "INSERT INTO `Application` (application_id, id, dates, type, reason, status) 
VALUES ('$application_id', '$user', '$dates', '$leavetype', '$reason', 'Pending')";
$result = $conn->query($sql);

$conn->close();
header('Location: new_application.php');

?>