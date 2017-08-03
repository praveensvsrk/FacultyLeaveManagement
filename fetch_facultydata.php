<?php

if(!isset($_SESSION['freehours'])){
  $servername = "localhost";
  $username = "root";
  $password = "";

  $conn = new mysqli($servername, $username, $password);
  mysqli_select_db($conn,"FLT");
  
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  $user = $_SESSION["user"];
  $sql = "SELECT * FROM `FreeHours`";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      $json = array();
      while($row = $result->fetch_assoc()) {
        $faculty_freehours = array();
        foreach ($row as $key => $val){
          $decoded_freehours = array();
          if($key != 'id'){
            $encoded_freehours = explode(',', $val);
            $encoded_freehours = array_map('intval', $encoded_freehours);
            $encoded_freehours = array_diff(array(1,2,3,4,5,6,7,8), $encoded_freehours);
            foreach ($encoded_freehours as $freehour){
              $time = new DateTime('2017-01-01 09:00:00');
              $time->add(new DateInterval('PT' . '50'*$freehour . 'M'));
              $end = $time->format('H:i');
              $time->sub(new DateInterval('PT' . '50' . 'M'));
              $start = $time->format('H:i');
              array_push($decoded_freehours, $start.'-'.$end);
              
            }
            $faculty_freehours[$key] = $decoded_freehours;
          }
          
        }
        $faculty_id = $row['id'];
        $f = $conn->query("SELECT name FROM `Faculty` where id='$faculty_id'")->fetch_assoc();
        $json[$row['id'] . "," . $f['name']] = $faculty_freehours;
        
      }
      
      $_SESSION['freehours'] = json_encode($json);
      
      $conn->close();
  } else {
      $conn->close();
      header('Location:'.'login.html');
  }
}
if(!isset($_SESSION['section'])){
  $servername = "localhost";
  $username = "root";
  $password = "";

  $conn = new mysqli($servername, $username, $password);
  mysqli_select_db($conn,"FLT");
  
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  $user = $_SESSION["user"];
  $sql = "SELECT section from `Faculty` where id='$user'";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    //$json = json_encode($row);
    $_SESSION["section"] = $row['section'];
  }
  $conn->close();
  
}

if(!isset($_SESSION['quota'])){
  $servername = "localhost";
  $username = "root";
  $password = "";

  $conn = new mysqli($servername, $username, $password);
  mysqli_select_db($conn,"FLT");
  
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  $user = $_SESSION["user"];
  $sql = "SELECT * from `Faculty`";
  $result = $conn->query($sql);
  $conn->close();
}


?>