<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FLT";


$conn = new mysqli($servername, $username, $password);
mysqli_select_db($conn,"FLT");

if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$data = json_decode($_POST['data'], true);

$id = $data['id'];
$name = $data['name'];
$city = $data['city'];
$type = $data['type'];
$email = $data['email'];
$contact = $data['contact'];
$freehours = json_decode($data['freehours'], true);
$sections = $data['sections'];

$sql = "UPDATE `Faculty` SET 
        name='$name',
        city='$city',
        type='$type',
        email='$email',
        contact='$contact',
        section='$sections' 
        WHERE id='$id'";
$conn->query($sql);

foreach($freehours as $day => $hours){
  $hours = join(',', $hours);
  $sql = "UPDATE `FreeHours` SET " . $day . " = '$hours' where id='$id'";
  $conn->query($sql);
}
$conn->query($sql);
header("Location: admin.php");


?>