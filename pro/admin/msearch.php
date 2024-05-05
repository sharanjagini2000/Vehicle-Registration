<?php

$search = $_POST['search'];

$servername = "localhost";
$username = "root";
$password = "";
$db = "vehicleregistration";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "select * from registrationsrequest where vin like '$search'";
$result = $conn->query($sql);
$conn->query($sql);

$sql_1 = "SELECT vehicles.colour, vehicles.vendor, vehicles.name, vehicles.model, vehicles.man_year, vehicles.vtype, vehicles.wsize, registrationsrequest.vin, registrationsrequest.ssn
FROM vehicles 
INNER JOIN registrationsrequest
on vehicles.vin=registrationsrequest.vin
WHERE registrationsrequest.vin like '$search'";
$res = $conn->query($sql_1);
if ($res === false) { die(mysqli_error($conn)); }
if ($res->num_rows > 0){
while($row = $res->fetch_assoc() ){
$vendor = $row["vendor"];
$name = $row["name"];
$model = $row["model"];
$man_year = $row["man_year"];
$colour = $row["colour"];
$vtype = $row["vtype"];
$wsize = $row["wsize"];
}}
$conn->query($sql_1);

$sql_2 = "select user.firstname, user.lastname, user.email, user.gender, user.mobile, registrationsrequest.vin, registrationsrequest.ssn
FROM user
INNER JOIN registrationsrequest
on user.ssn=registrationsrequest.ssn
WHERE registrationsrequest.vin like '$search'";
$res2 = $conn->query($sql_2);
if ($res2 === false) { die(mysqli_error($conn)); }
if ($res2->num_rows > 0){
while($row = $res2->fetch_assoc() ){
$firstname = $row["firstname"];
$lastname = $row["lastname"];
$ssn = $row["ssn"];
$email = $row["email"];
$mobile = $row["mobile"];
$gender = $row["gender"];
}}
$conn->query($sql_2);


if ($result === false) { die(mysqli_error($conn)); }

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
$registernumber = $row["registernumber"];
$vin = $row["vin"];
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

<h2>Registartion Request Details</h2>
<form action="rdelete.php" method="post">
<table>
  <tr>
    <td>REGISTER NUMBER</td>
    <th><input type="text" id="role" name="registernumber" value="<?php echo $registernumber?>"></th>
  </tr>
  <tr>
    <td>CHASSIS NUMBER</td>
    <th><input type="text" id="role" name="vin" value="<?php echo $vin?>"></th>
  </tr>
  <tr>
    <td>VENDOR NAME</td>
    <th><input type="text" id="role" name="role" value="<?php echo $vendor?>"></th>
  </tr>
  <tr>
    <td>NAME</td>
    <th><input type="text" id="role" name="role" value="<?php echo $name?>"></th>
  </tr>
  <tr>
    <td>MODEL</td>
    <th><input type="text" id="role" name="role" value="<?php echo $model?>"></th>
  </tr>
  <tr>
    <td>MANUFACTURE YEAR</td>
    <th><input type="text" id="role" name="role" value="<?php echo $man_year?>"></th>
  </tr>
  <tr>
    <td>VEHICLE COLOUR</td>
    <th><input type="text" id="role" name="role" value="<?php echo $colour?>"></th>
  </tr>
  <tr>
    <td>VEHICLE TYPE</td>
    <th><input type="text" id="role" name="role" value="<?php echo $vtype?>"></th>
  </tr>
  <tr>
    <td>NUMBER OF WHEELS</td>
    <th><input type="text" id="role" name="role" value="<?php echo $wsize?>"></th>
  </tr>
  <tr>
    <td>FIRST NAME</td>
    <th><input type="text" id="role" name="role" value="<?php echo $firstname?>"></th>
  </tr>
  <tr>
    <td>LAST NAME</td>
    <th><input type="text" id="role" name="role" value="<?php echo $lastname?>"></th>
  </tr>
  <tr>
    <td>GENDER</td>
    <th><input type="text" id="role" name="role" value="<?php echo $gender?>"></th>
  </tr>
  <tr>
    <td>SSN</td>
    <th><input type="text" id="role" name="ssn" value="<?php echo $ssn?>"></th>
  </tr>
  <tr>
    <td>EMAIL</td>
    <th><input type="text" id="role" name="role" value="<?php echo $email?>"></th>
  </tr>
  <tr>
    <td>MOBILE</td>
    <th><input type="text" id="role" name="role" value="<?php echo $mobile?>"></th>
  </tr>
</table><br></br>
    <select name="searchid" id="searchid">
    <option value="accept">ACCEPT APPLICATION</option>
    <option value="reject">REJECT APPLICATION</option>
    </select><br></br>
<button type="submit" value="submit" onClick="checkForm()" class="registerbtn">SUBMIT</button>
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

.registerbtn:hover {
  background-color: RoyalBlue;
}
</style>

</html>






