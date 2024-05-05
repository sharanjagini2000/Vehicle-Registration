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

$sql = "select * from user where username like '%$un%'";
$result = $conn->query($sql);

if ($result === false) { die(mysqli_error($conn)); }

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
$username = $row["username"];
$firstname = $row["firstname"];
$lastname = $row["lastname"];
$email = $row["email"];
$mobile = $row["mobile"];
$roles = $row["roles"];
$ssn = $row["ssn"];
$gender = $row["gender"];
}
} else {
	echo "0 records";
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

<h2>USER PROFILE</h2>

<table>
  <tr>
    <td>FIRST NAME</td>
    <th><?php echo $firstname?></th>
  </tr>
  <tr>
    <td>LAST NAME</td>
    <th><?php echo $lastname?></th>
  </tr>
  <tr>
    <td>USERNAME</td>
    <th><?php echo $username?></th>
  </tr>
  <tr>
    <td>E-MAIL</td>
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
    <th><?php echo $mobile?></th>
  </tr>
  <tr>
    <td>ROLE</td>
    <th><?php echo $roles?></th>
  </tr>
</table>
<button type="submit" value="submit" onClick="changepwd()" class="registerbtn">Change Password</button>
</body>
<script>
function changepwd(){
window.location.href="/pro/profiles/changepassword.html";
}
</script>
</html>