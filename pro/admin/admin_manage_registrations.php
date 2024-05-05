<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "vehicleregistration";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "select * from registrationsrequest";
$result = $conn->query($sql);

if ($result === false) { die(mysqli_error($conn)); }

if ($result->num_rows > 0){
echo ' <span style="color:#AFA;text-align:center;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;REGISTRATION REQUESTS</span>';
echo "<br></br><br></br><br></br>";
echo '<span style="color:#AFA;text-align:center;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;ID &emsp;&emsp;</span>';
echo '<span style="color:#AFA;text-align:center;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;VIN Number</span>';
while($row = $result->fetch_assoc() ){
echo "<br></br>";
echo '<span style="color:#AFA;text-align:center;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;'.$row["rrid"].'&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;'.$row["vin"].'</span>';
}
}
else {
	exit("0 Pending Registrations found.");
}
echo "<br></br><br></br>";
echo '<span style="color:#AFA;text-align:center;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;click</span>';
$conn->close();

?>


<html>
<a href="msearch.html">here.</a>
'<span style="color:#AFA;text-align:center;">to verify Requested Registrations.</span>';
</html>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  background-image: url('/pro/img/login.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
</style>
</head>
</html>




