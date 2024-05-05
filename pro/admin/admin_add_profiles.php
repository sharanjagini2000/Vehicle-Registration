<?php
$mysqli = new mysqli("localhost", "root", "", "vehicleregistration");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Escape user inputs for security
$firstname = $mysqli->real_escape_string($_REQUEST['firstname']);
$lastname = $mysqli->real_escape_string($_REQUEST['lastname']);
$username = $mysqli->real_escape_string($_REQUEST['username']);
$email = $mysqli->real_escape_string($_REQUEST['email']);  
$pass = $mysqli->real_escape_string($_REQUEST['password']);
$mobile = $mysqli->real_escape_string($_REQUEST['mobile']);
$ssn = $mysqli->real_escape_string($_REQUEST['ssn']);
$gender = $mysqli->real_escape_string($_REQUEST['gender']);
$roles = $mysqli->real_escape_string($_REQUEST['roles']);

$password = md5($pass.$pass);

$sql = "INSERT INTO user (firstname, lastname, username, email, password, mobile,ssn,gender, roles) VALUES ('$firstname', '$lastname', '$username', '$email', '$password', '$mobile', '$ssn', '$gender', '$roles')";



if($mysqli->query($sql) === true){
    echo "successfully Created the account.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
// Close connection
$mysqli->close();
?>




