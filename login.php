<?php
session_start();

require 'Admin/koneksi.php';

if (isset($_GET['login'])) {
    $username = $_GET['username'];
    $password = $_GET['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username = '$username' AND password  = '$password'");

    if (mysqli_num_rows($query) === 1) {
        header('location:Admin/index.php');
        $data = mysqli_fetch_object($query);

        $_SESSION['login'] = true;
        $_SESSION['hak_akses'] = $data->hak_akses;
    }
    echo $error = 'Username atau password yang anda masukan salah';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Lombok Tour Travel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>
    <div class="container-fluid vh-100">
        <div class="" style="margin-top:50px">
            <div class="rounded d-flex justify-content-center">
                <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                    <div class="text-center">
                        <h3 class="text-primary">Login Admin</h3>
                    </div>
                    <form action="#" method="GET">
                        <div class="p-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i class="bi bi-person-plus-fill text-white"></i></span>
                                <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="password">
                            </div>
                            <button class="btn btn-primary text-center mt-2" type="submit" name="login" value="login">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>