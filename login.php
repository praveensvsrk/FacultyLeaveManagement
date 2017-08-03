<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
mysqli_select_db($conn,"FLT");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$user = $_POST['usr'];
$pass =  md5($_POST['pwd']);

$sql = "SELECT * FROM `Faculty` where `id`='$user' and `password`='$pass'";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    $conn->close();
    $row = $result->fetch_assoc();
    $_SESSION["user"] = $user;
    $_SESSION["name"] = $row['name'];
    $_SESSION["type"] = $row['type'];
    if(strcmp($_SESSION['type'], "Teaching") == 0 || strcmp($_SESSION['type'], "Non-Teaching") == 0)
      header('Location: dashboard.php');
    else if(strcmp($_SESSION['type'], "Admin") == 0)
      header('Location: admin_dashboard.php');
    else if(strcmp($_SESSION['type'], "HOD") == 0)
      header('Location: hod_dashboard.php');
} else {
    $conn->close();
    header('Location:'.'login.html');
}

?>