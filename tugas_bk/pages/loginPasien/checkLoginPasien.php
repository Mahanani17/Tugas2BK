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
        $queryPasien = "SELECT * FROM pasien WHERE nama = '$username' && password = '$password'";
        $resultPasien = mysqli_query($mysqli, $queryPasien);
        if (mysqli_num_rows($resultPasien) > 0) {
            $data = mysqli_fetch_assoc($resultPasien);

            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data['nama'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['no_rm'] = $data['no_rm'];
            $_SESSION['akses'] = "pasien";

            header("location:../../tampilDashboard.php");
        } else {
            echo '<script>alert("Username atau Password salah");location.href="../../loginPasien.php";</script>';
        }
    }
}
