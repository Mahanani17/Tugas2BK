<?php
include '../../config/koneksi.php';
session_start();

$id = $_POST['id'];
$status = $_POST['status'];
$idDokter = $_SESSION['id'];

if ($status == '1') { // Jika status adalah 1
    $queryEdit = mysqli_query($mysqli, "UPDATE jadwal_periksa SET status = '0' WHERE id = '$id'");
    if ($queryEdit) {
        echo '<script>alert("Status berhasil diubah");window.location.href="../../tampilJadwal.php";</script>';
    } else {
        echo '<script>alert("Status gagal diubah: ' . mysqli_error($mysqli) . '");window.location.href="../../tampilJadwal.php";</script>';
    }
} else if ($status == '0') { // Jika status adalah 0
    $queryTotalData = mysqli_query($mysqli, "SELECT COUNT(*) AS status_aktif FROM jadwal_periksa WHERE id_dokter = '$idDokter' AND status = '1'");
    $data = mysqli_fetch_assoc($queryTotalData);
    if ($data['status_aktif'] > 0) {
        echo '<script>alert("Jadwal sudah ada yang aktif, Harap nonaktif jadwal sebelumnya");window.location.href="../../tampilJadwal.php";</script>';
    } else {
        $queryEdit = mysqli_query($mysqli, "UPDATE jadwal_periksa SET status = '1' WHERE id = '$id'");
        if ($queryEdit) {
            echo '<script>alert("Status berhasil diubah");window.location.href="../../tampilJadwal.php";</script>';
        } else {
            echo '<script>alert("Status gagal diubah: ' . mysqli_error($mysqli) . '");window.location.href="../../tampilJadwal.php";</script>';
        }
    }
}
