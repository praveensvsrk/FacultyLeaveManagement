<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);
mysqli_select_db($conn,"FLT");

$data = json_decode($_POST['data'], true);
$id = $data['id'];
$action = $data['action'];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(strcmp($action, "cancel") == 0){
  $conn->query("DELETE FROM `Application` where application_id = '$id'");
  $conn->query("DELETE FROM `Notification` where application_id = '$id'");
  $conn->query("DELETE FROM `Finalsubs` where application_id = '$id'");
}
else if(strcmp($action, "send") == 0){
  $conn->query("UPDATE `Application` SET status = 'HOD' where application_id = '$id'");
}
$conn->close();
header('Location: track_application.php');

?>