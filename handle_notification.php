<?php 

$json = json_decode($_POST['data'], true);
$status = $json['status'];
$id = $json['id'];

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);
mysqli_select_db($conn,"FLT");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$application_id = '';
$sql = "SELECT * FROM `Notification` where notification_id='$id'";
$result = $conn->query($sql);
$row_cnt = $result->num_rows;
if($row_cnt > 0){
  $to_be_deleted = array();
  array_push($to_be_deleted, $id);
  if(strcmp($status, "accept") == 0){
    while($row = $result->fetch_assoc()){
      $hours = explode(',', $row['hours']);
      $application_id = $row['application_id'];
      $sql = "SELECT * FROM `Notification` where application_id='$application_id'";
      $result2 = $conn->query($sql);
      while($row2 = $result2->fetch_assoc()){
        $id2 = $row2['notification_id'];
        $hours2 = explode(',', $row2['hours']);
        $common = array_intersect($hours, $hours2);
        $hours2 = array_diff($hours2, $common);
        $hours2 = join(',', $hours2);
        if(strcmp($hours2, "") == 0){
          array_push($to_be_deleted, $row2['notification_id']);
        }
        else{
          $message = json_decode($row2['message'], true);
            foreach($common as $date){
            unset($message[$date]);
          }
          $message = json_encode($message);
          $sql = "UPDATE `Notification` SET `hours`='$hours2', `message`='$message' where `notification_id` = '$id2'";
          $conn->query($sql);
        }
      }
    }
    $sql = "SELECT * FROM `Notification` WHERE `notification_id` = '$id'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
      $message = $row['message'];
      $application_id = $row['application_id'];
      $r_id = $row['recipient_id'];
      $sql = "INSERT INTO `Finalsubs`(application_id, faculty_id, message) VALUES ('$application_id', '$r_id', '$message')";
      $conn->query($sql);
    }
  }
}
foreach($to_be_deleted as $id){  
    $sql = "DELETE FROM `Notification` WHERE `notification_id` = '$id'";
    $conn->query($sql);
 }
$sql = "SELECT * from `Notification` WHERE `application_id` = '$application_id'";
$result = $conn->query($sql);
if($result->num_rows == 0){
  $sql = "SELECT * from `Finalsubs` WHERE `application_id` = '$application_id'";
  $result = $conn->query($sql);
  if($result->num_rows == 0){
    $sql = "UPDATE `Application` SET `status`='Declined' where `application_id` = '$application_id'";
    $conn->query($sql);
  } else{
    $sql = "UPDATE `Application` SET `status`='Confirm' where `application_id` = '$application_id'";
    $conn->query($sql);
  }
}

$conn->close();
header('Location: notification.php');

?>