<?php

$val = $_POST['searchid'];
$registernumber = $_POST['registernumber'];
$vin = $_POST['vin'];
$ssn = $_POST['ssn'];

$servername = "localhost";
$username = "root";
$password = "";
$db = "vehicleregistration";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

if ($val == "accept"){
$sql = "insert into registration (registernumber, vin, ssn) VALUES ('$registernumber', '$vin', '$ssn')";
$conn->query($sql);
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql_1 = "DELETE FROM registrationsrequest WHERE vin like '%$vin%'";
$conn->query($sql_1);
if ($conn->query($sql_1) === TRUE) {
  echo "APPLICATION REJECTED";
} else {
  echo "Error: " . $sql_1 . "<br>" . $conn->error;
}
}
if($val == "reject"){
$sql = "insert into rejectedregistrations (vin, ssn) VALUES ('$vin', '$ssn')";
$conn->query($sql);
if ($conn->query($sql) === TRUE) {
  echo "APPLICATION";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql_1 = "DELETE FROM registrationsrequest WHERE vin like '%$vin%'";
$conn->query($sql_1);
if ($conn->query($sql_1) === TRUE) {
  echo " REJECTED";
} else {
  echo "Error: " . $sql_1 . "<br>" . $conn->error;
}
}


$conn->close();



?>