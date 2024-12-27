<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Profil Dokter</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header" style="background-color: #0B2447;">
                        <h3 class="card-title">Profil</h3>
                    </div>
                    <!-- /.card -->
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="assets/AdminLTE/dist/img/user8-128x128.jpg" alt="User profile picture">
                        </div>
                        <?php
                        require 'config/koneksi.php';
                        $dataDokter = mysqli_query($mysqli, "SELECT dokter.nama, poli.nama_poli, dokter.alamat, dokter.no_hp FROM dokter INNER JOIN poli ON dokter.id_poli = poli.id WHERE dokter.id = '$id_dokter'");
                        $getData = mysqli_fetch_assoc($dataDokter);
                        ?>
                        <h3 class="profile-username text-center"><b><?php echo $getData['nama'] ?></b></h3>

                        <hr>

                        <strong><i class="fas fa-hospital-alt mr-1"></i> Poli</strong>
                        <p class="text-muted"><?php echo $getData['nama_poli'] ?></p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                        <p class="text-muted"><?php echo $getData['alamat'] ?></p>

                        <hr>

                        <strong><i class="fas fa-solid fa-phone-alt mr-1 "></i> No HP</strong>
                        <p class="text-muted"><?php echo $getData['no_hp'] ?></p>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9" >
                <div class="card card-primary">
                    <div class="card-header" style="background-color: #0B2447;">
                        <h3 class="card-title" >Edit Profil</h3>
                    </div>
                    <div class="card-body">
                        <form action="pages/profil/editProfil.php" method="post">
                            <input type="hidden" value="<?php echo $id_dokter ?>" name="idDokter">
                            <div class="form-group mb-3">
                                <label for="nama font-weight-bold">Nama</label>
                                <input type="text" class="form-control" name="nama" value="<?php echo $getData['nama'] ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="no_hp font-weight-bold">No HP</label>
                                <input type="text" class="form-control" name="no_hp" value="<?php echo $getData['no_hp'] ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" rows="3" id="alamat" name="alamat" required><?php echo $getData['alamat'] ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary" style="background-color: #0B2447;">
                                Simpan
                            </button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>