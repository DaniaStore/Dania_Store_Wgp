<?php require_once("koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    } ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login Dania Store</title>
    <style type="text/css">
      .regis {
        display: flex;
      }
      .regis h6 {
        padding-left: 5px;
        margin-bottom: 6px;
      }
      .regis .akun {
        margin-top: 1px;
        font-weight: bold;
        font-size: 11px;
      }
      .btn {
        margin-top: 5px;
      }
      font{
        font-weight: bold;
      }
    </style>
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="signin.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <form class="form-signin" method="post" action="proseslogin.php">
        <h2 class="form-signin-heading"><center><font size="5px"> Login To Dania Store</font></center></h2>
        <input name="username" id="user" type="text" class="form-control" placeholder="Username" required autofocus>
        <input name="password" id="pass" type="password" class="form-control" placeholder="Password" required>
        <div class="regis">
          <h6 class="akun">Belum Punya Akun?<a href="registrasi.php"> Register</a> </h6> 
        </div>
        <button class="btn btn-lg btn-danger btn-block" type="submit">Sign in</button>
      </form>
    </div>  
  </body>
</html>
