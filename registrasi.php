<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Dania Store</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="signin.css" rel="stylesheet">
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
        color: white;
        font-weight: bold;
      }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
            <h2 class="form-signin-heading"><center><font size="5px"> Registrasi To Dania Store</font></center></h2>
             <form class="form-signin" method="post" action="proses_registrasi.php">
                <div class="form-group">
                    <select class="form-control" name="role">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <input type="email" class="form-control" name="email" placeholder="Email" required>  
                <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" required>
                <input type="text" class="form-control" name="username" placeholder="Username" required>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <center><button type="submit" class="btn btn-lg btn-danger btn-block">Register</button></center>
             </form>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>