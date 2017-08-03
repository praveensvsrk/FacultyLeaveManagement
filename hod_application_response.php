<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);
mysqli_select_db($conn,"FLT");

$data = json_decode($_POST['data'], true);
$id = $data['id'];
$status = $data['status'];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE `Application` SET status = '$status' where application_id='$id'";
$conn->query($sql);
if(strcmp($status, "Accepted") == 0){
  $row = $conn->query("SELECT * from `Application` where application_id='$id'")->fetch_assoc();
  $type = $row['type'];

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
  $id = $row['id'];
  $dates_count = count(explode(',', $row['dates']));
  $sql = "UPDATE `leavesquota` SET " . $type . " = " . $type . "-1 where id='$id'";
  $result = $conn->query($sql);
  
}

$conn->close();
header('Location: pending.php');

?>