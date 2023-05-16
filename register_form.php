<?php

@include 'config.php';


if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);


   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

</head>
<style type="text/css">
   html{
      overflow-y: hidden;
   }
</style>
<body>

<div id="mySidenav" class="sidenav">

   <a style="margin: 0px 0px 5px 5px; font-size: 30px; align-content: center;  "><i class="fa fa-user"><h5>Admin</h5><h4><span><?php echo $_SESSION['admin_name'] ?></span></h4></i></a>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  
  <a href="admin_page.php">Home</a>
  <a href="user_data.php">filedata</a>
  <a href="#">Clients</a>
  <a href="register_form.php" class="btn">Create User</a>
    <a href="userdata.php">Created User</a>
  <a href="logout.php" class="btn">logout</a>
</div>
 


<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };



      ?>
      <input type="text" name="name" required placeholder="Enter your name">
      <input type="text" name="email" required placeholder="Enter your username">
      <input type="password" id="myInputP" name="password" required placeholder="Enter your password">
      <div style=" float: none; margin-top: -40px ; margin-right: -24rem;"><i class="far fa-eye" onclick="myFunctionP()" style=" cursor: pointer;"></i></div>
      <div style="margin-top: 1rem"><input type="password" id="myInput" name="cpassword" required placeholder="confirm your password"></div>
      <div style=" float: none; margin-top: -40px ; margin-right: -24rem;"><i class="far fa-eye" onclick="myFunction()" style=" cursor: pointer;"></i></div>
      <select style="margin-top: 25px;" name="user_type" required>
         <option value="" disabled selected hidden>Seclect</option>
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
   </form>

</div>
   <script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

   <script>
function myFunctionP() {
  var x = document.getElementById("myInputP");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

</body>
 <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</html>