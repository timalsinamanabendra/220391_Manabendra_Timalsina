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

  
  <a href="#">Clients</a>
  <a href="user_data.php">filedata</a>
  <!-- <a href="Change_pass_form.php">change password</a> -->
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
<th>abc</th>
<th>def</th>
<th>igh</th>
<th>jkl</th>

</tr>
<?php

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT data_1, data_2, data_3, data_4 FROM data_list";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["data_1"]. "</td><td>" . $row["data_2"] . "</td><td>". $row["data_3"]. "</td><td>". $row["data_4"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
  <div>
    <?php

@include 'config.php';


if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

if(isset($_POST['submit'])){

   $data_2 = $_POST['data_2'];
   $data_3 = $_POST['data_3'];

    $res = mysqli_query($conn, "INSERT INTO data_list(data_2, data_3) VALUES('$data_2', '$data_3')");
    if($res)
    {
      echo"success";
    }
    else{
      echo"failed";
    }
      
      };
   ?><form action="" method="post">
         <input type="text" name="data_2" placeholder="def">
         <input type="text" name="data_3" placeholder="igh">
          <input type="submit" name="submit" value="Add" class="form-btn">
        </form>
      </div>
</div>

</div>


</body>
 <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</html>