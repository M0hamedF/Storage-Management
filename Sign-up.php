<?php session_start(); ?>
<?php 
require_once('process.php');
?>
<?php
$server="localhost";
$user="root";
$pass="";
$db="storage management";
$conn=new mysqli($server,$user,$pass,$db);

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Olectra</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/database.png" rel="icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">

  <style>
      body{
          background-color: #dfe6e0;
      }
      p, h2{
          margin-left: 15px;
      }
      h1{
        margin-top: 20px;
        margin-bottom: -10px;
      }
      input{
        margin-bottom: 10px;;
      }
  </style>
  </head>

  <body>

  <!-- =======  Sign-up Form ======= -->
<h1 style="text-align: center;" class="logo me-auto"><a href="index.php">Olectra</a></h1>

<form action="#" method="POST">
<div class="card">
  <div class="card-header">
    <h4>Login</h4>    
</div>
  <div class="card-body">
  <div class="form-floating mb-3">
  <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" required>
  <label for="floatingInput">Username</label>
</div>
<div class="form-floating">
  <input type="email" name="email" class="form-control" id="floatingPassword" placeholder="Email" required>
  <label for="floatingPassword">Email</label>
</div>
<div class="form-floating">
  <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
  <label for="floatingPassword">Password</label>
</div>

<div class="text-center">
<button name="sign-up" style="margin-top: 15px; width:150px" type="submit" class="btn btn-primary">Sign-up</button>
</div><!-- Button -->

    <div class="text-center">
    <a style="font-size: 12px;" href="login.php">Already have an account?</a>
</div><!-- Button -->
  </div>
</div>
</form>
  </body>
</html>
  






