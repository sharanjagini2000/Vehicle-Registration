<?php  
$flag = 0;   
if(isset($_POST['username'])){       
$server = "localhost";        
$usrnm = "root";        
$pswrd = "";        
$connection = mysqli_connect($server,$usrnm,$pswrd);       
if(!$connection){           
die("Database Connection Failed" . 
mysqli_connect_error());        
}
       
$username = $_POST['username'];        
$pass = $_POST['password'];
$roles = $_POST['roles'];

   session_start();
   $_SESSION['username'] = $username;


$password = md5($pass.$pass);

$query = "SELECT * FROM `vehicleregistration`.`user` WHERE `username`='$username' and `password`='$password' and `roles`='$roles'";
$result = mysqli_query($connection,$query);  
$count = mysqli_num_rows($result);        

if($count > 0){            
$flag = 1;
if($roles==admin){            
header("location: /pro/home/admin.html");      
}
if($roles==user){ 
header("location: /pro/home/user.php"); 
}
if($roles==agent){ 
header("location: /pro/home/agent.php");  
}
if($roles==rto){ 
header("location: /pro/home/rto.html");  
}
}
else        
{            
echo "<p class = 'msg'>Invalid Username or Password or Login Type.</p>";            
echo "<p class = 'msg'>Login Failed</p>";     
}                 
       
$connection->close();    
}
?>





<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
h1 {
  text-align: center;
  color: white;
}
.container {
  padding: 50px;
}
.unamecenter {
  margin: 0;
  position: absolute;
  top: 50%;
  right: 43%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}
.passcenter {
  margin: 0;
  position: absolute;
  top: 60%;
  right: 43%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}
.rolescenter {
  margin: 0;
  position: absolute;
  top: 66%;
  right: 49%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%)
}
.rememberme {
  margin: 0;
  position: absolute;
  top: 73%;
  right: 52%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%)
}
.register{
  margin: 0;
  position: absolute;
  top: 85%;
  right: 44%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%)
}
.login {
  margin: 0;
  position: absolute;
  top: 76%;
  right: 52%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%)
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
  border: none;
  cursor: pointer;
  width: 300%;
}
.button:hover {
  background-color: #3C61A7;
  color: white;
}

input[type="text"]::placeholder {
  text-align: center; 
} 
input[type="password"]::placeholder {  
  text-align: center; 
} 
.roles {
  -webkit-appearance: none;
  border: 0;
  text-align: center; 
  width: 100%;
  height: var(--select-height);
} 
#ip {
    border-radius: 25px;
    border: 2px solid #609;
    padding: 20px; 
    width: 200px;
    height: 5px;    
}
#roles {
border-radius: 15px;
width:100px;
}
body {
  background-image: url('/pro/img/login.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
img {
  margin: 0;
  position: absolute;
  top: 25%;
  right: 48%;
  width: 100px;
  height: 100px;
  border-radius: 50%;
}

</style>
</head>
<body>
<h1>VEHICLE REGISTRATION LOGIN PAGE</h1>
<form class="modal-content animate" action="login.php" method="post">

<div class="container">
<img src="/pro/img/img_avatar.png" alt="Avatar">
<div class="unamecenter">
<input type="text" placeholder="Username" name="username" id="ip" required><br><br>
</div>
<div class="passcenter">
<input type="password" placeholder="Password" name="password" id="ip" required><br><br>
</div>
<div class="rolescenter">
<select name="roles" id="roles">
<option> <label> ----login as----</label></option>
<option value="admin">ADMIN</option>
<option value="agent">AGENT</option>
<option value="user">USER</option>
<option value="rto">RTO</option>
</select>
</div>
<br><br>
<div class ="rememberme">
<label style="color:white;"><input type="checkbox" checked="checked" name="remember"> Remember me</label><br><br>
</div>
<div class="login">
<br><br>
<button type="submit" class="button button"value="Submit">Login</button>
<br><br>
</div>
<div class="register">
<span class="link">Don't have an account <a href="register_form.html">create here</a></span>
</div>
</div>

</form>

</body>
</body>
</html>