<?php
   session_start();
   $uname = $_SESSION['username'];
   $_SESSION['uname'] = $uname;
?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
h2 {
  text-align: center;
  color: white;
}
body {
  background-image: url('/pro/img/login.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
.btn {
  background-color: LimeGreen;
  border: none;
  color: white;
  padding: 40px 40px;
  font-size: 16px;
  cursor: pointer;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: Lime;
}
img {
  margin: 0;
  display: block;
  margin-left: 5px;
  margin-right: 5px;
  width: 20%;
}

.column {
  float: left;
  width: 49%;
  padding: 5px;
}
</style>
</head>
<body>
<center>
<h2>AGENT HOME PAGE</h2>
<div class="column">
<a href="/pro/profiles/profile.php"><img src="/pro/img/my_profile.png" alt="Profile"><label style="font-size:25px;color:white" >Profile</label></a><br></br>
</div>
<div class="column">
<a href="/pro/search/search.html"><img src="/pro/img/search.jpg" alt="search vehicles"><label style="font-size:25px;color:white" >Search Vehicles</label></a><br></br>
</div>
<div class="column">
<a href="/pro/agent/add_registration.php"><img src="/pro/img/search1.png" alt="Register Vehicles"><label style="font-size:25px;color:white" >Register Vehicles</label></a><br></br>
</div>
<div class="column">
<a href="/pro/agent/rejected_registrations.php"><img src="/pro/img/reject.png" alt="Rejected Registrations"><label style="font-size:25px;color:white" >Rejected Registrations</label></a><br></br>
</div>
<div class="column">
<a href="/pro/login.php"><img src="/pro/img/logout1.png" alt="logout"><label style="font-size:25px;color:white" >Logout</label></a>
</div>
</body>
</html>
