<?php

    include("config.php");

    // cek apakah tombol tambah sudah diklik atau blum?
    if(isset($_POST['tambah_jabatan'])){
        
        // ambil data dari formulir
        $jabatan = $_POST['jabatan'];
        
        // buat query
        $sql = "INSERT INTO jabatan (jabatan) VALUES ('$jabatan')";
        $query = mysqli_query($con, $sql);
        
        // apakah query simpan berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman jabatan.php
            header('Location: jabatan.php');
        } else {
             // kalau gagal tampilkan pesan
             die("Gagal menambahkan data...");
        }      
    } else {
        die("Akses dilarang...");
    }
?>