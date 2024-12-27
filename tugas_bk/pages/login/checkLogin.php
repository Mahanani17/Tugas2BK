<?php
session_start();
require '../../config/koneksi.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "admin" && $password == "admin") {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['akses'] = "admin";

        header("location:../../tampilDashboard.php");
    } else {
        $queryDokter = "SELECT * FROM dokter WHERE nama = '$username' && password = '$password'";
        $resultDokter = mysqli_query($mysqli, $queryDokter);
        if (mysqli_num_rows($resultDokter) > 0) {
            $data = mysqli_fetch_assoc($resultDokter);

            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data['nama'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['id_poli'] = $data['id_poli'];
            $_SESSION['akses'] = "dokter";

            header("location:../../tampilDashboard.php");
        } else {
            echo '<script>alert("Username atau password salah");location.href="../../login.php";</script>';
        }
    }
}
