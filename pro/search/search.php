
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
    <th><label><?php echo $registernumber?></label></th>
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
    <td>FIRST NAME</td>
    <th><?php echo $firstname?></th>
  </tr>
  <tr>
    <td>LAST NAME</td>
    <th><?php echo $lastname?></th>
  </tr>
  <tr>
    <td>EMAIL</td>
    <th><?php echo $email?></th>
  </tr>
  <tr>
    <td>SSN</td>
    <th><?php echo $ssn?></th>
  </tr>
  <tr>
    <td>GENDER</td>
    <th><?php echo $gender?></th>
  </tr>
  <tr>
    <td>MOBILE</td>
    <th><input type="text" id="phone" name="phone" value="<?php echo $mobile?>"><br><br></th>
  </tr>
</table>

</body>
</html>





<?php

$search = $_POST['search'];
$searchid = $_POST['searchid'];

$servername = "localhost";
$username = "root";
$password = "";
$db = "vehicleregistration";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

if ($searchid == "vin"){
$sql = "SELECT user.firstname, user.lastname, user.mobile, user.ssn, user.email, user.gender, registration.vin, registration.ssn
FROM user 
INNER JOIN      
registration
on user.ssn = registration.ssn
WHERE registration.vin like '%$search%'";
$result = $conn->query($sql);
if ($result === false) { 
die(mysqli_error($conn)); 
}
if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$ssn = $row['ssn'];
$email = $row['email'];
$mobile = $row['mobile'];
$gender = $row['gender'];
$vin = $row['vin'];
$registernumber = $row['registernumber'];
}
}
exit("Data fetch failed.1");
$conn->query($sql);
}
else{
$sql_1 = "SELECT vehicles.colour, vehicles.vendor, vehicles.name, vehicles.model, vehicles.man_year, vehicles.vtype, vehicles.wsize, vehicles.vin, registration.vin, registration.ssn
FROM vehicles 
INNER JOIN registration
on vehicles.vin = registration.vin
WHERE registration.registernumber like '%$search%'";
$res = $conn->query($sql_1);
if ($res === false) { 
die(mysqli_error($conn)); 
}
if ($res->num_rows > 0){
while($row = $res->fetch_assoc() ){
$vendor = $row['vendor'];
$name = $row['name'];
$model = $row['model'];
$vin = $row['vin'];
$man_year = $row['man_year'];
$colour = $row['colour'];
$vtype = $row['vtype'];
$wsize = $row['wsize'];
$registernumber = $search;
}
}
exit("Data fetch failed.2");
$conn->query($sql_1);
}

$conn->close();

?>