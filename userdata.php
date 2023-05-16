<?php
	@include 'config.php';

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}
	?>
<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<div>
	<link rel="stylesheet" type="text/css" href="style.css">
	 <div id="mySidenav" class="sidenav">
      <a style="margin: 0px 0px 5px 5px; font-size: 30px; align-content: center;  "><i class="fa fa-user"><h5>Admin</h5><h4><span><?php echo $_SESSION['admin_name'] ?></span></h4></i></a>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="user_data.php">filedata</a>
  <a href="#">Clients</a>
  <a href="register_form.php" class="btn">Create User</a>
  <a href="userdata.php">Created User</a>
  <a href="logout.php" class="btn">logout</a>

</div>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
   
		
	
<table style="margin-top: 0; float: left;" class="">
<tr>
<th>Id</th>
<th>Name</th>
<th>Email</th>

</tr>
<?php

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, email, name FROM user_form";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"] . "</td><td>". $row["email"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</div>
</div>
</body>
</html>