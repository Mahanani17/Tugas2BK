<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manajemen Pasien</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard.php?page=home">Home</a></li>
                    <li class="breadcrumb-item active">Pasien</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Pasien</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#addModal">
                                Tambah
                            </button>
                            <!-- Modal Tambah Data Pasien -->
                            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addModalLabel">Tambah Data Pasien</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Form tambah data pasien disini -->
                                            <form action="pages/pasien/tambahPasien.php" method="post">
                                                <div class="form-group">
                                                    <label for="nama">Nama Pasien</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat">Alamat</label>
                                                    <textarea class="form-control" rows="3" id="alamat" name="alamat"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="no_ktp">NIK KTP</label>
                                                    <input type="text" class="form-control" id="no_ktp" name="no_ktp" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="no_hp">Nomor HP</label>
                                                    <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Pasien</th>
                                    <th>Alamat</th>
                                    <th>NIK KTP</th>
                                    <th>Nomor HP</th>
                                    <th>Nomor Rekam Medis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <!-- TAMPILKAN DATA PASIEN DI SINI -->
                                <?php
                                require 'config/koneksi.php';
                                $query = "SELECT * FROM pasien";
                                $result = mysqli_query($mysqli, $query);

                                while ($data = mysqli_fetch_assoc($result)) {
                                    # code...  
                                ?>
                                    <tr>
                                        <td><?php echo $data['id'] ?></td>
                                        <td><?php echo $data['nama'] ?></td>
                                        <td style="white-space: pre-line;"><?php echo $data['alamat'] ?></td>
                                        <td><?php echo $data['no_ktp'] ?></td>
                                        <td><?php echo $data['no_hp'] ?></td>
                                        <td><?php echo $data['no_rm'] ?></td>
                                        <td>
                                            <button type='button' class='btn btn-sm btn-warning edit-btn' data-toggle="modal" data-target="#editModal<?php echo $data['id'] ?>">Edit</button>
                                            <button type='button' class='btn btn-sm btn-danger edit-btn' data-toggle="modal" data-target="#hapusModal<?php echo $data['id'] ?>">Hapus</button>
                                        </td>

                                        <!-- Modal Edit Data Pasien -->
                                        <div class="modal fade" id="editModal<?php echo $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addModalLabel">Edit Data Pasien</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Form edit data pasien disini -->
                                                        <form action="pages/pasien/updatePasien.php" method="post">
                                                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data['id'] ?>" required>
                                                            <div class="form-group">
                                                                <label for="nama">Nama Pasien</label>
                                                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="alamat">Alamat</label>
                                                                <textarea class="form-control" rows="3" id="alamat" name="alamat"><?php echo $data['alamat'] ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="no_ktp">NIK KTP</label>
                                                                <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="<?php echo $data['no_ktp'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="no_hp">Nomor Hp</label>
                                                                <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data['no_hp'] ?>" required>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Hapus Data Pasien -->
                                        <div class="modal fade" id="hapusModal<?php echo $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addModalLabel">Hapus Data Pasien</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Form hapus data pasien disini -->
                                                        <form action="pages/pasien/hapusPasien.php" method="post">
                                                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data['id'] ?>" required>
                                                            <p>Apakakah Anda yakin ingin menghapus data?
                                                                <span class="font-weight-bold"><?php echo $data['nama'] ?></span>
                                                            </p>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->