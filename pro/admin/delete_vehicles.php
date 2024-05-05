<?php

$search = $_POST['searchdel'];

session_start();
$_SESSION['search'] = $search;

$servername = "localhost";
$username = "root";
$password = "";
$db = "vehicleregistration";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "select * from vehicles where vin like '%$search%'";
$result = $conn->query($sql);


if ($result === false) { die(mysqli_error($conn)); }

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
$vin = $row["vin"];
$vendor = $row["vendor"];
$name = $row["name"];
$model = $row["model"];
$colour = $row["colour"];
$vtype = $row["vtype"];
$man_year = $row["man_year"];
$wsize = $row["wsize"];
}
} else {
	exit("0 records found");
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
</style>
</head>
<body>

<h2>VEHICLE RECORDS</h2>

<table>
  <tr>
    <td>CHASSIS NUMBER</td>
    <th><?php echo $vin?></th>
  </tr>
  <tr>
    <td>VENDOR</td>
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
    <td>COLOUR</td>
    <th><?php echo $colour?></th>
  </tr>
  <tr>
    <td>VEHICLE TYPE</td>
    <th><?php echo $vtype?></th>
  </tr>
  <tr>
    <td>MANUFACTURE YEAR</td>
    <th><?php echo $man_year?></th>
  </tr>
  <tr>
    <td>NUMBER OF WHEELS</td>
    <th><?php echo $wsize?></th>
  </tr>
</table>
<button type="submit" value="submit" onClick="del()" class="registerbtn">Delete</button>
</body>
<script>
function del(){
window.location.href="/pro/admin/delete_vehicles1.php";
}
</script>
</html>