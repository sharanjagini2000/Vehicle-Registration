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
h2{
text-align:center;
}
</style>
</head>
<body>
<form action="add_vehicles.php" method="post">
<h2>ADD NEW VEHICLE </h2>

<table>
  <tr>
    <td>CHASSIS NUMBER</td>
    <th><input type="text" id="vin" name="vin" ><br><br></th>
  </tr>
  <tr>
    <td>VENDOR</td>
    <th><input type="text" id="vendor" name="vendor" ><br><br></th>
  </tr>
  <tr>
    <td>NAME</td>
    <th><input type="text" id="name" name="name" ><br><br></th>
  </tr>
  <tr>
    <td>MODEL</td>
    <th><input type="text" id="model" name="model" ><br><br></th>
  </tr>
  <tr>
    <td>MANUFACTURE YEAR</td>
    <th><input type="text" id="man_year" name="man_year" ><br><br></th>
  </tr>
  <tr>
    <td>COLOUR</td>
    <th><input type="text" id="colour" name="colour" ><br><br></th>
  </tr>
  <tr>
    <td>VEHICLE TYPE</td>
    <th><input type="text" id="vtype" name="vtype" ><br><br></th>
  </tr>
  <tr>
    <td>NUMBER OF WHEELS</td>
    <th><input type="text" id="wsize" name="wsize" ><br><br></th>
  </tr>
</table>
  <button type="submit" value="submit" onClick="checkForm()" onclick="fun()" class="registerbtn">ADD VEHICLE</button>
</form>
</body>
<style>
.registerbtn {
  background-color: DodgerBlue;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}
.absolute {
  text-align: center;
  position: absolute;
  width: 99%;
  bottom: 2px;
}
.registerbtn:hover {
  background-color: RoyalBlue;
}

</style>
<script>
function fun(){
<?php
echo "Vehicle added sucessfully.";
?>
}
</script>
<div class="absolute">
<h10>NOTE: This page is for un-registered Vehicles.</h10>
</div>
</html>






<?php
if(isset($_POST['username'])){  
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

$sql = "INSERT INTO vehicles (vin, vendor, name, model, man_year, colour, vtype, wsize) VALUES ('$vin', '$vendor', '$name', '$model', '$man_year', '$colour', '$vtype', '$wsize')";

$conn->close();
}
?>



