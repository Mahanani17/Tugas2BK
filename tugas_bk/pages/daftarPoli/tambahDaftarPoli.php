<?php
require '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_rm = $_POST['no_rm'];
    $idJadwal = $_POST['jadwal'];
    $keluhan = $_POST['keluhan'];
    $noAntrian = 0;

    // Cari data pasien berdasarkan nomor rekam medis
    $cariPasien = "SELECT * FROM pasien WHERE no_rm = '$no_rm'";
    $queryCariPasien = mysqli_query($mysqli, $cariPasien);
    $dataPasien = mysqli_fetch_assoc($queryCariPasien);
    $idPasien = $dataPasien['id'];

    // Cek apakah sudah ada data di tabel daftar_poli
    $cekData = "SELECT * FROM daftar_poli";
    $queryCekData = mysqli_query($mysqli, $cekData);

    // Jika sudah ada data, periksa nomor antrian terakhir untuk jadwal tertentu
    if (mysqli_num_rows($queryCekData) > 0) {
        $cekNoAntrian = "SELECT * FROM daftar_poli WHERE id_jadwal = '$idJadwal' ORDER BY no_antrian DESC LIMIT 1";
        $queryNoAntrian = mysqli_query($mysqli, $cekNoAntrian);
        $dataPoli = mysqli_fetch_assoc($queryNoAntrian);
        $antrianTerakhir = (int) $dataPoli['no_antrian'];
        $antrianBaru = $antrianTerakhir += 1;

        // Daftarkan poli dengan nomor antrian baru
        $daftarPoli = "INSERT INTO daftar_poli (id_pasien, id_jadwal, keluhan, no_antrian, status_periksa) VALUES ('$idPasien', '$idJadwal', '$keluhan', '$antrianBaru', '0')";
        $queryDaftarPoli = mysqli_query($mysqli, $daftarPoli);
        // Berikan notifikasi berhasil atau gagal
        if ($queryDaftarPoli) {
            echo '<script>alert("Pendaftaran poli berhasil");window.location.href="../../tampilDaftarPoli.php";</script>';
        } else {
            echo '<script>alert("Pendaftaran poli gagal");window.location.href="../../tampilDaftarPoli.php";</script>';
        }
    } else {
        // Jika tidak ada data, daftarkan poli dengan nomor antrian 1
        $noAntrian = 1;
        $daftarPoli = "INSERT INTO daftar_poli (id_pasien, id_jadwal, keluhan, no_antrian, status_periksa) VALUES ('$idPasien', '$idJadwal', '$keluhan', '$noAntrian', '0')";
        $queryDaftarPoli = mysqli_query($mysqli, $daftarPoli);
        // Berikan notifikasi berhasil atau gagal
        if ($queryDaftarPoli) {
            echo '<script>alert("Pendaftaran poli berhasil");window.location.href="../../tampilDaftarPoli.php"</script>';
        } else {
            echo '<script>alert("Pendaftaran poli gagal");window.location.href="../../tampilDaftarPoli.php";</script>';
        }
    }
}
