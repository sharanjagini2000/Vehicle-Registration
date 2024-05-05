<?php

   session_start();
   $un = $_SESSION['uname'];

$servername = "localhost";
$username = "root";
$password = "";
$db = "vehicleregistration";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "select ssn from user where username like '$un'";
$result = $conn->query($sql);
if ($result === false) { die(mysqli_error($conn)); }
if ($conn->query($sql) === TRUE) {} 
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
$ssn = $row['ssn'];
}}
$conn->query($sql);

$sql_1 = "SELECT vehicles.vin, vehicles.colour, vehicles.vendor, vehicles.name, vehicles.model, vehicles.man_year, vehicles.vtype, vehicles.wsize, registration.vin, registration.ssn
FROM vehicles
INNER JOIN      
registration
on vehicles.vin = registration.vin
WHERE registration.ssn like '$ssn'";
$res = $conn->query($sql_1);

if ($res === false) { die(mysqli_error($conn)); }

if ($res->num_rows > 0){
while($row = $res->fetch_assoc() ){
$registernumber = $row["registernumber"];
$vin = $row["vin"];
$vendor = $row["vendor"];
$name = $row["name"];
$model = $row["model"];
$man_year = $row["man_year"];
$colour = $row["colour"];
$vtype = $row["vtype"];
$wsize = $row["wsize"];
}
} else {
        exit("0 records found."); 
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

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>VEHICLE RECORDS</h2>

<table>
  <tr>
    <td>REGISTER NUMBER</td>
    <th><?php echo $registernumber?></th>
  </tr>
  <tr>
    <td>CHASSIS NUMBER</td>
    <th><?php echo $vin?></th>
  </tr>
  <tr>
    <td>VENDOR NAME</td>
    <th><?php echo $vendor?></th>
  </tr>
  <tr>
    <td>NAME</td>
    <th><?php echo $name?></th>
  </tr>
  <tr>
    <td>MODEL</td>
    <th><?php echo $model?></th>
  </tr>
  <tr>
    <td>MANUFACTURE YEAR</td>
    <th><?php echo $man_year?></th>
  </tr>
  <tr>
    <td>VEHICLE COLOUR</td>
    <th><?php echo $colour?></th>
  </tr>
  <tr>
    <td>VEHICLE TYPE</td>
    <th><?php echo $vtype?></th>
  </tr>
  <tr>
    <td>NUMBER OF WHEELS</td>
    <th><?php echo $wsize?></th>
  </tr>
  <tr>
</table>

</body>
</html>