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
h2{
text-align: center;
}
</style>
</head>
<body>
<form action="add_registration1.php" method="post">
<h2>ADD REGISTRATION DETAILS </h2>
<h3>VEHICLE DETAILS</h3>
<table>
  <tr>
    <td>CHASSIS NUMBER</td>
    <th><input type="text" id="vin" name="vin" required><br><br></th>
  </tr>
  <tr>
    <td>VENDOR</td>
    <th><input type="text" id="vendor" name="vendor" required><br><br></th>
  </tr>
  <tr>
    <td>NAME</td>
    <th><input type="text" id="name" name="name" required><br><br></th>
  </tr>
  <tr>
    <td>MODEL</td>
    <th><input type="text" id="model" name="model" required><br><br></th>
  </tr>
  <tr>
    <td>MANUFACTURE YEAR</td>
    <th><input type="text" id="man_year" name="man_year" required><br><br></th>
  </tr>
  <tr>
    <td>COLOUR</td>
    <th><input type="text" id="colour" name="colour" required><br><br></th>
  </tr>
  <tr>
    <td>VEHICLE TYPE</td>
    <th><input type="text" id="vtype" name="vtype" required><br><br></th>
  </tr>
  <tr>
    <td>NUMBER OF WHEELS</td>
    <th><input type="text" id="wsize" name="wsize" required><br><br></th>
  </tr>
</table>
<h3>PERSON DETAILS</h3>
<table>
  <tr>
    <td>FIRST NAME</td>
    <th><input type="text" id="vin" name="firstname" required><br><br></th>
  </tr>
  <tr>
    <td>LAST NAME</td>
    <th><input type="text" id="vendor" name="lastname" required><br><br></th>
  </tr>
  <tr>
    <td>EMAIL</td>
    <th><input type="text" id="name" name="email" required><br><br></th>
  </tr>
  <tr>
    <td>MOBILE</td>
    <th><input type="text" id="model" name="mobile" required><br><br></th>
  </tr>
  <tr>
    <td>GENDER</td>
    <th><input type="text" id="colour" name="gender" required><br><br></th>
  </tr>
  <tr>
    <td>SSN</td>
    <th><input type="text" id="vtype" name="ssn" required><br><br></th>
  </tr>
</table>
  <button type="submit" value="submit" onClick="checkForm()"class="registerbtn">REQUEST REGISTRATION</button>
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








