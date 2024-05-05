<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "vehicleregistration";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "select * from rejectedregistrations";
$result = $conn->query($sql);


if ($result === false) { die(mysqli_error($conn)); }

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
$vin = $row["vin"];
$rejid = $row["rejid"];
$ssn = $row["ssn"];
}}
else {
$vin = 0;
$rejid = 0;
$ssn = 0;
}

$conn->close();
?>








<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
h2{
text-align:center;
color:white;
}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  color: white;
}

tr:nth-child() {
  background-color: #dddddd;
}
.button {
  background-color: white; 
  color: black; 
  margin: 8px 8px;
  border: 2px solid #3C61A7;
  border-radius: 30px;
  width: 180%;
}
button {
  background-color: #3C61A7;
  color: white;
  text-align: center;
  padding: 14px 20px;
  margin: 8px 8px;
  border: 2px solid #3C61A7;
  border-radius: 30px;
  cursor: pointer;
  width: 95%;
}
.button:hover {
  background-color: #3C61A7;
  color: white;
}
body {
  background-image: url('/pro/img/login.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
</style>
</head>
<body>

<h2>REGISTARTION REJECTED VEHICLES</h2>

<table>
  <tr>
    <td>ID</td>
    <td>SSN</td>
    <td>CHASSIS NUMBER</td>
  </tr>
  <tr>
    <th><?php echo $rejid?></th>
    <th><?php echo $ssn?></th>
    <th><?php echo $vin?></th>
  </tr>
</table>
</body>
</html>



