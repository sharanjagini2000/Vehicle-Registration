<?php

$searchmod = $_POST['search'];
$searchid = $_POST['searchid'];

$servername = "localhost";
$username = "root";
$password = "";
$db = "vehicleregistration";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

if ($searchid == "username"){
$sql = "select * from user where username like '%$searchmod%'";
$result = $conn->query($sql);
}
if ($searchid == "email"){
$sql = "select * from user where email like '%$searchmod%'";
$result = $conn->query($sql);
}

if ($result === false) { die(mysqli_error($conn)); }

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
$firstname = $row["firstname"];
$lastname = $row["lastname"];
$username = $row["username"];
$email = $row["email"];
$mobile = $row["mobile"];
$roles = $row["roles"];
$gender = $row["gender"];
$ssn = $row["ssn"];
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
<form action="admin_modify_profiles1.php" method="post">
<h2>USER RECORDS</h2>

<table>
  <tr>
    <td>FIRST NAME</td>
    <th><input type="text" id="fname" name="fname" value="<?php echo $firstname?>"><br><br></th>
  </tr>
  <tr>
    <td>LAST NAME</td>
    <th><input type="text" id="lname" name="lname" value="<?php echo $lastname?>"><br><br></th>
  </tr>
  <tr>
    <td>USERNAME</td>
    <th><input type="text" id="uname" name="uname" value="<?php echo $username?>"><br><br></th>
  </tr>
  <tr>
    <td>EMAIL</td>
    <th><input type="text" id="Email" name="Email" value="<?php echo $email?>"><br><br></th>
  </tr>
  <tr>
    <td>PASSWORD</td>
    <th><input type="text" id="pass" name="pass" value="<?php echo $password?>"><br><br></th>
  </tr>
  <tr>
    <td>SSN</td>
    <th><input type="text" id="ssn" name="ssn" value="<?php echo $ssn?>"><br><br></th>
  </tr>
  <tr>
    <td>GENDER</td>
    <th><input type="text" id="gender" name="gender" value="<?php echo $gender?>"><br><br></th>
  </tr>
  <tr>
    <td>MOBILE</td>
    <th><input type="text" id="phone" name="phone" value="<?php echo $mobile?>"><br><br></th>
  </tr>
  <tr>
    <td>ROLES</td>
    <th><input type="text" id="role" name="role" value="<?php echo $roles?>"><br><br></th>
  </tr>
</table>
  <button type="submit" value="submit" onClick="checkForm()" class="registerbtn">UPDATE USER DATA</button>
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