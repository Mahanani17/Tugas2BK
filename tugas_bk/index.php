<?php
session_start();

// Periksa apakah pengguna sudah login
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    // Ambil peran pengguna
    $role = $_SESSION['akses'];

    // Redirect ke halaman dashboard sesuai peran
    if ($role === 'dokter') {
        header("Location: tampilDashboard.php");
    } elseif ($role === 'pasien') {
        header("Location: tampilDashboard.php");
    } elseif ($role === 'admin') {
        header("Location: tampilDashboard.php");
    }
    exit();
} 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Poliklinik</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/AdminLTE/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="hold-transition login-page">
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center text-white p-5" style="height: 200px; background: #0B2447">
        <h1 class="font-weight-bold mb-3">Poliklinik</h1>
        <h5>
            "Menyediakan Layanan Janji Temu Antara Pasien dan Dokter"</h5>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-lg-center">
            <div class="col-md-6 mb-4">
                <div class="card" style="border: 2px dashed #1E3A8A">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="fas fa-user fa-fw mb-3" style="font-size: 34px; color: #1E3A8A"></i>
                        <p class="card-text text-center">Jika Anda adalah seorang Pasien, silakan login terlebih dahulu untuk mendaftar sebagai pasien.</p>
                        <a href="loginPasien.php" class="btn btn-block" style="background-color: #1E3A8A; color: white;">Login Sebagai Pasien</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card" style="border: 2px dashed #32a852">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="fas fa-user-nurse fa-fw mb-3" style="font-size: 34px; color: #32a852"></i>
                        <p class="card-text text-center">Jika Anda adalah seorang Dokter, silakan login terlebih dahulu untuk mulai melayani pasien.</p>
                        <a href="login.php" class="btn btn-block" style="background-color: #32a852; color: white;">Login Sebagai Dokter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/AdminLTE/dist/js/adminlte.min.js"></script>
</body>

</html>