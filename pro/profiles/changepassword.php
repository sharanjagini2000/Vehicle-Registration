<?php

   session_start();
   $un = $_SESSION['uname'];

$mysqli = new mysqli("localhost", "root", "", "vehicleregistration");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Escape user inputs for security
$password1 = $mysqli->real_escape_string($_REQUEST['password1']);
$password2 = $mysqli->real_escape_string($_REQUEST['password2']);



if($password1 == $password2){
$pass = md5($password1.$password1);

$sql = "UPDATE user SET password='$pass' where username like '%$un%'";

if($mysqli->query($sql) === true){
    echo "successfully updated the password .";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}

}

$mysqli->close();
?>