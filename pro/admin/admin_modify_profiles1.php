<?php
$mysqli = new mysqli("localhost", "root", "", "vehicleregistration");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Escape user inputs for security
$fname = $mysqli->real_escape_string($_REQUEST['fname']);
$lname = $mysqli->real_escape_string($_REQUEST['lname']);
$uname = $mysqli->real_escape_string($_REQUEST['uname']);
$Email = $mysqli->real_escape_string($_REQUEST['Email']);  
$pass = $mysqli->real_escape_string($_REQUEST['pass']);
$phone = $mysqli->real_escape_string($_REQUEST['phone']);
$role = $mysqli->real_escape_string($_REQUEST['role']);

$passw = md5($pass.$pass);

$sql = "UPDATE user SET firstname='$fname', lastname='$lname', username='$uname', email='$Email', password='$passw', mobile='$phone', roles='$role' WHERE username = '$uname'";

if($mysqli->query($sql) === true){
    echo "successfully Modified user details.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
// Close connection
$mysqli->close();
?>
