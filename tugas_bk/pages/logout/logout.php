<?php
session_start();

//menghapus semua session
session_destroy();
//pindah halaman login awal
header("location:../../index.php");
