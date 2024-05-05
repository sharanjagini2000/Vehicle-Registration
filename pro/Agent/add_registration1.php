<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "vehicleregistration";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$vin = $_POST['vin'];
$vendor = $_POST['vendor'];
$name = $_POST['name']; 
$model = $_POST['model'];
$man_year = $_POST['man_year'];
$colour = $_POST['colour']; 
$vtype = $_POST['vtype'];
$wsize = $_POST['wsize'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email']; 
$mobile = $_POST['mobile'];
$gender = $_POST['gender']; 
$ssn = $_POST['ssn'];

$sql = "INSERT INTO user (firstname, lastname, email, mobile, gender, ssn) VALUES ('$firstname', '$lastname', '$email', '$mobile', '$gender', '$ssn')";
$conn->query($sql);
$sql_1= "INSERT INTO vehicles (vin, vendor, name, model, man_year, colour, vtype, wsize) VALUES ('$vin', '$vendor', '$name', '$model', '$man_year', '$colour', '$vtype', '$wsize')";
$conn->query($sql_1);
$sql_2= "INSERT INTO Registrationsrequest (ssn, vin) VALUES ('$ssn', '$vin')";
$conn->query($sql_2);

if ($conn->multi_query($sql) === TRUE) {
  echo "REQUEST SUCESSFULLY SUBMITTED.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
