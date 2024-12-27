<?php
require 'config/koneksi.php';

// Query untuk mengambil total pasien
$queryTotalPasien = "SELECT COUNT(*) as nama FROM pasien";
$resultTotalPasien = $mysqli->query($queryTotalPasien);
$rowTotalPasien = $resultTotalPasien->fetch_assoc();
$totalPasien = $rowTotalPasien['nama'];

// Query untuk mengambil total dokter
$queryTotalDokter = "SELECT COUNT(*) as nama FROM dokter";
$resultTotalDokter = $mysqli->query($queryTotalDokter);
$rowTotalDokter = $resultTotalDokter->fetch_assoc();
$totalDokter = $rowTotalDokter['nama'];

// Query untuk mengambil total poli
$queryTotalPoli = "SELECT COUNT(*) as nama_poli FROM poli";
$resultTotalPoli = $mysqli->query($queryTotalPoli);
$rowTotalPoli = $resultTotalPoli->fetch_assoc();
$totalPoli = $rowTotalPoli['nama_poli'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Poliklinik</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body style="margin: 0; padding: 0;">
    <div class="dashboard-container">
        <header style="background-color: #0B2447; color: white; text-align: center; padding:80px; grid-column: span 2;">
            <h1 class="font-weight-bold mb-1">Selamat Datang di POLIKLINIK</h1>
            <h5>"Kami Menyediakan Layanan Janji Temu Antara Pasien dan Dokter"</h5>
        </header>
        <section class="content" style="display: flex; flex-direction: row; justify-content: space-around; padding: 60px;">
            <div class="container mt-5">
                <div class="row justify-content-lg-center">
                    <div class="col-md-3">
                        <div class="card" style="border: 2px solid  #2E4374">
                            <div class="card-body flex justify-content-center items-center flex-col">
                                <i class="fas fa-user fa-fw mb-3" style="font-size: 34px; color:  #2E4374"></i>
                                <h2 style="margin-bottom: 5px; color: #2E4374">Total Pasien: <span>
                                        <?php echo $totalPasien; ?></span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="border: 2px solid  #2E4374">
                            <div class="card-body flex justify-content-center items-center flex-col">
                                <i class="fas fa-user-nurse fa-fw mb-3" style="font-size: 34px; color: #2E4374"></i>
                                <h2 style="margin-bottom: 5px; color: #2E4374">Total Dokter: <span>
                                        <?php echo $totalDokter; ?></span>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>