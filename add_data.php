<?php

@include 'config.php';


if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

if(isset($_POST['submit'])){

   $data_2 = mysqli_real_escape_string($conn, $_POST['data_2']);
   $data_3 = mysqli_real_escape_string($conn, $_POST['data_3']);
   else{
         $insert = "INSERT INTO data_list(data_1, dat_2) VALUES('$data_2', '$data_3')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   ?>
   <!DOCTYPE html>
   <html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>add data</title>
   </head>
   <body>
      <div>
         <input type="text" name="data_1" placeholder="def">
         <input type="text" name="data_2" placeholder="igh">
      </div>
   </body>
   </html>