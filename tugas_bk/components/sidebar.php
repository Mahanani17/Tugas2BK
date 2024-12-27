  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #0B2447">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
          <span class="brand-text font-weight-bold">POLIKLINIK</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <?php
            require 'config/koneksi.php';
            if ($_SESSION['akses'] == 'admin') {
                $tampilData = array(
                    'nama' => 'Admin'
                );
            } else if ($_SESSION['akses'] == 'dokter') {
                $getData = mysqli_query($mysqli, "SELECT * FROM dokter WHERE id = '$id_dokter'");
                $tampilData = mysqli_fetch_assoc($getData);
            } else if ($_SESSION['akses'] == 'pasien') {
                $getData = mysqli_query($mysqli, "SELECT * FROM pasien WHERE id = '$idPasien'");
                $tampilData = mysqli_fetch_assoc($getData);
            }
            ?>
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="assets/AdminLTE/dist/img/user8-128x128.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block"><?php echo $tampilData['nama'] ?></a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                  <?php
                    if ($_SESSION['akses'] == "admin") {
                        echo '
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-th "></i>
                                <p>
                                    Dashboard
                                    <span class="right badge badge-success">Admin</span>
                                </p>
                            </a> 
                        </li>
                        <li class="nav-item">
                            <a href="tampilDokter.php" class="nav-link">
                                <i class="fas fa-solid fa-user-nurse nav-icon"></i>
                                <p>
                                    Dokter
                                    <span class="right badge badge-success">Admin</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="tampilPoli.php" class="nav-link">
                                <i class="fas fa-solid fa-hospital nav-icon"></i>
                                <p>
                                    Poli
                                    <span class="right badge badge-success">Admin</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="tampilObat.php" class="nav-link">
                                <i class="fas fa-solid fa-pills nav-icon"></i>
                                <p>
                                    Obat
                                    <span class="right badge badge-success">Admin</span>
                                </p>
                            </a>
                        </li> 
                        <li class="nav-item">
                            <a href="tampilPasien.php" class="nav-link">
                                <i class="fas fa-solid fa-user nav-icon"></i>
                                <p>
                                    Pasien
                                    <span class="right badge badge-success">Admin</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/logout/logout.php" class="nav-link">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>';
                    } else if ($_SESSION['akses'] == "dokter") {
                        echo '
                        <li class="nav-item">
                            <a href="tampilDashboard.php" class="nav-link active">
                                <i class="nav-icon fas fa-th "></i>
                                <p>
                                    Dashboard
                                    <span class="right badge badge-warning">Dokter</span>
                                </p>
                            </a> 
                        </li>
                        <li class="nav-item">
                            <a href="tampilJadwal.php" class="nav-link">
                                <i class="fas fa-solid fa-notes-medical nav-icon"></i>
                                <p>
                                    Jadwal Periksa
                                    <span class="right badge badge-warning">Dokter</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="tampilPeriksa.php" class="nav-link">
                                <i class="fas fa-solid fa-stethoscope nav-icon"></i>
                                <p>
                                    Periksa Pasien
                                    <span class="right badge badge-warning">Dokter</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="tampilRiwayat.php" class="nav-link">
                                <i class="fas fa-solid fa-receipt nav-icon"></i>
                                <p>
                                    Riwayat Pasien
                                    <span class="right badge badge-warning">Dokter</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="tampilProfil.php" class="nav-link">
                                <i class="fas fa-solid fa-user nav-icon"></i>
                                <p>
                                    Profile
                                    <span class="right badge badge-warning">Dokter</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/logout/logout.php" class="nav-link">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>';
                    } else if ($_SESSION['akses'] == "pasien") {
                        echo '
                        <li class="nav-item">
                            <a href="tampilDashboard.php" class="nav-link active">
                                <i class="nav-icon fas fa-th "></i>
                                <p>
                                    Dashboard
                                    <span class="right badge badge-warning">Pasien</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="tampilDaftarPoli.php" class="nav-link">
                                <i class="fas fa-solid fa-hospital nav-icon"></i> 
                                <p>
                                    Poli
                                    <span class="right badge badge-warning">Pasien</span>
                                </p>
                            </a>
                        </li>   
                        <li class="nav-item">
                            <a href="pages/logout/logout.php" class="nav-link">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>';
                    }
                    ?>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>