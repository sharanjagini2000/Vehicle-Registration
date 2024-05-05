<?php

   session_start();
   $searchdel = $_SESSION['searchdel'];
   $searchid = $_SESSION['searchid'];

$servername = "localhost";
$username = "root";
$password = "";
$db = "vehicleregistration";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

if ($searchid == "username"){
$sql = "DELETE FROM user WHERE username = '$searchdel'";
if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
}

if ($searchid == "email"){
$sql = "DELETE FROM user WHERE email = '$searchdel'";
if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
}
?>