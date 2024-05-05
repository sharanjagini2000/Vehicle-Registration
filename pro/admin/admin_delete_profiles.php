<?php

$searchdel = $_POST['searchdel'];
$searchid = $_POST['searchid'];

   session_start();
   $_SESSION['searchdel'] = $searchdel;
   $_SESSION['searchid'] = $searchid;

$servername = "localhost";
$username = "root";
$password = "";
$db = "vehicleregistration";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

if ($searchid == "username"){
$sql = "select * from user where username like '%$searchdel%'";
$result = $conn->query($sql);
}
if ($searchid == "email"){
$sql = "select * from user where email like '%$searchdel%'";
$result = $conn->query($sql);
}

if ($result === false) { die(mysqli_error($conn)); }

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
$roles = $row["roles"];
$email = $row["email"];
$mobile = $row["mobile"];
$username = $row["username"];
$firstname = $row["firstname"];
$lastname = $row["lastname"];
$gender = $row["gender"];
$ssn = $row["ssn"];
}
} 
else {
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

<h2>USER RECORDS</h2>

<table>
  <tr>
    <td>FIRST NAME</td>
    <th><?php echo $firstname?></th>
  </tr>
  <tr>
    <td>LASTNAME</td>
    <th><?php echo $lastname?></th>
  </tr>
  <tr>
    <td>USERNAME</td>
    <th><?php echo $username?></th>
  </tr>
  <tr>
    <td>EMAIL</td>
    <th><?php echo $email?></th>
  </tr>
  <tr>
    <td>MOBILE</td>
    <th><?php echo $mobile?></th>
  </tr>
  <tr>
    <td>ROLE</td>
    <th><?php echo $roles?></th>
  </tr>
  <tr>
    <td>SSN</td>
    <th><?php echo $ssn?></th>
  </tr>
  <tr>
    <td>GENDER</td>
    <th><?php echo $gender?></th>
  </tr>
</table>
<button type="submit" value="submit" onClick="del()" class="registerbtn">Delete</button>
</body>
<script>
function del(){
window.location.href="/pro/admin/delete_profile.php";
}
</script>
</html>